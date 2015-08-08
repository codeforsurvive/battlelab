<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require dirname(__FILE__) . '/UserController.php';

class ui_home extends Ci_Controller {

    protected $isi;

    public function __construct() {
        parent::__construct();

        $user = $this->session->userdata('user');
        if (!isset($user) || !$user) {
            $this->isi['login'] = FALSE;
        } else {
            $this->isi['login'] = TRUE;
            $this->isi['userLogin'] = $user;
        }
    }

    public function index() {
        $this->isi['content'] = 'home-user/ui-home-view';
        $this->load->view('halaman_user', $this->isi);
    }

    public function cart() {
        $this->isi['content'] = 'home-user/ui-cart';
        $this->load->view('halaman_user', $this->isi);
    }

}
