<?php

class mRab extends MY_Model {

    // constants, column definition
    const ID = 'RAB_ID';
    const NAME = 'RAB_NAMA';
    const ACTIVE = 'RAB_ACTIVE';
    const TOTAL = 'RAB_TOTAL';
    const MATERIAL = 'RAB_MATERIAL';
    const UPAH = 'RAB_UPAH';
    const LOKASI = 'LOKASI_UPAH_ID';

    function __construct() {
        parent::__construct();
        $this->tableName = "rab_transaction";
        $this->idField = mRab::ID;
    }

    public function getViewRabById($id) {
		if($id == -1)
			$baseSQL = "SELECT `rab_transaction`.*, (rab_transaction.RAB_AFTER_OVERHEAD / rab_transaction.LUAS_BANGUNAN) AS RATA_TOTAL, `rab_status_approval`.`rab_status_approval_nama` as RAB_STATUS_APPROVAL_NAMA, `lokasi_upah`.`lokasi_upah_nama` as LOKASI_UPAH_NAMA FROM (`rab_transaction`) JOIN `rab_status_approval` ON `rab_transaction`.`rab_status_approval_id` = `rab_status_approval`.`rab_status_approval_id` JOIN `lokasi_upah` ON `rab_transaction`.`lokasi_upah_id` = `lokasi_upah`.`lokasi_upah_id` WHERE `rab_transaction`.`rab_active` = 1";
		else
			$baseSQL = "SELECT `rab_transaction`.*, (rab_transaction.RAB_AFTER_OVERHEAD / rab_transaction.LUAS_BANGUNAN) AS RATA_TOTAL, `rab_status_approval`.`rab_status_approval_nama` as RAB_STATUS_APPROVAL_NAMA, `lokasi_upah`.`lokasi_upah_nama` as LOKASI_UPAH_NAMA FROM (`rab_transaction`) JOIN `rab_status_approval` ON `rab_transaction`.`rab_status_approval_id` = `rab_status_approval`.`rab_status_approval_id` JOIN `lokasi_upah` ON `rab_transaction`.`lokasi_upah_id` = `lokasi_upah`.`lokasi_upah_id` WHERE `rab_transaction`.`rab_active` = 1 AND `rab_transaction`.`project_id` = $id";

        $columns = array(
            array('db' => 'RAB_KODE', 'dt' => 0),
            array('db' => 'RAB_NAMA', 'dt' => 1),
            array('db' => 'RAB_AFTER_OVERHEAD', 'dt' => 2),
			array('db' => 'LUAS_BANGUNAN', 'dt' => 3),
			array('db' => 'RATA_TOTAL', 'dt' => 4),
            array('db' => 'LOKASI_UPAH_NAMA', 'dt' => 5),
            array('db' => 'RAB_STATUS_APPROVAL_NAMA', 'dt' => 6),
            array('db' => 'RAB_ID', 'dt' => 7),
			array('db' => 'VALIDASI_COUNTER', 'dt' => 8),
			array('db' => 'RAB_STATUS_APPROVAL_ID', 'dt' => 9),
			array('db' => 'PROJECT_ID', 'dt' => 10),
			array('db' => 'ESTIMATOR_ID', 'dt' => 11)
        );

        return json_encode(SSP::simple($_GET, $this->tableName, $this->idField, $columns, $baseSQL));
    }
	
	public function getViewRabByMainId($id) {
		if($id == -1)
			$baseSQL = "SELECT `rab_transaction`.*, (rab_transaction.RAB_AFTER_OVERHEAD / rab_transaction.LUAS_BANGUNAN) AS RATA_TOTAL, `rab_status_approval`.`rab_status_approval_nama` as RAB_STATUS_APPROVAL_NAMA, `lokasi_upah`.`lokasi_upah_nama` as LOKASI_UPAH_NAMA FROM (`rab_transaction`) JOIN `rab_status_approval` ON `rab_transaction`.`rab_status_approval_id` = `rab_status_approval`.`rab_status_approval_id` JOIN `lokasi_upah` ON `rab_transaction`.`lokasi_upah_id` = `lokasi_upah`.`lokasi_upah_id` JOIN project ON project.PROJECT_ID = rab_transaction.PROJECT_ID JOIN main_project ON main_project.MAIN_PROJECT_ID = project.MAIN_PROJECT_ID WHERE `rab_transaction`.`rab_active` = 1";
		else
			$baseSQL = "SELECT `rab_transaction`.*, (rab_transaction.RAB_AFTER_OVERHEAD / rab_transaction.LUAS_BANGUNAN) AS RATA_TOTAL, `rab_status_approval`.`rab_status_approval_nama` as RAB_STATUS_APPROVAL_NAMA, `lokasi_upah`.`lokasi_upah_nama` as LOKASI_UPAH_NAMA FROM (`rab_transaction`) JOIN `rab_status_approval` ON `rab_transaction`.`rab_status_approval_id` = `rab_status_approval`.`rab_status_approval_id` JOIN `lokasi_upah` ON `rab_transaction`.`lokasi_upah_id` = `lokasi_upah`.`lokasi_upah_id` JOIN project ON project.PROJECT_ID = rab_transaction.PROJECT_ID JOIN main_project ON main_project.MAIN_PROJECT_ID = project.MAIN_PROJECT_ID WHERE `rab_transaction`.`rab_active` = 1 AND main_project.MAIN_PROJECT_ID = $id";

        $columns = array(
            array('db' => 'RAB_KODE', 'dt' => 0),
            array('db' => 'RAB_NAMA', 'dt' => 1),
            array('db' => 'RAB_AFTER_OVERHEAD', 'dt' => 2),
			array('db' => 'LUAS_BANGUNAN', 'dt' => 3),
			array('db' => 'RATA_TOTAL', 'dt' => 4),
            array('db' => 'LOKASI_UPAH_NAMA', 'dt' => 5),
            array('db' => 'RAB_STATUS_APPROVAL_NAMA', 'dt' => 6),
            array('db' => 'RAB_ID', 'dt' => 7),
			array('db' => 'VALIDASI_COUNTER', 'dt' => 8),
			array('db' => 'RAB_STATUS_APPROVAL_ID', 'dt' => 9),
			array('db' => 'PROJECT_ID', 'dt' => 10),
			array('db' => 'ESTIMATOR_ID', 'dt' => 11)
        );

        return json_encode(SSP::simple($_GET, $this->tableName, $this->idField, $columns, $baseSQL));
    }
    
    public function getListRAB($idProject=0,$id_gudang=0){
        $sql = "select *
                from rab_transaction where PROJECT_ID='$idProject' and 
                RAB_ACTIVE='1' and RAB_STATUS_APPROVAL_ID='3'
				order by RAB_ID desc
                ";
//        $sql="select rab.*
//                from rab_transaction rab
//                left join permintaan_pembelian pp
//                on pp.RAB_ID=rab.RAB_ID and pp.GUDANG_ID='$id_gudang'
//                where rab.PROJECT_ID='$idProject' and rab.RAB_STATUS_APPROVAL_ID=3 
//                and rab.RAB_ACTIVE=1
//                group by rab.RAB_ID
//                order by rab.RAB_ID desc";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

}

?>