<?php

class mSupplier extends MY_Model {

    // constants, column definition
    const ID = 'SUPPLIER_ID';
    const CATEGORY = 'KATEGORI_SUPPLIER_ID';
    const KODE = 'SUPPLIER_KODE';
    const NAME = 'SUPPLIER_NAMA';
    const ADDRESS = 'SUPPLIER_ALAMAT';
    const DESCRIPTION = 'SUPPLIER_DESKRIPSI';
    const ACTIVE = 'SUPPLIER_ACTIVE';
    
    const TABLE = "master_supplier";

    function __construct() {
        parent::__construct();
        $this->tableName = mSupplier::TABLE;
        $this->idField = mSupplier::ID;
    }

    function getListSupplier_forPayment($id_rab=0){
        $sql="select sply.SUPPLIER_ID,sply.SUPPLIER_KODE,sply.SUPPLIER_NAMA,sply.TOP_KODE
                from purchase_order po
                inner join master_supplier sply
                on po.SUPPLIER_ID=sply.SUPPLIER_ID
                where sply.SUPPLIER_ACTIVE='1'
                and po.RAB_ID='$id_rab'
                group by sply.SUPPLIER_ID";
        return $this->db->query($sql)->result_array();
    }
	
	function getListSupplierByRabId($rab_id){
		$sql="SELECT master_supplier.*
		FROM detail_po 
		JOIN purchase_order ON purchase_order.PURCHASE_ORDER_ID = detail_po.PURCHASE_ORDER_ID
		JOIN master_supplier ON master_supplier.SUPPLIER_ID = purchase_order.SUPPLIER_ID
		JOIN detail_lpb ON detail_lpb.PO_ID = detail_po.PURCHASE_ORDER_ID
		WHERE purchase_order.RAB_ID = ".$rab_id."
		GROUP BY master_supplier.SUPPLIER_ID";
        return $this->db->query($sql)->result_array();
	}
}

?>