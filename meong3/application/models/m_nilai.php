<?php
	class M_nilai extends CI_Model {

		public function __construct() {
			$this->load->database();
		}

		function getAll_nilai() {
			$query=$this->db->query("select * from nilai order by id_nilai asc");
			return $query->result();
		}

		function doInsert_nilai() {
			$data = array(
				'ID_PD' => $this->input->post('id_pd'),
				'ID_MASTER_PENILAIAN' => $this->input->post('id_master_penilaian'),
				'ID_ROMBEL' => $this->input->post('id_rombel'),
				'TANGGAL' => $this->input->post('tanggal'),
				'NILAI' => $this->input->post('nilai')
			);
			return $this->db->insert('NILAI', $data);
		}

		function edit_nilai($id_nilai) {
				$this->db->where('ID_NILAI',$id_nilai);
				$query = $this->db->get('NILAI');
				if($query ->num_rows > 0)
			return $query;
			else
			return null;
		}

		function doEdit_nilai() {
			$id_nilai = $this->input->post('id_nilai');
			$data = array (
				'ID_PD' => $this->input->post('id_pd'),
				'ID_MASTER_PENILAIAN' => $this->input->post('id_master_penilaian'),
				'ID_ROMBEL' => $this->input->post('id_rombel'),
				'TANGGAL' => $this->input->post('tanggal'),
				'NILAI' => $this->input->post('nilai')
			);
			$this->db->where('ID_NILAI',$id_nilai);
			$this->db->update('NILAI',$data);
		}


		function doDelete_nilai($id_nilai){
			$this->db->where('ID_NILAI',$id_nilai);
			$this->db->delete('NILAI');
		}

		function rekapAndra()
		{
			$nh	= $this->db->query("SELECT `NAMA_PD`, AVG(`NILAI`) FROM `nilai` join `master_pd` on `master_pd`.ID_PD = `nilai`.ID_PD WHERE `master_pd`.ID_ROMBEL = 2 AND `nilai`.ID_MASTER_PENILAIAN LIKE '201310301%' AND `nilai`.ID_PD = 1 group by `nilai`.ID_PD")->result();
			$nuts = $this->db->query("SELECT `NAMA_PD`, `NILAI` FROM `nilai` join `master_pd` on `master_pd`.ID_PD = `nilai`.ID_PD WHERE `master_pd`.ID_ROMBEL = 2 AND `nilai`.ID_MASTER_PENILAIAN LIKE '201310302%'")->result(); 
			$nuas = $this->db->query("SELECT `NAMA_PD`, `NILAI` FROM `nilai` join `master_pd` on `master_pd`.ID_PD = `nilai`.ID_PD WHERE `master_pd`.ID_ROMBEL = 2 AND `nilai`.ID_MASTER_PENILAIAN LIKE '201310303%'")->result();
			
			$data['nh']=$nh;
			$data['nuts']=$nuts;
			$data['nuas']=$nuas;
			return $data;
		}

		public function getMapelList(){
			$query = $this->db->query("SELECT `ID_MASTER_PENILAIAN`, `INDIKATOR_PENILAIAN` 
										from `master_indikator_penilaian` 
										where `LEVEL_INDIKATOR`=1 and `ID_MASTER_PENILAIAN` LIKE '2013%'");
			
		   	if($query ->num_rows > 0) 
			return $query->result_array();
			else
			return null;
			//kurang passing variabel jenis kurikulum
		}

		public function getKIList($mst_id, $person){
			$query = $this->db->query("SELECT `ID_MASTER_PENILAIAN` , `INDIKATOR_PENILAIAN` 
									from `master_indikator_penilaian` 
									where `LEVEL_INDIKATOR`=2 
									and `MAS_ID_MASTER_PENILAIAN` =
            							(SELECT `ID_MASTER_PENILAIAN` 
            								from `master_indikator_penilaian` 
            								where `LEVEL_INDIKATOR`=1 and `ID_MASTER_PENILAIAN`='$mst_id') ") ;
			//filter sebagai guru atau siswa
			//GURU : KI 1, KI 2, KI 3, KI 4
			//SISWA : KI 1, KI 2
		   	if($query ->num_rows > 0) 
			return $query->result_array();
			else
			return null;
		}

		public function getMetodeList($mst_id){
			$query = $this->db->query("SELECT `ID_MASTER_PENILAIAN` , `INDIKATOR_PENILAIAN` 
									from `master_indikator_penilaian` 
									where `LEVEL_INDIKATOR`=3 
									and `MAS_ID_MASTER_PENILAIAN` =
            							(SELECT `ID_MASTER_PENILAIAN` 
            								from `master_indikator_penilaian` 
            								where `LEVEL_INDIKATOR`=2 and `ID_MASTER_PENILAIAN`='$mst_id') ") ;
			//filter sebagai guru atau siswa
			//GURU : OBSERVASI, JURNAL
			//SISWA : DIRI SENDIRI, ANTAR TEMAN
		   	if($query ->num_rows > 0) 
			return $query->result_array();
			else
			return null;
		}

		public function getIndikatorList($mst_id){
			$query = $this->db->query("SELECT `ID_MASTER_PENILAIAN` , `INDIKATOR_PENILAIAN` 
									from `master_indikator_penilaian` 
									where `LEVEL_INDIKATOR`=4 
									and `MAS_ID_MASTER_PENILAIAN` =
            							(SELECT `ID_MASTER_PENILAIAN` 
            								from `master_indikator_penilaian` 
            								where `LEVEL_INDIKATOR`=3 and `ID_MASTER_PENILAIAN`='$mst_id') ") ;
			
		   	if($query ->num_rows > 0) 
			return $query->result_array();
			else
			return null;
		}

		public function getKDList($mst_id){
			$query = $this->db->query("SELECT `ID_MASTER_PENILAIAN` , `INDIKATOR_PENILAIAN` 
									from `master_indikator_penilaian` 
									where `LEVEL_INDIKATOR`=5 
									and `MAS_ID_MASTER_PENILAIAN` =
            							(SELECT `ID_MASTER_PENILAIAN` 
            								from `master_indikator_penilaian` 
            								where `LEVEL_INDIKATOR`=4 and `ID_MASTER_PENILAIAN`='$mst_id') ") ;
			
		   	if($query ->num_rows > 0) 
			return $query->result_array();
			else
			return null;
		}

		public function getKurikulumType(){
			//tabel db : master_kurikulum, master_tahun_ajar, rombel, mengajar, master_ptk

			/*
			$kelas = $this->input->post('ID_ROMBEL');
			$query = $this->db->query("SELECT `master_kurikulum`.ID_MASTER_KURIKULUM, `NAMA_KURIKULUM`, `master_tahun_ajar`.ID_TAHUN_AJAR, 
										from `master_kurikulum`, `master_tahun_ajar`, `rombel` 
										where `rombel`.ID_TAHUN_AJAR = `master_tahun_ajar`.ID_TAHUN_AJAR 
											and `rombel`.ID_ROMBEL = '$kelas' 
											and `master_tahun_ajar`.ID_MASTER_KURIKULUM = `master_kurikulum`.ID_MASTER_KURIKULUM");
			if($query->num_rows() >0 )
			{
				$data=$query->result_array();
				return $data[0];
			}
			else
			{
				return false;
			}
			*/
		}

		public function getListStudent_inClass(){
			//tabel db : rombel, mengajar, master_pd
		}

		public function doAssesment_ByTeacher(){
			//tabel db : nilai, master_pd, master_indikator_penilaian
			//insert into table nilai
		}
	}
?>
