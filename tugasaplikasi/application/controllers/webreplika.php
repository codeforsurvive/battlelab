<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Webreplika extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_webreplika');
    }

    public function index() {
        $this->model_squrity->getSqurity();
        $isi['content'] = 'webreplika/tampilan_webreplika';
        $isi['judul'] = 'Menu';
        $isi['sub_judul'] = 'webreplika';
        $isi['data'] = $this->model_webreplika->getAll();
        $this->load->view('halaman_home', $isi);
    }

    public function tambah() {
        $this->model_squrity->getSqurity();
        $isi['content'] = 'webreplika/form_tambahwebreplika';
        $isi['judul'] = 'Menu';
        $isi['sub_judul'] = 'Tambah webreplika';
        $isi['id_webreplika'] = "";
        $isi['id_member'] = $this->session->userdata('id_member');
        $isi['script'] = "";
        $isi['nama_webreplika'] = "";
        $this->load->view('halaman_home', $isi);
    }

    public function edit() {
        $this->model_squrity->getSqurity();
        $isi['content'] = 'webreplika/form_editwebreplika';
        $isi['judul'] = 'Menu';
        $isi['sub_judul'] = 'Edit webreplika';

        $key = $this->uri->segment(3);
        $this->db->where('id_webreplika', $key);
        $query = $this->db->get('mst_webreplika');
        if ($query->num_rows() > 0) {
            foreach ($query->result()as $row) {
                $isi['id_webreplika'] = $row->id_webreplika;
                $isi['id_member'] = $row->id_member;
                $isi['script'] = $row->script;
                $isi['nama_webreplika'] = $row->nama_webreplika;
            }
        } else {
            $isi['id_webreplika'] = "";
            $isi['id_member'] = "";
            $isi['script'] = "";
            $isi['nama_webreplika'] = "";
            $this->load->view('halaman_home', $isi);
        }
        $this->load->view('halaman_home', $isi);
    }

    public function simpan() {
        $this->model_squrity->getSqurity();
        $key = $this->input->post('id_webreplika');
        $data['id_webreplika'] = $this->input->post('id_webreplika');
        $data['id_member'] = $this->input->post('id_member');
        $data['script'] = $this->input->post('script');
        $data['nama_webreplika'] = $this->input->post('nama_webreplika');
       
        
        $this->load->model('model_webreplika');
        $query = $this->model_webreplika->getwebreplika($key);
        if ($query->num_rows() > 0) {
            $this->model_webreplika->getUpdate($key, $data);
            $this->session->set_flashdata('info', 'Data Sukses di Update');
        } else {
            $this->model_webreplika->getInsert($data);
            $this->session->set_flashdata('info', 'Data Sukses di Simpan');
        }
        redirect('webreplika/index');
    }

    public function delete() {
        $this->model_squrity->getSqurity();
        $this->load->model('model_webreplika');
        $key = $this->uri->segment(3);
        $this->db->where('id_webreplika', $key);
        $query = $this->db->get('mst_webreplika');
        if ($query->num_rows() > 0) {
            $this->model_webreplika->getDelete($key);
        }
        redirect('webreplika');
    }

}

