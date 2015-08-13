<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

class mDetailTransaksiPK extends MY_Model {

    // constants, column definition
    const PERMINTAAN = 'PERMINTAAN_PEKERJAAN_ID';
    const ANALISA = 'ANALISA_ID';
    const LSU = 'SUBCON_ID';
    const OVH = 'UPAH_ID';
    const OVH_PAKET = 'PAKET_OVERHEAD_UPAH_ID';
    const VOLUME = 'VOLUME_PK';

    public function __construct() {
        parent::__construct();
        $this->tableName = 'detail_transaksi_pk';
        $this->idField = mDetailTransaksiPK::PERMINTAAN;
    }

    function insert($data) {
        //$this->db->insert($this->tableName, $data);
        $this->_insert($data);
    }

    function insertAndGetLast($data) {
        //$this->db->insert($this->tableName, $data);
        //return $this->db->insert_id();
        return $this->_insert($data);
    }
    
    public function exist($columnFilter){
        $query = $this->db->get_where($this->tableName, $columnFilter);
        
        return $query->num_rows() > 0;
    }

}
