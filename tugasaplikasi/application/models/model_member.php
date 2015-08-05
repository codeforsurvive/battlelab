<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_member extends CI_model {

    public function getAll() {
        $this->db->where('flag_active', 1);
        $hasil = $this->db->get('mst_member');
        return $hasil;
    }

    public function getMember($key = "key flag_active=true") {
        $this->db->where('id_member', $key);
        $hasil = $this->db->get('mst_member');
        return $hasil;
    }

    public function getMemberbyname($nama) {
        $this->db->like('nama', $nama);
        $hasil = $this->db->get('mst_member');
        return $hasil->result_array();
    }

    public function getUpdate($key, $data) {
        $this->db->where('id_member', $key);
        $this->db->update('mst_member', $data);
    }

    public function getInsert($data) {
        $this->db->insert('mst_member', $data);
    }

    public function getDelete($key) {
        $this->db->where('id_member', $key);
        $hasil = $this->db->get('mst_member');

        $data = $hasil->result_array();
        //print_r($data[0]);
        $id = $data[0]['id_member'];
        $update_data = array('flag_active' => 0);

        $this->db->update('mst_member', $update_data, array('id_member' => $id));
    }

    public function Login($email, $password) {
        $sql ="select * from mst_member where email = '{$email}' and `password` = md5('{$password}') and flag_active = 1";
        
        $query = $this->db->query($sql);
        
        if($query->num_rows() > 0){
            $row = $query->result_array();
            
            return $row[0];
        }
        
        return false;
    }

}

