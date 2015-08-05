<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require dirname(__FILE__) . '/AdminController.php';
class Product extends AdminController  {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_product');
        $this->load->model('model_module');
        $this->load->model('model_detail_product');
        $this->load->library('upload');
    }

    public function index() {
        //$this->model_squrity->getSqurity();
        $isi['content'] = 'product/tampilan_product';
        $isi['judul'] = 'Menu';
        $isi['sub_judul'] = 'Product';
        $isi['data'] = $this->model_product->getAll();
        $isi['product_modules'] = array();
        foreach ($isi['data']->result_array() as $pr) {
            $data = $this->model_product->getModuleByProduct($pr['id_product']);
            $isi['product_modules'][$pr['id_product']] = $data;
        }

        $this->load->view('halaman_home', $isi);
    }

    public function tambah() {

        //$this->model_squrity->getSqurity();
        $isi['content'] = 'product/form_tambahproduct';
        $isi['judul'] = 'Menu';
        $isi['sub_judul'] = 'Tambah product';
        $isi['id_product'] = "";
        $isi['id_module'] = $this->session->userdata('id_module');
        $isi['nama_product'] = "";
        $isi['source'] = "";
        $isi['penjelasanP'] = "";
        $isi['module'] = $this->model_module->getAll()->result_array();
        $this->load->view('halaman_home', $isi);
    }
    
   

    public function edit() {
        //$this->model_squrity->getSqurity();
        $isi['content'] = 'product/form_editproduct';
        $isi['judul'] = 'Menu';
        $isi['sub_judul'] = 'Edit Product';
        $isi['product_modules'] = array();
        $key = $this->uri->segment(3);
        $isi['selected'] = $this->model_product->getModuleByProduct($key);
        $isi['module'] = $this->model_product->getModuleByProduct($key);
        $modules = $isi['module'];
        $checked_status  = array();
        foreach ($modules as $m):
            if($this->model_product->hasModule($key, $m['id_module'])){
                $checked_status[$m['id_module']] = "checked";
            }
            else {
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
                $isi['penjelasanP'] = $row->penjelasanP;
            }
        } else {
            $isi['id_product'] = "";
            $isi['nama_product'] = "";
            $isi['source'] = "";
            $isi['penjelasanP'] = "";
            ;
        }
        $this->load->view('halaman_home', $isi);
    }

    public function simpan() {
        //$this->model_squrity->getSqurity();
        $key = $this->input->post('id_product');
        //$data['id_product'] = $this->input->post('id_product');
        $id_module = $this->input->post('id_module');
        //print_r($id_module);
        //die();
        $data['nama_product'] = $this->input->post('nama_product');
        $data['penjelasanP'] = $this->input->post('penjelasanP');

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
        $this->load->model('model_product');
        $last_id = $this->model_product->getInsert($data);
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
                    'id_product' => $last_id,
                    'id_module' => $id_module[$i]
                );
                $this->model_detail_product->getInsert($detail);
            }
        }
        redirect('product/index');
    }

    public function delete() {
        //$this->model_squrity->getSqurity();
        $this->load->model('model_product');
        $key = $this->uri->segment(3);
        $this->db->where('id_product', $key);
        $query = $this->db->get('mst_product');
        if ($query->num_rows() > 0) {
            $this->model_product->getDelete($key);
        }
        redirect('product');
    }

    public function simpanedit() {
        //$this->model_squrity->getSqurity();
        $key = $this->input->post('id_product');
        $data['nama_product'] = $this->input->post('nama_product');
        $id_module = $data ['id_module'];
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
        $this->load->model('model_product');

        
          $this->model_product->getUpdate($key, $data);
          $this->session->set_flashdata('info', 'Data Sukses di Update');
         
        
        /*
        $this->model_detail_product->deleteModulesByProduct($key);
        
        if (sizeof($id_module) > 0) {
            for ($i = 0; $i < sizeof($id_module); $i++) {
                $detail = array(
                    'id_product' => $key,
                    'id_module' => $id_module[$i]
                );
                $this->model_detail_product->getInsert($detail);
            }
        }
         * */
         
        redirect('product/index');
    }
public function GetModuleByProduct($id){
        echo json_encode($this->model_product->getModuleByProduct($id));
        
    }
    
    

}

