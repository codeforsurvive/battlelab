<html>
	<head>
		<title><?php echo $judul; ?></title>
		<link href="<?php echo base_url('css');?>/style.css" rel="stylesheet">
	</head>
	<body>
		<h1><?php echo $judul; ?></h1>
		<hr>
		<a href="<?php echo site_url ('c_user/insert')?>">[ Tambah ]</a>
		<table cellpadding="5" cellspacing="5" width="100%" style="font-weight:bold;font-size:13px;">
			<tr>
				<th id="judul">No</td>
				<th id="judul">Username</td>
				<th id="judul">Akses Level</td>
				<th id="judul">Password</td>
				<th id="judul" colspan="2">Action</td>
			</tr>
			<?php
			$no = 1;
			?>
			<?php foreach ($daftar as $a)	{?>
			<tr id="hd" class="hd">
				<td class="hd"><?php echo $no++ ?></td>
				<td class="hd"><?php echo $a->USERNAME; ?></td>
				<td class="hd"><?php echo $a->AKSES_LEVEL; ?></td>
				<td class="hd"><?php echo $a->PASSWORD; ?></td>
				<td class="hd">
				<a href="<?php echo site_url ('c_user/edit/'.$a->ID_PENGGUNA)?>"><input type="submit" value="Edit" class="submitButton"></a></td><td class="hd">
				<a href="<?php echo site_url ('c_user/doDelete/'.$a->ID_PENGGUNA)?>"><input type="submit" value="Delete" class="submitButton"></a></td>
			</tr>
			<?php } ?>
		</table>
		<hr>
		
	</body>
</html>
