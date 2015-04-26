<?php
	class M_wali extends CI_Model {

		public function __construct() {
			$this->load->database();
		}

		function getAll_wali() {
			$query=$this->db->query("select * from master_wali order by id_wali asc");
			return $query->result();
		}

		function doInsert_wali() {
			$data = array(
				'NIK_WALI' => $this->input->post('nik_wali'),
				'NAMA_WALI' => $this->input->post('nama_wali'),
				'ALAMAT_WALI' => $this->input->post('alamat_wali'),
				'PEKERJAAN_WALI' => $this->input->post('pekerjaan_wali')
			);
			return $this->db->insert('MASTER_WALI', $data);
		}

		function edit_wali($id_wali) {
				$this->db->where('ID_WALI',$id_wali);
				$query = $this->db->get('MASTER_WALI');
				if($query ->num_rows > 0)
			return $query;
			else
			return null;
		}

		function doEdit_wali() {
			$id_wali = $this->input->post('id_wali');
			$data = array (
				'NIK_WALI' => $this->input->post('nik_wali'),
				'NAMA_WALI' => $this->input->post('nama_wali'),
				'ALAMAT_WALI' => $this->input->post('alamat_wali'),
				'PEKERJAAN_WALI' => $this->input->post('pekerjaan_wali')
			);
			$this->db->where('ID_WALI',$id_wali);
			$this->db->update('MASTER_WALI',$data);
		}


		function doDelete_wali($id_wali){
			$this->db->where('ID_WALI',$id_wali);
			$this->db->delete('MASTER_WALI');
		}

		
	}
?>
