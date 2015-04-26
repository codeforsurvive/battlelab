<?php
	class M_kelurahan extends CI_Model {

		public function __construct() {
			$this->load->database();
		}

		function getAll_kelurahan() {
			$query=$this->db->query("select * from master_kelurahan order by id_kel asc");
			return $query->result();
		}

		function doInsert_kelurahan() {
			$data = array(
				'ID_KEC' => $this->input->post('id_kec'),
				'NAMA_KEL' => $this->input->post('nama_kel')
			);
			return $this->db->insert('MASTER_KELURAHAN', $data);
		}

		function edit_kelurahan($id_kel) {
				$this->db->where('ID_KEL',$id_kel);
				$query = $this->db->get('MASTER_KELURAHAN');
				if($query ->num_rows > 0)
			return $query;
			else
			return null;
		}

		function doEdit_kelurahan() {
			$id_kel = $this->input->post('id_kel');
			$data = array (
				'ID_KEC' => $this->input->post('id_kec'),
				'NAMA_KEL' => $this->input->post('nama_kel')
			);
			$this->db->where('ID_KEL',$id_kel);
			$this->db->update('MASTER_KELURAHAN',$data);
		}


		function doDelete_kelurahan($id_kel){
			$this->db->where('ID_KEL',$id_kel);
			$this->db->delete('MASTER_KELURAHAN');
		}

		/*Dinas Pendidikan*/

		
	}
?>
