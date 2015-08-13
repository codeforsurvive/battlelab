<script>
	function changeMainProject(){
		var id = $('#main_project').val();
		$('#sub_project_form').append('<img id="snake_loader" src="<?= base_url() ?>/assets/default/img/snake_loader.gif" width="20">');
		$.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>projects/mainproject/getViewRunningSubProject",
			data: {id: id}, 
			cache: false,
			success: function(result){
				if(result!=null) {
					var res = JSON.parse(result);
					var subProject = res["sub_project"];
					$('#sub_project').html('');
					$('#rab').html('');
					var toAppend = '<option disabled selected> -- pilih Sub Project -- </option>';
					for(var i=0;i<subProject.length;i++){
						toAppend += '<option value="' + subProject[i]['<?= mProject::ID ?>'] + '">'+subProject[i]['<?= mProject::NAMA ?>']+'</option>';
					}
					$('#sub_project').html(toAppend);
					$('#snake_loader').remove();
				}
				else
					console.log(result);
			}
		});
	}
	
	function changeSubProject(){
		var id = $('#sub_project').val();
		$('#rab_form').append('<img id="snake_loader" src="<?= base_url() ?>/assets/default/img/snake_loader.gif" width="20">');
		$.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>projects/project/getViewRabById",
			data: {id: id}, 
			cache: false,
			success: function(result){
				if(result!=null) {
					var res = JSON.parse(result);
					var rab = res["rab"];
					$('#rab').html('');
					var toAppend = '<option disabled selected> -- pilih rab -- </option>';
					for(var i=0;i<rab.length;i++){
						toAppend += '<option value="'+rab[i]['<?= mRab::ID ?>']+'">'+rab[i]['<?= mRab::NAME ?>']+'</option>';
					}
					$('#rab').html(toAppend);
					$('#snake_loader').remove();
				}
				else
					console.log(result);
			}
		});
	}
	
	function pilihPajak(){
		var val = $("#pilih_pajak").val();
		if(val!='3'){
			$("#pilih_pajak_form").removeClass("col-lg-5");
			$("#pilih_pajak_form").addClass("col-lg-3");
			$("#pilih_nilai_pajak_form").show();
		} else {
			$("#pilih_pajak_form").removeClass("col-lg-3");
			$("#pilih_pajak_form").addClass("col-lg-5");
			$("#pilih_nilai_pajak_form").hide();
		}
	}
</script>
<!-- Page heading -->
<div class="page-head">
    <h2 class="pull-left"><i class="fa fa-building-o"></i> Purchase Order</h2>
    <!-- Breadcrumb -->
    <div class="bread-crumb pull-right">
        <a href="index.html"><i class="fa fa-home"></i> Home</a> 
        <!-- Divider -->
        <span class="divider">/</span> 
        <a href="<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/index' ?>" class="bread-current">PO</a>
        <span class="divider">/</span> 
        <a href="#" class="bread-current">Tambah</a>
    </div>
    <div class="clearfix"></div>
</div>
<!-- Page heading ends -->

<div class="col-md-12">
    <div class="widget wgreen">
        <div class="widget-head">
            <div class="pull-left">Tambah PO Baru</div>
            <div class="widget-icons pull-right">
                <a href="#" class="wminimize">
                    <i class="fa fa-chevron-up"></i>
                </a>
                <a href="#" class="wclose">
                    <i class="fa fa-times"></i>
                </a>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="widget-content" style="padding: 10px">
            <div class="page-tables">
                <div class="table-responsive">
                    <form id="formPO" action="<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/newPO' ?>" method="post" class="form-horizontal" role="form">
                        <div class="form-group">
							<label class="col-lg-2 control-label">Main Project</label>
							<div class="col-lg-5">
								<select class="form-control" id="main_project" name="main_project" onchange="changeMainProject();">
								<option disabled selected> -- pilih main poject -- </option>
<?php foreach ($listMainProject as $i) {
echo "<option value='" . $i[mMainProject::ID] . "'>" . $i[mMainProject::NAMA] . "</option>";
} ?>
								</select>
							</div>
						</div>
						<div class="form-group" id="sub_project_form">
							<label class="col-lg-2 control-label">Sub Project</label>
							<div class="col-lg-5">
								<select class="form-control" id="sub_project" name="sub_project" onchange="changeSubProject();">
									<option disabled selected> -- pilih sub poject -- </option>
								</select>
							</div>
						</div>
						<div class="form-group" id="rab_form">
							<label class="col-lg-2 control-label">RAB</label>
							<div class="col-lg-5">
								<select class="form-control" id="rab" name="rab">
									<option disabled selected> -- pilih RAB -- </option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-2 control-label">TOP</label>
							<div class="col-lg-5">
								<select class="form-control" id="top" name="top">
<?php foreach ($listTop as $i) {
echo "<option value='" . $i[mTop::ID] . "'>" . $i[mTop::VALUE] . " | " . $i[mTop::DESCRIPTION] . "</option>";
} ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-2 control-label">Pajak</label>
							<div class="col-lg-3" id="pilih_pajak_form">
								<select class="form-control" id="pilih_pajak" name="pilih_pajak" onchange="pilihPajak();">
								<?php foreach ($listKategoriPajak as $i) {
echo "<option value='" . $i[mKategoriPajak::ID] . "'>" . $i[mKategoriPajak::NAMA] . "</option>";
} ?>
								</select>
							</div>
							<div class="col-lg-2" id="pilih_nilai_pajak_form">
								<select class="form-control" id="pajak" name="pajak">
<?php foreach ($listPajak as $i) {
echo "<option value='{\"ID\": \"" . $i[mPajak::ID] . "\", \"VALUE\": \"" . $i[mPajak::VALUE] . "\"}'>" . $i[mPajak::NAMA] . " | " . $i[mPajak::VALUE] . "% </option>";
} ?>
								</select>
							</div>
						</div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Gudang</label>
                            <div class="col-lg-5">
                                <select name="GUDANG_ID" id="GUDANG_ID" class="form-control">
                                    <?php for ($j = 0; $j < sizeof($listGudang); $j++): ?>
                                        <option value="<?= $listGudang[$j]['GUDANG_ID'] ?>"><?= $listGudang[$j]['GUDANG_NAMA'] ?></option>
                                    <?php endfor; ?>    
                                </select>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-lg-2 control-label">Supplier</label>
                            <div class="col-lg-5">
                                <select name="SUPPLIER_ID" id="SUPPLIER_ID" class="form-control">
                                    <?php for ($j = 0; $j < sizeof($listPengguna); $j++): ?>
                                        <option value="<?= $listPengguna[$j]['SUPPLIER_ID'] ?>"><?= $listPengguna[$j]['SUPPLIER_NAMA'] ?></option>
                                    <?php endfor; ?>    
                                </select>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-lg-2 control-label">Tipe PO</label>
                            <div class="col-lg-5">
                                <select name="KATEGORI_PP_ID" id="KATEGORI_PP_ID" class="form-control">
                                    <?php for ($j = 0; $j < sizeof($listKategoriPP); $j++): ?>
                                        <option value="<?= $listKategoriPP[$j]['KATEGORI_PP_ID'] ?>"><?= $listKategoriPP[$j]['KATEGORI_PP_NAMA'] ?></option>
                                    <?php endfor; ?>    
                                </select>
                            </div>
                        </div>
						<div class="form-group">
							<label class="col-lg-2 control-label">Alamat Pengiriman</label>
							<div class="col-lg-5">
								<textarea class="form-control" id="alamat" name="alamat" placeholder="alamat pengiriman"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-2 control-label">Contact Person</label>
							<div class="col-lg-5">
								<label class="col-lg-3 control-label">Nama</label>
								<div class="col-lg-9" style="margin-bottom: 10px">
									<input type="text" class="form-control" id="nama_cp" name="nama_cp" placeholder="nama CP">
								</div>
								<label class="col-lg-3 control-label">No. Telp/HP</label>
								<div class="col-lg-9">
									<input type="text" class="form-control" id="telp_cp" name="telp_cp" placeholder="no telepon CP">
								</div>
							</div>
						</div>
                        <div class="barangBaru"></div>
                        <div class="form-group next">
                            <label class="col-lg-2 control-label"></label>
                            <div class="col-lg-10">
                                <button type="button" class="btn btn-sm btn-primary nextBtn" onclick="next()"><i class="fa fa-plus fa-fw"></i> Next</button>
                                <button type="button" class="pull-right btn btn-sm btn-primary addBtn" onclick="modalAddRap()"><i class="fa fa-plus fa-fw"></i> Tambah</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="page-tables">
                <div class="table-responsive" style="overflow-x: auto">
                    <div class="clearfix">
                        <br />
                    </div>
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
								<th>No</th>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Vol. PP</th>
                                <th>Vol. PO</th>
                                <th>Vol. Sisa</th>
                                <th>PP</th>
                                <th>Harga satuan</th>
								<th>Harga final</th>
								<th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="listBahan">
                        </tbody>
                    </table>
                    <div class="clearfix">
                    </div>
                </div>
                <br/>
                <div class="row" id="btn_container">
					<div id="add">
						<div class="col-lg-6"> 
							<button type="button" class="pull-right btn btn-lg btn-primary saveForm" onclick="save('1')"> Simpan sebagai draft</button>
						</div>
						<div class="col-lg-6">
							<button type="button" class="pull-left btn btn-lg btn-success saveForm" onclick="save('2')"> Simpan untuk validasi</button>
						</div>
					</div>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    $(".addBtn").hide();
    $(".saveForm").hide();
	
	var tableBarang = null;
	var currentEdit;
	var flag = new Array();
	
	function changePP(){
		var ppVal = $('#select_pp').val();
		var pp = JSON.parse(ppVal);
		var pp_id = pp['ID'];
		$('#pp_detail_kode').html(pp['KODE']);
		$('#pp_detail_status').html(pp['STATUS']);
		$('#pp_detail_kategori').html(pp['KATEGORI']);
		$('#pp_detail_kategori_id').val(parseFloat(pp['KATEGORI_ID']));
		$('#pp_detail_tgl').html(pp['TANGGAL']);
		$('#pp_detail_gudang').html(pp['GUDANG']);
		if(tableBarang!=null) tableBarang.fnDestroy();
		tableBarang = $('#barang').dataTable( {
			"processing": true,
			"serverSide": true,
			"ajax": "<?php echo base_url(); ?>p-material/po/getViewBarang?pp_id="+pp_id+"&pp_tipe="+parseFloat(pp['KATEGORI_ID']),
			"createdRow": function ( row, data, index ) {
				var id = data[8];
				var disabled = '';
				if(typeof (flag[id+'_'+pp_id]) == "undefined"){					
					if(parseFloat(data[5])==0) {
						disabled = 'disabled'; 
						flag[id+'_'+pp_id] = false;
					} else {
						flag[id+'_'+pp_id] = true;
					}
				} else if(flag[id+'_'+pp_id] == false){
					disabled = 'disabled'; 
				}
				$('td', row).eq(8).html('<button '+disabled+' id="ambilNilaiBtn_'+id+'_'+pp_id+'" data-dismiss="modal" class="btn btn-xs takeButton" onclick="ambilNilai(\''+id+'_'+pp_id+'\','+index+',\'barang\')"><i class="fa fa-check"></i> </button>');
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
		tableBarang.show();
	}
	
    function next() {
        $('#formPO select').attr('disabled','disabled');
		//$('#formPO input').attr('disabled','disabled');
        $(".nextBtn").hide();
        var RAB_ID = $("#rab").val();
		var tipe = $('#KATEGORI_PP_ID').val();
        $.ajax({
            type: "POST",
            url: "<?= base_url() ?>p-material/po/getCurrentPP",
            data: {RAB_ID: RAB_ID, TIPE: tipe},
            success: function(data) {
                $(".addBtn").show();
                $(".saveForm").show();
                var val = JSON.parse(data);
                if (val.length > 0) {
					var toAppend = '<option disabled selected> -- pilih PP -- </option>';
					for(var i=0;i<val.length;i++){
						toAppend += '<option value=\'{"ID": "' + val[i]['PERMINTAAN_PEMBELIAN_ID'] + '","KODE": "' + val[i]['PERMINTAAN_PEMBELIAN_KODE'] + '","STATUS" : "' + val[i]['STATUS_NAMA'] + '","KATEGORI" : "' + val[i]['KATEGORI_NAMA'] + '","KATEGORI_ID" : "' + val[i]['KATEGORI_ID'] + '","GUDANG" : "' + val[i]['GUDANG_NAMA'] + '","TOTAL" : "' + parseFloat(val[i]['PERMINTAAN_PEMBELIAN_TOTAL']) + '", "TANGGAL" : "' + val[i]['TANGGAL'] + '"}\' >'+val[i]['PERMINTAAN_PEMBELIAN_KODE']+'</option>';
					}
					$('#select_pp').html(toAppend);
                }
            }
        });
    }
	
	function editPP(id){
		currentEdit = id;
		var nomor = $('#row_no_'+id).html();
		var barang_id = $('#row_id_'+id).html();
		var kode = $('#row_kode_'+id).html();
		var nama = $('#row_nama_'+id).html();
		var volpp = parseFloat($('#row_volpp_'+id).html());
		var volpo = parseFloat($('#row_volpo_'+id).html());
		var volsisa = parseFloat($('#row_volsisa_'+id).html());
		var volsisatemp = parseFloat($('#row_volsisatemp_'+id).html());
		var pp = $('#row_kodepp_'+id).html();
		var id_pp = $('#row_idpp_'+id).html();
		var harga_satuan = ($('#row_hargasatuan_'+id+' .number').html()).formatFloat();
		var harga_satuantemp = parseFloat($('#row_hargasatuantemp_'+id).html());
		var harga_awal = ($('#row_hargaawal_'+id+' .number').html()).formatFloat();
		var harga_diskon = ($('#row_hargadiskon_'+id+' .number').html()).formatFloat();
		var usediskon = parseFloat($('#row_usediskon_'+id).html());
		var diskon1 = parseFloat($('#row_diskon1_'+id).html());
		var diskon2 = parseFloat($('#row_diskon2_'+id).html());
		var diskon3 = parseFloat($('#row_diskon3_'+id).html());
		var harga_pajak = ($('#row_hargapajak_'+id+' .number').html()).formatFloat();
		var harga_final = ($('#row_hargafinal_'+id+' .number').html()).formatFloat();
		
		$('#NOMOR').val(nomor);
		$('#BARANG_ID').val(barang_id);
		$('#BARANG_KODE').val(kode);
		$('#BARANG_NAMA').val(nama);
		$('#VOLUME_PP').val(volpp);
		$('#VOLUME_PO').val(volpo);
		$('#VOLUME_SISA').val(volsisa);
		$('#VOLUME_SISA_TEMP').val(volsisatemp);
		$('#KODE_PP').val(pp);
		$('#ID_PP').val(id_pp);
		$('#HARGA_SATUAN').val(harga_satuan);
		$('#HARGA_SATUAN_TEMP').val(harga_satuantemp);
		$('#HARGA_AWAL').val(harga_awal);
		if(usediskon==1){ 
			$('#using_diskon').prop('checked', true);
		} else {
			$('#using_diskon').removeAttr('checked');
		}
		checkedDiskon();
		$('#DISKON_1').val(diskon1);
		$('#DISKON_2').val(diskon2);
		$('#DISKON_3').val(diskon3);
		$('#HARGA_DISKON').val(harga_diskon);
		$('#HARGA_AFTER_DISKON').val((harga_awal-harga_diskon));
		$('#HARGA_PAJAK').val(harga_pajak);
		$('#HARGA_NET').val((harga_awal-harga_diskon-harga_pajak));
		$('#HARGA_FINAL').val(harga_final);
		$('#modalEdit').modal('show');
	}
	
	function ambilNilai(id,idx,type){
		var data;
		var ppVal = $('#select_pp').val();
		var pp = JSON.parse(ppVal);
		data = $('#barang').dataTable().fnGetData()[idx];
		var pilih_pajak = $('#pilih_pajak').val();
		var pajak = parseFloat(JSON.parse($('#pajak').val())["VALUE"]);
		var volpo = parseFloat(data[5]);
		var harga_barang = volpo * parseFloat(data[7]);
		var harga_diskon = 0;
		var harga_pajak = 0;
		var harga_awal = 0;
		var harga_final = 0;
		var harga_net = 0;
		var harga_awal = harga_barang;
		if(pilih_pajak!='3'){
			if(pilih_pajak=='1'){
				harga_final = harga_barang;
				harga_pajak = (pajak/(pajak+100))*harga_barang;
				harga_net = harga_barang - harga_pajak;
			} else {
				harga_net = harga_barang;
				harga_pajak = (pajak/100)*harga_barang;
				harga_final = harga_awal + harga_pajak;
			}
		}
		var rowCount = $('.listBahan tr').length;
		var num = (rowCount+1);
		
		$(".listBahan").append(
			"<tr id='row_" + id + "'>" +
			"<td style='display:none' id='row_id_" + id + "'>" + data[8] + "</td>" +
			"<td id='row_no_" + id + "'>" + num + "</td>" +
			"<td id='row_kode_" + id + "'>" + data[2] + "</td>" +
			"<td id='row_nama_" + id + "'>" + data[0] + "</td>" +
			"<td id='row_volpp_" + id + "'>" + data[3] + "</td>" +
			"<td id='row_volpo_" + id + "'>" + data[5] + "</td>" +
			"<td id='row_volsisa_" + id + "'>0</td>" +
			"<td style='display:none' id='row_volsisatemp_" + id + "'>" + data[5] + "</td>" +
			"<td id='row_kodepp_" + id + "'>" + pp['KODE'] + "</td>" +
			"<td style='display:none' id='row_idpp_" + id + "'>" + pp['ID'] + "</td>" +
			"<td id='row_hargasatuan_" + id + "' align='right'>" + parseFloat(data[7]).formatMoney(2) + "</td>" +
			"<td style='display:none' id='row_hargasatuantemp_" + id + "'>" + data[7] + "</td>" +
			"<td style='display:none' id='row_hargaawal_" + id + "' align='right'>" + harga_barang.formatMoney(2) + "</td>" +
			"<td style='display:none' id='row_hargadiskon_" + id + "' align='right'>" + (0).formatMoney(2) + "</td>" +
			"<td style='display:none' id='row_usediskon_" + id + "'>0</td>" +
			"<td style='display:none' id='row_diskon1_" + id + "'>0</td>" +
			"<td style='display:none' id='row_diskon2_" + id + "'>0</td>" +
			"<td style='display:none' id='row_diskon3_" + id + "'>0</td>" +
			"<td style='display:none' id='row_hargapajak_" + id + "' align='right'>" + harga_pajak.formatMoney(2) + "</td>" +
			"<td style='display:none' id='row_harganet_" + id + "' align='right'>" + harga_net.formatMoney(2) + "</td>" +
			"<td id='row_hargafinal_" + id + "' align='right'>" + harga_final.formatMoney(2) + "</td>" +
			"<td><button class='btn btn-xs btn-success' onclick='editPP(\"" + id + "\");'><i class='fa fa-plus fa-fw'></i> Edit</button><button class='btn btn-xs btn-danger' onclick='dialogHapus(\"" + id + "\",\"" + data[0] + "\");'><i class='fa fa-times fa-fw'></i> Hapus</button></td>" +
			"</tr>"
			);
		$("#DISKON_1").attr('readonly','true');
		$("#DISKON_2").attr('readonly','true');
		$("#DISKON_3").attr('readonly','true');
		$("#ambilNilaiBtn_"+id).attr('disabled','disabled');
		flag[id] = false;
	}
	
	function changeVolumePO(){
		var volpo_baru = isNaN(parseFloat($('#VOLUME_PO').val())) ? 0 : parseFloat($('#VOLUME_PO').val());
		var volsisa = isNaN(parseFloat($('#VOLUME_SISA').val())) ? 0 : parseFloat($('#VOLUME_SISA').val());
		var volsisatemp = isNaN(parseFloat($('#VOLUME_SISA_TEMP').val())) ? 0 : parseFloat($('#VOLUME_SISA_TEMP').val());
		if(volpo_baru > volsisatemp){
			alert("Volume PO baru melebihi volume sisa");
			$('#VOLUME_PO').val(0);
			calculateAll();
		} else if(volpo_baru < 0){
			alert("Volume PO kurang dari 0");
			$('#VOLUME_PO').val(0);
			calculateAll();
		} else {
			if(isNaN(parseFloat($('#VOLUME_SISA').val())) || parseFloat($('#VOLUME_SISA').val())<0){
				$('#VOLUME_PO').val(0);
				calculateAll();
			}
			else {
				$('#VOLUME_SISA').val(Number((volsisatemp-volpo_baru).toFixed(5)));
				calculateAll();
			}
		}
	}
	
	function checkedDiskon(){
		if ($('#using_diskon').is(':checked')) {
			$("#DISKON_1").removeAttr('readonly');
			$("#DISKON_2").removeAttr('readonly');
			$("#DISKON_3").removeAttr('readonly');
		} else {
			$("#DISKON_1").val('0');
			$("#DISKON_2").val('0');
			$("#DISKON_3").val('0');
			calculateAll();
			$("#DISKON_1").attr('readonly','true');
			$("#DISKON_2").attr('readonly','true');
			$("#DISKON_3").attr('readonly','true');
		}
	}
	
	function validateSign(){
		var password = $('#validate_password').val();
		$.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>auth/sign/verifysign",
			data: {iduser: <?= $iduseractive ?>, password: password},
			cache: false,
			success: function(result) {
				if(result=="false"){
					$('#alertSign').show();
				} else {
					$('#modalEdit').modal();
					$("#validateModal").modal('hide');
				}
			}
		});
	 }
	 
	 function cancelValidateSign(){
		$('#HARGA_SATUAN').val(parseFloat($('#HARGA_SATUAN_TEMP').val()));
		$('#modalEdit').modal();
		$("#validateModal").modal('hide');
	 }
	
	function changeHargaSatuan(){
		var harga_satuan = (isNaN(parseFloat($('#HARGA_SATUAN').val())) || parseFloat($('#HARGA_SATUAN').val()) < 0) ? parseFloat($('#HARGA_SATUAN_TEMP').val()) : parseFloat($('#HARGA_SATUAN').val());
		var harga_satuantemp = isNaN(parseFloat($('#HARGA_SATUAN_TEMP').val())) ? 0 : parseFloat($('#HARGA_SATUAN_TEMP').val());
		var maxharga = 1.1 * harga_satuantemp;
		if(harga_satuan > maxharga){
			if(isPermitted(["po_tm"])){
				$('#modalEdit').modal('hide');
				$('#validate_password').val('');
				$("#validateModal").modal();
			}
			else {
				alert("Perubahan harga tidak boleh melebihi 10% dari harga tertera, hubungi Top Management Purchase Order jika dibutuhkan!");
				$('#HARGA_SATUAN').val(harga_satuantemp);
			}
		}
		calculateAll();
	}
	
	function calculateAll(){
		var pilih_pajak = $('#pilih_pajak').val();
		var pajak = parseFloat(JSON.parse($('#pajak').val())["VALUE"]);
		var harga_barang = parseFloat($('#HARGA_SATUAN').val())*parseFloat($('#VOLUME_PO').val());
		$('#HARGA_AWAL').val(harga_barang);
		
		var d1 = isNaN(parseFloat($('#DISKON_1').val())) ? 0 : parseFloat($('#DISKON_1').val());
		var d2 = isNaN(parseFloat($('#DISKON_2').val())) ? 0 : parseFloat($('#DISKON_2').val());
		var d3 = isNaN(parseFloat($('#DISKON_3').val())) ? 0 : parseFloat($('#DISKON_3').val());
		
		var diskon1 = (d1/100)*harga_barang;
		var afterdiskon1 = harga_barang - diskon1;
		var diskon2 = (d2/100)*afterdiskon1;
		var afterdiskon2 = afterdiskon1 - diskon2;
		var diskon3 = (d3/100)*afterdiskon2;
		var afterdiskon3 = afterdiskon2 - diskon3;
		
		$('#HARGA_DISKON').val((diskon1+diskon2+diskon3));
		$('#HARGA_AFTER_DISKON').val(afterdiskon3);
		
		var harga_awal = harga_barang;
		var harga_pajak = 0;
		var harga_final = 0;
		var harga_net = 0;
		var harga_after_diskon = afterdiskon3;
		
		if(pilih_pajak=='1'){
			harga_final = harga_after_diskon;
			harga_pajak = (pajak/(pajak+100))*harga_after_diskon;
			harga_net = harga_after_diskon - harga_pajak;
		} else {
			harga_net = harga_after_diskon;
			harga_pajak = (pajak/100)*harga_after_diskon;
			harga_final = harga_after_diskon + harga_pajak;
		}
		
		$('#HARGA_PAJAK').val(harga_pajak);
		$('#HARGA_NET').val(harga_net);
		$('#HARGA_FINAL').val(harga_final);
	}
	
	function modalAddRap(){
		$('#modalPilihan').modal();
	}

	function saveChanges(){
		var num = $('#NOMOR').val();
		var barang_id = $('#BARANG_ID').val();
		var kode = $('#BARANG_KODE').val();
		var nama = $('#BARANG_NAMA').val();
		var volpp = parseFloat($('#VOLUME_PP').val());
		var volpo = parseFloat($('#VOLUME_PO').val());
		var volsisa = parseFloat($('#VOLUME_SISA').val());
		var volsisatemp = parseFloat($('#VOLUME_SISA_TEMP').val());
		var pp = $('#KODE_PP').val();
		var id_pp = $('#ID_PP').val();
		var harga_satuan = parseFloat($('#HARGA_SATUAN').val());
		var harga_satuantemp = parseFloat($('#HARGA_SATUAN_TEMP').val());
		var harga_awal = parseFloat($('#HARGA_AWAL').val());
		var harga_diskon = parseFloat($('#HARGA_DISKON').val());
		if ($('#using_diskon').is(':checked')) var usediskon = "1";
		else var usediskon = "0";
		var diskon1 = parseFloat($('#DISKON_1').val());
		var diskon2 = parseFloat($('#DISKON_2').val());
		var diskon3 = parseFloat($('#DISKON_3').val());
		var harga_pajak = parseFloat($('#HARGA_PAJAK').val());
		var harga_net = parseFloat($('#HARGA_NET').val());
		var harga_final = parseFloat($('#HARGA_FINAL').val());
		
		var id = currentEdit;
		$('#row_'+id).html(
				"<td style='display:none' id='row_id_" + id + "'>" + barang_id + "</td>" +
				"<td id='row_no_" + id + "'>" + num + "</td>" +
				"<td id='row_kode_" + id + "'>" + kode + "</td>" +
				"<td id='row_nama_" + id + "'>" + nama + "</td>" +
				"<td id='row_volpp_" + id + "'>" + volpp + "</td>" +
				"<td id='row_volpo_" + id + "'>" + volpo + "</td>" +
				"<td id='row_volsisa_" + id + "'>" + volsisa + "</td>" +
				"<td style='display:none' id='row_volsisatemp_" + id + "'>" + volsisatemp + "</td>" +
				"<td id='row_kodepp_" + id + "'>" + pp + "</td>" +
				"<td style='display:none' id='row_idpp_" + id + "'>" + id_pp + "</td>" +
				"<td id='row_hargasatuan_" + id + "' align='right'>" + harga_satuan.formatMoney(2) + "</td>" +
				"<td style='display:none' id='row_hargasatuantemp_" + id + "'>" + harga_satuantemp + "</td>" +
				"<td style='display:none' id='row_hargaawal_" + id + "' align='right'>" + harga_awal.formatMoney(2) + "</td>" +
				"<td style='display:none' id='row_hargadiskon_" + id + "' align='right'>" + harga_diskon.formatMoney(2) + "</td>" +
				"<td style='display:none' id='row_usediskon_" + id + "'>" + usediskon + "</td>" +
				"<td style='display:none' id='row_diskon1_" + id + "'>" + diskon1 + "</td>" +
				"<td style='display:none' id='row_diskon2_" + id + "'>" + diskon2 + "</td>" +
				"<td style='display:none' id='row_diskon3_" + id + "'>" + diskon3 + "</td>" +
				"<td style='display:none' id='row_hargapajak_" + id + "' align='right'>" + harga_pajak.formatMoney(2) + "</td>" +
				"<td style='display:none' id='row_harganet_" + id + "' align='right'>" + harga_net.formatMoney(2) + "</td>" +
				"<td id='row_hargafinal_" + id + "' align='right'>" + harga_final.formatMoney(2) + "</td>" +
				"<td><button class='btn btn-xs btn-success' onclick='editPP(\"" + id + "\");'><i class='fa fa-plus fa-fw'></i> Edit</button><button class='btn btn-xs btn-danger' onclick='dialogHapus(\"" + id + "\",\"" + nama + "\");'><i class='fa fa-times fa-fw'></i> Hapus</button></td>"
				);
	}
    
    function save(param) {
		var barang = [];
		var data = [];
		var poTotal = 0;
        $('tr[id*=row_]:visible').each(function() {
			var strid = $(this).attr('id');
			var id = strid.replace('row_','');
			var barang_id = $('#row_id_'+id).html();
			var kode_barang = $('#row_kode_'+id).html();
			var volpo = parseFloat($('#row_volpo_'+id).html());
			var pp = $('#row_kodepp_'+id).html();
			var id_pp = $('#row_idpp_'+id).html();
			var harga_satuan = ($('#row_hargasatuan_'+id+' .number').html()).formatFloat();
			var harga_awal = ($('#row_hargaawal_'+id+' .number').html()).formatFloat();
			var harga_diskon = ($('#row_hargadiskon_'+id+' .number').html()).formatFloat();
			var usediskon = parseFloat($('#row_usediskon_'+id).html());
			var diskon1 = 0;
			var diskon2 = 0;
			var diskon3 = 0;
			if(usediskon==1){
				diskon1 = parseFloat($('#row_diskon1_'+id).html());
				diskon2 = parseFloat($('#row_diskon2_'+id).html());
				diskon3 = parseFloat($('#row_diskon3_'+id).html());
			}
			var harga_pajak = ($('#row_hargapajak_'+id+' .number').html()).formatFloat();
			var harga_net = ($('#row_harganet_'+id+' .number').html()).formatFloat();
			var harga_final = ($('#row_hargafinal_'+id+' .number').html()).formatFloat();
			poTotal += harga_final;
			barang.push({BARANG_ID: barang_id, KODE_ID: kode_barang, PERMINTAAN_PEMBELIAN_ID: id_pp, VOLUME_PO: volpo, HARGA_MATERI_PO: harga_satuan, HARGA_AWAL: harga_awal, DISKON1: diskon1, DISKON2: diskon2, DISKON3: diskon3, HARGA_DISKON: harga_diskon, HARGA_PAJAK: harga_pajak, HARGA_NET: harga_net, HARGA_FINAL: harga_final});
		});
		var sup_id = $('#SUPPLIER_ID').val();
		var stat_po = param;
		var pajak_id = JSON.parse($("#pajak").val())["ID"];
		var kat_pajak_id = $("#pilih_pajak").val();
		var gudang_id = $("#GUDANG_ID").val();
		var kat_po = $("#KATEGORI_PP_ID").val();
		var top = $("#top").val();
		var alamat_kirim = $("#alamat").val();
		var nama_cp = $("#nama_cp").val();
		var telp_cp = $("#telp_cp").val();
		var barangString = JSON.stringify(barang);
		var rab_id = $("#rab").val();
		var add_btn = $('#add').clone();
		$('#add').remove();
		$('#btn_container').html("<img id='bar_loader' src='<?= base_url().'assets/default/img/bar_loader.gif' ?>'>");
		$.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>p-material/po/simpanPo",
			data: {RAB_ID: rab_id, SUPPLIER_ID: sup_id, STATUS_PO_ID: stat_po, PAJAK_ID: pajak_id, KATEGORI_PAJAK_ID: kat_pajak_id, GUDANG_ID: gudang_id, TOP_ID: top, KATEGORI_PP_ID: kat_po, PURCHASE_ORDER_TOTAL: poTotal, BARANG: barangString, ALAMAT: alamat_kirim, NAMA_CP: nama_cp, TELP_CP: telp_cp}, 
			cache: false,
			success: function(result){
				if(result=="success") {
					window.location="<?php echo base_url(); ?>p-material/po";
                }
				else {
					$('#bar_loader').remove();
					add_btn.appendTo("#btn_container");
				}
			} 
		});
    }
    
    function dialogHapus(id, nama){
        $(".namaBarangHapus").text("Anda yakin untuk menghapus "+nama+" ini?")
        $('#tobe_deleted_id').val(id);
        $("#deleteModal").modal();
    }
    
    function deleteBarang(id){
        $("#row_" + id).remove();
		$("#ambilNilaiBtn_" + id).removeAttr('disabled');
		flag[id] = true;
		updateNomor();
        $("#deleteModal").modal("hide");
    }
	
	function updateNomor(){
		var rowCount = $('.listBahan tr').length;
		var i = 1;
		$('td[id*=row_no]:visible').each(function() {
			$(this).html(i);
			i++;
		});
	}
</script>
<style>
	.detail_pp{
		background-color: #EEEEEE;
	}
	.currency{
		margin-right: 10px;
		display: inline-block;
	}
	.number{
		display: inline-block;  
		text-align: right;
	}
	th, td {
		white-space: nowrap; 
	}
</style>

<div id="modalPilihan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog page-tables" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><b>Daftar Bahan</b></h4>
            </div>
            <div class="modal-body">
                <div class="widget-content">
					<div style="width: 100%">
						<div class="col-lg-3">
							<div class="form-horizontal">
								<div class="form-group">
									<label class="col-lg-4 control-label">Pilih PP</label>
									<div class="col-lg-8">
										<select class="form-control" name="select_pp" id="select_pp" onchange="changePP();">
											<option disabled selected> -- PP kosong -- </option>
										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-9">
							<table class="table table-bordered centerTable">
								<tr>
								  <td width="100" class="detail_pp"><b>Kode</b></td>
								  <td id="pp_detail_kode"></td>
								  <td width="100" class="detail_pp"><b>Kategori</b></td>
								  <td id="pp_detail_kategori"></td>
								  <input type="hidden" id="pp_detail_kategori_id">
								  <td width="100" class="detail_pp"><b>Status</b></td>
								  <td id="pp_detail_status"></td>
								</tr>
								<tr>
								  <td class="detail_pp"><b>Tanggal</b></td>
								  <td id="pp_detail_tgl"></td>
								  <td class="detail_pp"><b>Gudang</b></td>
								  <td id="pp_detail_gudang"></td>
								  <td class="detail_pp"><b>Total</b></td>
								  <td id="pp_detail_total"></td>
								</tr>
							</table>
						</div>
					</div>
					<div class="table-responsive">
						<table id="barang" class="display" cellspacing="0" width="100%"  style="margin-bottom: 10px; display:none">
							<thead>
								<tr>
									<th>Nama Barang</th>
									<th>Kategori</th>
									<th>Kode</th>
									<th>Volume PP</th>
									<th>Volume Terpakai</th>
									<th>Volume Sisa</th>
									<th>Satuan</th>
									<th>Harga</th>
									<th>Pilih</th>
								</tr>
							</thead>
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

<div id="modalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog page-tables">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><b>Detail Barang</b></h4>
            </div>
            <div class="modal-body">
                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Nama Barang</label>
                        <div class="col-lg-5">
							<input type="hidden" id="NOMOR" class="form-control" name="NOMOR">
                            <input type="hidden" id="BARANG_ID" class="form-control" name="BARANG_ID">
                            <input type="text" id="BARANG_NAMA" class="form-control" name="BARANG_NAMA" readonly="true">
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-lg-4 control-label">Kode Barang</label>
                        <div class="col-lg-5">
                            <input type="text" id="BARANG_KODE" class="form-control" name="BARANG_KODE" readonly="true">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Volume PP</label>
                        <div class="col-lg-5">
                            <input type="text" id="VOLUME_PP" class="form-control" name="VOLUME_PP" readonly="true">
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-lg-4 control-label">Volume PO</label>
                        <div class="col-lg-5">
                            <input type="text" id="VOLUME_PO" class="form-control" name="VOLUME_PO" onkeyup="changeVolumePO();">
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-lg-4 control-label">Volume Sisa</label>
                        <div class="col-lg-5">
                            <input type="text" id="VOLUME_SISA" class="form-control" name="VOLUME_SISA" readonly="true">
							<input type="hidden" id="VOLUME_SISA_TEMP" class="form-control" name="VOLUME_SISA_TEMP" >
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-lg-4 control-label">Kode PP</label>
                        <div class="col-lg-5">
							<input type="hidden" id="ID_PP" class="form-control" name="ID_PP">
                            <input type="text" id="KODE_PP" class="form-control" name="KODE_PP" readonly="true">
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-lg-4 control-label">Harga Satuan</label>
                        <div class="col-lg-5">
							<div class="input-group">
							  <div class="input-group-addon">Rp</div>
							  <input type="text" id="HARGA_SATUAN" class="form-control" name="HARGA_SATUAN" onkeyup="changeHargaSatuan();">
							  <input type="hidden" id="HARGA_SATUAN_TEMP" class="form-control" name="HARGA_SATUAN_TEMP">
							  <div class="input-group-addon">.00</div>
							</div>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-lg-4 control-label">Harga Awal</label>
                        <div class="col-lg-5">
							<div class="input-group">
							  <div class="input-group-addon">Rp</div>
							  <input type="text" id="HARGA_AWAL" class="form-control" name="HARGA_AWAL" readonly="true">
							  <div class="input-group-addon">.00</div>
							</div>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-lg-4 control-label"><input type="checkbox" id="using_diskon" name="using_diskon" style="margin-right: 10px" onchange="checkedDiskon()"> Diskon</label>
                        <div class="col-lg-8"> 
							<div class="col-lg-4">
								<div class="input-group">
								  <input type="text" id="DISKON_1" class="form-control" name="DISKON_1" readonly="true" onkeyup="calculateAll()">
								  <div class="input-group-addon">%</div>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="input-group">
								  <input type="text" id="DISKON_2" class="form-control" name="DISKON_2" readonly="true" onkeyup="calculateAll()">
								  <div class="input-group-addon">%</div>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="input-group">
								  <input type="text" id="DISKON_3" class="form-control" name="DISKON_3" readonly="true" onkeyup="calculateAll()">
								  <div class="input-group-addon">%</div>
								</div>
							</div>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-lg-4 control-label">Diskon</label>
                        <div class="col-lg-5">
							<div class="input-group">
							  <div class="input-group-addon">Rp</div>
							  <input type="text" id="HARGA_DISKON" class="form-control" name="HARGA_DISKON" readonly="true">
							  <div class="input-group-addon">.00</div>
							</div>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-lg-4 control-label">Harga Setelah Diskon</label>
                        <div class="col-lg-5">
							<div class="input-group">
							  <div class="input-group-addon">Rp</div>
							  <input type="text" id="HARGA_AFTER_DISKON" class="form-control" name="HARGA_AFTER_DISKON" readonly="true">
							  <div class="input-group-addon">.00</div>
							</div>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-lg-4 control-label">Pajak</label>
                        <div class="col-lg-5">
							<div class="input-group">
							  <div class="input-group-addon">Rp</div>
							  <input type="text" id="HARGA_PAJAK" class="form-control" name="HARGA_PAJAK" readonly="true">
							  <div class="input-group-addon">.00</div>
							</div>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-lg-4 control-label">Harga Net</label>
                        <div class="col-lg-5">
                            <div class="input-group">
							  <div class="input-group-addon">Rp</div>
							  <input type="text" id="HARGA_NET" class="form-control" name="HARGA_NET" readonly="true">
							  <div class="input-group-addon">.00</div>
							</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Harga Dibayar</label>
                        <div class="col-lg-5">
							<div class="input-group">
							  <div class="input-group-addon">Rp</div>
							  <input type="text" id="HARGA_FINAL" class="form-control" name="HARGA_FINAL" readonly="true">
							  <div class="input-group-addon">.00</div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="saveChanges()">Save changes</button>
            </div>
        </div>
    </div>
</div>

<div id="validateModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" onclick="cancelValidateSign();">×</button>
				<h4 class="modal-title">Konfirmasi validasi perubahan harga</h4>
			</div>
			<div class="modal-body">
				<div class="form-horizontal" role="form">
					<div class="form-group">
						<div class="col-lg-9">
							<input type="password" class="form-control" id="validate_password" name="validate_password" placeholder="Password untuk validasi" onkeyup="$('#alertSign').hide();">
						</div>
						<label id="alertSign" class="col-lg-3 control-label" style="color: red; display: none">Sign password salah</label>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" onclick="validateSign();">Lanjutkan</button>
				<button type="button" class="btn btn-default" onclick="cancelValidateSign();">Batal</button>
			</div>
		</div>
	</div>
</div>

<div id="deleteModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Konfirmasi penghapusan barang</h4>
            </div>
            <div class="modal-body">
                <h3 class="namaBarangHapus">Anda yakin untuk menghapus item ini?</h3>
                <input type="hidden" value="" name="tobe_deleted_id" id="tobe_deleted_id" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="deleteBarang($('#tobe_deleted_id').val());">Ya</button>
                <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Tidak</button>
            </div>
        </div>
    </div>
</div>