<script>
	$(document).ready(function() {
		var status = <?= $Invoice['VALIDATION_ID'] ?>;
		if(status==1 || status==4){
			$("#btnAdmin").show();
			$("#btnValidator").hide();
		} else if(status==2 || status==5){
			$("#btnValidator").show();
			$("#btnAdmin").hide();
		} else {
			$("#btnAdmin").hide();
			$("#btnValidator").hide();
		}
			
		var res = JSON.parse('<?= $detailInvoice; ?>');
		var item = '';
		var header = '';
		if (res.length > 0) {
			var jumlah = 0;
			var sub_total = 0;
			for (var i = 0; i < res.length; i++) {
				if(header!=res[i]["PENERIMAAN_BARANG_KODE"]){
					if(header!=''){
						item += '<tr class="item_invoice_detail"><td>&nbsp;</td><td colspan="8" align="right"><b>SUB TOTAL</b></td><td align="right">' + sub_total.formatMoney(2) + '</td></tr>';
						sub_total = 0;
					}
					item += '<tr class="item_invoice_detail"><td>&nbsp;</td><td colspan="9"><a class="btn btn-primary btn-xs" target="_blank" href="<?= base_url() ?>p-material/lpb/viewDetail/' + res[i]["PENERIMAAN_BARANG_ID"] + '"><i class="fa fa-search fa-fw"></i></a> ' + res[i]["PENERIMAAN_BARANG_KODE"] + '</td></tr>';
					header = res[i]["PENERIMAAN_BARANG_KODE"];
				}
				var harga_awal = parseFloat(res[i]["VOLUME_LPB"])*parseFloat(res[i]["ITEM_HARGA"]);
				var harga_after_diskon = harga_awal - parseFloat(res[i]["HARGA_DISKON"]);
				var harga_final = 0;
				if(parseFloat(res[i]["KATEGORI_PAJAK_ID"])==2){
					harga_final = harga_after_diskon + parseFloat(res[i]["HARGA_PAJAK"]);
				} else {
					harga_final = harga_after_diskon;
				}
				item += '<tr class="item_invoice_detail"><td>' + (i+1) + '</td><td>' + res[i]["ITEM_KODE"] + '</td><td>' + res[i]["ITEM_NAMA"] + '</td><td>' + res[i]["PENERIMAAN_BARANG_KODE"] + '</td><td>' + res[i]["VOLUME_LPB"] + '</td><td align="right">' + (parseFloat(res[i]["ITEM_HARGA"])).formatMoney(2) + '</td><td align="right">' + (parseFloat(res[i]["HARGA_DISKON"])).formatMoney(2) + '</td><td align="right">' + res[i]["KATEGORI_PAJAK_NAMA"] + ' ' + res[i]["PAJAK_VALUE"] + '%</td><td align="right">' + (parseFloat(res[i]["HARGA_PAJAK"])).formatMoney(2) + '</td><td align="right">' + harga_final.formatMoney(2) + '</td></tr>';
				jumlah += harga_final;
				sub_total += harga_final;
			}
			item += '<tr class="item_invoice_detail"><td>&nbsp;</td><td colspan="8" align="right"><b>SUB TOTAL</b></td><td align="right">' + sub_total.formatMoney(2) + '</td></tr>';
			item += '<tr class="item_invoice_detail"><td colspan="9"style="background-color: #167CAC;"><b style="color: #FFF">JUMLAH INVOICE</b></td><td align="right">'+(jumlah).formatMoney(2)+'</td></tr>';
		}
		$("#form_invoice #detail_invoice").html(item);
	} );
	
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
					$("#form_validasi").submit();
				}
			}
		});
	 }
	 
	function validasiInvoice(val) {
		var id = <?= $Invoice['INVOICE_ID'] ?>;
		$("#form_validasi #tobe_validated_id").val(id);
		$("#form_validasi #tobe_validated_val").val(val);
		$("#validateModal").modal();
	}
	
	function saveForValidated(){
		var id = <?= $Invoice['INVOICE_ID'] ?>;
		$("#form_simpan_validasi #tobe_simpan_validasi_id").val(id);
		$("#form_simpan_validasi").submit();
	}
	
	function editInvoice(){
		var id = <?= $Invoice['INVOICE_ID'] ?>;
		$("#id_to_edit").val(id);
		$("#form_edit").submit();
	}
        function confirmDelete(){
                var id = <?= $Invoice['INVOICE_ID'] ?>;
                
		$("#tobe_deleted_id").val(id);
		$("#deleteModal").modal();
	}
        
        function deleteInv(){
		$("#deleteModal").modal("hide");
		$("#form_delete").submit();
	}
</script>
<style>
	table{
	
	}
	.centerTable th{
		text-align: center;
		background-color: #0993D3;
		color: #FFFFFF;
		height: 30px;
		font-size: 12px;
	}
	.ket_invoice{
		background-color: #EEEEEE;
	}
	th, td {
		white-space: nowrap; 
	}
</style>
<!-- Page heading -->
<div class="page-head">
    <h2 class="pull-left"><i class="fa fa-home"></i> Invoice</h2>
    <!-- Breadcrumb -->
    <div class="bread-crumb pull-right">
        <a href="index.html"><i class="fa fa-home"></i> Home</a> 
        <!-- Divider -->
        <span class="divider">/</span> 
        <a href="#" class="bread-current">Invoice</a>
    </div>
    <div class="clearfix"></div>
</div>
<!-- Page heading ends -->

<div id="validateModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title">Konfirmasi validasi Invoice</h4>
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
				<button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Batal</button>
			</div>
		</div>
	</div>
</div>

<form style="display: none" id="form_edit" action="<?php echo base_url(); ?>p-material/invoice/edit" method="POST">
	<input type="hidden" value="" id="id_to_edit" name="id_to_edit" />
</form>

<form method="POST" action="<?php echo base_url(); ?>p-material/po/delete" id="form_delete">
	<input type="hidden" value="" name="tobe_deleted_id" id="tobe_deleted_id" />
</form>

<form method="POST" action="<?php echo base_url(); ?>p-material/invoice/validate" id="form_validasi">
	<input type="hidden" value="" name="tobe_validated_id" id="tobe_validated_id" />
	<input type="hidden" value="" id="tobe_validated_val" name="tobe_validated_val" />
</form>

<form method="POST" action="<?php echo base_url(); ?>p-material/invoice/savetovalidate" id="form_simpan_validasi">
	<input type="hidden" value="" name="tobe_simpan_validasi_id" id="tobe_simpan_validasi_id" />
</form>

<div id="deleteModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
  <div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	<h4 class="modal-title">Konfirmasi penghapusan item Invoice</h4>
  </div>
  <div class="modal-body">
	<h3>Anda yakin untuk menghapus item ini?</h3>
  </div>
  <div class="modal-footer">
	<button type="button" class="btn btn-primary" onclick="deleteInv();">Ya</button>
	<button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Tidak</button>
  </div>
</div>
</div>
</div>    

<div class="matter">
    <div class="container">
        <div class="row">
			<div class="col-md-12">
				<div class="widget wgreen">
					<div class="widget-head">
						<div class="pull-left">
							Detail Invoice
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
							<div>
								<a target="_blank" href="<?= base_url(); ?>p-material/invoice/printExcel/<?= $Invoice['INVOICE_ID'] ?>"><img src="<?= base_url(); ?>assets/default/img/icons/excel.png" class="icons" title="Export to XLS" /></a>
								<img onclick="exportModal('doc');" src="<?= base_url(); ?>assets/default/img/icons/word.png" class="icons" title="Export to DOC" />
								<a target="_blank" href="<?= base_url(); ?>p-material/invoice/printPDF/<?= $Invoice['INVOICE_ID'] ?>"><img src="<?= base_url(); ?>assets/default/img/icons/pdf.png" class="icons" title="Export to PDF" /></a>
							</div>
							<div id="form_invoice" style="margin-top: 20px; margin-bottom: 20px; overflow-x: auto" >
								<table class="table table-bordered centerTable">
									  <thead>
										<tr class="label-info">
										  <th colspan="6">Keterangan Invoice</th>
										</tr>
									  </thead>
									  <tbody>
										<tr>
										  <td width="100" class="ket_invoice"><b>Kode</b></td>
										  <td><?= $Invoice['INVOICE_KODE']; ?></td>
										  <td width="100" class="ket_invoice"><b>RAB Kode</b></td>
										  <td><a class="btn btn-primary btn-xs" target="_blank" href="<?= base_url() ?>rab/rabs/viewDetail/<?= $Invoice['RAB_ID'] ?>"><i class="fa fa-search fa-fw"></i></a> <?= $Invoice['RAB_KODE']; ?></td>
										  <td width="100" class="ket_invoice"><b>RAB Nama</b></td>
										  <td><?= $Invoice['RAB_NAMA']; ?></td>
										</tr>
										<tr>
										  <td class="ket_invoice"><b>Status Invoice</b></td>
										  <td><?= $Invoice['STATUS_VALIDASI_NAMA']; ?></td>
										  <td class="ket_invoice"><b>Tanggal</b></td>
										  <td><?= $Invoice['TANGGAL_TRANSAKSI']; ?></td>
										  <td class="ket_invoice"><b>Drafter</b></td>
										  <td><?= $Invoice['DRAFTER_NAMA']; ?></td>
										</tr>
										<tr>
										  <td class="ket_invoice"><b>TOP</b></td>
										  <td><?= $Invoice['TOP_DESCRIPTION']; ?></td>
										  <td class="ket_invoice"><b>Supplier</b></td>
										  <td><?= $Invoice['SUPPLIER_NAMA']; ?></td>
										  <td class="ket_invoice"><b>Total</b></td>
										  <td><script> document.write((<?= $Invoice['TOTAL_HARGA_INVOICE']; ?>).formatMoney(2)); </script></td>
										</tr>
									  </tbody>
								</table>
								<table class="table table-striped table-bordered table-hover centerTable" style="margin-top: 20px">
								  <thead>
									<tr class="label-info">
									  <th colspan="10">Detail Transaksi Invoice</th>
									</tr>
									<tr class="label-info">
										<th>No </th>
										<th>Kode Barang</th>
										<th>Nama Barang</th>
										<th>Kode LPB</th>
										<th>Volume LPB</th>
										<th>Harga Barang</th>
										<th>Diskon</th>
										<th colspan="2">Pajak</th>
										<th>Total</th>
									</tr>
								  </thead>
								  <tbody id="detail_invoice">
									
								  </tbody>
								</table>
								<div class="clearfix">
									<br />
								</div>
								<div style="width: 100%;" ng-if="displayField(['invoice_admin'])" align="center"><div id="btnAdmin"><button id="edit" class="btn btn-primary btn-lg" onclick="editInvoice()">Edit</button><button id="delete" class="btn btn-success btn-lg" onclick="saveForValidated()">Simpan untuk validasi</button><button id="delete" class="btn btn-danger btn-lg" onclick="confirmDelete()">Hapus</button></div></div>
								<div style="width: 100%" ng-if="displayField(['invoice_validator'])" align="center"><div id="btnValidator"><button id="validasi" class="btn btn-success btn-lg" onclick="validasiInvoice(3)">Validasi</button><button id="delete" class="btn btn-danger btn-lg" onclick="validasiInvoice(4)">Tolak</button></div></div>
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
