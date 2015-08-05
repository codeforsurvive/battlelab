<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require dirname(__FILE__) . '/UserController.php';

class Ui_module extends CI_Controller {

    protected $isi;

    public function __construct() {
        parent::__construct();
        $this->load->model('model_module');
        $this->load->model('model_product');
        $this->load->model('model_detail_product');

        $user = $this->session->userdata('user');
        if (!isset($user) || !$user) {
            $this->isi['login'] = FALSE;
        } else {
            $this->isi['login'] = TRUE;
            $this->isi['userLogin'] = $user;
        }
    }

    public function index() {
        $this->isi['content'] = 'home-user/ui-module-view';
        $this->isi['nama_product'] = $this->model_product->getAll();
        $this->load->view('halaman_user', $this->isi);
    }

    public function detailmodule() {
        //$this->model_squrity->getSqurity();
        $isi['content'] = 'home-user/ui_module_detail';
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
        $this->load->view('halaman_user', $isi);
    }

}
