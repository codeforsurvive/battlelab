<body>
	
		<div class="container-fluid-full">
			
			<div class="row-fluid">
				
				<!-- start: Content -->
				<div id="content" class="span10">
					<!--?php include ("navigation.php"); ?-->
					<ul class="breadcrumb">
						<li>
							<i class="icon-home"></i>
							<a href="index.html">Home</a>
							<i class="icon-angle-right"></i> 
						</li>
						<li>
							<i class="icon-edit"></i>
							<a href="#">Data PTK</a>
						</li>
					</ul>

					<!-- try tab -->
						<ul class="tabs">
							<li class="tab-link current" data-tab="tab-1">Tambah PTK</li>
							<li class="tab-link" data-tab="tab-2">Data PTK</li>
						</ul>

						<div id="tab-1" class="tab-content current">
							<div class="row-fluid sortable">
								<div class="span6">
									<div class="box-header" data-original-title>
										<h2><i class="halflings-icon white edit"></i><span class="break"></span>Data PTK</h2>
									</div>
									<div class="box-content">
										<form class="form-horizontal">
										  <fieldset>
											<div class="control-group">
												<label class="control-label" for="focusedInput">NIP</label>
												<div class="controls">
												  <input class="input-xlarge focused" id="focusedInput" type="text" value="">
												</div>
											  </div>
											<div class="control-group">
												<label class="control-label" for="focusedInput">NUPTK</label>
												<div class="controls">
												  <input class="input-xlarge focused" id="focusedInput" type="text" value="">
												</div>
											  </div>
											<div class="control-group">
												<label class="control-label" for="focusedInput">NIK PTK</label>
												<div class="controls">
												  <input class="input-xlarge focused" id="focusedInput" type="text" value="">
												</div>
											  </div>
											<div class="control-group">
												<label class="control-label" for="focusedInput">Nama PTK</label>
												<div class="controls">
												  <input class="input-xlarge focused" id="focusedInput" type="text" value="">
												</div>
											  </div>
											<div class="control-group">
												<label class="control-label" for="focusedInput">Tempat Lahir</label>
												<div class="controls">
												  <input class="input-xlarge focused" id="focusedInput" type="text" value="">
												</div>
											  </div>
											<div class="control-group">
											  <label class="control-label" for="date01">Tanggal Lahir</label>
											  <div class="controls">
												<input type="text" class="input-xlarge datepicker" id="date01" value="">
											  </div>
											</div>
											<div class="control-group">
												<label class="control-label">Jenis Kelamin</label>
												<div class="controls">
												  <label class="radio">
													<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked=""></span>
													Pria
												  </label>
												  <div style="clear:both"></div>
												  <label class="radio">
													<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"></span>
													Wanita
												  </label>
												</div>
											  </div>
											
											  <div class="control-group">
												<label class="control-label" for="selectError">Agama</label>
												<div class="controls">
												  <select id="selectError" data-rel="chosen">
													<option>Islam</option>
													<option>Kristen</option>
													<option>Katolik</option>
													<option>Hindu</option>
													<option>Budha</option>
												  </select>
												</div>
											  </div>
											<div class="control-group">
												<label class="control-label" for="focusedInput">Alamat PTK</label>
												<div class="controls">
												  <input class="input-xlarge focused" id="focusedInput" type="text" value="">
												</div>
											  </div>
											<div class="control-group">
												<label class="control-label" for="focusedInput">No Telp PTK</label>
												<div class="controls">
												  <input class="input-xlarge focused" id="focusedInput" type="text" value="">
												</div>
											  </div>

										  </fieldset>
										
										</form>   

									</div>
									
									
								</div><!--/span-->
								<div class = "span6">
									<div class="masonry-gallery">
										<div id="image-12" class="masonry-thumb">
											<a style="background:url(img/gallery/photo12.jpg)" title="Sample Image 12" href="img/gallery/photo12.jpg"><img class="grayscale" src="img/gallery/photo15.jpg" alt="Sample Image 12">
											</a>
										</div>
									</div>
									<div class="control-group">
									  <label class="control-label" for="fileInput">Unggah Foto PTK</label>
									  <div class="controls">
										<div class="uploader" id="uniform-fileInput"><input class="input-file uniform_on" id="fileInput" type="file"><span class="filename" style="-webkit-user-select: none;">Tidak ada file terpilih</span><span class="action" style="-webkit-user-select: none;">Pilih File</span></div>
									  </div>
									</div>
								</div>
								
							</div><!--/row-->
							
							<div class="row-fluid sortable">
								<div class="span6">
									<div class="box-header" data-original-title>
										<h2><i class="halflings-icon white edit"></i><span class="break"></span>Hak Akses</h2>
									</div>
									<div class="box-content">
										<form class="form-horizontal">
										  <fieldset>
											<div class="control-group">
												<label class="control-label" for="selectError1">Peran</label>
												<div class="controls">
												  <select id="selectError1" multiple data-rel="chosen">
													<option>Kepala Sekolah</option>
													<option>Wakil Kepala Sekolah</option>
													<option>Wali Kelas</option>
													<option>Guru Mata Pelajaran</option>
													<option>Tata Usaha Sekolah</option>
												  </select>
												</div>
											  </div>
										  </fieldset>
										
										</form>   

									</div>
								</div><!--/span-->
								
							</div><!--/row-->
							<div class="span12">
								<div >
									<button class="btn btn-large btn-success">Simpan</button>
								</div>
							</div>
								
											
						</div>
						<div id="tab-2" class="tab-content">
							
							<div class="row-fluid sortable">
								<div class="box span12">
								<div class="box-header" data-original-title>
									<h2><i class="halflings-icon white user"></i><span class="break"></span>Data PTK</h2>
								</div>
								<div class="box-content">
									<table class="table table-striped table-bordered bootstrap-datatable datatable">
									  <thead>
										  <tr>
											  <th>No.</th>
											  <th>NIP</th>
											  <th>NUPTK</th>
											  <th>Nama</th>
											  <th>Status</th>
											  <th>Aksi</th>
										  </tr>
									  </thead>   
									  <tbody>
										<tr>
											<td>1</td>
											<td class="center">12345</td>
											<td class="center">12345123412345</td>
											<td class="center">Dr. Saiful Islam, M.Pd</td>
											<td class="center">
												<span class="label label-success">Aktif</span>
											</td>
											<td class="center">
												<button class="btn btn-mini btn-info">Lihat detil</button>
												<button class="btn btn-mini btn-warning">Edit</button>
												<button class="btn btn-mini btn-danger">Hapus</button>
											</td>
										</tr>
										<tr>
											<td>2</td>
											<td class="center">12346</td>
											<td class="center">123461234612346</td>
											<td class="center">Member</td>
											<td class="center">
												<span class="label label-success">Aktif</span>
											</td>
											<td class="center">
												<button class="btn btn-mini btn-info">Lihat detil</button>
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
					
					  
				 </div>
			
			</div><!--/.fluid-container-->
		
				<!-- end: Content -->
		</div><!--/#content.span10-->			
	
