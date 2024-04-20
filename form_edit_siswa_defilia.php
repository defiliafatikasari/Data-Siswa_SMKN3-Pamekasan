<?php
include 'koneksi_defilia.php';

if(isset($_GET['ID_SISWA_DEFILIA'])){
    $idsiswa = $_GET['ID_SISWA_DEFILIA'];
    $ambil = mysqli_query($mysqli, "SELECT * FROM siswa_defilia WHERE ID_SISWA_DEFILIA='$idsiswa'");
    $array = mysqli_fetch_array($ambil);
    $kelas = array('XII RPL 1','XII RPL 2','XII RPL 3');
?>

<head>
    <title>WEBSITE DEFILIA FATIKASARI</title>
    <style type="text/css">
        .kotak_data {
            width: 600px;
            background: #ffffbf;
            margin: 80px auto;
            padding: 30px 20px;
            box-shadow: 0px 0px 100px 4px #d6d6d6;
            font-size:20px
        }
        .form_data {
            /*membuat lebar form penuh*/
            box-sizing: border-box;
            width: 100%;
            padding: 10px;
            font-size: 11pt;
            margin-bottom: 20px;
        }
        .tombol_data {
            background: #2aa7e2;
            color: white;
            font-size: 11pt;
            width: 100%;
            border: none;
            border-radius: 3px;
            padding: 10px 20px;
        }
        #footer {
            background-color:#ccc;
            text-align:center;
            padding:20px;
        }
    </style>
</head>
<body background="other-rock-wall-backgrounds-powerpoint.jpg">
    <div class="kotak_data">
        <fieldset style="border-color:#FFFFFF;">
            <legend align="center" style="font-size:18px;"><b>EDIT DATA SISWA</b></legend>
            <form name="form1" method="post" action="edit_siswa_defilia.php" enctype="multipart/form-data">
                <input type=hidden name=ID_SISWA_DEFILIA value="<?php echo $idsiswa; ?>" /> 
                <p align="center"><img src="user.png" style="width:100px; height:100px;"/></p>
                <table width="500" border="0" align="center" cellpadding="0">
                    <tr>
                        <td bgcolor="pink"><div align="center"><b>FOTO</b></div></td>
                        <td bgcolor="pink">
                            <label>
                                <input type="hidden" value="<?php echo $_GET['ID_SISWA_DEFILIA']; ?>" name="ID_SISWA_DEFILIA" />
                                <input name="FOTO_DEFILIA" type="file" id="foto" /><br /><img width="100" src="<?php echo "foto_defilia/{$array['FOTO_DEFILIA']}"; ?>"/>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <th bgcolor="#99CCFF"><div align="center"><b>NAMA SISWA</b></div></th>
                        <td bgcolor="#99CCFF">
                            <label>
                                <br><input type="text" name="NAMA_SISWA_DEFILIA" class="form_data" id="nama" value="<?php echo $array['NAMA_SISWA_DEFILIA']; ?>"/>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <th bgcolor="pink">KELAS</th>
                        <td bgcolor="pink">
                            <label>
                                <select name="KELAS_DEFILIA" class="form_data">
                                    <?php
                                    foreach ($kelas as $k){
                                        echo "<option value='$k'";
                                        if($array['KELAS_DEFILIA']==$k){ echo "selected=selected";}
                                        echo ">$k</option>"; 
                                    }
                                    ?>
                                </select>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <th bgcolor="#99CCFF"></th>
                        <td bgcolor="#99CCFF">
                            <label>
                                <input type="submit" name="button" class="tombol_data" value="SIMPAN PERUBAHAN">
                            </label>
                        </td>
                    </tr>
                </table>
            </form>
        </fieldset>
    </div>
    <div align="center">
        <a href="index_siswa_defilia.php?page=siswa"><img src="left.png" style="width:30px; height:30px;"/></a>
    </div>
    <div id="footer">
        Copyright 2021- Defilia Fatikasari
    </div>
</body>
</html>

<?php
} else {
    echo "ID siswa tidak tersedia";
}
?>
