<!-- Page heading -->
<div class="page-head">
    <h2 class="pull-left"><i class="fa fa-building-o"></i>Laporan Penerimaan Barang</h2>
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
            <div class="pull-left">Data LPB (Laporan Penerimaan Barang)</div>
            <div class="widget-icons pull-right">
                <a href="#" class="wminimize">
                    <i class="fa fa-chevron-up"></i>
                </a>

            </div>
            <div class="clearfix"></div>
        </div>
        <div class="widget-content" style="padding: 10px">
            <!-- Modal Section -->

            <button ng-if="displayField(['<?= lpb::role_admin ?>'])" type="button" class="btn btn-sm btn-primary" onclick="window.location.href = '<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/viewNewLpb' ?>'"><i class="fa fa-plus fa-fw"></i> Tambahkan LPB</button>
            <div class="page-tables">
                <div class="table-responsive">
                    <div class="clearfix">
                        <br />
                    </div>
                    <table cellpadding="0" cellspacing="0" border="0" id="tabel_list_lpb" width="100%" style="white-space: nowrap">
                        <thead>
                            <tr>
                                <th>No </th>
                                <th>Kode PB</th>
                                <th>Surat Jalan</th>
                                <th>No Kendaraan</th>
                                <th>Gudang</th>
                                <th>Supplier</th>
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
        </div>
    </div>
</div>
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
                <button type="button" class="btn btn-primary" onclick="do_validate()" id="buttonYesModal">Ya</button>
                <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Tidak</button>
            </div>
        </div>
    </div>
</div>
<form id="formDetail" method="get"></form>
<script>
    //tabel_list_lpb
    var tabel_list_lpb = null;
    $(document).ready(function () {
        document.getElementsByClassName('has_sub')[2].setAttribute('class', 'has_sub open');
        initTabelListLPB();
    });
    function initTabelListLPB() {
        if (!(tabel_list_lpb == null)) {
            tabel_list_lpb.fnDestroy();
        }
        tabel_list_lpb = $('#tabel_list_lpb').dataTable({
            order: [[0, "desc"]],
            "processing": true,
            "serverSide": true,
            "ajax": {
                'method': 'post',
                "url": "<?php echo base_url() ?>p-material/lpb/getListLPBDataTable",
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
                $('td', row).eq(4).html(data[6] + ' ' + data[7]);
                $('td', row).eq(5).html(data[9] + ' ' + data[10]);
                $('td', row).eq(6).html(data[4]);
                var tombol = '<div class="btn-group">'
                        + '<button class="btn btn-default btn-xs dropdown-toggle btn-info" data-toggle="dropdown">Aksi <span class="caret"></span></button>'
                        + '<ul class="dropdown-menu">'
                        + '<li><a href="<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/viewDetail/' ?>' + id + '"><i class="fa fa-eye fa-fw"></i> Detail</a></li>'
                //+ '<li><a href="javascript:fillUpdate(' + id + ')"><i class="fa fa-refresh fa-fw"></i> Ubah</a></li>'
                //+ '<li><a href="javascript:confirmDelete(' + id + ')"><i class="fa fa-trash-o fa-fw"></i> Hapus</a></li>'
                //+ '</ul>'
                //+ '</div>';
                if (isPermitted(['<?= lpb::role_admin ?>'])) {
                    if (data[5] == '1' || data[5] == '4') {
                        tombol += '<li><a href="javascript:fillUpdate(' + id + ')"><i class="fa fa-refresh fa-fw"></i>Ubah</a></li>';
                        tombol += '<li><a href="javascript:confirmDelete(' + id + ')"><i class="fa fa-trash-o fa-fw"></i>Hapus</a></li>';
                    }
                    if (data[5] == '1') {

                    }
                }
                if (isPermitted(['<?= lpb::role_validator ?>'])) {
                    if (data[5] == '2' || data[5] == '5') {
                        tombol += '<li><a href="javascript:validate(' + id + ')"><i class="fa fa-check fa-fw"></i>Validasi</a></li>'
                                + '<li><a href="javascript:reject(' + id + ')"><i class="fa fa-times fa-fw"></i>Tolak</a></li>';
                    }
                }
                tombol += '</ul>'
                        + '</div>';
                $('td', row).eq(7).html(tombol);
                var base_url = '<?= base_url(); ?>';
                $(row).attr('id', 'item_' + id);
            }
        });
    }
    function fillUpdate(id) {
        var url = "<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>/viewEdit";
        $('#formDetail').attr('action', url);
        $('#formDetail').html('<input type="hidden" name="ID_LPB" value="' + id + '">');
        $('#formDetail').submit();
    }
    function confirmDelete(id) {
        var url = "<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>/delete";
        $('#formDetail').attr('action', url);
        $('#formDetail').html('<input type="hidden" name="ID_LPB" value="' + id + '">');
        $('#konfirmasiModal').modal();
        $('#judulModal').html('Konfirmasi Hapus LPB');
        $('#bodyModal').html('Apakah Anda yakin akan menghapus LPB ini?');
        //$('#buttonYesModal').attr('onclick', 'do_delete()');
    }
    function reject(id) {
        var url = "<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>/reject";
        $('#formDetail').attr('action', url);
        $('#formDetail').html('<input type="hidden" name="ID_LPB" value="' + id + '">');
        $('#konfirmasiModal').modal();
        $('#judulModal').html('Konfirmasi Reject LPB');
        $('#bodyModal').html('Apakah Anda yakin akan me-reject LPB ini?');
    }
    function validate(id) {
        var url = "<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>/validate";
        $('#formDetail').attr('action', url);
        $('#formDetail').html('<input type="hidden" name="ID_LPB" value="' + id + '">');
        $('#konfirmasiModal').modal();
        $('#judulModal').html('Konfirmasi Validasi LPB');
        $('#bodyModal').html('Apakah Anda yakin akan memvalidasi LPB ini?');
    }
    function do_validate() {
        $('#formDetail').submit();
    }
</script>