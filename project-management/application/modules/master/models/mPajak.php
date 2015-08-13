<?php
class mPajak extends MY_Model {

	// constants, column definition
	const ID = 'PAJAK_ID';
	const NAMA = 'PAJAK_NAMA';
	const VALUE = 'PAJAK_VALUE';
	const DESCRIPTION = 'PAJAK_DESCRIPTION';
	const ACTIVE = 'PAJAK_ACTIVE';
    const TABLE = "pajak";

    function __construct() {
        parent::__construct();
		$this->tableName = mPajak::TABLE;
		$this->idField = mPajak::ID;
    }
	
	public function getViewPajak(){
		$baseSQL = "SELECT * FROM (".mPajak::TABLE.") WHERE ".mPajak::ACTIVE." =1";
		
		$columns = array(
			array( 'db' => mPajak::ID, 'dt' => 0 ),
			array( 'db' => mPajak::NAMA,  'dt' => 1 ),
			array( 'db' => mPajak::VALUE,   'dt' => 2 ),
			array( 'db' => mPajak::DESCRIPTION,   'dt' => 3 )
		);
		
		return json_encode(SSP::simple( $_GET, $this->tableName, $this->idField, $columns, $baseSQL));
	}
}
?>