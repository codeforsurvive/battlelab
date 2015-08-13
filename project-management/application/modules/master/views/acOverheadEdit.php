<script src="<?php echo  base_url(); ?>assets/default/handsontable/handsontable.full.min.js"></script>
<link rel="stylesheet" media="screen" href="<?php echo  base_url(); ?>assets/default/handsontable/handsontable.full.min.css">

<script>
	var tableBarang, tableUpah, prev, lokasi_id = 1;
	var tipe = 'material';
	var maxOverhead = 0;
	var maxMaterial = 0;
	var maxUpah = 0;
	var persenMaterial = 0, persenUpah = 0;
	var batas = 0;
	
	$(document).ready(function() {
		tipe = 	'<?= $tipe ?>';
		$('#tipe_overhead').val(tipe);
		
		tableBarang = $('#barang').dataTable( {
			"processing": true,
			"serverSide": true,
			"ajax": "<?php echo base_url(); ?>master/barang/getViewAnalisaBarang",
			"createdRow": function ( row, data, index ) {
				var id = data[5];
				$(".takeButton").hover( function () { 
					$(this).addClass("btn-success"); 
				}, function () { 
					$(this).removeClass("btn-success"); 
				});
				$('td', row).eq(5).html('<button data-dismiss="modal" class="btn btn-xs takeButton" onclick="ambilNilai('+id+','+index+',\'material\')"><i class="fa fa-check"></i> </button>');
				$(row).attr('id', 'item_'+id);
			},
			"fnDrawCallback": function(oSettings, json) {
			  $(".takeButton").hover( function () { 
					$(this).addClass("btn-success"); 
				}, function () { 
					$(this).removeClass("btn-success"); 
				});
			}
		} );
		
	 	tableUpah = $('#upah').dataTable( {
			"processing": true,
			"serverSide": true,
			"ajax": "<?php echo base_url(); ?>master/upah/getViewAnalisaUpah?lokasi_id=1",
			"createdRow": function ( row, data, index ) {
				var id = data[5];
				$('td', row).eq(5).html('<button data-dismiss="modal" class="btn btn-xs takeButton" onclick="ambilNilai('+id+','+index+',\'upah\')"><i class="fa fa-check"></i> </button>');
				$(row).attr('id', 'item_'+id);
			},
			"fnDrawCallback": function(oSettings, json) {
			  $(".takeButton").hover( function () { 
					$(this).addClass("btn-success"); 
				}, function () { 
					$(this).removeClass("btn-success"); 
				});
			}
		} );	
		
	} );
	
	function batalGanti(){
		$('#changeModal').modal('hide');
	}
	
	function getUpahBaru(){
		if(disableCellRow[0]!=1){
			currentRow = 0;
			for(var i = currentRow; i<disableCellRow[0]; i++){
				hot1.alter('remove_row', currentRow); 
				updateDisableRow(-1);
			}
			$("#cellHelper").css('visibility','hidden');
			refreshTable();
		}
		lokasi_id = JSON.parse($('#<?= mOverhead::RAB ?>').val())['<?= mRab::LOKASI ?>'];
		tableUpah.fnDestroy();
		tableUpah = $('#upah').dataTable( {
			"processing": true,
			"serverSide": true,
			"ajax": "<?php echo base_url(); ?>master/upah/getViewAnalisaUpah?lokasi_id="+lokasi_id,
			"createdRow": function ( row, data, index ) {
				var id = data[5];
				$('td', row).eq(5).html('<button data-dismiss="modal" class="btn btn-xs takeButton" onclick="ambilNilai('+id+','+index+',\'upah\')"><i class="fa fa-check"></i> </button>');
				$(row).attr('id', 'item_'+id);
			},
			"fnDrawCallback": function(oSettings, json) {
			  $(".takeButton").hover( function () { 
					$(this).addClass("btn-success"); 
				}, function () { 
					$(this).removeClass("btn-success"); 
				});
			}
		} );
		$('#changeModal').modal('hide');
	}
	
	function isEmptyPaketmaterial(){
		if(typeof $('#paketmaterial_nama').val() == 'undefined')
			return true;
		else if($('#paketmaterial_nama').val() == "" || $('#paketmaterial_nama').val() == null)
			return true;
		else if(typeof $('#paketmaterial_satuan').val() == 'undefined')
			return true;
		else if($('#paketmaterial_satuan').val() == "" || $('#paketmaterial_satuan').val() == null)
			return true;
		else if(typeof $('#paketmaterial_harga').val() == 'undefined')
			return true;
		else if($('#paketmaterial_harga').val() == "" || $('#paketmaterial_harga').val() == null)
			return true;	
		else return false;
	}
	
	function resetPaketmaterial(){
		$('#paketmaterial_nama').val("");
		$('#paketmaterial_satuan').val("");
		$('#paketmaterial_harga').val("");
	}
	
	function isEmptyPaketupah(){
		if(typeof $('#paketupah_nama').val() == 'undefined')
			return true;
		else if($('#paketupah_nama').val() == "" || $('#paketupah_nama').val() == null)
			return true;
		else if(typeof $('#paketupah_satuan').val() == 'undefined')
			return true;
		else if($('#paketupah_satuan').val() == "" || $('#paketupah_satuan').val() == null)
			return true;
		else if(typeof $('#paketmaterial_harga').val() == 'undefined')
			return true;
		else if($('#paketupah_harga').val() == "" || $('#paketupah_harga').val() == null)
			return true;	
		else return false;
	}
	
	function resetPaketupah(){
		$('#paketupah_nama').val("");
		$('#paketupah_satuan').val("");
		$('#paketupah_harga').val("");
	}
</script>

<div id="changeModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
  <div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	<h4 class="modal-title">Konfirmasi mengubah lokasi upah</h4>
  </div>
  <div class="modal-body">
	<h3>Mengubah RAB dengan lokasi yang berbeda serta sudah terisi dapat menyebabkan terhapusnya data upah sekarang. Lanjutkan?</h3>
  </div>
  <div class="modal-footer">
	<button type="button" class="btn btn-primary" onclick="getUpahBaru();">Ya</button>
	<button type="button" class="btn btn-default" onclick="batalGanti();" aria-hidden="true">Tidak</button>
  </div>
</div>
</div>
</div>

<!-- Page heading -->
<div class="page-head">
    <h2 class="pull-left"><i class="fa fa-home"></i> Overhead <?= $tipe ?></h2>
    <!-- Breadcrumb -->
    <div class="bread-crumb pull-right">
        <a href="index.html"><i class="fa fa-home"></i> Home</a> 
        <!-- Divider -->
        <span class="divider">/</span> 
        <a href="#" class="bread-current">Overhead <?= $tipe ?></a>
    </div>
    <div class="clearfix"></div>
</div>
<!-- Page heading ends -->

<div class="matter">
    <div class="container">
        <div class="row">
			<div class="col-md-12">
				<div class="widget wgreen">
					<div class="widget-head">
						<div class="pull-left">
							Mengubah Data Overhead <?= $tipe ?>
						</div>
						<div class="widget-icons pull-right">
							<a href="#" class="wminimize">
								<i class="fa fa-chevron-up">
								</i>
							</a>
							<a href="#" class="wclose">
								<i class="fa fa-times">
								</i>
							</a>
						</div>
						<div class="clearfix">
						</div>
					</div>
					<div class="widget-content">
								<div class="form-horizontal" role="form" id="form_overhead" style="margin-top: 20px; margin-left: 10px">
									<div class="form-group">
										<label class="col-lg-2 control-label">Nama</label>
										<div class="col-lg-5">
											<input type="text" class="form-control" id="<?= mOverhead::NAMA ?>" name="<?= mOverhead::NAMA ?>" placeholder="nama overhead" value="<?= $overhead[mOverhead::NAMA] ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-2 control-label">Main Project</label>
										<div class="col-lg-5">
											<select class="form-control" id="main_project" name="main_project" onchange="changeMainProject();" disabled>
												<option value="" selected><?= $mainProject[mMainProject::NAMA] ?></option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-2 control-label">Sub Project</label>
										<div class="col-lg-5">
											<select class="form-control" id="sub_project" name="sub_project" onchange="changeSubProject();" disabled>
												<option value="" selected><?= $project[mProject::NAMA] ?></option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-2 control-label">RAB</label>
										<div class="col-lg-5">
											<select class="form-control" id="<?= mOverhead::RAB ?>" name="<?= mOverhead::RAB ?>" onchange="changeRAB();" disabled>
												<option value="" selected><?= $rab[mRab::NAME] ?></option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-2 control-label">Tipe</label>
										<div class="col-lg-5">
											<select class="form-control" id="tipe_overhead" name="tipe_overhead" disabled>
												<option><?= $tipe ?></option>
											</select>
										</div>
									</div>
								<div id="table_overhead">
									<div id="cellHelper" style="visibility: hidden; display: inline-block">
										<button class="btn btn-xs btn-info cellHelperBtn" id="btn-up" onclick="move('up')"><i class="fa fa-arrow-up"></i></button> 
										<button class="btn btn-xs btn-info cellHelperBtn" id="btn-down" onclick="move('down')"><i class="fa fa-arrow-down"></i></button> 
										<button class="btn btn-xs btn-danger cellHelperBtn" id="btn-min" onclick="deleteRow()"><i class="fa fa-times"></i></button>
									</div>
									<div id="example1" style="width: 90%"></div>
								<div class="clearfix">
									<br />
								</div>		
								<div style="width: 100%; margin-bottom: 10px" align="center" id="button_container"><div id="add"><button id="add" class="btn btn-primary btn-lg" onclick="simpanOverhead(1)">Simpan sebagai draft</button><button id="add" class="btn btn-success btn-lg" onclick="simpanOverhead(2)">Simpan untuk validasi</button></div></div>
								</div>
								</div>
					</div>
					<div class="widget-foot">
						<!-- Footer goes here -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="modalBarang" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog page-tables" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><b>Daftar Master Barang</b></h4>
            </div>
            <div class="modal-body">
                <div class="widget-content">
					<ul id="myTab" class="nav nav-tabs">
                      <li class="active"><a href="#material" data-toggle="tab">Tambahkan Barang</a></li>
                      <li><a href="#paketmaterial" data-toggle="tab">Tambahkan Paket</a></li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                      <div class="tab-pane fade in active" id="material">
							<div class="clearfix">
								<br/>
							</div>
							<div class="table-responsive">
								<table id="barang" class="display" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>Nama Barang</th>
											<th>Kategori</th>
											<th>Kode</th>
											<th>Satuan</th>
											<th>Harga</th>
											<th>Pilih</th>
										</tr>
									</thead>

									<tfoot>
										<tr>
											<th>Nama Barang</th>
											<th>Kategori</th>
											<th>Kode</th>
											<th>Satuan</th>
											<th>Harga</th>
											<th>Pilih</th>
										</tr>
									</tfoot>
								</table>
								<div class="clearfix">
								</div>
							</div>
                      </div>
                      <div class="tab-pane fade" id="paketmaterial">
							<div class="clearfix">
								<br/>
							</div>
						   <div class="form-horizontal" role="form">
								<div class="form-group">
									<label class="col-lg-4 control-label">Nama Paket Pekerjaan</label>
									<div class="col-lg-5">
										<input type="text" class="form-control" id="paketmaterial_nama" name="paketmaterial_nama" placeholder="nama paket">
									</div>
								</div>
								<div class="form-group">
									<label class="col-lg-4 control-label">Satuan</label>
									<div class="col-lg-5">
										<select class="form-control" id="paketmaterial_satuan" name="paketmaterial_satuan">
		<?php foreach ($satuanMaterial  as $i) {
		echo "<option value='" . $i['SATUAN_NAMA'] . "'>" . $i['SATUAN_NAMA'] . "</option>";
		} ?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-lg-4 control-label">Harga</label>
									<div class="col-lg-5">
										<input type="text" class="form-control" id="paketmaterial_harga" name="paketmaterial_harga" placeholder="harga paket">
									</div>
								</div>
								<div class="form-group">
									<label class="col-lg-4 control-label"></label>
									<div class="col-lg-5" align="center">
										<button type="button" class="btn btn-info" onclick="ambilNilai(0, 0,'paketmaterial')" aria-hidden="true">Tambahkan</button>
										<button type="button" class="btn btn-danger" onclick="resetPaketmaterial()" aria-hidden="true">Reset</button>
									</div>
								</div>
							</div>	
                      </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>
                <!--<button type="button" class="btn btn-primary">Save changes</button>-->
            </div>
        </div>
    </div>
</div>

<div id="modalUpah" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog page-tables" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><b>Daftar Master Upah</b></h4>
            </div>
            <div class="modal-body">
				<div class="widget-content">
					<ul id="myTab" class="nav nav-tabs">
                      <li class="active"><a href="#upahtab" data-toggle="tab">Tambahkan Upah</a></li>
                      <li><a href="#paketupah" data-toggle="tab">Tambahkan Paket</a></li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                      <div class="tab-pane fade in active" id="upahtab">
							<div class="clearfix">
								<br/>
							</div>
							<div class="table-responsive">
							<table id="upah" class="display" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>Nama</th>
										<th>Kode</th>
										<th>Satuan</th>
										<th>Lokasi</th>
										<th>Harga</th>
										<th>Pilih</th>
									</tr>
								</thead>

								<tfoot>
									<tr>
										<th>Nama</th>
										<th>Kode</th>
										<th>Satuan</th>
										<th>Lokasi</th>
										<th>Harga</th>
										<th>Pilih</th>
									</tr>
								</tfoot>
							</table>
							<div class="clearfix">
							</div>
						</div>
                      </div>
                      <div class="tab-pane fade" id="paketupah">
							<div class="clearfix">
								<br/>
							</div>
						   <div class="form-horizontal" role="form">
								<div class="form-group">
									<label class="col-lg-4 control-label">Nama Paket Pekerjaan</label>
									<div class="col-lg-5">
										<input type="text" class="form-control" id="paketupah_nama" name="paketupah_nama" placeholder="nama paket">
									</div>
								</div>
								<div class="form-group">
									<label class="col-lg-4 control-label">Satuan</label>
									<div class="col-lg-5">
										<select class="form-control" id="paketupah_satuan" name="paketupah_satuan">
		<?php foreach ($satuanUpah as $i) {
		echo "<option value='" . $i['SATUAN_UPAH_ID'] . "'>" . $i['SATUAN_UPAH_NAMA'] . "</option>";
		} ?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-lg-4 control-label">Harga</label>
									<div class="col-lg-5">
										<input type="text" class="form-control" id="paketupah_harga" name="paketupah_harga" placeholder="harga paket">
									</div>
								</div>
								<div class="form-group">
									<label class="col-lg-4 control-label"></label>
									<div class="col-lg-5" align="center">
										<button type="button" class="btn btn-info" onclick="ambilNilai(0, 0,'paketupah')" aria-hidden="true">Tambahkan</button>
										<button type="button" class="btn btn-danger" onclick="resetPaketupah()" aria-hidden="true">Reset</button>
									</div>
								</div>
							</div>	
                      </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>
                <!--<button type="button" class="btn btn-primary">Save changes</button>-->
            </div>
        </div>
    </div>
</div>


<style>
	.searchResult{
	
	}
	
	table.htCore th{
		background-color: #0993D3;
		color: #FFFFFF;
		height: 30px;
		font-size: 15px;
	}
</style>
<script>
	var disableCell = ['Jumlah Total','Sisa Anggaran Overhead','Total Anggaran Overhead'];
	var disableCellRow = [1,2,3];
	var currentRow = -1, currentCol = -1;
	var onlyExactMatch = function (queryStr, value) {
	  return queryStr === value;
	};
	
	var detailOverhead = <?php echo json_encode($detailOverhead); ?>;
	
	Array.prototype.insert = function (index, item) {
	  this.splice(index, 0, item);
	};
	
	var data1 = [
		['', '', '', '', '', '', ''],
		['jumlah_total', 'Jumlah Total', '', '', '', '', 0],
		['sisa_anggaran_overhead', 'Sisa Anggaran Overhead', '', '', '', '', 0],
		['total_anggaran_overhead', 'Total Anggaran Overhead', '', '', '', '', 0]
	  ];
	
	var jumlah_overhead = 0;
	var c = -1;
	for(var i=0; i<detailOverhead.length; i++){
		var push_item = [];
		var get_item = detailOverhead[i];
		push_item[0] = get_item["DETAIL_ID"];
		push_item[1] = get_item["DETAIL_NAMA"];
		push_item[2] = get_item["DETAIL_KODE"];
		push_item[3] = parseFloat(get_item["DETAIL_KOEFISIEN"]);
		push_item[4] = get_item["DETAIL_SATUAN"];
		push_item[5] = parseFloat(get_item["DETAIL_HARGA"]);
		push_item[6] = parseFloat(get_item["DETAIL_TOTAL"]);
		jumlah_overhead += push_item[6];
		c++;
		data1.insert(c, push_item);
	}
	disableCellRow[0] += c+1;
	disableCellRow[1] += c+1;
	disableCellRow[2] += c+1;
	data1[disableCellRow[0]][6] = jumlah_overhead;
	data1[disableCellRow[1]][6] = <?= $rab["SISA_OVERHEAD"] ?>;
	data1[disableCellRow[2]][6] = <?= $rab["BATAS_OVERHEAD"] ?>;
	batas = <?= $rab["SISA_OVERHEAD"] ?>;
	  
	var container1 = document.getElementById('example1'),
	  settings1 = {
		data: data1,
		colHeaders: ["Nama", "Kode", "Koefisien", "Satuan", "Harga Satuan", "Jumlah"],
		columns: [
			{data: 1, renderer: "html", className: "htMiddle"},
			{data: 2, readOnly: true, renderer: "html", className: "htMiddle"},
			{data: 3, className: "htMiddle"},
			{data: 4, readOnly: true, className: "htMiddle"},
			{data: 5, type: 'numeric', format: '0,0.00', readOnly: true, className: "htMiddle"},
			{data: 6, type: 'numeric', format: '0,0.00', readOnly: true, className: "htMiddle"}
		],
		rowHeights: 35,
		stretchH: 'all',
		multiSelect: false,
		allowInvalid: false,
		enterMoves: {row: 0, col: 1}
	  },
	  hot1;
	  function backgroundRowRenderer(instance, td, row, col, prop, value, cellProperties) {
		  Handsontable.renderers.TextRenderer.apply(this, arguments);
		  td.style.fontWeight = 'bold';
		  td.style.fontSize = 'small';
		  td.style.color = 'black';
	  }

	hot1 = new Handsontable(container1, settings1);
	
	hot1.updateSettings({
	  cells: function (row, col, prop) {
		var cellProperties = {};
		for(var i=0; i < disableCell.length; i++){
			if (hot1.getData()[row][prop] === disableCell[i]) {
			  cellProperties.readOnly = true;
			}
		}

		return cellProperties;
	  }
	});
	
	hot1.addHook('afterSelectionEnd', function(){
		var cel = hot1.getSelected();
		currentRow = cel[0];
		currentCol = cel[1];
		if(!disableException(cel[0]) && cel[1]==0){
			if(tipe=="material"){
				$('#modalBarang').modal('show');
			} else {
				$('#modalUpah').modal('show');
			}
		} else if(!disableException(cel[0])){
			if(isNewRow()) {
				$("#cellHelper").css('visibility','hidden');
				return;
			}
			
			var y = $('.current').position().top;
			var x = $('.htCore').position().left;
			var width = $('.htCore').outerWidth();
			
			if(!canMoveUp()) {
				$("#btn-up").prop('disabled', true);
				$("#btn-up").removeClass('btn-info');
			}
			else {
				$("#btn-up").prop('disabled', false);
				$("#btn-up").addClass('btn-info');
			}
			if(!canMoveDown()) {
				$("#btn-down").prop('disabled', true);
				$("#btn-down").removeClass('btn-info');
			}
			else {
				$("#btn-down").prop('disabled', false);
				$("#btn-down").addClass('btn-info');
			}
			
			$("#cellHelper").css({
				position: "relative",
				top: ( y + 30) + "px",
				left: (x + width + 10) + "px",
				visibility: 'visible'
			});
		} else {
			$("#cellHelper").css('visibility','hidden');
		}
	});
	
	hot1.addHook('afterChange', function(){
		var cel = (typeof hot1.getSelected() == 'undefined') ? null : hot1.getSelected();
		if(cel==null) return;
		if(!disableException(cel[0]) && currentCol==2){
			updateTotal();
		}
	});
	
	hot1.addHook('afterOnCellMouseDown', function(){
		if(!disableException(currentRow) && currentCol==2){
			updateTotal();
		}
	});
	
	function updateTotal(){
		if(hot1.getDataAtCell(currentRow,5)==null) { return; }
		else if(hot1.getDataAtCell(currentRow,5).toString()=='') { return; }
		var val = parseFloat(hot1.getDataAtCell(currentRow,2)) * parseFloat(hot1.getDataAtCell(currentRow,4));
		data1[currentRow][6] = val;
		var jumlahTotal = hitungJumlah();
		data1[disableCellRow[0]][6] = jumlahTotal;
		if(jumlahTotal > batas){
			alert("Anda memasukkan data dengan jumlah total melebihi batas overhead yang telah ditentukan");
			data1[currentRow][3] = 0;
			var val = parseFloat(hot1.getDataAtCell(currentRow,2)) * parseFloat(hot1.getDataAtCell(currentRow,4));
			data1[currentRow][6] = val;
			var jumlahTotal = hitungJumlah();
			data1[disableCellRow[0]][6] = jumlahTotal;
		}
		hot1.render();
	}
	
	function refreshTable(){
		var jumlahTotal = hitungJumlah();
		data1[disableCellRow[0]][6] = jumlahTotal;
		hot1.render();
	}
	
	
	function disableException(curRow){
		for(var i=0; i < disableCellRow.length; i++){
			if (curRow === disableCellRow[i]) {
			  return true;
			}
		}
		
		return false;
	}
	
	function move(type){
		var dest;
		if(type=="up"){
			dest = currentRow - 1;
		} else {
			dest = currentRow + 1;
		}
		for(var i=0; i<6; i++){
			var temp = hot1.getDataAtCell(currentRow, i);
			hot1.setDataAtCell(currentRow, i, hot1.getDataAtCell(dest, i));
			hot1.setDataAtCell(dest, i, temp);
		}	
		hot1.selectCell(dest, currentCol);
    }
	
	function deleteRow(){
		if(!isNewRow()) { 
			hot1.alter('remove_row', currentRow); 
			updateDisableRow(-1);
		}
		$("#cellHelper").css('visibility','hidden');
		refreshTable();
	}
	
	function ambilNilai(id,idx,type){
		if(currentRow!=-1 && currentCol!=-1){
			var data;
			if(type=="material"){
				data = $('#barang').dataTable().fnGetData()[idx];
				data1[currentRow][0] = data[5];
				data1[currentRow][1] = data[0];
				data1[currentRow][2] = data[2];
				data1[currentRow][3] = 0;
				data1[currentRow][4] = data[3];
				data1[currentRow][5] = data[4];
				data1[currentRow][6] = 0;
			} else if(type=="paketmaterial") {
				if (!isEmptyPaketmaterial()){
					data1[currentRow][0] = "LS";
					data1[currentRow][1] = $('#paketmaterial_nama').val();
					data1[currentRow][2] = "LS";
					data1[currentRow][3] = 0;
					data1[currentRow][4] = $('#paketmaterial_satuan').val();
					data1[currentRow][5] = $('#paketmaterial_harga').val();
					data1[currentRow][6] = 0;
					$('#modalBarang').modal('hide');
				} else {
					alert("Isi paket material dengan lengkap terlebih dahulu");
					return;
				}
			} else if(type=="paketupah") {
				if (!isEmptyPaketupah()){
					data1[currentRow][0] = "LS";
					data1[currentRow][1] = $('#paketupah_nama').val();
					data1[currentRow][2] = "LS";
					data1[currentRow][3] = 0;
					data1[currentRow][4] = $('#paketupah_satuan').val();
					data1[currentRow][5] = $('#paketupah_harga').val();
					data1[currentRow][6] = 0;
					$('#modalUpah').modal('hide');
				} else {
					alert("Isi paket upah dengan lengkap terlebih dahulu");
					return;
				}
			} else {
				data = $('#upah').dataTable().fnGetData()[idx];
				data1[currentRow][0] = data[5];
				data1[currentRow][1] = data[0];
				data1[currentRow][2] = data[1];
				data1[currentRow][3] = 0;
				data1[currentRow][4] = data[2];
				data1[currentRow][5] = data[4];
				data1[currentRow][6] = 0;
			} 
			if(isNewRow()) {
				hot1.alter('insert_row', currentRow+1);
				updateDisableRow(1);
			}
			updateTotal();
		}	
	}
	
	function simpanOverhead(status){
		if($("#OVERHEAD_NAMA").val()=="") {
			alert('Nama overhead masih kosong!');
			return;
		}
		detailData = [];
		for(var i = 0; i<disableCellRow[0]-1; i++){
			var id_item = hot1.getData()[i][0];
			var name_item = hot1.getData()[i][1];
			var kode_item = hot1.getData()[i][2];
			var koef_item = hot1.getData()[i][3];
			var satuan_item = hot1.getData()[i][4];
			var harga_satuan_item = hot1.getData()[i][5];
			var jumlah_harga_item = hot1.getData()[i][6];
			detailData.push({ id: id_item, name: name_item, kode: kode_item, koef: koef_item, satuan: satuan_item, harga: harga_satuan_item, total: jumlah_harga_item });
		}
		
		var namaOverhead = $('#<?= mOverhead::NAMA ?>').val();
		var totalOverhead = hot1.getDataAtCell(disableCellRow[0], 6);
		var dataDetailString = JSON.stringify(detailData);
		var idOverhead = <?= $overhead[mOverhead::ID] ?>;
		var add_btn = $('#add').clone();
		$('#add').remove();
		$('#btn_container').html("<img id='bar_loader' src='<?= base_url().'assets/default/img/bar_loader.gif' ?>'>");
		$.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>master/overhead/updateOverhead",
			data: {nama: namaOverhead, id: idOverhead, detail: dataDetailString, total: totalOverhead, tipe: tipe, status: status}, 
			cache: false,
			success: function(result){
				if(result=="success") {
					window.location="<?php echo base_url(); ?>master/overhead?tipe=" + tipe;
				} else {
					$('#bar_loader').remove();
					add_btn.appendTo("#btn_container");
				}
			}
		});
	}
	
	function isNewRow(){
		var currentDisableCellRow = -1;
		if(currentRow==disableCellRow[0]-1){
			return true;
		}
		return false;
	}
	
	function canMoveUp(){
		if(currentRow < disableCellRow[0]-1 && currentRow > 0){
			return true;
		}
		return false;
	}
	
	function canMoveDown(){
		if(currentRow < disableCellRow[0]-2 && currentRow >= 0){
			return true;
		}
		return false;
	}
	
	function updateDisableRow(param){
		for(var i=0; i < disableCell.length; i++){
			if(currentRow<disableCellRow[i]){
				disableCellRow[i] += param;
			}
		}
	}
	
	function hitungJumlah(){
		var sum = 0;
		for(var i = 0; i < disableCellRow[0]; i++){
			var val = data1[i][6];
			if(!isNaN(val)){
				sum = sum + val;
			}
		}
		return parseFloat(sum);
	}
</script>