<!-- Page heading -->
<div class="page-head">
    <h2 class="pull-left"><i class="fa fa-building-o"></i> Laporan </h2>
    <!-- Breadcrumb -->
    <div class="bread-crumb pull-right">
        <a href="index.html"><i class="fa fa-home"></i> Home</a> 
        <!-- Divider -->
        <span class="divider">/</span> 
        <a href="#" class="bread-current">Laporan</a>
    </div>
    <div class="clearfix"></div>
</div>
<!-- Page heading ends -->

<div class="col-md-12">
    <div class="widget wgreen">
        <div class="widget-head">
            <div class="pull-left">Laporan</div>
            <div class="widget-icons pull-right">
                <a href="#" class="wminimize">
                    <i class="fa fa-chevron-up"></i>
                </a>
            </div>
            <div class="clearfix"></div>
        </div>
        <div id="global_processing" class="dataTables_processing" style="display: none;z-index: 2000"></div>
        <div class="widget-content" style="padding: 10px">

            <div class="page-tables">
                <div class="table-responsive">
                    <div class="clearfix">
                        <br />
                    </div>
                    <div id="formBPM" class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Main Project</label>
                            <div class="col-lg-5">
                                <select name="main_project" id="select_main_project" class="form-control" onchange="">
                                    <option value="0" disabled=""  selected="">Pilih Main Project</option>
                                    <?php foreach ($list_main_project as $MainProject) { ?>
                                        <option value="<?= $MainProject['MAIN_PROJECT_ID'] ?>"><?= $MainProject['MAIN_PROJECT_KODE'] . ' ' . $MainProject['MAIN_PROJECT_NAMA'] ?></option>
                                    <?php } ?>    
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Project</label>
                            <div class="col-lg-5">
                                <select name="main_project" id="select_project" class="form-control" onchange="">
                                    <option value="0" disabled=""  selected="">Pilih Project</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">RAB</label>
                            <div class="col-lg-5">
                                <select name="main_project" id="select_rab" class="form-control" onchange="">
                                    <option value="0" disabled=""  selected="">Pilih RAB</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Jenis Payment</label>
                            <div class="col-lg-5">
                                <select name="jenis_payment" id="select_jenis_payment" class="form-control" onchange="">
                                    <option value="semua">Material dan Upah</option>
                                    <option value="material">Material</option>
                                    <option value="upah">Upah</option>
                                </select>
                            </div>
                        </div>
                        <div class="padd" id="tombol_export" style="display:none">
                            <img onclick="exportModal('xls');" src="<?= base_url(); ?>assets/default/img/icons/excel.png" class="icons" title="Export to XLS" />
                            <img onclick="exportModal('doc');" src="<?= base_url(); ?>assets/default/img/icons/word.png" class="icons" title="Export to DOC" />
                            <a href="<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>/printPDF" target="_blank"><img src="<?= base_url(); ?>assets/default/img/icons/pdf.png" class="icons" title="Export to PDF" /></a>
                        </div>
                        <table class="table table-striped table-bordered table-hover centerTable" style="margin-top: 20px;display:none" id="tabel_list_payment">
                            <thead>
                                <tr class="label-info">
                                    <th colspan="10"></th>
                                </tr>
                                <tr class="label-info">
                                    <th>No.</th>
                                    <th>Kode Payment</th>
                                    <th>Kode Invoice/LPU</th>
                                    <th>Tanggal</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody id="tabel_list_payment_body">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- End of Modal Section -->
        </div>

    </div>
</div>
<form id="formDetail" method="get"></form>
<div id="konfirmasiModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="judulModal">Konfirmasi Validasi LPB</h4>
            </div>
            <div class="modal-body">
                <h3 id="bodyModal" class="namaBarangHapus">Anda yakin akan memvalidasi LPB ini?</h3>                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="submitForm()" id="buttonYesModal">Ya</button>
                <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Tidak</button>
            </div>
        </div>
    </div>
</div>

<script>
    var tabel_list_lpu = null;
    var my_url = '<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>';
    $(document).ready(function () {
        document.getElementsByClassName('has_sub')[4].setAttribute('class', 'has_sub open');
        $('#select_main_project').on('change', function () {
            req_dropdown({target_element: 'select_project', url: 'get_list_project', param: {id_main_project: this.value}, initial_text: 'Pilih Project', ret_array: ['PROJECT_ID', 'PROJECT_KODE', 'PROJECT_NAMA']});
            $('#tabel_list_payment_body').html('');
            $('#tabel_list_payment').hide('slow');
            $('#tombol_export').hide('slow');
        });
        $('#select_project').on('change', function () {
            req_dropdown({target_element: 'select_rab', url: 'get_list_rab', param: {id_project: this.value}, initial_text: 'Pilih RAB', ret_array: ['RAB_ID', 'RAB_KODE', 'RAB_NAMA']});
            $('#tabel_list_payment_body').html('');
            $('#tabel_list_payment').hide('slow');
            $('#tombol_export').hide('slow');
        });
        $('#select_rab').on('change', function () {
            $('#tabel_list_payment_body').html('');
            $('#tabel_list_payment').hide('slow');
            $('#tombol_export').hide('slow');
            document.getElementsByClassName('padd')[0].children[2].setAttribute('href', '<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>/printPDF?jenis_laporan=' + $('#select_jenis_payment').val() + '&id_rab=' + this.value);
            get_laporan(this.value, $('#select_jenis_payment').val());
        });
        $('#select_jenis_payment').on('change', function () {
            get_laporan($('#select_rab').val(), this.value);
            document.getElementsByClassName('padd')[0].children[2].setAttribute('href', '<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>/printPDF?jenis_laporan=' + this.value + '&id_rab=' + $('#select_rab').val());
        });
    });
    function get_laporan(id_rab, jenis_payment) {
        $('#global_processing').show('slow');
        $('#tabel_list_payment').hide('slow');
        $('#tabel_list_payment_body').html('');
        $.ajax({
            type: "get",
            url: my_url + '/get_laporan',
            data: {
                id_rab: id_rab,
                jenis_payment: jenis_payment
            },
            success: function (data) {
                $('#global_processing').hide('slow');
                $('#tabel_list_payment').show('slow');
                $('#tombol_export').show('slow');
                var val = JSON.parse(data);
                var counter = 0;
                var total = 0;
                console.log(val.laporan);
                console.log(val.rab);
                for (var i = 0, i2 = val.laporan.length; i < i2; i++) {
                    var py = val.laporan[i];
                    counter++;
                    var harga = parseFloat(py['HARGA']);
                    total += harga;
                    $('#tabel_list_payment_body').append(
                            '<tr id="row_laporan_' + counter + '" style="display:none">'
                            + '<td>' + counter + '</td>'
                            + '<td><a class="btn btn-primary btn-xs" target="_blank" href="<?= base_url() ?>p-material/payment/viewDetail?id=' + py["PAYMENT_ID"] + '"><i class="fa fa-search fa-fw"></i></a> ' + py['PAYMENT_KODE'] + '</td>'
                            + '<td><a class="btn btn-primary btn-xs" target="_blank" href="<?= base_url() ?>' + (py['INVOICE_ID'] != null ? 'p-material/invoice' : (py['LPU_ID'] != null ? 'p-upah/lpu' : '')) + '/viewDetail' + (py['INVOICE_ID'] != null ? '/' + py['INVOICE_ID'] : (py['LPU_ID'] != null ? '?id=' + py['LPU_ID'] : '0')) + '"><i class="fa fa-search fa-fw"></i></a> ' + py['KODE_X'] + '</td>'
                            + '<td>' + py['TANGGAL_TRANSAKSI'] + '</td>'
                            + '<td>' + harga.formatMoney() + '</td>'
                            + '</tr>'
                            );
                    $('#row_laporan_' + counter).show('slow');
                }

                $('#tabel_list_payment_body').append(
                        '<tr id="row_laporan_total" style="display:none">'
                        + '<td colspan="4" style="text-align:right;font-weight:bold;background-color: #167CAC;"><b style="color: #FFF">Total Payment</b></td>'
                        + '<td>' + total.formatMoney() + '</td>'
                        + '</tr>'
                        );
                $('#tabel_list_payment_body').append(
                        '<tr id="row_laporan_total_rab" style="display:none">'
                        + '<td colspan="4" style="text-align:right;font-weight:bold;background-color: #167CAC;"><b style="color: #FFF">Total RAB</b></td>'
                        + '<td>' + parseFloat(val.rab['RAB_AFTER_OVERHEAD']).formatMoney() + '</td>'
                        + '</tr>'
                        );
                $('#tabel_list_payment_body').append(
                        '<tr id="row_laporan_persen" style="display:none">'
                        + '<td colspan="4" style="text-align:right;font-weight:bold;background-color: #167CAC;"><b style="color: #FFF">Prosentase Penyerapan RAB</b></td>'
                        + '<td><b>' + (total * 100 / parseFloat(val.rab['RAB_AFTER_OVERHEAD'])).toFixed(2) + '%</b></td>'
                        + '</tr>'
                        );
                $('#row_laporan_total').show('slow');
                $('#row_laporan_total_rab').show('slow');
                $('#row_laporan_persen').show('slow');

            }
        });
    }
    function req_dropdown(d) {
        $('#global_processing').show();
        console.log('globalprocessing show');
        console.log(d);
        $('#' + d.target_element).html('<option selected="" disabled="" value="0">' + d.initial_text + '</option>');
        $.ajax({
            type: "get",
            url: my_url + '/' + d.url,
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
</script>
<style type="text/css">
    .centerTable th{
        text-align: center;
        background-color: #0993D3;
        color: #FFFFFF;
        height: 30px;
        font-size: 12px;
    }
    .ket_po{
        background-color: #EEEEEE;
    }
</style>