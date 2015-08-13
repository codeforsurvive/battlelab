<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Notifications extends Notification_Controller {
        
    const PAY = 'p-material/payment/viewDetail?id=';
    const RAB = 'rab/rabs/viewDetail/';
    const OP = 'p-upah/op/viewDetail?id=';
    const KM = 'p-material/pm/viewDetail?id=';
    const HM ='p-material/hm/viewDetail?id=';
    const BPM= 'p-material/bpm/viewDetail?id=';
    const LPB = 'p-material/lpb/viewDetail/';
    const LPU = 'p-upah/lpu/viewDetail?id=';
    const INV = 'p-material/invoice/viewDetail/';
    const MPRO = 'projects/mainproject/viewDetail/';
    const PRO ='projects/project/viewDetail/';
    
    const PK = 'p-upah/pk/viewDetail/';
    const PP = 'p-material/pp/viewDetail/';
    const PO = 'p-material/po/viewDetail/';
    
    const OV = 'master/overhead?tipe=';
    const GUDANG = 'master/gudang';
    const SUP = 'master/supplier';
    const ANALISARAB='rab/analisa';
    const BARANG='master/barang';
    const UPAH = 'master/upah';
    const PENG = 'user-management/pengguna';
    const DEP = 'user-management/departemen';
    const PER = 'user-management/perusahaan';
    
    public function __construct() {
        parent::__construct();
         
        $this->load->model('mNotif');
        
    }
    
    public function index()
    {
        // Dua hal ini wajib di-code agar keluar data title dan memanggil view
        
        $id = $this->_idUserActive;
        $this->all($id);
        //var_dump(json_decode($this->data['role']));
        
    }
    
    public function viewId($id)
    {
        $this->mNotif->updateOnRead($id,$this->_idUserActive);
        $data = $this->mNotif->_select(array(mNotif::ID => $id));
        $data= $data[0];
        
        $idObj = $data["NOTIF_OBJECT"];
        $url='';
        
        
        switch ($data["NOTIF_MODULE"])
        {
            case "PAY":
                $url = Notifications::PAY.$idObj;
                break;
            case "OV":
                $url = Notifications::OV;
                $temp = explode(" ",$data["NOTIF_ACTION"])[1];
                $temp = explode("/",$temp)[1];
                if ($temp=="MOV")
                {
                    $url.="material";
                }
                else if ($temp=="UOV")
                {
                    $url.="upah";
                }
                break;
            case "OP":
                $url = Notifications::OP.$idObj;
                break;
            case "GUDANG":
                $url = Notifications::GUDANG;
                break;
            case "SUP" :
                $url = Notifications::SUP;
                break;
            case "KM" :
                $url = Notifications::KM.$idObj;
                break;
            case "INV" :
                $url = Notifications::INV.$idObj;
                break;
            case "HM" :
                $url = Notifications::HM.$idObj;
                break;
            case "BPM":
                $url = Notifications::BPM.$idObj;
                break;
            case "RAB":
                $url = Notifications::RAB.$idObj;
                break;
            case "PRO":
                $url = Notifications::PRO.$idObj;
                break;
            case "UPAH":
                $url = Notifications::UPAH;
                break;
            case "BARANG":
                $url = Notifications::BARANG;
                break;
            case "MPRO":
                $url = Notifications::MPRO.$idObj;
                break;
            case "analisa_rab":
                $url = Notifications::ANALISARAB;
                break;
            case "DEP":
                $url = Notifications::DEP;
                break;
            case "PENG":
                $url= Notifications::PENG;
                break;
            case "PER":
                $url= Notifications::PER;
                break;
            case "LPU":
                $url = Notifications::LPU.$idObj;
                break;
            case "LPB":
                $url = Notifications::LPB.$idObj;
                break;
            case "PK" :
                $url = Notifications::PK.$idObj."_";
                $rabid= $this->mNotif->getRABfromPKid($idObj);
                $url .=$rabid[0]["RAB_ID"];
                
                break;
            case "PP":
                $url = Notifications::PP.$idObj."_";
                $rabid= $this->mNotif->getRABfromPPid($idObj);
                $url .=$rabid[0]["RAB_ID"];
                
                break;
            case "PO":
                $url=  Notifications::PO.$idObj."/";
                $temp = explode(" ",$data["NOTIF_ACTION"])[1];
                $temp = explode("/",$temp)[1];
                if ($temp=="PO")
                {
                    $url.="2";
                }
                else if ($temp=="POOV")
                {
                    $url.="1";
                }
                break;
            default:
                $url = '';
                break;
        }
        
            
        
        redirect(base_url().$url);
        //var_dump($data);
        
        echo $url;
    }
    
    public function all($id)
    {
        if ($id == null || $id != $this->_idUserActive) {
            redirect(base_url().'notifications/');
        }
        $this->title="Notifikasi Anda";
        $this->theme_layout = 'monitoring';
        //print_r($this->data['role']);
        $this->display('acHome',$this->data);
    }
    
    
    
    public function getAllNotif()
    {
        echo $this->mNotif->getListNotif($this->data['role'],0,$this->_idUserActive);
    }
    
//    public function getAllPelaksanaan()
//    {
//        echo $this->mNotif->getListPelaksanaanNotif($this->data['role']);
//    }
//    
//    public function getAllPerencanaan()
//    {
//        echo $this->mNotif->getListPerencanaanNotif($this->data['role']);
//    }
//    public function getAllPengguna()
//    {
//        echo $this->mNotif->getListPenggunaNotif($this->data['role']);
//    }
    
    public function readAll()
    {
        $this->mNotif->updateOnReadAll($this->_idUserActive);
        redirect(base_url().'notifications');
    }
    
}

?>
