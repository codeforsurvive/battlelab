<?php
	class M_wilayah extends CI_Model {

		public function __construct() {
			$this->load->database();
		}

		function getWilayah() {
			$query=$this->db->query("SELECT * from `mst_wilayah` where `LEVEL_WILAYAH`=3 order by kode_wilayah asc");
			return $query->result();
		}

		function doInsert_kecamatan() {
			$data = array(
				'ID_KOTAKAB' => $this->input->post('id_kotakab'),
				'NAMA_KEC' => $this->input->post('nama_kec')
			);
			return $this->db->insert('MASTER_KECAMATAN', $data);
		}

		function edit_kecamatan($id_kec) {
				$this->db->where('ID_KEC',$id_kec);
				$query = $this->db->get('MASTER_KECAMATAN');
				if($query ->num_rows > 0)
			return $query;
			else
			return null;
		}

		function doEdit_kecamatan() {
			$id_kec = $this->input->post('id_kec');
			$data = array (
				'ID_KOTAKAB' => $this->input->post('id_kotakab'),
				'NAMA_KEC' => $this->input->post('nama_kec')
			);
			$this->db->where('ID_KEC',$id_kec);
			$this->db->update('MASTER_KECAMATAN',$data);
		}


		function doDelete_kecamatan($id_kec){
			$this->db->where('ID_KEC',$id_kec);
			$this->db->delete('MASTER_KECAMATAN');
		}

		
	
	}
?>
