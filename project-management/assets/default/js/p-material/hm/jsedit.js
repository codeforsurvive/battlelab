$(document).ready(function () {
    initBarangLama();
    changeGudang();
});
function initBarangLama() {
    $.ajax({
        type: "get",
        url: base_url + '/get_detail_hm',
        data: {id: id_hm},
        success: function (data) {
            var json = JSON.parse(data);
            var j = json.length;
            for (var i = 0; i < j; i++) {
                var dhm = json[i];
                //addBarang(   barang_kode,       barang_nama,       volume,       satuan,          barang_id,      rab_id, v_max)
                addBarang(dhm['BARANG_KODE'], dhm['BARANG_NAMA'], dhm['VOLUME'], dhm['SATUAN_NAMA'], dhm['BARANG_ID'], dhm['RAB_PEMBERI'], dhm['stok_sisa']);
            }
        }
        , error: function (xhr, ajaxOptions, thrownError) {
            //$("#detailPO2").html(xhr.responseText);
        }
    });
}