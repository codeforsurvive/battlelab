<?php
	class M_pd extends CI_Model {

		public function __construct() {
			$this->load->database();
			
		}

		function getAll_pd() {
			$query=$this->db->query("select * from master_pd order by id_pd asc");
			return $query->result();
		}

		function doInsert_pd() {
			$data = array(
				'ID_ROMBEL' => $this->input->post('id_rombel'),
				'ID_KEHADIRAN' => $this->input->post('id_kehadiran'),
				'ID_ORTU' => $this->input->post('id_ortu'),
				'ID_WALI' => $this->input->post('id_wali'),
				'NIS' => $this->input->post('nis'),
				'NISN' => $this->input->post('nisn'),
				'NAMA_PD' => $this->input->post('nama_pd'),
				'ALAMAT_PD' => $this->input->post('alamat_pd'),
				'NO_TELP_PD' => $this->input->post('no_telp_pd'),
				'FOTO_PD' => $this->input->post('foto_pd'),
				'JK_PD' => $this->input->post('jk_pd'),
				'TMPT_LHR_PD' => $this->input->post('tmpt_lhr_pd'),
				'TGL_LHR_PD' => $this->input->post('tgl_lhr_pd'),
				'STATUS_DLM_KELUARGA' => $this->input->post('status_dlm_keluarga'),
				'AGAMA_PD' => $this->input->post('agama_pd'),
				'ANAK_KE' => $this->input->post('anak_ke'),
				'DITERIMA_PD_KELAS' => $this->input->post('diterima_pd_kelas'),
				'DITERIMA_PD_TGL' => $this->input->post('diterima_pd_tgl'),
				'SEKOLAH_ASAL' => $this->input->post('sekolah_asal')
			);
			return $this->db->insert('MASTER_PD', $data);
		}

		function edit_pd($id_pd) {
				$this->db->where('ID_PD',$id_pd);
				$query = $this->db->get('MASTER_PD');
				if($query ->num_rows > 0)
			return $query;
			else
			return null;
		}

		function doEdit_pd() {
			$id_pd = $this->input->post('id_pd');
			$data = array (
				'ID_ROMBEL' => $this->input->post('id_rombel'),
				'ID_KEHADIRAN' => $this->input->post('id_kehadiran'),
				'ID_ORTU' => $this->input->post('id_ortu'),
				'ID_WALI' => $this->input->post('id_wali'),
				'NIS' => $this->input->post('nis'),
				'NISN' => $this->input->post('nisn'),
				'NAMA_PD' => $this->input->post('nama_pd'),
				'ALAMAT_PD' => $this->input->post('alamat_pd'),
				'NO_TELP_PD' => $this->input->post('no_telp_pd'),
				'FOTO_PD' => $this->input->post('foto_pd'),
				'JK_PD' => $this->input->post('jk_pd'),
				'TMPT_LHR_PD' => $this->input->post('tmpt_lhr_pd'),
				'TGL_LHR_PD' => $this->input->post('tgl_lhr_pd'),
				'STATUS_DLM_KELUARGA' => $this->input->post('status_dlm_keluarga'),
				'AGAMA_PD' => $this->input->post('agama_pd'),
				'ANAK_KE' => $this->input->post('anak_ke'),
				'DITERIMA_PD_KELAS' => $this->input->post('diterima_pd_kelas'),
				'DITERIMA_PD_TGL' => $this->input->post('diterima_pd_tgl'),
				'SEKOLAH_ASAL' => $this->input->post('sekolah_asal')
			);
			$this->db->where('ID_PD',$id_pd);
			$this->db->update('MASTER_PD',$data);
		}


		function doDelete_pd($id_pd){
			$this->db->where('ID_PD',$id_pd);
			$this->db->delete('MASTER_PD');
		}

		function getDetailById($id_pd)
		{
			$id_pd = $this->input->post('id_pd');
			$data = array (
				'ID_ROMBEL' => $this->input->post('id_rombel'),
				'ID_KEHADIRAN' => $this->input->post('id_kehadiran'),
				'ID_ORTU' => $this->input->post('id_ortu'),
				'ID_WALI' => $this->input->post('id_wali'),
				'NIS' => $this->input->post('nis'),
				'NISN' => $this->input->post('nisn'),
				'NAMA_PD' => $this->input->post('nama_pd'),
				'ALAMAT_PD' => $this->input->post('alamat_pd'),
				'NO_TELP_PD' => $this->input->post('no_telp_pd'),
				'FOTO_PD' => $this->input->post('foto_pd'),
				'JK_PD' => $this->input->post('jk_pd'),
				'TMPT_LHR_PD' => $this->input->post('tmpt_lhr_pd'),
				'TGL_LHR_PD' => $this->input->post('tgl_lhr_pd'),
				'STATUS_DLM_KELUARGA' => $this->input->post('status_dlm_keluarga'),
				'AGAMA_PD' => $this->input->post('agama_pd'),
				'ANAK_KE' => $this->input->post('anak_ke'),
				'DITERIMA_PD_KELAS' => $this->input->post('diterima_pd_kelas'),
				'DITERIMA_PD_TGL' => $this->input->post('diterima_pd_tgl'),
				'SEKOLAH_ASAL' => $this->input->post('sekolah_asal')
			);
		}

		function get_data_diri_siswa($username) {
			
			$query=$this->db->query("SELECT `master_sekolah`.ID_SEKOLAH, `NAMA_SEKOLAH`, 
											`rombel`.ID_ROMBEL, `NAMA_KELAS`, 
											`rombel`.ID_TAHUN_AJAR, `semester_thn_ajar`, `NAMA_TAHUN_AJAR`, 
											`NAMA_PD`, `AKSES_LEVEL`  
									from `master_sekolah`, 
										 `master_pd` , 
										 `rombel`, 
										 `master_tahun_ajar`,
										 `pengguna`
									where `master_sekolah`.ID_SEKOLAH = `rombel`.ID_SEKOLAH 
											and `master_pd`.ID_ROMBEL = `rombel`.ID_ROMBEL 
											and `rombel`.ID_TAHUN_AJAR = `master_tahun_ajar`.ID_TAHUN_AJAR
											and `master_pd`.NISN = '$username' and `master_pd`.NISN = `pengguna`.USERNAME ");
			if($query->num_rows() >0 )
			{
				$data=$query->result_array();
				return $data[0];
			}
			else
			{
				return false;
			}
		}

		function getDetail($id_pd)
		{
			$this->db->where('ID_PD',$id_pd);
				$query = $this->db->get('MASTER_PD');
				if($query ->num_rows > 0)
			return $query;
			else
			return null;
		}
	
	}
?>
