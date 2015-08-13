
<script>
	var base_url = "<?php echo base_url(); ?>";
	$(document).ready(function() {
		var table = $('#example').dataTable( {
                        "order": [[0, "desc" ]],
			"processing": true,
			"serverSide": true,
			"ajax": "<?php echo base_url(); ?>notifications/getAllNotif",
			"createdRow": function ( row, data, index ) {
                              //alert (data[2].trim());
				var id = data[6]; 
                                
                                var status = '';
                                
                                if (data[2].trim() ==='add')
                                {
                                    $('td', row).eq(2).html('<span class=""></span> add');
                                }
                                else if (data[2].trim() ==='update')
                                {
                                    $('td', row).eq(2).html('<span class=""></span> update');
                                }
                                else if (data[2].trim() ==='remove')
                                {
                                    $('td', row).eq(2).html('<span class=""></span> remove');
                                }
                                else if (data[2].trim() ==='start')
                                {
                                    $('td', row).eq(2).html('<span class=""></span> start');
                                    status +="<span class=\"fa fa-play\"></span> ";
                                }
                                else if (data[2].trim() ==='stop')
                                {
                                    $('td', row).eq(2).html('<span class=""></span> stop');
                                    status +="<span class=\"fa fa-stop\"></span> ";
                                }
                                else if (data[2].trim() ==='validation')
                                {
                                    $('td', row).eq(2).html('<span class=""></span> validation');
                                    status +="<span class=\"fa fa-exclamation-triangle\"></span> ";
                                }
                                else if (data[2].trim() === 'validate')
                                {
                                    $('td', row).eq(2).html('<span class=""></span> validated');
                                }
                               
                                
                                if (data[5] == 0)
                                {
                                    status += '<span class="label label-warning">Not Read</span> ';
                                }
                                else if (data[5] == 1)
                                {
                                    status += '<span class="label label-primary">Read</span> ';
                                }
                                $('td', row).eq(5).html(status);
                                
				$('td', row).eq(6).html('<a class="btn btn-primary btn-xs" href="'+base_url+'notifications/viewId/'+id+'/"><i class="fa fa-eye fa-fw"></i></a>');
				$(row).attr('id', 'item_'+id);
			}
		} );
	} );
</script>

<!-- Page heading -->
<div class="page-head">
    <h2 class="pull-left"><i class="fa fa-home"></i> Semua Notifikasi Anda</h2>
    <!-- Breadcrumb -->
    <div class="bread-crumb pull-right">
        <a href="<?php echo base_url().'notifications'?>"><i class="fa fa-home"></i> Notification</a> 
        <!-- Divider -->
        <span class="divider">/</span> 
        <a href="<?php echo base_url().'notifications'?>" class="bread-current">All</a>
    </div>
    <div class="clearfix"></div>

</div>
<!-- Page heading ends -->

<div class="matter">
    <div class="container">
        <div class="row">
            <div class="col-md-12"> 
            <!-- edit here -->
              <div class="col-md-12">
              <div class="widget">
                <!-- Widget title -->
                
                <div class="widget-content">
                  <!-- Widget content -->
                  <!-- activity starts -->
                  <div class="page-tables">
				<!-- Table -->
                        <div class="table-responsive" style="overflow-x: auto">
                                <table id="example" class="display" cellspacing="0" width="100%" style="margin-bottom: 10px">
                                        <thead>
                                                <tr>
                        <th>Waktu</th>
                        <th>Aktor</th>
                        <th>Aksi</th>
                        <th>Transaksi</th>
                        <th>Kode</th>
                        <th></th>
                        <th>Control</th>                        </tr>
                                        </thead>
                                </table>
                                <div class="clearfix">
                                </div>
                        </div>
                   </div>
                  <div class="widget-foot">
                    <button onclick="window.location.assign('<?= base_url().'notifications/readAll'?>')" class="btn pull-right btn-xs btn-default">Mark All as Read </button>
                    <div class="clearfix"></div>
                  </div>

                </div>
              </div>
            </div>

            </div>
        </div>
    </div>
</div>