<?php if (!defined('BASEPATH'))     exit('No direct script access allowed');

class Upah extends Plan_Controller {
    
    public function __construct() {
        parent::__construct();
		$this->left_sidebar= 'lay-left-sidebar/perencanaan';
        $this->load->model('mUpah');
		$this->load->model('mLokasiUpah');
		$this->load->model('mSatuanUpah');
    }
    
    public function index()
    {
        $this->title="Upah";
		$this->data['satuan'] = $this->mSatuanUpah->_select(array(mSatuanUpah::ACTIVE => 1));
		$this->data['lokasi'] = $this->mLokasiUpah->_select(array(mLokasiUpah::ACTIVE => 1));
		//$this->getRole();
		$this->checkRole();
        $this->display('acUpah',$this->data);
    }
	
	public function getRole(){
		$this->data['role'] = json_encode(["validator"]);
	}
	
	public function checkRole(){
		$roles = ["upah_admin","upah_viewer","upah_validator"];
		foreach($roles as $i){
			if(in_array($i,$this->data['roleArray']))
				return true;
		}
		redirect(base_url()."dashboard/Perencanaan");
	}
	
	public function delete(){
		$this->mUpah->_delete(array(mUpah::ID => $this->input->post("tobe_deleted_id")), mUpah::ACTIVE);
		redirect(base_url()."master/upah");
	}
	
	public function update(){
		$id = $this->input->post("upah_id");
		$_updated = array(
			'LOKASI_UPAH_ID' => $this->input->post("lokasi_upah_id"),
			'SATUAN_UPAH_ID' => $this->input->post("sat_upah_id"),
			'UPAH_HARGA_TEMP' => $this->input->post("upah_harga"), 
			'UPAH_NAMA' => $this->input->post("upah_nama"),
			'LAST_EDITED_BY_USER_ID' => $this->data['iduseractive'],
			'LAST_EDITED_TIMESTAMP' => date('Y-m-d H:i:s'),
			'STATUS_VALIDASI_ID' => $this->input->post("status_validasi_update")
		);
		$this->mUpah->_update($_updated, array(mUpah::ID => $id));
		redirect(base_url()."master/upah");
	}
	
	public function validate(){
		$id = $this->input->post("tobe_validated_id");
		$value = $this->input->post("validated_value");
		
		if($value==3) $this->db->set('UPAH_HARGA', 'UPAH_HARGA_TEMP', FALSE);
		$_updated = array(
			'VALIDATED_BY_USER_ID' => $this->data['iduseractive'],
			'VALIDATED_TIMESTAMP' => date('Y-m-d H:i:s'),
			'STATUS_VALIDASI_ID' => $value
		);
		$this->mUpah->_update($_updated, array(mUpah::ID => $id));
		redirect(base_url()."master/upah");
	}
	
	public function insert(){
		$_inserted = array(
			'LOKASI_UPAH_ID' => $this->input->post("lokasi_upah_id"),
			'SATUAN_UPAH_ID' => $this->input->post("sat_upah_id"),
			'UPAH_HARGA_TEMP' => $this->input->post("upah_harga"), 
			'UPAH_NAMA' => $this->input->post("upah_nama"),
			'CREATED_BY_USER_ID' => $this->data['iduseractive'],
			'CREATED_TIMESTAMP' => date('Y-m-d H:i:s'),
			'STATUS_VALIDASI_ID' => $this->input->post("status_validasi_save")
		);
		$this->mUpah->_insert($_inserted);
		redirect(base_url()."master/upah");
	}
	
	public function getViewUpah(){
		$level = $this->input->get('level');
		echo $this->mUpah->getViewUpah($level);
	}
	
	public function getViewAnalisaUpah(){
		$id = $this->input->get("lokasi_id");
		echo $this->mUpah->getViewAnalisaUpahById($id);
	}
}