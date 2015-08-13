<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

class mDetailBpm extends MY_Model {

    // constants, column definition
    const ID = 'BPM_ID';
    const TABLE = 'detail_bpm';

    public function __construct() {
        parent::__construct();
        $this->tableName = 'detail_bpm';
        $this->idField = mDetailBpm::ID;
    }

    function getDetailBPM($id_bpm) {
        $sql = "select dbpm.* , brg.*, (
                    ( 
                    select ifnull(sum(stok.VOLUME),0) 
    				from stok
    				where stok.RAB_ID=dbpm.RAB_ID and stok.BARANG_ID=dbpm.BARANG_ID
    				) 
                    -
    				(
    				select ifnull(sum(dbpm2.STOK_BPM),0)
    				from detail_bpm dbpm2 inner join bpm
                    on bpm.BPM_ID=dbpm2.BPM_ID
    				where dbpm2.BPM_ID!=dbpm.BPM_ID and dbpm2.RAB_ID=dbpm.RAB_ID and dbpm2.BARANG_ID=dbpm.BARANG_ID
                    and bpm.STATUS_BPM_ID!=3
    				)
                ) as  sisa
                from detail_bpm dbpm
                inner join master_barang brg
                on brg.BARANG_ID=dbpm.BARANG_ID
                where dbpm.BPM_ID='$id_bpm'";
        $sql = "SElect dbpm.*, 
                brg.BARANG_NAMA, 
                brg.BARANG_KODE,
                brg.SATUAN_NAMA as BARANG_SATUAN_NAMA,
                subcon.SUBCON_NAMA,
                subcon.SATUAN_NAMA as SUBCON_SATUAN_NAMA,
                pom.PAKET_OVERHEAD_MATERIAL_NAMA,
                pom.SATUAN_NAMA as OVERHEAD_SATUAN_NAMA,
                (
                		select COALESCE(sum(d1.VOLUME),0)
                		from detail_bpm d1
                		inner join bpm b1
                		on b1.BPM_ID=d1.BPM_ID
                		where b1.STATUS_BPM_ID!='3'
						and b1.BPM_ID!=dbpm.BPM_ID
                		and d1.BARANG_ID=dbpm.BARANG_ID
                		and d1.BARANG_ID is not null
					 ) as V_BARANG_IN_BPM,
					 (
                		select COALESCE(sum(d2.VOLUME),0)
                		from detail_bpm d2
                		inner join bpm b2
                		on b2.BPM_ID=d2.BPM_ID
                		where b2.STATUS_BPM_ID!='3'
						and b2.BPM_ID!=dbpm.BPM_ID
                		and d2.SUBCON_ID=dbpm.SUBCON_ID
                		and d2.SUBCON_ID is not null
					 ) as V_SUBCON_IN_BPM,
					 (
                		select COALESCE(sum(d3.VOLUME),0)
                		from detail_bpm d3
                		inner join bpm b3
                		on b3.BPM_ID=d3.BPM_ID
                		where b3.STATUS_BPM_ID!='3'
						and b3.BPM_ID!=dbpm.BPM_ID
                		and d3.PAKET_OVERHEAD_MATERIAL_ID=dbpm.PAKET_OVERHEAD_MATERIAL_ID
                		and d3.PAKET_OVERHEAD_MATERIAL_ID is not null
					 ) as V_OVERHEAD_IN_BPM,
					 (
					 	select COALESCE(sum(s1.VOLUME),0)
					 	from stok s1
					 	where s1.RAB_ID=dbpm.RAB_ID
					 	and s1.BARANG_ID=dbpm.BARANG_ID
					 	and s1.BARANG_ID is not null
					 ) as STOK_BARANG,
					 (
					 	select COALESCE(sum(s2.VOLUME),0)
					 	from stok s2
					 	where s2.RAB_ID=dbpm.RAB_ID
					 	and s2.SUBCON_ID=dbpm.SUBCON_ID
					 	and s2.SUBCON_ID is not null
					 ) as STOK_SUBCON,
					 (
					 	select COALESCE(sum(s3.VOLUME),0)
					 	from stok s3
					 	where s3.RAB_ID=dbpm.RAB_ID
					 	and s3.PAKET_OVERHEAD_MATERIAL_ID=dbpm.PAKET_OVERHEAD_MATERIAL_ID
					 	and s3.PAKET_OVERHEAD_MATERIAL_ID is not null
					 ) as STOK_OVERHEAD,
				subcon_tipe.SUBCON_TIPE_KODE
                
                from detail_bpm dbpm
                left join master_barang brg
                on brg.BARANG_ID=dbpm.BARANG_ID
                left join subcon 
                on subcon.SUBCON_ID=dbpm.SUBCON_ID
				left join subcon_tipe
				on subcon_tipe.SUBCON_TIPE_ID=subcon.SUBCON_TIPE_ID
                left join paket_overhead_material pom
                on pom.PAKET_OVERHEAD_MATERIAL_ID=dbpm.PAKET_OVERHEAD_MATERIAL_ID
                where dbpm.BPM_ID='$id_bpm'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

}
