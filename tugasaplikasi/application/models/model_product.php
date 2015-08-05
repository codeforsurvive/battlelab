<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_product extends CI_model {

    public function getAll() {
        $this->db->where('flag_active', 1);
        $hasil = $this->db->get('mst_product');
        return $hasil;
    }

    public function getProduct($key = "key flag_active=true") {
        $this->db->where('id_product', $key);
        $hasil = $this->db->get('mst_product');
        return $hasil;
    }

    public function getUpdate($key, $data) {
        $this->db->where('id_product', $key);
        $this->db->update('mst_product', $data);
    }

    public function getInsert($data) {
        $this->db->insert('mst_product', $data);
        return $this->db->insert_id();
    }

    public function getDelete($key) {
        $this->db->where('id_product', $key);
        $hasil = $this->db->get('mst_product');
        $data = $hasil->result_array();
        $id = $data[0]['id_product'];
        $update_data = array('flag_active' => 0);

        $this->db->update('mst_product', $update_data, array('id_product' => $id));
    }
    
    public function getProductDetail(){
        $hasil = $this->db->get('view_product_module')->result_array();
        return $hasil;
    }
    
    public function getModuleByProduct($product_id){
        $this->db->where('id_product', $product_id);
        $hasil = $this->db->get('view_product_module')->result_array();
        return $hasil;
    }
    public function getHargaByProduct($product_id){
        $this->db->where('id_product', $product_id);
        $hasil = $this->db->get('view_product_module')->result_array();
        return $hasil;
    }
    
    public function hasModule($product_id, $module_id){
        $this->db->where(array('id_product' => $product_id, 'id_module' => $module_id));
        $hasil = $this->db->get('view_product_module')->result_array();
        return sizeof($hasil) > 0;
    }

}

