<?php

class mProject extends MY_Model {

    // constants, column definition
    const ID = 'PROJECT_ID';
    const NAMA = 'PROJECT_NAMA';
    const KODE = 'PROJECT_KODE';
    const ACTIVE = 'PROJECT_ACTIVE';
    const CREATED = 'PROJECT_CREATE';
    const STATUS = 'PROJECT_STATUS';
    const DESCRIPTION = 'PROJECT_DESCRIPTION';
    const URL_FOLDER = 'PROJECT_URL_FOLDER';
    const MAIN_PROJECT_ID = 'MAIN_PROJECT_ID';
	const PROJECT_CREATOR = 'PROJECT_CREATOR';
	const PROJECT_LAST_MODIFIER = 'PROJECT_LAST_MODIFIER';
	
    const STATUS_ACTIVE = 0;
    const STATUS_COMPLETE = 1;
    const STATUS_ABORTED = -1;

    function __construct() {
        parent::__construct();
        $this->tableName = "project";
        $this->idField = mProject::ID;
    }

    function insert($table, $data) {
        $this->db->insert($table, $data);
    }

    function insertAndGetLast($table, $data) {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    function getViewProject($table, $data) {
        $query = $this->db->get_where($table, $data);
        return $query;
    }

    public function getSubProjectById($mainID) {
        $baseSQL = "select * from project p LEFT JOIN status_project sp ON p.PROJECT_STATUS = sp.STATUS_PROJECT_ID WHERE p.MAIN_PROJECT_ID=? and p.PROJECT_ACTIVE= 1";
        $query = $this->db->query($baseSQL, array($mainID));
        return $query->result_array();
        //return $this->_select(array('MAIN_PROJECT_ID' => $mainID));
    }

    public function getRunningSubProjectById($mainID) {
        $baseSQL = "select * from project p, status_project sp where p.PROJECT_STATUS = sp.STATUS_PROJECT_ID and p.MAIN_PROJECT_ID=? and p.PROJECT_ACTIVE= 1 and sp.STATUS_PROJECT_ID = 3";
        $query = $this->db->query($baseSQL, array($mainID));
        return $query->result_array();
        //return $this->_select(array('MAIN_PROJECT_ID' => $mainID));
    }

    public function getProject() {
        $baseSQL = "SELECT * FROM `project`";

        $columns = array(
            array('db' => 'PROJECT_ID', 'dt' => 0),
            array('db' => 'PROJECT_KODE', 'dt' => 1),
            array('db' => 'PROJECT_NAMA', 'dt' => 2),
            array('db' => 'PROJECT_CREATE', 'dt' => 3),
            array('db' => 'PROJECT_ACTIVE', 'dt' => 4),
            array('db' => 'PROJECT_ACTIVE', 'dt' => 5)
        );

        return json_encode(SSP::simple($_GET, $this->tableName, $this->idField, $columns, $baseSQL));
    }
	
	public function getMonitoringProjects() {
		$where = '';
		if($this->input->post('Perusahaan')!=null){
			$where .= ' AND perusahaan.PERUSAHAAN_ID = '. $this->input->post('Perusahaan') . ' ';
		}
		if($this->input->post('MainProject')!=null){
			$where .= ' AND main_project.MAIN_PROJECT_ID = '. $this->input->post('MainProject') . ' ';
		}
		if($this->input->post('Status')!=null){
			$where .= ' AND project.PROJECT_STATUS = '. $this->input->post('Status') . ' ';
		}
        $baseSQL = "SELECT rab_transaction.RAB_ID, status_project.STATUS_PROJECT_NAMA, getTotalDate(project.PROJECT_ID) AS PROJECT_DURATION, DATE_FORMAT(DATE_ADD(project.PROJECT_START,INTERVAL getTotalDate(project.PROJECT_ID) DAY),'%d-%m-%Y') AS PROJECT_FINISH_DATE, DATE_FORMAT(project.PROJECT_START,'%d-%m-%Y') AS PROJECT_START_DATE, project.*, main_project.MAIN_PROJECT_NAMA, main_project.MAIN_PROJECT_KODE, COALESCE(project.PROJECT_PROGRES_UPAH, 0) AS PROGRES_UPAH, COALESCE(project.PROJECT_PROGRES, 0) AS PROGRES
					FROM `project`
					JOIN main_project ON main_project.MAIN_PROJECT_ID = project.MAIN_PROJECT_ID
					JOIN status_project ON status_project.STATUS_PROJECT_ID = project.PROJECT_STATUS
					JOIN perusahaan ON perusahaan.PERUSAHAAN_ID = main_project.PERUSAHAAN_ID
					JOIN rab_transaction ON rab_transaction.PROJECT_ID = project.PROJECT_ID
					WHERE project.PROJECT_ACTIVE = 1 ".$where. "
					GROUP BY project.PROJECT_ID";

        $columns = array(
            array('db' => 'PROJECT_ID', 'dt' => 0),
            array('db' => 'PROJECT_KODE', 'dt' => 1),
            array('db' => 'PROJECT_NAMA', 'dt' => 2),
			array('db' => 'MAIN_PROJECT_KODE', 'dt' => 3),
			array('db' => 'MAIN_PROJECT_NAMA', 'dt' => 4),
            array('db' => 'PROJECT_STATUS', 'dt' => 5),
            array('db' => 'PROJECT_DURATION', 'dt' => 6),
			array('db' => 'PROGRES_UPAH', 'dt' => 7),
			array('db' => 'PROGRES', 'dt' => 8),
			array('db' => 'PROJECT_ID', 'dt' => 9),
			array('db' => 'PROJECT_START_DATE', 'dt' => 10),
			array('db' => 'PROJECT_FINISH_DATE', 'dt' => 11),
			array('db' => 'STATUS_PROJECT_NAMA', 'dt' => 12),
			array('db' => 'RAB_ID', 'dt' => 13)
        );

        return json_encode(SSP::simple($_GET, $this->tableName, $this->idField, $columns, $baseSQL));
    }

    function getListSubProject($idMainProject = 0) {
        $sql = "select pro.*
                from project  pro
                where pro.PROJECT_ACTIVE=1 and pro.MAIN_PROJECT_ID='$idMainProject'
                and pro.PROJECT_STATUS=3
                order by pro.PROJECT_ID desc            ";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function startProject($idProject) {
        $sql = "UPDATE `project` SET `PROJECT_STATUS`=3 ,`PROJECT_START` = now() WHERE  `PROJECT_ID`=?";
        $query = $this->db->query($sql, array($idProject));
        return $query;
    }

    function pauseProject($idProject) {
        $sql = "UPDATE `project` SET `PROJECT_STATUS`=5 ,`PROJECT_PAUSE` = now() WHERE  `PROJECT_ID`=?";
        $query = $this->db->query($sql, array($idProject));
        return $query;
    }

    function resumeProject($idProject) {
        $sql = "UPDATE `project` SET `PROJECT_STATUS`=3 , `PROJECT_TOTAL_HARI_PAUSE` = `PROJECT_TOTAL_HARI_PAUSE`+ datediff(now(),`PROJECT_PAUSE`) WHERE  `PROJECT_ID`=?";
        $query = $this->db->query($sql, array($idProject));
        $sql = "UPDATE `project` SET `PROJECT_STATUS`=3 ,`PROJECT_PAUSE` = NULL WHERE  `PROJECT_ID`=?";
        $query = $this->db->query($sql, array($idProject));
        return $query;
    }

    function finishProject($idProject) {
        $sql = "UPDATE `project` SET `PROJECT_STATUS`=4 ,`PROJECT_FINISH` = now() WHERE  `PROJECT_ID`=?";
        $query = $this->db->query($sql, array($idProject));
        return $query;
    }
    public function isAvailableEstimation ($id)
    {
        $sql = "select * from project p, rab_transaction r  where p.PROJECT_ID  = r.PROJECT_ID and  p.`PROJECT_ID` =? and r.RAB_STATUS_APPROVAL_ID <=2 and r.ESTIMASI_TOTAL_WAKTU IS NOT NULL";
        $query = $this->db->query($sql, array($id));
            
        return $query->result_array();
    }
    
    function resetValidation($id)
    {
        $this->db->query("UPDATE rab_transaction SET VALIDASI_COUNTER = 0 WHERE RAB_STATUS_APPROVAL_ID <=2 AND PROJECT_ID = $id"); 
    }

}

?>