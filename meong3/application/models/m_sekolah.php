<?php
	class M_sekolah extends CI_Model {

		public function __construct() {
			$this->load->database();
		}

		function getAll_DataSekolah() {
			$query=$this->db->query("SELECT * FROM `mst_sekolah` order by id_sekolah asc");
			return $query->result();
		}

		public function getKecamatanList(){
			$query = $this->db->query("SELECT `KODE_WILAYAH`, `NAMA_WILAYAH` 
										from `mst_wilayah` 
										where `LEVEL_WILAYAH`=2 and `MST_KODE_WILAYAH` LIKE '001%'");
			
		   	if($query ->num_rows > 0) 
			return $query->result_array();
			else
			return null;
			//kurang passing variabel jenis kurikulum
		}

		public function getKelurahanList($mst_id){
			$query = $this->db->query("SELECT `KODE_WILAYAH`, `NAMA_WILAYAH` 
										from `mst_wilayah` 
										where `LEVEL_WILAYAH`=3 and `MST_KODE_WILAYAH` LIKE 'mst_id%'");
			
		   	if($query ->num_rows > 0) 
			return $query->result_array();
			else
			return null;
			//filter sebagai guru atau siswa
			//GURU : KI 1, KI 2, KI 3, KI 4
			//SISWA : KI 1, KI 2
		   
		}

		function edit_DataSekolah($id_sekolah) {
				$this->db->where('ID_SEKOLAH',$id_sekolah);
				$query = $this->db->get('mst_sekolah');
				if($query ->num_rows > 0)
			return $query;
			else
			return null;
		}

		function doEdit_DataSekolah($id_sekolah,$data) {
			$this->db->where('ID_SEKOLAH',$id_sekolah);
			$this->db->update('mst_sekolah',$data);
		}

		function doInsert() {
			$data = array(
				'ID_KEL' => $this->input->post('id_kel'),
				'NSS' => $this->input->post('nss'),
				'NPSN_SEKOLAH' => $this->input->post('npsn_sekolah'),
				'NAMA_SEKOLAH' => $this->input->post('nama_sekolah'),
				'ALAMAT_SEKOLAH' => $this->input->post('alamat_sekolah'),
				'NOTELP_SEKOLAH' => $this->input->post('notelp_sekolah')
			);
			return $this->db->insert('MASTER_SEKOLAH', $data);
		}

		

		


		function doDelete($id_sekolah){
			$this->db->where('ID_SEKOLAH',$id_sekolah);
			$this->db->delete('MASTER_SEKOLAH');
		}

		function getDetailById($id_sekolah)
		{
			$id_sekolah = $this->input->post('id_sekolah');
			$data = array (
			'ID_KEL' => $this->input->post('id_kel'),
				'NSS' => $this->input->post('nss'),
				'NPSN_SEKOLAH' => $this->input->post('npsn_sekolah'),
				'NAMA_SEKOLAH' => $this->input->post('nama_sekolah'),
				'ALAMAT_SEKOLAH' => $this->input->post('alamat_sekolah'),
				'NOTELP_SEKOLAH' => $this->input->post('notelp_sekolah')
			);
		}

		function getDetail($id_sekolah)
		{
			$this->db->where('ID_SEKOLAH',$id_sekolah);
				$query = $this->db->get('MASTER_SEKOLAH');
				if($query ->num_rows > 0)
			return $query;
			else
			return null;
		}
	
	}
?>
