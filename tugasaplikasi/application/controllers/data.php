<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data extends CI_Controller {
	public function index()
	{
	$this->load->view('form_tambahembelian');
	}
	public function getData()
	{
	$u = $this->input->post('id_member');
	$p = $this->input->post('id_product');
        $t = $this->input->post('id_template');
	$this->load->model('model_data');	
	$this->model_login->getLogin($u,$p,$t);
		}
}
