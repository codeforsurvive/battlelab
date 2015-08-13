<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

class mInvoice extends MY_Model {

    // constants, column definition
    const ID = 'INVOICE_ID';
    const LPB_ID = 'LPB_ID';
	const TANGGAL_TRANSAKSI = 'TANGGAL_TRANSAKSI';
    const TOTAL = 'TOTAL_HARGA_INVOICE';
	const PETUGAS_ID = 'PETUGAS_ID';
	const VALIDATOR_ID = 'VALIDATOR_ID';
	const STATUS = 'VALIDATION_ID';

    public function __construct() {
        parent::__construct();
        $this->tableName = 'invoice';
        $this->idField = mInvoice::ID;
    }

	function getAllLPB($RAB_ID, $SUPPLIER_ID){
		$sql = "SELECT penerimaan_barang.*, status_lpb.STATUS_LPB_NAMA
		FROM purchase_order
		JOIN detail_lpb ON detail_lpb.PO_ID = purchase_order.PURCHASE_ORDER_ID
		JOIN penerimaan_barang ON penerimaan_barang.PENERIMAAN_BARANG_ID = detail_lpb.PENERIMAAN_BARANG_ID
		LEFT JOIN status_lpb ON status_lpb.STATUS_LPB_ID = penerimaan_barang.STATUS_LPB_ID
		WHERE purchase_order.RAB_ID = $RAB_ID AND penerimaan_barang.SUPPLIER_ID = $SUPPLIER_ID
		GROUP BY penerimaan_barang.PENERIMAAN_BARANG_ID";
		return $this->db->query($sql)->result_array();
	}
	
    function getListInvoice() {
        $baseSQL = "SELECT invoice.*, status_validasi.STATUS_VALIDASI_NAMA FROM invoice
		LEFT JOIN status_validasi ON status_validasi.STATUS_VALIDASI_ID = invoice.VALIDATION_ID 
		WHERE invoice.INVOICE_TIPE = 'material'";

        $columns = array(
            array('db' => 'INVOICE_ID', 'dt' => 0),
			array('db' => 'INVOICE_KODE', 'dt' => 1),
            array('db' => 'TANGGAL_TRANSAKSI', 'dt' => 2),
            array('db' => 'TOTAL_HARGA_INVOICE', 'dt' => 3),
            array('db' => 'STATUS_VALIDASI_NAMA', 'dt' => 4),
			array('db' => 'INVOICE_ID', 'dt' => 5)
        );

        return json_encode(SSP::simple($_GET, $this->tableName, $this->idField, $columns, $baseSQL));
    }
	
	function getViewBarangLPB($LPB_ID){
		$baseSQL = "SELECT top.*, detail_invoice.DETAIL_INVOICE_ID, pajak.*, kategori_pajak.*, detail_po.DISKON1, detail_po.DISKON2, detail_po.DISKON3, detail_po.HARGA_DISKON, detail_po.HARGA_PAJAK, detail_lpb.*, master_barang.BARANG_NAMA AS ITEM_NAMA, master_barang.BARANG_KODE AS ITEM_KODE, master_barang.SATUAN_NAMA AS ITEM_SATUAN, detail_po.HARGA_MATERI_PO AS ITEM_HARGA, penerimaan_barang.PENERIMAAN_BARANG_KODE, purchase_order.PURCHASE_ORDER_KODE 
			FROM detail_lpb
			JOIN penerimaan_barang ON penerimaan_barang.PENERIMAAN_BARANG_ID = detail_lpb.PENERIMAAN_BARANG_ID
			JOIN master_barang ON master_barang.BARANG_ID = detail_lpb.BARANG_ID
			JOIN purchase_order ON purchase_order.PURCHASE_ORDER_ID = detail_lpb.PO_ID
			JOIN detail_po ON detail_po.BARANG_ID = detail_lpb.BARANG_ID AND detail_po.PURCHASE_ORDER_ID = purchase_order.PURCHASE_ORDER_ID
			JOIN top ON top.TOP_ID = purchase_order.TOP_ID
			JOIN pajak ON pajak.PAJAK_ID = purchase_order.PAJAK_ID
			JOIN kategori_pajak ON kategori_pajak.KATEGORI_PAJAK_ID = purchase_order.KATEGORI_PAJAK_ID
			LEFT JOIN detail_invoice ON detail_invoice.LPB_ID = detail_lpb.PENERIMAAN_BARANG_ID
			WHERE detail_lpb.PENERIMAAN_BARANG_ID = $LPB_ID
			UNION
			SELECT top.*, detail_invoice.DETAIL_INVOICE_ID, pajak.*, kategori_pajak.*, detail_po.DISKON1, detail_po.DISKON2, detail_po.DISKON3, detail_po.HARGA_DISKON, detail_po.HARGA_PAJAK, detail_lpb.*, subcon.SUBCON_NAMA AS ITEM_NAMA, subcon_tipe.SUBCON_TIPE_KODE AS ITEM_KODE, subcon.SATUAN_NAMA AS ITEM_SATUAN, detail_po.HARGA_MATERI_PO AS ITEM_HARGA, penerimaan_barang.PENERIMAAN_BARANG_KODE, purchase_order.PURCHASE_ORDER_KODE 
			FROM detail_lpb
			JOIN penerimaan_barang ON penerimaan_barang.PENERIMAAN_BARANG_ID = detail_lpb.PENERIMAAN_BARANG_ID
			JOIN subcon ON subcon.SUBCON_ID = detail_lpb.SUBCON_ID
			JOIN subcon_tipe ON subcon_tipe.SUBCON_TIPE_ID = subcon.SUBCON_TIPE_ID
			JOIN purchase_order ON purchase_order.PURCHASE_ORDER_ID = detail_lpb.PO_ID
			JOIN detail_po ON detail_po.SUBCON_ID = detail_lpb.SUBCON_ID AND detail_po.PURCHASE_ORDER_ID = purchase_order.PURCHASE_ORDER_ID
			JOIN top ON top.TOP_ID = purchase_order.TOP_ID
			JOIN pajak ON pajak.PAJAK_ID = purchase_order.PAJAK_ID
			JOIN kategori_pajak ON kategori_pajak.KATEGORI_PAJAK_ID = purchase_order.KATEGORI_PAJAK_ID
			LEFT JOIN detail_invoice ON detail_invoice.LPB_ID = detail_lpb.PENERIMAAN_BARANG_ID
			WHERE detail_lpb.PENERIMAAN_BARANG_ID = $LPB_ID
			UNION
			SELECT top.*, detail_invoice.DETAIL_INVOICE_ID, pajak.*, kategori_pajak.*, detail_po.DISKON1, detail_po.DISKON2, detail_po.DISKON3, detail_po.HARGA_DISKON, detail_po.HARGA_PAJAK, detail_lpb.*, master_barang.BARANG_NAMA AS ITEM_NAMA, master_barang.BARANG_KODE AS ITEM_KODE, master_barang.SATUAN_NAMA AS ITEM_SATUAN, detail_po.HARGA_MATERI_PO AS ITEM_HARGA, penerimaan_barang.PENERIMAAN_BARANG_KODE , purchase_order.PURCHASE_ORDER_KODE
			FROM detail_lpb
			JOIN penerimaan_barang ON penerimaan_barang.PENERIMAAN_BARANG_ID = detail_lpb.PENERIMAAN_BARANG_ID
			JOIN master_barang ON master_barang.BARANG_ID = detail_lpb.BARANG_OVERHEAD_ID
			JOIN purchase_order ON purchase_order.PURCHASE_ORDER_ID = detail_lpb.PO_ID
			JOIN overhead ON overhead.RAB_ID = purchase_order.RAB_ID
			JOIN detail_overhead ON detail_overhead.BARANG_ID = detail_lpb.BARANG_OVERHEAD_ID AND overhead.OVERHEAD_ID = detail_overhead.OVERHEAD_ID
			JOIN detail_po ON detail_po.BARANG_ID = detail_lpb.BARANG_OVERHEAD_ID AND detail_po.PURCHASE_ORDER_ID = purchase_order.PURCHASE_ORDER_ID
			JOIN top ON top.TOP_ID = purchase_order.TOP_ID
			JOIN pajak ON pajak.PAJAK_ID = purchase_order.PAJAK_ID
			JOIN kategori_pajak ON kategori_pajak.KATEGORI_PAJAK_ID = purchase_order.KATEGORI_PAJAK_ID
			LEFT JOIN detail_invoice ON detail_invoice.LPB_ID = detail_lpb.PENERIMAAN_BARANG_ID
			WHERE detail_lpb.PENERIMAAN_BARANG_ID = $LPB_ID
			UNION
			SELECT top.*, detail_invoice.DETAIL_INVOICE_ID, pajak.*, kategori_pajak.*, detail_po.DISKON1, detail_po.DISKON2, detail_po.DISKON3, detail_po.HARGA_DISKON, detail_po.HARGA_PAJAK, detail_lpb.*, paket_overhead_material.PAKET_OVERHEAD_MATERIAL_NAMA AS ITEM_NAMA, (@a:='LSMOV') AS ITEM_KODE, paket_overhead_material.SATUAN_NAMA AS ITEM_SATUAN, detail_po.HARGA_MATERI_PO AS ITEM_HARGA, penerimaan_barang.PENERIMAAN_BARANG_KODE, purchase_order.PURCHASE_ORDER_KODE 
			FROM detail_lpb
			JOIN penerimaan_barang ON penerimaan_barang.PENERIMAAN_BARANG_ID = detail_lpb.PENERIMAAN_BARANG_ID
			JOIN paket_overhead_material ON paket_overhead_material.PAKET_OVERHEAD_MATERIAL_ID = detail_lpb.PAKET_OVERHEAD_MATERIAL_ID
			JOIN purchase_order ON purchase_order.PURCHASE_ORDER_ID = detail_lpb.PO_ID
			JOIN detail_po ON detail_po.SUBCON_ID = detail_lpb.PAKET_OVERHEAD_MATERIAL_ID AND detail_po.PURCHASE_ORDER_ID = purchase_order.PURCHASE_ORDER_ID
			JOIN top ON top.TOP_ID = purchase_order.TOP_ID
			JOIN pajak ON pajak.PAJAK_ID = purchase_order.PAJAK_ID
			JOIN kategori_pajak ON kategori_pajak.KATEGORI_PAJAK_ID = purchase_order.KATEGORI_PAJAK_ID
			LEFT JOIN detail_invoice ON detail_invoice.LPB_ID = detail_lpb.PENERIMAAN_BARANG_ID
			WHERE detail_lpb.PENERIMAAN_BARANG_ID = $LPB_ID";
		
		$columns = array(
			array( 'db' => 'ITEM_NAMA', 'dt' => 0 ),
			array( 'db' => 'PURCHASE_ORDER_KODE', 'dt' => 1 ),
			array( 'db' => 'ITEM_KODE', 'dt' => 2 ),
			array( 'db' => 'VOLUME_LPB', 'dt' => 3 ),
			array( 'db' => 'ITEM_SATUAN', 'dt' => 4 ),
			array( 'db' => 'ITEM_HARGA', 'dt' => 5 ),
			array( 'db' => 'BARANG_ID', 'dt' => 6 ),
			array( 'db' => 'SUBCON_ID', 'dt' => 7 ),
			array( 'db' => 'BARANG_OVERHEAD_ID', 'dt' => 8 ),
			array( 'db' => 'PAKET_OVERHEAD_MATERIAL_ID', 'dt' => 9 ),
			array( 'db' => 'PENERIMAAN_BARANG_ID', 'dt' => 10 ),
			array( 'db' => 'PENERIMAAN_BARANG_KODE', 'dt' => 11 ),
			array( 'db' => 'DISKON1', 'dt' => 12 ),
			array( 'db' => 'DISKON2', 'dt' => 13 ),
			array( 'db' => 'DISKON3', 'dt' => 14 ),
			array( 'db' => 'PAJAK_ID', 'dt' => 15 ),
			array( 'db' => 'PAJAK_NAMA', 'dt' => 16 ),
			array( 'db' => 'PAJAK_VALUE', 'dt' => 17 ),
			array( 'db' => 'KATEGORI_PAJAK_ID', 'dt' => 18 ),
			array( 'db' => 'KATEGORI_PAJAK_NAMA', 'dt' => 19 ),
			array( 'db' => 'HARGA_DISKON', 'dt' => 20 ),
			array( 'db' => 'HARGA_PAJAK', 'dt' => 21 ),
			array( 'db' => 'DETAIL_INVOICE_ID', 'dt' => 22 ),
			array( 'db' => 'TOP_ID', 'dt' => 23 ),
			array( 'db' => 'TOP_VALUE', 'dt' => 24 ),
			array( 'db' => 'TOP_KODE', 'dt' => 25 )
		);
		
		return json_encode(SSP::simple( $_GET, $this->tableName, $this->idField, $columns, $baseSQL));
	}
	
	function getDetailInvoice($idInvoice){
		$sql = "SELECT project.*, drafter.PENGGUNA_NAMA AS DRAFTER_NAMA, validator.PENGGUNA_NAMA AS VALIDATOR_NAMA, invoice.*, rab_transaction.RAB_KODE, rab_transaction.RAB_NAMA, master_supplier.SUPPLIER_NAMA, top.TOP_DESCRIPTION, status_validasi.STATUS_VALIDASI_NAMA FROM invoice
		LEFT JOIN rab_transaction ON invoice.RAB_ID = rab_transaction.RAB_ID
		LEFT JOIN project ON project.PROJECT_ID = rab_transaction.PROJECT_ID
		LEFT JOIN main_project ON main_project.MAIN_PROJECT_ID = project.MAIN_PROJECT_ID
		LEFT JOIN master_supplier ON master_supplier.SUPPLIER_ID = invoice.SUPPLIER_ID
		LEFT JOIN top ON top.TOP_ID = invoice.TOP_ID
		LEFT JOIN pengguna drafter ON drafter.PENGGUNA_ID = invoice.PETUGAS_ID
		LEFT JOIN pengguna validator ON validator.PENGGUNA_ID = invoice.VALIDATOR_ID
		LEFT JOIN status_validasi ON status_validasi.STATUS_VALIDASI_ID = invoice.VALIDATION_ID
		WHERE invoice.INVOICE_ID = $idInvoice ";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	function getViewDetailInvoice($idInvoice){
		$sql = "SELECT top.*, pajak.*, kategori_pajak.*, detail_po.DISKON1, detail_po.DISKON2, detail_po.DISKON3, detail_po.HARGA_DISKON, detail_po.HARGA_PAJAK, detail_invoice.*, master_barang.BARANG_NAMA AS ITEM_NAMA, master_barang.BARANG_KODE AS ITEM_KODE, master_barang.SATUAN_NAMA AS ITEM_SATUAN, detail_po.HARGA_MATERI_PO AS ITEM_HARGA, detail_lpb.VOLUME_LPB, penerimaan_barang.PENERIMAAN_BARANG_KODE, penerimaan_barang.PENERIMAAN_BARANG_ID FROM detail_invoice
		LEFT JOIN penerimaan_barang ON penerimaan_barang.PENERIMAAN_BARANG_ID = detail_invoice.LPB_ID
		LEFT JOIN detail_lpb ON penerimaan_barang.PENERIMAAN_BARANG_ID = detail_lpb.PENERIMAAN_BARANG_ID
		JOIN master_barang ON detail_lpb.BARANG_ID = master_barang.BARANG_ID
		JOIN purchase_order ON purchase_order.PURCHASE_ORDER_ID = detail_lpb.PO_ID
		JOIN detail_po ON detail_po.BARANG_ID = detail_lpb.BARANG_ID AND detail_po.PURCHASE_ORDER_ID = purchase_order.PURCHASE_ORDER_ID
		JOIN top ON top.TOP_ID = purchase_order.TOP_ID
		JOIN pajak ON pajak.PAJAK_ID = purchase_order.PAJAK_ID
		JOIN kategori_pajak ON kategori_pajak.KATEGORI_PAJAK_ID = purchase_order.KATEGORI_PAJAK_ID
		WHERE detail_invoice.INVOICE_ID = $idInvoice
		UNION 
		SELECT top.*, pajak.*, kategori_pajak.*, detail_po.DISKON1, detail_po.DISKON2, detail_po.DISKON3, detail_po.HARGA_DISKON, detail_po.HARGA_PAJAK, detail_invoice.*, subcon.SUBCON_NAMA AS ITEM_NAMA, subcon_tipe.SUBCON_TIPE_KODE AS ITEM_KODE, subcon.SATUAN_NAMA AS ITEM_SATUAN, detail_po.HARGA_MATERI_PO AS ITEM_HARGA, detail_lpb.VOLUME_LPB, penerimaan_barang.PENERIMAAN_BARANG_KODE, penerimaan_barang.PENERIMAAN_BARANG_ID FROM detail_invoice
		LEFT JOIN penerimaan_barang ON penerimaan_barang.PENERIMAAN_BARANG_ID = detail_invoice.LPB_ID
		LEFT JOIN detail_lpb ON penerimaan_barang.PENERIMAAN_BARANG_ID = detail_lpb.PENERIMAAN_BARANG_ID
		JOIN subcon ON subcon.SUBCON_ID = detail_lpb.SUBCON_ID
		JOIN subcon_tipe ON subcon_tipe.SUBCON_TIPE_ID = subcon.SUBCON_TIPE_ID
		JOIN purchase_order ON purchase_order.PURCHASE_ORDER_ID = detail_lpb.PO_ID
		JOIN detail_po ON detail_po.SUBCON_ID = detail_lpb.SUBCON_ID AND detail_po.PURCHASE_ORDER_ID = purchase_order.PURCHASE_ORDER_ID
		JOIN top ON top.TOP_ID = purchase_order.TOP_ID
		JOIN pajak ON pajak.PAJAK_ID = purchase_order.PAJAK_ID
		JOIN kategori_pajak ON kategori_pajak.KATEGORI_PAJAK_ID = purchase_order.KATEGORI_PAJAK_ID
		WHERE detail_invoice.INVOICE_ID = $idInvoice 
		UNION 
		SELECT top.*, pajak.*, kategori_pajak.*, detail_po.DISKON1, detail_po.DISKON2, detail_po.DISKON3, detail_po.HARGA_DISKON, detail_po.HARGA_PAJAK, detail_invoice.*, master_barang.BARANG_NAMA AS ITEM_NAMA, master_barang.BARANG_KODE AS ITEM_KODE, master_barang.SATUAN_NAMA AS ITEM_SATUAN, detail_po.HARGA_MATERI_PO AS ITEM_HARGA, detail_lpb.VOLUME_LPB, penerimaan_barang.PENERIMAAN_BARANG_KODE, penerimaan_barang.PENERIMAAN_BARANG_ID FROM detail_invoice
		LEFT JOIN penerimaan_barang ON penerimaan_barang.PENERIMAAN_BARANG_ID = detail_invoice.LPB_ID
		LEFT JOIN detail_lpb ON penerimaan_barang.PENERIMAAN_BARANG_ID = detail_lpb.PENERIMAAN_BARANG_ID
		JOIN master_barang ON master_barang.BARANG_ID = detail_lpb.BARANG_OVERHEAD_ID
		JOIN purchase_order ON purchase_order.PURCHASE_ORDER_ID = detail_lpb.PO_ID
		JOIN overhead ON overhead.RAB_ID = purchase_order.RAB_ID
		JOIN detail_overhead ON detail_overhead.BARANG_ID = detail_lpb.BARANG_OVERHEAD_ID AND overhead.OVERHEAD_ID = detail_overhead.OVERHEAD_ID
		JOIN detail_po ON detail_po.BARANG_ID = detail_lpb.BARANG_OVERHEAD_ID AND detail_po.PURCHASE_ORDER_ID = purchase_order.PURCHASE_ORDER_ID
		JOIN top ON top.TOP_ID = purchase_order.TOP_ID
		JOIN pajak ON pajak.PAJAK_ID = purchase_order.PAJAK_ID
		JOIN kategori_pajak ON kategori_pajak.KATEGORI_PAJAK_ID = purchase_order.KATEGORI_PAJAK_ID
		WHERE detail_invoice.INVOICE_ID = $idInvoice
		UNION
		SELECT top.*, pajak.*, kategori_pajak.*, detail_po.DISKON1, detail_po.DISKON2, detail_po.DISKON3, detail_po.HARGA_DISKON, detail_po.HARGA_PAJAK, detail_invoice.*, paket_overhead_material.PAKET_OVERHEAD_MATERIAL_NAMA AS ITEM_NAMA, (@a:='LSMOV') AS ITEM_KODE, paket_overhead_material.SATUAN_NAMA AS ITEM_SATUAN, detail_po.HARGA_MATERI_PO AS ITEM_HARGA, detail_lpb.VOLUME_LPB, penerimaan_barang.PENERIMAAN_BARANG_KODE, penerimaan_barang.PENERIMAAN_BARANG_ID FROM detail_invoice
		LEFT JOIN penerimaan_barang ON penerimaan_barang.PENERIMAAN_BARANG_ID = detail_invoice.LPB_ID
		LEFT JOIN detail_lpb ON penerimaan_barang.PENERIMAAN_BARANG_ID = detail_lpb.PENERIMAAN_BARANG_ID
		JOIN paket_overhead_material ON paket_overhead_material.PAKET_OVERHEAD_MATERIAL_ID = detail_lpb.PAKET_OVERHEAD_MATERIAL_ID
		JOIN purchase_order ON purchase_order.PURCHASE_ORDER_ID = detail_lpb.PO_ID
		JOIN detail_po ON detail_po.SUBCON_ID = detail_lpb.PAKET_OVERHEAD_MATERIAL_ID AND detail_po.PURCHASE_ORDER_ID = purchase_order.PURCHASE_ORDER_ID
		JOIN top ON top.TOP_ID = purchase_order.TOP_ID
		JOIN pajak ON pajak.PAJAK_ID = purchase_order.PAJAK_ID
		JOIN kategori_pajak ON kategori_pajak.KATEGORI_PAJAK_ID = purchase_order.KATEGORI_PAJAK_ID
		WHERE detail_invoice.INVOICE_ID = $idInvoice ";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	function insertAndGetLast($data) {
        $this->db->insert($this->tableName, $data);
        return $this->db->insert_id();
    }
}
