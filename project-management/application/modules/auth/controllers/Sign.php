<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * 
 * @author		Felix - Artcak Media Digital
 * @copyright	Copyright (c) 2014
 * @link		http://artcak.com
 * @since		Version 1.0
 * @description
 * Contoh Tampilan administrator dashbard
 */

class Sign extends Auth_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('user-management/mUser'));
    }

    public function index() {
        $this->title = "Sign";
        $this->display('main');
    }

    function verifysign() {
		$iduser = $this->input->post('iduser');
		$pass = $this->input->post('password');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            echo "false";
        } else {
            echo $this->check_database($iduser, $pass);
        }
    }

    function check_database($iduser, $password) {
        $result = $this->mUser->_find(array(mUser::ID => $iduser,
            mUser::SIGN_PASSWORD => md5($password),
            mUser::ACTIVE => 1));

        if ($result) {
            return "true";
        } else {
            return "false";
        }
    }

}
