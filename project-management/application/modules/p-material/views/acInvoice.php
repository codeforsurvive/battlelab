<script>
	var base_url = "<?php echo base_url(); ?>";
	$(document).ready(function() {
		var table = $('#example').dataTable( {
			"processing": true,
			"serverSide": true,
			"ajax": "<?php echo base_url(); ?>p-material/invoice/getViewInvoice",
			"createdRow": function ( row, data, index ) {
				var id = data[0]; 
				$('td', row).eq(5).html('<a class="btn btn-primary btn-xs" target="_blank" href="'+base_url+'p-material/invoice/viewDetail/'+id+'"><i class="fa fa-eye fa-fw"></i> Lihat</a>');
				$('td', row).eq(3).html(parseFloat(data[3]).formatMoney(2));
				$('td', row).eq(0).html(index+1);
				$(row).attr('id', 'item_'+id);
			}
		} );
	} );
</script>
<!-- Page heading -->
<div class="page-head">
    <h2 class="pull-left"><i class="fa fa-building-o"></i> Invoice Material</h2>
    <!-- Breadcrumb -->
    <div class="bread-crumb pull-right">
        <a href="index.html"><i class="fa fa-home"></i> Home</a> 
        <!-- Divider -->
        <span class="divider">/</span> 
        <a href="#" class="bread-current">Invoice Material</a>
    </div>
    <div class="clearfix"></div>
</div>
<!-- Page heading ends -->

<div class="col-md-12">
    <div class="widget wgreen">
        <div class="widget-head">
            <div class="pull-left">Data List Invoice Material</div>
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

            <button ng-if="displayField(['invoice_admin']);" type="button" class="btn btn-sm btn-primary" onclick="window.location.href= '<?= base_url().$this->uri->segment(1, 0).'/'.$this->uri->segment(2, 0).'/add' ?>'"><i class="fa fa-plus fa-fw"></i> Tambahkan Invoice</button>
			<div class="clearfix">
				<br/>
			</div>
			<div class="page-tables">
				<!-- Table -->
				<div class="table-responsive">
					<table id="example" class="display" cellspacing="0" width="100%" style="margin-bottom: 10px">
						<thead>
							<tr>
								<th>No</th>
                                <th>Kode Invoice</th>
								<th>Tanggal invoice</th>
                                <th>Total harga</th>
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
