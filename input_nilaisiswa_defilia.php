<?php
include 'koneksi_defilia.php';

// Pastikan $_POST['ID_SISWA_DEFILIA'] terdefinisi sebelum digunakan
if(isset($_POST['ID_SISWA_DEFILIA'])){
    $idsiswa = $_POST['ID_SISWA_DEFILIA'];
    $matematika = $_POST['MATEMATIKA_DEFILIA'];
    $bhsindo = $_POST['BAHASA_INDONESIA_DEFILIA'];
    $bhsinggris = $_POST['BAHASA_INGGRIS_DEFILIA'];
    $tk = $_POST['TEORI_KEJURUAN_DEFILIA'];

    // Lakukan proses penyimpanan data nilai siswa yang baru
    $simpan = mysqli_query($mysqli, "INSERT INTO nilai_defilia (ID_SISWA_DEFILIA, MATEMATIKA_DEFILIA, BAHASA_INDONESIA_DEFILIA, BAHASA_INGGRIS_DEFILIA, TEORI_KEJURUAN_DEFILIA) VALUES ('$idsiswa', '$matematika', '$bhsindo', '$bhsinggris', '$tk')");

    if($simpan){
        // Jika berhasil disimpan, kembalikan ke halaman input nilai siswa dengan membawa ID siswa
        header("location:form_input_nilaisiswa_defilia.php?idnya=$idsiswa");
    } else {
        echo "Gagal menyimpan nilai siswa.";
    }
} else {
    echo "ID siswa tidak tersedia";
}
?>
