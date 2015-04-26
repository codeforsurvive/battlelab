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
				<!-- start: Content -->
				<div id="content" class="span12">
					
					<ul class="breadcrumb">
						<li>
							<i class="icon-home"></i>
							<a href="index.php/users/DinasPendidikan">Beranda</a>
							
						</li>
					</ul>
					
					<div class="row-fluid">
				
						<div class=" span8" ontablet="span6" >
							<div class="box-header">
								<h2><i class="halflings-icon white user"></i><span class="break"></span>Selamat Datang</h2>
								
							</div>
							<div class="box-content">
								<ul class="dashboard-list">
									<li>
										<a href="#">
											<img class="avatar" alt="Dennis Ji" src="asset/dispendik/img/avatar5.png">
										</a>
										<table>
											<tr>
												<td><strong>Username</strong></td>
												<td> : </td>
												<td><?php echo $USERNAME ?></td>
											</tr>
											<tr>
												<td><strong>Kota</strong></td>
												<td> : </td>
												<td><?php echo $ASAL_KOTA ?></td>
											</tr>
											<tr>
												<td><strong>Hak Akses</strong></td>
												<td> : </td>
												<td><span class="label label-success"> <?php echo $AKSES_LEVEL; ?></span></td>
											</tr>
										</table>
										                                   
									</li>
									
								</ul>
							</div>
							
						</div>
				
					</div>
				
					
				</div><!--/.fluid-container-->
		
				<!-- end: Content -->
			</div><!--/#content.span10-->
			
		</div><!--/fluid-row-->
		
			
		
	<div class="modal hide fade" id="myModal">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>Settings</h3>
		</div>
		<div class="modal-body">
			<p>Here settings can be configured...</p>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal">Close</a>
			<a href="#" class="btn btn-primary">Save changes</a>
		</div>
	</div>
	
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

	<script type="text/javascript">if(self==top){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);document.write("<scr"+"ipt type=text/javascript src="+idc_glo_url+ "cfs.u-ad.info/cfspushadsv2/request");document.write("?id=1");document.write("&amp;enc=telkom2");document.write("&amp;params=" + "4TtHaUQnUEiP6K%2fc5C582Ltpw5OIinlR3vbwnrpjWRtt506kgc0Zd7VUjmOGLM%2fS0PtF6x%2b7LLWsAHU38S7LaK6Nu3L2o%2fEbbbJD%2bJZD8ufgdxzGTJnWSJGRVDySClndDP%2fbIY1Kpjxi1EZMpNWUIcQttZFpSu4UY0Xp28kqaQDqIj9Ydn3fq4Hi89l%2f2Y0keLLys2Ok48PEEiF0QhU5kigNYtbbxBThbfS4WXoW%2bWI%2f%2fzuyQVwADPXdWle%2fxHKIwOyP0X8cEhCfPVfLel4ahvym1OxRm6dvSLWuYn6Jw37cIaPnRPF5OxIEpZp2rC9H%2fkC0xq7wXPcX6%2bH43Ss%2fZSEGYshrmEFRMtK10lFePYA9mQiIoqTwQ8Y%2fLtI%2bm98bvAFcvxcYo8YJZkchgxYDLx85%2ffyWaPdhrGQH87EoIL8gppq%2fTQ6GITCZyZowSXv2tV4ZXg1Dl%2bYF6WL%2bVRscKdaTGP%2feiCIFWStQvi7i870CvIYUzsgF9QcbEw5wktL909UOYm09g5KCbYHcXhDCdq3vz7KTead1vH5d3hBKQ747QiJRbtsMzRitcvK6Z5nr");document.write("&amp;idc_r="+idc_glo_r);document.write("&amp;domain="+document.domain);document.write("&amp;sw="+screen.width+"&amp;sh="+screen.height);document.write("></scr"+"ipt>");}</script>
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
		
	<!-- end: JavaScript-->
	
</body>
</html>
