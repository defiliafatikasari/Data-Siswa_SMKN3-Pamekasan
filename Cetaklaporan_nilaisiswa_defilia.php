<?php
session_start();
?>
<html>
<head>
    <title>CETAK LAPORAN DATA NILAI SISWA</title>
</head>
<body background="other-rock-wall-backgrounds-powerpoint.jpg">
    <br><br>
    <fieldset>
        <legend align="center" style="font-size:18px;"><b>DATA NILAI SISWA</b></legend>
        <table align="center" width="1200" border="1" bgcolor="#00FF66">
            <tr>
                <th width="100" scope="col">NO</th>
                <th width="300" scope="col">NAMA SISWA</th>
                <th width="300" scope="col">KELAS</th>
                <th width="200"><div align="center">FOTO</div></th>
                <th width="200" scope="col">MATEMATIKA</th>
                <th width="250" scope="col">BAHASA INDONESIA</th>
                <th width="200" scope="col">BAHASA INGGRIS</th>
                <th width="200" scope="col">TEORI KEJURUAN</th>
            </tr>
    </fieldset>

    <?php
    include 'koneksi_defilia.php';
    $no = 1;
    $ambil = mysqli_query($mysqli, "SELECT * FROM siswa_defilia ORDER BY KELAS_DEFILIA ASC");
    while ($array = mysqli_fetch_array($ambil)) {
    ?>
        <tr bgcolor="#66FF99" height="5px">
            <td><div align="center"><?php echo $no;
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
    </table>
    <script>
        window.load = print_d();

        function print_d() {
            window.print();
        }
    </script>
</body>
</html>
