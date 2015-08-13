<!-- Page heading -->
<div class="page-head">
    <h2 class="pull-left"><i class="fa fa-building-o"></i> Laporan Pengeluaran Upah</h2>
    <!-- Breadcrumb -->
    <div class="bread-crumb pull-right">
        <a href="index.html"><i class="fa fa-home"></i> Home</a> 
        <!-- Divider -->
        <span class="divider">/</span> 
        <a href="#" class="bread-current">Lpu</a>
    </div>
    <div class="clearfix"></div>
</div>
<!-- Page heading ends -->

<div class="col-md-12">
    <div class="widget wgreen">
        <div class="widget-head">
            <div class="pull-left">Data List LPU</div>
            <div class="widget-icons pull-right">
                <a href="#" class="wminimize">
                    <i class="fa fa-chevron-up"></i>
                </a>

            </div>
            <div class="clearfix"></div>
        </div>
        <div class="widget-content" style="padding: 10px">
            <button type="button" ng-if="displayField(['<?= Lpu::role_admin ?>'])" class="btn btn-sm btn-primary" onclick="window.location.href = '<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/viewNew' ?>'"><i class="fa fa-plus fa-fw"></i> Tambahkan LPU</button>
            <div class="page-tables">
                <div class="table-responsive">
                    <div class="clearfix">
                        <br />
                    </div>
                    <table cellpadding="0" cellspacing="0" border="0" id="tabel_list_lpu" width="100%" style="white-space: nowrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode LPU</th>
                                <th>Kode RAB</th>
                                <th>Tanggal</th>
                                <!--<th>Total Harga</th>-->
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
    var tabel_list_lpu = null;
    $(document).ready(function () {
        document.getElementsByClassName('has_sub')[1].setAttribute('class', 'has_sub open');
        init_tabel_list_lpu();
    });
    var flag = [];
    function init_tabel_list_lpu() {
        if (tabel_list_lpu !== null) {
            tabel_list_lpu.fnDestroy();
        }
        tabel_list_lpu = $("#tabel_list_lpu").dataTable({
            "processing": true,
            "serverSide": true,
            order: [[0, "desc"]],
            "ajax": {
                'method': 'post',
                'data': {
                },
                "url": "<?php echo base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/get_list_lpu_datatable'; ?>",
                "dataSrc": function (json) {
                    jsonData = json.data;
                    return jsonData;
                }
            },
            "createdRow": function (row, data, index) {
                var id = data[0];
                $('td', row).eq(0).html(index + 1);
                $('td', row).eq(1).html(data[1]);
                $('td', row).eq(2).html(data[5] + ' ' + data[7]);
                $('td', row).eq(3).html(data[2]);
                $('td', row).eq(4).html(data[6]);
                //$('td', row).eq(4).html(parseFloat(data[4]).formatMoney());
                var status_validasi = parseInt(data[3]);
                var html = '<div class="btn-group">' +
                        '<button class="btn btn-default btn-xs dropdown-toggle btn-info" data-toggle="dropdown">Aksi <span class="caret"></span></button>' +
                        '<ul class="dropdown-menu">' +
                        '<li><a href="<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>/viewDetail?id=' + id + '"><i class="fa fa-eye fa-fw"></i> Detail</a></li>';
                if (isPermitted(['<?= Lpu::role_admin ?>']) && (status_validasi === 1 || status_validasi === 4)) {
                    html += '<li><a href="<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>/viewEdit?id=' + id + '"><i class="fa fa-refresh fa-fw"></i> Ubah</a></li>';
                    html += '<li><a href="javascript:showDeleteDialog(' + id + ')"><i class="fa fa-trash-o fa-fw"></i> Hapus</a></li>';
                } else if (isPermitted(['<?= Lpu::role_validator ?>']) && (status_validasi == 2 || status_validasi == 5)) {
                    html += '<li><a href="javascript:validate(' + id + ')"><i class="fa fa-check fa-fw"></i>Validasi</a></li>' +
                            '<li><a href="javascript:reject(' + id + ')"><i class="fa fa-times fa-fw"></i>Tolak</a></li>';
                }
                html += '</ul>' +
                        '</div>';
                $('td', row).eq(5).html(html);
                $(row).attr('id', 'opname_' + id)
            }
        });
    }

    function reject(id) {
        var url = "<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>/reject";
        $('#formDetail').attr('action', url);
        $('#formDetail').html('<input type="hidden" name="id" value="' + id + '">');
        $('#konfirmasiModal').modal();
        $('#judulModal').html('Konfirmasi Tolak Opname');
        $('#bodyModal').html('Apakah Anda yakin akan menolak LPU ini?');
    }

    function showDeleteDialog(id) {
        var url = "<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>/delete";
        $('#formDetail').attr('action', url);
        $('#formDetail').html('<input type="hidden" name="id" value="' + id + '">');
        $('#konfirmasiModal').modal();
        $('#judulModal').html('Konfirmasi Hapus Opname');
        $('#bodyModal').html('Apakah Anda yakin akan menghapus LPU ini?');
    }

    function submitForm() {
        //$("#deleteModal").modal("hide");
        $("#formDetail").submit();
    }

    function validate(id) {
        var url = "<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) ?>/validate";
        $('#formDetail').attr('action', url);
        $('#formDetail').html('<input type="hidden" name="id" value="' + id + '">');
        $('#konfirmasiModal').modal();
        $('#judulModal').html('Konfirmasi Validasi Opname');
        $('#bodyModal').html('Apakah Anda yakin akan memvalidasi LPU ini?');
    }
</script>