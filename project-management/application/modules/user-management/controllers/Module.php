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

class Module extends User_Controller {

    //1. seluruh fungsi yang tidak public, menggunakan awalan '_' , contoh: _getProperty()
    //2. di atas fungsi diberikan penjelasan proses apa yang dilakukan. dari mana ambil data, 
    //inputnya apa dan outputnya apa. contoh di fungsi index()
    //3. Penamaan fungsi harus PUNUK ONTA dengan awalan huruf kecil $ Menggunakan Bahasa Inggris
    //4. Penamaan nama fungsi maksimal 3 kata

    public function __construct() {
        parent::__construct();
        $this->load->model('mModule');
        $this->load->model('mRole');
        $this->load->model('mRoleMap');
    }

    public function save() {
        $id = $this->input->post(mModule::ID);
        $pair = explode("_", $this->input->post(mModule::PARENT_ID));
        $parent_id = intval($pair[0]);
        $parent_level = intval($pair[1]);
        if (intval($id) == 0) { // about to insert a new record
            $column = array(
                mModule::MNEMONIC => $this->input->post(mModule::MNEMONIC),
                mModule::NAME => $this->input->post(mModule::NAME),
                mModule::LEVEL => ($parent_level + 1),
                mModule::PARENT_ID => $parent_id
            );
            $roles = $this->mRole->_select();
            $this->mModule->_insert($column);
            $last_id = intval($this->mModule->_getRecentID());
            foreach ($roles as $role) {
                $data = array(mRoleMap::ROLE => $role[mRole::ID], mRoleMap::TYPE => -1, mRoleMap::MODULE => $last_id);

                $this->mRoleMap->_insert($data);
            }
        } else {
            $column = $column = array(
                mModule::MNEMONIC => $this->input->post(mModule::MNEMONIC),
                mModule::NAME => $this->input->post(mModule::NAME),
                mModule::LEVEL => ($parent_level + 1),
                mModule::PARENT_ID => $parent_id
            );
            $this->mModule->_insertOrUpdate($column);
        }
        redirect(base_url() . 'user-management/module');
    }

    public function getModuleChildren($filter = array()) {

        return $this->_select(array(mModule::LEVEL => 1, $filter));
    }

    public function getRoles($filter = array()) {
        return $this->_select(array(mModule::LEVEL => 2, $filter));
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
        $this->title = "Module Management";
        $this->data['modules'] =  $this->mModule->_select();
        $this->data['menuList'] = $this->mModule->_select(array(mModule::LEVEL => 0)); // Menu Scope
        $this->data['moduleList'] = $this->mModule->_select(array(mModule::LEVEL => 1)); // Module Scope
        $this->data['accessList'] = $this->mModule->_select(array(mModule::LEVEL => 2)); // Role Scope
        $this->data['parentList'] = array_merge($this->data['menuList'], $this->data['moduleList']); // Parent Scope
        //print_r($this->data);
        $this->display('acModule', $this->data);
    }
    
    

}
