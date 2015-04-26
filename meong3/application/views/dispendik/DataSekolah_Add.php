
		<div class="container-fluid-full">
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
			
			<div class="row-fluid">
				
				<!-- start: Content -->
				<div id="content" class="span12">
					
					<ul class="breadcrumb">
						<li>
							<i class="icon-home"></i>
							<a href="index.php/users/DinasPendidikan">Beranda</a>
							<i class="icon-angle-right"></i> 
						</li>
						<li>
							<i class="icon-edit"></i>
							<a href="<?php echo site_url ('sekolah/tambahDataSekolah')?>">Tambah Data Sekolah</a>
						</li>
					</ul>
					
						<div class="row-fluid sortable">
								<div class="box span12">
									<div class="box-header" data-original-title>
										<h2><i class="halflings-icon white edit"></i><span class="break"></span>Data Sekolah</h2>
									</div>
									<div class="box-content">
										<form method="POST" action="<?php echo site_url('Sekolah/doInsert'); ?>" class="form-horizontal">
										
										  <fieldset>
											<div class="control-group">
												<label class="control-label" for="pilihKecamatan">Kecamatan</label>
												<div class="controls">
												  <select id="pilihKecamatan" href="<?php echo site_url('sekolah/getKecamatanList/001') ?>"  data-rel="chosen">
												  	<option value='null'>-- Pilih Mata Pelajaran --</option-->
												  </select>
												</div>
											</div>
											<div class="control-group">
												<label class="control-label" for="pilihKelurahan">Kelurahan</label>
												<div class="controls">
												  <select id="pilihKelurahan" href="<?php echo site_url('sekolah/getKelurahanList/001002') ?>"  data-rel="chosen">
												  	<option value='null'>-- Pilih Mata Pelajaran --</option-->
												  </select>
												</div>
											</div>
											<div class="control-group">
												<label class="control-label" for="focusedInput">NSS</label>
												<div class="controls">
												  <input class="input-xlarge focused" name="nss" id="focusedInput" type="text" value="">
												</div>
											  </div>
											<div class="control-group">
												<label class="control-label" for="focusedInput">NPSN</label>
												<div class="controls">
												  <input class="input-xlarge focused" name="npsn_sekolah" id="focusedInput" type="text" value="">
												</div>
											  </div>
											<div class="control-group">
												<label class="control-label" for="focusedInput">Nama Sekolah</label>
												<div class="controls">
												  <input class="input-xlarge focused" name="nama_sekolah" id="focusedInput" type="text" value="">
												</div>
											  </div>
											<div class="control-group">
												<label class="control-label" for="focusedInput">Alamat Sekolah</label>
												<div class="controls">
												  <input class="input-xlarge focused" name="alamat_sekolah" id="focusedInput" type="text" value="">
												</div>
											  </div>
											<div class="control-group">
												<label class="control-label" for="focusedInput">Telepon Sekolah</label>
												<div class="controls">
												  <input class="input-xlarge focused" name="notelp_sekolah" id="focusedInput" type="text" value="">
												</div>
											  </div>
											<div class="form-actions">
												<a href="<?php echo site_url ('c_sekolah/doInsert')?>"><button class="btn btn-primary">Simpan</button></a>
												
												<a href="<?php echo site_url ('c_sekolah');?>">Batal</a>
											  </div>

										  </fieldset>
										</form>   

									</div>
									
									
								</div><!--/span-->
								
							</div><!--/row-->
									
					
				</div><!--/.fluid-container-->
		
				<!-- end: Content -->
			</div><!--/#content.span10-->
			
		</div><!--/fluid-row-->
		
		
	<div class="modal hide fade" id="myModal">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>Detil Data Sekolah</h3>
		</div>
		<div class="modal-body">
			<p>Here settings can be configured...</p>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal">Keluar</a>
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
	