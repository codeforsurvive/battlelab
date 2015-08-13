<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * @package		Controller - CIMasterArtcak
 * @author		Felix - Artcak Media Digital
 * @copyright	Copyright (c) 2014
 * @link		http://artcak.com
 * @since		Version 1.0
 * @description
 * Contoh Tampilan administrator dashbard
 */

//dapat diganti extend dengan *contoh Admin_controller / Aplikan_controller di folder core. 
// Nama kelas harus sama dengan nama file php
class Rabs extends Plan_Controller {

    //1. seluruh fungsi yang tidak public, menggunakan awalan '_' , contoh: _getProperty()
    //2. di atas fungsi diberikan penjelasan proses apa yang dilakukan. dari mana ambil data, 
    //inputnya apa dan outputnya apa. contoh di fungsi index()
    //3. Penamaan fungsi harus PUNUK ONTA dengan awalan huruf kecil $ Menggunakan Bahasa Inggris
    //4. Penamaan nama fungsi maksimal 3 kata

    public function __construct() {
        parent::__construct();
        $this->load->model('mAnalisa');
		$this->load->model('mAnalisaRab');
		$this->load->model('mDetailAnalisaRab');
        $this->load->model('master/mSatuanBarang');
		$this->load->model('master/mSatuanUpah');
        $this->load->model('master/mLokasiUpah');
		$this->load->model('rap/mRap');
		$this->load->model('projects/mProject');
		$this->load->model('projects/mMainProject');
        $this->load->model(array('mRab', 'mDetailRab', 'mKategoriPekerjaan', 'mSubcon', 'estimasi/mRabTransaction'));
    }

    /*
     * Digunakan untuk menampilkan dashboard di awal. Setiap tampilan view, harap menggunakan fungsi
     * index(). Pembentukan view terdiri atas:
     * 1. Title
     * 2. Set Partial Header
     * 3. Set Partial Right Top Menu
     * 4. Set Partial Left Menu
     * 5. Body
     * 6. Data-data tambahan yang diperlukan
     * Jika tidak di-set, maka otomatis sesuai dengan default
     */

    public function index() {
        $this->title = "Dashboard Perencanaan";
		$this->data['listMainProject'] = $this->mMainProject->_select(array(mMainProject::ACTIVE => 1));
        $this->display('acRab', $this->data);
    }

    public function add() {
        if ($this->input->post('project_id') == null)
            redirect(base_url() . "projects/project");

        $this->data['project_id'] = $this->input->post('project_id');
        $this->data['estimator_id'] = $this->input->post('estimator_id');
        $this->title = "Dashboard Perencanaan";
        $this->data['satuan_barang'] = $this->mSatuanBarang->_select();
		$this->data['satuan_upah'] = $this->mSatuanUpah->_select();
        $this->data['analisa'] = $this->mAnalisa->_select();
        $this->data['lokasi'] = $this->mLokasiUpah->_select();
        $this->display('acRabAdd', $this->data);
    }

    public function edit() {
        $this->title = "RAB";
        $idRAB = $this->input->post('id_to_edit');
        if ($idRAB == null)
            redirect(base_url() . "projects/project");
        else {
            $this->data['detail_pekerjaan'] = $this->mDetailRab->getDetailPekerjaan($idRAB);
            $this->data['rab'] = $this->mRab->_select(array(mRab::ID => $idRAB));
            $this->data['satuan_barang'] = $this->mSatuanBarang->_select();
			$this->data['satuan_upah'] = $this->mSatuanUpah->_select();
            $this->data['analisa'] = $this->mAnalisa->_select();
            $this->data['lokasi'] = $this->mLokasiUpah->_select();
            $this->display('acRabEdit', $this->data);
        }
    }
    
    private function _isAvailableEstimation($idProject)
    {
        $res = $this->mProject->isAvailableEstimation($idProject);
        //var_dump($res);
        if (empty($res)) return false;
        return true;
    }
    
	public function validasi(){
                
		$idRAB = $this->input->post('id_to_validate');
		$idProject = $this->input->post('project_to_validate');
		$value = $this->input->post('val_to_validate');
                $res = $this->_isAvailableEstimation($idProject);
                if (!$res) 
                {
                    $this->session->set_flashdata("notifStartProject","Mohon lengkapi Estimasi Anda! <a target=\"_blank\" href=\"".base_url()."estimasi/Estimasi\">Klik Di sini </a> ");
                    redirect(base_url()."projects/project/viewDetail/".$idProject);
                }
		if($value=='next'){
			$this->db->query("UPDATE rab_transaction SET VALIDASI_COUNTER = VALIDASI_COUNTER + 1 WHERE RAB_ID = $idRAB");
		} else {
			$this->db->query("UPDATE rab_transaction SET VALIDASI_COUNTER = VALIDASI_COUNTER + 1 WHERE RAB_ID = $idRAB");
			$_updatedRAB = array(
				'RAB_STATUS_APPROVAL_ID' => $value
			);        
			$this->mRab->_update($_updatedRAB, array(mRab::ID => $idRAB));
			
			if($value == 3){
				$_updatedProject = array(
					'PROJECT_STATUS' => 2
				);        
				$this->mProject->_update($_updatedProject, array(mProject::ID => $idProject));
			}
		}
		redirect(base_url()."projects/project/viewDetail/".$idProject);
	}

    public function simpanRAB() {
        //$estimator = $this->_idUserActive;
		$estimatorId=$this->input->post('estimatorID');
        $projectId=$this->input->post('projectID');
		//$namaRAB = $this->input->post('nama');
		//$kodeRAB = $this->input->post('kode');
		$satuanRAB = $this->input->post('satuan');
		$totalRAB = $this->input->post('total');
		$overheadRAB = floatval($this->input->post('total'))*1.05;
		$lokasiRAB = $this->input->post('lokasi');
		$luasRAB = $this->input->post('luas');
        
        $rabActive=1;
        $rabStatus=1;
        $_insertedRAB = array(
            //'RAB_NAMA' => $namaRAB,
            //'RAB_KODE' => $kodeRAB,
            'ESTIMATOR_ID' => $estimatorId,
            'PROJECT_ID' => $projectId,
            'RAB_TOTAL' => $totalRAB,
            'RAB_ACTIVE' => $rabActive,
            'RAB_STATUS_APPROVAL_ID' => $rabStatus,
			'RAB_AFTER_OVERHEAD' => $overheadRAB,
			'LOKASI_UPAH_ID' => $lokasiRAB,
			'LUAS_BANGUNAN' => $luasRAB
		);
                
        //insert into database RAB_Transaction;
        $this->mRab->_insert($_insertedRAB);
        $idNewRAB = $this->mRab->_getRecentID();


        //insert Items of RAB
        $items = json_decode($this->input->post('items'));
        $this->_insertItems($items, $idNewRAB);
		$this->calculatePercentage($idNewRAB);
        echo "success";
    }
	
	public function savetovalidate() {
		$this->title = "RAB";
        $idRAB = $this->input->post('rab_id_to_validate');
		$idProject = $this->input->post('proj_id_to_validate');
                $res = $this->_isAvailableEstimation($idProject);
        if ($idRAB == null)
            redirect(base_url() . "projects/project");
        else if (!$res)
        {
            $this->session->set_flashdata("notifStartProject","Mohon lengkapi Estimasi Anda! <a target=\"_blank\" href=\"".base_url()."estimasi/Estimasi\">Klik Di sini </a> ");
            redirect(base_url()."projects/project/viewDetail/".$idProject);   
        }
        else {
            $_updatedRAB = array(
				'RAB_STATUS_APPROVAL_ID' => 2
			);
					
			$this->mRab->_update($_updatedRAB, array(mRab::ID => $idRAB));
			redirect(base_url()."projects/project/viewDetail/".$idProject);
        }
    }

    public function updateRAB() {
        //$estimator = $this->_idUserActive;
        $projectId=$this->input->post('projectID');
		$idRAB = $this->input->post('id');
		//$namaRAB = $this->input->post('nama');
		//$kodeRAB = $this->input->post('kode');
		$satuanRAB = $this->input->post('satuan');
		$totalRAB = $this->input->post('total');
		$overheadRAB = floatval($this->input->post('total'))*1.05;
		$lokasiRAB = $this->input->post('lokasi');
		$luasRAB = $this->input->post('luas');
        
        $rabActive=1;
        $rabStatus=$this->input->post('status');
        if($rabStatus == 2)
        {
            $resEst = $this->_isAvailableEstimation($projectId);
            $rabStatus = 1;
            $this->session->set_flashdata("notifStartProject","Mohon lengkapi Estimasi Anda! <a target=\"_blank\" href=\"".base_url()."estimasi/Estimasi\">Klik Di sini </a> ");
        }
        $_updatedRAB = array(
            //'RAB_NAMA' => $namaRAB,
            //'RAB_KODE' => $kodeRAB,
            'PROJECT_ID' => $projectId,
            'RAB_TOTAL' => $totalRAB,
            'RAB_ACTIVE' => $rabActive,
            'RAB_STATUS_APPROVAL_ID' => $rabStatus,
			'RAB_AFTER_OVERHEAD' => $overheadRAB,
			'LOKASI_UPAH_ID' => $lokasiRAB,
			'LUAS_BANGUNAN' => $luasRAB
		);
                
        //insert into database RAB_Transaction;
        $this->mRab->_update($_updatedRAB, array(mRab::ID => $idRAB));
        $this->mDetailRab->_delete(array('RAB_ID' => $idRAB));


        //insert Items of RAB
        $items = json_decode($this->input->post('items'));
        $this->_insertItems($items, $idRAB);
		$this->calculatePercentage($idRAB);
        echo "success";
    }

    private function _insertItems($items, $idRAB) {
        foreach ($items as $item) {
            $_insertedKategori = array(
                'KATEGORI_PEKERJAAN_NAMA' => $item->nama_kategori,
                'KATEGORI_PEKERJAAN_URUTAN' => $item->urutan
            );
            $this->mKategoriPekerjaan->_insert($_insertedKategori);
            $idNewKategori = $this->mKategoriPekerjaan->_getRecentID();

            foreach ($item->items as $it) {
                if ($it->id == "SUB" || $it->id == "LSM" || $it->id == "LSU") {
					$tipe_id = $this->getSubconTipeID($it->id);
					$_insertedNewSubcon = array();
					if($it->id== "LSU" ) 
						$_insertedNewSubcon = array(
							'SUBCON_NAMA' => $it->nama,
							'SUBCON_HARGA' => $it->harga,
							'SUBCON_KETERANGAN' => $it->keterangan,
							'SATUAN_UPAH_ID' => $it->satuan,
							'SUBCON_TIPE_ID' => $tipe_id
						);
					else 
						$_insertedNewSubcon = array(
							'SUBCON_NAMA' => $it->nama,
							'SUBCON_HARGA' => $it->harga,
							'SUBCON_KETERANGAN' => $it->keterangan,
							'SATUAN_NAMA' => $it->satuan,
							'SUBCON_TIPE_ID' => $tipe_id
						);
                    $this->mSubcon->_insert($_insertedNewSubcon);
                    $idNewSubcon = $this->mSubcon->_getRecentID();

                    $_insertedDetailPekerjaan = array(
                        'KATEGORI_PEKERJAAN_ID' => $idNewKategori,
                        'SUBCON_ID' => $idNewSubcon,
                        'RAB_ID' => $idRAB,
                        'DETAIL_PEKERJAAN_VOLUME' => $it->volume,
                        'DETAIL_PEKERJAAN_TOTAL' => $it->total,
                        'DETAIL_PEKERJAAN_URUTAN' => $it->urutan
                    );
                    $this->mDetailRab->_insert($_insertedDetailPekerjaan);
                } else {
					if($it->tipe == "new"){
						// insert analisa_rab and get last id
						$idAnalisaRab = $this->mAnalisaRab->insertFromMasterAnalisaAndGetID($it->id,$it->harga);
						// insert detail_analisa_rab
						$this->mDetailAnalisaRab->insertFromDetailAnalisa($it->id,$idAnalisaRab);
					} else {
						// use old data
						$idAnalisaRab = $it->id;
					}
				
                    $_insertedDetailPekerjaan = array(
                        'KATEGORI_PEKERJAAN_ID' => $idNewKategori,
                        'ANALISA_ID' => $idAnalisaRab,
                        'RAB_ID' => $idRAB,
                        'DETAIL_PEKERJAAN_VOLUME' => $it->volume,
                        'DETAIL_PEKERJAAN_TOTAL' => $it->total,
                        'DETAIL_PEKERJAAN_URUTAN' => $it->urutan
                    );
                    $this->mDetailRab->_insert($_insertedDetailPekerjaan);
                }
            }
        }
    }

	public function getSubconTipeID($tipe){
		if($tipe=='SUB') return 1;
		else if($tipe=='LSM') return 2;
		else return 3;
	}
	
    public function getViewRabById() {
        $id = $this->input->get("project_id");
        echo $this->mRab->getViewRabById($id);
    }
	
	public function getViewRabByMainId() {
        $id = $this->input->get("main_project_id");
        echo $this->mRab->getViewRabByMainId($id);
    }
    
    public function getEstimation()
    {
        $id = $this->input->get("project_id");
        echo $this->mRabTransaction->getEstimationView(0, $id);
    }

	public function viewDetail($idRAB){
		if ($idRAB == null)
            echo $idRAB;
        else {
			$this->title = "Detail RAB";
			// get detail RAB
			$this->data['RAB'] = $this->mRab->_joinSelect("rab_transaction",array("rab_status_approval" => "rab_status_approval.RAB_STATUS_APPROVAL_ID = rab_transaction.RAB_STATUS_APPROVAL_ID"),array(mRab::ID => $idRAB), array('rab_transaction.*','rab_status_approval.RAB_STATUS_APPROVAL_NAMA'))[0];
			$this->data['PROJECT'] = $this->mProject->_joinSelect("project",array("status_project" => "status_project.STATUS_PROJECT_ID = project.PROJECT_STATUS"),array(mProject::ID => $this->data["RAB"]["PROJECT_ID"]), array('project.*','status_project.STATUS_PROJECT_NAMA'))[0];
			$this->data['enrollProject'] = $this->getProjectRole($this->data["RAB"]["PROJECT_ID"]);
            $this->data['detail_pekerjaan'] = $this->mDetailRab->getDetailPekerjaan($idRAB);
			// get more detail RAB 
			$this->data['detail_pekerjaan_kompleks'] = $this->mDetailRab->getDetailPekerjaanKompleks($idRAB);
			// get detail RAP
			$this->data['detail_barang'] = $this->mRap->getViewRapBarangById($idRAB);
			$this->data['detail_analisa_upah'] = $this->mRap->getViewRapUpahAnalisaById($idRAB);
			$this->data['subcon'] = $this->mRap->getViewRapSubconById($idRAB);
			$this->display('acRabDetail', $this->data);
        }
	}
	
    public function detail() {
        $idRAB = $this->input->post('id');
        if ($idRAB == null)
            echo $idRAB;
        else {
            $this->data['detail_pekerjaan'] = $this->mDetailRab->getDetailPekerjaan($idRAB);
            echo json_encode($this->data);
        }
    }
	
	public function detailKompleks() {
        $idRAB = $this->input->post('id');
        if ($idRAB == null)
            echo $idRAB;
        else {
            $this->data['detail_pekerjaan'] = $this->mDetailRab->getDetailPekerjaanKompleks($idRAB);
            echo json_encode($this->data);
        }
    }
	
	public function calculatePercentage($idRAB){
		$barang = $this->mRap->getViewRapBarangById($idRAB);
		$subcon = $this->mRap->getViewRapSubconById($idRAB);
		$upah = $this->mRap->getViewRapUpahAnalisaById($idRAB);
		$totalMaterial = 0;
		$totalUpah = 0;
		foreach($barang as $item){
			$totalMaterial += floatval($item["BARANG_HARGA"])*floatval($item["BARANG_VOLUME"]);
		}
		foreach($subcon as $item){
			$totalMaterial += floatval($item["SUBCON_HARGA"])*floatval($item["DETAIL_PEKERJAAN_VOLUME"]);
		}
		foreach($upah as $item){
			$totalUpah += floatval($item["UPAH_ANALISA_TOTAL"])*floatval($item["UPAH_ANALISA_VOLUME"]);
		}
		$_updatedRAB = array(
            'RAB_MATERIAL' => $totalMaterial,
            'RAB_UPAH' => $totalUpah
		);
		$this->mRab->_update($_updatedRAB, array(mRab::ID => $idRAB));
	}
	
	public function getProjectRole($idProject) {
        return $this->db->query("SELECT enroll.*, penugasan.PENUGASAN_NAMA, pengguna.PENGGUNA_NAMA FROM enroll LEFT JOIN penugasan ON enroll.PENUGASAN_ID = penugasan.PENUGASAN_ID 
		LEFT JOIN pengguna ON pengguna.PENGGUNA_ID = enroll.PENGGUNA_ID WHERE enroll.PROJECT_ID = $idProject ORDER BY enroll.PROJECT_ID ASC, enroll.PENUGASAN_ID ASC, enroll.URUTAN ASC")->result_array();
    }
	
	public function printRABpdf($idRAB){
        if ($idRAB == null)
            echo $idRAB;
        else {
			$this->title = "PDF";
			$this->header = 'blank';
			$this->footer = 'blank';
			$this->left_sidebar = 'blank';
			$this->right_sidebar = 'blank';
			$this->script_header = 'lay-scripts/header-report';
			$this->script_footer = 'lay-scripts/footer-report';
			// get detail RAB
			$this->data['RAB'] = $this->mRab->_joinSelect("rab_transaction",array("rab_status_approval" => "rab_status_approval.RAB_STATUS_APPROVAL_ID = rab_transaction.RAB_STATUS_APPROVAL_ID"),array(mRab::ID => $idRAB), array('rab_transaction.*','rab_status_approval.RAB_STATUS_APPROVAL_NAMA'))[0];
			$this->data['PROJECT'] = $this->mProject->_joinSelect("project",array("status_project" => "status_project.STATUS_PROJECT_ID = project.PROJECT_STATUS"),array(mProject::ID => $this->data["RAB"]["PROJECT_ID"]), array('project.*','status_project.STATUS_PROJECT_NAMA'))[0];
			$this->data['enrollProject'] = $this->getProjectRole($this->data["RAB"]["PROJECT_ID"]);
            $this->data['detail_pekerjaan'] = $this->mDetailRab->getDetailPekerjaan($idRAB);
			// get more detail RAB 
			$this->data['detail_pekerjaan_kompleks'] = $this->mDetailRab->getDetailPekerjaanKompleks($idRAB);
			// get detail RAP
			$this->data['detail_barang'] = $this->mRap->getViewRapBarangById($idRAB);
			$this->data['detail_analisa_upah'] = $this->mRap->getViewRapUpahAnalisaById($idRAB);
			$this->data['subcon'] = $this->mRap->getViewRapSubconById($idRAB);
			// get index of analisa
			$arrayAnalisa = array();
			$list_analisa = $this->mAnalisaRab->listAnalisaDistinctByRAB($idRAB);
			foreach($list_analisa as $item){
				$analisa = array();
				$detail_barang = $this->mDetailAnalisaRab->getDetailBarang($item["ANALISA_ID"]);
				$detail_upah = $this->mDetailAnalisaRab->getDetailUpah($item["ANALISA_ID"]);
				$analisa["DETAIL"] = $item;
				$analisa["BARANG"] = $detail_barang;
				$analisa["UPAH"] = $detail_upah;
				array_push($arrayAnalisa, $analisa);
			}
			$this->data["detail_analisa"] = $arrayAnalisa;
			
			// render to PDF
            $this->display('acRabDetailPDF', $this->data);
			
			$html = $this->output->get_output();
			$this->dompdf->load_html($html);
			$this->dompdf->set_paper('legal', 'landscape');
			$this->dompdf->render();
			//$this->dompdf->stream("welcome.pdf",array('Attachment'=>0));
			// direct download
			$filename = $this->data['RAB']['RAB_NAMA'];
			$this->dompdf->stream($filename.".pdf");
        }
	}

}
