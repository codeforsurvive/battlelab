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
							<a href="#">Data Siswa</a>
						</li>
					</ul>

					<!-- try tab -->
						<ul class="tabs">
							<li class="tab-link current" data-tab="tab-1">Tambah Peserta Didik</li>
							<li class="tab-link" data-tab="tab-2">Data Peserta Didik</li>
						</ul>

						<div id="tab-1" class="tab-content current">
							<div class="row-fluid sortable">
								<div class="span6">
									<div class="box-header" data-original-title>
										<h2><i class="halflings-icon white edit"></i><span class="break"></span>Data Peserta Didik</h2>
									</div>
									<div class="box-content">
										<form class="form-horizontal">
										  <fieldset>
											<div class="control-group">
												<label class="control-label" for="focusedInput">NIS</label>
												<div class="controls">
												  <input class="input-xlarge focused" id="focusedInput" type="text" value="">
												</div>
											  </div>
											<div class="control-group">
												<label class="control-label" for="focusedInput">NISN</label>
												<div class="controls">
												  <input class="input-xlarge focused" id="focusedInput" type="text" value="">
												</div>
											  </div>
											<div class="control-group">
												<label class="control-label" for="focusedInput">Nama Siswa</label>
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
													<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
													Laki-laki
												  </label>
												  <div style="clear:both">
												  </div>
												  <label class="radio">
													<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
													Perempuan
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
												<label class="control-label" for="focusedInput">Anak ke</label>
												<div class="controls">
												  <input class="input-xlarge focused" id="focusedInput" type="text" value="">
												</div>
											  </div>
											<div class="control-group">
												<label class="control-label" for="selectError2">Status Dalam Keluarga</label>
												<div class="controls">
												  <select id="selectError2" data-rel="chosen">
													<option>Kandung</option>
													<option>Angkat</option>
												  </select>
												</div>
											  </div>
											<div class="control-group">
												<label class="control-label" for="focusedInput">Alamat Siswa</label>
												<div class="controls">
												  <input class="input-xlarge focused" id="focusedInput" type="text" value="">
												</div>
											  </div>
											<div class="control-group">
												<label class="control-label" for="focusedInput">No Telp Siswa</label>
												<div class="controls">
												  <input class="input-xlarge focused" id="focusedInput" type="text" value="">
												</div>
											  </div>
											<div class="control-group">
												<label class="control-label" for="focusedInput">Diterima di Kelas</label>
												<div class="controls">
												  <input class="input-xlarge focused" id="focusedInput" type="text" value="">
												</div>
											  </div>
											<div class="control-group">
												<label class="control-label" for="focusedInput">Diterima pada Tanggal</label>
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
											<a style="background:url(img/gallery/photo12.jpg)" title="Sample Image 12" href="img/gallery/photo12.jpg"><img class="grayscale" src="img/gallery/photo14.jpg" alt="Sample Image 12">
											</a>
										</div>
									</div>
									<div class="control-group">
									  <label class="control-label" for="fileInput">Unggah Foto Siswa</label>
									  <div class="controls">
										<div class="uploader" id="uniform-fileInput"><input class="input-file uniform_on" id="fileInput" type="file"><span class="filename" style="-webkit-user-select: none;">Tidak ada file terpilih</span><span class="action" style="-webkit-user-select: none;">Pilih File</span>
										</div>
									  </div>
									</div>
								</div>
								
							</div><!--/row-->
							
							<div class="row-fluid sortable">
								<div class="span6">
									<div class="box-header" data-original-title>
										<h2><i class="halflings-icon white edit"></i><span class="break"></span>Data Orang Tua</h2>
									</div>
									<div class="box-content">
										<form class="form-horizontal">
										  <fieldset>
											<div class="control-group">
												<label class="control-label" for="focusedInput">NIK</label>
												<div class="controls">
												  <input class="input-xlarge focused" id="focusedInput" type="text" value="">
												</div>
											  </div>
											<div class="control-group">
												<label class="control-label" for="focusedInput">Nama Ayah</label>
												<div class="controls">
												  <input class="input-xlarge focused" id="focusedInput" type="text" value="">
												</div>
											  </div>
											<div class="control-group">
												<label class="control-label" for="focusedInput">Nama Ibu</label>
												<div class="controls">
												  <input class="input-xlarge focused" id="focusedInput" type="text" value="">
												</div>
											  </div>
											
											  <div class="control-group">
												<label class="control-label" for="selectError3">Pekerjaan Ayah</label>
												<div class="controls">
												  <select id="selectError3" data-rel="chosen">
													<option>Guru / PNS</option>
													<option>TNI / polri</option>
													<option>Wiraswasta</option>
													<option>Tidak Bekerja</option>
												  </select>
												</div>
											  </div>
											   <div class="control-group">
												<label class="control-label" for="selectError4">Pekerjaan Ibu</label>
												<div class="controls">
												  <select id="selectError4" data-rel="chosen">
													<option>Guru / PNS</option>
													<option>TNI / polri</option>
													<option>Wiraswasta</option>
													<option>Ibu Rumah Tangga</option>
												  </select>
												</div>
											  </div>
											<div class="control-group">
												<label class="control-label" for="focusedInput">Alamat Orang Tua</label>
												<div class="controls">
												  <input class="input-xlarge focused" id="focusedInput" type="text" value="">
												</div>
											  </div>
											<div class="control-group">
												<label class="control-label" for="focusedInput">No Telp Orang Tua</label>
												<div class="controls">
												  <input class="input-xlarge focused" id="focusedInput" type="text" value="">
												</div>
											  </div>
											
										  </fieldset>
										
										</form>   

									</div>
								</div><!--/span-->
								
								<div class="span6">
									<div class="box-header" data-original-title>
										<h2><i class="halflings-icon white edit"></i><span class="break"></span>Data Wali Siswa</h2>
									</div>
									<div class="box-content">
										<form class="form-horizontal">
										  <fieldset>
											<div class="control-group">
												<label class="control-label" for="focusedInput">Nama Wali</label>
												<div class="controls">
												  <input class="input-xlarge focused" id="focusedInput" type="text" value="">
												</div>
											  </div>											
											  <div class="control-group">
												<label class="control-label" for="selectError5">Pekerjaan Wali</label>
												<div class="controls">
												  <select id="selectError5" data-rel="chosen">
													<option>Guru / PNS</option>
													<option>TNI / polri</option>
													<option>Wiraswasta</option>
													<option>Tidak Bekerja</option>
												  </select>
												</div>
											  </div>
											<div class="control-group">
												<label class="control-label" for="focusedInput">Alamat Wali</label>
												<div class="controls">
												  <input class="input-xlarge focused" id="focusedInput" type="text" value="">
												</div>
											  </div>
											<div class="control-group">
												<label class="control-label" for="focusedInput">No Telp Wali</label>
												<div class="controls">
												  <input class="input-xlarge focused" id="focusedInput" type="text" value="">
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
								<div class="container">
								<div class="box span12">
								<div class="box-header" data-original-title>
									<h2><i class="halflings-icon white user"></i><span class="break"></span>Data Peserta Didik</h2>
								</div>
								<div class="box-content">
									<table class="table table-striped table-bordered bootstrap-datatable datatable">
									  <thead>
										  <tr>
											  <th>No.</th>
											  <th>NIS</th>
											  <th>NISN</th>
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
											<td class="center">Ika Ayu Rahmania Islam</td>
											<td class="center">
												<span class="label label-success">Aktif</span>
											</td>
											<td class="center">
												<a href="#" class="btn-setting"><button class="btn btn-mini btn-info">Lihat detil</button></a>		
												<a href="#" class="btn-setting"><button class="btn btn-mini btn-warning">Edit</button></a>	
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
								</div>
							</div> <!-- -row fluid-->
					
					  
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