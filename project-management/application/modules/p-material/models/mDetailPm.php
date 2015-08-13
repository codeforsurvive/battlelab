<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

class mDetailPm extends MY_Model {

    // constants, column definition
    public function __construct() {
        parent::__construct();
        $this->tableName = 'detail_pm';
        $this->idField = '';
    }

    public function getDetailPM($id = 0) {
        $sql = "select dkm.*,
            brg.BARANG_KODE,
            brg.BARANG_NAMA,
            brg.SATUAN_NAMA,
            dhm.VOLUME as volume_pinjam,
            hm.RAB_PENERIMA as RAB_ID,
            hm.GUDANG_PENERIMA AS GUDANG_ID,
            (
                select ifnull(sum(stok.VOLUME),0)
                from stok
                where stok.RAB_ID=hm.RAB_PENERIMA 
                and stok.BARANG_ID=dkm.BARANG_ID 
                and stok.GUDANG_ID=hm.GUDANG_PENERIMA
            ) as stok_sisa,
            (
                select ifnull(sum(dkm1.VOLUME),0)
                from detail_pm dkm1
                inner join kembali_barang kb1
                on kb1.KEMBALI_BARANG_ID=dkm1.PM_ID
                where dkm1.BARANG_ID=brg.BARANG_ID
                and kb1.HM_ID=hm.HUTANG_BARANG_ID
                and dkm1.PM_ID!=dkm.PM_ID
                and kb1.STATUS_ID!='3'
            ) as volume_lain_telah_kembali_unvalidated,
            (
                select ifnull(sum(dkm2.VOLUME),0)
                from detail_pm dkm2
                inner join kembali_barang kb2
                on kb2.KEMBALI_BARANG_ID=dkm2.PM_ID
                where dkm2.BARANG_ID=brg.BARANG_ID
                and kb2.HM_ID=hm.HUTANG_BARANG_ID
                and dkm2.PM_ID!=dkm.PM_ID
                and kb2.STATUS_ID='3'
            ) as volume_lain_telah_kembali_validated
            from detail_pm dkm
            inner join master_barang brg
            on brg.BARANG_ID=dkm.BARANG_ID
            inner join kembali_barang km
            on km.KEMBALI_BARANG_ID=dkm.PM_ID
            inner join hutang_barang hm
            on hm.HUTANG_BARANG_ID=km.HM_ID
            inner join detail_hm dhm
            on dhm.HM_ID=hm.HUTANG_BARANG_ID and dhm.BARANG_ID=dkm.BARANG_ID
			where dkm.PM_ID='$id'";
        return $this->db->query($sql)->result_array();
    }

}
