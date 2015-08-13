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
	
	function nextChar($c,$d){
		$x = ord($c) + $d;
		return chr($x);
	}
	
	$header_rab = "style='background-color: #EEEEEE; width: 80px; word-wrap:break-word;'";
	$content_rab = "style='width: 100px; word-wrap:break-word;'";
	$header_keterangan = "style='text-align: center; background-color: #0993D3; color: #FFFFFF; height: 20px; font-size: 18px;'";
	$acc = 0;
	for ($x = 0; $x < sizeof($enrollProject); $x++) {
		if ($enrollProject[$x]['PENUGASAN_ID'] == 2 || $enrollProject[$x]['PENUGASAN_ID'] == 4) {
			$acc++;
		}
	}
?>
<style>
	@page { margin: 70px 50px; }
	body,h2,h3 {
		font-family: 'dotmatri';
	}
	body {
		font-size: 15px;
	}
	table.equalDevide tr td { width: <?php echo 100/$acc; ?>%; }
</style>
<div id="content"> 
<p class="page">
<div style="width: 100%;" align="center"><h2><b>RINCIAN RAB</b></h2></div>
<table class="table table-bordered centerTable">
<thead>
<tr class="label-info">
  <th colspan="6" <?= $header_keterangan ?>>Keterangan RAB</th>
</tr>
</thead>
<tbody>
<tr>
  <td <?= $header_rab ?>><b>Nama RAB</b></td>
  <td <?= $content_rab ?>><?= $RAB['RAB_NAMA']; ?></td>
  <td <?= $header_rab ?>><b>Kode RAB</b></td>
  <td <?= $content_rab ?>><?= $RAB['RAB_KODE']; ?></td>
  <td <?= $header_rab ?>><b>Status RAB</b></td>
  <td <?= $content_rab ?>><?= $RAB['RAB_STATUS_APPROVAL_NAMA']; ?></td>
</tr>
<tr>
  <td <?= $header_rab ?>><b>Kode Proyek</b></td>
  <td><?= $PROJECT['PROJECT_NAMA']; ?></td>
  <td <?= $header_rab ?>><b>Nama Proyek</b></td>
  <td><?= $PROJECT['PROJECT_KODE']; ?></td>
  <td <?= $header_rab ?>><b>Status Proyek</b></td>
  <td><?= $PROJECT['STATUS_PROJECT_NAMA']; ?></td>
</tr>
</tbody>
</table>
<table class="table table-striped table-bordered centerTable">
	<thead>
		<tr class="label-info">
			<th>No</th>
			<th>Uraian Pekerjaan</th>
			<th>Kode</th>
			<th>Volume</th>
			<th>Satuan</th>
			<th>Harga</th>
			<th>Jumlah Harga</th>
		</tr>
	</thead>
	<tbody id="detail_pekerjaan">
		<?php
			$pekerjaan = '';
			$jumlah_kategori = 0;
			$jumlah_total = 0;
			$header_kategori = '';
			$cString = 'A';
			$c = 0;
			foreach($detail_pekerjaan as $item){
				if ($header_kategori != $item["KATEGORI_PEKERJAAN_ID"]) {
					if ($header_kategori != '') {
						$pekerjaan .= '<tr class="item_rab_pekerjaan"><td colspan="6" align="right"><b>JUMLAH SUBTOTAL</b></td><td align="right">'.toMoney($jumlah_kategori).'</td></tr>';
						$jumlah_total += $jumlah_kategori;
						$jumlah_kategori = 0;
					}
					$pekerjaan .= '<tr class="item_rab_pekerjaan"><td><b>' . nextChar($cString, $c) . '</b></td><td colspan="6"><b>' . $item["KATEGORI_PEKERJAAN_NAMA"] . '</b></td></tr>';
					$c++;
					$header_kategori = $item["KATEGORI_PEKERJAAN_ID"];
				}
				
				if ($item["ANALISA_ID"] != null) {
					$pekerjaan .= '<tr class="item_rab_pekerjaan"><td>' . $item["DETAIL_PEKERJAAN_URUTAN"] . '</td><td>' . $item["ANALISA_NAMA"] . '</td><td>' . $item["ANALISA_KODE"] . '</td><td>' . $item["DETAIL_PEKERJAAN_VOLUME"] . '</td><td>' . $item["SATUAN_ANALISA_NAMA"] . '</td><td align="right">' . toMoney($item["ANALISA_TOTAL"]) . '</td><td align="right">' . toMoney($item["DETAIL_PEKERJAAN_TOTAL"]) . '</td></tr>';
				} else {
					if(floatval($item["TIPE_SUBCON"]) == 3)
						$pekerjaan .= '<tr class="item_rab_pekerjaan"><td>' . $item["DETAIL_PEKERJAAN_URUTAN"] . '</td><td>' . $item["SUBCON_NAMA"] . '</td><td>' . $item["SUBCON_TIPE_KODE"] . '</td><td>' . $item["DETAIL_PEKERJAAN_VOLUME"] . '</td><td>' . $item["SATUAN_SUBCON_UPAH_NAMA"] . '</td><td align="right">' . toMoney($item["SUBCON_HARGA"]) . '</td><td align="right">' . toMoney($item["DETAIL_PEKERJAAN_TOTAL"]) . '</td></tr>';
					else
						$pekerjaan .= '<tr class="item_rab_pekerjaan"><td>' . $item["DETAIL_PEKERJAAN_URUTAN"] . '</td><td>' . $item["SUBCON_NAMA"] . '</td><td>' . $item["SUBCON_TIPE_KODE"] . '</td><td>' . $item["DETAIL_PEKERJAAN_VOLUME"] . '</td><td>' . $item["SATUAN_SUBCON_NAMA"] . '</td><td align="right">' . toMoney($item["SUBCON_HARGA"]) . '</td><td align="right">' . toMoney($item["DETAIL_PEKERJAAN_TOTAL"]) . '</td></tr>';
				}

				$jumlah_kategori += floatval($item["DETAIL_PEKERJAAN_TOTAL"]);
			}
			echo $pekerjaan;
		?>				
	</tbody>
	<tfoot>
		<?php
			$pekerjaan = '';
			$pekerjaan .= '<tr class="item_rab_pekerjaan"><td colspan="6" align="right"><b>JUMLAH SUBTOTAL</b></td><td align="right">' . toMoney($jumlah_kategori) . '</td></tr>';
			$jumlah_total += $jumlah_kategori;
			$pekerjaan .= '<tr class="item_rab_pekerjaan"><td colspan="6" style="background-color: #167CAC;"><b style="color: #FFF">JUMLAH TOTAL</b></td><td align="right" style="background-color: #167CAC; color: #FFF">' . toMoney($jumlah_total) . '</td></tr>';
			$pekerjaan .= '<tr class="item_rab_pekerjaan"><td colspan="6" style="background-color: #167CAC;"><b style="color: #FFF">OVERHEAD (5 %)</b></td><td align="right" style="background-color: #167CAC; color: #FFF">' . toMoney($jumlah_total*0.05) . '</td></tr>';
			$pekerjaan .= '<tr class="item_rab_pekerjaan"><td colspan="6" style="background-color: #167CAC;"><b style="color: #FFF">TOTAL SETELAH OVERHEAD</b></td><td align="right" style="background-color: #167CAC; color: #FFF">' . toMoney(1.05*$jumlah_total) . '</td></tr>';
			echo $pekerjaan;
		?>
	</tfoot>
</table>
<div align="center" style="width: 100%">
	<table class="table equalDevide centerTable" style="width: 100%">
		<tr>			
			<?php
				for ($x = 0; $x < sizeof($enrollProject); $x++) {
					if ($enrollProject[$x]['PENUGASAN_ID'] == 2) {
						echo '<td><div align="center" style="padding-bottom: 60px">Estimator</div><div align="center" style="padding: 0, margin: 0">'.$enrollProject[$x]['PENGGUNA_NAMA'].'<div></td>';
					}
				}
			?>
			<?php
				$i = 0;
				for ($x = 0; $x < sizeof($enrollProject); $x++) {
					if ($enrollProject[$x]['PENUGASAN_ID'] == 4) {
						$i++;
						echo '<td><div align="center" style="padding-bottom: 60px">Validator '.$i.'</div><div align="center" style="padding: 0, margin: 0">'.$enrollProject[$x]['PENGGUNA_NAMA'].'<div></td>';
					}
				}
			?>
		</tr>
	</table>
</div>
</p>
<p class="page">
<div style="width: 100%; page-break-before: always;" align="center"><h2><b>RINCIAN RAB (DETAIL)</b></h2></div>
<table class="table table-striped table-bordered centerTable">
	<thead>
		<tr class="label-info">
			<th>No</th>
			<th>Uraian Pekerjaan</th>
			<th>Kode</th>
			<th>Volume</th>
			<th>Satuan</th>
			<th>Harga Material</th>
			<th>Jumlah Harga Material</th>
			<th>Harga Upah</th>
			<th>Jumlah Harga Upah</th>
			<th>Total Harga</th>
		</tr>
	</thead>
	<tbody id="detail_pekerjaan">
		<?php
			$pekerjaan = '';
			$jumlah_kategori = 0;
			$jumlah_total = 0;
			$header_kategori = '';
			$cString = 'A';
			$c = 0;
			for($i = 0; $i < count($detail_pekerjaan_kompleks); $i++) {
				if ($header_kategori != $detail_pekerjaan_kompleks[$i]["KATEGORI_PEKERJAAN_ID"]) {
					if ($header_kategori != '') {
						$pekerjaan .= '<tr class="item_rab_pekerjaan"><td colspan="9" align="right"><b>JUMLAH SUBTOTAL</b></td><td align="right">' . toMoney($jumlah_kategori) . '</td></tr>';
						$jumlah_total += $jumlah_kategori;
						$jumlah_kategori = 0;
					}
					$pekerjaan .= '<tr class="item_rab_pekerjaan"><td><b>' . nextChar($cString, $c) . '</b></td><td colspan="9"><b>' . $detail_pekerjaan_kompleks[$i]["KATEGORI_PEKERJAAN_NAMA"] . '</b></td></tr>';
					$c++;
					$header_kategori = $detail_pekerjaan_kompleks[$i]["KATEGORI_PEKERJAAN_ID"];
				}

				if ($detail_pekerjaan_kompleks[$i]["ANALISA_ID"] != null) {
					$harga_material = 0;
					$harga_upah = 0;
					$volume = floatval($detail_pekerjaan_kompleks[$i]["DETAIL_PEKERJAAN_VOLUME"]);
					if($detail_pekerjaan_kompleks[$i]["BARANG_ID"] != null){
						$harga_material = floatval($detail_pekerjaan_kompleks[$i]["TOTAL_MATERIAL"]);
						$i++;
					}
					if($detail_pekerjaan_kompleks[$i]["UPAH_ID"] != null){
						$harga_upah = floatval($detail_pekerjaan_kompleks[$i]["TOTAL_MATERIAL"]);
					}
					$pekerjaan .= '<tr class="item_rab_pekerjaan"><td>' . $detail_pekerjaan_kompleks[$i]["DETAIL_PEKERJAAN_URUTAN"] . '</td><td>' . $detail_pekerjaan_kompleks[$i]["ANALISA_NAMA"] . '</td><td>' . $detail_pekerjaan_kompleks[$i]["ANALISA_KODE"] . '</td><td>' . $volume . '</td><td>' . $detail_pekerjaan_kompleks[$i]["SATUAN_ANALISA_NAMA"] . '</td><td align="right">' . toMoney($harga_material) . '</td><td align="right">' . toMoney($harga_material*$volume) . '</td><td align="right">' . toMoney($harga_upah) . '</td><td align="right">' . toMoney($harga_upah*$volume) . '</td><td align="right">' . toMoney($detail_pekerjaan_kompleks[$i]["DETAIL_PEKERJAAN_TOTAL"]) . '</td></tr>';
				} else {
					$volume = floatval($detail_pekerjaan_kompleks[$i]["DETAIL_PEKERJAAN_VOLUME"]);
					$harga = floatval($detail_pekerjaan_kompleks[$i]["TOTAL_MATERIAL"]);
					if(floatval($detail_pekerjaan_kompleks[$i]["TIPE_SUBCON"]) == 3)
						$pekerjaan .= '<tr class="item_rab_pekerjaan"><td>' . $detail_pekerjaan_kompleks[$i]["DETAIL_PEKERJAAN_URUTAN"] . '</td><td>' . $detail_pekerjaan_kompleks[$i]["SUBCON_NAMA"] . '</td><td>' . $detail_pekerjaan_kompleks[$i]["SUBCON_TIPE_KODE"] . '</td><td>' . $volume . '</td><td>' . $detail_pekerjaan_kompleks[$i]["SATUAN_SUBCON_UPAH_NAMA"] . '</td><td align="right">' . toMoney(0) . '</td><td align="right">' . toMoney(0) . '</td><td align="right">' . toMoney($detail_pekerjaan_kompleks[$i]["TOTAL_MATERIAL"]) . '</td><td align="right">' . toMoney($harga*$volume) . '</td><td align="right">' . toMoney($detail_pekerjaan_kompleks[$i]["DETAIL_PEKERJAAN_TOTAL"]) . '</td></tr>';
					else
						$pekerjaan .= '<tr class="item_rab_pekerjaan"><td>' . $detail_pekerjaan_kompleks[$i]["DETAIL_PEKERJAAN_URUTAN"] . '</td><td>' . $detail_pekerjaan_kompleks[$i]["SUBCON_NAMA"] . '</td><td>' . $detail_pekerjaan_kompleks[$i]["SUBCON_TIPE_KODE"] . '</td><td>' . $volume . '</td><td>' . $detail_pekerjaan_kompleks[$i]["SATUAN_SUBCON_NAMA"] . '</td><td align="right">' . toMoney($detail_pekerjaan_kompleks[$i]["TOTAL_MATERIAL"]) . '</td><td align="right">' . toMoney($harga*$volume) . '</td><td align="right">' . toMoney(0) . '</td><td align="right">' . toMoney(0) . '</td><td align="right">' . toMoney($detail_pekerjaan_kompleks[$i]["DETAIL_PEKERJAAN_TOTAL"]) . '</td></tr>';
				}

				$jumlah_kategori += floatval($detail_pekerjaan_kompleks[$i]["DETAIL_PEKERJAAN_TOTAL"]);
			}
			echo $pekerjaan;
		?>
	</tbody>
	<tfoot>
		<?php	
			$pekerjaan = '';
			$pekerjaan .= '<tr class="item_rab_pekerjaan"><td colspan="9" align="right"><b>JUMLAH SUBTOTAL</b></td><td align="right">' . toMoney($jumlah_kategori) . '</td></tr>';
			$jumlah_total += $jumlah_kategori;
			$pekerjaan .= '<tr class="item_rab_pekerjaan"><td colspan="9" style="background-color: #167CAC;"><b style="color: #FFF">JUMLAH TOTAL</b></td><td align="right" style="background-color: #167CAC; color: #FFF">' . toMoney($jumlah_total) . '</td></tr>';
			$pekerjaan .= '<tr class="item_rab_pekerjaan"><td colspan="9" style="background-color: #167CAC;"><b style="color: #FFF">OVERHEAD (5 %)</b></td><td align="right" style="background-color: #167CAC; color: #FFF">' . toMoney(0.05*$jumlah_total) . '</td></tr>';
			$pekerjaan .= '<tr class="item_rab_pekerjaan"><td colspan="9" style="background-color: #167CAC;"><b style="color: #FFF">TOTAL SETELAH OVERHEAD</b></td><td align="right" style="background-color: #167CAC; color: #FFF">' . toMoney(1.05*$jumlah_total) . '</td></tr>';
			echo $pekerjaan;
		?>
	</tfoot>
</table>
<div align="center" style="width: 100%">
	<table class="table equalDevide centerTable" style="width: 100%">
		<tr>			
			<?php
				for ($x = 0; $x < sizeof($enrollProject); $x++) {
					if ($enrollProject[$x]['PENUGASAN_ID'] == 2) {
						echo '<td><div align="center" style="padding-bottom: 60px">Estimator</div><div align="center" style="padding: 0, margin: 0">'.$enrollProject[$x]['PENGGUNA_NAMA'].'<div></td>';
					}
				}
			?>
			<?php
				$i = 0;
				for ($x = 0; $x < sizeof($enrollProject); $x++) {
					if ($enrollProject[$x]['PENUGASAN_ID'] == 4) {
						$i++;
						echo '<td><div align="center" style="padding-bottom: 60px">Validator '.$i.'</div><div align="center" style="padding: 0, margin: 0">'.$enrollProject[$x]['PENGGUNA_NAMA'].'<div></td>';
					}
				}
			?>
		</tr>
	</table>
</div>
</p>
<p class="page">
<div style="width: 100%; page-break-before: always;" align="center"><h2><b>RINCIAN RAP</b></h2></div>
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
		<?php
			$item = '';
			$jumlah = 0;
			$sub_jumlah = 0;
			if (count($detail_barang) > 0) {
				$item .= '<tr class="item_rap_detail"><td colspan="6"><b>BARANG / BAHAN</b></td></tr>';
				foreach($detail_barang as $x){
					$nama = $x["BARANG_NAMA"];
					$kode = $x["BARANG_KODE"];
					$volume = $x["BARANG_VOLUME"];
					$satuan = $x["SATUAN_NAMA"];
					$harga = floatval($x["DETAIL_ANALISA_HARGA"]);
					$sub_total = $harga*$volume;
					$item .= '<tr class="item_rap_detail"><td>' . $nama . '</td><td>' . $kode . '</td><td>' . $volume . '</td><td>' . $satuan . '</td><td align="right">' . toMoney($harga) . '</td><td align="right">' . toMoney($sub_total) . '</td></tr>';
					$jumlah += $sub_total;
					$sub_jumlah += $sub_total;
				}
				if(count($subcon)>0){
					foreach($subcon as $x){
						if(floatval($x["SUBCON_TIPE_ID"]) == 2){
							$item .= '<tr class="item_rap_detail"><td>'.$x["SUBCON_NAMA"].'</td><td>'.$x["SUBCON_TIPE_KODE"].'</td><td>'.$x["DETAIL_PEKERJAAN_VOLUME"].'</td><td>'.$x["SATUAN_NAMA"].'</td><td align="right">'.toMoney($x["SUBCON_HARGA"]).'</td><td align="right">'.toMoney(floatval($x["SUBCON_HARGA"])*floatval($x["DETAIL_PEKERJAAN_VOLUME"])).'</td></tr>';
							$jumlah += (floatval($x["SUBCON_HARGA"])*floatval($x["DETAIL_PEKERJAAN_VOLUME"]));
							$sub_jumlah += (floatval($x["SUBCON_HARGA"])*floatval($x["DETAIL_PEKERJAAN_VOLUME"]));
						}
					}
				}
				$item .= '<tr class="item_rap_detail"><td colspan="5" align="right"><b>JUMLAH SUBTOTAL</b></td><td align="right">' . toMoney($sub_jumlah) . '</td></tr>';
				$sub_jumlah = 0;
			}
			if(count($detail_analisa_upah) > 0){
				$item .= '<tr class="item_rap_detail"><td colspan="6"><b>UPAH ANALISA</b></td></tr>';
				foreach($detail_analisa_upah as $x){
					$nama = $x["ANALISA_NAMA"];
					$kode = $x["ANALISA_KODE"];
					$volume = $x["UPAH_ANALISA_VOLUME"];
					$satuan = $x["SATUAN_NAMA"];
					$harga = floatval($x["UPAH_ANALISA_TOTAL"]);
					$sub_total = $harga*$volume;
					$item .= '<tr class="item_rap_detail"><td>' . $nama . '</td><td>' . $kode . '</td><td>' . $volume . '</td><td>' . $satuan . '</td><td align="right">' . toMoney($harga) . '</td><td align="right">' . toMoney($sub_total) . '</td></tr>';
					$jumlah += $sub_total;
					$sub_jumlah += $sub_total;
				}
				if(count($subcon)>0){
					foreach($subcon as $x){
						if(floatval($x["SUBCON_TIPE_ID"]) == 3){
							$item .= '<tr class="item_rap_detail"><td>'.$x["SUBCON_NAMA"].'</td><td>'.$x["SUBCON_TIPE_KODE"].'</td><td>'.$x["DETAIL_PEKERJAAN_VOLUME"].'</td><td>'.$x["SATUAN_UPAH_NAMA"].'</td><td align="right">'.toMoney($x["SUBCON_HARGA"]).'</td><td align="right">'.toMoney(floatval($x["SUBCON_HARGA"])*floatval($x["DETAIL_PEKERJAAN_VOLUME"])).'</td></tr>';
							$jumlah += (floatval($x["SUBCON_HARGA"])*floatval($x["DETAIL_PEKERJAAN_VOLUME"]));
							$sub_jumlah += (floatval($x["SUBCON_HARGA"])*floatval($x["DETAIL_PEKERJAAN_VOLUME"]));
						}
					}
				}
				$item .= '<tr class="item_rap_detail"><td colspan="5" align="right"><b>JUMLAH SUBTOTAL</b></td><td align="right">' . toMoney($sub_jumlah) . '</td></tr>';
				$sub_jumlah = 0;
			}
			if(count($subcon)>0){
				$item .= '<tr class="item_rap_detail"><td colspan="6"><b>SUBCON</b></td></tr>';
				foreach($subcon as $x){
					if(floatval($x["SUBCON_TIPE_ID"]) == 1){
						$item .= '<tr class="item_rap_detail"><td>'.$x["SUBCON_NAMA"].'</td><td>'.$x["SUBCON_TIPE_KODE"].'</td><td>'.$x["DETAIL_PEKERJAAN_VOLUME"].'</td><td>'.$x["SATUAN_NAMA"].'</td><td align="right">'.toMoney($x["SUBCON_HARGA"]).'</td><td align="right">'.toMoney(floatval($x["SUBCON_HARGA"])*floatval($x["DETAIL_PEKERJAAN_VOLUME"])).'</td></tr>';
						$jumlah += (floatval($x["SUBCON_HARGA"])*floatval($x["DETAIL_PEKERJAAN_VOLUME"]));
						$sub_jumlah += (floatval($x["SUBCON_HARGA"])*floatval($x["DETAIL_PEKERJAAN_VOLUME"]));
					}
				}
				$item .= '<tr class="item_rap_detail"><td colspan="5" align="right"><b>JUMLAH SUBTOTAL</b></td><td align="right">' . toMoney($sub_jumlah) . '</td></tr>';
				$sub_jumlah = 0;
			}
			echo $item;
		?>
	</tbody>
	<tfoot>
		<?php
			$item = '';
			$item .= '<tr class="item_rab_detail"><td colspan="5" style="background-color: #167CAC;"><b style="color: #FFF">JUMLAH TOTAL</b></td><td align="right" style="background-color: #167CAC; color: #FFF">' . toMoney($jumlah) . '</td></tr>';
			$item .= '<tr class="item_rab_pekerjaan"><td colspan="5" style="background-color: #167CAC;"><b style="color: #FFF">OVERHEAD (5 %)</b></td><td align="right" style="background-color: #167CAC; color: #FFF">' . toMoney(0.05*$jumlah) . '</td></tr>';
			$item .= '<tr class="item_rab_pekerjaan"><td colspan="5" style="background-color: #167CAC;"><b style="color: #FFF">TOTAL SETELAH OVERHEAD</b></td><td align="right" style="background-color: #167CAC; color: #FFF">' . toMoney(1.05*$jumlah) . '</td></tr>';
			echo $item;
		?>
	</tfoot>
</table>
<div align="center" style="width: 100%">
	<table class="table equalDevide centerTable" style="width: 100%">
		<tr>			
			<?php
				for ($x = 0; $x < sizeof($enrollProject); $x++) {
					if ($enrollProject[$x]['PENUGASAN_ID'] == 2) {
						echo '<td><div align="center" style="padding-bottom: 60px">Estimator</div><div align="center" style="padding: 0, margin: 0">'.$enrollProject[$x]['PENGGUNA_NAMA'].'<div></td>';
					}
				}
			?>
			<?php
				$i = 0;
				for ($x = 0; $x < sizeof($enrollProject); $x++) {
					if ($enrollProject[$x]['PENUGASAN_ID'] == 4) {
						$i++;
						echo '<td><div align="center" style="padding-bottom: 60px">Validator '.$i.'</div><div align="center" style="padding: 0, margin: 0">'.$enrollProject[$x]['PENGGUNA_NAMA'].'<div></td>';
					}
				}
			?>
		</tr>
	</table>
</div>
</p>
<p class="page">
<div style="width: 100%; page-break-before: always;" align="center"><h2><b>LAMPIRAN ANALISA</b></h2></div>
<?php 
	$i = -1;
	foreach($detail_analisa as $item){
		++$i;
		$analisa = $item["DETAIL"];
		$barang = $item["BARANG"];
		$upah = $item["UPAH"];
?>
<div style="width: 100% <?php if($i!=0) echo "page-break-before: always;"; ?>" align="center"><h3><b>------------------------- <?= $analisa["ANALISA_NAMA"] ?> -------------------------</b></h3></div>
<table class="table table-bordered table-hover centerTable">
  <thead>
	<tr class="label-info">
	  <th colspan="6">Keterangan Analisa</th>
	</tr>
  </thead>
  <tbody>
	<tr>
	  <td width="100" class="detail_analisa"><b>Nama</b></td>
	  <td id="analisa_detail_nama"><?= $analisa["ANALISA_NAMA"] ?></td>
	  <td width="100" class="detail_analisa"><b>Kode</b></td>
	  <td id="analisa_detail_kode"><?= $analisa["ANALISA_KODE"] ?></td>
	  <td width="100" class="detail_analisa"><b>Satuan</b></td>
	  <td id="analisa_detail_satuan"><?= $analisa["SATUAN_NAMA"] ?></td>
	</tr>
	<tr>
	  <td class="detail_analisa"><b>Lokasi</b></td>
	  <td id="analisa_detail_lokasi"><?= $analisa["LOKASI_UPAH_NAMA"] ?></td>
	  <td class="detail_analisa"><b>Kategori</b></td>
	  <td id="analisa_detail_kategori"><?= $analisa["KATEGORI_ANALISA_NAMA"] ?></td>
	  <td class="detail_analisa"><b>Total</b></td>
	  <td id="analisa_detail_total"><?= toMoney($analisa["ANALISA_TOTAL"]) ?></td>
	</tr>
  </tbody>
</table>

<table class="table table-striped table-bordered table-hover centerTable" style="margin-bottom: 20px">
  <thead>
	<tr class="label-info">
	  <th>Uraian</th>
	  <th>Koefisien</th>
	  <th>Satuan</th>
	  <th>Harga Satuan</th>
	  <th>Jumlah</th>
	</tr>
  </thead>
  <tbody>
	<tr id="header_bahan">
	  <td colspan="5"><b>BAHAN</b></td>
	</tr>
	<?php
		$text = '';
		$jumlah_barang = 0;
		foreach($barang as $x){
			$text .= '<tr class="item_bahan"><td>'.$x["BARANG_NAMA"].'</td><td>'.$x["DETAIL_ANALISA_KOEFISIEN"].'</td><td>'.$x["SATUAN_NAMA"].'</td><td align="right">'.toMoney($x["DETAIL_ANALISA_HARGA"]).'</td><td align="right">'.toMoney($x["DETAIL_ANALISA_TOTAL"]).'</td></tr>';
			$jumlah_barang += floatval($x["DETAIL_ANALISA_TOTAL"]);
		}
		$text .= '<tr class="item_bahan"><td colspan="4"><b>JUMLAH BAHAN</b></td><td align="right">'.toMoney($jumlah_barang).'</td></tr>';
		echo $text;
	?>
	<tr id="header_upah">
	  <td colspan="5"><b>UPAH</b></td>
	</tr>
	<?php
		$text = '';
		$jumlah_upah = 0;
		foreach($upah as $x){
			$text .= '<tr class="item_upah"><td>'.$x["UPAH_NAMA"].'</td><td>'.$x["DETAIL_ANALISA_KOEFISIEN"].'</td><td>'.$x["SATUAN_UPAH_NAMA"].'</td><td align="right">'.toMoney($x["DETAIL_ANALISA_HARGA"]).'</td><td align="right">'.toMoney($x["DETAIL_ANALISA_TOTAL"]).'</td></tr>';
			$jumlah_upah += floatval($x["DETAIL_ANALISA_TOTAL"]);
		}
		$text .= '<tr class="item_upah"><td colspan="4"><b>JUMLAH PEKERJA</b></td><td align="right">'.toMoney($jumlah_upah).'</td></tr>';
		echo $text;
	?>
  </tbody>
  <tfoot>
	<tr>
	  <td colspan="4"><b>JUMLAH BAHAN + PEKERJA</b></td>
	  <td align="right" id="jumlah_bahan_pekerja"><?= toMoney($jumlah_barang+$jumlah_upah) ?></td>
	</tr>
	<tr>
	  <td colspan="4"><b>JUMLAH TOTAL</b></td>
	  <td align="right" id="jumlah_total"><?= toMoney($jumlah_barang+$jumlah_upah) ?></td>
	</tr>
	<tr>
	  <td colspan="4"><b>DIBULATKAN</b></td>
	  <td align="right" id="dibulatkan"><?= toMoney(floor(($jumlah_barang+$jumlah_upah)*100)/100) ?></td>
	</tr>
  </tfoot>
</table>
</p>
</div>
<?php } ?>