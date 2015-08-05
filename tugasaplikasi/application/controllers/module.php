<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require dirname(__FILE__) . '/AdminController.php';
class Module extends AdminController {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_module');
        $this->load->model('model_product');
        $this->load->model('model_detail_product');
    }
    

    public function index() {
        //$this->model_squrity->getSqurity();
        $isi['content'] = 'module/tampilan_module';
        $isi['judul'] = 'Menu';
        $isi['sub_judul'] = 'Module';
        //$isi['data'] = $this->model_module->getAll();
        $isi['nama_product'] = $this->model_product->getAll();
        $this->load->view('halaman_home', $isi);
    }

    public function getModuleByProduct($product_id){
        echo json_encode($this->model_product->getModuleByProduct($product_id));
    }
    public function tambah() {
        //$this->model_squrity->getSqurity();
        $isi['content'] = 'module/form_tambahmodule';
        $isi['judul'] = 'Menu';
        $isi['sub_judul'] = 'Tambah Module';
        $isi['id_module'] = "";
        $isi['nama_module'] = "";
        $isi['harga_module'] = "";
        $isi['penjelasan'] = "";
        $isi['nama_product'] = $this->model_product->getAll();
        $this->load->view('halaman_home', $isi);
    }

    public function edit() {
        //$this->model_squrity->getSqurity();
        $isi['content'] = 'module/form_editmodule';
        $isi['judul'] = 'Menu';
        $isi['sub_judul'] = 'Edit Module';

        $key = $this->uri->segment(3);
        $this->db->where('id_module', $key);
        $query = $this->db->get('mst_module');
        if ($query->num_rows() > 0) {
            foreach ($query->result()as $row) {
                $isi['id_module'] = $row->id_module;
                $isi['nama_module'] = $row->nama_module;
                $isi['harga_module'] = $row->harga_module;
                $isi['penjelasan'] = $row->penjelasan;
            }
        } else {
            $isi['id_module'] = "";
            $isi['nama_module'] = "";
            $isi['harga_module'] = "";
            $isi['penjelasan'] = "";
        }
        $this->load->view('halaman_home', $isi);
    }

    public function simpan() {
        //$this->model_squrity->getSqurity();

        $key = $this->input->post('id_module');
        $data['id_module'] = $this->input->post('id_module');
        $data['nama_module'] = $this->input->post('nama_module');
        $data['harga_module'] = $this->input->post('harga_module');
        $data['penjelasan'] = $this->input->post('penjelasan');

        $this->load->model('model_module');
        $query = $this->model_module->getModule($key);
        if ($query->num_rows() > 0) {
            $this->model_module->getUpdate($key, $data);
            $this->session->set_flashdata('info', 'Data Sukses di Update');
        } else {
            $last_id = $this->model_module->getInsert($data);
            $this->session->set_flashdata('info', 'Data Sukses di Simpan');
            $detail = array(
                    'id_product' => $this->input->post('nama_product'),
                    'id_module' => $last_id
                );
                $this->model_detail_product->getInsert($detail);
        }
        redirect('module/index');
    }

    public function delete() {
        //$this->model_squrity->getSqurity();
        $this->load->model('model_module');
        $key = $this->uri->segment(3);
        $this->db->where('id_module', $key);
        $query = $this->db->get('mst_module');
        if ($query->num_rows() > 0) {
            $this->model_module->getDelete($key);
        }
        redirect('module');
    }

}

