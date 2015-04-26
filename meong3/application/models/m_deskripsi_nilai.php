<?php
	class M_deskripsi_nilai extends CI_Model {

		public function __construct() {
			$this->load->database();
		}

		function getAll_deskripsi_nilai() {
			$query=$this->db->query("select * from master_deskripsi_nilai order by id_master_deskripsi_nilai asc");
			return $query->result();
		}

		function doInsert_deksipsi_nilai() {
			$data = array(
				'NILAI_DESKRIPSI' => $this->input->post('nilai_deskripsi'),
				'KETERANGAN_DESKRIPSI' => $this->input->post('keterangan_deskripsi')
			);
			return $this->db->insert('MASTER_DESKRIPSI_NILAI', $data);
		}

		function edit_deskripsi_nilai($id_master_deskripsi_nilai) {
				$this->db->where('ID_MASTER_DESKRIPSI_NILAI',$id_master_deskripsi_nilai);
				$query = $this->db->get('MASTER_DESKRIPSI_NILAI');
				if($query ->num_rows > 0)
			return $query;
			else
			return null;
		}

		function doEdit_deskripsi_nilai() {
			$id_master_deskripsi_nilai = $this->input->post('id_master_deskripsi_nilai');
			$data = array (
				'NILAI_DESKRIPSI' => $this->input->post('nilai_deskripsi'),
				'KETERANGAN_DESKRIPSI' => $this->input->post('keterangan_deskripsi')
			);
			$this->db->where('ID_MASTER_DESKRIPSI_NILAI',$id_master_deskripsi_nilai);
			$this->db->update('MASTER_DESKRIPSI_NILAI',$data);
		}


		function doDelete_deskripsi_nilai($id_master_deskripsi_nilai){
			$this->db->where('ID_MASTER_DESKRIPSI_NILAI',$id_master_deskripsi_nilai);
			$this->db->delete('MASTER_DESKRIPSI_NILAI');
		}

		
	}
?>
