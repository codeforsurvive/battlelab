<?php
	class M_tahun_ajar extends CI_Model {

		public function __construct() {
			$this->load->database();
		}

		function getAll_tahun_ajar() {
			$query=$this->db->query("select * from master_tahun_ajar order by id_tahun_ajar asc");
			return $query->result();
		}

		function doInsert_tahun_ajar() {
			$data = array(
				'ID_MASTER_KURIKULUM' => $this->input->post('id_master_kurikulum'),
				'NAMA_TAHUN_AJAR' => $this->input->post('nama_tahun_ajar'),
				'TAHUN_AWAL' => $this->input->post('tahun_awal'),
				'TAHUN_AKHIR' => $this->input->post('tahun_akhir')
			);
			return $this->db->insert('MASTER_TAHUN_AJAR', $data);
		}

		function edit_tahun_ajar($id_tahun_ajar) {
				$this->db->where('ID_TAHUN_AJAR',$id_tahun_ajar);
				$query = $this->db->get('MASTER_TAHUN_AJAR');
				if($query ->num_rows > 0)
			return $query;
			else
			return null;
		}

		function doEdit_tahun_ajar() {
			$id_tahun_ajar = $this->input->post('id_tahun_ajar');
			$data = array (
				'ID_MASTER_KURIKULUM' => $this->input->post('id_master_kurikulum'),
				'NAMA_TAHUN_AJAR' => $this->input->post('nama_tahun_ajar'),
				'TAHUN_AWAL' => $this->input->post('tahun_awal'),
				'TAHUN_AKHIR' => $this->input->post('tahun_akhir')
			);
			$this->db->where('ID_TAHUN_AJAR',$id_tahun_ajar);
			$this->db->update('MASTER_TAHUN_AJAR',$data);
		}


		function doDelete_tahun_ajar($id_tahun_ajar){
			$this->db->where('ID_TAHUN_AJAR',$id_tahun_ajar);
			$this->db->delete('MASTER_TAHUN_AJAR');
		}

		
	}
?>
