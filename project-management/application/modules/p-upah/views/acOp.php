<!-- Page heading -->
<div class="page-head">
    <h2 class="pull-left"><i class="fa fa-building-o"></i> Opname Pekerjaan</h2>
    <!-- Breadcrumb -->
    <div class="bread-crumb pull-right">
        <a href="index.html"><i class="fa fa-home"></i> Home</a> 
        <!-- Divider -->
        <span class="divider">/</span> 
        <a href="#" class="bread-current">Opname</a>
    </div>
    <div class="clearfix"></div>
</div>
<!-- Page heading ends -->

<div class="col-md-12">
    <div class="widget wgreen">
        <div class="widget-head">
            <div class="pull-left">Data List Opname</div>
            <div class="widget-icons pull-right">
                <a href="#" class="wminimize">
                    <i class="fa fa-chevron-up"></i>
                </a>

            </div>
            <div class="clearfix"></div>
        </div>
        <div class="widget-content" style="padding: 10px">
            <button type="button" ng-if="displayField(['<?= Op::role_admin ?>'])" class="btn btn-sm btn-primary" onclick="window.location.href = '<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/viewNewOp' ?>'"><i class="fa fa-plus fa-fw"></i> Tambahkan Opname</button>
            <div class="page-tables">
                <div class="table-responsive">
                    <div class="clearfix">
                        <br />
                    </div>
                    <table cellpadding="0" cellspacing="0" border="0" id="tabelListOP" width="100%" style="white-space: nowrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Tanggal</th>
                                <th>Total Harga</th>
                                <th>Kategori</th>
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
    var tabelListOP = null;
    $(document).ready(function () {
        document.getElementsByClassName('has_sub')[1].setAttribute('class', 'has_sub open');
        //document.getElementsByClassName('has_sub')[1].click();
        initTabelListOP();
    });
    var flag = [];
    function initTabelListOP() {
        if (tabelListOP !== null) {
            tabelListOP.fnDestroy();
        }
        tabelListOP = $("#tabelListOP").dataTable({
            order: [[0, "desc"]],
            "processing": true,
            "serverSide": true,
            "ajax": {
                'method': 'post',
                'data': {
                },
                "url": "<?php echo base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/getListOPDataTable'; ?>",
                "dataSrc": function (json) {
                    console.log(json);
                    jsonData = json.data;
                    return jsonData;
                }
            },
            "createdRow": function (row, data, index) {
                var id = data[0];
                var nomor = index + 1;
                var harga = parseFloat(data[2]);
                var kode = data[1];
                var tanggal = data[10];
                var kategori = data[3];
                var status = data[4];
                $('td', row).eq(0).html(nomor);
                $('td', row).eq(1).html(kode);
                $('td', row).eq(2).html(tanggal);
                $('td', row).eq(3).html(harga.formatMoney(2, ',', '.'));
                $('td', row).eq(4).html(kategori);
                $('td', row).eq(5).html(status);
                var status_validasi = parseInt(data[9]);
                var html = '<div class="btn-group">' +
                        '<button class="btn btn-default btn-xs dropdown-toggle btn-info" data-toggle="dropdown">Aksi <span class="caret"></span></button>' +
                        '<ul class="dropdown-menu">' +
                        '<li><a href="<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>/viewDetail?id=' + id + '"><i class="fa fa-eye fa-fw"></i> Detail</a></li>';
                if (isPermitted(['<?= Op::role_admin ?>']) && (status_validasi === 1 || status_validasi === 4)) {
                    html += '<li><a href="<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>/viewEdit?id=' + id + '"><i class="fa fa-refresh fa-fw"></i> Ubah</a></li>';
                    html += '<li><a href="javascript:showDeleteDialog(' + id + ')"><i class="fa fa-trash-o fa-fw"></i> Hapus</a></li>';
                    if (status_validasi == 1) {

                    }
                } else if (isPermitted(['<?= Op::role_validator ?>']) && (status_validasi == 2 || status_validasi == 5)) {
                    html += '<li><a href="javascript:validate(' + id + ')"><i class="fa fa-check fa-fw"></i>Validasi</a></li>' +
                            '<li><a href="javascript:reject(' + id + ')"><i class="fa fa-times fa-fw"></i>Tolak</a></li>';
                }
                html += '</ul>' +
                        '</div>';
                $('td', row).eq(6).html(html);
                $(row).attr('id', 'opname_' + id)
            }
        });
    }

    function reject(id) {
        var url = "<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>/reject";
        $('#formDetail').attr('action', url);
        $('#formDetail').html('<input type="hidden" name="ID_OPNAME" value="' + id + '">');
        $('#konfirmasiModal').modal();
        $('#judulModal').html('Konfirmasi Tolak Opname');
        $('#bodyModal').html('Apakah Anda yakin akan menolak Opname ini?');
    }

    function showDeleteDialog(id) {
        var url = "<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>/delete";
        $('#formDetail').attr('action', url);
        $('#formDetail').html('<input type="hidden" name="ID_OPNAME" value="' + id + '">');
        $('#konfirmasiModal').modal();
        $('#judulModal').html('Konfirmasi Hapus Opname');
        $('#bodyModal').html('Apakah Anda yakin akan menghapus Opname ini?');
    }

    function submitForm() {
        //$("#deleteModal").modal("hide");
        $("#formDetail").submit();
    }

    function validate(id) {
        var url = "<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>/validate";
        $('#formDetail').attr('action', url);
        $('#formDetail').html('<input type="hidden" name="ID_OPNAME" value="' + id + '">');
        $('#konfirmasiModal').modal();
        $('#judulModal').html('Konfirmasi Validasi Opname');
        $('#bodyModal').html('Apakah Anda yakin akan memvalidasi Opname ini?');
    }
</script>