<!-- Page heading -->
<div class="page-head">
    <h2 class="pull-left"><i class="fa fa-building-o"></i> Stok Material</h2>
    <!-- Breadcrumb -->
    <div class="bread-crumb pull-right">
        <a href="index.html"><i class="fa fa-home"></i>Home</a>
        <!-- Divider -->
        <span class="divider">/</span> 
        <a href="#" class="bread-current">Stok</a>
    </div>
    <div class="clearfix"></div>
</div>
<!-- Page heading ends -->

<div class="col-md-12" id="div_header1">
    <div class="widget wgreen">
        <div class="widget-head">
            <div class="pull-left">Home Stok</div>
            <div class="widget-icons pull-right">
                <a href="#" class="wminimize">
                    <i class="fa fa-chevron-up"></i>
                </a>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="widget-content" style="padding: 10px">
            <div class="page-tables">
                <div class="table-responsive">
                    <div id="formBPM" class="form-horizontal" role="form">
                        <div class="form-group pemberi">
                            <label class="col-lg-2 control-label">Jenis Stok</label>
                            <div class="col-lg-5">
                                <select name="" id="select_jenis_stok" class="form-control" onchange="">
                                    <option value="x" disabled="" selected="">Pilih Jenis Stok</option>
                                    <?php foreach ($jenis_stok as $kstok => $vstok) { ?>
                                        <option value="<?= $kstok ?>"><?= $vstok ?></option>
                                    <?php } ?>    
                                </select>
                            </div>
                            <div class="col-lg-2">
                                <button type="button" class="pull-left btn btn-sm btn-success saveForm" onclick="" id="button_show_stok_barang" style="display: none">Pilih Barang</button>
                            </div>
                        </div>
                        <div style="display:none">
                            <table class="table table-striped table-bordered table-hover" id="tabel_stok_gudang" style="">
                                <thead>
                                    <tr>
                                        <th>Kode</th>
                                        <th>Nama</th>
                                        <th>Jumlah Kembali</th>
                                        <th>Sisa Jumlah Pinjam</th>
                                        <th>Jumlah Pinjam</th>
                                        <th>Jumlah Stok</th>
                                        <th>Satuan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="" id="tabel_stok_gudang_body">
                                </tbody>
                            </table>
                        </div>
                        <div id="div_stok_gudang">
                            <table class="table table-striped table-bordered table-hover" id="tabel_list_gudang" style="">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Gudang</th>
                                        <th>Nama Gudang</th>
                                        <th>Lokasi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="tabel_list_gudang_body">
                                </tbody>
                            </table>
                        </div>
                        <div id="div_stok_rab">
                            <table class="table table-striped table-bordered table-hover" id="tabel_list_rab" style="">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode RAB</th>
                                        <th>Nama RAB</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="tabel_list_rab_body">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div id="global_processing" class="dataTables_processing" style="display: none;"></div>
            <div class="page-tables">
                <br/>
            </div>
        </div>
    </div>
</div>
<form id="form1"></form>
<script>
    var datatable_gudang = [],
            datatable_rab = [];
    var base_url1 = '<?= base_url() ?>';
    var uri = '<?= $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>';
    var base_url = base_url1 + uri;
    $(document).ready(function () {
        document.getElementsByClassName('has_sub')[2].setAttribute('class', 'has_sub open');
        $('#div_stok_gudang').hide();
        $('#div_stok_rab').hide();
        $('#select_jenis_stok').on('change', function () {
            $('#div_stok_gudang').hide();
            $('#div_stok_rab').hide();
            $('#global_processing').show();
            if (this.value == 1) {
                req_list_gudang();
                $('#div_stok_gudang').show();
            } else if (this.value == 2) {
                req_list_rab();
                $('#div_stok_rab').show();
            }
        });
    });
    function req_list_rab() {
        var tabel = $('#tabel_list_rab_body');
        tabel.html('');
        $.ajax({
            type: "post",
            url: base_url + '/get_list_rab',
            data: {},
            success: function (data) {
                var val = JSON.parse(data);
                var length = val.length;
                if (length > 0) {

                    for (var i = 0; i < length; i++) {
                        var rab = val[i];
                        tabel.append(
                                '<tr>'
                                + '<td>' + (i + 1) + '</td>'
                                + '<td>' + rab['RAB_KODE'] + '</td>'
                                + '<td>' + rab['RAB_NAMA'] + '</td>'
                                + '<td><button class="btn btn-xs btn-success" onclick="get_stok_rab(this,' + rab['RAB_ID'] + ')"><i class="fa fa-plus fa-fw"></i> Pilih</button><button class="btn btn-xs btn-success" onclick="tutup_list_rab(this)" style="display:none"><i class="fa fa-minus fa-fw"></i> Tutup</button></td>'
                                + '</tr>'
                                );
                    }
                }
                $('#global_processing').hide();
            }
            , error: function (xhr, ajaxOptions, thrownError) {
                $('#global_processing').hide();
            }
        });
    }
    function tutup_list_gudang(elmt) {
        elmt.parentNode.children[0].style.display = '';
        elmt.style.display = 'none';
        elmt.parentNode.parentNode.nextSibling.remove();
    }
    function tutup_list_rab(elmt) {
        elmt.parentNode.children[0].style.display = '';
        elmt.style.display = 'none';
        elmt.parentNode.parentNode.nextSibling.remove();
    }
    function req_list_gudang() {
        var tabel = $('#tabel_list_gudang_body');
        tabel.html('');
        $.ajax({
            type: "post",
            url: base_url + '/get_list_gudang',
            data: {},
            success: function (data) {
                var val = JSON.parse(data);
                var length = val.length;
                if (length > 0) {

                    for (var i = 0; i < length; i++) {
                        var gudang = val[i];
                        tabel.append(
                                '<tr>'
                                + '<td>' + (i + 1) + '</td>'
                                + '<td>' + gudang['GUDANG_KODE'] + '</td>'
                                + '<td>' + gudang['GUDANG_NAMA'] + '</td>'
                                + '<td>' + gudang['GUDANG_LOKASI'] + '</td>'
                                + '<td><button class="btn btn-xs btn-success" onclick="get_stok_gudang(this,' + gudang['GUDANG_ID'] + ')"><i class="fa fa-plus fa-fw"></i> Pilih</button><button class="btn btn-xs btn-success" onclick="tutup_list_gudang(this)" style="display:none"><i class="fa fa-minus fa-fw"></i> Tutup</button></td>'
                                + '</tr>'
                                );
                    }
                }
                $('#global_processing').hide();
            }
            , error: function (xhr, ajaxOptions, thrownError) {
                $('#global_processing').hide();
            }
        });
    }
    var list_lpb = [].
            list_bpm = [],
            list_hm = [],
            list_pm = [];
    var lpb_length, bpm_length, hm_length, pm_length, lpb_index, bpm_index, hm_index, pm_index;
    function init_lpb(arr) {
        list_lpb = arr;
        lpb_length = list_lpb.length;
        lpb_index = 0
        console.log('init lpb');
        console.log(list_lpb);
    }
    function init_bpm(arr) {
        list_bpm = arr;
        bpm_length = list_bpm.length;
        bpm_index = 0;
        console.log('init bpm');
        console.log(list_bpm);
    }
    function init_hm(arr) {
        list_hm = arr;
        hm_length = list_hm.length;
        hm_index = 0;
        console.log('init hm');
        console.log(list_hm);
    }
    function init_pm(arr) {
        list_pm = arr;
        pm_length = list_pm.length;
        pm_index = 0;
        console.log('init pm');
        console.log(list_pm);
    }
    function masih_ada() {
        console.log('cek apakah masih ada');
        return (lpb_index < lpb_length) || (bpm_index < bpm_length) || (hm_index < hm_length) || (pm_index < pm_length);
    }
    function to_date_format(trans) {
        console.log('convert string to date');
        var string = trans['TANGGAL_TRANSAKSI'];
        var d = new Date();
        var t_j = string.split(' ');
        var tanggal = t_j[0].split('-');
        var jam = t_j[1].split(':');
        d.setFullYear(tanggal[0]);
        d.setMonth(tanggal[1] - 1);
        d.setDate(tanggal[2]);
        d.setHours(jam[0]);
        d.setMinutes(jam[1]);
        d.setSeconds(jam[2]);
        return d;
    }
    function get_current_history() {
        console.log('get_current_history');
        var c_history = [];
        var n_history = [];
        if (lpb_index < lpb_length) {
            n_history.push('lpb');
            c_history.push(to_date_format(list_lpb[lpb_index]));
        }
        if (bpm_index < bpm_length) {
            n_history.push('bpm');
            c_history.push(to_date_format(list_bpm[bpm_index]));
        }
        if (hm_index < hm_length) {
            n_history.push('hm');
            c_history.push(to_date_format(list_hm[hm_index]));
        }
        if (pm_index < pm_length) {
            n_history.push('pm');
            c_history.push(to_date_format(list_pm[pm_index]));
        }
        for (var i = 0, l = c_history.length; i < l; i++) {
            for (var j = i + 1; j < l; j++) {
                var a = c_history[i];
                var b = c_history[j];
                if (a > b) {
                    c_history[i] = b;
                    c_history[j] = a;
                    var c = n_history[i];
                    n_history[i] = n_history[j];
                    n_history[j] = c;
                }
            }
        }
        var hasil = [];
        if (n_history[0] == 'lpb') {
            hasil = list_lpb[lpb_index++];
        } else if (n_history[0] == 'bpm') {
            hasil = list_bpm[bpm_index++];
        } else if (n_history[0] == 'hm') {
            hasil = list_hm[hm_index++];
        } else if (n_history[0] == 'pm') {
            hasil = list_pm[pm_index++];
        }
        return hasil;
    }
    function req_history_barang(id_barang, asal, id_tabel) {
        //var id_tabel='tabel_history_'+id_barang+'_'+asal;
        var id_body = id_tabel + '_body';
        var jenis_history = [];
        jenis_history[1] = 'gudang';
        jenis_history[2] = 'rab';
        $.ajax({
            type: "post",
            url: base_url + '/get_history_barang',
            data: {
                id_barang: id_barang,
                id_asal: asal,
                jenis_history: jenis_history[$('#select_jenis_stok').val()]
            },
            success: function (data) {
                var json = JSON.parse(data);
                init_lpb(json.lpb);
                init_bpm(json.bpm);
                init_hm(json.hm);
                init_pm(json.pm);
                var counter = 0;
                var c_stok = 0;
                var body_tabel = document.getElementById(id_body);
                while (masih_ada()) {
                    counter++;
                    var hstry = get_current_history();
                    var child = '<tr>'
                            + '<td>' + counter + '</td>'
                            + '<td>' + hstry['KODE_TRANSAKSI'] + '</td>'
                            + '<td>' + hstry['NAMA_TRANSAKSI'] + '</td>'
                            + '<td>' + hstry['QTY_MASUK'] + '</td>'
                            + '<td>' + hstry['QTY_KELUAR'] + '</td>'
                            + '<td>' + c_stok + '</td>'
                            + '<td>' + hstry['VOLUME'] + c_stok + '</td>'
                            + '</tr>';
                    var tr = document.createElement('tr');
                    var tdcounter = document.createElement('td');
                    var kode_trans = document.createElement('td');
                    var nama_trans = document.createElement('td');
                    var masuk = document.createElement('td');
                    var keluar = document.createElement('td');
                    var stok_awal = document.createElement('td');
                    var stok_akhir = document.createElement('td');
                    var tanggal_trans = document.createElement('td');

                    kode_trans.innerHTML = hstry['KODE_TRANSAKSI'];
                    nama_trans.innerHTML = hstry['NAMA_TRANSAKSI'];
                    masuk.innerHTML = hstry['QTY_MASUK'];
                    keluar.innerHTML = hstry['QTY_KELUAR'];
                    tanggal_trans.innerHTML = hstry['TANGGAL_TRANSAKSI'].substr(0, 19);
                    stok_awal.innerHTML = c_stok;
                    stok_akhir.innerHTML = c_stok + parseFloat(hstry['VOLUME']);
                    tdcounter.innerHTML = counter;
                    tr.appendChild(tdcounter);
                    tr.appendChild(kode_trans);
                    tr.appendChild(nama_trans);
                    tr.appendChild(tanggal_trans);
                    tr.appendChild(masuk);
                    tr.appendChild(keluar);
                    tr.appendChild(stok_awal);
                    tr.appendChild(stok_akhir);
                    body_tabel.appendChild(tr);
                    c_stok += parseFloat(hstry['VOLUME']);
                }
                console.log('sudah habis');
                $('#global_processing').hide();
            }
            , error: function (xhr, ajaxOptions, thrownError) {
                $('#global_processing').hide();
            }
        });
    }
    function get_stok_rab(elmt, id_rab) {
        elmt.style.display = 'none';
        elmt.nextSibling.style.display = '';
        //console.log(elmt);
        var myRow = elmt.parentNode.parentNode;
        //console.log(myRow);
        var myBody = myRow.parentNode;
        //console.log(myBody);
        var newRow = document.createElement('tr');
        var new_td = document.createElement('td');
        new_td.setAttribute('colspan', 4);
        new_td.style.padding = '20px';
        var id_tabel = 'tabel_list_rab_' + id_rab;
        var tabel = buat_tabel(id_tabel, ['No.', 'Kode Barang', 'Nama Barang', 'Volume', 'Satuan', 'Aksi']);
        new_td.appendChild(tabel);
        newRow.appendChild(new_td);
        //console.log(newRow);
        if (myRow.nextSibling) {
            myBody.insertBefore(newRow, myRow.nextSibling);
            //console.log('insert');
        } else {
            myBody.appendChild(newRow);
            //console.log('append');
        }
        req_stok_rab(id_rab, id_tabel);
        console.log('------------------------');
    }

    function get_stok_gudang(elmt, id_gudang) {
        elmt.style.display = 'none';
        elmt.nextSibling.style.display = '';
        //console.log(elmt);
        var myRow = elmt.parentNode.parentNode;
        //console.log(myRow);
        var myBody = myRow.parentNode;
        //console.log(myBody);
        var newRow = document.createElement('tr');
        var new_td = document.createElement('td');
        new_td.setAttribute('colspan', 5);
        new_td.style.padding = '20px';
        var id_tabel = 'tabel_list_gudang_' + id_gudang;
        var tabel = buat_tabel(id_tabel, ['No.', 'Kode Barang', 'Nama Barang', 'Volume', 'Satuan', 'Aksi']);
        new_td.appendChild(tabel);
        newRow.appendChild(new_td);
        //console.log(newRow);
        if (myRow.nextSibling) {
            myBody.insertBefore(newRow, myRow.nextSibling);
            //console.log('insert');
        } else {
            myBody.appendChild(newRow);
            //console.log('append');
        }
        req_stok_gudang(id_gudang, id_tabel);
        console.log('------------------------');
    }
    function buat_tabel(id, kolom_header) {
        var Jumlah_kolom = kolom_header.length;
        var row_head = document.createElement('tr');
        for (var i = 0; i < Jumlah_kolom; i++) {
            var th = document.createElement('th');
            th.innerHTML = kolom_header[i];
            row_head.appendChild(th);
        }
        var thead = document.createElement('thead');
        thead.appendChild(row_head);
        var tbody = document.createElement('tbody');
        tbody.setAttribute('id', id + '_body');
        var tabel = document.createElement('table');
        tabel.setAttribute('id', id);
        tabel.setAttribute('class', 'table table-striped table-bordered table-hover');
        tabel.appendChild(thead);
        tabel.appendChild(tbody);
        // var tabel  = document.createElement('table');
        // var thead = document.createElement('thead');
        // var tbody = document.createElement('tbody');
        // var tr = document.createElement('tr');
        // var th1= document.createElement('th');
        // var th2 = document.createElement('th');
        // var th3 = document.createElement('th');
        // var th4 = document.createElement('th');
        // var th5 = document.createElement('th');
        // var th6 = document.createElement('th');
        // th1.innerHTML='No.';
        // th2.innerHTML='Kode Barang';
        // th3.innerHTML='Nama Barang';
        // th4.innerHTML='Volume';
        // th5.innerHTML='Satuan';
        // th6.innerHTML='Aksi';
        // tbody.setAttribute('id',id+'_body');
        // tr.appendChild(th1);
        // tr.appendChild(th2);
        // tr.appendChild(th3);
        // tr.appendChild(th4);
        // tr.appendChild(th5);
        // tr.appendChild(th6);
        // thead.appendChild(tr);
        // tabel.appendChild(thead);
        // tabel.appendChild(tbody);
        // tabel.setAttribute('id',id);
        // tabel.setAttribute('class','table table-striped table-bordered table-hover');
        return tabel;
    }
    function req_stok_rab(id_rab, tabel_id_target) {
        if (datatable_rab.hasOwnProperty(tabel_id_target)) {
            if (datatable_rab[tabel_id_target] != null) {
                datatable_rab[tabel_id_target].fnDestroy();
            }
        }
        datatable_rab[tabel_id_target] = $('#' + tabel_id_target).dataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                'method': 'post',
                "url": base_url + "/get_stok_rab_datatable",
                "data": {
                    id_rab: id_rab
                },
                "dataSrc": function (json) {
                    console.log(json.sql);
                    jsonData = json.data;
                    return json.data;
                }
            },
            "createdRow": function (row, data, index) {
                var id = data[0];
                $('td', row).eq(0).html(index + 1);
                var kode = '', nama = '', volume = data[5], satuan = '', id_barang = 0, id_subcon = 0, id_overhead = 0;
                if (data[2] > 0) {//barang
                    kode = data[6];
                    nama = data[7];
                    satuan = data[8];
                    id_barang = data[2];
                } else if (data[3] > 0) {//subcon
                    kode = data[9];
                    nama = data[10];
                    satuan = data[11];
                    id_subcon = data[3];
                } else if (data[4] > 0) {//overhead
                    kode = data[12];
                    nama = data[13];
                    satuan = data[14];
                    id_overhead = data[4];
                }
                $('td', row).eq(1).html(kode);
                $('td', row).eq(2).html(nama);
                $('td', row).eq(3).html(volume);
                $('td', row).eq(4).html(satuan);
                $('td', row).eq(5).html('<button class="btn btn-xs btn-success" onclick="view_barang(\'rab\',' + id_rab + ',' + id_barang + ',' + id_subcon + ',' + id_overhead + ')"><i class="fa fa-plus fa-fw"></i> Pilih</button>');
                $(row).attr('id', 'item_' + id);
            }
        });
    }
    function req_stok_gudang(id_gudang, tabel_id_target) {
        if (datatable_gudang.hasOwnProperty(tabel_id_target)) {
            if (datatable_gudang[tabel_id_target] != null) {
                datatable_gudang[tabel_id_target].fnDestroy();
            }
        }
        datatable_gudang[tabel_id_target] = $('#' + tabel_id_target).dataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                'method': 'post',
                "url": base_url + "/get_stok_gudang_datatable",
                "data": {
                    id_gudang: id_gudang
                },
                "dataSrc": function (json) {
                    console.log(json.sql);
                    jsonData = json.data;
                    return json.data;
                }
            },
            "createdRow": function (row, data, index) {
                var id = data[0];
                $('td', row).eq(0).html(index + 1);
                var kode = '', nama = '', volume = data[5], satuan = '', id_barang = 0, id_subcon = 0, id_overhead = 0;
                if (data[2] > 0) {//barang
                    kode = data[6];
                    nama = data[7];
                    satuan = data[8];
                    id_barang = data[2];
                } else if (data[3] > 0) {//subcon
                    kode = data[9];
                    nama = data[10];
                    satuan = data[11];
                    id_subcon = data[3];
                } else if (data[4] > 0) {//overhead
                    kode = data[12];
                    nama = data[13];
                    satuan = data[14];
                    id_overhead = data[4];
                }
                $('td', row).eq(1).html(kode);
                $('td', row).eq(2).html(nama);
                $('td', row).eq(3).html(volume);
                $('td', row).eq(4).html(satuan);
                $('td', row).eq(5).html('<button class="btn btn-xs btn-success" onclick="view_barang(\'gudang\',' + id_gudang + ',' + id_barang + ',' + id_subcon + ',' + id_overhead + ')"><i class="fa fa-plus fa-fw"></i> Pilih</button>');
                $(row).attr('id', 'item_' + id);
            }
        });
    }
    function view_barang(tipe, id_tipe, id_barang, id_subcon, id_overhead) {
        var win = window.open(base_url + '/history?id_barang=' + id_barang + '&id_subcon=' + id_subcon + '&id_overhead=' + id_overhead + '&jenis_history=' + tipe + '&id_tipe=' + id_tipe, '_blank');
        win.focus();
    }
    function view_barang2(id_barang, nama_barang, id_asal) {
        var jenis_history = [];
        jenis_history[1] = 'gudang';
        jenis_history[2] = 'rab';
        jenis_history = jenis_history[$('#select_jenis_stok').val()];
        var win = window.open(base_url + '/history?id_barang=' + id_barang + '&jenis_history=' + jenis_history + '&id_asal=' + id_asal, '_blank');
        win.focus();
        return;

        var id_tabel = 'tabel_history' + jenis_history + '_' + id_barang + '_' + id_asal;
        if (document.getElementById(id_tabel) != null)
            return;
        var new_div_history = document.createElement('div');
        new_div_history.setAttribute('class', 'col-md-12');
        var widget_green = document.createElement('div');
        widget_green.setAttribute('class', 'widget green');
        var widget_head = document.createElement('div');
        widget_head.setAttribute('class', 'widget-head');
        var widget_content = document.createElement('div');
        widget_content.setAttribute('class', 'widget-content');
        var div_header_nama = document.createElement('div');
        var div_header_minimize = document.createElement('div');
        var div_header_close = document.createElement('div');
        var div_header_clear = document.createElement('div');
        div_header_nama.setAttribute('class', 'pull-left');
        div_header_nama.innerHTML = 'History ' + nama_barang;
        div_header_minimize.setAttribute('class', 'widget-icons pull-right');
        div_header_close.setAttribute('class', 'widget-icons pull-right');
        div_header_clear.setAttribute('class', 'clearfix');
        var a_minimize = document.createElement('a');
        a_minimize.setAttribute('class', 'wminimize wkecil');
        a_minimize.setAttribute('href', 'javascript:void(0);');
        a_minimize.setAttribute('onclick', 'wkecil(this)');
        var i_up = document.createElement('i');
        i_up.setAttribute('class', 'fa fa-chevron-up');
        a_minimize.appendChild(i_up);
        var a_close = document.createElement('a');
        a_close.setAttribute('class', 'wclose wtutup');
        a_close.setAttribute('href', 'javascript:void(0)');
        a_close.setAttribute('onclick', 'wtutup(this)');
        var i_times = document.createElement('i');
        i_times.setAttribute('class', 'fa fa-times');
        a_close.appendChild(i_times);
        div_header_minimize.appendChild(a_minimize);
        div_header_close.appendChild(a_close);
        widget_head.appendChild(div_header_nama);
        widget_head.appendChild(div_header_close);
        widget_head.appendChild(div_header_minimize);
        widget_head.appendChild(div_header_clear);
        widget_green.appendChild(widget_head);
        var page_table = document.createElement('div');
        var table_responsive = document.createElement('div');
        var tabel_history = buat_tabel(id_tabel, ['No.', 'Kode Transaksi', 'Nama Transaksi', 'Tanggal Transaksi', 'Qty Masuk', 'Qty Keluar', 'Qty Awal', 'Qty Akhir']);
        table_responsive.appendChild(tabel_history);
        page_table.appendChild(table_responsive);
        widget_content.appendChild(page_table);
        widget_green.appendChild(widget_content);
        new_div_history.appendChild(widget_green);
        var div_header1 = document.getElementById('div_header1');
        div_header1.parentNode.insertBefore(new_div_history, div_header1.nextSibling);
        req_history_barang(id_barang, id_asal, id_tabel);
    }


    function wtutup(elmt) {
        console.log('menutup');
        console.log(elmt);
        elmt.parentNode.parentNode.parentNode.parentNode.remove();
    }

    var content123;
    function wkecil(elmt) {
        console.log('mengecilkan');
        console.log(elmt);
        var content = elmt.parentNode.parentNode.nextSibling;
        content123 = content;
        console.log(content);
        console.log(content.style);
        if (content.style.display == '') {
            console.log('class down');
            elmt.children[0].setAttribute('class', 'fa fa-chevron-down');
            content.style.display = 'none';
        } else {
            console.log('class up');
            elmt.children[0].setAttribute('class', 'fa fa-chevron-up');
            content.style.display = '';
        }
    }
</script>