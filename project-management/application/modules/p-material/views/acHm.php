<!-- Page heading -->
<div class="page-head">
    <h2 class="pull-left"><i class="fa fa-building-o"></i> Hutang Material</h2>
    <!-- Breadcrumb -->
    <div class="bread-crumb pull-right">
        <a href="index.html"><i class="fa fa-home"></i>Home</a>
        <!-- Divider -->
        <span class="divider">/</span> 
        <a href="#" class="bread-current">HM</a>
    </div>
    <div class="clearfix"></div>
</div>
<!-- Page heading ends -->

<div class="col-md-12">
    <div class="widget wgreen">
        <div class="widget-head">
            <div class="pull-left">List Hutang Material</div>
            <div class="widget-icons pull-right">
                <a href="#" class="wminimize">
                    <i class="fa fa-chevron-up"></i>
                </a>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="widget-content" style="padding: 10px">
            <button ng-if="displayField(['<?= Hm::role_admin ?>'])" type="button" class="btn btn-sm btn-primary" onclick="window.location.href = '<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/viewNew' ?>'"><i class="fa fa-plus fa-fw"></i> Tambah HM</button>
            <div class="clearfix">
                <br />
            </div>
            <div class="page-tables">
                <div class="table-responsive" style="overflow-x: auto;">
                    <table cellpadding="0" cellspacing="0" border="0" id="tabel_list_bpm" width="100%" style="white-space: nowrap">
                        <thead>
                            <tr>
                                <th>No </th>
                                <th>Kode HM</th>
                                <th>Tanggal</th>
                                <th>RAB Penerima</th>
                                <th>RAB Pemberi</th>
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
        initTabelListHM();
    });
    function confirmDelete(id) {
        $('#form1').attr('action', '<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>/delete');
        $('#form1').html('<input type="hidden" name="ID_HM" value="' + id + '">');
        $('#judulModal').html('Konfirmasi Hapus HM');
        $('#bodyModal').html('Apakah Anda yakin akan menghapus HM ini?');
        $('#konfirmasiModal').modal();
    }
    function reject(id) {
        $('#form1').attr('action', '<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>/reject');
        $('#form1').html('<input type="hidden" name="ID_HM" value="' + id + '">');
        $('#judulModal').html('Konfirmasi Tolak HM');
        $('#bodyModal').html('Apakah Anda yakin akan menolak HM ini?');
        $('#konfirmasiModal').modal();
    }
    function validate(id) {
        $('#form1').attr('action', '<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>/validate');
        $('#form1').html('<input type="hidden" name="ID_HM" value="' + id + '">');
        $('#judulModal').html('Konfirmasi Validasi HM');
        $('#bodyModal').html('Apakah Anda yakin akan memvalidasi HM ini?');
        $('#konfirmasiModal').modal();
    }
    function do_validate() {
        $('#form1').submit();
    }
    function fillUpdate(id) {
        $('#form1').attr('action', '<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>/viewEdit');
        $('#form1').html('<input type="hidden" name="ID_HM" value="' + id + '">');
        do_validate();
    }
    function initTabelListHM() {
        if (!(tabel_list_Hm == null)) {
            tabel_list_bpm.fnDestroy();
        }
        tabel_list_bpm = $('#tabel_list_bpm').dataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "method": "post",
                "url": "<?php echo base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>/get_list_hm_datatable",
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

                if (isPermitted(['<?= Hm::role_admin ?>'])) {
                    if (data[8] === '1' || data[8] == '4') {
                        editDelete = '<li><a href="javascript:fillUpdate(' + id + ')"><i class="fa fa-refresh fa-fw"></i> Ubah</a></li>';
                        if (data[8] == '1') {
                            editDelete += '<li><a href="javascript:confirmDelete(' + id + ')"><i class="fa fa-trash-o fa-fw"></i> Hapus</a></li>';
                        }
                    }
                }
                if (isPermitted(['<?= Hm::role_admin ?>'])) {
                    if (data[8] == '2' || data[8] == '5') {
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
                var base_url = '<?= base_url(); ?>';
                //$('td', row).eq(5).html('<button class="btn btn-xs btn-success" onclick="addRap(\'' + data[8] + "','" + data[2] + "','" + data[0] + "','" + data[5] + "','" + data[4] + "','" + data[3] + '\')><i class="fa fa-plus fa-fw"></i> Pilih</button>');
                $(row).attr('id', 'item_' + id);
            }
        });
    }
</script>