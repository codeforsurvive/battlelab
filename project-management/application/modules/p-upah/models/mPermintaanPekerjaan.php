<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

class mPermintaanPekerjaan extends MY_Model {

    // constants, column definition
    const ID = 'PERMINTAAN_PEKERJAAN_ID';
    const CODE = 'PERMINTAAN_PEKERJAAN_KODE';
    const VALIDATOR = 'VALIDATOR_ID';
    const STATUS = 'STATUS_PK_ID';
    const USER = 'PETUGAS_ID';
    const RAB = 'RAB_ID';
    const CATEGORY = 'KATEGORI_PK_ID';
    const TOTAL = 'TOTAL_PK';
    const NAME = 'PERMINTAAN_PEKERJAAN_NAMA';
    const DATE_CREATED = 'PERMINTAAN_PEKERJAAN_TANGGAL';

    public function __construct() {
        parent::__construct();
        $this->tableName = 'permintaan_pekerjaan';
        $this->idField = mPermintaanPekerjaan::ID;
    }

    function insert($data) {
        //$this->db->insert($this->tableName, $data);
        return $this->_insert($data);
    }

    function insertAndGetLast($data) {
        //$this->db->insert($this->tableName, $data);
        //return $this->db->insert_id();
        return $this->_insert($data);
    }

    function getTotalPk() {
        $sql = "SELECT *, SUM(`HARGA_SATUAN`*`VOLUME_PK`) AS TOTAL_HARGA FROM view_pk
                GROUP BY `PK_ID`
                ORDER BY PK_ID desc";

        $columns = array(
            array('db' => 'PK_ID', 'dt' => 0),
            array('db' => 'PK_KODE', 'dt' => 1),
            array('db' => 'PK_TANGGAL', 'dt' => 2),
            array('db' => 'PK_UPDATED', 'dt' => 3),
            array('db' => 'PK_VALIDATED', 'dt' => 4),
            array('db' => 'UPDATER_ID', 'dt' => 5),
            array('db' => 'UPDATER_NAMA', 'dt' => 6),
            array('db' => 'VALIDATOR_ID', 'dt' => 7),
            array('db' => 'VALIDATOR_NAMA', 'dt' => 8),
            array('db' => 'STATUS_PK_ID', 'dt' => 9),
            array('db' => 'STATUS_PK_NAMA', 'dt' => 10),
            array('db' => 'PETUGAS_ID', 'dt' => 11),
            array('db' => 'PETUGAS_NAMA', 'dt' => 12),
            array('db' => 'PROJECT_ID', 'dt' => 13),
            array('db' => 'PROJECT_KODE', 'dt' => 14),
            array('db' => 'PROJECT_NAMA', 'dt' => 15),
            array('db' => 'RAB_ID', 'dt' => 16),
            array('db' => 'RAB_KODE', 'dt' => 17),
            array('db' => 'RAB_NAMA', 'dt' => 18),
            array('db' => 'KATEGORI_PK_ID', 'dt' => 19),
            array('db' => 'KATEGORI_PK_NAMA', 'dt' => 20),
            array('db' => 'ANALISA_ID', 'dt' => 21),
            array('db' => 'HARGA_SATUAN', 'dt' => 22),
            array('db' => 'ANALISA_KODE', 'dt' => 23),
            array('db' => 'ANALISA_NAMA', 'dt' => 24),
            array('db' => 'VOLUME', 'dt' => 25),
            array('db' => 'SATUAN', 'dt' => 26),
            array('db' => 'TOTAL_HARGA', 'dt' => 27)
        );
        //$query = $this->db->query($sql);
        return json_encode(SSP::simple($_GET, 'view_pk', 'PK_ID', $columns, $sql));
    }

    function getVolumes($COMPOSITE_ID) {
        $tmp = explode('_', $COMPOSITE_ID);
        $RAB_ID = $tmp[0];
        $ANALISA_ID = $tmp[1];
        $sql = "SELECT analisa_rab.*, DETAIL_ANALISA_KOEFISIEN, DETAIL_ANALISA_HARGA, DETAIL_ANALISA_TOTAL, 
        COALESCE((SELECT SUM(detail_transaksi_pk.VOLUME_PK)
        FROM permintaan_pekerjaan
        JOIN detail_transaksi_pk ON detail_transaksi_pk.PERMINTAAN_PEKERJAAN_ID = permintaan_pekerjaan.PERMINTAAN_PEKERJAAN_ID
        WHERE permintaan_pekerjaan.RAB_ID = {$RAB_ID} AND detail_transaksi_pk.ANALISA_ID = analisa_rab.ANALISA_ID
        GROUP BY detail_transaksi_pk.ANALISA_ID),0)  AS UPAH_ANALISA_VOLUME_TERPAKAI, 
        SUM(temp.UPAH_ANALISA_TOTAL) AS UPAH_ANALISA_TOTAL, temp.UPAH_ANALISA_VOLUME FROM
        (SELECT analisa_rab.*, detail_analisa_rab.DETAIL_ANALISA_KOEFISIEN, detail_analisa_rab.DETAIL_ANALISA_HARGA, detail_analisa_rab.DETAIL_ANALISA_TOTAL, master_upah.UPAH_ID, detail_analisa_rab.DETAIL_ANALISA_ID, detail_analisa_rab.DETAIL_ANALISA_TOTAL AS UPAH_ANALISA_TOTAL, SUM(detail_pekerjaan.DETAIL_PEKERJAAN_VOLUME) AS UPAH_ANALISA_VOLUME FROM detail_pekerjaan 
        JOIN analisa_rab ON detail_pekerjaan.ANALISA_ID = analisa_rab.ANALISA_ID  
        JOIN detail_analisa_rab ON analisa_rab.ANALISA_ID = detail_analisa_rab.ANALISA_ID 
        JOIN master_upah ON detail_analisa_rab.UPAH_ID = master_upah.UPAH_ID
        WHERE detail_pekerjaan.RAB_ID = {$RAB_ID} AND analisa_rab.ANALISA_ID = {$ANALISA_ID}
        GROUP BY detail_analisa_rab.DETAIL_ANALISA_ID) temp, analisa_rab WHERE temp.ANALISA_ID = analisa_rab.ANALISA_ID GROUP BY analisa_rab.ANALISA_ID";

        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function getListPkProject() {
        $sql = "SELECT * FROM view_pk
                GROUP BY `PROJECT_ID`";

        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function getListPkByProject($id) {
        $sql = "SELECT * FROM view_pk
                WHERE `PROJECT_ID`=?
                GROUP BY `PERMINTAAN_PEKERJAAN_ID`";

        $query = $this->db->query($sql, array($id));
        return $query->result_array();
    }

    function getListPk() {
        $sql = "SELECT * FROM view_pk ORDER BY PK_ID desc";

        $query = $this->db->query($sql);
        return $query->result_array();
    }

}
