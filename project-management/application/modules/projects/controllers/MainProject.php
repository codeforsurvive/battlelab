<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * 
 * @author		Felix - Artcak Media Digital
 * @copyright	Copyright (c) 2014
 * @link		http://artcak.com
 * @since		Version 1.0
 * @description
 * Contoh Tampilan administrator dashbard
 */

class MainProject extends Plan_Controller {
    
    
    public function __construct() {
        parent::__construct();
        $this->load->model('mProject');
		$this->load->model('mMainProject');
        $this->load->model('mPengguna');
		$this->load->model('user-management/mPerusahaan');
        $this->load->model('mEnroll');
		$this->load->model('rab/mRab');
        $this->load->model('user-management/mDepartemen');
    }

    public function index() {
        $this->title = "Daftar Project";
        $this->display('acHome', $this->data);
    }
	
	public function viewAddNew() {
        $this->script_footer = 'lay-scripts/footer-addProject';
        $this->title = "Main Project Baru";
        $this->data['listPerusahaan'] = $this->mPerusahaan->_select();
        $this->display('newMainProject', $this->data);
    }
	
	public function viewEdit($idProject) {
        $this->script_footer = 'lay-scripts/footer-addProject';
        $this->title = "Edit Main Project";
		$this->data['detailMainProject'] = $this->mMainProject->_joinSelect('main_project', array('perusahaan' => 'perusahaan.PERUSAHAAN_ID = main_project.PERUSAHAAN_ID'), array(mMainProject::ID => $idProject), array('main_project.*','perusahaan.PERUSAHAAN_NAMA AS PERUSAHAAN_NAMA'));
        $this->display('editMainProject', $this->data);
    }
	
	public function viewDetail($idProject) {
        $this->title = "Detail Main Project";
		$this->data['detailMainProject'] = $this->mMainProject->_joinSelect('main_project', array('perusahaan' => 'perusahaan.PERUSAHAAN_ID = main_project.PERUSAHAAN_ID'), array(mMainProject::ID => $idProject), array('main_project.*','perusahaan.PERUSAHAAN_NAMA AS PERUSAHAAN_NAMA'));
        $this->display('detailMainProject', $this->data);
    }
	
	public function addNew() {
        $data = array(
            mMainProject::NAMA => $this->input->post(mMainProject::NAMA),
            mMainProject::KODE => $this->input->post(mMainProject::KODE),
            mMainProject::DESCRIPTION => $this->input->post(mMainProject::DESCRIPTION),
            mMainProject::ACTIVE => 1,
			mMainProject::PERUSAHAAN_ID => $this->input->post(mMainProject::PERUSAHAAN_ID)
        );
        $this->mMainProject->_insert($data);

        redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0));
    }
	
	public function update() {
		$id = $this->input->post(mMainProject::ID);
        $data = array(
            mMainProject::NAMA => $this->input->post(mMainProject::NAMA),
            mMainProject::DESCRIPTION => $this->input->post(mMainProject::DESCRIPTION)
        );
        $this->mMainProject->_update($data, array(mMainProject::ID => $id));

        redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0));
    }
	
	public function delete(){
		$this->mMainProject->_delete(array(mMainProject::ID => $this->input->post("tobe_deleted_main_id")),mMainProject::ACTIVE);
		redirect(base_url()."projects/project");
	}
	
	public function getViewMainProject(){
		echo $this->mMainProject->getMainProject();
	}
	
	public function getViewMainProjectByPerusahaanId(){
		$perusahaanID = $this->input->post('id');
        if ($perusahaanID == null)
        {
            echo $perusahaanID;
        }
        else {
            $this->data['main_project'] = $this->mMainProject->_select(array(mMainProject::PERUSAHAAN_ID => $perusahaanID));
            echo json_encode($this->data);
        }
	}
	
	public function getViewSubProject(){
		$mainProjectID = $this->input->post('id');
        if ($mainProjectID == null)
        {
            echo $mainProjectID;
        }
        else {
            $this->data['sub_project'] = $this->mProject->getSubProjectById($mainProjectID);
            echo json_encode($this->data);
        }
	}
	
	public function getViewRunningSubProject(){
		$mainProjectID = $this->input->post('id');
        if ($mainProjectID == null)
        {
            echo $mainProjectID;
        }
        else {
            
            $this->data['sub_project'] = $this->mProject->getRunningSubProjectById($mainProjectID);
            echo json_encode($this->data);
        }
	}

  

}