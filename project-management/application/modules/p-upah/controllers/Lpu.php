<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Lpu extends Implementation_Controller {

    const role_admin = 'lpu_admin';
    const role_viewer = 'lpu_viewer';
    const role_validator = 'lpu_validator';

    private $roles = array();

    public function __construct() {
        parent::__construct();
        $this->load->model(array('mOpname', 'mDetailOP', 'mLpu', 'projects/mMainProject', 'projects/mProject', 'rab/mRab', 'mDetailLpu'));
        $this->title = "Laporan Pengeluaran Upah";
        $this->data['role'] = json_encode(array('lpu_admin', 'lpu_viewer', 'lpu_validator'));
        $this->roles = json_decode($this->data['role']);
        if ((in_array(Lpu::role_admin, $this->roles) || in_array(Lpu::role_validator, $this->roles) || in_array(Lpu::role_viewer, $this->roles)) == false) {
            echo 'Anda tidak berhak mengakses halaman ini';
            exit(0);
        }
    }

    public function index() {
        redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/home');
    }

    function home() {
        $this->display('acLpu', $this->data);
    }

    function viewNew() {
        if ((in_array(Lpu::role_admin, $this->roles) ) == false) {
            echo 'Anda tidak berhak mengakses halaman ini';
            exit(0);
        }
        $this->data['listMainProject'] = $this->mMainProject->getListMainProject();
        $this->display('acLpuAdd', $this->data);
    }

    function viewDetail() {
        $id = (int) $this->input->get('id');
        $lpu = $this->mLpu->get1($id);
        if ($lpu == null) {
            //redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/home');
            echo "LPU not found";
            header('refresh:2;url=' . base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/home');
        } else {
            $this->data['lpu'] = $lpu;
            $this->data['detail_lpu'] = $this->mDetailLpu->getDetailLpu($id);
            $this->display('acLpuDetail', $this->data);
        }
    }

    function viewEdit() {
        if ((in_array(Lpu::role_admin, $this->roles)) == false) {
            echo 'Anda tidak berhak mengakses halaman ini';
            exit(0);
        }
        $id = (int) $this->input->get('id');
        $lpu = $this->mLpu->get1($id);
        if ($lpu == null) {
            //redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/home');
            echo "LPU not found";
            header('refresh:2;url=' . base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/home');
        } else {
            if (in_array($lpu['STATUS_ID'], array(1, 4))) {
                $this->data['lpu'] = $lpu;
                $this->data['listMainProject'] = $this->mMainProject->getListMainProject();
                $this->data['list_project'] = $this->mProject->getListSubProject($lpu['MAIN_PROJECT_ID']);
                $this->data['list_rab'] = $this->mRab->getListRAB($lpu['PROJECT_ID']);
                $this->data['list_opname'] = $this->mLpu->get_list_opname($lpu['RAB_ID']);
                $this->display('acLpuEdit', $this->data);
            } else {
                echo "LPU berada dalam status {" . $lpu['STATUS_NAMA'] . "} yang tidak dapat divalidasi";
                header('refresh:2;url=' . base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/viewDetail?id=' . $id);
            }
        }
    }

    function printPDF() {
        $id = (int) $this->input->get('id');
        $lpu = $this->mLpu->get1($id);
        if ($lpu == null) {
            //redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/home');
            echo "LPU not found";
            header('refresh:2;url=' . base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/home');
        } else {
            $this->data['lpu'] = $lpu;
            $this->data['detail_lpu'] = $this->mDetailLpu->getDetailLpu($id);
            $this->theme_layout = 'html2fpdf';
            $this->header = 'blank';
            $this->footer = 'blank';
            $this->left_sidebar = 'blank';
            $this->right_sidebar = 'blank';
            $this->script_header = 'lay-scripts/header-report';
            $this->script_footer = 'lay-scripts/footer-report';
            $this->display('acLpuPDF', $this->data);
            $html = $this->output->get_output();
            $this->dompdf->load_html($html);
            $this->dompdf->set_paper('legal', 'landscape');
            $this->dompdf->render();
            $this->dompdf->stream("LPU " . $lpu['LPU_KODE'] . ".pdf", array('Attachment' => 0));
        }
    }

    function edit() {
        if ((in_array(Lpu::role_admin, $this->roles) ) == false) {
            echo 'Anda tidak berhak mengakses halaman ini';
            exit(0);
        }
        $id = (int) $this->input->post('id_lpu');
        $lpu = $this->mLpu->get1($id);
        if ($lpu == null) {
            echo "LPU not found";
            header('refresh:2;url=' . base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/home');
        } else {
            if (in_array($lpu['STATUS_ID'], array(1, 4))) {
                $this->db->trans_begin();
                $flag = (int) $this->input->post('flag');
                if ($lpu['STATUS_ID'] == 4) {
                    $flag = 5;
                } else {
                    if ($flag != 2)
                        $flag = 1;
                }
                $id_rab = (int) $this->input->post('RAB_ID');
                $session = $this->session->userdata('logged_in');
                $dlpu = $this->db->get_where('detail_lpu', array('LPU_ID' => $id))->result_array();
                $detail_lama = array();
                $detail_lama_terpakai = array();
                foreach ($dlpu as $d) {
                    $detail_lama[] = $d['LPU_ID'] . '_' . $d['OPNAME_ID'] . '_' . $d['PK_ID'] . '_' . (int) $d['ANALISA_ID'] . '_' . (int) $d['SUBCON_ID'] . '_' . (int) $d['UPAH_ID'] . '_' . (int) $d['PAKET_OVERHEAD_UPAH_ID'];
                }
                $list_volume = $this->input->post('volume_lpu');
                $list_id_analisa = $this->input->post('id_analisa');
                $list_id_subcon = $this->input->post('id_subcon');
                $list_id_upah = $this->input->post('id_upah');
                $list_id_paket = $this->input->post('id_paket');
                $list_id_opname = $this->input->post('id_opname');
                $list_id_PK = $this->input->post('id_PK');

                for ($i = 0, $jumlah = count($list_id_opname); $i < $jumlah; $i++) {
                    $list_id_opname[$i] = (int) $list_id_opname[$i];
                }
                for ($i = 0, $jumlah = count($list_id_PK); $i < $jumlah; $i++) {
                    $list_id_PK[$i] = (int) $list_id_PK[$i];
                }
                for ($i = 0, $jumlah = count($list_id_analisa); $i < $jumlah; $i++) {
                    $list_id_analisa[$i] = (int) $list_id_analisa[$i];
                }
                for ($i = 0, $jumlah = count($list_id_subcon); $i < $jumlah; $i++) {
                    $list_id_subcon[$i] = (int) $list_id_subcon[$i];
                }
                for ($i = 0, $jumlah = count($list_id_upah); $i < $jumlah; $i++) {
                    $list_id_upah[$i] = (int) $list_id_upah[$i];
                }
                for ($i = 0, $jumlah = count($list_id_paket); $i < $jumlah; $i++) {
                    $list_id_paket[$i] = (int) $list_id_paket[$i];
                }

                $list_opname = array();
                $list_pk = array();
                $list_analisa = array();
                $list_subcon = array();
                $list_upah = array();
                $list_paket = array();

                if (count($list_id_opname) > 0) {
                    $query = $this->db->query("select * from opname where OPNAME_ID IN (" . implode(",", $list_id_opname) . ")")->result_array();
                    foreach ($query as $row) {
                        $list_opname[$row['OPNAME_ID']] = $row;
                    }
                }
                if (count($list_id_PK) > 0) {
                    $query = $this->db->query("select * from permintaan_pekerjaan where PERMINTAAN_PEKERJAAN_ID IN (" . implode(",", $list_id_PK) . ")")->result_array();
                    foreach ($query as $row) {
                        $list_pk[$row['PERMINTAAN_PEKERJAAN_ID']] = $row;
                    }
                }
                if (count($list_id_analisa) > 0) {
                    $query = $this->db->query("select * from analisa_rab where ANALISA_ID IN (" . implode(",", $list_id_analisa) . ")")->result_array();
                    foreach ($query as $row) {
                        $list_analisa[$row['ANALISA_ID']] = $row;
                    }
                }
                if (count($list_id_subcon) > 0) {
                    $query = $this->db->query("select * from subcon where SUBCON_ID IN (" . implode(",", $list_id_subcon) . ")")->result_array();
                    foreach ($query as $row) {
                        $list_subcon[$row['SUBCON_ID']] = $row;
                    }
                }
                if (count($list_id_upah) > 0) {
                    $query = $this->db->query("select * from master_upah where UPAH_ID IN (" . implode(",", $list_id_upah) . ")")->result_array();
                    foreach ($query as $row) {
                        $list_upah[$row['UPAH_ID']] = $row;
                    }
                }
                if (count($list_id_paket) > 0) {
                    $query = $this->db->query("select * from paket_overhead_upah where PAKET_OVERHEAD_UPAH_ID IN (" . implode(",", $list_id_paket) . ")")->result_array();
                    foreach ($query as $row) {
                        $list_paket[$row['PAKET_OVERHEAD_UPAH_ID']] = $row;
                    }
                }
                echo 'iterasi per item detail, ' . count($list_volume) . ' item, ';
                for ($i = 0, $i2 = count($list_volume); $i < $i2; $i++) {
                    $id_opname = $list_id_opname[$i];
                    $id_pk = $list_id_PK[$i];
                    if (!isset($list_opname[$id_opname])) {
                        echo 'opname not valid, ';
                        print_r($list_id_opname);
                        print_r($list_opname);
                        continue;
                    }
                    if (!isset($list_pk[$id_pk])) {
                        echo 'pk not valid, ';
                        continue;
                    }
                    $where = array('LPU_ID' => $id,
                        'OPNAME_ID' => $id_opname,
                        'PK_ID' => $id_pk
                    );
                    $dlpu = array(
                        'LPU_ID' => $id,
                        'OPNAME_ID' => $id_opname,
                        'PK_ID' => $id_pk,
                        'VOLUME' => (double) $list_volume[$i]
                    );
                    $id_analisa = $list_id_analisa[$i];
                    $id_subcon = $list_id_subcon[$i];
                    $id_upah = $list_id_upah[$i];
                    $id_paket = $list_id_paket[$i];
                    if ($id_analisa > 0) {
                        if (isset($list_analisa[$id_analisa])) {
                            $dlpu['ANALISA_ID'] = $id_analisa;
                            $where['ANALISA_ID'] = $id_analisa;
                        } else {
                            echo 'analisa not valid, ';
                            continue;
                        }
                    } else if ($id_subcon > 0) {
                        if (isset($list_subcon[$id_subcon])) {
                            $dlpu['SUBCON_ID'] = $id_subcon;
                            $where['SUBCON_ID'] = $id_analisa;
                        } else {
                            echo 'subcon not valid, ';
                            continue;
                        }
                    } else if ($id_upah > 0) {
                        if (isset($list_upah[$id_upah])) {
                            $dlpu['UPAH_ID'] = $id_upah;
                            $where['UPAH_ID'] = $id_analisa;
                        } else {
                            echo 'upah not valid, ';
                            continue;
                        }
                    } else if ($id_paket > 0) {
                        if (isset($list_paket[$id_paket])) {
                            $dlpu['PAKET_OVERHEAD_UPAH_ID'] = $id_paket;
                            $where['PAKET_OVERHEAD_UPAH_ID'] = $id_analisa;
                        } else {
                            echo 'paket not valid, ';
                            continue;
                        }
                    }
                    $id_detail = $id . '_' . $id_opname . '_' . $id_pk . '_' . $id_analisa . '_' . $id_subcon . '_' . $id_upah . '_' . $id_paket;
                    echo 'check apakah update atau insert, ';
                    if (in_array($id_detail, $detail_lama)) {
                        echo 'update detail lpu, ' . $id_detail . ', ';
                        $detail_lama_terpakai[] = $id_detail;
                        $this->mDetailLpu->_update($dlpu, $where);
                    } else {
                        echo 'insert detail lpu, ' . $id_detail . ', ';
                        $this->mDetailLpu->_insert($dlpu);
                    }
                }
                foreach ($detail_lama as $lama) {
                    if (in_array($lama, $detail_lama_terpakai) == false) {
                        $a = explode('_', $lama);
                        echo 'hapus detail lpu, ' . $lama . ', ';
                        $where = array('LPU_ID' => $a[0], 'OPNAME_ID' => $a[1], 'PK_ID' => $a[2]);
                        if ($a[3] > 0)
                            $where['ANALISA_ID'] = $a[3];
                        if ($a[4] > 0)
                            $where['SUBCON_ID'] = $a[4];
                        if ($a[5] > 0)
                            $where['UPAH_ID'] = $a[5];
                        if ($a[6] > 0)
                            $where['PAKET_OVERHEAD_UPAH_ID'] = $a[6];
                        $this->mDetailLpu->_delete($where);
                    }
                }
                $session = $this->session->userdata('logged_in');
                $this->mLpu->_update(array('STATUS_ID' => $flag, 'RAB_ID' => $id_rab, 'PETUGAS_ID' => $session['PENGGUNA_ID']), array('LPU_ID' => $id));
                $this->db->trans_complete();
                echo "LPU berhasil diedit";
                //header('refresh:10;url=' . base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/viewDetail?id=' . $id);
                redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/viewDetail?id=' . $id);
            } else {
                echo "LPU berada dalam status {" . $lpu['STATUS_NAMA'] . "} yang tidak dapat diedit";
                header('refresh:2;url=' . base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/home');
            }
        }
    }

    function validate() {
        if ((in_array(Lpu::role_validator, $this->roles)) == false) {
            echo 'Anda tidak berhak mengakses halaman ini';
            exit(0);
        }
        $id = (int) $this->input->get('id');
        $lpu = $this->mLpu->get1($id);
        if ($lpu == null) {
            echo "LPU not found";
            header('refresh:2;url=' . base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/home');
        } else {
            if (in_array($lpu['STATUS_ID'], array(2, 5))) {
                $session = $this->session->userdata('logged_in');
                $this->mLpu->_update(array('VALIDATOR_ID' => $session['PENGGUNA_ID'], 'TANGGAL_VALIDASI' => date('y-m-d h:i:s'), 'STATUS_ID' => 3), array('LPU_ID' => $id));
                echo "LPU berhasil divalidasi";
                redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/viewDetail?id=' . $id);
            } else {
                echo "LPU berada dalam status {" . $lpu['STATUS_NAMA'] . "} yang tidak dapat divalidasi";
                header('refresh:1;url=' . base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/viewDetail?id=' . $id);
            }
        }
    }

    function save() {
        if ((in_array(Lpu::role_admin, $this->roles)) == false) {
            echo 'Anda tidak berhak mengakses halaman ini';
            exit(0);
        }
        $this->db->trans_begin();
        $flag = (int) $this->input->post('flag');
        if ($flag != 2)
            $flag = 1;
        $id_rab = (int) $this->input->post('RAB_ID');
        $session = $this->session->userdata('logged_in');
        $id_lpu = $this->mLpu->_insert(array('PETUGAS_ID' => $session['PENGGUNA_ID'], 'STATUS_ID' => $flag, 'RAB_ID' => $id_rab));

        $list_volume = $this->input->post('volume_lpu');
        $list_id_analisa = $this->input->post('id_analisa');
        $list_id_subcon = $this->input->post('id_subcon');
        $list_id_upah = $this->input->post('id_upah');
        $list_id_paket = $this->input->post('id_paket');
        $list_id_opname = $this->input->post('id_opname');
        $list_id_PK = $this->input->post('id_PK');

        for ($i = 0, $jumlah = count($list_id_opname); $i < $jumlah; $i++) {
            $list_id_opname[$i] = (int) $list_id_opname[$i];
        }
        for ($i = 0, $jumlah = count($list_id_PK); $i < $jumlah; $i++) {
            $list_id_PK[$i] = (int) $list_id_PK[$i];
        }
        for ($i = 0, $jumlah = count($list_id_analisa); $i < $jumlah; $i++) {
            $list_id_analisa[$i] = (int) $list_id_analisa[$i];
        }
        for ($i = 0, $jumlah = count($list_id_subcon); $i < $jumlah; $i++) {
            $list_id_subcon[$i] = (int) $list_id_subcon[$i];
        }
        for ($i = 0, $jumlah = count($list_id_upah); $i < $jumlah; $i++) {
            $list_id_upah[$i] = (int) $list_id_upah[$i];
        }
        for ($i = 0, $jumlah = count($list_id_paket); $i < $jumlah; $i++) {
            $list_id_paket[$i] = (int) $list_id_paket[$i];
        }

        $list_opname = array();
        $list_pk = array();
        $list_analisa = array();
        $list_subcon = array();
        $list_upah = array();
        $list_paket = array();

        if (count($list_id_opname) > 0) {
            $query = $this->db->query("select * from opname where OPNAME_ID IN (" . implode(",", $list_id_opname) . ")")->result_array();
            foreach ($query as $row) {
                $list_opname[$row['OPNAME_ID']] = $row;
            }
        }
        if (count($list_id_PK) > 0) {
            $query = $this->db->query("select * from permintaan_pekerjaan where PERMINTAAN_PEKERJAAN_ID IN (" . implode(",", $list_id_PK) . ")")->result_array();
            foreach ($query as $row) {
                $list_pk[$row['PERMINTAAN_PEKERJAAN_ID']] = $row;
            }
        }
        if (count($list_id_analisa) > 0) {
            $query = $this->db->query("select * from analisa_rab where ANALISA_ID IN (" . implode(",", $list_id_analisa) . ")")->result_array();
            foreach ($query as $row) {
                $list_analisa[$row['ANALISA_ID']] = $row;
            }
        }
        if (count($list_id_subcon) > 0) {
            $query = $this->db->query("select * from subcon where SUBCON_ID IN (" . implode(",", $list_id_subcon) . ")")->result_array();
            foreach ($query as $row) {
                $list_subcon[$row['SUBCON_ID']] = $row;
            }
        }
        if (count($list_id_upah) > 0) {
            $query = $this->db->query("select * from master_upah where UPAH_ID IN (" . implode(",", $list_id_upah) . ")")->result_array();
            foreach ($query as $row) {
                $list_upah[$row['UPAH_ID']] = $row;
            }
        }
        if (count($list_id_paket) > 0) {
            $query = $this->db->query("select * from paket_overhead_upah where PAKET_OVERHEAD_UPAH_ID IN (" . implode(",", $list_id_paket) . ")")->result_array();
            foreach ($query as $row) {
                $list_paket[$row['PAKET_OVERHEAD_UPAH_ID']] = $row;
            }
        }

        for ($i = 0, $i2 = count($list_volume); $i < $i2; $i++) {
            $id_opname = $list_id_opname[$i];
            $id_pk = $list_id_PK[$i];
            if (!isset($list_opname[$id_opname])) {
                continue;
            }
            if (!isset($list_pk[$id_pk])) {
                continue;
            }
            $dlpu = array(
                'LPU_ID' => $id_lpu,
                'OPNAME_ID' => $id_opname,
                'PK_ID' => $id_pk,
                'VOLUME' => (double) $list_volume[$i]
            );
            $id_analisa = $list_id_analisa[$i];
            $id_subcon = $list_id_subcon[$i];
            $id_upah = $list_id_upah[$i];
            $id_paket = $list_id_paket[$i];
            if ($id_analisa > 0) {
                if (isset($list_analisa[$id_analisa])) {
                    $dlpu['ANALISA_ID'] = $id_analisa;
                } else {
                    continue;
                }
            } else if ($id_subcon > 0) {
                if (isset($list_subcon[$id_subcon])) {
                    $dlpu['SUBCON_ID'] = $id_subcon;
                } else {
                    continue;
                }
            } else if ($id_upah > 0) {
                if (isset($list_upah[$id_upah])) {
                    $dlpu['UPAH_ID'] = $id_upah;
                } else {
                    continue;
                }
            } else if ($id_paket > 0) {
                if (isset($list_paket[$id_paket])) {
                    $dlpu['PAKET_OVERHEAD_UPAH_ID'] = $id_paket;
                } else {
                    continue;
                }
            }
            $this->mDetailLpu->_insert($dlpu);
        }
        $this->db->trans_complete();
        header('refresh:0;url=' . base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/viewDetail?id=' . $id_lpu);
        //redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/viewDetail?id=' . $id_lpu);
    }

    function setujui() {
        if ((in_array(Lpu::role_admin, $this->roles)) == false) {
            echo 'Anda tidak berhak mengakses halaman ini';
            exit(0);
        }
        $id = (int) $this->input->get('id');
        $lpu = $this->mLpu->get1($id);
        if ($lpu == null) {
            echo "LPU not found";
            header('refresh:2;url=' . base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/home');
        } else {
            if (in_array($lpu['STATUS_ID'], array(1))) {
                $this->mLpu->_update(array('STATUS_ID' => 2), array('LPU_ID' => $id));
                echo 'LPU dengan id ' . $id . ' berhasil disimpan untuk disetujui';
                redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/viewDetail?id=' . $id);
            } else {
                echo "LPU berada dalam status {" . $lpu['STATUS_NAMA'] . "} yang tidak dapat divalidasi";
                header('refresh:2;url=' . base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/viewDetail?id=' . $id);
            }
        }
    }

    function reject() {
        if ((in_array(Lpu::role_validator, $this->roles) ) == false) {
            echo 'Anda tidak berhak mengakses halaman ini';
            exit(0);
        }
        $id = (int) $this->input->get('id');
        $lpu = $this->mLpu->get1($id);
        if ($lpu == null) {
            echo "LPU not found";
            header('refresh:2;url=' . base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/home');
        } else {
            if (in_array($lpu['STATUS_ID'], array(2, 5))) {
                $this->mLpu->_update(array('STATUS_ID' => 4), array('LPU_ID' => $id));
                echo 'LPU dengan id ' . $id . ' berhasil ditolak';
                redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/viewDetail?id=' . $id);
            } else {
                echo "LPU berada dalam status {" . $lpu['STATUS_NAMA'] . "} yang tidak dapat ditolak";
                header('refresh:2;url=' . base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/viewDetail?id=' . $id);
            }
        }
    }

    function delete() {
        if ((in_array(Lpu::role_validator, $this->roles) ) == false) {
            echo 'Anda tidak berhak mengakses halaman ini';
            exit(0);
        }
        $id = (int) $this->input->get('id');
        $lpu = $this->mLpu->get1($id);
        if ($lpu == null) {
            echo "LPU not found";
            header('refresh:2;url=' . base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/home');
        } else {
            if (in_array($lpu['STATUS_ID'], array(1, 4))) {
                $this->mDetailLpu->_delete(array('LPU_ID' => $id));
                $this->mLpu->_delete(array('LPU_ID' => $id));
                echo 'LPU dengan id ' . $id . ' berhasil dihapus';
                redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/home');
            } else {
                echo "LPU berada dalam status {" . $lpu['STATUS_NAMA'] . "} yang tidak dapat dihapus";
                header('refresh:2;url=' . base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/viewDetail?id=' . $id);
            }
        }
    }

    function get_detail_lpu() {
        echo json_encode($this->mDetailLpu->getDetailLpu((int) $this->input->get('id')));
    }

    function get_list_lpu_datatable() {
        $draw = (int) $this->input->post('draw');
        $start = (int) $this->input->post('start');
        $length = (int) $this->input->post('length');
        $order = $this->input->post('order');
        $search = $this->input->post('search');
        $hasil = $this->mLpu->get_list_lpu_datatable($start, $length, $order, $search);
        $hasil['draw'] = $draw;
        echo json_encode($hasil);
    }

    function get_list_project() {
        echo json_encode($this->mProject->getListSubProject((int) $this->input->get('id_main_project')));
    }

    function get_list_rab() {
        echo json_encode($this->mRab->getListRAB((int) $this->input->get('id_project')));
    }

    function get_list_opname() {
        echo json_encode($this->mLpu->get_list_opname((int) $this->input->get('id_rab')));
    }

    function get_detail_opname_datatable() {
        $draw = (int) $this->input->post('draw');
        $start = (int) $this->input->post('start');
        $length = (int) $this->input->post('length');
        $id_opname = (int) $this->input->post('id_opname');
        $id_lpu = (int) $this->input->post('id_lpu');
        $order = $this->input->post('order');
        $search = $this->input->post('search');
        $hasil = $this->mLpu->get_detail_opname_datatable($start, $length, $id_opname, $id_lpu, $order, $search);
        $hasil['draw'] = $draw;
        echo json_encode($hasil);
    }

}
