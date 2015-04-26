<html>
	<head>
		<title><?php echo $judul; ?></title>
		<link href="<?php echo base_url('css');?>/style.css" rel="stylesheet">
	</head>
	<body>
		<h1><?php echo $judul; ?></h1>
		<hr>
		<a href="<?php echo site_url ('c_daerah/insert_kota')?>">[ Tambah ]</a>
		<table cellpadding="5" cellspacing="5" width="100%" style="font-weight:bold;font-size:13px;">
			<tr>
				<th id="judul">No</td>
				<th id="judul">Nama</td>
				<th id="judul" colspan="2">Action</td>
			</tr>
			<?php
			$no = 1;
			?>
			<?php foreach ($daftar as $a)	{?>
			<tr id="hd" class="hd">
				<td class="hd"><?php echo $no++ ?></td>
				<td class="hd"><?php echo $a->NAMA_KOTAKAB; ?></td>
				<td class="hd">
					<a href="<?php echo site_url ('c_daerah/edit_kota/'.$a->ID_KOTAKAB)?>"><input type="submit" value="Edit" class="submitButton"></a></td><td class="hd">
				<a href="<?php echo site_url ('c_daerah/doDelete_kota/'.$a->ID_KOTAKAB)?>"><input type="submit" value="Delete" class="submitButton"></a></td>
			</tr>
			<?php } ?>
		</table>
		<hr>
		
	</body>
</html>
