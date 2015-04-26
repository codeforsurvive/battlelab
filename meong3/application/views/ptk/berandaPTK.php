

<body>
	
	<!-- start: Header -->
	
		<div class="container-fluid-full">
			
			<div class="row-fluid">
				
				<!-- start: Content -->
				<div id="content" class="span10">
					<!--?php include ("navigation.php"); ?-->
					<ul class="breadcrumb">
						<li>
							<i class="icon-home"></i>
							<a href="index.html">Home</a>
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
											<img class="avatar" alt="Dennis Ji" src="asset/siswa/img/avatar.png">
										</a>
										<strong>Nama:</strong> <?php echo $NAMA_PD ?><br>
										<strong>Asal Sekolah:</strong>  <?php echo $NAMA_SEKOLAH; ?><br>
										<strong>Hak Akses:</strong> <span class="label label-success"> <?php echo $AKSES_LEVEL; ?></span>                                  
									</li>
									
								</ul>
							</div>
							
						</div>
					</div>
					<div class="row-fluid">
						<div class="box span6">
							<div class="box-header">
								<h2><i class="halflings-icon white white bullhorn"></i><span class="break"></span>Proses Pengisian Rapor</h2>
							</div>
							<div class="box-body">
                                    <div class="callout callout-danger">
                                        <h4>1. Kepala Sekolah</h4>
                                        <p>Kepala Sekolah melakukan konfigurasi kurikulum (kelas berapa menggunakan Kurikulum apa)<br>
										Kepala Sekolah melakukan setting wali kelas<br>
										Kepala Sekolah melakukan setting guru mata pelajatan (guru mengajar apa di kelas apa)<br>.</p>
                                    </div>
                                    <div class="callout callout-info">
                                        <h4>2. Pihak Sekolah</h4>
                                        <p>Pihak Sekolah mengeloa data siswa, guru, dan kelas<br>
										Pihak Sekolah melakukan setting rombel (kelas apa muridnya siapa saja dan wali kelasnya siapa)<br>
										Pihak Sekolah melakukan setting kurikulum (pelajaran, ekstrakulikuler, dan muatan lokal apa saja yang diberikan)<br></p>
                                    </div>
                                    <div class="callout callout-warning">
                                        <h4>3. Wali Kelas</h4>
                                        <p>Wali kelas mengisikan data ekstrakulikuler yang diikuti oleh siswa dikelasnya<br>
										Wali kelas mengelola data rapor kelas<br>
										Wali kelas mencetak rapor<br></p>
                                    </div>
									<div class="callout callout-success">
                                        <h4>4. Guru Mata Pelajaran</h4>
                                        <p>Guru mengisi nilai-nilai mapel dari anah yang diasuhnya.</p>
                                    </div>
                                </div>
						</div>
						
						<div class="box span6">
							<div class="box-header">
								<h2><i class="halflings-icon white white hand-top"></i><span class="break"></span>Perhitungan Nilai</h2>
							</div>
							<div class="box-body">
                                    <div class="callout callout-danger">
                                        <p>Seluruh penilaian mempunyai range nilai 1.0 - 4.0. Nilai 0 tidak akan dimasukkan sebagai nilai, dan tidak akan jadi pembagi. Jadi semisal jika ada siswa yang tidak mengikuti ujian, maka harus tetap dimasukkan nilainya dengan diberikan ujian susulan, sehingga siswa tidak dibiarkan dengan nilai 0.<br><br>
									Kurikulum 2013 : Nilai yang diperoleh pada aspek sikap (KI 1 dan KI 2) dinilai menggunakan 4 teknik yaitu : observasi, jurnal guru, penilaian diri, dan antar teman.<br><br>
									Terdapat 3 macam jenis bobot penilaian (pilihan diserahkan pada masing-masing sekolah yang mengggunakan Kurikulum KTSP 2006) :<br> a. Nilai rapor adalah (rata-rata nilai ulangan harian dan tugas + nilai UTS + nilai UAS)/3<br>
									b. Nilai rapor adalah (2(rata-rata nilai ulangan harian dan tugas) + nilai UTS + nilai UAS)/4 <br>
									c. Nilai rapor adalah (3(rata-rata nilai ulangan harian dan tugas) + nilai UTS + nilai UAS)/5<br><br>

									pada Kurikulum 2013, perhitungan aspek pengetahuan (KI 3) dapat diperoleh sebagai berikut: <br>
									a. Perhitungan nilai tengah semester adalah (2(rata-rata nilai ulangan harian dan tugas) + nilai UTS + nilai UAS)/3<br>
									b. Perhitungan nilai akhir semester adalah (2(rata-rata nilai ulangan harian dan tugas) + nilai UTS + nilai UAS)/4 <br><br>
									Kurikulum 2013 :<br> Nilai yang diperoleh pada aspek keterampilan (KI 4) harus meliputi Praktik, Portofolio, Proyek dan Produk<br>.</p>
                                    </div>
                                   
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
