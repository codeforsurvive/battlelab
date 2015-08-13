<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * @package		Controller - CIMasterArtcak
 * @author		Felix - Artcak Media Digital
 * @copyright	Copyright (c) 2014
 * @link		http://artcak.com
 * @since		Version 1.0
 * @description
 * Contoh Tampilan administrator dashbard
 */

//dapat diganti extend dengan *contoh Admin_controller / Aplikan_controller di folder core. 
// Nama kelas harus sama dengan nama file php
class Hm extends Implementation_Controller {

    //1. seluruh fungsi yang tidak public, menggunakan awalan '_' , contoh: _getProperty()
    //2. di atas fungsi diberikan penjelasan proses apa yang dilakukan. dari mana ambil data, 
    //inputnya apa dan outputnya apa. contoh di fungsi index()
    //3. Penamaan fungsi harus PUNUK ONTA dengan awalan huruf kecil $ Menggunakan Bahasa Inggris
    //4. Penamaan nama fungsi maksimal 3 kata
    const role_admin = 'hm_admin';
    const role_viewer = 'hm_viewer';
    const role_validator = 'hm_validator';

    private $roles = array();

    public function __construct() {
        parent::__construct();
        $this->load->model('projects/mProject');
        $this->load->model('projects/mMainProject');
        $this->load->model('rab/mRab');
        $this->load->model(array('mStok', 'mHm', 'mBpm', 'mDetailHm'));
        $this->load->model('master/mSupplier');
        $this->title = "Hutang Material";
        $this->roles = json_decode($this->data['role']);
        if ((in_array(Hm::role_admin, $this->roles) || in_array(Hm::role_validator, $this->roles) || in_array(Hm::role_viewer, $this->roles)) == false) {
            echo 'Anda tidak berhak mengakses halaman ini';
            exit(0);
        }
    }

    /*
     * Digunakan untuk menampilkan dashboard di awal. Setiap tampilan view, harap menggunakan fungsi
     * index(). Pembentukan view terdiri atas:
     * 1. Title
     * 2. Set Partial Header
     * 3. Set Partial Right Top Menu
     * 4. Set Partial Left Menu
     * 5. Body
     * 6. Data-data tambahan yang diperlukan
     * Jika tidak di-set, maka otomatis sesuai dengan default
     */

    public function index() {
        redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/home');
        //$this->display('acHm',$this->data);
    }

    public function get_list_hm_datatable() {
        $start = (int) $this->input->post('start');
        $length = (int) $this->input->post('length');
        $draw = (int) $this->input->post('draw');
        $search = $this->input->post('search');
        $order = $this->input->post('order');
        $hasil = $this->mHm->get_list_hm_datatable($start, $length, $order, $search);
        $hasil['draw'] = $draw;
        echo json_encode($hasil);
    }

    function getStokBarang() {
        $idRAB = (int) $this->input->post('id_rab');
        $id_gudang = (int) $this->input->post('id_gudang');
        $draw = (int) $this->input->post('draw');
        $start = (int) $this->input->post('start');
        $length = (int) $this->input->post('length');
        $id_hm = (int) $this->input->post('id_hm');
        $order = $this->input->post('order');
        $search = $this->input->post('search');
        $id_rab_penerima = (int) $this->input->post('id_rab_penerima');
        $hasil = $this->mStok->get_stok_barang_hm_datatable($idRAB, $id_gudang, $id_rab_penerima, $start, $length, $id_hm, $order, $search);
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

    function getListGudang() {
        $id_rab = (int) $this->input->get('id_rab');
        echo json_encode($this->mBpm->getListGudang($id_rab));
    }

    function get_keterangan_validasi() {
        $id = (int) $this->input->get('id');
        $l = $this->db->get_where('hutang_barang', array('HUTANG_BARANG_ID' => $id))->result_array();
        if (count($l) > 0) {
            $obj = $l[0];
            if ($obj['STATUS_ID'] != '3') {
                return;
            }
            $lpengguna = $this->db->get_where('pengguna', array('PENGGUNA_ID' => $obj['VALIDATOR_ID']))->result_array();
            if (count($lpengguna) > 0) {
                $pengguna = $lpengguna[0];
                echo '<span class="fa fa-check"></span> Sudah Divalidasi oleh ' . $pengguna['PENGGUNA_NAMA'] . ' pada ' . $obj['HM_TANGGAL_VALIDASI'];
            }
        }
    }

    public function home() {
        $this->display('acHm', $this->data);
    }

    /*
     * halaman form untuk menambahkan lpb baru
     * hanya untuk admin
     */

    public function viewNew() {
        if ((in_array(Hm::role_admin, $this->roles) ) == false) {
            echo 'Anda tidak berhak mengakses halaman ini';
            exit(0);
        }
        $this->data['listMainProject'] = $this->mMainProject->getListMainProject();
        $this->display('acHmAdd', $this->data);
    }

    /*
     * fungsi menampilkan view untuk mengedit lpb yang masih berstatus sebagai draft
     * fungsi ini hanya untuk admin
     */

    function viewEdit() {
        if ((in_array(Hm::role_admin, $this->roles)) == false) {
            echo 'Anda tidak berhak mengakses halaman ini';
            exit(0);
        }
        $id = (int) $this->input->get('ID_HM');
        $hm = $this->mHm->get1($id);
        if ($hm == null) {
            //redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0));
            var_dump($hm);
        } else {
            $this->data['hm'] = $hm;
            //$this->data['detailHM']=$this->mDetailHm->get_detail_hm($id);
            $this->display('acHmEdit', $this->data);
        }
    }

    function get_detail_hm() {
        $id = (int) $this->input->get('id');
        echo json_encode($this->mDetailHm->get_detail_hm($id));
    }

    public function printPDF() {
        $id = (int) $this->input->get('id');
        $hm = $this->mHm->get1($id);
        if ($hm == null) {
            echo 'id tidak valid';
            exit(0);
        }
        $this->data['hm'] = $hm;
        $this->data['detailHM'] = $this->mDetailHm->get_detail_hm($id);
        $this->theme_layout = 'html2fpdf';
        $this->header = 'blank';
        $this->footer = 'blank';
        $this->left_sidebar = 'blank';
        $this->right_sidebar = 'blank';
        $this->script_header = 'lay-scripts/header-report';
        $this->script_footer = 'lay-scripts/footer-report';
        $this->display('acHmPdf', $this->data);
        $html = $this->output->get_output();
        $this->dompdf->load_html($html);
        $this->dompdf->set_paper('legal', 'landscape');
        $this->dompdf->render();
        $this->dompdf->stream("HM - " . $hm['HUTANG_BARANG_KODE'] . ".pdf", array('Attachment' => 0));
    }

    function viewDetail() {
        $id = (int) $this->input->get('id');
        $hm = $this->mHm->get1($id);
        if ($hm == null) {
            redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0));
        } else {
            $this->data['hm'] = $hm;
            $this->data['detailHM'] = $this->mDetailHm->get_detail_hm($id);
            $this->display('acHmDetail', $this->data);
        }
    }

    /*
     */

    function createNew() {
        if ((in_array(Hm::role_admin, $this->roles)) == false) {
            echo 'Anda tidak berhak mengakses halaman ini';
            exit(0);
        }
        $this->db->trans_begin();
        $flag = (int) $this->input->post('flag');
        $rab_pemberi = (int) $this->input->post('rab_pemberi');
        $rab_penerima = (int) $this->input->post('rab_penerima');
        $gudang_pemberi = (int) $this->input->post('gudang_pemberi');
        $gudang_penerima = (int) $this->input->post('gudang_penerima');
        if ($flag != '2') {
            $flag = 1;
        }
        $tanggal_prediksi_kembali = $this->input->post('tanggal_prediksi_kembali');
        $tanggal_mulai_hutang = $this->input->post('tanggal_mulai_hutang');
        $tanggal_mulai_hutang = $this->input->post('tanggal_mulai_hutang');
        $pj = $this->input->post('hm_penanggung_jawab');
        $mySession = $this->session->userdata('logged_in');
        $id_hm = $this->mHm->_insert(array(
            'PETUGAS_ID' => $mySession['PENGGUNA_ID'],
            'RAB_PENERIMA' => $rab_penerima,
            'RAB_PEMBERI' => $rab_pemberi,
            'GUDANG_PENERIMA' => $gudang_penerima,
            'GUDANG_PEMBERI' => $gudang_pemberi,
            'TANGGAL_MULAI_HUTANG' => $tanggal_mulai_hutang,
            'TANGGAL_PREDIKSI_KEMBALI' => $tanggal_prediksi_kembali,
            'STATUS_ID' => $flag,
            'PJ' => $pj
        ));
        $list_barang = $this->input->post('listBarang');
        $list_volume = $this->input->post('listVolume');
        $j = count($list_volume);
        for ($i = 0; $i < $j; $i++) {
            $barang = (float) $list_barang[$i];
            $volume = (float) $list_volume[$i];
            if ($volume > 0) {
                $this->mDetailHm->_insert(array(
                    'HM_ID' => $id_hm,
                    'BARANG_ID' => $barang,
                    'VOLUME' => $volume
                ));
            }
        }
        $this->db->trans_complete();
        redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/viewDetail?id=' . $id_hm);
    }

    /*
     * fungsi untuk mengedit lpb yang masih berstatus sebagai draft
     * fungsi ini hanya untuk admin
     */

    function edit() {
        if ((in_array(Hm::role_admin, $this->roles)) == false) {
            echo 'Anda tidak berhak mengakses halaman ini';
            exit(0);
        }
        $id = (int) $this->input->post('ID_HM');
        $hm = $this->mHm->get1($id);
        if ($hm == null) {
            redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0));
        } else if (in_array($hm['STATUS_ID'], array(1, 4))) {
            $this->db->trans_begin();
            $flag = (int) $this->input->post('flag');
            if ($hm['STATUS_ID'] == 4) {
                $flag = 5;
            } else {
                if ($flag != '2') {
                    $flag = 1;
                }
            }
            $mySession = $this->session->userdata('logged_in');
            $rab_pemberi = (int) $this->input->post('rab_pemberi');
            $rab_penerima = (int) $this->input->post('rab_penerima');
            $gudang_pemberi = (int) $this->input->post('gudang_pemberi');
            $gudang_penerima = (int) $this->input->post('gudang_penerima');
            $tanggal_prediksi_kembali = $this->input->post('tanggal_prediksi_kembali');
            $tanggal_mulai_hutang = $this->input->post('tanggal_mulai_hutang');
            $pj = $this->input->post('hm_penanggung_jawab');
            $update = array(
                'PETUGAS_ID' => $mySession['PENGGUNA_ID'],
                //'RAB_PENERIMA'=>$rab_penerima,
                //'RAB_PEMBERI'=>$rab_pemberi,
                //'GUDANG_PENERIMA'=>$gudang_penerima,
                //'GUDANG_PEMBERI'=>$gudang_pemberi,
                'TANGGAL_MULAI_HUTANG' => $tanggal_mulai_hutang,
                'TANGGAL_PREDIKSI_KEMBALI' => $tanggal_prediksi_kembali,
                'STATUS_ID' => $flag,
                'PJ' => $pj
            );
            $where = array('HUTANG_BARANG_ID' => $id);
            $this->mHm->_update($update, $where);
            $query_detail = $this->db->get_where('detail_hm', array('HM_ID' => $id))->result_array();
            $list_detail_lama = array();
            $list_detail_lama_terpakai = array();
            foreach ($query_detail as $lama) {
                $list_detail_lama[] = $lama['HM_ID'] . '_' . $lama['BARANG_ID'];
            }
            $list_barang = $this->input->post('listBarang');
            $list_volume = $this->input->post('listVolume');
            $j = count($list_volume);
            for ($i = 0; $i < $j; $i++) {
                $barang = (float) $list_barang[$i];
                $volume = (float) $list_volume[$i];
                if ($volume > 0) {
                    $id_u = $id . '_' . $barang;
                    if (in_array($id_u, $list_detail_lama)) {
                        $list_detail_lama_terpakai[] = $id_u;
                        $this->mDetailHm->_update(array('VOLUME' => $volume), array('HM_ID' => $id, 'BARANG_ID' => $barang));
                    } else {
                        $this->mDetailHm->_insert(array('HM_ID' => $id, 'BARANG_ID' => $barang, 'VOLUME' => $volume));
                    }
                }
            }
            foreach ($list_detail_lama as $lama) {
                if (in_array($lama, $list_detail_lama_terpakai) == false) {
                    $id_u = explode('_', $lama);
                    $this->mDetailHm->_delete(array('HM_ID' => $id_u[0], 'BARANG_ID' => $id_u[1]));
                }
            }
            $this->db->trans_complete();
            redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/viewDetail?id=' . $id);
        } else {
            redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/viewDetail?id=' . $id);
        }
    }

    /*
     * fungsi untuk menghapus draft lpb, fungsi ini hanya untuk admin
     */

    function delete() {
        if ((in_array(Hm::role_admin, $this->roles)) == false) {
            echo 'Anda tidak berhak mengakses halaman ini';
            exit(0);
        }
        $id = (int) $this->input->get('ID_HM');
        $hm = $this->mHm->get1($id);
        if ($hm == null) {
            redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0));
        } else if (in_array($hm['STATUS_ID'], array(1))) {
            $this->db->trans_begin();
            $this->mDetailHm->_delete(array('HM_ID' => $id));
            $this->mHm->_delete(array('HUTANG_BARANG_ID' => $id));
            $this->db->trans_complete();
            redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0));
        } else {
            redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0));
        }
    }

    /*
     * fungsi ini digunakan untuk menolak lpb yang berstatus on validation
     * fungsi ini hanya untuk validator
     */

    function reject() {
        if ((in_array(Hm::role_validator, $this->roles)) == false) {
            echo 'Anda tidak berhak mengakses halaman ini';
            exit(0);
        }
        $id = (int) $this->input->get('ID_HM');
        $hm = $this->mHm->get1($id);
        if ($hm == null) {
            redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0));
        } else if (in_array($hm['STATUS_ID'], array(2, 5))) {
            $this->mHm->_update(array('STATUS_ID' => 4), array('HUTANG_BARANG_ID' => $id));
            redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/viewDetail?id=' . $id);
        } else {
            redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0));
        }
    }

    /*
     * fungsi ini untuk memvalidasi lpb yang berstatus on validation
     * pada saat lpb divalidasi, stok akan diupdate
     * fungsi ini hanya untuk validator
     */

    function validate() {
        if ((in_array(Hm::role_validator, $this->roles)) == false) {
            echo 'Anda tidak berhak mengakses halaman ini';
            exit(0);
        }
        $id = (int) $this->input->get('ID_HM');
        $hm = $this->mHm->get1($id);
        $mySession = $this->session->userdata('logged_in');
        if ($hm == null) {
            echo 'hm is null';
            redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0));
        } else if (in_array($hm['STATUS_ID'], array(2, 5))) {
            $this->db->trans_begin();
            $this->mHm->_update(array('STATUS_ID' => 3, 'VALIDATOR_ID' => $mySession['PENGGUNA_ID'], 'HM_TANGGAL_VALIDASI' => date('y-m-d h:i:s')), array('HUTANG_BARANG_ID' => $id));
            $detailHM = $this->db->get_where('detail_hm', array('HM_ID' => $id))->result_array();
            $all_valid = true;
            foreach ($detailHM as $dhm) {
                if ($this->mStok->stok_barang_keluar($hm['RAB_PEMBERI'], $hm['GUDANG_PEMBERI'], $dhm['BARANG_ID'], $dhm['VOLUME'])) {
                    $this->mStok->stok_barang_masuk($hm['RAB_PENERIMA'], $hm['GUDANG_PENERIMA'], $dhm['BARANG_ID'], $dhm['VOLUME']);
                } else {
                    $all_valid = false;
                }
            }
            if ($all_valid)
                $this->db->trans_complete();
            else
                $this->db->trans_rollback();
            redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/viewDetail?id=' . $id);
        }else {
            echo 'hm status is not ';
            redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0));
        }
    }

    function setujui() {
        if ((in_array(Hm::role_admin, $this->roles)) == false) {
            echo 'Anda tidak berhak mengakses halaman ini';
            exit(0);
        }
        $id = (int) $this->input->get('ID_HM');
        $hm = $this->mHm->get1($id);
        if ($hm == null) {
            redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0));
        } else if ($hm['STATUS_ID'] == '1') {
            $this->mHm->_update(array('STATUS_ID' => 2), array('HUTANG_BARANG_ID' => $id));
            redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/viewDetail?id=' . $id);
        } else {
            redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0));
        }
    }

}
