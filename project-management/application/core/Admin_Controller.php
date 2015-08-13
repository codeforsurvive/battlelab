<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/* controller di setiap modul dapat extends pada controller admin. Berfungsi untuk membatasi hak akses */

class Admin_Controller extends MY_Controller {

    protected $data = array(
    );
    protected $nmModule;
    protected $idModule;
    protected $status = NULL;

    function __construct() {

        parent::__construct();
        $this->load->model(array('user-management/mUserRole','notifications/mNotif'));

        $this->theme_folder = 'default';
        $this->left_sidebar= 'blank';
        $this->_set_idModule();

        //tambahkan pemanggilan _getPermit di sini.....
        $statusPermit = $this->_getPermit();
        if ($statusPermit == NLOGIN) {
            redirect('auth/Login');
        } else if ($statusPermit == NPERMITTED) {
            $message_403 = "Maaf, Anda tidak memiliki akses ke bagian ini.";
            $heading = "Akses ditolak!";
            show_error($message_403, 403, $heading);
        }

        $this->data['username'] = $this->_activeUser;
        $this->data['iduseractive'] = $this->_idUserActive;
        $roleList = $this->mModule->getAllowedModules($this->_idUserActive);
        $roleCodes = array();
        foreach ($roleList as $role) {
            array_push($roleCodes, $role['ROLE_MNEMONIC']);
        }
        //print_r(json_encode($roleList));
        //die(json_encode($roleCodes));
        $this->data['roleArray'] = $roleCodes;
        $this->data['role'] = json_encode($roleCodes);
        $this->_getNotif();
        
    }
    
    private function _getNotif()
    {
        $this->data['lastNotif']= $this->mNotif->getLastNotif($this->data['role'],$this->_idUserActive);
        $this->data['numNotif']= $this->mNotif->getNumNoRead($this->data['role'],$this->_idUserActive);
        
        
    }
    public function isAllowed($code){
        //die(var_dump($this->data['roleArray']));
        return in_array($code, $this->data['roleArray']);
    }

    private function _set_idModule() {

        $this->nmModule = $this->router->fetch_class();
        $this->idModule = $this->mModule->getModulebyCode($this->nmModule);
        //print_r('hai'.$this->idModule);
    }

    protected function _getPermit() {


        if (!$this->_getSession())
            return NLOGIN; //belum login

            
// 
        // Di sini mengecek apakah orang tersebut boleh mengakses data dengan ID Module ini.
        // Jika ada 1 data saja, berarti dianggap boleh.
        // $this->idModule bisa digunakan :D untuk melihat id dari IdModule yang diakses tersebut.
        // Nanti parameternya cukup 2 saja. yaitu
        // 1. ID User sekarang
        // 2. ID Modulenya sekarang
        // 
        // Unutk urusan read dan wreitenya nanti dulu saja. Buat itu dulu
        // $datas= $this->mModule->getPermission($this->_idUsersPermit,
        //         $this->_idUserActive, $this->idModule);
        //if (count($datas)>0) return PERMITTED; //permitted 
        //return NPERMITTED;//belum ada akses
        //if($this->_authorize())
        // $previlege = $this->_authorize();
        // return ($previlege) ? PERMITTED : NPERMITTED;
        return PERMITTED;
    }

    /**
     * 
     * mUserRole::ROLE_UNAUTHORIZED = -1
     * mUserRole::ROLE_VIEW = 0
     * mUserRole::ROLE_EDIT = 1
     * 
     * 
     */
    private function _authorize() {
        $previlege = $this->mUserRole->getPermission($this->_idUserActive, $this->idModule);

        return $previlege >= $this->status;
    }

}

?>
