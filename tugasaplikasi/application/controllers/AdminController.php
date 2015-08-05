<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class AdminController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $user = $this->session->userdata('user');
        //print_r($user);
        //die();
        if(!isset($user) || !$user){
            redirect('login');
        }
        
        if(intval($user['is_admin']) == 0){
            redirect('login');
        }
    }
}
