<?php
class mPaketOverheadMaterial extends MY_Model {

	// constants, column definition
	const ID = 'PAKET_OVERHEAD_MATERIAL_ID';
	const SATUAN = 'SATUAN_NAMA';
	const NAMA = 'PAKET_OVERHEAD_MATERIAL_NAMA';
	const HARGA = 'PAKET_OVERHEAD_MATERIAL_HARGA';
	const TABLE = 'paket_overhead_material';

	function __construct() {
        parent::__construct();
		$this->tableName = mPaketOverheadMaterial::TABLE;
		$this->idField = mPaketOverheadMaterial::ID;
    }
}
?>