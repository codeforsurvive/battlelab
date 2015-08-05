<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_detail_product extends CI_model {

    public function getAll() {
        $hasil = $this->db->get('detail_product');
        return $hasil;
    }

    public function getUpdate($key, $data) {
        $this->db->where('id_module', $key);
        $this->db->update('mst_module', $data);
    }

    public function getInsert($data) {
        $this->db->insert('detail_product', $data);
    }

    public function getDelete($key) {
        $this->db->where('id_product', $key);
        $hasil = $this->db->get('detail_product');

        $data = $hasil->result_array();
        //print_r($data[0]);
        $id = $data[0]['id_module'];
        $update_data = array('flag_active' => 0);

        $this->db->update('detail_product', $update_data, array('id_module' => $id));
    }

    public function deleteModulesByProduct($id_product) {
        $this->db->where('id_product', $id_product);
        $this->db->delete('detail_product');
    }

}

