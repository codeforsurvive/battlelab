<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_pembelian extends CI_model {
    
    public function getViewSatu(){
        $hasil = $this->db->query('select * from view_pembelian group by id_pembelian');
        return $hasil;
        
    }
      public function getViewPilih($id, $product, $paket){
        $this->db->where(array('id_product' => $product, 'id_pembelian' => $id ,'id_paket' =>$paket));
        $hasil = $this->db->get('view_pembelian');
        return $hasil;
      }
    public function getViewPembelian($id){
        $this->db->where('id_product',$id);
        $hasil = $this->db->get('view_pembelian');
        return $hasil;
        
    }

    public function getAll() {
        $this->db->where('flag_active', 1);
        $hasil = $this->db->get('mst_pembelian');
        return $hasil;
    }

    public function getProduct($key = "key flag_active=true") {
        $this->db->where('id_pembelian', $key);
        $hasil = $this->db->get('mst_pembelian');
        return $hasil;
    }

    public function getUpdate($key, $data) {
        $this->db->where('id_pembelian', $key);
        $this->db->update('mst_pembelian', $data);
    }

    public function getInsert($data) {
        $this->db->insert('mst_pembelian', $data);
        return $this->db->insert_id();
    }

    public function getDelete($key) {
        $this->db->where('id_pembelian', $key);
        $hasil = $this->db->get('mst_pembelian');
        $data = $hasil->result_array();
        $id = $data[0]['id_pembelian'];
        $update_data = array('flag_active' => 0);

        $this->db->update('mst_pembelian', $update_data, array('id_pembelian' => $id));
    }
    
    public function getProductDetail(){
        $hasil = $this->db->get('view_pembelian')->result_array();
        return $hasil;
    }
    
    public function getModuleByProduct($pembelian_id){
        $this->db->where('id_pembelian', $pembelian_id);
        $hasil = $this->db->get('view_pembelian')->result_array();
        return $hasil;
    }
    
    public function hasModule($pembelian_id, $module_id){
        $this->db->where(array('id_pembelian' => $pembelian_id, 'id_module' => $module_id));
        $hasil = $this->db->get('view_pembelian')->result_array();
        return sizeof($hasil) > 0;
    }

    public function getModule($pembelian_id){
        $this->db->where(array('id_pembelian' => $pembelian_id));
        $hasil = $this->db->get('view_pembelian')->result_array();
        return ($hasil) ;
    }
}

