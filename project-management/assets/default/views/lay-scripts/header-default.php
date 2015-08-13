<!-- Stylesheets -->
<link href="<?php echo site_url() ?>assets/default/css/bootstrap.min.css" rel="stylesheet">
<!-- Font awesome icon -->
<link rel="stylesheet" href="<?php echo site_url() ?>assets/default/css/font-awesome.min.css"> 
<!-- jQuery UI -->
<link rel="stylesheet" href="<?php echo site_url() ?>assets/default/css/jquery-ui.css"> 
<!-- Calendar -->
<link rel="stylesheet" href="<?php echo site_url() ?>assets/default/css/fullcalendar.css">
<!-- prettyPhoto -->
<link rel="stylesheet" href="<?php echo site_url() ?>assets/default/css/prettyPhoto.css">  
<!-- Star rating -->
<link rel="stylesheet" href="<?php echo site_url() ?>assets/default/css/rateit.css">
<!-- Date picker -->
<link rel="stylesheet" href="<?php echo site_url() ?>assets/default/css/bootstrap-datetimepicker.min.css">
<!-- CLEditor -->
<link rel="stylesheet" href="<?php echo site_url() ?>assets/default/css/jquery.cleditor.css">
<!-- Data tables -->
<link rel="stylesheet" href="<?php echo site_url() ?>assets/default/css/jquery.dataTables.css">
<!-- Bootstrap toggle -->
<link rel="stylesheet" href="<?php echo site_url() ?>assets/default/css/jquery.onoff.css">
<!-- Main stylesheet -->
<link href="<?php echo site_url() ?>assets/default/css/style.css" rel="stylesheet">
<!--<link href="<?php echo site_url() ?>assets/default/css/style_detailProject.css" rel="stylesheet">-->
<!-- Widgets stylesheet -->
<link href="<?php echo site_url() ?>assets/default/css/widgets.css" rel="stylesheet">   

<script src="<?php echo site_url() ?>assets/default/js/respond.min.js"></script>
<!--[if lt IE 9]>
<script src="<?php echo site_url() ?>assets/default/js/html5shiv.js"></script>
<![endif]-->

<!--advance form -->
<!--<link href="<?php echo site_url() ?>assets/default/bs3/css/bootstrap.min.css" rel="stylesheet">-->
<!--<link href="<?php echo site_url() ?>assets/default/css/bootstrap-reset.css" rel="stylesheet">-->
<link href="<?php echo site_url() ?>assets/default/font-awesome/css/font-awesome.css" rel="stylesheet" />

<!--<link rel="stylesheet" href="<?php echo site_url() ?>assets/default/css/bootstrap-switch.css" />-->
<link rel="stylesheet" type="text/css" href="<?php echo site_url() ?>assets/default/js/jquery-multi-select/css/multi-select.css" />
<!--<link rel="stylesheet" type="text/css" href="<?php echo site_url() ?>assets/default/js/jquery-tags-input/jquery.tagsinput.css" />-->

<link rel="stylesheet" type="text/css" href="<?php echo site_url() ?>assets/default/js/select2/select2.css" />
<script src="<?php echo site_url()?>assets/default/js/jquery.js"></script> <!-- jQuery -->
<script src="<?php echo site_url()?>assets/default/js/bootstrap.min.js"></script> <!-- Bootstrap -->
<script src="<?php echo site_url()?>assets/default/js/jquery-ui.min.js"></script> <!-- jQuery UI -->
<script src="<?php echo site_url()?>assets/default/js/angular.min.js"></script> <!-- angular JS -->
<script>
	/* User management function */
	var role = JSON.parse('<?= $role ?>');
	var app = angular.module('app', []);
	var listChecked = new Array();
	app.controller('PermissionsForm', function ($scope, $window) {
		$scope.mockData = { 
			role: $window.role
		};
			
		$scope.displayField = function(fieldName){
			var foundRole = false;
			angular.forEach(fieldName, function(value) {
				if ($scope.mockData.role.indexOf(value) > -1){    
					foundRole = true;
				}
			});
			return foundRole;
		}
	});
	/* ================================================ */
	
	function isPermitted(value, newrole){
		if (typeof(newrole)==='undefined') newrole = role;
		for(var i=0; i<value.length; i++){
			if(newrole.indexOf(value[i]) > -1){
				return true;
			}
		}
		return false;
	}
	
	Number.prototype.formatMoney = function(c, d, t){
	var n = this, 
		c = isNaN(c = Math.abs(c)) ? 2 : c, 
		d = d == undefined ? "." : d, 
		t = t == undefined ? "," : t, 
		s = n < 0 ? "-" : "", 
		i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", 
		j = (j = i.length) > 3 ? j % 3 : 0;
	   return '<span class="currency">Rp</span><span class="number">' + s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "") + '</span>';
	};
	 
	String.prototype.formatFloat = function(){
	var n = this;
		return parseFloat( (n).replace(/,/g, '') );
	};
	 
	 
	function insertNewCheck(newID, listArray){
		var found = jQuery.inArray(newID, listArray);
		if (found >= 0) {
			// Element was found, remove it.
			listArray.splice(found, 1);
		} else {
			// Element was not found, add it.
			listArray.push(newID);
		}
	}
</script>

<!-- Custom styles for this template -->
<!--<link href="<?php echo site_url() ?>assets/default/css/style2.css" rel="stylesheet">-->
<!--<link href="<?php echo site_url() ?>assets/default/css/style-responsive.css" rel="stylesheet" />-->
<!-- end advance form -->
