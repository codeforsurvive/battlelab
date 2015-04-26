<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//nama class harus sama dengan nama file dan diawali dengan huruf besar
class Welcome extends CI_Controller {

    public function index()
    {
            $this->load->library('session');
            $this->load->helper('url');
            
                $this->load->view('welcome_message');
            
    }

    public function logout(){
        $this->load->library('session');
        $this->load->helper('url');
        $this->session->unset_userdata('login');
        redirect('login','refresh');
    }
}