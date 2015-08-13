<script>
	var current_id = -1;
	 
	function editOverhead(){
		$("#id_to_edit").val(current_id);
		$("#form_edit").submit();
	}
	
	function confirmDelete(){
		$("#tobe_deleted_id").val(current_id);
		$("#deleteModal").modal();
	}
	
	function deleteOverhead(){
		$("#deleteModal").modal("hide");
		$("#form_delete").submit();
	}
	
	function validasiOverhead(val) {
		var id = current_id;
		$("#form_validasi #tobe_validated_id").val(id);
		$("#form_validasi #tobe_validated_val").val(val);
		$("#validateModal").modal();
	}
	
	function saveForValidated(){
		var id = current_id;
		$("#form_simpan_validasi #tobe_simpan_validasi_id").val(id);
		$("#form_simpan_validasi").submit();
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
					$("#form_validasi").submit();
				}
			}
		});
	 }
	
	$(document).ready(function() {
		var table = $('#example').dataTable( {
			"processing": true,
			"serverSide": true,
			"ajax": "<?php echo base_url(); ?>master/overhead/getViewOverhead?tipe=<?= $tipe ?>",
			"createdRow": function ( row, data, index ) {
				var id = data[5];
				var status = data[6];
				$('td', row).eq(4).html('<a class="btn btn-primary btn-xs" target="_blank" href="<?= base_url() ?>rab/rabs/viewDetail/' + data[7] + '"><i class="fa fa-search fa-fw"></i></a>' + data[4]);
				$('td', row).eq(5).html('<button class="btn btn-primary btn-xs" onclick="viewOverhead('+id+','+status+')"><i class="fa fa-eye fa-fw"></i> Lihat</button>');
				$('td', row).eq(2).html(parseFloat(data[2]).formatMoney(2));
				$(row).attr('id', 'item_'+id);
			}
		} );
	} );
	 
	function viewOverhead(id, status){
		if (current_id != id) {
            current_id = id;
			if(status==1){
				$("#btnAdmin").show();
				$("#btnValidator").hide();
			} else if(status==2 || status==5){
				$("#btnValidator").show();
				$("#btnAdmin").hide();
			} else {
				$("#btnAdmin").hide();
				$("#btnValidator").hide();
			}
            $("#row_ubah").remove();
            $("<tr id='row_ubah'><td colspan='7'><div style='margin-top:10px; margin-bottom:10px' id='form_ubah' align='center'><img id='bar_loader' src='<?= base_url().'assets/default/img/bar_loader.gif' ?>'></div></td></tr>").insertAfter("#item_" + current_id);
            var x = $("#template_form_ubah").clone();
            x.appendTo("#form_ubah");
			$.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>master/overhead/detail",
				data: {id: id, tipe: '<?= $tipe ?>'}, 
				cache: true,
				success: function(result){
					var res = JSON.parse(result);
					var res_detail = res["detail"];
					var barang = '';
					var jumlah_detail = 0;
					$(".item_detail").remove();
					$("#bar_loader").remove();
					for(var i=0; i<res_detail.length; i++){
						barang += '<tr class="item_detail"><td>'+res_detail[i]["DETAIL_NAMA"]+'</td><td>'+res_detail[i]["DETAIL_KODE"]+'</td><td>'+res_detail[i]["DETAIL_KOEFISIEN"]+'</td><td>'+res_detail[i]["DETAIL_SATUAN"]+'</td><td align="right">'+(parseFloat(res_detail[i]["DETAIL_HARGA"])).formatMoney(2)+'</td><td align="right">'+(parseFloat(res_detail[i]["DETAIL_TOTAL"])).formatMoney(2)+'</td></tr>';
						jumlah_detail += parseFloat(res_detail[i]["DETAIL_TOTAL"]);
					}
					$(barang).insertBefore("#template_form_ubah #header_total");
					
					$("#form_ubah #jumlah_total").html(jumlah_detail.formatMoney(2));
					
					x.slideDown();
				}
			});
        } else {
			$('#form_ubah').slideUp('normal', function() {
				$('#row_ubah').remove();
            });
            current_id = -1;
		}
	}
</script>
<style>
	table{
	
	}
	.centerTable th{
		text-align: center;
		background-color: #0993D3;
		color: #FFFFFF;
		height: 30px;
		font-size: 15px;
	}
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
</style>
<form style="display: none" id="form_edit" action="<?php echo base_url(); ?>master/overhead/edit" method="POST">
	<input type="hidden" value="" id="id_to_edit" name="id_to_edit" />
</form>

<form method="POST" action="<?php echo base_url(); ?>master/overhead/delete" id="form_delete">
	<input type="hidden" value="" name="tobe_deleted_id" id="tobe_deleted_id" />
	<input type="hidden" value="" name="tipe_delete" id="tipe_delete" value="<?= $tipe ?>" />
</form>

<form method="POST" action="<?php echo base_url(); ?>master/overhead/savetovalidate" id="form_simpan_validasi">
	<input type="hidden" value="" name="tobe_simpan_validasi_id" id="tobe_simpan_validasi_id" />
	<input type="hidden" name="tipe_simpan_validasi" id="tipe_simpan_validasi" value="<?= $tipe ?>" />
</form>

<form method="POST" action="<?php echo base_url(); ?>master/overhead/validate" id="form_validasi">
	<input type="hidden" value="" name="tobe_validated_id" id="tobe_validated_id" />
	<input type="hidden" value="" id="tobe_validated_val" name="tobe_validated_val" />
	<input type="hidden" name="tipe_validate" id="tipe_validate" value="<?= $tipe ?>" />
</form>

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
	<button type="button" class="btn btn-primary" onclick="deleteOverhead();">Ya</button>
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
				<h4 class="modal-title">Konfirmasi validasi Overhead <?= $tipe ?></h4>
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
						
<div id="template_form_ubah" style="display:none; margin-top: 20px; margin-bottom: 20px">
	<table class="table table-striped table-bordered table-hover centerTable">
	  <thead>
		<tr class="label-info">
		  <th>Nama</th>
		  <th>Kode</th>
		  <th>Koefisien</th>
		  <th>Satuan</th>
		  <th>Harga Satuan</th>
		  <th>Jumlah</th>
		</tr>
	  </thead>
	  <tbody>
		<tr id="header_total">
		  <td colspan="5" style="background-color: #167CAC;"><b style="color: #FFF">JUMLAH TOTAL</b></td>
		  <td id="jumlah_total" style="background-color: #167CAC; color: #FFF" align="right"></td>
		</tr>
	  </tbody>
	</table>
	<div class="clearfix">
		<br />
	</div>
	<div style="width: 100%" align="center" ng-if="displayField(['overhead_<?= $tipe ?>_admin'])"><div id="btnAdmin"><button id="edit" class="btn btn-primary btn-lg" onclick="editOverhead()">Edit</button><button id="delete" class="btn btn-success btn-lg" onclick="saveForValidated()">Simpan untuk validasi</button><button id="delete" class="btn btn-danger btn-lg" onclick="confirmDelete()">Hapus</button></div></div>
	<div style="width: 100%" align="center" ng-if="displayField(['overhead_<?= $tipe ?>_validator'])"><div id="btnValidator"><button id="validasi" class="btn btn-success btn-lg" onclick="validasiOverhead(3)">Validasi</button><button id="delete" class="btn btn-danger btn-lg" onclick="validasiOverhead(4)">Tolak</button></div></div>
</div>

<!-- Page heading -->
<div class="page-head">
    <h2 class="pull-left"><i class="fa fa-home"></i> Overhead <?= $tipe ?></h2>
    <!-- Breadcrumb -->
    <div class="bread-crumb pull-right">
        <a href="index.html"><i class="fa fa-home"></i> Home</a> 
        <!-- Divider -->
        <span class="divider">/</span> 
        <a href="#" class="bread-current">Overhead <?= $tipe ?></a>
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
							Data Overhead <?= $tipe ?>
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
						<div class="padd">
							<button ng-if="displayField(['overhead_<?= $tipe ?>_admin'])" type="button" class="btn btn-sm btn-primary" onclick="javascript:window.location='<?php echo base_url(); ?>master/overhead/add?tipe=<?= $tipe ?>'"><i class="fa fa-plus fa-fw"></i> Tambahkan overhead <?= $tipe ?></button>
							<div class="clearfix">
								<br />
							</div>
							<div class="page-tables">
								<!-- Table -->
								<div class="table-responsive" style="overflow-x: auto">
									<table id="example" class="display" cellspacing="0" width="100%" style="margin-bottom: 10px">
										<thead>
											<tr>
												<th>Kode</th>
												<th>Nama</th>
												<th>Harga</th>
												<th>Status</th>
												<th>RAB</th>
												<th>Detail</th>
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
