<html>
	<head>
	<title><?php echo"$judul"; ?></title>
		<link href="<?php echo base_url('css');?>/style.css" rel="stylesheet">
	</head>
	<body>
		<h1><?php echo"$judul";?></h1>
		<hr>
		<fieldset>
			<legend><h3>Tambah Data Kota/Kabupaten</h3></legend>
			<form method="POST" action="<?php echo site_url('C_daerah/doInsert_kota'); ?>">
				<input type="text" name="nama_kotakab" placeholder="Kota / Kabupaten"/>
				
				<input type="submit" name="simpan" value="Simpan" class="submitButton">
				<a href="<?php echo site_url ('c_daerah');?>">[ Home ]</a>
			</form>
		</fieldset>
		<hr>
	</body>
</html>
