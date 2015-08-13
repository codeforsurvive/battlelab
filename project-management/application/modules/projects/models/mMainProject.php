<?php

class mMainProject extends MY_Model {

    // constants, column definition
    const ID = 'MAIN_PROJECT_ID';
    const NAMA = 'MAIN_PROJECT_NAMA';
    const KODE = 'MAIN_PROJECT_KODE';
    const ACTIVE = 'MAIN_PROJECT_ACTIVE';
    const DESCRIPTION = 'MAIN_PROJECT_DESCRIPTION';
    const PERUSAHAAN_ID = 'PERUSAHAAN_ID';

    function __construct() {
        parent::__construct();
        $this->tableName = "main_project";
        $this->idField = mMainProject::ID;
    }

    function insert($table, $data) {
        $this->db->insert($table, $data);
    }

    function insertAndGetLast($table, $data) {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    function getViewMainProject($table, $data) {
        $query = $this->db->get_where($table, $data);
        return $query;
    }

    function getViewProject() {
        $sql = "SELECT main_project.*, perusahaan.PERUSAHAAN_NAMA FROM main_project JOIN perusahaan ON main_project.PERUSAHAAN_ID = perusahaan.PERUSAHAAN_ID";

        return $this->db->query($sql);
    }

    function getMainProject() {
        $baseSQL = "SELECT main_project.*, perusahaan.PERUSAHAAN_NAMA AS PERUSAHAAN_NAMA FROM `main_project` join `perusahaan` on perusahaan.PERUSAHAAN_ID = main_project.PERUSAHAAN_ID";

        $columns = array(
            array('db' => 'MAIN_PROJECT_ID', 'dt' => 0),
            array('db' => 'MAIN_PROJECT_KODE', 'dt' => 1),
            array('db' => 'MAIN_PROJECT_NAMA', 'dt' => 2),
            array('db' => 'PERUSAHAAN_NAMA', 'dt' => 3),
            array('db' => 'MAIN_PROJECT_ACTIVE', 'dt' => 4),
            array('db' => 'MAIN_PROJECT_ACTIVE', 'dt' => 5)
        );

        return json_encode(SSP::simple($_GET, $this->tableName, $this->idField, $columns, $baseSQL));
    }

    function getListMainProject() {
        $sql = "select mpro.* from main_project mpro where mpro.MAIN_PROJECT_ACTIVE=1 order by mpro.MAIN_PROJECT_ID desc";
        return $this->db->query($sql)->result_array();
    }

    /* zarkasi */
//    function get_list_main_project($id_gudang=0){
//        $sql="select mpro.*
//                from main_project mpro
//                left join project  pro
//                on pro.MAIN_PROJECT_ID=mpro.MAIN_PROJECT_ID
//                left join rab_transaction rab
//                on rab.PROJECT_ID=pro.PROJECT_ID
//                left join permintaan_pembelian pp
//                on pp.RAB_ID=rab.RAB_ID and pp.GUDANG_ID='$id_gudang'
//                where mpro.MAIN_PROJECT_ACTIVE=1 
//                group by mpro.MAIN_PROJECT_ID
//                order by mpro.MAIN_PROJECT_ID desc";
//        return $this->db->query($sql)->result_array();
//    }
}

?>