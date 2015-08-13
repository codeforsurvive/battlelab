<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

class mUser extends MY_Model {

    // constants, column definition
    const ID = 'PENGGUNA_ID';
    const NAME = 'PENGGUNA_NAMA';
    const USERNAME = 'PENGGUNA_USERNAME';
    const PASSWORD = 'PENGGUNA_PASSWORD';
    const SIGN_PASSWORD = 'PENGGUNA_SIGN_PASSWORD';
    const PASSWORD_VALIDATION = 'PENGGUNA_PASSWORD_VAL';
    const EMAIL = 'PENGGUNA_EMAIL';
    const HP = 'PENGGUNA_HP';
    const ACTIVE = 'PENGGUNA_ACTIVE';
    const DATE_CREATED = 'PENGGUNA_DAFTAR';
    const DEPARTEMEN = 'DEPARTEMEN_ID';
    const TABLE = "PENGGUNA";
    const MUTASI = "MUTASI";
    const EDIT_LOGON_INFO = "EDIT_LOGON";

    public function __construct() {
        parent::__construct();
        $this->tableName = 'pengguna';
        $this->idField = mUser::ID;
    }

    public function updatePasswordValidasi($pwd, $id) {
        $data = array(mUser::PASSWORD_VALIDATION => $pwd, mUser::SIGN_PASSWORD => $pwd);

        $result = $this->_update($data, array($this->idField => $id));
        $this->save_log('update', $data, array($id));
        
        
        if (!$result) {
            $errNo = $this->db->_error_number();
            $errMess = $this->db->_error_message();
            echo $errMess;
            return false;
        }

        return true;
    }

}
