<html>
	<head>
	<title><?php echo"$judul"; ?></title>
		<link href="<?php echo base_url('css');?>/style.css" rel="stylesheet">
	</head>
	<body>
		<h1><?php echo"$judul";?></h1>
		<hr>
		<fieldset>
			<legend><h3>Tambah Data Pengguna</h3></legend>
			<form method="POST" action="<?php echo site_url('c_user/doInsert'); ?>">
				<input type="text" name="username" placeholder=""/>
				<input type="text" name="akses_level" placeholder=""/>
				<input type="text" name="password" placeholder="1234567"/>
				<input type="submit" name="simpan" value="Simpan" class="submitButton">
				<a href="<?php echo site_url ('c_user');?>">[ Home ]</a>
			</form>
		</fieldset>
		<hr>
	</body>
</html>
