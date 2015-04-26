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
							<a href="#">Rombel</a>
						</li>
					</ul>

					<!-- try tab -->
						<ul class="tabs">
							<li class="tab-link current" data-tab="tab-1">Kelola Kelas</li>
							<li class="tab-link" data-tab="tab-2">Anggota Rombel</li>
							<li class="tab-link" data-tab="tab-3">Pemetaan Guru Mata Pelajaran</li>
						</ul>

						<div id="tab-1" class="tab-content current">
							<div class="row-fluid sortable">
								<div class="box span12">
									<div class="box-header" data-original-title>
										<h2><i class="halflings-icon white user"></i><span class="break"></span>Data Kelas</h2>
									</div>
									<div class="box-content">
										<form class="form-horizontal">
										  <fieldset>
											<div class="control-group">
												<label class="control-label" for="selectError6">Tingkat Kelas</label>
												<div class="controls">
												  <select id="selectError6" data-rel="chosen">
													<option>Kelas 7</option>
													<option>Kelas 8</option>
													<option>Kelas 9</option>
												  </select>
												</div>
											  </div>
											 
											<div class="control-group">
												<label class="control-label" for="focusedInput">Nama Kelas</label>
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
									<h2><i class="halflings-icon white user"></i><span class="break"></span>Data Muatan Lokal</h2>
								</div>
								<div class="box-content">
									<table class="table table-striped table-bordered bootstrap-datatable datatable">
									  <thead>
										  <tr>
											  <th>No.</th>
											  <th>Tingkat</th>
											  <th>Jenis Kelas</th>
											  <th>Nama Kelas</th>
											  <th>Aksi</th>
										  </tr>
									  </thead>   
									  <tbody>
										<tr>
											<td></td>
											<td class="center">2013</td>
											<td class="center">Pramuka</td>
											<td class="center">Deskripsi muatan lokal tersebut</td>
											
											<td class="center">
												<button class="btn btn-mini btn-info">Lihat Detil</button>
												<button class="btn btn-mini btn-warning">Edit</button>
												<button class="btn btn-mini btn-danger">Hapus</button>
											</td>
										</tr>
										<tr>
											<td>2</td>
											<td class="center">KTSP 2006</td>
											<td class="center">Pramuka</td>
											<td class="center">Deskripsi muatan lokal tersebut</td>
											
											<td class="center">
												<button class="btn btn-mini btn-info">Lihat Detil</button>
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
						<div id="tab-2" class="tab-content">
							<div class="row-fluid sortable">
								<div class="box span12">
									<div class="box-header" data-original-title>
										<h2><i class="halflings-icon white user"></i><span class="break"></span>Data Muatan Lokal</h2>
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
												<label class="control-label" for="focusedInput">Nama Muatan Lokal</label>
												<div class="controls">
												  <input class="input-xlarge focused" id="focusedInput" type="text" value="">
												</div>
											  </div>
											<div class="control-group hidden-phone">
											  <label class="control-label" for="textarea2">Deskripsi Muatan Lokal</label>
											  <div class="controls">
												<textarea id="textarea2" rows="3"></textarea>
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
									<h2><i class="halflings-icon white user"></i><span class="break"></span>Data Muatan Lokal</h2>
								</div>
								<div class="box-content">
									<table class="table table-striped table-bordered bootstrap-datatable datatable">
									  <thead>
										  <tr>
											  <th>No.</th>
											  <th>Kurikulum</th>
											  <th>Mata Pelajaran</th>
											  <th>Deskripsi</th>
											  <th>Aksi</th>
										  </tr>
									  </thead>   
									  <tbody>
										<tr>
											<td>1</td>
											<td class="center">2013</td>
											<td class="center">Pramuka</td>
											<td class="center">Deskripsi muatan lokal tersebut</td>
											
											<td class="center">
												<button class="btn btn-mini btn-info">Lihat Detil</button>
												<button class="btn btn-mini btn-warning">Edit</button>
												<button class="btn btn-mini btn-danger">Hapus</button>
											</td>
										</tr>
										<tr>
											<td>2</td>
											<td class="center">KTSP 2006</td>
											<td class="center">Pramuka</td>
											<td class="center">Deskripsi muatan lokal tersebut</td>
											
											<td class="center">
												<button class="btn btn-mini btn-info">Lihat Detil</button>
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
						<div id="tab-3" class="tab-content">
							<div class="row-fluid sortable">
								<div class="box span12">
									<div class="box-header" data-original-title>
										<h2><i class="halflings-icon white user"></i><span class="break"></span>Data Ekstakulikuler</h2>
									</div>
									<div class="box-content">
										<form class="form-horizontal">
										  <fieldset>
											<div class="control-group">
												<label class="control-label" for="selectError2">Kurikulum</label>
												<div class="controls">
												  <select id="selectError2" data-rel="chosen">
													<option>2013</option>
													<option>KTSP 2006</option>
												  </select>
												</div>
											  </div>
											<div class="control-group">
												<label class="control-label" for="focusedInput">Nama Ekstrakulikuler</label>
												<div class="controls">
												  <input class="input-xlarge focused" id="focusedInput" type="text" value="">
												</div>
											  </div>
											<div class="control-group hidden-phone">
											  <label class="control-label" for="textarea2">Deskripsi Ekstrakulikuler</label>
											  <div class="controls">
												<textarea id="textarea2" rows="3"></textarea>
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
									<h2><i class="halflings-icon white user"></i><span class="break"></span>Data Ekstrakulikuler</h2>
								</div>
								<div class="box-content">
									<table class="table table-striped table-bordered bootstrap-datatable datatable">
									  <thead>
										  <tr>
											  <th>No.</th>
											  <th>Kurikulum</th>
											  <th>Mata Pelajaran</th>
											  <th>Deskripsi</th>
											  <th>Aksi</th>
										  </tr>
									  </thead>   
									  <tbody>
										<tr>
											<td>1</td>
											<td class="center">2013</td>
											<td class="center">Paskibra</td>
											<td class="center">Deskripsi Ekstrakulikuler tersebut</td>
											
											<td class="center">
												<button class="btn btn-mini btn-info">Lihat Detil</button>
												<button class="btn btn-mini btn-warning">Edit</button>
												<button class="btn btn-mini btn-danger">Hapus</button>
											</td>
										</tr>
										<tr>
											<td>2</td>
											<td class="center">KTSP 2006</td>
											<td class="center">Drama</td>
											<td class="center">Deskripsi Ekstrakulikuler tersebut</td>
											
											<td class="center">
												<button class="btn btn-mini btn-info">Lihat Detil</button>
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
	
	
	<div class="clearfix"></div>
	