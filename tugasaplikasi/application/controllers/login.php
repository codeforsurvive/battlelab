<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index() {
        $user = $this->session->userdata('user');
        if (!isset($user) || !$user) {
            $this->load->view('halaman_login');
        } else {
            if (intval($user['is_admin']) == 1) {
                header ('location:'.base_url().'index.php/login');
            } else {
                redirect('ui_home');
            }
        }
    }

    public function register() {
        
    }

    public function getLogin() {
        $u = $this->input->post('email');
        $p = $this->input->post('password');

        $this->load->model('model_member');
        $result = $this->model_member->Login($u, $p);

        if (!$result) {
            redirect('login');
        } else {
            $this->session->set_userdata('user', $result);


            if (intval($result['is_admin']) == 1) {
                redirect('home');
            } else {
                redirect('ui_home');
            }
        }
    }
    public function getLogout() {
        $this->session->unset_userdata('user');
        header ('location:'.base_url());
                
    }


}