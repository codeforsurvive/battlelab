<?php
class mLokasiUpah extends MY_Model {

	// constants, column definition
	const ID = 'LOKASI_UPAH_ID';
	const NAME = 'LOKASI_UPAH_NAMA';
        const ACTIVE = 'LOKASI_UPAH_STATUS';

    function __construct() {
        parent::__construct();
		$this->tableName = "lokasi_upah";
		$this->idField = mLokasiUpah::ID;
    }
}
 