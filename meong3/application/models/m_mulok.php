<?php
	class M_mulok extends CI_Model {

		public function __construct() {
			$this->load->database();
		}

		function getAll_mulok() {
			$query=$this->db->query("select * from master_mulok order by id_master_mulok asc");
			return $query->result();
		}

		function doInsert_mulok() {
			$data = array(
				'NAMA_MULOK' => $this->input->post('nama_mulok')
			);
			return $this->db->insert('MASTER_MULOK', $data);
		}

		function edit_mulok($id_master_mulok) {
				$this->db->where('ID_MASTER_MULOK',$id_master_mulok);
				$query = $this->db->get('MASTER_MULOK');
				if($query ->num_rows > 0)
			return $query;
			else
			return null;
		}

		function doEdit_mulok() {
			$id_master_mulok = $this->input->post('id_master_mulok');
			$data = array (
				'NAMA_MULOK' => $this->input->post('nama_mulok')
			);
			$this->db->where('ID_MASTER_MULOK',$id_master_mulok);
			$this->db->update('MASTER_MULOK',$data);
		}


		function doDelete_mulok($id_master_mulok){
			$this->db->where('ID_MASTER_MULOK',$id_master_mulok);
			$this->db->delete('MASTER_MULOK');
		}

		
	}
?>
