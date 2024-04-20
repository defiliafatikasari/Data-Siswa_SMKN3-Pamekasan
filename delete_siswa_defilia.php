<?php
include 'koneksi_defilia.php';

// Memeriksa apakah parameter ID siswa diteruskan melalui URL
if(isset($_GET['ID_SISWA_DEFILIA'])) {
    // Menghindari SQL injection dengan menggunakan prepared statement
    $id_siswa = $_GET['ID_SISWA_DEFILIA'];

    // Query untuk menghapus nilai siswa terlebih dahulu
    $delete_nilai_query = "DELETE FROM nilai_defilia WHERE ID_SISWA_DEFILIA=?";
    
    // Persiapkan statement untuk menghapus nilai siswa
    $stmt_delete_nilai = $mysqli->prepare($delete_nilai_query);

    // Bind parameter ke statement
    $stmt_delete_nilai->bind_param("s", $id_siswa);

    // Eksekusi statement untuk menghapus nilai siswa
    if($stmt_delete_nilai->execute()) {
        // Setelah berhasil menghapus nilai siswa, lanjutkan dengan menghapus data siswa
        $delete_siswa_query = "DELETE FROM siswa_defilia WHERE ID_SISWA_DEFILIA=?";
        
        // Persiapkan statement untuk menghapus data siswa
        $stmt_delete_siswa = $mysqli->prepare($delete_siswa_query);

        // Bind parameter ke statement
        $stmt_delete_siswa->bind_param("s", $id_siswa);

        // Eksekusi statement untuk menghapus data siswa
        if($stmt_delete_siswa->execute()) {
            // Redirect ke halaman siswa setelah menghapus data
            header('location:index_siswa_defilia.php?page=siswa');
        } else {
            echo "Gagal menghapus data siswa.";
        }

        // Tutup statement menghapus data siswa
        $stmt_delete_siswa->close();
    } else {
        echo "Gagal menghapus data nilai siswa.";
    }

    // Tutup statement menghapus nilai siswa
    $stmt_delete_nilai->close();
} else {
    echo "ID siswa tidak ditemukan.";
}

// Tutup koneksi
$mysqli->close();
?>
