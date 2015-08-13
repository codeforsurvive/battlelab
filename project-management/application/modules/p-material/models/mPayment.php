<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

class mPayment extends MY_Model {

    // constants, column definition


    public function __construct() {
        parent::__construct();
        $this->tableName = 'payment';
        $this->idField = 'PAYMENT_ID';
    }

    function get1($id) {
        $sql = "select pay.PAYMENT_ID,
pay.PAYMENT_KODE,
pay.INVOICE_ID,
pay.LPU_ID,
pay.TANGGAL_TRANSAKSI,
pay.STATUS_ID,
pay.HARGA,
stts.STATUS_LPB_NAMA as STATUS_NAMA,
inv.INVOICE_KODE,
inv.SUPPLIER_ID,
lpu.LPU_KODE,
rab.RAB_ID,
rab.RAB_NAMA,
rab.RAB_KODE,
drafter.PENGGUNA_NAMA AS DRAFTER_NAMA,
validator.PENGGUNA_NAMA AS VALIDATOR_NAMA
from payment pay
inner join status_lpb stts
on stts.STATUS_LPB_ID=pay.STATUS_ID
inner join pengguna drafter
on drafter.PENGGUNA_ID=pay.PETUGAS_ID
left join pengguna validator
on validator.PENGGUNA_ID=pay.VALIDATOR_ID
left join invoice inv
on inv.INVOICE_ID=pay.INVOICE_ID
left join lpu
on lpu.LPU_ID=pay.LPU_ID
left join rab_transaction rab
on rab.RAB_ID=inv.RAB_ID or rab.RAB_ID=lpu.RAB_ID
where pay.PAYMENT_ID='$id'";
        $query = $this->db->query($sql)->result_array();
        if (count($query) > 0)
            return $query[0];
        return null;
    }

    function get_list_payment_datatable($start, $length) {
        $sql = "select count(" . $this->idField . ") as jumlah from " . $this->tableName;
        $query = $this->db->query($sql)->result_array();
        $jumlahData = 0;
        if (count($query) > 0)
            $jumlahData = $query[0]['jumlah'];
        $sql = "select pay.PAYMENT_ID,
				pay.PAYMENT_KODE,
				pay.INVOICE_ID,
				pay.TANGGAL_TRANSAKSI,
				pay.STATUS_ID,
				pay.PETUGAS_ID,
				pay.VALIDATOR_ID,
				pay.TANGGAL_VALIDASI,
				pay.TOP,
				pay.HARGA, 
				inv.INVOICE_KODE, 
				rab.RAB_KODE, 
				rab.RAB_NAMA,
                spy.SUPPLIER_KODE, 
				spy.SUPPLIER_NAMA, 
				spy.SUPPLIER_ALAMAT,
                top.TOP_KODE, 
				top.TOP_VALUE, 
				top.TOP_DESCRIPTION,
				stts.STATUS_LPB_NAMA,
				inv.TOTAL_HARGA_INVOICE
                from payment pay
                inner join invoice inv
                on inv.INVOICE_ID=pay.INVOICE_ID
                inner join rab_transaction rab
                on rab.RAB_ID=inv.RAB_ID
                inner join master_supplier spy
                on spy.SUPPLIER_ID=inv.SUPPLIER_ID
                inner join top
                on top.TOP_ID=inv.TOP_ID
                inner join status_lpb stts
                on stts.STATUS_LPB_ID=pay.STATUS_ID
                limit $start,$length";
        $sql = "
select pay.PAYMENT_ID,
pay.PAYMENT_KODE,
pay.INVOICE_ID,
pay.LPU_ID,
pay.TANGGAL_TRANSAKSI,
pay.STATUS_ID,
pay.HARGA,
stts.STATUS_LPB_NAMA as STATUS_NAMA,
inv.INVOICE_KODE,
lpu.LPU_KODE,
rab.RAB_NAMA,
rab.RAB_KODE
from payment pay
inner join status_lpb stts
on stts.STATUS_LPB_ID=pay.STATUS_ID
left join invoice inv
on inv.INVOICE_ID=pay.INVOICE_ID
left join lpu
on lpu.LPU_ID=pay.LPU_ID
left join rab_transaction rab
on rab.RAB_ID=inv.RAB_ID or rab.RAB_ID=lpu.RAB_ID
limit $start,$length
		";
        $query = $this->db->query($sql)->result_array();
        $hasil = array();
        foreach ($query as $row) {
            $h = array();
            foreach ($row as $cell) {
                $h[] = $cell;
            }
            $hasil[] = $h;
        }
        return array('data' => $hasil, 'recordsFiltered' => $jumlahData,
            'recordsTotal' => $jumlahData,
            'sql' => ''
        );
    }

    function get_list_invoice_datatable($id_supplier, $id_rab, $start, $length) {
        $sql = "select count(*) as jumlah
                from invoice inv
                where inv.RAB_ID='$id_rab' 
                and inv.SUPPLIER_ID='$id_supplier' 
                and inv.INVOICE_ID not in ( 
                    select coalesce(py.INVOICE_ID,0) 
                    from payment py
                )";
        $query = $this->db->query($sql)->result_array();
        $jumlahData = 0;
        if (count($query) > 0)
            $jumlahData = $query[0]['jumlah'];
        $sql = "
select inv.INVOICE_ID,
inv.INVOICE_KODE,
inv.TANGGAL_TRANSAKSI,
inv.TOTAL_HARGA_INVOICE,
rab.RAB_KODE,
rab.RAB_NAMA,
spy.SUPPLIER_KODE,
spy.SUPPLIER_NAMA,
spy.SUPPLIER_ALAMAT

from invoice inv
inner join rab_transaction rab
on rab.RAB_ID=inv.RAB_ID 
inner join master_supplier spy
on spy.SUPPLIER_ID=inv.SUPPLIER_ID
where inv.RAB_ID='$id_rab' 
and inv.SUPPLIER_ID='$id_supplier' 
and inv.INVOICE_ID not in( 
    select coalesce(py.INVOICE_ID,0) from payment py
)
limit $start,$length
                ";
        $query = $this->db->query($sql)->result_array();
        $hasil = array();
        foreach ($query as $row) {
            $h = array();
            foreach ($row as $cell) {
                $h[] = $cell;
            }
            $hasil[] = $h;
        }
        return array('data' => $hasil, 'recordsFiltered' => $jumlahData,
            'recordsTotal' => $jumlahData,
            'sql' => $sql
        );
    }

    function get_detail_invoice($id_invoice) {
        $sql = "
select
lpb.PENERIMAAN_BARANG_KODE,
lpb.PENERIMAAN_BARANG_ID,
dlpb.VOLUME_LPB,
dpo.HARGA_MATERI_PO as BARANG_HARGA_SATUAN,
dpo.DISKON1,
dpo.DISKON2,
dpo.DISKON3,
po.KATEGORI_PAJAK_ID,
pajak.PAJAK_VALUE,
coalesce(brg.SATUAN_NAMA,subcon.SATUAN_NAMA,pom.SATUAN_NAMA) as SATUAN_NAMA,
lpb.LPB_SURAT_JALAN,
lpb.LPB_KENDARAAN,
case 
    when dlpb.BARANG_ID IS NOT NULL OR dlpb.BARANG_OVERHEAD_ID IS NOT NULL
        then
        (
            brg.BARANG_KODE
        )
    when dlpb.SUBCON_ID IS NOT NULL
        then
        (
            subcon_tipe.SUBCON_TIPE_KODE
        )
    when dlpb.PAKET_OVERHEAD_MATERIAL_ID IS NOT NULL
        then
        (
            'LSMOV'
        )
    else
        '-'
end as KODE_MATERIAL,
case 
    when dlpb.BARANG_ID IS NOT NULL OR dlpb.BARANG_OVERHEAD_ID IS NOT NULL
        then
        (
            brg.BARANG_NAMA
        )
    when dlpb.SUBCON_ID IS NOT NULL
        then
        (
            subcon.SUBCON_NAMA
        )
    when dlpb.PAKET_OVERHEAD_MATERIAL_ID IS NOT NULL
        then
        (
            pom.PAKET_OVERHEAD_MATERIAL_NAMA
        )
    else
        '-'
end as NAMA_MATERIAL

from detail_invoice dinv
left join penerimaan_barang lpb
on lpb.PENERIMAAN_BARANG_ID=dinv.LPB_ID
left join detail_lpb dlpb
on dlpb.PENERIMAAN_BARANG_ID=lpb.PENERIMAAN_BARANG_ID
left join detail_po dpo
on dpo.PURCHASE_ORDER_ID=dlpb.PO_ID and (dpo.BARANG_ID=dlpb.BARANG_ID or dpo.SUBCON_ID=dlpb.SUBCON_ID or dpo.BARANG_ID=dlpb.BARANG_OVERHEAD_ID or dpo.SUBCON_ID=dlpb.PAKET_OVERHEAD_MATERIAL_ID)
left join purchase_order po
on po.PURCHASE_ORDER_ID=dpo.PURCHASE_ORDER_ID
left join pajak
on pajak.PAJAK_ID=po.PAJAK_ID
left join master_barang brg
on brg.BARANG_ID=dlpb.BARANG_ID or brg.BARANG_ID=dlpb.BARANG_OVERHEAD_ID
left join subcon
on subcon.SUBCON_ID=dlpb.SUBCON_ID
left join subcon_tipe
on subcon_tipe.SUBCON_TIPE_ID=subcon.SUBCON_TIPE_ID
left join paket_overhead_material pom
on pom.PAKET_OVERHEAD_MATERIAL_ID=dlpb.PAKET_OVERHEAD_MATERIAL_ID
where dinv.INVOICE_ID='$id_invoice'
order by lpb.PENERIMAAN_BARANG_ID ASC    
                ";
        return $this->db->query($sql)->result_array();
    }

    function get_list_lpu_datatable($id_rab, $start, $length) {
        $sql = "select count(*) as jumlah
                from lpu
                where lpu.RAB_ID='$id_rab' 
                and lpu.LPU_ID not in( select coalesce(py.LPU_ID,0) from payment py)";
        $query = $this->db->query($sql)->result_array();
        $jumlahData = 0;
        if (count($query) > 0)
            $jumlahData = $query[0]['jumlah'];
        $sql = "
select
lpu1.LPU_ID,
lpu1.LPU_KODE,
lpu1.TANGGAL_TRANSAKSI,
rab.RAB_KODE,
rab.RAB_NAMA,
dlpu.HARGA_LPU

from lpu lpu1
inner join rab_transaction rab
on rab.RAB_ID=lpu1.RAB_ID
left join (
	select 
	dlpu1.LPU_ID as DLPU_ID,
	case 
		when op1.KATEGORI_PAJAK_ID=2 
                    then 
                        coalesce(sum((100 + op1.PAJAK_VALUE)*(dlpu1.VOLUME * dop.HARGA_OPNAME)/100),0) 
                else 
                        coalesce(sum(dlpu1.VOLUME * dop.HARGA_OPNAME),0)
		end
	as HARGA_LPU
	from detail_lpu dlpu1
	inner join opname op1
	on op1.OPNAME_ID=dlpu1.OPNAME_ID
	inner join detail_transaksi_opname dop
	on dop.OPNAME_ID=op1.OPNAME_ID 
        and (
            dop.ANALISA_ID=dlpu1.ANALISA_ID 
            or dop.SUBCON_ID=dlpu1.SUBCON_ID 
            or dop.UPAH_ID=dlpu1.UPAH_ID 
            or dop.PAKET_OVERHEAD_UPAH_ID=dlpu1.PAKET_OVERHEAD_UPAH_ID
        )
	group by dlpu1.LPU_ID
) as dlpu
on dlpu.DLPU_ID=lpu1.LPU_ID
where lpu1.RAB_ID='$id_rab' AND lpu1.STATUS_ID=3
limit $start,$length";
        $query = $this->db->query($sql)->result_array();
        $hasil = array();
        foreach ($query as $row) {
            $h = array();
            foreach ($row as $cell) {
                $h[] = $cell;
            }
            $hasil[] = $h;
        }
        return array('data' => $hasil, 'recordsFiltered' => $jumlahData,
            'recordsTotal' => $jumlahData
        );
    }

    function get_detail_lpu($id_lpu = 0) {
//        $sql = "
//select 
//lpu.LPU_ID,
//lpu.LPU_KODE,
//lpu.RAB_ID,
//lpu.TANGGAL_TRANSAKSI,
//dlpu.VOLUME,
//dlpu.HARGA_SATUAN,
//dlpu.OPNAME_ID,
//dlpu.PK_ID,
//opname.KATEGORI_PAJAK_ID,
//opname.PAJAK_ID,
//opname.PAJAK_VALUE,
//dop.HARGA_OPNAME,
//arab.ANALISA_ID,
//arab.SATUAN_NAMA,
//arab.ANALISA_KODE,
//arab.ANALISA_NAMA,
//master_upah.UPAH_ID,
//master_upah.UPAH_KODE,
//master_upah.UPAH_NAMA,
//pou.PAKET_OVERHEAD_UPAH_ID,
//pou.PAKET_OVERHEAD_UPAH_NAMA,
//satuan_upah.SATUAN_UPAH_NAMA
//from detail_lpu dlpu
//inner join lpu
//on lpu.LPU_ID=dlpu.LPU_ID
//inner join opname
//on opname.OPNAME_ID=dlpu.OPNAME_ID
//INNER join detail_transaksi_opname dop
//on dop.OPNAME_ID=opname.OPNAME_ID and (dop.ANALISA_ID=dlpu.ANALISA_ID or dop.OV_ID=dlpu.PAKET_ID or dop.OV_ID=dlpu.UPAH_ID)
//left join analisa_rab arab
//on arab.ANALISA_ID=dlpu.ANALISA_ID
//left join master_upah
//on master_upah.UPAH_ID=dlpu.UPAH_ID
//left join paket_overhead_upah pou
//on pou.PAKET_OVERHEAD_UPAH_ID=dlpu.PAKET_ID
//left join satuan_upah
//on satuan_upah.SATUAN_UPAH_ID=master_upah.SATUAN_UPAH_ID or satuan_upah.SATUAN_UPAH_ID=pou.SATUAN_UPAH_ID
//where dlpu.LPU_ID='$id_lpu'
//		";
        $sql = "
select dlpu.LPU_ID,
dlpu.OPNAME_ID,
dlpu.PK_ID,
dlpu.ANALISA_ID,
dlpu.SUBCON_ID,
dlpu.UPAH_ID,
dlpu.PAKET_OVERHEAD_UPAH_ID,
dlpu.VOLUME,
case 
    when dlpu.ANALISA_ID IS NOT NULL
        THEN
            arab.ANALISA_KODE
    WHEN dlpu.SUBCON_ID IS NOT NULL
        THEN
            subcon_tipe.SUBCON_TIPE_KODE
    WHEN dlpu.UPAH_ID IS NOT NULL
        THEN
            master_upah.UPAH_KODE
    WHEN dlpu.PAKET_OVERHEAD_UPAH_ID IS NOT NULL
        THEN
            'LSUOV'
    else
        0
end
as KODE_PEKERJAAN,
case 
    when dlpu.ANALISA_ID IS NOT NULL
        THEN
            arab.ANALISA_NAMA
    WHEN dlpu.SUBCON_ID IS NOT NULL
        THEN
            subcon.SUBCON_NAMA
    WHEN dlpu.UPAH_ID IS NOT NULL
        THEN
            master_upah.UPAH_NAMA
    WHEN dlpu.PAKET_OVERHEAD_UPAH_ID IS NOT NULL
        THEN
            pou.PAKET_OVERHEAD_UPAH_NAMA
    else
        '-'
end
as NAMA_PEKERJAAN,
case 
    when dlpu.ANALISA_ID IS NOT NULL
        THEN
            arab.SATUAN_NAMA
    WHEN dlpu.SUBCON_ID IS NOT NULL
        THEN
            subcon.SATUAN_NAMA
    WHEN dlpu.UPAH_ID IS NOT NULL
        THEN
            satuan_upah.SATUAN_UPAH_NAMA
    WHEN dlpu.PAKET_OVERHEAD_UPAH_ID IS NOT NULL
        THEN
            satuan_upah.SATUAN_UPAH_NAMA
    else
        '-'
end
as SATUAN_PEKERJAAN,
opname.OPNAME_KODE,
dop.VOLUME_OPNAME,
dop.HARGA_OPNAME,
opname.KATEGORI_PAJAK_ID,
opname.PAJAK_VALUE,
lpu.LPU_KODE

from detail_lpu dlpu 
inner join lpu
on lpu.LPU_ID=dlpu.LPU_ID
inner join opname 
on opname.OPNAME_ID=dlpu.OPNAME_ID 
inner join detail_transaksi_opname dop 
on dop.OPNAME_ID=opname.OPNAME_ID and (dop.ANALISA_ID=dlpu.ANALISA_ID or dop.UPAH_ID=dlpu.UPAH_ID OR dop.PAKET_OVERHEAD_UPAH_ID=dlpu.PAKET_OVERHEAD_UPAH_ID or dop.SUBCON_ID=dlpu.SUBCON_ID)
left join analisa_rab arab
on arab.ANALISA_ID=dlpu.ANALISA_ID
left join master_upah
on master_upah.UPAH_ID=dlpu.UPAH_ID
left join paket_overhead_upah pou
on pou.PAKET_OVERHEAD_UPAH_ID=dlpu.PAKET_OVERHEAD_UPAH_ID
left join satuan_upah
on satuan_upah.SATUAN_UPAH_ID=master_upah.SATUAN_UPAH_ID or satuan_upah.SATUAN_UPAH_ID=pou.SATUAN_UPAH_ID
left join subcon
on subcon.SUBCON_ID=dlpu.SUBCON_ID
left join subcon_tipe
on subcon_tipe.SUBCON_TIPE_ID=subcon.SUBCON_TIPE_ID
where dlpu.LPU_ID='$id_lpu'
order by dlpu.OPNAME_ID, dlpu.PK_ID
";
        $query = $this->db->query($sql)->result_array();
        if (count($query) > 0)
            return $query;
        return null;
    }

}
