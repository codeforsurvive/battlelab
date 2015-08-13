<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Stok extends Implementation_Controller {

    const role_admin = '';
    const role_viewer = 'rab_viewer';
    const role_validator = '';

    private $roles = array();

    public function __construct() {
        parent::__construct();
        $this->load->model(array('mStok'));
        $this->title = "Stok Material";
        $this->roles = json_decode($this->data['role']);
        if ((in_array(Stok::role_admin, $this->roles) || in_array(Stok::role_validator, $this->roles) || in_array(Stok::role_viewer, $this->roles)) == false) {
            echo '';
            exit(0);
        }
    }

    public function index() {
        $this->data['jenis_stok'] = array('1' => 'Stok Gudang', '2' => 'Stok RAB');
        $this->display('acStok', $this->data);
    }

    function history() {
        $id_barang = (int) $this->input->get('id_barang');
        $id_subcon = (int) $this->input->get('id_subcon');
        $id_overhead = (int) $this->input->get('id_overhead');
        $jenis_history = $this->input->get('jenis_history');
        $id_tipe = (int) $this->input->get('id_tipe');
        $this->data['barang'] = array();
        $this->data['tempat'] = array();
        if ($id_barang > 0) {
            $this->data['barang'] = $this->db->select('BARANG_NAMA, SATUAN_NAMA')->get_where('master_barang', array('BARANG_ID' => $id_barang))->result_array()[0];
        } else if ($id_subcon > 0) {
            $this->data['barang'] = $this->db->select('SUBCON_NAMA AS BARANG_NAMA, SATUAN_NAMA')->get_where('subcon', array('SUBCON_ID' => $id_subcon))->result_array()[0];
        } else if ($id_overhead > 0) {
            $this->data['barang'] = $this->db->select('PAKET_OVERHEAD_MATERIAL_NAMA AS BARANG_NAMA, SATUAN_NAMA')->get_where('paket_overhead_material', array('PAKET_OVERHEAD_MATERIAL_ID' => $id_overhead))->result_array()[0];
        }
        if ($jenis_history == 'rab') {
            $this->data['tempat'] = $this->db->select('RAB_ID AS TEMPAT_ID, RAB_NAMA AS TEMPAT_NAMA, RAB_KODE AS TEMPAT_KODE')->get_where('rab_transaction', array('RAB_ID' => $id_tipe))->result_array()[0];
            $this->data['history'] = $this->mStok->get_history_in_rab($id_tipe, $id_barang, $id_subcon, $id_overhead);
        } else if ($jenis_history == 'gudang') {
            $this->data['tempat'] = $this->db->select("GUDANG_ID AS TEMPAT_ID, CONCAT(GUDANG_NAMA,' ',GUDANG_LOKASI) AS TEMPAT_NAMA, GUDANG_KODE AS TEMPAT_KODE", false)->get_where('master_gudang', array('GUDANG_ID' => $id_tipe))->result_array()[0];
            $this->data['history'] = $this->mStok->get_history_in_gudang($id_tipe, $id_barang, $id_subcon, $id_overhead);
        }
        $this->data['history'] = $this->urutkan($this->data['history']);
        $this->display('acStokHistory', $this->data);
    }

    private function urutkan($history) {
        //print_r($history);
        for ($i = 0, $i2 = count($history); $i < $i2; $i++) {
            for ($j = $i; $j < $i2; $j++) {
                $a = $history[$i];
                $b = $history[$j];
                if (strcmp($a['TANGGAL_TRANSAKSI'], $b['TANGGAL_TRANSAKSI']) > 0) {
                    $history[$i] = $b;
                    $history[$j] = $a;
                }
            }
        }
        return $history;
    }

    public function get_stok_rab_datatable() {
        $start = (int) $this->input->post('start');
        $length = (int) $this->input->post('length');
        $draw = (int) $this->input->post('draw');
        $id_rab = (int) $this->input->post('id_rab');
        $hasil = $this->mStok->get_stok_rab_datatable($id_rab, $start, $length);
        $hasil['draw'] = $draw;
        echo json_encode($hasil);
    }

    public function get_stok_gudang_datatable() {
        $start = (int) $this->input->post('start');
        $length = (int) $this->input->post('length');
        $draw = (int) $this->input->post('draw');
        $id_gudang = (int) $this->input->post('id_gudang');
        $hasil = $this->mStok->get_stok_gudang_datatable($id_gudang, $start, $length);
        $hasil['draw'] = $draw;
        echo json_encode($hasil);
    }

    function get_list_gudang() {
        echo json_encode($this->mStok->get_list_gudang_in_stok());
    }

    function get_list_rab() {
        echo json_encode($this->mStok->get_list_rab_in_stok());
    }

    function get_history_barang() {
        $id_barang = (int) $this->input->post('id_barang');
        $jenis_history = $this->input->post('jenis_history');
        $id_asal = (int) $this->input->post('id_asal');
        if ($jenis_history == 'rab') {
            echo json_encode($this->mStok->get_history_barang_rab($id_barang, $id_asal));
        } else {
            echo json_encode($this->mStok->get_history_barang_gudang($id_barang, $id_asal));
        }
    }

}
