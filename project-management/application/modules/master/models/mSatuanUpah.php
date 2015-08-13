<?php
class mSatuanUpah extends MY_Model {

	const ID = 'SATUAN_UPAH_ID';
	const NAME = 'SATUAN_UPAH_NAMA';
        const ACTIVE = 'SATUAN_UPAH_STATUS';

    function __construct() {
        parent::__construct();
		$this->tableName = "satuan_upah";
		$this->idField = mSatuanUpah::ID;
    }
}
 