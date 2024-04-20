<!DOCTYPE html>
<html>
<head>
    <title>Website Defilia Fatikasari</title>
    <style type="text/css">
	.form_data {
        /*membuat lebar form penuh*/
        box-sizing : border-box;
        width: 100%;
        padding: 10px;
        font-size: 11pt;
        margin-bottom: 10px;
    }
    </style>
</head>
<body>
<fieldset style="border-color:#FFFFFF; width:870px;">
    <legend align="center" style="color:#FFFFFF; font-size:18px; width:370px;"><b>SILAHKAN MASUKAN DATA SISWA</b></legend>
	<form name="form1" action="input_siswa_defilia.php" method="post" enctype="multipart/form-data">
	<table width="400" border="0" align="center" cellpadding="0" bgcolor="#9999FF">
    <tr>
      <th>NAMA SISWA</th>
      <td><label>
        <input type="text" name="NAMA_SISWA_DEFILIA" class="form_data" placeholder="MASUKAN NAMA SISWA" required="required" id="namasiswa">
      </label></td>
    </tr>
    <tr>
      <th>KELAS</th>
      <td><label>
        <select name="KELAS_DEFILIA" id="kelas" class="form_data">
        <option>--PILIH KELAS SISWA--</option>
        <option value="XII RPL 1">XII RPL 1</option> 
        <option value="XII RPL 2">XII RPL 2</option>
		<option value="XII RPL 3">XII RPL 3</option>
        </select>
      </label></td>
    </tr>
	<tr>
      <th>FOTO</th>
      <td><label>
        <input type="file" name="FOTO_DEFILIA" id="<?php echo $array['FOTO_DEFILIA'];?>">
      </label></td>
    </tr>
	<tr>
	<th></th>
	<td><label>
	<br><input type="submit" name="button" id="button" value="SIMPAN"></label></td>
	</tr>
  </table>
	</form>
	</fieldset><br>
<fieldset style="border-color:#FFFFFF;">
    <legend align="center" style="color:#FFFFFF; font-size:18px; width:170px;"><b>DATA SISWA</b></legend>
<form action="index_siswa_defilia.php" method="GET">
	<table width="400" border="0" align="center">
	<input type="hidden" name="page" value="siswa">
    <tr bgcolor="#99CCCC">
      <td width="148"><div align="center"><strong>CARI DATA NILAI SISWA</strong></div></td>
      <td width="153"><label>
	<input type="text" name="kata">
    </label></td>
	</tr>
    <tr bgcolor="#99CCFF">
      <td></td>
      <td><label>
	<input type="submit" name="Cari" value="Cari">
	<input type="submit" name="Bersihkan" value="Bersihkan">
	 </label></td>
    </tr>
  </table>
</form>
<form name="form2" method="post" action="multidelete_siswa_defilia.php">
<table align="center" width="870" border="1" bgcolor="#99CCFF">
		  <tr>
    <th width="50" scope="col"><div align="center">NO</th>
    <th width="300" scope="col">NAMA SISWA</th>
    <th width="200" scope="col">KELAS</th>
    <th width="170"><div align="center">FOTO</div></th>
	<th width="70" scope="col">EDIT</th>
    <th colspan="2" scope="col">DELETE</th>
    	 </tr>
</fieldset>

     <?php
	    include 'koneksi_defilia.php';
	if(isset($_GET['Cari'])){
	    $no=1;
		$cari = $_GET['kata'];
		//echo "select * from siswa_defilia where NAMA_SISWA_DEFILIA like '%$cari%'";
		$ambil = mysqli_query($mysqli, "select * from siswa_defilia where KELAS_DEFILIA like '%$cari%'");				
	}else{
	    $no=1;
		$ambil = mysqli_query($mysqli, "SELECT * FROM siswa_defilia ORDER BY KELAS_DEFILIA ASC");
		//echo "SELECT * From siswa_defilia";
	}
        while($array = mysqli_fetch_array($ambil))
        {
        ?>
		
  <tr bgcolor="#99FFFF">
  	<td><div align="center"><?php echo"$no"; $no++;?></div></td>
    <td><div align="center"><a href="form_input_nilaisiswa_defilia.php?idnya=<?php echo $array['ID_SISWA_DEFILIA'];?>"><?php echo"$array[NAMA_SISWA_DEFILIA]";?></a></div></td>
    <td><div align="center"><?php echo"$array[KELAS_DEFILIA]";?></div></td>
	<td><div align="center"><img src="<?php echo"FOTO_DEFILIA/".$array['FOTO_DEFILIA'];?> "width="60" height="48"></div></td>
	<td width="50"><div align="center"><a href="form_edit_siswa_defilia.php?ID_SISWA_DEFILIA=<?php echo $array['ID_SISWA_DEFILIA']; ?>"><img src="user.png" style="width:20px; height:20px;"/></a></div></td>
    <td width="56"><div align="center"><a href="delete_siswa_defilia.php?ID_SISWA_DEFILIA=<?php echo $array['ID_SISWA_DEFILIA']; ?>" onClick="return confirm('Yakin akan dihapus?')"><img src="delete.png" style="width:20px; height:20px;"/></a></div></td>
    <td width="45"><div align="center">
      
        <label>
		<input type="checkbox" name="pilih[]" id="<?php echo $no; ?>" value="<?php echo $array['ID_SISWA_DEFILIA'];?>"/>
          </label>
		  </form></td>
		  </tr>
<?php
  }
  ?>
  <tr><td colspan="7" align="right"><input type="submit" value="Hapus" name="Hapus"></td></tr>
</table>
</body>
</html>
