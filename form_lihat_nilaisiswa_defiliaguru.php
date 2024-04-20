<?php
session_start();
?>
<fieldset style="border-color:#FFFFFF; width:865px;">
    <legend align="center" style="font-size:18px; color:#FFFFFF;width:250px;"><b>DATA NILAI DAN SISWA</b></legend>
    <table align="center" width="850" border="1" bgcolor="#00CC00">
        <tr bgcolor="#FF99FF" height="50px">
            <th width="100" scope="col">NO</th>
            <th width="500" scope="col">NAMA SISWA</th>
            <th width="300" scope="col">KELAS</th>
            <th width="170"><div align="center">FOTO</div></th>
            <th width="200" scope="col">MATEMATIKA</th>
            <th width="200" scope="col">BAHASA INDONESIA</th>
            <th width="200" scope="col">BAHASA INGGRIS</th>
            <th width="200" scope="col">TEORI KEJURUAN</th>
        </tr>

        <?php
        include 'koneksi_defilia.php';
        $no = 1;
        $ambil = mysqli_query($mysqli, "SELECT * FROM siswa_defilia ORDER BY KELAS_DEFILIA ASC");
        while ($array = mysqli_fetch_array($ambil)) {
            // Tambahkan pengecekan isset() sebelum mengakses elemen array
            if (isset($array['ID_SISWA_DEFILIA'])) {
                $nilai_query = mysqli_query($mysqli, "SELECT * FROM nilai_defilia WHERE ID_SISWA_DEFILIA='$array[ID_SISWA_DEFILIA]'");
                $nilai_arr = mysqli_fetch_array($nilai_query);
        ?>
        <tr bgcolor="#FFCCFF" height="5px">
            <td><div align="center"><?php echo $no; $no++; ?></div></td>
            <td><div align="center"><?php echo isset($array['NAMA_SISWA_DEFILIA']) ? $array['NAMA_SISWA_DEFILIA'] : ''; ?></div></td>
            <td><div align="center"><?php echo isset($array['KELAS_DEFILIA']) ? $array['KELAS_DEFILIA'] : ''; ?></div></td>
            <td><div align="center"><img src="FOTO_DEFILIA/<?php echo isset($array['FOTO_DEFILIA']) ? $array['FOTO_DEFILIA'] : ''; ?>" width="60" height="48"></div></td>
            <td><div align="center"><?php echo isset($nilai_arr['MATEMATIKA_DEFILIA']) ? $nilai_arr['MATEMATIKA_DEFILIA'] : ''; ?></div></td>
            <td><div align="center"><?php echo isset($nilai_arr['BAHASA_INDONESIA_DEFILIA']) ? $nilai_arr['BAHASA_INDONESIA_DEFILIA'] : ''; ?></div></td>
            <td><div align="center"><?php echo isset($nilai_arr['BAHASA_INGGRIS_DEFILIA']) ? $nilai_arr['BAHASA_INGGRIS_DEFILIA'] : ''; ?></div></td>
            <td><div align="center"><?php echo isset($nilai_arr['TEORI_KEJURUAN_DEFILIA']) ? $nilai_arr['TEORI_KEJURUAN_DEFILIA'] : ''; ?></div></td>
        </tr>
        <?php
            }
        }
        ?>
    </table>
</fieldset>
