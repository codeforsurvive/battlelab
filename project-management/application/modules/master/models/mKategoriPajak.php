<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

class mKategoriPajak extends MY_Model {

    const ID = 'KATEGORI_PAJAK_ID';
    const NAMA = 'KATEGORI_PAJAK_NAMA';

    public function __construct() {
        parent::__construct();
        $this->tableName = 'kategori_pajak';
        $this->idField = mKategoriPajak::ID;
    }
}
