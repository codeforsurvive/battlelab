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
	
    .header_info{

    }
    
    .control-button {
        margin:0px 10px 0px 0px; width:100%;
    }
	
	th, td {
		white-space: nowrap; 
	}
</style>

<script>
	var current_id_project = -1;
	var estimator_id = -1;
	var project_id = -1;
	
	function changeMainProject(){
		var id = $('#main_project').val();
		$('#sub_project_form').append('<img id="snake_loader" src="<?= base_url() ?>/assets/default/img/snake_loader.gif" width="20">');
		$.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>projects/mainproject/getViewSubProject",
			data: {id: id}, 
			cache: false,
			success: function(result){
				if(result!=null) {
					var res = JSON.parse(result);
					var subProject = res["sub_project"];
					$('#sub_project').html('');
					$('#rab').html('');
					var toAppend = '<option disabled selected> -- pilih Sub Project -- </option><option value="-1"> Semua sub project </option>';
					for(var i=0;i<subProject.length;i++){
						toAppend += '<option value="' + subProject[i]['<?= mProject::ID ?>'] + '">'+subProject[i]['<?= mProject::NAMA ?>']+'</option>';
					}
					$('#sub_project').html(toAppend);
					$('#snake_loader').remove();
				}
				else
					console.log(result);
			}
		});
		tableRab.fnDestroy();
		tableRab = $('#tabelRAB').dataTable( {
			"processing": true,
			"serverSide": true,
			"ajax": "<?php echo base_url(); ?>rab/rabs/getViewRabByMainId?main_project_id=" + id,
			"createdRow": function ( row, data, index ) {
				var id = data[7];
				var cur_val_count = data[8];
				var status_approval = data[9];
				$('td', row).eq(2).html(parseFloat(data[2]).formatMoney(2));
				$('td', row).eq(4).html(parseFloat(data[4]).formatMoney(2));
				var text = '<a target="_blank" href="<?= base_url(); ?>rab/rabs/printRABpdf/'+id+'"><img height="15" src="<?= base_url(); ?>assets/default/img/icons/pdf.png" class="icons" title="Export to PDF" /></a><button class="btn btn-primary btn-xs" onclick="viewProjectRAB(' + data[10] + ')"><i class="fa fa-eye fa-fw"></i> Lihat di project</button>';
				$('td', row).eq(7).html(text);
				$(row).attr('id', 'item_'+id);
			},
			"fnDrawCallback": function(oSettings, json) {
			  $('#snake_loader').remove();
			}
		} );
	}
	
	function changeSubProject(){
		var id = $('#sub_project').val();
		estimator_id = -1;
		project_id = -1;
		$('#rab_form').append('<img id="snake_loader" src="<?= base_url() ?>/assets/default/img/snake_loader.gif" width="20">');
		var project_id = $('#sub_project').val();
		tableRab.fnDestroy();
		tableRab = $('#tabelRAB').dataTable( {
			"processing": true,
			"serverSide": true,
			"ajax": "<?php echo base_url(); ?>rab/rabs/getViewRabById?project_id=" + project_id,
			"createdRow": function ( row, data, index ) {
				var id = data[7];
				var cur_val_count = data[8];
				var status_approval = data[9];
				$('td', row).eq(2).html(parseFloat(data[2]).formatMoney(2));
				$('td', row).eq(4).html(parseFloat(data[4]).formatMoney(2));
				var text = '<a target="_blank" href="<?= base_url(); ?>rab/rabs/printRABpdf/'+id+'"><img height="15" src="<?= base_url(); ?>assets/default/img/icons/pdf.png" class="icons" title="Export to PDF" /></a><button class="btn btn-primary btn-xs" onclick="viewProjectRAB(' + data[10] + ')"><i class="fa fa-eye fa-fw"></i> Lihat di project</button>';
				$('td', row).eq(7).html(text);
				project_id = data[10];
				estimator_id = data[11];
				$(row).attr('id', 'item_'+id);
			},
			"fnDrawCallback": function(oSettings, json) {
				if(id>0 && estimator_id == <?= $iduseractive ?>){
					$('#buttonAddRab').show();
				} else {
					$('#buttonAddRab').hide();
				}
				$('#snake_loader').remove();
			}
		} );
	}
	
	function addRab() {
		$("#estimator_id").val(estimator_id);
		$("#project_id").val(project_id);
		$("#rab_add").submit();
	}
	
	function viewProjectRAB(id){
		window.open('<?php echo base_url(); ?>projects/project/viewDetail/'+id+'#rab');
	}
	
	$(document).ready(function() {
		$('#buttonAddRab').hide();
		var project_id = $('#sub_project').val();
		tableRab = $('#tabelRAB').dataTable( {
			"processing": true,
			"serverSide": true,
			"ajax": "<?php echo base_url(); ?>rab/rabs/getViewRabById?project_id=" + project_id,
			"createdRow": function ( row, data, index ) {
				var id = data[7];
				var cur_val_count = data[8];
				var status_approval = data[9];
				$('td', row).eq(2).html(parseFloat(data[2]).formatMoney(2));
				$('td', row).eq(4).html(parseFloat(data[4]).formatMoney(2));
				var text = '<a target="_blank" href="<?= base_url(); ?>rab/rabs/printRABpdf/'+id+'"><img height="15" src="<?= base_url(); ?>assets/default/img/icons/pdf.png" class="icons" title="Export to PDF" /></a><button class="btn btn-primary btn-xs" onclick="viewProjectRAB(' + data[10] + ')"><i class="fa fa-eye fa-fw"></i> Lihat di project</button>';
				$('td', row).eq(7).html(text);
				$(row).attr('id', 'item_'+id);
			}
		} );
	} );
</script>

<div id="template_view_sub_project" style="display:none; margin-top: 20px; margin-bottom: 20px">
    <table class="table table-striped table-bordered centerTable">
        <thead>
            <tr class="label-info">
				<th>No</th>
				<th>Kode Project</th>
				<th>Nama</th>
				<th>Waktu <small>(yyyy-mm-dd hh-mm-ss)</small></th>
				<th>Status</th>
				<th>Detail</th>
            </tr>
        </thead>
        <tbody id="detail_sub_project">

        </tbody>
    </table>
    <div class="clearfix">
        <br />
    </div>
</div>


<!-- Page heading -->
<div class="page-head">
    <h2 class="pull-left"><i class="fa fa-building-o"></i> RAB</h2>
    <!-- Breadcrumb -->
    <div class="bread-crumb pull-right">
        <a href="index.html"><i class="fa fa-home"></i> Home</a> 
        <!-- Divider -->
        <span class="divider">/</span> 
        <a href="#" class="bread-current">RAB</a>
    </div>
    <div class="clearfix"></div>
</div>
<!-- Page heading ends -->

<div id="deleteModalMain" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title">Konfirmasi penghapusan item main project</h4>
			</div>
			<div class="modal-body">
				<h3>Anda yakin untuk menghapus item ini?</h3>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" onclick="deleteMainProject();">Ya</button>
				<button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Tidak</button>
			</div>
		</div>
	</div>
</div>

<form method="POST" action="<?php echo base_url(); ?>projects/mainproject/delete" id="form_delete_main">
	<input type="hidden" value="" name="tobe_deleted_main_id" id="tobe_deleted_main_id" />
</form>

<div id="deleteModalSub" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title">Konfirmasi penghapusan item sub project</h4>
			</div>
			<div class="modal-body">
				<h3>Anda yakin untuk menghapus item ini?</h3>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" onclick="deleteSubProject();">Ya</button>
				<button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Tidak</button>
			</div>
		</div>
	</div>
</div>

<form method="POST" action="<?php echo base_url(); ?>projects/project/delete" id="form_delete_sub">
	<input type="hidden" value="" name="tobe_deleted_sub_id" id="tobe_deleted_sub_id" />
</form>

<div class="matter">
    <div class="container">
        <div class="row">
            <div class="col-md-12"> 
                <!-- edit here -->
                <div class="widget">
                    <div class="widget-head">
                        <div class="pull-left">Data RAB</div>
                        <div class="widget-icons pull-right">
                            <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                            <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                        </div>  
                        <div class="clearfix"></div>
                    </div>
                    <div class="widget-content">
                        <div class="padd">
							<form method="POST" action="<?php echo base_url(); ?>rab/rabs/add" id="rab_add">
								<input type="hidden" value="" name="project_id" id="project_id" />
								<input type="hidden" value="" name="estimator_id" id="estimator_id" />
							</form>
                            <div class="row">
								<form class="form-horizontal" role="form">
								<div class="form-group">
									<label class="col-lg-2 control-label">Main Project</label>
									<div class="col-lg-5">
										<select class="form-control" id="main_project" name="main_project" onchange="changeMainProject();">
										<option disabled> -- pilih main poject -- </option>
										<option value='-1' selected> Semua main project </option>
		<?php foreach ($listMainProject as $i) {
		echo "<option value='" . $i[mMainProject::ID] . "'>" . $i[mMainProject::NAMA] . "</option>";
		} ?>
										</select>
									</div>
								</div>
								<div class="form-group" id="sub_project_form">
									<label class="col-lg-2 control-label">Sub Project</label>
									<div class="col-lg-5">
										<select class="form-control" id="sub_project" name="sub_project" onchange="changeSubProject();">
											<option disabled> -- pilih sub poject -- </option>
											<option value='-1' selected> Semua sub project </option>
										</select>
									</div>
									<div class="col-lg-4">
										<button type="button" class="btn btn-sm btn-primary" id="buttonAddRab" onclick="addRab();"><i class="fa fa-plus fa-fw"></i> Tambahkan RAB</button>
									</div>
								</div>
								</form>
                                <div class="col-md-12">
                                    <div class="page-tables">
										<!-- Table -->
										<div class="table-responsive" style="overflow-x: auto">
											<table id="tabelRAB" class="display" cellspacing="0" width="100%">
												<thead>
													<tr>
														<th>Kode</th>
														<th>Nama</th>
														<th>Harga</th>
														<th>Luas</th>
														<th>Rata-rata harga</th>
														<th>Lokasi</th>
														<th>Status</th>
														<th>Detail Estimasi</th>
													</tr>
												</thead>
											</table>
											<div class="clearfix">
											</div>
										</div>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br/><br/>
            </div>
        </div>
    </div>
</div>
</div>
