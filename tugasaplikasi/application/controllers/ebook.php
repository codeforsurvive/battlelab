<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ebook extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_ebook');
        $this->load->library('upload');
    }

    public function index() {
        $this->model_squrity->getSqurity();
        $isi['content'] = 'ebook/tampilan_ebook';
        $isi['judul'] = 'Menu';
        $isi['sub_judul'] = 'Ebook';
        $isi['data'] = $this->model_ebook->getAll();
        $this->load->view('halaman_home', $isi);
    }

    public function tambah() {
        $this->model_squrity->getSqurity();
        $isi['content'] = 'ebook/form_tambahebook';
        $isi['judul'] = 'Menu';
        $isi['sub_judul'] = 'Tambah Ebook';
        $isi['id_ebook'] = "";
        $isi['id_member'] = $this->session->userdata('id_member');
        $isi['nama_ebook'] = "";
        $isi['source'] = "";
        $isi['url'] = "";
        $this->load->view('halaman_home', $isi);
    }

    public function edit() {
        $this->model_squrity->getSqurity();
        $isi['content'] = 'ebook/form_editebook';
        $isi['judul'] = 'Menu';
        $isi['sub_judul'] = 'Edit Ebook';

        $key = $this->uri->segment(3);
        $this->db->where('id_ebook', $key);
        $query = $this->db->get('mst_ebook');
        if ($query->num_rows() > 0) {
            foreach ($query->result()as $row) {
                $isi['id_ebook'] = $row->id_ebook;
                $isi['id_member'] = $row->id_member;
                $isi['nama_ebook'] = $row->nama_ebook;
                $isi['source'] = $row->source;
                $isi['url'] = $row->url;
            }
        } else {
            $isi['id_ebook'] = "";
            $isi['id_member'] = "";
            $isi['nama_ebook'] = "";
            $isi['source'] = "";
            $isi['url'] = "";
            $this->load->view('halaman_home', $isi);
        }
        $this->load->view('halaman_home', $isi);
    }

    public function simpan() {
        $this->model_squrity->getSqurity();
        $key = $this->input->post('id_ebook');
        $data['id_ebook'] = $this->input->post('id_ebook');
        $data['id_member'] = $this->input->post('id_member');
        $data['nama_ebook'] = $this->input->post('nama_ebook');



        $config = array(
            'allowed_types' => 'pdf',
            'max_size' => 0,
            'encrypt_name' => True,
            'overwrite' => true,
            'upload_path' => "./upload/"
        );

        $this->upload->initialize($config);
        if (!$this->upload->do_upload('source')) {
            echo $this->upload->display_errors();
            return;
        }
        $pdf = $this->upload->data();
        $path = UPLOAD . $pdf['file_name'];
        $data['url'] = $path;
        $data['source'] = $path;

        $this->load->model('model_ebook');
        $query = $this->model_ebook->getEbook($key);
        if ($query->num_rows() > 0) {
            $this->model_ebook->getUpdate($key, $data);
            $this->session->set_flashdata('info', 'Data Sukses di Update');
        } else {
            $this->model_ebook->getInsert($data);
            $this->session->set_flashdata('info', 'Data Sukses di Simpan');
        }
        redirect('ebook/index');
    }

    public function delete() {
        $this->model_squrity->getSqurity();
        $this->load->model('model_ebook');
        $key = $this->uri->segment(3);
        $this->db->where('id_ebook', $key);
        $query = $this->db->get('mst_ebook');
        if ($query->num_rows() > 0) {
            $this->model_ebook->getDelete($key);
        }
        redirect('ebook');
    }

    public function simpanedit() {
        $this->model_squrity->getSqurity();
        $key = $this->input->post('id_ebook');
        $data['id_member'] = $this->input->post('id_member');
        $data['nama_ebook'] = $this->input->post('nama_ebook');
        $data['url'] = $this->input->post('url');

        $config = array(
            'allowed_types' => 'pdf',
            'max_size' => 0,
            'encrypt_name' => True,
            'overwrite' => TRUE,
            'upload_path' => "./upload/"
        );
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('source')) {
            $data['source'] = $this->input->post('source_path');
            echo $this->upload->display_errors();
        } else {


            $pdf = $this->upload->data();
            $path = UPLOAD . $pdf['file_name'];
            $data['source'] = $path;
        }
        $this->load->model('model_ebook');


        $this->model_ebook->getUpdate($key, $data);
        $this->session->set_flashdata('info', 'Data Sukses di Update');
       
        redirect('ebook/index');
    }

}

