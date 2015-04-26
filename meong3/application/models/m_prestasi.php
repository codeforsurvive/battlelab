<?php
	class M_prestasi extends CI_Model {

		public function __construct() {
			$this->load->database();
		}

		function getAll_prestasi() {
			$query=$this->db->query("select * from master_prestasi order by id_prestasi asc");
			return $query->result();
		}

		function doInsert_prestasi() {
			$data = array(
				'ID_PD' => $this->input->post('id_pd'),
				'PRESTASI' => $this->input->post('prestasi')
			);
			return $this->db->insert('MASTER_PRESTASI', $data);
		}

		function edit_prestasi($id_prestasi) {
				$this->db->where('ID_PRESTASI',$id_prestasi);
				$query = $this->db->get('MASTER_PRESTASI');
				if($query ->num_rows > 0)
			return $query;
			else
			return null;
		}

		function doEdit_prestasi() {
			$id_prestasi = $this->input->post('id_prestasi');
			$data = array (
				'ID_PD' => $this->input->post('id_pd'),
				'PRESTASI' => $this->input->post('prestasi')
			);
			$this->db->where('ID_PRESTASI',$id_prestasi);
			$this->db->update('MASTER_PRESTASI',$data);
		}


		function doDelete_prestasi($id_prestasi){
			$this->db->where('ID_PRESTASI',$id_prestasi);
			$this->db->delete('MASTER_PRESTASI');
		}

		
	}
?>
