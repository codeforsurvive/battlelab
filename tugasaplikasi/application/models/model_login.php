<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

class Model_login extends CI_model {
	public function getLogin($u,$p,$a)
	{
            $this->db->where("email",$u);
            $this->db->where("password",$p);
            $query=$this->db->get("mst_member");
            if($query->num_rows()>0)
            {
                foreach ($query->result() as $row)
                {
                $tess = array(
                    "id_member"=>$row->id_member,
                    "email" =>$row->email,
                    "password" =>$row->password,
                    "nama" =>$row->nama,
                    "is_admin" =>$row->is_admin,
                    "telepon" => $row->telp
                        
                        );
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
	

