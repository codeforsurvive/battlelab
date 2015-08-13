<script type="text/php">
	if ( isset($pdf) ) {

	  // Open the object: all drawing commands will
	  // go to the object instead of the current page
	  $footer = $pdf->open_object();

	  $w = $pdf->get_width();
	  $h = $pdf->get_height();

	  // Draw a line along the bottom
	  $y = $h - 2 * $text_height - 24;
	  $pdf->line(36, $y, $w - 36, $y, $color, 1);
	  
	  $pdf->page_text($w - 140, $y + 5, "Halaman {PAGE_NUM} dari {PAGE_COUNT}", $font, 12, array(0,0,0));
	  $pdf->page_text($w - 220, 18, date("H:i:s d/m/Y")." dari AddPro", $font, 12, array(0,0,0));
	  $img_w = 996; // 2 inches, in points
	  $img_h = 573; // 1 inch, in points -- change these as required
	  $pdf->image(base_url()."/assets/default/addprologotrans.png", "png", 20, $w, $img_h, $img_w);

	  // Close the object (stop capture)
	  $pdf->close_object();

	  // Add the object to every page. You can
	  // also specify "odd" or "even"
	  $pdf->add_object($footer, "all");
	}
</script>
<?php
	function toMoney($num){
		return 'Rp '.number_format( floatval($num), 0 , '' , '.' ).',00';
	}
	
	// defined style
	$header_po = "style='background-color: #EEEEEE; width: 80px; word-wrap:break-word;'";
	$content_po = "style='width: 100px; word-wrap:break-word;'";
	$header_keterangan = "style='text-align: center; background-color: #0993D3; color: #FFFFFF; height: 20px; font-size: 18px;'";
?>
<style>
	@page { margin: 70px 50px; }
	body,h2,h3 {
		font-family: 'dotmatri';
	}
	body {
		font-size: 15px;
	}
	table.equalDevide tr td { width: 50%; }
</style>
<div style="width: 100%" align="center"><h2><b>PURCHASE ORDER</b></h2></div>
<table class="table table-bordered centerTable">
<thead>
<tr class="label-info">
  <th colspan="6" <?= $header_keterangan ?>>Keterangan Purchase Order</th>
</tr>
</thead>
<tbody>
<tr>
  <td <?= $content_po ?> colspan="3">
	<?php 
		echo $perusahaan['PERUSAHAAN_NAMA'].'<br/>'.$perusahaan['PERUSAHAAN_ALAMAT'].'<br/>Telp. '.$perusahaan['PERUSAHAAN_TELP'].' | Email: '.$perusahaan['PERUSAHAAN_EMAIL']; 
	?>
  </td>
  <td <?= $content_po ?> colspan="3">
	<?php 
		echo 'Kepada:<br/>'.$PO['SUPPLIER_NAMA'].'<br/>'.$PO['SUPPLIER_ALAMAT']; 
	?>
  </td>
</tr>
<tr>
  <td <?= $header_po ?>><b>Kode</b></td>
  <td <?= $content_po ?>><?= $PO['PURCHASE_ORDER_KODE']; ?></td>
  <td <?= $header_po ?>><b>RAB Kode</b></td>
  <td <?= $content_po ?>><?= $PO['RAB_KODE']; ?></td>
  <td <?= $header_po ?>><b>RAB Nama</b></td>
  <td <?= $content_po ?>><?= $PO['RAB_NAMA']; ?></td>
</tr>
<tr>
  <td <?= $header_po ?>><b>Status PO</b></td>
  <td><?= $PO['STATUS_PO_NAMA']; ?></td>
  <td <?= $header_po ?>><b>Kategori</b></td>
  <td><?= $PO['KATEGORI_PP_NAMA']; ?></td>
  <td <?= $header_po ?>><b>Pajak</b></td>
  <td><?= $PO['KATEGORI_PAJAK_NAMA']; ?>
  <?php if(floatval($PO['KATEGORI_PAJAK_ID'])!=3) echo "(".$PO['PAJAK_NAMA']." ".$PO['PAJAK_VALUE']."% )"; ?>
  </td>
</tr>
<tr>
  <td <?= $header_po ?>><b>TOP</b></td>
  <td><?= $PO['TOP_KODE']; ?></td>
  <td <?= $header_po ?>><b>Supplier</b></td>
  <td><?= $PO['SUPPLIER_NAMA']; ?></td>
  <td <?= $header_po ?>><b>Gudang</b></td>
  <td><?= $PO['GUDANG_NAMA']; ?></td>
</tr>
<tr>
  <td <?= $header_po ?>><b>Alamat Kirim</b></td>
  <td><?= $PO['ALAMAT_PENGIRIMAN']; ?></td>
  <td <?= $header_po ?>><b>Nama CP</b></td>
  <td><?= $PO['NAMA_CP']; ?></td>
  <td <?= $header_po ?>><b>Telp CP</b></td>
  <td><?= $PO['TELP_CP']; ?></td>
</tr>
</tbody>
</table>
<table class="table table-striped table-bordered table-hover centerTable" style="margin-top: 20px">
  <thead>
	<tr class="label-info">
	  <th colspan="7" <?= $header_keterangan ?>>Detail Transaksi Purchase Order</th>
	</tr>
	<tr class="label-info">
		<th>Nama Material</th>
		<th>Kode Material</th>
		<th>Kode PP</th>
		<th>Vol. PO (Quantity)</th>
		<th>Harga satuan</th>
		<th>Diskon</th>
		<th>Harga final</th>
	</tr>
  </thead>
  <tbody id="detail_po">
		<?php 
			$jumlah = 0;
			foreach($detailPO as $item) { 
				$harga_final = $item["HARGA_FINAL"];
				$jumlah += $harga_final;
		?>
			<tr class="item_po_detail">
				<td><?= $item["BARANG_NAMA"] ?></td>
				<td><?= $item["BARANG_KODE"] ?></td>
				<td><?= $item["PP_KODE"] ?></td>
				<td><?= $item["VOLUME_PO"] ?></td>
				<td align="right">
					<?php 
						if(floatval($PO['KATEGORI_PAJAK_ID'])!=2)
							echo toMoney($item["HARGA_MATERI_PO"]);
						else
							echo toMoney(($item["HARGA_MATERI_PO"])+(floatval($item["HARGA_PAJAK"])/floatval($item["VOLUME_PO"]))) 
					?>
				</td>
				<td align="right"><?= toMoney($item["HARGA_DISKON"]) ?></td>
				<td align="right"><?= toMoney($harga_final) ?></td>
			</tr>
		<?php } ?>
		<tr class="item_po_detail">
			<td colspan="6"style="background-color: #167CAC;"><b style="color: #FFF">JUMLAH PURCHASE ORDER</b></td>
			<td align="right"><?= toMoney($jumlah) ?></td>
		</tr>
  </tbody>
</table>
<div align="center" style="width: 100%">
	<table class="table equalDevide centerTable" style="width: 100%">
		<tr>			
			<?php
				echo '<td><div align="center" style="padding-bottom: 60px">Drafter</div><div align="center" style="padding: 0, margin: 0">'.$PO['DRAFTER_NAMA'].'<div></td>';
				echo '<td><div align="center" style="padding-bottom: 60px">Validator</div><div align="center" style="padding: 0, margin: 0">'.$PO['VALIDATOR_NAMA'].'<div></td>';
			?>
		</tr>
	</table>
</div>