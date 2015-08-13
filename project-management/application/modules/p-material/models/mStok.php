<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');
/*
 * author: zarkasi
 */

class mStok extends MY_Model {

    // constants, column definition

    public function __construct() {
        parent::__construct();
        $this->tableName = 'stok';
        $this->idField = '';
    }

    /*
     * funsgi jika ada barang yang masuk ke gudang, 
     * di tempatkan dengan index id RAB dan id Gudang
     */

    function stok_barang_masuk($rab_id, $gudang_id, $barang_id, $volume) {
        $where = array('RAB_ID' => $rab_id, 'BARANG_ID' => $barang_id, 'GUDANG_ID' => $gudang_id);
        $existing = $this->_find($where);
        if (count($existing) > 0) {
            $this->_update(array('VOLUME' => $existing[0]['VOLUME'] + $volume), $where);
        } else {
            $where['VOLUME'] = $volume;
            $this->_insert($where);
        }
    }

    function stok_subcon_masuk($id_rab, $id_gudang, $id_subcon, $volume) {
        $where = array('RAB_ID' => $id_rab, 'SUBCON_ID' => $id_subcon, 'GUDANG_ID' => $id_gudang);
        $exist = $this->db->get_where('stok', $where)->result_array();
        if (count($exist) > 0) {
            $this->_update(array('VOLUME' => $exist[0]['VOLUME'] + $volume), $where);
        } else {
            $where['VOLUME'] = $volume;
            $this->_insert($where);
        }
    }

    function stok_paket_overhead_masuk($id_rab, $id_gudang, $id_paket, $volume) {
        $where = array('RAB_ID' => $id_rab, 'PAKET_OVERHEAD_MATERIAL_ID' => $id_paket, 'GUDANG_ID' => $id_gudang);
        $exist = $this->db->get_where('stok', $where)->result_array();
        if (count($exist) > 0) {
            $this->_update(array('VOLUME' => $exist[0]['VOLUME'] + $volume), $where);
        } else {
            $where['VOLUME'] = $volume;
            $this->_insert($where);
        }
    }

    /*
     * fungsi jika terjadi stok yang keluar karena dipakai 
     */

    function stok_barang_keluar($idRAB, $id_gudang, $id_barang, $volume) {
        $where = array('RAB_ID' => $idRAB, 'BARANG_ID' => $id_barang, 'GUDANG_ID' => $id_gudang);
        $stok = $this->db->get_where('stok', $where)->result_array();
        if (count($stok) > 0) {
            $stok = $stok[0];
            if ($stok['VOLUME'] >= $volume) {
                $this->_update(array('VOLUME' => $stok['VOLUME'] - $volume), $where);
                return true;
            }
        }
        return false;
    }

    function stok_subcon_keluar($idRAB, $id_gudang, $id_subcon, $volume) {
        $where = array('RAB_ID' => $idRAB, 'SUBCON_ID' => $id_subcon, 'GUDANG_ID' => $id_gudang);
        $stok = $this->db->get_where('stok', $where)->result_array();
        if (count($stok) > 0) {
            $stok = $stok[0];
            if ($stok['VOLUME'] >= $volume) {
                $this->_update(array('VOLUME' => $stok['VOLUME'] - $volume), $where);
                return true;
            }
        }
        return false;
    }

    function stok_overhead_keluar($idRAB, $id_gudang, $id_overhead, $volume) {
        $where = array('RAB_ID' => $idRAB, 'PAKET_OVERHEAD_MATERIAL_ID' => $id_overhead, 'GUDANG_ID' => $id_gudang);
        $stok = $this->db->get_where('stok', $where)->result_array();
        if (count($stok) > 0) {
            $stok = $stok[0];
            if ($stok['VOLUME'] >= $volume) {
                $this->_update(array('VOLUME' => $stok['VOLUME'] - $volume), $where);
                return true;
            }
        }
        return false;
    }

    private function dbWhere($abc = array()) {
        $hasil = "";
        $sep = "";
        foreach ($abc as $key => $val) {
            $hasil = $sep . $key . '=\'' . $val . '\' ';
            $sep = ' and ';
        }
        return $hasil;
    }

    /*
     * dipakai untuk mengetahui stok suatu barang di suatu gudang,
     * funsgi digunakan pada saat controller akan mengupdate stok barang, agar tidak 
     * terjadi kesalahan jika user sengaja menginputkan volume yang melebihi output dari sistem
     */

    function getStokBarang($idRAB = 0, $id_gudang = 0, $idBarang = 0) {
        //$stok = $this->_find(array('RAB_ID' => $idRAB, 'BARANG_ID' => $idBarang, 'GUDANG_ID' => $id_gudang));
        $where = array('RAB_ID' => $idRAB, 'BARANG_ID' => $idBarang, 'GUDANG_ID' => $id_gudang);
        $stok = $this->db->get_where('stok', $where)->result_array();
        //$sql = "select * from stok where ". $this->dbWhere($where);
        //echo $sql;
        //$this->db->last_query();
        if (count($stok) > 0) {
            return $stok[0];
        }
        return null;
    }

    /*
     * funsgi untuk data tabel yang menampilkan stok barang yang berada 
     * pada RAB tertentu dan gudang tertentu
     */

    function getStokDataTable($idRAB = 0, $id_gudang = 0, $start = 0, $length = 0, $id_bpm = 0) {
        $sql = "select count(*) as jumlah from stok where RAB_ID='$idRAB' and GUDANG_ID='$id_gudang'";
        $query = $this->db->query($sql);
        $hasil = $query->result_array();
        $jumlahData = $hasil[0]['jumlah'];
        $where_bpm = '';
        if ($id_bpm > 0) {
            $where_bpm = ' and dbpm.BPM_ID!=\'' . $id_bpm . '\'';
        }
        $sql = "select brg.BARANG_KODE, brg.BARANG_NAMA, stok.VOLUME - (
                    select ifnull(sum(dbpm.VOLUME),0)
                    from bpm inner join detail_bpm dbpm
                    on dbpm.BPM_ID=bpm.BPM_ID
                    where bpm.GUDANG_ID=stok.GUDANG_ID 
				    and dbpm.BARANG_ID=stok.BARANG_ID
				    and dbpm.RAB_ID=stok.RAB_ID
                    and bpm.STATUS_BPM_ID!=3
                    $where_bpm
                )as VOLUME, 
                brg.SATUAN_NAMA, 
                stok.BARANG_ID
                from stok inner join master_barang brg
                on stok.BARANG_ID=brg.BARANG_ID
                where RAB_ID='$idRAB' and GUDANG_ID='$id_gudang'
                limit $start,$length
                ";
        $sql = "select stok.*, 
                brg.SATUAN_NAMA as BARANG_SATUAN_NAMA,
                brg.BARANG_KODE,
                brg.BARANG_NAMA,
                subcon.SATUAN_NAMA as SUBCON_SATUAN_NAMA,
                subcon.SUBCON_NAMA,
                pom.SATUAN_NAMA as OVERHEAD_SATUAN_NAMA,
                pom.PAKET_OVERHEAD_MATERIAL_NAMA
                from stok
                left join master_barang brg
                on brg.BARANG_ID=stok.BARANG_ID
                left join subcon
                on subcon.SUBCON_ID=stok.SUBCON_ID
                left join paket_overhead_material pom
                on pom.PAKET_OVERHEAD_MATERIAL_ID=stok.PAKET_OVERHEAD_MATERIAL_ID
                where stok.RAB_ID='$idRAB' and stok.GUDANG_ID='$id_gudang' limit $start,$length";
        $query = $this->db->query($sql);
        $hasil = $query->result_array();
        $hasil2 = array();
        foreach ($hasil as $row) {
            $baris = array();
            foreach ($row as $val) {
                $baris[] = $val;
            }
            $hasil2[] = $baris;
        }
        $tes = array('barang_kode', 'nama barang', '1000', 'satuan', 'barang_id');
        return array(
            'data' => $hasil2,
            'recordsFiltered' => $jumlahData,
            'recordsTotal' => $jumlahData,
            'sql' => $sql
        );
    }

    function get_stok_barang_hm_datatable($idRAB = 0, $id_gudang = 0, $id_rab_penerima = 0, $start = 0, $length = 0, $id_hm = 0, $order = array(), $search = array()) {
        $sql = "select count(stok.BARANG_ID) as jumlah 
                from stok where stok.RAB_ID='$idRAB' 
                and stok.GUDANG_ID='$id_gudang'
                and stok.BARANG_ID in (
                    select vrap.BARANG_ID
                    FROM view_rap vrap
                    where vrap.RAB_ID='$id_rab_penerima'
                )
                ";
        $query = $this->db->query($sql);
        $hasil = $query->result_array();
        $jumlahData = $hasil[0]['jumlah'];
        $where = '';
        if ($id_hm > 0) {
            $where = " and hm.HUTANG_BARANG_ID!='$id_hm '";
        }
        $a_order = $a_search = array('stokhm.BARANG_KODE', 'stokhm.BARANG_NAMA', 'stokhm.VOLUME', 'stokhm.SATUAN_NAMA');
        $my_order = '';
        if ($order[0]['column'] >= 0 && $order[0]['column'] < count($a_order)) {
            $my_order = 'order by ' . $a_order[$order[0]['column']] . ' ' . $order[0]['dir'];
        }
        $my_search = '';
        if (strlen($search['value']) > 0) {
            $my_search = 'where ';
            $sep = '';
            foreach ($a_search as $s) {
                $my_search .= $sep . $s . " like '%" . $search['value'] . "%' ";
                $sep = ' or ';
            }
        }
        $sql = "
select stokhm.*
from (
    select brg.BARANG_KODE, brg.BARANG_NAMA, stok.VOLUME - (
        select ifnull(sum(dhm.VOLUME),0)
        from detail_hm dhm
        inner join hutang_barang hm
        on hm.HUTANG_BARANG_ID=dhm.HM_ID
        where dhm.BARANG_ID=stok.BARANG_ID 
        and stok.RAB_ID=hm.RAB_PEMBERI
        and stok.GUDANG_ID=hm.GUDANG_PEMBERI
        and hm.STATUS_ID!='3'
        $where
    )as VOLUME, 
    brg.SATUAN_NAMA, 
    stok.BARANG_ID,
    stok.RAB_ID
    from stok inner join master_barang brg
    on stok.BARANG_ID=brg.BARANG_ID
    where RAB_ID='$idRAB' and GUDANG_ID='$id_gudang'
    and stok.BARANG_ID IN (
        select BARANG_ID
        from view_rap vrap
        where vrap.RAB_ID='$id_rab_penerima'
    )
) as stokhm
$my_search
$my_order
limit $start,$length
                ";
        $query = $this->db->query($sql);
        $hasil = $query->result_array();
        $hasil2 = array();
        foreach ($hasil as $row) {
            $baris = array();
            foreach ($row as $val) {
                $baris[] = $val;
            }
            $hasil2[] = $baris;
        }
        $tes = array('barang_kode', 'nama barang', '1000', 'satuan', 'barang_id');
        return array(
            'data' => $hasil2,
            'recordsFiltered' => $jumlahData,
            'recordsTotal' => $jumlahData,
            'sql' => $sql
        );
    }

    function get_list_rab_in_stok() {
        $sql = "select stok.RAB_ID, rab.RAB_NAMA, rab.RAB_KODE
            from stok inner join rab_transaction rab
            on rab.RAB_ID=stok.RAB_ID
            group by stok.RAB_ID
            order by stok.RAB_ID";
        return $this->db->query($sql)->result_array();
    }

    function get_list_gudang_in_stok() {
        $sql = "select stok.GUDANG_ID, gdg.GUDANG_KODE, gdg.GUDANG_NAMA, gdg.GUDANG_LOKASI
            from stok inner join master_gudang gdg
            on gdg.GUDANG_ID=stok.GUDANG_ID
            group by stok.GUDANG_ID
            order by stok.GUDANG_ID";
        return $this->db->query($sql)->result_array();
    }

    function get_stok_rab_datatable($id_rab = 0, $start = 0, $length = 0) {
        $sql = "select count(*) as jumlah from stok group by RAB_ID";
        $query = $this->db->query($sql)->result_array();
        $jumlahData = 0;
        if (count($query) > 0)
            $jumlahData = $query[0]['jumlah'];
        $sql = "select stok.BARANG_ID, 
            brg.BARANG_KODE, 
            brg.BARANG_NAMA,
            sum(stok.VOLUME) as VOLUME,
            brg.SATUAN_NAMA,
            stok.RAB_ID
            from stok inner join master_barang brg
            on brg.BARANG_ID=stok.BARANG_ID
            where stok.RAB_ID='$id_rab'
            group by stok.BARANG_ID
            order by stok.BARANG_ID";
        $sql = "select stok.*,
                brg.BARANG_KODE,
                brg.BARANG_NAMA,
                brg.SATUAN_NAMA as BARANG_SATUAN_NAMA,
                subcon_tipe.SUBCON_TIPE_KODE as SUBCON_KODE,
                subcon.SUBCON_NAMA,
                subcon.SATUAN_NAMA as SUBCON_SATUAN_NAMA,
                'LSMOV' as OVERHEAD_KODE,
                pom.PAKET_OVERHEAD_MATERIAL_NAMA as OVERHEAD_NAMA,
                pom.SATUAN_NAMA as OVERHEAD_SATUAN_NAMA
                from stok
                left join master_barang brg
                on brg.BARANG_ID=stok.BARANG_ID
                left join subcon
                on subcon.SUBCON_ID=stok.SUBCON_ID
				left join subcon_tipe
				on subcon_tipe.SUBCON_TIPE_ID=subcon.SUBCON_TIPE_ID
                left join paket_overhead_material pom
                on pom.PAKET_OVERHEAD_MATERIAL_ID=stok.PAKET_OVERHEAD_MATERIAL_ID
                where stok.RAB_ID='$id_rab'
				limit $start,$length";
        $query = $this->db->query($sql)->result_array();
        $hasil = array();
        foreach ($query as $key => $row) {
            $baris = array();
            foreach ($row as $key => $v) {
                $baris[] = $v;
            }
            $hasil[] = $baris;
        }
        return array(
            'data' => $hasil,
            'recordsFiltered' => $jumlahData,
            'recordsTotal' => $jumlahData,
            'sql' => $sql
        );
    }

    function get_stok_gudang_datatable($id_gudang = 0, $start = 0, $length = 0) {
        $sql = "select count(*) as jumlah from stok group by GUDANG_ID";
        $query = $this->db->query($sql)->result_array();
        $jumlahData = $query[0]['jumlah'];
        $sql = "select stok.RAB_ID, stok.GUDANG_ID, stok.BARANG_ID, stok.SUBCON_ID, stok.PAKET_OVERHEAD_MATERIAL_ID, sum(stok.VOLUME) as VOLUME,
                brg.BARANG_KODE,
                brg.BARANG_NAMA,
                brg.SATUAN_NAMA as BARANG_SATUAN_NAMA,
				subcon_tipe.SUBCON_TIPE_KODE as SUBCON_KODE,
                subcon.SUBCON_NAMA,
                subcon.SATUAN_NAMA as SUBCON_SATUAN_NAMA,
                'LSMOV' as OVERHEAD_KODE,
                pom.PAKET_OVERHEAD_MATERIAL_NAMA as OVERHEAD_NAMA,
                pom.SATUAN_NAMA as OVERHEAD_SATUAN_NAMA
                from stok
                left join master_barang brg
                on brg.BARANG_ID=stok.BARANG_ID
                left join subcon
                on subcon.SUBCON_ID=stok.SUBCON_ID
				left join subcon_tipe
				on subcon_tipe.SUBCON_TIPE_ID=subcon.SUBCON_TIPE_ID
                left join paket_overhead_material pom
                on pom.PAKET_OVERHEAD_MATERIAL_ID=stok.PAKET_OVERHEAD_MATERIAL_ID
                where stok.GUDANG_ID='$id_gudang' 
                group by stok.BARANG_ID, stok.SUBCON_ID, stok.PAKET_OVERHEAD_MATERIAL_ID
				limit $start,$length";
        $query = $this->db->query($sql)->result_array();
        $hasil = array();
        foreach ($query as $key => $row) {
            $baris = array();
            foreach ($row as $key => $v) {
                $baris[] = $v;
            }
            $hasil[] = $baris;
        }
        return array(
            'data' => $hasil,
            'recordsFiltered' => $jumlahData,
            'recordsTotal' => $jumlahData,
            'sql' => $sql
        );
    }

    function get_history_in_rab($rab_asal, $id_barang, $id_subcon, $id_overhead) {
        $sql_lpb = "select dlpb.PENERIMAAN_BARANG_ID as id_transaksi,
            lpb.PENERIMAAN_BARANG_KODE as KODE_TRANSAKSI,
            'LPB' as NAMA_TRANSAKSI,
            dlpb.VOLUME_LPB as QTY_MASUK,
            0 AS QTY_KELUAR,
            DATE_FORMAT(lpb.PENERIMAAN_BARANG_TANGGAL,'%Y-%m-%d %H:%i:%s') as TANGGAL_TRANSAKSI
            from detail_lpb dlpb
            inner join penerimaan_barang lpb
            on dlpb.PENERIMAAN_BARANG_ID=lpb.PENERIMAAN_BARANG_ID
            where " . ($id_barang > 0 ? "(dlpb.BARANG_ID='$id_barang' or dlpb.BARANG_OVERHEAD_ID='$id_barang')" : ($id_subcon > 0 ? "dlpb.SUBCON_ID='$id_subcon'" : ($id_overhead > 0 ? "dlpb.PAKET_OVERHEAD_MATERIAL_ID='$id_overhead'" : '1=2')) )
                . " and lpb.STATUS_LPB_ID='3'
            and dlpb.PO_ID in (
                select po.PURCHASE_ORDER_ID
                from purchase_order po
                where po.RAB_ID='$rab_asal'
            )";
        $lpb = $this->db->query($sql_lpb)->result_array();
        $sql_pm = "select km.KEMBALI_BARANG_ID as id_transaksi,
            km.KEMBALI_BARANG_KODE as KODE_TRANSAKSI,
            'PM' as NAMA_TRANSAKSI,
            case when hm.RAB_PEMBERI='$rab_asal' then dkm.VOLUME else  0 end as QTY_MASUK,
            case when hm.RAB_PENERIMA='$rab_asal' then dkm.VOLUME else  0 end AS QTY_KELUAR,
            DATE_FORMAT(km.TANGGAL_TRANSAKSI,'%Y-%m-%d %H:%i:%s') as TANGGAL_TRANSAKSI,
            dkm.BARANG_ID
            from detail_pm dkm
            inner join kembali_barang km
            on km.KEMBALI_BARANG_ID=dkm.PM_ID
            inner join hutang_barang hm
            on hm.HUTANG_BARANG_ID=km.HM_ID
            where  " . ($id_barang > 0 ? "dkm.BARANG_ID='$id_barang'" : '1=2') . " and km.STATUS_ID='3'";
        $pm = $this->db->query($sql_pm)->result_array();
        $sql_bpm = "select bpm.BPM_ID as id_transaksi,
            bpm.BPM_KODE as KODE_TRANSAKSI,
            'BPM' as NAMA_TRANSAKSI,
            0 as QTY_MASUK,
            dbpm.VOLUME AS QTY_KELUAR,
            DATE_FORMAT(bpm.BPM_TANGGAL,'%Y-%m-%d %H:%i:%s') as TANGGAL_TRANSAKSI,
            dbpm.BARANG_ID
            from detail_bpm dbpm
            inner join bpm
            on bpm.BPM_ID=dbpm.BPM_ID
            where  " . ($id_barang > 0 ? "dbpm.BARANG_ID='$id_barang'" : ($id_subcon > 0 ? "dbpm.SUBCON_ID='$id_subcon'" : ($id_overhead > 0 ? "dbpm.PAKET_OVERHEAD_MATERIAL_ID='$id_overhead'" : '1=2'))) . " and bpm.STATUS_BPM_ID='3'
            AND dbpm.RAB_ID='$rab_asal'";
        $bpm = $this->db->query($sql_bpm)->result_array();
        $sql_hm = "select hm.HUTANG_BARANG_ID as id_transaksi,
                hm.HUTANG_BARANG_KODE as KODE_TRANSAKSI,
                'HM' as NAMA_TRANSAKSI,
                case when hm.RAB_PENERIMA='$rab_asal' then dhm.VOLUME else 0 end as QTY_MASUK,
                case when hm.RAB_PEMBERI='$rab_asal' then dhm.VOLUME else 0 end AS QTY_KELUAR,
                DATE_FORMAT(hm.TANGGAL_TRANSAKSI_HM,'%Y-%m-%d %H:%i:%s') as TANGGAL_TRANSAKSI,
                dhm.BARANG_ID
                from detail_hm dhm
                inner join hutang_barang hm
                on hm.HUTANG_BARANG_ID=dhm.HM_ID
                where  " . ($id_barang > 0 ? "dhm.BARANG_ID='$id_barang'" : '1=2') . " and hm.STATUS_ID='3'";
        $hm = $this->db->query($sql_hm)->result_array();
        //return array('lpb'=>$lpb,'bpm'=>$bpm,'hm'=>$hm,'pm'=>$pm,'sql'=>array($sql_lpb,$sql_bpm,$sql_hm,$sql_pm));
        //return array('lpb' => $lpb, 'bpm' => $bpm, 'hm' => $hm, 'pm' => $pm);
        return array_merge($lpb, $bpm, $hm, $pm);
    }

    function get_history_in_gudang($gudang_asal, $id_barang, $id_subcon, $id_overhead) {
        $sql_lpb = "select dlpb.PENERIMAAN_BARANG_ID as id_transaksi,
            lpb.PENERIMAAN_BARANG_KODE as KODE_TRANSAKSI,
            'LPB' as NAMA_TRANSAKSI,
            dlpb.VOLUME_LPB as QTY_MASUK,
            0 AS QTY_KELUAR,
            DATE_FORMAT(lpb.PENERIMAAN_BARANG_TANGGAL,'%Y-%m-%d %H:%i:%s') as TANGGAL_TRANSAKSI
            from detail_lpb dlpb
            inner join penerimaan_barang lpb
            on dlpb.PENERIMAAN_BARANG_ID=lpb.PENERIMAAN_BARANG_ID
            where " . ($id_barang > 0 ? "(dlpb.BARANG_ID='$id_barang' or dlpb.BARANG_OVERHEAD_ID='$id_barang')" : ($id_subcon > 0 ? "dlpb.SUBCON_ID='$id_subcon'" : ($id_overhead > 0 ? "dlpb.PAKET_OVERHEAD_MATERIAL_ID='$id_overhead'" : '1=2')) )
                . " and lpb.STATUS_LPB_ID='3'
            and lpb.GUDANG_ID='$gudang_asal'";
        $lpb = $this->db->query($sql_lpb)->result_array();
        $sql_pm = "select km.KEMBALI_BARANG_ID as id_transaksi,
            km.KEMBALI_BARANG_KODE as KODE_TRANSAKSI,
            'PM' as NAMA_TRANSAKSI,
            case when hm.GUDANG_PEMBERI='$gudang_asal' then dkm.VOLUME else  0 end as QTY_MASUK,
            case when hm.GUDANG_PENERIMA='$gudang_asal' then dkm.VOLUME else  0 end AS QTY_KELUAR,
            DATE_FORMAT(km.TANGGAL_TRANSAKSI,'%Y-%m-%d %H:%i:%s') as TANGGAL_TRANSAKSI,
            dkm.BARANG_ID
            from detail_pm dkm
            inner join kembali_barang km
            on km.KEMBALI_BARANG_ID=dkm.PM_ID
            inner join hutang_barang hm
            on hm.HUTANG_BARANG_ID=km.HM_ID
            where  " . ($id_barang > 0 ? "dkm.BARANG_ID='$id_barang'" : '1=2') . " and km.STATUS_ID='3' and hm.GUDANG_PEMBERI!=hm.GUDANG_PENERIMA";
        $pm = $this->db->query($sql_pm)->result_array();
        $sql_bpm = "select bpm.BPM_ID as id_transaksi,
            bpm.BPM_KODE as KODE_TRANSAKSI,
            'BPM' as NAMA_TRANSAKSI,
            0 as QTY_MASUK,
            dbpm.VOLUME AS QTY_KELUAR,
            DATE_FORMAT(bpm.BPM_TANGGAL,'%Y-%m-%d %H:%i:%s') as TANGGAL_TRANSAKSI,
            dbpm.BARANG_ID
            from detail_bpm dbpm
            inner join bpm
            on bpm.BPM_ID=dbpm.BPM_ID
            where  " . ($id_barang > 0 ? "dbpm.BARANG_ID='$id_barang'" : ($id_subcon > 0 ? "dbpm.SUBCON_ID='$id_subcon'" : ($id_overhead > 0 ? "dbpm.PAKET_OVERHEAD_MATERIAL_ID='$id_overhead'" : '1=2'))) . " and bpm.STATUS_BPM_ID='3'
            AND bpm.GUDANG_ID='$gudang_asal'";
        $bpm = $this->db->query($sql_bpm)->result_array();
        $sql_hm = "select hm.HUTANG_BARANG_ID as id_transaksi,
                hm.HUTANG_BARANG_KODE as KODE_TRANSAKSI,
                'HM' as NAMA_TRANSAKSI,
                case when hm.GUDANG_PENERIMA='$gudang_asal' then dhm.VOLUME else 0 end as QTY_MASUK,
                case when hm.GUDANG_PEMBERI='$gudang_asal' then dhm.VOLUME else 0 end AS QTY_KELUAR,
                DATE_FORMAT(hm.TANGGAL_TRANSAKSI_HM,'%Y-%m-%d %H:%i:%s') as TANGGAL_TRANSAKSI,
                dhm.BARANG_ID
                from detail_hm dhm
                inner join hutang_barang hm
                on hm.HUTANG_BARANG_ID=dhm.HM_ID
                where  " . ($id_barang > 0 ? "dhm.BARANG_ID='$id_barang'" : '1=2') . " and hm.STATUS_ID='3' and hm.GUDANG_PENERIMA!=hm.GUDANG_PEMBERI";
        $hm = $this->db->query($sql_hm)->result_array();
        //return array('lpb'=>$lpb,'bpm'=>$bpm,'hm'=>$hm,'pm'=>$pm,'sql'=>array($sql_lpb,$sql_bpm,$sql_hm,$sql_pm));
        //return array('lpb' => $lpb, 'bpm' => $bpm, 'hm' => $hm, 'pm' => $pm);
        return array_merge($lpb, $bpm, $hm, $pm);
    }

}
