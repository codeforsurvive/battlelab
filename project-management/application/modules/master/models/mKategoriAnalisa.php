<?php
class mKategoriAnalisa extends MY_Model {

	const ID = 'KATEGORI_ANALISA_ID';
	const NAME = 'KATEGORI_ANALISA_NAMA';
        const ACTIVE = 'KATEGORI_ANALISA_STATUS';

    function __construct() {
        parent::__construct();
		$this->tableName = "kategori_analisa";
		$this->idField = mKategoriAnalisa::ID;
    }
}
