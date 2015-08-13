<!-- Page heading -->
<div class="page-head">
    <h2 class="pull-left"><i class="fa fa-building-o"></i> Payment</h2>
    <!-- Breadcrumb -->
    <div class="bread-crumb pull-right">
        <a href="index.html"><i class="fa fa-home"></i>Home</a>
        <!-- Divider -->
        <span class="divider">/</span> 
        <a href="#" class="bread-current">Payment</a>
    </div>
    <div class="clearfix"></div>
</div>
<!-- Page heading ends -->

<div class="col-md-12">
    <div class="widget wgreen">
        <div class="widget-head">
            <div class="pull-left">List Payment</div>
            <div class="widget-icons pull-right">
                <a href="#" class="wminimize">
                    <i class="fa fa-chevron-up"></i>
                </a>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="widget-content" style="padding: 10px">
            <button ng-if="displayField(['<?= Payment::role_admin ?>'])" type="button" class="btn btn-sm btn-primary" onclick="window.location.href = '<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/viewNew' ?>'"><i class="fa fa-plus fa-fw"></i> Tambah Payment</button>
            <?php if ($this->session->flashdata('notifPaymentError') != null) { ?>
                                        <div class="alert alert-danger">
                                            <?=$this->session->flashdata('notifPaymentError')?>
                                            </div>
                                    <?php } ?>
            <div class="page-tables">
                <div class="table-responsive">
                    <div class="clearfix">
                        <br />
                    </div>
                    <table cellpadding="0" cellspacing="0" border="0" id="tabel_list_payment" width="100%" style="white-space: nowrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Payment</th>
                                <th>RAB</th>
                                <!--<th>Supplier</th>-->
                                <!--<th>TOP</th>-->
                                <th>Harga</th>
                                <th>Tanggal Transaksi</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    <div class="clearfix">
                    </div>
                </div>
            </div>
            <!-- End of Modal Section -->
        </div>
    </div>
</div>
<form id="form1"></form>
<div id="konfirmasiModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="judulModal">Konfirmasi Validasi Payment</h4>
            </div>
            <div class="modal-body">
                <h3 id="bodyModal" class="bodyModal">Anda yakin akan memvalidasi Payment ini?</h3>                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="do_validate()" id="buttonYesModal">Ya</button>
                <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Tidak</button>
            </div>
        </div>
    </div>
</div>
<script>
    var tabel_list_Hm = null;
    $(document).ready(function () {
        document.getElementsByClassName('has_sub')[4].setAttribute('class', 'has_sub open');
        initTabelListPayment();
    });
    function confirmDelete(id) {
        $('#form1').attr('action', '<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>/delete');
        $('#form1').html('<input type="hidden" name="payment_id" value="' + id + '">');
        $('#judulModal').html('Konfirmasi Hapus Payment');
        $('#bodyModal').html('Apakah Anda yakin akan menghapus Payment ini?');
        $('#konfirmasiModal').modal();
    }
	function validate(id) {
        $('#form1').attr('action', '<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>/validate');
        $('#form1').html('<input type="hidden" name="payment_id" value="' + id + '">');
        $('#judulModal').html('Konfirmasi Validasi Payment');
        $('#bodyModal').html('Apakah Anda yakin akan memvalidasi Payment ini?');
        $('#konfirmasiModal').modal();
    }
	function reject(id) {
        $('#form1').attr('action', '<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>/reject');
        $('#form1').html('<input type="hidden" name="payment_id" value="' + id + '">');
        $('#judulModal').html('Konfirmasi Menolak Payment');
        $('#bodyModal').html('Apakah Anda yakin akan menolak Payment ini?');
        $('#konfirmasiModal').modal();
    }
    function do_validate() {
        $('#form1').submit();
    }
    function fillUpdate(id) {
        $('#form1').attr('action', '<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>/viewEdit');
        $('#form1').html('<input type="hidden" name="payment_id" value="' + id + '">');
        do_validate();
    }
    function initTabelListPayment() {
        if (!(tabel_list_Hm == null)) {
            tabel_list_bpm.fnDestroy();
        }
        tabel_list_bpm = $('#tabel_list_payment').dataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "method": "post",
                "url": "<?php echo base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>/get_list_payment_datatable",
                "data": {
                },
                "dataSrc": function (json) {
                    jsonData = json.data;
                    console.log(json.data);
                    return json.data;
                }
            },
            "createdRow": function (row, data, index) {
                var id = data[0];
                $('td', row).eq(0).html(index + 1);
                $('td', row).eq(1).html(data[1]);
                $('td', row).eq(2).html(data[11]);
                $('td', row).eq(3).html(parseFloat(data[6]).formatMoney());
                //$('td', row).eq(2).html(data[12]+' '+data[13]);
                $('td', row).eq(4).html(data[4]);
                $('td', row).eq(5).html(data[7]);
                //$('td', row).eq(6).html(data[6]);
                //$('td', row).eq(7).html(data[17]);
                var editDelete = '';
                var status = data[5];
                if (isPermitted(['<?= Payment::role_admin ?>'])) {
                    if (status === '1' || status == '4') {
                        editDelete = '<li><a href="javascript:fillUpdate(' + id + ')"><i class="fa fa-refresh fa-fw"></i> Ubah</a></li>';
                        if (status == '1') {
                            editDelete += '<li><a href="javascript:confirmDelete(' + id + ')"><i class="fa fa-trash-o fa-fw"></i> Hapus</a></li>';
                        }
                    }
                }
                if (isPermitted(['<?= Payment::role_admin ?>'])) {
                    if (status == '2' || status == '5') {
                        editDelete = '<li><a href="javascript:validate(' + id + ')"><i class="fa fa-check fa-fw"></i>Validasi</a></li>' +
                                '<li><a href="javascript:reject(' + id + ')"><i class="fa fa-times fa-fw"></i>Tolak</a></li>';
                    }
                }
                $('td', row).eq(6).html('<div class="btn-group">'
                        + '<button class="btn btn-default btn-xs dropdown-toggle btn-info" data-toggle="dropdown">Aksi <span class="caret"></span></button>'
                        + '<ul class="dropdown-menu">'
                        + '<li><a href="<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/viewDetail?id=' ?>' + id + '"><i class="fa fa-eye fa-fw"></i> Detail</a></li>'
                        + editDelete
                        + '</ul>'
                        + '</div>');
                $(row).attr('id', 'item_' + id);
            }
        });
    }
</script>