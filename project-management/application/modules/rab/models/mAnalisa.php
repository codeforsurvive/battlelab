<?php
class mAnalisa extends MY_Model {

	// constants, column definition
	const ID = 'ANALISA_ID';
	const NAME = 'ANALISA_NAMA';
	const ACTIVE = 'ANALISA_ACTIVE';

	function __construct() {
        parent::__construct();
		$this->tableName = "master_analisa";
		$this->idField = mAnalisa::ID;
    }
	
	public function getViewAnalisa(){
		/*$baseSQL = "SELECT `master_analisa`.*, `lokasi_upah`.lokasi_upah_nama AS LOKASI_UPAH_NAMA FROM (`master_analisa`) 
		JOIN `lokasi_upah` 
		ON `master_analisa`.`lokasi_upah_id` = `lokasi_upah`.`lokasi_upah_id` 
		WHERE `master_analisa`.`analisa_active` = 1";*/
		
		$baseSQL = "SELECT temp.*, SUM(total) AS TOTAL_FINAL 
		FROM
		((SELECT master_analisa.*, lokasi_upah.lokasi_upah_nama AS LOKASI_UPAH_NAMA, (detail_analisa.DETAIL_ANALISA_KOEFISIEN*master_barang.BARANG_HARGA) AS total
		FROM (master_analisa) 
		JOIN lokasi_upah 
		ON master_analisa.LOKASI_UPAH_ID = lokasi_upah.LOKASI_UPAH_ID
		LEFT JOIN detail_analisa
		ON detail_analisa.ANALISA_ID = master_analisa.ANALISA_ID
		LEFT JOIN master_barang
		ON master_barang.BARANG_ID = detail_analisa.BARANG_ID
		WHERE master_analisa.ANALISA_ACTIVE = 1 
		AND detail_analisa.BARANG_ID IS NOT NULL)
		UNION
		(SELECT master_analisa.*, lokasi_upah.lokasi_upah_nama AS LOKASI_UPAH_NAMA, (detail_analisa.DETAIL_ANALISA_KOEFISIEN*master_upah.UPAH_HARGA) AS total
		FROM (master_analisa) 
		JOIN lokasi_upah 
		ON master_analisa.LOKASI_UPAH_ID = lokasi_upah.LOKASI_UPAH_ID
		LEFT JOIN detail_analisa
		ON detail_analisa.ANALISA_ID = master_analisa.ANALISA_ID
		LEFT JOIN master_upah
		ON master_upah.UPAH_ID = detail_analisa.UPAH_ID
		WHERE master_analisa.ANALISA_ACTIVE = 1 
		AND detail_analisa.UPAH_ID IS NOT NULL)) temp
		GROUP BY temp.ANALISA_ID";
		
		
		$columns = array(
			array( 'db' => 'ANALISA_KODE', 'dt' => 0 ),
			array( 'db' => 'ANALISA_NAMA',  'dt' => 1 ),
			array( 'db' => 'SATUAN_NAMA',  'dt' => 2 ),
			array( 'db' => 'TOTAL_FINAL',  'dt' => 3 ),
			array( 'db' => 'LOKASI_UPAH_NAMA',  'dt' => 4 ),
			array( 'db' => 'ANALISA_ID', 'dt' => 5 )
		);
		
		return json_encode(SSP::simple( $_GET, $this->tableName, $this->idField, $columns, $baseSQL));
	}
	
	public function getViewAnalisaById($id){
		//$baseSQL = "SELECT `master_analisa`.*, `lokasi_upah`.lokasi_upah_nama AS LOKASI_UPAH_NAMA FROM (`master_analisa`) JOIN `lokasi_upah` ON `master_analisa`.`lokasi_upah_id` = `lokasi_upah`.`lokasi_upah_id` WHERE `master_analisa`.`analisa_active` = 1 AND `master_analisa`.lokasi_upah_id = $id";
		
		$baseSQL = "SELECT temp.*, SUM(total) AS TOTAL_FINAL 
		FROM
		((SELECT master_analisa.*, lokasi_upah.lokasi_upah_nama AS LOKASI_UPAH_NAMA, (detail_analisa.DETAIL_ANALISA_KOEFISIEN*master_barang.BARANG_HARGA) AS total
		FROM (master_analisa) 
		JOIN lokasi_upah 
		ON master_analisa.LOKASI_UPAH_ID = lokasi_upah.LOKASI_UPAH_ID
		LEFT JOIN detail_analisa
		ON detail_analisa.ANALISA_ID = master_analisa.ANALISA_ID
		LEFT JOIN master_barang
		ON master_barang.BARANG_ID = detail_analisa.BARANG_ID
		WHERE master_analisa.ANALISA_ACTIVE = 1 
		AND detail_analisa.BARANG_ID IS NOT NULL
		AND master_analisa.LOKASI_UPAH_ID = $id)
		UNION
		(SELECT master_analisa.*, lokasi_upah.lokasi_upah_nama AS LOKASI_UPAH_NAMA, (detail_analisa.DETAIL_ANALISA_KOEFISIEN*master_upah.UPAH_HARGA) AS total
		FROM (master_analisa) 
		JOIN lokasi_upah 
		ON master_analisa.LOKASI_UPAH_ID = lokasi_upah.LOKASI_UPAH_ID
		LEFT JOIN detail_analisa
		ON detail_analisa.ANALISA_ID = master_analisa.ANALISA_ID
		LEFT JOIN master_upah
		ON master_upah.UPAH_ID = detail_analisa.UPAH_ID
		WHERE master_analisa.ANALISA_ACTIVE = 1 
		AND detail_analisa.UPAH_ID IS NOT NULL
		AND master_analisa.LOKASI_UPAH_ID = $id)) temp
		GROUP BY temp.ANALISA_ID";
		
		$columns = array(
			array( 'db' => 'ANALISA_KODE', 'dt' => 0 ),
			array( 'db' => 'ANALISA_NAMA',  'dt' => 1 ),
			array( 'db' => 'SATUAN_NAMA',  'dt' => 2 ),
			array( 'db' => 'LOKASI_UPAH_NAMA',  'dt' => 3 ),
			array( 'db' => 'TOTAL_FINAL',  'dt' => 4 ),
			array( 'db' => 'ANALISA_ID', 'dt' => 5 )
		);
		
		return json_encode(SSP::simple( $_GET, $this->tableName, $this->idField, $columns, $baseSQL));
	}
}
?>