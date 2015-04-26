<?php
	class M_absensi extends CI_Model {

		public function __construct() {
			$this->load->database();
		}

		function getAll_absensi() {
			$query=$this->db->query("select * from master_absensi order by id_master_absensi asc");
			return $query->result();
		}

		function doInsert_absensi() {
			$data = array(
				'JENIS_ABSENSI' => $this->input->post('jenis_absensi')
			);
			return $this->db->insert('MASTER_ABSENSI', $data);
		}

		function edit_absensi($id_master_absensi) {
				$this->db->where('ID_MASTER_ABSENSI',$id_master_absensi);
				$query = $this->db->get('MASTER_ABSENSI');
				if($query ->num_rows > 0)
			return $query;
			else
			return null;
		}

		function doEdit_absensi() {
			$id_master_absensi = $this->input->post('id_master_absensi');
			$data = array (
				'JENIS_ABSENSI' => $this->input->post('jenis_absensi')
			);
			$this->db->where('ID_MASTER_ABSENSI',$id_master_absensi);
			$this->db->update('MASTER_ABSENSI',$data);
		}


		function doDelete_absensi($id_master_absensi){
			$this->db->where('ID_MASTER_ABSENSI',$id_master_absensi);
			$this->db->delete('MASTER_ABSENSI');
		}

		
	
	}
?>
