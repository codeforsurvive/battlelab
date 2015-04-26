<?php
	class M_kota extends CI_Model {

		public function __construct() {
			$this->load->database();
		}

		function getAll_kota() {
			$query=$this->db->query("select * from master_kota order by id_kotakab asc");
			return $query->result();
		}

		function doInsert_kota() {
			$data = array(
				'NAMA_KOTAKAB' => $this->input->post('nama_kotakab')
			);
			return $this->db->insert('MASTER_KOTA', $data);
		}

		function edit_kota($id_kotakab) {
				$this->db->where('ID_KOTAKAB',$id_kotakab);
				$query = $this->db->get('MASTER_KOTA');
				if($query ->num_rows > 0)
			return $query;
			else
			return null;
		}

		function doEdit_kota() {
			$id_kotakab = $this->input->post('id_kotakab');
			$data = array (
			'NAMA_KOTAKAB' => $this->input->post('nama_kotakab')
			);
			$this->db->where('ID_KOTAKAB',$id_kotakab);
			$this->db->update('MASTER_KOTA',$data);
		}


		function doDelete_kota($id_kotakab){
			$this->db->where('ID_KOTAKAB',$id_kotakab);
			$this->db->delete('MASTER_KOTA');
		}
	
	}
?>
