<script>
	String.prototype.formatFloat = function(){
	var n = this;
		return parseFloat( (n).replace(/,/g, '') );
	 };
	 
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
					var toAppend = '<option disabled selected> -- pilih sub project -- </option>';
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
					var toAppend = '<option disabled selected> -- pilih RAB -- </option>';
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
	
	function changeRAB(){
		var id = $('#rab').val();
		$('#supplier_form').append('<img id="snake_loader_supplier" src="<?= base_url() ?>/assets/default/img/snake_loader.gif" width="20">');
		$('#top_form').append('<img id="snake_loader_top" src="<?= base_url() ?>/assets/default/img/snake_loader.gif" width="20">');
		$.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>p-material/invoice/getListSupplier",
			data: {RAB_ID: id}, 
			cache: false,
			success: function(result){
				if(result!=null) {
					var res = JSON.parse(result);
					$('#supplier').html('');
					var toAppend = '';
					for(var i=0;i<res.length;i++){
						toAppend += '<option value="'+res[i]['<?= mSupplier::ID ?>']+'">'+res[i]['<?= mSupplier::KODE ?>']+' | '+res[i]['<?= mSupplier::NAME ?>']+'</option>';
					}
					$('#supplier').html(toAppend);
					$('#snake_loader_supplier').remove();
				}
				else
					console.log(result);
			}
		});
		$.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>p-material/invoice/getListTop",
			data: {RAB_ID: id}, 
			cache: false,
			success: function(result){
				if(result!=null) {
					var res = JSON.parse(result);
					$('#top').html('');
					var toAppend = '<option value="">-- Pilih LPB --</option>';
					for(var i=0;i<res.length;i++){
						toAppend += '<option value="'+res[i]['<?= mTop::ID ?>']+'">'+res[i]['<?= mTop::VALUE ?>']+' | '+res[i]['<?= mTop::KODE ?>']+'</option>';
					}
					$('#top').html(toAppend);
					$('#snake_loader_top').remove();
				}
				else
					console.log(result);
			}
		});
	}
</script>
<!-- Page heading -->
<div class="page-head">
    <h2 class="pull-left"><i class="fa fa-building-o"></i> Invoice Material</h2>
    <!-- Breadcrumb -->
    <div class="bread-crumb pull-right">
        <a href="index.html"><i class="fa fa-home"></i> Home</a> 
        <!-- Divider -->
        <span class="divider">/</span> 
        <a href="<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/index' ?>" class="bread-current">Invoice</a>
        <span class="divider">/</span> 
        <a href="#" class="bread-current">Tambah</a>
    </div>
    <div class="clearfix"></div>
</div>
<!-- Page heading ends -->

<div class="col-md-12">
    <div class="widget wgreen">
        <div class="widget-head">
            <div class="pull-left">Edit Invoice Material</div>
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
                    <form id="formInvoice" action="<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/newPO' ?>" method="post" class="form-horizontal" role="form">
                        <div class="form-group">
							<label class="col-lg-2 control-label">Main Project</label>
							<div class="col-lg-5">
								<select class="form-control" id="main_project" name="main_project" onchange="changeMainProject();" disabled>
								<option disabled selected> -- pilih main poject -- </option>
<?php foreach ($listMainProject as $i) {
$selected = '';
if($i[mMainProject::ID]==$Invoice[mMainProject::ID]) $selected = 'selected';
echo "<option ".$selected." value='" . $i[mMainProject::ID] . "'>" . $i[mMainProject::NAMA] . "</option>";
} ?>
								</select>
							</div>
						</div>
						<div class="form-group" id="sub_project_form">
							<label class="col-lg-2 control-label">Sub Project</label>
							<div class="col-lg-5">
								<select class="form-control" id="sub_project" name="sub_project" onchange="changeSubProject();" disabled>
									<option disabled selected> -- pilih sub poject -- </option>
<?php foreach ($listProject as $i) {
$selected = '';
if($i[mProject::ID]==$Invoice[mProject::ID]) $selected = 'selected';
echo "<option ".$selected." value='" . $i[mProject::ID] . "'>" . $i[mProject::NAMA] . "</option>";
} ?>
								</select>
							</div>
						</div>
						<div class="form-group" id="rab_form">
							<label class="col-lg-2 control-label">RAB</label>
							<div class="col-lg-5">
								<select class="form-control" id="rab" name="rab" onchange="changeRAB()" disabled>
									<option disabled selected> -- pilih RAB -- </option>
									<?php foreach ($listRAB as $i) {
$selected = '';
if($i[mRab::ID]==$Invoice[mRab::ID]) $selected = 'selected';
echo "<option ".$selected." value='" . $i[mRab::ID] . "'>" . $i[mRab::NAME] . "</option>";
} ?>
								</select>
							</div>
						</div>
						<div class="form-group" id="supplier_form">
                            <label class="col-lg-2 control-label">Supplier</label>
                            <div class="col-lg-5">
                                <select name="supplier" id="supplier" class="form-control" disabled>
                                    <option disabled selected> -- pilih Supplier -- </option>
									<?php foreach ($listSupplier as $i) {
$selected = '';
if($i[mSupplier::ID]==$Invoice[mSupplier::ID]) $selected = 'selected';
echo "<option ".$selected." value='" . $i[mSupplier::ID] . "'>" . $i[mSupplier::NAME] . "</option>";
} ?>
                                </select>
                            </div>
                        </div>
						<div class="form-group" id="top_form">
							<label class="col-lg-2 control-label">TOP</label>
							<div class="col-lg-5">
								<select name="top" id="top" class="form-control" disabled>
                                    <option disabled selected> -- pilih TOP -- </option>
									<?php foreach ($listTop as $i) {
$selected = '';
if($i[mTop::ID]==$Invoice[mTop::ID]) $selected = 'selected';
echo "<option ".$selected." value='" . $i[mTop::ID] . "'>" . $i[mTop::VALUE] . " | " . $i[mTop::KODE] . "</option>";
} ?>
                                </select>
							</div>
						</div>
                        <div class="barangBaru"></div>
                        <div class="form-group next">
                            <label class="col-lg-2 control-label"></label>
                            <div class="col-lg-10">
                                <button type="button" class="btn btn-sm btn-primary nextBtn" onclick="next()"><i class="fa fa-plus fa-fw"></i> Next</button>
                                <button type="button" class="pull-right btn btn-sm btn-primary addBtn" onclick="modalAddLPB()"><i class="fa fa-plus fa-fw"></i> Tambah</button>
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
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Kode LPB</th>
                                <th>Volume LPB</th>
                                <th>Harga</th>
								<th>Diskon</th>
								<th colspan="2">Pajak</th>
                                <th>Total</th>
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
	$("#top_form").hide();
	
	var tableBarang = null;
	var currentEdit;
	var flag = new Array();
	
	function changeLPB(){
		$('#pilihLPB').hide();
		var lpbVal = $('#select_lpb').val();
		var lpb = JSON.parse(lpbVal);
		var lpb_id = lpb['ID'];
		$('#pp_detail_kode').html(lpb['KODE']);
		$('#pp_detail_surat_jalan').html(lpb['SURAT_JALAN']);
		$('#pp_detail_kendaraan').html(lpb['KENDARAAN']);
		$('#pp_detail_tgl').html(lpb['TANGGAL']);
		$('#pp_detail_status').html(lpb['STATUS']);
		$('#pp_detail_supplier').html($("#supplier option:selected").text());
		if(tableBarang!=null) tableBarang.fnDestroy();
		tableBarang = $('#barang').dataTable( {
			"processing": true,
			"serverSide": true,
			"ajax": "<?php echo base_url(); ?>p-material/invoice/getViewBarang?lpb_id="+lpb_id,
			"createdRow": function ( row, data, index ) {
				if(index==0){
					console.log('tes');
					if(typeof (flag[lpb_id]) == "undefined"){					
						if(data[22] != null) {
							$('#pilihLPB').hide();
							flag[lpb_id] = false;
						} else {
							$('#pilihLPB').show();
							flag[lpb_id] = true;
						}
					} else if(flag[lpb_id] == false){
						$('#pilihLPB').hide();
					} else {
						$('#pilihLPB').show();
					}
				}
				var id;
				if(data[6]!=null) 
					id = data[6];
				else if(data[7]!=null) 
					id = data[7];
				else if(data[8]!=null) 
					id = data[8];
				else if(data[9]!=null) 
					id = data[9];
				//$('td', row).eq(6).html('<button id="ambilNilaiBtn_'+id+'_'+lpb_id+'" data-dismiss="modal" class="btn btn-xs takeButton" onclick="ambilNilai(\''+id+'_'+lpb_id+'\','+index+',\'barang\')"><i class="fa fa-check"></i> </button>');
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
        $('#formInvoice select').attr('disabled','disabled');
		$('#formInvoice input').attr('disabled','disabled');
        $(".nextBtn").hide();
		$("#top_form").show();
        var RAB_ID = $("#rab").val();
		var SUPPLIER_ID = $("#supplier").val();
        $.ajax({
            type: "POST",
            url: "<?= base_url() ?>p-material/invoice/getCurrentLPB",
            data: {RAB_ID: RAB_ID, SUPPLIER_ID: SUPPLIER_ID},
            success: function(data) {
                $(".addBtn").show();
                $(".saveForm").show();
                var val = JSON.parse(data);
				console.log(val);
                if (val.length > 0) {
					var toAppend = '<option disabled selected> -- pilih LPB -- </option>';
					for(var i=0;i<val.length;i++){
						toAppend += '<option value=\'{"ID": "' + val[i]['PENERIMAAN_BARANG_ID'] + '","KODE": "' + val[i]['PENERIMAAN_BARANG_KODE'] + '","STATUS" : "' + val[i]['STATUS_LPB_NAMA'] + '","SURAT_JALAN" : "' + val[i]['LPB_SURAT_JALAN'] + '","KENDARAAN" : "' + val[i]['LPB_KENDARAAN'] + '", "TANGGAL" : "' + val[i]['PENERIMAAN_BARANG_TANGGAL'] + '"}\' >'+val[i]['PENERIMAAN_BARANG_KODE']+'</option>';
					}
					$('#select_lpb').html(toAppend);
                }
            }
        });
    }
	
	$(document).ready(function() {
		var res = JSON.parse('<?= $detailInvoice; ?>');
		var item = '';
		var header = '';
		if (res.length > 0) {
			var jumlah = 0;
			var sub_total = 0;
			var lpb_id = -1;
			var lpb_kode = '';
			for (var i = 0; i < res.length; i++) {
				var num = i+1;
				lpb_id = res[i]["PENERIMAAN_BARANG_ID"];
				lpb_kode = res[i]["PENERIMAAN_BARANG_KODE"];
				if(header!=res[i]["PENERIMAAN_BARANG_KODE"]){
					if(header!=''){
						item += "<tr class='lpb_" + lpb_id + "' id='rowgroupsubtotal_" + lpb_id + "'>" +
								"<td id='rowgroupsubtotal_no_" + lpb_id + "'>&nbsp;</td>" +
								"<td style='display:none' id='rowgroupsubtotal_id_" + lpb_id + "'>" + lpb_id + "</td>" +
								"<td id='rowgroupsubtotal_kode_" + lpb_id + "' colspan='8' align='right'><b>SUB TOTAL</b></td>" +
								"<td id='rowgroupsubtotal_total_" + lpb_id + "'>" + sub_total.formatMoney(2) + "</td>" +
								"</tr>";
						sub_total = 0;
					}
					item += "<tr class='lpb_" + lpb_id + "' id='rowgroup_" + lpb_id + "'>" +
							"<td id='rowgroup_no_" + lpb_id + "'>" + num + "</td>" +
							"<td style='display:none' id='rowgroup_id_" + lpb_id + "'>" + lpb_id + "</td>" +
							"<td id='rowgroup_kode_" + lpb_id + "' colspan='8'>" + lpb_kode + "</td>" +
							"<td><button class='btn btn-xs btn-danger' onclick='dialogHapus(\"" + lpb_id + "\",\"" + lpb_kode + "\");'><i class='fa fa-times fa-fw'></i> Hapus</button></td>" +
							"</tr>";
					header = res[i]["PENERIMAAN_BARANG_KODE"];
				}
				var id = res[i]["VOLUME_LPB"];
				var harga_awal = parseFloat(res[i]["VOLUME_LPB"])*parseFloat(res[i]["ITEM_HARGA"]);
				var harga_after_diskon = harga_awal - parseFloat(res[i]["HARGA_DISKON"]);
				var harga_final = 0;
				if(parseFloat(res[i]["KATEGORI_PAJAK_ID"])==2){
					harga_final = harga_after_diskon + parseFloat(res[i]["HARGA_PAJAK"]);
				} else {
					harga_final = harga_after_diskon;
				}
				item += "<tr class='lpb_" + lpb_id + "' id='row_" + lpb_id + "'>" +
						"<td id='row_no_" + lpb_id + "'>&nbsp;</td>" +
						"<td id='row_kode_" + lpb_id + "'>" + res[i]["ITEM_KODE"] + "</td>" +
						"<td id='row_nama_" + lpb_id + "'>" + res[i]["ITEM_NAMA"] + "</td>" +
						"<td id='row_volpp_" + lpb_id + "'>" + res[i]["PENERIMAAN_BARANG_KODE"] + "</td>" +
						"<td id='row_volpp_" + lpb_id + "'>" + res[i]["VOLUME_LPB"] + "</td>" +
						"<td id='row_volpp_" + lpb_id + "'>" + parseFloat(res[i]["ITEM_HARGA"]).formatMoney(2) + "</td>" +
						"<td id='row_volpp_" + lpb_id + "'>" + parseFloat(res[i]["HARGA_DISKON"]).formatMoney(2) + "</td>" +
						"<td id='row_volpp_" + lpb_id + "'>" + res[i]["KATEGORI_PAJAK_NAMA"] + " " + res[i]["PAJAK_VALUE"] + "%</td>" +
						"<td id='row_volpp_" + lpb_id + "'>" + parseFloat(res[i]["HARGA_PAJAK"]).formatMoney(2) + "</td>" +
						"<td id='row_volpp_" + lpb_id + "'>" + harga_final.formatMoney(2) + "</td>" +
						"<td style='display: none' id='row_topid_" + lpb_id + "'>" + res[i]["TOP_ID"] + "</td>" +
						"<td style='display: none' id='row_topvalue_" + lpb_id + "'>" + res[i]["TOP_VALUE"] + "</td>" +
						"<td style='display: none' id='row_topkode_" + lpb_id + "'>" + res[i]["TOP_KODE"] + "</td>" +
						"</tr>";
						
				jumlah += harga_final;
				sub_total += harga_final;
				flag[id] = false;
			}
			item += "<tr class='lpb_" + lpb_id + "' id='rowgroupsubtotal_" + lpb_id + "'>" +
					"<td id='rowgroupsubtotal_no_" + lpb_id + "'>&nbsp;</td>" +
					"<td style='display:none' id='rowgroupsubtotal_id_" + lpb_id + "'>" + lpb_id + "</td>" +
					"<td id='rowgroupsubtotal_kode_" + lpb_id + "' colspan='8' align='right'><b>SUB TOTAL</b></td>" +
					"<td id='rowgroupsubtotal_total_" + lpb_id + "'>" + sub_total.formatMoney(2) + "</td>" +
					"</tr>";
			item += "<tr class='rowgrouptotal'>" +
					"<td>&nbsp;</td>" +
					"<td colspan='8' align='right'><b>TOTAL</b></td>" +
					"<td id='rowgrouptotal'>" + jumlah.formatMoney(2) + "</td>" +
					"</tr>";
		}
		$(".listBahan").append( item );
		next();
		getMinTop();
	});
	
	function ambilLPB(){
		data = $('#barang').dataTable().fnGetData();
		lpb_prop = JSON.parse($('#select_lpb').val());
		lpb_id = lpb_prop["ID"];
		var rowCount = $('.listBahan tr[id*=rowgroup_]:visible').length;
		var num = (rowCount+1);
		$(".listBahan").append(
			"<tr class='lpb_" + lpb_id + "' id='rowgroup_" + lpb_id + "'>" +
			"<td id='rowgroup_no_" + lpb_id + "'>" + num + "</td>" +
			"<td style='display:none' id='rowgroup_id_" + lpb_id + "'>" + lpb_id + "</td>" +
			"<td id='rowgroup_kode_" + lpb_id + "' colspan='8'>" + lpb_prop["KODE"] + "</td>" +
			"<td><button class='btn btn-xs btn-danger' onclick='dialogHapus(\"" + lpb_id + "\",\"" + lpb_prop["KODE"] + "\");'><i class='fa fa-times fa-fw'></i> Hapus</button></td>" +
			"</tr>"
			);
		var sub_total = 0;
		for(var i=0; i<data.length; i++){
			var id = data[i][6];
			var harga_awal = (parseFloat(data[i][5])*parseFloat(data[i][3]));
			var harga_after_diskon = harga_awal - parseFloat(data[i][20]);
			var harga_final = 0;
			if(parseFloat(data[i][18])==2){
				harga_final = harga_after_diskon + parseFloat(data[i][21]);
			} else {
				harga_final = harga_after_diskon;
			}
			$(".listBahan").append(
			"<tr class='lpb_" + lpb_id + "' id='row_" + id + "'>" +
			"<td id='row_no_" + id + "'>&nbsp;</td>" +
			"<td id='row_kode_" + id + "'>" + data[i][2] + "</td>" +
			"<td id='row_nama_" + id + "'>" + data[i][0] + "</td>" +
			"<td id='row_volpp_" + id + "'>" + data[i][11] + "</td>" +
			"<td id='row_volpp_" + id + "'>" + data[i][3] + "</td>" +
			"<td id='row_volpp_" + id + "'>" + parseFloat(data[i][5]).formatMoney(2) + "</td>" +
			"<td id='row_volpp_" + id + "'>" + parseFloat(data[i][20]).formatMoney(2) + "</td>" +
			"<td id='row_volpp_" + id + "'>" + data[i][19] + " " + data[i][17] + "%</td>" +
			"<td id='row_volpp_" + id + "'>" + parseFloat(data[i][21]).formatMoney(2) + "</td>" +
			"<td id='row_volpp_" + id + "'>" + harga_final.formatMoney(2) + "</td>" +
			"<td style='display: none' id='row_topid_" + id + "'>" + data[i][23] + "</td>" +
			"<td style='display: none' id='row_topvalue_" + id + "'>" + data[i][24] + "</td>" +
			"<td style='display: none' id='row_topkode_" + id + "'>" + data[i][25] + "</td>" +
			"</tr>"
			);
			sub_total += harga_final;
		}
		$(".listBahan").append(
			"<tr class='lpb_" + lpb_id + "' id='rowgroupsubtotal_" + lpb_id + "'>" +
			"<td id='rowgroupsubtotal_no_" + lpb_id + "'>&nbsp;</td>" +
			"<td style='display:none' id='rowgroupsubtotal_id_" + lpb_id + "'>" + lpb_id + "</td>" +
			"<td id='rowgroupsubtotal_kode_" + lpb_id + "' colspan='8' align='right'><b>SUB TOTAL</b></td>" +
			"<td id='rowgroupsubtotal_total_" + lpb_id + "'>" + sub_total.formatMoney(2) + "</td>" +
			"</tr>"
			);
		$('.rowgrouptotal').remove();
		$(".listBahan").append(
			"<tr class='rowgrouptotal'>" +
			"<td>&nbsp;</td>" +
			"<td colspan='8' align='right'><b>TOTAL</b></td>" +
			"<td id='rowgrouptotal'>" + updateTotal().formatMoney(2) + "</td>" +
			"</tr>"
			);
		flag[lpb_id] = false;
		getMinTop();
	}
	
	function modalAddLPB(){
		$('#modalPilihan').modal();
	}
    
    function save(param) {
		var lpb = [];
		var data = [];
		var lpbTotal = 0;
		$('tr[id*=rowgroup_]:visible').each(function() {
			var strid = $(this).attr('id');
			var id = strid.replace('rowgroup_','');
			var lpb_id = $('#rowgroup_id_'+id).html();
			var subtotal = $('#rowgroupsubtotal_total_'+id+' .number').html().formatFloat();
			lpbTotal += subtotal;
			lpb.push({LPB_ID: lpb_id, SUB_TOTAL_HARGA: subtotal});
		});
		var sup_id = $('#supplier').val();
		var top = $("#top").val();
		var lpbString = JSON.stringify(lpb);
		var rab_id = $("#rab").val();
		var add_btn = $('#add').clone();
		$('#add').remove();
		$('#btn_container').html("<img id='bar_loader' src='<?= base_url().'assets/default/img/bar_loader.gif' ?>'>");
		$.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>p-material/invoice/updateInvoice",
			data: {INVOICE_ID: <?= $Invoice['INVOICE_ID'] ?>, STATUS_INVOICE_ID: param, TOP_ID: top, INVOICE_TOTAL: lpbTotal, LPB: lpbString}, 
			cache: false,
			success: function(result){
				if(result=="success") {
					window.location="<?php echo base_url(); ?>p-material/invoice";
                }
				else {
					$('#bar_loader').remove();
					add_btn.appendTo("#btn_container");
				}
			}
		});
    }
    
    function dialogHapus(id, nama){
        $(".namaLPBHapus").text("Anda yakin untuk menghapus LPB "+nama+" ini?")
        $('#tobe_deleted_id').val(id);
        $("#deleteModal").modal();
    }
	
	function getMinTop(){
		var minTopId = 9999999;
		var minTopValue = 9999999;
		$('td[id*=row_topid_]').each(function() {
			var strid = $(this).attr('id');
			var id = strid.replace('row_topid_','');
			var top_val = parseFloat($('#row_topvalue_'+id).html());
			var top_id = parseFloat($('#row_topid_'+id).html());
			if(top_val < minTopValue){
				minTopId = top_id;
				minTopValue = top_val;
			}
		});
		$('#top').val(minTopId);
	}
    
    function deleteLPB(id){
        $(".lpb_" + id).remove();
		flag[id] = true;
		updateNomor();
		getMinTop();
        $("#deleteModal").modal("hide");
    }
	
	function updateNomor(){
		var rowCount = $('.listBahan tr[id*=rowgroup_]:visible').length;
		if(rowCount==0) {
			$('.rowgrouptotal').remove();
			$(".saveForm").hide();
		} else {
			$(".saveForm").show();
			$('.rowgrouptotal').remove();
			$(".listBahan").append(
				"<tr class='rowgrouptotal'>" +
				"<td>&nbsp;</td>" +
				"<td colspan='8' align='right'><b>TOTAL</b></td>" +
				"<td id='rowgrouptotal'>" + updateTotal().formatMoney(2) + "</td>" +
				"</tr>"
				);
		}
		var i = 1;
		$('td[id*=rowgroup_no]:visible').each(function() {
			$(this).html(i);
			i++;
		});
	}
	
	function updateTotal(){
		var total = 0;
		$('td[id*=rowgroupsubtotal_total_]:visible').each(function() {
			total += $('.number', this).html().formatFloat();
		});
		return total;
	}
</script>
<style>
	.detail_lpb{
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
                <h4 class="modal-title"><b>Daftar Barang LPB</b></h4>
            </div>
            <div class="modal-body">
                <div class="widget-content">
					<div style="width: 100%">
						<div class="col-lg-3">
							<div class="form-horizontal">
								<div class="form-group">
									<label class="col-lg-4 control-label">Pilih LPB</label>
									<div class="col-lg-8">
										<select class="form-control" name="select_lpb" id="select_lpb" onchange="changeLPB();">
											<option disabled selected> -- LPB kosong -- </option>
										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-9">
							<table class="table table-bordered centerTable">
								<tr>
								  <td width="100" class="detail_lpb"><b>Kode</b></td>
								  <td id="pp_detail_kode"></td>
								  <td width="100" class="detail_lpb"><b>Surat Jalan</b></td>
								  <td id="pp_detail_surat_jalan"></td>
								  <td width="100" class="detail_lpb"><b>No. Kendaraan</b></td>
								  <td id="pp_detail_kendaraan"></td>
								</tr>
								<tr>
								  <td class="detail_lpb"><b>Tanggal</b></td>
								  <td id="pp_detail_tgl"></td>
								  <td class="detail_lpb"><b>Status</b></td>
								  <td id="pp_detail_status"></td>
								  <td class="detail_lpb"><b>Supplier</b></td>
								  <td id="pp_detail_supplier"></td>
								</tr>
							</table>
						</div>
					</div>
					<div class="table-responsive">
						<table id="barang" class="display" cellspacing="0" width="100%"  style="margin-bottom: 10px; display:none">
							<thead>
								<tr>
									<th>Nama Barang</th>
									<th>Kode PO</th>
									<th>Kode Barang</th>
									<th>Volume LPB</th>
									<th>Satuan Barang</th>
									<th>Harga</th>
								</tr>
							</thead>
						</table>
						<div class="clearfix">
						</div>
					</div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" style="display: none" id="pilihLPB" onclick="ambilLPB()">Pilih</button>
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
                <h3 class="namaLPBHapus">Anda yakin untuk menghapus item ini?</h3>
                <input type="hidden" value="" name="tobe_deleted_id" id="tobe_deleted_id" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="deleteLPB($('#tobe_deleted_id').val());">Ya</button>
                <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Tidak</button>
            </div>
        </div>
    </div>
</div>