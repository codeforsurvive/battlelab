<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require dirname(__FILE__) . '/AdminController.php';

class Pembelian extends AdminController {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_pembelian');
        $this->load->model('model_module');
        $this->load->model('model_product');
        $this->load->model('model_template');
        $this->load->model('model_paket');
        $this->load->model('model_detail_pembelian');
        $this->load->library('upload');
        $this->load->helper('url');
    }

    public function getModule($id) {
        return $this->model_pembelian->getViewPembelian($id);
    }

    public function index() {
        //$this->model_squrity->getSqurity();
        $isi['content'] = 'pembelian/tampilan_pembelian';
        $isi['judul'] = 'Menu';
        $isi['sub_judul'] = 'Pembelian';
        $isi['data'] = $this->model_pembelian->getViewSatu();
        $data = $isi['data'];
        foreach ($data->result() as $row) {
            $tampil = $this->model_pembelian->getViewPilih($row->id_pembelian, $row->id_product, $row->id_paket)->result_array();
            //$tampil = $this->getModule($row->id_product)->result_array();
            $isi['product_modules'][$row->id_pembelian . "_" . $row->id_product . "_" . $row->id_paket] = $tampil;
        }//print_r($isi);
        $this->load->view('halaman_home', $isi);
    }

    public function tambah() {

        //$this->model_squrity->getSqurity();
        $isi['content'] = 'pembelian/form_tambahpembelian';
        $isi['judul'] = 'Menu';
        $isi['sub_judul'] = 'Tambah Pembelian';
        $isi['source'] = "";
        $isi['tanggal_pemesanan'] = "";
        $isi['harga_aplikasi'] = "";
        $isi['nama_product'] = $this->model_product->getAll();
        $isi['nama_template'] = $this->model_template->getAll();
        $isi['nama_paket'] = $this->model_paket->getAll();
        $isi['module'] = $this->model_module->getAll();
        $this->load->view('halaman_home', $isi);
    }

    public function edit() {
        // $this->model_squrity->getSqurity();
        $isi['content'] = 'pembelian/form_editpembelian';
        $isi['judul'] = 'Menu';
        $isi['sub_judul'] = 'Edit Pembelian';
        $isi['product_modules'] = array();
        $key = $this->uri->segment(3);
        $pembelian = $this->model_pembelian->getModuleByProduct($key);
        //print_r($pembelian);
        //print_r(sizeof($pembelian));
        //die();
        //$isi['pembelian'] = $pembelian;
        $isi['selected'] = $this->model_detail_pembelian->getById($key)->result_array();
        if (sizeof($pembelian) > 0) {
            $isi['module'] = $this->model_product->getModuleByProduct($pembelian[0]['id_product']); //$this->model_pembelian->getViewPembelian($pembelian[0]['id_product'])->result_array();
        } else {
            $isi['module'] = array();
        }
        $modules = $isi['module'];
        //print_r($modules);
        //die();
        $checked_status = array();
        foreach ($modules as $m):
            if ($this->model_pembelian->hasModule($key, $m['id_module'])) {
                $checked_status[$m['id_module']] = "checked";
            } else {
                $checked_status[$m['id_module']] = '';
            }
        endforeach;
        //print_r($checked_status);
        //die();

        $isi['checked'] = $checked_status;

        $this->db->where('id_pembelian', $key);
        $query = $this->db->get('view_pembelian');
        if ($query->num_rows() > 0) {
            foreach ($query->result()as $row) {
                $isi['id_pembelian'] = $row->id_pembelian;
                $isi['id_paket'] = $row->id_paket;
                $isi['id_product'] = $row->id_product;
                $isi['id_member'] = $row->id_member;
                $isi['id_template'] = $row->id_template;
                $isi['nama_product'] = $row->nama_product;
                $isi['nama_paket'] = $row->nama_paket;
                $isi['source'] = $row->source;
            }
        } else {
            $isi['id_pembelian'] = $row->id_pembelian;
            $isi['id_paket'] = $row->id_paket;
            $isi['id_product'] = $row->id_product;
            $isi['id_member'] = $row->id_member;
            $isi['id_template'] = $row->id_template;
            $isi['nama_product'] = $row->nama_product;
            $isi['nama_paket'] = $row->nama_paket;
            $isi['source'] = $row->source;
        }
        $this->load->view('halaman_home', $isi);
    }

    public function simpan() {
        //$this->model_squrity->getSqurity();
        $key = $this->input->post('id_pembelian');
        $id_module = $this->input->post('id_module');
        //print_r($id_module);
        //die();
        $data['id_member'] = $this->session->userdata('id_member');
        $data['harga_aplikasi'] = $this->input->post('harga_aplikasi');
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
        $data['source'] = $path;
        $data['flag_active'] = 1;
        $data['tanggal_pemesanan'] = date("Y-m-d");
        $this->load->model('model_pembelian');
        $last_id = $this->model_pembelian->getInsert($data);
        /*
          $query = $this->model_product->getProduct($key);
          if ($query->num_rows() > 0) {
          $this->model_product->getUpdate($key, $data);
          $this->session->set_flashdata('info', 'Data Sukses di Update');
          } else {
          $this->model_product->getInsert($data);
          $this->session->set_flashdata('info', 'Data Sukses di Simpan');
          }
         */
        if (sizeof($id_module) > 0) {
            for ($i = 0; $i < sizeof($id_module); $i++) {
                $detail = array(
                    'id_member' => $this->session->userdata('id_member'),
                    'id_product' => $this->input->post('nama_product'),
                    'id_module' => $id_module[$i],
                    'id_pembelian' => $last_id,
                    'id_paket' => $this->input->post('nama_paket'),
                    'id_template' => $this->input->post('nama_template')
                );
                $this->model_detail_pembelian->getInsert($detail);
            }
        }
        redirect('pembelian/index');
    }

    public function delete() {
        //$this->model_squrity->getSqurity();
        $this->load->model('model_pembelian');
        $key = $this->uri->segment(3);
        $this->db->where('id_pembelian', $key);
        $query = $this->db->get('mst_pembelian');
        if ($query->num_rows() > 0) {
            $this->model_pembelian->getDelete($key);
        }
        redirect('pembelian');
    }

    public function simpanedit() {
        //$this->model_squrity->getSqurity();
        $key = $this->input->post('id_pembelian');
        $data['id_template'] = $this->input->post('id_template');
        $data['id_product'] = $this->input->post('id_pembelian');
        $data['id_module'] = $this->input->post('id_module');
        $id_module = $data['id_module'];
        //$data['nama_product'] = $this->input->post('nama_product');
        $data['harga_aplikasi'] = $this->input->post('harga_aplikasi');
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
        } else {


            $image = $this->upload->data();
            $path = UPLOAD . $image['file_name'];
            $data['source'] = $path;
        }
        $this->load->model('model_pembelian');

        /*
          $this->model_template->getUpdate($key, $data);
          $this->session->set_flashdata('info', 'Data Sukses di Update');
         */
        $this->model_detail_pembelian->deleteModulesByPembelian($key);

        if (sizeof($id_module) > 0) {
            for ($i = 0; $i < sizeof($id_module); $i++) {
                $detail = array(
                    'id_member' => $this->session->userdata('id_member'),
                    'id_product' => $this->input->post('id_product'),
                    'id_module' => $id_module[$i],
                    'id_pembelian' => $key,
                    'id_template' => $this->input->post('id_template')
                );
                $this->model_detail_pembelian->getInsert($detail);
            }
        }

        redirect('pembelian/index');
    }

    public function detail() {
        //$this->model_squrity->getSqurity();
        $isi['content'] = 'pembelian/tampilan_detail';
        $isi['judul'] = 'Menu';
        $isi['sub_judul'] = 'Detail Pembelian';
        $isi['product_modules'] = array();
        $key = $this->uri->segment(3);
        $pembelian = $this->model_pembelian->getModuleByProduct($key);
        $isi['selected'] = $this->model_detail_pembelian->getById($key)->result_array();
        $isi['checked'] = $checked_status;
        $this->db->where('id_pembelian', $key);
        $query = $this->db->get('view_pembelian');
        if ($query->num_rows() > 0) {
            foreach ($query->result()as $row) {
                $isi['id_pembelian'] = $row->id_pembelian;
                $isi['id_member'] = $row->id_member;
                $isi['nama'] = $row->nama;
                $isi['telp'] = $row->telp;
                $isi['nama'] = $row->nama;
                $isi['id_product'] = $row->id_product;
                $isi['nama_product'] = $row->nama_product;
                $isi['nama_module'] = $row->nama_module;
                $isi['nama_template'] = $row->nama_template;
                $isi['nama_product'] = $row->nama_product;
                $isi['tanggal_pemesanan'] = $row->tanggal_pemesanan;
                $isi['source'] = $row->source;
            }
        } else {
            $isi['id_pembelian'] = $row->id_pembelian;
            $isi['id_member'] = $row->id_member;
            $isi['nama'] = $row->nama;
            $isi['telp'] = $row->telp;
            $isi['nama'] = $row->nama;
            $isi['id_product'] = $row->id_product;
            $isi['nama_product'] = $row->nama_product;
            $isi['nama_module'] = $row->nama_module;
            $isi['nama_template'] = $row->nama_template;
            $isi['nama_product'] = $row->nama_product;
            $isi['tanggal_pemesanan'] = $row->tanggal_pemesanan;
            $isi['source'] = $row->source;
        }
        $this->load->view('halaman_home', $isi);
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

}
