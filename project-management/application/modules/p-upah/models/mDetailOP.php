<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

class mDetailOP extends MY_Model {

    // constants, column definition


    public function __construct() {
        parent::__construct();
        $this->tableName = 'detail_transaksi_opname';
    }

    function getDetailOpname($idOpname) {
        $sql = "
select dop.*, arab.*, pou.*, satuan_upah.*, darab.*, dpk.VOLUME_PK,master_upah.*, op.KATEGORI_OP_ID,
(
	select coalesce(sum(dop3.VOLUME_OPNAME),0)
	from detail_transaksi_opname dop3
	where dop3.OPNAME_ID!=dop.OPNAME_ID
	and dop3.PERMINTAAN_PEKERJAAN_ID=dpk.PERMINTAAN_PEKERJAAN_ID
	and dop3.OV_ID = dpk.ANALISA_ID
	and dop3.ANALISA_ID is null
) as VOLUME_OV_TERPAKAI,
(
	select coalesce(sum(dop2.VOLUME_OPNAME),0)
	from detail_transaksi_opname dop2
	where dop2.OPNAME_ID!=dop.OPNAME_ID
	and dop2.PERMINTAAN_PEKERJAAN_ID=dpk.PERMINTAAN_PEKERJAAN_ID
	and dop2.ANALISA_ID=dpk.ANALISA_ID
	and dop2.OV_ID is null
	
) as VOLUME_ANALISA_TERPAKAI
from detail_transaksi_opname dop
inner join opname op
on op.OPNAME_ID=dop.OPNAME_ID
inner join detail_transaksi_pk dpk
on dpk.PERMINTAAN_PEKERJAAN_ID=dop.PERMINTAAN_PEKERJAAN_ID 
and ((dpk.ANALISA_ID=dop.ANALISA_ID and dop.OV_ID is null) or (dpk.ANALISA_ID=dop.OV_ID and dop.ANALISA_ID is null))
left join analisa_rab arab
on arab.ANALISA_ID=dop.ANALISA_ID
left join master_upah 
on master_upah.UPAH_ID=dop.OV_ID
left join paket_overhead_upah pou
on pou.PAKET_OVERHEAD_UPAH_ID=dop.OV_ID
left join satuan_upah
on satuan_upah.SATUAN_UPAH_ID=pou.SATUAN_UPAH_ID or satuan_upah.SATUAN_UPAH_ID=master_upah.SATUAN_UPAH_ID
left join (
	select darab.ANALISA_ID, sum(darab.DETAIL_ANALISA_TOTAL) as HARGA_ANALISA 
	from detail_analisa_rab darab 
	where darab.UPAH_ID is not null 
	group by darab.ANALISA_ID
) as darab
on darab.ANALISA_ID=arab.ANALISA_ID
where dop.OPNAME_ID='$idOpname'
		";
        $sql="
select dop.*,op.KATEGORI_OP_ID, op.PAJAK_VALUE, dpk.VOLUME_PK,op.KATEGORI_PAJAK_ID,
case 
	when dop.ANALISA_ID is not null
		then
		(	
			select coalesce(sum(dop1.VOLUME_OPNAME),0)
			from detail_transaksi_opname dop1
			where dop1.PERMINTAAN_PEKERJAAN_ID=dop.PERMINTAAN_PEKERJAAN_ID
			and dop1.OPNAME_ID!=dop.OPNAME_ID
			and dop1.ANALISA_ID=dop.ANALISA_ID
			and dop1.ANALISA_ID is not null
			and dop1.SUBCON_ID is null
			and dop1.UPAH_ID is null
			and dop1.PAKET_OVERHEAD_UPAH_ID is null
		)
	when dop.SUBCON_ID is not null
		then
		(
			select coalesce(sum(dop1.VOLUME_OPNAME),0)
			from detail_transaksi_opname dop1
			where dop1.PERMINTAAN_PEKERJAAN_ID=dop.PERMINTAAN_PEKERJAAN_ID
			and dop1.OPNAME_ID!=dop.OPNAME_ID
			and dop1.SUBCON_ID=dop.SUBCON_ID
			and dop1.SUBCON_ID is not null
			and dop1.ANALISA_ID is null
			and dop1.UPAH_ID is null
			and dop1.PAKET_OVERHEAD_UPAH_ID is null
		)
	when dop.UPAH_ID is not null
		then
		(
			select coalesce(sum(dop1.VOLUME_OPNAME),0)
			from detail_transaksi_opname dop1
			where dop1.PERMINTAAN_PEKERJAAN_ID=dop.PERMINTAAN_PEKERJAAN_ID
			and dop1.OPNAME_ID!=dop.OPNAME_ID
			and dop1.UPAH_ID=dop.UPAH_ID
			and dop1.UPAH_ID is not null
			and dop1.ANALISA_ID is null
			and dop1.SUBCON_ID is null
			and dop1.PAKET_OVERHEAD_UPAH_ID is null
		)
	when dop.PAKET_OVERHEAD_UPAH_ID is not null
		then
		(
			select coalesce(sum(dop1.VOLUME_OPNAME),0)
			from detail_transaksi_opname dop1
			where dop1.PERMINTAAN_PEKERJAAN_ID=dop.PERMINTAAN_PEKERJAAN_ID
			and dop1.OPNAME_ID!=dop.OPNAME_ID
			and dop1.PAKET_OVERHEAD_UPAH_ID=dop.PAKET_OVERHEAD_UPAH_ID
			and dop1.PAKET_OVERHEAD_UPAH_ID is not null
			and dop1.ANALISA_ID is null
			and dop1.SUBCON_ID is null
			and dop1.UPAH_ID is null
		)
		else 
			0
	end
as VOLUME_TERPAKAI,
coalesce(arab.ANALISA_KODE,subcon_tipe.SUBCON_TIPE_KODE,master_upah.UPAH_KODE,'LSUOV') as KODE_PEKERJAAN,
coalesce(arab.ANALISA_NAMA,subcon.SUBCON_NAMA,master_upah.UPAH_NAMA,pou.PAKET_OVERHEAD_UPAH_NAMA) as NAMA_PEKERJAAN,
coalesce(arab.SATUAN_NAMA,subcon.SATUAN_NAMA,satuan_upah.SATUAN_UPAH_NAMA) as SATUAN_PEKERJAAN,
coalesce(darab.HARGA_ANALISA,subcon.SUBCON_HARGA,master_upah.UPAH_HARGA,pou.PAKET_OVERHEAD_UPAH_HARGA) AS HARGA_PEKERJAAN
from detail_transaksi_opname dop
inner join opname op
on op.OPNAME_ID=dop.OPNAME_ID
inner join detail_transaksi_pk dpk
on dpk.PERMINTAAN_PEKERJAAN_ID=dop.PERMINTAAN_PEKERJAAN_ID 
and (
        dpk.ANALISA_ID=dop.ANALISA_ID
        or dpk.SUBCON_ID=dop.SUBCON_ID
        or dpk.UPAH_ID=dop.UPAH_ID
        or dpk.PAKET_OVERHEAD_UPAH_ID=dop.PAKET_OVERHEAD_UPAH_ID
    )
left join analisa_rab arab
on arab.ANALISA_ID=dop.ANALISA_ID
left join subcon
on subcon.SUBCON_ID=dop.SUBCON_ID
left join subcon_tipe 
on subcon_tipe.SUBCON_TIPE_ID=subcon.SUBCON_TIPE_ID
left join master_upah 
on master_upah.UPAH_ID=dop.UPAH_ID
left join paket_overhead_upah pou
on pou.PAKET_OVERHEAD_UPAH_ID=dop.PAKET_OVERHEAD_UPAH_ID
left join satuan_upah
on satuan_upah.SATUAN_UPAH_ID=pou.SATUAN_UPAH_ID 
or satuan_upah.SATUAN_UPAH_ID=master_upah.SATUAN_UPAH_ID
left join (
	select darab.ANALISA_ID, sum(darab.DETAIL_ANALISA_TOTAL) as HARGA_ANALISA 
	from detail_analisa_rab darab 
	where darab.UPAH_ID is not null 
	group by darab.ANALISA_ID
) as darab
on darab.ANALISA_ID=arab.ANALISA_ID
where dop.OPNAME_ID='$idOpname'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

}
