<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

class mKategoriPp extends MY_Model {

    const ID = 'KATEGORI_PP_ID';
    const NAMA = 'KATEGORI_PP_NAMA';

    public function __construct() {
        parent::__construct();
        $this->tableName = 'kategori_pp';
        $this->idField = mKategoriPp::ID;
    }
}
