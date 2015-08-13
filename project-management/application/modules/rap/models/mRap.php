<?php
class mRap extends MY_Model {

	// constants, column definition
	function __construct() {
        parent::__construct();
		$this->tableName = "rab_transaction";
		$this->idField = "";
    }
  
	public function getViewRapBarangById($id){
		$sql = "SELECT COALESCE(laporan.VOLUME_LAPORAN,0) AS VOLUME_LAPORAN, COALESCE(laporan.HARGA_LAPORAN,0) AS HARGA_LAPORAN, master_barang.*, detail_analisa_rab.*, SUM(detail_pekerjaan.DETAIL_PEKERJAAN_VOLUME*detail_analisa_rab.DETAIL_ANALISA_KOEFISIEN) AS BARANG_VOLUME FROM detail_pekerjaan 
		JOIN analisa_rab ON detail_pekerjaan.ANALISA_ID = analisa_rab.ANALISA_ID  
		JOIN kategori_paket_pekerjaan ON detail_pekerjaan.KATEGORI_PEKERJAAN_ID = kategori_paket_pekerjaan.KATEGORI_PEKERJAAN_ID 
		JOIN detail_analisa_rab ON analisa_rab.ANALISA_ID = detail_analisa_rab.ANALISA_ID 
		JOIN master_barang ON detail_analisa_rab.BARANG_ID = master_barang.BARANG_ID
		LEFT JOIN (SELECT SUM(temp.VOLUME_LPB) AS VOLUME_LAPORAN, temp.DETAIL_ANALISA_HARGA AS HARGA_LAPORAN, temp.BARANG_ID FROM (SELECT detail_analisa_rab.DETAIL_ANALISA_HARGA, detail_lpb.*
			FROM payment
			LEFT JOIN invoice 
				ON invoice.INVOICE_ID = payment.INVOICE_ID
			LEFT JOIN detail_invoice 
				ON detail_invoice.INVOICE_ID = invoice.INVOICE_ID
			JOIN penerimaan_barang 
				ON penerimaan_barang.PENERIMAAN_BARANG_ID = detail_invoice.LPB_ID
			JOIN detail_lpb 
				ON detail_lpb.PENERIMAAN_BARANG_ID = penerimaan_barang.PENERIMAAN_BARANG_ID
			JOIN purchase_order
				ON purchase_order.PURCHASE_ORDER_ID = detail_lpb.PO_ID AND purchase_order.RAB_ID = invoice.RAB_ID
			JOIN detail_po
				ON detail_po.PURCHASE_ORDER_ID = purchase_order.PURCHASE_ORDER_ID AND detail_po.BARANG_ID = detail_lpb.BARANG_ID
			JOIN permintaan_pembelian
				ON permintaan_pembelian.PERMINTAAN_PEMBELIAN_ID = detail_po.PERMINTAAN_PEMBELIAN_ID AND permintaan_pembelian.RAB_ID = invoice.RAB_ID
			JOIN detail_analisa_rab 
				ON detail_analisa_rab.BARANG_ID = detail_po.BARANG_ID AND detail_analisa_rab.BARANG_ID = detail_lpb.BARANG_ID
			JOIN rab_transaction 
				ON rab_transaction.RAB_ID = purchase_order.RAB_ID
			JOIN detail_pekerjaan 
				ON detail_pekerjaan.RAB_ID = purchase_order.RAB_ID AND detail_pekerjaan.RAB_ID = permintaan_pembelian.RAB_ID AND detail_pekerjaan.ANALISA_ID = detail_analisa_rab.ANALISA_ID
			JOIN analisa_rab 
				ON analisa_rab.ANALISA_ID = detail_pekerjaan.ANALISA_ID
			WHERE invoice.RAB_ID = $id AND payment.STATUS_ID = 3 AND purchase_order.KATEGORI_PP_ID = 2
			GROUP BY detail_po.DETAIL_PURCHASE_ORDER_ID) temp
			GROUP BY temp.BARANG_ID) laporan ON laporan.BARANG_ID = master_barang.BARANG_ID
		WHERE detail_pekerjaan.RAB_ID = $id 
		GROUP BY master_barang.BARANG_ID";
		
		$query = $this->db->query($sql);
		$result = array();
        if(!$query) {
            $errNo   = $this->db->_error_number();
            $errMess = $this->db->_error_message();
            return null;
        }
        else if ($query->num_rows() > 0) {
            $it = 0;
            foreach ($query->result_array() as $row) {
                $result[$it++] = $row;
            }
        }
        return $result;
	}
	
	public function getViewRapUpahById($id){
		$sql = "SELECT master_upah.*, satuan_upah.satuan_upah_nama AS SATUAN_UPAH_NAMA, SUM(detail_pekerjaan.DETAIL_PEKERJAAN_VOLUME*detail_analisa_rab.DETAIL_ANALISA_KOEFISIEN) AS UPAH_VOLUME FROM detail_pekerjaan 
		JOIN analisa_rab ON detail_pekerjaan.ANALISA_ID = analisa_rab.ANALISA_ID  
		JOIN kategori_paket_pekerjaan ON detail_pekerjaan.KATEGORI_PEKERJAAN_ID = kategori_paket_pekerjaan.KATEGORI_PEKERJAAN_ID 
		JOIN detail_analisa_rab ON analisa_rab.ANALISA_ID = detail_analisa_rab.ANALISA_ID 
		JOIN master_upah ON detail_analisa_rab.UPAH_ID = master_upah.UPAH_ID
		JOIN satuan_upah ON satuan_upah.SATUAN_UPAH_ID = master_upah.SATUAN_UPAH_ID
		WHERE detail_pekerjaan.RAB_ID = $id
		GROUP BY master_upah.UPAH_ID";
		
		$query = $this->db->query($sql);
		$result = array();
        if(!$query) {
            $errNo   = $this->db->_error_number();
            $errMess = $this->db->_error_message();
            return null;
        }
        else if ($query->num_rows() > 0) {
            $it = 0;
            foreach ($query->result_array() as $row) {
                $result[$it++] = $row;
            }
        }
        return $result;
	}
	
	public function getViewRapUpahAnalisaById($id){
		$sql = "SELECT COALESCE(laporan.VOLUME,0) AS VOLUME_LAPORAN, COALESCE(SUM(temp.UPAH_ANALISA_TOTAL),0) AS HARGA_LAPORAN, analisa_rab.*, DETAIL_ANALISA_KOEFISIEN, DETAIL_ANALISA_HARGA, DETAIL_ANALISA_TOTAL, SUM(temp.UPAH_ANALISA_TOTAL) AS UPAH_ANALISA_TOTAL, temp.UPAH_ANALISA_VOLUME FROM
		(SELECT analisa_rab.*, detail_analisa_rab.DETAIL_ANALISA_KOEFISIEN, detail_analisa_rab.DETAIL_ANALISA_HARGA, detail_analisa_rab.DETAIL_ANALISA_TOTAL, master_upah.UPAH_ID, detail_analisa_rab.DETAIL_ANALISA_ID, detail_analisa_rab.DETAIL_ANALISA_TOTAL AS UPAH_ANALISA_TOTAL, SUM(detail_pekerjaan.DETAIL_PEKERJAAN_VOLUME) AS UPAH_ANALISA_VOLUME FROM detail_pekerjaan 
		JOIN analisa_rab ON detail_pekerjaan.ANALISA_ID = analisa_rab.ANALISA_ID  
		JOIN detail_analisa_rab ON analisa_rab.ANALISA_ID = detail_analisa_rab.ANALISA_ID 
		JOIN master_upah ON detail_analisa_rab.UPAH_ID = master_upah.UPAH_ID
		WHERE detail_pekerjaan.RAB_ID = $id
		GROUP BY detail_analisa_rab.DETAIL_ANALISA_ID) temp
		JOIN analisa_rab ON temp.ANALISA_ID = analisa_rab.ANALISA_ID 
		LEFT JOIN (SELECT detail_lpu.*
			FROM payment
			LEFT JOIN lpu 
				ON lpu.LPU_ID = payment.LPU_ID
			JOIN detail_lpu
				ON detail_lpu.LPU_ID = lpu.LPU_ID
			JOIN opname
				ON opname.OPNAME_ID = detail_lpu.OPNAME_ID AND opname.RAB_ID = lpu.RAB_ID
			JOIN detail_transaksi_opname
				ON detail_transaksi_opname.OPNAME_ID = opname.OPNAME_ID AND detail_transaksi_opname.ANALISA_ID = detail_lpu.ANALISA_ID
			JOIN permintaan_pekerjaan
				ON permintaan_pekerjaan.PERMINTAAN_PEKERJAAN_ID = detail_transaksi_opname.PERMINTAAN_PEKERJAAN_ID AND permintaan_pekerjaan.RAB_ID = lpu.RAB_ID
			WHERE lpu.RAB_ID = $id AND payment.STATUS_ID = 3 AND opname.KATEGORI_OP_ID = 2
			GROUP BY detail_lpu.ANALISA_ID) laporan ON laporan.ANALISA_ID = analisa_rab.ANALISA_ID
		GROUP BY analisa_rab.ANALISA_ID";
		
		$query = $this->db->query($sql);
		$result = array();
        if(!$query) {
            $errNo   = $this->db->_error_number();
            $errMess = $this->db->_error_message();
            return null;
        }
        else if ($query->num_rows() > 0) {
            $it = 0;
            foreach ($query->result_array() as $row) {
                $result[$it++] = $row;
            }
        }
        return $result;
	}
	
	public function getViewRapSubconById($id){
		$sql = "SELECT COALESCE(laporan.VOLUME_LAPORAN,0) AS VOLUME_LAPORAN, COALESCE(laporan.HARGA_LAPORAN,0) AS HARGA_LAPORAN, subcon.*, subcon_tipe.SUBCON_TIPE_NAMA, subcon_tipe.SUBCON_TIPE_KODE, satuan_upah.SATUAN_UPAH_NAMA, kategori_paket_pekerjaan.*, detail_pekerjaan.* FROM detail_pekerjaan 
		JOIN subcon ON subcon.SUBCON_ID = detail_pekerjaan.SUBCON_ID  
		LEFT JOIN subcon_tipe ON subcon_tipe.SUBCON_TIPE_ID = subcon.SUBCON_TIPE_ID
		LEFT JOIN satuan_upah ON satuan_upah.SATUAN_UPAH_ID = subcon.SATUAN_UPAH_ID
		JOIN kategori_paket_pekerjaan ON detail_pekerjaan.KATEGORI_PEKERJAAN_ID = kategori_paket_pekerjaan.KATEGORI_PEKERJAAN_ID 
		JOIN (SELECT SUM(temp.VOLUME_LPB) AS VOLUME_LAPORAN, temp.SUBCON_HARGA AS HARGA_LAPORAN, temp.SUBCON_ID FROM (SELECT subcon.SUBCON_HARGA, detail_lpb.*
			FROM payment
			LEFT JOIN invoice 
				ON invoice.INVOICE_ID = payment.INVOICE_ID
			LEFT JOIN detail_invoice 
				ON detail_invoice.INVOICE_ID = invoice.INVOICE_ID
			JOIN penerimaan_barang 
				ON penerimaan_barang.PENERIMAAN_BARANG_ID = detail_invoice.LPB_ID
			JOIN detail_lpb 
				ON detail_lpb.PENERIMAAN_BARANG_ID = penerimaan_barang.PENERIMAAN_BARANG_ID
			JOIN purchase_order
				ON purchase_order.PURCHASE_ORDER_ID = detail_lpb.PO_ID AND purchase_order.RAB_ID = invoice.RAB_ID
			JOIN detail_po
				ON detail_po.PURCHASE_ORDER_ID = purchase_order.PURCHASE_ORDER_ID AND detail_po.SUBCON_ID = detail_lpb.SUBCON_ID
			JOIN permintaan_pembelian
				ON permintaan_pembelian.PERMINTAAN_PEMBELIAN_ID = detail_po.PERMINTAAN_PEMBELIAN_ID AND permintaan_pembelian.RAB_ID = invoice.RAB_ID
			JOIN subcon
				ON subcon.SUBCON_ID = detail_po.SUBCON_ID
			WHERE invoice.RAB_ID = $id AND payment.STATUS_ID = 3 AND purchase_order.KATEGORI_PP_ID = 2
			GROUP BY detail_po.DETAIL_PURCHASE_ORDER_ID) temp
			GROUP BY temp.SUBCON_ID) laporan ON laporan.SUBCON_ID = subcon.SUBCON_ID
		WHERE detail_pekerjaan.RAB_ID = $id";
		
		$query = $this->db->query($sql);
		$result = array();
        if(!$query) {
            $errNo   = $this->db->_error_number();
            $errMess = $this->db->_error_message();
            return null;
        }
        else if ($query->num_rows() > 0) {
            $it = 0;
            foreach ($query->result_array() as $row) {
                $result[$it++] = $row;
            }
        }
        return $result;
	}
}
?>