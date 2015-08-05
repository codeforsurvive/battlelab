<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_template extends CI_model {

    public function getAll() {
        $this->db->where('flag_active', 1);
        $hasil = $this->db->get('mst_template');
        return $hasil;
    }

    public function getTemplate($key = "key flag_active=true") {
        $this->db->where('id_template', $key);
        $hasil = $this->db->get('mst_template');
        return $hasil;
    }

    public function getUpdate($key, $data) {
        $this->db->where('id_template', $key);
        $this->db->update('mst_template', $data);
    }

    public function getInsert($data) {
        $this->db->insert('mst_template', $data);
    }

    public function getDelete($key) {
        $this->db->where('id_template', $key);
        $hasil = $this->db->get('mst_template');
        $data  = $hasil->result_array();
        //print_r($data[0]);
        $id = $data[0]['id_template'];
        $update_data = array('flag_active' => 0);

        $this->db->update('mst_template', $update_data, array('id_template' => $id));
    }

}

