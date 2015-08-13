$(document).ready(function () {
    //document.getElementsByClassName('has_sub')[2].setAttribute('class','has_sub open');
    $('#button_show_stok_barang').on('click', function () {
        $('#stokRABModal').modal();
    });
    $('#select_main_project').on('change', function () {
        reset_project();
        reqDataDropdown("select_project", "getListSubProject", {idMainProject: this.value}, ['PROJECT_ID', 'PROJECT_KODE', 'PROJECT_NAMA']);
        $('#main_project_pemberi').val(this.value);
    });
    $('#select_project').on('change', function () {
        $('#project_pemberi').val(this.value);
        reset_rab();
        reqDataDropdown("select_rab", "getListRAB", {idProject: this.value}, ['RAB_ID', 'RAB_KODE', 'RAB_NAMA']);
    });
    $('#select_rab').on('change', function () {
        $('#rab_pemberi').val(this.value);
        reset_supplier();
        reqDataDropdown("select_supplier", "getListSupplier", {id_rab: this.value}, ['SUPPLIER_ID', 'TOP_KODE', 'SUPPLIER_KODE', 'SUPPLIER_NAMA']);
        if ($('#select_jenis_payment').val() == 'upah') {
            $('#button_show_stok_barang').show('slow');
        }
    });
    $('#select_supplier').on('change', function () {
        $('#tabel_detail_invoice_body').html('');
        $('#button_show_stok_barang').show('slow');
    });
    /*$('#select_top').on('change', function () {
     if (this.value != '0' && ($('#select_supplier').val() == '0' || $('#select_supplier').val() == null) == false) {
     show_invoice();
     }
     });*/
    $('#button_show_stok_barang').on('click', function () {
        
        if ($('#select_jenis_payment').val() == 'material') {
            show_invoice();
            console.log('show invoice');
        } else if ($('#select_jenis_payment').val() == 'upah') {
            show_lpu();
            console.log('show lpu');
        }
    });
    $('#select_jenis_payment').on('change', function () {
        $('#tabel_detail_invoice_body').html('');
        if (this.value == 'material') {
            $('#div_select_supplier').show('slow');
            $('#button_show_stok_barang').html('Pilih Invoice');
            if ($('#select_supplier').val() != 0 && $('#select_supplier').val() != null)
                $('#button_show_stok_barang').show('slow');
            else
                $('#button_show_stok_barang').hide('slow');
        } else if (this.value == 'upah') {
            $('#button_show_stok_barang').html('Pilih LPU');
            $('#div_select_supplier').hide('slow');
            $('#button_show_stok_barang').show('slow');
        }
    });
});
function reset_project() {
    $('#select_project').html('<option disabled="" selected="" value="0">Pilih SubProject</option>');
    reset_rab();
}
function reset_rab() {
    $('#select_rab').html('<option disabled="" selected="" value="0">Pilih RAB</option>');
    reset_supplier();
}
function reset_supplier() {
    $('#select_supplier').html('<option disabled="" selected="" value="0">Pilih Supplier</option>');
    $('#button_show_stok_barang').hide();
    $('#div_invoice_terpilih').hide();
    $('#tabel_detail_invoice_body').html('');
}
var tabel_invoice = null,
        tabel_lpu = null;
var last_main_project = 0,
        last_project = 0,
        last_rab = 0,
        last_supplier = 0;
function show_lpu() {
    $('#lpu_modal').modal();
    var c_main_project = $('#select_main_project').val();
    var c_project = $('#select_project').val();
    var c_rab = $('#select_rab').val();
    var c_supplier = $('#select_supplier').val();
    if (c_main_project != last_main_project || c_project != last_project || c_rab != last_rab) {
        last_main_project = c_main_project;
        last_project = c_project;
        last_rab = c_rab;
    }
    else {
        console.log('tidak jadi mengupdate list lpu');
        return;
    }
    if (tabel_lpu != null) {
        console.log('destroy tabel lpu');
        tabel_lpu.fnDestroy();
        $('#tabel_list_lpu_body').html('');
    }
    tabel_lpu = $('#tabel_list_lpu').dataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            'method': 'post',
            "url": base_url + "/get_list_lpu_datatable",
            "data": {
                id_rab: $('#select_rab').val()
            },
            "dataSrc": function (json) {
                console.log(json);
                jsonData = json.data;
                return json.data;
            }
        },
        "createdRow": function (row, data, index) {
            var id = data[0];
            $('td', row).eq(0).html(index + 1);
            $('td', row).eq(1).html(data[1]);
            $('td', row).eq(2).html(data[2]);
            $('td', row).eq(3).html(data[3] + ' ' + data[4]);
            $('td', row).eq(4).html(parseFloat(data[5]).formatMoney());
            $('td', row).eq(5).html('<button class="btn btn-xs btn-success" onclick="pilih_lpu(\'' + data[0] + '\',this)"><i class="fa fa-plus fa-fw"></i> Pilih</button>');
            $(row).attr('id', 'item_' + id);
        }
    });
}
function pilih_lpu(id_lpu, btn_elmnt) {
    console.log('pilih lpu');
    //var tr = btn_elmnt.parentNode.parentNode;
    //var td = tr.children;
    $('#id_lpu').val(id_lpu);
    $.ajax({
        type: "get",
        url: base_url + '/req_detail_lpu',
        data: {id_lpu: id_lpu},
        success: function (data) {
            var val = JSON.parse(data);
            //console.log(val);
            var subtotal = 0;
            var total = 0;
            var kode_lpb = '';
            var jumlah_data = 0;
            var body = $('#tabel_detail_invoice_body');
            if (val.length > 0) {
                body.html('');
                for (var i = 0, i2 = val.length; i < i2; i++) {
                    //jumlah_data++;
                    var lpu = val[i];
                    console.log(lpu);
                    var kode = lpu['KODE_PEKERJAAN'], nama = lpu['NAMA_PEKERJAAN'], volume = 0, harga_satuan = 0, diskon = 0, pajak = 0;
                    
//                    if (lpu['ANALISA_ID'] != null) {
//                        kode = lpu['ANALISA_KODE'];
//                        nama = lpu['ANALISA_NAMA'];
//                    } else {
//                        if (lpu['UPAH_ID'] != null) {
//                            kode = lpu['UPAH_KODE'];
//                            nama = lpu['UPAH_NAMA'];
//                        } else if (lpu['PAKET_OVERHEAD_UPAH_ID'] != null) {
//                            kode = 'LSUOV';
//                            nama = lpu['PAKET_OVERHEAD_UPAH_NAMA'];
//                        }
//                    }
                    harga_satuan = parseFloat(lpu['HARGA_OPNAME']);
                    volume = parseFloat(lpu['VOLUME']);
                    subtotal = harga_satuan * volume;
                    var jenis_pajak = '';
                    var kategori_pajak = parseInt(lpu['KATEGORI_PAJAK_ID']);
                    var pajak_value = parseFloat(lpu['PAJAK_VALUE']);
                    if (kategori_pajak == 1) {
                        jenis_pajak = 'inc';
                        pajak = subtotal * pajak_value / (100 + pajak_value);
                    } else if (kategori_pajak == 2) {
                        jenis_pajak = 'exc';
                        pajak = subtotal * pajak_value / 100;
                        subtotal += pajak;
                    } else if (kategori_pajak == 3) {
                        jenis_pajak = 'notax';
                    }
                    total += subtotal;
                    body.append(
                            '<tr>'
                            + '<td>' + (i + 1) + '</td>'
                            + '<td>' + kode + '</td>'
                            + '<td>' + nama + '</td>'
                            + '<td>' + volume + '</td>'
                            + '<td>' + harga_satuan.formatMoney() + '</td>'
                            + '<td>' + diskon.formatMoney() + '</td>'
                            + '<td>' + jenis_pajak + ' ' + pajak_value + '%</td>'
                            + '<td>' + pajak.formatMoney() + '</td>'
                            + '<td>' + subtotal.formatMoney() + '</td>'
                            + '</tr>'
                            );
                }
            }
            if (jumlah_data > 1)
                body.append(
                        '<tr>'
                        + '<td colspan="8" style="text-align:right;font-weight:bold">Subtotal</td>'
                        + '<td colspan="">' + subtotal.formatMoney() + '</td>'
                        + '</tr>'
                        );
            //total += subtotal;
            body.append(
                    '<tr>'
                    + '<td colspan="8" style="text-align:right;font-weight:bold">Total</td>'
                    + '<td>' + parseFloat(total).formatMoney() + '</td>'
                    + '</tr>'
                    );
        }
        , error: function (xhr, ajaxOptions, thrownError) {
        }
    });
}
function show_invoice() {
    $('#div_invoice_terpilih').hide();
    //$('#button_show_stok_barang').show();
    $('#invoiceModal').modal();
    var c_main_project = $('#select_main_project').val();
    var c_project = $('#select_project').val();
    var c_rab = $('#select_rab').val();
    var c_supplier = $('#select_supplier').val();
    if (c_main_project != last_main_project || c_project != last_project || c_rab != last_rab || c_supplier != last_supplier) {
        last_main_project = c_main_project;
        last_project = c_project;
        last_rab = c_rab;
        last_supplier = c_supplier;
    }
    else {
        console.log('tidak jadi mengupdate list invoice');
        return;
    }
    if (tabel_invoice != null) {
        console.log('destroy tabel invoice');
        tabel_invoice.fnDestroy();
        $('#tabel_list_invoice_body').html('');
    }
    tabel_invoice = $('#tabel_list_invoice').dataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            'method': 'post',
            "url": base_url + "/get_list_invoice_datatable",
            "data": {
                id_rab: $('#select_rab').val(),
                id_supplier: $('#select_supplier').val()
            },
            "dataSrc": function (json) {
                console.log(json);
                jsonData = json.data;
                return json.data;
            }
        },
        "createdRow": function (row, data, index) {
            var id = data[0];
            $('td', row).eq(0).html(index + 1);
            $('td', row).eq(1).html(data[1]);
            $('td', row).eq(2).html(data[2]);
            $('td', row).eq(3).html(data[4] + ' ' + data[5]);
            $('td', row).eq(4).html(data[6] + ' ' + data[7]);
            $('td', row).eq(5).html(parseFloat(data[3]).formatMoney());
            $('td', row).eq(6).html('<button class="btn btn-xs btn-success" onclick="pilihInvoice(\'' + data[0] + '\',this)"><i class="fa fa-plus fa-fw"></i> Pilih</button>');
            $(row).attr('id', 'item_' + id);
        }
    });
}
function pilihInvoice(id, btn) {
    $('#id_invoice').val(id);
    $('#invoiceModal').modal('hide');
    $('#global_processing').show('slow');
    var body = $('#tabel_detail_invoice_body');
    body.html('');
    $.ajax({
        type: "get",
        url: base_url + '/req_detail_invoice',
        data: {id_invoice: id},
        success: function (data) {
            $('#global_processing').hide('slow');
            var val = JSON.parse(data);
            var subtotal = 0;
            var total = 0;
            var kode_lpb = '';
            var jumlah_lpb = 0;
            if (val.length > 0) {
                for (var i = 0; i < val.length; i++) {
                    var inv = val[i];
                    var harga = parseFloat(inv['BARANG_HARGA_SATUAN']);
                    var qty = parseFloat(inv['VOLUME_LPB']);
                    harga = harga * qty;
                    var harga_awal = harga;
                    var diskon1 = 0, diskon2 = 0, diskon3, pajak = 0, diskon;
                    diskon1 = harga * parseFloat(inv['DISKON1']) / 100;
                    harga = harga - diskon1;
                    diskon2 = harga * parseFloat(inv['DISKON2']) / 100;
                    harga = harga - diskon2;
                    diskon3 = harga * parseFloat(inv['DISKON3']) / 100;
                    harga = harga - diskon3;
                    diskon = diskon1 + diskon2 + diskon3;
                    var kategori_pajak = parseInt(inv['KATEGORI_PAJAK_ID']);
                    var nama_pajak = '';
                    if (kategori_pajak == 1) {
                        pajak = parseFloat(inv['PAJAK_VALUE']) * harga / (100 + parseFloat(inv['PAJAK_VALUE']));
                        nama_pajak = 'inc';
                    } else if (kategori_pajak == 2) {
                        pajak = parseFloat(inv['PAJAK_VALUE']) * harga / (100);
                        harga = harga + pajak;
                        nama_pajak = 'exc';
                    } else {
                        nama_pajak = 'notax';
                    }

                    var c_lpb = inv['PENERIMAAN_BARANG_KODE'];
                    if (c_lpb != kode_lpb) {
                        if (kode_lpb.length > 0) {
                            body.append(
                                    '<tr>'
                                    + '<td colspan="8" style="text-align:right;font-weight:bold">Subtotal</td>'
                                    + '<td colspan="">' + subtotal.formatMoney() + '</td>'
                                    + '</tr>'
                                    );
                            total += subtotal;
                            subtotal = 0;
                        }
                        jumlah_lpb++;
                        kode_lpb = c_lpb;
                        body.append(
                                '<tr>'
                                + '<td colspan=""></td>'
                                + '<td colspan="8">' + kode_lpb + '</td>'
                                + '</tr>'
                                );
                    }
                    subtotal += harga;
                    body.append(
                            '<tr>'
                            + '<td>' + (i + 1) + '</td>'
                            + '<td>' + inv['KODE_MATERIAL'] + '</td>'
                            + '<td>' + inv['NAMA_MATERIAL'] + '</td>'
                            + '<td>' + inv['VOLUME_LPB'] + ' ' + inv['SATUAN_NAMA'] + '</td>'
                            + '<td>' + parseFloat(inv['BARANG_HARGA_SATUAN']).formatMoney() + '</td>'
                            + '<td>' + diskon.formatMoney() + '</td>'
                            + '<td>' + nama_pajak + ' ' + inv['PAJAK_VALUE'] + '%</td>'
                            + '<td>' + pajak.formatMoney() + '</td>'
                            + '<td>' + harga.formatMoney() + '</td>'
                            + '</tr>'
                            );
                }
            }
            if (jumlah_lpb > 1)
                body.append(
                        '<tr>'
                        + '<td colspan="8" style="text-align:right;font-weight:bold">Subtotal</td>'
                        + '<td colspan="">' + subtotal.formatMoney() + '</td>'
                        + '</tr>'
                        );
            total += subtotal;
            body.append(
                    '<tr>'
                    + '<td colspan="8" style="text-align:right;font-weight:bold">Total</td>'
                    + '<td>' + parseFloat(total).formatMoney() + '</td>'
                    + '</tr>'
                    );
        }
        , error: function (xhr, ajaxOptions, thrownError) {
        }
    });
}
function reqDataDropdown(elemID, destinationURL, param, resDisplay) {
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
    if ($('#id_invoice').val() == '0' && $('#id_lpu').val() == '0') {
        alert('Pilih Invoice/LPU untuk transaksi Payment');
    } else {
        $('#formBPM').submit();
    }

}