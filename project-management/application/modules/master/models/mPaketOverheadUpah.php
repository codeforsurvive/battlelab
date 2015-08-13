<?php
class mPaketOverheadUpah extends MY_Model {

	// constants, column definition
	const ID = 'PAKET_OVERHEAD_UPAH_ID';
	const SATUAN = 'SATUAN_UPAH_ID';
	const NAMA = 'PAKET_OVERHEAD_UPAH_NAMA';
	const HARGA = 'PAKET_OVERHEAD_UPAH_HARGA';
	const TABLE = 'paket_overhead_upah';

	function __construct() {
        parent::__construct();
		$this->tableName = mPaketOverheadUpah::TABLE;
		$this->idField = mPaketOverheadUpah::ID;
    }
}
?>