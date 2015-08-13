<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * @package		Controller - CIMasterArtcak
 * @author		Felix - Artcak Media Digital
 * @copyright	Copyright (c) 2014
 * @link		http://artcak.com
 * @since		Version 1.0
 * @description
 * Contoh Tampilan administrator dashbard
 */

//dapat diganti extend dengan *contoh Admin_controller / Aplikan_controller di folder core. 
// Nama kelas harus sama dengan nama file php
class Satuanbarang extends Plan_Controller {

    //1. seluruh fungsi yang tidak public, menggunakan awalan '_' , contoh: _getProperty()
    //2. di atas fungsi diberikan penjelasan proses apa yang dilakukan. dari mana ambil data, 
    //inputnya apa dan outputnya apa. contoh di fungsi index()
    //3. Penamaan fungsi harus PUNUK ONTA dengan awalan huruf kecil $ Menggunakan Bahasa Inggris
    //4. Penamaan nama fungsi maksimal 3 kata

    public function __construct() {
        parent::__construct();
        $this->left_sidebar = 'lay-left-sidebar/perencanaan';
        $this->load->model('mSatuanBarang');
    }

    /*
     * Digunakan untuk menampilkan dashboard di awal. Setiap tampilan view, harap menggunakan fungsi
     * index(). Pembentukan view terdiri atas:
     * 1. Title
     * 2. Set Partial Header
     * 3. Set Partial Right Top Menu
     * 4. Set Partial Left Menu
     * 5. Body
     * 6. Data-data tambahan yang diperlukan
     * Jika tidak di-set, maka otomatis sesuai dengan default
     */

    public function index() {
        // Dua hal ini wajib di-code agar keluar data title dan memanggil view
        $this->title = "Master Satuan Barang";
        
        $this->data['listKategorisupplier'] = $this->mSatuanBarang->_select(array(mSatuanBarang::ACTIVE => 1));
       
        $this->display('acSatuanBarang', $this->data);
    }
    
    public function isAvailable($id)
    {
        $data = $this->mSatuanBarang->_select(array(mSatuanBarang::ID => $id));
        if (!empty($data)) return true;
        else false;
    }
    
    public function delete() {
        $this->mSatuanBarang->_delete(array(mSatuanBarang::ID => $this->input->post("tobe_deleted_id")), mSatuanBarang::ACTIVE);
        redirect(base_url() . "master/satuanbarang");
    }
/*
    public function update() {
        $id = $this->input->post(mSatuanBarang::ID);
        $input= $this->input->post();
        $this->mSatuanBarang->_update($input, array(mSatuanBarang::ID => $id));
        redirect(base_url() . "master/satuanbarang");
    }*/

    public function insert() {
        $input= $this->input->post();
        $input[mSatuanBarang::ACTIVE] = 1;
        if ($this->isAvailable($input[mSatuanBarang::ID])) {
            $notification = "GAGAL SUBMIT! Data yang Anda masukkan telah ada. Lihat pada Database dan aktifkan secara manual"; 
        }
        else {
            $this->mSatuanBarang->_insert($input);
            $notification = "BERHASIL SUBMIT!"; 
        }
        
        $this->session->set_flashdata('notificationSatBarang', $notification);
        
        redirect(base_url() . "master/satuanbarang");
    }

}
