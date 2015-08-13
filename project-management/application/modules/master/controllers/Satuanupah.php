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
class Satuanupah extends Plan_Controller {

    //1. seluruh fungsi yang tidak public, menggunakan awalan '_' , contoh: _getProperty()
    //2. di atas fungsi diberikan penjelasan proses apa yang dilakukan. dari mana ambil data, 
    //inputnya apa dan outputnya apa. contoh di fungsi index()
    //3. Penamaan fungsi harus PUNUK ONTA dengan awalan huruf kecil $ Menggunakan Bahasa Inggris
    //4. Penamaan nama fungsi maksimal 3 kata

    public function __construct() {
        parent::__construct();
        $this->left_sidebar = 'lay-left-sidebar/perencanaan';
        $this->load->model('mSatuanUpah');
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
        $this->title = "Master Satuan Upah";
        $this->data['listKategorisupplier'] = $this->mSatuanUpah->_select(array(mSatuanUpah::ACTIVE => 1));
        $this->display('acSatuanUpah', $this->data);
    }

    public function isAvailable($name)
    {
        $data = $this->mSatuanUpah->_select(array(mSatuanUpah::NAME => $name));
        if (!empty($data)) return true;
        else false;
    }
    
    public function delete() {
        $this->mSatuanUpah->_delete(array(mSatuanUpah::ID => $this->input->post("tobe_deleted_id")), mSatuanUpah::ACTIVE);
        redirect(base_url() . "master/satuanupah");
    }

    public function update() {
        $id = $this->input->post(mSatuanUpah::ID);
        $input= $this->input->post();
        $this->mSatuanUpah->_update($input, array(mSatuanUpah::ID => $id));
        redirect(base_url() . "master/satuanupah");
    }

    public function insert() {
        $input= $this->input->post();
        $input[mSatuanUpah::ACTIVE] = 1;
        if ($this->isAvailable($input[mSatuanUpah::NAME])) {
            $notification = "GAGAL SUBMIT! Data yang Anda masukkan telah ada. Lihat pada Database dan aktifkan secara manual"; 
        }
        else {
            $this->mSatuanUpah->_insert($input);
            $notification = "BERHASIL SUBMIT!"; 
        }
        
        $this->session->set_flashdata('notificationSatUpah', $notification);
        
        redirect(base_url() . "master/satuanupah");
    }

}
