<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

class mPoxlpb extends MY_Model {

    // constants, column definition
    const ID = '';
    const ID_PO='ID_PO';
    const ID_LPB='ID_LPB';
    const TABLE='poxlpb';

    public function __construct() {
        parent::__construct();
        $this->tableName = 'poxlpb';
        $this->idField = '';
    }


    function insertAndGetLast($data) {
        //$this->db->insert($this->tableName, $data);
        $this->_insert($data);
        return $this->db->insert_id();
    }
}
