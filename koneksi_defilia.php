<?php
$mysqli = new mysqli("localhost", "root", "", "nilai_siswa_defilia");

// Periksa koneksi
if ($mysqli->connect_error) {
    die("Koneksi gagal: " . $mysqli->connect_error);
}
?>
