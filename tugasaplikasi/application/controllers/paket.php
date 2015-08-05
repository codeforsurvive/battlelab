<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require dirname(__FILE__) . '/AdminController.php';

class Paket extends AdminController {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_module');
        $this->load->model('model_product');
        $this->load->model('model_detail_paket');
        $this->load->model('model_paket');
    }

    public function index() {
        //$this->model_squrity->getSqurity();
        $isi['content'] = 'paket/tampilan_paket';
        $isi['judul'] = 'Menu';
        $isi['sub_judul'] = 'Paket';
        $isi['data'] = $this->model_paket->getViewSatu();
        $data = $isi['data'];
        foreach ($data->result() as $row) {
            $tampil = $this->model_paket->getViewPaket($row->id_paket, $row->id_product)->result_array();
            $index = $row->id_paket . "_" . $row->id_product;
            $isi['paket_module'][$index] = $tampil;
        }
        $this->load->view('halaman_home', $isi);
    }

    public function getModuleByPaket($composite_id) {
        // 1_2
        $arr = explode("_", $composite_id);
        echo json_encode($this->model_paket->getViewPaket($arr[0], $arr[1])->result_array());
    }

    public function tambah() {
        //$this->model_squrity->getSqurity();
        $isi['content'] = 'paket/form_tambahpaket';
        $isi['judul'] = 'Menu';
        $isi['sub_judul'] = 'Tambah Paket';
        $isi['nama_paket'] = $this->model_paket->getAll();
        $isi['nama_module'] = $this->model_module->getAll();
        $isi['nama_product'] = $this->model_product->getAll();
        $this->load->view('halaman_home', $isi);
    }

    public function edit() {
        // $this->model_squrity->getSqurity();
        $isi['content'] = 'paket/form_editpaket';
        $isi['judul'] = 'Menu';
        $isi['sub_judul'] = 'Edit Paket';

        $key = $this->uri->segment(3); // 1_2
        $tmp = explode("_", $key);
        $id_paket = $tmp[0];
        $id_product = $tmp[1];
        $query = $this->model_paket->getViewPaket($id_paket, $id_product);
        //print_r($query->result_array());
        //die();
        if ($query->num_rows() > 0) {
            foreach ($query->result()as $row) {
                $isi['id_paket'] = $row->id_paket;
                $isi['module'] = $this->model_product->getModuleByProduct($id_product);
                $module = $isi['module'];
                $checked = array();
                foreach ($module as $m):
                    if ($this->model_paket->hasModule($id_paket, $id_product, $m['id_module']))
                        $checked[$m['id_module']] = 'checked';
                    else
                        $checked[$m['id_module']] = '';
                endforeach;
                $isi['selected_module'] = $checked;
                $isi['id_product'] = $row->id_product;
                $isi['nama_paket'] = $row->nama_paket;
                $isi['nama_product'] = $row->nama_product;
            }
        } else {
            $isi['id_paket'] = "";
            $isi['id_module'] = "";
            $isi['id_product'] = "";
            $isi['nama_paket'] = "";
            $isi['nama_product'] = "";
        }
        $this->load->view('halaman_home', $isi);
    }

    public function simpan() {
        // $this->model_squrity->getSqurity();
        $id_module = $this->input->post('id_module');
        $this->session->set_flashdata('info', 'Data Sukses di Simpan');
        if (sizeof($id_module) > 0) {
            for ($i = 0; $i < sizeof($id_module); $i++) {
                $detail = array(
                    'id_product' => $this->input->post('nama_product'),
                    'id_paket' => $this->input->post('nama_paket'),
                    'id_module' => $id_module[$i]
                );
                $this->model_detail_paket->getInsert($detail);
            }
        }

        redirect('paket/index');
    }

    public function delete() {
        //$this->model_squrity->getSqurity();
        $this->load->model('model_paket');
        $key = $this->uri->segment(3);
        $this->db->where('id_paket', $key);
        $query = $this->db->get('mst_paket');
        if ($query->num_rows() > 0) {
            $this->model_paket->getDelete($key);
        }
        redirect('paket');
    }

}

