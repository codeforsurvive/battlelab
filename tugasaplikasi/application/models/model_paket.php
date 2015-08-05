<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_paket extends CI_model {

    public function getAll() {
        $hasil = $this->db->get('mst_paket');
        return $hasil;
    }

    public function getViewSatu() {
        $hasil = $this->db->query('select * from view_paket group by id_paket, id_product');
        return $hasil;
    }

    public function getViewPaket($id, $product) {
        $this->db->where(array('id_paket' => $id, 'id_product' => $product));
        $hasil = $this->db->get('view_paket');
        return $hasil;
    }

    public function hasModule($id, $product, $id_module) {
        $this->db->where(array('id_paket' => $id, 'id_product' => $product, 'id_module' => $id_module));
        $hasil = $this->db->count_all_results('view_paket');
        return $hasil > 0;
    }

    public function getViewDelete($id, $product) {
        $this->db->where(array('id_paket' => $id, 'id_product' => $product));
        $hasil = $this->db->get('view_paket');
        return $hasil;
    }

    public function getHargaPaket($paket, $product) {
        $sql = "select mst_paket.id_paket, detail_paket.id_product, sum(mst_module.harga_module) as harga_module 
                from mst_paket join detail_paket on detail_paket.id_paket = mst_paket.id_paket join mst_module on detail_paket.id_module = mst_module.id_module 
                where detail_paket.id_paket = {$paket} and detail_paket.id_product = {$product}
                group by mst_paket.id_paket, detail_paket.id_product";
        $query = $this->db->query($sql)->result_array();
        //print_r($query);
        if(sizeof($query) == 0){
            return 0;
        }
        return intval($query[0]['harga_module']);
    }

    public function getPaket($key = "key flag_active=true") {
        $this->db->where('id_paket', $key);
        $hasil = $this->db->get('mst_paket');
        return $hasil;
    }

    public function getUpdate($key, $data) {
        $this->db->where('id_paket', $key);
        $this->db->update('mst_paket', $data);
    }

    public function getInsert($data) {
        $this->db->insert('mst_paket', $data);
        return $this->db->insert_id();
    }

    public function getDelete($key) {
        $this->db->where('id_paket', $key);
        $hasil = $this->db->get('view_paket');

        $data = $hasil->result_array();
        $id = $data[0]['id_paket'];
        $update_data = array('flag_active' => 0);

        $this->db->update('mst_paket', $update_data, array('id_paket' => $id));
    }

}

