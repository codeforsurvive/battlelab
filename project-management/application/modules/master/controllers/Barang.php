<?php if (!defined('BASEPATH'))     exit('No direct script access allowed');

class Barang extends Plan_Controller {
    
    public function __construct() {
        parent::__construct();
		$this->left_sidebar= 'lay-left-sidebar/perencanaan';
     	$this->load->model('mBarang');
		$this->load->model('mSatuanBarang');
		$this->load->model('mKategoriBarang');
		$this->load->library('php2excel');
    }
    
    public function index()
    {
        $this->title="Barang";
		$this->data['satuan'] = $this->mSatuanBarang->_select(array(mSatuanBarang::ACTIVE => 1));
		$this->data['kategori'] = $this->mKategoriBarang->_select(array(mKategoriBarang::ACTIVE => 1));
		//$this->getRole();
		$this->checkRole();
        $this->display('acBarang',$this->data);
    }
	
	public function getRole(){
		$this->data['role'] = json_encode(["validator"]);
	}
	
	public function checkRole(){
		$roles = ["barang_admin","barang_viewer","barang_validator"];
		foreach($roles as $i){
			if(in_array($i,$this->data['roleArray']))
				return true;
		}
		redirect(base_url()."dashboard/Perencanaan");
	}

	public function delete(){
		$json_barang = json_decode($this->input->post("tobe_deleted_id"));
		foreach($json_barang as $id){
			$this->mBarang->_delete(array(mBarang::ID => $id),mBarang::ACTIVE);
		}
		redirect(base_url()."master/barang");
	}
	
	public function update(){
		$id = $this->input->post("bar_id");
		$_updated = array(
			'SATUAN_NAMA' => $this->input->post("sat_nama"),
			'KATEGORI_BARANG_ID' => $this->input->post("kat_bar_id"),
			'BARANG_NAMA' => $this->input->post("bar_nama"),
			'BARANG_KETERANGAN' => $this->input->post("bar_ket"),
			'BARANG_HARGA_TEMP' => $this->input->post("bar_harga"),
			'LAST_EDITED_BY_USER_ID' => $this->data['iduseractive'],
			'LAST_EDITED_TIMESTAMP' => date('Y-m-d H:i:s'),
			'STATUS_VALIDASI_ID' => $this->input->post("status_validasi_update")
		);
		$this->mBarang->_update($_updated, array(mBarang::ID => $id));
		redirect(base_url()."master/barang");
	}
	
	public function validate(){
		$json_barang = json_decode($this->input->post("tobe_validated_id"));
		$value = $this->input->post("validated_value");
		
		foreach($json_barang as $id){
			if($value==3) $this->db->set('BARANG_HARGA', 'BARANG_HARGA_TEMP', FALSE);
			$_updated = array(
				'VALIDATED_BY_USER_ID' => $this->data['iduseractive'],
				'VALIDATED_TIMESTAMP' => date('Y-m-d H:i:s'),
				'STATUS_VALIDASI_ID' => $value
			);
			$this->mBarang->_update($_updated, array(mBarang::ID => $id));
		}
		redirect(base_url()."master/barang");
	}
	
	public function insert(){
		$_inserted = array(
			'SATUAN_NAMA' => $this->input->post("sat_nama"),
			'KATEGORI_BARANG_ID' => $this->input->post("kat_bar_id"), 
			'BARANG_NAMA' => $this->input->post("bar_nama"),
			'BARANG_KETERANGAN' => $this->input->post("bar_ket"),
			'BARANG_HARGA_TEMP' => $this->input->post("bar_harga"),
			'CREATED_BY_USER_ID' => $this->data['iduseractive'],
			'CREATED_TIMESTAMP' => date('Y-m-d H:i:s'),
			'STATUS_VALIDASI_ID' => $this->input->post("status_validasi_save")
		);
		$this->mBarang->_insert($_inserted);
		redirect(base_url()."master/barang");
	}
	
	public function getViewBarang(){
		$level = $this->input->get('level');
		echo $this->mBarang->getViewBarang($level);
	}
	
	public function getViewAnalisaBarang(){
		echo $this->mBarang->getViewAnalisaBarang();
	}
	
	public function export(){
		if($this->input->post("type_data")=="xls"){
			$barang = null;
			if($this->input->post("size_data")=="current"){
				$_GET['search'] = $this->input->post("content_data");
				$barang = json_decode($this->mBarang->getViewBarang())->data;
				print_r($barang);
				return;
			} else {
				$barang = json_decode($this->mBarang->getViewBarang())->data;
			}
			print_r($barang);
			$xls = array();
			$xls["head"] = array("ID","Nama","Kategori","Satuan","Kode","Harga","Keterangan","Aktif");
			$xls["content"] = $barang;
			//$this->php2excel->generateMaster($xls);
		}
	}
}