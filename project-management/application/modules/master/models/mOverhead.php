<?php
class mOverhead extends MY_Model {

	// constants, column definition
	const ID = 'OVERHEAD_ID';
	const RAB = 'RAB_ID';
	const KODE = 'OVERHEAD_KODE';
	const NAMA = 'OVERHEAD_NAMA';
	const ACTIVE = 'OVERHEAD_ACTIVE';
	const TOTAL = 'OVERHEAD_TOTAL';
	const TIPE = 'OVERHEAD_TIPE';
	const STATUS = 'STATUS_APPROVAL_ID';
	const TABLE = 'overhead';

	function __construct() {
        parent::__construct();
		$this->tableName = mOverhead::TABLE;
		$this->idField = mOverhead::ID;
    }
	
	public function getViewOverhead($tipe){
		$baseSQL = "SELECT `overhead`.*, `lokasi_upah`.lokasi_upah_nama AS LOKASI_UPAH_NAMA, rab_transaction.RAB_NAMA as RAB_NAMA, rab_status_approval.rab_status_approval_nama as STATUS_NAMA FROM (`overhead`) JOIN rab_transaction ON rab_transaction.RAB_ID = overhead.RAB_ID JOIN `lokasi_upah` ON `rab_transaction`.`LOKASI_UPAH_ID` = `lokasi_upah`.`LOKASI_UPAH_ID` LEFT JOIN rab_status_approval ON rab_status_approval.rab_status_approval_id = overhead.status_approval_id WHERE `overhead`.`overhead_active` = 1 AND `overhead`.`overhead_tipe` = '$tipe'";
		
		$columns = array(
			array( 'db' => 'OVERHEAD_KODE', 'dt' => 0 ),
			array( 'db' => 'OVERHEAD_NAMA',  'dt' => 1 ),
			array( 'db' => 'OVERHEAD_TOTAL',  'dt' => 2 ),
			array( 'db' => 'STATUS_NAMA',  'dt' => 3 ),
			array( 'db' => 'RAB_NAMA',  'dt' => 4 ),
			array( 'db' => 'OVERHEAD_ID', 'dt' => 5 ),
			array( 'db' => 'STATUS_APPROVAL_ID', 'dt' => 6 ),
			array( 'db' => 'RAB_ID', 'dt' => 7 )
		);
		
		return json_encode(SSP::simple( $_GET, $this->tableName, $this->idField, $columns, $baseSQL));
	}
}
?>