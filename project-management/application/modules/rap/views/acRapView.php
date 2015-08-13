<script>
	$(document).ready(function() {
		var res = <?= $detail; ?>;
		var res_barang = res["detail_barang"];
		//var res_upah = res["detail_upah"];
		var res_upah = res["detail_analisa_upah"];
		var subcon = res["subcon"];
		var item = '';
		var jumlah = 0;
		var sub_jumlah = 0;
		if (res_barang.length > 0) {
			item += '<tr class="item_rap_detail"><td colspan="6"><b>BARANG / BAHAN</b></td></tr>';
			for (var i = 0; i < res_barang.length; i++) {
				var nama = res_barang[i]["BARANG_NAMA"];
				var kode = res_barang[i]["BARANG_KODE"];
				var volume = parseFloat(res_barang[i]["BARANG_VOLUME"]) || 0;
				var satuan = res_barang[i]["SATUAN_NAMA"];
				var harga = parseFloat(res_barang[i]["DETAIL_ANALISA_HARGA"]) || 0;
				var sub_total = harga*volume;
				item += '<tr class="item_rap_detail"><td>' + nama + '</td><td>' + kode + '</td><td>' + volume + '</td><td>' + satuan + '</td><td align="right">' + harga.formatMoney(2) + '</td><td align="right">' + sub_total.formatMoney(2) + '</span></td></tr>';
				jumlah += sub_total;
				sub_jumlah += sub_total;
			}
			if(subcon.length>0){
				for(var i=0; i<subcon.length; i++){
					if(parseFloat(subcon[i]["SUBCON_TIPE_ID"]) == 2){
						item += '<tr class="item_rap_detail"><td>'+subcon[i]["SUBCON_NAMA"]+'</td><td>'+subcon[i]["SUBCON_TIPE_KODE"]+'</td><td>'+subcon[i]["DETAIL_PEKERJAAN_VOLUME"]+'</td><td>'+subcon[i]["SATUAN_NAMA"]+'</td><td align="right">'+(parseFloat(subcon[i]["SUBCON_HARGA"])).formatMoney(2)+'</td><td align="right">'+(parseFloat(subcon[i]["SUBCON_HARGA"])*parseFloat(subcon[i]["DETAIL_PEKERJAAN_VOLUME"])).formatMoney(2)+'</td></tr>';
						var sub_total = (parseFloat(subcon[i]["SUBCON_HARGA"])*parseFloat(subcon[i]["DETAIL_PEKERJAAN_VOLUME"]));
						jumlah += sub_total;
						sub_jumlah += sub_total;
					}
				}
			}
			item += '<tr class="item_rap_detail"><td colspan="5" align="right"><b>JUMLAH SUBTOTAL</b></td><td align="right">' + (sub_jumlah).formatMoney(2) + '</td></tr>';
			sub_jumlah = 0;
		}
		/*if(res_upah.length>0){
			item += '<tr class="item_rap_detail"><td colspan="6"><b>UPAH</b></td></tr>';
			for(var i=0; i<res_upah.length; i++){
				item += '<tr class="item_rap_detail"><td>'+res_upah[i]["UPAH_NAMA"]+'</td><td>'+res_upah[i]["UPAH_KODE"]+'</td><td>'+res_upah[i]["UPAH_VOLUME"]+'</td><td>'+res_upah[i]["SATUAN_UPAH_NAMA"]+'</td><td align="right"><span class="currency">Rp</span><span class="number">'+(parseFloat(res_upah[i]["UPAH_HARGA"])).formatMoney(2)+'</span></td><td align="right"><span class="currency">Rp</span><span class="number">'+(parseFloat(res_upah[i]["UPAH_HARGA"])*parseFloat(res_upah[i]["UPAH_VOLUME"])).formatMoney(2)+'</span></td></tr>';
				jumlah += (parseFloat(res_upah[i]["UPAH_HARGA"])*parseFloat(res_upah[i]["UPAH_VOLUME"]));
				sub_jumlah += (parseFloat(res_upah[i]["UPAH_HARGA"])*parseFloat(res_upah[i]["UPAH_VOLUME"]));
			}
			item += '<tr class="item_rap_detail"><td colspan="5" align="right"><b>JUMLAH SUBTOTAL</b></td><td align="right"><span class="currency">Rp</span><span class="number">' + (sub_jumlah).formatMoney(2) + '</span></td></tr>';
			sub_jumlah = 0;
		}*/
		if(res_upah.length > 0){
			item += '<tr class="item_rap_detail"><td colspan="6"><b>UPAH ANALISA</b></td></tr>';
			for(var i=0; i<res_upah.length; i++){
				var nama = res_upah[i]["ANALISA_NAMA"];
				var kode = res_upah[i]["ANALISA_KODE"];
				var volume = parseFloat(res_upah[i]["UPAH_ANALISA_VOLUME"]) || 0;
				var satuan = res_upah[i]["SATUAN_NAMA"];
				var harga = parseFloat(res_upah[i]["UPAH_ANALISA_TOTAL"]) || 0;
				var sub_total = harga*volume;
				item += '<tr class="item_rap_detail"><td>'+nama+'</td><td>'+kode+'</td><td>'+volume+'</td><td>'+satuan+'</td><td align="right">'+harga.formatMoney(2)+'</td><td align="right">'+sub_total.formatMoney(2)+'</td></tr>';
				jumlah += sub_total;
				sub_jumlah += sub_total;
			}
			if(subcon.length>0){
				for(var i=0; i<subcon.length; i++){
					if(parseFloat(subcon[i]["SUBCON_TIPE_ID"]) == 3){
						item += '<tr class="item_rap_detail"><td>'+subcon[i]["SUBCON_NAMA"]+'</td><td>'+subcon[i]["SUBCON_TIPE_KODE"]+'</td><td>'+subcon[i]["DETAIL_PEKERJAAN_VOLUME"]+'</td><td>'+subcon[i]["SATUAN_UPAH_NAMA"]+'</td><td align="right">'+(parseFloat(subcon[i]["SUBCON_HARGA"])).formatMoney(2)+'</td><td align="right">'+(parseFloat(subcon[i]["SUBCON_HARGA"])*parseFloat(subcon[i]["DETAIL_PEKERJAAN_VOLUME"])).formatMoney(2)+'</td></tr>';
						var sub_total = (parseFloat(subcon[i]["SUBCON_HARGA"])*parseFloat(subcon[i]["DETAIL_PEKERJAAN_VOLUME"]));
						jumlah += sub_total;
						sub_jumlah += sub_total;
					}
				}
			}			
			item += '<tr class="item_rap_detail"><td colspan="5" align="right"><b>JUMLAH SUBTOTAL</b></td><td align="right">' + (sub_jumlah).formatMoney(2) + '</td></tr>';
			sub_jumlah = 0;
		}
		if(subcon.length>0){
			item += '<tr class="item_rap_detail"><td colspan="6"><b>SUBCON</b></td></tr>';
			for(var i=0; i<subcon.length; i++){
				if(parseFloat(subcon[i]["SUBCON_TIPE_ID"]) == 1){
					item += '<tr class="item_rap_detail"><td>'+subcon[i]["SUBCON_NAMA"]+'</td><td>'+subcon[i]["SUBCON_TIPE_KODE"]+'</td><td>'+subcon[i]["DETAIL_PEKERJAAN_VOLUME"]+'</td><td>'+subcon[i]["SATUAN_NAMA"]+'</td><td align="right">'+(parseFloat(subcon[i]["SUBCON_HARGA"])).formatMoney(2)+'</td><td align="right">'+(parseFloat(subcon[i]["SUBCON_HARGA"])*parseFloat(subcon[i]["DETAIL_PEKERJAAN_VOLUME"])).formatMoney(2)+'</td></tr>';
					var sub_total = (parseFloat(subcon[i]["SUBCON_HARGA"])*parseFloat(subcon[i]["DETAIL_PEKERJAAN_VOLUME"]));
					jumlah += sub_total;
					sub_jumlah += sub_total;
				}
			}
			item += '<tr class="item_rap_detail"><td colspan="5" align="right"><b>JUMLAH SUBTOTAL</b></td><td align="right">' + (sub_jumlah).formatMoney(2) + '</td></tr>';
			sub_jumlah = 0;
		}
		item += '<tr class="item_rab_detail"><td colspan="5" style="background-color: #167CAC;"><b style="color: #FFF">JUMLAH TOTAL</b></td><td align="right" style="background-color: #167CAC; color: #FFF">' + (jumlah).formatMoney(2) + '</td></tr>';
		item += '<tr class="item_rab_pekerjaan"><td colspan="5" style="background-color: #167CAC;"><b style="color: #FFF">OVERHEAD (5 %)</b></td><td align="right" style="background-color: #167CAC; color: #FFF">' + (0.05*jumlah).formatMoney(2) + '</td></tr>';
		item += '<tr class="item_rab_pekerjaan"><td colspan="5" style="background-color: #167CAC;"><b style="color: #FFF">TOTAL SETELAH OVERHEAD</b></td><td align="right" style="background-color: #167CAC; color: #FFF">' + (1.05*jumlah).formatMoney(2) + '</td></tr>';
		$("#form_rap #detail_rap").html(item);
	} );
</script>
<style>
	table{
	
	}
	.centerTable th{
		text-align: center;
		background-color: #0993D3;
		color: #FFFFFF;
		height: 30px;
		font-size: 15px;
	}
	.currency{
		margin-right: 10px;
		display: inline-block;
	}
	.number{
		display: inline-block;  
		text-align: right;
	}
</style>
<!-- Page heading -->
<div class="page-head">
    <h2 class="pull-left"><i class="fa fa-home"></i> RAP</h2>
    <!-- Breadcrumb -->
    <div class="bread-crumb pull-right">
        <a href="index.html"><i class="fa fa-home"></i> Home</a> 
        <!-- Divider -->
        <span class="divider">/</span> 
        <a href="#" class="bread-current">RAP</a>
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
							Detail RAP
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
							<div id="form_rap" style="margin-top: 20px; margin-bottom: 20px">
								<table class="table table-striped table-bordered table-hover centerTable">
								  <thead>
									<tr class="label-info">
									  <th>Nama</th>
									  <th>Kode</th>
									  <th>Volume</th>
									  <th>Satuan</th>
									  <th>Harga</th>
									  <th>Total</th>
									</tr>
								  </thead>
								  <tbody id="detail_rap">
									
								  </tbody>
								</table>
								<div class="clearfix">
									<br />
								</div>
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
