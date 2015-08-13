<?php

class mMonitoring extends MY_Model {

    function __construct() {
        parent::__construct();
        $this->tableName = "project";
    }

    function getDetailProject($PROJECT_ID) {
        $sql = "SELECT COALESCE(getTotalDate(project.PROJECT_ID),'Belum diestimasikan') AS PROJECT_DURATION, SUM(rab_transaction.RAB_TOTAL) AS PROJECT_TOTAL_RAP, SUM(rab_transaction.RAB_AFTER_OVERHEAD-rab_transaction.RAB_TOTAL) AS PROJECT_TOTAL_OVERHEAD, SUM(rab_transaction.RAB_AFTER_OVERHEAD) AS PROJECT_TOTAL, project.*, status_project.STATUS_PROJECT_NAMA, 
				SUM((rab_transaction.RAB_MATERIAL/rab_transaction.RAB_TOTAL)*(rab_transaction.RAB_AFTER_OVERHEAD-rab_transaction.RAB_TOTAL)) AS PROJECT_MATERIAL_OVERHEAD, 
				SUM(rab_transaction.RAB_MATERIAL) AS PROJECT_MATERIAL_RAP,
				SUM((rab_transaction.RAB_UPAH/rab_transaction.RAB_TOTAL)*(rab_transaction.RAB_AFTER_OVERHEAD-rab_transaction.RAB_TOTAL)) AS PROJECT_UPAH_OVERHEAD,
				SUM(rab_transaction.RAB_UPAH) AS PROJECT_UPAH_RAP,
				SUM((rab_transaction.RAB_AFTER_OVERHEAD-rab_transaction.RAB_TOTAL)) AS PROJECT_OVERHEAD
				FROM rab_transaction
				JOIN project ON project.PROJECT_ID = rab_transaction.PROJECT_ID
				JOIN status_project ON status_project.STATUS_PROJECT_ID = project.PROJECT_STATUS
				WHERE rab_transaction.PROJECT_ID = $PROJECT_ID
				GROUP BY rab_transaction.PROJECT_ID";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
	
	function getOverheadMaterial($PROJECT_ID) {
        $sql = "SELECT COALESCE(SUM(overhead.OVERHEAD_TOTAL),0) AS PEMAKAIAN_OVERHEAD_MATERIAL
				FROM overhead
				JOIN rab_transaction ON rab_transaction.RAB_ID = overhead.RAB_ID
				WHERE overhead.STATUS_APPROVAL_ID = 3 AND overhead.OVERHEAD_TIPE = 'material' AND rab_transaction.PROJECT_ID = $PROJECT_ID";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
	
	function getOverheadUpah($PROJECT_ID) {
        $sql = "SELECT COALESCE(SUM(overhead.OVERHEAD_TOTAL),0) AS PEMAKAIAN_OVERHEAD_UPAH
				FROM overhead
				JOIN rab_transaction ON rab_transaction.RAB_ID = overhead.RAB_ID
				WHERE overhead.STATUS_APPROVAL_ID = 3 AND overhead.OVERHEAD_TIPE = 'upah' AND rab_transaction.PROJECT_ID = $PROJECT_ID";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
	
	function getMaterialPP($PROJECT_ID) {
        $sql = "SELECT IFNULL((SELECT SUM(temp.HARGA_TOTAL_MATERIAL+temp.HARGA_TOTAL_SUBCON) AS PP_MATERIAL_TOTAL FROM
				(SELECT 
				rab_transaction.PROJECT_ID,
				COALESCE(detail_analisa_rab.DETAIL_ANALISA_HARGA*detail_transaksi_pp.VOLUME_PP,0) AS HARGA_TOTAL_MATERIAL,
				COALESCE(subcon.SUBCON_HARGA*detail_transaksi_pp.VOLUME_PP,0) AS HARGA_TOTAL_SUBCON
				FROM detail_transaksi_pp
				LEFT JOIN permintaan_pembelian ON permintaan_pembelian.PERMINTAAN_PEMBELIAN_ID = detail_transaksi_pp.PERMINTAAN_PEMBELIAN_ID
				LEFT JOIN rab_transaction ON rab_transaction.RAB_ID = permintaan_pembelian.RAB_ID
				LEFT JOIN detail_analisa_rab ON detail_analisa_rab.BARANG_ID = detail_transaksi_pp.BARANG_ID
				LEFT JOIN detail_pekerjaan ON detail_pekerjaan.RAB_ID = permintaan_pembelian.RAB_ID AND detail_pekerjaan.ANALISA_ID = detail_analisa_rab.ANALISA_ID
				LEFT JOIN analisa_rab ON analisa_rab.ANALISA_ID = detail_pekerjaan.ANALISA_ID
				LEFT JOIN subcon ON subcon.SUBCON_ID = detail_transaksi_pp.SUBCON_ID
				WHERE permintaan_pembelian.KATEGORI_PP_ID = 2 AND permintaan_pembelian.STATUS_PP_ID = 3 AND rab_transaction.PROJECT_ID = $PROJECT_ID
				GROUP BY detail_transaksi_pp.DETAIL_PP_ID) temp
				WHERE temp.PROJECT_ID = $PROJECT_ID
				GROUP BY temp.PROJECT_ID),0) AS PP_MATERIAL_TOTAL";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
	
	function getUpahPK($PROJECT_ID) {
        $sql = "SELECT IFNULL((SELECT SUM(temp.HARGA_TOTAL_UPAH) AS PK_UPAH_TOTAL FROM
				(SELECT 
				rab_transaction.PROJECT_ID,
				COALESCE(upah.TOTAL_UPAH*detail_transaksi_pk.VOLUME_PK,0) AS HARGA_TOTAL_UPAH
				FROM detail_transaksi_pk
				LEFT JOIN permintaan_pekerjaan ON permintaan_pekerjaan.PERMINTAAN_PEKERJAAN_ID = detail_transaksi_pk.PERMINTAAN_PEKERJAAN_ID
				LEFT JOIN rab_transaction ON rab_transaction.RAB_ID = permintaan_pekerjaan.RAB_ID
				LEFT JOIN detail_analisa_rab ON detail_analisa_rab.ANALISA_ID = detail_transaksi_pk.ANALISA_ID
				LEFT JOIN detail_pekerjaan ON detail_pekerjaan.RAB_ID = permintaan_pekerjaan.RAB_ID AND detail_pekerjaan.ANALISA_ID = detail_analisa_rab.ANALISA_ID
				LEFT JOIN analisa_rab ON analisa_rab.ANALISA_ID = detail_pekerjaan.ANALISA_ID
				LEFT JOIN (SELECT detail_analisa_rab.ANALISA_ID, SUM(detail_analisa_rab.DETAIL_ANALISA_TOTAL) AS TOTAL_UPAH FROM detail_analisa_rab WHERE detail_analisa_rab.UPAH_ID IS NOT NULL GROUP BY detail_analisa_rab.ANALISA_ID) upah ON upah.ANALISA_ID = detail_analisa_rab.ANALISA_ID
				WHERE permintaan_pekerjaan.KATEGORI_PK_ID = 2 AND permintaan_pekerjaan.STATUS_PK_ID = 3 AND rab_transaction.PROJECT_ID = $PROJECT_ID
				GROUP BY detail_transaksi_pk.ANALISA_ID) temp
				WHERE temp.PROJECT_ID = $PROJECT_ID
				GROUP BY temp.PROJECT_ID),0) AS PK_UPAH_TOTAL";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
	
	function getOverheadPP($PROJECT_ID) {
        $sql = "SELECT IFNULL ((SELECT SUM(temp.HARGA_TOTAL_MATERIAL+temp.HARGA_TOTAL_SUBCON) AS PP_OVERHEAD_TOTAL FROM
				(SELECT 
				rab_transaction.PROJECT_ID,
				COALESCE(detail_overhead.DETAIL_OVERHEAD_HARGA*detail_transaksi_pp.VOLUME_PP,0) AS HARGA_TOTAL_MATERIAL,
				COALESCE(paket_overhead_material.PAKET_OVERHEAD_MATERIAL_HARGA*detail_transaksi_pp.VOLUME_PP,0) AS HARGA_TOTAL_SUBCON
				FROM detail_transaksi_pp
				LEFT JOIN permintaan_pembelian ON permintaan_pembelian.PERMINTAAN_PEMBELIAN_ID = detail_transaksi_pp.PERMINTAAN_PEMBELIAN_ID
				LEFT JOIN rab_transaction ON rab_transaction.RAB_ID = permintaan_pembelian.RAB_ID
				LEFT JOIN overhead ON overhead.RAB_ID = permintaan_pembelian.RAB_ID
				LEFT JOIN detail_overhead ON detail_overhead.BARANG_ID = detail_transaksi_pp.BARANG_ID AND detail_overhead.OVERHEAD_ID = overhead.OVERHEAD_ID
				LEFT JOIN paket_overhead_material ON paket_overhead_material.PAKET_OVERHEAD_MATERIAL_ID = detail_transaksi_pp.SUBCON_ID
				WHERE permintaan_pembelian.KATEGORI_PP_ID = 1 AND permintaan_pembelian.STATUS_PP_ID = 3 AND rab_transaction.PROJECT_ID = $PROJECT_ID
				GROUP BY detail_transaksi_pp.DETAIL_PP_ID) temp
				WHERE temp.PROJECT_ID = $PROJECT_ID
				GROUP BY temp.PROJECT_ID),0) AS PP_OVERHEAD_TOTAL";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
	
	function getOverheadPK($PROJECT_ID) {
        $sql = "SELECT IFNULL ((SELECT SUM(temp.HARGA_TOTAL_UPAH+temp.HARGA_TOTAL_SUBCON) AS PK_OVERHEAD_TOTAL FROM
				(SELECT rab_transaction.PROJECT_ID,
				COALESCE(detail_overhead.DETAIL_OVERHEAD_HARGA*detail_transaksi_pk.VOLUME_PK,0) AS HARGA_TOTAL_UPAH,
				COALESCE(paket_overhead_upah.PAKET_OVERHEAD_UPAH_HARGA*detail_transaksi_pk.VOLUME_PK,0) AS HARGA_TOTAL_SUBCON
				FROM detail_transaksi_pk
				LEFT JOIN permintaan_pekerjaan ON permintaan_pekerjaan.PERMINTAAN_PEKERJAAN_ID = detail_transaksi_pk.PERMINTAAN_PEKERJAAN_ID
				LEFT JOIN rab_transaction ON rab_transaction.RAB_ID = permintaan_pekerjaan.RAB_ID
				LEFT JOIN overhead ON overhead.RAB_ID = permintaan_pekerjaan.RAB_ID
				LEFT JOIN detail_overhead ON detail_overhead.UPAH_ID = detail_transaksi_pk.UPAH_ID AND detail_overhead.OVERHEAD_ID = overhead.OVERHEAD_ID
				LEFT JOIN paket_overhead_upah ON paket_overhead_upah.PAKET_OVERHEAD_UPAH_ID = detail_transaksi_pk.PAKET_OVERHEAD_UPAH_ID
				WHERE permintaan_pekerjaan.KATEGORI_PK_ID = 3 AND permintaan_pekerjaan.STATUS_PK_ID = 1 AND rab_transaction.PROJECT_ID = $PROJECT_ID
				GROUP BY detail_transaksi_pk.DETAIL_PK_ID) temp
				WHERE temp.PROJECT_ID = $PROJECT_ID
				GROUP BY temp.PROJECT_ID),0) AS PK_OVERHEAD_TOTAL";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
	
	function getMaterialPO($PROJECT_ID) {
        $sql = "SELECT IFNULL ((SELECT SUM(temp.HARGA_TOTAL_MATERIAL+temp.HARGA_TOTAL_SUBCON) AS PO_MATERIAL_TOTAL FROM
				(SELECT 
				rab_transaction.PROJECT_ID, 
				COALESCE(detail_analisa_rab.DETAIL_ANALISA_HARGA*detail_po.VOLUME_PO,0) AS HARGA_TOTAL_MATERIAL,
				COALESCE(subcon.SUBCON_HARGA*detail_po.VOLUME_PO,0) AS HARGA_TOTAL_SUBCON
				FROM detail_po
				LEFT JOIN purchase_order ON purchase_order.PURCHASE_ORDER_ID = detail_po.PURCHASE_ORDER_ID
				LEFT JOIN rab_transaction ON rab_transaction.RAB_ID = purchase_order.RAB_ID
				LEFT JOIN detail_analisa_rab ON detail_analisa_rab.BARANG_ID = detail_po.BARANG_ID
				LEFT JOIN detail_pekerjaan ON detail_pekerjaan.RAB_ID = purchase_order.RAB_ID AND detail_pekerjaan.ANALISA_ID = detail_analisa_rab.ANALISA_ID
				LEFT JOIN analisa_rab ON analisa_rab.ANALISA_ID = detail_pekerjaan.ANALISA_ID
				LEFT JOIN subcon ON subcon.SUBCON_ID = detail_po.SUBCON_ID
				WHERE purchase_order.KATEGORI_PP_ID = 2 AND purchase_order.STATUS_PO_ID = 3 AND rab_transaction.PROJECT_ID = $PROJECT_ID
				GROUP BY detail_po.DETAIL_PURCHASE_ORDER_ID) temp
				WHERE temp.PROJECT_ID = $PROJECT_ID
				GROUP BY temp.PROJECT_ID),0) AS PO_MATERIAL_TOTAL";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
	
	function getUpahOpname($PROJECT_ID) {
        $sql = "SELECT IFNULL ((SELECT SUM(temp.HARGA_TOTAL_UPAH) AS OPNAME_UPAH_TOTAL FROM
				(SELECT 
				rab_transaction.PROJECT_ID, 
				COALESCE(detail_transaksi_opname.HARGA_OPNAME*detail_transaksi_opname.VOLUME_OPNAME,0) AS HARGA_TOTAL_UPAH
				FROM detail_transaksi_opname
				LEFT JOIN opname ON opname.OPNAME_ID = detail_transaksi_opname.OPNAME_ID
				LEFT JOIN rab_transaction ON rab_transaction.RAB_ID = opname.RAB_ID 
				WHERE opname.KATEGORI_OP_ID = 2 AND opname.STATUS_OP_ID = 3 AND rab_transaction.PROJECT_ID = $PROJECT_ID) temp
				WHERE temp.PROJECT_ID = $PROJECT_ID
				GROUP BY temp.PROJECT_ID),0) AS OPNAME_UPAH_TOTAL";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
	
	function getOverheadPO($PROJECT_ID) {
        $sql = "SELECT IFNULL ((SELECT SUM(temp.HARGA_TOTAL_MATERIAL+temp.HARGA_TOTAL_SUBCON) AS PO_OVERHEAD_TOTAL FROM
				(SELECT 
				rab_transaction.PROJECT_ID,
				COALESCE(detail_overhead.DETAIL_OVERHEAD_HARGA*detail_po.VOLUME_PO,0) AS HARGA_TOTAL_MATERIAL,
				COALESCE(paket_overhead_material.PAKET_OVERHEAD_MATERIAL_HARGA*detail_po.VOLUME_PO,0) AS HARGA_TOTAL_SUBCON
				FROM detail_po
				LEFT JOIN purchase_order ON purchase_order.PURCHASE_ORDER_ID = detail_po.PURCHASE_ORDER_ID
				LEFT JOIN rab_transaction ON rab_transaction.RAB_ID = purchase_order.RAB_ID
				LEFT JOIN overhead ON overhead.RAB_ID = purchase_order.RAB_ID
				LEFT JOIN detail_overhead ON detail_overhead.BARANG_ID = detail_po.BARANG_ID AND detail_overhead.OVERHEAD_ID = overhead.OVERHEAD_ID
				LEFT JOIN paket_overhead_material ON paket_overhead_material.PAKET_OVERHEAD_MATERIAL_ID = detail_po.SUBCON_ID
				WHERE purchase_order.KATEGORI_PP_ID = 1 AND purchase_order.STATUS_PO_ID = 3 AND rab_transaction.PROJECT_ID = $PROJECT_ID
				GROUP BY detail_po.DETAIL_PURCHASE_ORDER_ID) temp
				WHERE temp.PROJECT_ID = $PROJECT_ID
				GROUP BY temp.PROJECT_ID),0) AS PO_OVERHEAD_TOTAL";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
	
	function getOverheadOpname($PROJECT_ID) {
        $sql = "SELECT IFNULL ((SELECT SUM(temp.HARGA_TOTAL_UPAH) AS OPNAME_OVERHEAD_TOTAL FROM
				(SELECT 
				rab_transaction.PROJECT_ID, 
				COALESCE(detail_transaksi_opname.HARGA_OPNAME*detail_transaksi_opname.VOLUME_OPNAME,0) AS HARGA_TOTAL_UPAH
				FROM detail_transaksi_opname
				LEFT JOIN opname ON opname.OPNAME_ID = detail_transaksi_opname.OPNAME_ID
				LEFT JOIN rab_transaction ON rab_transaction.RAB_ID = opname.RAB_ID 
				WHERE opname.KATEGORI_OP_ID = 1 AND opname.STATUS_OP_ID = 3 AND rab_transaction.PROJECT_ID = $PROJECT_ID) temp
				WHERE temp.PROJECT_ID = $PROJECT_ID
				GROUP BY temp.PROJECT_ID),0) AS OPNAME_OVERHEAD_TOTAL";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
	
	function getMaterialLPB($PROJECT_ID) {
        $sql = "SELECT IFNULL((SELECT SUM(temp2.VOLUME_LPB*temp2.HARGA_ITEM) AS LPB_MATERIAL_TOTAL FROM (
				(SELECT detail_lpb.*, temp.DETAIL_ANALISA_HARGA AS HARGA_ITEM
				FROM detail_lpb
				LEFT JOIN penerimaan_barang ON penerimaan_barang.PENERIMAAN_BARANG_ID = detail_lpb.PENERIMAAN_BARANG_ID
				JOIN purchase_order ON purchase_order.PURCHASE_ORDER_ID = detail_lpb.PO_ID
				JOIN rab_transaction ON rab_transaction.RAB_ID = purchase_order.RAB_ID
				LEFT JOIN (SELECT detail_analisa_rab.*, detail_pekerjaan.RAB_ID FROM
				detail_analisa_rab
				LEFT JOIN detail_pekerjaan ON detail_pekerjaan.ANALISA_ID = detail_analisa_rab.ANALISA_ID
				LEFT JOIN analisa_rab ON analisa_rab.ANALISA_ID = detail_pekerjaan.ANALISA_ID) temp ON temp.BARANG_ID = detail_lpb.BARANG_ID AND temp.RAB_ID = purchase_order.RAB_ID
				WHERE rab_transaction.PROJECT_ID = $PROJECT_ID AND detail_lpb.BARANG_ID IS NOT NULL AND penerimaan_barang.STATUS_LPB_ID = 3
				GROUP BY detail_lpb.DETAIL_LPB_ID)
				UNION 
				(SELECT detail_lpb.*, subcon.SUBCON_HARGA AS HARGA_ITEM
				FROM detail_lpb
				LEFT JOIN penerimaan_barang ON penerimaan_barang.PENERIMAAN_BARANG_ID = detail_lpb.PENERIMAAN_BARANG_ID
				JOIN purchase_order ON purchase_order.PURCHASE_ORDER_ID = detail_lpb.PO_ID
				JOIN rab_transaction ON rab_transaction.RAB_ID = purchase_order.RAB_ID
				JOIN subcon ON subcon.SUBCON_ID = detail_lpb.SUBCON_ID
				WHERE rab_transaction.PROJECT_ID = $PROJECT_ID AND detail_lpb.SUBCON_ID IS NOT NULL AND penerimaan_barang.STATUS_LPB_ID = 3
				GROUP BY detail_lpb.DETAIL_LPB_ID)) temp2),0) AS LPB_MATERIAL_TOTAL";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
	
	function getOverheadLPB($PROJECT_ID) {
        $sql = "SELECT IFNULL((SELECT SUM(temp2.VOLUME_LPB*temp2.HARGA_ITEM) AS LPB_OVERHEAD_TOTAL FROM (
				(SELECT detail_lpb.*, detail_overhead.DETAIL_OVERHEAD_HARGA AS HARGA_ITEM
				FROM detail_lpb
				LEFT JOIN penerimaan_barang ON penerimaan_barang.PENERIMAAN_BARANG_ID = detail_lpb.PENERIMAAN_BARANG_ID
				JOIN purchase_order ON purchase_order.PURCHASE_ORDER_ID = detail_lpb.PO_ID
				JOIN rab_transaction ON rab_transaction.RAB_ID = purchase_order.RAB_ID
				LEFT JOIN overhead ON overhead.RAB_ID = purchase_order.RAB_ID
				LEFT JOIN detail_overhead ON detail_overhead.BARANG_ID = detail_lpb.BARANG_OVERHEAD_ID AND detail_overhead.OVERHEAD_ID = overhead.OVERHEAD_ID
				WHERE rab_transaction.PROJECT_ID = $PROJECT_ID AND detail_lpb.BARANG_OVERHEAD_ID IS NOT NULL AND penerimaan_barang.STATUS_LPB_ID = 3
				GROUP BY detail_lpb.DETAIL_LPB_ID)
				UNION 
				(SELECT detail_lpb.*, paket_overhead_material.PAKET_OVERHEAD_MATERIAL_HARGA AS HARGA_ITEM
				FROM detail_lpb
				LEFT JOIN penerimaan_barang ON penerimaan_barang.PENERIMAAN_BARANG_ID = detail_lpb.PENERIMAAN_BARANG_ID
				JOIN purchase_order ON purchase_order.PURCHASE_ORDER_ID = detail_lpb.PO_ID
				JOIN rab_transaction ON rab_transaction.RAB_ID = purchase_order.RAB_ID
				LEFT JOIN paket_overhead_material ON paket_overhead_material.PAKET_OVERHEAD_MATERIAL_ID = detail_lpb.PAKET_OVERHEAD_MATERIAL_ID
				WHERE rab_transaction.PROJECT_ID = $PROJECT_ID AND detail_lpb.PAKET_OVERHEAD_MATERIAL_ID IS NOT NULL AND penerimaan_barang.STATUS_LPB_ID = 3
				GROUP BY detail_lpb.DETAIL_LPB_ID)) temp2),0) AS LPB_OVERHEAD_TOTAL";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
	
	function getUpahLPU($PROJECT_ID) {
        $sql = "SELECT IFNULL((SELECT SUM(temp2.VOLUME*temp2.HARGA_ITEM) AS LPU_UPAH_TOTAL FROM (
				(SELECT detail_lpu.*, upah.TOTAL_UPAH AS HARGA_ITEM
				FROM detail_lpu
				LEFT JOIN lpu ON lpu.LPU_ID = detail_lpu.LPU_ID
				JOIN opname ON opname.OPNAME_ID = detail_lpu.OPNAME_ID
				JOIN rab_transaction ON rab_transaction.RAB_ID = opname.RAB_ID
				LEFT JOIN (SELECT detail_analisa_rab.ANALISA_ID, SUM(detail_analisa_rab.DETAIL_ANALISA_TOTAL) AS TOTAL_UPAH FROM detail_analisa_rab WHERE detail_analisa_rab.UPAH_ID IS NOT NULL GROUP BY detail_analisa_rab.ANALISA_ID) upah ON upah.ANALISA_ID = detail_lpu.ANALISA_ID
				WHERE rab_transaction.PROJECT_ID = $PROJECT_ID AND detail_lpu.ANALISA_ID IS NOT NULL AND lpu.STATUS_ID = 3
				GROUP BY detail_lpu.DETAIL_LPU_ID)
				UNION 
				(SELECT detail_lpu.*, subcon.SUBCON_HARGA AS HARGA_ITEM
				FROM detail_lpu
				LEFT JOIN lpu ON lpu.LPU_ID = detail_lpu.LPU_ID
				JOIN opname ON opname.OPNAME_ID = detail_lpu.OPNAME_ID
				JOIN rab_transaction ON rab_transaction.RAB_ID = opname.RAB_ID
				JOIN subcon ON subcon.SUBCON_ID = detail_lpu.SUBCON_ID
				WHERE rab_transaction.PROJECT_ID = $PROJECT_ID AND detail_lpu.SUBCON_ID IS NOT NULL AND lpu.STATUS_ID = 3
				GROUP BY detail_lpu.DETAIL_LPU_ID)) temp2),0) AS LPU_UPAH_TOTAL";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
	
	function getOverheadLPU($PROJECT_ID) {
        $sql = "SELECT IFNULL((SELECT SUM(temp2.VOLUME*temp2.HARGA_ITEM) AS LPU_OVERHEAD_TOTAL FROM (
				(SELECT detail_lpu.*, detail_overhead.DETAIL_OVERHEAD_HARGA AS HARGA_ITEM
				FROM detail_lpu
				LEFT JOIN lpu ON lpu.LPU_ID = detail_lpu.LPU_ID
				JOIN opname ON opname.OPNAME_ID = detail_lpu.OPNAME_ID
				JOIN rab_transaction ON rab_transaction.RAB_ID = opname.RAB_ID
				LEFT JOIN overhead ON overhead.RAB_ID = opname.RAB_ID
				LEFT JOIN detail_overhead ON detail_overhead.UPAH_ID = detail_lpu.UPAH_ID AND detail_overhead.OVERHEAD_ID = overhead.OVERHEAD_ID
				WHERE rab_transaction.PROJECT_ID = $PROJECT_ID AND detail_lpu.UPAH_ID IS NOT NULL AND lpu.STATUS_ID = 3
				GROUP BY detail_lpu.DETAIL_LPU_ID)
				UNION 
				(SELECT detail_lpu.*, paket_overhead_upah.PAKET_OVERHEAD_UPAH_HARGA AS HARGA_ITEM
				FROM detail_lpu
				LEFT JOIN lpu ON lpu.LPU_ID = detail_lpu.LPU_ID
				JOIN opname ON opname.OPNAME_ID = detail_lpu.OPNAME_ID
				JOIN rab_transaction ON rab_transaction.RAB_ID = opname.RAB_ID
				LEFT JOIN paket_overhead_upah ON paket_overhead_upah.PAKET_OVERHEAD_UPAH_ID = detail_lpu.PAKET_OVERHEAD_UPAH_ID
				WHERE rab_transaction.PROJECT_ID = $PROJECT_ID AND detail_lpu.PAKET_OVERHEAD_UPAH_ID IS NOT NULL AND lpu.STATUS_ID = 3
				GROUP BY detail_lpu.DETAIL_LPU_ID)) temp2),0) AS LPU_OVERHEAD_TOTAL";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
	
	function getMaterialPayment($PROJECT_ID) {
        $sql = "SELECT IFNULL((SELECT SUM(detail_invoice.SUB_TOTAL_HARGA) AS PAYMENT_MATERIAL
				FROM detail_invoice
				JOIN invoice ON invoice.INVOICE_ID = detail_invoice.INVOICE_ID
				JOIN payment ON payment.INVOICE_ID = detail_invoice.INVOICE_ID
				JOIN rab_transaction ON rab_transaction.RAB_ID = invoice.RAB_ID
				WHERE rab_transaction.PROJECT_ID = $PROJECT_ID AND payment.STATUS_ID = 3 AND payment.INVOICE_ID IS NOT NULL), 0) AS PAYMENT_MATERIAL";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
	
	function getUpahPayment($PROJECT_ID) {
        $sql = "SELECT IFNULL((SELECT SUM(temp2.VOLUME*temp2.HARGA_ITEM) AS PAYMENT_UPAH FROM (
				(SELECT detail_lpu.*, upah.TOTAL_UPAH AS HARGA_ITEM
				FROM detail_lpu
				JOIN lpu ON lpu.LPU_ID = detail_lpu.LPU_ID
				JOIN payment ON payment.LPU_ID = detail_lpu.LPU_ID
				JOIN opname ON opname.OPNAME_ID = detail_lpu.OPNAME_ID
				JOIN rab_transaction ON rab_transaction.RAB_ID = opname.RAB_ID
				LEFT JOIN (SELECT detail_analisa_rab.ANALISA_ID, SUM(detail_analisa_rab.DETAIL_ANALISA_TOTAL) AS TOTAL_UPAH FROM detail_analisa_rab WHERE detail_analisa_rab.UPAH_ID IS NOT NULL GROUP BY detail_analisa_rab.ANALISA_ID) upah ON upah.ANALISA_ID = detail_lpu.ANALISA_ID
				WHERE rab_transaction.PROJECT_ID = $PROJECT_ID AND detail_lpu.ANALISA_ID IS NOT NULL AND payment.STATUS_ID = 3
				GROUP BY detail_lpu.DETAIL_LPU_ID)
				UNION 
				(SELECT detail_lpu.*, subcon.SUBCON_HARGA AS HARGA_ITEM
				FROM detail_lpu
				JOIN lpu ON lpu.LPU_ID = detail_lpu.LPU_ID
				JOIN payment ON payment.LPU_ID = detail_lpu.LPU_ID
				JOIN opname ON opname.OPNAME_ID = detail_lpu.OPNAME_ID
				JOIN rab_transaction ON rab_transaction.RAB_ID = opname.RAB_ID
				JOIN subcon ON subcon.SUBCON_ID = detail_lpu.SUBCON_ID
				WHERE rab_transaction.PROJECT_ID = $PROJECT_ID AND detail_lpu.SUBCON_ID IS NOT NULL AND payment.STATUS_ID = 3
				GROUP BY detail_lpu.DETAIL_LPU_ID)
				UNION
				(SELECT detail_lpu.*, detail_overhead.DETAIL_OVERHEAD_HARGA AS HARGA_ITEM
				FROM detail_lpu
				JOIN lpu ON lpu.LPU_ID = detail_lpu.LPU_ID
				JOIN payment ON payment.LPU_ID = detail_lpu.LPU_ID
				JOIN opname ON opname.OPNAME_ID = detail_lpu.OPNAME_ID
				JOIN rab_transaction ON rab_transaction.RAB_ID = opname.RAB_ID
				LEFT JOIN overhead ON overhead.RAB_ID = opname.RAB_ID
				LEFT JOIN detail_overhead ON detail_overhead.UPAH_ID = detail_lpu.UPAH_ID AND detail_overhead.OVERHEAD_ID = overhead.OVERHEAD_ID
				WHERE rab_transaction.PROJECT_ID = $PROJECT_ID AND detail_lpu.UPAH_ID IS NOT NULL AND payment.STATUS_ID = 3
				GROUP BY detail_lpu.DETAIL_LPU_ID)
				UNION 
				(SELECT detail_lpu.*, paket_overhead_upah.PAKET_OVERHEAD_UPAH_HARGA AS HARGA_ITEM
				FROM detail_lpu
				JOIN lpu ON lpu.LPU_ID = detail_lpu.LPU_ID
				JOIN payment ON payment.LPU_ID = detail_lpu.LPU_ID
				JOIN opname ON opname.OPNAME_ID = detail_lpu.OPNAME_ID
				JOIN rab_transaction ON rab_transaction.RAB_ID = opname.RAB_ID
				LEFT JOIN paket_overhead_upah ON paket_overhead_upah.PAKET_OVERHEAD_UPAH_ID = detail_lpu.PAKET_OVERHEAD_UPAH_ID
				WHERE rab_transaction.PROJECT_ID = $PROJECT_ID AND detail_lpu.PAKET_OVERHEAD_UPAH_ID IS NOT NULL AND payment.STATUS_ID = 3
				GROUP BY detail_lpu.DETAIL_LPU_ID)) temp2),0) AS PAYMENT_UPAH";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
}

?>