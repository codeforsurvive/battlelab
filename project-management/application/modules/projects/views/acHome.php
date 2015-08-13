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
</style>

<script>
	var current_id_project = -1;
	
	$(document).ready(function() {
		var table = $('#example').dataTable( {
			"processing": true,
			"serverSide": true,
			"ajax": "<?php echo base_url(); ?>projects/mainproject/getViewMainProject",
			"createdRow": function ( row, data, index ) {
				var id = data[0];
				$('td', row).eq(0).html(index+1);
				var base_url = '<?= base_url(); ?>';
				if(isPermitted(['proyek_admin'])){
					$('td', row).eq(5).html('<button class="btn btn-primary btn-xs" style="margin: 5px 5px" onclick="window.location.href=\''+base_url+'projects/mainproject/viewDetail/'+id+'\'"><i class="fa fa-eye fa-fw"></i> Detail</button><button class="btn btn-success btn-xs" style="margin: 5px 5px" onclick="window.location.href=\''+base_url+'projects/mainproject/viewEdit/'+id+'\'"><i class="fa fa-pencil fa-fw"></i> Edit</button><button class="btn btn-danger btn-xs" style="margin: 5px 5px" onclick="confirmDeleteMainProject(\''+id+'\')"><i class="fa fa-trash-o fa-fw"></i> Delete</button><button class="btn btn-info btn-xs" style="margin: 5px 5px" onclick="viewSubProject('+id+')"><i class="fa fa-list fa-fw"></i></button>');
				} else {	
					$('td', row).eq(5).html('<button class="btn btn-primary btn-xs" style="margin: 5px 5px" onclick="window.location.href=\''+base_url+'projects/mainproject/viewDetail/'+id+'\'"><i class="fa fa-eye fa-fw"></i> Detail</button><button class="btn btn-info btn-xs" style="margin: 5px 5px" onclick="viewSubProject('+id+')"><i class="fa fa-list fa-fw"></i></button>');
				}
				if(data[4]==1) {
					$('td', row).eq(4).html('<a class="success"><span class="fa fa-check"></span> Aktif</a>');
				} else {
					$('td', row).eq(4).html('<a class="danger"><span class="fa fa-times"></span> Tidak Aktif</a>');
				}
				$(row).attr('id', 'item_'+id);
			}
		} );
	} );
	function startProject(id)
        {
            if (confirm('Apakah Anda ingin memulai Project ini?')) {
                window.location.assign( '<?= base_url() ?>projects/project/startProject/'+id);
            }
            else {
                alert ('Transaksi dibatalkan oleh Pengguna');
            }
            
        }
	function viewSubProject(id) {
		if (current_id_project != id) {
			current_id_project = id;
			$("#row_view_sub_project").remove();
			$("<tr id='row_view_sub_project'><td colspan='7'><div style='margin-top:10px; margin-bottom:10px' id='form_view_sub_project' align='center'><img id='bar_loader_sub_project' src='<?= base_url() . 'assets/default/img/bar_loader.gif' ?>'></div></td></tr>").insertAfter("#item_" + current_id_project);
			var x = $("#template_view_sub_project").clone();
			x.appendTo("#form_view_sub_project");
			$.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>projects/mainproject/getViewSubProject",
				data: {id: id},
				cache: true,
				success: function(result) {
					var res = JSON.parse(result);
					var res_sub = res["sub_project"];
					var sub_project = '';
					var base_url = '<?= base_url(); ?>';
					$("#bar_loader_sub_project").remove();
					$(".item_sub_project").remove();
					var cString = 'A';
					var c = 0;
					for (var i = 0; i < res_sub.length; i++) {
						var aktif = 'aktif';
						var editdelete = '';
						if(res_sub[i]["PROJECT_ACTIVE"]=="1") {
							aktif = '<p style="text-decoration:italic; text-align: center">'+res_sub[i]["STATUS_PROJECT_NAMA"]+'</p>';
							if (res_sub[i]["STATUS_PROJECT_ID"]==2)
							{
								aktif +='';
							}
							if (res_sub[i]["STATUS_PROJECT_ID"]==1)
							{
								editdelete +='<button class="btn btn-success btn-xs "  onclick="window.location.href=\''+base_url+'projects/project/viewEdit/'+res_sub[i]["PROJECT_ID"]+'\'"><i class="fa fa-pencil fa-fw"></i> Edit</button><button class="btn btn-danger btn-xs"  onclick="confirmDeleteSubProject(\''+res_sub[i]["PROJECT_KODE"]+'\')"><i class="fa fa-trash-o fa-fw"></i> Delete</button>';
							}
						} else {
							aktif = '<a class="danger"><span class="fa fa-times"></span> Tidak Aktif</a>';
						}
						if(isPermitted(['proyek_admin'])){
							sub_project += '<tr class="item_sub_project"><td>' + (i+1) + '</td><td>' + res_sub[i]["PROJECT_KODE"] + '</td><td>' + res_sub[i]["PROJECT_NAMA"] + '</td><td>' + res_sub[i]["PROJECT_CREATE"] + '</td><td>' + aktif + '</td><td><button class="btn btn-primary btn-xs "  onclick="window.location.href=\''+base_url+'projects/project/viewDetail/'+res_sub[i]["PROJECT_ID"]+'\'"><i class="fa fa-eye fa-fw"></i> Lihat</button>'+editdelete+'</td></tr>';
						} else {
							sub_project += '<tr class="item_sub_project"><td>' + (i+1) + '</td><td>' + res_sub[i]["PROJECT_KODE"] + '</td><td>' + res_sub[i]["PROJECT_NAMA"] + '</td><td>' + res_sub[i]["PROJECT_CREATE"] + '</td><td>' + aktif + '</td><td><button class="btn btn-primary btn-xs "  onclick="window.location.href=\''+base_url+'projects/project/viewDetail/'+res_sub[i]["PROJECT_ID"]+'\'"><i class="fa fa-eye fa-fw"></i> Lihat</button></td></tr>';
						}
					}
					$("#template_view_sub_project #detail_sub_project").html(sub_project);

					x.slideDown();
				}
			});
		} else {
			$('#form_view_sub_project').slideUp('normal', function() {
				$('#row_view_sub_project').remove();
			});
			current_id_project = -1;
		}
	}
	
	function confirmDeleteMainProject(id) {
	$("#tobe_deleted_main_id").val(id);
        $("#deleteModalMain").modal();
    }

    function deleteMainProject() {
        $("#deleteModalMain").modal("hide");
        $("#form_delete_main").submit();
    }
	
	function confirmDeleteSubProject(id) {
	$("#tobe_deleted_sub_id").val(id);
        //alert (id);
        $("#deleteModalSub").modal();
    }

    function deleteSubProject() {
        $("#deleteModalSub").modal("hide");
        $("#form_delete_sub").submit();
    }
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
    <h2 class="pull-left"><i class="fa fa-building-o"></i> Project</h2>
    <!-- Breadcrumb -->
    <div class="bread-crumb pull-right">
        <a href="index.html"><i class="fa fa-home"></i> Home</a> 
        <!-- Divider -->
        <span class="divider">/</span> 
        <a href="#" class="bread-current">Project</a>
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
                        <div class="pull-left">Data Project</div>
                        <div class="widget-icons pull-right">
                            <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                            <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                        </div>  
                        <div class="clearfix"></div>
                    </div>
                    <div class="widget-content">
                        <div class="padd">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="page-tables">
                                        <!-- Table -->
                                        <div class="table-responsive">
											<div ng-if="displayField(['proyek_admin'])" class="btn-group"><button class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-plus fa-fw"></i> Tambah project <span class="caret"></span></button><ul class="dropdown-menu"><li><a href="<?= base_url().'projects/mainproject/viewAddNew' ?>"><i class="fa fa-building-o fa-fw"></i> Main project</a></li><li><a href="<?= base_url().'projects/project/viewAddNew' ?>"><i class="fa fa-building-o fa-fw"></i> Sub project</a></li></ul></div><br/><br/>	
											<table id="example" class="display" cellspacing="0" width="100%"  style="margin-bottom: 10px">
												<thead>
													<tr>
														<th>No</th>
                                                        <th>Kode Project</th>
                                                        <th>Nama Project</th>
														<th>Nama Perusahaan</th>
                                                        <th>Status</th>
                                                        <th width="300">Detail</th>
													</tr>
												</thead>
											</table>
                                            <div class="clearfix"></div>
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
