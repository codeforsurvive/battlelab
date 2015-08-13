$(document).ready(function () {
    document.getElementsByClassName('has_sub')[1].setAttribute('class', 'has_sub open');
    $('#button_pilih_opname').hide();
    $('.saveForm').hide();
    $('#select_main_project').on('change', function () {
        reset_rab();
        reqDataDropdown({
            target_element: 'select_project',
            url: 'get_list_project',
            param: {id_main_project: this.value},
            ret_array: ['PROJECT_ID', 'PROJECT_KODE', 'PROJECT_NAMA'],
            initial_text: 'Pilih Project'
        });
    });
    $('#select_project').on('change', function () {
        reset_rab();
        reqDataDropdown({
            target_element: 'select_rab',
            url: 'get_list_rab',
            param: {id_project: this.value},
            ret_array: ['RAB_ID', 'RAB_KODE', 'RAB_NAMA'],
            initial_text: 'Pilih RAB'
        });
    });
    $('#select_rab').on('change', function () {
        $('#button_pilih_opname').fadeIn('slow');
        reqDataDropdown({
            target_element: 'select_opname',
            url: 'get_list_opname',
            param: {id_rab: $('#select_rab').val()},
            ret_array: ['OPNAME_ID', 'OPNAME_KODE'],
            initial_text: 'Pilih Opname'
        });
        if (opname_datatable != null) {
            opname_datatable.fnDestroy();
            $('#tabel_detail_opname_body').html('');
        }
    });
    $('#button_pilih_opname').on('click', function () {
        $("#modalPilihan").modal();
        req_detail_rap();
    });
    $('#select_opname').on('change', function () {
        get_opname_datatable();
    });
});
var list_rap = [];
function req_detail_rap() {
    if (!list_rap.hasOwnProperty($('#select_rab').val())) {
        console.log('request detailr rap karena belum punya');
        var id = $('#select_rab').val();
        list_rap[id] = 'wkwkwk';
        console.log(list_rap);
    }
}
var opname_datatable = null;
function get_opname_datatable() {
    if (opname_datatable != null) {
        opname_datatable.fnDestroy();
        $('#tabel_detail_opname_body').html('');
    }
    var id_opname = $('#select_opname').val();
    opname_datatable = $('#tabel_detail_opname').dataTable({
        processing: true,
        serverSide: true,
        ajax: {
            method: 'post',
            url: base_url + "/get_detail_opname_datatable",
            data: {
                id_opname: id_opname,
                id_lpu: $('#id_lpu').val()
            },
            dataSrc: function (json) {
                console.log(json);
                jsonData = json.data;
                return json.data;
            }
        },
        createdRow: function (row, data, index) {
            var id = index;
            var id_pk = data[4];
            var analisa_id = data[5];
            var subcon_id = data[6];
            var upah_id = data[7];
            var paket_id = data[8];
            var kode_pekerjaan = data[11];
            var nama_pekerjaan = data[12];
            var volume_terpakai = parseFloat(data[10]);
            var volume_opname = parseFloat(data[9]);
            var volume_tersedia = Math.max(0, volume_opname - volume_terpakai);
            var satuan = data[13];

//            if (analisa_id != null) {
//                kode_pekerjaan = data[12];
//                nama_pekerjaan = data[13];
//                satuan = data[14];
//            } else if (upah_id != null) {
//                kode_pekerjaan = data[16];
//                nama_pekerjaan = data[17];
//                satuan = data[22];
//            } else if (paket_id != null) {
//                kode_pekerjaan = 'LSUOV';
//                nama_pekerjaan = data[20];
//                satuan = data[22];
//            }
            //volume_terpakai = parseFloat(data[23]);
            //volume_tersedia = Math.max(0, volume_opname - volume_terpakai);
            $('td', row).eq(0).html(kode_pekerjaan);
            $('td', row).eq(1).html(nama_pekerjaan);
            $('td', row).eq(2).html(volume_tersedia);
            $('td', row).eq(3).html(volume_opname);
            $('td', row).eq(4).html(satuan);
            var hidden_opname = '<input type="hidden" value="' + id_opname + '" name="id_opname"/>';
            var hidden_volume_max = '<input type="hidden" value="' + volume_tersedia + '" name="vol_max"/>';
            var hidden_id_pk = '<input type="hidden" value="' + id_pk + '" name="id_pk"/>';
            var hidden_id_analisa = '<input type="hidden" value="' + analisa_id + '" name="id_analisa"/>';
            var hidden_id_subcon = '<input type="hidden" value="' + subcon_id + '" name="id_subcon"/>';
            var hidden_id_upah = '<input type="hidden" value="' + upah_id + '" name="id_upah"/>';
            var hidden_id_paket = '<input type="hidden" value="' + paket_id + '" name="id_paket"/>';
            var hidden_max_vol = '<input type="hidden" value="' + volume_tersedia + '" name="volume_tersedia"/>';
            var tambahan = hidden_opname + hidden_volume_max + hidden_id_pk + hidden_id_analisa + hidden_id_subcon + hidden_id_upah + hidden_id_paket + hidden_max_vol;
            var kode_opname = data[3];
            if (volume_tersedia > 0)
                $('td', row).eq(5).html('<button class="btn btn-xs btn-success" onclick="addDetailOpname(this,\'' + kode_opname + '\'); return false;"><i class="fa fa-plus fa-fw"></i>Pilih</button>' + tambahan);
            else
                $('td', row).eq(5).html('');
            $(row).attr('id', 'item_' + id);
        }

    });
}
function addDetailOpname(elmn, kode_opname) {
    var my_td = elmn.parentNode.children;
    var tr = elmn.parentNode.parentNode;
    var td = tr.children;
    //console.log(tr);
    //console.log(td);
    //console.log(my_td);
    var row_id = my_td.id_opname.value + '_' + my_td.id_pk.value + '_' + my_td.id_analisa.value + '_' + my_td.id_subcon.value + '_' + my_td.id_upah.value + '_' + my_td.id_paket.value;
    console.log(row_id);
    if ($('#lpu_' + row_id).length == 0) {
        $('#tabel_list_detail_opname_body').append(
                '<tr id="lpu_' + row_id + '">'
                + '<td>' + kode_opname + '</td>'
                + '<td>' + td[0].innerHTML + '</td>'
                + '<td>' + td[1].innerHTML + '</td>'
                + '<td><input type="text" value="' + td[2].innerHTML + '" class="form-control" name="volume_lpu[]" placeholder="tersedia ' + my_td.volume_tersedia.value + '" max_vol="' + my_td.volume_tersedia.value + '" onchange="vol_changed(this)" style="width:100px"/></td>'
                + '<td>' + my_td.volume_tersedia.value + '</td>'
                + '<td>' + td[3].innerHTML + '</td>'
                + '<td>' + td[4].innerHTML + '</td>'
                + '<!--<td>' + hitung_progress(parseFloat(td[3].innerHTML) - parseFloat(my_td.volume_tersedia.value) + parseFloat(td[2].innerHTML), parseFloat(td[3].innerHTML)) + '</td>-->'
                //+ '<td><input type="text" class="form-control" name="harga_satuan[]" value="' + my_td.harga_satuan.value + '" style="display:none"/>' + parseFloat(my_td.harga_satuan.value).formatMoney() + '</td>'
                //+ '<td>' + (parseFloat(my_td.harga_satuan.value) * parseFloat(td[2].innerHTML)).formatMoney() + '</td>'
                + "<td><button class='btn btn-xs btn-danger' onclick='hapus(this); return false;'><i class='fa fa-minus fa-fw'></i> Hapus</button>"
                + '<input type="hidden" name="id_opname[]" value="' + my_td.id_opname.value + '"/>'
                + '<input type="hidden" name="id_PK[]" value="' + my_td.id_pk.value + '"/>'
                + '<input type="hidden" name="id_analisa[]" value="' + my_td.id_analisa.value + '"/>'
                + '<input type="hidden" name="id_subcon[]" value="' + my_td.id_subcon.value + '"/>'
                + '<input type="hidden" name="id_upah[]" value="' + my_td.id_upah.value + '"/>'
                + '<input type="hidden" name="id_paket[]" value="' + my_td.id_paket.value + '"/>'
                + "</td>" +
                +'</tr>'
                );
        //lock_input(true);
        $('.saveForm').show('slow');
    }
}
function save(f) {
    f = parseFloat(f);
    f++;
    $('#flag_save').val(f);
    $('#formPP').submit();
}
function vol_changed(elmn) {
    console.log('vol changed');
    var tr = elmn.parentNode.parentNode;
    var max_vol = parseFloat(elmn.getAttribute('max_vol'));
    var td = tr.children;
    //console.log(td);
    //var harga_satuan = parseFloat(td[8].children[0].value);
    //console.log(harga_satuan);
    var vol = parseFloat(elmn.value);
    if (vol <= 0) {
        alert('Volume LPU tidak dapat diisi nol');
        vol = max_vol;
    }
    if (vol > max_vol) {
        alert('Volume LPU tidak dapat melebihi dari jumlah volume yang tersedia');
        vol = max_vol;
    }
    elmn.value = vol;
    //td[9].innerHTML = (vol * harga_satuan).formatMoney();
    //td[7].innerHTML = hitung_progress(parseFloat(td[5].innerHTML) - max_vol + vol, parseFloat(td[5].innerHTML));
}
function hitung_progress(a, b) {
    console.log('hitung progress');
    var persen = (100 * a / b);
    console.log(persen);
    var persens = persen + '';
    var posisi_koma = persens.indexOf(".");
    var panjang_string = persens.length;
    if (posisi_koma < panjang_string - 3) {
        persens = persens.substr(0, posisi_koma + 3);
    }
    return persens + '%';
}
function hapus(elmn) {
    var tbody = elmn.parentNode.parentNode.parentNode;
    elmn.parentNode.parentNode.remove();
    if (tbody.children.length == 0) {
        lock_input(false);
        $('.saveForm').hide('medium');
    }
}
function lock_input(val) {
    if (val == true) {
        $('#selected_main_project').val($('#select_main_project option:selected').text());
        $('#selected_project').val($('#select_project option:selected').text());
        $('#selected_rab').val($('#select_rab option:selected').text());
        $('#select_main_project').hide('slow');
        $('#select_project').hide('slow');
        $('#select_rab').hide('slow');
        $('#selected_main_project').show('slow');
        $('#selected_project').show('slow');
        $('#selected_rab').show('slow');
    } else {
        $('#select_main_project').show('slow');
        $('#select_project').show('slow');
        $('#select_rab').show('slow');
        $('#selected_main_project').hide('slow');
        $('#selected_project').hide('slow');
        $('#selected_rab').hide('slow');
    }
}
function reqDataDropdown(d) {
    $('#' + d.target_element).parent().parent().append('<img class="snake_loader" src="' + base_url1 + '/assets/default/img/snake_loader.gif" width="20">');
    $('#' + d.target_element).html('<option selected="" disabled="" value="0">' + d.initial_text + '</option>');
    $.ajax({
        type: "get",
        url: base_url + '/' + d.url,
        data: d.param,
        success: function (data) {
            var val = JSON.parse(data);
            if (val.length > 0) {
                var j2 = d.ret_array.length;
                for (var i = 0, l = val.length; i < l; i++) {
                    var v = val[i];
                    var id = v[d.ret_array[0]];
                    var teks = '';
                    for (var j = 1; j < j2; j++) {
                        teks += v[d.ret_array[j]] + ' ';
                    }
                    $('#' + d.target_element).append('<option value="' + id + '">' + teks + '</option>');
                }
            }
            $('.snake_loader').remove();
        }
        , error: function (xhr, ajaxOptions, thrownError) {
            $('.snake_loader').remove();
        }
    });
}
function reset_rab() {
    $('#select_rab').html('<option selected="" disabled="" value="0">Pilih RAB</option>');
    $('#button_pilih_opname').fadeOut();
    reset_opname();
}
function reset_opname() {
    $('#select_opname').html('<option selected="" disabled="" value="0">Pilih Opname</option>');
    $('#tabel_list_detail_opname_body').html('');
}