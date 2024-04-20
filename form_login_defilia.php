<body background="other-rock-wall-backgrounds-powerpoint.jpg"><br><br><br>
 <center><fieldset style="border-color:#000000; width:500px; height:590px;">
    <legend align="center" style="color:#000000; font-size:18px; width:250px;"><b>SELAMAT DATANG DI HALAMAN LOGIN SISWA</b></legend>
	<br>
<title>WEBSITE DEFILIA FATIKASARI</title>
    <style type="text/css">
    body {font-family:arial;font-size:14px;}
    .kotak_login {width: 350px;background: pink;padding: 20px 20px;box-shadow: 0px 0px 100px 4px #d6d6d6;}
    .form_login {width:350px ;padding: 10px;font-size: 11pt;margin-bottom: 20px; background-color:#CCCCCC; text-align:center;}
    .tombol_login {background: #2aa7e2;color: white;font-size: 11pt;width: 100%;border: none;border-radius: 3px;padding: 10px 20px;}
</style>
	<div class="kotak_login">
		<form name="form1" method="post" action="login_defilia.php">
		<label><img src="verified.png" style="width:200px; height:200px;"/>
        </label><br><br>
			<input type="text" name="USERNAME_DEFILIA" class="form_login" placeholder="Username" required="required">

			<input type="password" name="PASSWORD_DEFILIA" class="form_login" placeholder="Password" required="required">

			<input type="submit" class="tombol_login" value="LOGIN">

			<br/><br>
			<p align="center">Copyright 2022- Defilia Fatikasari</p>
		<center><p>Jumlah Kunjungan :
			<?php 
			
include'koneksi_defilia.php';

// Kueri SELECT
$result = $mysqli->query("SELECT KUNJUNGAN_DEFILIA FROM logging_defilia");
$row = $result->fetch_array(MYSQLI_NUM);
$kunjungan = $row[0];

// Kueri UPDATE
$mysqli->query("UPDATE logging_defilia SET KUNJUNGAN_DEFILIA = ($kunjungan + 1)");

// Kueri SELECT lagi untuk mendapatkan jumlah yang diperbarui
$result = $mysqli->query("SELECT KUNJUNGAN_DEFILIA FROM logging_defilia");
$row = $result->fetch_array(MYSQLI_NUM);
echo $row[0];

/**$ceklogin=mysql_query("insert into logging_defilia (KUNJUNGAN_DEFILIA) values (1)");
$ceklogin=mysql_query("select count(KUNJUNGAN_DEFILIA) from  logging_defilia ");
$ff=mysql_fetch_array($ceklogin);
echo $ff[0];
**/
//echo "insert into logging_defilia (KUNJUNGAN_DEFILIA) values (1)";
?></p></center>
<center><p>Tanggal Terakhir Kunjungan :
			<?php 
			
include'koneksi_defilia.php';

date_default_timezone_set('Asia/Jakarta');
$tanggal = date("Y-m-d H:i:s");
echo $tanggal;
?></p></center>
		</form>
	</div>
	</fieldset></center>
</body>