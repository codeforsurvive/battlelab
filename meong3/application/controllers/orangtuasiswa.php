<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Orangtuasiswa extends CI_Controller 
{

	public $id_pd;
	public $username;
	public $akses_level ; 

	public function __construct() 
	{
		
		parent::__construct();
		$this->load->library('session');
		$this->load->model('m_pd');
		$this->load->model('m_pengguna');

		$this->id_pd = $this->session->userdata('ID_PENGGUNA');
		$this->username = $this->session->userdata('USERNAME');
		$this->akses_level = $this->session->userdata('AKSES_LEVEL');
		
	}

	/*Peserta Didik fitur*/
	public function index() 
	{
		$this->load->view('siswa/headerSiswa');
		$this->load->view('siswa/menuSiswa');
		$dataSiswa= $this->m_pd->get_data_diri_siswa($this->username);
				
		$this->load->view('siswa/berandaSiswa', $dataSiswa);
		$this->load->view('siswa/footerSiswa');
	}

	
	/*Dinas Pendidikan fitur*/
	public function DataOrangTua()
	{
		$this->load->model('m_ortu');
		$data['judul'] = 'Daftar Peserta Didik';
		$data['daftar'] = $this->m_ortu->getAll_ortu();
		$this->load->view('dispendik/header');
		$this->load->view('dispendik/DataOrangTua', $data);
		$this->load->view('dispendik/footer');
	}

	public function insert_pd() {
		$data['judul'] = 'Data Peserta Didik[Tambah]';
		$this->load->view('dispendik/header');
		$this->load->view('dispendik/v_pd_add', $data);
		$this->load->view('dispendik/footer');
	}

	public function doInsert_pd() 
	{
		$this->load->model('m_pd','',TRUE);
		$this->m_sekolah->doInsert_pd();
		redirect('c_pd/index');
	}


	public function edit_pd($id_pd) 
	{
		$data['judul'] = 'Data Sekolah [Edit]';
		$data['daftar'] = $this->m_pd->edit($id_pd);
		$this->load->view('dispendik/header');
		$this->load->view('dispendik/v_pd_edit',$data);
		$this->load->view('dispendik/footer');
	}

	public function doEdit_pd() 
	{
		$this->load->model('m_pd','',TRUE);
		$this->m_pd->doEdit_pd();
		redirect('c_pd/index');
	}

	public function doDelete_pd($id_pd)
	 {
		$this->load->model('m_pd','',TRUE);
		$this->m_pd->doDelete_pd($id_pd);
		redirect('c_pd/index');
	}

	public function getDetailById($id_pd)
	{
		$this->load->model('m_pd','',TRUE);
		$this->m_pd->getDetailById();
		redirect('c_pd/index');
	}

	public function getDetail($id_pd) 
	{
		$data['daftar'] = $this->m_pd->getDetail($id_pd);
	}
}

