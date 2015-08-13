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
class Overhead extends Plan_Controller {

    //1. seluruh fungsi yang tidak public, menggunakan awalan '_' , contoh: _getProperty()
    //2. di atas fungsi diberikan penjelasan proses apa yang dilakukan. dari mana ambil data, 
    //inputnya apa dan outputnya apa. contoh di fungsi index()
    //3. Penamaan fungsi harus PUNUK ONTA dengan awalan huruf kecil $ Menggunakan Bahasa Inggris
    //4. Penamaan nama fungsi maksimal 3 kata

    public function __construct() {
        parent::__construct();
        $this->left_sidebar = 'lay-left-sidebar/pelaksanaan';
        $this->load->model('mOverhead');
        $this->load->model('projects/mProject');
		$this->load->model('projects/mMainProject');
		$this->load->model('rab/mRab');
		$this->load->model('mSatuanBarang');
		$this->load->model('mSatuanUpah');
		$this->load->model('mPaketOverheadMaterial');
		$this->load->model('mPaketOverheadUpah');
		$this->load->model('mDetailOverhead');
        $this->load->model('estimasi/mRabTransaction');
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
        // Dua hal ini wajib di-code agar keluar data title dan memanggil view
        $this->title = "Master Overhead";
		$this->data["tipe"] = 'material';
		$type = $this->input->get("tipe");
		if($type=="upah") $this->data["tipe"] = $type;
        $this->display('acOverheadView', $this->data);
    }
	
	public function add() {
        $this->title = "Master Overhead";
		$this->data["listMainProject"] = $this->mMainProject->_select(array(mMainProject::ACTIVE => 1));
		$this->data["tipe"] = 'material';
		$type = $this->input->get("tipe");
		if($type=="upah") $this->data["tipe"] = $type;
		$this->data['satuanMaterial'] = $this->mSatuanBarang->_select();
		$this->data['satuanUpah'] = $this->mSatuanUpah->_select();
        $this->display('acOverheadAdd', $this->data);
    }
	
	public function edit() {
        $this->title = "Master Overhead";
		$idOverhead = $this->input->post('id_to_edit');
		$this->data["listMainProject"] = $this->mMainProject->_select(array(mMainProject::ACTIVE => 1));
		$this->data["overhead"] = $this->mOverhead->_select(array(mOverhead::ID => $idOverhead))[0];
		if($this->data["overhead"]["OVERHEAD_TIPE"]){
			$this->data['rab'] = $this->db->query("SELECT temp.JUMLAH_TERPAKAI, 
			((rab_transaction.RAB_MATERIAL/rab_transaction.RAB_TOTAL)*(rab_transaction.RAB_AFTER_OVERHEAD-rab_transaction.RAB_TOTAL)) AS BATAS_OVERHEAD,				(((rab_transaction.RAB_MATERIAL/rab_transaction.RAB_TOTAL)*(rab_transaction.RAB_AFTER_OVERHEAD-rab_transaction.RAB_TOTAL))-temp.JUMLAH_TERPAKAI) AS SISA_OVERHEAD, 
			rab_transaction.* FROM rab_transaction, 
			(SELECT overhead.RAB_ID, SUM(IF(overhead.STATUS_APPROVAL_ID = 3, overhead.OVERHEAD_TOTAL, 0)) AS JUMLAH_TERPAKAI
			FROM overhead 
			WHERE overhead.OVERHEAD_TIPE = 'material'
			GROUP BY overhead.RAB_ID) temp
			WHERE rab_transaction.RAB_ID = temp.RAB_ID
			AND rab_transaction.RAB_ID = ".$this->data["overhead"]["RAB_ID"])->result_array()[0];
		} else {
			$this->data['rab'] = $this->db->query("SELECT temp.JUMLAH_TERPAKAI, 
			((rab_transaction.RAB_UPAH/rab_transaction.RAB_TOTAL)*(rab_transaction.RAB_AFTER_OVERHEAD-rab_transaction.RAB_TOTAL)) AS BATAS_OVERHEAD,				(((rab_transaction.RAB_UPAH/rab_transaction.RAB_TOTAL)*(rab_transaction.RAB_AFTER_OVERHEAD-rab_transaction.RAB_TOTAL))-temp.JUMLAH_TERPAKAI) AS SISA_OVERHEAD, 
			rab_transaction.* FROM rab_transaction, 
			(SELECT overhead.RAB_ID, SUM(IF(overhead.STATUS_APPROVAL_ID = 3, overhead.OVERHEAD_TOTAL, 0)) AS JUMLAH_TERPAKAI
			FROM overhead 
			WHERE overhead.OVERHEAD_TIPE = 'upah'
			GROUP BY overhead.RAB_ID) temp
			WHERE rab_transaction.RAB_ID = temp.RAB_ID
			AND rab_transaction.RAB_ID = ".$this->data["overhead"]["RAB_ID"])->result_array()[0];
		}
		$this->data["project"] = $this->mProject->_select(array(mProject::ID => $this->data["rab"]["PROJECT_ID"]))[0];
		$this->data["mainProject"] = $this->mMainProject->_select(array(mMainProject::ID => $this->data["project"]["MAIN_PROJECT_ID"]))[0];
		$this->data["tipe"] = $this->data["overhead"]["OVERHEAD_TIPE"];
		$this->data["detailOverhead"] = $this->mDetailOverhead->getDetailToEdit($idOverhead,$this->data["tipe"]);
		$this->data['satuanMaterial'] = $this->mSatuanBarang->_select();
		$this->data['satuanUpah'] = $this->mSatuanUpah->_select();
        $this->display('acOverheadEdit', $this->data);
    }
	
	public function detail()
	{
		$idOverhead = $this->input->post('id');
		$tipeOverhead = $this->input->post('tipe');
		if($idOverhead==null) echo $idOverhead;
		else {
			$this->data['detail'] = $this->mDetailOverhead->getDetail($idOverhead,$tipeOverhead);
			echo json_encode($this->data);
		}
	}
	
	public function getViewRabOverheadById() {
        $subProjectID = $this->input->post('id');
		$type = $this->input->post('type');
        if ($subProjectID == null)
            echo $subProjectID;
        else {
			if($type=="material"){
				$this->data['rab'] = $this->db->query("SELECT COALESCE(temp.JUMLAH_TERPAKAI,0) AS JUMLAH_TERPAKAI, 
				((rab_transaction.RAB_MATERIAL/rab_transaction.RAB_TOTAL)*(rab_transaction.RAB_AFTER_OVERHEAD-rab_transaction.RAB_TOTAL)) AS BATAS_OVERHEAD,								(((rab_transaction.RAB_MATERIAL/rab_transaction.RAB_TOTAL)*(rab_transaction.RAB_AFTER_OVERHEAD-rab_transaction.RAB_TOTAL))-COALESCE(temp.JUMLAH_TERPAKAI,0)) AS SISA_OVERHEAD, 
				rab_transaction.* FROM rab_transaction LEFT JOIN 
				(SELECT overhead.RAB_ID, SUM(IF(overhead.STATUS_APPROVAL_ID = 3, overhead.OVERHEAD_TOTAL, 0)) AS JUMLAH_TERPAKAI
				FROM overhead 
				WHERE overhead.OVERHEAD_TIPE = 'material'
				GROUP BY overhead.RAB_ID) temp
				ON rab_transaction.RAB_ID = temp.RAB_ID
				WHERE rab_transaction.PROJECT_ID = $subProjectID")->result_array();
			} else {
				$this->data['rab'] = $this->db->query("SELECT COALESCE(temp.JUMLAH_TERPAKAI,0) AS JUMLAH_TERPAKAI, 
				((rab_transaction.RAB_MATERIAL/rab_transaction.RAB_TOTAL)*(rab_transaction.RAB_AFTER_OVERHEAD-rab_transaction.RAB_TOTAL)) AS BATAS_OVERHEAD,								(((rab_transaction.RAB_MATERIAL/rab_transaction.RAB_TOTAL)*(rab_transaction.RAB_AFTER_OVERHEAD-rab_transaction.RAB_TOTAL))-COALESCE(temp.JUMLAH_TERPAKAI,0)) AS SISA_OVERHEAD, 
				rab_transaction.* FROM rab_transaction LEFT JOIN 
				(SELECT overhead.RAB_ID, SUM(IF(overhead.STATUS_APPROVAL_ID = 3, overhead.OVERHEAD_TOTAL, 0)) AS JUMLAH_TERPAKAI
				FROM overhead 
				WHERE overhead.OVERHEAD_TIPE = 'upah'
				GROUP BY overhead.RAB_ID) temp
				ON rab_transaction.RAB_ID = temp.RAB_ID
				WHERE rab_transaction.PROJECT_ID = $subProjectID")->result_array();
			}
            echo json_encode($this->data);
        }
    }
	
	public function getViewOverhead(){
		$type = 'material';
		if($this->input->get("tipe")=="upah") $type = 'upah';
		echo $this->mOverhead->getViewOverhead($type);
	}
	
	public function getViewSubProject(){
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
	
	public function delete(){
		$idOverhead = $this->input->post("tobe_deleted_id");
		$tipeOverhead = $this->input->post('tipe_delete');
		$this->mOverhead->_delete(array(mOverhead::ID => $idOverhead),mOverhead::ACTIVE);
		redirect(base_url()."master/overhead?tipe=".$tipeOverhead);
	}
	
	public function validate(){
		$idOverhead = $this->input->post("tobe_validated_id");
		$value = $this->input->post("tobe_validated_val");
		$tipeOverhead = $this->input->post('tipe_validate');
		$_updatedOverhead = array(
			mOverhead::STATUS => $value
		);
		$this->mOverhead->_update($_updatedOverhead, array(mOverhead::ID => $idOverhead));
		redirect(base_url()."master/overhead?tipe=".$tipeOverhead);
	}
	
	public function savetovalidate(){
		$idOverhead = $this->input->post("tobe_simpan_validasi_id");
		$tipeOverhead = $this->input->post('tipe_simpan_validasi');
		$_updatedOverhead = array(
			mOverhead::STATUS => 2
		);
		$this->mOverhead->_update($_updatedOverhead, array(mOverhead::ID => $idOverhead));
		redirect(base_url()."master/overhead?tipe=".$tipeOverhead);
	}
	
	public function simpanOverhead() {
		$tipeOverhead = $this->input->post('tipe');
		$namaOverhead = $this->input->post('nama');
		$rabID = $this->input->post('rab');
		$statusOverhead = $this->input->post('status');
		$totalOverhead = $this->input->post('total');
        
        $_insertedOverhead = array(
            mOverhead::NAMA => $namaOverhead,
            mOverhead::RAB => $rabID,
            mOverhead::TOTAL => $totalOverhead,
			mOverhead::TIPE => $tipeOverhead,
			mOverhead::STATUS => $statusOverhead,
			mOverhead::ACTIVE => 1
            
		);
                
        $this->mOverhead->_insert($_insertedOverhead);
        $idNewOverhead = $this->mOverhead->_getRecentID();

        $items = json_decode($this->input->post('detail'));
		if($tipeOverhead=="material"){
			$this->_insertItemsMaterial($items, $idNewOverhead);
		} else {
			$this->_insertItemsUpah($items, $idNewOverhead);
		}
        echo "success";
    }
	
	public function updateOverhead() {
		$tipeOverhead = $this->input->post('tipe');
		$namaOverhead = $this->input->post('nama');
		$idOverhead = $this->input->post('id');
		$statusOverhead = $this->input->post('status');
		$totalOverhead = $this->input->post('total');
        
        $_updatedOverhead = array(
            mOverhead::NAMA => $namaOverhead,
            mOverhead::TOTAL => $totalOverhead,
			mOverhead::STATUS => $statusOverhead
		);
                
        $this->mOverhead->_update($_updatedOverhead, array(mOverhead::ID => $idOverhead));

        $items = json_decode($this->input->post('detail'));
		$this->mDetailOverhead->_delete(array(mOverhead::ID => $idOverhead));
		if($tipeOverhead=="material"){
			$this->_insertItemsMaterial($items, $idOverhead);
		} else {
			$this->_insertItemsUpah($items, $idOverhead);
		}
        echo "success";
    }

	private function _insertItemsMaterial($items, $idOverhead) {
        foreach ($items as $it) {
			if ($it->id === "LS") {
				$_insertedNewPaket = array(
					mPaketOverheadMaterial::NAMA => $it->name,
					mPaketOverheadMaterial::HARGA => $it->harga,
					mPaketOverheadMaterial::SATUAN => $it->satuan
				);
				$this->mPaketOverheadMaterial->_insert($_insertedNewPaket);
				$idNewPaket = $this->mPaketOverheadMaterial->_getRecentID();

				$_insertedDetailOverhead = array(
					mDetailOverhead::OVERHEAD => $idOverhead,
					mDetailOverhead::PAKET_MATERIAL => $idNewPaket,
					mDetailOverhead::KOEFISIEN => $it->koef,
					mDetailOverhead::HARGA => $it->harga,
					mDetailOverhead::TOTAL => $it->total
				);
				$this->mDetailOverhead->_insert($_insertedDetailOverhead);
			} else {
				$_insertedDetailOverhead = array(
					mDetailOverhead::OVERHEAD => $idOverhead,
					mDetailOverhead::BARANG => $it->id,
					mDetailOverhead::KOEFISIEN => $it->koef,
					mDetailOverhead::HARGA => $it->harga,
					mDetailOverhead::TOTAL => $it->total
				);
				$this->mDetailOverhead->_insert($_insertedDetailOverhead);
			}
        }
    }
	
	private function _insertItemsUpah($items, $idOverhead) {
        foreach ($items as $it) {
			if ($it->id === "LS") {
				$_insertedNewPaket = array(
					mPaketOverheadUpah::NAMA => $it->name,
					mPaketOverheadUpah::HARGA => $it->harga,
					mPaketOverheadUpah::SATUAN => $it->satuan
				);
				$this->mPaketOverheadUpah->_insert($_insertedNewPaket);
				$idNewPaket = $this->mPaketOverheadUpah->_getRecentID();

				$_insertedDetailOverhead = array(
					mDetailOverhead::OVERHEAD => $idOverhead,
					mDetailOverhead::PAKET_UPAH => $idNewPaket,
					mDetailOverhead::KOEFISIEN => $it->koef,
					mDetailOverhead::HARGA => $it->harga,
					mDetailOverhead::TOTAL => $it->total
				);
				$this->mDetailOverhead->_insert($_insertedDetailOverhead);
			} else {
				$_insertedDetailOverhead = array(
					mDetailOverhead::OVERHEAD => $idOverhead,
					mDetailOverhead::UPAH => $it->id,
					mDetailOverhead::KOEFISIEN => $it->koef,
					mDetailOverhead::HARGA => $it->harga,
					mDetailOverhead::TOTAL => $it->total
				);
				$this->mDetailOverhead->_insert($_insertedDetailOverhead);
			}
        }
    }
}
