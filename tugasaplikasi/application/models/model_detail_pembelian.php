<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_detail_pembelian extends CI_model {

    public function getAll() {
        $hasil = $this->db->get('detail_pembelian');
        return $hasil;
    }

    public function getById($id) {
        $this->db->where('id_pembelian', $id);
        $hasil = $this->db->get('detail_pembelian');
        return $hasil;
    }

    public function getUpdate($key, $data) {
        $this->db->where('id_pembelian', $key);
        $this->db->update('mst_module', $data);
    }

    public function getInsert($data) {
        $this->db->insert('detail_pembelian', $data);
    }

    public function getDelete($key) {
        $this->db->where('id_pembelian', $key);
        $hasil = $this->db->get('detail_pembelian');

        $data = $hasil->result_array();
        //print_r($data[0]);
        $id = $data[0]['id_pembelian'];
        $update_data = array('flag_active' => 0);

        $this->db->update('detail_pembelian', $update_data, array('id_pembelian' => $id));
    }

    public function deleteModulesByPembelian($id_pembelian) {
        $this->db->where('id_pembelian', $id_pembelian);
        $this->db->delete('detail_pembelian');
    }

}

