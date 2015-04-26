<?php
	class M_ortu extends CI_Model {

		public function __construct() {
			$this->load->database();
		}

		function getAll_ortu() {
			$query=$this->db->query("select * from master_ortu order by id_ortu asc");
			return $query->result();
		}

		function doInsert_ortu() {
			$data = array(
				'NIK' => $this->input->post('nik'),
				'NAMA_AYAH' => $this->input->post('nama_ayah'),
				'NAMA_IBU' => $this->input->post('nama_ibu'),
				'PEKERJAAN_AYAH' => $this->input->post('pekerjaan_ayah'),
				'PEKERJAAN_IBU' => $this->input->post('pekerjaan_ibu'),
				'ALAMAT_ORTU' => $this->input->post('alamat_ortu')
			);
			return $this->db->insert('MASTER_ORTU', $data);
		}

		function edit_ortu($id_ortu) {
				$this->db->where('ID_ORTU',$id_ortu);
				$query = $this->db->get('MASTER_ORTU');
				if($query ->num_rows > 0)
			return $query;
			else
			return null;
		}

		function doEdit_ortu() {
			$id_ortu = $this->input->post('id_ortu');
			$data = array (
				'NIK' => $this->input->post('nik'),
				'NAMA_AYAH' => $this->input->post('nama_ayah'),
				'NAMA_IBU' => $this->input->post('nama_ibu'),
				'PEKERJAAN_AYAH' => $this->input->post('pekerjaan_ayah'),
				'PEKERJAAN_IBU' => $this->input->post('pekerjaan_ibu'),
				'ALAMAT_ORTU' => $this->input->post('alamat_ortu')
			);
			$this->db->where('ID_ORTU',$id_ortu);
			$this->db->update('MASTER_ORTU',$data);
		}


		function doDelete_ortu($id_ortu){
			$this->db->where('ID_ORTU',$id_ortu);
			$this->db->delete('MASTER_ORTU');
		}

		
	}
?>
