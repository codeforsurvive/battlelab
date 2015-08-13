<!-- Page heading -->
<div class="page-head">
    <h2 class="pull-left"><i class="fa fa-building-o"></i> Stok Material</h2>
    <!-- Breadcrumb -->
    <div class="bread-crumb pull-right">
        <a href="index.html"><i class="fa fa-home"></i>Home</a>
        <!-- Divider -->
        <span class="divider">/</span> 
        <a href="#" class="bread-current">History</a>
    </div>
    <div class="clearfix"></div>
</div>
<!-- Page heading ends -->

<div class="col-md-12" id="div_header1">
    <div class="widget wgreen">
        <div class="widget-head">
            <div class="pull-left">History Stok <b><?= $barang['BARANG_NAMA'] ?> di <?= $tempat['TEMPAT_NAMA'] ?></b></div>
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
                    <div style="">
                        <table class="table table-striped table-bordered table-hover" id="tabel_stok" style="">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Kode Transaksi</th>
                                    <th>Nama Transaksi</th>
                                    <th>Tanggal Transaksi</th>
                                    <th>Qty Masuk (<?= $barang['SATUAN_NAMA'] ?>)</th>
                                    <th>Qty Keluar (<?= $barang['SATUAN_NAMA'] ?>)</th>
                                    <th>Qty Awal (<?= $barang['SATUAN_NAMA'] ?>)</th>
                                    <th>Qty Akhir (<?= $barang['SATUAN_NAMA'] ?>)</th>
                                </tr>
                            </thead>
                            <tbody class="" id="tabel_stok_body">
                                <?php
                                $c = 0;
                                $stok = 0;
                                $o_stok = 0;
                                foreach ($history as $hsty) {
                                    $o_stok = $stok;
                                    $stok+= $hsty['QTY_MASUK'] - $hsty['QTY_KELUAR'];
                                    $c++;
                                    ?>
                                    <tr>
                                        <td><?= $c ?></td>
                                        <td><?= $hsty['KODE_TRANSAKSI'] ?></td>
                                        <td><?= $hsty['NAMA_TRANSAKSI'] ?></td>
                                        <td><?= $hsty['TANGGAL_TRANSAKSI'] ?></td>
                                        <td><?= $hsty['QTY_MASUK'] ?></td>
                                        <td><?= $hsty['QTY_KELUAR'] ?></td>
                                        <td><?= $o_stok ?></td>
                                        <td><?= $stok ?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>

                        </table>

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
        var base_url1 = '<?= base_url() ?>';
        var uri = '<?= $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>';
        var base_url = base_url1 + uri;
        $(document).ready(function () {
            document.getElementsByClassName('has_sub')[2].setAttribute('class', 'has_sub open');
            req_history_barang(<?= $id_barang ?>,<?= $id_asal ?>, 'tabel_stok');
        });
        function req_history_barang(id_barang, asal, id_tabel) {
            //var id_tabel='tabel_history_'+id_barang+'_'+asal;
            var id_body = id_tabel + '_body';

            $.ajax({
                type: "post",
                url: base_url + '/get_history_barang',
                data: {
                    id_barang: id_barang,
                    id_asal: asal,
                    jenis_history: '<?= $jenis_history ?>'
                },
                success: function (data) {
                    var json = JSON.parse(data);
                    init_lpb(json.lpb);
                    init_bpm(json.bpm);
                    init_hm(json.hm);
                    init_pm(json.pm);
                    var counter = 0;
                    var c_stok = 0;
                    //var body_tabel=document.getElementById(id_body);
                    var body_tabel = $('#' + id_body);
                    while (masih_ada()) {
                        counter++;
                        var hstry = get_current_history();
                        console.log(hstry);
                        var stok = c_stok;
                        if (parseFloat(hstry['QTY_MASUK']) > 0) {
                            console.log('masuk lebih dari 0');
                            c_stok += parseFloat(hstry['QTY_MASUK']);
                        } else if (parseFloat(hstry['QTY_KELUAR']) > 0) {
                            console.log('keluar lebih dari 0');
                            c_stok -= parseFloat(hstry['QTY_KELUAR']);
                        } else {
                            console.log('keluar/masuk tidak valid');
                        }
                        //c_stok+=parseFloat(hstry['VOLUME']);
                        var child = '<tr>'
                                + '<td>' + counter + '</td>'
                                + '<td>' + hstry['KODE_TRANSAKSI'] + '</td>'
                                + '<td>' + hstry['NAMA_TRANSAKSI'] + '</td>'
                                + '<td>' + hstry['TANGGAL_TRANSAKSI'] + '</td>'
                                + '<td>' + hstry['QTY_MASUK'] + '</td>'
                                + '<td>' + hstry['QTY_KELUAR'] + '</td>'
                                + '<td>' + stok + '</td>'
                                + '<td>' + c_stok + '</td>'
                                + '</tr>';
                        body_tabel.append(child);
                    }
                    console.log('sudah habis');
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
    </script>

    <?php
    //print_r($history);
    ?>