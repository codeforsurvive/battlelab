<?php
class mAnalisaRab extends MY_Model {

	// constants, column definition
	const ID = 'ANALISA_ID';
	const NAME = 'ANALISA_NAMA';
	const ACTIVE = 'ANALISA_ACTIVE';

	function __construct() {
        parent::__construct();
		$this->tableName = "analisa_rab";
		$this->idField = mAnalisaRab::ID;
    }
	
	public function insertFromMasterAnalisaAndGetID($idAnalisa,$harga){
		$this->db->trans_start();
		$sql = "INSERT INTO analisa_rab (SATUAN_NAMA, KATEGORI_ANALISA_ID, LOKASI_UPAH_ID, ANALISA_KODE, ANALISA_NAMA, ANALISA_TOTAL) 
		SELECT master_analisa.SATUAN_NAMA, master_analisa.KATEGORI_ANALISA_ID, master_analisa.LOKASI_UPAH_ID, master_analisa.ANALISA_KODE, master_analisa.ANALISA_NAMA, (@a:=".$harga.") AS ANALISA_TOTAL FROM master_analisa
		WHERE master_analisa.ANALISA_ID =".$idAnalisa;
		$this->db->query($sql);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return  $insert_id;
	}
	
	public function insertFromAnalisaRABAndGetID($idAnalisa,$harga){
		$this->db->trans_start();
		$sql = "INSERT INTO analisa_rab (SATUAN_NAMA, KATEGORI_ANALISA_ID, LOKASI_UPAH_ID, ANALISA_KODE, ANALISA_NAMA, ANALISA_TOTAL) 
		SELECT analisa_rab.SATUAN_NAMA, analisa_rab.KATEGORI_ANALISA_ID, analisa_rab.LOKASI_UPAH_ID, analisa_rab.ANALISA_KODE, analisa_rab.ANALISA_NAMA, (@a:=".$harga.") AS ANALISA_TOTAL FROM analisa_rab
		WHERE analisa_rab.ANALISA_ID =".$idAnalisa;
		$this->db->query($sql);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return  $insert_id;
	}
	
	public function listAnalisaDistinctByRAB($idRAB){
		$sql = " SELECT `analisa_rab`.*, `lokasi_upah`.`LOKASI_UPAH_NAMA` AS LOKASI_UPAH_NAMA, `kategori_analisa`.`KATEGORI_ANALISA_NAMA` AS KATEGORI_ANALISA_NAMA 
		FROM (`analisa_rab`) 
		JOIN `kategori_analisa` ON `analisa_rab`.`KATEGORI_ANALISA_ID` = `kategori_analisa`.`KATEGORI_ANALISA_ID` 
		JOIN `lokasi_upah` ON `lokasi_upah`.`LOKASI_UPAH_ID` = `analisa_rab`.`LOKASI_UPAH_ID` 
		JOIN (SELECT DISTINCT(ANALISA_ID) FROM detail_pekerjaan WHERE detail_pekerjaan.RAB_ID = $idRAB) list_analisa ON list_analisa.ANALISA_ID = analisa_rab.ANALISA_ID";
		return $this->db->query($sql)->result_array();
	}
}
?>