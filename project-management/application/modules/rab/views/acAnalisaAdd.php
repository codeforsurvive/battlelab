<script src="<?php echo  base_url(); ?>assets/default/handsontable/handsontable.full.min.js"></script>
<link rel="stylesheet" media="screen" href="<?php echo  base_url(); ?>assets/default/handsontable/handsontable.full.min.css">

<script>
	var tableBarang, tableUpah, prev;
	
	$(document).ready(function() {
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
				$('td', row).eq(4).html(parseFloat(data[4]).formatMoney(2));
				$('td', row).eq(5).html('<button data-dismiss="modal" class="btn btn-xs takeButton" onclick="ambilNilai('+id+','+index+',\'barang\')"><i class="fa fa-check"></i> </button>');
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
				$('td', row).eq(4).html(parseFloat(data[4]).formatMoney(2));
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
		
		$("#analisa_lokasi").on('focus', function () {
			prev = this.value;
		}).change(function() {
			var upah_size = disableCellRow[3] - disableCellRow[2] - 2;
			if(upah_size>0){
				$('#changeModal').modal('show');
				return;
			} else {
				getUpahBaru();
			}
			prev = this.value;
		});
	} );
	
	function batalGanti(){
		$('#analisa_lokasi').val(prev);
		$('#changeModal').modal('hide');
	}
	
	function getUpahBaru(){
		var upah_size = disableCellRow[3] - disableCellRow[2] - 2;
		if(upah_size!=0){
			currentRow = disableCellRow[2]+1;
			for(var i = currentRow; i<disableCellRow[3]; i++){
				hot1.alter('remove_row', currentRow); 
				updateDisableRow(-1);
			}
			$("#cellHelper").css('visibility','hidden');
			refreshTable();
		}
		var id = $('#analisa_lokasi').val();
		tableUpah.fnDestroy();
		tableUpah = $('#upah').dataTable( {
			"processing": true,
			"serverSide": true,
			"ajax": "<?php echo base_url(); ?>master/upah/getViewAnalisaUpah?lokasi_id="+id,
			"createdRow": function ( row, data, index ) {
				var id = data[5];
				$('td', row).eq(4).html(parseFloat(data[4]).formatMoney(2));
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
</script>

<div id="changeModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
  <div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	<h4 class="modal-title">Konfirmasi mengubah lokasi upah</h4>
  </div>
  <div class="modal-body">
	<h3>Mengubah lokasi dengan analisa upah yang sudah terisi dapat menyebabkan terhapusnya data upah sekarang. Lanjutkan?</h3>
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
    <h2 class="pull-left"><i class="fa fa-home"></i> Analisa</h2>
    <!-- Breadcrumb -->
    <div class="bread-crumb pull-right">
        <a href="index.html"><i class="fa fa-home"></i> Home</a> 
        <!-- Divider -->
        <span class="divider">/</span> 
        <a href="#" class="bread-current">Pengelolaan Analisa</a>
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
							Menambah Data Analisa
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
						<div class="padd">
							<div class="col-lg-12 col-lg-offset-0">
								<div class="form-horizontal" role="form">
									<div class="form-group">
										<label class="col-lg-1 control-label">Kode</label>
										<div class="col-lg-5">
											<input type="text" class="form-control" id="analisa_kode" name="analisa_kode" placeholder="kode analisa">
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-1 control-label">Nama</label>
										<div class="col-lg-5">
											<input type="text" class="form-control" id="analisa_nama" name="analisa_nama" placeholder="nama analisa">
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-1 control-label">Satuan</label>
										<div class="col-lg-5">
											<select class="form-control" id="analisa_satuan" name="analisa_satuan">
			<?php foreach ($satuan as $i) {
			echo "<option value='" . $i['SATUAN_NAMA'] . "'>" . $i['SATUAN_NAMA'] . "</option>";
			} ?>
											</select>
										</div>
                                                                                <div class="col-lg-2" ng-if="displayField(['satuan_barang_admin'])"><a href="<?= base_url() ?>master/satuanbarang"><button type="button" class="btn btn-xs btn-success"><i class="fa fa-plus"></i></button></a></div>
									</div>
									<div class="form-group">
										<label class="col-lg-1 control-label">Lokasi</label>
										<div class="col-lg-5">
											<select class="form-control" id="analisa_lokasi" name="analisa_lokasi">
			<?php foreach ($lokasi as $i) {
			echo "<option value='" . $i['LOKASI_UPAH_ID'] . "'>" . $i['LOKASI_UPAH_NAMA'] . "</option>";
			} ?>
											</select>
										</div>
                                                                                <div class="col-lg-2" ng-if="displayField(['lokasi_upah_admin'])"><a href="<?= base_url() ?>master/lokasiupah"><button type="button" class="btn btn-xs btn-success"><i class="fa fa-plus"></i></button></a></div>
									</div>
									<div class="form-group">
										<label class="col-lg-1 control-label">Kategori</label>
										<div class="col-lg-5">
											<select class="form-control" id="analisa_kategori" name="analisa_kategori">
			<?php foreach ($kategori as $i) {
			echo "<option value='" . $i['KATEGORI_ANALISA_ID'] . "'>" . $i['KATEGORI_ANALISA_NAMA'] . "</option>";
			} ?>
											</select>
										</div>
                                                                                <div class="col-lg-2" ng-if="displayField(['kategori_analisa_admin'])"><a href="<?= base_url() ?>master/kategorianalisa"><button type="button" class="btn btn-xs btn-success"><i class="fa fa-plus"></i></button></a></div>
									</div>
								</div>	
								<div id="cellHelper" style="visibility: hidden; display: inline-block">
									<button class="btn btn-xs btn-info" id="btn-up" onclick="move('up')"><i class="fa fa-arrow-up"></i></button> 
									<button class="btn btn-xs btn-info " id="btn-down" onclick="move('down')"><i class="fa fa-arrow-down"></i></button> 
									<button class="btn btn-xs btn-danger" id="btn-min" onclick="deleteRow()"><i class="fa fa-times"></i></button>
								</div>
								<div id="example1" style="width: 90%"></div>
								<div class="clearfix">
									<br />
								</div>		
							</div>	
							<div style="width: 100%; margin-top: 20px" align="center" id="btn_container"><button id="add" class="btn btn-primary btn-lg" onclick="simpanAnalisa()">Simpan</button></div>
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
	var disableCell = ['BAHAN :','Jumlah Bahan','UPAH :','Jumlah Pekerja','Jumlah Bahan + Pekerja','Jumlah Total','Dibulatkan'];
	var disableCellRow = [0,2,3,5,6,7,8];
	var currentRow = -1, currentCol = -1;
	var onlyExactMatch = function (queryStr, value) {
	  return queryStr === value;
	};
	var data1 = [
		['bahan', 'BAHAN :', '', '', '', ''],
		['', '', '', '', '', ''],
		['jumlah_bahan', 'Jumlah Bahan', '', '', '', ''],
		['upah', 'UPAH :', '', '', '', ''],
		['', '', '', '', '', ''],
		['jumlah_pekerja', 'Jumlah Pekerja', '', '', '', ''],
		['jumlah_bahan_pekerja', 'Jumlah Bahan + Pekerja', '', '', '', ''],
		['jumlah_total', 'Jumlah Total', '', '', '', ''],
		['dibulatkan', 'Dibulatkan', '', '', '', '']
	  ],
	  container1 = document.getElementById('example1'),
	  settings1 = {
		data: data1,
		colHeaders: ["Uraian", "Koefisien", "Satuan", "Harga Satuan", "Jumlah"],
		columns: [
			{data: 1, renderer: "html", className: "htMiddle"},
			{data: 2, className: "htMiddle"},
			{data: 3, readOnly: true, className: "htMiddle"},
			{data: 4, readOnly: true, className: "htMiddle"},
			{data: 5, type: 'numeric', format: '0,0.00', readOnly: true, className: "htMiddle"}
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
			if(currentRow>disableCellRow[0] && currentRow<disableCellRow[1]){
				$('#modalBarang').modal('show');
			} else if(currentRow>disableCellRow[2] && currentRow<disableCellRow[3]){
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
		if(!disableException(cel[0]) && currentCol==1){
			updateTotal();
		}
	});
	
	hot1.addHook('afterOnCellMouseDown', function(){
		if(!disableException(currentRow) && currentCol==1){
			updateTotal();
		}
	});
	
	function updateTotal(){
		if(hot1.getDataAtCell(currentRow,3)==null) { return; }
		else if(hot1.getDataAtCell(currentRow,3).toString()=='') { return; }
		var val = parseFloat(hot1.getDataAtCell(currentRow,1)) * parseFloat(hot1.getDataAtCell(currentRow,3));
		console.log(val);
		data1[currentRow][5] = val;
		var jumlahBahan = hitungJumlahBahan();
		var jumlahPekerja = hitungJumlahPekerja();
		var jumlahTotal = jumlahBahan + jumlahPekerja;
		data1[disableCellRow[1]][5] = jumlahBahan;
		data1[disableCellRow[3]][5] = jumlahPekerja;
		data1[disableCellRow[4]][5] = jumlahTotal;
		data1[disableCellRow[5]][5] = jumlahTotal;
		data1[disableCellRow[6]][5] = Math.floor(jumlahTotal/100)*100;
		hot1.render();
	}
	
	function refreshTable(){
		var jumlahBahan = hitungJumlahBahan();
		var jumlahPekerja = hitungJumlahPekerja();
		var jumlahTotal = jumlahBahan + jumlahPekerja;
		data1[disableCellRow[1]][5] = jumlahBahan;
		data1[disableCellRow[3]][5] = jumlahPekerja;
		data1[disableCellRow[4]][5] = jumlahTotal;
		data1[disableCellRow[5]][5] = jumlahTotal;
		data1[disableCellRow[6]][5] = Math.floor(jumlahTotal/100)*100;
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
	
	function simpanAnalisa(){
		barangData = [];
		upahData = [];
		for(var i = disableCellRow[0]+1; i<disableCellRow[1]-1; i++){
			var id_item = hot1.getData()[i][0];
			var koef_item = hot1.getData()[i][2];
			barangData.push({ id: id_item, koef: koef_item});
		}
		for(var i = disableCellRow[2]+1; i<disableCellRow[3]-1; i++){
			var id_item = hot1.getData()[i][0];
			var koef_item = hot1.getData()[i][2];
			upahData.push({ id: id_item, koef: koef_item});
		}
		
		var kodeAnalisa = $('#analisa_kode').val();
		var namaAnalisa = $('#analisa_nama').val();
		var satuanAnalisa = $('#analisa_satuan').val();
		var lokasiAnalisa = $('#analisa_lokasi').val();
		var kategoriAnalisa = $('#analisa_kategori').val();
		var dataBarangString = JSON.stringify(barangData);
		var dataUpahString = JSON.stringify(upahData);
		var add_btn = $('#add').clone();
		$('#add').remove();
		$('#btn_container').html("<img id='bar_loader' src='<?= base_url().'assets/default/img/bar_loader.gif' ?>'>");
		$.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>rab/analisa/simpanAnalisa",
			data: {kode: kodeAnalisa, nama: namaAnalisa, barang: dataBarangString, upah: dataUpahString, satuan: satuanAnalisa, kategori: kategoriAnalisa, lokasi: lokasiAnalisa}, 
			cache: false,
			success: function(result){
				if(result=="success") {
					window.location="<?php echo base_url(); ?>rab/analisa";
                }
				else {
					$('#bar_loader').remove();
					add_btn.appendTo("#btn_container");
				}
			}
		});
    }
	
	function move(type){
		var dest;
		if(type=="up"){
			dest = currentRow - 1;
		} else {
			dest = currentRow + 1;
		}
		for(var i=0; i<5; i++){
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
			if(type=="barang"){
				data = $('#barang').dataTable().fnGetData()[idx];
				data1[currentRow][0] = data[5];
				data1[currentRow][1] = data[0];
				data1[currentRow][2] = 0;
				data1[currentRow][3] = data[3];
				data1[currentRow][4] = data[4];
				data1[currentRow][5] = 0;
			} else {
				data = $('#upah').dataTable().fnGetData()[idx];
				data1[currentRow][0] = data[5];
				data1[currentRow][1] = data[0];
				data1[currentRow][2] = 0;
				data1[currentRow][3] = data[2];
				data1[currentRow][4] = data[4];
				data1[currentRow][5] = 0;
			}
			if(isNewRow()) {
				hot1.alter('insert_row', currentRow+1);
				updateDisableRow(1);
			}
			updateTotal();
		}	
	}
	
	function isNewRow(){
		var currentDisableCellRow = -1;
		if(currentRow==disableCellRow[1]-1 || currentRow==disableCellRow[3]-1){
			return true;
		}
		return false;
	}
	
	function canMoveUp(){
		if(currentRow-1==disableCellRow[0] || currentRow-1==disableCellRow[2]){
			return false;
		}
		return true;
	}
	
	function canMoveDown(){
		if(currentRow+1==disableCellRow[1] || currentRow+1==disableCellRow[3]){
			return false;
		} else if(hot1.getDataAtCell(currentRow+1,0)!=null){
			if(hot1.getDataAtCell(currentRow+1,0).toString()==''){
				return false;
			}
		} else if(hot1.getDataAtCell(currentRow+1,0)==null){
			return false;
		}
		return true;
	}
	
	function updateDisableRow(param){
		for(var i=0; i < disableCell.length; i++){
			if(currentRow<disableCellRow[i]){
				disableCellRow[i] += param;
			}
		}
	}
	
	function hitungJumlahBahan(){
		var sum = 0;
		for(var i = disableCellRow[0]+1; i < disableCellRow[1]; i++){
			var val = data1[i][5];
			if(!isNaN(val)){
				sum = sum + val;
			}
		}
		return parseFloat(sum);
	}
	
	function hitungJumlahPekerja(){
		var sum = 0;
		for(var i = disableCellRow[2]+1; i<disableCellRow[3]; i++){
			var val = data1[i][5];
			if(!isNaN(val)){
				sum = sum + val;
			}
		}
		return parseFloat(sum);
	}
</script>