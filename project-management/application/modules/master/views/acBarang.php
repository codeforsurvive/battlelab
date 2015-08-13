<script>
    var current_id_update = -1;
    var current_id_detail = -1;
    var jsonData;

    function fillUpdate(id, idx) {
        $('.simpanDraft').hide();
        $('.simpanUpdate').hide();

        if (current_id_update != id) {
            current_id_update = id;
            var data = $('#tableBarang').dataTable().fnGetData()[idx];
            $("#row_ubah").remove();
            $("<tr id='row_ubah'><td colspan='9'><div style='margin-top:10px' id='form_ubah'></div></td></tr>").insertAfter("#item_" + current_id_update);
            var x = $("#template_form_ubah").clone();
            x.appendTo("#form_ubah");
            if (data[10] == 1 || data[10] == 2) {
                $('.simpanDraft').show();
            } else {
                $('.simpanUpdate').show();
            }
            $("#form_ubah #bar_id").val(data[0]);
            $("#form_ubah #bar_nama").val(data[1]);
            $("#form_ubah #sat_nama").val(data[4]);
            $("#form_ubah #bar_harga").val(data[5]);
            $("#form_ubah #bar_ket").text(data[8]);
            $("#form_ubah #kat_bar_id").val(data[9]);
            x.slideDown();
        } else {
            $('#form_ubah').slideUp();
            $('#row_ubah').slideUp();
            current_id_update = -1;
        }
    }

    function fillDetail(id, idx) {
        if (current_id_detail != id) {
            current_id_detail = id;
            var data = $('#tableBarang').dataTable().fnGetData()[idx];
            $("#row_detail").remove();
            $("<tr id='row_detail'><td colspan='9'><div style='margin-top:10px' id='form_detail'></div></td></tr>").insertAfter("#item_" + current_id_detail);
            var x = $("#template_form_detail").clone();
            x.appendTo("#form_detail");
            $("#form_detail #barang_detail_nama").html(data[1]);
            $("#form_detail #barang_detail_kode").html(data[2]);
            $("#form_detail #barang_detail_satuan").html(data[4]);
            $("#form_detail #barang_detail_kategori").html(data[3]);
            $("#form_detail #barang_detail_keterangan").html(data[8]);
            $("#form_detail #barang_detail_harga_draft").html(parseFloat(data[5]).formatMoney(2));
            $("#form_detail #barang_detail_harga_valid").html(parseFloat(data[6]).formatMoney(2));
            $("#form_detail #barang_detail_status_validasi").html(data[7]);
            $("#form_detail #barang_detail_created_by").html(data[11]);
            $("#form_detail #barang_detail_created_time").html(data[12]);
            $("#form_detail #barang_detail_edited_by").html(data[13]);
            $("#form_detail #barang_detail_edited_time").html(data[14]);
            $("#form_detail #barang_detail_validated_by").html(data[15]);
            $("#form_detail #barang_detail_validated_time").html(data[16]);
            x.slideDown();
        } else {
            $('#form_detail').slideUp();
            $('#row_detail').slideUp();
            current_id_detail = -1;
        }
    }

    function confirmDelete(id) {
		var json_id = JSON.stringify(id);
        $("#tobe_deleted_id").val(json_id);
        $("#deleteModal").modal();
    }

    function deleteBarang() {
        $("#deleteModal").modal("hide");
        $("#form_delete").submit();
    }

    function validate(id, value) {
		var json_id = JSON.stringify(id);
        $("#tobe_validated_id").val(json_id);
        $("#validated_value").val(value);
        $("#validateModal").modal();
    }

    function validateSign() {
        var password = $('#validate_password').val();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>auth/sign/verifysign",
            data: {iduser: <?= $iduseractive ?>, password: password},
            cache: false,
            success: function(result) {
                if (result == "false") {
                    $('#alertSign').show();
                } else {
                    $('#form_validate').submit();
                }
            }
        });
    }

    function save(status_validasi_save) {
        $("#status_validasi_save").val(status_validasi_save);
        $("#form_submit_tambah").submit();
    }

    function update(status_validasi_update) {
        $("#form_ubah #status_validasi_update").val(status_validasi_update);
        $("#form_ubah #form_submit_ubah").submit();
    }
	
    $(document).ready(function() {
        $('.simpanDraft').hide();
        $('.simpanUpdate').hide();
		
        var invisibleColumn = [];
        var level = 0;
        if (isPermitted(['barang_admin'])) {
            level = 2;
        }
        else if (isPermitted(['barang_validator'])) {
            level = 1;
        }
        if (isPermitted(['barang_admin', 'barang_validator'])) {
            invisibleColumn = [8];
        } else {
            invisibleColumn = [5, 7, 8];
        }
        var table = $('#tableBarang').dataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?php echo base_url(); ?>master/barang/getViewBarang?level=" + level,
                "dataSrc": function(json) {
                    jsonData = json.data;
                    return json.data;
                }
            },
            "createdRow": function(row, data, index) {
                var id = data[0];
                var text = '<input type="checkbox" class="checksingle" onclick="insertNewCheck(\''+id+'\',listChecked)"><button class="btn btn-primary btn-xs" onclick="fillDetail(' + id + ',' + index + ');"><i class="fa fa-eye fa-fw"></i> Detail</button>';
                if (isPermitted(['barang_admin'])) {
                    text += '<button class="btn btn-default btn-xs btn-info" onclick="fillUpdate(' + id + ',' + index + ');"><i class="fa fa-pencil fa-fw"></i> Edit</button><button class="btn btn-default btn-xs btn-danger" onclick="confirmDelete([' + id + ']);"><i class="fa fa-trash-o fa-fw"></i> Hapus</button>'
                }
                if (isPermitted(['barang_validator'])) {
                    var value = 3;
                    if (data[10] == '2') {
                        value = 4;
                    } else if (data[10] == '5') {
                        value = 6;
                    }

                    var append = '';
                    if (data[10] == '3' || data[10] == '4' || data[10] == '6') {
                        append = '" disabled';
                    } else {
                        append = 'btn-success "';
                    }
                    text += '<button class="btn btn-default btn-xs ' + append + ' onclick="validate([' + id + '],3);"><i class="fa fa-check fa-fw"></i> Validasi</button>';

                    if (data[10] == '3' || data[10] == '4' || data[10] == '6') {
                        append = '" disabled';
                    } else {
                        append = 'btn-danger "';
                    }
                    text += '<button class="btn btn-default btn-xs ' + append + ' onclick="validate([' + id + '],' + value + ');"><i class="fa fa-times fa-fw"></i> Tolak</button>';
                }
                $('td', row).eq(0).html(text);
                if (isPermitted(['barang_admin', 'barang_validator'])) {
                    $('td', row).eq(5).html(parseFloat(data[5]).formatMoney(2));
                    $('td', row).eq(6).html(parseFloat(data[6]).formatMoney(2));
                } else {
                    $('td', row).eq(5).html(parseFloat(data[6]).formatMoney(2));
                }
                $(row).attr('id', 'item_' + id);
            },
            "columnDefs": [
                {
                    "targets": invisibleColumn,
                    "visible": false
                }
            ]
        });

        $('#showHideKeterangan').on('click', function(e) {
            e.preventDefault();
            var column = table.api().column(8);
            if (column.visible()) {
                column.visible(false);
                $("#showHideKeterangan").html('<i class="fa fa-eye fa-fw"></i> Tampilkan keterangan');

            } else {
                column.visible(true);
                $("#showHideKeterangan").html('<i class="fa fa-eye-slash fa-fw"></i> Sembunyikan keterangan');
            }
        });
    });

    function exportModal(type) {
        $('#type_data').val(type);
        $("#exportModal").modal();
    }

    function exportFile(data) {
        $("#exportModal").modal('hide');
        $('#size_data').val(data);
        $('#content_data').val($('#tableBarang_filter input[type=search]').val());
        $("#form_export").submit();
    }
	
	function bulkAction(){
		var bulk = parseFloat($('#bulk_value').val());
		if(bulk == 1){
			validate(listChecked,3);
		} else if(bulk == 2){
			validate(listChecked,4);
		} else if(bulk == 3){
			confirmDelete(listChecked);
		}
	}
</script>
<style>
    th, td {
        white-space: nowrap; 
    }
    .headerDetail {
        background-color: #167CAC;
        color: #FFF;
    }
</style>

<div id="exportModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" style="width: 250px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Pilihan export</h4>
            </div>
            <div class="modal-body">
                <h3>Pilih data yang di-export?</h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="exportFile('all');">Semua</button>
                <button type="button" class="btn btn-primary" onclick="exportFile('current');">Ditampilkan saat ini</button>
            </div>
        </div>
    </div>
</div>

<form method="POST" action="<?php echo base_url(); ?>master/barang/export" id="form_export">
    <input type="hidden" value="" name="content_data" id="content_data" />
    <input type="hidden" value="" name="type_data" id="type_data" />
    <input type="hidden" value="" name="size_data" id="size_data" />
</form>

<!-- Page heading -->
<div class="page-head">
    <h2 class="pull-left"><i class="fa fa-home"></i> Pengelolaan Barang</h2>
    <!-- Breadcrumb -->
    <div class="bread-crumb pull-right">
        <a href="index.html"><i class="fa fa-home"></i> Home</a> 
        <!-- Divider -->
        <span class="divider">/</span> 
        <a href="#" class="bread-current">Barang</a>
    </div>
    <div class="clearfix"></div>
</div>
<!-- Page heading ends -->

<div class="matter">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="widget wgreen">
                    <div class="widget-head">
                        <div class="pull-left">
                            Data Master Barang
                        </div>
                        <div class="widget-icons pull-right">
                            <a href="#" class="wminimize">
                                <i class="fa fa-chevron-up">
                                </i>
                            </a>
                            <a href="#" class="wclose">
                                <i class="fa fa-times">
                                </i>
                            </a>
                        </div>
                        <div class="clearfix">
                        </div>
                    </div>
                    <div class="widget-content">
                        <div id="deleteModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h4 class="modal-title">Konfirmasi penghapusan item barang</h4>
                                    </div>
                                    <div class="modal-body">
                                        <h3>Anda yakin untuk menghapus item terpilih ini?</h3>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" onclick="deleteBarang();">Ya</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Tidak</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="validateModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h4 class="modal-title">Konfirmasi validasi barang</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-horizontal" role="form">
                                            <div class="form-group">
                                                <div class="col-lg-9">
                                                    <input type="password" class="form-control" id="validate_password" name="validate_password" placeholder="Password untuk validasi" onkeyup="$('#alertSign').hide();">
                                                </div>
                                                <label id="alertSign" class="col-lg-3 control-label" style="color: red; display: none">Sign password salah</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" onclick="validateSign();">Lanjutkan</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Batal</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <form method="POST" action="<?php echo base_url(); ?>master/barang/delete" id="form_delete">
                            <input type="hidden" value="" name="tobe_deleted_id" id="tobe_deleted_id" />
                        </form>

                        <form method="POST" action="<?php echo base_url(); ?>master/barang/validate" id="form_validate">
                            <input type="hidden" value="" name="tobe_validated_id" id="tobe_validated_id" />
                            <input type="hidden" value="" name="validated_value" id="validated_value" />
                        </form>

                        <div id="template_form_ubah" style="display:none; padding-top: 20px; padding-bottom: 10px" class="alert-info">
                            <form method="POST" action="<?php echo base_url(); ?>master/barang/update" id="form_submit_ubah">
                                <input type="hidden" class="form-control" id="bar_id" name="bar_id">
                                <div class="col-lg-4 col-lg-offset-0">
                                    <div class="form-horizontal" role="form">
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Nama</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" id="bar_nama" name="bar_nama" placeholder="nama barang">
                                                <input type="hidden" class="form-control" id="status_validasi_update" name="status_validasi_update">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Harga</label>
                                            <div class="col-lg-9">
                                                <input type="text" class="form-control" id="bar_harga" name="bar_harga" placeholder="harga">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Kategori</label>
                                            <div class="col-lg-9">
                                                <select class="form-control" id="kat_bar_id" name="kat_bar_id">
                                                    <?php
                                                    foreach ($kategori as $i) {
                                                        echo "<option value='" . $i['KATEGORI_BARANG_ID'] . "'>" . $i['KATEGORI_BARANG_NAMA'] . "</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-lg-1" ng-if="displayField(['kategori_barang_admin'])"><a href="<?= base_url() ?>master/kategoribarang"><button type="button" class="btn btn-xs btn-success"><i class="fa fa-plus"></i></button></a></div>
                                        </div>
                                    </div>			
                                </div>
                                <div class="col-lg-5 col-lg-offset-0">
                                    <div class="form-horizontal" role="form">
                                        <div class="form-group">
                                            <label class="col-lg-4 control-label">Satuan barang</label>
                                            <div class="col-lg-7">
                                                <select class="form-control" id="sat_nama" name="sat_nama">
                                                    <?php
                                                    foreach ($satuan as $i) {
                                                        echo "<option value='" . $i['SATUAN_NAMA'] . "'>" . $i['SATUAN_NAMA'] . "</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-lg-1" ng-if="displayField(['satuan_barang_admin'])"><a href="<?= base_url() ?>master/satuanbarang"><button type="button" class="btn btn-xs btn-success"><i class="fa fa-plus"></i></button></a></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-4 control-label">Keterangan</label>
                                            <div class="col-lg-7">
                                                <textarea class="form-control" rows="6" placeholder="Textarea" id="bar_ket" name="bar_ket"></textarea>
                                            </div>
                                        </div>    
                                    </div>
                                </div>
                                <div>
                                    <div class="form-horizontal" role="form">
                                        <div class="form-group" align="center">
                                            <button style="margin-bottom: 5px" type="button" class="btn btn-sm btn-info simpanDraft" onclick="update(1)"><i class="fa fa-save fa-fw"></i> Simpan sebagai draft</button><br/>
                                            <button style="margin-bottom: 5px" type="button" class="btn btn-sm btn-success simpanDraft" onclick="update(2)"><i class="fa fa-save fa-fw"></i> Simpan untuk validasi</button><br/>
                                            <button style="margin-bottom: 5px" type="button" class="btn btn-sm btn-success simpanUpdate" onclick="update(5)"><i class="fa fa-save fa-fw"></i> Simpan untuk update</button><br/>
                                            <button type="button" class="btn btn-sm btn-danger" onclick="$('#form_ubah').slideUp('normal', function() {
                                                        $('#row_ubah').remove();
                                                    });
                                                    current_id_update = -1;"><i class="fa fa-ban fa-fw"></i> Batal</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="padd">
                            <div style="width: 100%">
                                <div style="width: 49%; display: inline-block;" align="left">
                                    <div ng-if="displayField(['barang_admin'])">
                                        <button type="button" class="btn btn-sm btn-primary" onclick="$('#form_tambah').slideToggle();"><i class="fa fa-plus fa-fw"></i> Tambahkan barang</button>
                                        <img onclick="exportModal('pdf');" src="<?= base_url(); ?>assets/default/img/icons/pdf.png" class="icons" title="Export to PDF" />
                                    </div>
                                </div>
                                <div style="width: 49%; display: inline-block;" align="right"><button ng-if="displayField(['barang_admin', 'barang_validator', 'barang_viewer'])" class="btn btn-primary" id="showHideKeterangan" onclick=""><i class="fa fa-eye fa-fw"></i> Tampilkan keterangan</button></div>
                            </div>
                            <div class="clearfix">
                                <br />
                            </div>
                            <form method="POST" action="<?php echo base_url(); ?>master/barang/insert" id="form_submit_tambah">
                                <div id="form_tambah" style="display:none">
                                    <div class="form-horizontal" role="form">
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Nama barang</label>
                                            <div class="col-lg-5">
                                                <input type="text" class="form-control" id="bar_nama" name="bar_nama" placeholder="nama barang">
                                                <input type="hidden" class="form-control" id="status_validasi_save" name="status_validasi_save" value="1">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Harga</label>
                                            <div class="col-lg-5">
                                                <input type="text" class="form-control" id="bar_harga" name="bar_harga" placeholder="harga">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Satuan barang</label>
                                            <div class="col-lg-5">
                                                <select class="form-control" id="sat_nama" name="sat_nama">
                                                    <?php
                                                    foreach ($satuan as $i) {
                                                        echo "<option>" . $i['SATUAN_NAMA'] . "</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-lg-2" ng-if="displayField(['satuan_barang_admin'])"><a href="<?= base_url() ?>master/satuanbarang"><button type="button" class="btn btn-xs btn-success"><i class="fa fa-plus"></i></button></a></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Kategori</label>
                                            <div class="col-lg-5">
                                                <select class="form-control" id="kat_bar_id" name="kat_bar_id">
                                                    <?php
                                                    foreach ($kategori as $i) {
                                                        echo "<option value='" . $i['KATEGORI_BARANG_ID'] . "'>" . $i['KATEGORI_BARANG_NAMA'] . "</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-lg-2" ng-if="displayField(['kategori_barang_admin'])"><a href="<?= base_url() ?>master/kategoribarang"><button type="button" class="btn btn-xs btn-success"><i class="fa fa-plus"></i></button></a></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Keterangan</label>
                                            <div class="col-lg-5">
                                                <textarea class="form-control" rows="5" placeholder="keterangan barang" id="bar_ket" name="bar_ket"></textarea>
                                            </div>
                                        </div>    
                                        <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-6">
                                                <button type="button" class="btn btn-sm btn-info" onclick="save(1)"><i class="fa fa-save fa-fw"></i> Simpan sebagai draft</button>
                                                <button type="button" class="btn btn-sm btn-success" onclick="save(2)"><i class="fa fa-save fa-fw"></i> Simpan untuk validasi</button>
                                                <button type="button" class="btn btn-sm btn-danger" onclick="$('#form_tambah').slideToggle();"><i class="fa fa-ban fa-fw"></i> Batal</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="page-tables" ng-if="displayField(['barang_admin', 'barang_validator', 'barang_viewer'])">
                                <div class="table-responsive" align="right" style="overflow-x: auto" >
                                    <table id="tableBarang" class="display" cellspacing="0" width="100%"  style="margin-bottom: 10px">
                                        <thead>
                                            <tr>
                                                <th id="aksi">
													<input type="checkbox" id="checkall"> 
													<select id="bulk_value">
														<option value="0" disabled selected>-- Bulk Action --</option>
														<option value="1"  ng-if="displayField(['barang_validator'])">validasi</option>
														<option value="2"  ng-if="displayField(['barang_validator'])">tolak</option>
														<option value="3"  ng-if="displayField(['barang_admin'])">hapus</option>
													</select>
													<button class="btn btn-xs btn-primary" id="bulk_apply" onclick="bulkAction()" disabled> Apply </button>
													Aksi
												</th>
                                                <th>Nama Barang</th>
                                                <th>Kode</th>
                                                <th>Kategori</th>
                                                <th>Satuan</th>
                                                <th>Harga Draft</th>
                                                <th>Harga Valid</th>
                                                <th>Status</th>
                                                <th>Keterangan</th>
                                            </tr>
                                        </thead>
                                    </table>
                                    <div class="clearfix">
                                    </div>
                                </div>
                            </div>
                            <div id="template_form_detail" style="display:none; margin-bottom: 10px">
                                <table class="table table-bordered centerTable">
                                    <tbody>
                                        <tr>
                                            <td align="center" class="headerDetail" colspan="6"><b>DETAIL BARANG</b></th>
                                        </tr>
                                        <tr>
                                            <td class="headerDetail" width="100" ><b>Nama Barang</b></td>
                                            <td id="barang_detail_nama"></td>
                                            <td class="headerDetail" width="100" ><b>Kode Barang</b></td>
                                            <td id="barang_detail_kode"></td>
                                            <td class="headerDetail" width="100" ><b>Satuan Barang</b></td>
                                            <td id="barang_detail_satuan"></td>
                                        </tr>
                                        <tr>
                                            <td class="headerDetail"><b>Kategori Barang</b></td>
                                            <td id="barang_detail_kategori"></td>
                                            <td class="headerDetail"><b>Keterangan</b></td>
                                            <td id="barang_detail_keterangan" colspan="3"></td>
                                        </tr>
                                        <tr>
                                            <td class="headerDetail" width="100" ><b>Harga Draft</b></td>
                                            <td id="barang_detail_harga_draft"></td>
                                            <td class="headerDetail" width="100" ><b>Harga Valid</b></td>
                                            <td id="barang_detail_harga_valid"></td>
                                            <td class="headerDetail" width="100" ><b>Status Validasi</b></td>
                                            <td id="barang_detail_status_validasi"></td>
                                        </tr>
                                        <tr>
                                            <td class="headerDetail" width="100" ><b>Dibuat oleh</b></td>
                                            <td id="barang_detail_created_by" colspan="3"></td>
                                            <td class="headerDetail" width="100" ><b>pada tanggal</b></td>
                                            <td id="barang_detail_created_time"></td>
                                        </tr>
                                        <tr>
                                            <td class="headerDetail" width="100" ><b>Diedit terakhir oleh</b></td>
                                            <td id="barang_detail_edited_by" colspan="3"></td>
                                            <td class="headerDetail" width="100" ><b>pada tanggal</b></td>
                                            <td id="barang_detail_edited_time"></td>
                                        </tr>
                                        <tr>
                                            <td class="headerDetail" width="100" ><b>Diperiksa oleh</b></td>
                                            <td id="barang_detail_validated_by" colspan="3"></td>
                                            <td class="headerDetail" width="100" ><b>pada tanggal</b></td>
                                            <td id="barang_detail_validated_time"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="widget-foot">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>