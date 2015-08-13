$(document).ready(function () {
    initBarangLama();
});
function initBarangLama() {
    $.ajax({
        type: "post",
        url: base_url + '/getDetailLPB',
        data: {idLPB: penerimaan_barang_id},
        success: function (data) {
            var json = JSON.parse(data);
            console.log(json);
            var j = json.length;
            for (var i = 0; i < j; i++) {
                var lpb = json[i];
                var id_lain = 0;
                var id_barang = 0;
                var volume_sisa = 0;
                var nama_barang = lpb['NAMA_MATERIAL'];
                var kategori_barang = '';
                var kode_barang = lpb['KODE_MATERIAL'];
                var satuan_barang = lpb['SATUAN_MATERIAL'];
//                if (parseInt(lpb['KATEGORI_PP_ID']) == 1) {//overhead
//                    if (parseInt(lpb['BARANG_OVERHEAD_ID']) > 0) {
//                        volume_sisa = parseFloat(lpb['VOLUME_PO']) - parseFloat(lpb['VOLUME_PO_OVERHEAD_BARANG_LPB_LAIN']);
//                        id_barang = lpb['BARANG_OVERHEAD_ID'];
//                        nama_barang = lpb['BARANG_NAMA'];
//                        kode_barang = lpb['BARANG_KODE'];
//                        satuan_barang = lpb['SATUAN_NAMA'];
//                    } else if (parseInt(lpb['PAKET_OVERHEAD_MATERIAL_ID']) > 0) {
//                        id_lain = lpb['PAKET_OVERHEAD_MATERIAL_ID'];
//                        volume_sisa = parseFloat(lpb['VOLUME_PO']) - parseFloat(lpb['VOLUME_PO_OVERHEAD_PAKET_LPB_LAIN']);
//                        nama_barang = lpb['OVERHEAD_NAMA'];
//                        kode_barang = 'LS';
//                        satuan_barang = '';
//                    }
//                } else if (parseInt(lpb['KATEGORI_PP_ID']) == 2) {//bahan
//                    if (parseInt(lpb['BARANG_ID']) > 0) {
//                        id_barang = lpb['BARANG_ID'];
//                        volume_sisa = parseFloat(lpb['VOLUME_PO']) - parseFloat(lpb['VOLUME_PO_BAHAN_BARANG_LPB_LAIN']);
//                        nama_barang = lpb['BARANG_NAMA'];
//                        kode_barang = lpb['BARANG_KODE'];
//
//                        satuan_barang = lpb['SATUAN_NAMA'];
//                    } else if (parseInt(lpb['SUBCON_ID']) > 0) {
//                        id_lain = lpb['SUBCON_ID'];
//                        volume_sisa = parseFloat(lpb['VOLUME_PO']) - parseFloat(lpb['VOLUME_PO_BAHAN_SUBCON_LPB_LAIN']);
//                        nama_barang = lpb['SUBCON_NAMA'];
//                        kode_barang = lpb['SUBCON_TIPE_KODE'];
//                        satuan_barang = lpb['SUBCON_SATUAN_NAMA'];
//                    }
//                }
                var kategori_pp_id = parseInt(lpb['KATEGORI_PP_ID']);
                if (kategori_pp_id == 1) {
                    id_barang = lpb['BARANG_OVERHEAD_ID'];
                    id_lain = lpb['PAKET_OVERHEAD_MATERIAL_ID'];
                } else if (kategori_pp_id == 2) {
                    id_barang = lpb['BARANG_ID'];
                    id_lain = lpb['SUBCON_ID'];
                }var volume_sisa=parseFloat(lpb['VOLUME_PO'])-parseFloat(lpb['VOLUME_PO_IN_LPB']);
                var button = {
                    parentNode: {
                        parentNode: {
                            children: [
                                {innerHTML: kode_barang}, //KODE BARANG /2
                                {innerHTML: nama_barang}, //NAMA BARANG /0
                                {innerHTML: kategori_barang}, //KATEGRI BARANG /1
                                {innerHTML: lpb['VOLUME_PO']}, //VOLUME PO /3
                                {innerHTML: lpb['VOLUME_LPB']}, //SISA VOLUME PO /4
                                {innerHTML: satuan_barang}, //SATUAN /5
                                {
                                    children: [
                                        {value: 0},
                                        {value: volume_sisa}
                                    ]
                                }
                            ]
                        }
                    }
                };

                addRap(button, kategori_pp_id, id_barang, id_lain, {id: lpb['PO_ID'], kode: lpb['PURCHASE_ORDER_KODE']});
            }
        }
        , error: function (xhr, ajaxOptions, thrownError) {
            //$("#detailPO2").html(xhr.responseText);
        }
    });
}