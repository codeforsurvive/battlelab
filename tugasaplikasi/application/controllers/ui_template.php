<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require dirname(__FILE__) . '/UserController.php';

class Ui_template extends CI_Controller {

    protected $isi;

    public function __construct() {
        parent::__construct();
        $this->load->model('model_template');

        $user = $this->session->userdata('user');
        if (!isset($user) || !$user) {
            $this->isi['login'] = FALSE;
        } else {
            $this->isi['login'] = TRUE;
            $this->isi['userLogin'] = $user;
        }
    }

    public function index() {
        $this->isi['content'] = 'home-user/ui-template-view';
        $this->isi['data'] = $this->model_template->getAll();
        $this->load->view('halaman_user', $this->isi);
    }

    public function detailtemplate() {
        //$this->model_squrity->getSqurity();
        $isi['content'] = 'home-user/ui_product_detail';
        $isi['judul'] = 'Menu';
        $isi['sub_judul'] = 'Edit Product';
        $isi['product_modules'] = array();
        $key = $this->uri->segment(3);
        $isi['selected'] = $this->model_product->getModuleByProduct($key);
        $isi['module'] = $this->model_product->getModuleByProduct($key);
        $modules = $isi['module'];
        $checked_status = array();
        foreach ($modules as $m):
            if ($this->model_product->hasModule($key, $m['id_module'])) {
                $checked_status[$m['id_module']] = "checked";
            } else {
                $checked_status[$m['id_module']] = '';
            }
        endforeach;
        //print_r($checked_status);
        //die();
        $isi['checked'] = $checked_status;
        $this->db->where('id_product', $key);
        $query = $this->db->get('mst_product');
        if ($query->num_rows() > 0) {
            foreach ($query->result()as $row) {
                $isi['id_product'] = $row->id_product;
                $isi['nama_product'] = $row->nama_product;
                $isi['source'] = $row->source;
            }
        } else {
            $isi['id_product'] = "";
            $isi['nama_product'] = "";
            $isi['source'] = "";
            ;
        }
        $this->load->view('halaman_user', $isi);
    }

}
