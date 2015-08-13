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
                redirect('login');
            } else {
                redirect('ui_home');
            }
        }
    }

    public function getLoginStatus() {
        $user = $this->session->userdata('user');
        //var_dump($user);
        if (!isset($user) || !$user) {
            //var_dump(FALSE);
            echo json_encode(array("status" => FALSE));
        } else {
            echo json_encode(array("status" => TRUE));
        }
    }

    public function isLogin() {
        $user = $this->session->userdata('user');
        //var_dump($user);
        if (!isset($user) || !$user) {
            //var_dump(FALSE);
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function register() {
        
    }

    public function getLogin() {
        $u = $this->input->post('email');
        $p = $this->input->post('password');

        $this->load->model('model_member');
        $result = $this->model_member->Login($u, $p);
        //var_dump($result);
        //die();
        if (!$result) {

            $this->session->set_flashdata('loginStatus', array('status' => FALSE, 'message' => 'Invalid login!'));
            echo json_encode(array('status' => FALSE, 'message' => 'Invalid login!'));
            //redirect('login');
        } else {
            $this->session->set_userdata('user', $result);
            $this->session->set_userdata('id_member', $result['id_member']);
            $loginStatus = array('status' => TRUE);
            if (intval($result['is_admin']) == 1) {
                $loginStatus['role'] = 'admin';
                //redirect('home');
            } else {
                //redirect('ui_home');
                $loginStatus['role'] = 'user';
            }

            echo json_encode($loginStatus);
        }
    }

    public function getLogout() {
        $this->session->unset_userdata('user');
        redirect('');
    }

    public function getSignup() {

        $isi['judul'] = 'Menu';
        $isi['sub_judul'] = 'Tambah Member';
        $isi['id_member'] = "";
        $isi['nama'] = "";
        $isi['email'] = "";
        $isi['telp'] = "";
        $isi['password'] = "";
        $this->load->view('halaman_signup', $isi);
    }

    public function simpan() {
        //$this->model_squrity->getSqurity();

        $key = $this->input->post('id_member');
        $data['id_member'] = $this->input->post('id_member');
        $data['nama'] = $this->input->post('nama');
        $data['telp'] = $this->input->post('telp');
        $data['email'] = $this->input->post('email');
        $data['password'] = md5($this->input->post('password'));

        $this->load->model('model_member');
        $query = $this->model_member->getMember($key);
        if ($query->num_rows() > 0) {
            $this->model_member->getUpdate($key, $data);
            $this->session->set_flashdata('info', 'Data Sukses di Update');
        } else {
            $this->model_member->getInsert($data);
            $this->session->set_flashdata('info', 'Data Sukses di Simpan');
        }
        echo json_encode(array('title' => 'Sukses!', 'message' => 'Pendaftaran berhasil! Silahkan login untuk melanjutkan!'));


        //redirect('ui_home');
    }

}
