<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

class mOpname extends MY_Model {

    // constants, column definition


    public function __construct() {
        parent::__construct();
        $this->tableName = 'opname';
    }

    function getListPK($RABId, $kategoriPKId) {
        //$sql = "select * from permintaan_pekerjaan where RAB_ID=? and KATEGORI_PK_ID=?";
        $this->db->where(array('RAB_ID' => $RABId, 'KATEGORI_PK_ID' => $kategoriPKId, 'STATUS_PK_ID' => 3))->order_by('PERMINTAAN_PEKERJAAN_ID', 'DESC');
        $query = $this->db->get('permintaan_pekerjaan');
        return $query->result_array();
    }

    function getDetailPKDataTable($pk_id, $start = 0, $length = 0, $id_op = 0, $order = array(), $search = array()) {
        $sql = "select count(*) as jumlah from detail_transaksi_pk where PERMINTAAN_PEKERJAAN_ID='$pk_id'";
        $query = $this->db->query($sql);
        $query = $query->result_array();
        $jumlahData = (int) $query[0]['jumlah'];
        $where1 = '';
        $where3 = '';
        if ($id_op > 0) {
            $where1 = ' and dop1.OPNAME_ID!=\'' . $id_op . '\'';
            $where3 = ' and dop3.OPNAME_ID!=\'' . $id_op . '\'';
        }
        $a_search = array(
//            'arab.ANALISA_KODE', 'subcon_tipe.SUBCON_TIPE_KODE', 'master_upah.UPAH_KODE',
//            'arab.ANALISA_NAMA', 'subcon.SUBCON_NAMA', 'master_upah.UPAH_NAMA', 'pou.PAKET_OVERHEAD_UPAH_NAMA',
//            'arab.SATUAN_NAMA', 'subcon.SATUAN_NAMA', 'satuan_upah.SATUAN_UPAH_NAMA',
//            'darab.HARGA_ANALISA', 'subcon.SUBCON_HARGA', 'master_upah.UPAH_HARGA', 'pou.PAKET_OVERHEAD_UPAH_HARGA'
            'detail_pk.KODE_PEKERJAAN',
            'detail_pk.NAMA_PEKERJAAN',
            'detail_pk.VOLUME_PK',
            '(detail_pk.VOLUME_PK-detail_pk.VOLUME_TERPAKAI)',
            'detail_pk.SATUAN_PEKERJAAN',
            'detail_pk.HARGA_PEKERJAAN',
            '(detail_pk.HARGA_PEKERJAAN*(detail_pk.VOLUME_PK-detail_pk.VOLUME_TERPAKAI))'
        );
        $a_order = array(
//            array('arab.ANALISA_KODE', 'subcon_tipe.SUBCON_TIPE_KODE', 'master_upah.UPAH_KODE'),
//            array('arab.ANALISA_NAMA', 'subcon.SUBCON_NAMA', 'master_upah.UPAH_NAMA', 'pou.PAKET_OVERHEAD_UPAH_NAMA'),
//            array('dpk.VOLUME_PK'),
//            array('VOLUME_TERPAKAI'),
//            array('arab.SATUAN_NAMA', 'subcon.SATUAN_NAMA', 'satuan_upah.SATUAN_UPAH_NAMA',),
//            array('darab.HARGA_ANALISA', 'subcon.SUBCON_HARGA', 'master_upah.UPAH_HARGA', 'pou.PAKET_OVERHEAD_UPAH_HARGA')
            'detail_pk.KODE_PEKERJAAN',
            'detail_pk.NAMA_PEKERJAAN',
            'detail_pk.VOLUME_PK',
            '(detail_pk.VOLUME_PK-detail_pk.VOLUME_TERPAKAI)',
            'detail_pk.SATUAN_PEKERJAAN',
            'detail_pk.HARGA_PEKERJAAN',
            '(detail_pk.HARGA_PEKERJAAN*(detail_pk.VOLUME_PK-detail_pk.VOLUME_TERPAKAI))'
        );
        $my_order = '';
        if ($order[0]['column'] < count($a_order)) {
            $my_order = 'order by ' . $a_order[$order[0]['column']].' '.$order[0]['dir'];
//            $sep = '';
//            foreach ($a_order[$order[0]['column']] as $ordr) {
//                $my_order.=$sep . $ordr . ' ' . $order[0]['dir'];
//                $sep = ',';
//            }
        }
        $my_search = '';
        if (strlen($search['value']) > 0) {
            $sep = '';
            $my_search = ' WHERE (';
            foreach ($a_search as $s) {
                $my_search.= $sep . $s . " like '%" . $search['value'] . "%'";
                $sep = ' or ';
            }
            $my_search.=')';
        }

        $sql = "
select detail_pk.*
from (
    select 
    dpk.PERMINTAAN_PEKERJAAN_ID,
    dpk.ANALISA_ID,
    dpk.SUBCON_ID,
    dpk.UPAH_ID,
    dpk.PAKET_OVERHEAD_UPAH_ID,
    dpk.VOLUME_PK,
    case
        when dpk.ANALISA_ID is not null
            then
                arab.ANALISA_KODE
        when dpk.SUBCON_ID is not null
            then
                subcon_tipe.SUBCON_TIPE_KODE
        when dpk.UPAH_ID is not null
            then
                master_upah.UPAH_KODE
        when dpk.PAKET_OVERHEAD_UPAH_ID is not null
            then
                'LSUOV'
        else
            '-'
    end
    as KODE_PEKERJAAN,
    case
        when dpk.ANALISA_ID is not null
            then
                arab.ANALISA_NAMA
        when dpk.SUBCON_ID is not null
            then
                subcon.SUBCON_NAMA
        when dpk.UPAH_ID is not null
            then
                master_upah.UPAH_NAMA
        when dpk.PAKET_OVERHEAD_UPAH_ID is not null
            then
                pou.PAKET_OVERHEAD_UPAH_NAMA
        else
            '-'
    end
    as NAMA_PEKERJAAN,
    case
        when dpk.ANALISA_ID is not null
            then
                arab.SATUAN_NAMA
        when dpk.SUBCON_ID is not null
            then
                subcon.SATUAN_NAMA
        when dpk.UPAH_ID is not null
            then
                satuan_upah.SATUAN_UPAH_NAMA
        when dpk.PAKET_OVERHEAD_UPAH_ID is not null
            then
                satuan_upah.SATUAN_UPAH_NAMA
        else
            '-'
    end
    as SATUAN_PEKERJAAN,
    case
        when dpk.ANALISA_ID is not null
            then
                darab.HARGA_ANALISA
        when dpk.SUBCON_ID is not null
            then
                subcon.SUBCON_HARGA
        when dpk.UPAH_ID is not null
            then
                master_upah.UPAH_HARGA
        when dpk.PAKET_OVERHEAD_UPAH_ID is not null
            then
                pou.PAKET_OVERHEAD_UPAH_HARGA
        else
            '-'
    end
    as HARGA_PEKERJAAN,
    case
            when dpk.ANALISA_ID is not null
                    then
                    (
                            select coalesce(sum(dop1.VOLUME_OPNAME),0)
                            from detail_transaksi_opname dop1
                            where dop1.PERMINTAAN_PEKERJAAN_ID=pk.PERMINTAAN_PEKERJAAN_ID
                            and dop1.ANALISA_ID=dpk.ANALISA_ID
                            and dop1.ANALISA_ID is not null
                            and dop1.SUBCON_ID is null
                            and dop1.UPAH_ID is null
                            and dop1.PAKET_OVERHEAD_UPAH_ID is null
                            $where1
                    )
            when dpk.SUBCON_ID is not null
                    then
                    (
                            select coalesce(sum(dop1.VOLUME_OPNAME),0)
                            from detail_transaksi_opname dop1
                            where dop1.PERMINTAAN_PEKERJAAN_ID=pk.PERMINTAAN_PEKERJAAN_ID
                            and dop1.SUBCON_ID=dpk.SUBCON_ID
                            and dop1.SUBCON_ID is not null
                            and dop1.ANALISA_ID is null
                            and dop1.UPAH_ID is null
                            and dop1.PAKET_OVERHEAD_UPAH_ID is null
                            $where1
                    )
            when dpk.UPAH_ID is not null
                    then
                    (
                            select coalesce(sum(dop1.VOLUME_OPNAME),0)
                            from detail_transaksi_opname dop1
                            where dop1.PERMINTAAN_PEKERJAAN_ID=pk.PERMINTAAN_PEKERJAAN_ID
                            and dop1.UPAH_ID=dpk.UPAH_ID
                            and dop1.UPAH_ID is not null
                            and dop1.ANALISA_ID is null
                            and dop1.SUBCON_ID is null
                            and dop1.PAKET_OVERHEAD_UPAH_ID is null
                            $where1
                    )
            when dpk.PAKET_OVERHEAD_UPAH_ID is not null
                    then
                    (
                            select coalesce(sum(dop1.VOLUME_OPNAME),0)
                            from detail_transaksi_opname dop1
                            where dop1.PERMINTAAN_PEKERJAAN_ID=pk.PERMINTAAN_PEKERJAAN_ID
                            and dop1.PAKET_OVERHEAD_UPAH_ID=dpk.PAKET_OVERHEAD_UPAH_ID
                            and dop1.PAKET_OVERHEAD_UPAH_ID is not null
                            and dop1.ANALISA_ID is null
                            and dop1.SUBCON_ID is null
                            and dop1.UPAH_ID is null
                            $where1
                    )
            else
                            0
    end
    as VOLUME_TERPAKAI
    
    from permintaan_pekerjaan pk
    inner join detail_transaksi_pk dpk
    on dpk.PERMINTAAN_PEKERJAAN_ID=pk.PERMINTAAN_PEKERJAAN_ID
    left join analisa_rab arab
    on arab.ANALISA_ID=dpk.ANALISA_ID
    left join subcon
    on subcon.SUBCON_ID=dpk.SUBCON_ID
    left join master_upah
    on master_upah.UPAH_ID=dpk.UPAH_ID
    left join paket_overhead_upah pou
    on pou.PAKET_OVERHEAD_UPAH_ID=dpk.PAKET_OVERHEAD_UPAH_ID
    left join satuan_upah
    on satuan_upah.SATUAN_UPAH_ID=master_upah.SATUAN_UPAH_ID or satuan_upah.SATUAN_UPAH_ID=pou.SATUAN_UPAH_ID
    left join subcon_tipe
    on subcon_tipe.SUBCON_TIPE_ID=subcon.SUBCON_TIPE_ID
    left join (
            select darab1.ANALISA_ID, sum(darab1.DETAIL_ANALISA_TOTAL) as HARGA_ANALISA
            from detail_analisa_rab darab1
            where darab1.UPAH_ID is not null
            group by darab1.ANALISA_ID
    ) as darab
    on darab.ANALISA_ID=arab.ANALISA_ID
    where pk.PERMINTAAN_PEKERJAAN_ID='$pk_id' 
) as detail_pk
$my_search
$my_order
limit $start,$length
    ";
        $sql = str_replace("\r\n", " ", $sql);
        $sql = str_replace("\t", " ", $sql);
        $query = $this->db->query($sql);
        $query = $query->result_array();
        $hasil = array();
        foreach ($query as $row) {
            $baris = array();
            foreach ($row as $cell) {
                $baris[] = $cell;
            }
            $hasil[] = $baris;
        }
        return array('data' => $hasil, 'recordsFiltered' => $jumlahData,
            'recordsTotal' => $jumlahData,
            'sql' => $sql
        );
    }

    function getDeksripsiOpname($idOpname) {
        $sql = "
SELECT        
rab_transaction.RAB_KODE, 
main_project.MAIN_PROJECT_NAMA, 
project.PROJECT_NAMA, 
opname.*,               
kategori_pk.KATEGORI_PK_NAMA,
project.PROJECT_ID,
main_project.MAIN_PROJECT_ID,
stts.STATUS_LPB_NAMA AS STATUS_NAMA,
DATE_FORMAT(opname.OPNAME_TANGGAL_VALIDASI,'%Y-%m-%d %H:%i:%s') as TANGGAL_VALIDASI,
validator.PENGGUNA_NAMA AS VALIDATOR_NAMA,
drafter.PENGGUNA_NAMA AS DRAFTER_NAMA,
kategori_pajak.KATEGORI_PAJAK_NAMA,
pajak.PAJAK_NAMA
FROM            opname INNER JOIN
rab_transaction ON opname.RAB_ID = rab_transaction.RAB_ID 
INNER JOIN
project ON rab_transaction.PROJECT_ID = project.PROJECT_ID 
INNER JOIN
main_project ON project.MAIN_PROJECT_ID = main_project.MAIN_PROJECT_ID 
INNER JOIN
kategori_pk ON opname.KATEGORI_OP_ID = kategori_pk.KATEGORI_PK_ID
inner join status_lpb stts
on stts.STATUS_LPB_ID=opname.STATUS_OP_ID
left join pengguna as validator
on validator.PENGGUNA_ID=opname.VALIDATOR_ID
inner join pengguna drafter
on drafter.PENGGUNA_ID=opname.PETUGAS_ID
inner join kategori_pajak
on kategori_pajak.KATEGORI_PAJAK_ID=opname.KATEGORI_PAJAK_ID
inner join pajak
on pajak.PAJAK_ID=opname.PAJAK_ID
WHERE        (opname.OPNAME_ID = '$idOpname')
ORDER BY opname.OPNAME_ID DESC
                ";
        $query = $this->db->query($sql);
        $hasil = $query->result_array();
        if (count($hasil) > 0) {
            return $hasil[0];
        }
        return null;
    }

    function getListOPDataTable($start, $length, $order = array(), $search = array()) {
        $sql = "select count(opname_id) as jumlah from opname ";
        $query = $this->db->query($sql);
        $query = $query->result_array();
        $jumlahData = $query[0]['jumlah'];
        $a_order = array('opname.OPNAME_ID', 'opname.OPNAME_KODE', 'opname.OPNAME_TANGGAL', 'opname.OPNAME_TOTAL_HARGA', 'kategori_pk.KATEGORI_PK_NAMA', 'rab_status_approval.RAB_STATUS_APPROVAL_NAMA');
        $my_order = 'opname.OPNAME_ID desc';
        if ($order[0]['column'] < count($a_order)) {
            $my_order = $a_order[$order[0]['column']] . ' ' . $order[0]['dir'];
        }
        $a_search = array('opname.OPNAME_ID', 'opname.OPNAME_KODE', 'opname.OPNAME_TOTAL_HARGA', 'kategori_pk.KATEGORI_PK_NAMA', 'rab_status_approval.RAB_STATUS_APPROVAL_NAMA', 'opname.OPNAME_TANGGAL');
        $my_search = '';
        if (strlen($search['value']) > 0) {
            $my_search = "where ";
            $sep = '';
            foreach ($a_search as $s) {
                $my_search .=$sep . $s . " like '%" . $search['value'] . "%' ";
                $sep = " or ";
            }
        }
        $sql = "
SELECT  
opname.OPNAME_ID, 
opname.OPNAME_KODE, 
opname.OPNAME_TOTAL_HARGA, 
kategori_pk.KATEGORI_PK_NAMA, 
rab_status_approval.RAB_STATUS_APPROVAL_NAMA, 
rab_transaction.RAB_ID, 
project.PROJECT_ID, 
main_project.MAIN_PROJECT_ID, 
kategori_pk.KATEGORI_PK_ID,
opname.STATUS_OP_ID,
opname.OPNAME_TANGGAL

FROM            opname INNER JOIN
rab_transaction ON opname.RAB_ID = rab_transaction.RAB_ID INNER JOIN
project ON rab_transaction.PROJECT_ID = project.PROJECT_ID INNER JOIN
main_project ON project.MAIN_PROJECT_ID = main_project.MAIN_PROJECT_ID INNER JOIN
kategori_pk ON opname.KATEGORI_OP_ID = kategori_pk.KATEGORI_PK_ID INNER JOIN
rab_status_approval ON opname.STATUS_OP_ID = rab_status_approval.RAB_STATUS_APPROVAL_ID
$my_search
ORDER BY $my_order
    limit $start,$length";
        $query = $this->db->query($sql);
        $query = $query->result_array();
        $hasil = array();
        foreach ($query as $row) {
            $baris = array();
            foreach ($row as $cell) {
                $baris[] = $cell;
            }
            $hasil[] = $baris;
        }
        return array('data' => $hasil, 'recordsFiltered' => $jumlahData, 'recordsTotal' => $jumlahData, 'sql' => $sql);
    }

    function get_list_opname($id_rab = 0) {
        $sql = "select * from opname where RAB_ID='$id_rab' order by OPNAME_ID DESC";
        return $this->db->query($sql)->result_array();
    }

}
