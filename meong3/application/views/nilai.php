<html>
	<head>
		<title><?php echo $judul; ?></title>
		<link href="<?php echo base_url('css');?>/style.css" rel="stylesheet">
	</head>
	<body>
		<h1><?php echo $judul; ?></h1>
		<hr>
		<a href="<?php echo site_url ('c_nilai/index')?>">[ Tambah ]</a>
		<table cellpadding="5" cellspacing="5" width="100%" style="font-weight:bold;font-size:13px;">
			<tr>
				<th id="judul">No</td>
				<th id="judul">Nama</td>
					<th id="judul">nilai</td>
				
			</tr>
			<?php
			$no = 1;
			?>
			<?php foreach ($daftar['nuts'] as $a)	{?>
			<tr id="hd" class="hd">
				<td class="hd"><?php echo $no++ ?></td>
				<td class="hd"><?php echo $a->NAMA_PD; ?></td>
				<td class="hd"><?php echo $a->NILAI; ?></td>
			</tr>
			<?php } 
			echo var_dump($daftar['nuts'])
			?>
		</table>
		<hr>
		
	</body>
</html>
