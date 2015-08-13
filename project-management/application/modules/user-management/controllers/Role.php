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
class Role extends User_Controller {

    //1. seluruh fungsi yang tidak public, menggunakan awalan '_' , contoh: _getProperty()
    //2. di atas fungsi diberikan penjelasan proses apa yang dilakukan. dari mana ambil data, 
    //inputnya apa dan outputnya apa. contoh di fungsi index()
    //3. Penamaan fungsi harus PUNUK ONTA dengan awalan huruf kecil $ Menggunakan Bahasa Inggris
    //4. Penamaan nama fungsi maksimal 3 kata

    public function __construct() {
        parent::__construct();
        $this->load->model('mRole');
        $this->load->model('mModule');
        $this->load->model('mRoleMap');
        $this->load->model('mUser');
        $this->load->model('mUserRole');
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
        $this->title = "Role Management";
        $this->data['roleList'] = $this->mRole->_select(array(mRole::ACTIVE => 1));
        $this->data['admin'] = $this->isAllowed("role_admin");
        $this->display('acRole', $this->data);
        //echo $this->data['admin'];
        //die();
    }

    public function save() {
        $id = $this->input->post(mRole::ID);
        if (intval($id) == 0) { // about to insert a new record
            $column = array(mRole::NAME => $this->input->post(mRole::NAME), mRole::ACTIVE => 1);
            $modules = $this->mModule->_select();
            $this->mRole->_insert($column);
            $last_id = intval($this->mRole->_getRecentID());
            foreach ($modules as $module) {
                $data = array(mRoleMap::ROLE => $last_id, mRoleMap::TYPE => -1, mRoleMap::MODULE => $module[mModule::ID]);

                $this->mRoleMap->_insert($data);
            }
        } else {
            $column = array(mRole::ID => $id, mRole::NAME => $this->input->post(mRole::NAME));
            $this->mRole->_insertOrUpdate($column);
        }
        //print_r($column);


        redirect(base_url() . 'user-management/role');
    }

    public function delete() {
        $id = $this->input->post(mRole::ID);
        //print_r($id);
        $this->mRole->_delete(array(mRole::ID => $id), mRole::ACTIVE);

        redirect(base_url() . 'user-management/role');
    }

    public function manage() {
        $this->title = "Role Management";
        $id = $this->input->post(mRole::ID);
        
        if (!isset($id) || !$id) {
            redirect(base_url() . 'user-management/role');
            //$id = 1;
        }

        $detail = $this->mRole->_findById($id);
        $modules = $this->mModule->_select();
        /**$length = sizeof($modules);
        $count = 0;
        for ($i = 0; $i < $length; $i++) {
            if (intval($modules[$i][mModule::LEVEL]) == 0) {
                $menu_block[$modules[$i][mModule::ID]] = $modules[$i];
            }
        }
        //die(json_encode($menu_block));
        $module_block = array();
        foreach ($menu_block as $menu) {
            //print_r($menu);
            //$module_block = array();
            $count = 0;
            foreach ($modules as $m) {
                if (intval($m[mModule::PARENT_ID]) == intval($menu[mModule::ID]) && intval($m[mModule::LEVEL]) == 1) {
                    $module_block[$menu[mModule::ID]][$count++] = $m;
                }
            }
        }


        //die(var_dump($module_block));
        $role_block = array();

        foreach ($module_block as $module) {
            $count = 0;
            foreach ($modules as $m) {
                if (intval($m[mModule::PARENT_ID]) == intval($module[mModule::ID]) && intval($m[mModule::LEVEL]) == 2) {
                    $role_block[$module[mModule::ID]][$count++] = $m;
                }
            }
        }
        //die(var_dump($module_block));
         * 
         */
        $selection = $this->mRoleMap->_find(array(mRoleMap::ROLE => $id));

        $menu_block = $this->mModule->_select(array(mModule::LEVEL => 0));
        foreach ($menu_block as $menu) {
            $module_block[$menu[mModule::ID]] = $this->mModule->_select(array(mModule::LEVEL => 1, mModule::PARENT_ID => $menu[mModule::ID]));
            foreach ($module_block[$menu[mModule::ID]] as $module) {
                $role_block[$module[mModule::ID]] = $this->mModule->_select(array(mModule::LEVEL => 2, mModule::PARENT_ID => $module[mModule::ID]));
            }
        }

        //var_dump($menu_block);
        //var_dump($module_block);
        //var_dump($role_block);


        foreach ($selection as $item) {
            $enabled[$item[mRoleMap::MODULE]] = ($item[mRoleMap::TYPE] == mRoleMap::VIEW) ? ' checked="true" ' : '';
        }
        
        //var_dump($id);
        //var_dump($detail);
        $this->data['roleDetail'] = $detail;
        $this->data['moduleList'] = $modules;
        $this->data['selectedRole'] = $selection;
        $this->data['roleEnabled'] = $enabled;
        $this->data['menuBlock'] = $menu_block;
        $this->data['moduleBlock'] = $module_block;
        $this->data['roleBlock'] = $role_block;

        $this->display('acRoleManager', $this->data);
    }

    public function mapModulePermission() {
        $role_id = $this->input->post(mRole::ID);
        // Reset all permission 
        $modules = $this->mModule->_select();
        foreach ($modules as $module) {
            $column = array(mRoleMap::TYPE => mRoleMap::NONE);
            $where = array(mRoleMap::ROLE => $role_id, mRoleMap::MODULE => $module[mModule::ID]);
            $this->mRoleMap->_update($column, $where);
        }

        // map current permissions
        if ($this->input->post('role')) {

            $permission = $this->input->post('role');
            //print_r(json_decode($role_id));
            //die(json_encode($permission));
            //var_dump($read_permission);
            foreach ($permission as $p) {
                $column = array(
                    mRoleMap::TYPE => mRoleMap::VIEW
                );
                $where = array(mRoleMap::MODULE => intval($p), mRoleMap::ROLE => $role_id);
                //print_r($where);
                //print_r($column);
                $this->mRoleMap->_update($column, $where);
            }
            //redirect(base_url() . 'user-management/role');
        }

        redirect(base_url() . 'user-management/role');
    }

    public function detail() {
        $this->title = "Role Pengguna";
        $id = $this->input->post(mUser::ID);
        if (!isset($id) || !$id) {
            $id = $this->input->get(mUser::ID);
        }
        if (!isset($id) || !$id) {
            redirect(base_url() . 'user-management/pengguna');
        }
        $roles = $this->mRole->_select();
        $roleKeyPair = array();
        $mappedRoles = $this->mUserRole->_select(array(mUserRole::USER => $id));
        $mappedRolesId = array();
        $it = 0;
        foreach ($mappedRoles as $mr) {
            $mappedRolesId[$it++] = $mr[mUserRole::ROLE];
        }
        $unMappedRoles = $this->mRole->getUnmappedRoles($mappedRolesId);
        foreach ($roles as $role) {
            $roleKeyPair[$role[mRole::ID]] = $role[mRole::NAME];
        }

        $this->data['mappedRoles'] = $mappedRoles;
        $this->data['unmappedRoles'] = $unMappedRoles;
        $this->data['roles'] = $roles;
        $this->data['rolesDictionary'] = $roleKeyPair;
       // print_r($this->data['rolesDictionary']);
        $this->data['userDetail'] = $this->mUser->_findById($id);
        $this->data['admin'] = $this->isAllowed("role_admin");
        $this->display('acUserRole', $this->data);
    }
    
    public function updatePasswordValidasi(){
        $pwd = md5($this->input->post(mUser::PASSWORD_VALIDATION));
        $id = $this->input->post(mUser::ID);
        $result = $this->mUser->updatePasswordValidasi($pwd, $id);
        
        echo json_encode(array('status' => $result));
    }

    public function addRole() {
        $id = $this->input->post(mUserRole::USER);
        $role = $this->input->post(mUserRole::ROLE);
        if (!isset($id) || !$id) {
            redirect(base_url() . 'user-management/pengguna');
        }
        $columns = array(mUserRole::USER => $id, mUserRole::ROLE => $role);
        //var_dump($columns);
        $this->mUserRole->_insert($columns);
        redirect(base_url() . 'user-management/role/detail?' . mUserRole::USER . '=' . $id);
    }

    public function deleteRole() {
        $id = $this->input->post(mUserRole::USER);
        $role = $this->input->post(mUserRole::ROLE);
        if (!isset($id) || !$id) {
            redirect(base_url() . 'user-management/pengguna');
        }
        $condition = array(mUserRole::ROLE => $role, mUserRole::USER => $id);
        $this->mUserRole->_delete($condition);
        //print_r($condition);
        redirect(base_url() . 'user-management/role/detail?' . mUserRole::USER . '=' . $id);
    }

}
