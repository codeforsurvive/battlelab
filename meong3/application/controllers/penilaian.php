<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Penilaian extends CI_Controller {

	
	public $id_pd;
	public $username;
	public $akses_level ; 

	public function __construct() {
		parent::__construct();
		$this->load->model('m_nilai');
		$this->load->model('m_pd');
		$this->load->model('m_pengguna');
		$this->load->model('m_ptk');
		$this->load->model('m_mengajar');

		$this->id_pd = $this->session->userdata('ID_PENGGUNA');
		$this->username = $this->session->userdata('USERNAME');
		$this->akses_level = $this->session->userdata('AKSES_LEVEL');
	}

	public function index() {
		$this->load->model('m_nilai');
		$data['judul'] = 'Daftar nilai andra';
		$data['daftar'] = $this->m_nilai->rekapAndra();
		$this->load->view('dispendik/header');
		$this->load->view('nilai', $data);
		$this->load->view('dispendik/footer');
	}

	public function DataMasterPenilaian(){
		$this->load->view('dispendik/header');
		$this->load->view('dispendik/DataMasterPenilaian');
		$this->load->view('dispendik/footer');
	}

	public function insert_sekolah() {
		$data['judul'] = 'Data Sekolah [Tambah]';
		$this->load->view('dispendik/header');
		$this->load->view('dispendik/v_sekolah_add', $data);
		$this->load->view('dispendik/footer');
	}

	public function doInsert() {
		$this->load->model('m_sekolah','',TRUE);
		$this->m_sekolah->doInsert();
		redirect('c_sekolah/index');
	}


	public function edit($id_sekolah) {
		$data['judul'] = 'Data Sekolah [Edit]';
		$data['daftar'] = $this->m_sekolah->edit($id_sekolah);
		$data['id_sekolah'] = $id_sekolah;
		$this->load->view('dispendik/header');
		$this->load->view('dispendik/v_sekolah_edit',$data);
		$this->load->view('dispendik/footer');
	}

	public function doEdit() {
		$this->load->model('m_sekolah','',TRUE);
		$this->m_sekolah->doEdit();
		redirect('c_sekolah/index');
	}

	public function doDelete($id_sekolah) {
		$this->load->model('m_sekolah','',TRUE);
		$this->m_sekolah->doDelete($id_sekolah);
		redirect('c_sekolah/index');
	}

	/* -- PENILAIAN ANTAR TEMAN --*/

	public function getMapelList()
    {
        $pilihMapel = $this->m_nilai->getMapelList();
        header('Content-Type: application/json');
        echo json_encode($pilihMapel);
    }

    public function getKIList($mst_id)
    {
        $pilihKI = $this->m_nilai->getKIList($mst_id, $username, $akses_level);
        header('Content-Type: application/json');
        echo json_encode($pilihKI);
        //filter : JIKA dia sebagai GURU MAPEL : maka berhak menilai 4 aspek ( KI 1 sampai KI 4),
        				// jika dia sebagai SISWA : maka dia hanya berhak menikai 2 aspek (KI 1 - KI 2) aspek sikap

        //kalau is_guru = 1 berarti hak GURU
        //kalau is_guru = 0 berarti siswa
    }

    public function getMetodeList($mst_id)
    {
        $pilihMetode = $this->m_nilai->getMetodeList($mst_id);
        header('Content-Type: application/json');
        echo json_encode($pilihMetode);
    }

     public function getIndikatorList($mst_id)
    {
        $pilihIndikator = $this->m_nilai->getIndikatorList($mst_id);
        header('Content-Type: application/json');
        echo json_encode($pilihIndikator);
    }

     public function getKDList($mst_id)
    {
        $pilihKD = $this->m_nilai->getKDList($mst_id);
        header('Content-Type: application/json');
        echo json_encode($pilihKD);
    }

    public function guruMataPelajaran(){
    	//load view guru mapel
        $this->load->view('ptk/header');
        $this->load->view('ptk/penilaian');
        $this->load->view('ptk/footer');

    	//$listMengajar = load model m_ptk->getMengajarKelas()
    		// -- u/ menampilkan guru itu mengajar di kelas apa saja

    	//$dataGuru = load model m_ptk->getDataPenilaiGuru()
    		// -- u/ menampilkan detil data penilai 

    	//$kurikulum = load model m_nilai->getKurikulumType()
    		// -- u/ cek KELAS tersebut menggunakan kurikulum apa
    			//if $kurikulum == 2013
    				// $mapel = load model m_ptk/getMengajarMapel($username)
    					// -- u/ mendapatkan guru tersebut mengajar mapel apa
    				// $pilihKI = redirect cntrlr penilaian/getKIList($mst_id, $kurikulum[2013])
    				// $pilihMetode = redirect cntrlr penilaian/getMetodeList($mst_id, $kurikulum[2013])
    				// $pilihIndikator = redirect cntrlr penilaian/getIndikatorList($mst_id, $kurikulum[2013])
    				// $pilihKD = redirect cntrlr penilaian/getKDList($mst_id, $kurikulum[2013])
    			//else
    				// $mapel = load model m_ptk/getMengajarMapel($username)
    				// $pilihKI = redirect cntrlr penilaian/getKIList($mst_id, $kurikulum[2006])
    				// $pilihIndikator = redirect cntrlr penilaian/getIndikatorList($mst_id, $kurikulum[2006])
    				// $pilihKD = redirect cntrlr penilaian/getKDList($mst_id, $kurikulum[2006])

    	//load model m_nilai->getListStudent_inClass()
    		// -- u/mendapatkan list anak 1 kelas
    		// jadi list siswa ini belum akan muncul kalau tipe penilaian blm dipilih

    	//load model m_nilai->doAssesment_ByTeacher()
    		//proses INSERT NILAI
    }

    public function do_assesment_by_student(){
		$this->load->view('siswa/headerSiswa');
		$this->load->view('siswa/menuSiswa');
		
		$data['dataSiswa']= $this->m_pd->get_data_diri_siswa($this->username);

    	//$kurikulum = load model m_nilai->getKurikulumType()
    		// -- u/ cek KELAS tersebut menggunakan kurikulum apa
    			//if $kurikulum == 2013
    				// $listmapel = redirect cntrlr penilaian/getMapelList($kurikulum[2013])
    				// $pilihKI = redirect cntrlr penilaian/getKIList($mst_id, $kurikulum[2013])
    				// $pilihMetode = redirect cntrlr penilaian/getMetodeList($mst_id, $kurikulum[2013])
    				// $pilihIndikator = redirect cntrlr penilaian/getIndikatorList($mst_id, $kurikulum[2013])
    				// $pilihKD = redirect cntrlr penilaian/getKDList($mst_id, $kurikulum[2013])

    	//load model m_nilai->getListStudent_inClass()
    		// -- u/mendapatkan list anak 1 kelas
    		// jadi list siswa ini belum akan muncul kalau tipe penilaian blm dipilih

    	//load model m_nilai->doAssesment_ByTeacher()
    		//proses INSERT NILAI pada setiap KD. jadi jika ada 2 KD yg dipilih,
			//maka record 2 nilai
		

		$this->load->view('siswa/penilaianSiswa', $data);
		$this->load->view('siswa/footerSiswa');//
	}

    public function waliKelas(){
    	//load view wali kelas
    }

		
}

