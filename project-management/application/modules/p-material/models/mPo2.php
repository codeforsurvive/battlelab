<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

class mPo2 extends MY_Model {

    // constants, column definition
    const ID = 'PURCHASE_ORDER_ID';
    const PURCHASE_ORDER_KODE = 'PURCHASE_ORDER_KODE';
    const TABLE = 'purchase_order';

    public function __construct() {
        parent::__construct();
        $this->tableName = 'purchase_order';
        $this->idField = 'PURCHASE_ORDER_ID';
    }

    function getListPO($rab_id = 0, $id_gudang = 0) {
        $sql = "select po.PURCHASE_ORDER_ID, pp.PERMINTAAN_PEMBELIAN_ID,
            rab.RAB_ID,po.PURCHASE_ORDER_KODE
            from purchase_order po
            inner join permintaan_pembelian pp
            on po.PERMINTAAN_PEMBELIAN_ID=pp.PERMINTAAN_PEMBELIAN_ID
            inner join rab_transaction rab
            on rab.RAB_ID=pp.RAB_ID
            where rab.RAB_ID='$rab_id'
            order by po.PURCHASE_ORDER_ID";
        $sql = "select po.PURCHASE_ORDER_KODE, po.PURCHASE_ORDER_ID
                from purchase_order po
                where STATUS_PO_ID='3' and po.PURCHASE_ORDER_ID in (
                        select purchase_order_id
                        from detail_po where detail_po.PERMINTAAN_PEMBELIAN_ID in (
                                select pp.PERMINTAAN_PEMBELIAN_ID
                                from permintaan_pembelian pp
                                where pp.RAB_ID='$rab_id' and STATUS_PP_ID='3'
                        )
                )
                
                order by po.PURCHASE_ORDER_ID";
        $sql = "select po.*
                from purchase_order po
                where po.GUDANG_ID='$id_gudang' and po.RAB_ID='$rab_id'
                and po.STATUS_PO_ID=3 
                group by po.PURCHASE_ORDER_ID
                order by po.PURCHASE_ORDER_ID desc";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function getDetailPODataTable($po_id = 0, $start = 0, $length = 0) {
        $sql = "select count(BARANG_ID) AS jumlah from detail_po where PURCHASE_ORDER_ID='$po_id'";
        $query = $this->db->query($sql);
        $hasil = $query->result_array();
        $hasil = $hasil[0];
        $jumlahData = (int) $hasil['jumlah'];
        $sql = "select mbrg.BARANG_NAMA, 
                kbrg.KATEGORI_BARANG_NAMA, 
                mbrg.BARANG_KODE, 
                dpo.VOLUME_PO,
                mbrg.SATUAN_NAMA, 
                po.PURCHASE_ORDER_KODE,
                dpo.PURCHASE_ORDER_ID, 
                mbrg.KATEGORI_BARANG_ID,
                mbrg.BARANG_ID,
                (
                    select ifnull(sum(dlpb.VOLUME_LPB),0)
                    from detail_lpb dlpb inner join penerimaan_barang pb
                    on dlpb.`PENERIMAAN_BARANG_ID`=pb.`PENERIMAAN_BARANG_ID`
                    where dlpb.PO_ID=dpo.PURCHASE_ORDER_ID 
                    and dlpb.BARANG_ID=dpo.BARANG_ID
                ) as VOLUME_PO_IN_LPB
                FROM detail_po dpo , master_barang mbrg, kategori_barang kbrg, 
                purchase_order po
                where dpo.PURCHASE_ORDER_ID='$po_id' and  dpo.BARANG_ID=mbrg.BARANG_ID
                and kbrg.KATEGORI_BARANG_ID=mbrg.KATEGORI_BARANG_ID 
                and po.PURCHASE_ORDER_ID=dpo.PURCHASE_ORDER_ID
                limit $start,$length";
        $sql = "select COALESCE(dpo.BARANG_ID,0) as BARANG_ID, 
				COALESCE(dpo.SUBCON_ID,0) as SUBCON_ID, 
				brg.BARANG_NAMA, 
				subcon.SUBCON_NAMA,
				(
					select kategori_barang.KATEGORI_BARANG_NAMA
					from kategori_barang
					where kategori_barang.KATEGORI_BARANG_ID=brg.KATEGORI_BARANG_ID
				) as KATEGORI_NAMA,
				brg.BARANG_KODE,
				dpo.VOLUME_PO,
				brg.SATUAN_NAMA as BARANG_SATUAN,
				subcon.SATUAN_NAMA as SUBCON_SATUAN,
				po.KATEGORI_PP_ID,
				pom.PAKET_OVERHEAD_MATERIAL_NAMA,
				pom.SATUAN_NAMA as PAKET_OVERHEAD_SATUAN_NAMA,
                                (
					 select ifnull(sum(dlpb.VOLUME_LPB),0)
					 from detail_lpb dlpb
					 where dlpb.PO_ID=dpo.PURCHASE_ORDER_ID 
					 and dlpb.BARANG_ID=dpo.BARANG_ID
				) as VOLUME_PO_BAHAN_BARANG_IN_LPB,
				(
					 select ifnull(sum(dlpb2.VOLUME_LPB),0)
					 from detail_lpb dlpb2
					 where dlpb2.PO_ID=dpo.PURCHASE_ORDER_ID 
					 and dlpb2.SUBCON_ID=dpo.SUBCON_ID
				) as VOLUME_PO_BAHAN_SUBCON_IN_LPB,
				(
					 select ifnull(sum(dlpb3.VOLUME_LPB),0)
					 from detail_lpb dlpb3
					 where dlpb3.PO_ID=dpo.PURCHASE_ORDER_ID 
					 and dlpb3.BARANG_OVERHEAD_ID=dpo.BARANG_ID
				) as VOLUME_PO_OV_BARANG_IN_LPB,
				(
					 select ifnull(sum(dlpb4.VOLUME_LPB),0)
					 from detail_lpb dlpb4
					 where dlpb4.PO_ID=dpo.PURCHASE_ORDER_ID 
					 and dlpb4.PAKET_OVERHEAD_MATERIAL_ID=dpo.SUBCON_ID
				) as VOLUME_PO_OV_PAKET_IN_LPB
            FROM detail_po dpo 
				inner join purchase_order po
				on po.PURCHASE_ORDER_ID=dpo.PURCHASE_ORDER_ID
				left join master_barang brg
				on brg.BARANG_ID=dpo.BARANG_ID
				left join subcon
				on subcon.SUBCON_ID=dpo.SUBCON_ID
				left join paket_overhead_material pom
				on pom.PAKET_OVERHEAD_MATERIAL_ID=dpo.SUBCON_ID
                where dpo.PURCHASE_ORDER_ID='$po_id' 
                limit $start,$length";
        $query = $this->db->query($sql);
        $hasil = $query->result_array();
        $hasil2 = array();
        foreach ($hasil as $row) {
            $baris = array();
            foreach ($row as $cell) {
                $baris[] = $cell;
            }
            $hasil2[] = $baris;
        }
        return array('data' => $hasil2, 'recordsFiltered' => $jumlahData,
            'recordsTotal' => $jumlahData
        );
    }

    function getDeskripsiPO($po_id) {
        $sql = "select po.*, rab.*, top.*, spy.*, gdg.*
                from purchase_order po
                inner join rab_transaction rab
                on rab.RAB_ID=po.RAB_ID
                inner join top
                on top.TOP_ID=po.TOP_ID
                inner join master_supplier spy
                on spy.SUPPLIER_ID=po.SUPPLIER_ID
                inner join master_gudang gdg
                on gdg.GUDANG_ID=po.GUDANG_ID
                where po.STATUS_PO_ID=3 and po.PURCHASE_ORDER_ID='$po_id'";
        $query = $this->db->query($sql);
        $hasil = $query->result_array();
        if (count($hasil) > 0) {
            return $hasil[0];
        }
        return null;
//        return array(
//            'PURCHASE_ORDER_ID' => 'data tidak ditemukan atau data tidak valid',
//            'PURCHASE_ORDER_TANGGAL' => 'data tidak ditemukan atau data tidak valid',
//            'PERMINTAAN_PEMBELIAN_ID' => 'data tidak ditemukan atau data tidak valid',
//            'SUPPLIER_ID' => 'data tidak ditemukan atau data tidak valid',
//            'PERMINTAAN_PEMBELIAN_KODE' => 'data tidak ditemukan atau data tidak valid',
//            'SUPPLIER_NAMA' => 'data tidak ditemukan atau data tidak valid',
//            'PROJECT_NAMA' => 'data tidak ditemukan atau data tidak valid',
//            'PURCHASE_ORDER_KODE' => 'data tidak ditemukan atau data tidak valid',
//            'RAB_NAMA' => 'data tidak ditemukan atau data tidak valid'
//        );
    }

    function getRABIdNGudangIdByPOId($po_id) {
        $hasil = array('RAB_ID' => 0, 'GUDANG_ID' => 0);
        $sql = "select rab.RAB_ID
                from 
                rab_transaction rab inner join permintaan_pembelian pp
                on rab.RAB_ID=pp.RAB_ID
                inner join detail_po dpo
                on dpo.PERMINTAAN_PEMBELIAN_ID=pp.PERMINTAAN_PEMBELIAN_ID
                where dpo.PURCHASE_ORDER_ID='$po_id'";
        $sql = "select rab.RAB_ID, po.PURCHASE_ORDER_ID, po.GUDANG_ID
                from 
                rab_transaction rab inner join permintaan_pembelian pp
                on rab.RAB_ID=pp.RAB_ID
                inner join detail_po dpo
                on dpo.PERMINTAAN_PEMBELIAN_ID=pp.PERMINTAAN_PEMBELIAN_ID
                inner join purchase_order po
                on po.PURCHASE_ORDER_ID=dpo.PURCHASE_ORDER_ID
                where dpo.PURCHASE_ORDER_ID='$po_id'";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        if (count($result) > 0) {
            $baris = $result[0];
            $hasil = array('RAB_ID' => $baris['RAB_ID'], 'GUDANG_ID' => $baris['GUDANG_ID']);
            //var_dump($hasil);
        }
        return $hasil;
    }

    function get_list_po_from_array($pool_id_po) {
        $array_id_po_string = implode(",", $pool_id_po);
        $sql = "select po.*
                from purchase_order po
                where po.STATUS_PO_ID=3 and  po.PURCHASE_ORDER_ID in ($array_id_po_string)";
        return $this->db->query($sql)->result_array();
    }

}
