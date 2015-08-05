<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_detail_paket extends CI_model {

    public function getAll() {
        $hasil = $this->db->get('detail_paket');
        return $hasil;
    }

    public function getUpdate($key, $data) {
        $this->db->where('id_paket', $key);
        $this->db->update('mst_paket', $data);
    }

    public function getInsert($data) {
        $this->db->insert('detail_paket', $data);
    }

    public function getDelete($key) {
        $this->db->where('id_paket', $key);
        $hasil = $this->db->get('detail_paket');

        $data = $hasil->result_array();
        //print_r($data[0]);
        $id = $data[0]['id_paket'];

        $this->db->update('detail_paket', $update_data, array('id_paket' => $id));
    }

    public function deleteModulesByProduct($id_paket) {
        $this->db->where('id_paket', $id_paket);
        $this->db->delete('detail_paket');
    }

}

