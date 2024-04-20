<?php	
	session_start();
?>
<html>
<head>
    <title>WEBSITE DEFILIA FATIKASARI</title>
    <style type="text/css">
        #footer {
            background-color: #FF9999;
            text-align: center;
            padding: 10px;
            width: 830px;
        }
    </style>
</head>
<body background="other-rock-wall-backgrounds-powerpoint.jpg">
    <br><br>
    <center><b style="font-size:18px;">ANDA LOGIN SEBAGAI SISWA<b></center>
    <fieldset style="border-color:#FFFFFF; width:1230px;">
        <legend align="center" style="font-size:18px; width:250px;"><b>DATA NILAI DAN SISWA</b></legend>
        <center>
            <p style="background-color:pink; text-align:center; width:100px;">
                <a href="logout_defilia.php" onClick="return confirm('Yakin akan dihapus?')">LOGOUT</a>
            </p>
        </center>
        <form action="form_lihat_nilaisiswa_defilia.php" method="GET">
            <table width="400" border="0" align="center">
                <input type="hidden" name="page" value="siswa">
                <tr bgcolor="#FF99CC">
                    <td width="148"><div align="center"><strong>CARI DATA NILAI SISWA</strong></div></td>
                    <td width="153"><label>
                        <input type="text" name="kata">
                    </label></td>
                </tr>
                <tr bgcolor="#FFCCCC">
                    <td></td>
                    <td><label>
                        <input type="submit" name="Cari" value="Cari">
                        <input type="submit" name="Bersihkan" value="Bersihkan">
                    </label></td>
                </tr>
            </table>
        </form>
        <table align="center" width="850" border="1" bgcolor="#00CC00">
            <tr bgcolor="#FF99FF" height="50px">
                <th width="100" scope="col">NO</th>
                <th width="400" scope="col">NAMA SISWA</th>
                <th width="300" scope="col">KELAS</th>
                <th width="170"><div align="center">FOTO</div></th>
                <th width="200" scope="col">MATEMATIKA</th>
                <th width="200" scope="col">BAHASA INDONESIA</th>
                <th width="200" scope="col">BAHASA INGGRIS</th>
                <th width="200" scope="col">TEORI KEJURUAN</th>
            </tr>

            <?php
            include 'koneksi_defilia.php';
            if (isset($_GET['Cari'])) {
                $no = 1;
                $cari = $_GET['kata'];
                $ambil = mysqli_query($mysqli, "SELECT * FROM siswa_defilia WHERE KELAS_DEFILIA LIKE '%$cari%'");
            } else {
                $no = 1;
                $ambil = mysqli_query($mysqli, "SELECT * FROM siswa_defilia ORDER BY KELAS_DEFILIA ASC");
            }
            while ($array = mysqli_fetch_array($ambil)) {
            ?>
                <tr bgcolor="#FFCCFF" height="5px">
                    <td><div align="center"><?php echo "$no";
                                            $no++; ?></div></td>
                    <td><div align="center"><?php
                                            $amb = mysqli_query($mysqli, "SELECT * FROM nilai_defilia WHERE ID_SISWA_DEFILIA='$array[ID_SISWA_DEFILIA]'");
                                            $arr = mysqli_fetch_array($amb);
                                            echo "$array[NAMA_SISWA_DEFILIA]";
                                            ?></div></td>

                    <td><div align="center"><?php echo "$array[KELAS_DEFILIA]"; ?></div></td>
                    <td><div align="center"><img src="<?php echo "FOTO_DEFILIA/" . $array['FOTO_DEFILIA']; ?> "width="60" height="48"></div></td>
                    <td><div align="center"><?php echo "$arr[MATEMATIKA_DEFILIA]"; ?></div></td>
                    <td><div align="center"><?php echo "$arr[BAHASA_INDONESIA_DEFILIA]"; ?></div></td>
                    <td><div align="center"><?php echo "$arr[BAHASA_INGGRIS_DEFILIA]"; ?></div></td>
                    <td><div align="center"><?php echo "$arr[TEORI_KEJURUAN_DEFILIA]"; ?></div></td>
                </tr>
            <?php
            }
            ?>
        </table>
        <center>
            <div id="footer">
                Copyright 2022-Defilia Fatikasari
            </div>
        </center>
    </fieldset>
</body>
</html>
