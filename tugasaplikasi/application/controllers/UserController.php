<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class UserController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $user = $this->session->userdata('user');
        if (!isset($user) || !$user) {
            redirect('login');
        }
    }

}
