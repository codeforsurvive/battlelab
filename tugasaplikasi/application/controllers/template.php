<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require dirname(__FILE__) . '/AdminController.php';
class Template extends AdminController {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_template');
        $this->load->library('upload');
    }

    public function index() {
        //$this->model_squrity->getSqurity();
        $isi['content'] = 'template/tampilan_template';
        $isi['judul'] = 'Menu';
        $isi['sub_judul'] = 'Template';
        $isi['data'] = $this->model_template->getAll();
        $this->load->view('halaman_home', $isi);
    }

    public function tambah() {
        //$this->model_squrity->getSqurity();
        $isi['content'] = 'template/form_tambahtemplate';
        $isi['judul'] = 'Menu';
        $isi['sub_judul'] = 'Tambah template';
        $isi['id_template'] = "";
        $isi['nama_template'] = "";
        $isi['penjelasan'] = "";
        $isi['source'] = "";
        $isi['url'] = "";
        $this->load->view('halaman_home', $isi);
    }

    public function edit() {
        //$this->model_squrity->getSqurity();
        $isi['content'] = 'template/form_edittemplate';
        $isi['judul'] = 'Menu';
        $isi['sub_judul'] = 'Edit Template';

        $key = $this->uri->segment(3);
        $this->db->where('id_template', $key);
        $query = $this->db->get('mst_template');
        if ($query->num_rows() > 0) {
            foreach ($query->result()as $row) {
                $isi['id_template'] = $row->id_template;
                $isi['nama_template'] = $row->nama_template;
                $isi['penjelasan'] = $row->penjelasan;
                $isi['source'] = $row->source;
                $isi['url'] = $row->url;
            }
        } else {
            $isi['id_template'] = "";
            $isi['nama_template'] = "";
            $isi['penjelasan'] = "";
            $isi['source'] = "";
            $isi['url'] = "";
        }
        $this->load->view('halaman_home', $isi);
    }

    public function simpan() {
        //$this->model_squrity->getSqurity();
        $key = $this->input->post('id_template');
        $data['id_template'] = $this->input->post('id_template');
        $data['nama_template'] = $this->input->post('nama_template');
        $data['penjelasan'] = $this->input->post('penjelasan');

        $config = array(
            'allowed_types' => 'jpg|png|gif|bmp',
            'max_size' => 1024 * 8,
            'encrypt_name' => True,
            'overwrite' => true,
            'upload_path' => "./upload/"
        );

        $this->upload->initialize($config);
        if (!$this->upload->do_upload('source')) {
            echo $this->upload->display_errors();
            return;
        }
        $image = $this->upload->data();
        $path = UPLOAD . $image['file_name'];
        $data['url'] = $path;
        $data['source'] = $path;

        $this->load->model('model_template');
        $query = $this->model_template->getTemplate($key);
        if ($query->num_rows() > 0) {
            $this->model_template->getUpdate($key, $data);
            $this->session->set_flashdata('info', 'Data Sukses di Update');
        } else {
            $this->model_template->getInsert($data);
            $this->session->set_flashdata('info', 'Data Sukses di Simpan');
        }
        redirect('template/index');
    }

    public function delete() {
        //$this->model_squrity->getSqurity();
        $this->load->model('model_template');
        $key = $this->uri->segment(3);
        $this->db->where('id_template', $key);
        $query = $this->db->get('mst_template');
        if ($query->num_rows() > 0) {
            $this->model_template->getDelete($key);
        }
        redirect('template');
    }
     public function simpanedit() {
        //$this->model_squrity->getSqurity();
        $key = $this->input->post('id_template');
        $data['nama_template'] = $this->input->post('nama_template');
        $data['penjelasan'] = $this->input->post('penjelasan');
        $data['url'] = $this->input->post('url');

        $config = array(
            'allowed_types' => 'jpg|png|gif|bmp',
            'max_size' => 1024 * 8,
            'encrypt_name' => True,
            'overwrite' => TRUE,
            'upload_path' => "./upload/"
        );

        $this->upload->initialize($config);
        if (!$this->upload->do_upload('source')) {
            $data['source'] = $this->input->post('source_path');
            $this->upload->display_errors();
            
        }else{
            
        
        $image = $this->upload->data();
        $path = UPLOAD . $image['file_name'];
        $data['source'] = $path;
        
        
        }
        $this->load->model('model_template');
        
        
            $this->model_template->getUpdate($key, $data);
            $this->session->set_flashdata('info', 'Data Sukses di Update');
         
        redirect('template/index');
    }

}

