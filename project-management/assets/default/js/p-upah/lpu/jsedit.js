$(document).ready(function () {
    get_detail_lpu();
    $('#button_pilih_opname').show('slow');
});
function get_detail_lpu() {
    $.ajax({
        type: "get",
        url: base_url + '/get_detail_lpu',
        data: {id: id_lpu},
        success: function (data) {
            var json = JSON.parse(data);
            var j = json.length;
            for (var i = 0; i < j; i++) {
                var dlpu = json[i];
                console.log(dlpu);
                var kode = dlpu['KODE_PEKERJAAN'], nama = dlpu['NAMA_PEKERJAAN'], satuan = dlpu['SATUAN_PEKERJAAN'];
//                if (dlpu['ANALISA_ID'] != null) {
//                    kode = dlpu['ANALISA_KODE'];
//                    nama = dlpu['ANALISA_NAMA'];
//                    satuan = dlpu['SATUAN_NAMA'];
//                } else {
//                    satuan = dlpu['SATUAN_UPAH_NAMA'];
//                    if (dlpu['UPAH_ID'] != null) {
//                        kode = dlpu['UPAH_KODE'];
//                        nama = dlpu['UPAH_NAMA'];
//                    } else if (dlpu['PAKET_ID'] != null) {
//                        kode = 'LSUOV';
//                        nama = dlpu['PAKET_OVERHEAD_UPAH_NAMA'];
//                    }
//                }
                var elmn = {
                    parentNode: {
                        parentNode: {
                            children: [
                                {innerHTML: kode},
                                {innerHTML: nama},
                                {innerHTML: dlpu['VOLUME']}, //volume lpu
                                {innerHTML: parseFloat(dlpu['VOLUME_OPNAME'])}, //volume tersedia
                                {innerHTML: satuan}
                            ]
                        },
                        children: {
                            id_opname: {value: dlpu['OPNAME_ID']},
                            id_pk: {value: dlpu['PK_ID']},
                            id_analisa: {value: dlpu['ANALISA_ID']},
                            id_subcon: {value: dlpu['SUBCON_ID']},
                            id_upah: {value: dlpu['UPAH_ID']},
                            id_paket: {value: dlpu['PAKET_ID']},
                            harga_satuan: {value: dlpu['HARGA_SATUAN']},
                            volume_tersedia: {value: parseFloat(dlpu['VOLUME_OPNAME']) - parseFloat(dlpu['VOLUME_OPNAME_TERPAKAI'])}
                        }
                    }
                };
                addDetailOpname(elmn, dlpu['OPNAME_KODE']);
            }
        }
        , error: function (xhr, ajaxOptions, thrownError) {
        }
    });
}