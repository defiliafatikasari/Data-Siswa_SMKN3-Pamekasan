<?php
include 'koneksi_defilia.php';

// Memeriksa apakah input POST telah dikirim sebelumnya
if(isset($_POST['NAMA_SISWA_DEFILIA'], $_POST['ID_SISWA_DEFILIA'], $_FILES['FOTO_DEFILIA'], $_POST['KELAS_DEFILIA'])) {
    $namasiswa = $_POST['NAMA_SISWA_DEFILIA'];
    $idsiswa = $_POST['ID_SISWA_DEFILIA'];
    $gb = $_FILES['FOTO_DEFILIA']['name'];
    $kelas = $_POST['KELAS_DEFILIA'];
    $lokasi = $_FILES['FOTO_DEFILIA']['tmp_name'];

    if(empty($lokasi)) {
        mysqli_query($mysqli, "UPDATE siswa_defilia SET NAMA_SISWA_DEFILIA='$namasiswa', FOTO_DEFILIA='$gb', KELAS_DEFILIA='$kelas' WHERE ID_SISWA_DEFILIA='$idsiswa'");
    } else {
        move_uploaded_file($lokasi, "FOTO_DEFILIA/$gb");
        mysqli_query($mysqli, "UPDATE siswa_defilia SET NAMA_SISWA_DEFILIA='$namasiswa', FOTO_DEFILIA='$gb', KELAS_DEFILIA='$kelas' WHERE ID_SISWA_DEFILIA='$idsiswa'");
    }

    header('location:index_siswa_defilia.php?page=siswa');
} else {
    echo "Input belum lengkap";
}
?>
