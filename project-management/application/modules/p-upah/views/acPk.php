<script src="<?php echo site_url() ?>assets/default/js/accounting.min.js"></script>
<script type="text/javascript">

    function showDeleteDialog(id) {
        $("#delete_form_id").val(id);
        $("#delete_form_name").text($("#pp_kode_" + id).text());
        $("#deleteModal").modal();
    }

    function confirmDelete() {
        $("#deleteModal").modal("hide");
        $("#delete_form").submit();
    }
    
     function fillUpdate(id, idx) {
        var data = $("#tablePK").dataTable().fnGetData()[idx];
        document.location = "<?php echo base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/viewUpdate/'; ?>" + id + "_" + data[16];

    }

    var current_id_detail = -1;
    function fillDetail(id, idx) {
        
        var data = $("#tablePK").dataTable().fnGetData()[idx];
        document.location = "<?php echo base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/viewDetail/'; ?>" + data[0] + "_" + data[16];
        /*
        if (current_id_detail != id) {
            var data = $("#tablePK").dataTable().fnGetData()[idx];
            $('#row_detail').remove();
            current_id_detail = id;
            $("<tr id='row_detail'><td colspan='9'><div style='margin-top:10px' id='form_detail'></div></td></tr>").insertAfter("#item_" + current_id_detail);
            var x = $('#template_form_detail').clone();

            x.appendTo("#form_detail");
            $('#form_detail #pp_kode_detail').html(data[1]);
            $('#form_detail #rap_kode_detail').html(data[17]);
            $('#form_detail #pp_proyek_detail').html(data[15]);
            //$('#form_detail #total_detail').html(accounting.formatMoney(Number(data[30]), "Rp. ", 2, ".", ","));
            $('#form_detail #pp_proyek_detail').html(data[15]);
            $('#form_detail #detail_created_by').html(data[12]);
            $('#form_detail #detail_created_at').html(data[2]);
            $('#form_detail #detail_updated_by').html(data[6]);
            $('#form_detail #detail_updated_at').html(data[3]);
            $('#form_detail #detail_validated_by').html(data[8]);
            $('#form_detail #detail_validated_at').html(data[4]);
            $('#pp_data_row').append('<img id="snake_loader" src="<?= base_url() ?>/assets/default/img/snake_loader.gif" width="20">');
            $.ajax({
                type: "POST",
                url: "<?php echo base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/getDetail/'; ?>" + data[0] + "_" + data[16],
                success: function(result) {
                    var val = JSON.parse(result);
                    console.log(val);
                    if (val.length > 0) {
                        $('#pp_data').remove();
                        var materialData = "";
                        for (var i = 0; i < val.length; i++) {
                            materialData += '<tr>' +
                                    '<td>' + val[i].ANALISA_KODE + '</td>' +
                                    '<td colspan="3">' + val[i].ANALISA_NAMA + '</td>' +
                                    '<td>' + val[i].VOLUME_PK + '</td>' +
                                    '<td>' + val[i].SATUAN + '</td>' +
                                    '</tr>';

                        }
                        //getListProject();
                        $(materialData).insertAfter("#pp_data_row");
                        $("#snake_loader").remove();
                    }
                    else {
                        $('#pp_data_row').append("<td colspan='6' id='pp_data'>&nbsp;</td>");
                    }
                    $("#snake_loader").remove();
                }
            });
            x.slideDown();

        } else {
            $('#form_detail').slideUp();
            $('#row_detail').slideUp();
            current_id_detail = -1;
        }*/
    }

    function requestValidation(id, idx) {
        var data = $("#tablePK").dataTable().fnGetData()[idx];
        var pp_id = id;
        var rap_id = data[16];
        var status = data[9];
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>p-upah/pk/requestValidation",
            data: {
                PK_ID: pp_id,
                RAB_ID: rap_id,
                STATUS: status
            },
            cache: false,
            success: function(result) {
                console.log(result);
                document.location.reload();
            }
        });
    }

    function validate(id, value) {
        if (Number(value) === 1) {
            $('#validate_form_id').val(id);
            $('#validate_form').submit();
        } else {
            $('#reject_form_id').val(id);
            $('#reject_form').submit();
        }
    }

    $(document).ready(function() {
        var invisibleColumn = [];
        var level = 0;

        if (isPermitted(['pk_admin'])) {
            level = 2;
        }
        else if (isPermitted(['pk_validator'])) {
            level = 1;
        }

        $("#tablePK").dataTable(
                {
                    "processing": true,
                    "serverSide": true,
                    "ajax": "<?php echo base_url(); ?>p-upah/pk/getViewPk/",
                    "createdRow": function(row, data, index) {
                        var id = data[0];
                        var status = Number(data[9]);
                        var text = '<button class="btn btn-primary btn-xs" onclick="fillDetail(' + id + ',' + index + ');"><i class="fa fa-eye fa-fw"></i> Detail</button>';
                        if (isPermitted(['pk_admin']) && status) {
                            var append = '';
                            if (status === 1 || status === 4) {
                                append = 'btn-info" ';
                            } else {
                                append = '" disabled';
                            }
                            text += '<button class="btn btn-default btn-xs ' + append + ' onclick="fillUpdate(' + id + ',' + index + ');"><i class="fa fa-pencil fa-fw"></i> Edit</button>';
                            if (status === 1) {
                                append = 'btn-danger" ';
                            } else {
                                append = '" disabled';
                            }

                            text += '<button class="btn btn-default btn-xs ' + append + ' onclick="showDeleteDialog(' + id + ',' + index + ');"><i class="fa fa-trash-o fa-fw"></i> Hapus</button>';
                            if (status === 1 || status === 6) {
                                text += '<button class="btn btn-xs btn-success" onclick="requestValidation(' + id + ',' + index + ');"><i class="fa fa-check fa-fw"></i> Ajukan Validasi</button>';
                            }
                        }
                        if (isPermitted(['pk_validator'])) {
                            var append = '';
                            if (status === 2 || status === 5) {
                                append = 'btn-success"';
                            } else {
                                append = '" disabled';
                            }
                            text += '<button class="btn btn-default btn-xs ' + append + ' onclick="validate(' + id + ',1);"><i class="fa fa-check fa-fw"></i> Validasi</button>';

                            if (status === 2 || status === 5) {
                                append = 'btn-danger "';
                            } else {
                                append = '" disabled';
                            }
                            text += '<button class="btn btn-default btn-xs ' + append + ' onclick="validate(' + id + ',0);"><i class="fa fa-times fa-fw"></i> Tolak</button>';
                        }
                        $('td', row).eq(3).html(text);
                        $('td', row).eq(0).html(data[1]);
                        $('td', row).eq(1).html(data[17]);
                        
                        $('td', row).eq(2).html(data[10]);
                        $(row).attr('id', 'item_' + id);

                    },
                    "columnDefs": [
                        {
                            "targets": invisibleColumn,
                            "visible": false
                        }
                    ]
                });




    });


</script>


<style>
    .currency{
        margin-right: 10px;
        display: inline-block;
    }
    .number{
        display: inline-block;  
        text-align: right;
    }
    th, td {
        white-space: nowrap; 
    }
    .headerDetail {
        background-color: #167CAC;
        color: #FFF;
    }
</style>
<!-- Page heading -->
<div class="page-head">
    <h2 class="pull-left"><i class="fa fa-building-o"></i> Permintaan Pekerjaan</h2>
    <!-- Breadcrumb -->
    <div class="bread-crumb pull-right">
        <a href="index.html"><i class="fa fa-home"></i> Home</a> 
        <!-- Divider -->
        <span class="divider">/</span> 
        <a href="#" class="bread-current">PK</a>
    </div>
    <div class="clearfix"></div>
</div>
<!-- Page heading ends -->

<div class="col-md-12">
    <div class="widget wgreen">
        <div class="widget-head">
            <div class="pull-left">Data List PK</div>
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
            <!-- Modal Section -->
            <div id="deleteModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">Konfirmasi penghapusan PK</h4>
                        </div>
                        <div class="modal-body">
                            <h3>Anda yakin untuk menghapus PK <span id="delete_form_name"></span>?</h3>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" onclick="confirmDelete();">Ya</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Tidak</button>
                        </div>
                    </div>
                </div>
            </div>
            <form action="<?= base_url() ?>p-upah/pk/delete" method="post" id="delete_form">
                <input type="hidden" id="delete_form_id" name="<?= mPermintaanPekerjaan::ID ?>" value="0" />
            </form>
            <form action="<?= base_url() ?>p-upah/pk/approve" method="post" id="validate_form">
                <input type="hidden" id="validate_form_id" name="<?= mPermintaanPekerjaan::ID ?>" value="0" />
            </form>
            <form action="<?= base_url() ?>p-upah/pk/reject" method="post" id="reject_form">
                <input type="hidden" id="reject_form_id" name="<?= mPermintaanPekerjaan::ID ?>" value="0" />
            </form>



            <button type="button" class="btn btn-sm btn-primary" onclick="window.location.href = '<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/viewNewPk' ?>'" ng-if="displayField(['pk_admin'])"><i class="fa fa-plus fa-fw"></i> Tambahkan PK</button>
            <div class="page-tables">
                <div class="table-responsive" style="overflow-x: auto">
                    <div class="clearfix">
                        <br />
                    </div>
                    <table cellpadding="0" cellspacing="0" border="0" id="tablePK" width="100%" style="white-space: nowrap">
                        <thead>
                            <tr>
                                <th>Kode PK</th>
                                <th>Kode RAP</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                    </table>
                    <div class="clearfix">
                    </div>
                </div>

                <div id="template_form_detail" style="display:none; margin-bottom: 10px">
                    <table class="table table-bordered centerTable">
                        <tbody>
                            <tr>
                                <td align="center" class="headerDetail" colspan="6"><strong>DETAIL PERMINTAAN PEKERJAAN</strong></td>
                            </tr>
                            <tr>
                                <td class="headerDetail" width="100"><strong>Kode Permintaan Pekerjaan</strong></td>
                                <td id="pp_kode_detail"></td>
                                <td class="headerDetail" width="100"><strong>Kode RAP</strong></td>
                                <td id="rap_kode_detail" colspan="3"></td>
                            </tr>
                            <tr>
                                <td class="headerDetail" width="100"><strong>Proyek</strong></td>
                                <td id="pp_proyek_detail"></td>
                                <td>&nbsp;</td>
                                <td id="total_detail" colspan="3"></td>
                            </tr>
                            <tr>
                                <td class="headerDetail"><strong>Kode Analisa</strong></td>
                                <td class="headerDetail" colspan="3"><strong>Nama Analisa</strong></td>
                                <td class="headerDetail"><strong>Volume</strong></td>
                                <td class="headerDetail"><strong>Satuan</strong></td>
                            </tr>
                            <tr id="pp_data_row">
                                <td colspan="6" id="pp_data">&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="headerDetail" width="100"><strong>Dibuat oleh</strong></td>
                                <td id="detail_created_by" colspan="3"></td>
                                <td class="headerDetail"><strong>pada tanggal</strong></td>
                                <td id="detail_created_at" width="100"></td>
                            </tr>
                            <tr>
                                <td class="headerDetail" width="100"><strong>Diedit terakhir oleh</strong></td>
                                <td id="detail_updated_by" colspan="3"></td>
                                <td class="headerDetail"><strong>pada tanggal</strong></td>
                                <td id="detail_updated_at" width="100"></td>
                            </tr>
                            <tr>
                                <td class="headerDetail" width="100"><strong>Diperiksa oleh</strong></td>
                                <td id="detail_validated_by" colspan="3"></td>
                                <td class="headerDetail"><strong>pada tanggal</strong></td>
                                <td id="detail_validated_at" width="100"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- End of Modal Section -->
        </div>

    </div>
</div>
