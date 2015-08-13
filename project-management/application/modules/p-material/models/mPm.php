<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

class mPm extends MY_Model {

    // constants, column definition
    

    public function __construct() {
        parent::__construct();
        $this->tableName = 'kembali_barang';
        $this->idField = 'KEMBALI_BARANG_ID';
    }

    function get1($id=0){
    	$sql="select kb.*, 
            hb.HUTANG_BARANG_ID, 
            hb.HUTANG_BARANG_KODE, 
            hb.TANGGAL_TRANSAKSI_HM,
            hb.RAB_PENERIMA,
            hb.RAB_PEMBERI,
            hb.GUDANG_PEMBERI,
            hb.GUDANG_PENERIMA,
            hb.TANGGAL_MULAI_HUTANG,
            hb.TANGGAL_PREDIKSI_KEMBALI,
			drafter.PENGGUNA_NAMA AS DRAFTER_NAMA,
			validator.PENGGUNA_NAMA AS VALIDATOR_NAMA
			from kembali_barang kb
			inner join hutang_barang hb
			on hb.HUTANG_BARANG_ID=kb.HM_ID
			inner join pengguna drafter
			on drafter.PENGGUNA_ID=hb.PETUGAS_ID
			left join pengguna validator
			on validator.PENGGUNA_ID=hb.VALIDATOR_ID
			where kb.KEMBALI_BARANG_ID='$id'";
    	$query=$this->db->query($sql)->result_array();
    	if(count($query)>0){
    		return $query[0];
    	}
    	return null;
    }

    function get_list_pm_datatable($start=0,$length=10){
    	$sql = "select count(KEMBALI_BARANG_ID) as jumlah from kembali_barang";
    	$query = $this->db->query($sql)->result_array();
    	$jumlahData=$query[0]['jumlah'];
    	$sql = "select kb.KEMBALI_BARANG_ID, 
                kb.KEMBALI_BARANG_KODE,
                hb.HUTANG_BARANG_KODE,
                kb.TANGGAL_TRANSAKSI,
                stts.STATUS_LPB_NAMA,
                stts.STATUS_LPB_ID,
                kb.STATUS_ID
                from kembali_barang kb
                inner join status_lpb stts
                on stts.STATUS_LPB_ID=kb.STATUS_ID
                inner join hutang_barang hb
                on hb.HUTANG_BARANG_ID=kb.HM_ID
                order by kb.KEMBALI_BARANG_ID desc
				limit $start,$length";
		$query = $this->db->query($sql)->result_array();
		$hasil=array();
		foreach ($query as $row) {
			$h=array();
			foreach ($row as $cell) {
				$h[]=$cell;
			}
			$hasil[]=$h;
		}
		return array('data' => $hasil, 'recordsFiltered' => $jumlahData, 
            'recordsTotal' => $jumlahData,
            'sql'=>$sql
                );
    }
}