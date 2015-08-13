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
class Lpb extends Implementation_Controller {

    //1. seluruh fungsi yang tidak public, menggunakan awalan '_' , contoh: _getProperty()
    //2. di atas fungsi diberikan penjelasan proses apa yang dilakukan. dari mana ambil data, 
    //inputnya apa dan outputnya apa. contoh di fungsi index()
    //3. Penamaan fungsi harus PUNUK ONTA dengan awalan huruf kecil $ Menggunakan Bahasa Inggris
    //4. Penamaan nama fungsi maksimal 3 kata
    const LPB_PREFIX = 'LPB';
    const role_admin = 'lpb_admin';
    const role_viewer = 'lpb_viewer';
    const role_validator = 'lpb_validator';

    private $roles = '';

    public function __construct() {
        parent::__construct();
        $this->load->model('projects/mProject');
        $this->load->model('projects/mMainProject');
        $this->load->model('rab/mRab');
        $this->load->model('mPurchaseOrder');
        $this->load->model('mPenerimaanBarang');
        $this->load->model('mDetailLPB');
        $this->load->model('mDetailPo');
        $this->load->model('mPoxlpb');
        $this->load->model('mPo2');
        $this->load->model('mBpm');
        $this->load->model('mStok');
        $this->load->model('master/mSupplier');
        $this->load->model('user-management/mUser');
        $this->title = "Penerimaan Barang";
        $this->session = $this->session->userdata('logged_in');
        $this->roles = json_decode($this->data['role']);
        if ((in_array(Lpb::role_admin, $this->roles) || in_array(Lpb::role_validator, $this->roles) || in_array(Lpb::role_viewer, $this->roles)) == false) {
            echo 'Anda tidak berhak mengakses halaman ini';
            exit(0);
        }
    }

    public function index() {
        //$this->data['listPb'] = $this->mPenerimaanBarang->getListLPB();
        $this->display('acPb', $this->data);
    }

    /*
     * fungsi list lpb dalam format datatable, semua user bisa mengakses
     * diakses dari halaman index lpb
     */

    public function getListLPBDataTable() {
        $start = (int) $this->input->post('start');
        $length = (int) $this->input->post('length');
        $draw = (int) $this->input->post('draw');
        $search = $this->input->post('search');
        $order = $this->input->post('order');
        $hasil = $this->mPenerimaanBarang->getListLPBDataTable($start, $length, $order, $search);
        $hasil['draw'] = $draw;
        echo json_encode($hasil);
    }

    /*
     * halaman form untuk menambahkan lpb baru
     * hanya untuk admin
     */

    public function viewNewLpb() {
        if ((in_array(Lpb::role_admin, $this->roles) ) == false) {
            echo 'Anda tidak berhak mengakses halaman ini';
            exit(0);
        }
        $this->data['list_gudang'] = $this->mPenerimaanBarang->get_list_gudang();
        $this->data['list_supplier'] = $this->mPenerimaanBarang->get_list_supplier();
        $this->display('acPbAdd', $this->data);
    }

    /*
     * funsgi yang mengembalikan deskripsi suatu PO,
     * 
     */

    public function getDeskripsiPO() {
        $PURCHASE_ORDER_ID = $this->input->get('PURCHASE_ORDER_ID');
        $detil_po = $this->mPo2->getDeskripsiPO($PURCHASE_ORDER_ID);
        echo json_encode($detil_po);
    }

    /*
     * fungsi yang menjelaskan detail PO, barang apa saja yang datang, 
     * diakses pada saat membuat LPB baru atau mengedit untuk menambahkan barang baru
     * dan volume serta masing-masing
     */

    public function getDetailPODataTable() {
        $PURCHASE_ORDER_ID = (int) $this->input->post('PURCHASE_ORDER_ID');
        $start = (int) $this->input->post('start');
        $length = (int) $this->input->post('length');
        $draw = (int) $this->input->post('draw');
        $id_lpb = (int) $this->input->post('id_lpb');
        $order = $this->input->post('order');
        $search = $this->input->post('search');
        $detil_po = $this->mPenerimaanBarang->getDetailPODataTable($PURCHASE_ORDER_ID, $start, $length, $id_lpb, $order, $search);
        $detil_po['draw'] = $draw;
        echo json_encode($detil_po);
    }

    function get_keterangan_validasi() {
        $id = (int) $this->input->get('id');
        $llpb = $this->db->get_where('penerimaan_barang', array('PENERIMAAN_BARANG_ID' => $id))->result_array();
        if (count($llpb) > 0) {
            $lpb = $llpb[0];
            if ($lpb['STATUS_LPB_ID'] != '3') {
                return;
            }
            $lpengguna = $this->db->get_where('pengguna', array('PENGGUNA_ID' => $lpb['VALIDATOR_ID']))->result_array();
            if (count($lpengguna) > 0) {
                $pengguna = $lpengguna[0];
                echo '<span class="fa fa-check"></span> Sudah Divalidasi oleh ' . $pengguna['PENGGUNA_NAMA'] . ' pada ' . $lpb['PENERIMAAN_BARANG_TANGGAL_VALIDASI'];
            }
        }
    }

    /*
     * fungsi untuk menambahkan LPB baru yang disubmit oleh halaman viewNewLPB
     * fungsi ini menyimpan lpb baru dengan status draft atau on validation
     * funsgi ini tidak mengakibatkan tabel stok berubah, karena belum divalidasi
     * oleh validator
     * untuk administrator
     */

    public function newLPB() {
        if ((in_array(Lpb::role_admin, $this->roles)) == false) {
            echo 'Anda tidak berhak mengakses halaman ini';
            exit(0);
        }
        $this->db->trans_begin();
        $my = $this->session->userdata('logged_in');
        $flag = $this->input->post('flag');
        if ($flag == 1) //dari view 1 adalah Proses Setujui
            $STATUS_LPB_ID = 2;
        else if ($flag == 0) //dari view 0 adalah Draft
            $STATUS_LPB_ID = 1;
        $id_gudang = (int) $this->input->post('id_gudang');
        $id_supplier = (int) $this->input->post('id_supplier');
        $pb = array(
            'LPB_SURAT_JALAN' => $this->input->post('LPB_SURAT_JALAN'),
            'LPB_KENDARAAN' => $this->input->post('LPB_KENDARAAN'),
            'STATUS_LPB_ID' => $STATUS_LPB_ID,
            'PETUGAS_ID' => $my['PENGGUNA_ID'],
            'GUDANG_ID' => $id_gudang,
            'SUPPLIER_ID' => $id_supplier
        );
        $PENERIMAAN_BARANG_ID = $this->mPenerimaanBarang->_insert($pb);
        echo "id lpb baru adalah $PENERIMAAN_BARANG_ID <br/>\r\n";
        $list_barang = $this->input->post('id_barang');
        $list_volume = $this->input->post('VOLUME');
        $list_po = $this->input->post('PO_ID');
        $list_id_lain = $this->input->post('id_lain'); //id subcon atau paket overhead
        $pool_id_po = array();
        for ($i = 0, $i2 = count($list_po); $i < $i2; $i++) {
            if (!in_array($list_po[$i], $pool_id_po)) {
                $pool_id_po[] = $list_po[$i];
            }
        }
        $list_po2 = $this->mPo2->get_list_po_from_array($pool_id_po);
        $pool_id_po = array();
        foreach ($list_po2 as $po) {
            if ($po['GUDANG_ID'] == $id_gudang)
                $pool_id_po[$po['PURCHASE_ORDER_ID']] = $po;
        }
        for ($i = 0, $i2 = count($list_barang); $i < $i2; $i++) {
            $id_po = (int) $list_po[$i];
            $id_lain = (int) $list_id_lain[$i];
            $id_barang = (int) $list_barang[$i];
            $volume = (double) $list_volume[$i];
            $detail_pb = array(
                'PENERIMAAN_BARANG_ID' => $PENERIMAAN_BARANG_ID,
                'VOLUME_LPB' => $volume,
                'PO_ID' => $id_po
            );
            if (isset($pool_id_po[$id_po])) {
                $po = $pool_id_po[$id_po];
                if ($po['KATEGORI_PP_ID'] == '1') {//OVERHEAD
                    if ($id_barang > 0) {
                        $detail_pb['BARANG_OVERHEAD_ID'] = $id_barang;
                    } else if ($id_lain > 0) {
                        $detail_pb['PAKET_OVERHEAD_MATERIAL_ID'] = $id_lain;
                    }
                } else if ($po['KATEGORI_PP_ID'] == '2') {//bahan
                    if ($id_barang > 0) {
                        $detail_pb['BARANG_ID'] = $id_barang;
                    } else if ($id_lain > 0) {
                        $detail_pb['SUBCON_ID'] = $id_lain;
                    }
                }
                $this->mDetailLPB->_insert($detail_pb);
            }
        }
        $this->db->trans_complete();
        redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/viewDetail/' . $PENERIMAAN_BARANG_ID);
        //header('refresh:1;url=' . base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/viewDetail/' . $PENERIMAAN_BARANG_ID);
    }

    public function printPDF() {
        $idLPB = (int) $this->input->get('id');
        $lpb = $this->mPenerimaanBarang->getDeskripsiPenerimaanBarang($idLPB);
        if ($lpb == null) {
            echo 'id tidak valid';
            exit(0);
        }
        $this->data['list_detail_lpb'] = $this->mDetailLPB->getDetailLPB($idLPB);
        $this->data['lpb'] = $lpb;
        $this->theme_layout = 'html2fpdf';
        $this->header = 'blank';
        $this->footer = 'blank';
        $this->left_sidebar = 'blank';
        $this->right_sidebar = 'blank';
        $this->script_header = 'lay-scripts/header-report';
        $this->script_footer = 'lay-scripts/footer-report';
        $this->display('acPbPdf', $this->data);
        $html = $this->output->get_output();
        $this->dompdf->load_html($html);
        $this->dompdf->set_paper('legal', 'landscape');
        $this->dompdf->render();
        $this->dompdf->stream("LPB - " . $lpb['PENERIMAAN_BARANG_KODE'] . ' - ' . $lpb['GUDANG_NAMA'] . ' - ' . $lpb['SUPPLIER_NAMA'] . ".pdf", array('Attachment' => 0));
    }

    /*
     * hanya untuk admin
     * fungsi mengembalikan list detail PO untuk suatu lpb
     * lpb bisa terdiri dari beberapa PO
     */

    function getDetailLPB() {
        $idLPB = (int) $this->input->post('idLPB');
        $listDetailPO = $this->mDetailLPB->getDetailLPB($idLPB);
        echo json_encode($listDetailPO);
    }

    /*
     * halaman untuk menampilkan detail LPB untuk semua user
     */

    public function viewDetail($PENERIMAAN_BARANG_ID) {
        $PENERIMAAN_BARANG_ID = (int) $PENERIMAAN_BARANG_ID;
        $lpb = $this->mPenerimaanBarang->getDeskripsiPenerimaanBarang($PENERIMAAN_BARANG_ID);
        $this->data['list_detail_lpb'] = $this->mDetailLPB->getDetailLPB($PENERIMAAN_BARANG_ID);
        $this->data['lpb'] = $lpb;
        $this->data['idLPB'] = $PENERIMAAN_BARANG_ID;
        $this->display('acPbDetail', $this->data);
        //var_dump($this->data['lpb']);
    }

    /*
     * fungsi yang mengembalikan detail barang-barang yang datang pada suatu LPB 
     * berdasarkan ID PO masing-masing
     */

//    public function getDetailLpbPo() {
//        $id_po = (int) $this->input->get('id_po');
//        $id_lpb = (int) $this->input->get('id_lpb');
//        $start = (int) $this->input->get('start');
//        $length = (int) $this->input->get('length');
//        $hasil = $this->mPenerimaanBarang->getDetailLpbPo($id_lpb, $id_po, $start, $length);
//        $hasil['draw'] = (int) $this->input->get('draw');
//        echo json_encode($hasil);
//    }

    function get_list_main_project() {
        $id_gudang = (int) $this->input->get('id_gudang');
        echo json_encode($this->mPenerimaanBarang->get_list_main_project($id_gudang));
    }

    function get_list_supplier() {
        $id_gudang = (int) $this->input->get('id_gudang');
        echo json_encode($this->mPenerimaanBarang->get_list_supplier($id_gudang));
    }

    function getListSubProject() {
        $idMainProject = (int) $this->input->get('idMainProject');
        $id_gudang = (int) $this->input->get('id_gudang');
        $subProject = $this->mPenerimaanBarang->getListSubProject($idMainProject, $id_gudang);
        echo json_encode($subProject);
    }

    function getListRAB() {
        $idProject = (int) $this->input->get('idProject');
        $id_gudang = (int) $this->input->get('id_gudang');
        $listRAB = $this->mPenerimaanBarang->getListRAB($idProject, $id_gudang);
        echo json_encode($listRAB);
    }

    function getListPO() {
        $idRAB = (int) $this->input->get('idRAB');
        $id_gudang = (int) $this->input->get('id_gudang');
        $id_supplier = (int) $this->input->get('id_supplier');
        $listPO = $this->mPenerimaanBarang->getListPO($idRAB, $id_gudang, $id_supplier);
        echo json_encode($listPO);
    }

    /*
     * fungsi menampilkan view untuk mengedit lpb yang masih berstatus sebagai draft
     * fungsi ini hanya untuk admin
     */

    function viewEdit() {
        if ((in_array(Lpb::role_admin, $this->roles) ) == false) {
            echo 'Anda tidak berhak mengakses halaman ini';
            exit(0);
        }
        $idLPB = (int) $this->input->get('ID_LPB');
        $lpb = $this->mPenerimaanBarang->getDeskripsiPenerimaanBarang($idLPB);
        if ($lpb == null) {
            redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0));
        } else if (!in_array($lpb['STATUS_LPB_ID'], array(1, 4))) {
            redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0));
        } else {
            $this->data['lpb'] = $lpb;
            $this->data['list_gudang'] = $this->mPenerimaanBarang->get_list_gudang();
            $this->data['list_supplier'] = $this->mPenerimaanBarang->get_list_supplier();
            $this->display('acPbEdit', $this->data);
        }
    }

    /*
     * fungsi untuk mengedit lpb yang masih berstatus sebagai draft
     * fungsi ini hanya untuk admin
     */

    function edit() {
        if ((in_array(Lpb::role_admin, $this->roles) ) == false) {
            echo 'Anda tidak berhak mengakses halaman ini';
            exit(0);
        }
        $idLPB = (int) $this->input->post('ID_LPB');
        $lpb = $this->mPenerimaanBarang->getDeskripsiPenerimaanBarang($idLPB);
        if ($lpb == null) {
            echo 'lpb is null';
            redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0));
        } else if (!in_array($lpb['STATUS_LPB_ID'], array(1, 4))) {
            echo 'lpb not permitted to edit';
            redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0));
        } else {
            $this->db->trans_begin();
            $update = array();
            $update['LPB_SURAT_JALAN'] = $this->input->post('LPB_SURAT_JALAN');
            $update['LPB_KENDARAAN'] = $this->input->post('LPB_KENDARAAN');
            $update['GUDANG_ID'] = $id_gudang = (int) $this->input->post('id_gudang');
            $update['SUPPLIER_ID'] = $id_supplier = (int) $this->input->post('id_supplier');
            if ($lpb['STATUS_LPB_ID'] == '1') {
                $flag = (int) $this->input->post('flag');
                if (!($flag == '1' || $flag == '2')) {
                    $flag = 1;
                }
                $update['STATUS_LPB_ID'] = $flag;
            } else if ($lpb['STATUS_LPB_ID'] == '4') {
                $update['STATUS_LPB_ID'] = 5;
            }
            //update tabel penerimaan terlebih dahulu
            $this->mPenerimaanBarang->_update($update, array('PENERIMAAN_BARANG_ID' => $lpb['PENERIMAAN_BARANG_ID']));
            //mengambil detail lpb yang dimasukkan user
            $list_barang = $this->input->post('id_barang');
            $list_volume = $this->input->post('VOLUME');
            $list_po = $this->input->post('PO_ID');
            $list_id_lain = $this->input->post('id_lain'); //id subcon atau paket overhead
            $pool_id_po = array();
            //mengumpulkan id po yang unik, kemudian diquery dari database
            for ($i = 0, $i2 = count($list_po); $i < $i2; $i++) {
                if (!in_array($list_po[$i], $pool_id_po)) {
                    $pool_id_po[] = $list_po[$i];
                }
            }
            //query untuk mengambil po-po yang dimasukkan oleh user
            $list_po2 = $this->mPo2->get_list_po_from_array($pool_id_po);
            $pool_id_po = array();
            //po-po yang dimasukkan oleh user harus valid, po harus untuk gudang yang diinputkan user
            foreach ($list_po2 as $po) {
                if ($po['GUDANG_ID'] == $id_gudang) {
                    $pool_id_po[$po['PURCHASE_ORDER_ID']] = $po;
                }
            }
            $detail_lpb = $this->db->get_where('detail_lpb', array('PENERIMAAN_BARANG_ID' => $idLPB))->result_array();
            $detail_lpb_lama = array();
            foreach ($detail_lpb as $dlpb) {
                $detail_lpb_lama[] = (int) $dlpb['PENERIMAAN_BARANG_ID'] . '_' . (int) $dlpb['PO_ID'] . '_' . (int) $dlpb['BARANG_ID'] . '_' . (int) $dlpb['SUBCON_ID'] . '_' . (int) $dlpb['BARANG_OVERHEAD_ID'] . '_' . (int) $dlpb['PAKET_OVERHEAD_MATERIAL_ID'];
            }
            $detail_lpb_lama_terpakai = array();
            //iterasi per item barang pada lpb yang diinputkan user
            for ($i = 0, $i2 = count($list_barang); $i < $i2; $i++) {
                $id_po = (int) $list_po[$i];
                $id_lain = (int) $list_id_lain[$i];
                $id_barang = (int) $list_barang[$i];
                $volume = (float) $list_volume[$i];
                $detail_pb = array(
                    'PENERIMAAN_BARANG_ID' => $idLPB,
                    'VOLUME_LPB' => $volume,
                    'PO_ID' => $id_po
                );
                /* jika id po yang diinputan user merupakan po yang valid, yaitu
                 * po yang gudangnya sama dengan lpb dan sudah divalidasi
                 */
                $where = array('PENERIMAAN_BARANG_ID' => $idLPB, 'PO_ID' => $id_po);
                if (isset($pool_id_po[$id_po])) {
                    $po = $pool_id_po[$id_po];
                    $kategori_pp_id = $po['KATEGORI_PP_ID'];
                    $id_detail = $idLPB . '_' . $id_po . '_';
                    if ($kategori_pp_id == '1') {//OVERHEAD
                        if ($id_barang > 0) {
                            $where['BARANG_OVERHEAD_ID'] = $detail_pb['BARANG_OVERHEAD_ID'] = $id_barang;
                            $id_detail.='0_0_' . $id_barang . '_0';
                        } else if ($id_lain > 0) {
                            $where['PAKET_OVERHEAD_MATERIAL_ID'] = $detail_pb['PAKET_OVERHEAD_MATERIAL_ID'] = $id_lain;
                            $id_detail.='0_0_0_' . $id_lain;
                        }
                    } else if ($kategori_pp_id == '2') {//bahan
                        if ($id_barang > 0) {
                            $where['BARANG_ID'] = $detail_pb['BARANG_ID'] = $id_barang;
                            $id_detail.=$id_barang . '_0_0_0';
                        } else if ($id_lain > 0) {
                            $where['SUBCON_ID'] = $detail_pb['SUBCON_ID'] = $id_lain;
                            $id_detail.='0_' . $id_lain . '_0_0';
                        }
                    }
                    if (in_array($id_detail, $detail_lpb_lama)) {
                        $detail_lpb_lama_terpakai[] = $id_detail;
                        $this->mDetailLPB->_update($detail_pb, $where);
                    } else {
                        $this->mDetailLPB->_insert($detail_pb);
                    }
                }
            }
            foreach ($detail_lpb_lama as $dlpbLama) {
                if (!in_array($dlpbLama, $detail_lpb_lama_terpakai)) {
                    $abc = explode('_', $dlpbLama);
                    $where = array('PENERIMAAN_BARANG_ID' => $abc[0], 'PO_ID' => $abc[1]);
                    if ($abc[2] > 0) {
                        $where['BARANG_ID'] = $abc[2];
                    } else if ($abc[3] > 0) {
                        $where['SUBCON_ID'] = $abc[3];
                    } else if ($abc[4] > 0) {
                        $where['BARANG_OVERHEAD_ID'] = $abc[4];
                    } else if ($abc[5] > 0) {
                        $where['PAKET_OVERHEAD_MATERIAL_ID'] = $abc[5];
                    }

                    $this->mDetailLPB->_delete($where);
                    echo 'hapus detail lama ' . $dlpbLama;
                }
            }
            $this->db->trans_complete();
            redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/viewDetail/' . $lpb['PENERIMAAN_BARANG_ID']);
        }
    }

    /*
     * fungsi untuk menghapus draft lpb, fungsi ini hanya untuk admin
     */

    function delete() {
        if ((in_array(Lpb::role_admin, $this->roles) ) == false) {
            echo 'Anda tidak berhak mengakses halaman ini';
            exit(0);
        }
        $idLPB = (int) $this->input->get('ID_LPB');
        $lpb = $this->mPenerimaanBarang->getDeskripsiPenerimaanBarang($idLPB);
        if ($lpb != null) {
            if (in_array($lpb['STATUS_LPB_ID'], array(1, 4))) {
                $this->mDetailLPB->_delete(array('PENERIMAAN_BARANG_ID' => $idLPB));
                $this->mPenerimaanBarang->_delete(array('PENERIMAAN_BARANG_ID' => $idLPB));
            }
        }
        redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0));
    }

    /*
     * fungsi ini digunakan untuk menolak lpb yang berstatus on validation
     * fungsi ini hanya untuk validator
     */

    function reject() {
        if ((in_array(Lpb::role_validator, $this->roles)) == false) {
            echo 'Anda tidak berhak mengakses halaman ini';
            exit(0);
        }
        $this->mySession = $this->session->userdata('logged_in');
        $idLPB = (int) $this->input->get('ID_LPB');
        $lpb = $this->mPenerimaanBarang->getDeskripsiPenerimaanBarang($idLPB);
        if ($lpb == null) {
            redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0));
        } else if ($lpb['STATUS_LPB_ID'] == '2' || $lpb['STATUS_LPB_ID'] == '5') {
            $updateResult = $this->mPenerimaanBarang->_update(array('VALIDATOR_ID' => $this->mySession[mUser::ID], 'STATUS_LPB_ID' => 4), array('PENERIMAAN_BARANG_ID' => $idLPB));
            redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/viewDetail/' . $idLPB);
        } else {
            redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0));
        }
    }

    function revisi() {
        if ((in_array(Lpb::role_admin, $this->roles) ) == false) {
            echo 'Anda tidak berhak mengakses halaman ini';
            exit(0);
        }
        $this->mySession = $this->session->userdata('logged_in');
        $idLPB = (int) $this->input->get('ID_LPB');
        $lpb = $this->mPenerimaanBarang->getDeskripsiPenerimaanBarang($idLPB);
        if ($lpb == null) {
            redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0));
        } else if ($lpb['STATUS_LPB_ID'] == '4') {
            $updateResult = $this->mPenerimaanBarang->_update(array('STATUS_LPB_ID' => 5), array('PENERIMAAN_BARANG_ID' => $idLPB));
            redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/viewDetail/' . $idLPB);
        } else {
            redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0));
        }
    }

    function setujui() {
        if ((in_array(Lpb::role_admin, $this->roles) ) == false) {
            echo 'Anda tidak berhak mengakses halaman ini';
            exit(0);
        }
        $this->mySession = $this->session->userdata('logged_in');
        $idLPB = (int) $this->input->get('ID_LPB');
        $lpb = $this->mPenerimaanBarang->getDeskripsiPenerimaanBarang($idLPB);
        if ($lpb == null) {
            redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0));
        } else if ($lpb['STATUS_LPB_ID'] == '1') {
            $updateResult = $this->mPenerimaanBarang->_update(array('STATUS_LPB_ID' => 2), array('PENERIMAAN_BARANG_ID' => $idLPB));
            redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/viewDetail/' . $idLPB);
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
        if (( in_array(Lpb::role_validator, $this->roles) ) == false) {
            echo 'Anda tidak berhak mengakses halaman ini';
            exit(0);
        }
        $this->db->trans_begin();
        $mySession = $this->session->userdata('logged_in');
        $idLPB = (int) $this->input->get('ID_LPB');
        $lpb = $this->mPenerimaanBarang->getDeskripsiPenerimaanBarang($idLPB);
        if ($lpb == NULL) {
            redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0));
        } else if ($lpb['STATUS_LPB_ID'] == '2' || $lpb['STATUS_LPB_ID'] == '5') {
            $detailLPB = $this->db->get_where('detail_lpb', array('PENERIMAAN_BARANG_ID' => $idLPB))->result_array();
            $list_po = array();
            $id_gudang = $lpb['GUDANG_ID'];
            foreach ($detailLPB as $dlpb) {
                $id_rab = 0;
                if (in_array($dlpb['PO_ID'], $list_po)) {
                    
                } else {
                    $po = $this->db->get_where('purchase_order', array('PURCHASE_ORDER_ID' => $dlpb['PO_ID'], 'STATUS_PO_ID' => 3))->result_array();
                    if (count($po) > 0) {
                        $po = $po[0];
                        $list_po[$po['PURCHASE_ORDER_ID']] = $po;
                        $id_rab = $po['RAB_ID'];
                    }
                }
                $volume = (double) $dlpb['VOLUME_LPB'];
                if ((int) $dlpb['BARANG_ID'] > 0) {
                    $id_barang = $dlpb['BARANG_ID'];
                    $this->mStok->stok_barang_masuk($id_rab, $id_gudang, $id_barang, $volume);
                } else if ((int) $dlpb['SUBCON_ID'] > 0) {
                    $id_subcon = $dlpb['SUBCON_ID'];
                    $this->mStok->stok_subcon_masuk($id_rab, $id_gudang, $id_subcon, $volume);
                } else if ((int) $dlpb['BARANG_OVERHEAD_ID'] > 0) {
                    $id_barang = $dlpb['BARANG_OVERHEAD_ID'];
                    $this->mStok->stok_barang_masuk($id_rab, $id_gudang, $id_barang, $volume);
                } else if ((int) $dlpb['PAKET_OVERHEAD_MATERIAL_ID'] > 0) {
                    $id_paket_overhead = $dlpb['PAKET_OVERHEAD_MATERIAL_ID'];
                    $this->mStok->stok_paket_overhead_masuk($id_rab, $id_gudang, $id_paket_overhead, $volume);
                }
                //$this->mStok->stokMasuk($id_rab, $dlpb['BARANG_ID'], $id_gudang, $dlpb['VOLUME_LPB']);
            }
            $updateResult = $this->mPenerimaanBarang->_update(array('VALIDATOR_ID' => $mySession[mUser::ID], 'STATUS_LPB_ID' => 3, 'PENERIMAAN_BARANG_TANGGAL_VALIDASI' => date('Y-m-d h:i:s')), array('PENERIMAAN_BARANG_ID' => $idLPB));
            $this->db->trans_complete();
            redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/viewDetail/' . $idLPB);
        } else {
            redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0));
        }
    }

}
