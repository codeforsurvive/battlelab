<?php
	function toMoney($num){
		return 'Rp '.number_format( floatval($num), 0 , '' , '.' ).',00';
	}
?>
<style>
	th, td{
		text-align: center;
	}
	
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
    <div class="widget wgreen">
        <div class="widget-head">
            <div class="pull-left">Detail Progres</div>
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
        <div class="widget-content" style="padding: 10px; min-height: 300px;">
			<div>
				<div align="right">
					<table class="table table-striped table-bordered centerTable">
						<tr>
							<td colspan="3"><h2><b>Status</b></h2></td>
							<td colspan="3"><h2><b>Total RAB</b></h2></td>
							<td colspan="3"><h2><b>Estimasi</b></h2></td>
							<td colspan="3"><h2><b>Progres</b></h2></td>
						</tr>
						<tr>
							<td colspan="3"><h2><?= $detailProject["STATUS_PROJECT_NAMA"] ?></h2></td>
							<td colspan="3"><h2><?= toMoney($detailProject["PROJECT_TOTAL"]) ?></h2></td>
							<td colspan="3"><h2><?= $detailProject["PROJECT_DURATION"] ?></h2></td>
							<td colspan="3"><h2><?= $detailProject["PROJECT_PROGRES_UPAH"] ?>%</h2></td>
						</tr>
						<tr>
							<td colspan="2"><h3><b>Total RAP</b></h3></td>
							<td colspan="2"><h3><b>RAP Material</b></h3></td>
							<td colspan="2"><h3><b>RAP Upah</b></h3></td>
							<td colspan="2"><h3><b>Total Overhead</b></h3></td>
							<td colspan="2"><h3><b>Overhead Material</b></h3></td>
							<td colspan="2"><h3><b>Overhead Upah</b></h3></td>
						</tr>
						<tr>
							<td colspan="2"><h3><?= toMoney($detailProject["PROJECT_TOTAL_RAP"]) ?></h3></td>
							<td colspan="2"><h3><?= toMoney($detailProject["PROJECT_MATERIAL_RAP"]) ?></h3></td>
							<td colspan="2"><h3><?= toMoney($detailProject["PROJECT_UPAH_RAP"]) ?></h3></td>
							<td colspan="2"><h3><?= toMoney($detailProject["PROJECT_TOTAL_OVERHEAD"]) ?></h3></td>
							<td colspan="2"><h3><?= toMoney($detailProject["PROJECT_MATERIAL_OVERHEAD"]) ?></h3></td>
							<td colspan="2"><h3><?= toMoney($detailProject["PROJECT_UPAH_OVERHEAD"]) ?></h3></td>
						</tr>
						<tr>
							<td colspan="6"><h1><b>Material</b></h1></td>
							<td colspan="6"><h1><b>Upah</b></h1></td>
						</tr>
						<tr>
							<td colspan="2">Budget Overhead Material</td>
							<td colspan="2">Overhead Terpakai</td>
							<td colspan="2">Prosentase Pemakaian</td>
							<td colspan="2">Budget Overhead Upah</td>
							<td colspan="2">Overhead Terpakai</td>
							<td colspan="2">Prosentase Pemakaian</td>
						</tr>
						<tr>
							<td colspan="2"><?= toMoney($detailProject["PROJECT_MATERIAL_OVERHEAD"]) ?></td>
							<td colspan="2"><?= toMoney($overheadMaterial["PEMAKAIAN_OVERHEAD_MATERIAL"]) ?></td>
							<td colspan="2"><?= round(floatval($overheadMaterial["PEMAKAIAN_OVERHEAD_MATERIAL"])/floatval($detailProject["PROJECT_MATERIAL_OVERHEAD"])*100,2) ?>%</td>
							<td colspan="2"><?= toMoney($detailProject["PROJECT_UPAH_OVERHEAD"]) ?></td>
							<td colspan="2"><?= toMoney($overheadUpah["PEMAKAIAN_OVERHEAD_UPAH"]) ?></td>
							<td colspan="2"><?= round(floatval($overheadUpah["PEMAKAIAN_OVERHEAD_UPAH"])/floatval($detailProject["PROJECT_UPAH_OVERHEAD"])*100,2) ?>%</td>
						</tr>
						<tr>
							<th colspan="6">PERMINTAAN PEMBELIAN</th>
							<th colspan="6">PERMINTAAN PEKERJAAN</th>
						</tr>
						<tr>
							<td colspan="2" class="middle">PP Material<br/><b>( <?= toMoney($materialPP["PP_MATERIAL_TOTAL"]) ?> )</b></td>
							<?php $PPMaterial = round(floatval($materialPP["PP_MATERIAL_TOTAL"])/floatval($detailProject["PROJECT_MATERIAL_RAP"])*100,2); ?>
							<td colspan="4">
								<div class="progress progress-striped active">
								  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: <?= $PPMaterial; ?>%">
									<span><?= $PPMaterial; ?>% Selesai</span>
								  </div>
								</div>
							</td>
							<td colspan="2" class="middle">PK Upah<br/><b>( <?= toMoney($upahPK["PK_UPAH_TOTAL"]) ?> )</b></td>
							<?php $PKUpah = round(floatval($upahPK["PK_UPAH_TOTAL"])/floatval($detailProject["PROJECT_UPAH_RAP"])*100,2); ?>
							<td colspan="4">
								<div class="progress progress-striped active">
								  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: <?= $PKUpah; ?>%">
									<span><?= $PKUpah; ?>% Selesai</span>
								  </div>
								</div>
							</td>
						</tr>
						<tr>
							<td colspan="2" class="middle">PP Overhead<br/><b>( <?= toMoney($overheadPP["PP_OVERHEAD_TOTAL"]) ?> )</b></td>
							<?php $PPOverhead = round(floatval($overheadPP["PP_OVERHEAD_TOTAL"])/floatval($detailProject["PROJECT_MATERIAL_OVERHEAD"])*100,2); ?>
							<td colspan="4">
								<div class="progress progress-striped active">
								  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: <?= $PPOverhead; ?>%">
									<span><?= $PPOverhead; ?>% Selesai</span>
								  </div>
								</div>
							</td>
							<td colspan="2" class="middle">PK Overhead<br/><b>( <?= toMoney($overheadPK["PK_OVERHEAD_TOTAL"]) ?> )</b></td>
							<?php $PKOverhead = round(floatval($overheadPK["PK_OVERHEAD_TOTAL"])/floatval($detailProject["PROJECT_UPAH_OVERHEAD"])*100,2); ?>
							<td colspan="4">
								<div class="progress progress-striped active">
								  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: <?= $PKOverhead; ?>%">
									<span><?= $PKOverhead; ?>% Selesai</span>
								  </div>
								</div>
							</td>
						</tr>
						<tr>
							<th colspan="6">PURCHASE ORDER</th>
							<th colspan="6">OPNAME</th>
						</tr>
						<tr>
							<td colspan="2" class="middle">PO Material<br/><b>( <?= toMoney($materialPO["PO_MATERIAL_TOTAL"]) ?> )</b></td>
							<?php $POMaterial = round(floatval($materialPO["PO_MATERIAL_TOTAL"])/floatval($detailProject["PROJECT_MATERIAL_RAP"])*100,2); ?>
							<td colspan="4">
								<div class="progress progress-striped active">
								  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: <?= $POMaterial; ?>%">
									<span><?= $POMaterial; ?>% Selesai</span>
								  </div>
								</div>
							</td>
							<td colspan="2" class="middle">Opname Upah<br/><b>( <?= toMoney($upahOP["OPNAME_UPAH_TOTAL"]) ?> )</b></td>
							<?php $OPUpah = round(floatval($upahOP["OPNAME_UPAH_TOTAL"])/floatval($detailProject["PROJECT_UPAH_RAP"])*100,2); ?>
							<td colspan="4">
								<div class="progress progress-striped active">
								  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: <?= $OPUpah; ?>%">
									<span><?= $OPUpah; ?>% Selesai</span>
								  </div>
								</div>
							</td>
						</tr>
						<tr>
							<td colspan="2" class="middle">PO Overhead<br/><b>( <?= toMoney($overheadPO["PO_OVERHEAD_TOTAL"]) ?> )</b></td>
							<?php $POOverhead = round(floatval($overheadPO["PO_OVERHEAD_TOTAL"])/floatval($detailProject["PROJECT_MATERIAL_OVERHEAD"])*100,2); ?>
							<td colspan="4">
								<div class="progress progress-striped active">
								  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: <?= $POOverhead; ?>%">
									<span><?= $POOverhead; ?>% Selesai</span>
								  </div>
								</div>
							</td>
							<td colspan="2" class="middle">Opname Overhead<br/><b>( <?= toMoney($overheadOP["OPNAME_OVERHEAD_TOTAL"]) ?> )</b></td>
							<?php $OPOverhead = round(floatval($overheadOP["OPNAME_OVERHEAD_TOTAL"])/floatval($detailProject["PROJECT_UPAH_OVERHEAD"])*100,2); ?>
							<td colspan="4">
								<div class="progress progress-striped active">
								  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: <?= $OPOverhead; ?>%">
									<span><?= $OPOverhead; ?>% Selesai</span>
								  </div>
								</div>
							</td>
						</tr>
						<tr>
							<th colspan="6">PENERIMAAN BARANG</th>
							<th colspan="6">PERMINTAAN UPAH</th>
						</tr>
						<tr>
							<td colspan="2" class="middle">LPB Material<br/><b>( <?= toMoney($materialLPB["LPB_MATERIAL_TOTAL"]) ?> )</b></td>
							<?php $LPBMaterial = round(floatval($materialLPB["LPB_MATERIAL_TOTAL"])/floatval($detailProject["PROJECT_MATERIAL_RAP"])*100,2); ?>
							<td colspan="4">
								<div class="progress progress-striped active">
								  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: <?= $LPBMaterial; ?>%">
									<span><?= $LPBMaterial; ?>% Selesai</span>
								  </div>
								</div>
							</td>
							<td colspan="2" class="middle">LPU Upah<br/><b>( <?= toMoney($upahLPU["LPU_UPAH_TOTAL"]) ?> )</b></td>
							<?php $LPUUpah = round(floatval($upahLPU["LPU_UPAH_TOTAL"])/floatval($detailProject["PROJECT_UPAH_RAP"])*100,2); ?>
							<td colspan="4">
								<div class="progress progress-striped active">
								  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: <?= $LPUUpah; ?>%">
									<span><?= $LPUUpah; ?>% Selesai</span>
								  </div>
								</div>
							</td>
						</tr>
						<tr>
							<td colspan="2" class="middle">LPB Overhead<br/><b>( <?= toMoney($overheadLPB["LPB_OVERHEAD_TOTAL"]) ?> )</b></td>
							<?php $LPBOverhead = round(floatval($overheadLPB["LPB_OVERHEAD_TOTAL"])/floatval($detailProject["PROJECT_MATERIAL_OVERHEAD"])*100,2); ?>
							<td colspan="4">
								<div class="progress progress-striped active">
								  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: <?= $LPBOverhead; ?>%">
									<span><?= $LPBOverhead; ?>% Selesai</span>
								  </div>
								</div>
							</td>
							<td colspan="2" class="middle">LPU Overhead<br/><b>( <?= toMoney($overheadLPU["LPU_OVERHEAD_TOTAL"]) ?> )</b></td>
							<?php $LPUOverhead = round(floatval($overheadLPU["LPU_OVERHEAD_TOTAL"])/floatval($detailProject["PROJECT_UPAH_OVERHEAD"])*100,2); ?>
							<td colspan="4">
								<div class="progress progress-striped active">
								  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: <?= $LPUOverhead; ?>%">
									<span><?= $LPUOverhead; ?>% Selesai</span>
								  </div>
								</div>
							</td>
						</tr>
						<tr>
							<th colspan="6">PEMBAYARAN MATERIAL</th>
							<th colspan="6">PEMBAYARAN UPAH</th>
						</tr>
						<tr>
							<td colspan="2" class="middle">Pembayaran Material<br/><b>( <?= toMoney($materialPayment["PAYMENT_MATERIAL"]) ?> )</b></td>
							<?php $PaymentMaterial = round(floatval($materialPayment["PAYMENT_MATERIAL"])/(floatval($detailProject["PROJECT_MATERIAL_OVERHEAD"])+floatval($detailProject["PROJECT_MATERIAL_RAP"]))*100,2); ?>
							<td colspan="4">
								<div class="progress progress-striped active">
								  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: <?= $PaymentMaterial; ?>%">
									<span><?= $PaymentMaterial; ?>% Selesai</span>
								  </div>
								</div>
							</td>
							<td colspan="2" class="middle">Pembayaran Upah<br/><b>( <?= toMoney($upahPayment["PAYMENT_UPAH"]) ?> )</b></td>
							<?php $PaymentUpah = round(floatval($upahPayment["PAYMENT_UPAH"])/(floatval($detailProject["PROJECT_UPAH_OVERHEAD"])+floatval($detailProject["PROJECT_UPAH_RAP"]))*100,2); ?>
							<td colspan="4">
								<div class="progress progress-striped active">
								  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: <?= $PaymentUpah; ?>%">
									<span><?= $PaymentUpah; ?>% Selesai</span>
								  </div>
								</div>
							</td>
						</tr>
						<tr>
							<td colspan="4" class="middle"></td>
							<td colspan="4" class="middle"><h2><b>Prosentase Total Pelaksanaan</b></h2></td>
							<td colspan="4" class="middle"></td>
						</tr>
						<tr>
							<td colspan="4" class="middle"></td>
							<td colspan="4">
								<div class="progress progress-striped active">
								  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: <?= $detailProject["PROJECT_PROGRES_UPAH"] ?>%">
									<span><?= $detailProject["PROJECT_PROGRES_UPAH"] ?>% Selesai</span>
								  </div>
								</div>
							</td>
							<td colspan="4" class="middle"></td>
						</tr>
					</table>
					<div class="clearfix">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
