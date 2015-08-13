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
class Pk extends Implementation_Controller {

    //1. seluruh fungsi yang tidak public, menggunakan awalan '_' , contoh: _getProperty()
    //2. di atas fungsi diberikan penjelasan proses apa yang dilakukan. dari mana ambil data, 
    //inputnya apa dan outputnya apa. contoh di fungsi index()
    //3. Penamaan fungsi harus PUNUK ONTA dengan awalan huruf kecil $ Menggunakan Bahasa Inggris
    //4. Penamaan nama fungsi maksimal 3 kata

    public function __construct() {
        parent::__construct();
        $this->load->model('projects/mProject');
        $this->load->model('projects/mMainProject');
        $this->load->model('rab/mRab');
        $this->load->model('mPermintaanPekerjaan');
        $this->load->model('mDetailTransaksiPK');
        $this->load->model('master/mGudang');
        $this->title = "Permintaan Pekerjaan";
        //$this->data['role'] = json_encode(['admin', 'viewer', 'validator']);
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
        //$this->data['listPk'] = $this->mPermintaanPekerjaan->getTotalPk();
        //print_r($this->data['listPk']);
        $this->display('acPk', $this->data);
    }

    public function approve() {
        $pp = array(
            'VALIDATOR_ID' => $this->data['iduseractive'],
            'PERMINTAAN_PEKERJAAN_VALIDATED' => date('Y-m-d H:i:s'),
            'STATUS_PK_ID' => 3
        );
        $this->mPermintaanPekerjaan->_update($pp, array('PERMINTAAN_PEKERJAAN_ID' => $this->input->post('PERMINTAAN_PEKERJAAN_ID')));
        redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/');
    }

    public function reject() {
        $pp = array(
            'VALIDATOR_ID' => $this->data['iduseractive'],
            'PERMINTAAN_PEKERJAAN_VALIDATED' => date('Y-m-d H:i:s'),
            'STATUS_PK_ID' => 4
        );
        $this->mPermintaanPekerjaan->_update($pp, array('PERMINTAAN_PEKERJAAN_ID' => $this->input->post('PERMINTAAN_PEKERJAAN_ID')));
        redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/');
    }

    public function requestValidation() {
        $id = $this->input->post('PK_ID');
        $flag = $this->input->post('STATUS');
        if ($flag == 1) //draft
            $STATUS_PP_ID = 2;
        else if ($flag == 6) // rejected
            $STATUS_PP_ID = 5;
        else
            $STATUS_PP_ID = 2;
        $column = array(
            'STATUS_PK_ID' => $STATUS_PP_ID,
            'PERMINTAAN_PEKERJAAN_UPDATE_BY' => $this->data['iduseractive'],
            'PERMINTAAN_PEKERJAAN_UPDATE' => date('Y-m-d H:i:s')
        );
        $this->mPermintaanPekerjaan->_update($column, array('PERMINTAAN_PEKERJAAN_ID' => $id));
    }

    public function getViewPk() {
        echo $this->mPermintaanPekerjaan->getTotalPk();
    }

    public function getDetail($COMPOSED_ID) {
        $tmp = explode("_", $COMPOSED_ID);
        $result = $this->db->get_where('view_pk', array('PK_ID' => $tmp[0], 'RAB_ID' => $tmp[1]))->result_array();
        //print_r($result);
        echo json_encode($result);
    }

    public function viewUpdate($COMPOSITE_ID = '0_0') {
        $tmp = explode("_", $COMPOSITE_ID);
        $result = $this->db->get_where('view_pk', array('PK_ID' => $tmp[0], 'RAB_ID' => $tmp[1]))->result_array();
        $this->data['editData'] = json_encode($result);
        $volumes = array();
        for ($i = 0; $i < sizeof($result); $i++) {

            $COMPOSITE_ID = $result[$i]['RAB_ID'] . '_' . $result[$i]['ANALISA_ID'];
            $volumes[$i] = $this->getVolumes($COMPOSITE_ID);
        }
        $this->data['volumes'] = json_encode($volumes);
    }

    public function getVolumes($COMPOSITE_ID) {

        $result = $this->mPermintaanPekerjaan->getVolumes($COMPOSITE_ID);
        if (sizeof($result) > 0) {
            $total = floatval($result[0]['UPAH_ANALISA_VOLUME']);
            $used = floatval($result[0]['UPAH_VOLUME_TERPAKAI']);
            $available = $total - $used;

            return array('AVAILABLE' => $available, 'USED' => $used, 'TOTAL' => $total);
        }

        return array('AVAILABLE' => 0, 'USED' => 0, 'TOTAL' => 0);
    }

    public function viewNewPk() {
        //$this->data['listProject'] = $this->mProject->_select();
        //$this->data['listRab'] = $this->mRab->_select(array('RAB_ACTIVE' => 1));
        $this->data['listKategoriPk'] = $this->db->get('kategori_pk')->result_array();
        $this->display('acPkAdd', $this->data);
    }

    public function getOverhead($RAB_ID) {
        $upah = $this->db->query("select * from view_overhead_upah where RAB_ID = {$RAB_ID}")->result_array();
        $paket = $this->db->query("select * from view_overhead_paket_upah where RAB_ID = {$RAB_ID}")->result_array();

        $overhead = array_merge($upah, $paket);

        echo json_encode($overhead);
    }

    public function getAllMainProjects() {
        $query = $this->mMainProject->getListMainProject();
        //print_r($query);
        echo json_encode($query);
    }

    public function getCurrentProjects() {
        $MAIN_PROJECT_ID = $this->input->post('MAIN_PROJECT_ID');
        echo json_encode($this->mProject->getListSubProject($MAIN_PROJECT_ID));
    }

    public function getCurrentRab() {
        $PROJECT_ID = $this->input->post('PROJECT_ID');
        $query = $this->mRab->_select(array('PROJECT_ID' => $PROJECT_ID));
        echo json_encode($query);
    }

    public function getCurrentRAP() {
        $RAB_ID = $this->input->post('RAB_ID');
        $listRAP = $this->db->get_where('view_pk_rap', array('RAB_ID' => $RAB_ID))->result_array();
        echo json_encode($listRAP);
    }

    public function getCurrentRAPJson($RAB_ID) {
        if (!isset($RAB_ID) || $RAB_ID == null) {
            $RAB_ID = 0;
        }
        //$baseSql = "select * from view_pk_rap where RAB_ID = " . $RAB_ID;
        $baseSql = "SELECT analisa_rab.*, DETAIL_ANALISA_KOEFISIEN, DETAIL_ANALISA_HARGA, DETAIL_ANALISA_TOTAL, 
COALESCE((SELECT SUM(detail_transaksi_pk.VOLUME_PK)
FROM permintaan_pekerjaan
JOIN detail_transaksi_pk ON detail_transaksi_pk.PERMINTAAN_PEKERJAAN_ID = permintaan_pekerjaan.PERMINTAAN_PEKERJAAN_ID
WHERE permintaan_pekerjaan.RAB_ID = {$RAB_ID} AND detail_transaksi_pk.ANALISA_ID = analisa_rab.ANALISA_ID
GROUP BY detail_transaksi_pk.ANALISA_ID),0)  AS UPAH_ANALISA_VOLUME_TERPAKAI, 
SUM(temp.UPAH_ANALISA_TOTAL) AS UPAH_ANALISA_TOTAL, temp.UPAH_ANALISA_VOLUME FROM
(SELECT analisa_rab.*, detail_analisa_rab.DETAIL_ANALISA_KOEFISIEN, detail_analisa_rab.DETAIL_ANALISA_HARGA, detail_analisa_rab.DETAIL_ANALISA_TOTAL, master_upah.UPAH_ID, detail_analisa_rab.DETAIL_ANALISA_ID, detail_analisa_rab.DETAIL_ANALISA_TOTAL AS UPAH_ANALISA_TOTAL, SUM(detail_pekerjaan.DETAIL_PEKERJAAN_VOLUME) AS UPAH_ANALISA_VOLUME FROM detail_pekerjaan 
JOIN analisa_rab ON detail_pekerjaan.ANALISA_ID = analisa_rab.ANALISA_ID  
JOIN detail_analisa_rab ON analisa_rab.ANALISA_ID = detail_analisa_rab.ANALISA_ID 
JOIN master_upah ON detail_analisa_rab.UPAH_ID = master_upah.UPAH_ID
WHERE detail_pekerjaan.RAB_ID = {$RAB_ID}
GROUP BY detail_analisa_rab.DETAIL_ANALISA_ID) temp, analisa_rab WHERE temp.ANALISA_ID = analisa_rab.ANALISA_ID GROUP BY analisa_rab.ANALISA_ID";
        //print_r($baseSql);
        $columns = array(
            array('db' => 'ANALISA_NAMA', 'dt' => 0),
            array('db' => 'ANALISA_KODE', 'dt' => 1),
            array('db' => 'SATUAN_NAMA', 'dt' => 2),
            array('db' => 'DETAIL_ANALISA_HARGA', 'dt' => 3),
            array('db' => 'UPAH_ANALISA_VOLUME', 'dt' => 4),
            array('db' => 'UPAH_ANALISA_VOLUME_TERPAKAI', 'dt' => 5),
            array('db' => 'ANALISA_ID', 'dt' => 6),
            array('db' => 'ANALISA_ID', 'dt' => 7)
        );

        echo json_encode(SSP::simple($_GET, 'view_pk_rap', 'RAB_ID', $columns, $baseSql));
    }

    public function getSubcon($RAB_ID) {
        $sql = "SELECT * FROM view_subcon WHERE view_subcon.RAB_ID = {$RAB_ID} AND view_subcon.SUBCON_TIPE = 3";
        $columns = array(
            array('db' => 'SUBCON_NAMA', 'dt' => 0),
            array('db' => 'SUBCON_KODE', 'dt' => 1),
            array('db' => 'SATUAN_NAMA', 'dt' => 2),
            array('db' => 'DETAIL_PEKERJAAN_VOLUME', 'dt' => 3),
            array('db' => 'VOLUME_SISA', 'dt' => 4),
            array('db' => 'DETAIL_PEKERJAAN_HARGA', 'dt' => 5),
            array('db' => 'SUBCON_ID', 'dt' => 6)
        );
        echo json_encode(SSP::simple($_GET, 'view_subcon', 'RAB_ID', $columns, $sql));
    }

    public function update() {
        $id = $this->input->post('PP_ID');
        $flag = $this->input->post('STATUS');
        if ($flag == 1) //draft
            $STATUS_PK_ID = 2;
        else if ($flag == 6) // rejected
            $STATUS_PK_ID = 5;
        else
            $STATUS_PK_ID = 2;

        $column = array(
            'STATUS_PK_ID' => $STATUS_PK_ID,
            'PERMINTAAN_PEKERJAAN_UPDATE_BY' => $this->data['iduseractive'],
            'PERMINTAAN_PEKERJAAN_UPDATE' => date('Y-m-d H:i:s')
        );
        $this->mPermintaanPekerjaan->_update($column, array('PERMINTAAN_PEMBELIAN_ID' => $id));

        // Inserting PP detail material
        $BARANG_ID = $this->input->post('BARANG_ID');
        if (!$BARANG_ID) {
            
        } else {

            $VOLUME_PP = $this->input->post('VOLUME');
            for ($i = 0; $i < sizeof($BARANG_ID); $i++) {
                $detail_transaksi = array(
                    'PERMINTAAN_PEKERJAAN_ID' => $id,
                    'ANALISA_ID' => $BARANG_ID[$i],
                    'VOLUME_PK' => $VOLUME_PP[$i]
                );
                $filter = array(
                    'PERMINTAAN_PEKERJAAN_ID' => $id,
                    'ANALISA_ID' => $BARANG_ID[$i]);
                //print_r($filter);
                if (!$this->mDetailTransaksiPK->exist($filter)) {
                    $this->mDetailTransaksiPK->insert($detail_transaksi);
                } else {
                    $this->mDetailTransaksiPK->_update(array('VOLUME_PK' => $VOLUME_PP[$i]), $filter);
                }
            }
        }
        redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0));
    }

    public function save() {
        $flag = $this->input->post('flag');
        if ($flag == 1) //dari view 1 adalah Proses Setujui
            $STATUS_PK_ID = 2;
        else if ($flag == 0) //dari view 0 adalah Draft
            $STATUS_PK_ID = 1;
        $RAB_ID = $this->input->post('RAB_ID');
        $BARANG_ID = $this->input->post('BARANG_ID');
        $SUBCON_ID = $this->input->post('SUBCON_ID');
        //die(print_r($BARANG_ID));
        $pp = array(
            mPermintaanPekerjaan::RAB => $RAB_ID,
            mPermintaanPekerjaan::USER => $this->data['iduseractive'],
            mPermintaanPekerjaan::CATEGORY => $this->input->post('KATEGORI_PP_ID'),
            mPermintaanPekerjaan::STATUS => $STATUS_PK_ID,
            mPermintaanPekerjaan::TOTAL => $this->input->post('GRAND_TOTAL'),
            'PERMINTAAN_PEKERJAAN_UPDATE_BY' => $this->data['iduseractive'],
            'PERMINTAAN_PEKERJAAN_UPDATE' => date('Y-m-d H:i:s')
        );
        $PERMINTAAN_PEMBELIAN_ID = $this->mPermintaanPekerjaan->insertAndGetLast($pp);
        if (!$BARANG_ID) {
            
        } else {

            $VOLUME_PP = $this->input->post('VOLUME');
            $TIPE_PK = $this->input->post('TYPE');

            for ($i = 0; $i < sizeof($BARANG_ID); $i++) {
                $detail_column = mDetailTransaksiPK::ANALISA;

                if (intval($TIPE_PK[$i]) == 1) {
                    $detail_column = mDetailTransaksiPK::ANALISA;
                } else if (intval($TIPE_PK[$i]) == 2) {
                    $detail_column = mDetailTransaksiPK::LSU;
                } else if (intval($TIPE_PK[$i]) == 3) {
                    $detail_column = mDetailTransaksiPK::OVH;
                } else {
                    $detail_column = mDetailTransaksiPK::OVH_PAKET;
                }

                $detail_transaksi = array(
                    mDetailTransaksiPK::PERMINTAAN => $PERMINTAAN_PEMBELIAN_ID,
                    $detail_column => $BARANG_ID[$i],
                    mDetailTransaksiPK::VOLUME => $VOLUME_PP[$i]
                );
                $this->mDetailTransaksiPK->insert($detail_transaksi);
            }
        }

        if (!$SUBCON_ID) {
            
        } else {

            $VOLUME_PP = $this->input->post('SUBCON_VOLUME');
            $TIPE_PK = $this->input->post('SUBCON_TYPE');
            for ($i = 0; $i < sizeof($SUBCON_ID); $i++) {
                $detail_transaksi = array(
                    mDetailTransaksiPK::PERMINTAAN => $PERMINTAAN_PEMBELIAN_ID,
                    mDetailTransaksiPK::LSU => $SUBCON_ID[$i],
                    mDetailTransaksiPK::VOLUME => $VOLUME_PP[$i]
                );
                $this->mDetailTransaksiPK->insert($detail_transaksi);
            }
        }


        redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0));
    }

    public function viewDetail($PERMINTAAN_PEMBELIAN_ID, $edit = false) {
        $tmp = explode("_", $PERMINTAAN_PEMBELIAN_ID);
        //print_r($tmp);
        $this->data['listPp'] = $this->db->get_where('view_pk', array('PK_ID' => $tmp[0], mPermintaanPekerjaan::RAB => $tmp[1]))->result_array();
        $this->data['editMode'] = $edit;
        //print_r($this->data['listPk']);
        $this->display('acPkDetail', $this->data);
    }

    public function deleteItem() {
        $id = $this->input->post('PP_ID');
        $item_id = $this->input->post('ITEM_ID');
        $rab_id = $this->input->post('RAB_ID');
        $where = array(mDetailTransaksiPK::PERMINTAAN => $id, mDetailTransaksiPK::ANALISA => $item_id);
        $this->mDetailTransaksiPP->_delete($where);
        $data = array('PK' => $id, 'RAB' => $rab_id, 'ITEM_ID' => $item_id);

        echo json_encode($data);
    }

    public function printPDF($idPP) {
        if ($idPP == null)
            echo $idPP;
        else {
            $this->title = "PDF";
            $this->header = 'blank';
            $this->footer = 'blank';
            $this->left_sidebar = 'blank';
            $this->right_sidebar = 'blank';
            $this->script_header = 'lay-scripts/header-report';
            $this->script_footer = 'lay-scripts/footer-report';
            // get detail RAB
            $this->data['PP'] = $this->db->get_where('view_pk', array('PK_ID' => $idPP, 'RAB_ID' => $this->data['PP']['RAB_ID']))->result_array()[0];
            $this->data['detailPP'] = $this->db->get_where('view_pk', array('PK_ID' => $idPP, 'RAB_ID' => $this->data['PP']['RAB_ID']))->result_array();

            // render to PDF
            $this->display('acPkDetailPDF', $this->data);

            $html = $this->output->get_output();
            $this->dompdf->load_html($html);
            $this->dompdf->set_paper('legal', 'landscape');
            $this->dompdf->render();
            $filename = $this->data['PP']['PK_KODE'];
            $this->dompdf->stream($filename . ".pdf", array('Attachment' => 0));
            // direct download
            //$this->dompdf->stream($filename.".pdf");
        }
    }

}
