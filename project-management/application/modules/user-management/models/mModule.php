<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

class mModule extends MY_Model {

    // constants, column definition
    const ID = 'MODULES_ID';
    const NAME = 'MODULES_NAMA';
    const MNEMONIC = 'MODULES_MNEMONIC';
    const LEVEL = 'MODULES_LEVEL';
    const PARENT_ID = 'MODULES_PARENT';
    const TABLE = 'modules';

    public function __construct() {
        parent::__construct();
        $this->tableName = mModule::TABLE;
        $this->idField = mModule::ID;
    }

    public function getModulebyCode($code) {
        $sql = ('SELECT * FROM modules where  ' . mModule::MNEMONIC . '=? order by ' . mModule::ID . ' ASC');
        $query = $this->db->query($sql, array($code));
        $res = $query->row();
        if (count($res) <= 0) {
            //echo 'hahahaha';
            return;
        } else {
            return $query->row()->MODULES_ID;
        }
    }

    public function getAllowedModules($user_id) {
        $sql = "SELECT
	modules.*, roles.ROLE_ID,
	penggunaxroles.PENGGUNA_ID,
	(
		SELECT CONCAT(m.MODULES_MNEMONIC, \"_\" ,modules.MODULES_MNEMONIC) from modules m WHERE m.MODULES_ID = modules.MODULES_PARENT
  ) AS ROLE_MNEMONIC
FROM
	modules
JOIN hak_akses ON hak_akses.MODULES_ID = modules.MODULES_ID
JOIN roles ON roles.ROLE_ID = hak_akses.ROLE_ID
JOIN penggunaxroles ON penggunaxroles.ROLE_ID = roles.ROLE_ID
WHERE
	hak_akses.TIPE_ID >= 0 and penggunaxroles.PENGGUNA_ID = {$user_id}";
        //print_r($sql);
        $query = $this->db->query($sql);
        $result = array();
        if (!$query) {
            $errNo = $this->db->_error_number();
            $errMess = $this->db->_error_message();
            return null;
        } else if ($query->num_rows() > 0) {
            $it = 0;
            foreach ($query->result_array() as $row) {
                $result[$it++] = $row;
            }
        }
        return $result;
    }
    

    public function getPermission($idUser, $idModules) {
        //disini men-query dulu
        // 1.  Apakah role dari $idUser tersebut
        // 2.  Dari roles tersebut, apa saja modules yang boleh diakses (baik read/write)
        // 3.  Pengecekan apakah ada $idmodules di dalam array tadi
        // 4.  Bila ada, maka OK silahkan masuk
        // 5. Nanti pengaturan read/write diatur kemudian.
    }

}
