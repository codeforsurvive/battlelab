<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Bpm extends Implementation_Controller {

    const BPM_PREFIX = 'BPM';
    const role_admin = 'bpm_admin';
    const role_viewer = 'bpm_viewer';
    const role_validator = 'bpm_validator';

    private $roles = '';

    public function __construct() {
        parent::__construct();
        $this->load->model(array('projects/mProject', 'projects/mMainProject', 'rab/mRab', 'mDetailBpm', 'mBpm', 'mStok'));
        $this->title = "Bon Pemakaian Barang";
        $this->roles = json_decode($this->data['role']);
        if ((in_array(Bpm::role_admin, $this->roles) || in_array(Bpm::role_validator, $this->roles) || in_array(Bpm::role_viewer, $this->roles)) == false) {
            echo 'Anda tidak berhak mengakses halaman ini';
            exit(0);
        }
    }

    public function index() {
        $this->display('acBpm', $this->data);
    }

    public function viewNewBPM() {
        if ((in_array(Bpm::role_admin, $this->roles) ) == false) {
            echo 'Anda tidak berhak mengakses halaman ini';
            exit(0);
        }
        $this->data['list_gudang'] = $this->mBpm->getListGudang();
        $this->data['list_main_project'] = $this->mBpm->get_list_main_project();
        $this->display('acBpmAdd', $this->data);
    }

    function get_keterangan_validasi() {
        $id_bpm = (int) $this->input->get('id');
        $lbpm = $this->db->get_where('bpm', array('BPM_ID' => $id_bpm))->result_array();
        if (count($lbpm) > 0) {
            $bpm = $lbpm[0];
            if ($bpm['STATUS_BPM_ID'] != '3') {
                return;
            }
            $lpengguna = $this->db->get_where('pengguna', array('PENGGUNA_ID' => $bpm['VALIDATOR_ID']))->result_array();
            if (count($lpengguna) > 0) {
                $pengguna = $lpengguna[0];
                echo '<span class="fa fa-check"></span> Sudah Divalidasi oleh ' . $pengguna['PENGGUNA_NAMA'] . ' pada ' . $bpm['BPM_TANGGAL'];
            }
        }
    }

    function get_list_main_project() {
        $id_gudang = (int) $this->input->get('id_gudang');
        echo json_encode($this->mBpm->get_list_main_project($id_gudang));
    }

    function getListSubProject() {
        $idMainProject = (int) $this->input->get('idMainProject');
        $subProject = $this->mBpm->getListSubProject($idMainProject, (int) $this->input->get('id_gudang'));
        echo json_encode($subProject);
    }

    function getListRAB() {
        $idProject = (int) $this->input->get('idProject');
        $listRAB = $this->mBpm->getListRAB($idProject, (int) $this->input->get('id_gudang'));
        echo json_encode($listRAB);
    }

    function getStokBarang() {
        $idRAB = (int) $this->input->post('id_rab');
        $id_gudang = (int) $this->input->post('id_gudang');
        $id_bpm = (int) $this->input->post('id_bpm');
        $draw = (int) $this->input->post('draw');
        $start = (int) $this->input->post('start');
        $length = (int) $this->input->post('length');
        $order = $this->input->post('order');
        $search = $this->input->post('search');
        $hasil = $this->mBpm->getStokDataTable($idRAB, $id_gudang, $id_bpm, $start, $length, $search, $order);
        $hasil['draw'] = $draw;
        echo json_encode($hasil);
    }

    function BPMAdd() {
        if ((in_array(Bpm::role_admin, $this->roles) ) == false) {
            echo 'Anda tidak berhak mengakses halaman ini';
            exit(0);
        }
        $this->db->trans_begin();
        $id_gudang = (int) $this->input->post('id_gudang');
        $id_project = (int) $this->input->post('id_project');
        $keterangan = $this->input->post('keterangan');
        $peminta_barang = $this->input->post('peminta_barang');
        $flag = (int) $this->input->post('flag');
        $list_volume = $this->input->post('volume');
        $list_RAB = $this->input->post('id_rab');
        $list_barang = $this->input->post('id_barang');
        $list_subcon = $this->input->post('id_subcon');
        $list_overhead = $this->input->post('id_overhead');
        $mys = $this->session->userdata('logged_in');

        if ($flag != 2) {
            $flag = 1;
        }
        $newBPM = array(
            'BPM_KETERANGAN' => $keterangan,
            'STATUS_BPM_ID' => $flag,
            'PETUGAS_GUDANG_ID' => $mys['PENGGUNA_ID'],
            'GUDANG_ID' => $id_gudang,
            'PROJECT_ID' => $id_project,
            'PEMINTA_BARANG' => $peminta_barang
        );

        $idBPM = $this->mBpm->_insert($newBPM);
        $jumlahBarang = count($list_barang);
        $list_rab2 = array();
        for ($i = 0; $i < $jumlahBarang; $i++) {
            $id_barang = (int) $list_barang[$i];
            $id_subcon = (int) $list_subcon[$i];
            $id_overhead = (int) $list_overhead[$i];
            $id_rab = (int) $list_RAB[$i];
            $volume = (float) $list_volume[$i];
            $sesuai_project = false;
            //cek apakah rab yang dimasukkan ke dalam detail bpm masih dalam 1 project
            if (!isset($list_rab2[$id_rab])) {
                $rab2 = $this->db->get_where('rab_transaction', array('RAB_ID' => $id_rab, 'RAB_STATUS_APPROVAL_ID' => 3))->result_array();
                if (count($rab2) > 0) {
                    $rab2 = $rab2[0];
                    $list_rab2[$id_rab] = $rab2;
                    if ($rab2['PROJECT_ID'] == $id_project) {
                        $sesuai_project = true;
                    }
                }
            } else {
                $rab2 = $list_rab2[$id_rab];
                if ($rab2['PROJECT_ID'] == $id_project) {
                    $sesuai_project = true;
                }
            }
            if ($sesuai_project) {
                if ($id_barang > 0) {
                    $this->mDetailBpm->_insert(array('BPM_ID' => $idBPM, 'RAB_ID' => $id_rab, 'VOLUME' => $volume, 'BARANG_ID' => $id_barang));
                } else if ($id_subcon > 0) {
                    $this->mDetailBpm->_insert(array('BPM_ID' => $idBPM, 'RAB_ID' => $id_rab, 'VOLUME' => $volume, 'SUBCON_ID' => $id_subcon));
                } else if ($id_overhead > 0) {
                    $this->mDetailBpm->_insert(array('BPM_ID' => $idBPM, 'RAB_ID' => $id_rab, 'VOLUME' => $volume, 'PAKET_OVERHEAD_MATERIAL_ID' => $id_overhead));
                }
            }
        }
        $this->db->trans_complete();
        redirect(base_url() . 'p-material/bpm/viewDetail?id=' . $idBPM);
    }

    public function printPDF() {
        $id = (int) $this->input->get('id');
        $bpm = $this->mBpm->getBPMById($id);
        if ($bpm == null) {
            echo 'id tidak valid';
            exit(0);
        }
        $this->data['bpm'] = $bpm;
        $this->data['idBPM'] = $bpm['BPM_ID'];
        $this->data['detailBPM'] = $this->mDetailBpm->getDetailBPM($id);
        $this->theme_layout = 'html2fpdf';
        $this->header = 'blank';
        $this->footer = 'blank';
        $this->left_sidebar = 'blank';
        $this->right_sidebar = 'blank';
        $this->script_header = 'lay-scripts/header-report';
        $this->script_footer = 'lay-scripts/footer-report';
        $this->display('acBpmPdf', $this->data);
        $html = $this->output->get_output();
        $this->dompdf->load_html($html);
        $this->dompdf->set_paper('legal', 'landscape');
        $this->dompdf->render();
        $this->dompdf->stream("BPM - " . $bpm['BPM_KODE'] . ".pdf", array('Attachment' => 0));
    }

    function viewDetail() {
        $idBPM = $this->input->get('id');
        $bpm = $this->mBpm->getBPMById($idBPM);
        $this->data['bpm'] = $bpm;
        $this->data['idBPM'] = $bpm['BPM_ID'];
        $this->data['detailBPM'] = $this->mDetailBpm->getDetailBPM($idBPM);
        $this->display('acBpmDetail', $this->data);
    }

    function listBPM() {
        $this->display('acBpm', $this->data);
    }

    function getListBPMDataTable() {
        $start = (int) $this->input->post('start');
        $length = (int) $this->input->post('length');
        $draw = (int) $this->input->post('draw');
        $order = $this->input->post('order');
        $search = $this->input->post('search');
        $hasil = $this->mBpm->getListBPMDataTable($start, $length, $order, $search);
        $hasil['draw'] = $draw;
        echo json_encode($hasil);
    }

    public function delete() {
        if ((in_array(Bpm::role_admin, $this->roles) ) == false) {
            echo 'Anda tidak berhak mengakses halaman ini';
            exit(0);
        }
        $id_bpm = (int) $this->input->get('id_bpm');
        $bpm = $this->mBpm->getBPMById($id_bpm);
        if ($bpm == null) {
            echo 'bpm is null';
            //redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0));
        } else if (in_array($bpm['STATUS_BPM_ID'], array(4, 1))) {
            $this->db->trans_begin();
            $this->mDetailBpm->_delete(array('BPM_ID' => $id_bpm));
            echo 'bpm dihapus';
            $this->mBpm->_delete(array('BPM_ID' => $id_bpm));
            $this->db->trans_complete();
            //redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0));
        } else {
            echo 'bpm dalam status yang tidak dapat dihapus';
            //redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0));
        }
        redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0));
    }

    public function validate() {
        if (( in_array(Bpm::role_validator, $this->roles) ) == false) {
            echo 'Anda tidak berhak mengakses halaman ini';
            exit(0);
        }
        $id_bpm = (int) $this->input->get('ID_BPM');
        $bpm = $this->mBpm->getBPMById($id_bpm);
        $my = $this->session->userdata('logged_in');
        if ($bpm == null) {
            echo 'bpm is null';
        } else if ($bpm['STATUS_BPM_ID'] == '2' || $bpm['STATUS_BPM_ID'] == '5') {
            $this->db->trans_begin();
            echo 'change status bpm<br/>';
            $this->mBpm->_update(array('STATUS_BPM_ID' => 3, 'VALIDATOR_ID' => $my['PENGGUNA_ID'], 'BPM_TANGGAL_VALIDASI' => date('y-m-d h:i:s')), array('BPM_ID' => $id_bpm));
            $detailBPM = $this->db->get_where('detail_bpm', array('BPM_ID' => $id_bpm))->result_array();
            $keluar_valid = true;
            foreach ($detailBPM as $dbpm) {
                print_r($dbpm);
                if ($dbpm['BARANG_ID'] > 0) {
                    $keluar_valid = $this->mStok->stok_barang_keluar($dbpm['RAB_ID'], $bpm['GUDANG_ID'], $dbpm['BARANG_ID'], $dbpm['VOLUME']);
                } else if ($dbpm['SUBCON_ID'] > 0) {
                    $keluar_valid = $this->mStok->stok_subcon_keluar($dbpm['RAB_ID'], $bpm['GUDANG_ID'], $dbpm['SUBCON_ID'], $dbpm['VOLUME']);
                } else if ($dbpm['PAKET_OVERHEAD_MATERIAL_ID'] > 0) {
                    $keluar_valid = $this->mStok->stok_overhead_keluar($dbpm['RAB_ID'], $bpm['GUDANG_ID'], $dbpm['PAKET_OVERHEAD_MATERIAL_ID'], $dbpm['VOLUME']);
                }
                if (!$keluar_valid)
                    break;
            }
            if (!$keluar_valid) {
                echo 'rollback<br/>';
                $this->db->trans_rollback();
            } else {
                echo 'commit<br/>';
                $this->db->trans_complete();
            }
            //redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0));
        } else {
            echo 'bpm dalam status yang tidak dapat validasi';
            //redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0));
        }
        redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/viewDetail?id=' . $id_bpm);
    }

    public function reject() {
        if (( in_array(Bpm::role_validator, $this->roles) ) == false) {
            echo 'Anda tidak berhak mengakses halaman ini';
            exit(0);
        }
        $id_bpm = (int) $this->input->get('ID_BPM');
        $bpm = $this->mBpm->getBPMById($id_bpm);
        if ($bpm == null) {
            echo 'bpm is null';
            //redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0));
        } else if ($bpm['STATUS_BPM_ID'] == '2' || $bpm['STATUS_BPM_ID'] == '5') {
            $this->db->trans_begin();
            $this->mBpm->_update(array('STATUS_BPM_ID' => 4), array('BPM_ID' => $id_bpm));
            $this->db->trans_complete();
            //redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0));
        } else {
            echo 'bpm dalam status yang tidak dapat validasi';
            //redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0));
        }
        redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/viewDetail?id=' . $id_bpm);
    }

    public function setujui() {
        if ((in_array(Bpm::role_admin, $this->roles) ) == false) {
            echo 'Anda tidak berhak mengakses halaman ini';
            exit(0);
        }
        $id_bpm = (int) $this->input->get('ID_BPM');
        $bpm = $this->mBpm->getBPMById($id_bpm);
        if ($bpm == null) {
            echo 'bpm is null';
            //redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0));
        } else if ($bpm['STATUS_BPM_ID'] == '1') {
            $this->db->trans_begin();
            $this->mBpm->_update(array('STATUS_BPM_ID' => 2), array('BPM_ID' => $id_bpm));
            $this->db->trans_complete();
            //redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0));
        } else {
            echo 'bpm dalam status yang tidak dapat disetujui';
            //redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0));
        }
        redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/viewDetail?id=' . $id_bpm);
    }

    public function viewEdit() {
        if ((in_array(Bpm::role_admin, $this->roles) ) == false) {
            echo 'Anda tidak berhak mengakses halaman ini';
            exit(0);
        }
        $id_bpm = (int) $this->input->get('ID_BPM');
        $bpm = $this->mBpm->getBPMById($id_bpm);
        if ($bpm == null) {
            echo 'bpm is null';
            redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0));
        } else if ($bpm['STATUS_BPM_ID'] == '1' || $bpm['STATUS_BPM_ID'] == '4') {
            $this->data['bpm'] = $bpm;
            $this->data['list_main_project'] = $this->mBpm->get_list_main_project($bpm['GUDANG_ID']);
            $this->data['list_project'] = $this->mBpm->getListSubProject($bpm['MAIN_PROJECT_ID'], $bpm['GUDANG_ID']);
            $this->data['list_rab'] = $this->mBpm->getListRAB($bpm['PROJECT_ID'], $bpm['GUDANG_ID']);
            $this->data['list_gudang'] = $this->mBpm->getListGudang();
            $this->display('acBpmEdit', $this->data);
        } else {
            echo 'bpm dalam status yang tidak dapat disetujui';
            redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0));
        }
    }

    public function getDetailBPM() {
        $id_bpm = (int) $this->input->get('id_bpm');
        $detail = $this->mDetailBpm->getDetailBPM($id_bpm);
        echo json_encode($detail);
    }

    public function edit() {
        if ((in_array(Bpm::role_admin, $this->roles) ) == false) {
            echo 'Anda tidak berhak mengakses halaman ini';
            exit(0);
        }
        $id_bpm = (int) $this->input->post('ID_BPM');
        $bpm = $this->mBpm->getBPMById($id_bpm);
        if ($bpm == null) {
            echo 'bpm is null';
            //redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0));
        } else if ($bpm['STATUS_BPM_ID'] == '1' || $bpm['STATUS_BPM_ID'] == '4') {
            $this->db->trans_begin();
            $flag = 1;
            if ($bpm['STATUS_BPM_ID'] == '1') {
                if ((int) $this->input->post('flag') == 2) {
                    $flag = 2;
                }
            } else if ($bpm['STATUS_BPM_ID'] == '4') {
                $flag = 5;
            }
            $keterangan = $this->input->post('keterangan');
            $peminta_barang = $this->input->post('peminta_barang');
            $id_gudang = (int) $this->input->post('id_gudang');
            $id_project = (int) $this->input->post('id_project');
            $where = array(
                'BPM_ID' => $id_bpm
            );
            $update = array(
                'BPM_KETERANGAN' => $keterangan,
                'STATUS_BPM_ID' => $flag,
                'GUDANG_ID' => $id_gudang,
                'PROJECT_ID' => $id_project,
                'PEMINTA_BARANG' => $peminta_barang
            );
            $this->mBpm->_update($update, $where);
            $detail = $this->db->get_where('detail_bpm', array('BPM_ID' => $id_bpm))->result_array();
            $listDetailLama = array();
            foreach ($detail as $d) {
                $listDetailLama[] = (int) $d['BPM_ID'] . '_' . (int) $d['RAB_ID'] . '_' . (int) $d['BARANG_ID'] . '_' . (int) $d['SUBCON_ID'] . '_' . (int) $d['PAKET_OVERHEAD_MATERIAL_ID'];
            }
            $listDetailLamaTerpakai = array();
            $list_rab = $this->input->post('id_rab');
            $list_volume = $this->input->post('volume');
            $list_barang = $this->input->post('id_barang');
            $list_subcon = $this->input->post('id_subcon');
            $list_overhead = $this->input->post('id_overhead');
            $jumlahData = count($list_barang);
            $list_rab2 = array();
            //memasukkan detail bpm
            for ($i = 0; $i < $jumlahData; $i++) {
                $rab = (int) $list_rab[$i];
                $vol = (float) $list_volume[$i];
                $barang = (int) $list_barang[$i];
                $subcon = (int) $list_subcon[$i];
                $overhead = (int) $list_overhead[$i];
                $rab_valid = false;
                //cek apakah id rab saat ini sudah pernah di query dari database
                //rab yang dimasukkan harus sesuai project dan gudangnya
                if (isset($list_rab2[$rab])) {
                    $o_rab = $list_rab2[$rab];
                    if ($o_rab['PROJECT_ID'] == $id_project) {
                        $rab_valid = true;
                    }
                } else {
                    $n_rab = $this->db->get_where('rab_transaction', array('RAB_ID' => $rab, 'RAB_STATUS_APPROVAL_ID' => 3))->result_array();
                    if (count($n_rab) > 0) {
                        $n_rab = $n_rab[0];
                        if ($n_rab['PROJECT_ID'] == $id_project) {
                            $rab_valid = true;
                        }
                    }
                }
                if ($rab_valid) {
                    //jika rab valid, di cek apakah detail yang dimasukkan user merupakan update
                    //data lama atau data baru
                    $id_detail_bpm = $id_bpm . '_' . $rab . '_' . $barang . '_' . $subcon . '_' . $overhead;
                    $data_baru = false;
                    $isi = array('VOLUME' => $vol);
                    $where = array('BPM_ID' => $id_bpm, 'RAB_ID' => $rab);
                    if ($barang > 0) {
                        $isi['BARANG_ID'] = $where['BARANG_ID'] = $barang;
                    } else if ($subcon > 0) {
                        $isi['SUBCON_ID'] = $where['SUBCON_ID'] = $subcon;
                    } else if ($overhead > 0) {
                        $isi['PAKET_OVERHEAD_MATERIAL_ID'] = $where['PAKET_OVERHEAD_MATERIAL_ID'] = $overhead;
                    }
                    if (in_array($id_detail_bpm, $listDetailLama)) {//detail perlu diupdate
                        $listDetailLamaTerpakai[] = $id_detail_bpm;
                        $this->mDetailBpm->_update($isi, $where);
                    } else {//detail baru, insert
                        $isi['BPM_ID'] = $id_bpm;
                        $isi['RAB_ID'] = $rab;
                        $this->mDetailBpm->_insert($isi);
                    }
                }
            }
            foreach ($listDetailLama as $lama) {
                if (!in_array($lama, $listDetailLamaTerpakai)) {
                    $abc = explode('_', $lama);
                    //$this->mDetailBpm->_delete(array('BPM_ID' => $abc[0], 'BARANG_ID' => $abc[1], 'RAB_ID' => $abc[2]));
                    $where = array('BPM_ID' => $abc[0], 'RAB_ID' => $abc[1]);
                    if ($abc[2] > 0) {
                        $where['BARANG_ID'] = $abc[2];
                    } else if ($abc[3] > 0) {
                        $where['SUBCON_ID'] = $abc[3];
                    } else if ($abc[4] > 0) {
                        $where['PAKET_OVERHEAD_MATERIAL_ID'] = $abc[4];
                    }
                    $this->mDetailBpm->_delete($where);
                }
            }
            $this->db->trans_complete();
        } else {
            echo 'bpm dalam status yang tidak dapat diedit';
            //redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0));
        }
        redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/viewDetail?id=' . $id_bpm);
    }

}
