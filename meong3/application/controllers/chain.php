<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Chain extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('MChain');
		$this->load->helper('form');
	}
	
	function index(){		
		$data['option_mapel'] = $this->MChain->getMapelList();
		$this->load->view('siswa/index',$data);
	}
	
	function select_aspek(){
            if('IS_AJAX') {
        	$data['option_aspek'] = $this->MChain->getAspekList();		
		$this->load->view('siswa/aspek',$data);
            }
		
	}
        
        function submit(){
            echo "Mapel ID = ".$this->input->post("ID_MASTER_PENILAIAN");
            echo "<br>";
            echo "Aspek ID = ".$this->input->post("ID_MASTER_PENILAIAN");
        }
}
?>
