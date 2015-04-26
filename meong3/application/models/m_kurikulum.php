<?php
	class M_kurikulum extends CI_Model {

		public function __construct() {
			$this->load->database();
		}

		function getAll_kurikulum() {
			$query=$this->db->query("select * from master_kurikulum order by id_master_kurikulum asc");
			return $query->result();
		}

		function doInsert_kurikulum() {
			$data = array(
				'NAMA_KURIKULUM' => $this->input->post('nama_kurikulum')
			);
			return $this->db->insert('MASTER_KURIKULUM', $data);
		}

		function edit_kurikulum($id_master_kurikulum) {
				$this->db->where('ID_MASTER_KURIKULUM',$id_master_kurikulum);
				$query = $this->db->get('MASTER_KURIKULUM');
				if($query ->num_rows > 0)
			return $query;
			else
			return null;
		}

		function doEdit_kurikulum() {
			$id_master_kurikulum = $this->input->post('id_master_kurikulum');
			$data = array (
				'NAMA_KURIKULUM' => $this->input->post('nama_kurikulum')
			);
			$this->db->where('ID_MASTER_KURIKULUM',$id_master_kurikulum);
			$this->db->update('MASTER_KURIKULUM',$data);
		}


		function doDelete_kurikulum($id_master_kurikulum){
			$this->db->where('ID_MASTER_KURIKULUM',$id_master_kurikulum);
			$this->db->delete('MASTER_KURIKULUM');
		}

		
	
	}
?>
