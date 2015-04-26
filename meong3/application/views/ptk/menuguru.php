<!doctype html>
<html lang=''>
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="asset/ptk/cssmenu/styles.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="asset/ptk/script.js"></script>
   <title>CSS MenuMaker</title>
</head>
<body>

<div id='cssmenu'>
<ul>
   <li><a href="index.php/ptk/berandaGuru"><span>Home</span></a></li>
   <li class='last'><a href="index.php/penilaian/guruMataPelajaran"><span>Fisika Kelompok</span></a></li>
   <!-- start: User Dropdown -->
                  <li class="dropdown">
                     <a data-toggle="dropdown" href="#">
                        <i class="halflings-icon white user"></i>nama
                        <span class="caret"></span>
                     </a>
                     <ul class="dropdown-menu">
                        <li><a href="#"><i class="halflings-icon user"></i>Profil Saya</a></li>
                        <li><a href="login.html"><i class="halflings-icon off"></i> Logout</a></li>
                     </ul>
                  </li>
                  <!-- end: User Dropdown -->
</ul>
</div>

</body>
<html>
