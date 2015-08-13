<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

class mLpu extends MY_Model {

    // constants, column definition


    public function __construct() {
        parent::__construct();
        $this->tableName = 'lpu';
    }

    function get1($id = 0) {
        $sql = "select lpu.*,
            stts.STATUS_LPB_NAMA AS STATUS_NAMA,
            rab.RAB_KODE,
            rab.RAB_NAMA,
            validator.PENGGUNA_NAMA AS VALIDATOR_NAMA,
            petugas.PENGGUNA_NAMA AS DRAFTER_NAMA,
            mpro.MAIN_PROJECT_ID,
            mpro.MAIN_PROJECT_KODE,
            mpro.MAIN_PROJECT_NAMA,
            project.PROJECT_ID,
            project.PROJECT_KODE,
            project.PROJECT_NAMA,
            rab.RAB_ID
                from lpu 
                INNER join status_lpb stts
                on stts.STATUS_LPB_ID=lpu.STATUS_ID
                inner join rab_transaction rab
                on rab.RAB_ID=lpu.RAB_ID
                inner join pengguna petugas
                on petugas.PENGGUNA_ID=lpu.PETUGAS_ID
                inner join project
                on project.PROJECT_ID=rab.PROJECT_ID
                inner join main_project mpro
                on mpro.MAIN_PROJECT_ID=project.MAIN_PROJECT_ID
                left join pengguna validator
                on validator.PENGGUNA_ID=lpu.VALIDATOR_ID
                where lpu.LPU_ID='$id'";
        $query = $this->db->query($sql)->result_array();
        if (count($query) > 0) {
            return $query[0];
        }
        return null;
    }

    function get_list_lpu_datatable($start = 0, $length = 0, $order = array(), $search = array()) {
        $sql = "select count(lpu.LPU_ID) as jumlah from lpu";
        $query = $this->db->query($sql)->result_array();
        $jumlahData = 0;
        if (count($query) > 0)
            $jumlahData = (int) $query[0]['jumlah'];
        $a_order = array('lpu.LPU_ID', 'lpu.LPU_KODE', 'lpu.RAB_ID', 'lpu.TANGGAL_TRANSAKSI', 'lpu.STATUS_ID');
        $a_search = array('lpu.LPU_ID', 'lpu.LPU_KODE', 'lpu.TANGGAL_TRANSAKSI', 'rab.RAB_KODE', 'rab.RAB_NAMA', 'stts.STATUS_LPB_NAMA');
        $my_order = ' order by lpu.LPU_ID DESC ';
        $order['0']['column'] = abs($order['0']['column']);
        if ($order['0']['column'] < count($a_order)) {
            $my_order = ' order by ' . $a_order[$order['0']['column']] . ' ' . $order['0']['dir'];
        }
        $my_search = '';
        if (strlen($search['value']) > 0) {
            $my_search = ' where ';
            $sep = '';
            foreach ($a_search as $s) {
                $my_search .= $sep . $s . " like '%" . $search['value'] . "%' ";
                $sep = ' or ';
            }
        }
        $sql = "
select lpu.LPU_ID,
lpu.LPU_KODE,
lpu.TANGGAL_TRANSAKSI,
lpu.STATUS_ID,
lpu.RAB_ID,
rab.RAB_KODE,
stts.STATUS_LPB_NAMA AS STATUS_NAMA,
rab.RAB_NAMA
from lpu 
inner join rab_transaction rab
on lpu.RAB_ID=rab.RAB_ID
INNER join status_lpb stts
on stts.STATUS_LPB_ID=lpu.STATUS_ID
$my_search
$my_order
limit $start,$length";
        $query = $this->db->query($sql)->result_array();
        $hasil = array();
        foreach ($query as $row) {
            $baris = array();
            foreach ($row as $cell) {
                $baris[] = $cell;
            }
            $hasil[] = $baris;
        }
        return array('data' => $hasil, 'recordsFiltered' => $jumlahData,
            'recordsTotal' => $jumlahData
        );
    }

    function get_detail_opname_datatable($start = 0, $length = 0, $id_opname = 0, $id_lpu = 0, $order = array(), $search = array()) {
        $sql = "select count(*) AS jumlah from detail_transaksi_opname dop where dop.OPNAME_ID='$id_opname'";
        $query = $this->db->query($sql)->result_array()[0];
        $jumlahData = (int) $query['jumlah'];
        $where = '';
        if ($id_lpu > 0) {
            $where = ' and dlpu.LPU_ID!=\'' . $id_lpu . "'";
        }
        $a_search = array('dopname.KODE_PEKERJAAN', 'dopname.NAMA_PEKERJAAN', '(dopname.VOLUME_OPNAME-dopname.VOLUME_TERPAKAI)', 'dopname.VOLUME_OPNAME', 'dopname.SATUAN_PEKERJAAN');
        $a_order = array('dopname.KODE_PEKERJAAN', 'dopname.NAMA_PEKERJAAN', '(dopname.VOLUME_OPNAME-dopname.VOLUME_TERPAKAI)', 'dopname.VOLUME_OPNAME', 'dopname.SATUAN_PEKERJAAN');
        $my_search = '';
        $order[0]['column'] = abs($order[0]['column']);
        $my_order = '';
        if ($order[0]['column'] < count($a_order)) {
            $my_order = 'order by ' . $a_order[$order[0]['column']] . ' ' . $order[0]['dir'];
        }
        if (strlen($search['value']) > 0) {
            $my_search = 'where ';
            $sep = '';
            foreach ($a_search as $s) {
                $my_search .= $sep . $s . " like '%" . $search['value'] . "%'";
                $sep = ' or ';
            }
        }
        $sql = "
select dopname.* 
from (
    select
    op.OPNAME_ID,
    op.RAB_ID,
    op.KATEGORI_OP_ID,
    op.OPNAME_KODE,
    dop.PERMINTAAN_PEKERJAAN_ID,
    dop.ANALISA_ID,
    dop.SUBCON_ID,
    dop.UPAH_ID,
    dop.PAKET_OVERHEAD_UPAH_ID,
    dop.VOLUME_OPNAME,
    case
            when dop.ANALISA_ID is not null
                    then
                    (
                            select coalesce(sum(dlpu.VOLUME),0)
                            from detail_lpu dlpu
                            where dlpu.PK_ID=dop.PERMINTAAN_PEKERJAAN_ID
                            and dlpu.ANALISA_ID=dop.ANALISA_ID
                            and dlpu.ANALISA_ID IS NOT NULL
                            and dlpu.SUBCON_ID IS NULL
                            AND dlpu.UPAH_ID is null
                            and dlpu.PAKET_OVERHEAD_UPAH_ID is null
                    )
            WHEN dop.SUBCON_ID is not null
                    then
                    (
                            select coalesce(sum(dlpu.VOLUME),0)
                            from detail_lpu dlpu
                            where dlpu.PK_ID=dop.PERMINTAAN_PEKERJAAN_ID
                            and dlpu.SUBCON_ID=dop.SUBCON_ID
                            and dlpu.SUBCON_ID IS NOT NULL
                            and dlpu.ANALISA_ID IS NULL
                            AND dlpu.UPAH_ID is null
                            and dlpu.PAKET_OVERHEAD_UPAH_ID is null
                    )
            when dop.UPAH_ID IS NOT NULL
                    THEN
                    (
                            select coalesce(sum(dlpu.VOLUME),0)
                            from detail_lpu dlpu
                            where dlpu.PK_ID=dop.PERMINTAAN_PEKERJAAN_ID
                            and dlpu.UPAH_ID=dop.UPAH_ID
                            and dlpu.UPAH_ID IS NOT NULL
                            and dlpu.ANALISA_ID IS NULL
                            AND dlpu.SUBCON_ID is null
                            and dlpu.PAKET_OVERHEAD_UPAH_ID is null
                    )
            WHEN dop.PAKET_OVERHEAD_UPAH_ID IS NOT NULL
                    THEN
                    (
                            select coalesce(sum(dlpu.VOLUME),0)
                            from detail_lpu dlpu
                            where dlpu.PK_ID=dop.PERMINTAAN_PEKERJAAN_ID
                            and dlpu.PAKET_OVERHEAD_UPAH_ID=dop.PAKET_OVERHEAD_UPAH_ID
                            and dlpu.PAKET_OVERHEAD_UPAH_ID IS NOT NULL
                            and dlpu.ANALISA_ID IS NULL
                            AND dlpu.SUBCON_ID is null
                            and dlpu.UPAH_ID is null
                    )
            else
                    0
    end
    as VOLUME_TERPAKAI,
    case
            when dop.ANALISA_ID is not null
                    then
                            arab.ANALISA_KODE
            WHEN dop.SUBCON_ID is not null
                    then
                            subcon_tipe.SUBCON_TIPE_KODE
            when dop.UPAH_ID IS NOT NULL
                    THEN
                            master_upah.UPAH_KODE
            WHEN dop.PAKET_OVERHEAD_UPAH_ID IS NOT NULL
                    THEN
                            'LSUOV'
            else
                    0
    end
    as KODE_PEKERJAAN,
    case
            when dop.ANALISA_ID is not null
                    then
                            arab.ANALISA_NAMA
            WHEN dop.SUBCON_ID is not null
                    then
                            subcon.SUBCON_NAMA
            when dop.UPAH_ID IS NOT NULL
                    THEN
                            master_upah.UPAH_NAMA
            WHEN dop.PAKET_OVERHEAD_UPAH_ID IS NOT NULL
                    THEN
                            pou.PAKET_OVERHEAD_UPAH_NAMA
            else
                    0
    end
    as NAMA_PEKERJAAN,
    case
            when dop.ANALISA_ID is not null
                    then
                            arab.SATUAN_NAMA
            WHEN dop.SUBCON_ID is not null
                    then
                            subcon.SATUAN_NAMA
            when dop.UPAH_ID IS NOT NULL
                    THEN
                            satuan_upah.SATUAN_UPAH_NAMA
            WHEN dop.PAKET_OVERHEAD_UPAH_ID IS NOT NULL
                    THEN
                            satuan_upah.SATUAN_UPAH_NAMA
            else
                    0
    end
    as SATUAN_PEKERJAAN

    from detail_transaksi_opname dop
    inner join opname op
    on op.OPNAME_ID=dop.OPNAME_ID and op.STATUS_OP_ID=3
    left join analisa_rab arab
    on arab.ANALISA_ID=dop.ANALISA_ID
    LEFT join master_upah
    on master_upah.UPAH_ID=dop.UPAH_ID
    left join paket_overhead_upah pou
    on pou.PAKET_OVERHEAD_UPAH_ID=dop.PAKET_OVERHEAD_UPAH_ID
    left join satuan_upah
    on satuan_upah.SATUAN_UPAH_ID=master_upah.SATUAN_UPAH_ID or satuan_upah.SATUAN_UPAH_ID=pou.SATUAN_UPAH_ID
    left join subcon
    on subcon.SUBCON_ID=dop.SUBCON_ID
    left join subcon_tipe
    on subcon_tipe.SUBCON_TIPE_ID=subcon.SUBCON_TIPE_ID
    where dop.OPNAME_ID='$id_opname'
) as dopname
$my_search
$my_order
limit $start,$length
";
        $query = $this->db->query($sql)->result_array();
        $hasil = array();
        foreach ($query as $row) {
            $baris = array();
            foreach ($row as $cell) {
                $baris[] = $cell;
            }
            $hasil[] = $baris;
        }
        return array('data' => $hasil, 'recordsFiltered' => $jumlahData,
            'recordsTotal' => $jumlahData
        );
    }

    function get_list_opname($id_rab = 0) {
        $sql = "select * from opname where STATUS_OP_ID=3 and RAB_ID='$id_rab' order by OPNAME_ID DESC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

}
