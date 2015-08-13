<!-- JS -->
<script src="<?php echo site_url() ?>assets/default/js/fullcalendar.min.js"></script> <!-- Full Google Calendar - Calendar -->
<script src="<?php echo site_url() ?>assets/default/js/jquery.rateit.min.js"></script> <!-- RateIt - Star rating -->
<script src="<?php echo site_url() ?>assets/default/js/jquery.prettyPhoto.js"></script> <!-- prettyPhoto -->
<script src="<?php echo site_url() ?>assets/default/js/jquery.slimscroll.min.js"></script> <!-- jQuery Slim Scroll -->
<script src="<?php echo site_url() ?>assets/default/js/jquery.dataTables.js"></script> <!-- Data tables -->
<script src="<?php echo site_url() ?>assets/default/md5/md5.min.js"></script> <!-- Javascript md5 -->
<!-- jQuery Flot -->
<script src="<?php echo site_url() ?>assets/default/js/excanvas.min.js"></script>
<script src="<?php echo site_url() ?>assets/default/js/jquery.flot.js"></script>
<script src="<?php echo site_url() ?>assets/default/js/jquery.flot.resize.js"></script>
<script src="<?php echo site_url() ?>assets/default/js/jquery.flot.pie.js"></script>
<script src="<?php echo site_url() ?>assets/default/js/jquery.flot.stack.js"></script>

<!-- jQuery Notification - Noty -->
<script src="<?php echo site_url() ?>assets/default/js/jquery.noty.js"></script> <!-- jQuery Notify -->
<script src="<?php echo site_url() ?>assets/default/js/themes/default.js"></script> <!-- jQuery Notify -->
<script src="<?php echo site_url() ?>assets/default/js/layouts/bottom.js"></script> <!-- jQuery Notify -->
<script src="<?php echo site_url() ?>assets/default/js/layouts/topRight.js"></script> <!-- jQuery Notify -->
<script src="<?php echo site_url() ?>assets/default/js/layouts/top.js"></script> <!-- jQuery Notify -->
<!-- jQuery Notification ends -->

<script src="<?php echo site_url() ?>assets/default/js/sparklines.js"></script> <!-- Sparklines -->
<script src="<?php echo site_url() ?>assets/default/js/jquery.cleditor.min.js"></script> <!-- CLEditor -->
<script src="<?php echo site_url() ?>assets/default/js/bootstrap-datetimepicker.min.js"></script> <!-- Date picker -->
<script src="<?php echo site_url() ?>assets/default/js/jquery.onoff.min.js"></script> <!-- Bootstrap Toggle -->
<script src="<?php echo site_url() ?>assets/default/js/filter.js"></script> <!-- Filter for support page -->
<script src="<?php echo site_url() ?>assets/default/js/custom.js"></script> <!-- Custom codes -->
<!--<script src="<?php echo site_url() ?>assets/default/js/custom_detailProject.js"></script>  Custom codes -->
<script src="<?php echo site_url() ?>assets/default/js/charts.js"></script> <!-- Charts & Graphs -->

<!-- Script for this page -->
<script>
	$(document).ready(function() {
		$('#bulk_value').change(function(){
			if(parseFloat($('#bulk_value').val())!=0){
				$('#bulk_apply').prop('disabled','');
			} else {
				$('#bulk_apply').prop('disabled','disabled');
			}
		});
		
		$('#aksi').off('click');
		
		$('#checkall').click(function(){
			listChecked = new Array();
			if (this.checked) {
				$('.checksingle').prop('checked', true);
				var data = $('#tableBarang').dataTable().fnGetData();
				for(var i=0; i<data.length; i++){
					insertNewCheck(data[i][0], listChecked);
				}
			} else {
				$('.checksingle').prop('checked', false);
			}
		}); 
	});
</script>