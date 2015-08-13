<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

class mDetailTransaksiPP extends MY_Model {

    // constants, column definition
    const ID = 'PERMINTAAN_PEMBELIAN_ID';

    public function __construct() {
        parent::__construct();
        $this->tableName = 'detail_transaksi_pp';
        $this->idField = mDetailTransaksiPP::ID;
    }
     public function exist($columnFilter){
        $query = $this->db->get_where($this->tableName, $columnFilter);
        
        return $query->num_rows() > 0;
    }


    function insert($data) {
        $this->db->insert($this->tableName, $data);
    }

    function insertAndGetLast($data) {
        $this->db->insert($this->tableName, $data);
        return $this->db->insert_id();
    }

}
