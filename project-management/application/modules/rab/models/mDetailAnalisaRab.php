<?php
class mDetailAnalisaRab extends MY_Model {

	// constants, column definition
	const ID = 'DETAIL_ANALISA_ID';
	//const ACTIVE = 'BARANG_ACTIVE';

	function __construct() {
        parent::__construct();
		$this->tableName = "detail_analisa_rab";
		$this->idField = mDetailAnalisaRab::ID;
    }
	
	public function getDetailBarang($idAnalisa){
		return $this->_joinSelect('detail_analisa_rab', array('master_barang' => 'master_barang.barang_id = detail_analisa_rab.barang_id'), array("detail_analisa_rab.analisa_id" => $idAnalisa), array('detail_analisa_rab.*','master_barang.*'));
	}
	
	public function getDetailUpah($idAnalisa){
		return $this->_joinSelect('detail_analisa_rab', array('master_upah' => 'master_upah.upah_id = detail_analisa_rab.upah_id','satuan_upah' => 'satuan_upah.satuan_upah_id = master_upah.satuan_upah_id','lokasi_upah'=>'master_upah.lokasi_upah_id = lokasi_upah.lokasi_upah_id'), array("detail_analisa_rab.analisa_id" => $idAnalisa), array('detail_analisa_rab.*','master_upah.*','satuan_upah.satuan_upah_nama as SATUAN_UPAH_NAMA','lokasi_upah.lokasi_upah_nama as LOKASI_UPAH_NAMA'));
	}
	
	public function insertFromDetailAnalisa($idAnalisaOld,$idAnalisaNew){
		$sql = "INSERT INTO detail_analisa_rab (BARANG_ID, UPAH_ID, ANALISA_ID, DETAIL_ANALISA_KOEFISIEN, DETAIL_ANALISA_HARGA, DETAIL_ANALISA_TOTAL) 
		(SELECT master_barang.BARANG_ID, (@a:=NULL) AS UPAH_ID, (@b:=".$idAnalisaNew.") AS ANALISA_ID, DETAIL_ANALISA_KOEFISIEN, BARANG_HARGA AS DETAIL_ANALISA_HARGA, (BARANG_HARGA*DETAIL_ANALISA_KOEFISIEN) AS DETAIL_ANALISA_TOTAL
		FROM detail_analisa
		JOIN master_barang ON master_barang.BARANG_ID = detail_analisa.BARANG_ID
		WHERE detail_analisa.ANALISA_ID = ".$idAnalisaOld.")
		UNION
		(SELECT (@a:=NULL) AS BARANG_ID, master_upah.UPAH_ID, (@b:=".$idAnalisaNew.") AS ANALISA_ID, DETAIL_ANALISA_KOEFISIEN, UPAH_HARGA AS DETAIL_ANALISA_HARGA, (UPAH_HARGA*DETAIL_ANALISA_KOEFISIEN) AS DETAIL_ANALISA_TOTAL
		FROM detail_analisa
		JOIN master_upah ON master_upah.UPAH_ID = detail_analisa.UPAH_ID
		WHERE detail_analisa.ANALISA_ID = ".$idAnalisaOld.")";
		return $this->db->query($sql);
	}
	
	public function insertFromDetailAnalisaRAB($idAnalisaOld,$idAnalisaNew){
		$sql = "INSERT INTO detail_analisa_rab (BARANG_ID, UPAH_ID, ANALISA_ID, DETAIL_ANALISA_KOEFISIEN, DETAIL_ANALISA_HARGA, DETAIL_ANALISA_TOTAL) 
		(SELECT master_barang.BARANG_ID, (@a:=NULL) AS UPAH_ID, (@b:=".$idAnalisaNew.") AS ANALISA_ID, DETAIL_ANALISA_KOEFISIEN, BARANG_HARGA AS DETAIL_ANALISA_HARGA, (BARANG_HARGA*DETAIL_ANALISA_KOEFISIEN) AS DETAIL_ANALISA_TOTAL
		FROM detail_analisa_rab
		JOIN master_barang ON master_barang.BARANG_ID = detail_analisa_rab.BARANG_ID
		WHERE detail_analisa_rab.ANALISA_ID = ".$idAnalisaOld.")
		UNION
		(SELECT (@a:=NULL) AS BARANG_ID, master_upah.UPAH_ID, (@b:=".$idAnalisaNew.") AS ANALISA_ID, DETAIL_ANALISA_KOEFISIEN, UPAH_HARGA AS DETAIL_ANALISA_HARGA, (UPAH_HARGA*DETAIL_ANALISA_KOEFISIEN) AS DETAIL_ANALISA_TOTAL
		FROM detail_analisa_rab
		JOIN master_upah ON master_upah.UPAH_ID = detail_analisa_rab.UPAH_ID
		WHERE detail_analisa_rab.ANALISA_ID = ".$idAnalisaOld.")";
		return $this->db->query($sql);
	}
}
?>