<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require dirname(__FILE__) . '/AdminController.php';
class Home extends AdminController {
        public function __construct() {
            parent::__construct();
        }
        
	public function index()
	{
			//$this->model_squrity->getSqurity();
			$isi['content']		= 'home/tampilan_home';
			$isi['judul']		= 'Home';
			$isi['sub_judul']	= '';
			$this->load->view('halaman_home',$isi);
			
	}
	public function logout()
	{
	$this->session->sess_destroy();
	redirect('login');
	}
}
