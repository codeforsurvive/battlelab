<?php
	class M_peran_ptk extends CI_Model {

		public function __construct() {
			$this->load->database();
		}

		function getAll_peran_ptk() {
			$query=$this->db->query("select * from master_peran_ptk order by id_peran asc");
			return $query->result();
		}

		function doInsert_peran_ptk() {
			$data = array(
				'ROLE_PTK' => $this->input->post('role_ptk'),
				'NAMA_ROLE' => $this->input->post('nama_role')
			);
			return $this->db->insert('MASTER_PERAN_PTK', $data);
		}

		function edit_peran_ptk($id_peran) {
				$this->db->where('ID_PERAN',$id_peran);
				$query = $this->db->get('MASTER_PERAN_PTK');
				if($query ->num_rows > 0)
			return $query;
			else
			return null;
		}

		function doEdit_peran_ptk() {
			$id_peran = $this->input->post('id_peran');
			$data = array (
				'ROLE_PTK' => $this->input->post('role_ptk'),
				'NAMA_ROLE' => $this->input->post('nama_role')
			);
			$this->db->where('ID_PERAN',$id_peran);
			$this->db->update('MASTER_PERAN_PTK',$data);
		}


		function doDelete_peran_ptk($id_peran){
			$this->db->where('ID_PERAN',$id_peran);
			$this->db->delete('MASTER_PERAN_PTK');
		}

		
	}
?>
