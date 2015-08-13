<!-- Page heading -->
<div class="page-head">
    <h2 class="pull-left"><i class="fa fa-building-o"></i>List Bon Pemakaian Barang</h2>
    <!-- Breadcrumb -->
    <div class="bread-crumb pull-right">
        <a href="index.html"><i class="fa fa-home"></i>Home</a>
        <!-- Divider -->
        <span class="divider">/</span> 
        <a href="#" class="bread-current">PB</a>
    </div>
    <div class="clearfix"></div>
</div>
<!-- Page heading ends -->

<div class="col-md-12">
    <div class="widget wgreen">
        <div class="widget-head">
            <div class="pull-left">List BPM (Bon Pemakaian Barang)</div>
            <div class="widget-icons pull-right">
                <a href="#" class="wminimize">
                    <i class="fa fa-chevron-up"></i>
                </a>
                <a href="#" class="wclose">
                    <i class="fa fa-times"></i>
                </a>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="widget-content" style="padding: 10px">

            <button ng-if="displayField(['<?= Bpm::role_admin ?>'])" type="button" class="btn btn-sm btn-primary" onclick="window.location.href = '<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/viewNewBPM' ?>'"><i class="fa fa-plus fa-fw"></i> Tambah BPM</button>
            <div class="page-tables">
                <div class="table-responsive" style="overflow-x: scroll">
                    <div class="clearfix">
                        <br />
                    </div>
                    <table cellpadding="0" cellspacing="0" border="0" id="tabel_list_bpm" width="100%" style="white-space: nowrap">
                        <thead>
                            <tr>
                                <th>No </th>
                                <th>Kode BPM</th>
                                <th>Project</th>
                                <th>Gudang</th>
                                <th>Tanggal</th>
                                <th>Keterangan</th>
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
    var tabel_list_bpm = null;
    $(document).ready(function () {
        document.getElementsByClassName('has_sub')[2].setAttribute('class', 'has_sub open');
        initTabelListBPM();
    });
    function confirmDelete(id) {
        $('#form1').attr('action', '<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>/delete');
        $('#form1').html('<input type="hidden" name="id_bpm" value="' + id + '">');
        $('#judulModal').html('Konfirmasi Hapus BPM');
        $('#bodyModal').html('Apakah Anda yakin akan menghapus BPM ini?');
        $('#konfirmasiModal').modal();
    }
    function do_validate() {
        $('#form1').submit();
    }
    function fillUpdate(id) {
        $('#form1').attr('action', '<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>/viewEdit');
        $('#form1').html('<input type="hidden" name="ID_BPM" value="' + id + '">');
        do_validate();
    }
    function validate(id) {
        $('#form1').attr('action', '<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>/validate');
        $('#form1').html('<input type="hidden" name="ID_BPM" value="' + id + '">');
        $('#judulModal').html('Konfirmasi Validasi BPM');
        $('#bodyModal').html('Apakah Anda yakin akan memvalidasi BPM ini?');
        $('#konfirmasiModal').modal();
    }
    function reject(id) {
        $('#form1').attr('action', '<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>/reject');
        $('#form1').html('<input type="hidden" name="ID_BPM" value="' + id + '">');
        $('#judulModal').html('Konfirmasi Tolak BPM');
        $('#bodyModal').html('Apakah Anda yakin akan menolak BPM ini?');
        $('#konfirmasiModal').modal();
    }
    function initTabelListBPM() {
        if (!(tabel_list_bpm == null)) {
            tabel_list_bpm.fnDestroy();
        }
        tabel_list_bpm = $('#tabel_list_bpm').dataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "method": "post",
                "url": "<?php echo base_url() ?>p-material/bpm/getListBPMDataTable",
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
                $('td', row).eq(2).html(data[6] + ' ' + data[7]);
                $('td', row).eq(3).html(data[8] + ' ' + data[9]);
                $('td', row).eq(4).html(data[2]);
                $('td', row).eq(5).html(data[3]);
                $('td', row).eq(6).html(data[4]);
                var editDelete = '';

                if (isPermitted(['<?= Bpm::role_admin ?>'])) {
                    if (data[5] === '1' || data[5] == '4') {
                        editDelete = '<li><a href="javascript:fillUpdate(' + id + ')"><i class="fa fa-refresh fa-fw"></i> Ubah</a></li>';
                        editDelete += '<li><a href="javascript:confirmDelete(' + id + ')"><i class="fa fa-trash-o fa-fw"></i> Hapus</a></li>';
                        if (data[5] == '1') {

                        }
                    }
                }
                if (isPermitted(['<?= Bpm::role_admin ?>'])) {
                    if (data[5] == '2' || data[5] == '5') {
                        editDelete = '<li><a href="javascript:validate(' + id + ');"><i class="fa fa-check fa-fw"></i>Validasi</a></li>' +
                                '<li><a href="javascript:reject(' + id + ');"><i class="fa fa-times fa-fw"></i>Tolak</a></li>';
                    }
                }
                $('td', row).eq(7).html('<div class="btn-group">'
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