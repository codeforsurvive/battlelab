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
class Pp extends Implementation_Controller {

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
        $this->load->model('mPermintaan');
        $this->load->model('mDetailTransaksiPP');
        $this->load->model('master/mGudang');
        $this->load->model('master/mDetailOverhead');
        $this->title = "Permintaan Pembelian";
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
        //$this->data['listPp'] = $this->mPermintaan->getTotalPp();
        //print_r($this->data['listPp']);
        $this->display('acPp', $this->data);
    }

    public function getViewPp($level) {
        echo $this->mPermintaan->getTotalPp($level);
    }

    public function approve() {
        $id = $this->input->post(mPermintaan::ID);
        $column = array(
            'STATUS_PP_ID' => 3,
            'VALIDATOR_ID' => $this->data['iduseractive'],
            'PERMINTAAN_PEMBELIAN_VALIDATED' => date('Y-m-d H:i:s')
        );
        $this->mPermintaan->_update($column, array('PERMINTAAN_PEMBELIAN_ID' => $id));
        redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/');
    }

    public function reject() {
        $id = $this->input->post(mPermintaan::ID);
        $column = array(
            'STATUS_PP_ID' => 4,
            'VALIDATOR_ID' => $this->data['iduseractive'],
            'PERMINTAAN_PEMBELIAN_VALIDATED' => date('Y-m-d H:i:s')
        );
        $this->mPermintaan->_update($column, array('PERMINTAAN_PEMBELIAN_ID' => $id));
        //print_r($column);
        redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/');
    }

    public function viewNewPp() {
//        $this->script_footer = 'lay-scripts/footer-addProject';
        $array = array();
        $this->data['listProject'] = $this->mProject->_select($array);
        $this->data['listRab'] = $this->mRab->_select($array);
        $this->data['listKategoriPp'] = $this->db->get_where('kategori_pp', $array)->result_array();
        $this->data['listGudang'] = $this->mGudang->_select($array);
        $this->display('acPpAdd', $this->data);
    }

    public function viewUpdate($COMPOSITE_ID = '0_0') {
        $tmp = explode("_", $COMPOSITE_ID);
        $result = $this->db->get_where('view_pp', array('PERMINTAAN_PEMBELIAN_ID' => $tmp[0], 'RAB_ID' => $tmp[1]))->result_array();
        $array = array();
        $this->data['listKategoriPp'] = $this->db->get_where('kategori_pp', $array)->result_array();
        $this->data['listGudang'] = $this->mGudang->_select($array);
        $this->data['editData'] = json_encode($result);
        $volumes = array();
        for ($i = 0; $i < sizeof($result); $i++) {
            if (!is_nan($result[$i]['BARANG_ID'])) {
                $COMPOSITE_ID = $result[$i]['RAB_ID'] . '_' . $result[$i]['BARANG_ID'] . '_1';
            } else {
                $COMPOSITE_ID = $result[$i]['RAB_ID'] . '_' . $result[$i]['SUBCON_ID'] . '_0';
            }
            $volumes[$i] = $this->getVolumes($COMPOSITE_ID);
        }
        $this->data['volumes'] = json_encode($volumes);

        //print_r($result);
        $this->display('acPpEdit', $this->data);
    }

    public function getOverhead($RAB_ID) {
        $material = $this->db->query("select * from view_overhead_bahan where RAB_ID = {$RAB_ID}")->result_array();
        $paket = $this->db->query("select * from view_overhead_paket_bahan where RAB_ID = {$RAB_ID}")->result_array();

        $overhead = array_merge($material, $paket);

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
        $PROJECT_ID = $this->input->post('PROJECT_ID');
        $RAB_ID = $this->input->post('RAB_ID');
        $KATEGORI_PP_ID = $this->input->post('KATEGORI_PP_ID');
        $listRAP = $this->db->get_where('view_rap', array('RAB_ID' => $RAB_ID))->result_array();
        echo json_encode($listRAP);
    }

    public function getVolumes($COMPOSITE_ID) {
        $tmp = explode('_', $COMPOSITE_ID);
        $RAB_ID = $tmp[0];
        $MATERIAL_ID = $tmp[1];
        $TYPE = $tmp[2];

        if ($TYPE == 1) {
            $result = $this->mPermintaan->getAvailableVolume($RAB_ID, $MATERIAL_ID);
            if (sizeof($result) > 0) {
                $total = floatval($result[0]['BARANG_VOLUME']);
                $used = floatval($result[0]['BARANG_VOLUME_TERPAKAI']);
                $available = $total - $used;

                return array('AVAILABLE' => $available, 'USED' => $used, 'TOTAL' => $total);
            }
        } else {
            $result = $this->mPermintaan->getAvailableSubconVolume($RAB_ID, $MATERIAL_ID);
            if (sizeof($result) > 0) {
                $total = floatval($result[0]['DETAIL_PEKERJAAN_VOLUME']);
                $available = floatval($result[0]['VOLUME_SISA']);
                $used = $total - $available;


                return array('AVAILABLE' => $available, 'USED' => $used, 'TOTAL' => $total);
            }
        }

        //echo json_encode(array('AVAILABLE' => 0, 'USED' => 0, 'TOTAL' => 0));
    }

    public function getCurrentRAPJson($RAB_ID) {
        if (!isset($RAB_ID) || $RAB_ID == null) {
            $RAB_ID = 0;
        }
        $baseSql = "select * from view_rap where RAB_ID = " . $RAB_ID;
        $baseSql = "SELECT master_barang.*, kategori_barang.KATEGORI_BARANG_NAMA, detail_analisa_rab.DETAIL_ANALISA_HARGA, SUM(detail_pekerjaan.DETAIL_PEKERJAAN_VOLUME*detail_analisa_rab.DETAIL_ANALISA_KOEFISIEN) AS BARANG_VOLUME 
            ,(
 		select coalesce( sum(`vPP`.`VOLUME_PP`),0) AS `VOLUME_PP` 
		from `view_pp` `vPP` 
		where 
	 	
				(
						(`vPP`.`RAB_ID` = `detail_pekerjaan`.`RAB_ID`) and
						(`vPP`.`BARANG_ID` = `master_barang`.`BARANG_ID`) and
						(`vPP`.`KATEGORI_PP_ID` = 2)
				)
		group by `vPP`.`BARANG_ID`
) AS `BARANG_VOLUME_TERPAKAI`
            FROM detail_pekerjaan 
		JOIN analisa_rab ON detail_pekerjaan.ANALISA_ID = analisa_rab.ANALISA_ID  
		JOIN kategori_paket_pekerjaan ON detail_pekerjaan.KATEGORI_PEKERJAAN_ID = kategori_paket_pekerjaan.KATEGORI_PEKERJAAN_ID 
		JOIN detail_analisa_rab ON analisa_rab.ANALISA_ID = detail_analisa_rab.ANALISA_ID 
		JOIN master_barang ON detail_analisa_rab.BARANG_ID = master_barang.BARANG_ID
                JOIN kategori_barang ON kategori_barang.KATEGORI_BARANG_ID = master_barang.KATEGORI_BARANG_ID
		WHERE detail_pekerjaan.RAB_ID = $RAB_ID
		GROUP BY master_barang.BARANG_ID";
        //print_r($baseSql);
        $columns = array(
            array('db' => 'BARANG_NAMA', 'dt' => 0),
            array('db' => 'KATEGORI_BARANG_NAMA', 'dt' => 1),
            array('db' => 'BARANG_KODE', 'dt' => 2),
            array('db' => 'SATUAN_NAMA', 'dt' => 3),
            array('db' => 'DETAIL_ANALISA_HARGA', 'dt' => 4),
            array('db' => 'BARANG_VOLUME_TERPAKAI', 'dt' => 5),
            array('db' => 'BARANG_VOLUME', 'dt' => 6),
            array('db' => 'BARANG_ID', 'dt' => 7)
        );

        echo json_encode(SSP::simple($_GET, 'view_rap', 'RAB_ID', $columns, $baseSql));
    }

    public function getSubcon($RAB_ID) {
        $sql = "SELECT * FROM view_subcon WHERE view_subcon.RAB_ID = {$RAB_ID} AND view_subcon.SUBCON_TIPE <> 3";
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

    public function newPp() {
        $flag = $this->input->post('flag');
        if ($flag == 1) //dari view 1 adalah Proses Setujui
            $STATUS_PP_ID = 2;
        else if ($flag == 0) //dari view 0 adalah Draft
            $STATUS_PP_ID = 1;
        $RAB_ID = $this->input->post('RAB_ID');
        $pp = array(
            'PERMINTAAN_PEMBELIAN_KODE' => $this->input->post('PERMINTAAN_PEMBELIAN_KODE'),
            'PETUGAS_ID' => $this->data['iduseractive'],
            'RAB_ID' => $RAB_ID,
            'KATEGORI_PP_ID' => $this->input->post('KATEGORI_PP_ID'),
            'STATUS_PP_ID' => $STATUS_PP_ID,
            'GUDANG_ID' => $this->input->post('GUDANG_ID'),
            'PERMINTAAN_PEMBELIAN_UPDATE_BY' => $this->data['iduseractive'],
            'PERMINTAAN_PEMBELIAN_UPDATE' => date('Y-m-d H:i:s')
        );

        $PERMINTAAN_PEMBELIAN_ID = $this->mPermintaan->insertAndGetLast($pp);
        //var_dump($PERMINTAAN_PEMBELIAN_ID);
        $BARANG_ID = $this->input->post('BARANG_ID');
        $BARANG_KODE = $this->input->post('BARANG_KODE');
        //print_r("BARANG_ID : ");
        //print_r($BARANG_ID);
        //print_r("VOLUME : ");
        //print_r($VOLUME_PP);
        // Inserting PP detail material
        if (!$BARANG_ID) {
            
        } else {

            $VOLUME_PP = $this->input->post('VOLUME');
            for ($i = 0; $i < sizeof($BARANG_ID); $i++) {
                if ($BARANG_KODE[$i] == "LS") {
                    $detail_transaksi = array(
                        'PERMINTAAN_PEMBELIAN_ID' => $PERMINTAAN_PEMBELIAN_ID,
                        'SUBCON_ID' => $BARANG_ID[$i],
                        'VOLUME_PP' => $VOLUME_PP[$i]
                    );
                } else {
                    $detail_transaksi = array(
                        'PERMINTAAN_PEMBELIAN_ID' => $PERMINTAAN_PEMBELIAN_ID,
                        'BARANG_ID' => $BARANG_ID[$i],
                        'VOLUME_PP' => $VOLUME_PP[$i]
                    );
                }
                $this->mDetailTransaksiPP->insert($detail_transaksi);
            }
        }

        // Inserting Subcon
        $SUBCON_ID = $this->input->post('SUBCON_ID');

        //print_r("SUBCON_ID : ");
        //print_r($SUBCON_ID);
        //print_r("VOLUME : ");
        //print_r($VOLUME_PP);
        if (!$SUBCON_ID) {
            
        } else {

            $VOLUME_PP = $this->input->post('SUBCON_VOLUME');
            for ($i = 0; $i < sizeof($SUBCON_ID); $i++) {
                $detail_transaksi = array(
                    'PERMINTAAN_PEMBELIAN_ID' => $PERMINTAAN_PEMBELIAN_ID,
                    'SUBCON_ID' => $SUBCON_ID[$i],
                    'VOLUME_PP' => $VOLUME_PP[$i]
                );
                $this->mDetailTransaksiPP->insert($detail_transaksi);
            }
        }


        //$this->viewUpdate($PERMINTAAN_PEMBELIAN_ID . "_" . $RAB_ID);
        redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0));
    }

    public function getDetail($COMPOSED_ID) {
        $tmp = explode("_", $COMPOSED_ID);
        $result = $this->db->get_where('view_pp', array('PERMINTAAN_PEMBELIAN_ID' => $tmp[0], 'RAB_ID' => $tmp[1]))->result_array();
        //print_r($result);
        echo json_encode($result);
    }

    public function viewDetail($compositeId) {
        $tmp = explode("_", $compositeId);
        //print_r($tmp);
        //$result = $this->db->get_where('view_pp', array('PERMINTAAN_PEMBELIAN_ID' => $tmp[0], 'RAB_ID' => $tmp[1]))->result_array();
        
        //$this->data['listMaterial'] = $result;
        $this->data['listPp'] = $this->mPermintaan->getViewPP($tmp[0], $tmp[1]);
        $temp = $this->mPermintaan->getViewPP(intval($tmp[0]), intval($tmp[1]));
        //print_r($temp);
        //print_r($this->data['listMaterial']);
        //print_r();
        $this->display('acPpDetail', $this->data);
    }

    public function export() {
        $filename = $_POST['FILENAME'];
        $content = $_POST['CONTENT'];
        $type = $_POST['TYPE'];
        //$tmp = explode("_", $compositeId);
        //$result = $this->db->get_where('view_pp', array('PERMINTAAN_PEMBELIAN_ID' => $tmp[0], 'RAB_ID' => $tmp[1]))->result_array();
        
        //$this->data['listMaterial'] = $result;
        //$this->data['listPp'] = $this->mPermintaan->getViewPp($tmp[0], $tmp[1]);
		$file = $filename;
        if ($type == 'pdf') {
            
        } else if ($type == 'excel') {
            $file = rawurldecode($filename) . ".xls";

            header("Content-type: application/vnd.ms-excel");
            header("Content-Disposition: attachment; filename=$file");
            echo rawurldecode($content);
        } else if ($type == 'word') {
            
        }
        return array("FILE" => $file, "TYPE" => $type);
        //$this->mPermintaan->_update($column, array('PERMINTAAN_PEMBELIAN_ID' => $id));
    }
    

    public function showUpdate() {
        $id = $this->input->post("PP_EDIT_ID");
        $rab = $this->input->post("RAB_EDIT_ID");
        $this->data['listProject'] = $this->mProject->_select();
        $this->data['listRab'] = $this->mRab->_select();
        $this->data['listKategoriPp'] = $this->db->get_where('kategori_pp')->result_array();
        $this->data['listGudang'] = $this->mGudang->_select();
        $this->viewDetail($id . "_" . $rab, true);
    }

    public function requestValidation() {
        $id = $this->input->post('PP_ID');
        $flag = $this->input->post('STATUS');
        if ($flag == 1) //draft
            $STATUS_PP_ID = 2;
        else if ($flag == 6) // rejected
            $STATUS_PP_ID = 5;
        else
            $STATUS_PP_ID = 2;
        $column = array(
            'STATUS_PP_ID' => $STATUS_PP_ID,
            'PERMINTAAN_PEMBELIAN_UPDATE_BY' => $this->data['iduseractive'],
            'PERMINTAAN_PEMBELIAN_UPDATE' => date('Y-m-d H:i:s')
        );
        $this->mPermintaan->_update($column, array('PERMINTAAN_PEMBELIAN_ID' => $id));
    }

    public function updatePp() {
        $id = $this->input->post('PP_ID');

        $flag = $this->input->post('flag');
        if ($flag == 1) //draft
            $STATUS_PP_ID = 1;
        else if ($flag == 4) // rejected
            $STATUS_PP_ID = 6;
        else
            $STATUS_PP_ID = 2;

        $column = array(
            'STATUS_PP_ID' => $STATUS_PP_ID,
            'PERMINTAAN_PEMBELIAN_UPDATE_BY' => $this->data['iduseractive'],
            'PERMINTAAN_PEMBELIAN_UPDATE' => date('Y-m-d H:i:s')
        );
        $this->mPermintaan->_update($column, array('PERMINTAAN_PEMBELIAN_ID' => $id));
        // Inserting PP detail material
        $BARANG_ID = $this->input->post('BARANG_ID');
        if (!$BARANG_ID) {
            
        } else {

            $VOLUME_PP = $this->input->post('VOLUME');
            for ($i = 0; $i < sizeof($BARANG_ID); $i++) {
                $detail_transaksi = array(
                    'PERMINTAAN_PEMBELIAN_ID' => $id,
                    'BARANG_ID' => $BARANG_ID[$i],
                    'VOLUME_PP' => $VOLUME_PP[$i]
                );
                $filter = array(
                    'PERMINTAAN_PEMBELIAN_ID' => $id,
                    'BARANG_ID' => $BARANG_ID[$i]);
                //print_r($filter);
                if (!$this->mDetailTransaksiPP->exist($filter)) {
                    $this->mDetailTransaksiPP->insert($detail_transaksi);
                } else {
                    $this->mDetailTransaksiPP->_update(array('VOLUME_PP' => $VOLUME_PP[$i]), $filter);
                }
            }
        }

        // Inserting Subcon
        $SUBCON_ID = $this->input->post('SUBCON_ID');

        if (!$SUBCON_ID) {
            
        } else {

            $VOLUME_PP = $this->input->post('SUBCON_VOLUME');
            for ($i = 0; $i < sizeof($SUBCON_ID); $i++) {
                $detail_transaksi = array(
                    'PERMINTAAN_PEMBELIAN_ID' => $id,
                    'SUBCON_ID' => $SUBCON_ID[$i],
                    'VOLUME_PP' => $VOLUME_PP[$i]
                );
                $filter = array(
                    'PERMINTAAN_PEMBELIAN_ID' => $id,
                    'SUBCON_ID' => $SUBCON_ID[$i]);
                if (!$this->mDetailTransaksiPP->exist($filter)) {
                    $this->mDetailTransaksiPP->insert($detail_transaksi);
                } else {
                    $this->mDetailTransaksiPP->_update(array('VOLUME_PP' => $VOLUME_PP[$i]), $filter);
                }
            }
        }
        redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0));
    }

    public function delete() {
        $id = $this->input->post(mPermintaan::ID);
        $this->mDetailTransaksiPP->_delete(array(mDetailTransaksiPP::ID => $id));
        $this->mPermintaan->_delete(array(mPermintaan::ID => $id));
        redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/');
    }

    public function deleteItem() {
        $id = $this->input->post('PP_ID');
        $tipe = $this->input->post('TYPE');
        $item_id = $this->input->post('ITEM_ID');
        $rab_id = $this->input->post('RAB_ID');
        $where = array();
        if (intval($tipe) == 1) {
            $where = array(mDetailTransaksiPP::ID => $id, 'BARANG_ID' => $item_id);
        } else {
            $where = array(mDetailTransaksiPP::ID => $id, 'SUBCON_ID' => $item_id);
        }
        $this->mDetailTransaksiPP->_delete($where);
        $data = array('PP' => $id, 'RAB' => $rab_id, 'ITEM_ID' => $item_id, 'TIPE' => $tipe);
        //print_r($data);
        echo json_encode($data);
        //redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/viewUpdate/' . $id . "_" . $rab_id);
    }
	
	public function printPDF($idPP){
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
			$this->data['PP'] = $this->mPermintaan->getDetailPP($idPP)[0];
			$this->data['detailPP'] = $this->db->get_where('view_pp', array('PERMINTAAN_PEMBELIAN_ID' => $idPP, 'RAB_ID' => $this->data['PP']['RAB_ID']))->result_array();
            
			// render to PDF
            $this->display('acPpDetailPDF', $this->data);
			
			$html = $this->output->get_output();
			$this->dompdf->load_html($html);
			$this->dompdf->set_paper('legal', 'landscape');
			$this->dompdf->render();
			$filename = $this->data['PP']['PERMINTAAN_PEMBELIAN_KODE'];
			$this->dompdf->stream($filename.".pdf",array('Attachment'=>0));
			// direct download
			//$this->dompdf->stream($filename.".pdf");
        }
	}

}
