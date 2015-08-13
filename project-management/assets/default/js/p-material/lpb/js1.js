$(document).ready(function () {
    document.getElementsByClassName('has_sub')[2].setAttribute('class', 'has_sub open');
    $('#LPB_TANGGAL').datepicker({
        dateFormat: 'dd-mm-yy'
    });
    $(".addBtn").hide();
    $(".saveForm").hide();
    $('#select_main_project').on('change', function () {
        resetSelectRAB();
        reqData({target_element: 'select_project', url: base_url + '/getListSubProject', param: {'id_gudang': $('#select_gudang').val(), 'idMainProject': this.value, 'id_supplier': $('#select_supplier').val()}, ret_array: ['PROJECT_ID', 'PROJECT_KODE', 'PROJECT_NAMA'], initial_text: 'Pilih Project'});
        $('#tabel_lpb_body').html('');
    });
    $('#select_project').on('change', function () {
        $('#tabel_lpb_body').html('');
        resetSelectPO();
        reqData({target_element: 'select_rab', url: base_url + '/getListRAB', param: {'idProject': this.value, 'id_gudang': $('#select_gudang').val(), 'id_supplier': $('#select_supplier').val()}, ret_array: ['RAB_ID', 'RAB_KODE', 'RAB_NAMA'], initial_text: 'Pilih RAB'});
    });
    $('#select_rab').on('change', function () {
        $('#tabel_lpb_body').html('');
        console.log('rab changed');
        //resetSelectPO();
        reqData({target_element: 'select_po', url: base_url + '/getListPO', param: {'idRAB': this.value, 'id_gudang': $('#select_gudang').val(), 'id_supplier': $('#select_supplier').val()}, ret_array: ['PURCHASE_ORDER_ID', 'PURCHASE_ORDER_KODE'], initial_text: 'Pilih PO'});
    });
    $('#select_po').on('change', function () {
        console.log('po changed');
        changePO();
    });
    $('#select_gudang').on('change', function () {
        reset_detail_lpb();
        //$('#select_main_project').html('');
        reset_main_project();
        //reqData({target_element: 'select_supplier', url: base_url + '/get_list_supplier', param: {'id_gudang': this.value}, ret_array: ['SUPPLIER_ID', 'SUPPLIER_KODE', 'SUPPLIER_NAMA', 'SUPPLIER_ALAMAT'], initial_text: 'Pilih Supplier'});
    });
    $('#select_supplier').on('change', function () {
        reset_main_project();
        reset_detail_lpb();
        //reqData({target_element: 'select_main_project', url: base_url + '/get_list_main_project', param: {'id_supplier': this.value, 'id_gudang': $('#select_gudang').val()}, ret_array: ['MAIN_PROJECT_ID','MAIN_PROJECT_KODE','MAIN_PROJECT_NAMA'], initial_text: 'Pilih Main Project'});
    });
});
function reset_detail_lpb() {
    $('#tabel_lpb_body').html('');
    $('.saveForm').hide('slow');
}
function pilihPO() {
    $('#pilihPOModal').modal('show');
    if ($('#select_main_project').children().length <= 1) {
        reqData({target_element: 'select_main_project', url: base_url + '/get_list_main_project', param: {'id_gudang': $('#select_gudang').val(), 'id_supplier': $('#select_supplier').val()}, ret_array: ['MAIN_PROJECT_ID', 'MAIN_PROJECT_KODE', 'MAIN_PROJECT_NAMA'], initial_text: 'Pilih Main Project'});
    }
}
var PO_ID = 0;
function changePO() {
    var PURCHASE_ORDER_ID = $("#select_po").val();
    PO_ID = PURCHASE_ORDER_ID;
    if (isNaN(PURCHASE_ORDER_ID)) {
        console.log('id null');
        $("#detailPO2").hide();
        $("#div_tabel_detail_po").hide();
        return;
    }
    if (parseInt(PURCHASE_ORDER_ID) <= 0) {
        console.log('id 0 atau kurang');
        $("#detailPO2").hide();
        $("#div_tabel_detail_po").hide();
        return;
    }
    $("#detailPO2").hide();
    $.ajax({
        type: "get",
        url: base_url + '/getDeskripsiPO',
        data: {PURCHASE_ORDER_ID: PURCHASE_ORDER_ID},
        success: function (data) {
//                alert(data);
            var val = JSON.parse(data);
            $("#detailPO2").show();
            $('#td_po_kode').html(val['PURCHASE_ORDER_KODE']);
            $('#td_kategori_po').html(val['KATEGORI_PP_ID'] == '2' ? 'Bahan' : 'Overhead');
            $('#td_rab_kode').html(val['RAB_KODE']);
            $('#td_rab_nama').html(val['RAB_NAMA']);
            $('#td_top').html(val['TOP_KODE']);
            $('#td_supplier').html(val['SUPPLIER_NAMA']);
            $('#td_gudang').html(val['GUDANG_NAMA'] + ' ' + val['GUDANG_LOKASI']);
            $('#td_po_tanggal').html(val['PURCHASE_ORDER_TANGGAL']);
            //if (val.length > 0) {
//            $("#detailPO2").html(
//                    '<div class="form-group">' +
//                    '<label class="col-lg-2 control-label">Kode PO</label>' +
//                    '<div class="col-lg-4">' +
//                    '<input type="text" value="' + val.PURCHASE_ORDER_KODE + '" class="form-control" readonly="readonly" />' +
//                    '</div>' +
////                        '</div>' +
////                        '<div class="form-group">' +
//                    '<label class="col-lg-2 control-label">Tanggal PO</label>' +
//                    '<div class="col-lg-4">' +
//                    '<input type="text" value="' + val.PURCHASE_ORDER_TANGGAL + '" class="form-control" readonly="readonly" />' +
//                    '</div>' +
//                    '</div>' +
//                    '<div class="form-group">' +
//                    '<label class="col-lg-2 control-label">Nama Proyek</label>' +
//                    '<div class="col-lg-4">' +
//                    '<input type="text" value="' + val.PROJECT_NAMA + '" class="form-control" readonly="readonly" />' +
//                    '</div>' +
////                        '</div>' +
////                        '<div class="form-group">' +
//                    '<label class="col-lg-2 control-label">Kode PP</label>' +
//                    '<div class="col-lg-4">' +
//                    '<input type="text" value="' + val.PERMINTAAN_PEMBELIAN_KODE + '" class="form-control" readonly="readonly" />' +
//                    '</div>' +
//                    '</div>' +
//                    '<div class="form-group">' +
//                    '<label class="col-lg-2 control-label">Supplier</label>' +
//                    '<div class="col-lg-4">' +
//                    '<input type="text" value="' + val.SUPPLIER_NAMA + '" class="form-control" readonly="readonly" />' +
//                    '<input type="hidden" value="' + val.SUPPLIER_ID + '" name="SUPPLIER_ID" readonly="readonly" />' +
//                    '</div>' +
//                    '</div>'
//                    );
//                }
//                else {
//                    alert("PO tidak ada data");
//                }
        }
        , error: function (xhr, ajaxOptions, thrownError) {
            $("#detailPO2").html(xhr.responseText);
        }
    });
    //$("#tabel_detail_po_body").html("");
    if (!(tabel_detail_po == null)) {
        tabel_detail_po.fnDestroy();
        $('#tabel_detail_po_body').html('');
    }
    tabel_detail_po = $('#tabel_detail_po').dataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            'method': 'post',
            "url": base_url + "/getDetailPODataTable",
            "data": {
                PURCHASE_ORDER_ID: PURCHASE_ORDER_ID,
                id_lpb: $('#id_lpb').val()
            },
            "dataSrc": function (json) {
                console.log(json);
                jsonData = json.data;
                return json.data;
            }
        },
        "createdRow": function (row, data, index) {
            var id = index + 1;
//            var sisa_volume = 0;
//            if (data[9] == 1) {//po overhead
//                if (data[0] > 0) {// barang
//                    id = 'barang_' + data[0];
//                    $('td', row).eq(0).html(data[2]);//NAMA BARANG
//                    $('td', row).eq(1).html(data[4]);//KATEGORI BARANG
//                    $('td', row).eq(2).html(data[5]);//KODE BARANG
//                    $('td', row).eq(3).html(data[6]);//VOLUME PO
//                    $('td', row).eq(4).html(parseFloat(data[6]) - parseFloat(data[14]));//Sisa VOLUME PO
//                    sisa_volume = parseFloat(data[6]) - parseFloat(data[14]);
//                    $('td', row).eq(5).html(data[7]);//SATUAN
//                    //$('td', row).eq(5).html('<button class="btn btn-xs btn-success" onclick="addRap(this); return false;"><i class="fa fa-plus fa-fw"></i> Pilih</button>');
//                } else if (data[1] > 0) {// overhead
//                    id = 'overhead_' + data[1];
//                    $('td', row).eq(0).html(data[10]);//NAMA OVERHEAD
//                    $('td', row).eq(1).html('');//KATEGORI OVERHEAD
//                    $('td', row).eq(2).html('LS');//KODE OVERHEAD
//                    $('td', row).eq(3).html(data[6]);//VOLUME PO
//                    $('td', row).eq(4).html(parseFloat(data[6]) - parseFloat(data[15]));//Sisa VOLUME PO
//                    sisa_volume = parseFloat(data[6]) - parseFloat(data[15]);
//                    $('td', row).eq(5).html(data[11]);//SATUAN
//                    //$('td', row).eq(5).html('<button class="btn btn-xs btn-success" onclick="addRap(this); return false;"><i class="fa fa-plus fa-fw"></i> Pilih</button>');
//                }
//            } else if (data[9] == 2) {//po bahan
//                if (data[0] > 0) {//po barang
//                    id = 'barang_' + data[0];
//                    $('td', row).eq(0).html(data[2]);
//                    $('td', row).eq(1).html(data[4]);
//                    $('td', row).eq(2).html(data[5]);
//                    $('td', row).eq(3).html(data[6]);
//                    $('td', row).eq(4).html(parseFloat(data[6]) - parseFloat(data[12]));//Sisa VOLUME PO
//                    sisa_volume = parseFloat(data[6]) - parseFloat(data[12]);
//                    $('td', row).eq(5).html(data[7]);
//                    //$('td', row).eq(5).html('<button class="btn btn-xs btn-success" onclick="addRap(this); return false;"><i class="fa fa-plus fa-fw"></i> Pilih</button>');
//                } else if (data[1] > 0) {//po subcon
//                    id = 'subcon_' + data[1];
//                    $('td', row).eq(0).html(data[3]);
//                    $('td', row).eq(1).html('');
//                    $('td', row).eq(2).html(data[16]);
//                    $('td', row).eq(3).html(data[6]);
//                    $('td', row).eq(4).html(parseFloat(data[6]) - parseFloat(data[13]));//Sisa VOLUME PO
//                    sisa_volume = parseFloat(data[6]) - parseFloat(data[13]);
//                    $('td', row).eq(5).html(data[8]);
//                    //$('td', row).eq(5).html('<button class="btn btn-xs btn-success" onclick="addRap(this); return false;"><i class="fa fa-plus fa-fw"></i> Pilih</button>');
//                }
//            }
            var kategori_po = parseInt(data[0]);
            if (kategori_po == 1) {

            } else if (kategori_po == 2) {

            }
            var sisa_volume = parseFloat(data[3]) - parseFloat(data[7]);
            $('td', row).eq(0).html(data[4]);
            $('td', row).eq(1).html(data[5]);
            $('td', row).eq(2).html(data[8]);
            $('td', row).eq(3).html(data[3]);
            $('td', row).eq(4).html(sisa_volume);
            $('td', row).eq(5).html(data[6]);

            var volume_max = '<input type="hidden" value="' + sisa_volume + '"/>';
            if (sisa_volume > 0)
                $('td', row).eq(6).html('<button class="btn btn-xs btn-success" onclick="addRap(this,' + data[0] + ',' + data[1] + ',' + data[2] + ',{id:$(\'#select_po\').val(),kode:$(\'#td_po_kode\').html()}); return false;"><i class="fa fa-plus fa-fw"></i>Pilih</button>' + volume_max);
            else
                $('td', row).eq(6).html('');

            $(row).attr('id', 'item_' + id);
        }
    });
    $("#div_tabel_detail_po").show();
}
function addRap(button_element, jenis_pp_id, id_barang, id_lain, po) {
    var tr = button_element.parentNode.parentNode;
    var td = tr.children;
    var row_id = po.id + '_' + jenis_pp_id + '_' + id_barang + '_' + id_lain;
    if ($('#list_bahan_' + row_id).length === 0) {
        $("#tabel_lpb_body").append(
                "<tr class='" + "' id=\"list_bahan_" + row_id + "\">" +
                "<td>" + po.kode + "</td>" + //KODE PO
                "<td>" + td[0].innerHTML + "</td>" + //KATEGORI
                "<td>" + td[1].innerHTML + "</td>" + //KODE BARANG
                '<td><input type="text" name="VOLUME[]" class="form-control" value="' + td[4].innerHTML + '" max="' + td[6].children[1].value + '" placeholder="tersedia ' + td[6].children[1].value + '" onchange="volumeChanged(this);"></td>' +
                "<td>" + td[6].children[1].value + "</td>" +
                "<td>" + td[5].innerHTML + "</td>" +
                "<td>" +
                //"<button class='btn btn-xs btn-success' onclick='editBarang(\"" + row_id + "\",\"" + BARANG_NAMA + "\",\"" + SATUAN_NAMA + "\",\"" + BARANG_HARGA + "\",\"" + VOLUME_PO + "\")'><i class='fa fa-plus fa-fw'></i> Edit</button>" +
                "<button class='btn btn-xs btn-danger' onclick='dialogHapus(\"" + row_id + "\",this); return false;'><i class='fa fa-minus fa-fw'></i> Hapus</button>" +
                '<input type="hidden" name="PO_ID[]" value="' + po.id + '"/>' +
                '<input type="hidden" name="id_barang[]" value="' + id_barang + '"/>' +
                '<input type="hidden" name="id_lain[]" value="' + id_lain + '"/>' +
                "</td>" +
                "</tr>"
                );

        $(".saveForm").show();
    }
}
var tabel_detail_po = null;
var flag = [];
function volumeChanged(elm) {
    //var volNow = parseFloat(isNaN(elm.value) || elm.value.length === 0 ? 0 : elm.value);
    var volNow = elm.value;
    var maxVol = parseFloat(elm.getAttribute('max'));
    if (isNaN(maxVol)) { //cek jika max volume tidak berupa angka yang valid maka di set ke 0
        maxVol = 0;
    } else if (maxVol < 0) { //cek jika maxvol kurang dari nol maka dipositifkan
        maxVol = 0 - maxVol;
    }
    if (isNaN(volNow)) { //jika current vol tidak berupa angka yang valid, maka diset ke maxvol
        volNow = maxVol;
        alert('Ketikkan angka yang valid');
        elm.focus();
    } else if (volNow.length == 0) { //cek jika current vol dalam string dengan panjang nol, maka diset ke maxvol
        volNow = maxVol;
    }
    volNow = parseFloat(volNow);
    //console.log('vol now = ' + volNow);
    if (volNow < 0) {
        volNow = -volNow;
        alert('Volume barang tidak boleh negatif');
        elm.focus();
    } else if (volNow > maxVol) {
        volNow = maxVol;
        alert('Volume barang tidak boleh melebihi volume yang tersedia (' + maxVol + ')');
        elm.focus();
    }
    //var maxVol = parseFloat();
    elm.value = volNow;
}


function editBarang(BARANG_ID, BARANG_NAMA, SATUAN_NAMA, BARANG_HARGA, BARANG_VOLUME) {
    $('#VOLUME').attr('min', 0);
    $('#VOLUME').attr('max', BARANG_VOLUME);
    var VOLUME = $("." + BARANG_ID + "_jml").text();
    $('#BARANG_ID').val(BARANG_ID);
    $('#BARANG_NAMA').val(BARANG_NAMA);
    $('#VOLUME').val(Number(VOLUME));
    $('#SATUAN_NAMA').val(SATUAN_NAMA);
    //$('#BARANG_HARGA').val(BARANG_HARGA);
    //var SUBTOTAL = $("." + BARANG_ID + "_sub").text();
    //$('#SUBTOTAL').val(SUBTOTAL);
    $('#modalEdit').modal('show');
}

function saveBarang(BARANG_ID, VOLUME, SUBTOTAL) {
    var vol = parseInt(VOLUME);
    var sub = parseInt(SUBTOTAL);
    $("." + BARANG_ID + "_jml").html(vol);
    $("." + BARANG_ID + "_sub").html(sub);
    $("#" + BARANG_ID + "_inpVolume").val(vol);
}

function calculate(BARANG_HARGA, VOLUME) {
    var max = $('#VOLUME').attr('max');
    var vol = parseInt(VOLUME);
    var harga = parseInt(BARANG_HARGA);
    if (max < vol) {
        $('#VOLUME').val(max);
        $('#SUBTOTAL').val(max);
        alert('Volume yang Anda masukkan melebihi dari yang tersedia (' + max + ')');
    }
    else if (max >= VOLUME) {
        $('#SUBTOTAL').val(harga * vol);
    }
}

function save(param) {
    $('#flag_save').val(param);
    $('#formPB').submit();
}

function dialogHapus(row_id, button_element) {
    var tr = button_element.parentNode.parentNode;
    var td = tr.children;
    $(".namaBarangHapus").text("Anda yakin untuk menghapus " + td[2].innerHTML + " " + td[3].children[0].value + ' ' + td[5].innerHTML + " ini?");
    $('#tobe_deleted_id').val(row_id);
    $("#deleteModal").modal();
}

function deleteBarang(BARANG_ID) {
    $('#list_bahan_' + BARANG_ID).remove();
    //$('#barang_baru_' + BARANG_ID).remove();
    flag[BARANG_ID] = 0;
    $("#deleteModal").modal("hide");
    if ($('#tabel_lpb_body').children().length == 0) {
        $(".saveForm").hide();
    }
}

function reqData(d) {
    //reqData({target_element:'select_po_po', url:base_url + '/getListMainProject', param:{'idRAB':this.value}, ret_array:['PURCHASE_ORDER_ID', 'PURCHASE_ORDER_KODE', '']});
    $('#global_processing').show();
    console.log('globalprocessing show');
    console.log(d);
    $('#' + d.target_element).html('<option selected="" disabled="" value="0">' + d.initial_text + '</option>');

    $.ajax({
        type: "get",
        url: d.url,
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
function reset_main_project() {
    console.log('reset main project');
    $('#select_main_project').html('<option value="x">Pilih Main Project</option>');
    resetSelectProject();
}
function resetSelectProject() {
    console.log('reset project');
    $('#select_project').html('<option value="x">Pilih Project</option>');
    resetSelectRAB();
}
function resetSelectRAB() {
    console.log('reset rab');
    $('#select_rab').html('<option value="x">Pilih RAB</option>');
    resetSelectPO();
}
function resetSelectPO() {
    console.log('reset po');
    //$('#select_po_po').val('x');
    $('#select_po').html('<option value="0">Pilih PO</option>');
    //$("#detailPO2").html('');
    $("#detailPO2").css('display', 'none');
    $("#div_tabel_detail_po").hide();
}