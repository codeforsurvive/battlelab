<script>
	var current_id_update = -1;
	var current_id_detail = -1;
	
	function fillUpdate(id,idx){
		$('.simpanDraft').hide();
		$('.simpanUpdate').hide();
		
		if(current_id_update!=id) {
			current_id_update = id;
			var data = $('#tableUpah').dataTable().fnGetData()[idx];
			$("#row_ubah").remove();
			$("<tr id='row_ubah'><td colspan='9'><div style='margin-top:10px' id='form_ubah'></div></td></tr>").insertAfter( "#item_" + current_id_update);
			var x = $("#template_form_ubah").clone();
			x.appendTo("#form_ubah");
			if(data[10]==1 || data[10]==2){
				$('.simpanDraft').show();
			} else {
				$('.simpanUpdate').show();
			}
			$("#form_ubah #upah_id").val(id);
			$("#form_ubah #upah_nama").val(data[1]);
			$("#form_ubah #upah_harga").val(data[5]);
			$("#form_ubah #sat_upah_id").val(data[8]);
			$("#form_ubah #lokasi_upah_id").val(data[9]);
			x.slideDown();
		} else {
			$('#form_ubah').slideUp();
			$('#row_ubah').slideUp();
			current_id_update = -1;
		}
	}
	
	function fillDetail(id,idx) {
        if (current_id_detail != id) {
            current_id_detail = id;
			var data = $('#tableUpah').dataTable().fnGetData()[idx];
            $("#row_detail").remove();
            $("<tr id='row_detail'><td colspan='9'><div style='margin-top:10px' id='form_detail'></div></td></tr>").insertAfter("#item_" + current_id_detail);
            var x = $("#template_form_detail").clone();
            x.appendTo("#form_detail");
			$("#form_detail #upah_detail_nama").html(data[1]);
            $("#form_detail #upah_detail_kode").html(data[2]);
			$("#form_detail #upah_detail_satuan").html(data[3]);
			$("#form_detail #upah_detail_lokasi").html(data[4]);
			$("#form_detail #upah_detail_harga_draft").html(parseFloat(data[5]).formatMoney(2));
			$("#form_detail #upah_detail_harga_valid").html(parseFloat(data[6]).formatMoney(2));
			$("#form_detail #upah_detail_status_validasi").html(data[7]);
			$("#form_detail #upah_detail_created_by").html(data[11]);
			$("#form_detail #upah_detail_created_time").html(data[12]);
			$("#form_detail #upah_detail_edited_by").html(data[13]);
			$("#form_detail #upah_detail_edited_time").html(data[14]);
			$("#form_detail #upah_detail_validated_by").html(data[15]);
			$("#form_detail #upah_detail_validated_time").html(data[16]);
            x.slideDown();
        } else {
			$('#form_detail').slideUp();
			$('#row_detail').slideUp();
			current_id_detail = -1;
		}
    }
	
	function confirmDelete(id){
		$("#tobe_deleted_id").val(id);
		$("#deleteModal").modal();
	}
	
	function deleteUpah(){
		$("#deleteModal").modal("hide");
		$("#form_delete").submit();
	}
	
	function validate(id,value) {
		$("#tobe_validated_id").val(id);
		$("#validated_value").val(value);
        $("#validateModal").modal();
    }
	
	function save(status_validasi_save){
		$("#status_validasi_save").val(status_validasi_save);
		$("#form_submit_tambah").submit();
	}
	
	function update(status_validasi_update){
		$("#form_ubah #status_validasi_update").val(status_validasi_update);
		$("#form_ubah #form_submit_ubah").submit();
	}
	
	function validateSign(){
		var password = $('#validate_password').val();
		$.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>auth/sign/verifysign",
			data: {iduser: <?= $iduseractive ?>, password: password},
			cache: false,
			success: function(result) {
				if(result=="false"){
					$('#alertSign').show();
				} else {
					$('#form_validate').submit();
				}
			}
		});
	 }
	 
	
	$(document).ready(function() {
		var invisibleColumn = [];
		var level = 0;
		if(isPermitted(['upah_admin'])){
			level = 2;
		}
		else if(isPermitted(['upah_validator'])){
			level = 1;
		}
		if(isPermitted(['upah_admin','upah_validator'])){
			invisibleColumn = [];
		} else {
			invisibleColumn = [5,7];
		}
		var table = $('#tableUpah').dataTable( {
			"processing": true,
			"serverSide": true,
			"ajax": "<?php echo base_url(); ?>master/upah/getViewUpah?level="+level,
			"createdRow": function ( row, data, index ) {
				var id = data[0];
				var text = '<button class="btn btn-primary btn-xs" onclick="fillDetail('+id+','+index+');"><i class="fa fa-eye fa-fw"></i> Detail</button>';
				if (isPermitted(['upah_admin'])){
					text += '<button class="btn btn-default btn-xs btn-info" onclick="fillUpdate('+id+','+index+');"><i class="fa fa-pencil fa-fw"></i> Edit</button><button class="btn btn-default btn-xs btn-danger" onclick="confirmDelete('+id+');"><i class="fa fa-trash-o fa-fw"></i> Hapus</button>'
				} 
				if (isPermitted(['upah_validator'])){
					var value = 3;
					if(data[10]=='2'){
						value = 4;
					} else if(data[10]=='5'){
						value = 6;
					}
					
					var append = '';
					if(data[10]=='3' || data[10]=='4' || data[10]=='6'){
						append = '" disabled';
					} else {
						append = 'btn-success "'; 
					}
					text += '<button class="btn btn-default btn-xs ' + append + ' onclick="validate('+id+',3);"><i class="fa fa-check fa-fw"></i> Validasi</button>';
					
					if(data[10]=='3' || data[10]=='4' || data[10]=='6'){
						append = '" disabled';
					} else {
						append = 'btn-danger "'; 
					}
					text += '<button class="btn btn-default btn-xs ' + append + ' onclick="validate('+id+','+value+');"><i class="fa fa-times fa-fw"></i> Tolak</button>';
				}
				$('td', row).eq(0).html(text);
				if(isPermitted(['upah_admin','upah_validator'])){
					$('td', row).eq(5).html(parseFloat(data[5]).formatMoney(2));
					$('td', row).eq(6).html(parseFloat(data[6]).formatMoney(2));
				} else {
					$('td', row).eq(5).html(parseFloat(data[6]).formatMoney(2));
				}
				$(row).attr('id', 'item_'+id);
			},
			"columnDefs": [
				{
					"targets": invisibleColumn,
					"visible": false
				}
			]
		} );
	} );
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

<!-- Page heading -->
<div class="page-head">
    <h2 class="pull-left"><i class="fa fa-home"></i> Pengelolaan Upah</h2>
    <!-- Breadcrumb -->
    <div class="bread-crumb pull-right">
        <a href="index.html"><i class="fa fa-home"></i> Home</a> 
        <!-- Divider -->
        <span class="divider">/</span> 
        <a href="#" class="bread-current">Upah</a>
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
							Data Master Upah
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
							<h4 class="modal-title">Konfirmasi penghapusan item upah</h4>
						  </div>
						  <div class="modal-body">
							<h3>Anda yakin untuk menghapus item ini?</h3>
						  </div>
						  <div class="modal-footer">
							<button type="button" class="btn btn-primary" onclick="deleteUpah();">Ya</button>
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
										<h4 class="modal-title">Konfirmasi validasi upah</h4>
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
						
						<form method="POST" action="<?php echo base_url(); ?>master/upah/delete" id="form_delete">
							<input type="hidden" value="" name="tobe_deleted_id" id="tobe_deleted_id" />
						</form>
						<form method="POST" action="<?php echo base_url(); ?>master/upah/validate" id="form_validate">
							<input type="hidden" value="" name="tobe_validated_id" id="tobe_validated_id" />
							<input type="hidden" value="" name="validated_value" id="validated_value" />
						</form>

						<div id="template_form_ubah" style="display:none; padding-top: 20px; padding-bottom: 10px" class="alert-info">
							<form method="POST" action="<?php echo base_url(); ?>master/upah/update" id="form_submit_ubah">
							<input type="hidden" class="form-control" id="upah_id" name="upah_id">
							<div class="col-lg-4 col-lg-offset-0">
								<div class="form-horizontal" role="form">
									<div class="form-group">
										<label class="col-lg-4 control-label">Nama</label>
										<div class="col-lg-8">
											<input type="text" class="form-control" id="upah_nama" name="upah_nama" placeholder="nama upah">
											<input type="hidden" class="form-control" id="status_validasi_update" name="status_validasi_update">
										</div>
									</div>
									<div class="form-group">
									  <label class="col-lg-4 control-label">Satuan upah</label>
									  <div class="col-lg-8">
										<select class="form-control" id="sat_upah_id" name="sat_upah_id">
										  <?php foreach($satuan as $i) { echo "<option value='".$i['SATUAN_UPAH_ID']."'>".$i['SATUAN_UPAH_NAMA']."</option>"; } ?>
										</select>
									  </div>
									</div>
								</div>			
							</div>
							<div class="col-lg-5 col-lg-offset-0">
								<div class="form-horizontal" role="form">
									<div class="form-group">
									  <label class="col-lg-4 control-label">Lokasi</label>
									  <div class="col-lg-8">
										<select class="form-control" id="lokasi_upah_id" name="lokasi_upah_id">
										  <?php foreach($lokasi as $i) { echo "<option value='".$i['LOKASI_UPAH_ID']."'>".$i['LOKASI_UPAH_NAMA']."</option>"; } ?>
										</select>
									  </div>
									</div>
									<div class="form-group">
										<label class="col-lg-4 control-label">Harga</label>
										<div class="col-lg-8">
											<input type="text" class="form-control" id="upah_harga" name="upah_harga" placeholder="harga upah">
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
										<button type="button" class="btn btn-sm btn-danger" onclick="$('#form_ubah').slideUp('normal', function(){ $('#row_ubah').remove(); } );current_id_update=-1;"><i class="fa fa-ban fa-fw"></i> Batal</button>
								</div>
								</div>
							</div>
							</form>
						</div>
						<div class="padd">
							<div ng-if="displayField(['upah_admin'])">
							<button type="button" class="btn btn-sm btn-primary" onclick="$('#form_tambah').slideToggle();"><i class="fa fa-plus fa-fw"></i> Tambahkan upah</button>
							</div>
							<div class="clearfix">
								<br />
							</div>
							<form method="POST" action="<?php echo base_url(); ?>master/upah/insert"  id="form_submit_tambah">
							<div id="form_tambah" style="display:none">
								<div class="form-horizontal" role="form">
									<div class="form-group">
										<label class="col-lg-2 control-label">Nama upah</label>
										<div class="col-lg-5">
											<input type="text" class="form-control" id="upah_nama" name="upah_nama" placeholder="nama upah">
											<input type="hidden" class="form-control" id="status_validasi_save" name="status_validasi_save" value="1">
										</div>
									</div>
									<div class="form-group">
									  <label class="col-lg-2 control-label">Lokasi harga</label>
									  <div class="col-lg-5">
										<select class="form-control" id="lokasi_upah_id" name="lokasi_upah_id">
										  <?php foreach($lokasi as $i) { echo "<option value='".$i['LOKASI_UPAH_ID']."'>".$i['LOKASI_UPAH_NAMA']."</option>"; } ?>
										</select>
									  </div>
									</div>
									<div class="form-group">
										<label class="col-lg-2 control-label">Harga</label>
										<div class="col-lg-5">
											<input type="text" class="form-control" id="upah_harga" name="upah_harga" placeholder="harga upah">
										</div>
									</div>
									<div class="form-group">
									  <label class="col-lg-2 control-label">Satuan upah</label>
									  <div class="col-lg-5">
										<select class="form-control" id="sat_upah_id" name="sat_upah_id">
										  <?php foreach($satuan as $i) { echo "<option value='".$i['SATUAN_UPAH_ID']."'>".$i['SATUAN_UPAH_NAMA']."</option>"; } ?>
										</select>
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
							<div class="page-tables" ng-if="displayField(['upah_admin','upah_validator','upah_viewer'])">
								<!-- Table -->
								<div class="table-responsive" style="overflow-x: auto">
									<table id="tableUpah" class="display" cellspacing="0" width="100%" style="margin-bottom: 10px">
										<thead>
											<tr>
												<th>Aksi</th>
												<th>Nama Upah</th>
												<th>Kode</th>
												<th>Satuan</th>
												<th>Lokasi</th>
												<th>Harga Draft</th>
												<th>Harga Valid</th>
												<th>Status</th>
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
									  <td align="center" class="headerDetail" colspan="6"><b>DETAIL UPAH</b></th>
									</tr>
									<tr>
									  <td class="headerDetail" width="100" ><b>Nama Upah</b></td>
									  <td id="upah_detail_nama" ></td>
									  <td class="headerDetail" width="100" ><b>Kode Upah</b></td>
									  <td id="upah_detail_kode"colspan="3" ></td>
									  
									</tr>
									<tr>
									  <td class="headerDetail"><b>Satuan Upah</b></td>
									  <td id="upah_detail_satuan" ></td>
									  <td class="headerDetail"><b>Lokasi Upah</b></td>
									  <td id="upah_detail_lokasi" colspan="3"></td>
									</tr>
									<tr>
									  <td class="headerDetail" width="100" ><b>Harga Draft</b></td>
									  <td id="upah_detail_harga_draft"></td>
									  <td class="headerDetail" width="100" ><b>Harga Valid</b></td>
									  <td id="upah_detail_harga_valid"></td>
									  <td class="headerDetail" width="100" ><b>Status Validasi</b></td>
									  <td id="upah_detail_status_validasi"></td>
									</tr>
									<tr>
									  <td class="headerDetail" width="100" ><b>Dibuat oleh</b></td>
									  <td id="upah_detail_created_by" colspan="3"></td>
									  <td class="headerDetail" width="100" ><b>pada tanggal</b></td>
									  <td id="upah_detail_created_time"></td>
									</tr>
									<tr>
									  <td class="headerDetail" width="100" ><b>Diedit terakhir oleh</b></td>
									  <td id="upah_detail_edited_by" colspan="3"></td>
									  <td class="headerDetail" width="100" ><b>pada tanggal</b></td>
									  <td id="upah_detail_edited_time"></td>
									</tr>
									<tr>
									  <td class="headerDetail" width="100" ><b>Diperiksa oleh</b></td>
									  <td id="upah_detail_validated_by" colspan="3"></td>
									  <td class="headerDetail" width="100" ><b>pada tanggal</b></td>
									  <td id="upah_detail_validated_time"></td>
									</tr>
								  </tbody>
								</table>
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
