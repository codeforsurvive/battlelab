<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

class mDetailLpu extends MY_Model {

    // constants, column definition


    public function __construct() {
        parent::__construct();
        $this->tableName = 'detail_lpu';
    }

    function getDetailLpu($id_lpu) {
        $sql = "
select dlpu.LPU_ID,
dlpu.OPNAME_ID,
dlpu.PK_ID,
dlpu.ANALISA_ID,
dlpu.SUBCON_ID,
dlpu.UPAH_ID,
dlpu.PAKET_OVERHEAD_UPAH_ID,
dlpu.VOLUME,
case 
    when dlpu.ANALISA_ID IS NOT NULL
        THEN
            arab.ANALISA_KODE
    WHEN dlpu.SUBCON_ID IS NOT NULL
        THEN
            subcon_tipe.SUBCON_TIPE_KODE
    WHEN dlpu.UPAH_ID IS NOT NULL
        THEN
            master_upah.UPAH_KODE
    WHEN dlpu.PAKET_OVERHEAD_UPAH_ID IS NOT NULL
        THEN
            'LSUOV'
    else
        0
end
as KODE_PEKERJAAN,
case 
    when dlpu.ANALISA_ID IS NOT NULL
        THEN
            arab.ANALISA_NAMA
    WHEN dlpu.SUBCON_ID IS NOT NULL
        THEN
            subcon.SUBCON_NAMA
    WHEN dlpu.UPAH_ID IS NOT NULL
        THEN
            master_upah.UPAH_NAMA
    WHEN dlpu.PAKET_OVERHEAD_UPAH_ID IS NOT NULL
        THEN
            pou.PAKET_OVERHEAD_UPAH_NAMA
    else
        '-'
end
as NAMA_PEKERJAAN,
case 
    when dlpu.ANALISA_ID IS NOT NULL
        THEN
            arab.SATUAN_NAMA
    WHEN dlpu.SUBCON_ID IS NOT NULL
        THEN
            subcon.SATUAN_NAMA
    WHEN dlpu.UPAH_ID IS NOT NULL
        THEN
            satuan_upah.SATUAN_UPAH_NAMA
    WHEN dlpu.PAKET_OVERHEAD_UPAH_ID IS NOT NULL
        THEN
            satuan_upah.SATUAN_UPAH_NAMA
    else
        '-'
end
as SATUAN_PEKERJAAN,
opname.OPNAME_KODE,
dop.VOLUME_OPNAME,
(
	select coalesce(SUM(dlpu1.VOLUME),0)
	from detail_lpu dlpu1
	where dlpu1.LPU_ID!=dlpu.LPU_ID
	and (dlpu1.ANALISA_ID=dlpu.ANALISA_ID OR dlpu1.UPAH_ID=dlpu.UPAH_ID or dlpu1.PAKET_OVERHEAD_UPAH_ID=dlpu.PAKET_OVERHEAD_UPAH_ID)
	and dlpu1.OPNAME_ID=dlpu.OPNAME_ID
	and dlpu1.PK_ID=dlpu.PK_ID
) AS VOLUME_OPNAME_TERPAKAI

from detail_lpu dlpu 
inner join opname 
on opname.OPNAME_ID=dlpu.OPNAME_ID 
inner join detail_transaksi_opname dop 
on dop.OPNAME_ID=opname.OPNAME_ID and (dop.ANALISA_ID=dlpu.ANALISA_ID or dop.UPAH_ID=dlpu.UPAH_ID OR dop.PAKET_OVERHEAD_UPAH_ID=dlpu.PAKET_OVERHEAD_UPAH_ID or dop.SUBCON_ID=dlpu.SUBCON_ID)
left join analisa_rab arab
on arab.ANALISA_ID=dlpu.ANALISA_ID
left join master_upah
on master_upah.UPAH_ID=dlpu.UPAH_ID
left join paket_overhead_upah pou
on pou.PAKET_OVERHEAD_UPAH_ID=dlpu.PAKET_OVERHEAD_UPAH_ID
left join satuan_upah
on satuan_upah.SATUAN_UPAH_ID=master_upah.SATUAN_UPAH_ID or satuan_upah.SATUAN_UPAH_ID=pou.SATUAN_UPAH_ID
left join subcon
on subcon.SUBCON_ID=dlpu.SUBCON_ID
left join subcon_tipe
on subcon_tipe.SUBCON_TIPE_ID=subcon.SUBCON_TIPE_ID
where dlpu.LPU_ID='$id_lpu'
order by dlpu.OPNAME_ID, dlpu.PK_ID
";
        return $this->db->query($sql)->result_array();
    }

}
