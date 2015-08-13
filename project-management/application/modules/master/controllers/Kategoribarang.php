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
class Kategoribarang extends Plan_Controller {

    //1. seluruh fungsi yang tidak public, menggunakan awalan '_' , contoh: _getProperty()
    //2. di atas fungsi diberikan penjelasan proses apa yang dilakukan. dari mana ambil data, 
    //inputnya apa dan outputnya apa. contoh di fungsi index()
    //3. Penamaan fungsi harus PUNUK ONTA dengan awalan huruf kecil $ Menggunakan Bahasa Inggris
    //4. Penamaan nama fungsi maksimal 3 kata

    public function __construct() {
        parent::__construct();
        $this->left_sidebar = 'lay-left-sidebar/perencanaan';
        $this->load->model('mKategoriBarang');
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
        $this->title = "Master Kategori Barang";
        $this->data['listKategorisupplier'] = $this->mKategoriBarang->_select(array(mKategoriBarang::ACTIVE => 1));
        $this->display('acKategoriBarang', $this->data);
    }

    public function delete() {
        $this->mKategoriBarang->_delete(array(mKategoriBarang::ID => $this->input->post("tobe_deleted_id")), mKategoriBarang::ACTIVE);
        redirect(base_url() . "master/kategoribarang");
    }

    public function update() {
        $id = $this->input->post(mKategoriBarang::ID);
        $input= $this->input->post();
        $this->mKategoriBarang->_update($input, array(mKategoriBarang::ID => $id));
        redirect(base_url() . "master/kategoribarang");
    }

    public function insert() {
        $input= $this->input->post();
        $input[mKategoriBarang::ACTIVE] = 1;
        $this->mKategoriBarang->_insert($input);
        redirect(base_url() . "master/kategoribarang");
    }

}
