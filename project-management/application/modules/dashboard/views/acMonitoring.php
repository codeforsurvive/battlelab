<script>
	var table;
	
	function changePerusahaan(){
		var id = $('#perusahaan').val();
		$('#main_project_form').append('<img id="snake_loader" src="<?= base_url() ?>/assets/default/img/snake_loader.gif" width="20">');
		$.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>projects/mainproject/getViewMainProjectByPerusahaanId",
			data: {id: id}, 
			cache: false,
			success: function(result){
				if(result!=null) {
					var res = JSON.parse(result);
					var mainProject = res["main_project"];
					$('#main_project').html('');
					var toAppend = '<option disabled selected> -- pilih main project -- </option>';
					for(var i=0;i<mainProject.length;i++){
						toAppend += '<option value="' + mainProject[i]['<?= mMainProject::ID ?>'] + '">'+mainProject[i]['<?= mMainProject::NAMA ?>']+'</option>';
					}
					$('#main_project').html(toAppend);
					$('#snake_loader').remove();
				}
				else
					console.log(result);
			}
		});
		ajaxReload();
	}
	
	function ajaxReload(){
		$('#example').DataTable().ajax.reload();
	}
	
	var base_url = "<?php echo base_url(); ?>";
	$(document).ready(function() {
		table = $('#example').dataTable( {
			"processing": true,
			"serverSide": true,
			"ajax": {
				"url": "<?php echo base_url(); ?>dashboard/Monitoring/getViewProjects",
				"dataSrc": function ( json ) {
					jsonData = json.data;
					return json.data;
				},
				"type": "POST",
				"data": function (d){
					d.Perusahaan = $('#perusahaan').val();
					d.MainProject = $('#main_project').val();
					d.Status = $('#status').val();
					d.Progres = $('#progres').val();
				}
			  },
			"createdRow": function ( row, data, index ) {
				var id = data[0]; 
				//$('td', row).eq(5).html('<a class="btn btn-primary btn-xs" target="_blank" href="'+base_url+'p-material/invoice/viewDetail/'+id+'"><i class="fa fa-eye fa-fw"></i> Lihat</a>');
				//$('td', row).eq(3).html(parseFloat(data[3]).formatMoney(2));
				$('td', row).eq(0).html(index+1);
				$('td', row).eq(5).html(data[12]);
				$('td', row).eq(7).html(data[7] + '%');
				$('td', row).eq(8).html(data[8] + '% <a class="btn btn-primary btn-xs" target="_blank" href="'+base_url+'dashboard/Monitoring/viewProsentase/'+data[13]+'"><i class="fa fa-eye fa-fw"></i> Detail</a>');
				$('td', row).eq(9).html('<a class="btn btn-primary btn-xs" target="_blank" href="'+base_url+'projects/project/viewDetail/'+id+'"><i class="fa fa-eye fa-fw"></i> Detail</a><a class="btn btn-success btn-xs" target="_blank" href="'+base_url+'dashboard/Monitoring/viewProgres/'+id+'"><i class="fa fa-eye fa-fw"></i> Monitoring</a>');
				if(data[6]!=null){
					$('td', row).eq(6).html(data[6] + ' hari (' + data[10] + ' s/d ' + data[11] + ')');
				} else {
					$('td', row).eq(6).html('Belum diestimasi');
				}
				$(row).attr('id', 'item_'+id);
			}
		} );
	} );
</script>
<style>
	th, td {
		white-space: nowrap;
	}
</style>
<!-- Page heading -->
<div class="page-head">
    <h2 class="pull-left"><i class="fa fa-building-o"></i> Monitoring</h2>
    <!-- Breadcrumb -->
    <div class="bread-crumb pull-right">
        <a href="index.html"><i class="fa fa-home"></i> Home</a> 
        <!-- Divider -->
        <span class="divider">/</span> 
        <a href="<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/index' ?>" class="bread-current">Dashboard</a>
        <span class="divider">/</span> 
        <a href="#" class="bread-current">Monitoring</a>
    </div>
    <div class="clearfix"></div>
</div>
<!-- Page heading ends -->

<div class="col-md-12">
    <div class="widget wgreen">
        <div class="widget-head">
            <div class="pull-left">Monitoring</div>
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
        <div class="widget-content" style="padding: 10px; min-height: 300px; overflow-x: auto" >
			<div>
				<div class="form-group col-lg-6">
					<label class="col-lg-3 control-label">Perusahaan</label>
					<div class="col-lg-8">
						<select class="form-control" id="perusahaan" name="perusahaan" onchange="changePerusahaan();">
						<option disabled selected> -- pilih perusahaan -- </option>
							<?php 
								foreach ($listPerusahaan as $i) {
									echo "<option value='" . $i[mPerusahaan::ID] . "'>" . $i[mPerusahaan::NAMA] . "</option>"; 
								} 
							?>
						</select>
					</div>
				</div>
				<div class="form-group col-lg-6">
					<label class="col-lg-3 control-label">Status Project</label>
					<div class="col-lg-8">
						<select class="form-control" id="status" name="status" onchange="ajaxReload();">
							<option disabled selected> -- pilih status -- </option>
							<option value="1">Perencanaan</option>
							<option value="2">Siap Jalan</option>
							<option value="3">Berjalan</option>
							<option value="4">Selesai</option>
						</select>
					</div>
				</div>
				<div class="form-group col-lg-6" id="main_project_form">
					<label class="col-lg-3 control-label">Main Project</label>
					<div class="col-lg-8">
						<select class="form-control" id="main_project" name="main_project" onchange="ajaxReload();">
							<option disabled selected> -- pilih main poject -- </option>
						</select>
					</div>
				</div>
				<div class="form-group col-lg-6">
					<label class="col-lg-3 control-label">Prosentase Progres</label>
					<div class="col-lg-8">
						<select class="form-control" id="progres" name="progres" onchange="ajaxReload();">
							<option disabled selected> -- pilih progres -- </option>
							<option value="1">0% - 20%</option>
							<option value="2">21% - 40%</option>
							<option value="3">41% - 60%</option>
							<option value="4">61% - 80%</option>
							<option value="4">81% - 100%</option>
						</select>
					</div>
				</div>
			</div>
			<div class="page-tables">
				<!-- Table -->
				<div class="table-responsive" align="right">
					<table id="example" class="display" cellspacing="0" width="100%"  style="margin-bottom: 10px">
						<thead>
							<tr>
								<th>No</th>
								<th>Kode Sub Project</th>
								<th>Nama Sub Project</th>
								<th>Kode Main Project</th>
								<th>Nama Main Project</th>
								<th>Status</th>
								<th>Durasi</th>
								<th>Progres Upah</th>
								<th>Progres Total</th>
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
</div>
