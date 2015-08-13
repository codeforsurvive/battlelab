<style>
	th, td{
		white-space: nowrap;
	}
</style>
<script>
	var base_url = "<?php echo base_url(); ?>";
	$(document).ready(function() {
		var table = $('#example').dataTable( {
			"processing": true,
			"serverSide": true,
			"ajax": "<?php echo base_url(); ?>p-material/po/getViewPo",
			"createdRow": function ( row, data, index ) {
				var id = data[0]; 
				var tipe = data[7];
				$('td', row).eq(6).html('<a class="btn btn-primary btn-xs" href="'+base_url+'p-material/po/viewDetail/'+id+'/'+tipe+'"><i class="fa fa-eye fa-fw"></i> Lihat</a>');
				$('td', row).eq(4).html(parseFloat(data[4]).formatMoney(2));
				$('td', row).eq(0).html(index+1);
				$(row).attr('id', 'item_'+id);
			}
		} );
	} );
</script>
<!-- Page heading -->
<div class="page-head">
    <h2 class="pull-left"><i class="fa fa-building-o"></i> Purchase Order</h2>
    <!-- Breadcrumb -->
    <div class="bread-crumb pull-right">
        <a href="index.html"><i class="fa fa-home"></i> Home</a> 
        <!-- Divider -->
        <span class="divider">/</span> 
        <a href="#" class="bread-current">PO</a>
    </div>
    <div class="clearfix"></div>
</div>
<!-- Page heading ends -->

<div class="col-md-12">
    <div class="widget wgreen">
        <div class="widget-head">
            <div class="pull-left">Data List PO</div>
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

            <button type="button" ng-if="displayField(['po_admin']);" class="btn btn-sm btn-primary" onclick="window.location.href= '<?= base_url().$this->uri->segment(1, 0).'/'.$this->uri->segment(2, 0).'/add' ?>'"><i class="fa fa-plus fa-fw"></i> Tambahkan PO</button>
			<div class="clearfix">
				<br/>
			</div>
			<div class="page-tables">
				<!-- Table -->
				<div class="table-responsive" style="overflow-x: auto">
					<table id="example" class="display" cellspacing="0" width="100%" style="margin-bottom: 10px">
						<thead>
							<tr>
								<th>No</th>
                                <th>Kode PO</th>
                                <th>Kode RAB</th>
                                <th>Nama Supplier</th>
								<th>Total Harga</th>
                                <th>Status</th>
                                <th>Detail</th>
							</tr>
						</thead>
					</table>
					<div class="clearfix">
					</div>
				</div>
			</div>
            <!-- End of Modal Section -->
        </div>

    </div>
</div>
