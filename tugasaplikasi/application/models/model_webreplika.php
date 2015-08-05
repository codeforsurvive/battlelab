<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_webreplika extends CI_model {

    public function getAll() {
        $this->db->where('flag_active', 1);
        $hasil = $this->db->get('mst_webreplika');
        return $hasil;
    }

    public function getwebreplika($key = "key flag_active=true") {
        $this->db->where('id_webreplika', $key);
        $hasil = $this->db->get('mst_webreplika');
        return $hasil;
    }

    public function getUpdate($key, $data) {
        $this->db->where('id_webreplika', $key);
        $this->db->update('mst_webreplika', $data);
    }

    public function getInsert($data) {
        $this->db->insert('mst_webreplika', $data);
    }

    public function getDelete($key) {
        $this->db->where('id_webreplika', $key);
        $hasil = $this->db->get('mst_webreplika');
        
        $data  = $hasil->result_array();
        //print_r($data[0]);
        $id = $data[0]['id_webreplika'];
        $update_data = array('flag_active' => 0);

        $this->db->update('mst_webreplika', $update_data, array('id_webreplika' => $id));
    }

}

