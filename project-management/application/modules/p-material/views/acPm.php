<!-- Page heading -->
<div class="page-head">
    <h2 class="pull-left"><i class="fa fa-building-o"></i> Pengembalian Material</h2>
    <!-- Breadcrumb -->
    <div class="bread-crumb pull-right">
        <a href="index.html"><i class="fa fa-home"></i>Home</a>
        <!-- Divider -->
        <span class="divider">/</span> 
        <a href="#" class="bread-current">PM</a>
    </div>
    <div class="clearfix"></div>
</div>
<!-- Page heading ends -->

<div class="col-md-12">
    <div class="widget wgreen">
        <div class="widget-head">
            <div class="pull-left">List Pengembalian Material</div>
            <div class="widget-icons pull-right">
                <a href="#" class="wminimize">
                    <i class="fa fa-chevron-up"></i>
                </a>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="widget-content" style="padding: 10px">
            <button ng-if="displayField(['<?= Pm::role_admin ?>'])" type="button" class="btn btn-sm btn-primary" onclick="window.location.href = '<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/viewNew' ?>'"><i class="fa fa-plus fa-fw"></i> Tambah PM</button>
            <div class="page-tables">
                <div class="table-responsive">
                    <div class="clearfix">
                        <br />
                    </div>
                    <table cellpadding="0" cellspacing="0" border="0" id="tabel_list_pm" width="100%" style="white-space: nowrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode PM</th>
                                <th>Kode HM</th>
                                <th>Tanggal</th>
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
                <h4 class="modal-title" id="judulModal">Konfirmasi Validasi LPB</h4>
            </div>
            <div class="modal-body">
                <h3 id="bodyModal" class="bodyModal">Anda yakin akan memvalidasi LPB ini?</h3>                
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
        document.getElementsByClassName('has_sub')[2].setAttribute('class', 'has_sub open');
        initTabelListPM();
    });
    function confirmDelete(id) {
        $('#form1').attr('action', '<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>/delete');
        $('#form1').append('<input type="hidden" name="ID_PM" value="' + id + '">');
        $('#judulModal').html('Konfirmasi Hapus BPM');
        $('#bodyModal').html('Apakah Anda yakin akan menghapus PM ini?');
        $('#konfirmasiModal').modal();
    }
    function do_validate() {
        $('#form1').submit();
    }
    function fillUpdate(id) {
        $('#form1').attr('action', '<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>/viewEdit');
        $('#form1').append('<input type="hidden" name="ID_PM" value="' + id + '">');
        do_validate();
    }
    function initTabelListPM() {
        if (!(tabel_list_Hm == null)) {
            tabel_list_bpm.fnDestroy();
        }
        tabel_list_bpm = $('#tabel_list_pm').dataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "method": "post",
                "url": "<?php echo base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>/get_list_pm_datatable",
                "data": {
                },
                "dataSrc": function (json) {
                    jsonData = json.data;
                    return json.data;
                }
            },
            "createdRow": function (row, data, index) {
                var id = data[0];
                $('td', row).eq(0).html(index + 1);
                var editDelete = '';
                var status = data[6];
                if (isPermitted(['<?= Pm::role_admin ?>'])) {
                    if (status === '1' || status == '4') {
                        editDelete = '<li><a href="javascript:fillUpdate(' + id + ')"><i class="fa fa-refresh fa-fw"></i> Ubah</a></li>';
                        if (status == '1') {
                            editDelete += '<li><a href="javascript:confirmDelete(' + id + ')"><i class="fa fa-trash-o fa-fw"></i> Hapus</a></li>';
                        }
                    }
                }
                if (isPermitted(['<?= Pm::role_admin ?>'])) {
                    if (status == '2' || status == '5') {
                        editDelete = '<li><a href="javascript:validate(' + id + ')"><i class="fa fa-check fa-fw"></i>Validasi</a></li>' +
                                '<li><a href="javascript:reject(' + id + ')"><i class="fa fa-times fa-fw"></i>Tolak</a></li>';
                    }
                }
                $('td', row).eq(5).html('<div class="btn-group">'
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