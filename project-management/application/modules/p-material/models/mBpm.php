<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

class mBpm extends MY_Model {

    // constants, column definition
    const ID = 'BPM_ID';
    const TABLE = 'bpm';

    public function __construct() {
        parent::__construct();
        $this->tableName = 'bpm';
        $this->idField = mBpm::ID;
    }

    function getLastKode() {
        $hasil = $this->db->query('SELECT MAX(`BPM_KODE`) AS max_kode FROM (`bpm`)')->result_array();
        if (count($hasil) > 0) {
            return $hasil[0]['max_kode'];
        }
        return 'BPM000';
    }

    function tambahDetailBPM($idBPM, $idBarang, $volumeKeluar) {
        $this->db->insert('detail_bpm', array('BPM_ID' => $idBPM, 'BARANG_ID' => $idBarang, 'STOK_BPM' => $volumeKeluar));
    }

    function getListBPMDataTable($start, $length, $order = array(), $search = array()) {
        $sql = "select count(BPM_ID) as jumlah from bpm";
        $query = $this->db->query($sql);
        $hasil = $query->result_array();
        $jumlahData = 0;
        if (count($hasil) > 0)
            $jumlahData = $hasil[0]['jumlah'];
        $a_search = array('bpm.BPM_ID', 'bpm.BPM_KODE', 'bpm.BPM_TANGGAL', 'bpm.BPM_KETERANGAN', 'stts.STATUS_LPB_NAMA', 'pro.PROJECT_KODE', 'pro.PROJECT_NAMA', 'gudang.GUDANG_KODE', 'gudang.GUDANG_NAMA');
        $a_order = array('bpm.BPM_ID', 'bpm.BPM_KODE', 'pro.PROJECT_KODE', 'gudang.GUDANG_KODE', 'bpm.BPM_TANGGAL', 'bpm.BPM_KETERANGAN', 'bpm.STATUS_BPM_ID');
        $my_order = '';
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
select 
bpm.BPM_ID,
bpm.BPM_KODE, 
bpm.BPM_TANGGAL, 
bpm.BPM_KETERANGAN,
stts.STATUS_LPB_NAMA AS STATUS_NAMA,
bpm.STATUS_BPM_ID,
pro.PROJECT_KODE, 
pro.PROJECT_NAMA,
gudang.GUDANG_KODE,
gudang.GUDANG_NAMA
from bpm inner join status_lpb stts
on bpm.STATUS_BPM_ID = stts.STATUS_LPB_ID
inner join project pro
on pro.PROJECT_ID=bpm.PROJECT_ID
inner join master_gudang gudang
on gudang.GUDANG_ID=bpm.GUDANG_ID
$my_search
$my_order
limit $start,$length";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        $hasil = array();
        foreach ($result as $row) {
            $baris = array();
            foreach ($row as $cell) {
                $baris[] = $cell;
            }
            $hasil[] = $baris;
        }
        return array('data' => $hasil, 'recordsFiltered' => $jumlahData, 'recordsTotal' => $jumlahData);
    }

    function getBPMById($idBPM) {
        $sql = "select bpm.*, project.*, mpro.*, gdg.*,
            stts.STATUS_LPB_NAMA,
			drafter.PENGGUNA_NAMA AS DRAFTER_NAMA,
			validator.PENGGUNA_NAMA AS VALIDATOR_NAMA
            from bpm inner join project
            on project.PROJECT_ID=bpm.PROJECT_ID
            inner join main_project mpro
            on mpro.MAIN_PROJECT_ID=project.MAIN_PROJECT_ID
            inner join master_gudang gdg
            on gdg.GUDANG_ID=bpm.GUDANG_ID
            inner join status_lpb stts
            on stts.STATUS_LPB_ID=bpm.STATUS_BPM_ID
			inner join pengguna drafter
			on drafter.PENGGUNA_ID=bpm.PETUGAS_GUDANG_ID
			left join pengguna validator
			on validator.PENGGUNA_ID=bpm.VALIDATOR_ID
            where bpm.BPM_ID='$idBPM'";
        //echo $sql;
        $query = $this->db->query($sql);
        $hasil = $query->result_array();
        if (count($hasil) > 0) {
            return $hasil[0];
        }
        return null;
    }

    function getDetailBPM($idBPM) {
        $sql = "select dbpm.*, brg.*
                from detail_bpm dbpm
                inner join master_barang brg
                on brg.BARANG_ID=dbpm.BARANG_ID
                where dbpm.BPM_ID='$idBPM'";
        $query = $this->db->query($sql);
        $hasil = $query->result_array();
        return $hasil;
    }

    function getListGudang() {

        $sql = "select master_gudang.* from 
                master_gudang
                where master_gudang.GUDANG_ACTIVE=1
				order by master_gudang.GUDANG_ID DESC
            ";
        $query = $this->db->query($sql)->result_array();
        return $query;
    }

    function get_list_main_project($id_gudang = 0) {
        $sql = "select mpro.* from main_project mpro where mpro.MAIN_PROJECT_ACTIVE=1 order by mpro.MAIN_PROJECT_ID DESC";
        return $this->db->query($sql)->result_array();
    }

    function getListSubProject($id_main_project = 0, $id_gudang = 0) {
        $sql = "select pro.*
                from project pro
                where pro.PROJECT_ACTIVE=1 and pro.PROJECT_STATUS=3 and pro.MAIN_PROJECT_ID='$id_main_project'
				order by pro.PROJECT_ID DESC";
        return $this->db->query($sql)->result_array();
    }

    function getListRAB($id_project = 0, $id_gudang = 0) {
        $sql = "select rab.*
                from rab_transaction rab
                where rab.PROJECT_ID='$id_project'
                and rab.RAB_ACTIVE=1
                and rab.RAB_STATUS_APPROVAL_ID=3
				order by rab.RAB_ID DESC";
        return $this->db->query($sql)->result_array();
    }

    function getStokDataTable($idRAB = 0, $id_gudang = 0, $id_bpm = 0, $start = 0, $length = 0, $search = array(), $order = array()) {
        $sql = "select count(*) as jumlah from stok where RAB_ID='$idRAB' and GUDANG_ID='$id_gudang'";
        $query = $this->db->query($sql);
        $hasil = $query->result_array();
        $jumlahData = $hasil[0]['jumlah'];
        $where_bpm = '';
        if ($id_bpm > 0) {
            $where_bpm = ' and dbpm.BPM_ID!=\'' . $id_bpm . '\'';
        }
        $a_order = $a_search = array('my_stok.KODE_MATERIAL', 'my_stok.NAMA_MATERIAL', '(my_stok.VOLUME - my_stok.VOLUME_BPM_DRAFT)', 'my_stok.SATUAN_MATERIAL');
        $my_search = '';
        if (strlen($search['value']) > 0) {
            $sep = '';
            foreach ($a_search as $s) {
                $my_search.=$sep . $s . " like '%" . $search['value'] . "%'";
                $sep = ' or ';
            }
            $my_search = ' where (' . $my_search . ')';
        }
        $my_order = '';
        if ($order[0]['column'] >= 0 && $order[0]['column'] < count($a_order)) {
            $my_order = 'order by '.$a_order[$order[0]['column']].' '.$order[0]['dir'];
        }
//        foreach ($order as $ord) {
//            switch ($ord['column']) {
//                case 0:
//                    $my_order.=' my_stok.KODE_MATERIAL ' . $ord['dir'];
//                    break;
//                case 1:
//                    $my_order.=' my_stok.NAMA_MATERIAL ' . $ord['dir'];
//                    break;
//                case 2:
//                    $my_order.=' (my_stok.VOLUME - my_stok.VOLUME_BPM_DRAFT) ' . $ord['dir'];
//                    break;
//                case 3:
//                    $my_order.=' my_stok.SATUAN_MATERIAL ' . $ord['dir'];
//                    break;
//            }
//        }
//        if (strlen($my_order) > 0) {
//            $my_order = 'order by ' . $my_order;
//        }
        $sql = "
select my_stok.* 
from (
    select stok.RAB_ID,
    stok.GUDANG_ID,
    stok.BARANG_ID,
    stok.SUBCON_ID,
    stok.PAKET_OVERHEAD_MATERIAL_ID,
    stok.VOLUME,
    case 
        when stok.BARANG_ID IS NOT NULL
            then
                brg.BARANG_KODE
        when stok.SUBCON_ID IS NOT NULL
            then
                subcon_tipe.SUBCON_TIPE_KODE
        when stok.PAKET_OVERHEAD_MATERIAL_ID IS NOT NULL
            then
                'LSMOV'
        else
            '-'
    end as KODE_MATERIAL,
    case 
        when stok.BARANG_ID IS NOT NULL
            then
                brg.BARANG_NAMA
        when stok.SUBCON_ID IS NOT NULL
            then
                subcon.SUBCON_NAMA
        when stok.PAKET_OVERHEAD_MATERIAL_ID IS NOT NULL
            then
                pom.PAKET_OVERHEAD_MATERIAL_NAMA
        else
            '-'
    end as NAMA_MATERIAL,
    case 
        when stok.BARANG_ID IS NOT NULL
            then
                brg.SATUAN_NAMA
        when stok.SUBCON_ID IS NOT NULL
            then
                subcon.SATUAN_NAMA
        when stok.PAKET_OVERHEAD_MATERIAL_ID IS NOT NULL
            then
                pom.SATUAN_NAMA
        else
            '-'
    end as SATUAN_MATERIAL,
    case 
        when stok.BARANG_ID IS NOT NULL
            then
            (
                select coalesce(sum(dbpm1.VOLUME),0)
                from detail_bpm dbpm1
                inner join bpm bpm1
                on bpm1.BPM_ID=dbpm1.BPM_ID
                where stok.RAB_ID=dbpm1.RAB_ID
                and bpm1.GUDANG_ID=stok.GUDANG_ID
                and stok.BARANG_ID=dbpm1.BARANG_ID
                and bpm1.STATUS_BPM_ID!=3
            )
        when stok.SUBCON_ID IS NOT NULL
            then
            (
                select coalesce(sum(dbpm2.VOLUME),0)
                from detail_bpm dbpm2
                inner join bpm bpm2
                on bpm2.BPM_ID=dbpm2.BPM_ID
                where stok.RAB_ID=dbpm2.RAB_ID
                and bpm2.GUDANG_ID=stok.GUDANG_ID
                and stok.SUBCON_ID=dbpm2.SUBCON_ID
                and bpm2.STATUS_BPM_ID!=3
            )
        WHEN stok.PAKET_OVERHEAD_MATERIAL_ID IS NOT NULL
            then
            (
                select coalesce(sum(dbpm3.VOLUME),0)
                from detail_bpm dbpm3
                inner join bpm bpm3
                on bpm3.BPM_ID=dbpm3.BPM_ID
                where stok.RAB_ID=dbpm3.RAB_ID
                and bpm3.GUDANG_ID=stok.GUDANG_ID
                and stok.PAKET_OVERHEAD_MATERIAL_ID=dbpm3.PAKET_OVERHEAD_MATERIAL_ID
                and bpm3.STATUS_BPM_ID!=3
            )
        else 
            0
    end as VOLUME_BPM_DRAFT

    from stok
    left join master_barang brg
    on brg.BARANG_ID=stok.BARANG_ID
    left join subcon
    on subcon.SUBCON_ID=stok.SUBCON_ID
    left join subcon_tipe
    on subcon_tipe.SUBCON_TIPE_ID=subcon.SUBCON_TIPE_ID
    left join paket_overhead_material pom
    on pom.PAKET_OVERHEAD_MATERIAL_ID=stok.PAKET_OVERHEAD_MATERIAL_ID
    where stok.RAB_ID='$idRAB' and stok.GUDANG_ID='$id_gudang'
) as my_stok
$my_search
$my_order
limit $start,$length
			";
        $query = $this->db->query($sql);
        $hasil = $query->result_array();
        $hasil2 = array();
        foreach ($hasil as $row) {
            $baris = array();
            foreach ($row as $val) {
                $baris[] = $val;
            }
            $hasil2[] = $baris;
        }
        return array(
            'data' => $hasil2,
            'recordsFiltered' => $jumlahData,
            'recordsTotal' => $jumlahData,
            'sql' => $sql
        );
    }

}
