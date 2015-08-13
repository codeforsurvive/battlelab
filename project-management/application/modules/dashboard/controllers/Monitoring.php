<?php if (!defined('BASEPATH'))     exit('No direct script access allowed');

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
class Monitoring extends Monitoring_Controller {
    
    //1. seluruh fungsi yang tidak public, menggunakan awalan '_' , contoh: _getProperty()
    //2. di atas fungsi diberikan penjelasan proses apa yang dilakukan. dari mana ambil data, 
    //inputnya apa dan outputnya apa. contoh di fungsi index()
    //3. Penamaan fungsi harus PUNUK ONTA dengan awalan huruf kecil $ Menggunakan Bahasa Inggris
    //4. Penamaan nama fungsi maksimal 3 kata

    public function __construct() {
        parent::__construct();
        $this->load->model('projects/mMainProject');
		$this->load->model('projects/mProject');
		$this->load->model('rab/mRab');
		$this->load->model('rap/mRap');
		$this->load->model('rab/mDetailRab');
		$this->load->model('mMonitoring');
		$this->load->model('user-management/mPerusahaan');
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
     public function index(){
        $this->title="Administrasi Monitoring";
		$this->theme_layout = 'monitoring';
		$this->left_sidebar = 'blank';
		$this->right_sidebar = 'blank';
		$this->data['listPerusahaan'] = $this->mPerusahaan->_select();
        $this->display('acMonitoring',$this->data);   
    }
	
	public function viewProgres($PROJECT_ID){
        $this->title="Administrasi Monitoring";
		$this->theme_layout = 'monitoring';
		$this->left_sidebar = 'blank';
		$this->right_sidebar = 'blank'; 
		$this->data['detailProject'] = $this->mMonitoring->getDetailProject($PROJECT_ID)[0];
		$this->data['overheadMaterial'] = $this->mMonitoring->getOverheadMaterial($PROJECT_ID)[0];
		$this->data['overheadUpah'] = $this->mMonitoring->getOverheadUpah($PROJECT_ID)[0];
		$this->data['materialPP'] = $this->mMonitoring->getMaterialPP($PROJECT_ID)[0];
		$this->data['overheadPP'] = $this->mMonitoring->getOverheadPP($PROJECT_ID)[0];
		$this->data['upahPK'] = $this->mMonitoring->getUpahPK($PROJECT_ID)[0];
		$this->data['overheadPK'] = $this->mMonitoring->getOverheadPK($PROJECT_ID)[0];
		$this->data['materialPO'] = $this->mMonitoring->getMaterialPO($PROJECT_ID)[0];
		$this->data['overheadPO'] = $this->mMonitoring->getOverheadPO($PROJECT_ID)[0];
		$this->data['upahOP'] = $this->mMonitoring->getUpahOpname($PROJECT_ID)[0];
		$this->data['overheadOP'] = $this->mMonitoring->getOverheadOpname($PROJECT_ID)[0];
		$this->data['materialLPB'] = $this->mMonitoring->getMaterialLPB($PROJECT_ID)[0];
		$this->data['overheadLPB'] = $this->mMonitoring->getOverheadLPB($PROJECT_ID)[0];
		$this->data['upahLPU'] = $this->mMonitoring->getUpahLPU($PROJECT_ID)[0];
		$this->data['overheadLPU'] = $this->mMonitoring->getOverheadLPU($PROJECT_ID)[0];
		$this->data['materialPayment'] = $this->mMonitoring->getMaterialPayment($PROJECT_ID)[0];
		$this->data['upahPayment'] = $this->mMonitoring->getUpahPayment($PROJECT_ID)[0];
        $this->display('acMonitoringProgres',$this->data);   
    }
	
	public function viewProsentase($idRAB){
		if ($idRAB == null)
            echo $idRAB;
        else {
			$this->title = "Detail RAB";
			$this->theme_layout = 'monitoring';
			$this->left_sidebar = 'blank';
			$this->right_sidebar = 'blank'; 
			// get detail RAB
			$this->data['RAB'] = $this->mRab->_joinSelect("rab_transaction",array("rab_status_approval" => "rab_status_approval.RAB_STATUS_APPROVAL_ID = rab_transaction.RAB_STATUS_APPROVAL_ID"),array(mRab::ID => $idRAB), array('rab_transaction.*','rab_status_approval.RAB_STATUS_APPROVAL_NAMA'))[0];
			$this->data['PROJECT'] = $this->mProject->_joinSelect("project",array("status_project" => "status_project.STATUS_PROJECT_ID = project.PROJECT_STATUS"),array(mProject::ID => $this->data["RAB"]["PROJECT_ID"]), array('project.*','status_project.STATUS_PROJECT_NAMA'))[0];
            //$this->data['detail_pekerjaan'] = $this->mDetailRab->getDetailPekerjaan($idRAB);
			// get more detail RAB 
			//$this->data['detail_pekerjaan_kompleks'] = $this->mDetailRab->getDetailPekerjaanKompleks($idRAB);
			// get detail RAP
			$this->data['detail_barang'] = $this->mRap->getViewRapBarangById($idRAB);
			$this->data['detail_analisa_upah'] = $this->mRap->getViewRapUpahAnalisaById($idRAB);
			$this->data['subcon'] = $this->mRap->getViewRapSubconById($idRAB);
			$this->display('acMonitoringProsentase', $this->data);
        }
	}
	
	public function getViewProjects(){
		echo $this->mProject->getMonitoringProjects();
	}
}