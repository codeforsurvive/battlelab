<?php
class MChain extends CI_Model{
	public function __construct(){
		$this->load->database();
	}
	
	function getMapelList(){
		
		$result = array();
		$this->db->select('ID_MASTER_PENILAIAN', 'INDIKATOR_PENILAIAN');
		$this->db->from('master_indikator_penilaian');
		$this->db->where('LEVEL_INDIKATOR', 1);
		$this->db->order_by('ID_MASTER_PENILAIAN','ASC');
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '-Pilih Mata Pelajaran-';
            $result[$row->ID_MASTER_PENILAIAN]= $row->INDIKATOR_PENILAIAN;
        }
        
        return $result;
	}

	function getKotaList(){
		$propinsi_id = $this->input->post('propinsi_id');
		$result = array();
		$this->db->select('*');
		$this->db->from('kota_kabupaten');
		$this->db->where('propinsi_id',$propinsi_id);
		$this->db->order_by('kota_kabupaten','ASC');
		$array_keys_values = $this->db->get();
        foreach ($array_keys_values->result() as $row)
        {
            $result[0]= '-Pilih Kota / Kabupaten-';
            $result[$row->kota_id]= $row->kota_kabupaten;
        }
        
        return $result;
	}

}
?>
