<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Chain Select With Codeigniter and Jquery</title>
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/base/jquery-ui.css" type="text/css" media="all" />
		<link rel="stylesheet" href="http://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" type="text/	css" media="all" />
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js" type="text/javascript"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js" type="text/javascript"></script>
  </head>
  <body>
    <!-- page content -->
    <?php echo form_open('chain/submit');?>
    <div id="mapel" style="width:250px;float:left;">
    MATA PELAJARAN : <br/>
    <?php
    	echo form_dropdown("ID_MASTER_PENILAIAN",$option_mapel,"","id='ID_MASTER_PENILAIAN'");
    ?>
    </div>
    <div id="ki">
    Kota / Kabupaten :<br/>
   	<?php
    	echo form_dropdown("ID_MASTER_PENILAIAN",array('Pilih Aspek Penilaian'=>'Pilih Mata Pelajaran Dahulu'),'','disabled');
    ?>
    </div>
    <?php echo form_submit("submit","Submit"); ?>
    <?php echo form_close(); ?>
    <script type="text/javascript">
	  	$("#ID_MASTER_PENILAIAN").change(function(){
	    		var selectValues = $("#ID_MASTER_PENILAIAN").val();
	    		if (selectValues == 0){
	    			var msg = "Kota / Kabupaten :<br><select name=\"ID_MASTER_PENILAIAN\" disabled><option value=\"Pilih Kota / Kabupaten\">Pilih Propinsi Dahulu</option></select>";
	    			$('#ki').html(msg);
	    		}else{
	    			var ID_MASTER_PENILAIAN = {ID_MASTER_PENILAIAN:$("#ID_MASTER_PENILAIAN").val()};
	    			$('#ki').attr("disabled",true);
	    			$.ajax({
							type: "POST",
							url : "<?php echo site_url('chain/select_kota')?>",
							data: ID_MASTER_PENILAIAN,
							success: function(msg){
								$('#ki').html(msg);
							}
				  	});
	    		}
	    });
	   </script>
  </body>
</html>
