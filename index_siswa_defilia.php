<!DOCTYPE html>
<html>
<head>
<title>WEBSITE DEFILIA FATIKASARI</title>
<style type="text/css">
    body {font-family:arial;font-size:14px;)}
    #canvas {background:#ffffbf;width:960px;margin:0 auto;border:1px solid silver;}
	#header {font-size:35px; background:url(bg.jpg); padding:20px; background-size:1000px; text-align:right; height:90px; color:#006600;}
	#menu {background-color:#CCCCCC;}
	#menu ul {list-style:none; margin:0; padding:0;}
	#menu ul li {display:inline-table;}
	#menu ul li a {display:block; text-decoration:none; line-height:40px; padding:0 10px; color:#FFFFFF; font-family:"Times New Roman", Times, serif;}
	#isi {width: 900px;background: pink;/*meletakkan form ke tengah*/margin: 10px auto;padding: 30px 20px;box-shadow: 0px 0px 100px 4px #d6d6d6;font-size:17px}
	#footer {background-color:#ccc;text-align:center;padding:20px;}
</style>
</head>
<body background= "other-rock-wall-backgrounds-powerpoint.jpg"><br>
<div id="canvas">
     <div id="header">
	 <b>DATA SISWA SMKN 3 PAMEKASAN</b><br>
	 <b style="font-size:18px;">JL.KABUPATEN NO.103 PAMEKASAN<b>
	 </div>
	 <div id="menu">
	      <ul>
		      <li style="background-color:#666666;"><a href="?page=home">HOME</a></li>
			  <li style="background-color:#666666;"><a href="?page=siswa">INPUT DATA SISWA</a></li>
			  <li style="background-color:#666666;"><a href="?page=nilaisiswa">TAMPIL NILAI SISWA</a></li>
			  <li style="background-color:#666666;"><a href="Cetaklaporan_nilaisiswa_defilia.php" target="_blank">CETAK LAPORAN NILAI</a></li>
			  <li style="background-color:pink; float:right;"><a href="logout_defilia.php" onClick="return confirm('Yakin akan Keluar dari Web ini?')">LOGOUT</a></li>
		  </ul>
	</div><br>
	<div id="isi">
	<?php
	$page = @$_GET['page'];
	if($page == "nilaisiswa") {
	include "form_lihat_nilaisiswa_defiliaguru.php"; }
	else if ($page == "siswa") {
	include "form_input_siswa_defilia.php"; }
	else if($page == "home") {
	echo "<center><b>ANDA LOGIN SEBAGAI GURU</b></center>";}
	?>
	</div><br>
	<div id="footer">
	Copyright 2022-Defilia Fatikasari
	</div>
	</div>
</body>
</html>