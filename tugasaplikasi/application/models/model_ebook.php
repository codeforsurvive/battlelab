<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_ebook extends CI_model {

    public function getAll() {
        $this->db->where('flag_active', 1);
        $hasil = $this->db->get('mst_ebook');
        return $hasil;
    }

    public function getEbook($key = "key flag_active=true") {
        $this->db->where('id_ebook', $key);
        $hasil = $this->db->get('mst_ebook');
        return $hasil;
    }

    public function getUpdate($key, $data) {
        $this->db->where('id_ebook', $key);
        $this->db->update('mst_ebook', $data);
    }

    public function getInsert($data) {
        $this->db->insert('mst_ebook', $data);
    }

    public function getDelete($key) {
        $this->db->where('id_ebook', $key);
        $hasil = $this->db->get('mst_ebook');
        
        $data  = $hasil->result_array();
        //print_r($data[0]);
        $id = $data[0]['id_ebook'];
        $update_data = array('flag_active' => 0);

        $this->db->update('mst_ebook', $update_data, array('id_ebook' => $id));
    }

}

