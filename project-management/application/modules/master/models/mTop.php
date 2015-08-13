<?php

class mTop extends MY_Model {

    // constants, column definition
    const ID = 'TOP_ID';
    const KODE = 'TOP_KODE';
    const VALUE = 'TOP_VALUE';
    const DESCRIPTION = 'TOP_DESCRIPTION';
    const ACTIVE = 'TOP_ACTIVE';
    const TABLE = "top";

    function __construct() {
        parent::__construct();
        $this->tableName = mTop::TABLE;
        $this->idField = mTop::ID;
    }

    public function getViewTop() {
        $baseSQL = "SELECT * FROM (" . mTop::TABLE . ") WHERE " . mTop::ACTIVE . " =1";

        $columns = array(
            array('db' => mTop::ID, 'dt' => 0),
            array('db' => mTop::KODE, 'dt' => 1),
            array('db' => mTop::VALUE, 'dt' => 2),
            array('db' => mTop::DESCRIPTION, 'dt' => 3)
        );

        return json_encode(SSP::simple($_GET, $this->tableName, $this->idField, $columns, $baseSQL));
    }

    function getListTop(){
        $sql="select * from top order by TOP_ID";
        return $this->db->query($sql)->result_array();
    }
	
	function getListTopPOByRabId($rab_id){
		$sql="SELECT top.*
			FROM detail_po 
			JOIN purchase_order ON purchase_order.PURCHASE_ORDER_ID = detail_po.PURCHASE_ORDER_ID
			JOIN top ON top.TOP_ID = purchase_order.TOP_ID
			JOIN detail_lpb ON detail_lpb.PO_ID = detail_po.PURCHASE_ORDER_ID
			WHERE purchase_order.RAB_ID = ".$rab_id."
			GROUP BY top.TOP_ID
			ORDER BY top.TOP_VALUE ASC";
        return $this->db->query($sql)->result_array();
	}
	
	function getListTopOPByRabId($rab_id){
		$sql="SELECT top.*
			FROM detail_opname 
			JOIN opname ON opname.PURCHASE_ORDER_ID = detail_po.PURCHASE_ORDER_ID
			JOIN top ON top.TOP_ID = purchase_order.TOP_ID
			JOIN detail_lpb ON detail_lpb.PO_ID = detail_po.PURCHASE_ORDER_ID
			WHERE purchase_order.RAB_ID = ".$rab_id."
			GROUP BY top.TOP_ID
			ORDER BY top.TOP_VALUE ASC";
        return $this->db->query($sql)->result_array();
	}
}

?>