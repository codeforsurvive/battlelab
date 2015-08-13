<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

class mDetailHm extends MY_Model {

    // constants, column definition


    public function __construct() {
        parent::__construct();
        $this->tableName = 'detail_hm';
        $this->idField = '';
    }

    public function get_detail_hm($id = 0) {
        $sql = "select dhm.*, brg.BARANG_NAMA, brg.BARANG_KODE, brg.SATUAN_NAMA,
                hm.RAB_PEMBERI,
                (
                select ifnull(sum(stok.VOLUME),0)
                    from stok
                    where stok.BARANG_ID=dhm.BARANG_ID
                    and stok.GUDANG_ID=hm.GUDANG_PEMBERI
                    and stok.RAB_ID=hm.RAB_PEMBERI
                )
                -
                (
                    select ifnull(sum(dhm2.VOLUME),0)
                    from detail_hm dhm2
                    inner join hutang_barang hm2
                    on hm2.HUTANG_BARANG_ID=dhm2.HM_ID
                    where dhm2.HM_ID!=hm.HUTANG_BARANG_ID
                    and dhm2.BARANG_ID=dhm.BARANG_ID
                    AND hm2.STATUS_ID!='3'
                                )
                as stok_sisa
                from detail_hm dhm
                inner join hutang_barang hm
                on hm.HUTANG_BARANG_ID=dhm.HM_ID
                inner join master_barang brg
                on brg.BARANG_ID=dhm.BARANG_ID
                where hm.HUTANG_BARANG_ID='$id'";
        $query = $this->db->query($sql)->result_array();
        //echo $sql;
        return $query;
    }

    function get_detail_hm_for_pm_datatable($id_hm = 0, $id_pm = 0, $start = 0, $length = 10, $order = array(), $search = array()) {
        $sql = "select count(*) as jumlah from detail_hm where HM_ID='$id_hm'";
        $query = $this->db->query($sql)->result_array();
        $jumlahData = $query[0]['jumlah'];
        $where1 = '';
        $where2 = '';
        if ($id_pm > 0) {
            $where1 = " and dkm1.PM_ID!='$id_pm'";
            $where2 = " and dkm2.PM_ID!='$id_pm'";
        }
        $a_search = array();
        $a_order = array();
        $my_order = 'order by dt.BARANG_KODE DESC';
        if ($order[0]['column'] >= 0 && $order[0]['column'] < count($a_order)) {
            $my_order = 'order by ' . $a_order[$order[0]['column']] . ' ' . $order[0]['dir'];
        }
        $my_search = '';
        if (strlen($search['value']) > 0 && count($a_search) > 0) {
            $my_search = 'where ';
            $sep = '';
            foreach ($a_search as $s) {
                $my_search .= $sep . $s . " like ''%" . $search['value'] . "%'";
            }
        }
        $sql = "
select dt.*
from (
    select brg.BARANG_KODE,
    brg.BARANG_NAMA, 
    dhm.VOLUME AS VOLUME_PINJAM,
    (
        select ifnull(sum(stok1.VOLUME),0)
        from stok stok1
        where stok1.RAB_ID=hm.RAB_PENERIMA
        and stok1.BARANG_ID=brg.BARANG_ID
        and stok1.GUDANG_ID=hm.GUDANG_PENERIMA
    ) as volume_stok,
    brg.SATUAN_NAMA,
    hm.RAB_PENERIMA,
    brg.BARANG_ID,
    hm.GUDANG_PENERIMA,
    (
        select ifnull(sum(dkm1.VOLUME),0)
        from detail_pm dkm1
        inner join kembali_barang kb1
        on kb1.KEMBALI_BARANG_ID=dkm1.PM_ID
        where dkm1.BARANG_ID=brg.BARANG_ID
        and kb1.HM_ID=hm.HUTANG_BARANG_ID
        and kb1.STATUS_ID!='3'
        $where1
    ) as volume_telah_kembali_unvalidated,
    (
        select ifnull(sum(dkm2.VOLUME),0)
        from detail_pm dkm2
        inner join kembali_barang kb2
        on kb2.KEMBALI_BARANG_ID=dkm2.PM_ID
        where dkm2.BARANG_ID=brg.BARANG_ID
        and kb2.HM_ID=hm.HUTANG_BARANG_ID
        and kb2.STATUS_ID='3'
        $where2
    ) as volume_telah_kembali_validated
    from detail_hm dhm
    inner join hutang_barang hm
    on hm.HUTANG_BARANG_ID=dhm.HM_ID
    inner join master_barang brg
    on brg.BARANG_ID=dhm.BARANG_ID
    where hm.HUTANG_BARANG_ID='$id_hm'
) as dt
$my_search
$my_order
limit $start,$length                
                ";
        $query = $this->db->query($sql)->result_array();
        $hasil = array();
        foreach ($query as $key => $row) {
            $h = array();
            foreach ($row as $key => $cell) {
                $h[] = $cell;
            }
            $hasil[] = $h;
        }
        return array('data' => $hasil, 'recordsFiltered' => $jumlahData,
            'recordsTotal' => $jumlahData,
            'sql' => $sql
        );
    }

    function get_detail_hm_datatable($id_hm = 0) {
        $sql = "select count(*) as jumlah from detail_hm where HM_ID='$id_hm'";
        $query = $this->db->query($sql)->result_array();
        $jumlahData = $query[0]['jumlah'];
        $sql = "select brg.BARANG_KODE,
            brg.BARANG_NAMA, 
            dhm.VOLUME AS VOLUME_PINJAM,
            stok.VOLUME AS VOLUME_STOK,
            brg.SATUAN_NAMA,
            stok.RAB_ID,
            stok.BARANG_ID,
            stok.GUDANG_ID
            from detail_hm dhm
            inner join hutang_barang hm
            on hm.HUTANG_BARANG_ID=dhm.HM_ID
            inner join master_barang brg
            on brg.BARANG_ID=dhm.BARANG_ID
            inner join stok
            on stok.RAB_ID=hm.RAB_PENERIMA
            and stok.BARANG_ID=dhm.BARANG_ID
            and stok.GUDANG_ID=hm.GUDANG_PENERIMA
            where hm.HUTANG_BARANG_ID='$id_hm'";
        $query = $this->db->query($sql)->result_array();
        $hasil = array();
        foreach ($query as $key => $row) {
            $h = array();
            foreach ($row as $key => $cell) {
                $h[] = $cell;
            }
            $hasil[] = $h;
        }
        return array('data' => $hasil, 'recordsFiltered' => $jumlahData,
            'recordsTotal' => $jumlahData,
            'sql' => $sql
        );
    }

}
