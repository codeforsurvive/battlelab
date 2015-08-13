$(document).ready(function () {
    console.log('inisialisasi');
    document.getElementsByClassName('has_sub')[1].setAttribute('class', 'has_sub open');
    //$(".addBtn").hide();
    $(".saveForm").hide();
    $(".nextBtn").hide();
    $('#KATEGORI_OP_ID').on('change', function () {
        $('#divTabelDetailPK').hide();
        reset_detail_opname();
    });
    $('#modal_edit_volume_opname').on('change', function () {
        console.log('volume opname berubah');
        opname_diedit();
    });
    $('#modal_edit_harga_satuan_baru').on('change', function () {
        console.log('harga satuan volume opname berubah');
        opname_diedit();
    });
    $('#MAIN_PROJECT_ID').on('change', function () {
        getListProject();
    });
    $('#PROJECT_ID').on('change', function () {
        getListRAB();
    });
    $('#RAB_ID').on('change', function () {
        RABChanged();
    });
    $('#select_kategori_pajak').on('change', function () {
        pajak_berubah();
    });
    $('#select_pajak').on('change', function () {
        pajak_berubah();
    });
});
function pajak_berubah() {
    var tbody = document.getElementById('tabel_list_pekerjaan_opname_body');
    var list_tr = tbody.children;
    var kategori_pajak = parseInt(document.getElementById('select_kategori_pajak').value);
    var id_pajak = parseInt(document.getElementById('select_pajak').value);
    var value_pajak = parseFloat(document.getElementById('id_pajak_' + id_pajak).value);
    for (var i = 0, i2 = list_tr.length; i < i2; i++) {
        var tr = list_tr[i];
        var td = tr.children;
        var harga_satuan = parseFloat(td[8].children[2].value);
        var volume_opname = parseFloat(td[8].children[3].value);
        switch (kategori_pajak) {
            case 1:
                var harga_net = harga_satuan * volume_opname;
                //var harga_pajak=harga_net*value_pajak/100;
                //var harga_total=harga_net+harga_pajak;
                td[7].innerHTML = harga_net.formatMoney();
                break;
            case 2:
                var harga_net = harga_satuan * volume_opname;
                var harga_pajak = harga_net * value_pajak / 100;
                var harga_total = harga_net + harga_pajak;
                td[7].innerHTML = harga_total.formatMoney();
                break;
            case 3:
                var harga_net = harga_satuan * volume_opname;
                //var harga_pajak=harga_net*value_pajak/100;
                //var harga_total=harga_net+harga_pajak;
                td[7].innerHTML = harga_net.formatMoney();
                break;
        }
    }
}
function edit_op(row_id) {
    console.log('edit detil opname');
    $('#modalEdit').modal();
    var tr = document.getElementById('row_opname_' + row_id);
    console.log('tr');
    console.log(tr);
    var td = tr.children;
    console.log('td');
    console.log(td);
    document.getElementById('row_id_detail_opname').value = row_id;
    var harga_satuan_asli = parseFloat(document.getElementById('harga_satuan_asli_' + row_id).value);
    var harga_satuan_baru = parseFloat(document.getElementById('harga_satuan_baru_' + row_id).value);
    var volume_opname = parseFloat(td[2].innerHTML);
    var pk = document.getElementById('list_id_pk_' + document.getElementById('id_pk_' + row_id).value);
    if (pk != null)
        document.getElementById('modal_edit_kode_pk').value = pk.value;
    document.getElementById('modal_edit_kode_analisa').value = td[0].innerHTML;
    document.getElementById('modal_edit_nama_pekerjaan').value = td[1].innerHTML;
    document.getElementById('modal_edit_volume_opname').value = volume_opname;
    document.getElementById('modal_edit_volume_pk').value = td[3].innerHTML;
    document.getElementById('modal_edit_volume_tersedia').value = td[4].innerHTML;
    document.getElementById('modal_edit_satuan_pekerjaan').value = td[5].innerHTML;
    document.getElementById('modal_edit_harga_satuan_baru').value = harga_satuan_baru;
    document.getElementById('modal_edit_harga_satuan_asli').value = harga_satuan_asli;
    document.getElementById('modal_edit_pajak_rupiah').value = 0;
    document.getElementById('modal_edit_harga_net').value = 0;

    hitung_harga_opname();
    return false;
}
function hitung_harga_opname() {
    console.log('hitung harga detail opname');
    var value_pajak = parseFloat(document.getElementById('id_pajak_' + document.getElementById('select_pajak').value).value);
    var volume_opname = parseFloat(document.getElementById('modal_edit_volume_opname').value);
    var harga_satuan_baru = parseFloat(document.getElementById('modal_edit_harga_satuan_baru').value);
    var kategori_pajak = parseInt(document.getElementById('select_kategori_pajak').value);
    console.log('menghitung pajak, dengan kategori ' + kategori_pajak);
    switch (kategori_pajak) {
        case 1:
            console.log('menghitung pajak include');
            var harga_total = harga_satuan_baru * volume_opname;
            document.getElementById('modal_edit_harga_final').value = harga_total;
            var harga_pajak = value_pajak * harga_total / (100 + value_pajak);
            var harga_pajak_string = harga_pajak + '';
            var posisi_koma = harga_pajak_string.indexOf('.');
            var panjang_string = harga_pajak_string.length;
            if (posisi_koma < panjang_string - 3) {
                document.getElementById('modal_edit_pajak_rupiah').value = harga_pajak.toFixed(2);
                document.getElementById('modal_edit_harga_net').value = (harga_total - harga_pajak).toFixed(2);
            } else {
                document.getElementById('modal_edit_pajak_rupiah').value = harga_pajak;
                document.getElementById('modal_edit_harga_net').value = harga_total - harga_pajak;
            }
            break;
        case 2:
            console.log('menghitung pajak exclude');
            var harga_net = harga_satuan_baru * volume_opname;
            document.getElementById('modal_edit_harga_net').value = harga_net;
            var harga_pajak = value_pajak * harga_net / 100;
            var harga_pajak_string = harga_pajak + '';
            var posisi_koma = harga_pajak_string.indexOf('.');
            var panjang_string = harga_pajak_string.length;
            if (posisi_koma < panjang_string - 3) {
                document.getElementById('modal_edit_pajak_rupiah').value = harga_pajak.toFixed(2);
                document.getElementById('modal_edit_harga_final').value = (harga_net + harga_pajak).toFixed(2);
            } else {
                document.getElementById('modal_edit_pajak_rupiah').value = harga_pajak;
                document.getElementById('modal_edit_harga_final').value = harga_net + harga_pajak;
            }
            break;
        case 3:
            console.log('no pajak');
            var harga_net = harga_satuan_baru * volume_opname;
            document.getElementById('modal_edit_harga_net').value = harga_net;
            document.getElementById('modal_edit_pajak_rupiah').value = 0;
            document.getElementById('modal_edit_harga_final').value = harga_net;
            break;
    }
}
function opname_diedit() {
    console.log('opname telah diedit,');
    //check volume
    var max_vol = parseFloat(document.getElementById('modal_edit_volume_tersedia').value);
    var my_vol = parseFloat(document.getElementById('modal_edit_volume_opname').value);
    if (my_vol > max_vol) {
        alert('Volume opname tidak boleh melebihi jumlah volume yang tersedia');
        document.getElementById('modal_edit_volume_opname').value = max_vol;
    }
    if (my_vol < 0) {
        alert('Volume opname tidak boleh nol');
        document.getElementById('modal_edit_volume_opname').value = max_vol;
    }
    //check harga
    var harga_asli = parseFloat(document.getElementById('modal_edit_harga_satuan_asli').value);
    var harga_max = harga_asli + (10 * harga_asli / 100);
    var harga_min = harga_asli - (10 * harga_asli / 100);
    var my_harga = parseFloat(document.getElementById('modal_edit_harga_satuan_baru').value);
    if (my_harga > harga_max) {
        alert('Perubahan harga satuan tidak boleh lebih dari 10% dari harga semula');
        document.getElementById('modal_edit_harga_satuan_baru').value = harga_max;
    }
    /*if(my_harga<harga_min){
     alert('Perubahan harga satuan tidak boleh lebih dari 10% dari harga semula');
     document.getElementById('modal_edit_harga_satuan_baru').value=harga_min;
     }*/
    hitung_harga_opname();
}
function simpan_perubahan_detail_opname() {
    console.log('simpan perubahan detail opname');
    var row_id = document.getElementById('row_id_detail_opname').value;
    var td = document.getElementById('row_opname_' + row_id).children;
    td[2].innerHTML = document.getElementById('modal_edit_volume_opname').value;
    td[6].innerHTML = parseFloat(document.getElementById('modal_edit_harga_satuan_baru').value).formatMoney();
    document.getElementById('harga_satuan_baru_' + row_id).value = document.getElementById('modal_edit_harga_satuan_baru').value;
    document.getElementById('volume_opname_' + row_id).value = document.getElementById('modal_edit_volume_opname').value;
    //td[7].innerHTML = (parseFloat(document.getElementById('modal_edit_volume_opname').value) * parseFloat(document.getElementById('modal_edit_harga_satuan_baru').value)).formatMoney();
    td[7].innerHTML = parseFloat(document.getElementById('modal_edit_harga_final').value).formatMoney();

}
var oldMainProjectId = '',
        oldProjectId = '',
        oldRABId = '',
        oldKategoriPPId = '',
        dataTableListPK = null;
function changePK() {
    console.log('PK changed');
    var pk_id = $('#select_pk').val();
    if (dataTableListPK !== null) {
        dataTableListPK.fnDestroy();
        $("#tabel_detail_pk_body").html('');
    }
    $('#divTabelDetailPK').show();
    dataTableListPK = $("#tabel_detail_pk").dataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            'method': 'post',
            'data': {
                PK_ID: pk_id,
                id_opname: $('#id_opname').val()
            },
            "url": base_url + "/getDetailPKDataTable",
            "dataSrc": function (json) {
                console.log(json);
                jsonData = json.data;
                return jsonData;
            }
        },
        "createdRow": function (row, data, index) {
            //var id = data[5] + '_' + data[6];
            //flag[id] = 0;
            //alert(data[6]);
            /*var harga_satuan = parseFloat(data[5]);
             var volume = parseFloat(data[2]);
             var volume_tersedia = parseFloat(data[2]) - parseFloat(data[3]);
             $('td', row).eq(3).html(volume_tersedia);
             $('td', row).eq(5).html(harga_satuan.formatMoney(2, ',', '.'));
             $('td', row).eq(6).html((volume_tersedia * harga_satuan).formatMoney(2, ',', '.'));
             if (volume_tersedia > 0)
             $('td', row).eq(7).html('<button class="btn btn-xs btn-success" onclick="tambahPekerjaanOpname({kode_analisa:\'' + data[0] + '\',nama_pekerjaan:\'' + data[1] + '\',volume_pk:\'' + data[2] + '\',volume_pk_terpakai:\'' + data[3] + '\',satuan_nama:\'' + data[4] + '\',harga_satuan:\'' + data[5] + '\',id_pk:\'' + data[6] + '\',id_analisa:\'' + data[7] + '\',id_detail_analisa:\'' + data[8] + '\',volume_opname:\'' + volume_tersedia + '\',harga_satuan_opname:\'' + data[5] + '\'});"><i class="fa fa-plus fa-fw"></i>Pilih</button>');
             else
             $('td', row).eq(7).html("");
             */

//            var jenis_pk = parseInt(data[2]);
//            var kode_pekerjaan = '', nama_pekerjaan = '', volume_pk = 0, volume_pk_terpakai = 0, volume_pk_tersedia = 0, satuan = '', harga_satuan = 0, subtotal = 0;
//            volume_pk = parseFloat(data[5]);
//            var id_ov = parseFloat(data[13]);
//            if (jenis_pk == 1) {//overhead
//                console.log('pk overhead');
//                satuan = data[18];
//                volume_pk_terpakai = parseFloat(data[20]);
//                harga_satuan = parseFloat(data[12]);
//                if (parseInt(data[13]) > 0) {//upah
//                    kode_pekerjaan = data[14];
//                    nama_pekerjaan = data[15];
//                    id_ov = parseFloat(data[13]);
//                } else if (parseInt(data[16]) > 0) {//paket
//                    kode_pekerjaan = 'LSUOV';
//                    nama_pekerjaan = data[17];
//                    id_ov = parseFloat(data[16]);
//                }
//            } else if (jenis_pk == 2) {//upah
//                kode_pekerjaan = data[7];
//                nama_pekerjaan = data[8];
//                volume_pk = parseFloat(data[5]);
//                volume_pk_terpakai = parseFloat(data[19]);
//                satuan = data[6];
//                harga_satuan = parseFloat(data[9]);
//            }
//            volume_pk_tersedia = volume_pk - volume_pk_terpakai;
//            subtotal = volume_pk_tersedia * harga_satuan;
            var kode_pekerjaan = data[6];
            var nama_pekerjaan = data[7];
            var volume_pk = parseFloat(data[5]);
            var volume_terpakai = parseFloat(data[10]);
            ;
            var volume_pk_tersedia = volume_pk - volume_terpakai;
            var satuan = to_string(data[8]);
            var harga_satuan = parseFloat(data[9]);
            var subtotal = harga_satuan * volume_pk_tersedia;
            $('td', row).eq(0).html(kode_pekerjaan);
            $('td', row).eq(1).html(nama_pekerjaan);
            $('td', row).eq(2).html(volume_pk);
            $('td', row).eq(3).html(volume_pk_tersedia);
            $('td', row).eq(4).html(satuan);
            $('td', row).eq(5).html(harga_satuan.formatMoney());
            $('td', row).eq(6).html(subtotal.formatMoney());
            var id_analisa = data[1];
            var id_subcon = data[2];
            var id_upah = data[3];
            var id_paket = data[4];
            if (volume_pk_tersedia > 0) {
                $('td', row).eq(7).html('<button class="btn btn-xs btn-success" onclick="tambahPekerjaanOpname({kode_analisa:\'' + kode_pekerjaan + '\',nama_pekerjaan:\'' + nama_pekerjaan + '\',volume_pk:\'' + volume_pk + '\',volume_pk_terpakai:\'' + volume_terpakai + '\',satuan_nama:\'' + satuan + '\',harga_satuan:\'' + harga_satuan + '\',id_pk:\'' + data[0] + '\',id_analisa:\'' + id_analisa + '\',id_subcon:\'' + id_subcon + '\',id_upah:\'' + id_upah + '\',id_paket:\'' + id_paket + '\',volume_opname:\'' + volume_pk_tersedia + '\',harga_satuan_opname:\'' + harga_satuan + '\'});"><i class="fa fa-plus fa-fw"></i>Pilih</button>');
            } else {
                $('td', row).eq(7).html('');
            }
            $(row).attr('id', 'pk_' + index)
        }
    });
}
function to_string(v) {
    if (v == null)
        return '';
    return v+'';
}
function tambahPekerjaanOpname(v) {
    console.log('tambahkan PK ke detail opname');
    console.log(v);
    var row_id = v.id_pk + '_' + v.id_analisa + '_' + v.subcon + '_' + v.id_upah + '_' + v.id_paket;
    if ($('#row_opname_' + row_id).length == 0) {
        $('.saveForm').show('slow');
        var volume_tersedia = parseFloat(v.volume_pk) - parseFloat(v.volume_pk_terpakai);
        var sub_total_harga = parseFloat(v.volume_opname) * parseFloat(v.harga_satuan);
        var id_kategori_pajak = parseInt($('#select_kategori_pajak').val());
        if (id_kategori_pajak == 2) {
            var id_pajak = parseInt($('#select_pajak').val());
            var value_pajak = parseFloat($('#id_pajak_' + id_pajak).val());
            sub_total_harga = sub_total_harga + (value_pajak * sub_total_harga / 100);
        }
        $('#tabel_list_pekerjaan_opname_body').append(
                '<tr id="row_opname_' + row_id + '">'
                + '<td>' + v.kode_analisa + '</td>'
                + '<td>' + v.nama_pekerjaan + '</td>'
                + '<td>' + v.volume_opname + '</td>'
                + '<td>' + v.volume_pk + '</td>'
                + '<td>' + volume_tersedia + '</td>'
                + '<td>' + v.satuan_nama + '</td>'
                + '<td>' + parseFloat(v.harga_satuan).formatMoney() + '</td>'
                + '<td>' + sub_total_harga.formatMoney() + '</td>'
                + '<td>'
                + '<button class="btn btn-xs btn-success" onclick="return edit_op(\'' + row_id + '\'); return false;"><i class="fa fa-plus fa-fw"></i> Edit</button><button class="btn btn-xs btn-danger" onclick="return dialogHapus(\'' + row_id + '\'); return false;"><i class="fa fa-minus fa-fw"></i> Hapus</button>'
                + '<input type="hidden" id="harga_satuan_baru_' + row_id + '" value="' + v.harga_satuan_opname + '" name="harga_satuan_opname[]"/>'
                + '<input type="hidden" id="volume_opname_' + row_id + '" value="' + v.volume_opname + '" name="volume_opname[]"/>'
                + '<input type="hidden" id="harga_satuan_asli_' + row_id + '" value="' + v.harga_satuan + '"/>'
                + '<input type="hidden" id="id_pk_' + row_id + '" name="id_pk[]" value="' + v.id_pk + '"/>'
                + '<input type="hidden" name="id_analisa[]" value="' + v.id_analisa + '"/>'
                + '<input type="hidden" name="id_subcon[]" value="' + v.id_subcon + '"/>'
                + '<input type="hidden" name="id_upah[]" value="' + v.id_upah + '"/>'
                + '<input type="hidden" name="id_paket[]" value="' + v.id_paket + '"/>'

                + '</td>'
                + '</tr>'
                );
    }
}
function tambahPK(show_modal) {
    console.log('tambah pk, untuk dipilih dan ditambahkan ke detail opname');
    var s1 = ($('#MAIN_PROJECT_ID').val() === '0' || $('#MAIN_PROJECT_ID').val() == null);
    var s2 = ($('#PROJECT_ID').val() === '0' || $('#PROJECT_ID').val() === null);
    var s3 = ($('#RAB_ID').val() === '0' || $('#RAB_ID').val() === null);
    var s4 = ($('#KATEGORI_PP_ID').val() === '0' || $('#KATEGORI_PP_ID').val() === null);
    if (Boolean(s1 || s2 || s3 || s4)) {
        alert('Data isian belum lengkap');
        return;
    }
    if (show_modal == true)
        $('#modalPilihan').modal('show');
    $('#select_pk').click();
    var needRefresh = false;
    var mainProjectId = $('#MAIN_PROJECT_ID').val();
    var projectId = $('#PROJECT_ID').val();
    var RABId = $('#RAB_ID').val();
    var kategoriPPId = $('#KATEGORI_OP_ID').val();
    needRefresh = (mainProjectId !== oldMainProjectId) || (projectId !== oldProjectId) || (RABId !== oldRABId) || (kategoriPPId !== oldKategoriPPId);
    if (needRefresh) {
        oldKategoriPPId = kategoriPPId;
        oldMainProjectId = mainProjectId;
        oldProjectId = projectId;
        oldRABId = RABId;
        $('#select_pk').parent().parent().append('<img class="snake_loader" src="' + base_url1 + '/assets/default/img/snake_loader.gif" width="20">');
        $('#divTabelDetailPK').hide();
        $('#select_pk').html('<option value="0" disabled selected> -- pilih PK -- </option>');
        $.ajax({
            type: "POST",
            url: base_url + "/getListPK",
            data: {
                mainProjectId: mainProjectId,
                projectId: projectId,
                RABId: RABId,
                kategoriPKId: kategoriPPId
            },
            success: function (data) {
                //alert(data);
                var val = JSON.parse(data);
                if (val.length > 0) {
                    for (var i = 0; i < val.length; i++) {
                        var pk = val[i];
                        $('#select_pk').append(
                                '<option value="' + pk['PERMINTAAN_PEKERJAAN_ID'] + '" >' + pk['PERMINTAAN_PEKERJAAN_KODE'] + '</option>'
                                );
                        if ($('#list_id_pk_' + pk['PERMINTAAN_PEKERJAAN_ID']).length == 0) {
                            $('#select_pk').parent().append('<input type="hidden" id="list_id_pk_' + pk['PERMINTAAN_PEKERJAAN_ID'] + '" value="' + pk['PERMINTAAN_PEKERJAAN_KODE'] + '"/>');
                        }
                    }
                }
                else {
                }
                $('.snake_loader').remove();
            },
            error: function (xhr, ajaxOptions, thrownError) {
                $('.snake_loader').remove();
            }
        });
    }
}

function getListProject() {
    console.log('get list project');
    reset_detail_opname();
    var MAIN_PROJECT_ID = $("#MAIN_PROJECT_ID").val();
    //$('<img class="loading_muter" src="<?= base_url() . 'assets/default/img/bar_loader.gif' ?>">').insertAfter('#MAIN_PROJECT_ID');
    $('#PROJECT_ID').parent().parent().append('<img class="snake_loader" src="' + base_url1 + '/assets/default/img/snake_loader.gif" width="20">');
    $.ajax({
        type: "POST",
        url: base_url + "/getCurrentProjects",
        data: {MAIN_PROJECT_ID: MAIN_PROJECT_ID},
        success: function (data) {
            //alert(data);
            var val = JSON.parse(data);
            $('#PROJECT_ID').html('<option value="0" disabled selected> -- pilih sub project -- </option>');
            $('#RAB_ID').html('<option value="0" disabled selected> -- pilih RAB -- </option>');
            if (val.length > 0) {

                $(".addBtn").hide();
                for (var i = 0; i < val.length; i++) {
                    $('#PROJECT_ID').append(
                            '<option value="' + val[i].PROJECT_ID + '" >' + val[i].PROJECT_KODE + ' | ' + val[i].PROJECT_NAMA + '</option>'
                            );
                }
            }
            else {
                //alert("Sub Project Tidak Ada");
            }
            $('.snake_loader').remove();
        }
        , error: function (xhr, ajaxOptions, thrownError) {
            $('.snake_loader').remove();
        }
    });
}
function reset_detail_opname() {
    console.log('reset detail opname');
    $('#tabel_list_pekerjaan_opname_body').html('');
    $('.saveForm').hide('slow');
}
function getListRAB() {
    console.log('get list rab');
    reset_detail_opname();
    var PROJECT_ID = $("#PROJECT_ID").val();
    $('#RAB_ID').parent().parent().append('<img class="snake_loader" src="' + base_url1 + '/assets/default/img/snake_loader.gif" width="20">');
    $('#RAB_ID').html('<option value="0" disabled selected> -- pilih rap -- </option>');
    $.ajax({
        type: "POST",
        url: base_url + "/getCurrentRab",
        data: {PROJECT_ID: PROJECT_ID},
        success: function (data) {
            var val = JSON.parse(data);
            if (val.length > 0) {
                $(".addBtn").hide();
                for (var i = 0; i < val.length; i++) {
                    $('#RAB_ID').append(
                            '<option value="' + val[i].RAB_ID + '">' + val[i].RAB_KODE + ' | ' + val[i].RAB_NAMA + '</option>'
                            );
                }
            }
            else {
            }
            $('.snake_loader').remove();
        }
        , error: function (xhr, ajaxOptions, thrownError) {
            $('.snake_loader').remove();
        }
    });
}
function RABChanged() {
    console.log('rab changed');
    reset_detail_opname();
    $(".addBtn").show();
    $('#divTabelDetailPK').hide();
}
var flag = [];
var flagSubcon = [];
//var flagOverhead = [];



function modalAddRap() {
    console.log('show modal pilih PK');
    $('#modalPilihan').modal('show');
}

function onChange(id)
{
    $("#validateCheckBox").removeProp("checked");
    //alert('onchange : ' + value);
    var value = $("#BARANG_VOLUME_" + id).val();
    var allowed = $("#BARANG_SISA_" + id).text();
    var total = $("#BARANG_SISA_ORIGINAL_" + id).val();
    //alert('Total: ' + total);
    if (!isNaN(value)) {
        var num = Number(value);
        //alert('onchange : ' + num);
        if (num > 0) {
            if (num > Number(total)) {
                alert("Sisa material tidak mencukupi!");
                return;
            }
            var cost = Number(accounting.unformat($("#BARANG_HARGA_" + id).text(), ","));
            var sub = cost * num;
            var result = Number(total) - num;
            //alert('Result : ' + result);
            $("." + id + "_sub").html(accounting.formatMoney(Number(sub), "Rp. ", 2, ".", ","));
            $("#" + id + "_inpVolume").val(num);
            $("#BARANG_SISA_" + id).html(result);
            $("." + id + "_jml").val(num);
            $("#grandTotal").text(accounting.formatMoney(calculateGrandTotal(), "Rp. ", 2, ".", ","));
            $(".saveForm").show();
            //$("#grandTotalForm").val(calculateGrandTotal());
        }
        else
            $(".saveForm").hide();
    }
    else
        $(".saveForm").hide();
}
function calculateGrandTotal() {
    var subselement = document.getElementsByClassName("subtotal_data");
    grandTotal = 0;
    for (i = 0; i < subselement.length; i++) {
        grandTotal += Number(accounting.unformat(subselement[i].innerHTML, ","));
    }
    $("#grandTotalForm").val(grandTotal);
    return grandTotal;
}
var grandTotal = 0;


function harga_mouseover(elm) {
    return;
    var anak = elm.children;
    anak[0].style.display = '';
    anak[0].focus();
    anak[1].style.display = 'none';
    anak[2].style.display = 'none';
}
function harga_mouseout(elm, row_id) {
    return;
    var anak = elm.children;
    anak[0].style.display = 'none';
    anak[2].remove();
    anak[1].remove();
    $('#' + elm.id).append(parseFloat(anak[0].value).formatMoney(2, ',', '.'));
    $('#row_volume_' + row_id).attr('hargasatuan', anak[0].value);
    volumeChanged(row_id);
}
function volumeChanged(row_id) {
    //var elm = $('#row_volume_' + row_id);
    var elm = document.getElementById('row_volume_' + row_id);
    var nilai = parseFloat(elm.value);
    var max = parseFloat(elm.getAttribute('max'));
    var hargaSatuan = parseFloat(elm.getAttribute('hargasatuan'));
    //console.log("nilai = " + nilai);
    //console.log("max= " + max);
    //console.log("harga satuan = " + hargaSatuan);
    if (nilai < 0) {
        alert('Volume tidak boleh kurang dari 0');
        elm.value = 0;
        document.getElementById('row_harga_' + row_id).innerHTML = 'Rp. 0.00';
        document.getElementById('harga_total_' + row_id).value = '0';
    } else if (nilai > max) {
        alert('Volume tidak boleh melebihi jumlah maksimal (' + max + ')');
        elm.value = max;
        document.getElementById('row_harga_' + row_id).innerHTML = (max * hargaSatuan).formatMoney(2, ',', '.');
        document.getElementById('harga_total_' + row_id).value = max * hargaSatuan;
    } else {
        document.getElementById('row_harga_' + row_id).innerHTML = (elm.value * hargaSatuan).formatMoney(2, ',', '.');
        document.getElementById('harga_total_' + row_id).value = elm.value * hargaSatuan;
    }
}

function editBarang(BARANG_ID, BARANG_NAMA, SATUAN_NAMA, BARANG_HARGA, BARANG_VOLUME) {
    var VOLUME = $("." + BARANG_ID + "_jml").val();
    $('#VOLUME').attr('min', 0);
    $('#VOLUME').attr('max', BARANG_VOLUME);
    $('#BARANG_ID').val(BARANG_ID);
    $('#BARANG_NAMA').val(BARANG_NAMA);
    $('#VOLUME').val(Number(VOLUME));
    $('#SATUAN_NAMA').val(SATUAN_NAMA);
    $('#BARANG_HARGA').val(BARANG_HARGA);
    var SUBTOTAL = $("." + BARANG_ID + "_sub").text();
    $('#SUBTOTAL').val(SUBTOTAL);
    $('#modalEdit').modal('show');
}

function saveBarang(BARANG_ID, VOLUME, SUBTOTAL) {
    var vol = parseInt(VOLUME);
    var sub = parseInt(SUBTOTAL);
    $("." + BARANG_ID + "_jml").val(vol);
    $("." + BARANG_ID + "_sub").html(sub);
    $("#" + BARANG_ID + "_inpVolume").val(vol);
}

function calculate(BARANG_HARGA, VOLUME) {
    var max = $('#VOLUME').attr('max');
    var vol = parseInt(VOLUME);
    var harga = parseInt(BARANG_HARGA);
    if (max < vol) {
        $('#VOLUME').val(0);
        $('#SUBTOTAL').val(0);
    }
    else if (max >= VOLUME) {
        $('#SUBTOTAL').val(harga * vol);
    }
}

function validate(id) {
    var id = $(id + " option:selected").id;
    var value = $(id + " option:selected").val();
    console.log('select value ' + $id + ' : ' + value);
    if (Number(value) === 0) {
        return false;
    }
    return true;
}

function isPositiveNumber(id) {
    var value = $("#" + id).val();
    console.log(id + ": " + value);
    if (isNaN(value))
        return false;
    if (Number(value) > 0)
        return true;
    return false;
}

function save(param) {
    console.log('save and submit to server');
    //alert(flag);
//        var volumeList = document.getElementsByClassName("volumeSelector");
//        console.log(volumeList);
//        console.log("VolumeSelector element: " + volumeList.length);
//        var state = true;
//        for (i = 0; i < volumeList.length; i++) {
//            var res = isPositiveNumber(volumeList[i].id);
//            console.log("res : " + res);
//            state = (state && res);
//            console.log("state : " + state);
//        }
//        console.log("state : " + state)
//
//        if (state) {
    var listHarga = document.getElementsByClassName('harga_total');
    var harga = 0;
    for (var i = 0, j = listHarga.length; i < j; i++) {
        //console.log(listHarga[i].value);
        harga += parseFloat(listHarga[i].value);
    }
    $('#grandTotalForm').val(harga);
    $('#flag_save').val(parseInt(param));
    $('#formPP').submit();
}

function dialogHapus(row_id) {
    console.log('dialog hapus');
    if (halaman_edit == false) {
        deletePekerjaan(row_id);
        return;
    }
    var row = $('#row_opname_' + row_id).children();
    $(".namaBarangHapus").text("Anda yakin untuk menghapus " + row[0].innerHTML + " | " + row[1].innerHTML + " ini?")
    $("#deleteModal").modal();
    $('#deleteModalYesButton').attr('onclick', 'deletePekerjaan("' + row_id + '");');
    return false;
}

function deletePekerjaan(row_id) {
    console.log('delete pekerjaan dari detail opname');
    $("#div_pk_" + row_id).remove();
    $("#row_opname_" + row_id).remove();
    $("#deleteModal").modal("hide");
    if ($('#tabel_list_pekerjaan_opname_body').children().length == 0) {
        $('.saveForm').hide('slow');
    }
}
