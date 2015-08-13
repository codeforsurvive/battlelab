$(document).ready(function () {
    getDetailBPM();
});
function getDetailBPM() {
    $.ajax({
        type: "get",
        url: base_url + '/getDetailBPM',
        data: {id_bpm: id_bpm},
        success: function (data) {
            var json = JSON.parse(data);
            //var j = json.length;
            for (var i = 0, j = json.length; i < j; i++) {
                var dbpm = json[i];
                var kode = ''
                var nama = '';
                var jumlah_stok = parseFloat(dbpm['VOLUME']);
                var satuan = '';
                var id_barang = 0;
                var id_subcon = 0;
                var id_overhead = 0;
                var volume_tersedia = 0;
                if (dbpm['BARANG_ID'] > 0) {//barang
                    satuan = dbpm['BARANG_SATUAN_NAMA'];
                    kode = dbpm['BARANG_KODE'];
                    nama = dbpm['BARANG_NAMA'];
                    id_barang = dbpm['BARANG_ID'];
                    volume_tersedia = dbpm['STOK_BARANG'] - dbpm['V_BARANG_IN_BPM'];
                } else if (dbpm['SUBCON_ID'] > 0) {//subcon
                    satuan = dbpm['SUBCON_SATUAN_NAMA'];
                    nama = dbpm['SUBCON_NAMA'];
                    kode = 'LS';
                    id_subcon = dbpm['SUBCON_ID'];
                    volume_tersedia = dbpm['STOK_SUBCON'] - dbpm['V_SUBCON_IN_BPM'];
                } else if (dbpm['PAKET_OVERHEAD_MATERIAL_ID'] > 0) {//overhead
                    satuan = dbpm['OVERHEAD_SATUAN_NAMA'];
                    nama = dbpm['PAKET_OVERHEAD_MATERIAL_NAMA'];
                    kode = 'LS';
                    id_overhead = dbpm['PAKET_OVERHEAD_MATERIAL_ID'];
                    volume_tersedia = dbpm['STOK_OVERHEAD'] - dbpm['V_OVERHEAD_IN_BPM'];
                }
                var td_button = {
                    parentNode: {
                        parentNode: {
                            children: [
                                {innerHTML: kode},
                                {innerHTML: nama},
                                {innerHTML: jumlah_stok},
                                {innerHTML: satuan}
                            ]
                        }
                    }
                };
                addBarang(td_button, dbpm['RAB_ID'], id_barang, id_subcon, id_overhead, volume_tersedia);
            }
        }
        , error: function (xhr, ajaxOptions, thrownError) {
            //$("#detailPO2").html(xhr.responseText);
        }
    });
}