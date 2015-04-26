<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Wilayah extends CI_Controller {

	
	public function __construct() {
			parent::__construct();
			$this->load->model('m_wilayah');
		}

		/* DINAS PENDIDIKAN */

		public function getAll_kota() {
			$this->load->model('m_kota');
			$data['judul'] = 'Data Kota/Kabupaten';
			$data['daftar'] = $this->m_kota->getAll_kota();
			$this->load->view('v_daftar_kota', $data);
		}

		public function insert_kota() {
			$data['judul'] = 'Data Kota/Kabupaten [Tambah]';
			$this->load->view('v_kota_add.php', $data);
		}

		public function doInsert_kota() {
			$this->load->model('m_kota','',TRUE);
			$this->m_kota->doInsert_kota();
			redirect('c_daerah/index');
		}

		public function edit_kota($id_kotakab) {
			$data['judul'] = 'Data Kota/Kabupaten [Edit]';
			$data['daftar'] = $this->m_kota->edit_kota($id_kotakab);
			$this->load->view('v_kota_edit',$data);
		}

		public function doEdit_kota() {
			$this->load->model('m_kota','',TRUE);
			$this->m_kota->doEdit_kota();
			redirect('c_daerah/index');
		}

		public function doDelete_kota($id_kotakab) {
			$this->load->model('m_kota','',TRUE);
			$this->m_kota->doDelete_kota($id_kotakab);
			redirect('c_daerah/index');
		}

		/* this is CRUD master_kecamatan */
		public function index() {
			$this->load->model('m_kecamatan');
			$data['judul'] = 'Data Kecamatan';
			$data['daftar'] = $this->m_kecamatan->getAll_kecamatan();
			$this->load->view('v_daftar_kecamatan', $data);
		}

		
}

