<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rombel extends CI_Controller 
{

	public $id_pd;
	public $username;
	public $akses_level ; 

	public function __construct() 
	{
		
		parent::__construct();
		$this->load->library('session');
		$this->load->model('m_ptk');
		$this->load->model('m_pengguna');

		$this->id_ptk = $this->session->userdata('ID_PENGGUNA');
		$this->username = $this->session->userdata('USERNAME');
		$this->akses_level = $this->session->userdata('AKSES_LEVEL');
		
	}

	public function kelolaDataRombel(){
		$this->load->view('ptk/header');
		$this->load->view('ptk/menuPihakSekolah');
		$this->load->view('ptk/kelolaRombel');
		$this->load->view('ptk/footer');

		
	}

	
}

