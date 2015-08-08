<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require dirname(__FILE__) . '/AdminController.php';
class Member extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_member');
    }

    public function index() {
        //$this->model_squrity->getSqurity();
        $isi['content'] = 'member/tampilan_member';
        $isi['judul'] = 'Menu';
        $isi['sub_judul'] = 'member';
        $isi['data'] = $this->model_member->getAll();
        $this->load->view('halaman_home', $isi);
    }

    public function getAll() {
        echo json_encode($this->model_member->getAll());
    }

    public function tambah() {
        //$this->model_squrity->getSqurity();

        $isi['content'] = 'member/form_tambahmember';
        $isi['judul'] = 'Menu';
        $isi['sub_judul'] = 'Tambah Member';
        $isi['id_member'] = "";
        $isi['nama'] = "";
        $isi['telp'] = "";
        $isi['email'] = "";
        $isi['password'] = "";
        $this->load->view('halaman_home', $isi);
    }

    public function edit() {
        //$this->model_squrity->getSqurity();
        $isi['content'] = 'member/form_editmember';
        $isi['judul'] = 'Menu';
        $isi['sub_judul'] = 'Edit Member';

        $key = $this->uri->segment(3);
        $this->db->where('id_member', $key);
        $query = $this->db->get('mst_member');
        if ($query->num_rows() > 0) {
            foreach ($query->result()as $row) {
                $isi['id_member'] = $row->id_member;
                $isi['nama'] = $row->nama;
                $isi['telp'] = $row->telp;
                $isi['email'] = $row->email;
                $isi['password'] = $row->password;
            }
        } else {
            $isi['id_member'] = "";
            $isi['nama'] = "";
            $isi['telp'] = "";
            $isi['email'] = "";
            $isi['password'] = "";
            $this->load->view('halaman_home', $isi);
        }
        $this->load->view('halaman_home', $isi);
    }

    public function simpan() {
        //$this->model_squrity->getSqurity();

        $key = $this->input->post('id_member');
        $data['id_member'] = $this->input->post('id_member');
        $data['nama'] = $this->input->post('nama');
        $data['telp'] = $this->input->post('telp');
        $data['email'] = $this->input->post('email');
        $data['password'] = $this->input->post('password');

        $this->load->model('model_member');
        $query = $this->model_member->getMember($key);
        if ($query->num_rows() > 0) {
            $this->model_member->getUpdate($key, $data);
            $this->session->set_flashdata('info', 'Data Sukses di Update');
        } else {
            $this->model_member->getInsert($data);
            $this->session->set_flashdata('info', 'Data Sukses di Simpan');
        }
        redirect('member/index');
    }

    public function delete() {
        //$this->model_squrity->getSqurity();
        $this->load->model('model_member');
        $key = $this->uri->segment(3);
        $this->db->where('id_member', $key);
        $query = $this->db->get('mst_member');
        if ($query->num_rows() > 0) {
            $this->model_member->getDelete($key);
        }
        redirect('member');
    }

}


