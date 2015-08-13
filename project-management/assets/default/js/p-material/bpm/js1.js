$(document).ready(function () {
    document.getElementsByClassName('has_sub')[2].setAttribute('class', 'has_sub open');
    $('#select_gudang').on('change', function () {
        $('#tabel_stok_barang_terpilih_body').html('');
        if (tabel_stok_barang != null) {
            console.log('destroy tabel stok');
            tabel_stok_barang.fnDestroy();
            $('#tabel_stok_barang_body').html('');
        }
    });
    $('#select_main_project').on('change', function () {
        reset_rab();
        $('#tabel_stok_barang_terpilih_body').html('');
        reqDataDropdown({target_element: "select_sub_project", url: "getListSubProject", param: {"idMainProject": this.value, id_gudang: $('#select_gudang').val()}, ret_array: ['PROJECT_ID', 'PROJECT_KODE', 'PROJECT_NAMA'], initial_text: 'Pilih Project'});
        $('#button_show_stok_barang').hide();
    });
    $('#select_sub_project').on('change', function () {
        $('#tabel_stok_barang_terpilih_body').html('');
        reqDataDropdown({target_element: "select_rab", url: "getListRAB", param: {"idProject": this.value, id_gudang: $('#select_gudang').val()}, ret_array: ['RAB_ID', 'RAB_KODE', 'RAB_NAMA'], initial_text: 'Pilih RAB'});
        $('#button_show_stok_barang').hide();
    });
    $('#select_rab').on('change', function () {
        show_stok();
    });
    $('#button_show_stok_barang').on('click', function () {
        $('#stokRABModal').modal();
        if ($('#tabel_stok_barang_body').children().length == 0) {
            show_stok();
        }
    });

});
function reset_sub_project() {
    $('#select_sub_project').html('<option disabled="" selected="" value="x">Pilih Project</option>');
    reset_rab();
}
function reset_rab() {
    $('#select_rab').html('<option disabled="" selected="" value="x">Pilih RAB</option>');
}
function reqDataDropdown(d) {
    $('#global_processing').show();
    console.log('globalprocessing show');
    console.log(d);
    $('#' + d.target_element).html('<option selected="" disabled="" value="0">' + d.initial_text + '</option>');
    $.ajax({
        type: "get",
        url: base_url + '/' + d.url,
        data: d.param,
        success: function (data) {
            var val = JSON.parse(data);
            if (val.length > 0) {
                var j2 = d.ret_array.length;
                console.log('data lebih dari 0');
                for (var i = 0, l = val.length; i < l; i++) {
                    console.log('proses data ke ' + i);
                    var v = val[i];
                    console.log(v);
                    var id = v[d.ret_array[0]];
                    var teks = '';
                    for (var j = 1; j < j2; j++) {
                        teks += v[d.ret_array[j]] + ' ';
                    }
                    console.log(id);
                    console.log(teks);
                    $('#' + d.target_element).append('<option value="' + id + '">' + teks + '</option>');
                }
            }
            $('#global_processing').hide();
            console.log('globalprocessing hide');
        }
        , error: function (xhr, ajaxOptions, thrownError) {
            $('#global_processing').hide();
        }
    });
}
function save(val) {
    $('#flag_save').val(val);
    if ($('#select_sub_project').val() == null || $('#select_sub_project').val() == 0) {
        alert('Anda harus memilih project yang menggunakan barang');
        return;
    }
    $('#formBPM').submit();
}

var tabel_stok_barang = null;
function show_stok() {
    $('#stokRABModal').modal();
    $('#button_show_stok_barang').show();
    console.log('parsing id rab');
    var idRAB = parseInt($('#select_rab').val());
    if (tabel_stok_barang != null) {
        console.log('destroy tabel stok');
        tabel_stok_barang.fnDestroy();
        $('#tabel_stok_barang_body').html('');
    }
    console.log('init tabel stok barang');
    tabel_stok_barang = $('#tabel_stok_barang').dataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            'method': 'post',
            "url": base_url + "/getStokBarang",
            "data": {
                id_rab: idRAB,
                id_gudang: $('#select_gudang').val(),
                id_bpm: $('#ID_BPM').val()
            },
            "dataSrc": function (json) {
                console.log(json);
                //jsonData = json.data;
                return json.data;
            }
        },
        "createdRow": function (row, data, index) {
            var kode = data[6];
            var nama = data[7];
            var jumlah_stok = parseFloat(data[5])-parseFloat(data[9]);
            var satuan = data[8];
            var id_barang = data[2];
            var id_subcon = data[3];
            var id_overhead = data[4];
            
//            if (data[2] > 0) {//barang
//                satuan = data[6];
//                kode = data[7];
//                nama = data[8];
//                id_barang = data[2];
//                jumlah_stok -= parseFloat(data[13]);
//            } else if (data[3] > 0) {//subcon
//                satuan = data[9];
//                nama = data[10];
//                kode = data[16];
//                id_subcon = data[3];
//                jumlah_stok -= parseFloat(data[14]);
//            } else if (data[4] > 0) {//overhead
//                satuan = data[11];
//                nama = data[12];
//                kode = 'LSMOV';
//                id_overhead = data[4];
//                jumlah_stok -= parseFloat(data[15]);
//            }

            var id = idRAB + '_' + id_barang + '_' + id_subcon + '_' + id_overhead;
            $('td', row).eq(0).html(kode);
            $('td', row).eq(1).html(nama);
            $('td', row).eq(2).html(jumlah_stok);
            $('td', row).eq(3).html(satuan);
            $('td', row).eq(4).html('');
            if (jumlah_stok > 0)
                $('td', row).eq(4).html('<button class="btn btn-xs btn-success" onclick="addBarang(this,' + idRAB + ',' + id_barang + ',' + id_subcon + ',' + id_overhead + ',' + jumlah_stok + ')"><i class="fa fa-plus fa-fw"></i> Pilih</button>');
            $(row).attr('id', 'item_' + id);
        }
    });
}

function addBarang(td_button, id_rab, id_barang, id_subcon, id_overhead, max_vol) {
    console.log(td_button);
    var td = td_button.parentNode.parentNode.children;
    var id_row = id_rab + '_' + id_barang + '_' + id_subcon + '_' + id_overhead;
    if ($('#tabel_stok_barang_terpilih_tr_' + id_row).length == 0) {
        $("#tabel_stok_barang_terpilih").append('<tr id="tabel_stok_barang_terpilih_tr_' + id_row + '">'
                + '<td>' + td[0].innerHTML + '</td>'
                + '<td>' + td[1].innerHTML + '</td>'
                + '<td style="width:140px"><input type="text" class="form-control" value="' + td[2].innerHTML + '" name="volume[]" placeholder="maksimal ' + max_vol + '" max="' + max_vol + '" onchange="cekVolume(this)" id="volume_' + id_row + '"></td>'
                + '<td>' + max_vol + '</td>'
                + '<td>' + td[3].innerHTML + '</td>'
                + '<td><button type="button" class="btn btn-xs btn-danger" onclick="hapusBarang(\'' + id_row + '\'); return false;"><i class="fa fa-minus fa-fw"></i> Hapus</button>'
                + '<input type="hidden" name="id_rab[]" value="' + id_rab + '"/>'
                + '<input type="hidden" name="id_barang[]" value="' + id_barang + '"/>'
                + '<input type="hidden" name="id_subcon[]" value="' + id_subcon + '"/>'
                + '<input type="hidden" name="id_overhead[]" value="' + id_overhead + '"/>'
                + '</td>'
                + '</tr>');
        //$('#select_gudang').attr('disabled', true);
        //$('#select_sub_project').attr('disabled', 'true');
    }
}
function hapusBarang(id) {
    $('#tabel_stok_barang_terpilih_tr_' + id).remove();
    $('#div_tambahan_' + id).remove();
}
function cekVolume(vol) {
    //var vol = $('#volume_' + id);
    var max = parseFloat(vol.getAttribute('max'));
    var volume = parseFloat(vol.value);
    //var max = parseFloat(vol.attr('max'));
    //var volume = parseFloat(vol.val());
    if (volume < 0) {
        vol.value = 0;
//            vol.val(0);
        alert('Volume tidak boleh negatif');
    } else if (volume > max) {
        vol.value = max;
        //vol.val(max);
        alert('Volume tidak boleh melebihi dari stok yang tersedia');
    } else {
        vol.value = volume;
        //vol.val(volume);
    }
}