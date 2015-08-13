<script>
    var current_id = -1;
	var jsonData;
	
    function fillUpdate(id,idx) {
        if (current_id != id) {
            current_id = id;
			var data = $('#example').dataTable().fnGetData()[idx];
            $("#row_ubah").remove();
            $("<tr id='row_ubah'><td colspan='7'><div style='margin-top:10px' id='form_ubah'></div></td></tr>").insertAfter("#item_" + current_id);
            var x = $("#template_form_ubah").clone();
            x.appendTo("#form_ubah");
            $("#form_ubah #perusahaan_id").val(data[0]);
            $("#form_ubah #perusahaan_nama").val(data[1]);
			$("#form_ubah #perusahaan_kode").val(data[2]);
            $("#form_ubah #perusahaan_alamat").val(data[3]);
            $("#form_ubah #perusahaan_telp").val(data[4]);
            $("#form_ubah #perusahaan_email").val(data[5]);
            x.slideDown();
        }
    }

    function confirmDelete(id) {
		$("#tobe_deleted_id").val(id);
        $("#deleteModal").modal();
    }

    function deletePerusahaan() {
        $("#deleteModal").modal("hide");
        $("#form_delete").submit();
    }
	
	$(document).ready(function() {
		var table = $('#example').dataTable( {
			"processing": true,
			"serverSide": true,
			"ajax": {
				"url": "<?php echo base_url(); ?>user-management/perusahaan/getViewPerusahaan",
				"dataSrc": function ( json ) {
					jsonData = json.data;
					return json.data;
				}
			  },
			"createdRow": function ( row, data, index ) {
				var id = data[0];
				$('td', row).eq(0).html('<div class="btn-group"><button class="btn btn-default btn-xs dropdown-toggle btn-info" data-toggle="dropdown">Aksi <span class="caret"></span></button><ul class="dropdown-menu"><li><a href="javascript:fillUpdate('+id+','+index+')"><i class="fa fa-refresh fa-fw"></i> Ubah</a></li><li><a href="javascript:confirmDelete('+id+')"><i class="fa fa-trash-o fa-fw"></i> Hapus</a></li></ul></div>');
				if(data[6]==1) {
					$('td', row).eq(6).html('<a class="success"><span class="fa fa-check"></span> Aktif</a>');
				} else {
					$('td', row).eq(6).html('<a class="danger"><span class="fa fa-times"></span> Tidak Aktif</a>');
				}
				$(row).attr('id', 'item_'+id);
			}
		} );
		
		$('#showHideKeterangan').on( 'click', function (e) {
			e.preventDefault();
			var column = table.api().column(6);
			if(column.visible()){
				column.visible(false);
				$("#showHideKeterangan").html('<i class="fa fa-eye fa-fw"></i> Tampilkan keterangan');
				
			} else {
				column.visible(true);
				$("#showHideKeterangan").html('<i class="fa fa-eye-slash fa-fw"></i> Sembunyikan keterangan');
			}
		} );
	} );
</script>

<!-- Page heading -->
<div class="page-head">
    <h2 class="pull-left"><i class="fa fa-home"></i> Master Perusahaan</h2>
    <!-- Breadcrumb -->
    <div class="bread-crumb pull-right">
        <a href="index.html"><i class="fa fa-home"></i> Manajemen Pengguna</a> 
        <!-- Divider -->
        <span class="divider">/</span> 
        <a href="#" class="bread-current">Perusahaan</a>
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
							Data Master Perusahaan
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
										<h4 class="modal-title">Konfirmasi penghapusan item perusahaan</h4>
									</div>
									<div class="modal-body">
										<h3>Anda yakin untuk menghapus item ini?</h3>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-primary" onclick="deletePerusahaan();">Ya</button>
										<button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Tidak</button>
									</div>
								</div>
							</div>
						</div>

						<form method="POST" action="<?php echo base_url(); ?>user-management/perusahaan/delete" id="form_delete">
							<input type="hidden" value="" name="tobe_deleted_id" id="tobe_deleted_id" />
						</form>

						<div id="template_form_ubah" style="display:none; padding-top: 20px" class="alert-info">
							<form method="POST" action="<?php echo base_url(); ?>user-management/perusahaan/update">
								<input type="hidden" class="form-control" id="perusahaan_id" name="<?= mPerusahaan::ID ?>">
								<div class="col-lg-4 col-lg-offset-0">
									<div class="form-horizontal" role="form">
<!--										<div class="form-group">
											<label class="col-lg-4 control-label">Kode</label>
											<div class="col-lg-8">
												<input type="text" class="form-control" id="perusahaan_kode" name="<?= mPerusahaan::KODE ?>" placeholder="kode perusahaan">
											</div>
										</div>-->
										<div class="form-group">
											<label class="col-lg-4 control-label">Nama</label>
											<div class="col-lg-8">
												<input type="text" class="form-control" id="perusahaan_nama" name="<?= mPerusahaan::NAMA ?>" placeholder="nama perusahaan">
											</div>
										</div>
										<div class="form-group">
											<label class="col-lg-4 control-label">Alamat</label>
											<div class="col-lg-8">
												<input type="text" class="form-control" id="perusahaan_alamat" name="<?= mPerusahaan::ALAMAT ?>" placeholder="alamat perusahaan">
											</div>
										</div>
									</div>			
								</div>
								<div class="col-lg-5 col-lg-offset-0">
									<div class="form-horizontal" role="form">
										<div class="form-group">
											<label class="col-lg-4 control-label">No. Telepon</label>
											<div class="col-lg-8">
												<input type="text" class="form-control" id="perusahaan_telp" name="<?= mPerusahaan::TELP ?>" placeholder="telepon perusahaan">
											</div>
										</div>
										<div class="form-group">
											<label class="col-lg-4 control-label">Email</label>
											<div class="col-lg-8">
												<input type="text" class="form-control" id="perusahaan_email" name="<?= mPerusahaan::EMAIL ?>" placeholder="email perusahaan">
											</div>
										</div>
									</div>
								</div>
								<div>
									<div class="form-horizontal" role="form">
										<div class="form-group" align="center">
											<button type="submit" class="btn btn-sm btn-success"><i class="fa fa-save fa-fw"></i> Simpan</button>
											<button type="button" class="btn btn-sm btn-danger" onclick="$('#form_ubah').slideUp('normal', function() {
														$('#row_ubah').remove();
													});
													current_id = -1;"><i class="fa fa-ban fa-fw"></i> Batal</button>
										</div>
									</div>
								</div>
							</form>
						</div>
						<div class="padd">
							<button type="button" class="btn btn-sm btn-primary" onclick="$('#form_tambah').slideToggle();"><i class="fa fa-plus fa-fw"></i> Tambahkan perusahaan</button>
							<div class="clearfix">
								<br />
							</div>
							<form method="POST" action="<?php echo base_url(); ?>user-management/perusahaan/insert">
								<div id="form_tambah" style="display:none">
									<div class="form-horizontal" role="form">
										<div class="form-group">
											<!--label class="col-lg-2 control-label">Kode perusahaan</label>
											<div class="col-lg-5">
												<input type="text" class="form-control" id="perusahaan_kode" name="<?= mPerusahaan::KODE ?>" placeholder="kode perusahaan">
											</div-->
										</div>
										<div class="form-group">
											<label class="col-lg-2 control-label">Nama perusahaan</label>
											<div class="col-lg-5">
												<input type="text" class="form-control" id="perusahaan_nama" name="<?= mPerusahaan::NAMA ?>" placeholder="nama perusahaan">
											</div>
										</div>
										<div class="form-group">
											<label class="col-lg-2 control-label">Alamat</label>
											<div class="col-lg-5">
												<input type="text" class="form-control" id="perusahaan_alamat" name="<?= mPerusahaan::ALAMAT ?>" placeholder="alamat perusahaan">
											</div>
										</div>
										<div class="form-group">
											<label class="col-lg-2 control-label">No. Telepon</label>
											<div class="col-lg-5">
												<input type="text" class="form-control" id="perusahaan_telp" name="<?= mPerusahaan::TELP ?>" placeholder="telepon perusahaan">
											</div>
										</div>
										<div class="form-group">
											<label class="col-lg-2 control-label">Email</label>
											<div class="col-lg-5">
												<input type="text" class="form-control" id="perusahaan_email" name="<?= mPerusahaan::EMAIL ?>" placeholder="email perusahaan">
											</div>
										</div>
										<div class="form-group">
											<div class="col-lg-offset-2 col-lg-6">
												<button type="submit" class="btn btn-sm btn-success"><i class="fa fa-save fa-fw"></i> Simpan</button>
												<button type="button" class="btn btn-sm btn-danger" onclick="$('#form_tambah').slideToggle();"><i class="fa fa-ban fa-fw"></i> Batal</button>
											</div>
										</div>
									</div>
								</div>
							</form>
							<div class="page-tables">
								<!-- Table -->
								<div class="table-responsive" align="right">
									<table id="example" class="display" cellspacing="0" width="100%"  style="margin-bottom: 10px">
										<thead>
											<tr>
												<th>Aksi</th>
												<th>Nama</th>
												<th>Kode</th>
												<th>Alamat</th>
												<th>No. Telp</th>
												<th>Email</th>
												<th>Status</th>
											</tr>
										</thead>
									</table>
									<div class="clearfix">
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="widget-foot">
						<!-- Footer goes here -->
					</div>
				</div>
			</div>
		</div>
    </div>
</div>