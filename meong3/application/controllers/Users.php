<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller 
{
    public $id_pengguna;
    public $username;
    public $akses_level ; 

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('html');
        $this->load->database();
        //load the login model
        $this->load->model('m_pengguna');

        $this->id_pengguna = $this->session->userdata('ID_PENGGUNA');
        $this->username = $this->session->userdata('USERNAME');
        $this->akses_level = $this->session->userdata('AKSES_LEVEL');
    }

    public function index() {
        $this->load->helper(array('form'));
        $this->load->view('welcome_message');
    }

    public function getAll_pengguna(){
        $this->load->model('m_pengguna');
        $data['judul'] = 'Daftar Pengguna';
        $data['daftar'] = $this->m_pengguna->_getAll();
        $this->load->view('v_daftar_pengguna', $data);
    }

    public function insert() {
        $data['judul'] = 'Data Pengguna [Tambah]';
        $this->load->view('v_pengguna_add', $data);
    }

    public function doInsert() {
        $this->load->model('m_pengguna','',TRUE);
        $this->m_pengguna->doInsert();
        redirect('users/index');
    }

    public function edit($id_pengguna) {
        $data['judul'] = 'Data Pengguna [Edit]';
        $data['daftar'] = $this->m_pengguna->edit($id_pengguna);
        $this->load->view('v_pengguna_edit',$data);
    }

    public function doEdit() {
        $this->load->model('m_pengguna','',TRUE);
        $this->m_pengguna->doEdit();
        redirect('users/index');
    }

    public function doDelete($id_pengguna) {
        $this->load->model('m_pengguna','',TRUE);
        $this->m_pengguna->doDelete($id_pengguna);
        redirect('users/index');
    }

    public function login(){

        $this->load->library('form_validation');
        //get the posted values
        $username = $this->input->post("username");
        $password = $this->input->post("password");


        //set validations
        $this->form_validation->set_rules("username", "USERNAME", "trim|required");
        $this->form_validation->set_rules("password", "PASSWORD", "trim|required");

        if ($this->form_validation->run() == FALSE)
        {
            //validation fails
            $this->load->view('welcome_message');
        }
        else
        {
            //Field validation succeeded.  Validate against database
            if ($this->input->post('btn_login'))
            {
                //check database
                $usr_result = $this->m_pengguna->get_user($username, $password);
                $ID_PENGGUNA =$usr_result[0]->ID_PENGGUNA;
                $USERNAME =$usr_result[0]->USERNAME;
                $AKSES_LEVEL =$usr_result[0]->AKSES_LEVEL;

                //var_dump($usr_result);

                if (count($usr_result) > 0) //active user record is present
                {
                    //set the session variables
                    $sess_array = array(
                        'ID_PENGGUNA' => $ID_PENGGUNA,
                        'USERNAME' => $USERNAME,
                        'AKSES_LEVEL'=> $AKSES_LEVEL
                    );
                    $data = $sess_array;
                    $this->session->set_userdata($sess_array);
                    
                    if ($this->input->post('btn_login') == 'Login Siswa' and $AKSES_LEVEL == 'siswa') {
                        redirect('pesertadidik/');
                    } elseif ($this->input->post('btn_login') == 'Login Guru' and $AKSES_LEVEL == 'guru mata pelajaran') {
                        redirect('ptk/berandaGuru');
                    } elseif ($this->input->post('btn_login') == 'Login Guru' and $AKSES_LEVEL == 'wali kelas') {
                       redirect('ptk/berandaWaliKelas');
                    } elseif ($this->input->post('btn_login') == 'Login Sekolah' and $AKSES_LEVEL == 'Kepala Sekolah') {
                       redirect('ptk/berandaKepalaSekolah');
                    }elseif ($this->input->post('btn_login') == 'Login Sekolah' and $AKSES_LEVEL == 'Administrasi Sekolah') {
                       redirect('ptk/berandaAdminSekolah');
                    }elseif ($this->input->post('btn_login') == 'Login Orang Tua' and $AKSES_LEVEL == ('orang tua' || 'wali siswa')) {
                       // redirect('orangtuasiswa/');
                    }elseif ($this->input->post('btn_login') == 'Login' and $AKSES_LEVEL == 'dinas pendidikan') {
                        redirect('users/DinasPendidikan');
                    }
                    
                }
                else
                {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Invalid username and password!</div>');
                    redirect('users/login');

                }
            }
            else
            {
               redirect('users/login');
            }
        }
    }

    public function logout() {
        //remove all session data
        $this->session->sess_destroy();
        redirect(('users/index'), 'refresh');
     }

    /* login user */
    public function DinasPendidikan() {
        $this->load->view('dispendik/header');
        $dataDinas= $this->m_pengguna->getDataDinas($this->username);
        $this->load->view('dispendik/beranda', $dataDinas);
        $this->load->view('dispendik/footer');
    }

    public function LoginAdmin(){
        $this->load->view('admin/login');
    }

    
}
?>

