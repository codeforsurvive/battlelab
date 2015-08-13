<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

class mPenerimaanBarang extends MY_Model {

    // constants, column definition
    const ID = 'PENERIMAAN_BARANG_ID';
    const NO_KENDARAAN = 'LPB_KENDARAAN';

    public function __construct() {
        parent::__construct();
        $this->tableName = 'penerimaan_barang';
        $this->idField = mPenerimaanBarang::ID;
    }

    function getListLPBDataTable($start = 0, $length = 0, $order = array(), $search = array()) {

        $sql = "select count(PENERIMAAN_BARANG_ID) as jumlah from penerimaan_barang";
        $query = $this->db->query($sql);
        $hasil = $query->result_array();
        $jumlahData = (int) $hasil[0]['jumlah'];
        $where = "";
//        
//        if (strlen($search) > 0) {
//            $where = "where PENERIMAAN_BARANG_KODE like '%$search%' or LPB_SURAT_JALAN like '%$search%' or LPB_KENDARAAN like '%$search%'";
//        }
        $a_order = $a_search = array('penerimaan_barang.PENERIMAAN_BARANG_ID','penerimaan_barang.PENERIMAAN_BARANG_KODE', 'penerimaan_barang.LPB_SURAT_JALAN', 'penerimaan_barang.LPB_KENDARAAN', "concat(gudang.GUDANG_KODE,' ',gudang.GUDANG_NAMA)", "concat(spy.SUPPLIER_KODE,' ',spy.SUPPLIER_NAMA)",'penerimaan_barang.STATUS_LPB_ID');
        $my_order = 'order by penerimaan_barang.PENERIMAAN_BARANG_ID desc ';
        if ($order[0]['column'] >= 0 && $order[0]['column'] < count($a_order)) {
            $my_order = ' order by ' . $a_order[$order[0]['column']] . ' ' . $order[0]['dir'];
        }
        $my_search = '';
        if (strlen($search['value']) > 0) {
            $my_search = 'where ';
            $sep = '';
            foreach ($a_search as $s) {
                $my_search .= $sep . $s . " like '%" . $search['value'] . "%' ";
                $sep = ' or ';
            }
        }
        $sql = "
SELECT        
penerimaan_barang.PENERIMAAN_BARANG_ID, 
penerimaan_barang.PENERIMAAN_BARANG_KODE, 
penerimaan_barang.LPB_SURAT_JALAN, 
penerimaan_barang.LPB_KENDARAAN, 
status_lpb.STATUS_LPB_NAMA,
penerimaan_barang.STATUS_LPB_ID,
gudang.GUDANG_KODE,
gudang.GUDANG_NAMA,
gudang.GUDANG_LOKASI,
spy.SUPPLIER_KODE,
spy.SUPPLIER_NAMA
FROM            penerimaan_barang INNER JOIN
status_lpb ON penerimaan_barang.STATUS_LPB_ID = status_lpb.STATUS_LPB_ID
inner join master_gudang gudang
on gudang.GUDANG_ID=penerimaan_barang.GUDANG_ID
inner join master_supplier spy
on spy.SUPPLIER_ID=penerimaan_barang.SUPPLIER_ID
$my_search
$my_order
limit $start,$length
                ";
        $query = $this->db->query($sql);

        $hasil = $query->result_array();
        $hasil2 = array();
        foreach ($hasil as $row) {
            $baris = array();
            foreach ($row as $cell) {
                $baris[] = $cell;
            }
            $hasil2[] = $baris;
        }
        return array(
            'data' => $hasil2,
            'recordsFiltered' => $jumlahData,
            'recordsTotal' => $jumlahData
            , 'sql' => $sql
        );
    }

    function getLastKode() {
        $hasil = $this->db->query('SELECT MAX(`PENERIMAAN_BARANG_KODE`) AS PENERIMAAN_BARANG_KODE FROM (`penerimaan_barang`)')->result_array();
        if (count($hasil) > 0) {
            return $hasil[0]['PENERIMAAN_BARANG_KODE'];
        }
        return Lpb::LPB_PREFIX . '000';
    }

    function getDetailLPB($id_lpb) {
        $sql = "SELECT        
                dpo.VOLUME_PO - (
									select ifnull(sum(dlpb2.VOLUME_LPB),0)
									from detail_lpb dlpb2
									where dlpb2.PENERIMAAN_BARANG_ID!=dlpb.PENERIMAAN_BARANG_ID and
									dlpb2.BARANG_ID=dlpb.BARANG_ID and dlpb2.PO_ID=dlpb.PO_ID
								) as volume_sisa,
								dlpb.PENERIMAAN_BARANG_ID,
								po.PURCHASE_ORDER_ID,
								brg.BARANG_ID,
								dlpb.VOLUME_LPB, 
								po.PURCHASE_ORDER_KODE AS KODE_PO, 
                brg.BARANG_NAMA, 
                brg.BARANG_KODE, 
                brg.SATUAN_NAMA,
                pp.PERMINTAAN_PEMBELIAN_KODE
                
                FROM            
                detail_lpb dlpb INNER JOIN
                master_barang brg ON brg.BARANG_ID = dlpb.BARANG_ID INNER JOIN
                kategori_barang kbrg ON kbrg.KATEGORI_BARANG_ID = brg.KATEGORI_BARANG_ID INNER JOIN
                purchase_order po ON po.PURCHASE_ORDER_ID = dlpb.PO_ID INNER JOIN
                detail_po dpo ON dpo.PURCHASE_ORDER_ID = po.PURCHASE_ORDER_ID AND dlpb.BARANG_ID = dpo.BARANG_ID INNER JOIN
                permintaan_pembelian pp ON dpo.PERMINTAAN_PEMBELIAN_ID = pp.PERMINTAAN_PEMBELIAN_ID
                WHERE        (dlpb.PENERIMAAN_BARANG_ID = '$id_lpb')
                ORDER BY dlpb.PO_ID, dlpb.BARANG_ID";
        $sql = "select dlpb.*, po.*, pp.*, barang.*, subcon.*, dov.*, 
				subcon_tipe.SUBCON_TIPE_KODE
                from detail_lpb dlpb
                inner join purchase_order po
                on po.PURCHASE_ORDER_ID=dlpb.PO_ID
                inner join detail_po dpo 
                on dpo.PURCHASE_ORDER_ID=po.PURCHASE_ORDER_ID
                inner join permintaan_pembelian pp
                on pp.PERMINTAAN_PEMBELIAN_ID=dpo.PERMINTAAN_PEMBELIAN_ID
                left join master_barang barang
                on barang.BARANG_ID=dlpb.BARANG_ID or dlpb.BARANG_OVERHEAD_ID=barang.BARANG_ID
                left join subcon
                on subcon.SUBCON_ID=dlpb.SUBCON_ID
				left join subcon_tipe
				on subcon_tipe.SUBCON_TIPE_ID=subcon.SUBCON_TIPE_ID
                left join detail_overhead dov
                on dov.PAKET_OVERHEAD_MATERIAL_ID=dlpb.PAKET_OVERHEAD_MATERIAL_ID
                where dlpb.PENERIMAAN_BARANG_ID='$id_lpb'
                group by dlpb.PENERIMAAN_BARANG_ID,
                dlpb.BARANG_ID,
                dlpb.SUBCON_ID,
                dlpb.BARANG_OVERHEAD_ID,
                dlpb.PAKET_OVERHEAD_MATERIAL_ID";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function getDetailLpbPo($id_lpb = 0, $id_po = 0, $start = 0, $length = 10) {
        $this->db->where(array(mDetailLPB::LPB_ID => $id_lpb, mDetailLPB::PO_ID => $id_po));
        $this->db->from(mDetailLPB::TABLE);
        $jumlahData = $this->db->count_all_results();
        $sql = "select po.PURCHASE_ORDER_KODE as KODE_PO, brg.BARANG_NAMA,
                brg.BARANG_KODE, kbrg.KATEGORI_BARANG_NAMA, dlpb.VOLUME_LPB,
                brg.SATUAN_NAMA
                from 
                detail_lpb dlpb inner join purchase_order po
                on dlpb.PO_ID=po.PURCHASE_ORDER_ID
                inner join master_barang brg
                on brg.BARANG_ID=dlpb.BARANG_ID
                inner join kategori_barang kbrg
                on brg.KATEGORI_BARANG_ID=kbrg.KATEGORI_BARANG_ID
                where PENERIMAAN_BARANG_ID='$id_lpb' and po_id='$id_po'
                limit $start,$length
                ";
        $query = $this->db->query($sql);
        $hasil = array();
        foreach ($query->result_array() as $row) {
            $baris = array();
            foreach ($row as $key => $val) {
                $baris[] = $val;
            }
            $hasil[] = $baris;
        }
        return array('recordsFiltered' => $jumlahData, 'recordsTotal' => $jumlahData,
            'data' => $hasil);
    }

    function getDeskripsiPenerimaanBarang($id_lpb) {

        $sql = "select lpb.*
                ,sply.SUPPLIER_NAMA, sply.SUPPLIER_ALAMAT, sply.SUPPLIER_KODE
                ,gdg.GUDANG_KODE, gdg.GUDANG_NAMA, gdg.GUDANG_LOKASI,stts.STATUS_LPB_NAMA,
                validator.PENGGUNA_NAMA AS VALIDATOR_NAMA, 
                drafter.PENGGUNA_NAMA as DRAFTER_NAMA
                from penerimaan_barang lpb
                inner join master_supplier sply
                on sply.SUPPLIER_ID=lpb.SUPPLIER_ID
                inner join status_lpb stts
                on stts.STATUS_LPB_ID=lpb.STATUS_LPB_ID
                inner join pengguna drafter
                on drafter.PENGGUNA_ID=lpb.PETUGAS_ID
                left join pengguna validator
                on validator.PENGGUNA_ID=lpb.VALIDATOR_ID
                inner join master_gudang gdg
                on gdg.GUDANG_ID=lpb.GUDANG_ID 
				where lpb.PENERIMAAN_BARANG_ID=' $id_lpb'";
        $query = $this->db->query($sql);
        $hasil = $query->result_array();
        if (count($hasil) > 0) {
            return $hasil[0];
        }
        return null;
    }

    function get_list_main_project() {
        $sql = "select mpro.* from main_project mpro where mpro.MAIN_PROJECT_ACTIVE=1 order by mpro.MAIN_PROJECT_ID DESC";
        return $this->db->query($sql)->result_array();
    }

    function getListSubProject($id_main_project = 0) {
        $sql = "select pro.*
                from project pro
                where pro.PROJECT_ACTIVE=1 and pro.PROJECT_STATUS=3 and pro.MAIN_PROJECT_ID='$id_main_project' order by pro.PROJECT_ID DESC";
        return $this->db->query($sql)->result_array();
    }

    function getListRAB($id_project = 0) {
        $sql = "select rab.*
                from rab_transaction rab
                where rab.PROJECT_ID='$id_project'
                and rab.RAB_ACTIVE=1
                and rab.RAB_STATUS_APPROVAL_ID=3
				order by rab.RAB_ID DESC";
        return $this->db->query($sql)->result_array();
    }

    function getListPO($id_rab = 0, $id_gudang = 0, $id_supplier = 0) {
        return $this->db->order_by('PURCHASE_ORDER_ID', 'DESC')->get_where('purchase_order', array('RAB_ID' => $id_rab, 'GUDANG_ID' => $id_gudang, 'STATUS_PO_ID' => 3, 'SUPPLIER_ID' => $id_supplier))->result_array();
    }

    function get_list_supplier($id_gudang = 0) {
        $sql = "select sply.* 
                from master_supplier sply
                WHERE sply.SUPPLIER_ACTIVE=1
				order by sply.SUPPLIER_ID DESC
				";
        return $this->db->query($sql)->result_array();
    }

    function get_list_gudang() {
        $sql = "select gdg.*
                from master_gudang gdg
                where gdg.GUDANG_ACTIVE=1
				order by gdg.GUDANG_ID DESC
                ";


        return $this->db->query($sql)->result_array();
    }

    function getDetailPODataTable($po_id = 0, $start = 0, $length = 0, $id_lpb = 0, $order = array(), $search = array()) {
        $sql = "select count(*) AS jumlah from detail_po where PURCHASE_ORDER_ID='$po_id'";
        $query = $this->db->query($sql);
        $hasil = $query->result_array();
        $hasil = $hasil[0];
        $jumlahData = (int) $hasil['jumlah'];
        $where1 = '';
        $where = '.PENERIMAAN_BARANG_ID!=\'' . $id_lpb . '\'';
        if ($id_lpb > 0) {
            $where1 = 'and dlpb1' . $where;
        }
        $a_order = $a_search = array('detailpo.KODE_MATERIAL', 'detailpo.NAMA_MATERIAL', 'detailpo.KATEGORI_MATERIAL', 'detailpo.VOLUME_PO', '(detailpo.VOLUME_PO-detailpo.VOLUME_PO_IN_LPB)', 'detailpo.SATUAN_MATERIAL');
        $my_search = '';
        $my_order = 'order by detailpo.KODE_MATERIAL ASC';
        if ($order[0]['column'] >= 0 && $order[0]['column'] < count($a_order)) {
            $my_order = 'order by ' . $a_order[$order[0]['column']] . ' ' . $order[0]['dir'];
        }
        if (strlen($search['value']) > 0) {
            $my_search = 'where ';
            $sep = '';
            foreach ($a_search as $s) {
                $my_search .= $sep . $s . " like '%" . $search['value'] . "%' ";
                $sep = ' or ';
            }
        }
        $sql = "
select detailpo.*
from (
    select 
    po.KATEGORI_PP_ID,
    COALESCE(dpo.BARANG_ID,0) as BARANG_ID, 
    COALESCE(dpo.SUBCON_ID,0) as SUBCON_ID, 
    dpo.VOLUME_PO,
    case 
        when po.KATEGORI_PP_ID=1
            then
            (
                case
                    when dpo.BARANG_ID IS NOT NULL
                        then
                        (
                            brg.BARANG_KODE
                        )
                    when dpo.SUBCON_ID IS NOT NULL
                        then
                        (
                            'LSMOV'
                        )
                    else
                        '-'
                end
            )
        when po.KATEGORI_PP_ID=2
            then
            (
                case
                    when dpo.BARANG_ID IS NOT NULL
                        then
                        (
                            brg.BARANG_KODE
                        )
                    when dpo.SUBCON_ID IS NOT NULL
                        then
                        (
                            subcon_tipe.SUBCON_TIPE_KODE
                        )
                    else
                        '-'
                end
            )
        else 
            '-'
    end as KODE_MATERIAL,
    case 
        when po.KATEGORI_PP_ID=1
            then
            (
                case
                    when dpo.BARANG_ID IS NOT NULL
                        then
                        (
                            brg.BARANG_NAMA
                        )
                    when dpo.SUBCON_ID IS NOT NULL
                        then
                        (
                            pom.PAKET_OVERHEAD_MATERIAL_NAMA
                        )
                    else
                        '-'
                end
            )
        when po.KATEGORI_PP_ID=2
            then
            (
                case
                    when dpo.BARANG_ID IS NOT NULL
                        then
                        (
                            brg.BARANG_NAMA
                        )
                    when dpo.SUBCON_ID IS NOT NULL
                        then
                        (
                            subcon.SUBCON_NAMA
                        )
                    else
                        '-'
                end
            )
        else 
            '-'
    end as NAMA_MATERIAL,
    case 
        when po.KATEGORI_PP_ID=1
            then
            (
                case
                    when dpo.BARANG_ID IS NOT NULL
                        then
                        (
                            brg.SATUAN_NAMA
                        )
                    when dpo.SUBCON_ID IS NOT NULL
                        then
                        (
                            pom.SATUAN_NAMA
                        )
                    else
                        '-'
                end
            )
        when po.KATEGORI_PP_ID=2
            then
            (
                case
                    when dpo.BARANG_ID IS NOT NULL
                        then
                        (
                            brg.SATUAN_NAMA
                        )
                    when dpo.SUBCON_ID IS NOT NULL
                        then
                        (
                            subcon.SATUAN_NAMA
                        )
                    else
                        '-'
                end
            )
        else 
            '-'
    end as SATUAN_MATERIAL,
    case 
        when po.KATEGORI_PP_ID=1
            then
            (
                case
                    when dpo.BARANG_ID IS NOT NULL
                        then
                        (
                            select coalesce(sum(dlpb1.VOLUME_LPB),0)
                            from detail_lpb dlpb1
                            where dlpb1.PO_ID=dpo.PURCHASE_ORDER_ID 
                            and dlpb1.BARANG_OVERHEAD_ID=dpo.BARANG_ID
                            and dlpb1.PAKET_OVERHEAD_MATERIAL_ID IS NULL
                            $where1
                        )
                    when dpo.SUBCON_ID IS NOT NULL
                        then
                        (
                            select coalesce(sum(dlpb1.VOLUME_LPB),0)
                            from detail_lpb dlpb1
                            where dlpb1.PO_ID=dpo.PURCHASE_ORDER_ID 
                            and dlpb1.PAKET_OVERHEAD_MATERIAL_ID=dpo.SUBCON_ID
                            and dlpb1.BARANG_OVERHEAD_ID IS NULL
                            $where1
                        )
                    else
                        0
                end
            )
        when po.KATEGORI_PP_ID=2
            then
            (
                case
                    when dpo.BARANG_ID IS NOT NULL
                        then
                        (
                            select coalesce(sum(dlpb1.VOLUME_LPB),0)
                            from detail_lpb dlpb1
                            where dlpb1.PO_ID=dpo.PURCHASE_ORDER_ID 
                            and dlpb1.BARANG_ID=dpo.BARANG_ID
                            and dpo.SUBCON_ID IS NULL
                            $where1
                        )
                    when dpo.SUBCON_ID IS NOT NULL
                        then
                        (
                            select coalesce(sum(dlpb1.VOLUME_LPB),0)
                            from detail_lpb dlpb1
                            where dlpb1.PO_ID=dpo.PURCHASE_ORDER_ID 
                            and dlpb1.SUBCON_ID=dpo.SUBCON_ID
                            and dpo.BARANG_ID IS NULL
                            $where1
                        )
                    else
                        0
                end
            )
        else 
            0
    end as VOLUME_PO_IN_LPB,
    case 
        when po.KATEGORI_PP_ID=1
            then
            (
                case
                    when dpo.BARANG_ID IS NOT NULL
                        then
                        (
                            kategori_barang.KATEGORI_BARANG_NAMA
                        )
                    when dpo.SUBCON_ID IS NOT NULL
                        then
                        (
                            pom.PAKET_OVERHEAD_MATERIAL_KETERANGAN
                        )
                    else
                        '-'
                end
            )
        when po.KATEGORI_PP_ID=2
            then
            (
                case
                    when dpo.BARANG_ID IS NOT NULL
                        then
                        (
                            kategori_barang.KATEGORI_BARANG_NAMA
                        )
                    when dpo.SUBCON_ID IS NOT NULL
                        then
                        (
                            subcon.SUBCON_KETERANGAN
                        )
                    else
                        '-'
                end
            )
        else 
            '-'
    end as KATEGORI_MATERIAL

    FROM detail_po dpo 
    inner join purchase_order po
    on po.PURCHASE_ORDER_ID=dpo.PURCHASE_ORDER_ID
    left join master_barang brg
    on brg.BARANG_ID=dpo.BARANG_ID
    left join kategori_barang
    on kategori_barang.KATEGORI_BARANG_ID=brg.KATEGORI_BARANG_ID
    left join subcon
    on subcon.SUBCON_ID=dpo.SUBCON_ID
    left join subcon_tipe
    on subcon_tipe.SUBCON_TIPE_ID=subcon.SUBCON_TIPE_ID
    left join paket_overhead_material pom
    on pom.PAKET_OVERHEAD_MATERIAL_ID=dpo.SUBCON_ID
    where dpo.PURCHASE_ORDER_ID='$po_id'
) as detailpo
$my_search
$my_order
limit $start,$length";
        $query = $this->db->query($sql);
        $hasil = $query->result_array();
        $hasil2 = array();
        foreach ($hasil as $row) {
            $baris = array();
            foreach ($row as $cell) {
                $baris[] = $cell;
            }
            $hasil2[] = $baris;
        }
        return array('data' => $hasil2, 'recordsFiltered' => $jumlahData,
            'recordsTotal' => $jumlahData
                //, 'sql' => $sql
        );
    }

}
