<?php
class mUpah extends MY_Model {

	// constants, column definition
	const ID = 'UPAH_ID';
	const NAME = 'UPAH_NAMA';
	const ACTIVE = 'UPAH_ACTIVE';

    function __construct() {
        parent::__construct();
		$this->tableName = "master_upah";
		$this->idField = mUpah::ID;
    }
	
	public function getViewUpah($level){
		$baseSQL = "SELECT `master_upah`.*, `satuan_upah`.`satuan_upah_nama` as SATUAN_UPAH_NAMA, `lokasi_upah`.`lokasi_upah_nama` as LOKASI_UPAH_NAMA, status_validasi.STATUS_VALIDASI_NAMA AS STATUS_BARANG, drafter.PENGGUNA_NAMA AS DRAFTER_NAMA, editor.PENGGUNA_NAMA AS EDITOR_NAMA, validator.PENGGUNA_NAMA AS VALIDATOR_NAMA 
		FROM (`master_upah`) 
		JOIN `satuan_upah` 
		ON `master_upah`.`satuan_upah_id` = `satuan_upah`.`satuan_upah_id` 
		JOIN `lokasi_upah` 
		ON `master_upah`.`lokasi_upah_id` = `lokasi_upah`.`lokasi_upah_id` 
		JOIN status_validasi
		ON status_validasi.STATUS_VALIDASI_ID = master_upah.STATUS_VALIDASI_ID
		LEFT JOIN pengguna drafter
		ON drafter.PENGGUNA_ID = master_upah.CREATED_BY_USER_ID
		LEFT JOIN pengguna editor
		ON editor.PENGGUNA_ID = master_upah.LAST_EDITED_BY_USER_ID
		LEFT JOIN pengguna validator
		ON validator.PENGGUNA_ID = master_upah.VALIDATED_BY_USER_ID
		WHERE `master_upah`.`upah_active` = 1";
		
		if($level==1){
			$baseSQL .= "  AND master_upah.STATUS_VALIDASI_ID <> 1";
		}
		else if($level==0){
			$baseSQL .= "  AND master_upah.UPAH_HARGA IS NOT NULL";
		}
		
		$columns = array(
			array( 'db' => 'UPAH_ID', 'dt' => 0 ),
			array( 'db' => 'UPAH_NAMA',  'dt' => 1 ),
			array( 'db' => 'UPAH_KODE', 'dt' => 2 ),
			array( 'db' => 'SATUAN_UPAH_NAMA',  'dt' => 3 ),
			array( 'db' => 'LOKASI_UPAH_NAMA', 'dt' => 4 ),
			array( 'db' => 'UPAH_HARGA_TEMP', 'dt' => 5 ),
			array( 'db' => 'UPAH_HARGA', 'dt' => 6 ),
			array( 'db' => 'STATUS_BARANG', 'dt' => 7 ),
			array( 'db' => 'SATUAN_UPAH_ID', 'dt' => 8 ),
			array( 'db' => 'LOKASI_UPAH_ID', 'dt' => 9 ),
			array( 'db' => 'STATUS_VALIDASI_ID', 'dt' => 10 ),
			array( 'db' => 'DRAFTER_NAMA', 'dt' => 11 ),
			array( 'db' => 'CREATED_TIMESTAMP', 'dt' => 12 ),
			array( 'db' => 'EDITOR_NAMA', 'dt' => 13 ),
			array( 'db' => 'LAST_EDITED_TIMESTAMP', 'dt' => 14 ),
			array( 'db' => 'VALIDATOR_NAMA', 'dt' => 15 ),
			array( 'db' => 'VALIDATED_TIMESTAMP', 'dt' => 16 )
		);
		
		return json_encode(SSP::simple( $_GET, $this->tableName, $this->idField, $columns, $baseSQL));
	}
	
	public function getViewAnalisaUpahById($id){
		$baseSQL = "SELECT `master_upah`.*, `satuan_upah`.`satuan_upah_nama` as SATUAN_UPAH_NAMA, `lokasi_upah`.`lokasi_upah_nama` as LOKASI_UPAH_NAMA FROM (`master_upah`) JOIN `satuan_upah` ON `master_upah`.`satuan_upah_id` = `satuan_upah`.`satuan_upah_id` JOIN `lokasi_upah` ON `master_upah`.`lokasi_upah_id` = `lokasi_upah`.`lokasi_upah_id` WHERE `master_upah`.`upah_active` = 1 AND `lokasi_upah`.lokasi_upah_id = $id AND master_upah.UPAH_HARGA IS NOT NULL";
		
		$columns = array(
			array( 'db' => 'UPAH_NAMA',  'dt' => 0 ),
			array( 'db' => 'UPAH_KODE', 'dt' => 1 ),
			array( 'db' => 'SATUAN_UPAH_NAMA',  'dt' => 2 ),
			array( 'db' => 'LOKASI_UPAH_NAMA', 'dt' => 3 ),
			array( 'db' => 'UPAH_HARGA', 'dt' => 4 ),
			array( 'db' => 'UPAH_ID', 'dt' => 5 )
		);
		
		return json_encode(SSP::simple( $_GET, $this->tableName, $this->idField, $columns, $baseSQL));
	}
}
?>