<script>
    
	$(document).ready(function() {
		var status = <?= $PO[mPo::STATUS] ?>;
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
			
		var res = JSON.parse('<?= $detailPO; ?>');
		var item = '';
		if (res.length > 0) {
			var jumlah = 0;
			for (var i = 0; i < res.length; i++) {
				var harga_awal = parseFloat(res[i]["HARGA_AWAL"]);
				var harga_net = parseFloat(res[i]["HARGA_NET"]);
				var harga_final = parseFloat(res[i]["HARGA_FINAL"]);	
				var diskon = parseFloat(res[i]["HARGA_DISKON"]);
				jumlah += harga_final;
				item += '<tr class="item_po_detail"><td>' + res[i]["BARANG_NAMA"] + '</td><td>' + res[i]["BARANG_KODE"] + '</td><td><a class="btn btn-primary btn-xs" target="_blank" href="<?= base_url() ?>p-material/pp/viewDetail/'+res[i]["PP_ID"]+'_<?= $PO['RAB_ID'] ?>"><i class="fa fa-search fa-fw"></i></a> ' + res[i]["PP_KODE"] + '</td><td>' + res[i]["VOLUME_PO"] + '</td><td align="right">' + (parseFloat(res[i]["HARGA_MATERI_PO"])).formatMoney(2) + '</td><td align="right">' + harga_net.formatMoney(2) + '</td><td align="right">' + diskon.formatMoney(2) + '</td><td align="right">' + (parseFloat(res[i]["HARGA_PAJAK"])).formatMoney(2) + '</td><td align="right">' + harga_final.formatMoney(2) + '</td></tr>';
			}
			item += '<tr class="item_po_detail"><td colspan="8"style="background-color: #167CAC;"><b style="color: #FFF">JUMLAH PURCHASE ORDER</b></td><td align="right">'+(jumlah).formatMoney(2)+'</td></tr>';
		}
		$("#form_po #detail_po").html(item);
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
	 
	function validasiPO(val) {
		var id = <?= $PO['PURCHASE_ORDER_ID'] ?>;
		$("#form_validasi #tobe_validated_id").val(id);
		$("#form_validasi #tobe_validated_val").val(val);
		$("#validateModal").modal();
	}
	
	function saveForValidated(){
		var id = <?= $PO['PURCHASE_ORDER_ID'] ?>;
		$("#form_simpan_validasi #tobe_simpan_validasi_id").val(id);
		$("#form_simpan_validasi").submit();
	}
	
	function editPO(){
		var id = <?= $PO['PURCHASE_ORDER_ID'] ?>;
		var tipe = <?= $PO['KATEGORI_PP_ID'] ?>;
		$("#id_to_edit").val(id);
		$("#type_to_edit").val(tipe);
		$("#form_edit").submit();
	}
        
        function confirmDelete(){
                var id = <?= $PO['PURCHASE_ORDER_ID'] ?>;
                
		$("#tobe_deleted_id").val(id);
		$("#deleteModal").modal();
	}
        
        function deletePO(){
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
	.ket_po{
		background-color: #EEEEEE;
	}
	
	th, td {
		white-space: nowrap; 
	}
</style>
<!-- Page heading -->
<div class="page-head">
    <h2 class="pull-left"><i class="fa fa-home"></i> PO</h2>
    <!-- Breadcrumb -->
    <div class="bread-crumb pull-right">
        <a href="<?= base_url().'p-material/po'?>"><i class="fa fa-home"></i> Home</a> 
        <!-- Divider -->
        <span class="divider">/</span> 
        <a href="#" class="bread-current">PO</a>
    </div>
    <div class="clearfix"></div>
</div>
<!-- Page heading ends -->

<div id="validateModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title">Konfirmasi validasi PO</h4>
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

<form style="display: none" id="form_edit" action="<?php echo base_url(); ?>p-material/po/edit" method="POST">
	<input type="hidden" value="" id="id_to_edit" name="id_to_edit" />
	<input type="hidden" value="" id="type_to_edit" name="type_to_edit" />
</form>

<form method="POST" action="<?php echo base_url(); ?>p-material/po/validate" id="form_validasi">
	<input type="hidden" value="" name="tobe_validated_id" id="tobe_validated_id" />
	<input type="hidden" value="" id="tobe_validated_val" name="tobe_validated_val" />
</form>

<form method="POST" action="<?php echo base_url(); ?>p-material/po/delete" id="form_delete">
	<input type="hidden" value="" name="tobe_deleted_id" id="tobe_deleted_id" />
</form>

<form method="POST" action="<?php echo base_url(); ?>p-material/po/savetovalidate" id="form_simpan_validasi">
	<input type="hidden" value="" name="tobe_simpan_validasi_id" id="tobe_simpan_validasi_id" />
</form>

<div id="deleteModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
  <div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	<h4 class="modal-title">Konfirmasi penghapusan item Purchase order</h4>
  </div>
  <div class="modal-body">
	<h3>Anda yakin untuk menghapus item ini?</h3>
  </div>
  <div class="modal-footer">
	<button type="button" class="btn btn-primary" onclick="deletePO();">Ya</button>
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
							Detail Purchase Order
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
								<a target="_blank" href="<?= base_url(); ?>p-material/po/printExcel/<?= $PO['PURCHASE_ORDER_ID'] ?>/<?= $PO['KATEGORI_PP_ID'] ?>"><img src="<?= base_url(); ?>assets/default/img/icons/excel.png" class="icons" title="Export to XLS" /></a>
								<img onclick="exportModal('doc');" src="<?= base_url(); ?>assets/default/img/icons/word.png" class="icons" title="Export to DOC" />
								<a target="_blank" href="<?= base_url(); ?>p-material/po/printPDF/<?= $PO['PURCHASE_ORDER_ID'] ?>/<?= $PO['KATEGORI_PP_ID'] ?>"><img src="<?= base_url(); ?>assets/default/img/icons/pdf.png" class="icons" title="Export to PDF" /></a>
							</div>
							<div id="form_po" style="margin-top: 20px; margin-bottom: 20px; overflow-x: auto" >
								<table class="table table-bordered centerTable">
									  <thead>
										<tr class="label-info">
										  <th colspan="6">Keterangan Purchase Order</th>
										</tr>
									  </thead>
									  <tbody>
										<tr>
										  <td width="100" class="ket_po"><b>Kode</b></td>
										  <td><?= $PO['PURCHASE_ORDER_KODE']; ?></td>
										  <td width="100" class="ket_po"><b>RAB Kode</b></td>
										  <td><a class="btn btn-primary btn-xs" target="_blank" href="<?= base_url() ?>rab/rabs/viewDetail/<?= $PO['RAB_ID'] ?>"><i class="fa fa-search fa-fw"></i></a> <?= $PO['RAB_KODE']; ?></td>
										  <td width="100" class="ket_po"><b>RAB Nama</b></td>
										  <td><?= $PO['RAB_NAMA']; ?></td>
										</tr>
										<tr>
										  <td class="ket_po"><b>Status PO</b></td>
										  <td><?= $PO['STATUS_PO_NAMA']; ?></td>
										  <td class="ket_po"><b>Kategori</b></td>
										  <td><?= $PO['KATEGORI_PP_NAMA']; ?></td>
										  <td class="ket_po"><b>Pajak</b></td>
										  <td><?= $PO['KATEGORI_PAJAK_NAMA']; ?>
										  <?php if($PO['KATEGORI_PAJAK_NAMA']!="No Tax") echo "(".$PO['PAJAK_NAMA']." ".$PO['PAJAK_VALUE']."% )"; ?>
										  </td>
										</tr>
										<tr>
										  <td class="ket_po"><b>TOP</b></td>
										  <td><?= $PO['TOP_KODE']; ?></td>
										  <td class="ket_po"><b>Supplier</b></td>
										  <td><?= $PO['SUPPLIER_NAMA']; ?></td>
										  <td class="ket_po"><b>Gudang</b></td>
										  <td><?= $PO['GUDANG_NAMA']; ?></td>
										</tr>
										<tr>
										  <td class="ket_po"><b>Alamat Kirim</b></td>
										  <td><?= $PO['ALAMAT_PENGIRIMAN']; ?></td>
										  <td class="ket_po"><b>Nama CP</b></td>
										  <td><?= $PO['NAMA_CP']; ?></td>
										  <td class="ket_po"><b>Telp CP</b></td>
										  <td><?= $PO['TELP_CP']; ?></td>
										</tr>
									  </tbody>
								</table>
								<table class="table table-striped table-bordered table-hover centerTable" style="margin-top: 20px">
								  <thead>
									<tr class="label-info">
									  <th colspan="9">Detail Transaksi Purchase Order</th>
									</tr>
									<tr class="label-info">
										<th>Nama Material</th>
										<th>Kode Material</th>
										<th>Kode PP</th>
										<th>Vol. PO</th>
										<th>Harga satuan</th>
										<th>Harga net</th>
										<th>Diskon</th>
										<th>Pajak</th>
										<th>Harga final</th>
									</tr>
								  </thead>
								  <tbody id="detail_po">
									
								  </tbody>
								</table>
								<div class="clearfix">
									<br />
								</div>
								<div style="width: 100%;" ng-if="displayField(['po_admin'])" align="center"><div id="btnAdmin"><button id="edit" class="btn btn-primary btn-lg" onclick="editPO()">Edit</button><button id="delete" class="btn btn-success btn-lg" onclick="saveForValidated()">Simpan untuk validasi</button><button id="delete" class="btn btn-danger btn-lg" onclick="confirmDelete()">Hapus</button></div></div>
								<div style="width: 100%" ng-if="displayField(['po_validator'])" align="center"><div id="btnValidator"><button id="validasi" class="btn btn-success btn-lg" onclick="validasiPO(3)">Validasi</button><button id="delete" class="btn btn-danger btn-lg" onclick="validasiPO(4)">Tolak</button></div></div>
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
