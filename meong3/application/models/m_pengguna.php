<?php
	class M_pengguna extends CI_Model {

		public function __construct() {
			$this->load->database();
		}

		public function getDataDinas($username){
			$query=$this->db->query("SELECT `ID_PENGGUNA`, `USERNAME`, `AKSES_LEVEL`, `PASSWORD`, `ASAL_KOTA` 
									FROM `pengguna`
									WHERE `USERNAME` = '$username' ");
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

		function _getAll() {
			$query=$this->db->query("select * from pengguna order by id_pengguna asc");
			return $query->result();
		}

		function doInsert_pengguna() {
			$data = array(
				'USERNAME' => $this->input->post('username'),
				'AKSES_LEVEL' => $this->input->post('akses_level'),
				'PASSWORD' => $this->input->post('password')
			);
			return $this->db->insert('PENGGUNA', $data);
		}

		function edit_pengguna($id_pengguna) {
				$this->db->where('ID_PENGGUNA',$id_pengguna);
				$query = $this->db->get('PENGGUNA');
				if($query ->num_rows > 0)
			return $query;
			else
			return null;
		}

		function doEdit_pengguna() {
			$id_pengguna = $this->input->post('id_pengguna');
			$data = array (
			'USERNAME' => $this->input->post('username'),
			'AKSES_LEVEL' => $this->input->post('akses_level'),
			'PASSWORD' => $this->input->post('password')
			);
			$this->db->where('ID_PENGGUNA',$id_pengguna);
			$this->db->update('PENGGUNA',$data);
		}


		function doDelete_pengguna($id_pengguna){
			$this->db->where('ID_PENGGUNA',$id_pengguna);
			$this->db->delete('PENGGUNA');
		}

		function get_user($username, $password)
     	{
        	$this->db->select('ID_PENGGUNA, USERNAME, AKSES_LEVEL');
			$this->db->from('PENGGUNA');
			$this->db->where('USERNAME', $username);
		   	$this->db->where('PASSWORD', $password);
		   	$this->db->limit(1); 
		 
		   	$query = $this ->db->get();
		 
		   	if($query -> num_rows() == 1)
		   	{
		    	return $query->result();
		   	}
		   	else
		   	{
		     	return false;
		   	}
     	}

     	function get_hak_akses($username, $password){
     		$this->db->select('AKSES_LEVEL');
	        $this->db->from('PENGGUNA');
	        $this->db->where('USERNAME', $username);
		   	$this->db->where('PASSWORD', $password);

	        $query = $this->db->get();
			$result = $query->row_array();

			if(count($result) > 0)
			{
				return $query->row_array();
			}
			else
			{
				return false;
			}
	    }
	}
?>
