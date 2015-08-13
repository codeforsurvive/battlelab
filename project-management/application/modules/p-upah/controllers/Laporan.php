<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Laporan extends Implementation_Controller {

    const role_admin = 'laporan_admin';
    const role_viewer = 'laporan_viewer';
    const role_validator = 'laporan_validator';

    private $roles = array();

    public function __construct() {
        parent::__construct();
        $this->load->model('projects/mProject');
        $this->load->model('projects/mMainProject');
        $this->load->model('rab/mRab');
        $this->load->model(array('mOpname', 'mDetailOP'));
        $this->load->model('master/mGudang');
        $this->title = "Laporan";
        $this->roles = json_decode($this->data['role']);
        if ((in_array(Laporan::role_admin, $this->roles) || in_array(Laporan::role_validator, $this->roles) || in_array(Laporan::role_viewer, $this->roles)) == false) {
            echo 'Anda tidak berhak mengakses halaman ini';
            exit(0);
        }
    }

    function index() {
        $this->data['list_main_project'] = $this->mMainProject->getListMainProject();
        $this->display('acLaporan', $this->data);
    }

    function printPDF() {
        $id_rab = (int) $this->input->get('id_rab');
        $jenis_laporan = $this->input->get('jenis_payment');
        $where = "";
        if ($jenis_laporan == 'upah') {
            $where = " and payment.LPU_ID IS NOT NULL AND payment.LPU_ID != 0 ";
        } else if ($jenis_laporan == 'material') {
            $where = " and payment.INVOICE_ID IS NOT NULL AND payment.INVOICE_ID != 0 ";
        }
        $sql = "
select payment.*, invoice.INVOICE_KODE,
lpu.LPU_KODE, coalesce(invoice.INVOICE_KODE,lpu.LPU_KODE) as KODE_X
from payment
left join invoice
on invoice.INVOICE_ID=payment.INVOICE_ID
left join lpu
on lpu.LPU_ID=payment.LPU_ID
where (invoice.RAB_ID='$id_rab' or lpu.RAB_ID='$id_rab') and payment.STATUS_ID=3 $where
		";
        $rab = $this->db->get_where('rab_transaction', array('RAB_ID' => $id_rab))->result_array();
        if (count($rab) > 0) {
            $rab = $rab[0];

            $this->data['rab'] = $rab;
            $this->data['project'] = $this->db->get_where('project', array('PROJECT_ID' => $rab['PROJECT_ID']))->result_array()[0];
            $this->data['main_project'] = $this->db->get_where('main_project', array('MAIN_PROJECT_ID' => $this->data['project']['MAIN_PROJECT_ID']))->result_array()[0];
        }
        $this->data['laporan'] = $this->db->query($sql)->result_array();
        $this->theme_layout = 'html2fpdf';
        $this->header = 'blank';
        $this->footer = 'blank';
        $this->left_sidebar = 'blank';
        $this->right_sidebar = 'blank';
        $this->script_header = 'lay-scripts/header-report';
        $this->script_footer = 'lay-scripts/footer-report';
        $this->display('acLaporanPDF', $this->data);
        $html = $this->output->get_output();
        $this->dompdf->load_html($html);
        $this->dompdf->set_paper('legal', 'landscape');
        $this->dompdf->render();
        $this->dompdf->stream("Laporan " . $rab['RAB_KODE'] . ".pdf", array('Attachment' => 0));
    }

    function get_laporan() {
        $id_rab = (int) $this->input->get('id_rab');
        $jenis_laporan = $this->input->get('jenis_payment');
        $where = "";
        if ($jenis_laporan == 'upah') {
            $where = " and payment.LPU_ID IS NOT NULL AND payment.LPU_ID != 0 ";
        } else if ($jenis_laporan == 'material') {
            $where = " and payment.INVOICE_ID IS NOT NULL AND payment.INVOICE_ID != 0 ";
        }
        $sql = "
select payment.*, invoice.INVOICE_KODE,
lpu.LPU_KODE, coalesce(invoice.INVOICE_KODE,lpu.LPU_KODE) as KODE_X
from payment
left join invoice
on invoice.INVOICE_ID=payment.INVOICE_ID
left join lpu
on lpu.LPU_ID=payment.LPU_ID
where (invoice.RAB_ID='$id_rab' or lpu.RAB_ID='$id_rab') and payment.STATUS_ID=3 $where
		";
        $sql = str_replace("\r\n", ' ', $sql);
        $sql = str_replace("\t", ' ', $sql);
        $rab = $this->db->get_where('rab_transaction', array('RAB_ID' => $id_rab))->result_array();
        if (count($rab) > 0)
            $rab = $rab[0];
        echo json_encode(array('laporan' => $this->db->query($sql)->result_array(), 'rab' => $rab, 'sql' => $sql));
    }

    function get_list_project() {
        echo json_encode($this->mProject->getListSubProject((int) $this->input->get('id_main_project')));
    }

    function get_list_rab() {
        echo json_encode($this->mRab->getListRAB((int) $this->input->get('id_project')));
    }

}
