	<link id="container" href="asset/dispendik/css/cobatab.css" rel="stylesheet">
	
</head>

<body>
		<div class="container-fluid-full">
			
			<div class="row-fluid">
				<!-- start: Main Menu -->
			<div id="sidebar-left" class="span2">
				<div class="nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li><a href="index.php/users/DinasPendidikan"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Beranda</span></a></li>	
						<li><a href="index.php/kurikulum/DataKurikulum"><i class="icon-tasks"></i><span class="hidden-tablet"> Master Kurikulum</span></a></li>
						<li><a href="index.php/sekolah/DataSekolah"><i class="icon-list-alt"></i><span class="hidden-tablet"> Master Sekolah</span></a></li>
						<li><a href="index.php/pesertadidik/DataPesertaDidik"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Data Peserta Didik</span></a></li>
						<li><a href="index.php/ptk/DataPTK"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Data PTK</span></a></li>
						<li><a href="index.php/orangtuasiswa/DataOrangTua"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Data Orang Tua & Wali</span></a></li>
						<li><a href="index.php/kurikulum/ManageKurikulum"><i class="icon-align-justify"></i><span class="hidden-tablet"> Kelola Kurikulum</span></a></li>
						<li><a href="index.php/penilaian/DataMasterPenilaian"><i class="icon-tasks"></i><span class="hidden-tablet"> Master Indikator Penilaian</span></a></li>
						<li><a href="index.php/laporan/PelaporanRaporSekolah"><i class="icon-folder-open"></i><span class="hidden-tablet"> Pelaporan Rapor</span></a></li>
						<li><a href="users/logout"><i class="icon-off"></i><span class="hidden-tablet"> Logout </span></a></li>
					</ul>
				</div>
			</div>
			<!-- end: Main Menu -->
				<div id="content" class="span12">
					<!--?php include ("navigation.php"); ?-->
					
					<ul class="breadcrumb">
						<li>
							<i class="icon-home"></i>
							<a href="index.php/dinaspendidikan/index">Beranda</a>
							<i class="icon-angle-right"></i> 
						</li>
						<li>
							<i class="icon-edit"></i>
							<a href="index.php/dinaspendidikan/DataKurikulum">Data Kurikulum</a>
						</li>
					</ul>
				
					
					<ul class="tabs">
							<li class="tab-link current" data-tab="tab-1" >Data Kurikulum</li>
							<li class="tab-link" data-tab="tab-2">Data Tahun Pelajaran</li>
							
						</ul>

						<div id="tab-1" class="tab-content current">
							<div class="row-fluid sortable">
								<div class="box span6">
									<div class="box-header" data-original-title>
										<h2><i class="halflings-icon white user"></i><span class="break"></span>Kelola Data Kurikulum</h2>
									</div>
									<div class="box-content">
										<form class="form-horizontal">
										  <fieldset>
											
											<div class="control-group">
												<label class="control-label" for="focusedInput">Kode Kurikulum</label>
												<div class="controls">
												  <span class="input-xlarge uneditable-input">Some value here</span>
												</div>
											  </div>
											<div class="control-group hidden-phone">
											  <label class="control-label" for="textarea2">Nama Kurikulum</label>
											  <div class="controls">
												  <input class="input-xlarge focused" id="focusedInput" type="text" value="">
												</div>
											</div>
											 <div class="form-actions">
												  <button type="submit" class="btn btn-primary">Simpan</button>
												</div>
										  </fieldset>
										
										</form>   

									</div>
								</div><!--/span-->
						
							</div><!--/row-->
						
							<div class="row-fluid sortable">
								<div class="box span">
								<div class="box-header" data-original-title>
									<h2><i class="halflings-icon white user"></i><span class="break"></span>Data Master Kurikulum</h2>
								</div>
								<div class="box-content">
									<table class="table table-striped table-bordered bootstrap-datatable datatable">
									  <thead>
										  <tr>
											  <th>No.</th>
											  <th>Kode Kurikulum</th>
											  <th>Nama Kurikulum</th>
											  <th>Aksi</th>
										  </tr>
									  </thead>   
									  <tbody>
										<tr>
											<td></td>
											<td class="center"></td>
											<td class="center"></td>
											<td class="center">
												<button class="btn btn-mini btn-warning">Sunting</button>
												<button class="btn btn-mini btn-danger">Hapus</button>
											</td>
										</tr>
										
									</tbody>
								  </table>            
								</div>
								</div><!--/span-->
						
							</div><!--/row-->
							

						</div>
						<div id="tab-2" class="tab-content">
							<div class="row-fluid sortable">
								<div class="box span8">
									<div class="box-header" data-original-title>
										<h2><i class="halflings-icon white user"></i><span class="break"></span>Kelola Data Tahun Pelajaran</h2>
									</div>
									<div class="box-content">
										<form class="form-horizontal">
										  <fieldset>
											<div class="control-group">
												<label class="control-label" for="selectError">Kurikulum</label>
												<div class="controls">
												  <select id="selectError" data-rel="chosen">
													<option>2013</option>
													<option>KTSP 2006</option>
												  </select>
												</div>
											  </div>
											<div class="control-group">
												<label class="control-label" for="focusedInput">Kode Tahun Pelajaran</label>
												<div class="controls">
												  <span class="input-xlarge uneditable-input">Some value here</span>
												</div>
											  </div>
											<div class="control-group">
												<label class="control-label" for="focusedInput">Nama Tahun Pelajaran</label>
												<div class="controls">
												  <input class="input-xlarge focused" id="focusedInput" type="text" value=""> contoh : 2014/2015
												</div>
											  </div>
											<div class="control-group">
												<label class="control-label" for="focusedInput">Tahun mulai</label>
												<div class="controls">
												  <input class="input-xlarge focused" id="focusedInput" type="text" value="">
												</div>
											  </div>
											<div class="control-group">
												<label class="control-label" for="focusedInput">Tahun akhir</label>
												<div class="controls">
												  <input class="input-xlarge focused" id="focusedInput" type="text" value="">
												</div>
											  </div>
											 <div class="form-actions">
												  <button type="submit" class="btn btn-primary">Simpan</button>
												</div>
										  </fieldset>
										
										</form>   

									</div>
								</div><!--/span-->
						
							</div><!--/row-->
						
							<div class="row-fluid sortable">
								<div class="box span12">
								<div class="box-header" data-original-title>
									<h2><i class="halflings-icon white user"></i><span class="break"></span>Data Master Tahun Pelajaran</h2>
								</div>
								<div class="box-content">
									<table class="table table-striped table-bordered bootstrap-datatable datatable">
									  <thead>
										  <tr>
											  <th>No.</th>
											  <th>Kode Tahun Ajar</th>
											  <th>Kurikulum</th>
											  <th>Tahun Pelajaran</th>
											  <th>Tahun mulai</th>
											  <th>Tahun akhir</th>
											  <th>Aksi</th>
										  </tr>
									  </thead>   
									  <tbody>
										<tr>
											<td></td>
											<td class="center"></td>
											<td class="center"></td>
											<td class="center"></td>
											<td class="center"></td>
											<td class="center"></td>
											<td class="center">	
												<button class="btn btn-mini btn-warning">Edit</button>
												<button class="btn btn-mini btn-danger">Hapus</button>
											</td>
										</tr>
										
									</tbody>
								  </table>            
								</div>
								</div><!--/span-->
						
							</div><!--/row-->
						
						</div>
						
					
				</div><!--/.fluid-container-->
		
				<!-- end: Content -->
			</div><!--/#content.span10-->
			
		</div><!--/fluid-row-->
		
			
	<div class="clearfix"></div>
	
	<script type="text/javascript">

	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-40721121-1']);
	  _gaq.push(['_trackPageview']);

	  (function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();

	</script>
