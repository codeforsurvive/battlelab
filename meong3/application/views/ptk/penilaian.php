<head>
       
</head>
<body>
	
	<!-- start: Header -->
		<div class="container-fluid-full">
			
			<div class="row-fluid">
				
				<!-- start: Content -->
				<div id="content" class="span12">
					<!--?php include ("navigation.php"); ?-->
					
					<ul class="breadcrumb">
						<li>
							<i class="icon-home"></i>
							<a href="index.php/c_pd/index">Beranda</a>
							<i class="icon-angle-right"></i> 
						</li>
						<li>
							<i class="icon-edit"></i>
							<a href="index.php/penilaian/do_assesment_by_student">Penilaian Diri Sendiri dan Antar Teman</a>
						</li>
					</ul>
					<div class="row-fluid">
						<div class="span8" ontablet="span6" >
							<div class="box-header">
								<h2></span>Data Penilai</h2>
							</div>
							<div class="box-content">
								<ul class="dashboard-list">
									<li>
										<strong>Nama:</strong> <?php echo $dataSiswa['NAMA_PD'] ?><br>
										<strong>Kelas:</strong>  <?php echo $dataSiswa['NAMA_KELAS'] ?><br>
										<strong>Sekolah:</strong>  <?php echo $dataSiswa['NAMA_SEKOLAH'] ?><br>
										<strong>Semester:</strong>  <?php echo $dataSiswa['semester_thn_ajar'] ?> / <?php echo $dataSiswa['NAMA_TAHUN_AJAR'] ?><br>	                                
									</li>
								</ul>
							</div>
						</div>
					</div>
				
					<div class="row-fluid">
				
						<div class="span12">
					<div class="box-header" data-original-title>
						<h2></span>Lembar Penilaian</h2>
					</div>
					<div class="box-content">
						<form class="form-horizontal">

							<fieldset>
							  <div class="control-group">
								<label class="control-label" for="pilihMapel">Pilih Mata Pelajaran</label>
								<div class="controls">
								  <select id="pilihMapel" href="<?php echo site_url('penilaian/getMapelList') ?>"  data-rel="chosen">
								  	<option value='null'>-- Pilih Mata Pelajaran --</option>
								  </select>
								</div>
								
							  </div>
							  <div class="control-group">
								<label class="control-label" for="pilihKI">Pilih Aspek Penilaian</label>
								<div class="controls">
								  <select id="pilihKI" href="<?php echo site_url('penilaian/getKIList') ?>"  data-rel="chosen">
									<option value='null'>-- Pilih Aspek Penilaian --</option>
								  </select>
								</div>
							  </div>
							   <div class="control-group">
								<label class="control-label" for="pilihMetode">Pilih Metode Penilaian</label>
								<div class="controls">
								  <select id="pilihMetode" href="<?php echo site_url('penilaian/getMetodeList') ?>"  data-rel="chosen">
									<option value='null'>-- Pilih Metode Penilaian --</option>
								  </select>
								</div>
							  </div>
							   <div class="control-group">
								<label class="control-label" for="pilihIndikator">Pilih Indikator Penilaian</label>
								<div class="controls">
								  <select id="pilihIndikator" href="<?php echo site_url('penilaian/getIndikatorList') ?>"  data-rel="chosen">
									<option value='null'>-- Pilih Indikator Penilaian --</option>
								  </select>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="pilihKD">Masukkan KD</label>
								<div class="controls">
								  <select id="pilihKD" href="<?php echo site_url('penilaian/getKDList') ?>"  multiple data-rel="chosen">
									<option value='null'>-- Pilih Kompetensi Dasar --</option>
								  </select>
								  
								</div>
							  </div>
							  <button href="<?php echo site_url('penilaian/penilaianOlehSiswa') ?>" class="btn btn-primary" id="cariBtn">Cari Data</button>
							 
							</fieldset>
						  </form>
					
					</div>

					
					
				</div><!--/span-->

					
				
					</div>
					<div class="row-fluid">
				
						<div class="span8" ontablet="span6" >
							<div class="box-content">
						<table class="table table-condensed">
							  <thead>
								  <tr>
									  <th width="200px">Siswa</th>
									  <th width="30px">1</th>
									  <th width="30px">2</th>
									  <th width="30px">3</th>
									  <th width="30px">4</th>                                          
								  </tr>
							  </thead>   
							  <tbody>
								<tr>
									<td class="center">
									</td>
									<td class="center">
										<label class="radio">
										<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" >
										</label>
									</td>
									<td class="center">
										<label class="radio">
										<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2" >
										</label>
									</td>
									<td class="center">
										<label class="radio">
										<input type="radio" name="optionsRadios" id="optionsRadios3" value="option3" >
										</label>
									</td>
									<td class="center">
										<label class="radio">
										<input type="radio" name="optionsRadios" id="optionsRadios4" value="option4" checked="">
										</label>
									</td>                                       
								</tr>
								                                  
							  </tbody>
						 </table>  
						
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

		