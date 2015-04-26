<html>
	<head>
	<title><?php echo"$judul"; ?></title>
		<link href="<?php echo base_url('css');?>/style.css" rel="stylesheet">
	</head>
	<body>
		<h1><?php echo"$judul";?></h1>
		<hr>
		<fieldset>
			<legend><h3>Update Pengguna</h3></legend>
			<form method="POST" action="<?php echo site_url('c_user/doEdit'); ?>">
				<?php foreach($daftar->result() as $a):?>
					<input type="hidden" name="id_pengguna" value="<?php echo ($a->ID_PENGGUNA);?>"/>
					<input type="text" name="username" value="<?php echo $a->USERNAME;?>"/>
					<input type="text" name="akses_level" value="<?php echo $a->AKSES_LEVEL;?>"/>
					
					<input type="submit" name="simpan" value="Update" class="submitButton">
					<a href="<?php echo site_url ('c_user');?>">[ Home ]</a></td>
				<?php endforeach; ?>
			</form>
		</fieldset>
		<hr>
	
	</body>
</html>
