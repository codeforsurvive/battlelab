<html>
	<head>
	<title><?php echo"$judul"; ?></title>
		<link href="<?php echo base_url('css');?>/style.css" rel="stylesheet">
	</head>
	<body>
		<h1><?php echo"$judul";?></h1>
		<hr>
		<fieldset>
			<legend><h3>Update Data Kota/Kabupaten</h3></legend>
			<form method="POST" action="<?php echo site_url('c_daerah/doEdit_kota'); ?>">
				<?php foreach($daftar->result() as $a):?>
					<input type="hidden" name="id_kotakab" value="<?php echo($a->ID_KOTAKAB);?>"/>
					<input type="text" name="nama_kotakab" value="<?php echo $a->NAMA_KOTAKAB;?>"/>
					
					<input type="submit" name="simpan" value="Update" class="submitButton">
					<a href="<?php echo site_url ('c_daerah');?>">[ Home ]</a></td>
				<?php endforeach; ?>
			</form>
		</fieldset>
		<hr>
	
	</body>
</html>
