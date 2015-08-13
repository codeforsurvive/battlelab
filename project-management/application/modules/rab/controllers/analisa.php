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
class Analisa extends Plan_Controller {

    //1. seluruh fungsi yang tidak public, menggunakan awalan '_' , contoh: _getProperty()
    //2. di atas fungsi diberikan penjelasan proses apa yang dilakukan. dari mana ambil data, 
    //inputnya apa dan outputnya apa. contoh di fungsi index()
    //3. Penamaan fungsi harus PUNUK ONTA dengan awalan huruf kecil $ Menggunakan Bahasa Inggris
    //4. Penamaan nama fungsi maksimal 3 kata

    public function __construct() {
        parent::__construct();

        $this->left_sidebar = 'lay-left-sidebar/perencanaan';
        $this->load->model('mAnalisa');
        $this->load->model('mAnalisaRab');
        $this->load->model('mDetailAnalisa');
        $this->load->model('mDetailAnalisaRab');
        $this->load->model('master/mKategoriAnalisa');
        $this->load->model('master/mSatuanBarang');
        $this->load->model('master/mUpah');
        $this->load->model('master/mLokasiUpah');
        $this->load->model('master/mBarang');
        $this->checkRole();
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
        $this->title = "Master Analisa";
        $this->status = mUserRole::ROLE_VIEW;
        $this->display('acAnalisaView', $this->data);
    }

    public function checkRole() {
        $roles = ["analisa_admin", "analisa_viewer"];
        foreach ($roles as $i) {
            if (in_array($i, $this->data['roleArray']))
                return true;
        }
        redirect(base_url() . "dashboard/Perencanaan");
    }

    public function add() {
        $this->title = "Master Analisa";

        $this->data['satuan'] = $this->mSatuanBarang->_select(array(mSatuanBarang::ACTIVE => 1));
        $this->data['lokasi'] = $this->mLokasiUpah->_select(array(mLokasiUpah::ACTIVE => 1));
        $this->data['kategori'] = $this->mKategoriAnalisa->_select(array(mKategoriAnalisa::ACTIVE => 1));
        $this->display('acAnalisaAdd', $this->data);
    }

    public function detailAnalisaRAB() {
        $this->title = "Detail Analisa";
        $idAnalisa = $this->input->post('id');
        if ($idAnalisa == null)
            echo $idAnalisa;
        else {
            $this->data['detail_barang'] = $this->mDetailAnalisaRab->getDetailBarang($idAnalisa);
            $this->data['detail_upah'] = $this->mDetailAnalisaRab->getDetailUpah($idAnalisa);
            $this->data['detail_analisa'] = $this->mAnalisaRab->_joinSelect('analisa_rab', array('kategori_analisa' => 'analisa_rab.KATEGORI_ANALISA_ID = kategori_analisa.KATEGORI_ANALISA_ID', 'lokasi_upah' => 'lokasi_upah.LOKASI_UPAH_ID = analisa_rab.LOKASI_UPAH_ID'), array(mAnalisa::ID => $idAnalisa), array('analisa_rab.*', 'lokasi_upah.LOKASI_UPAH_NAMA AS LOKASI_UPAH_NAMA', 'kategori_analisa.KATEGORI_ANALISA_NAMA AS KATEGORI_ANALISA_NAMA'))[0];
            echo json_encode($this->data);
        }
    }

    public function detailAnalisa() {
        $this->title = "Detail Analisa";
        $idAnalisa = $this->input->post('id');
        if ($idAnalisa == null)
            echo $idAnalisa;
        else {
            $this->data['detail_barang'] = $this->mDetailAnalisa->getDetailBarang($idAnalisa);
            $this->data['detail_upah'] = $this->mDetailAnalisa->getDetailUpah($idAnalisa);
            //$this->data['detail_analisa'] = $this->mAnalisaRab->_joinSelect('analisa_rab', array('kategori_analisa' => 'analisa_rab.KATEGORI_ANALISA_ID = kategori_analisa.KATEGORI_ANALISA_ID', 'lokasi_upah' => 'lokasi_upah.LOKASI_UPAH_ID = analisa_rab.LOKASI_UPAH_ID'), array(mAnalisa::ID => $idAnalisa), array('analisa_rab.*','lokasi_upah.LOKASI_UPAH_NAMA AS LOKASI_UPAH_NAMA','kategori_analisa.KATEGORI_ANALISA_NAMA AS KATEGORI_ANALISA_NAMA'))[0];
            echo json_encode($this->data);
        }
    }

    public function edit() {
        $this->title = "Master Analisa";
        $idAnalisa = $this->input->post('id_to_edit');
        if ($idAnalisa == null)
            redirect(base_url() . "rab/analisa");
        else {
            $this->data['detail_barang'] = $this->mDetailAnalisa->getDetailBarang($idAnalisa);
            $this->data['detail_upah'] = $this->mDetailAnalisa->getDetailUpah($idAnalisa);
            $this->data['satuan'] = $this->mSatuanBarang->_select(array(mSatuanBarang::ACTIVE => 1));
        $this->data['lokasi'] = $this->mLokasiUpah->_select(array(mLokasiUpah::ACTIVE => 1));
        $this->data['kategori'] = $this->mKategoriAnalisa->_select(array(mKategoriAnalisa::ACTIVE => 1));
            $this->data['analisa'] = $this->mAnalisa->_select(array(mAnalisa::ID => $idAnalisa));
            $this->display('acAnalisaEdit', $this->data);
        }
    }

    public function delete() {
        $idAnalisa = $this->input->post("tobe_deleted_id");
        $this->mAnalisa->_delete(array(mAnalisa::ID => $idAnalisa), mAnalisa::ACTIVE);
        redirect(base_url() . "rab/analisa");
    }

    public function simpanAnalisa() {
        $namaAnalisa = $this->input->post('nama');
        $kodeAnalisa = $this->input->post('kode');
        $satuanAnalisa = $this->input->post('satuan');
        $lokasiAnalisa = $this->input->post('lokasi');
        $kategoriAnalisa = $this->input->post('kategori');
        $barangAnalisa = json_decode($this->input->post('barang'));
        $upahAnalisa = json_decode($this->input->post('upah'));

        $_insertedAnalisa = array(
            'SATUAN_NAMA' => $satuanAnalisa,
            'KATEGORI_ANALISA_ID' => $kategoriAnalisa,
            'LOKASI_UPAH_ID' => $lokasiAnalisa,
            'ANALISA_KODE' => $kodeAnalisa,
            'ANALISA_NAMA' => $namaAnalisa,
            'ANALISA_ACTIVE' => 1
        );
        $this->mAnalisa->_insert($_insertedAnalisa);
        $idAnalisa = $this->mAnalisa->_getRecentID();
        foreach ($barangAnalisa as $item) {
            $_insertedDetailAnalisa = array(
                'BARANG_ID' => $item->id,
                'ANALISA_ID' => $idAnalisa,
                'DETAIL_ANALISA_KOEFISIEN' => $item->koef
            );
            $this->mDetailAnalisa->_insert($_insertedDetailAnalisa);
        }
        foreach ($upahAnalisa as $item) {
            $_insertedDetailAnalisa = array(
                'UPAH_ID' => $item->id,
                'ANALISA_ID' => $idAnalisa,
                'DETAIL_ANALISA_KOEFISIEN' => $item->koef
            );
            $this->mDetailAnalisa->_insert($_insertedDetailAnalisa);
        }
        echo "success";
    }

    public function updateAnalisa() {
        $idAnalisa = $this->input->post('id');
        $namaAnalisa = $this->input->post('nama');
        $kodeAnalisa = $this->input->post('kode');
        $satuanAnalisa = $this->input->post('satuan');
        $lokasiAnalisa = $this->input->post('lokasi');
        $kategoriAnalisa = $this->input->post('kategori');
        $barangAnalisa = json_decode($this->input->post('barang'));
        $upahAnalisa = json_decode($this->input->post('upah'));
        $_updatedAnalisa = array(
            'SATUAN_NAMA' => $satuanAnalisa,
            'KATEGORI_ANALISA_ID' => $kategoriAnalisa,
            'LOKASI_UPAH_ID' => $lokasiAnalisa,
            'ANALISA_KODE' => $kodeAnalisa,
            'ANALISA_NAMA' => $namaAnalisa,
            'ANALISA_ACTIVE' => 1
        );
        $this->mAnalisa->_update($_updatedAnalisa, array(mAnalisa::ID => $idAnalisa));
        $this->mDetailAnalisa->_delete(array('ANALISA_ID' => $idAnalisa));
        foreach ($barangAnalisa as $item) {
            $_insertedDetailAnalisa = array(
                'BARANG_ID' => $item->id,
                'ANALISA_ID' => $idAnalisa,
                'DETAIL_ANALISA_KOEFISIEN' => $item->koef
            );
            $this->mDetailAnalisa->_insert($_insertedDetailAnalisa);
        }
        foreach ($upahAnalisa as $item) {
            $_insertedDetailAnalisa = array(
                'UPAH_ID' => $item->id,
                'ANALISA_ID' => $idAnalisa,
                'DETAIL_ANALISA_KOEFISIEN' => $item->koef
            );
            $this->mDetailAnalisa->_insert($_insertedDetailAnalisa);
        }
        echo "success";
    }

    public function getViewAnalisa() {
        echo $this->mAnalisa->getViewAnalisa();
    }

    public function getViewAnalisaById() {
        $id = $this->input->get("lokasi_id");
        echo $this->mAnalisa->getViewAnalisaById($id);
    }

}
