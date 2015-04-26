<!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Rapor Online Sidoarjo</title>
	<meta name="description" content="Bootstrap Metro Dashboard">
	<meta name="author" content="Dennis Ji">
	<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->
	<link id="bootstrap-style" href="css/bootstrap.css" rel="stylesheet">
	<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="css/style-responsive.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<!-- end: CSS -->
	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="css/ie.css" rel="stylesheet">
	<![endif]-->
	
	<!--[if IE 9]>
		<link id="ie9style" href="css/ie9.css" rel="stylesheet">
	<![endif]-->
		
	<!-- start: Favicon -->
	<link rel="shortcut icon" href="img/siswasmp.png">
	<!-- end: Favicon -->
	<link id="container" href="css/cobatab.css" rel="stylesheet">
</head>

<body>
	

		<!-- start: Header -->
	<?php include('header.php'); ?>
	<!-- start: Header -->
	<?php include('menu.php'); ?>
		<div class="container-fluid-full">
			
			<div class="row-fluid">
				
				<!-- start: Content -->
				<div id="content" class="span10">
					<!--?php include ("navigation.php"); ?-->
					<ul class="breadcrumb">
						<li>
							<i class="icon-home"></i>
							<a href="#">Home</a>
							<i class="icon-angle-right"></i> 
						</li>
						<li>
							<i class="icon-edit"></i>
							<a href="walikelas.php">Wali kelas 7A</a>
						</li>
					</ul>
					
					<!-- try tab -->
						<ul class="tabs">
							<li class="tab-link current" data-tab="tab-1">Daftar Siswa</li>
							<li class="tab-link" data-tab="tab-2">DKN Siswa</li>
							<li class="tab-link" data-tab="tab-3">Ekstrakulikuler</li>
							<li class="tab-link" data-tab="tab-4">Absensi</li>
							<li class="tab-link" data-tab="tab-5">Kenaikan Kelas</li>
						</ul>
						
						

						<div id="tab-1" class="tab-content current">
							
							<div class="row-fluid sortable">
								<div class="container">
									  
								<div class="box span12">
								
								<div class="box-content">
								
									<table class="table table-striped table-bordered bootstrap-datatable datatable">
										  
									  <thead>
										  <tr>
											  <th>No.</th>
											  <th>NIS</th>
											  <th>Nama Siswa</th>
											  <th>Rapor</th>
										  </tr>
									  </thead>   
									  <tbody>
										<tr>
											<td>1</td>
											<td class="center">12345</td>
											<td class="center">Ika Ayu Rahmania Islam</td>
											<td class="center">
												<a href="#" class="btn-setting"><button class="btn btn-mini btn-info">Lihat rapor</button></a>		
												<a href="#" class="btn-setting"><button class="btn btn-mini btn-warning">Print Rapor</button></a>	
												<button class="btn btn-mini btn-danger">Print Rapor Sisipan</button>
												<button class="btn btn-mini btn-success">Unduh Rapor</button>											
											</td>
										</tr>
										
										
										</tr>
										
									</tbody>
									</table>            
								</div>
								</div><!--/span-->
								
								<div class="span5 ">
					
											<div class="message dark">
												
												<div class="attachments">
													<ul>
														<li>
															<span class="label label-important">zip</span> <b>rapor7A.zip</b> 
															<span class="quickMenu">
																<a href="#" class="glyphicons cloud-download"><i>Unduh semua rapor</i></a>
															</span>
														</li>
														
													</ul>		
												</div>
												
											</div>	
											
										</div>
									  
								</div>
							</div> <!-- -row fluid-->
						</div>
						<div id="tab-2" class="tab-content">
							<div class="row-fluid sortable">
								<div class="container">
									  
								<div class="box span12">
								
								<div class="box-content">
								
									<table class="table table-striped table-bordered bootstrap-datatable datatable">
										  
									  <thead>
										  <tr>
											  <th>No.</th>
											  <th>NIS</th>
											  <th>Nama Siswa</th>
											  <th>DKN</th>
										  </tr>
									  </thead>   
									  <tbody>
										<tr>
											<td>1</td>
											<td class="center">12345</td>
											<td class="center">Ika Ayu Rahmania Islam</td>
											<td class="center">
												<a href="#" class="btn-setting"><button class="btn btn-mini btn-info">Lihat DKN</button></a>		
												<a href="#" class="btn-setting"><button class="btn btn-mini btn-warning">Print DKN</button></a>												
											</td>
										</tr>
										
										
										</tr>
										
									</tbody>
									</table>            
								</div>
								</div><!--/span-->
								
								<div class="span5 ">
					
											<div class="message dark">
												
												<div class="attachments">
													<ul>
														<li>
															<span class="label label-important">zip</span> <b>DKN7A.zip</b> 
															<span class="quickMenu">
																<a href="#" class="glyphicons cloud-download"><i>Unduh semua DKN</i></a>
															</span>
														</li>
														
													</ul>		
												</div>
												
											</div>	
											
										</div>
									  
								</div>
							</div> <!-- -row fluid-->
						</div> <!-- tab content -->
						
						<div id="tab-3" class="tab-content">
							
						</div> <!-- tab content -->
						
						<div id="tab-4" class="tab-content">
							<div class="row-fluid sortable">
								<div class="container">
									  
								<div class="box span12">
									<div class="box-content">
										<table class="table table-striped table-bordered bootstrap-datatable datatable">
											  
										  <thead>
											  <tr>
												  <th>No.</th>
												  <th>Nama Siswa</th>
												  <th>Sakit</th>
												  <th>Izin</th>
												  <th>Tanpa Keterangan</th>
												  <th>Aksi</th>
											  </tr>
										  </thead>   
										  <tbody>
											<tr>
												<td>1</td>
												<td class="center">Ika Ayu Rahmania Islam</td>
												<td>2
												</td>
												<td>2
												</td>
												<td>2
												</td>
												<td class="center">
													<a href="#" class="btn-setting"><button class="btn btn-mini btn-info">Simpan</button></a>													
												</td>
											</tr>
										</tbody>
										</table>            
									</div>
									</div><!--/span-->
									 
								</div>
							</div> <!-- -row fluid-->	  
						</div> <!-- tab content -->
						
						<div id="tab-5" class="tab-content">
							<h3>Kriteria kenaikan kelas sebagai berikut: </h3>
							<ol>
							  <li>Menyelesaikan seluruh program pembelajaran dalam dua semester pada tahun pelajaran yang diikuti</li>
							  <li>Mencapai tingkat kompetensi yang dipersyaratkan, minimal sama dengan KKM. Ketuntasan minimal untuk seluruh kompetensi dasar pada kompetensi pengetahuan dan keterampilan pada Kurikulum 2013 yaitu 2.66 (B-)</li>
							  <li>Tidak terdapat nilai sikap (KI-1 dan KI-2) pada Kurikulum 2013 kurang dari kategori baik lebih dari 3 mata pelajaran</li>
							  <li>Tidak terdapat nilai kurang dari KKM maksimal pada tiga mata pelajaran</li>
							  <li>Mendapatkan nilai memuaskan pada kegiatan ekstrakulikuler wajib (Pramuka) pada setiap semester</li>
							</ol>
							
							<div class="row-fluid sortable">
								<div class="container">
									  
								<div class="box span12">
								
									<div class="box-content">
									
										<table class="table table-striped table-bordered bootstrap-datatable datatable">
											  
										  <thead>
											  <tr>
												  <th>No.</th>
												  <th>Nama Siswa</th>
												  <th>Naik/Tidak Naik Kelas</th>
												  <th>Status</th>
												  <th>Aksi</th>
											  </tr>
										  </thead>   
										  <tbody>
											<tr>
												<td>1</td>
												<td class="center">Ika Ayu Rahmania Islam</td>
												<td>
												</td>
												<td>
												</td>
												<td>
													<button class="btn btn-mini btn-success">Simpan</button>													
												</td>
											</tr>
										  </tbody>
										</table>            
									</div>
								</div><!--/span-->
								
							</div> <!-- -container-->	  
						</div> <!
						
					  
						</div> <!-- tab content -->
			
			
				</div><!--/#content.span10-->	
		
						
			</div>	<!-- end: row fluid -->	
		
			
		</div> <!-- container full fluid-->
	
	<div class="modal hide fade" id="myModal">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>Settings</h3>
		</div>
		<div class="modal-body">
			nama : Ika Ayu Rahmania
			ini untuk edit
		</div>
		<div class="modal-footer">
			<a href="#" class="btn btn-primary" data-dismiss="modal">Keluar</a>
		</div>
	</div>
	
	<div class="clearfix"></div>
	<?php include('footer.php'); ?>
	
	<!-- start: JavaScript-->

		<script src="js/jquery-1.9.1.min.js"></script>
	<script src="js/jquery-migrate-1.0.0.min.js"></script>
		<script src="js/jquery-ui-1.10.0.custom.min.js"></script>
		<script src="js/jquery.ui.touch-punch.js"></script>	
		<script src="js/modernizr.js"></script>	
		<script src="js/bootstrap.min.js"></script>	
		<script src="js/jquery.cookie.js"></script>	
		<script src='js/fullcalendar.min.js'></script>	
		<script src='js/jquery.dataTables.min.js'></script>
		<script src="js/excanvas.js"></script>
	<script src="js/jquery.flot.js"></script>
	<script src="js/jquery.flot.pie.js"></script>
	<script src="js/jquery.flot.stack.js"></script>
	<script src="js/jquery.flot.resize.min.js"></script>	
		<script src="js/jquery.chosen.min.js"></script>	
		<script src="js/jquery.uniform.min.js"></script>		
		<script src="js/jquery.cleditor.min.js"></script>	
		<script src="js/jquery.noty.js"></script>	
		<script src="js/jquery.elfinder.min.js"></script>	
		<script src="js/jquery.raty.min.js"></script>	
		<script src="js/jquery.iphone.toggle.js"></script>	
		<script src="js/jquery.uploadify-3.1.min.js"></script>	
		<script src="js/jquery.gritter.min.js"></script>
			<script src="js/jquery.imagesloaded.js"></script>	
		<script src="js/jquery.masonry.min.js"></script>	
		<script src="js/jquery.knob.modified.js"></script>	
		<script src="js/jquery.sparkline.min.js"></script>	
		<script src="js/counter.js"></script>	
		<script src="js/retina.js"></script>
		<script src="js/custom.js"></script>
		<script src="js/cobatab.js" ></script>
</body>
</html>
