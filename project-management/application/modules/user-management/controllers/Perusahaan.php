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
class Perusahaan extends User_Controller {

    //1. seluruh fungsi yang tidak public, menggunakan awalan '_' , contoh: _getProperty()
    //2. di atas fungsi diberikan penjelasan proses apa yang dilakukan. dari mana ambil data, 
    //inputnya apa dan outputnya apa. contoh di fungsi index()
    //3. Penamaan fungsi harus PUNUK ONTA dengan awalan huruf kecil $ Menggunakan Bahasa Inggris
    //4. Penamaan nama fungsi maksimal 3 kata

    public function __construct() {
        parent::__construct();

        $this->load->model('mPerusahaan');
    }

	public function index(){
        $this->title="Perusahaan";
        $this->display('acPerusahaan',$this->data);
    }
	
	public function delete(){
		$this->mPerusahaan->_delete(array(mPerusahaan::ID => $this->input->post("tobe_deleted_id")),mPerusahaan::ACTIVE);
		redirect(base_url()."user-management/perusahaan");
	}
	
	public function insert(){
		$_inserted = array(
			mPerusahaan::NAMA => $this->input->post(mPerusahaan::NAMA),
			mPerusahaan::KODE => $this->input->post(mPerusahaan::KODE),
			mPerusahaan::EMAIL => $this->input->post(mPerusahaan::EMAIL),
			mPerusahaan::ALAMAT => $this->input->post(mPerusahaan::ALAMAT),
			mPerusahaan::TELP => $this->input->post(mPerusahaan::TELP),
			mPerusahaan::ACTIVE => 1
		);
		$this->mPerusahaan->_insert($_inserted);
		redirect(base_url()."user-management/perusahaan");
	}
	
	public function update(){
		$id = $this->input->post(mPerusahaan::ID);
		$_updated = array(
			mPerusahaan::NAMA => $this->input->post(mPerusahaan::NAMA),
			//mPerusahaan::KODE => $this->input->post(mPerusahaan::KODE),
			mPerusahaan::EMAIL => $this->input->post(mPerusahaan::EMAIL),
			mPerusahaan::ALAMAT => $this->input->post(mPerusahaan::ALAMAT),
			mPerusahaan::TELP => $this->input->post(mPerusahaan::TELP),
			mPerusahaan::ACTIVE => 1
		);
		$this->mPerusahaan->_update($_updated, array(mPerusahaan::ID => $id));
		redirect(base_url()."user-management/perusahaan");
	}
	
    public function getViewPerusahaan(){
		echo $this->mPerusahaan->getViewPerusahaan();
	}
}
