<?php
include 'koneksi_defilia.php'; 
session_start(); 

// Pastikan sesi 'TIPE_DEFILIA' telah diatur sebelum mencoba mengaksesnya
if (isset($_SESSION['TIPE_DEFILIA'])) {
    if ($_SESSION['TIPE_DEFILIA'] == "0") { 
        header('location: index_siswa_defilia.php?page=home'); 
    } else if ($_SESSION['TIPE_DEFILIA'] == "1") { 
        header('location: form_lihat_nilaisiswa_defilia.php'); 
    }
} else {
    // Jika sesi 'TIPE_DEFILIA' tidak diatur, maka redirect ke halaman login atau halaman lain yang sesuai
    header('location: login_defilia.php'); // Ganti login_page.php dengan halaman login Anda
}
?>
