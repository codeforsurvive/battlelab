<?php
class mPerusahaan extends MY_Model {

    // constants, column definition
    const ID = 'PERUSAHAAN_ID';
    const NAMA = 'PERUSAHAAN_NAMA';
	const ACTIVE = 'PERUSAHAAN_ACTIVE';
	const KODE = 'PERUSAHAAN_KODE';
	const ALAMAT = 'PERUSAHAAN_ALAMAT';
	const EMAIL = 'PERUSAHAAN_EMAIL';
	const TELP = 'PERUSAHAAN_TELP';

    function __construct() {
        parent::__construct();
        $this->tableName = "perusahaan";
        $this->idField = mPerusahaan::ID;
    }
	
	public function getViewPerusahaan(){
		$baseSQL = "SELECT * FROM (".$this->tableName.")";
		
		$columns = array(
			array( 'db' => mPerusahaan::ID, 'dt' => 0 ),
			array( 'db' => mPerusahaan::NAMA,  'dt' => 1 ),
			array( 'db' => mPerusahaan::KODE,   'dt' => 2 ),
			array( 'db' => mPerusahaan::ALAMAT,     'dt' => 3 ),
			array( 'db' => mPerusahaan::TELP, 'dt' => 4 ),
			array( 'db' => mPerusahaan::EMAIL, 'dt' => 5 ),
			array( 'db' => mPerusahaan::ACTIVE, 'dt' => 6 )
		);
		
		return json_encode(SSP::simple( $_GET, $this->tableName, $this->idField, $columns, $baseSQL));
	}
	
}
?>