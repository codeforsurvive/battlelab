<?php
class mBarang extends MY_Model {

	// constants, column definition
	const ID = 'BARANG_ID';
	const NAME = 'BARANG_NAMA';
	const ACTIVE = 'BARANG_ACTIVE';

	function __construct() {
        parent::__construct();
		$this->tableName = "master_barang";
		$this->idField = mBarang::ID;
    }
	
	public function getViewBarang($level){
		$baseSQL = "SELECT `master_barang`.*, `kategori_barang`.`kategori_barang_nama` AS KATEGORI_BARANG_NAMA, status_validasi.STATUS_VALIDASI_NAMA AS STATUS_BARANG, drafter.PENGGUNA_NAMA AS DRAFTER_NAMA, editor.PENGGUNA_NAMA AS EDITOR_NAMA, validator.PENGGUNA_NAMA AS VALIDATOR_NAMA
		FROM (`master_barang`) 
		JOIN `kategori_barang` 
		ON `master_barang`.`kategori_barang_id` = `kategori_barang`.`kategori_barang_id` 
		JOIN status_validasi
		ON status_validasi.STATUS_VALIDASI_ID = master_barang.STATUS_VALIDASI_ID
		LEFT JOIN pengguna drafter
		ON drafter.PENGGUNA_ID = master_barang.CREATED_BY_USER_ID
		LEFT JOIN pengguna editor
		ON editor.PENGGUNA_ID = master_barang.LAST_EDITED_BY_USER_ID
		LEFT JOIN pengguna validator
		ON validator.PENGGUNA_ID = master_barang.VALIDATED_BY_USER_ID
		WHERE `BARANG_ACTIVE` = 1";
		
		if($level==1){
			$baseSQL .= "  AND master_barang.STATUS_VALIDASI_ID <> 1";
		}
		else if($level==0){
			$baseSQL .= "  AND master_barang.BARANG_HARGA IS NOT NULL";
		}
		
		$columns = array(
			array( 'db' => 'BARANG_ID', 'dt' => 0 ),
			array( 'db' => 'BARANG_NAMA',  'dt' => 1 ),
			array( 'db' => 'BARANG_KODE', 'dt' => 2 ),
			array( 'db' => 'KATEGORI_BARANG_NAMA',   'dt' => 3 ),
			array( 'db' => 'SATUAN_NAMA',     'dt' => 4 ),
			array( 'db' => 'BARANG_HARGA_TEMP', 'dt' => 5 ),
			array( 'db' => 'BARANG_HARGA', 'dt' => 6 ),
			array( 'db' => 'STATUS_BARANG', 'dt' => 7 ),
			array( 'db' => 'BARANG_KETERANGAN', 'dt' => 8 ),
			array( 'db' => 'KATEGORI_BARANG_ID', 'dt' => 9 ),
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
	
	public function getViewAnalisaBarang(){
		$baseSQL = "SELECT `master_barang`.*, `kategori_barang`.`kategori_barang_nama` AS KATEGORI_BARANG_NAMA FROM (`master_barang`) 
					JOIN `kategori_barang` 
					ON `master_barang`.`kategori_barang_id` = `kategori_barang`.`kategori_barang_id` 
					WHERE `BARANG_ACTIVE` = 1 AND master_barang.BARANG_HARGA IS NOT NULL";
		
		$columns = array(
			array( 'db' => 'BARANG_NAMA', 'dt' => 0 ),
			array( 'db' => 'KATEGORI_BARANG_NAMA', 'dt' => 1 ),
			array( 'db' => 'BARANG_KODE', 'dt' => 2 ),
			array( 'db' => 'SATUAN_NAMA', 'dt' => 3 ),
			array( 'db' => 'BARANG_HARGA', 'dt' => 4 ),
			array( 'db' => 'BARANG_ID', 'dt' => 5 )
		);
		
		return json_encode(SSP::simple( $_GET, $this->tableName, $this->idField, $columns, $baseSQL));
	}
}
?>