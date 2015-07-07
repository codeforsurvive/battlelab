<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct() {
        parent::__construct();
        $this->load->library('upload');
    }

    public function index() {
        $this->load->view('welcome_message');
    }

    public function processRequest() {
        $name = $this->input->post('name');
        $number = $this->input->post('reg_number');
        //print_r($_FILES);
        $file = 'file_upload';
        $image = 'image_upload';
        $data = array('name' => $name, 'number' => $number);
        $file_data = $this->uploadFile($file, 'uploads', array('txt'));
        if (!$file_data) {
            $this->load->view('result', array('proccess_result' => array('class' => 'panel-danger', 'title' => 'Error!', 'message' => 'Upload Failed')));
        } else {

            $uploaded = $file_data['upload_data']['full_path'];
            $data['file'] = file_get_contents($uploaded);
        }

        $image_data = $this->uploadFile($image, 'uploads', array('png', 'jpg', 'jpeg', 'gif', 'bmp'));
        //var_dump($image_data);
        if (!$image_data) {
            //$this->load->view('result', array('proccess_result' => array('class' => 'panel-danger', 'title' => 'Error!', 'message' => 'Upload Failed')));
            $data['image'] = UPLOAD . 'default.png';
        } else {

            $uploaded = UPLOAD . $image_data['upload_data']['file_name'];
            $data['image'] = $uploaded;
        }

        $barcode = new TCPDFBarcode($number, 'C128');
        $data['barcode'] = $barcode->getBarcodeHTML();

        //$template = $this->createTemplate($data);
        //echo $template;
        //print_r(file_get_contents(URL));

        //$this->generatePdf($template);

        $this->load->view("pdf_template", array('data' => $data));
    }

    public function viewPdfPage() {
        $this->load->view('pdf_template');
    }

    public function createTemplate($data = array()) {
        $html = "<table id='main_form' style='font: \"Calibri\"; font-size: 16px'>
                    <tr>
                        <td style='width: 30%;'>&nbsp;</td>
                        <td style='width: 30%;'></td>
                        <td style='width: 10%' rowspan='3'></td>
                        <td style='background-color: #0099ff; padding: 25px; height: 275px; background: white; height: 100%; text-align= center' rowspan='3'>
                            <table style='width: 100%'>
                                <tr>
                                    <td style='text-align: center' align='center'>
                                        <img src='{$data['image']}' title='picture' alt='picture' height='250px' />
                                    </td>
                                </tr>
                                <tr>
                                    <td style='text-align: center' align='center'>
                                        {$data['barcode']}
                                    </td>
                                </tr>
                                <tr>
                                    <td style='text-align: center' align='center'>
                                        {$data['number']}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style='text-align: right; height: 25px'>Nama        :</td>
                        <td>{$data['name']}</td>
                    </tr>
                    <tr>
                        <td style='text-align: right; height: 25px'>Nomor Induk        :</td>
                        <td>{$data['number']}</td>
                    </tr>
                    <tr>
                        <td colspan='4' style='padding: 10px; background-color: #cccccc; padding: 15px; height: 100%; width: 100%;'>
                                {$data['file']}
                        </td>
                    </tr>
                </table>";

        return $html;
    }

    public function generatePdf($html = '') {
        $this->load->helper('custom_helper');
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        $pdf = setpdf_info($pdf, 'Rohmad Raharjo', 'Test PDF Document', 'Export PDF');
        $pdf = setpdf_headers_default($pdf);

        // add a page
        $pdf->AddPage();

        $pdf->writeHTMLCell(0,0,0,0, $html);
        $pdf->Ln();

        //$pdf->write1DBarcode('CODE 128 AUTO', 'C128', '', '', '', 18, 0.4, $style, 'N');
        $pdf->lastPage();
        // ---------------------------------------------------------
        //Close and output PDF document
        $pdf->Output('profile.pdf', 'I');
    }

    /**
     * 
     * @param String $form_data
     * @param String $path
     * @param Array $allowed_types; e.g array('jpg, png, gif, bmp, txt')
     */
    private function uploadFile($form_data, $path, $allowed_types = array()) {
        $config = $this->defaultUploadConfig();

        $config['upload_path'] = "./{$path}/";
        if (sizeof($allowed_types) > 0) {
            $config['allowed_types'] = implode("|", $allowed_types);
        }


        $this->upload->initialize($config);
        if (!$this->upload->do_upload($form_data)) {
            $error = array('error' => $this->upload->display_errors());
            return FALSE;
            //$this->load->view('upload_form', $error);
        } else {
            $data = array('upload_data' => $this->upload->data());
            return $data;
        }
    }

    private function defaultUploadConfig() {
        $config = array(
            'allowed_types' => 'jpg|gif|png|bmp|doc|pdf|xml|txt',
            'max_size' => 1024 * 8,
            'encrypt_name' => TRUE,
            'overwrite' => TRUE
        );

        return $config;
    }

}
