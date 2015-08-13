<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pm extends Implementation_Controller {

    const role_admin = 'hm_admin';
    const role_viewer = 'hm_viewer';
    const role_validator = 'hm_validator';

    private $roles = array();

    public function __construct() {
        parent::__construct();
        $this->load->model('projects/mProject');
        $this->load->model('projects/mMainProject');
        $this->load->model(array('mStok', 'mPm', 'mDetailPm', 'rab/mRab', 'mBpm', 'mDetailHm'));
        $this->load->model('master/mSupplier');
        $this->title = "Pengembalian Material";
        $this->roles = json_decode($this->data['role']);
        if ((in_array(Pm::role_admin, $this->roles) || in_array(Pm::role_validator, $this->roles) || in_array(Pm::role_viewer, $this->roles)) == false) {
            echo 'Anda tidak berhak mengakses halaman ini';
            exit(0);
        }
    }

    public function index() {
        redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/home');
    }

    function get_list_pm_datatable() {
        $start = (int) $this->input->post('start');
        $length = (int) $this->input->post('length');
        $draw = (int) $this->input->post('draw');
        $hasil = $this->mPm->get_list_pm_datatable($start, $length);
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

    function getListHm() {
        $id_gudang = (int) $this->input->get('id_gudang');
        $id_rab = (int) $this->input->get('id_rab');
        $hasil = $this->db->get_where('hutang_barang', array('RAB_PENERIMA' => $id_rab, 'GUDANG_PENERIMA' => $id_gudang));
        $hasil = $hasil->result_array();
        echo json_encode($hasil);
    }

    function getDetailHutangMaterial() {
        $start = (int) $this->input->post('start');
        $length = (int) $this->input->post('length');
        $draw = (int) $this->input->post('draw');
        $id_hm = (int) $this->input->post('id_hm');
        $id_pm = (int) $this->input->post('id_pm');
        $order = $this->input->post('order');
        $search = $this->input->post('search');
        $hasil = $this->mDetailHm->get_detail_hm_for_pm_datatable($id_hm, $id_pm, $start, $length, $order, $search);
        $hasil['draw'] = $draw;
        echo json_encode($hasil);
    }

    function get_keterangan_validasi() {
        $id = (int) $this->input->get('id');
        $l = $this->db->get_where('kembali_barang', array('KEMBALI_BARANG_ID' => $id))->result_array();
        if (count($l) > 0) {
            $obj = $l[0];
            if ($obj['STATUS_ID'] != '3') {
                return;
            }
            $lpengguna = $this->db->get_where('pengguna', array('PENGGUNA_ID' => $obj['VALIDATOR_ID']))->result_array();
            if (count($lpengguna) > 0) {
                $pengguna = $lpengguna[0];
                echo '<span class="fa fa-check"></span> Sudah Divalidasi oleh ' . $pengguna['PENGGUNA_NAMA'] . ' pada ' . $obj['KM_TANGGAL_VALIDASI'];
            }
        }
    }

    public function home() {
        $this->display('acPm', $this->data);
    }

    public function viewNew() {
        if ((in_array(Pm::role_admin, $this->roles)) == false) {
            echo 'Anda tidak berhak mengakses halaman ini';
            exit(0);
        }
        $this->data['listMainProject'] = $this->mMainProject->getListMainProject();
        $this->display('acPmAdd', $this->data);
    }

    function get_detail_pm() {
        echo json_encode($this->mDetailPm->getDetailPm((int) $this->input->get('id')));
    }

    public function printPDF() {
        $id = (int) $this->input->get('id');
        $pm = $this->mPm->get1($id);
        if ($pm == null) {
            echo 'id tidak valid';
            exit(0);
        }
        $this->data['pm'] = $pm;
        $this->data['detailPM'] = $this->mDetailPm->getDetailPm($id);
        $this->theme_layout = 'html2fpdf';
        $this->header = 'blank';
        $this->footer = 'blank';
        $this->left_sidebar = 'blank';
        $this->right_sidebar = 'blank';
        $this->script_header = 'lay-scripts/header-report';
        $this->script_footer = 'lay-scripts/footer-report';
        $this->display('acPmPdf', $this->data);
        $html = $this->output->get_output();
        $this->dompdf->load_html($html);
        $this->dompdf->set_paper('legal', 'landscape');
        $this->dompdf->render();
        $this->dompdf->stream("PM - " . $pm['KEMBALI_BARANG_KODE'] . ".pdf", array('Attachment' => 0));
    }

    public function viewDetail() {
        $id = (int) $this->input->get('id');
        $pm = $this->mPm->get1($id);
        if ($pm == null) {
            redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/home');
        } else {
            $this->data['pm'] = $pm;
            $this->data['detailPM'] = $this->mDetailPm->getDetailPm($id);
            $this->display('acPmDetail', $this->data);
        }
    }

    /*
     * fungsi menampilkan view untuk mengedit lpb yang masih berstatus sebagai draft
     * fungsi ini hanya untuk admin
     */

    function viewEdit() {
        if ((in_array(Pm::role_admin, $this->roles)) == false) {
            echo 'Anda tidak berhak mengakses halaman ini';
            exit(0);
        }
        $id = (int) $this->input->get('ID_PM');
        $pm = $this->mPm->get1($id);
        if ($pm == null) {
            redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/home');
        } else {
            $this->data['pm'] = $pm;
            //$this->data['detailPM']=$this->mDetailPm->getDetailPm($id);
            $this->display('acPmEdit', $this->data);
        }
    }

    function createNew() {
        if ((in_array(Pm::role_admin, $this->roles)) == false) {
            echo 'Anda tidak berhak mengakses halaman ini';
            exit(0);
        }
        $this->db->trans_begin();
        $mySession = $this->session->userdata('logged_in');
        $hm_id = (int) $this->input->post('hutang_material_id');
        $flag = (int) $this->input->post('flag');
        if ($flag != '2') {
            $flag = 1;
        }
        $id_pm = $this->mPm->_insert(array('STATUS_ID' => $flag, 'HM_ID' => $hm_id, 'PETUGAS_ID' => $mySession['PENGGUNA_ID']));
        $list_volume = $this->input->post('listVolume');
        $list_barang = $this->input->post('listBarang');
        $jumlah = count($list_barang);
        echo 'jumlah barang dikembalikan ' . $jumlah . ' item<br/>';
        for ($i = 0; $i < $jumlah; $i++) {
            echo 'adding barang ke ' . $i . '<br/>';
            $id_barang = (int) $list_barang[$i];
            $volume = (float) $list_volume[$i];
            if ($volume > 0) {
                $this->mDetailPm->_insert(array('PM_ID' => $id_pm, 'BARANG_ID' => $id_barang, 'VOLUME' => $volume));
            } else {
                echo 'barang tidak ditambahkan, volume 0<br/>';
            }
        }
        $this->db->trans_complete();
        redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/viewDetail?id=' . $id_pm);
    }

    /*
     * fungsi untuk mengedit lpb yang masih berstatus sebagai draft
     * fungsi ini hanya untuk admin
     */

    function edit() {
        if ((in_array(Pm::role_admin, $this->roles)) == false) {
            echo 'Anda tidak berhak mengakses halaman ini';
            exit(0);
        }
        $id = (int) $this->input->post('ID_PM');
        $pm = $this->mPm->get1($id);
        if ($pm == null) {
            echo 'pm is null<br/>';
            redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/home');
        } else if (in_array($pm['STATUS_ID'], array(1, 4))) {
            $flag = (int) $this->input->post('flag');
            if ($pm['STATUS_ID'] == '4') {
                $flag = 5;
            } else {
                if ($flag != '2') {
                    $flag = 1;
                }
            }
            $this->db->trans_begin();
            $this->mPm->_update(array('STATUS_ID' => $flag), array('KEMBALI_BARANG_ID' => $id));
            $listDetail = $this->db->get_where('detail_pm', array('PM_ID' => $id))->result_array();
            $list_barang_lama = array();
            $list_barang_lama_terpakai = array();
            foreach ($listDetail as $key => $detail) {
                $list_barang_lama[] = $detail['PM_ID'] . '_' . $detail['BARANG_ID'];
            }
            $list_volume = $this->input->post('listVolume');
            $list_barang = $this->input->post('listBarang');
            $jumlah = count($list_barang);
            echo 'jumlah barang dikembalikan ' . $jumlah . ' item<br/>';
            for ($i = 0; $i < $jumlah; $i++) {
                $volume = (float) $list_volume[$i];
                $id_barang = (int) $list_barang[$i];
                $id_detail = $id . '_' . $id_barang;
                if ($volume > 0) {
                    if (in_array($id_detail, $list_barang_lama)) {
                        $this->mDetailPm->_update(array('VOLUME' => $volume), array('PM_ID' => $id, 'BARANG_ID' => $id_barang));
                        $list_barang_lama_terpakai[] = $id_detail;
                    } else {
                        $this->mDetailPm->_insert(array('VOLUME' => $volume, 'PM_ID' => $id, 'BARANG_ID' => $id_barang));
                    }
                }
            }
            foreach ($list_barang_lama as $key => $lama) {
                echo 'hapus ' . $lama . ' from old detail_pm<br/>';
                if (!in_array($lama, $list_barang_lama_terpakai)) {
                    $arr = explode('_', $lama);
                    $this->mDetailPm->_delete(array('PM_ID' => $arr[0], 'BARANG_ID' => $arr[1]));
                }
            }
            $this->db->trans_complete();
            redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/viewDetail?id=' . $id);
        } else {
            echo 'status ' . $pm['STATUS_ID'] . '<br/>';
            redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/home');
        }
    }

    /*
     * fungsi untuk menghapus draft lpb, fungsi ini hanya untuk admin
     */

    function delete() {
        if ((in_array(Pm::role_admin, $this->roles)) == false) {
            echo 'Anda tidak berhak mengakses halaman ini';
            exit(0);
        }
        $id = (int) $this->input->get('ID_PM');
        $pm = $this->mPm->get1($id);
        if ($pm == null) {
            redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/home');
        } else if (in_array($pm['STATUS_ID'], array(1, 4))) {
            $this->db->trans_begin();
            $this->mDetailPm->_delete(array('PM_ID' => $id));
            $this->mPm->_delete(array('KEMBALI_BARANG_ID' => $id));
            $this->db->trans_complete();
            redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/home');
        } else {
            redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/viewDetail?id=' . $id);
        }
    }

    /*
     * fungsi ini digunakan untuk menolak lpb yang berstatus on validation
     * fungsi ini hanya untuk validator
     */

    function reject() {
        if ((in_array(Pm::role_validator, $this->roles)) == false) {
            echo 'Anda tidak berhak mengakses halaman ini';
            exit(0);
        }
        $id = (int) $this->input->get('ID_PM');
        $pm = $this->mPm->get1($id);
        if ($pm == null) {
            redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/home');
        } else if (in_array($pm['STATUS_ID'], array(2, 5))) {
            $this->db->trans_begin();
            $this->mPm->_update(array('STATUS_ID' => '4'), array('KEMBALI_BARANG_ID' => $id));
            $this->db->trans_complete();
            redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/viewDetail?id=' . $id);
        } else {
            redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/viewDetail?id=' . $id);
        }
    }

    /*
     * fungsi ini untuk memvalidasi lpb yang berstatus on validation
     * pada saat lpb divalidasi, stok akan diupdate
     * fungsi ini hanya untuk validator
     */

    function validate() {
        if ((in_array(Pm::role_validator, $this->roles)) == false) {
            echo 'Anda tidak berhak mengakses halaman ini';
            exit(0);
        }
        $id = (int) $this->input->get('ID_PM');
        $pm = $this->mPm->get1($id);
        $mySession = $this->session->userdata('logged_in');
        $alihkan = base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/home';
        if ($pm == null) {
            echo 'pm is null';
        } else if (in_array($pm['STATUS_ID'], array(2, 5))) {
            $this->db->trans_begin();
            $hm = $this->db->get_where('hutang_barang', array('HUTANG_BARANG_ID' => $pm['HM_ID']))->result_array();
            $hm = $hm[0];
            $this->mPm->_update(array('STATUS_ID' => '3', 'KM_TANGGAL_VALIDASI' => date('y-m-d h:i:s'), 'VALIDATOR_ID' => $mySession['PENGGUNA_ID']), array('KEMBALI_BARANG_ID' => $id));
            $listDetail = $this->db->get_where('detail_pm', array('PM_ID' => $id))->result_array();
            $allValid = true;
            foreach ($listDetail as $key => $detail) {
                if ($this->mStok->stok_barang_keluar($hm['RAB_PENERIMA'], $hm['GUDANG_PENERIMA'], $detail['BARANG_ID'], $detail['VOLUME'])) {
                    $this->mStok->stok_barang_masuk($hm['RAB_PEMBERI'], $hm['GUDANG_PEMBERI'], $detail['BARANG_ID'], $detail['VOLUME']);
                } else {
                    $allValid = false;
                    break;
                }
            }
            if ($allValid)
                $this->db->trans_complete();
            else
                $this->db->trans_rollback();
            redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/viewDetail?id=' . $id);
        }else {
            redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/viewDetail?id=' . $id);
        }
    }

    function setujui() {
        if ((in_array(Pm::role_admin, $this->roles)) == false) {
            echo 'Anda tidak berhak mengakses halaman ini';
            exit(0);
        }
        $id = (int) $this->input->get('ID_PM');
        $pm = $this->mPm->get1($id);
        if ($pm == null) {
            redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/home');
        } else if (in_array($pm['STATUS_ID'], array(1))) {
            $this->db->trans_begin();
            $this->mPm->_update(array('STATUS_ID' => '2'), array('KEMBALI_BARANG_ID' => $id));
            $this->db->trans_complete();
            redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/viewDetail?id=' . $id);
        } else {
            redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/viewDetail?id=' . $id);
        }
    }

}
