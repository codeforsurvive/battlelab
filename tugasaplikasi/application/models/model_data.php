<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

class Model_Data extends CI_model {
	public function getData($u,$p,$t)
	{
            $this->db->where("email",$u);
            $this->db->where("password",$p);
            $query=$this->db->get("mst_admin");
            if($query->num_rows()>0)
            {
                foreach ($query->result() as $row)
                {
                $tess = array("id_admin"=>$row->id_admin,"email" =>$row->email,"password" =>$row->password,"nama_admin" =>$row->nama_admin);
                $this->session->set_userdata($tess);
                redirect("home");
                }
            }
            else
            {
                $this->session->set_flashdata('info',"The email and password you entered did not match. Please try again <br>");
                redirect("login");
            }
         }
        
        }
	

