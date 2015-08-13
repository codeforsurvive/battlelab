<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

class mPo extends MY_Model {

    // constants, column definition
    const ID = 'PURCHASE_ORDER_ID';
    const PURCHASE_ORDER_KODE = 'PURCHASE_ORDER_KODE';
	const STATUS = 'STATUS_PO_ID';
        
    const TABLE = 'purchase_order';

    public function __construct() {
        parent::__construct();
        $this->tableName = 'purchase_order';
        $this->idField = 'PURCHASE_ORDER_ID';
    }

    function getListPO() {
        $baseSQL = "SELECT po.*, rab.RAB_KODE, sup.SUPPLIER_NAMA, stat.STATUS_PO_NAMA FROM purchase_order po JOIN rab_transaction rab ON rab.RAB_ID = po.RAB_ID 
		LEFT JOIN master_supplier sup ON sup.SUPPLIER_ID = po.SUPPLIER_ID
		LEFT JOIN status_po stat ON stat.STATUS_PO_ID = po.STATUS_PO_ID";

        $columns = array(
            array('db' => 'PURCHASE_ORDER_ID', 'dt' => 0),
            array('db' => 'PURCHASE_ORDER_KODE', 'dt' => 1),
            array('db' => 'RAB_KODE', 'dt' => 2),
            array('db' => 'SUPPLIER_NAMA', 'dt' => 3),
            array('db' => 'PURCHASE_ORDER_TOTAL', 'dt' => 4),
            array('db' => 'STATUS_PO_NAMA', 'dt' => 5),
			array('db' => 'PURCHASE_ORDER_ID', 'dt' => 6),
			array('db' => 'KATEGORI_PP_ID', 'dt' => 7)
        );

        return json_encode(SSP::simple($_GET, $this->tableName, $this->idField, $columns, $baseSQL));
    }

    function getDetailPO($idPO){
		$sql = "SELECT po.*, project.*, main_project.*, drafter.PENGGUNA_NAMA AS DRAFTER_NAMA, validator.PENGGUNA_NAMA AS VALIDATOR_NAMA, rab.RAB_KODE, rab.RAB_NAMA, sup.*, stat.STATUS_PO_NAMA, gud.GUDANG_NAMA, pajak.PAJAK_NAMA, pajak.PAJAK_VALUE, kat_pajak.KATEGORI_PAJAK_NAMA, top.TOP_KODE, top.TOP_VALUE, top.TOP_DESCRIPTION, kat_pp.KATEGORI_PP_NAMA
		FROM purchase_order po 
		JOIN rab_transaction rab ON rab.RAB_ID = po.RAB_ID 
		LEFT JOIN project ON project.PROJECT_ID = rab.PROJECT_ID
		LEFT JOIN main_project ON main_project.MAIN_PROJECT_ID = project.MAIN_PROJECT_ID
		LEFT JOIN master_supplier sup ON sup.SUPPLIER_ID = po.SUPPLIER_ID
		LEFT JOIN status_po stat ON stat.STATUS_PO_ID = po.STATUS_PO_ID
		LEFT JOIN pajak ON pajak.PAJAK_ID = po.PAJAK_ID
		LEFT JOIN kategori_pajak kat_pajak ON kat_pajak.KATEGORI_PAJAK_ID = po.KATEGORI_PAJAK_ID
		LEFT JOIN master_gudang gud ON gud.GUDANG_ID = po.GUDANG_ID
		LEFT JOIN top ON top.TOP_ID = po.TOP_ID
		LEFT JOIN pengguna drafter ON drafter.PENGGUNA_ID = po.PETUGAS_ID
		LEFT JOIN pengguna validator ON validator.PENGGUNA_ID = po.VALIDATOR_ID
		JOIN kategori_pp kat_pp ON kat_pp.KATEGORI_PP_ID = po.KATEGORI_PP_ID
		WHERE po.PURCHASE_ORDER_ID = $idPO ";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	function getDetailPPbyPO($idPO, $tipe){
		if($tipe==1){
			$sql = "(SELECT 
				master_barang.BARANG_NAMA,
				master_barang.BARANG_KODE,
				master_barang.BARANG_ID,
				detail_po.VOLUME_PO,
				permintaan_pembelian.PERMINTAAN_PEMBELIAN_KODE AS PP_KODE,
				permintaan_pembelian.PERMINTAAN_PEMBELIAN_ID AS PP_ID, 
				detail_transaksi_pp.VOLUME_PP AS VOLUME_PP, 
				detail_overhead.DETAIL_OVERHEAD_HARGA AS HARGA_DETAIL,
				detail_po.HARGA_MATERI_PO,
				detail_po.HARGA_AWAL,
				detail_po.HARGA_DISKON,
				detail_po.DISKON1,
				detail_po.DISKON2,
				detail_po.DISKON3,
				detail_po.HARGA_PAJAK,
				detail_po.HARGA_FINAL,
				COALESCE(temp.VOLUME_PO_TERPAKAI,0) AS VOLUME_PO_TERPAKAI, 
				(detail_transaksi_pp.VOLUME_PP-COALESCE(temp.VOLUME_PO_TERPAKAI,0)) AS VOLUME_PP_SISA
				FROM detail_po
				JOIN master_barang ON master_barang.BARANG_ID = detail_po.BARANG_ID
				JOIN purchase_order ON purchase_order.PURCHASE_ORDER_ID = detail_po.PURCHASE_ORDER_ID
				JOIN permintaan_pembelian ON permintaan_pembelian.PERMINTAAN_PEMBELIAN_ID = detail_po.PERMINTAAN_PEMBELIAN_ID
				JOIN detail_transaksi_pp ON detail_transaksi_pp.PERMINTAAN_PEMBELIAN_ID = detail_po.PERMINTAAN_PEMBELIAN_ID
				JOIN overhead ON overhead.RAB_ID = permintaan_pembelian.RAB_ID
				JOIN detail_overhead ON detail_overhead.BARANG_ID = detail_transaksi_pp.BARANG_ID AND detail_overhead.OVERHEAD_ID = overhead.OVERHEAD_ID
				LEFT JOIN (SELECT detail_po.BARANG_ID, detail_po.PERMINTAAN_PEMBELIAN_ID, SUM(IF(purchase_order.STATUS_PO_ID = 3,detail_po.VOLUME_PO,0)) AS VOLUME_PO_TERPAKAI
				FROM detail_po 
				JOIN purchase_order ON purchase_order.PURCHASE_ORDER_ID = detail_po.PURCHASE_ORDER_ID
				GROUP BY detail_po.BARANG_ID, detail_po.PERMINTAAN_PEMBELIAN_ID) temp ON temp.BARANG_ID = detail_transaksi_pp.BARANG_ID AND temp.PERMINTAAN_PEMBELIAN_ID = detail_transaksi_pp.PERMINTAAN_PEMBELIAN_ID
				WHERE purchase_order.PURCHASE_ORDER_ID = ".$idPO." AND detail_transaksi_pp.BARANG_ID IS NOT NULL
				GROUP BY detail_po.BARANG_ID)
				UNION
				(SELECT 
				paket_overhead_material.PAKET_OVERHEAD_MATERIAL_NAMA AS BARANG_NAMA,
				(@a:='LSMOV') AS BARANG_KODE,
				paket_overhead_material.PAKET_OVERHEAD_MATERIAL_ID AS BARANG_ID,
				detail_po.VOLUME_PO,
				permintaan_pembelian.PERMINTAAN_PEMBELIAN_KODE AS PP_KODE,
				permintaan_pembelian.PERMINTAAN_PEMBELIAN_ID AS PP_ID, 
				detail_transaksi_pp.VOLUME_PP AS VOLUME_PP, 
				paket_overhead_material.PAKET_OVERHEAD_MATERIAL_HARGA AS HARGA_DETAIL,
				detail_po.HARGA_MATERI_PO,
				detail_po.HARGA_AWAL,
				detail_po.HARGA_DISKON,
				detail_po.DISKON1,
				detail_po.DISKON2,
				detail_po.DISKON3,
				detail_po.HARGA_PAJAK,
				detail_po.HARGA_FINAL,
				COALESCE(temp.VOLUME_PO_TERPAKAI,0) AS VOLUME_PO_TERPAKAI, 
				(detail_transaksi_pp.VOLUME_PP-COALESCE(temp.VOLUME_PO_TERPAKAI,0)) AS VOLUME_PP_SISA
				FROM detail_po
				JOIN paket_overhead_material ON detail_po.SUBCON_ID = paket_overhead_material.PAKET_OVERHEAD_MATERIAL_ID
				JOIN purchase_order ON purchase_order.PURCHASE_ORDER_ID = detail_po.PURCHASE_ORDER_ID
				JOIN permintaan_pembelian ON permintaan_pembelian.PERMINTAAN_PEMBELIAN_ID = detail_po.PERMINTAAN_PEMBELIAN_ID
				JOIN detail_transaksi_pp ON detail_transaksi_pp.PERMINTAAN_PEMBELIAN_ID = detail_po.PERMINTAAN_PEMBELIAN_ID
				LEFT JOIN (SELECT detail_po.SUBCON_ID, detail_po.PERMINTAAN_PEMBELIAN_ID, SUM(IF(purchase_order.STATUS_PO_ID = 3,detail_po.VOLUME_PO,0)) AS VOLUME_PO_TERPAKAI
				FROM detail_po 
				JOIN purchase_order ON purchase_order.PURCHASE_ORDER_ID = detail_po.PURCHASE_ORDER_ID
				GROUP BY detail_po.SUBCON_ID, detail_po.PERMINTAAN_PEMBELIAN_ID) temp ON temp.SUBCON_ID = detail_transaksi_pp.SUBCON_ID AND temp.PERMINTAAN_PEMBELIAN_ID = detail_transaksi_pp.PERMINTAAN_PEMBELIAN_ID
				WHERE purchase_order.PURCHASE_ORDER_ID = ".$idPO." AND detail_transaksi_pp.SUBCON_ID IS NOT NULL
				GROUP BY detail_po.SUBCON_ID)
			";
		} else {
			$sql = "(SELECT 
			master_barang.BARANG_NAMA,
			master_barang.BARANG_KODE,
			master_barang.BARANG_ID,
			detail_po.VOLUME_PO,
			permintaan_pembelian.PERMINTAAN_PEMBELIAN_KODE AS PP_KODE,
			permintaan_pembelian.PERMINTAAN_PEMBELIAN_ID AS PP_ID, 
			detail_transaksi_pp.VOLUME_PP AS VOLUME_PP, 
			detail_analisa_rab.DETAIL_ANALISA_HARGA AS HARGA_DETAIL,
			detail_po.HARGA_MATERI_PO,
			detail_po.HARGA_AWAL,
			detail_po.HARGA_DISKON,
			detail_po.DISKON1,
			detail_po.DISKON2,
			detail_po.DISKON3,
			detail_po.HARGA_PAJAK,
			detail_po.HARGA_FINAL,
			COALESCE(temp.VOLUME_PO_TERPAKAI,0) AS VOLUME_PO_TERPAKAI, 
			(detail_transaksi_pp.VOLUME_PP-COALESCE(temp.VOLUME_PO_TERPAKAI,0)) AS VOLUME_PP_SISA
			FROM detail_po
			JOIN master_barang ON master_barang.BARANG_ID = detail_po.BARANG_ID
			JOIN purchase_order ON purchase_order.PURCHASE_ORDER_ID = detail_po.PURCHASE_ORDER_ID
			JOIN permintaan_pembelian ON permintaan_pembelian.PERMINTAAN_PEMBELIAN_ID = detail_po.PERMINTAAN_PEMBELIAN_ID
			JOIN detail_transaksi_pp ON detail_transaksi_pp.PERMINTAAN_PEMBELIAN_ID = detail_po.PERMINTAAN_PEMBELIAN_ID
			JOIN detail_analisa_rab ON detail_analisa_rab.BARANG_ID = detail_po.BARANG_ID AND detail_analisa_rab.BARANG_ID = detail_transaksi_pp.BARANG_ID
			JOIN rab_transaction ON rab_transaction.RAB_ID = purchase_order.RAB_ID
			JOIN detail_pekerjaan ON detail_pekerjaan.RAB_ID = purchase_order.RAB_ID AND detail_pekerjaan.RAB_ID = permintaan_pembelian.RAB_ID AND detail_pekerjaan.ANALISA_ID = detail_analisa_rab.ANALISA_ID
			JOIN analisa_rab ON analisa_rab.ANALISA_ID = detail_pekerjaan.ANALISA_ID
			LEFT JOIN (SELECT detail_po.BARANG_ID, detail_po.PERMINTAAN_PEMBELIAN_ID, SUM(IF(purchase_order.STATUS_PO_ID = 3,detail_po.VOLUME_PO,0)) AS VOLUME_PO_TERPAKAI
			FROM detail_po 
			JOIN purchase_order ON purchase_order.PURCHASE_ORDER_ID = detail_po.PURCHASE_ORDER_ID
			GROUP BY detail_po.BARANG_ID, detail_po.PERMINTAAN_PEMBELIAN_ID) temp ON temp.BARANG_ID = detail_transaksi_pp.BARANG_ID AND temp.PERMINTAAN_PEMBELIAN_ID = detail_transaksi_pp.PERMINTAAN_PEMBELIAN_ID
			WHERE purchase_order.PURCHASE_ORDER_ID = ".$idPO." AND detail_transaksi_pp.BARANG_ID IS NOT NULL
			GROUP BY detail_po.BARANG_ID)
			UNION
			(SELECT 
			subcon.SUBCON_NAMA AS BARANG_NAMA,
			subcon_tipe.SUBCON_TIPE_KODE AS BARANG_KODE,
			subcon.SUBCON_ID AS BARANG_ID,
			detail_po.VOLUME_PO,
			permintaan_pembelian.PERMINTAAN_PEMBELIAN_KODE AS PP_KODE,
			permintaan_pembelian.PERMINTAAN_PEMBELIAN_ID AS PP_ID, 
			detail_transaksi_pp.VOLUME_PP AS VOLUME_PP, 
			subcon.SUBCON_HARGA AS HARGA_DETAIL,
			detail_po.HARGA_MATERI_PO,
			detail_po.HARGA_AWAL,
			detail_po.HARGA_DISKON,
			detail_po.DISKON1,
			detail_po.DISKON2,
			detail_po.DISKON3,
			detail_po.HARGA_PAJAK,
			detail_po.HARGA_FINAL,
			COALESCE(temp.VOLUME_PO_TERPAKAI,0) AS VOLUME_PO_TERPAKAI, 
			(detail_transaksi_pp.VOLUME_PP-COALESCE(temp.VOLUME_PO_TERPAKAI,0)) AS VOLUME_PP_SISA
			FROM detail_po
			JOIN subcon ON subcon.SUBCON_ID = detail_po.SUBCON_ID
			JOIN subcon_tipe ON subcon_tipe.SUBCON_TIPE_ID = subcon.SUBCON_TIPE_ID
			JOIN purchase_order ON purchase_order.PURCHASE_ORDER_ID = detail_po.PURCHASE_ORDER_ID
			JOIN permintaan_pembelian ON permintaan_pembelian.PERMINTAAN_PEMBELIAN_ID = detail_po.PERMINTAAN_PEMBELIAN_ID
			JOIN detail_transaksi_pp ON detail_transaksi_pp.PERMINTAAN_PEMBELIAN_ID = detail_po.PERMINTAAN_PEMBELIAN_ID
			LEFT JOIN (SELECT detail_po.SUBCON_ID, detail_po.PERMINTAAN_PEMBELIAN_ID, SUM(IF(purchase_order.STATUS_PO_ID = 3,detail_po.VOLUME_PO,0)) AS VOLUME_PO_TERPAKAI
			FROM detail_po 
			JOIN purchase_order ON purchase_order.PURCHASE_ORDER_ID = detail_po.PURCHASE_ORDER_ID
			GROUP BY detail_po.SUBCON_ID, detail_po.PERMINTAAN_PEMBELIAN_ID) temp ON temp.SUBCON_ID = detail_transaksi_pp.SUBCON_ID AND temp.PERMINTAAN_PEMBELIAN_ID = detail_transaksi_pp.PERMINTAAN_PEMBELIAN_ID
			WHERE purchase_order.PURCHASE_ORDER_ID = ".$idPO." AND detail_transaksi_pp.SUBCON_ID IS NOT NULL
			GROUP BY detail_po.SUBCON_ID)";
		}
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	function getViewDetailPPbyPO($idPO,$tipe){
		if($tipe==1){
			$sql = "(SELECT 
			master_barang.BARANG_NAMA,
			master_barang.BARANG_KODE,
			detail_po.VOLUME_PO,
			permintaan_pembelian.PERMINTAAN_PEMBELIAN_KODE AS PP_KODE,
			permintaan_pembelian.PERMINTAAN_PEMBELIAN_ID AS PP_ID,
			detail_overhead.DETAIL_OVERHEAD_HARGA AS HARGA_DETAIL,
			detail_po.HARGA_MATERI_PO,
			detail_po.HARGA_AWAL,
			detail_po.HARGA_DISKON,
			detail_po.HARGA_PAJAK,
			detail_po.HARGA_NET,
			detail_po.HARGA_FINAL
			FROM detail_po
			JOIN master_barang ON master_barang.BARANG_ID = detail_po.BARANG_ID
			JOIN purchase_order ON purchase_order.PURCHASE_ORDER_ID = detail_po.PURCHASE_ORDER_ID
			JOIN permintaan_pembelian ON permintaan_pembelian.PERMINTAAN_PEMBELIAN_ID = detail_po.PERMINTAAN_PEMBELIAN_ID
			JOIN detail_transaksi_pp ON detail_transaksi_pp.PERMINTAAN_PEMBELIAN_ID = detail_po.PERMINTAAN_PEMBELIAN_ID
			JOIN detail_overhead ON detail_overhead.BARANG_ID = detail_transaksi_pp.BARANG_ID 
			WHERE purchase_order.PURCHASE_ORDER_ID = ".$idPO." AND detail_transaksi_pp.BARANG_ID IS NOT NULL
			GROUP BY detail_po.BARANG_ID)
			UNION
			(SELECT 
			paket_overhead_material.PAKET_OVERHEAD_MATERIAL_NAMA AS BARANG_NAMA,
			(@a:='LSMOV') AS BARANG_KODE,
			detail_po.VOLUME_PO,
			permintaan_pembelian.PERMINTAAN_PEMBELIAN_KODE AS PP_KODE,
			permintaan_pembelian.PERMINTAAN_PEMBELIAN_ID AS PP_ID,
			paket_overhead_material.PAKET_OVERHEAD_MATERIAL_HARGA AS HARGA_DETAIL,
			detail_po.HARGA_MATERI_PO,
			detail_po.HARGA_AWAL,
			detail_po.HARGA_DISKON,
			detail_po.HARGA_PAJAK,
			detail_po.HARGA_NET,
			detail_po.HARGA_FINAL
			FROM detail_po
			JOIN paket_overhead_material ON detail_po.SUBCON_ID = paket_overhead_material.PAKET_OVERHEAD_MATERIAL_ID
			JOIN purchase_order ON purchase_order.PURCHASE_ORDER_ID = detail_po.PURCHASE_ORDER_ID
			JOIN permintaan_pembelian ON permintaan_pembelian.PERMINTAAN_PEMBELIAN_ID = detail_po.PERMINTAAN_PEMBELIAN_ID
			JOIN detail_transaksi_pp ON detail_transaksi_pp.PERMINTAAN_PEMBELIAN_ID = detail_po.PERMINTAAN_PEMBELIAN_ID
			WHERE purchase_order.PURCHASE_ORDER_ID = ".$idPO." AND detail_transaksi_pp.SUBCON_ID IS NOT NULL
			GROUP BY detail_po.SUBCON_ID)";
		} else {
			$sql = "(SELECT 
			master_barang.BARANG_NAMA,
			master_barang.BARANG_KODE,
			detail_po.VOLUME_PO,
			permintaan_pembelian.PERMINTAAN_PEMBELIAN_KODE AS PP_KODE,
			permintaan_pembelian.PERMINTAAN_PEMBELIAN_ID AS PP_ID,
			detail_analisa_rab.DETAIL_ANALISA_HARGA AS HARGA_DETAIL,
			detail_po.HARGA_MATERI_PO,
			detail_po.HARGA_AWAL,
			detail_po.HARGA_DISKON,
			detail_po.HARGA_PAJAK,
			detail_po.HARGA_NET,
			detail_po.HARGA_FINAL
			FROM detail_po
			JOIN master_barang ON master_barang.BARANG_ID = detail_po.BARANG_ID
			JOIN purchase_order ON purchase_order.PURCHASE_ORDER_ID = detail_po.PURCHASE_ORDER_ID
			JOIN permintaan_pembelian ON permintaan_pembelian.PERMINTAAN_PEMBELIAN_ID = detail_po.PERMINTAAN_PEMBELIAN_ID
			JOIN detail_transaksi_pp ON detail_transaksi_pp.PERMINTAAN_PEMBELIAN_ID = detail_po.PERMINTAAN_PEMBELIAN_ID
			JOIN detail_analisa_rab ON detail_analisa_rab.BARANG_ID = detail_po.BARANG_ID AND detail_analisa_rab.BARANG_ID = detail_transaksi_pp.BARANG_ID
			JOIN rab_transaction ON rab_transaction.RAB_ID = purchase_order.RAB_ID
			JOIN detail_pekerjaan ON detail_pekerjaan.RAB_ID = purchase_order.RAB_ID AND detail_pekerjaan.RAB_ID = permintaan_pembelian.RAB_ID AND detail_pekerjaan.ANALISA_ID = detail_analisa_rab.ANALISA_ID
			JOIN analisa_rab ON analisa_rab.ANALISA_ID = detail_pekerjaan.ANALISA_ID
			WHERE purchase_order.PURCHASE_ORDER_ID = ".$idPO." AND detail_transaksi_pp.BARANG_ID IS NOT NULL
			GROUP BY detail_po.BARANG_ID)
			UNION
			(SELECT 
			subcon.SUBCON_NAMA AS BARANG_NAMA,
			subcon_tipe.SUBCON_TIPE_KODE AS BARANG_KODE,
			detail_po.VOLUME_PO,
			permintaan_pembelian.PERMINTAAN_PEMBELIAN_KODE AS PP_KODE,
			permintaan_pembelian.PERMINTAAN_PEMBELIAN_ID AS PP_ID,
			subcon.SUBCON_HARGA AS HARGA_DETAIL,
			detail_po.HARGA_MATERI_PO,
			detail_po.HARGA_AWAL,
			detail_po.HARGA_DISKON,
			detail_po.HARGA_PAJAK,
			detail_po.HARGA_NET,
			detail_po.HARGA_FINAL
			FROM detail_po
			JOIN subcon ON subcon.SUBCON_ID = detail_po.SUBCON_ID
			JOIN subcon_tipe ON subcon_tipe.SUBCON_TIPE_ID = subcon.SUBCON_TIPE_ID
			JOIN purchase_order ON purchase_order.PURCHASE_ORDER_ID = detail_po.PURCHASE_ORDER_ID
			JOIN permintaan_pembelian ON permintaan_pembelian.PERMINTAAN_PEMBELIAN_ID = detail_po.PERMINTAAN_PEMBELIAN_ID
			JOIN detail_transaksi_pp ON detail_transaksi_pp.PERMINTAAN_PEMBELIAN_ID = detail_po.PERMINTAAN_PEMBELIAN_ID
			WHERE purchase_order.PURCHASE_ORDER_ID = ".$idPO." AND detail_transaksi_pp.SUBCON_ID IS NOT NULL
			GROUP BY detail_po.SUBCON_ID)";
		}
		$query = $this->db->query($sql);
		return $query->result_array();
	}

}
