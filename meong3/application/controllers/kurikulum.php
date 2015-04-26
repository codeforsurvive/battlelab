<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kurikulum extends CI_Controller {

	
	public function __construct() {
			parent::__construct();
			$this->load->model('m_tahun_ajar');
			$this->load->model('m_kurikulum');
		}

		public function index() {
			
		}

		/*-- DINAS PENDIDIKAN -- */
		public function DataKurikulum(){
			$this->load->model('m_kurikulum');
			$data['judul'] = 'Daftar Pengguna';
			$data['daftar'] = $this->m_kurikulum->_getAll();
			$this->load->view('dispendik/header');
			$this->load->view('dispendik/datakurikulum', $data);
			$this->load->view('dispendik/footer');
		}

		public function ManageKurikulum(){
			$this->load->model('m_kurikulum');
			$data['judul'] = 'Daftar Pengguna';
			//$data['daftar'] = $this->m_kurikulum->_getAll();
			$this->load->view('dispendik/header');
			$this->load->view('dispendik/ManageKurikulum');
			$this->load->view('dispendik/footer');
		}

		public function insert() {
			$data['judul'] = 'Data Pengguna [Tambah]';
			$this->load->view('v_pengguna_add', $data);
		}

		public function doInsert() {
			$this->load->model('m_pengguna','',TRUE);
			$this->m_pengguna->doInsert();
			redirect('c_user/index');
		}


		public function edit($id_pengguna) {
			$data['judul'] = 'Data Pengguna [Edit]';
			$data['daftar'] = $this->m_pengguna->edit($id_pengguna);
			$this->load->view('v_pengguna_edit',$data);
		}

		public function doEdit() {
			$this->load->model('m_pengguna','',TRUE);
			$this->m_pengguna->doEdit();
			redirect('c_user/index');
		}

		public function doDelete($id_pengguna) {
			$this->load->model('m_pengguna','',TRUE);
			$this->m_pengguna->doDelete($id_pengguna);
			redirect('c_user/index');
		}
}

