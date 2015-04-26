<?php
	class M_ekskul extends CI_Model {

		public function __construct() {
			$this->load->database();
		}

		function getAll_ekskul() {
			$query=$this->db->query("select * from master_ekskul order by id_master_ekskul asc");
			return $query->result();
		}

		function doInsert_ekskul() {
			$data = array(
				'NAMA_EKSKUL' => $this->input->post('nama_ekskul')
			);
			return $this->db->insert('MASTER_EKSKUL', $data);
		}

		function edit_ekskul($id_master_ekskul) {
				$this->db->where('ID_MASTER_EKSKUL',$id_master_ekskul);
				$query = $this->db->get('MASTER_EKSKUL');
				if($query ->num_rows > 0)
			return $query;
			else
			return null;
		}

		function doEdit_ekskul() {
			$id_master_ekskul = $this->input->post('id_master_ekskul');
			$data = array (
				'NAMA_EKSKUL' => $this->input->post('nama_ekskul')
			);
			$this->db->where('ID_MASTER_EKSKUL',$id_master_ekskul);
			$this->db->update('MASTER_EKSKUL',$data);
		}


		function doDelete_ekskul($id_master_ekskul){
			$this->db->where('ID_MASTER_EKSKUL',$id_master_ekskul);
			$this->db->delete('MASTER_EKSKUL');
		}

		
	}
?>
