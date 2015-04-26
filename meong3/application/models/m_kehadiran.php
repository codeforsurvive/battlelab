<?php
	class M_kehadiran extends CI_Model {

		public function __construct() {
			$this->load->database();
		}

		function getAll_kehadiran() {
			$query=$this->db->query("select * from kehadiran order by ID_KEHADIRAN asc");
			return $query->result();
		}

		function doInsert_kehadiran() {
			$data = array(
				'ID_MASTER_ABSENSI' => $this->input->post('id_kehadiran'),
				'JUMLAH' => $this->input->post('jumlah')
			);
			return $this->db->insert('KEHADIRAN', $data);
		}

		function edit_kehadiran($id_kehadiran) {
				$this->db->where('ID_KEHADIRAN',$id_kehadiran);
				$query = $this->db->get('KEHADIRAN');
				if($query ->num_rows > 0)
			return $query;
			else
			return null;
		}

		function doEdit_kehadiran() {
			$id_kehadiran = $this->input->post('id_kehadiran');
			$data = array (
				'ID_MASTER_ABSENSI' => $this->input->post('id_kehadiran'),
				'JUMLAH' => $this->input->post('jumlah')
			);
			$this->db->where('ID_KEHADIRAN',$id_kehadiran);
			$this->db->update('KEHADIRAN',$data);
		}


		function doDelete_kehadiran($id_kehadiran){
			$this->db->where('ID_KEHADIRAN',$id_kehadiran);
			$this->db->delete('KEHADIRAN');
		}

		
	}
?>
