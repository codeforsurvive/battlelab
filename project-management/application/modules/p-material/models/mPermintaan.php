<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

class mPermintaan extends MY_Model {

    const ID = 'PERMINTAAN_PEMBELIAN_ID';
    const KODE = 'PERMINTAAN_PEMBELIAN_KODE';

    public function __construct() {
        parent::__construct();
        $this->tableName = 'permintaan_pembelian';
        $this->idField = mPermintaan::ID;
    }

    function insert($data) {
        $this->db->insert($this->tableName, $data);
    }

    function insertAndGetLast($data) {
        $this->db->insert($this->tableName, $data);
        return $this->db->insert_id();
    }

    function getAllPP($RAB_ID, $TIPE) {
        $sql = "SELECT `pp`.*, DATE(pp.PERMINTAAN_PEMBELIAN_TANGGAL) AS TANGGAL, `validator`.`PENGGUNA_NAMA` AS VALIDATOR_NAMA, 
		`petugas`.`PENGGUNA_NAMA` AS PETUGAS_NAMA, `stat`.`STATUS_PP_NAMA` AS STATUS_NAMA, `gudang`.`GUDANG_NAMA` AS GUDANG_NAMA, 
		`kat`.`KATEGORI_PP_NAMA` AS KATEGORI_NAMA, `kat`.`KATEGORI_PP_ID` AS KATEGORI_ID FROM (`permintaan_pembelian` pp) 
		LEFT JOIN `pengguna` validator ON `validator`.`PENGGUNA_ID` = `pp`.`VALIDATOR_ID` 
		LEFT JOIN `pengguna` petugas ON `petugas`.`PENGGUNA_ID` = `pp`.`PETUGAS_ID` 
		JOIN `status_pp` stat ON `stat`.`STATUS_PP_ID` = `pp`.`STATUS_PP_ID` 
		LEFT JOIN `master_gudang` gudang ON `gudang`.`GUDANG_ID` = `pp`.`GUDANG_ID` 
		JOIN `kategori_pp` kat ON `kat`.`KATEGORI_PP_ID` = `pp`.`KATEGORI_PP_ID` 
		WHERE `pp`.`RAB_ID` = $RAB_ID AND `pp`.`KATEGORI_PP_ID` = $TIPE AND pp.STATUS_PP_ID = 3";

        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function getViewPP($id, $rab) {
        /* $sql = "SELECT *, SUM(`BARANG_HARGA`*`VOLUME_PP`) AS TOTAL FROM view_pp
          WHERE RAB_ID = {$rab} AND PERMINTAAN_PEMBELIAN_ID = {$id}
          GROUP BY `PERMINTAAN_PEMBELIAN_ID`
          ORDER BY PERMINTAAN_PEMBELIAN_ID desc"; */

        $sql = "SELECT *, `BARANG_HARGA`*`VOLUME_PP` AS TOTAL FROM view_pp
                WHERE view_pp.RAB_ID = {$rab} AND view_pp.PERMINTAAN_PEMBELIAN_ID = {$id} ORDER BY PERMINTAAN_PEMBELIAN_ID desc";
        //print_r($sql);
        
        $query = $this->db->query($sql);
        //print_r($query->result());
        return $query->result_array();
    }

    function getDetailPP($idPP) {
        $sql = "SELECT *, SUM(`BARANG_HARGA`*`VOLUME_PP`) AS TOTAL FROM view_pp
		WHERE PERMINTAAN_PEMBELIAN_ID = $idPP
		GROUP BY `PERMINTAAN_PEMBELIAN_ID`
		ORDER BY PERMINTAAN_PEMBELIAN_ID DESC ";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function getTotalPp($level) {
        if ($level == 1) {
            $sql = "SELECT *, SUM(`BARANG_HARGA`*`VOLUME_PP`) AS TOTAL FROM view_pp
                GROUP BY `PERMINTAAN_PEMBELIAN_ID`
                ORDER BY PERMINTAAN_PEMBELIAN_UPDATE DESC";
        } else {
            $sql = "SELECT *, SUM(`BARANG_HARGA`*`VOLUME_PP`) AS TOTAL FROM view_pp
                GROUP BY `PERMINTAAN_PEMBELIAN_ID`
                ORDER BY PERMINTAAN_PEMBELIAN_ID desc";
        }
        $columns = array(
            array('db' => 'PERMINTAAN_PEMBELIAN_ID', 'dt' => 0),
            array('db' => 'PERMINTAAN_PEMBELIAN_KODE', 'dt' => 1),
            array('db' => 'PERMINTAAN_PEMBELIAN_TANGGAL', 'dt' => 2),
            array('db' => 'PERMINTAAN_PEMBELIAN_UPDATE', 'dt' => 3),
            array('db' => 'PERMINTAAN_PEMBELIAN_VALIDATED', 'dt' => 4),
            array('db' => 'UPDATER_ID', 'dt' => 5),
            array('db' => 'UPDATER_NAMA', 'dt' => 6),
            array('db' => 'VALIDATOR_ID', 'dt' => 7),
            array('db' => 'VALIDATOR_NAMA', 'dt' => 8),
            array('db' => 'STATUS_PP_ID', 'dt' => 9),
            array('db' => 'STATUS_PP_NAMA', 'dt' => 10),
            array('db' => 'PETUGAS_ID', 'dt' => 11),
            array('db' => 'PETUGAS_NAMA', 'dt' => 12),
            array('db' => 'PROJECT_ID', 'dt' => 13),
            array('db' => 'PROJECT_KODE', 'dt' => 14),
            array('db' => 'PROJECT_NAMA', 'dt' => 15),
            array('db' => 'RAB_ID', 'dt' => 16),
            array('db' => 'RAB_KODE', 'dt' => 17),
            array('db' => 'RAB_NAMA', 'dt' => 18),
            array('db' => 'KATEGORI_PP_ID', 'dt' => 19),
            array('db' => 'KATEGORI_PP_NAMA', 'dt' => 20),
            array('db' => 'BARANG_ID', 'dt' => 21),
            array('db' => 'SUBCON_ID', 'dt' => 22),
            array('db' => 'BARANG_KODE', 'dt' => 23),
            array('db' => 'BARANG_NAMA', 'dt' => 24),
            array('db' => 'VOLUME_PP', 'dt' => 25),
            array('db' => 'SATUAN_NAMA', 'dt' => 26),
            array('db' => 'KATEGORI_BARANG_NAMA', 'dt' => 27),
            array('db' => 'GUDANG_ID', 'dt' => 28),
            array('db' => 'GUDANG_NAMA', 'dt' => 29),
            array('db' => 'TOTAL', 'dt' => 30)
        );
        //$query = $this->db->query($sql);
        return json_encode(SSP::simple($_GET, 'view_pp', 'PERMINTAAN_PEMBELIAN_ID', $columns, $sql));
    }

    function getListPpProject() {
        $sql = "SELECT * FROM view_pp
                GROUP BY `PROJECT_ID`";

        $query = $this->db->query($sql);
        return $query->result_array();
    }

    // 1 = Material, 0 = Subcon
    public function getAvailableSubconVolume($RAB_ID, $SUBCON_ID) {
        $sql = "SELECT * FROM view_subcon WHERE view_subcon.RAB_ID = {$RAB_ID} AND SUBCON_ID = {$SUBCON_ID}";

        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function getAvailableVolume($RAB_ID, $MATERIAL_ID) {
        $sql = "SELECT master_barang.*, kategori_barang.KATEGORI_BARANG_NAMA, detail_analisa_rab.DETAIL_ANALISA_HARGA, SUM(detail_pekerjaan.DETAIL_PEKERJAAN_VOLUME*detail_analisa_rab.DETAIL_ANALISA_KOEFISIEN) AS BARANG_VOLUME 
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
                WHERE detail_pekerjaan.RAB_ID = {$RAB_ID} AND `master_barang`.BARANG_ID = {$MATERIAL_ID} 
		GROUP BY master_barang.BARANG_ID";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function getListPpByProject($id) {
        $sql = "SELECT * FROM view_pp
                WHERE `PROJECT_ID`=?
                GROUP BY `PERMINTAAN_PEMBELIAN_ID`";

        $query = $this->db->query($sql, array($id));
        return $query->result_array();
    }

    public function exist($columnFilter) {
        $query = $this->db->get_where($this->tableName, $columnFilter);

        return $query->num_rows() > 0;
    }

    public function getListPP($rab_id, $tipe) {
        $baseSQL = "SELECT pp.*, 
			validator.PENGGUNA_NAMA AS VALIDATOR_NAMA, 
			petugas.PENGGUNA_NAMA AS PETUGAS_NAMA, 
			stat.STATUS_PP_NAMA AS STATUS_NAMA,
			gudang.GUDANG_NAMA AS GUDANG_NAMA,
			kat.KATEGORI_PP_NAMA AS KATEGORI_PP_NAMA
			FROM permintaan_pembelian pp 
			JOIN pengguna validator ON validator.PENGGUNA_ID = pp.VALIDATOR_ID
			JOIN pengguna petugas ON petugas.PENGGUNA_ID = pp.PETUGAS_ID
			JOIN status_pp stat ON stat.STATUS_PP_ID = pp.STATUS_PP_ID
			JOIN master_gudang gudang ON gudang.GUDANG_ID = pp.GUDANG_ID
			JOIN kategori_pp kat ON kat.KATEGORI_PP_ID = pp.KATEGORI_PP_ID
			WHERE pp.RAB_ID = " . $rab_id . " AND kat.KATEGORI_PP_ID = " . $tipe;

        $columns = array(
            array('db' => 'OVERHEAD_KODE', 'dt' => 0),
            array('db' => 'OVERHEAD_NAMA', 'dt' => 1),
            array('db' => 'OVERHEAD_TOTAL', 'dt' => 2),
            array('db' => 'RAB_NAMA', 'dt' => 3),
            array('db' => 'LOKASI_UPAH_NAMA', 'dt' => 4),
            array('db' => 'OVERHEAD_ID', 'dt' => 5)
        );

        return json_encode(SSP::simple($_GET, $this->tableName, $this->idField, $columns, $baseSQL));
    }

    public function getViewBarangPP($pp_id, $tipe) {
        /* $baseSQL = "SELECT COALESCE(temp.VOLUME_PO_TERPAKAI,0) AS VOLUME_PO_TERPAKAI, (pp.VOLUME_PP-COALESCE(temp.VOLUME_PO_TERPAKAI,0)) AS VOLUME_PP_SISA,detail_analisa_rab.DETAIL_ANALISA_HARGA AS HARGA_DETAIL, pp.VOLUME_PP AS VOLUME_PP, `master_barang`.*, `kategori_barang`.`kategori_barang_nama` AS KATEGORI_BARANG_NAMA 
          FROM detail_transaksi_pp pp LEFT JOIN master_barang ON pp.BARANG_ID = master_barang.BARANG_ID
          JOIN permintaan_pembelian ON permintaan_pembelian.PERMINTAAN_PEMBELIAN_ID = pp.PERMINTAAN_PEMBELIAN_ID
          JOIN `kategori_barang` ON `master_barang`.`kategori_barang_id` = `kategori_barang`.`kategori_barang_id`
          JOIN detail_analisa_rab ON detail_analisa_rab.BARANG_ID = pp.BARANG_ID
          JOIN rab_transaction ON rab_transaction.RAB_ID = permintaan_pembelian.RAB_ID
          JOIN detail_pekerjaan ON detail_pekerjaan.RAB_ID = rab_transaction.RAB_ID
          JOIN analisa_rab ON detail_analisa_rab.ANALISA_ID = detail_pekerjaan.ANALISA_ID AND detail_analisa_rab.ANALISA_ID = analisa_rab.ANALISA_ID
          LEFT JOIN (SELECT detail_po.BARANG_ID, detail_po.PERMINTAAN_PEMBELIAN_ID, SUM(IF(purchase_order.STATUS_PO_ID = 3,detail_po.VOLUME_PO,0)) AS VOLUME_PO_TERPAKAI
          FROM detail_po
          JOIN purchase_order ON purchase_order.PURCHASE_ORDER_ID = detail_po.PURCHASE_ORDER_ID
          GROUP BY detail_po.BARANG_ID, detail_po.PERMINTAAN_PEMBELIAN_ID) temp ON temp.BARANG_ID = pp.BARANG_ID AND temp.PERMINTAAN_PEMBELIAN_ID = pp.PERMINTAAN_PEMBELIAN_ID
          WHERE pp.PERMINTAAN_PEMBELIAN_ID = ".$pp_id."
          GROUP BY pp.DETAIL_PP_ID"; */
        if ($tipe == 1) {
            $baseSQL = " (SELECT 
			master_barang.BARANG_NAMA,
			kategori_barang.KATEGORI_BARANG_NAMA,
			master_barang.BARANG_KODE,
			pp.VOLUME_PP AS VOLUME_PP,
			master_barang.SATUAN_NAMA,
			detail_overhead.DETAIL_OVERHEAD_HARGA AS HARGA_DETAIL,
			master_barang.BARANG_ID,
			COALESCE(temp.VOLUME_PO_TERPAKAI,0) AS VOLUME_PO_TERPAKAI, 
			(pp.VOLUME_PP-COALESCE(temp.VOLUME_PO_TERPAKAI,0)) AS VOLUME_PP_SISA
			FROM detail_transaksi_pp pp LEFT JOIN master_barang ON pp.BARANG_ID = master_barang.BARANG_ID
			JOIN permintaan_pembelian ON permintaan_pembelian.PERMINTAAN_PEMBELIAN_ID = pp.PERMINTAAN_PEMBELIAN_ID
			JOIN `kategori_barang` ON `master_barang`.`kategori_barang_id` = `kategori_barang`.`kategori_barang_id` 
			JOIN detail_overhead ON detail_overhead.BARANG_ID = pp.BARANG_ID 
			LEFT JOIN (SELECT detail_po.BARANG_ID, detail_po.PERMINTAAN_PEMBELIAN_ID, SUM(IF(purchase_order.STATUS_PO_ID = 3,detail_po.VOLUME_PO,0)) AS VOLUME_PO_TERPAKAI
			FROM detail_po 
			JOIN purchase_order ON purchase_order.PURCHASE_ORDER_ID = detail_po.PURCHASE_ORDER_ID
			GROUP BY detail_po.BARANG_ID, detail_po.PERMINTAAN_PEMBELIAN_ID) temp ON temp.BARANG_ID = pp.BARANG_ID AND temp.PERMINTAAN_PEMBELIAN_ID = pp.PERMINTAAN_PEMBELIAN_ID
			WHERE pp.PERMINTAAN_PEMBELIAN_ID = " . $pp_id . " AND pp.BARANG_ID IS NOT NULL
			GROUP BY pp.DETAIL_PP_ID)
			UNION
			(SELECT 
			paket_overhead_material.PAKET_OVERHEAD_MATERIAL_NAMA AS BARANG_NAMA,
			(@a:='LSMOV') AS KATEGORI_BARANG_NAMA,
			(@b:='LSMOV') AS BARANG_KODE,
			pp.VOLUME_PP AS VOLUME_PP,
			paket_overhead_material.SATUAN_NAMA AS SATUAN_NAMA,
			paket_overhead_material.PAKET_OVERHEAD_MATERIAL_HARGA AS HARGA_DETAIL,
			paket_overhead_material.PAKET_OVERHEAD_MATERIAL_ID AS BARANG_ID,
			COALESCE(temp.VOLUME_PO_TERPAKAI,0) AS VOLUME_PO_TERPAKAI, 
			(pp.VOLUME_PP-COALESCE(temp.VOLUME_PO_TERPAKAI,0)) AS VOLUME_PP_SISA
			FROM detail_transaksi_pp pp LEFT JOIN paket_overhead_material ON pp.SUBCON_ID = paket_overhead_material.PAKET_OVERHEAD_MATERIAL_ID
			JOIN permintaan_pembelian ON permintaan_pembelian.PERMINTAAN_PEMBELIAN_ID = pp.PERMINTAAN_PEMBELIAN_ID 
			LEFT JOIN (SELECT detail_po.SUBCON_ID, detail_po.PERMINTAAN_PEMBELIAN_ID, SUM(IF(purchase_order.STATUS_PO_ID = 3,detail_po.VOLUME_PO,0)) AS VOLUME_PO_TERPAKAI
			FROM detail_po 
			JOIN purchase_order ON purchase_order.PURCHASE_ORDER_ID = detail_po.PURCHASE_ORDER_ID
			GROUP BY detail_po.SUBCON_ID, detail_po.PERMINTAAN_PEMBELIAN_ID) temp ON temp.SUBCON_ID = pp.SUBCON_ID AND temp.PERMINTAAN_PEMBELIAN_ID = pp.PERMINTAAN_PEMBELIAN_ID
			WHERE pp.PERMINTAAN_PEMBELIAN_ID = " . $pp_id . " AND pp.SUBCON_ID IS NOT NULL
			GROUP BY pp.DETAIL_PP_ID)";
        } else {
            $baseSQL = " (SELECT 
			master_barang.BARANG_NAMA,
			kategori_barang.KATEGORI_BARANG_NAMA,
			master_barang.BARANG_KODE,
			pp.VOLUME_PP AS VOLUME_PP,
			master_barang.SATUAN_NAMA,
			detail_analisa_rab.DETAIL_ANALISA_HARGA AS HARGA_DETAIL,
			master_barang.BARANG_ID,
			COALESCE(temp.VOLUME_PO_TERPAKAI,0) AS VOLUME_PO_TERPAKAI, 
			(pp.VOLUME_PP-COALESCE(temp.VOLUME_PO_TERPAKAI,0)) AS VOLUME_PP_SISA
			FROM detail_transaksi_pp pp LEFT JOIN master_barang ON pp.BARANG_ID = master_barang.BARANG_ID
			JOIN permintaan_pembelian ON permintaan_pembelian.PERMINTAAN_PEMBELIAN_ID = pp.PERMINTAAN_PEMBELIAN_ID
			JOIN `kategori_barang` ON `master_barang`.`kategori_barang_id` = `kategori_barang`.`kategori_barang_id` 
			JOIN detail_analisa_rab ON detail_analisa_rab.BARANG_ID = pp.BARANG_ID 
			JOIN rab_transaction ON rab_transaction.RAB_ID = permintaan_pembelian.RAB_ID
			JOIN detail_pekerjaan ON detail_pekerjaan.RAB_ID = rab_transaction.RAB_ID
			JOIN analisa_rab ON detail_analisa_rab.ANALISA_ID = detail_pekerjaan.ANALISA_ID AND detail_analisa_rab.ANALISA_ID = analisa_rab.ANALISA_ID
			LEFT JOIN (SELECT detail_po.BARANG_ID, detail_po.PERMINTAAN_PEMBELIAN_ID, SUM(IF(purchase_order.STATUS_PO_ID = 3,detail_po.VOLUME_PO,0)) AS VOLUME_PO_TERPAKAI
			FROM detail_po 
			JOIN purchase_order ON purchase_order.PURCHASE_ORDER_ID = detail_po.PURCHASE_ORDER_ID
			GROUP BY detail_po.BARANG_ID, detail_po.PERMINTAAN_PEMBELIAN_ID) temp ON temp.BARANG_ID = pp.BARANG_ID AND temp.PERMINTAAN_PEMBELIAN_ID = pp.PERMINTAAN_PEMBELIAN_ID
			WHERE pp.PERMINTAAN_PEMBELIAN_ID = " . $pp_id . " AND pp.BARANG_ID IS NOT NULL
			GROUP BY pp.DETAIL_PP_ID)
			UNION
			(SELECT 
			subcon.SUBCON_NAMA AS BARANG_NAMA,
			subcon_tipe.SUBCON_TIPE_NAMA AS KATEGORI_BARANG_NAMA,
			subcon_tipe.SUBCON_TIPE_KODE AS BARANG_KODE,
			pp.VOLUME_PP AS VOLUME_PP,
			subcon.SATUAN_NAMA AS SATUAN_NAMA,
			subcon.SUBCON_HARGA AS HARGA_DETAIL,
			subcon.SUBCON_ID AS BARANG_ID,
			COALESCE(temp.VOLUME_PO_TERPAKAI,0) AS VOLUME_PO_TERPAKAI, 
			(pp.VOLUME_PP-COALESCE(temp.VOLUME_PO_TERPAKAI,0)) AS VOLUME_PP_SISA
			FROM detail_transaksi_pp pp 
			LEFT JOIN subcon ON pp.SUBCON_ID = subcon.SUBCON_ID
			LEFT JOIN subcon_tipe ON subcon_tipe.SUBCON_TIPE_ID = subcon.SUBCON_TIPE_ID
			JOIN permintaan_pembelian ON permintaan_pembelian.PERMINTAAN_PEMBELIAN_ID = pp.PERMINTAAN_PEMBELIAN_ID 
			LEFT JOIN (SELECT detail_po.SUBCON_ID, detail_po.PERMINTAAN_PEMBELIAN_ID, SUM(IF(purchase_order.STATUS_PO_ID = 3,detail_po.VOLUME_PO,0)) AS VOLUME_PO_TERPAKAI
			FROM detail_po 
			JOIN purchase_order ON purchase_order.PURCHASE_ORDER_ID = detail_po.PURCHASE_ORDER_ID
			GROUP BY detail_po.SUBCON_ID, detail_po.PERMINTAAN_PEMBELIAN_ID) temp ON temp.SUBCON_ID = pp.SUBCON_ID AND temp.PERMINTAAN_PEMBELIAN_ID = pp.PERMINTAAN_PEMBELIAN_ID
			WHERE pp.PERMINTAAN_PEMBELIAN_ID = " . $pp_id . " AND pp.SUBCON_ID IS NOT NULL
			GROUP BY pp.DETAIL_PP_ID)";
        }

        $columns = array(
            array('db' => 'BARANG_NAMA', 'dt' => 0),
            array('db' => 'KATEGORI_BARANG_NAMA', 'dt' => 1),
            array('db' => 'BARANG_KODE', 'dt' => 2),
            array('db' => 'VOLUME_PP', 'dt' => 3),
            array('db' => 'VOLUME_PO_TERPAKAI', 'dt' => 4),
            array('db' => 'VOLUME_PP_SISA', 'dt' => 5),
            array('db' => 'SATUAN_NAMA', 'dt' => 6),
            array('db' => 'HARGA_DETAIL', 'dt' => 7),
            array('db' => 'BARANG_ID', 'dt' => 8)
        );

        return json_encode(SSP::simple($_GET, $this->tableName, $this->idField, $columns, $baseSQL));
    }

}
