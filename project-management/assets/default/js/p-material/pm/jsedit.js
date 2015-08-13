$(document).ready(function () {
    initBarangLama();
    reqDetailHutangMaterial();
});
function initBarangLama() {
    $.ajax({
        type: "get",
        url: base_url + '/get_detail_pm',
        data: {id: id_pm},
        success: function (data) {
            var json = JSON.parse(data);
            console.log(json);
            var j = json.length;
            for (var i = 0; i < j; i++) {
                var dhm = json[i];
                //addBarang(   barang_kode,       barang_nama,       satuan,             barang_id,       rab_id,             v_max_stok,      v_max_pinjam)
                addBarang(dhm['BARANG_KODE'], dhm['BARANG_NAMA'], dhm['SATUAN_NAMA'], dhm['BARANG_ID'], dhm['RAB_ID'], dhm['stok_sisa'] - dhm['volume_lain_telah_kembali_unvalidated'], dhm['volume_pinjam'] - dhm['volume_lain_telah_kembali_unvalidated'] - dhm['volume_lain_telah_kembali_validated'], dhm['VOLUME']);
            }
        }
        , error: function (xhr, ajaxOptions, thrownError) {
            //$("#detailPO2").html(xhr.responseText);
        }
    });
}