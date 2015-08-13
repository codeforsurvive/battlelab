<?php
class mDetailRab extends MY_Model {

	// constants, column definition
	const ID = 'DETAIL_PEKERJAAN_ID';
	//const ACTIVE = 'BARANG_ACTIVE';

	function __construct() {
        parent::__construct();
		$this->tableName = "detail_pekerjaan";
		$this->idField = mDetailRab::ID;
    }
	
	public function getDetailPekerjaan($id){
        $sql = "SELECT *, analisa_rab.satuan_nama AS SATUAN_ANALISA_NAMA, subcon.satuan_nama AS SATUAN_SUBCON_NAMA, satuan_upah.SATUAN_UPAH_NAMA AS SATUAN_SUBCON_UPAH_NAMA, subcon.SUBCON_TIPE_ID AS TIPE_SUBCON
		FROM detail_pekerjaan 
		LEFT JOIN analisa_rab ON detail_pekerjaan.ANALISA_ID = analisa_rab.ANALISA_ID 
		LEFT JOIN subcon ON subcon.SUBCON_ID = detail_pekerjaan.SUBCON_ID 
		LEFT JOIN subcon_tipe ON subcon_tipe.SUBCON_TIPE_ID = subcon.SUBCON_TIPE_ID
		LEFT JOIN satuan_upah ON satuan_upah.SATUAN_UPAH_ID = subcon.SATUAN_UPAH_ID
		JOIN kategori_paket_pekerjaan ON detail_pekerjaan.KATEGORI_PEKERJAAN_ID = kategori_paket_pekerjaan.KATEGORI_PEKERJAAN_ID 
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
	
	public function getDetailPekerjaanKompleks($id){
        $sql = "SELECT * FROM
		((SELECT * FROM
		((SELECT detail_pekerjaan.*, (@a:=NULL) AS SATUAN_SUBCON_UPAH_NAMA, (@a:=NULL) AS TIPE_SUBCON, (@a:=NULL) AS SUBCON_TIPE_KODE, (@a:=NULL) AS SUBCON_NAMA, (@a:=NULL) AS SATUAN_SUBCON_NAMA, detail_analisa_rab.DETAIL_ANALISA_HARGA AS HARGA, analisa_rab.ANALISA_NAMA, analisa_rab.ANALISA_KODE, analisa_rab.SATUAN_NAMA AS SATUAN_ANALISA_NAMA, detail_analisa_rab.BARANG_ID, detail_analisa_rab.UPAH_ID, SUM(detail_analisa_rab.DETAIL_ANALISA_HARGA*detail_analisa_rab.DETAIL_ANALISA_KOEFISIEN) AS TOTAL_MATERIAL,
		kategori_paket_pekerjaan.KATEGORI_PEKERJAAN_NAMA, kategori_paket_pekerjaan.KATEGORI_PEKERJAAN_URUTAN
		FROM detail_pekerjaan 
		LEFT JOIN analisa_rab ON detail_pekerjaan.ANALISA_ID = analisa_rab.ANALISA_ID 
		LEFT JOIN detail_analisa_rab ON detail_analisa_rab.ANALISA_ID = analisa_rab.ANALISA_ID
		JOIN kategori_paket_pekerjaan ON detail_pekerjaan.KATEGORI_PEKERJAAN_ID = kategori_paket_pekerjaan.KATEGORI_PEKERJAAN_ID 
		WHERE detail_pekerjaan.RAB_ID = $id AND detail_analisa_rab.BARANG_ID IS NOT NULL 
		GROUP BY analisa_rab.ANALISA_ID)
		UNION 
		(SELECT detail_pekerjaan.*, (@a:=NULL) AS SATUAN_SUBCON_UPAH_NAMA, (@a:=NULL) AS TIPE_SUBCON, (@a:=NULL) AS SUBCON_TIPE_KODE, (@a:=NULL) AS SUBCON_NAMA, (@a:=NULL) AS SATUAN_SUBCON_NAMA, detail_analisa_rab.DETAIL_ANALISA_HARGA AS HARGA, analisa_rab.ANALISA_NAMA, analisa_rab.ANALISA_KODE, analisa_rab.SATUAN_NAMA AS SATUAN_ANALISA_NAMA, detail_analisa_rab.BARANG_ID, detail_analisa_rab.UPAH_ID, SUM(detail_analisa_rab.DETAIL_ANALISA_HARGA*detail_analisa_rab.DETAIL_ANALISA_KOEFISIEN) AS TOTAL_MATERIAL,
		kategori_paket_pekerjaan.KATEGORI_PEKERJAAN_NAMA, kategori_paket_pekerjaan.KATEGORI_PEKERJAAN_URUTAN
		FROM detail_pekerjaan 
		LEFT JOIN analisa_rab ON detail_pekerjaan.ANALISA_ID = analisa_rab.ANALISA_ID 
		LEFT JOIN detail_analisa_rab ON detail_analisa_rab.ANALISA_ID = analisa_rab.ANALISA_ID
		JOIN kategori_paket_pekerjaan ON detail_pekerjaan.KATEGORI_PEKERJAAN_ID = kategori_paket_pekerjaan.KATEGORI_PEKERJAAN_ID 
		WHERE detail_pekerjaan.RAB_ID = $id AND detail_analisa_rab.UPAH_ID IS NOT NULL 
		GROUP BY analisa_rab.ANALISA_ID)) temp
		ORDER BY temp.KATEGORI_PEKERJAAN_URUTAN, temp.ANALISA_ID)
		UNION
		(SELECT detail_pekerjaan.*, satuan_upah.SATUAN_UPAH_NAMA AS SATUAN_SUBCON_UPAH_NAMA, subcon.SUBCON_TIPE_ID AS TIPE_SUBCON, subcon_tipe.SUBCON_TIPE_KODE, subcon.SUBCON_NAMA, subcon.SATUAN_NAMA AS SATUAN_SUBCON_NAMA, subcon.SUBCON_HARGA AS HARGA, (@a:=NULL) AS ANALISA_NAMA, (@a:=NULL) AS ANALISA_KODE, (@a:=NULL) AS SATUAN_ANALISA_NAMA,(@a:=NULL) AS BARANG_ID, (@b:=NULL) AS UPAH_ID, (subcon.SUBCON_HARGA) AS TOTAL_MATERIAL,
		kategori_paket_pekerjaan.KATEGORI_PEKERJAAN_NAMA, kategori_paket_pekerjaan.KATEGORI_PEKERJAAN_URUTAN
		FROM detail_pekerjaan 
		JOIN kategori_paket_pekerjaan ON kategori_paket_pekerjaan.KATEGORI_PEKERJAAN_ID = detail_pekerjaan.KATEGORI_PEKERJAAN_ID
		LEFT JOIN subcon ON subcon.SUBCON_ID = detail_pekerjaan.SUBCON_ID
		LEFT JOIN subcon_tipe ON subcon_tipe.SUBCON_TIPE_ID = subcon.SUBCON_TIPE_ID
		LEFT JOIN satuan_upah ON satuan_upah.SATUAN_UPAH_ID = subcon.SATUAN_UPAH_ID
		WHERE detail_pekerjaan.RAB_ID = $id AND detail_pekerjaan.SUBCON_ID IS NOT NULL
		ORDER BY kategori_paket_pekerjaan.KATEGORI_PEKERJAAN_URUTAN, detail_pekerjaan.ANALISA_ID)) temp2
		ORDER BY temp2.KATEGORI_PEKERJAAN_URUTAN, temp2.DETAIL_PEKERJAAN_URUTAN, temp2.ANALISA_ID";
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