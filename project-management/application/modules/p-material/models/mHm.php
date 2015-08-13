<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

class mHm extends MY_Model {

    // constants, column definition


    public function __construct() {
        parent::__construct();
        $this->tableName = 'hutang_barang';
        $this->idField = 'HUTANG_BARANG_ID';
    }

    public function get1($id = 0) {
        $sql = "
select HUTANG_BARANG_ID, 
HUTANG_BARANG_KODE, 
TANGGAL_TRANSAKSI_HM,
rab_pemberi.RAB_KODE as RAB_KODE_PEMBERI,
rab_penerima.RAB_KODE as RAB_KODE_PENERIMA,
stts.STATUS_LPB_NAMA as STATUS_NAMA,
RAB_PENERIMA,
RAB_PEMBERI,
hb.STATUS_ID,
hb.TANGGAL_PREDIKSI_KEMBALI,
hb.TANGGAL_MULAI_HUTANG,
hb.GUDANG_PENERIMA,
hb.GUDANG_PEMBERI,
pro_pemberi.PROJECT_ID as PROJECT_ID_PEMBERI,
pro_pemberi.PROJECT_KODE as PROJECT_KODE_PEMBERI,
pro_pemberi.PROJECT_NAMA AS PROJECT_NAMA_PEMBERI,
pro_penerima.PROJECT_ID AS PROJECT_ID_PENERIMA,
pro_penerima.PROJECT_KODE AS PROJECT_KODE_PENERIMA,
pro_penerima.PROJECT_NAMA AS PROJECT_NAMA_PENERIMA,
mpro_pemberi.MAIN_PROJECT_ID AS MPRO_ID_PEMBERI,
mpro_pemberi.MAIN_PROJECT_KODE as MPRO_KODE_PEMBERI,
mpro_pemberi.MAIN_PROJECT_NAMA as MPRO_NAMA_PEMBERI,
mpro_penerima.MAIN_PROJECT_ID as MPRO_ID_PENERIMA,
mpro_penerima.MAIN_PROJECT_KODE as MPRO_KODE_PENERIMA,
mpro_penerima.MAIN_PROJECT_NAMA as MPRO_NAMA_PENERIMA,
g_penerima.GUDANG_KODE as GUDANG_KODE_PENERIMA,
g_penerima.GUDANG_NAMA as GUDANG_NAMA_PENERIMA,
g_penerima.GUDANG_LOKASI as GUDANG_LOKASI_PENERIMA,
g_pemberi.GUDANG_KODE as GUDANG_KODE_PEMBERI,
g_pemberi.GUDANG_NAMA AS GUDANG_NAMA_PEMBERI,
g_pemberi.GUDANG_LOKASI AS GUDANG_LOKASI_PEMBERI,
drafter.PENGGUNA_NAMA AS DRAFTER_NAMA,
validator.PENGGUNA_NAMA AS VALIDATOR_NAMA,
hb.PJ

from hutang_barang hb
inner join rab_transaction rab_penerima
on rab_penerima.RAB_ID=hb.RAB_PENERIMA
inner join rab_transaction rab_pemberi
on rab_pemberi.RAB_ID=hb.RAB_PEMBERI
inner join status_lpb stts
on stts.STATUS_LPB_ID=hb.STATUS_ID
inner join project pro_pemberi
on pro_pemberi.PROJECT_ID=rab_pemberi.PROJECT_ID
inner join project pro_penerima 
on pro_penerima.PROJECT_ID=rab_penerima.PROJECT_ID
inner join main_project mpro_pemberi
on mpro_pemberi.MAIN_PROJECT_ID=pro_pemberi.MAIN_PROJECT_ID
inner join main_project mpro_penerima
on mpro_penerima.MAIN_PROJECT_ID=pro_penerima.MAIN_PROJECT_ID
inner join master_gudang g_penerima
on g_penerima.GUDANG_ID=hb.GUDANG_PENERIMA
inner join master_gudang g_pemberi
on g_pemberi.GUDANG_ID=hb.GUDANG_PEMBERI
inner join pengguna drafter
on drafter.PENGGUNA_ID=hb.PETUGAS_ID
left join pengguna validator
on validator.PENGGUNA_ID=hb.VALIDATOR_ID
where hb.HUTANG_BARANG_ID='$id'";
        $query = $this->db->query($sql)->result_array();
        if (count($query) > 0) {
            return $query[0];
        }
        return null;
    }

    public function get_list_hm_datatable($start = 0, $length = 0, $order = array(), $search = array()) {
        $sql = "select count(HUTANG_BARANG_ID) as jumlah from hutang_barang";
        $query = $this->db->query($sql)->result_array();
        $jumlahData = 0;
        if (count($query) > 0)
            $jumlahData = $query[0]['jumlah'];
        $a_order = array('HUTANG_BARANG_ID', 'HUTANG_BARANG_KODE', 'TANGGAL_TRANSAKSI_HM', 'penerima.RAB_NAMA', 'pemberi.RAB_NAMA', 'hb.STATUS_ID');
        $my_order = '';
        $index = (int) $order[0]['column'];
        if ($index < count($a_order)) {
            $my_order = " order by " . $a_order[$index] . ' ' . $order[0]['dir'] . ' ';
        }
        $a_search = array('HUTANG_BARANG_ID', 'HUTANG_BARANG_KODE', 'TANGGAL_TRANSAKSI_HM', 'penerima.RAB_NAMA', 'pemberi.RAB_NAMA', 'stts.STATUS_LPB_NAMA');
        $my_search = '';
        $sep = '';
        if (strlen($search['value']) > 0) {
            $my_search = ' where ';
            foreach ($a_search as $s) {
                $my_search .= $sep . $s . " like '%" . $search['value'] . "%'";
                $sep = ' or ';
            }
        }
        $sql = "
select HUTANG_BARANG_ID, 
HUTANG_BARANG_KODE, 
TANGGAL_TRANSAKSI_HM,
#concat(pemberi.RAB_KODE,' ',pemberi.RAB_NAMA) as rab_pemberi,
#concat(penerima.RAB_KODE,' ',penerima.RAB_NAMA) as rab_penerima,
pemberi.RAB_NAMA as rab_pemberi,
penerima.RAB_NAMA as rab_penerima,
stts.STATUS_LPB_NAMA as STATUS_NAMA,
RAB_PENERIMA,
RAB_PEMBERI,
hb.STATUS_ID
from hutang_barang hb
inner join rab_transaction penerima
on penerima.RAB_ID=hb.RAB_PENERIMA
inner join rab_transaction pemberi
on pemberi.RAB_ID=hb.RAB_PEMBERI
inner join status_lpb stts
on stts.STATUS_LPB_ID=hb.STATUS_ID
$my_search
$my_order
limit $start,$length
        ";
        $query = $this->db->query($sql)->result_array();
        $hasil = array();
        foreach ($query as $key => $row) {
            $hasil2 = array();
            foreach ($row as $key2 => $cell) {
                $hasil2[] = $cell;
            }
            $hasil[] = $hasil2;
        }
        return array('data' => $hasil, 'recordsFiltered' => $jumlahData,
            'recordsTotal' => $jumlahData,
            'sql' => $sql
        );
    }

}
