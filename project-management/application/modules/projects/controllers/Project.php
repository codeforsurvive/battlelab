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

class Project extends Plan_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('mProject');
        $this->load->model('mMainProject');
        $this->load->model('mPengguna');
        $this->load->model('mEnroll');
        $this->load->model('rab/mRab');
        $this->load->model('user-management/mDepartemen');
        $this->checkRole();
    }

    public function index() {
        $this->title = "Daftar Project";
        $this->display('acHome', $this->data);
    }

    public function checkRole() {
        $roles = array("proyek_admin", "proyek_viewer");
        foreach ($roles as $i) {
            if (in_array($i, $this->data['roleArray']))
                return true;
        }
        redirect(base_url() . "dashboard/Perencanaan");
    }

    public function viewAddNew() {
        $this->script_footer = 'lay-scripts/footer-addProject';
        $this->title = "Sub Project Baru";
        $this->data['listDepartement'] = $this->mDepartemen->_select();
        $this->data['listMainProject'] = $this->mMainProject->_select();
        $this->data['listPengguna'] = $this->mPengguna->getAllPegawai()->result_array();
        $this->display('newProject', $this->data);
    }

    public function addNew() {
        $data = array(
            mProject::NAMA => $this->input->post(mProject::NAMA),
           // mProject::KODE => $this->input->post(mProject::KODE),
            mProject::DESCRIPTION => $this->input->post(mProject::DESCRIPTION),
            mProject::MAIN_PROJECT_ID => $this->input->post(mProject::MAIN_PROJECT_ID),
			mProject::PROJECT_CREATOR => $this->data['iduseractive'],
            mProject::ACTIVE => 1
        );
        $projectID = $this->mProject->insertAndGetLast('project', $data);

        $data = array(
            'PENGGUNA_ID' => $this->data['iduseractive'],
            'URUTAN' => 1,
            'PENUGASAN_ID' => 1, //creator
            'PROJECT_ID' => $projectID
        );
        $this->mProject->insert('enroll', $data);

        $estimator = $this->input->post("ESTIMATOR");
		$estimator = explode(',', $estimator);
        $i = 0;
        foreach ($estimator as $row) {
            $data = array(
                'PENGGUNA_ID' => $row,
                'URUTAN' => $i,
                'PENUGASAN_ID' => 2, //estimator
                'PROJECT_ID' => $projectID
            );
            $this->mProject->insert('enroll', $data);
            $i++;
        }

        $pm = $this->input->post("PM");
		$pm = explode(',', $pm);
        $i = 0;
        foreach ($pm as $row) {
            $data = array(
                'PENGGUNA_ID' => $row,
                'URUTAN' => $i,
                'PENUGASAN_ID' => 3, //pm
                'PROJECT_ID' => $projectID
            );
            $this->mProject->insert('enroll', $data);
            $i++;
        }

        $validator = $this->input->post("VALIDATOR");
		$validator = explode(',', $validator);
        $i = 0;
        foreach ($validator as $row) {
            $data = array(
                'PENGGUNA_ID' => $row,
                'URUTAN' => $i,
                'PENUGASAN_ID' => 4, //validator
                'PROJECT_ID' => $projectID
            );
            $this->mProject->insert('enroll', $data);
            $i++;
        }

        redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/viewDetail/' . $projectID);
    }

    public function viewDetail($idProject) {
        $this->title = "Detail Project";
        $this->data['detailProject'] = $this->mProject->_joinSelect('project', array(
            'status_project' => 'project.PROJECT_STATUS = status_project.STATUS_PROJECT_ID'), array('project.PROJECT_ID' => $idProject), array('project.*',  'status_project.*'));
        $this->data['enrollProject'] = $this->getProjectRole($idProject);
        $this->display('detailProject', $this->data);
    }

    public function viewEdit($idProject) {
        $this->script_footer = 'lay-scripts/footer-addProject';
        $this->title = "Edit Project";
        $this->data['listDepartement'] = $this->mDepartemen->_select();
        $this->data['listPengguna'] = $this->mPengguna->getAllPegawai()->result_array();
		$this->data['detailProject'] = $this->mProject->_joinSelect('project', array(
            'status_project' => 'project.PROJECT_STATUS = status_project.STATUS_PROJECT_ID'), array('project.PROJECT_ID' => $idProject), array('project.*',  'status_project.*'));
        $this->data['enrollProject'] = $this->getProjectRole($idProject);
        $this->display('editProject', $this->data);
    }

    public function update() {
        $data = array(
            mProject::NAMA => $this->input->post(mProject::NAMA),
            //mProject::KODE => $this->input->post(mProject::KODE),
            mProject::DESCRIPTION => $this->input->post(mProject::DESCRIPTION),
			mProject::PROJECT_LAST_MODIFIER => $this->data['iduseractive'],
            mProject::ACTIVE => 1
        );
        $projectID = $this->input->post(mProject::ID);
        
        $this->mProject->_update($data, array(mProject::ID => $projectID));

        $this->mEnroll->_delete(array(mEnroll::PROJECT_ID => $projectID));

        $data = array(
            'PENGGUNA_ID' => $this->data['iduseractive'],
            'URUTAN' => 1,
            'PENUGASAN_ID' => 1, //creator
            'PROJECT_ID' => $projectID
        );
        $this->mProject->insert('enroll', $data);

        $estimator = $this->input->post("ESTIMATOR_temp");
        
        $i = 0;
        foreach ($estimator as $temp => $row) {
            $data = array(
                'PENGGUNA_ID' => $row,
                'URUTAN' => $i,
                'PENUGASAN_ID' => 2, //estimator
                'PROJECT_ID' => $projectID
            );
            $this->mProject->insert('enroll', $data);
            $i++;
        }

        $pm = $this->input->post("PM_temp");
        
        $i = 0;
        foreach ($pm as $temp => $row) {
            $data = array(
                'PENGGUNA_ID' => $row,
                'URUTAN' => $i,
                'PENUGASAN_ID' => 3, //pm
                'PROJECT_ID' => $projectID
            );
            $this->mProject->insert('enroll', $data);
            $i++;
        }

        $validator = $this->input->post("VALIDATOR_temp");
        $i = 0;
        
        foreach ($validator as $temp => $row) {
            $data = array(
                'PENGGUNA_ID' => $row,
                'URUTAN' => $i,
                'PENUGASAN_ID' => 4, //validator
                'PROJECT_ID' => $projectID
            );
            $this->mProject->insert('enroll', $data);
            $i++;
        }
        $this->resetValidation($projectID);
        
       redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/viewDetail/' . $projectID);
    }

    public function resetValidation($idProject)
    {
        $this->mProject->resetValidation($idProject);
    }
    public function delete() {
        $this->mProject->_delete(array(mProject::ID => $this->input->post("tobe_deleted_sub_id")), mProject::ACTIVE);
        redirect(base_url() . "projects/project");
    }

    public function getViewProject() {
        echo $this->mProject->getProject();
    }

    public function getViewRabById() {
        $subProjectID = $this->input->post('id');
        if ($subProjectID == null)
            echo $subProjectID;
        else {
            $this->data['rab'] = $this->mRab->_select(array(mProject::ID => $subProjectID));
            echo json_encode($this->data);
        }
    }

    public function startProject() {
        $idProject = $this->input->post('id_to_start');
        
        $this->mProject->startProject($idProject);
        
        redirect(base_url() . 'projects/project/viewDetail/' . $idProject);
    }
    
    public function _isAvailableEstimation($idProject)
    {
        $res = $this->mProject->isAvailableEstimation($idProject);
        if (empty($res)) return false;
        return true;
    }

    public function getProjectRole($idProject) {
        return $this->db->query("SELECT enroll.*, penugasan.PENUGASAN_NAMA, pengguna.PENGGUNA_NAMA FROM enroll LEFT JOIN penugasan ON enroll.PENUGASAN_ID = penugasan.PENUGASAN_ID 
		LEFT JOIN pengguna ON pengguna.PENGGUNA_ID = enroll.PENGGUNA_ID WHERE enroll.PROJECT_ID = $idProject ORDER BY enroll.PROJECT_ID ASC, enroll.PENUGASAN_ID ASC, enroll.URUTAN ASC")->result_array();
    }
}
