<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

class mDetailInvoice extends MY_Model {

    // constants, column definition
    const ID = 'DETAIL_INVOICE_ID';

    public function __construct() {
        parent::__construct();
        $this->tableName = 'detail_invoice';
        $this->idField = mDetailInvoice::ID;
    }

    function insert($data) {
        $this->db->insert($this->tableName, $data);
    }

    function insertAndGetLast($data) {
        $this->db->insert($this->tableName, $data);
        return $this->db->insert_id();
    }

}
