<?php
	class M_rombel extends CI_Model {

		public function __construct() {
			$this->load->database();
		}

		function getAll_rombel() {
			$query=$this->db->query("select * from rombel order by id_rombel asc");
			return $query->result();
		}

		function doInsert_rombel() {
			$data = array(
				'ID_SEKOLAH' => $this->input->post('id_sekolah'),
				'ID_TAHUN_AJAR' => $this->input->post('id_tahun_ajar'),
				'TINGKAT_PENDIDIKAN' => $this->input->post('tingkat_pendidikan'),
				'JENIS_KELAS' => $this->input->post('jenis_kelas'),
				'NAMA_KELAS' => $this->input->post('nama_kelas')
			);
			return $this->db->insert('ROMBEL', $data);
		}

		function edit_rombel($id_rombel) {
				$this->db->where('ID_ROMBEL',$id_rombel);
				$query = $this->db->get('ROMBEL');
				if($query ->num_rows > 0)
			return $query;
			else
			return null;
		}

		function doEdit_rombel() {
			$id_rombel = $this->input->post('id_rombel');
			$data = array (
				'ID_SEKOLAH' => $this->input->post('id_sekolah'),
				'ID_TAHUN_AJAR' => $this->input->post('id_tahun_ajar'),
				'TINGKAT_PENDIDIKAN' => $this->input->post('tingkat_pendidikan'),
				'JENIS_KELAS' => $this->input->post('jenis_kelas'),
				'NAMA_KELAS' => $this->input->post('nama_kelas')
			);
			$this->db->where('ID_ROMBEL',$id_rombel);
			$this->db->update('ROMBEL',$data);
		}


		function doDelete($id_rombel){
			$this->db->where('ID_ROMBEL',$id_rombel);
			$this->db->delete('ROMBEL');
		}

		
	}
?>
