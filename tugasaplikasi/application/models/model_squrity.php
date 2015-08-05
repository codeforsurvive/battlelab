<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_squrity extends CI_model {

    public function getSqurity() {
        $email = $this->session->userdata('email');
        $nama = $this->session->userdata('nama');
        if (empty($email)) {
            $this->session->sess_destroy();
            redirect('login');
        }
    }

}
