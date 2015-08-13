$(document).ready(function () {
    document.getElementsByClassName('has_sub')[2].setAttribute('class', 'has_sub open');
    $('#button_show_stok_barang').on('click', function () {
        $('#stokRABModal').modal();
    });
    $('#select_main_project').on('change', function () {
        reset_sub_project('');
        reqDataDropdown("select_sub_project", "getListSubProject", {idMainProject: this.value}, ['PROJECT_ID', 'PROJECT_KODE', 'PROJECT_NAMA']);
        $('#main_project_pemberi').val(this.value);
    });
    $('#select_sub_project').on('change', function () {
        $('#project_pemberi').val(this.value);
        reset_rab('');
        reqDataDropdown("select_rab", "getListRAB", {idProject: this.value}, ['RAB_ID', 'RAB_KODE', 'RAB_NAMA']);

    });
    $('#select_rab').on('change', function () {
        $('#rab_pemberi').val(this.value);
        reset_gudang('');
        reqDataDropdown("select_gudang", "getListGudang", {id_rab: this.value}, ['GUDANG_ID', 'GUDANG_KODE', 'GUDANG_NAMA', 'GUDANG_LOKASI']);
    });
    $('#select_gudang').on('change', function () {
        $('#gudang_pemberi').val(this.value);
        reset_hm('');
        reqDataDropdown("select_hm", "getListHm", {id_gudang: this.value, id_rab: $('#rab_pemberi').val()}, ['HUTANG_BARANG_ID', 'HUTANG_BARANG_KODE']);
    });
    $('#select_hm').on('change', function () {
        $('#hutang_material_id').val(this.value);
        reqDetailHutangMaterial();
        $('#stokRABModal').modal();
        $('#button_show_stok_barang').show();
    });
});
function reset_sub_project(s) {
    $('#select_sub_project' + s).html('<option disabled="" selected="" value="0">Pilih SubProject</option>');
    reset_rab(s);
}
function reset_rab(s) {
    $('#select_rab' + s).html('<option disabled="" selected="" value="0">Pilih RAB</option>');
    reset_gudang(s);
}
function reset_gudang(s) {
    $('#select_gudang' + s).html('<option disabled="" selected="" value="0">Pilih Gudang</option>');
    //$('#button_show_stok_barang').hide();
    reset_hm(s);
}
function reset_hm(s) {
    $('#select_hm' + s).html('<option disabled="" selected="" value="0">Pilih HM</option>');
    $('#button_show_stok_barang').hide();
}
function reqDataDropdown(elemID, destinationURL, param, resDisplay) {
    console.log(param);
    console.log(resDisplay);
    $('#global_processing').show();
    $.ajax({
        type: "get",
        url: base_url + '/' + destinationURL,
        data: param,
        success: function (data) {
            var val = JSON.parse(data);
            if (val.length > 0) {
                var l = resDisplay.length;
                for (var i = 0; i < val.length; i++) {
                    var v = val[i];
                    var display = "";
                    for (var m = 1; m < l; m++) {
                        display += v[resDisplay[m]] + ' ';
                    }
                    $('#' + elemID).append('<option value="' + v[resDisplay[0]] + '" >' + display + '</option>');
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
    var iv = document.getElementsByClassName('pm_input_volume');
    var jumlah = iv.length;
    var allValid = true;
    for (var i = 0; i < jumlah; i++) {
        var inp = iv[i];
        var max_stok = parseFloat(inp.getAttribute('max_stok'));
        var max_pinjam = parseFloat(inp.getAttribute('max_pinjam'));
        var vol = parseFloat(inp.value);
        var max_input = Math.min(max_pinjam, max_stok);
        if (vol > max_input) {
            allValid = false;
            inp.focus();
            inp.value = max_input;
            inp.select();
            alert('Volume barang yang akan dikembalikan tidak boleh melebih stok yang tersedia atau jumlah yang dipinjam');
            break;
        } else if (vol == 0) {
            allValid = false;
            alert('Volume barang yang akan dikembalikan tidak boleh nol');
            break;
        }
    }
    if (allValid) {
        $('#formBPM').submit();
    } else {

    }
}

var tabel_stok_barang = null;
function reqDetailHutangMaterial() {

    if (tabel_stok_barang != null) {
        console.log('destroy tabel stok');
        tabel_stok_barang.fnDestroy();
    }
    var idRAB = $('#rab_pemberi').val();
    tabel_stok_barang = $('#tabel_stok_barang').dataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            'method': 'post',
            "url": base_url + "/getDetailHutangMaterial",
            "data": {
                id_hm: $('#hutang_material_id').val(),
                id_pm: $('#kembali_material_id').val(),
            },
            "dataSrc": function (json) {
                console.log(json);
                jsonData = json.data;
                return json.data;
            }
        },
        "createdRow": function (row, data, index) {
            var id = data[5] + '_' + data[6] + '_' + data[7];
            var barang_kode = data[0];
            var barang_nama = data[1];
            var volume_pinjam = data[2];
            var volume_stok = data[3];
            var satuan_nama = data[4];
            var rab_id = data[5];
            var barang_id = data[6];
            var gudang_id = data[7];
            var volume_telah_kembali_unvalidated = data[8];
            var volume_telah_kembali_validated = data[9];
            var v_max_stok = volume_stok - volume_telah_kembali_unvalidated;
            var v_max_pinjam = volume_pinjam - volume_telah_kembali_unvalidated - volume_telah_kembali_validated;
            $('td', row).eq(2).html(v_max_pinjam);
            $('td', row).eq(3).html(v_max_stok);
            //addBarang(      barang_kode,          barang_nama,          satuan,               barang_id,        rab_id,         v_max_stok,                                    v_max_pinjam) {
            $('td', row).eq(5).html('<button class="btn btn-xs btn-success" onclick="addBarang(\'' + barang_kode + "','" + barang_nama + "','" + satuan_nama + "','" + barang_id + '\',' + rab_id + ',\'' + v_max_stok + '\',\'' + v_max_pinjam + '\')"><i class="fa fa-plus fa-fw"></i> Pilih</button>');
            $(row).attr('id', 'item_' + id);
        }
    });
}

function addBarang(barang_kode, barang_nama, satuan, barang_id, rab_id, v_max_stok, v_max_pinjam, volume_kembali) {
    var volume = Math.min(v_max_pinjam, v_max_stok);
    if (volume_kembali != undefined) {
        volume = volume_kembali;
    }
    var id_row = rab_id + '_' + barang_id;
    if ($('#tabel_stok_barang_terpilih_tr_' + id_row).length == 0) {
        $("#tabel_stok_barang_terpilih").append('<tr id="tabel_stok_barang_terpilih_tr_' + id_row + '">'
                + '<td>' + barang_kode + '</td>'
                + '<td>' + barang_nama + '</td>'
                + '<td style="width:140px"><input type="text" class="form-control pm_input_volume" value="' + volume + '" name="listVolume[]" placeholder="maksimal ' + Math.min(v_max_pinjam, v_max_stok) + '" max_stok="' + v_max_stok + '" max_pinjam="' + v_max_pinjam + '" onchange="cekVolume(this)" id="volume_' + id_row + '"></td>'
                + '<td>' + v_max_pinjam + '</td>'
                + '<td>' + v_max_stok + '</td>'
                + '<td>' + satuan + '</td>'
                + '<td><button type="button" class="btn btn-xs btn-danger" onclick="hapusBarang(\'' + id_row + '\'); return false;"><i class="fa fa-minus fa-fw"></i> Hapus</button></td>'
                + '</tr>');
        $('#data_tambahan').append('<div id="div_tambahan_' + id_row + '">'
                //+ '<input type="hidden" value="' + rab_id + '" name="listRAB[]"/>'
                + '<input type="hidden" value="' + barang_id + '" name="listBarang[]"/>'
                + '</div>');
        enable_input(false);
    }
}
function hapusBarang(id) {
    $('#tabel_stok_barang_terpilih_tr_' + id).remove();
    $('#div_tambahan_' + id).remove();
    if ($('#tabel_stok_barang_terpilih_body').children().length == 0) {
        console.log('re-enabled');
        enable_input(true);
    }
}
function cekVolume(vol) {
    var max_stok = parseFloat(vol.getAttribute('max_stok'));
    var max_pinjam = parseFloat(vol.getAttribute('max_pinjam'));
    var max = Math.min(max_pinjam, max_stok);
    var volume = parseFloat(vol.value);
    if (volume <= 0) {
        vol.value = max;
        alert('Volume harus diisi');
    } else if (volume > max) {
        vol.value = max;
        alert('Volume tidak boleh melebihi dari stok/volume pinjam (' + max + ')');
    } else {
        vol.value = volume;
    }
}
function hapus_semua_barang() {
    $('#tabel_stok_barang_terpilih_body').html('');
    $('#div_tambahan').html('');
    enable_input(true);
}
function enable_input(val) {
    val = !val;
    $('#select_main_project').attr('disabled', val);
    $('#select_sub_project').attr('disabled', val);
    $('#select_rab').attr('disabled', val);
    $('#select_gudang').attr('disabled', val);
    $('#select_hm').attr('disabled', val);
}