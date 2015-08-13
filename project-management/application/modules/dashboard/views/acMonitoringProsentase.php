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
	$header_keterangan = "style='text-align: center; background-color: #0993D3; color: #FFFFFF; height: 20px; font-size: 12px;'";
?>
<style>
	.widget .table .middle{
		vertical-align: middle;
	}
	
	.widget .table.table-bordered tr th {
	  text-align: center;
	  background-color: #0993D3;
	  color: #FFFFFF;
	  height: 30px;
	  font-size: 15px;
	}
</style>
<!-- Page heading -->
<div class="page-head">
    <h2 class="pull-left"><i class="fa fa-building-o"></i> Monitoring</h2>
    <!-- Breadcrumb -->
    <div class="bread-crumb pull-right">
        <a href="index.html"><i class="fa fa-home"></i> Home</a> 
        <!-- Divider -->
        <span class="divider">/</span> 
        <a href="<?= base_url() . $this->uri->segment(1, 0) . '/' . $this->uri->segment(2, 0) . '/index' ?>" class="bread-current">Dashboard</a>
        <span class="divider">/</span> 
        <a href="#" class="bread-current">Monitoring</a>
    </div>
    <div class="clearfix"></div>
</div>
<!-- Page heading ends -->

<div class="col-md-12"> 
	<!-- edit here -->
	<div class="widget">
		<div class="widget-head">
			<div class="pull-left">Detail RAB</div>
			<div class="widget-icons pull-right">
				<a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
				<a href="#" class="wclose"><i class="fa fa-times"></i></a>
			</div>  
			<div class="clearfix"></div>
		</div>
		<div class="widget-content">
			<div class="padd">
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
					<div style="width: 100%; margin-top: 20px" align="center"><h2><b>PROGRES PELAKSANAAN PEKERJAAN</b></h2></div>
					<table class="table table-striped table-bordered table-hover centerTable">
						<thead>
							<tr class="label-info">
								<th rowspan="2" width="200">Nama</th>
								<th rowspan="2">Kode</th>
								<th rowspan="2">Satuan</th>
								<th rowspan="2">Harga</th>
								<th colspan="4">Perencanaan</th>
								<th colspan="4">Realisasi</th>
							</tr>
							<tr class="label-info">
								<th>Volume</th>
								<th>Total</th>
								<th>Bobot</th>
								<th>Prosentase</th>
								<th>Volume</th>
								<th>Total</th>
								<th>Bobot</th>
								<th>Prosentase</th>
							</tr>
						</thead>
						<tbody id="detail_rap">
							<?php
								$item = '';
								$jumlah = 0;
								$jumlah_bobot = 0;
								$jumlah_realisasi = 0;
								$jumlah_bobot_realisasi = 0;
								$sub_jumlah = 0;
								$sub_bobot = 0;
								$sub_jumlah_realisasi = 0;
								$sub_bobot_realisasi = 0;
								$rap = $RAB['RAB_TOTAL'];
								if (count($detail_barang) > 0) {
									$item .= '<tr class="item_rap_detail"><td colspan="13"><b>BARANG / BAHAN</b></td></tr>';
									foreach($detail_barang as $x){
										$nama = $x["BARANG_NAMA"];
										$kode = $x["BARANG_KODE"];
										$volume = $x["BARANG_VOLUME"];
										$satuan = $x["SATUAN_NAMA"];
										$harga = floatval($x["DETAIL_ANALISA_HARGA"]);
										$sub_total = $harga*$volume;
										$bobot = $sub_total/$rap;
										$volume_lpb = floatval($x["VOLUME_LAPORAN"]);
										$biaya = $volume_lpb * floatval($x["HARGA_LAPORAN"]);
										$persen = $biaya/$rap;
										$item .= '<tr class="item_rap_detail"><td>' . $nama . '</td><td>' . $kode . '</td><td>' . $satuan . '</td><td align="right">' . toMoney($harga) . '</td><td>' . round($volume,3) . '</td><td align="right">' . toMoney($sub_total) . '</td><td align="right">' . round($bobot,3) . '</td><td align="right">' . round($bobot,3)*100 . '%</td><td align="right">' . round($volume_lpb,3) . '</td><td align="right">' . toMoney($biaya) . '</td><td align="right">' . round($persen,3) . '</td><td align="right">' . round($persen,3)*100 . '%</td></tr>';
										$jumlah += $sub_total;
										$sub_jumlah += $sub_total;
										$sub_jumlah_realisasi += $biaya;
										$sub_bobot_realisasi += $persen;
										$sub_bobot += $bobot;
										$jumlah_bobot += $bobot;
										$jumlah_realisasi += $biaya;
										$jumlah_bobot_realisasi += $persen;
									}
									if(count($subcon)>0){
										foreach($subcon as $x){
											if(floatval($x["SUBCON_TIPE_ID"]) == 2){
												$sub_total = floatval($x["SUBCON_HARGA"])*floatval($x["DETAIL_PEKERJAAN_VOLUME"]);
												$bobot = $sub_total/$rap;
												$volume_lpb = floatval($x["VOLUME_LAPORAN"]);
												$biaya = $volume_lpb * floatval($x["HARGA_LAPORAN"]);
												$persen = $biaya/$rap;
												$item .= '<tr class="item_rap_detail"><td>'.$x["SUBCON_NAMA"].'</td><td>'.$x["SUBCON_TIPE_KODE"].'</td><td>'.$x["SATUAN_NAMA"].'</td><td align="right">'.toMoney($x["SUBCON_HARGA"]).'</td><td>'.$x["DETAIL_PEKERJAAN_VOLUME"].'</td><td align="right">'.toMoney($sub_total).'</td><td align="right">' . round($bobot,3) . '</td><td align="right">' . round($bobot,3)*100 . '%</td><td align="right">' . round($volume_lpb,3) . '</td><td align="right">' . toMoney($biaya) . '</td><td align="right">' . round($persen,3) . '</td><td align="right">' . round($persen,3)*100 . '%</td></tr>';
												$jumlah += (floatval($x["SUBCON_HARGA"])*floatval($x["DETAIL_PEKERJAAN_VOLUME"]));
												$sub_jumlah += (floatval($x["SUBCON_HARGA"])*floatval($x["DETAIL_PEKERJAAN_VOLUME"]));
												$sub_jumlah_realisasi += $biaya;
												$sub_bobot_realisasi += $persen;
												$sub_bobot += $bobot;
												$jumlah_bobot += $bobot;
												$jumlah_realisasi += $biaya;
												$jumlah_bobot_realisasi += $persen;
											}
										}
									}
									$item .= '<tr class="item_rap_detail"><td colspan="5" align="right"><b>JUMLAH SUBTOTAL</b></td><td align="right">' . toMoney($sub_jumlah) . '</td><td align="right">' . round($sub_bobot,3) . '</td><td align="right">' . round($sub_bobot,3)*100 . '%</td><td></td><td align="right">' . toMoney($sub_jumlah_realisasi) . '</td><td align="right">' . round($sub_bobot_realisasi,3) . '</td><td align="right">' . round($sub_bobot_realisasi,3)*100 . '%</td></tr>';
									$sub_jumlah = 0;
									$sub_bobot = 0;
									$sub_jumlah_realisasi = 0;
									$sub_bobot_realisasi = 0;
								}
								if(count($detail_analisa_upah) > 0){
									$item .= '<tr class="item_rap_detail"><td colspan="13"><b>UPAH ANALISA</b></td></tr>';
									foreach($detail_analisa_upah as $x){
										$nama = $x["ANALISA_NAMA"];
										$kode = $x["ANALISA_KODE"];
										$volume = $x["UPAH_ANALISA_VOLUME"];
										$satuan = $x["SATUAN_NAMA"];
										$harga = floatval($x["UPAH_ANALISA_TOTAL"]);
										$sub_total = $harga*$volume;
										$bobot = $sub_total/$rap;
										$volume_lpu = floatval($x["VOLUME_LAPORAN"]);
										$biaya = $volume_lpu * floatval($x["HARGA_LAPORAN"]);
										$persen = $biaya/$rap;
										$item .= '<tr class="item_rap_detail"><td>' . $nama . '</td><td>' . $kode . '</td><td>' . $satuan . '</td><td align="right">' . toMoney($harga) . '</td><td>' . $volume . '</td><td align="right">' . toMoney($sub_total) . '</td><td align="right">' . round($bobot,3) . '</td><td align="right">' . round($bobot,3)*100 . '%</td><td align="right">' . round($volume_lpu,3) . '</td><td align="right">' . toMoney($biaya) . '</td><td align="right">' . round($persen,3) . '</td><td align="right">' . round($persen,3)*100 . '%</td></tr>';
										$jumlah += $sub_total;
										$sub_jumlah += $sub_total;
										$sub_bobot += $bobot;
										$jumlah_bobot += $bobot;
										$sub_jumlah_realisasi += $biaya;
										$sub_bobot_realisasi += $persen;
										$jumlah_realisasi += $biaya;
										$jumlah_bobot_realisasi += $persen;
									}
									if(count($subcon)>0){
										foreach($subcon as $x){
											if(floatval($x["SUBCON_TIPE_ID"]) == 3){
												$sub_total = floatval($x["SUBCON_HARGA"])*floatval($x["DETAIL_PEKERJAAN_VOLUME"]);
												$bobot = $sub_total/$rap;
												$volume_lpb = floatval($x["VOLUME_LAPORAN"]);
												$biaya = $volume_lpb * floatval($x["HARGA_LAPORAN"]);
												$persen = $biaya/$rap;
												$item .= '<tr class="item_rap_detail"><td>'.$x["SUBCON_NAMA"].'</td><td>'.$x["SUBCON_TIPE_KODE"].'</td><td>'.$x["DETAIL_PEKERJAAN_VOLUME"].'</td><td>'.$x["SATUAN_UPAH_NAMA"].'</td><td align="right">'.toMoney($x["SUBCON_HARGA"]).'</td><td align="right">'.toMoney($sub_total).'</td><td align="right">' . round($bobot,3) . '</td><td align="right">' . round($bobot,3)*100 . '%</td><td align="right">' . round($volume_lpb,3) . '</td><td align="right">' . toMoney($biaya) . '</td><td align="right">' . round($persen,3) . '</td><td align="right">' . round($persen,3)*100 . '%</td></tr>';
												$jumlah += (floatval($x["SUBCON_HARGA"])*floatval($x["DETAIL_PEKERJAAN_VOLUME"]));
												$sub_jumlah += (floatval($x["SUBCON_HARGA"])*floatval($x["DETAIL_PEKERJAAN_VOLUME"]));
												$sub_bobot += $bobot;
												$jumlah_bobot += $bobot;
												$sub_jumlah_realisasi += $biaya;
												$sub_bobot_realisasi += $persen;
												$jumlah_realisasi += $biaya;
												$jumlah_bobot_realisasi += $persen;
											}
										}
									}
									$item .= '<tr class="item_rap_detail"><td colspan="5" align="right"><b>JUMLAH SUBTOTAL</b></td><td align="right">' . toMoney($sub_jumlah) . '</td><td align="right">' . round($sub_bobot,3) . '</td><td align="right">' . round($sub_bobot,3)*100 . '%</td><td></td><td align="right">' . toMoney($sub_jumlah_realisasi) . '</td><td align="right">' . round($sub_bobot_realisasi,3) . '</td><td align="right">' . round($sub_bobot_realisasi,3)*100 . '%</td></tr>';
									$sub_bobot_lpu = $sub_bobot;
									$sub_bobot_lpu_realisasi = $sub_bobot_realisasi;
									$sub_jumlah_lpu = $sub_jumlah;
									$sub_jumlah_lpu_realisasi = $sub_jumlah_realisasi;
									$sub_jumlah = 0;
									$sub_bobot = 0;
									$sub_jumlah_realisasi = 0;
									$sub_bobot_realisasi = 0;
								}
								if(count($subcon)>0){
									$item .= '<tr class="item_rap_detail"><td colspan="13"><b>SUBCON</b></td></tr>';
									foreach($subcon as $x){
										if(floatval($x["SUBCON_TIPE_ID"]) == 1){
											$sub_total = floatval($x["SUBCON_HARGA"])*floatval($x["DETAIL_PEKERJAAN_VOLUME"]);
											$bobot = $sub_total/$rap;
											$volume_lpb = floatval($x["VOLUME_LAPORAN"]);
											$biaya = $volume_lpb * floatval($x["HARGA_LAPORAN"]);
											$persen = $biaya/$rap;
											$item .= '<tr class="item_rap_detail"><td>'.$x["SUBCON_NAMA"].'</td><td>'.$x["SUBCON_TIPE_KODE"].'</td><td>'.$x["SATUAN_NAMA"].'</td><td align="right">'.toMoney($x["SUBCON_HARGA"]).'</td><td>'.$x["DETAIL_PEKERJAAN_VOLUME"].'</td><td align="right">'.toMoney($sub_total).'</td><td align="right">' . round($bobot,3) . '</td><td align="right">' . round($bobot,3)*100 . '%</td><td align="right">' . round($volume_lpb,3) . '</td><td align="right">' . toMoney($biaya) . '</td><td align="right">' . round($persen,3) . '</td><td align="right">' . round($persen,3)*100 . '%</td></tr>';
											$jumlah += (floatval($x["SUBCON_HARGA"])*floatval($x["DETAIL_PEKERJAAN_VOLUME"]));
											$sub_jumlah += (floatval($x["SUBCON_HARGA"])*floatval($x["DETAIL_PEKERJAAN_VOLUME"]));
											$sub_bobot += $bobot;
											$jumlah_bobot += $bobot;
											$sub_jumlah_realisasi += $biaya;
											$sub_bobot_realisasi += $persen;
											$jumlah_realisasi += $biaya;
											$jumlah_bobot_realisasi += $persen;
										}
									}
									$item .= '<tr class="item_rap_detail"><td colspan="5" align="right"><b>JUMLAH SUBTOTAL</b></td><td align="right">' . toMoney($sub_jumlah) . '</td><td align="right">' . round($sub_bobot,3) . '</td><td align="right">' . round($sub_bobot,3)*100 . '%</td><td></td><td align="right">' . toMoney($sub_jumlah_realisasi) . '</td><td align="right">' . round($sub_bobot_realisasi,3) . '</td><td align="right">' . round($sub_bobot_realisasi,3)*100 . '%</td></tr>';
									$sub_jumlah = 0;
									$sub_bobot = 0;
									$sub_jumlah_realisasi = 0;
									$sub_bobot_realisasi = 0;
								}
								echo $item;
							?>
						</tbody>
						<tfoot>
							<?php
								$item = '';
								$item .= '<tr class="item_rab_detail"><td colspan="5" style="background-color: #167CAC;"><b style="color: #FFF">JUMLAH TOTAL</b></td><td align="right" style="background-color: #167CAC; color: #FFF">' . toMoney($jumlah) . '</td><td align="right" style="background-color: #167CAC; color: #FFF">' . round($jumlah_bobot,0) . '</td><td align="right" style="background-color: #167CAC; color: #FFF">' . round($jumlah_bobot*100,0) . '%</td><td align="right" style="background-color: #167CAC; color: #FFF"></td><td align="right" style="background-color: #167CAC; color: #FFF">' . toMoney($jumlah_realisasi) . '</td><td align="right" style="background-color: #167CAC; color: #FFF">' . round($jumlah_bobot_realisasi,3) . '</td><td align="right" style="background-color: #167CAC; color: #FFF">' . round($jumlah_bobot_realisasi*100,3) . '%</td></tr>';
								$item .= '<tr class="item_rab_detail"><td colspan="11" align="right" style="background-color: #167CAC;"><b style="color: #FFF">PROSENTASE PELAKSANAAN BERDASARKAN UPAH</b></td><td align="right" style="background-color: #167CAC; color: #FFF">' . round(($sub_jumlah_lpu_realisasi/$sub_jumlah_lpu)*100,3) . '%</td></tr>';
								$item .= '<tr class="item_rab_pekerjaan"><td colspan="5" style="background-color: #167CAC;"><b style="color: #FFF">OVERHEAD (5 %)</b></td><td align="right" style="background-color: #167CAC; color: #FFF">' . toMoney(0.05*$jumlah) . '</td></tr>';
								$item .= '<tr class="item_rab_pekerjaan"><td colspan="5" style="background-color: #167CAC;"><b style="color: #FFF">TOTAL SETELAH OVERHEAD</b></td><td align="right" style="background-color: #167CAC; color: #FFF">' . toMoney(1.05*$jumlah) . '</td></tr>';
								echo $item;
								$this->mProject->_update(array('PROJECT_PROGRES' => round($jumlah_bobot_realisasi*100,3), 'PROJECT_PROGRES_UPAH' => round($sub_jumlah_lpu_realisasi/$sub_jumlah_lpu*100,3)), array(mProject::ID => $PROJECT['PROJECT_ID']));
							?>
						</tfoot>
					</table>
			</div>
		</div>
	</div>
	<br/><br/>
</div>
