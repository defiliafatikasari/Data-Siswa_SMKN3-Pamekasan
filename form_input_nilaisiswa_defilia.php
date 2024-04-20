<?php
session_start();
include 'koneksi_defilia.php';

// Pastikan variabel $_GET['idnya'] sudah terdefinisi sebelum digunakan
if (isset($_GET['idnya'])) {
    $idsiswa = $_GET['idnya'];
    
    // Ambil data siswa dari database berdasarkan ID
    $amb = mysqli_query($mysqli, "SELECT * FROM siswa_defilia WHERE ID_SISWA_DEFILIA='$idsiswa'");
    $arr = mysqli_fetch_array($amb);
    
    // Tampilkan data siswa dalam sebuah kotak dengan gaya yang menarik
    echo "<div class='student-info'>";
    echo "<b>{$arr['NAMA_SISWA_DEFILIA']}</b><br>";
    echo "{$arr['KELAS_DEFILIA']}<br>";
    echo "</div>";
} else {
    echo "ID siswa tidak tersedia";
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Input Data Nilai Siswa</title>
    <style type="text/css">
        body {
            background-image: url(other-rock-wall-backgrounds-powerpoint.jpg);
            font-family: Arial, sans-serif;
        }
        .student-info {
            background-color: #66FF99;
            border: 2px solid #FFFFFF;
            border-radius: 10px;
            padding: 10px;
            width: 200px;
            margin: 0 auto;
            text-align: center;
        }
        .student-info b {
            font-size: 20px;
        }
    </style>
</head>
<body><br>

<center>
    <fieldset style="border-color:#FFFFFF; width:800px;">
        <legend align="center" style=" font-size:18px; width:270px;"><b>INPUT DATA NILAI SISWA</b></legend>
        <form name="form1" action="input_nilaisiswa_defilia.php"  method="post" enctype="multipart/form-data">
            <table width="751" border="0" align="center" cellpadding="0" bgcolor="#66FF99">
                <input type="hidden" name="ID_SISWA_DEFILIA" value="<?php echo $idsiswa; ?>" >
                <tr>
                    <th>MATEMATIKA</th>
                    <td><input type="text" name="MATEMATIKA_DEFILIA" value="<?php echo isset($arr['MATEMATIKA_DEFILIA']) ? $arr['MATEMATIKA_DEFILIA'] : ''; ?>"></td>
                </tr>
                <tr>
                    <th>BAHASA INDONESIA</th>
                    <td><input type="text" name="BAHASA_INDONESIA_DEFILIA" value="<?php echo isset($arr['BAHASA_INDONESIA_DEFILIA']) ? $arr['BAHASA_INDONESIA_DEFILIA'] : ''; ?>"></td>
                </tr>
                <tr>
                    <th>BAHASA INGGRIS</th>
                    <td><input type="text" name="BAHASA_INGGRIS_DEFILIA" value="<?php echo isset($arr['BAHASA_INGGRIS_DEFILIA']) ? $arr['BAHASA_INGGRIS_DEFILIA'] : ''; ?>"></td>
                </tr>
                <tr>
                    <th>TEORI KEJURUAN</th>
                    <td><input type="text" name="TEORI_KEJURUAN_DEFILIA" value="<?php echo isset($arr['TEORI_KEJURUAN_DEFILIA']) ? $arr['TEORI_KEJURUAN_DEFILIA'] : ''; ?>"></td>
                </tr>
                <tr>
                    <th></th>
                    <td>
                        <input type="submit" name="SIMPAN" id="button" value="SIMPAN">
                        <input type="submit" name="DELETE" id="button" value="DELETE">
                    </td>
                </tr>
            </table>
            <br />
            <div align="center">
                <a href="index_siswa_defilia.php?page=siswa"><img src="left.png" style="width:30px; height:30px;"/></a>
            </div>
        </form>
        <br>
    </fieldset>
</center>

</body>
</html>
