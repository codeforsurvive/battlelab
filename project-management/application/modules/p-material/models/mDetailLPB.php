<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

class mDetailLPB extends MY_Model {

    // constants, column definition
    const ID = 'PENERIMAAN_BARANG_ID';
    const LPB_ID = 'PENERIMAAN_BARANG_ID';
    const PO_ID = 'PO_ID';
    const BARANG_ID = 'BARANG_ID';
    const TABLE = 'detail_lpb';

    public function __construct() {
        parent::__construct();
        $this->tableName = 'detail_lpb';
        $this->idField = mDetailLPB::ID;
    }

//    function insert($data) {
//        $this->db->insert($this->tableName, $data);
//    }

    function insertAndGetLast($data) {
        $this->db->insert($this->tableName, $data);
        return $this->db->insert_id();
    }

    function getDetailLPB($id_lpb) {
        $sql = "
select dlpb.PENERIMAAN_BARANG_ID,
coalesce(dlpb.BARANG_ID,0) as BARANG_ID,
coalesce(dlpb.SUBCON_ID,0) as SUBCON_ID,
coalesce(dlpb.BARANG_OVERHEAD_ID,0) as BARANG_OVERHEAD_ID,
coalesce(dlpb.PAKET_OVERHEAD_MATERIAL_ID,0) as PAKET_OVERHEAD_MATERIAL_ID,
dlpb.PO_ID,
dlpb.VOLUME_LPB,
po.KATEGORI_PP_ID,
po.PURCHASE_ORDER_KODE,
pp.PERMINTAAN_PEMBELIAN_KODE,
case 
    when dlpb.BARANG_ID IS NOT NULL OR dlpb.BARANG_OVERHEAD_ID IS NOT NULL
        THEN
        (
            brg.BARANG_NAMA
        )
    when dlpb.SUBCON_ID IS NOT NULL
        THEN
        (
            subcon.SUBCON_NAMA
        )
    when dlpb.PAKET_OVERHEAD_MATERIAL_ID IS NOT NULL
        THEN
        (
            pom.PAKET_OVERHEAD_MATERIAL_NAMA
        )
    else
        '-'
end as NAMA_MATERIAL,
case 
    when dlpb.BARANG_ID IS NOT NULL OR dlpb.BARANG_OVERHEAD_ID IS NOT NULL
        THEN
        (
            brg.SATUAN_NAMA
        )
    when dlpb.SUBCON_ID IS NOT NULL
        THEN
        (
            subcon.SATUAN_NAMA
        )
    when dlpb.PAKET_OVERHEAD_MATERIAL_ID IS NOT NULL
        THEN
        (
            pom.SATUAN_NAMA
        )
    else
        '-'
end as SATUAN_MATERIAL,
case 
    when dlpb.BARANG_ID IS NOT NULL OR dlpb.BARANG_OVERHEAD_ID IS NOT NULL
        THEN
        (
            brg.BARANG_KODE
        )
    when dlpb.SUBCON_ID IS NOT NULL
        THEN
        (
            subcon_tipe.SUBCON_TIPE_KODE
        )
    when dlpb.PAKET_OVERHEAD_MATERIAL_ID IS NOT NULL
        THEN
        (
            'LSMOV'
        )
    else
        '-'
end as KODE_MATERIAL,
dpo.VOLUME_PO,
case 
    when dlpb.BARANG_ID IS NOT NULL OR dlpb.BARANG_OVERHEAD_ID IS NOT NULL
        THEN
        (
            brg.BARANG_NAMA
        )
    when dlpb.SUBCON_ID IS NOT NULL
        THEN
        (
            subcon.SUBCON_NAMA
        )
    when dlpb.PAKET_OVERHEAD_MATERIAL_ID IS NOT NULL
        THEN
        (
            pom.PAKET_OVERHEAD_MATERIAL_NAMA
        )
    else
        '-'
end as NAMA_MATERIAL,
case 
    when dlpb.BARANG_ID IS NOT NULL OR dlpb.BARANG_OVERHEAD_ID IS NOT NULL
        THEN
        (
            brg.SATUAN_NAMA
        )
    when dlpb.SUBCON_ID IS NOT NULL
        THEN
        (
            subcon.SATUAN_NAMA
        )
    when dlpb.PAKET_OVERHEAD_MATERIAL_ID IS NOT NULL
        THEN
        (
            pom.SATUAN_NAMA
        )
    else
        '-'
end as SATUAN_MATERIAL,
case 
    when dlpb.BARANG_ID IS NOT NULL 
        THEN
        (
            select coalesce(sum(dlpb1.VOLUME_LPB),0)
            from detail_lpb dlpb1
            where dlpb1.PENERIMAAN_BARANG_ID!=dlpb.PENERIMAAN_BARANG_ID
            and dlpb1.PO_ID=dlpb.PO_ID
            and dlpb1.BARANG_ID=dlpb.BARANG_ID
            and dlpb1.BARANG_ID IS NOT NULL
            and dlpb1.SUBCON_ID IS NULL
            and dlpb1.BARANG_OVERHEAD_ID IS NULL
            and dlpb1.PAKET_OVERHEAD_MATERIAL_ID IS NULL
        )
    when dlpb.SUBCON_ID IS NOT NULL 
        THEN
        (
            select coalesce(sum(dlpb1.VOLUME_LPB),0)
            from detail_lpb dlpb1
            where dlpb1.PENERIMAAN_BARANG_ID!=dlpb.PENERIMAAN_BARANG_ID
            and dlpb1.PO_ID=dlpb.PO_ID
            and dlpb1.SUBCON_ID=dlpb.SUBCON_ID
            and dlpb1.SUBCON_ID IS NOT NULL
            and dlpb1.BARANG_ID IS NULL
            and dlpb1.BARANG_OVERHEAD_ID IS NULL
            and dlpb1.PAKET_OVERHEAD_MATERIAL_ID IS NULL
        )
    when dlpb.BARANG_OVERHEAD_ID IS NOT NULL
        THEN
        (
            select coalesce(sum(dlpb1.VOLUME_LPB),0)
            from detail_lpb dlpb1
            where dlpb1.PENERIMAAN_BARANG_ID!=dlpb.PENERIMAAN_BARANG_ID
            and dlpb1.PO_ID=dlpb.PO_ID
            and dlpb1.BARANG_OVERHEAD_ID=dlpb.BARANG_OVERHEAD_ID
            and dlpb1.BARANG_OVERHEAD_ID IS NOT NULL
            and dlpb1.BARANG_ID IS NULL
            and dlpb1.SUBCON_ID IS NULL
            and dlpb1.PAKET_OVERHEAD_MATERIAL_ID IS NULL
        )
    when dlpb.PAKET_OVERHEAD_MATERIAL_ID IS NOT NULL
        THEN
        (
            select coalesce(sum(dlpb1.VOLUME_LPB),0)
            from detail_lpb dlpb1
            where dlpb1.PENERIMAAN_BARANG_ID!=dlpb.PENERIMAAN_BARANG_ID
            and dlpb1.PO_ID=dlpb.PO_ID
            and dlpb1.PAKET_OVERHEAD_MATERIAL_ID=dlpb.PAKET_OVERHEAD_MATERIAL_ID
            and dlpb1.PAKET_OVERHEAD_MATERIAL_ID IS NOT NULL
            and dlpb1.BARANG_ID IS NULL
            and dlpb1.SUBCON_ID IS NULL
            and dlpb1.BARANG_OVERHEAD_ID IS NULL
        )
    else
        '0'
end as VOLUME_PO_IN_LPB

from detail_lpb dlpb
inner join purchase_order po
on po.PURCHASE_ORDER_ID=dlpb.PO_ID
inner join detail_po dpo
on dpo.PURCHASE_ORDER_ID=po.PURCHASE_ORDER_ID AND
(
    dpo.BARANG_ID=dlpb.BARANG_ID or 
    dpo.SUBCON_ID=dlpb.SUBCON_ID or 
    dpo.BARANG_ID=dlpb.BARANG_OVERHEAD_ID or 
    dpo.SUBCON_ID=dlpb.PAKET_OVERHEAD_MATERIAL_ID
)
INNER JOIN permintaan_pembelian pp
on pp.PERMINTAAN_PEMBELIAN_ID = dpo.PERMINTAAN_PEMBELIAN_ID
left join master_barang brg
on brg.BARANG_ID=dlpb.BARANG_ID or brg.BARANG_ID=dlpb.BARANG_OVERHEAD_ID
left join subcon
on subcon.SUBCON_ID=dlpb.SUBCON_ID
left join paket_overhead_material pom
on pom.PAKET_OVERHEAD_MATERIAL_ID=dlpb.PAKET_OVERHEAD_MATERIAL_ID
left join subcon_tipe
on subcon_tipe.SUBCON_TIPE_ID=subcon.SUBCON_TIPE_ID
where dlpb.PENERIMAAN_BARANG_ID='$id_lpb' 
order by dlpb.PENERIMAAN_BARANG_ID, dlpb.PO_ID
";
        return $this->db->query($sql)->result_array();
    }

}
