<?php
	class M_ptk extends CI_Model {

		public function __construct() {
			$this->load->database();
		}

		function getDataDiriPTK($username) {
			
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

		function getAll_ptk() {
			$query=$this->db->query("select * from MASTER_PTK order by id_ptk asc");
			return $query->result();
		}

		function doInsert_ptk() {
			$data = array(
				'ID_ROMBEL' => $this->input->post('id_rombel'),
				'ID_PERAN' => $this->input->post('id_peran'),
				'NIP' => $this->input->post('nip'),
				'NUPTK' => $this->input->post('nuptk'),
				'NIK_PTK' => $this->input->post('nik_ptk'),
				'NAMA_PTK' => $this->input->post('nama_ptk'),
				'JK_PTK' => $this->input->post('jk_ptk'),
				'TMPT_LHR_PTK' => $this->input->post('tmpt_lhr_ptk'),
				'TGL_LHR_PTK' => $this->input->post('tgl_lhr_ptk'),
				'NAMA_SEKOLAH' => $this->input->post('nama_sekolah'),
				'AGAMA_PTK' => $this->input->post('agama_ptk'),
				'ALAMAT_PTK' => $this->input->post('alamat_ptk'),
				'NOTELP_PTK' => $this->input->post('notelp_ptk'),
				'FOTO_PTK' => $this->input->post('foto_ptk')
			);
			return $this->db->insert('MASTER_PTK', $data);
		}

		function edit_ptk($id_ptk) {
				$this->db->where('ID_PTK',$id_ptk);
				$query = $this->db->get('MASTER_PTK');
				if($query ->num_rows > 0)
			return $query;
			else
			return null;
		}

		function doEdit_ptk() {
			$id_ptk = $this->input->post('id_ptk');
			$data = array (
				'ID_ROMBEL' => $this->input->post('id_rombel'),
				'ID_PERAN' => $this->input->post('id_peran'),
				'NIP' => $this->input->post('nip'),
				'NUPTK' => $this->input->post('nuptk'),
				'NIK_PTK' => $this->input->post('nik_ptk'),
				'NAMA_PTK' => $this->input->post('nama_ptk'),
				'JK_PTK' => $this->input->post('jk_ptk'),
				'TMPT_LHR_PTK' => $this->input->post('tmpt_lhr_ptk'),
				'TGL_LHR_PTK' => $this->input->post('tgl_lhr_ptk'),
				'NAMA_SEKOLAH' => $this->input->post('nama_sekolah'),
				'AGAMA_PTK' => $this->input->post('agama_ptk'),
				'ALAMAT_PTK' => $this->input->post('alamat_ptk'),
				'NOTELP_PTK' => $this->input->post('notelp_ptk'),
				'FOTO_PTK' => $this->input->post('foto_ptk'),
				'NOTELP_SEKOLAH' => $this->input->post('notelp_sekolah')
			);
			$this->db->where('ID_PTK',$id_ptk);
			$this->db->update('MASTER_PTK',$data);
		}


		function doDelete_ptk($id_ptk){
			$this->db->where('ID_PTK',$id_ptk);
			$this->db->delete('MASTER_PTK');
		}

		function getMengajarKelas(){
			// tabel db : mengajar, master_ptk, pengguna
		}

		function getDataPenilaiGuru(){
			// tabel db : mengajar, master_ptk, rombel, master_mapel, master_tahun_ajar
		}

		function getMengajarMapel(){
			//tabel db : mengajar, master_ptk, master_mapel
		}
	}
?>
