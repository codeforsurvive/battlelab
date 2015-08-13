<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Payment extends Implementation_Controller {

    const role_admin = 'payment_admin';
    const role_viewer = 'payment_viewer';
    const role_validator = 'payment_validator';

    private $roles = '';

    public function __construct() {
        parent::__construct();
        $this->load->model(array('projects/mProject', 'mPayment', 'projects/mMainProject', 'rab/mRab', 'master/mSupplier', 'master/mTop', 'mInvoice','p-upah/mDetailLpu'));
        $this->title = "Payment";
        $this->roles = json_decode($this->data['role']);
        if ((in_array(Payment::role_admin, $this->roles) || in_array(Payment::role_validator, $this->roles) || in_array(Payment::role_viewer, $this->roles)) == false) {
            redirect(base_url().'projects/project');
            exit(0);
        }
    }

    public function index() {
        redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/home');
    }

    public function home() {
        
        $this->display('acPayment', $this->data);
    }

    public function viewEdit() {
        if ((in_array(Payment::role_admin, $this->roles) ) == false) {
            redirect(base_url() . 'p-material/payment');
            exit(0);
        }
        $id = (int) $this->input->get('payment_id');
        $payment = $this->mPayment->get1($id);
        if ($payment == null) {
            $this->session->set_flashdata("Tidak ditemukan data Payment!");
            redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/viewDetail?id=' . $id);
        } else if ($payment['STATUS_ID'] == 1 || $payment['STATUS_ID'] == '4') {
            $this->data['payment'] = $payment;
            $this->data['listMainProject'] = $this->mMainProject->getListMainProject();
            $my_rab = $this->db->get_where('rab_transaction', array('RAB_ID' => $payment['RAB_ID']))->result_array()[0];
            $this->data['list_rab'] = $this->db->order_by('RAB_ID', 'DESC')->get_where('rab_transaction', array('PROJECT_ID' => $my_rab['PROJECT_ID']))->result_array();
            $this->data['my_rab'] = $my_rab;
            //print_r($payment);
            $my_project = $this->db->get_where('project', array('PROJECT_ID' => $my_rab['PROJECT_ID']))->result_array()[0];
            $this->data['list_project'] = $this->db->order_by('PROJECT_ID', 'DESC')->get_where('project', array('MAIN_PROJECT_ID' => $my_project['MAIN_PROJECT_ID']))->result_array();
            $this->data['my_project'] = $my_project;
            $this->data['list_supplier'] = $this->db->order_by('SUPPLIER_ID', 'DESC')->get('master_supplier')->result_array();
            if ((int) $payment['INVOICE_ID'] > 0) {
                //$this->data['dpayment']=$this->mPayment->get_detail_invoice($payment['INVOICE_ID']);
            } else if ((int) $payment['LPU_ID'] > 0) {
                //$this->data['dpayment']=$this->mPayment->get_detail_lpu($payment['LPU_ID']);
            }
            $this->display('acPaymentEdit', $this->data);
        } else {
            redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/viewDetail?id=' . $id);
        }
    }

    function createNew() {
        if ((in_array(Payment::role_admin, $this->roles) ) == false) {
            redirect(base_url() . 'p-material/payment');
            exit(0);
        }
        $flag = (int) $this->input->post('flag');
        $id_invoice = (int) $this->input->post('id_invoice');
        if ($flag != '2') {
            $flag = 1;
        }
        $mySession = $this->session->userdata('logged_in');
        $this->db->trans_begin();
        $total = 0;
        $jenis_payment = $this->input->post('jenis_payment');
        if ($jenis_payment == 'upah') {
            $id_lpu = (int) $this->input->post('id_lpu');
            $detail_lpu = $this->mPayment->get_detail_lpu($id_lpu);
            foreach ($detail_lpu as $dlpu) {
                $harga = $dlpu['VOLUME'] * $dlpu['HARGA_OPNAME'];
                if ($dlpu['KATEGORI_PAJAK_ID'] == 2) {
                    $harga = $harga * (100 + $dlpu['PAJAK_VALUE']) / 100;
                }
                $total+=$harga;
            }
            $id = $this->mPayment->_insert(
                    array(
                        'PETUGAS_ID' => $mySession['PENGGUNA_ID'],
                        'STATUS_ID' => $flag,
                        'LPU_ID' => $id_lpu,
                        'HARGA' => $total
            ));
        } else {
            $invoices = $this->mPayment->get_detail_invoice($id_invoice);
            foreach ($invoices as $d) {
                $harga = $d['BARANG_HARGA_SATUAN'] * $d['VOLUME_LPB'];
                $diskon1 = $d['DISKON1'] * $harga / 100;
                $harga = $harga - $diskon1;
                $diskon2 = $d['DISKON2'] * $harga / 100;
                $harga = $harga - $diskon2;
                $diskon3 = $d['DISKON3'] * $harga / 100;
                $pajak = 0;
                $harga = $harga - $diskon3;
                if ($d['KATEGORI_PAJAK_ID'] == 1) {
                    //$pajak=$d['PAJAK_VALUE']*$harga/(100+$d['PAJAK_VALUE']);
                } else if ($d['KATEGORI_PAJAK_ID'] == 2) {
                    $pajak = $d['PAJAK_VALUE'] * $harga / (100);
                    $harga = $harga + $pajak;
                } else if ($d['KATEGORI_PAJAK_ID'] == 3) {
                    
                }
                //$harga_total+=$harga;
                $total+=$harga;
            }
            $id = $this->mPayment->_insert(
                    array(
                        'PETUGAS_ID' => $mySession['PENGGUNA_ID'],
                        'STATUS_ID' => $flag,
                        'INVOICE_ID' => $id_invoice,
                        //'TOP' => $top,
                        'HARGA' => $total
            ));
        }
        $this->db->trans_complete();
        redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/viewDetail?id=' . $id);
    }

    function edit() {
        if ((in_array(Payment::role_admin, $this->roles) ) == false) {
            redirect(base_url().'p-material/payment');
            exit(0);
        }
        $flag = (int) $this->input->post('flag');
        $id_invoice = (int) $this->input->post('id_invoice');
        $id_payment = (int) $this->input->post('id_payment');
        $payment = $this->mPayment->get1($id_payment);
        if ($payment == null) {
            redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/viewDetail?id=' . $id);
        } else if ($payment['STATUS_ID'] == 1 || $payment['STATUS_ID'] == '4') {
            if ($payment['STATUS_ID'] == 1) {
                if ($flag != '2') {
                    $flag = 1;
                }
            } else if ($payment['STATUS_ID'] == 4)
                $flag = 5;
            $mySession = $this->session->userdata('logged_in');
            $this->db->trans_begin();
            $total = 0;
            $jenis_payment = $this->input->post('jenis_payment');
            if ($jenis_payment == 'upah') {
                $id_lpu = (int) $this->input->post('id_lpu');
                $detail_lpu = $this->mPayment->get_detail_lpu($id_lpu);
                foreach ($detail_lpu as $dlpu) {
                    $harga = $dlpu['VOLUME'] * $dlpu['HARGA_OPNAME'];
                    if ($dlpu['KATEGORI_PAJAK_ID'] == 2) {
                        $harga = $harga * (100 + $dlpu['PAJAK_VALUE']) / 100;
                    }
                    $total+=$harga;
                }
//                $id = $this->mPayment->_update(
//                        array(
//                    'PETUGAS_ID' => $mySession['PENGGUNA_ID'],
//                    'STATUS_ID' => $flag,
//                    'LPU_ID' => $id_lpu,
//                    'HARGA' => $total
//                        ), array(
//                    'PAYMENT_ID' => $id_payment
//                ));
                $this->db->query("update payment set PETUGAS_ID='" . $mySession['PENGGUNA_ID'] . "', STATUS_ID='$flag',LPU_ID='$id_lpu',INVOICE_ID=NULL,HARGA='$total' where PAYMENT_ID='$id_payment'");
                $this->mPayment->save_log('update', array('PETUGAS_ID'=>$mySession['PENGGUNA_ID'],'STATUS_ID'=>$flag,'INVOICE_ID'=>'NULL','LPU_ID'=>$id_lpu,'HARGA'=>$total), array('PAYMENT_ID'=>$id_payment));
            } else {
                $invoices = $this->mPayment->get_detail_invoice($id_invoice);
                foreach ($invoices as $d) {
                    $harga = $d['BARANG_HARGA_SATUAN'] * $d['VOLUME_LPB'];
                    $diskon1 = $d['DISKON1'] * $harga / 100;
                    $harga = $harga - $diskon1;
                    $diskon2 = $d['DISKON2'] * $harga / 100;
                    $harga = $harga - $diskon2;
                    $diskon3 = $d['DISKON3'] * $harga / 100;
                    $pajak = 0;
                    $harga = $harga - $diskon3;
                    if ($d['KATEGORI_PAJAK_ID'] == 1) {
                        //$pajak=$d['PAJAK_VALUE']*$harga/(100+$d['PAJAK_VALUE']);
                    } else if ($d['KATEGORI_PAJAK_ID'] == 2) {
                        $pajak = $d['PAJAK_VALUE'] * $harga / (100);
                        $harga = $harga + $pajak;
                    } else if ($d['KATEGORI_PAJAK_ID'] == 3) {
                        
                    }
                    //$harga_total+=$harga;
                    $total+=$harga;
                }
//                $id = $this->mPayment->_update(
//                        array(
//                    'PETUGAS_ID' => $mySession['PENGGUNA_ID'],
//                    'STATUS_ID' => $flag,
//                    'INVOICE_ID' => $id_invoice,
//                    'TOP' => $top,
//                    'HARGA' => $total
//                        ), array(
//                    'PAYMENT_ID' => $id_payment
//                ));
                $this->db->query("update payment set PETUGAS_ID='" . $mySession['PENGGUNA_ID'] . "', STATUS_ID='$flag',INVOICE_ID='$id_invoice',LPU_ID=NULL,HARGA='$total' where PAYMENT_ID='$id_payment'");
                $this->mPayment->save_log('update', array('PETUGAS_ID'=>$mySession['PENGGUNA_ID'],'STATUS_ID'=>$flag,'INVOICE_ID'=>$id_invoice,'LPU_ID'=>'NULL','HARGA'=>$total), array('PAYMENT_ID'=>$id_payment));
            }

            $this->db->trans_complete();
            redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/viewDetail?id=' . $id_payment);
        } else {
            redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/viewDetail?id=' . $id_payment);
        }
    }

    public function printPDF() {
        $id = (int) $this->input->get('id');
        $pym = $this->mPayment->get1($id);
        if ($pym == null) {
            echo 'id tidak valid';
            exit(0);
        }
        $this->data['pym'] = $pym;
        if ((int) $pym['INVOICE_ID'] > 0)
            $this->data['detail'] = $this->mPayment->get_detail_invoice($pym['INVOICE_ID']);
        else if ((int) $pym['LPU_ID'] > 0)
            $this->data['detail'] = $this->mPayment->get_detail_lpu($pym['LPU_ID']);
        $this->theme_layout = 'html2fpdf';
        $this->header = 'blank';
        $this->footer = 'blank';
        $this->left_sidebar = 'blank';
        $this->right_sidebar = 'blank';
        $this->script_header = 'lay-scripts/header-report';
        $this->script_footer = 'lay-scripts/footer-report';
        $this->display('acPaymentPdf', $this->data);
        $html = $this->output->get_output();
        $this->dompdf->load_html($html);
        $this->dompdf->set_paper('legal', 'landscape');
        $this->dompdf->render();
        $this->dompdf->stream("PAYMENT - " . $pym['INVOICE_KODE'] . ".pdf", array('Attachment' => 0));
    }

    function viewDetail() {
        $id = (int) $this->input->get('id');
        $pym = $this->mPayment->get1($id);
        if ($pym == null) {
            $this->session->set_flashdata("Tidak ditemukan data Payment!");
            redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0));
        } else {
            $this->data['pym'] = $pym;
            if ((int) $pym['INVOICE_ID'] > 0)
                $this->data['detail'] = $this->mPayment->get_detail_invoice($pym['INVOICE_ID']);
            else if ((int) $pym['LPU_ID'] > 0)
                $this->data['detail'] = $this->mPayment->get_detail_lpu($pym['LPU_ID']);
            $this->display('acPaymentDetail', $this->data);
        }
    }

    public function viewNew() {
        if ((in_array(Payment::role_admin, $this->roles) ) == false) {
            redirect(base_url().'p-material/payment');
            exit(0);
        }
        $this->data['listMainProject'] = $this->mMainProject->getListMainProject();
        $this->data['listTop'] = $this->db->order_by('TOP_ID', 'ASC')->select("TOP_ID, COALESCE(TOP_KODE,TOP_DESCRIPTION,TOP_VALUE) AS TOP_KODE", false)->get_where('top', array('TOP_ACTIVE' => 1))->result_array();
        $this->display('acPaymentAdd', $this->data);
    }

    function delete() {
        if ((in_array(Payment::role_admin, $this->roles) ) == false) {
            redirect(base_url().'p-material/payment');
            exit(0);
        }
        $id = (int) $this->input->get('payment_id');
        $pym = $this->mPayment->get1($id);
        if ($pym == null) {
            redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0));
        } else if ($pym['STATUS_ID'] == '1') {
            $this->mPayment->_delete(array('PAYMENT_ID' => $id));
            redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0));
        } else {
            redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/viewDetail?id=' . $id);
        }
    }

    function setujui() {
        if ((in_array(Payment::role_admin, $this->roles) ) == false) {
            redirect(base_url().'p-material/payment');
            exit(0);
        }
        $id = (int) $this->input->get('payment_id');
        $pym = $this->mPayment->get1($id);
        if ($pym == null) {
            redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0));
        } else if (in_array($pym['STATUS_ID'], array(1))) {
            $this->mPayment->_update(array('STATUS_ID' => 2), array('PAYMENT_ID' => $id));
            redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/viewDetail?id=' . $id);
        } else {
            redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/viewDetail?id=' . $id);
        }
    }

    function validate() {
        if ((in_array(Payment::role_validator, $this->roles) ) == false) {
            redirect(base_url().'p-material/payment');
            exit(0);
        }
        $id = (int) $this->input->get('payment_id');
        $pym = $this->mPayment->get1($id);
        $my = $this->session->userdata('logged_in');
        if ($pym == null) {
            redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0));
        } else if (in_array($pym['STATUS_ID'], array(2, 5))) {
            $this->mPayment->_update(array('STATUS_ID' => 3, 'TANGGAL_VALIDASI' => date('y-m-d h:i:s'), 'VALIDATOR_ID' => $my['PENGGUNA_ID']), array('PAYMENT_ID' => $id));
            redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/viewDetail?id=' . $id);
        } else {
            redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/viewDetail?id=' . $id);
        }
    }

    function reject() {
        if (( in_array(Payment::role_validator, $this->roles) ) == false) {
            redirect(base_url().'p-material/payment');
            exit(0);
        }
        $id = (int) $this->input->get('payment_id');
        $pym = $this->mPayment->get1($id);
        if ($pym == null) {
            redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0));
        } else if (in_array($pym['STATUS_ID'], array(2, 5))) {
            $this->mPayment->_update(array('STATUS_ID' => 4), array('PAYMENT_ID' => $id));
            redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/viewDetail?id=' . $id);
        } else {
            redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/viewDetail?id=' . $id);
        }
    }

    public function get_list_payment_datatable() {
        $start = (int) $this->input->post('start');
        $length = (int) $this->input->post('length');
        $draw = (int) $this->input->post('draw');
        $hasil = $this->mPayment->get_list_payment_datatable($start, $length);
        $hasil['draw'] = $draw;
        echo json_encode($hasil);
    }

    function getListSubProject() {
        $idMainProject = (int) $this->input->get('idMainProject');
        $subProject = $this->mProject->getListSubProject($idMainProject);
        echo json_encode($subProject);
    }

    function getListRAB() {
        $idProject = (int) $this->input->get('idProject');
        $listRAB = $this->mRab->getListRAB($idProject);
        echo json_encode($listRAB);
    }

    function getListSupplier() {
        $id_rab = (int) $this->input->get('id_rab');
        echo json_encode($this->mSupplier->getListSupplier_forPayment($id_rab));
    }

    function get_list_lpu_datatable() {
        $id_rab = (int) $this->input->post('id_rab');
        $start = (int) $this->input->post('start');
        $length = (int) $this->input->post('length');
        $draw = (int) $this->input->post('draw');
        $hasil = $this->mPayment->get_list_lpu_datatable($id_rab, $start, $length);
        $hasil['draw'] = $draw;
        echo json_encode($hasil);
    }

    function get_list_invoice_datatable() {
        //get_list_invoice_datatable($id_supplier, $id_rab, $start,$length)
        $id_supplier = (int) $this->input->post('id_supplier');
        $id_rab = (int) $this->input->post('id_rab');
        $start = (int) $this->input->post('start');
        $length = (int) $this->input->post('length');
        $draw = (int) $this->input->post('draw');
        $order=$this->input->post('order');
        $search=$this->input->post('search');
        $hasil = $this->mPayment->get_list_invoice_datatable($id_supplier, $id_rab, $start, $length,$order,$search);
        $hasil['draw'] = $draw;
        echo json_encode($hasil);
    }

    function req_detail_payment() {
        $payment_id = (int) $this->input->get('payment_id');
        $payment = $this->mPayment->get1($payment_id);
        if ((int) $payment['INVOICE_ID'] > 0) {
            echo json_encode(array('detail' => $this->mPayment->get_detail_invoice((int) $payment['INVOICE_ID']), 'jenis_payment' => 'material'));
        } else if ((int) $payment['LPU_ID'] > 0) {
            echo json_encode(array('detail' => $this->mPayment->get_detail_lpu((int) $payment['LPU_ID']), 'jenis_payment' => 'upah'));
        }
    }

    function req_detail_invoice() {
        $id_invoice = (int) $this->input->get('id_invoice');
        echo json_encode($this->mPayment->get_detail_invoice($id_invoice));
    }

    function req_detail_lpu() {
        echo json_encode($this->mPayment->get_detail_lpu((int) $this->input->get('id_lpu')));
        //echo json_encode($this->mDetailLpu->getDetailLpu((int) $this->input->get('id_lpu')));
    }

    function get_keterangan_validasi() {
        $id = (int) $this->input->get('id');
        $l = $this->db->get_where('payment', array('PAYMENT_ID' => $id))->result_array();
        if (count($l) > 0) {
            $obj = $l[0];
            if ($obj['STATUS_ID'] != '3') {
                return;
            }
            $lpengguna = $this->db->get_where('pengguna', array('PENGGUNA_ID' => $obj['VALIDATOR_ID']))->result_array();
            if (count($lpengguna) > 0) {
                $pengguna = $lpengguna[0];
                echo '<span class="fa fa-check"></span> Sudah Divalidasi oleh ' . $pengguna['PENGGUNA_NAMA'] . ' pada ' . $obj['TANGGAL_VALIDASI'];
            }
        }
    }

}
