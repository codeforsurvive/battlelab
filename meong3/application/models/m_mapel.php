<?php
	class M_mapel extends CI_Model {

		public function __construct() {
			$this->load->database();
		}

		function getAll_mapel() {
			$query=$this->db->query("select * from master_mapel order by id_master_mapel asc");
			return $query->result();
		}

		function doInsert_mapel() {
			$data = array(
				'NAMA_MAPEL' => $this->input->post('nama_mapel'),
				'DESKRIPSI_MAPEL' => $this->input->post('deskripsi_mapel')
			);
			return $this->db->insert('MASTER_MAPEL', $data);
		}

		function edit_mapel($id_master_mapel) {
				$this->db->where('ID_MASTER_MAPEL',$id_master_mapel);
				$query = $this->db->get('MASTER_MAPEL');
				if($query ->num_rows > 0)
			return $query;
			else
			return null;
		}

		function doEdit_mapel() {
			$id_master_mulok = $this->input->post('id_master_mapel');
			$data = array (
				'NAMA_MAPEL' => $this->input->post('nama_mapel'),
				'DESKRIPSI_MAPEL' => $this->input->post('deskripsi_mapel')
			);
			$this->db->where('ID_MASTER_MAPEL',$id_master_mapel);
			$this->db->update('MASTER_MAPEL',$data);
		}


		function doDelete_mapel($id_master_mapel){
			$this->db->where('ID_MASTER_MAPEL',$id_master_mapel);
			$this->db->delete('MASTER_MAPEL');
		}

		
	}
?>
