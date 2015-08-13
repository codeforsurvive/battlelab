$(document).ready(function () {
    document.getElementsByClassName('has_sub')[2].setAttribute('class', 'has_sub open');
    $('#tanggal_mulai_hutang').datepicker({
        dateFormat: 'yy-mm-dd'
    });
    $('#tanggal_prediksi_kembali').datepicker({
        dateFormat: 'yy-mm-dd'
    });
    $('#button_show_stok_barang').on('click', function () {
        $('#stokRABModal').modal();
    });
    $('#select_main_project').on('change', function () {
        reset_sub_project('');
        reqDataDropdown("select_sub_project", "getListSubProject", "idMainProject", this.value, 'PROJECT_ID', ['PROJECT_KODE', 'PROJECT_NAMA']);
        $('#main_project_pemberi').val(this.value);
    });
    $('#select_sub_project').on('change', function () {
        $('#project_pemberi').val(this.value);
        reset_rab('');
        reqDataDropdown("select_rab", "getListRAB", "idProject", this.value, 'RAB_ID', ['RAB_KODE', 'RAB_NAMA']);

    });
    $('#select_rab').on('change', function () {
        $('#rab_pemberi').val(this.value);
        reset_gudang('');
        reqDataDropdown("select_gudang", "getListGudang", "id_rab", this.value, 'GUDANG_ID', ['GUDANG_KODE', 'GUDANG_NAMA', 'GUDANG_LOKASI']);

    });
    $('#select_gudang').on('change', function () {
        $('#gudang_pemberi').val(this.value);
        //$('#button_show_stok_barang').show();
        //$('#stokRABModal').modal();
        pilih_stok();
    });
    $('#select_main_project2').on('change', function () {
        $('#main_project_penerima').val(this.value);
        reset_sub_project('2');
        reqDataDropdown("select_sub_project2", "getListSubProject", "idMainProject", this.value, 'PROJECT_ID', ['PROJECT_KODE', 'PROJECT_NAMA']);
    });
    $('#select_sub_project2').on('change', function () {
        $('#project_penerima').val(this.value);
        reset_rab('2');
        reqDataDropdown("select_rab2", "getListRAB", "idProject", this.value, 'RAB_ID', ['RAB_KODE', 'RAB_NAMA']);
    });
    $('#select_rab2').on('change', function () {
        $('#rab_penerima').val(this.value);
        reset_gudang('2');
        reqDataDropdown("select_gudang2", "getListGudang", "id_rab", this.value, 'GUDANG_ID', ['GUDANG_KODE', 'GUDANG_NAMA', 'GUDANG_LOKASI']);
    });
    $('#select_gudang2').on('change', function () {
        $('#gudang_penerima').val(this.value);
        pilih_stok();
    });
});
function reset_sub_project(s) {
    $('#select_sub_project' + s).html('<option disabled="" selected="" value="x">Pilih SubProject</option>');
    reset_rab(s);
    if (s.length == 0) {
        $('#project_pemberi').val(0);
    } else {
        $('#project_penerima').val(0);
    }
}
function reset_rab(s) {
    $('#select_rab' + s).html('<option disabled="" selected="" value="x">Pilih RAB</option>');
    reset_gudang(s);
    if (s.length == 0) {
        $('#rab_pemberi').val(0);
    } else {
        $('#rab_penerima').val(0);
    }
}
function reset_gudang(s) {
    $('#select_gudang' + s).html('<option disabled="" selected="" value="x">Pilih Gudang</option>');
    $('#button_show_stok_barang').hide();
    if (s.length == 0) {
        $('#gudang_pemberi').val(0);
    } else {
        $('#gudang_penerima').val(0);
    }
    pilih_stok();
}
function reqDataDropdown(elemID, destinationURL, paramname, paramval, resID, resDisplay) {
    $('#global_processing').show();
    var datax = {};
    var disabled = 'disabled=""';
    var isDisabled = false;// (elemID=='select_rab2') || (elemID=='select_rab');
    var elmToCompare = '';
    if (elemID == 'select_rab2') {
        isDisabled = true;
        elmToCompare = 'rab_pemberi';
    } else if (elemID == 'select_rab') {
        isDisabled = true;
        elmToCompare = 'rab_penerima';
    }
    datax[paramname] = paramval;
    $.ajax({
        type: "get",
        url: base_url + '/' + destinationURL,
        data: datax,
        success: function (data) {
            var val = JSON.parse(data);
            if (val.length > 0) {
                var l = resDisplay.length;
                for (var i = 0; i < val.length; i++) {
                    var v = val[i];
                    var display = "";
                    for (var m = 0; m < l; m++) {
                        display += v[resDisplay[m]] + ' ';
                    }
                    if (isDisabled && v[resID] == $('#' + elmToCompare).val()) {
                        $('#' + elemID).append('<option disabled="" value="' + v[resID] + '" >' + display + '</option>');
                    } else {
                        $('#' + elemID).append('<option value="' + v[resID] + '" >' + display + '</option>');
                    }
                }
            }
            $('#global_processing').hide();
        }
        , error: function (xhr, ajaxOptions, thrownError) {
            $('#global_processing').hide();
        }
    });
}

function save(val) {
    $('#flag_save').val(val);
    var rab_penerima = $('#rab_penerima').val();
    var gudang_penerima = $('#gudang_penerima').val();
    var rab_pemberi = $('#rab_pemberi').val();
    var gudang_pemberi = $('#gudang_pemberi').val();
    if (rab_penerima == 0 || gudang_penerima == 0 || rab_pemberi == 0 || gudang_pemberi == 0) {
        alert('Harap mengisi RAB Penerima dan RAB Pemberi secara lengkap');
    } else {
        $('#formBPM').submit();
    }
}
function pilih_stok() {
    console.log('cek apakah main project pemberi telah diisi');
    if (parseInt($('#main_project_pemberi').val()) > 0) {
        console.log('cek apakah main project penerima telah diisi');
        if (parseInt($('#main_project_penerima').val()) > 0) {
            console.log('cek apakah project pemberi telah diisi');
            if (parseInt($('#project_pemberi').val()) > 0) {
                console.log('cek apakah project penerima telah diisi');
                if (parseInt($('#project_penerima').val()) > 0) {
                    console.log('cek apakah rab pemberi telah diisi');
                    if (parseInt($('#rab_pemberi').val()) > 0) {
                        console.log('cek apakah rab penerima telah diisi');
                        if (parseInt($('#rab_penerima').val()) > 0) {
                            console.log('cek apakah gudang pemberi telah diisi');
                            if (parseInt($('#gudang_pemberi').val()) > 0) {
                                console.log('cek apakah gudang penerima telah diisi');
                                if (parseInt($('#gudang_penerima').val()) > 0) {
                                    console.log('menampilkan tombol pilih stok');
                                    $('#button_show_stok_barang').show('slow');
                                    show_stok();
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}
var tabel_stok_barang = null;
function show_stok() {
    //$('#button_show_stok_barang').show();
    console.log('parsing id rab');
    if (tabel_stok_barang != null) {
        console.log('destroy tabel stok');
        tabel_stok_barang.fnDestroy();
    }
    console.log('init tabel stok barang');
    var idRAB = $('#rab_pemberi').val();
    tabel_stok_barang = $('#tabel_stok_barang').dataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            'method': 'post',
            "url": base_url + "/getStokBarang",
            "data": {
                id_rab: idRAB,
                id_gudang: $('#gudang_pemberi').val(),
                id_hm: $('#id_hm').val(),
                id_rab_penerima: $('#rab_penerima').val()
            },
            "dataSrc": function (json) {
                console.log(json.sql);
                jsonData = json.data;
                return json.data;
            }
        },
        "createdRow": function (row, data, index) {
            var id = data[4];
            //$('td', row).eq(0).html(index + 1);
            var base_url = '<?= base_url(); ?>';
            //$('td', row).eq(4).html('');
            if (data[2] < 0) {
                data[2] = 0;
            }
            //$('td', row).eq(2).html('<input type="text" value="' + data[2] + '" class="form-control" style="width:100px" id="volume_' + id + '" max="' + data[2] + '" placeholder="maksimal ' + data[2] + '" onchange="cekVolume(this);"> dari ' + data[2] + ' tersedia');
            $('td', row).eq(4).html('<button class="btn btn-xs btn-success" onclick="addBarang(\'' + data[0] + "','" + data[1] + "','" + data[2] + "','" + data[3] + "','" + data[4] + '\',' + idRAB + ',\'' + data[2] + '\')"><i class="fa fa-plus fa-fw"></i> Pilih</button>');
            $(row).attr('id', 'item_' + id);
        }
    });
}

function addBarang(barang_kode, barang_nama, volume, satuan, barang_id, rab_id, v_max) {
    var id_row = rab_id + '_' + barang_id;
    if ($('#tabel_stok_barang_terpilih_tr_' + id_row).length == 0) {
        $("#tabel_stok_barang_terpilih").append('<tr id="tabel_stok_barang_terpilih_tr_' + id_row + '">'
                + '<td>' + barang_kode + '</td>'
                + '<td>' + barang_nama + '</td>'
                + '<td style="width:140px"><input type="text" class="form-control" value="' + volume + '" name="listVolume[]" placeholder="maksimal ' + v_max + '" max="' + v_max + '" onchange="cekVolume(this)" id="volume_' + id_row + '"></td>'
                + '<td>' + v_max + '</td>'
                + '<td>' + satuan + '</td>'
                + '<td><button type="button" class="btn btn-xs btn-danger" onclick="hapusBarang(\'' + id_row + '\'); return false;"><i class="fa fa-minus fa-fw"></i> Hapus</button></td>'
                + '</tr>');
        $('#data_tambahan').append('<div id="div_tambahan_' + id_row + '">'
                //+ '<input type="hidden" value="' + rab_id + '" name="listRAB[]"/>'
                + '<input type="hidden" value="' + barang_id + '" name="listBarang[]"/>'
                + '</div>');
        $('#select_main_project').attr('disabled', true);
        $('#select_sub_project').attr('disabled', true);
        $('#select_rab').attr('disabled', true);
        $('#select_gudang').attr('disabled', true);
        $('#select_main_project2').attr('disabled', true);
        $('#select_sub_project2').attr('disabled', true);
        $('#select_rab2').attr('disabled', true);
        $('#select_gudang2').attr('disabled', true);
    }
}
function hapusBarang(id) {
    $('#tabel_stok_barang_terpilih_tr_' + id).remove();
    $('#div_tambahan_' + id).remove();
    if ($('#tabel_stok_barang_terpilih_body').children().length == 0) {
        console.log('re-enabled');
        $('#select_main_project').attr('disabled', false);
        $('#select_sub_project').attr('disabled', false);
        $('#select_rab').attr('disabled', false);
        $('#select_gudang').attr('disabled', false);
        $('#select_main_project2').attr('disabled', false);
        $('#select_sub_project2').attr('disabled', false);
        $('#select_rab2').attr('disabled', false);
        $('#select_gudang2').attr('disabled', false);
    }
}
function cekVolume(vol) {
    //var vol = $('#volume_' + id);
    var max = parseFloat(vol.getAttribute('max'));
    var volume = parseFloat(vol.value);
    //var max = parseFloat(vol.attr('max'));
    //var volume = parseFloat(vol.val());
    if (volume <= 0) {
        vol.value = max;
        alert('Volume harus diisi');
    } else if (volume > max) {
        vol.value = max;
        alert('Volume tidak boleh melebihi dari stok yang tersedia (' + max + ')');
    } else {
        vol.value = volume;
    }
}
function hapus_semua_barang() {
    $('#tabel_stok_barang_terpilih_body').html('');
    $('#div_tambahan').html('');
}