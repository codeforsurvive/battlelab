<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require dirname(__FILE__) . '/UserController.php';

class Ui_product extends CI_Controller {

    protected $isi;

    public function __construct() {
        parent::__construct();
        $this->load->model('model_pembelian');
        $this->load->model('model_module');
        $this->load->model('model_product');
        $this->load->model('model_template');
        $this->load->model('model_paket');
        $this->load->model('model_detail_paket');
        $this->load->model('model_detail_pembelian');

        $this->load->library('upload');
        $this->load->helper('url');

        $user = $this->session->userdata('user');
        if (!isset($user) || !$user) {
            $this->isi['login'] = FALSE;
            $this->isi['userLogin'] = array();
        } else {
            $this->isi['login'] = TRUE;
            $this->isi['userLogin'] = $user;
        }
    }

    public function index() {
        $this->isi['content'] = 'home-user/ui-product-view';
        $this->isi['data'] = $this->model_product->getAll();
        $this->isi['nama_template'] = $this->model_template->getAll();
        $this->isi['nama_paket'] = $this->model_paket->getAll();
        $this->load->view('halaman_user', $this->isi);
    }

    public function getModuleByPaket($composite_id) {
        // 1_2
        $arr = explode("_", $composite_id);
        echo json_encode($this->model_paket->getViewPaket($arr[0], $arr[1])->result_array());
    }

    public function getHargaPaket($param) {
        $arr = explode("_", $param);
        $harga = $this->model_paket->getHargaPaket($arr[0], $arr[1]);

        echo json_encode(array('harga' => $harga));
    }

    public function emptycart() {
        $cart = array();
        $this->session->set_userdata('cart_item', $cart);
        redirect();
    }

    public function addproduct() {

        $data = array();

        $config = array(
            'allowed_types' => 'jpg|png|gif|bmp',
            'max_size' => 1024 * 8,
            'overwrite' => TRUE,
            'upload_path' => "./upload/"
        );

        $this->upload->initialize($config);
        if (!$this->upload->do_upload('source')) {
            $data['source'] = UPLOAD . $this->input->post('source');
            $this->upload->display_errors();
        } else {


            $image = $this->upload->data();
            $path = UPLOAD . $image['file_name'];
            $data['source'] = $path;
        }

        $user = $this->session->userdata('user');
        $paket = $this->model_paket->getPaket($this->input->post('nama_paket'))->result_array();
        $data['paket'] = $paket[0];
        $data['template'] = $this->input->post('nama_template');
        $product = $this->model_product->getProduct($this->input->post('id_product'))->result_array();
        $data['product'] = $product[0];
        $data['module'] = $this->input->post('id_module');
        $data['module_detail'] = $this->model_paket->getViewPaket($data['paket']['id_paket'], $data['product']['id_product'])->result_array();
        $data['member'] = $user['id_member'];
        $data['harga'] = $this->input->post('harga_tampilan');
        $data['jumlah'] = 1;
        $data['subtotal'] = intval($data['harga']) * intval($data['jumlah']);
        //print_r($data);
        //die();
        //$this->session->set_userdata('cart_item', array());
        if (!$this->session->userdata('cart_item')) {
            $cart = array();
            //array_push($cart, $data);
            $cart[$data['product']['id_product'] . "_" . $data['paket']['id_paket']] = $data;
            $this->session->set_userdata('cart_item', $cart);
        } else {
            $cart = $this->session->userdata('cart_item');
            //array_push($cart, $data);
            $cart[$data['product']['id_product'] . "_" . $data['paket']['id_paket']] = $data;
            $this->session->set_userdata('cart_item', $cart);
        }
        $cart = $this->session->userdata('cart_item');
        redirect('ui_product');
        return $cart;
    }
    
    public function  getcart(){
        $cart = $this->session->userdata('cart_item');
        
        echo json_encode($cart);
    }
    
    public function addchart(){
        $this->addproduct();
        $this->getcart();
    }

    public function deleteproduct() {
        $index = $this->input->post('index');
        $cart = $this->session->userdata('cart_item');
        array_splice($cart, $index, 1);
        
        $this->session->set_userdata('cart_item', $cart);
        
        $this->getcart();
    }

    public function chartproduct() {
        $cart = $this->addproduct();
        //print_r($cart);
        $isi['content'] = 'home-user/ui-card-view';
        $isi['judul'] = 'Menu';
        $isi['sub_judul'] = 'Edit Product';
        $isi['product_modules'] = array();
        $isi['nama_paket'] = $this->model_paket->getAll();
        $key = $this->uri->segment(3);
        $isi['selected'] = $this->model_product->getModuleByProduct($key);
        $isi['module'] = $this->model_product->getModuleByProduct($key);
        $isi['paket'] = $key;
        //$isi['paket'] = $this->model_paket->getViewPaket($id);
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
                $isi['penjelasanP'] = $row->penjelasanP;
            }
        } else {
            $isi['id_product'] = "";
            $isi['nama_product'] = "";
            $isi['source'] = "";
            $isi['penjelasanP'] = "";
            ;
        }

        $isi['data'] = $this->session->userdata('cart_item');
        $isi['login'] = $this->isi['login'];
        $isi['userLogin'] = $this->isi['userLogin'];
        $this->load->view('halaman_user', $isi);
        //print_r($this->session->userdata('cart_item'));
    }

    public function detailproduct() {
//$this->model_squrity->getSqurity();
        $isi['content'] = 'home-user/ui_product_detail';
        $isi['judul'] = 'Menu';
        $isi['sub_judul'] = 'Edit Product';
        $isi['product_modules'] = array();
        $isi['nama_paket'] = $this->model_paket->getAll();
        $isi['nama_template'] = $this->model_template->getAll();
        $key = $this->uri->segment(3);
        $isi['selected'] = $this->model_product->getModuleByProduct($key);
        $isi['module'] = $this->model_product->getModuleByProduct($key);
        $isi['paket'] = $key;
//$isi['paket'] = $this->model_paket->getViewPaket($id);
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
                $isi['penjelasanP'] = $row->penjelasanP;
            }
        } else {
            $isi['id_product'] = "";
            $isi['nama_product'] = "";
            $isi['source'] = "";
            $isi['penjelasanP'] = "";
            ;
        }
        $isi['login'] = $this->isi['login'];
        $isi['userLogin'] = $this->isi['userLogin'];
        $this->load->view('halaman_user', $isi);
    }
    public function laporan () {
        $this->load-view('laporan');
    }

}
