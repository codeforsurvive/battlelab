<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

class mNotif extends MY_Model {

    // constants, column definition
    const ID = 'NOTIF_ID';
	
        
    const TABLE = 'notifications';

    public function __construct() {
        parent::__construct();
        $this->tableName = mNotif::TABLE;
        $this->idField = mNotif::ID;
    }

    function getListNotif($roles,$tipe=0,$idPengguna) {
        //if tipe = 0, keluar data table
        //if tipe =1, keluar data biasa
        //if tipe=2, no read jum
        $modules = $this->_generateAllowModules($roles);
        
        $baseSQL = "select n.*, COALESCE(np.NOTIF_ISREAD,0) as NOTIF_ISREAD,
  IF(n.NOTIF_ACTOR='DBA or IT Administrator','DBA or IT Administrator',p.PENGGUNA_NAMA)  as PENGGUNA_NAMA, 
  substring_index(NOTIF_ACTION,' ',1) as AKSI, 
  substring_index(NOTIF_ACTION,' ',-1) as KODE_AKSI  
     from notifications n
     LEFT JOIN pengguna p ON n.NOTIF_ACTOR = p.PENGGUNA_ID
     LEFT JOIN (select * from notifxpengguna np where np.PENGGUNA_ID=".$idPengguna.") np  ON n.NOTIF_ID = np.NOTIF_ID";
        $baseSQL = $this->_generateFilterRoles($baseSQL,$modules);
        $baseSQL .=' ORDER BY n.NOTIF_TANGGAL DESC';
        
        if ($tipe==2)
        {
            $baseSQL = "select * from ( ".$baseSQL." ) datas where datas.NOTIF_ISREAD = 0";
        }
        //var_dump($baseSQL);
        $columns = array(
            array('db' => 'NOTIF_TANGGAL', 'dt' => 0),
            array('db' => 'PENGGUNA_NAMA', 'dt' => 1),
            array('db' => 'AKSI', 'dt' => 2),
            array('db' => 'NOTIF_MODULE', 'dt' => 3),
            array('db' => 'KODE_AKSI', 'dt' => 4),
            array('db' => 'NOTIF_ISREAD', 'dt' => 5),
            array('db' => 'NOTIF_ID', 'dt' => 6),
            
            array('db' => 'NOTIF_OBJECT', 'dt' => 7)
			
        );
		
        if ($tipe==1|| $tipe==2)
        {
        return $this->db->query($baseSQL)->result_array();
        }
        else if ($tipe==0)
        {
        return json_encode(SSP::simple($_GET, $this->tableName, $this->idField, $columns, $baseSQL));
        }
    }
    
//    function getListPenggunaNotif($roles) {
//        $modules = $this->_generateAllowModules($roles);
//        $baseSQL = "select n.*, IF(n.NOTIF_ACTOR='DBA or IT Administrator','DBA or IT Administrator',p.PENGGUNA_NAMA)  as PENGGUNA_NAMA, substring_index(NOTIF_ACTION,' ',1) as AKSI, substring_index(NOTIF_ACTION,' ',-1) as KODE_AKSI  from notifications n    LEFT JOIN pengguna p ON n.NOTIF_ACTOR = p.PENGGUNA_ID    where (n.NOTIF_MODULE = 'PER' or n.NOTIF_MODULE = 'PENG' or n.NOTIF_MODULE='DEP')";
//        $baseSQL = $this->_generateFilterRoles($baseSQL,$modules);
//        $columns = array(
//            array('db' => 'NOTIF_TANGGAL', 'dt' => 0),
//            array('db' => 'PENGGUNA_NAMA', 'dt' => 1),
//            array('db' => 'AKSI', 'dt' => 2),
//            array('db' => 'NOTIF_MODULE', 'dt' => 3),
//            array('db' => 'KODE_AKSI', 'dt' => 4),
//            array('db' => 'NOTIF_ISREAD', 'dt' => 5),
//            array('db' => 'NOTIF_ID', 'dt' => 6),
//            
//            array('db' => 'NOTIF_OBJECT', 'dt' => 7)
//			
//        );
//
//        return json_encode(SSP::simple($_GET, $this->tableName, $this->idField, $columns, $baseSQL));
//    }
//    
//    function getListPerencanaanNotif($roles) {
//        $modules = $this->_generateAllowModules($roles);
//        $baseSQL = "select n.*, IF(n.NOTIF_ACTOR='DBA or IT Administrator','DBA or IT Administrator',p.PENGGUNA_NAMA)  as PENGGUNA_NAMA, substring_index(NOTIF_ACTION,' ',1) as AKSI, substring_index(NOTIF_ACTION,' ',-1) as KODE_AKSI  from notifications n    LEFT JOIN pengguna p ON n.NOTIF_ACTOR = p.PENGGUNA_ID    where (n.NOTIF_MODULE = 'analisa_rab' or n.NOTIF_MODULE = 'MPRO' or n.NOTIF_MODULE='BARANG' or n.NOTIF_MODULE='UPAH' or n.NOTIF_MODULE='PRO' or n.NOTIF_MODULE='RAB')";
//        $baseSQL = $this->_generateFilterRoles($baseSQL,$modules);
//        $columns = array(
//            array('db' => 'NOTIF_TANGGAL', 'dt' => 0),
//            array('db' => 'PENGGUNA_NAMA', 'dt' => 1),
//            array('db' => 'AKSI', 'dt' => 2),
//            array('db' => 'NOTIF_MODULE', 'dt' => 3),
//            array('db' => 'KODE_AKSI', 'dt' => 4),
//            array('db' => 'NOTIF_ISREAD', 'dt' => 5),
//            array('db' => 'NOTIF_ID', 'dt' => 6),
//            
//            array('db' => 'NOTIF_OBJECT', 'dt' => 7)
//			
//        );
//
//        return json_encode(SSP::simple($_GET, $this->tableName, $this->idField, $columns, $baseSQL));
//    }
//    
//    function getListPelaksanaanNotif($roles) {
//        $modules = $this->_generateAllowModules($roles);
//        $baseSQL = "select n.*, IF(n.NOTIF_ACTOR='DBA or IT Administrator','DBA or IT Administrator',p.PENGGUNA_NAMA)  as PENGGUNA_NAMA, substring_index(NOTIF_ACTION,' ',1) as AKSI, substring_index(NOTIF_ACTION,' ',-1) as KODE_AKSI  from notifications n    LEFT JOIN pengguna p ON n.NOTIF_ACTOR = p.PENGGUNA_ID  where (n.NOTIF_MODULE = 'bpm' or n.NOTIF_MODULE = 'HM' or n.NOTIF_MODULE='INV' or n.NOTIF_MODULE='KM' or n.NOTIF_MODULE='SUP' or n.NOTIF_MODULE='GUDANG' or n.NOTIF_MODULE='OP' or n.NOTIF_MODULE='OV' or n.NOTIF_MODULE='PAY' or n.NOTIF_MODULE='LPU' or n.NOTIF_MODULE='LPB' or n.NOTIF_MODULE='PK' or n.NOTIF_MODULE='PP' or n.NOTIF_MODULE='PO')";
//        $baseSQL = $this->_generateFilterRoles($baseSQL,$modules);
//        $columns = array(
//            array('db' => 'NOTIF_TANGGAL', 'dt' => 0),
//            array('db' => 'PENGGUNA_NAMA', 'dt' => 1),
//            array('db' => 'AKSI', 'dt' => 2),
//            array('db' => 'NOTIF_MODULE', 'dt' => 3),
//            array('db' => 'KODE_AKSI', 'dt' => 4),
//            array('db' => 'NOTIF_ISREAD', 'dt' => 5),
//            array('db' => 'NOTIF_ID', 'dt' => 6),
//            
//            array('db' => 'NOTIF_OBJECT', 'dt' => 7)
//			
//        );
//        var_dump($baseSQL);
//        //return json_encode(SSP::simple($_GET, $this->tableName, $this->idField, $columns, $baseSQL));
//    }
    
    
    function getLastNotif($roles,$idPengguna) {
        $data = $this->getListNotif($roles,1,$idPengguna);
        
        $result = array_slice($data, 0, 5);
        return $result;
        
    }
    
    
    
    function getNumNoRead($roles,$idPengguna)
    {
        $data = $this->getListNotif($roles,2,$idPengguna);
        //var_dump($data);
        return count($data);
    }
	function checkRead($idNotif, $idPengguna)
	{
		$query ="select * from `notifxpengguna` where `NOTIF_ID` = $idNotif and `PENGGUNA_ID` = $idPengguna";
		return $this->db->query($query)->result_array();
	}
    function updateOnRead($idNotif, $idPengguna)
    {
		if (!empty($this->checkRead($idNotif,$idPengguna)))
		{
		   return true;
		}
        $query = "INSERT INTO `notifxpengguna` (`NOTIF_ID`, `PENGGUNA_ID`) VALUES (".$idNotif.", ".$idPengguna.")";
        $this->db->query($query);
        return true;
    }
    
    function updateOnReadAll($idPengguna)
    {
        $query = "CALL `readAllNotif`('".$idPengguna."')";
        $this->db->query($query);
        return true;
    }
    
    function getRABfromPKid($id)
    {
         $baseSQL = "select RAB_ID from permintaan_pekerjaan pp where pp.PERMINTAAN_PEKERJAAN_ID=".$id;
        return $this->db->query($baseSQL)->result_array();
    }
    
        function getRABfromPPid($id)
    {
         $baseSQL = "select RAB_ID from permintaan_pembelian pp where pp.PERMINTAAN_PEMBELIAN_ID=".$id;
        return $this->db->query($baseSQL)->result_array();
    }
    
    private function _generateAllowModules($data)
    {
        $modules = array();
        $kode_modules=array();
        foreach (json_decode($data) as $r)
        {
            $dt = explode("_", $r)[0];
            if (!in_array($dt, $modules, true))
            {
                $sql = "select MODULES_KODE from modules where MODULES_MNEMONIC ='".$dt."'";
                $res = $this->db->query($sql)->result_array();
                if ($res == NULL)
                {
                    continue;
                }
                $res = $res[0]["MODULES_KODE"];
                //var_dump($res);
                array_push($modules,$dt);
                array_push($kode_modules,$res);
            }
        }
        
        return $kode_modules;
    }
    
    private function _generateFilterRoles($baseSQL,$modules)
    {
        if (!empty($modules))
        {
            $baseSQL .=" where (";
            foreach ($modules as $mo)
            {
                $baseSQL .= "n.NOTIF_MODULE='".$mo."' OR ";
            }
            
            $baseSQL = substr($baseSQL, 0, -4);
            $baseSQL .= ")";
        }
        return $baseSQL;
        
    }
    

   
}
