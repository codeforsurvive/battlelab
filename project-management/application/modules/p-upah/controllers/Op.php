<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Op extends Implementation_Controller {

    const role_admin = 'op_admin';
    const role_viewer = 'op_viewer';
    const role_validator = 'op_validator';

    private $roles = array();

    public function __construct() {
        parent::__construct();
        $this->load->model('projects/mProject');
        $this->load->model('projects/mMainProject');
        $this->load->model('rab/mRab');
        $this->load->model(array('mOpname', 'mDetailOP'));
        $this->load->model('master/mGudang');
        $this->title = "Opname Pekerjaan";
        $this->roles = json_decode($this->data['role']);
        if ((in_array(Op::role_admin, $this->roles) || in_array(Op::role_validator, $this->roles) || in_array(Op::role_viewer, $this->roles)) == false) {
            echo 'Anda tidak berhak mengakses halaman ini';
            exit(0);
        }
    }

    /*
     * halaman awal op, untuk diakses oleh semua role user
     * menampilkan list op yang telah dibuat
     */

    public function index() {
        $this->display('acOp', $this->data);
    }

    /*
     * untuk diakses oleh admin, untuk membuat op baru
     */

    public function viewNewOp() {
        if ((in_array(Op::role_admin, $this->roles) ) == false) {
            echo 'Anda tidak berhak mengakses halaman ini';
            return;
        }
        $this->data['listMainProject'] = $this->mMainProject->getListMainProject();
        $this->data['listKategoriPk'] = $this->db->get('kategori_pk')->result_array();
        $this->data['list_top'] = $this->db->order_by('TOP_VALUE', 'ASC')->get_where('top', array('TOP_ACTIVE' => 1))->result_array();
        $this->data['list_kategori_pajak'] = $this->db->get('kategori_pajak')->result_array();
        $this->data['list_pajak'] = $this->db->where(array('PAJAK_ACTIVE' => 1))->get('pajak')->result_array();
        $this->display('acOpAdd', $this->data);
    }

    function printPDF() {
        $this->load->model(array('mOpname', 'mDetailOP'));
        $idOpname = (int) $this->input->get('id');
        $this->data['opname'] = $this->mOpname->getDeksripsiOpname($idOpname);

        if ($this->data['opname'] == null) {
            redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0));
            return;
        }
        $this->data['detailOpname'] = $this->mDetailOP->getDetailOpname($idOpname);
        $this->theme_layout = 'html2fpdf';
        $this->header = 'blank';
        $this->footer = 'blank';
        $this->left_sidebar = 'blank';
        $this->right_sidebar = 'blank';
        $this->script_header = 'lay-scripts/header-report';
        $this->script_footer = 'lay-scripts/footer-report';

        //$this->display('acOpDetail', $this->data);
        $this->display('acOpPDF', $this->data);
        $html = $this->output->get_output();
        $this->dompdf->load_html($html);
        $this->dompdf->set_paper('legal', 'landscape');
        $this->dompdf->render();
        $this->dompdf->stream("OP " . $this->data['opname']['OPNAME_KODE'] . ".pdf", array('Attachment' => 0));
    }

    /*
     * mengembalikan list project yang direquest dari halaman op/viewNewOp
     * untuk admin
     */

    public function getCurrentProjects() {
        $MAIN_PROJECT_ID = $this->input->post('MAIN_PROJECT_ID');
        echo json_encode($this->mProject->getListSubProject($MAIN_PROJECT_ID));
    }

    /*
     * mengembalikan list rab yang direquest dari halaman op/viewNewOp
     * untuk admin
     */

    public function getCurrentRab() {
        $PROJECT_ID = $this->input->post('PROJECT_ID');
        $query = $this->mRab->getListRAB($PROJECT_ID);
        echo json_encode($query);
    }

    public function getDetailPKDataTable() {
        $this->load->model('mOpname');
        $start = (int) $this->input->post('start');
        $length = (int) $this->input->post('length');
        $id_op = (int) $this->input->post('id_opname');
        $draw = (int) $this->input->post('draw');
        $pk_id = (int) $this->input->post('PK_ID');
        $order = $this->input->post('order');
        $search = $this->input->post('search');
        $hasil = $this->mOpname->getDetailPKDataTable($pk_id, $start, $length, $id_op, $order, $search);
        $hasil['draw'] = $draw;
        echo json_encode($hasil);
    }

    public function getListPK() {
        $this->load->model('mOpname');
        $mainProjectId = (int) $this->input->post('mainProjectId');
        $projectId = (int) $this->input->post('projectId');
        $RABId = (int) $this->input->post('RABId');
        $kategoriPKId = (int) $this->input->post('kategoriPKId');
        $hasil = $this->mOpname->getListPK($RABId, $kategoriPKId);
        echo json_encode($hasil);
    }

    function save() {
        if ((in_array(Op::role_admin, $this->roles)) == false) {
            echo 'Anda tidak berhak mengakses halaman ini';
            exit(0);
        }
        $this->load->model(array('mOpname', 'mDetailOP'));
        $mySession = $this->session->userdata('logged_in');
        $this->db->trans_begin();
        $flag = (int) $this->input->post('flag');
        if (!($flag == 1 || $flag == 2)) {
            $flag = 1;
        }
        $KATEGORI_OP_ID = (int) $this->input->post('KATEGORI_OP_ID');
        $RAB_ID = (int) $this->input->post('RAB_ID');
        $kategori_pajak_id = (int) $this->input->post('kategori_pajak');
        $pajak_id = (int) $this->input->post('pajak');
        $query_pajak = $this->db->get_where('pajak', array('PAJAK_ID' => $pajak_id))->result_array();
        $value_pajak = 0;
        if (count($query_pajak) > 0) {
            $value_pajak = $query_pajak[0]['PAJAK_VALUE'];
        }
        if ($KATEGORI_OP_ID != '2') {
            $KATEGORI_OP_ID = '1';
        }
        $nama_mandor = $this->input->post('nama_mandor');
        $alamat_mandor = $this->input->post('alamat_mandor');
        $telpon_mandor = $this->input->post('telpon_mandor');
        $idOpname = $this->mOpname->_insert(array(
            'PETUGAS_ID' => $mySession['PENGGUNA_ID'],
            'RAB_ID' => $RAB_ID,
            'KATEGORI_OP_ID' => $KATEGORI_OP_ID,
            'STATUS_OP_ID' => $flag,
            'KATEGORI_PAJAK_ID' => $kategori_pajak_id,
            'PAJAK_ID' => $pajak_id,
            'TOP_ID' => (int) $this->input->post('top'),
            'PAJAK_VALUE' => $value_pajak,
            'NAMA_MANDOR' => $nama_mandor,
            'ALAMAT_MANDOR' => $alamat_mandor,
            'TELPON_MANDOR' => $telpon_mandor
                )
        );
        $list_id_pk = $this->input->post('id_pk');
        $list_id_analisa = $this->input->post('id_analisa');
        $list_id_subcon = $this->input->post('id_subcon');
        $list_id_upah = $this->input->post('id_upah');
        $list_id_paket = $this->input->post('id_paket');
        for ($i = 0, $jumlah = count($list_id_pk); $i < $jumlah; $i++) {
            $list_id_pk[$i] = (int) $list_id_pk[$i];
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
        $list_volume = $this->input->post('volume_opname');
        $list_harga_satuan = $this->input->post('harga_satuan_opname');
        $harga_total = 0;
        $list_pk = array();
        $list_analisa = array();
        $list_subcon = array();
        $list_upah = array();
        $list_paket = array();
        if (count($list_id_pk) > 0) {
            $query = $this->db->query("select * from permintaan_pekerjaan where PERMINTAAN_PEKERJAAN_ID IN (" . implode(",", $list_id_pk) . ")")->result_array();
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
        for ($i = 0, $jumlah = count($list_volume); $i < $jumlah; $i++) {
            $id_pk = $list_id_pk[$i];
            $id_analisa = $list_id_analisa[$i];
            $id_subcon = $list_id_subcon[$i];
            $id_upah = $list_id_upah[$i];
            $id_paket = $list_id_paket[$i];
            if (!isset($list_pk[$id_pk])) {
                echo "id pk $id_pk tidak valid, ";
                continue;
            }
            $volume = (double) $list_volume[$i];
            $harga_satuan = (double) $list_harga_satuan[$i];
            $detail_opname = array(
                'OPNAME_ID' => $idOpname,
                'PERMINTAAN_PEKERJAAN_ID' => $id_pk,
                'VOLUME_OPNAME' => $volume,
                'HARGA_OPNAME' => $harga_satuan
            );
            if ($id_analisa > 0) {
                if (count($list_analisa) > 0 && isset($list_analisa[$id_analisa])) {
                    $detail_opname['ANALISA_ID'] = $id_analisa;
                    echo "detail opname analisa, ";
                } else {
                    continue;
                }
            } else if ($id_subcon > 0) {
                if (count($list_subcon) > 0 && isset($list_subcon[$id_subcon])) {
                    $detail_opname['SUBCON_ID'] = $id_subcon;
                    echo "detail opname subcon, ";
                } else {
                    continue;
                }
            } else if ($id_upah > 0) {
                if (count($list_upah) > 0 && isset($list_upah[$id_upah])) {
                    $detail_opname['UPAH_ID'] = $id_upah;
                    echo "detail opname upah, ";
                } else {
                    continue;
                }
            } else if ($id_paket > 0) {
                if (count($list_paket) > 0 && isset($list_paket[$id_paket])) {
                    $detail_opname['PAKET_OVERHEAD_UPAH_ID'] = $id_paket;
                    echo "detail opname paket, ";
                } else {
                    continue;
                }
            }
            $this->mDetailOP->_insert($detail_opname);
            $harga_total += ($harga_satuan * $volume);
        }
        if ($kategori_pajak_id == 2) {
            $harga_total = (100 + $value_pajak) * $harga_total / 100;
        }
        $this->mOpname->_update(array('OPNAME_TOTAL_HARGA' => $harga_total), array('OPNAME_ID' => $idOpname));
        $this->db->trans_complete();
        header('refresh:2;url=' . base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/viewDetail?id=' . $idOpname);
        //redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/viewDetail?id=' . $idOpname);
    }

    function viewDetail() {
        $this->load->model(array('mOpname', 'mDetailOP'));
        $idOpname = (int) $this->input->get('id');
        $this->data['opname'] = $this->mOpname->getDeksripsiOpname($idOpname);

        if ($this->data['opname'] == null) {
            redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0));
            return;
        }
        $this->data['detailOpname'] = $this->mDetailOP->getDetailOpname($idOpname);
        $this->display('acOpDetail', $this->data);
    }

    function getDetailOp() {
        $id_op = (int) $this->input->post('id_op');
        $detail = $this->mDetailOP->getDetailOpname($id_op);
        echo json_encode($detail);
    }

    function get_keterangan_validasi() {
        $id = (int) $this->input->get('id');
        $lopname = $this->db->get_where('opname', array('OPNAME_ID' => $id))->result_array();
        if (count($lopname) > 0) {
            $opname = $lopname[0];
            if ($opname['STATUS_OP_ID'] != '3') {
                return;
            }
            $lpengguna = $this->db->get_where('pengguna', array('PENGGUNA_ID' => $opname['VALIDATOR_ID']))->result_array();
            if (count($lpengguna) > 0) {
                $pengguna = $lpengguna[0];
                echo '<span class="fa fa-check"></span> Sudah Divalidasi oleh ' . $pengguna['PENGGUNA_NAMA'] . ' pada ' . $opname['OPNAME_TANGGAL'];
            }
        }
    }

    function viewEdit() {
        if ((in_array(Op::role_admin, $this->roles) ) == false) {
            echo 'Anda tidak berhak mengakses halaman ini';
            exit(0);
        }
        $id_op = (int) $this->input->get('ID_OPNAME');
        $op = $this->mOpname->getDeksripsiOpname($id_op);
        if ($op == null) {
            redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0));
        } else if ($op['STATUS_OP_ID'] == '1' || $op['STATUS_OP_ID'] == '4') {
            $this->data['op'] = $op;
            $this->data['listKategoriPk'] = $this->db->get('kategori_pk')->result_array();
            $this->data['listMainProject'] = $this->mMainProject->getListMainProject();
            $this->data['list_top'] = $this->db->order_by('TOP_VALUE', 'ASC')->get_where('top', array('TOP_ACTIVE' => 1))->result_array();
            $this->data['list_kategori_pajak'] = $this->db->get('kategori_pajak')->result_array();
            $this->data['list_pajak'] = $this->db->where(array('PAJAK_ACTIVE' => 1))->get('pajak')->result_array();
            $this->data['list_project'] = $this->mProject->getListSubProject($op['MAIN_PROJECT_ID']);
            $this->data['list_rab'] = $this->mRab->getListRAB($op['PROJECT_ID']);
            $this->display('acOpEdit', $this->data);
        } else {
            redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0));
        }
    }

    function getListOPDataTable() {
        $this->load->model(array('mOpname', 'mDetailOP'));
        $start = (int) $this->input->post('start');
        $length = (int) $this->input->post('length');
        $draw = (int) $this->input->post('draw');
        $order = $this->input->post('order');
        $search = $this->input->post('search');
        $hasil = $this->mOpname->getListOPDataTable($start, $length, $order, $search);
        $hasil['draw'] = $draw;
        echo json_encode($hasil);
    }

    function edit() {
        if ((in_array(Op::role_admin, $this->roles) ) == false) {
            echo 'Anda tidak berhak mengakses halaman ini';
            exit(0);
        }
        $id_opname = (int) $this->input->post('OPNAME_ID');
        $flag = (int) $this->input->post('flag');
        $total_harga = (int) $this->input->post('totalHarga');
        $opname = $this->mOpname->getDeksripsiOpname($id_opname);
        if ($opname == null) {
            
        } else if ($opname['STATUS_OP_ID'] == '4' || $opname['STATUS_OP_ID'] == '1') {
            $this->db->trans_begin();
            if ($opname['STATUS_OP_ID'] == '4') {
                $flag = 5;
            } else {
                if ($flag != 1) {
                    $flag = 2;
                }
            }
            $this->load->model(array('mOpname', 'mDetailOP'));
            $mySession = $this->session->userdata('logged_in');
            $this->db->trans_begin();
            $KATEGORI_OP_ID = (int) $this->input->post('KATEGORI_OP_ID');
            $RAB_ID = (int) $this->input->post('RAB_ID');
            $kategori_pajak_id = (int) $this->input->post('kategori_pajak');
            $pajak_id = (int) $this->input->post('pajak');
            $query_pajak = $this->db->get_where('pajak', array('PAJAK_ID' => $pajak_id))->result_array();
            $value_pajak = 0;
            if (count($query_pajak) > 0) {
                $value_pajak = $query_pajak[0]['PAJAK_VALUE'];
            }
            if ($KATEGORI_OP_ID != '2') {
                $KATEGORI_OP_ID = '1';
            }
            $nama_mandor = $this->input->post('nama_mandor');
            $alamat_mandor = $this->input->post('alamat_mandor');
            $telpon_mandor = $this->input->post('telpon_mandor');
            $idOpname = $id_opname;


            $list_detil_lama = array();
            $list_detil_lama_terpakai = array();
            $query = $this->db->get_where('detail_transaksi_opname', array('OPNAME_ID' => $id_opname))->result_array();
            foreach ($query as $row) {
                $list_detil_lama[] = (int) $row['PERMINTAAN_PEKERJAAN_ID'] . '_' . (int) $row['ANALISA_ID'] . '_' . (int) $row['SUBCON_ID'] . '_' . (int) $row['UPAH_ID'] . '_' . (int) $row['PAKET_OVERHEAD_UPAH_ID'];
            }

            $list_id_pk = $this->input->post('id_pk');
            $list_id_analisa = $this->input->post('id_analisa');
            $list_id_subcon = $this->input->post('id_subcon');
            $list_id_upah = $this->input->post('id_upah');
            $list_id_paket = $this->input->post('id_paket');
            for ($i = 0, $jumlah = count($list_id_pk); $i < $jumlah; $i++) {
                $list_id_pk[$i] = (int) $list_id_pk[$i];
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
            $list_volume = $this->input->post('volume_opname');
            $list_harga_satuan = $this->input->post('harga_satuan_opname');
            $harga_total = 0;
            $list_pk = array();
            $list_analisa = array();
            $list_subcon = array();
            $list_upah = array();
            $list_paket = array();
            if (count($list_id_pk) > 0) {
                $query = $this->db->query("select * from permintaan_pekerjaan where PERMINTAAN_PEKERJAAN_ID IN (" . implode(",", $list_id_pk) . ")")->result_array();
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
            for ($i = 0, $jumlah = count($list_volume); $i < $jumlah; $i++) {
                $id_pk = $list_id_pk[$i];
                $id_analisa = $list_id_analisa[$i];
                $id_subcon = $list_id_subcon[$i];
                $id_upah = $list_id_upah[$i];
                $id_paket = $list_id_paket[$i];
                if (!isset($list_pk[$id_pk])) {
                    echo "id pk $id_pk tidak valid, ";
                    continue;
                }
                $volume = (double) $list_volume[$i];
                $harga_satuan = (double) $list_harga_satuan[$i];
                $detail_opname = array(
                    'OPNAME_ID' => $idOpname,
                    'PERMINTAAN_PEKERJAAN_ID' => $id_pk,
                    'VOLUME_OPNAME' => $volume,
                    'HARGA_OPNAME' => $harga_satuan
                );
                $where = array(
                    'OPNAME_ID' => $idOpname,
                    'PERMINTAAN_PEKERJAAN_ID' => $id_pk
                );
                if ($id_analisa > 0) {
                    if (count($list_analisa) > 0 && isset($list_analisa[$id_analisa])) {
                        $detail_opname['ANALISA_ID'] = $id_analisa;
                        $where['ANALISA_ID'] = $id_analisa;
                        echo "detail opname analisa, ";
                    } else {
                        continue;
                    }
                } else if ($id_subcon > 0) {
                    if (count($list_subcon) > 0 && isset($list_subcon[$id_subcon])) {
                        $detail_opname['SUBCON_ID'] = $id_subcon;
                        $where['SUBCON_ID'] = $id_analisa;
                        echo "detail opname subcon, ";
                    } else {
                        continue;
                    }
                } else if ($id_upah > 0) {
                    if (count($list_upah) > 0 && isset($list_upah[$id_upah])) {
                        $detail_opname['UPAH_ID'] = $id_upah;
                        $where['UPAH_ID'] = $id_analisa;
                        echo "detail opname upah, ";
                    } else {
                        continue;
                    }
                } else if ($id_paket > 0) {
                    if (count($list_paket) > 0 && isset($list_paket[$id_paket])) {
                        $detail_opname['PAKET_OVERHEAD_UPAH_ID'] = $id_paket;
                        $where['PAKET_OVERHEAD_UPAH_ID'] = $id_analisa;
                        echo "detail opname paket, ";
                    } else {
                        continue;
                    }
                }
                $id_detail = $id_pk . '_' . $id_analisa . '_' . $id_subcon . '_' . $id_upah . '_' . $id_paket;
                if (in_array($id_detail, $list_detil_lama)) {
                    $this->mDetailOP->_update($detail_opname, $where);
                    $list_detil_lama_terpakai[] = $id_detail;
                } else {
                    $this->mDetailOP->_insert($detail_opname);
                }
                $harga_total += ($harga_satuan * $volume);
            }

            foreach ($list_detil_lama as $lama) {
                if (!in_array($lama, $list_detil_lama_terpakai)) {
                    $pecah = explode('_', $lama);
                    if ($pecah[1] > 0) {//overhead
                        $this->mDetailOP->_delete(array('OPNAME_ID' => $id_opname, 'PERMINTAAN_PEKERJAAN_ID' => $pecah[0], 'ANALISA_ID' => $pecah[1]));
                        echo 'delete opname overhead, ';
                    } else if ($pecah[2] > 0) {//subcon
                        echo 'delete opname subcon, ';
                        $this->mDetailOP->_delete(array('OPNAME_ID' => $id_opname, 'PERMINTAAN_PEKERJAAN_ID' => $pecah[0], 'SUBCON_ID' => $pecah[2]));
                    } else if ($pecah[3] > 0) {//upah
                        echo 'delete opname upah, ';
                        $this->mDetailOP->_delete(array('OPNAME_ID' => $id_opname, 'PERMINTAAN_PEKERJAAN_ID' => $pecah[0], 'UPAH_ID' => $pecah[3]));
                    } else if ($pecah[4] > 0) {//paket
                        echo 'delete opname paket, ';
                        $this->mDetailOP->_delete(array('OPNAME_ID' => $id_opname, 'PERMINTAAN_PEKERJAAN_ID' => $pecah[0], 'PAKET_OVERHEAD_UPAH_ID' => $pecah[4]));
                    }
                }
            }
            if ($kategori_pajak_id == 2) {
                $harga_total = (100 + $value_pajak) * $harga_total / 100;
            }
            //$this->mOpname->_update(array('OPNAME_TOTAL_HARGA' => $harga_total), array('OPNAME_ID' => $idOpname));
            $this->mOpname->_update(array(
                'PETUGAS_ID' => $mySession['PENGGUNA_ID'],
                'RAB_ID' => $RAB_ID,
                'KATEGORI_OP_ID' => $KATEGORI_OP_ID,
                'STATUS_OP_ID' => $flag,
                'KATEGORI_PAJAK_ID' => $kategori_pajak_id,
                'PAJAK_ID' => $pajak_id,
                'TOP_ID' => (int) $this->input->post('top'),
                'PAJAK_VALUE' => $value_pajak,
                'NAMA_MANDOR' => $nama_mandor,
                'ALAMAT_MANDOR' => $alamat_mandor,
                'OPNAME_TOTAL_HARGA' => $harga_total,
                'TELPON_MANDOR' => $telpon_mandor
                    ), array('OPNAME_ID' => $id_opname)
            );
            $this->db->trans_complete();
            //redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/viewDetail?id=' . $idOpname);
        } else {
            
        }
        //redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/viewDetail?id=' . $id_opname);
        header('refresh:2;url=' . base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/viewDetail?id=' . $idOpname);
    }

    function reject() {
        if (in_array(Op::role_validator, $this->roles) == false) {
            echo 'Anda tidak berhak mengakses halaman ini';
            exit(0);
        }
        $this->load->model(array('mOpname', 'mDetailOP'));
        $idOP = (int) $this->input->get('ID_OPNAME');
        $myS = $this->session->userdata('logged_in');
        $op = $this->mOpname->_find(array('OPNAME_ID' => $idOP));
        var_dump($op);
        if (count($op) > 0) {
            if ($op[0]['STATUS_OP_ID'] == '2') {
                $this->mOpname->_update(array('STATUS_OP_ID' => 4, 'VALIDATOR_ID' => $myS['PENGGUNA_ID']), array('OPNAME_ID' => $idOP));
            }
        }
        redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/viewDetail?id=' . $idOP);
    }

    function validate() {
        if (( in_array(Op::role_validator, $this->roles) ) == false) {
            echo 'Anda tidak berhak mengakses halaman ini';
            exit(0);
        }
        $this->load->model(array('mOpname', 'mDetailOP'));
        $idOP = (int) $this->input->get('ID_OPNAME');
        $myS = $this->session->userdata('logged_in');
        $op = $this->mOpname->_find(array('OPNAME_ID' => $idOP));
        var_dump($op);
        if (count($op) > 0) {
            if ($op[0]['STATUS_OP_ID'] == '2' || $op[0]['STATUS_OP_ID'] == '5') {
                $this->mOpname->_update(array('STATUS_OP_ID' => 3, 'OPNAME_TANGGAL_VALIDASI' => date('Y-m-d h:i:s'), 'VALIDATOR_ID' => $myS['PENGGUNA_ID']), array('OPNAME_ID' => $idOP));
            }
        }
        redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/viewDetail?id=' . $idOP);
    }

    function setujui() {
        if ((in_array(Op::role_admin, $this->roles) ) == false) {
            echo 'Anda tidak berhak mengakses halaman ini';
            exit(0);
        }
        $this->load->model(array('mOpname', 'mDetailOP'));
        $idOP = (int) $this->input->get('ID_OPNAME');
        $myS = $this->session->userdata('logged_in');
        $op = $this->mOpname->_find(array('OPNAME_ID' => $idOP));
        var_dump($op);
        if (count($op) > 0) {
            if ($op[0]['STATUS_OP_ID'] == '1') {
                $this->mOpname->_update(array('STATUS_OP_ID' => 2, 'VALIDATOR_ID' => $myS['PENGGUNA_ID']), array('OPNAME_ID' => $idOP));
            }
        }
        redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/viewDetail?id=' . $idOP);
    }

    function delete() {
        if ((in_array(Op::role_admin, $this->roles) ) == false) {
            echo 'Anda tidak berhak mengakses halaman ini';
            exit(0);
        }
        $this->load->model(array('mOpname', 'mDetailOP'));
        $idOP = (int) $this->input->get('ID_OPNAME');
        $op = $this->mOpname->_find(array('OPNAME_ID' => $idOP));
        var_dump($op);
        if (count($op) > 0) {
            if (in_array($op[0]['STATUS_OP_ID'], array(1, 4))) {
                $this->mDetailOP->_delete(array('OPNAME_ID' => $idOP));
                $this->mOpname->_delete(array('OPNAME_ID' => $idOP));
            }
            echo 'op ada';
            redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0));
        } else {
            echo 'op tidak ada';
            redirect(base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/viewDetail?id=' . $idOP);
        }
    }

}
