<?php
	class M_penilaian_antar_teman extends CI_Model {

		public function __construct() {
			$this->load->database();
		}

		function getAll_penilaian_antar_teman() {
			$query=$this->db->query("select * from rekap_penilaian_antar_teman order by id_rekap_antar_teman asc");
			return $query->result();
		}

		function doInsert_penilaian_antar_teman() {
			$data = array(
				'ID_PD' => $this->input->post('id_pd'),
				'ID_TAHUN_AJAR' => $this->input->post('id_tahun_ajar'),
				'SEMESTER' => $this->input->post('semester'),
				'SDH_DINILAI' => $this->input->post('sdh_dinilai'),
				'SDH_MENILAI' => $this->input->post('sdh_menilai')
			);
			return $this->db->insert('REKAP_PENILAIAN_ANTAR_TEMAN', $data);
		}

		function edit_penilaian_antar_teman($id_rekap_antar_teman) {
				$this->db->where('ID_REKAP_ANTAR_TEMAN',$id_rekap_antar_teman);
				$query = $this->db->get('REKAP_PENILAIAN_ANTAR_TEMAN');
				if($query ->num_rows > 0)
			return $query;
			else
			return null;
		}

		function doEdit_penilaian_antar_teman() {
			$id_rekap_antar_teman = $this->input->post('id_rekap_antar_teman');
			$data = array (
				'ID_PD' => $this->input->post('id_pd'),
				'ID_TAHUN_AJAR' => $this->input->post('id_tahun_ajar'),
				'SEMESTER' => $this->input->post('semester'),
				'SDH_DINILAI' => $this->input->post('sdh_dinilai'),
				'SDH_MENILAI' => $this->input->post('sdh_menilai')
			);
			$this->db->where('ID_REKAP_ANTAR_TEMAN',$id_rekap_antar_teman);
			$this->db->update('REKAP_PENILAIAN_ANTAR_TEMAN',$data);
		}


		function doDelete_penilaian_antar_teman($id_rekap_antar_teman){
			$this->db->where('ID_REKAP_ANTAR_TEMAN',$id_rekap_antar_teman);
			$this->db->delete('REKAP_PENILAIAN_ANTAR_TEMAN');
		}

	
	}
?>
