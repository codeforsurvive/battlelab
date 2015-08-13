<?php
class mDetailOverhead extends MY_Model {

	// constants, column definition
	const ID = 'DETAIL_OVERHEAD_ID';
	const OVERHEAD = 'OVERHEAD_ID';
	const BARANG = 'BARANG_ID';
	const PAKET_MATERIAL = 'PAKET_OVERHEAD_MATERIAL_ID';
	const UPAH = 'UPAH_ID';
	const PAKET_UPAH = 'PAKET_OVERHEAD_UPAH_ID';
	const KOEFISIEN = 'DETAIL_OVERHEAD_KOEFISIEN';
	const HARGA = 'DETAIL_OVERHEAD_HARGA';
	const TOTAL = 'DETAIL_OVERHEAD_TOTAL';
	
	const TABLE = 'detail_overhead';

	function __construct() {
        parent::__construct();
		$this->tableName = mDetailOverhead::TABLE;
		$this->idField = mDetailOverhead::ID;
    }
	
	public function getDetail($id,$tipe){
		if($tipe=="material"){
			$temp = array();
			$barang = $this->_joinSelect('detail_overhead', array('master_barang' => 'master_barang.barang_id = detail_overhead.barang_id'), array("detail_overhead.overhead_id" => $id), array('master_barang.satuan_nama AS DETAIL_SATUAN', 'master_barang.barang_nama AS DETAIL_NAMA', 'master_barang.barang_kode AS DETAIL_KODE','detail_overhead.detail_overhead_koefisien AS DETAIL_KOEFISIEN','detail_overhead.detail_overhead_harga AS DETAIL_HARGA','detail_overhead.detail_overhead_total AS DETAIL_TOTAL'));
			$paket = $this->_joinSelect('detail_overhead', array('paket_overhead_material' => 'paket_overhead_material.paket_overhead_material_id = detail_overhead.paket_overhead_material_id'), array("detail_overhead.overhead_id" => $id), array('paket_overhead_material.satuan_nama AS DETAIL_SATUAN','paket_overhead_material.paket_overhead_material_nama AS DETAIL_NAMA', '(@kode:=\'LS\') AS DETAIL_KODE','detail_overhead.detail_overhead_koefisien AS DETAIL_KOEFISIEN','detail_overhead.detail_overhead_harga AS DETAIL_HARGA','detail_overhead.detail_overhead_total AS DETAIL_TOTAL'));
			$temp = array_merge($barang,$paket);
			return $temp;
		} else {
			$temp = array();
			$upah = $this->_joinSelect('detail_overhead', array('master_upah' => 'master_upah.upah_id = detail_overhead.upah_id', 'satuan_upah' => 'satuan_upah.satuan_upah_id = master_upah.satuan_upah_id'), array("detail_overhead.overhead_id" => $id), array('satuan_upah.satuan_upah_nama AS DETAIL_SATUAN', 'master_upah.upah_nama AS DETAIL_NAMA', 'master_upah.upah_kode AS DETAIL_KODE','detail_overhead.detail_overhead_koefisien AS DETAIL_KOEFISIEN','detail_overhead.detail_overhead_harga AS DETAIL_HARGA','detail_overhead.detail_overhead_total AS DETAIL_TOTAL'));
			$paket = $this->_joinSelect('detail_overhead', array('paket_overhead_upah' => 'paket_overhead_upah.paket_overhead_upah_id = detail_overhead.paket_overhead_upah_id', 'satuan_upah' => 'satuan_upah.satuan_upah_id = paket_overhead_upah.satuan_upah_id'), array("detail_overhead.overhead_id" => $id), array('satuan_upah.satuan_upah_nama AS DETAIL_SATUAN','paket_overhead_upah.paket_overhead_upah_nama AS DETAIL_NAMA', '(@kode:=\'LS\') AS DETAIL_KODE','detail_overhead.detail_overhead_koefisien AS DETAIL_KOEFISIEN','detail_overhead.detail_overhead_harga AS DETAIL_HARGA','detail_overhead.detail_overhead_total AS DETAIL_TOTAL'));
			$temp = array_merge($upah,$paket);
			return $temp;
		}
	}
	
	public function getDetailToEdit($id,$tipe){
		if($tipe=="material"){
			$temp = array();
			$barang = $this->_joinSelect('detail_overhead', array('master_barang' => 'master_barang.barang_id = detail_overhead.barang_id'), array("detail_overhead.overhead_id" => $id), array('master_barang.barang_id AS DETAIL_ID','master_barang.satuan_nama AS DETAIL_SATUAN', 'master_barang.barang_nama AS DETAIL_NAMA', 'master_barang.barang_kode AS DETAIL_KODE','detail_overhead.detail_overhead_koefisien AS DETAIL_KOEFISIEN','detail_overhead.detail_overhead_harga AS DETAIL_HARGA','detail_overhead.detail_overhead_total AS DETAIL_TOTAL'));
			$paket = $this->_joinSelect('detail_overhead', array('paket_overhead_material' => 'paket_overhead_material.paket_overhead_material_id = detail_overhead.paket_overhead_material_id'), array("detail_overhead.overhead_id" => $id), array('(@id:=\'LS\') AS DETAIL_ID','paket_overhead_material.satuan_nama AS DETAIL_SATUAN','paket_overhead_material.paket_overhead_material_nama AS DETAIL_NAMA', '(@kode:=\'LS\') AS DETAIL_KODE','detail_overhead.detail_overhead_koefisien AS DETAIL_KOEFISIEN','detail_overhead.detail_overhead_harga AS DETAIL_HARGA','detail_overhead.detail_overhead_total AS DETAIL_TOTAL'));
			$temp = array_merge($barang,$paket);
			return $temp;
		} else {
			$temp = array();
			$upah = $this->_joinSelect('detail_overhead', array('master_upah' => 'master_upah.upah_id = detail_overhead.upah_id', 'satuan_upah' => 'satuan_upah.satuan_upah_id = master_upah.satuan_upah_id'), array("detail_overhead.overhead_id" => $id), array('master_upah.upah_id AS DETAIL_ID','satuan_upah.satuan_upah_nama AS DETAIL_SATUAN', 'master_upah.upah_nama AS DETAIL_NAMA', 'master_upah.upah_kode AS DETAIL_KODE','detail_overhead.detail_overhead_koefisien AS DETAIL_KOEFISIEN','detail_overhead.detail_overhead_harga AS DETAIL_HARGA','detail_overhead.detail_overhead_total AS DETAIL_TOTAL'));
			$paket = $this->_joinSelect('detail_overhead', array('paket_overhead_upah' => 'paket_overhead_upah.paket_overhead_upah_id = detail_overhead.paket_overhead_upah_id', 'satuan_upah' => 'satuan_upah.satuan_upah_id = paket_overhead_upah.satuan_upah_id'), array("detail_overhead.overhead_id" => $id), array('(@id:=\'LS\') AS DETAIL_ID','satuan_upah.satuan_upah_nama AS DETAIL_SATUAN','paket_overhead_upah.paket_overhead_upah_nama AS DETAIL_NAMA', '(@kode:=\'LS\') AS DETAIL_KODE','detail_overhead.detail_overhead_koefisien AS DETAIL_KOEFISIEN','detail_overhead.detail_overhead_harga AS DETAIL_HARGA','detail_overhead.detail_overhead_total AS DETAIL_TOTAL'));
			$temp = array_merge($upah,$paket);
			return $temp;
		}
	}
}
?>