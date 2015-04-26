<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sekolah extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('m_sekolah');
		$this->load->model('m_wilayah');
	}

	public function index() {
			
	}

	/* DINAS PENDIDIKAN */
	public function DataSekolah(){
		$this->load->model('m_sekolah');
		$data['daftar'] = $this->m_sekolah->getAll_DataSekolah();
		$this->load->view('dispendik/header');
		$this->load->view('dispendik/DataSekolah', $data);
		$this->load->view('dispendik/footer');
	}

	public function editDataSekolah($id_sekolah) {
		$data['judul'] = 'Data Sekolah [Edit]';
		$data['daftar'] = $this->m_sekolah->edit_DataSekolah($id_sekolah);
		$data['id_sekolah'] = $id_sekolah;
		$this->load->view('dispendik/header');
		$this->load->view('dispendik/DataSekolah_Edit',$data);
		$this->load->view('dispendik/footer');
	}

	public function doEdit_DataSekolah() {
		$this->load->model('m_sekolah','',TRUE);
		$id_sekolah = $this->input->post('id_sekolah');
		$data = array (
				'KODE_WILAYAH' => $this->input->post('kode_wilayah'),
				'NSS_SEKOLAH' => $this->input->post('nss'),
				'NPSN_SEKOLAH' => $this->input->post('npsn_sekolah'),
				'NAMA_SEKOLAH' => $this->input->post('nama_sekolah'),
				'ALAMAT_SEKOLAH' => $this->input->post('alamat_sekolah'),
				'NOTELP_SEKOLAH' => $this->input->post('notelp_sekolah')
			);
		$this->m_sekolah->doEdit_DataSekolah($id_sekolah,$data);
		redirect('sekolah/DataSekolah');
	}

	public function tambahDataSekolah() {
		$data['judul'] = 'Data Sekolah [Tambah]';
		$data['listWilayah'] = $this->m_wilayah->getWilayah();
		$this->load->view('dispendik/header');
		$this->load->view('dispendik/DataSekolah_Add', $data);
		$this->load->view('dispendik/footer');
	}

	public function getKecamatanList($mst_id)
    {
        $pilihKecamatan = $this->m_sekolah->getKecamatanList($mst_id);
        header('Content-Type: application/json');
        echo json_encode($pilihKecamatan);
    }

     public function getKelurahanList($mst_id)
    {
        $pilihKelurahan = $this->m_sekolah->getKelurahanList($mst_id);
        header('Content-Type: application/json');
        echo json_encode($pilihKelurahan);
    }

	public function doInsert() {
		$this->load->model('m_sekolah','',TRUE);
		$this->m_sekolah->doInsert();
		redirect('sekolah/index');
	}


	

	

	public function doDelete($id_sekolah) {
		$this->load->model('m_sekolah','',TRUE);
		$this->m_sekolah->doDelete($id_sekolah);
		redirect('sekolah/index');
	}

	public function getDetailById($id_sekolah)
	{
		$this->load->model('m_sekolah','',TRUE);
		$this->m_sekolah->getDetailById();
		redirect('sekolah/index');
	}

	public function getDetail($id_sekolah) {
		$data['daftar'] = $this->m_sekolah->getDetail($id_sekolah);
	}	
		
}

