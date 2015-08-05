<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_module extends CI_model {
    
    public function getAll(){
        $this->db->where('flag_active', 1);
        $hasil = $this->db->get('mst_module');
        return $hasil;
    } 

            public function getModule($key="key flag_active=true")
	{
	$this->db->where('id_module',$key);
        $hasil = $this->db->get('mst_module');
        return $hasil;
		}
                public function getUpdate($key,$data)
                {
                    $this->db->where('id_module',$key);
                    $this->db->update('mst_module',$data);
                    
                }
                public function getInsert($data)
                {
                    $this->db->insert('mst_module',$data);
                    return $this->db->insert_id();
                }
		public function getDelete($key)
                {
                 $this->db->where('id_module',$key);
                $hasil = $this->db->get('mst_module');
                
                $data = $hasil->result_array();
                $id = $data[0]['id_module'];
                $update_data = array('flag_active'=>0);
                
                $this->db->update('mst_module',$update_data, array('id_module'=> $id));
                       
                }
	}
	
