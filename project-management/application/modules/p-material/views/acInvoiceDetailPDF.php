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
	$header_invoice = "style='background-color: #EEEEEE; width: 80px; word-wrap:break-word;'";
	$content_invoice = "style='width: 100px; word-wrap:break-word;'";
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
<div style="width: 100%" align="center"><h2><b>INVOICE</b></h2></div>
<table class="table table-bordered centerTable">
<thead>
<tr class="label-info">
  <th colspan="6" <?= $header_keterangan ?>>Keterangan Invoice</th>
</tr>
</thead>
<tbody>
<tr>
  <td <?= $header_invoice ?>><b>Kode</b></td>
  <td <?= $content_invoice ?>><?= $Invoice['INVOICE_KODE']; ?></td>
  <td <?= $header_invoice ?>><b>RAB Kode</b></td>
  <td <?= $content_invoice ?>><?= $Invoice['RAB_KODE']; ?></td>
  <td <?= $header_invoice ?>><b>RAB Nama</b></td>
  <td <?= $content_invoice ?>><?= $Invoice['RAB_NAMA']; ?></td>
</tr>
<tr>
  <td <?= $header_invoice ?>><b>Status Invoice</b></td>
  <td <?= $content_invoice ?>><?= $Invoice['STATUS_VALIDASI_NAMA']; ?></td>
  <td <?= $header_invoice ?>><b>Tanggal</b></td>
  <td <?= $content_invoice ?>><?= $Invoice['TANGGAL_TRANSAKSI']; ?></td>
  <td <?= $header_invoice ?>><b>Drafter</b></td>
  <td <?= $content_invoice ?>><?= $Invoice['DRAFTER_NAMA']; ?></td>
</tr>
<tr>
  <td <?= $header_invoice ?>><b>TOP</b></td>
  <td><?= $Invoice['TOP_DESCRIPTION']; ?></td>
  <td <?= $header_invoice ?>><b>Supplier</b></td>
  <td><?= $Invoice['SUPPLIER_NAMA']; ?></td>
  <td <?= $header_invoice ?>><b>Total</b></td>
  <td><?= toMoney($Invoice['TOTAL_HARGA_INVOICE']); ?></td>
</tr>
</tbody>
</table>
<table class="table table-striped table-bordered table-hover centerTable" style="margin-top: 20px">
  <thead>
	<tr class="label-info">
	  <th colspan="10" <?= $header_keterangan ?>>Detail Invoice</th>
	</tr>
	<tr class="label-info">
		<th>No</th>
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
  <tbody >
		<?php 
			$jumlah = 0;
			$header = '';
			$sub_total = 0;
			$content = '';
			$i = 0;
			foreach($detailInvoice as $item) {
				if($header!=$item["PENERIMAAN_BARANG_KODE"]){
					if($header!=''){
						$content .= '<tr class="item_invoice_detail"><td> </td><td colspan="8" align="right"><b>SUB TOTAL</b></td><td align="right">' . toMoney($sub_total) . '</td></tr>';
						$sub_total = 0;
					}
					$content .= '<tr class="item_invoice_detail"><td> </td><td colspan="9">' . $item["PENERIMAAN_BARANG_KODE"] . '</td></tr>';
					$header = $item["PENERIMAAN_BARANG_KODE"];
				}
				$harga_awal = floatval($item["VOLUME_LPB"])*floatval($item["ITEM_HARGA"]);
				$harga_after_diskon = $harga_awal - floatval($item["HARGA_DISKON"]);
				$harga_final = 0;
				if(floatval($item["KATEGORI_PAJAK_ID"])==2){
					$harga_final = $harga_after_diskon + floatval($item["HARGA_PAJAK"]);
				} else {
					$harga_final = $harga_after_diskon;
				}
				$content .= '<tr class="item_invoice_detail"><td>' . ($i+1) . '</td><td>' . $item["ITEM_KODE"] . '</td><td>' . $item["ITEM_NAMA"] . '</td><td>' . $item["PENERIMAAN_BARANG_KODE"] . '</td><td>' . $item["VOLUME_LPB"] . '</td><td align="right">' . toMoney(floatval($item["ITEM_HARGA"])) . '</td><td align="right">' . toMoney(floatval($item["HARGA_DISKON"])) . '</td><td align="right">' . $item["KATEGORI_PAJAK_NAMA"] . ' ' . $item["PAJAK_VALUE"] . '%</td><td align="right">' . toMoney(floatval($item["HARGA_PAJAK"])) . '</td><td align="right">' . toMoney($harga_final) . '</td></tr>';
				$jumlah += $harga_final;
				$sub_total += $harga_final;
				$i++;
			}
			$content .= '<tr class="item_invoice_detail"><td> </td><td colspan="8" align="right"><b>SUB TOTAL</b></td><td align="right">' . toMoney($sub_total) . '</td></tr>';
			echo $content;
		?>
		<tr class="item_invoice_detail">
			<td colspan="9"style="background-color: #167CAC;"><b style="color: #FFF">JUMLAH INVOICE</b></td>
			<td align="right"><?= toMoney($jumlah) ?></td>
		</tr>
  </tbody>
</table>
<div align="center" style="width: 100%">
	<table class="table equalDevide centerTable" style="width: 100%">
		<tr>			
			<?php
				echo '<td><div align="center" style="padding-bottom: 60px">Drafter</div><div align="center" style="padding: 0, margin: 0">'.$Invoice['DRAFTER_NAMA'].'<div></td>';
				echo '<td><div align="center" style="padding-bottom: 60px">Validator</div><div align="center" style="padding: 0, margin: 0">'.$Invoice['VALIDATOR_NAMA'].'<div></td>';
			?>
		</tr>
	</table>
</div>