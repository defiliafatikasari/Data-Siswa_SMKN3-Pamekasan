<?php
include 'koneksi_defilia.php';

// Memeriksa apakah variabel $_POST['pilih'] telah didefinisikan
if(isset($_POST['pilih'])) {
    $hapus = $_POST['pilih'];

    // Menghapus data nilai siswa terlebih dahulu
    foreach($hapus as $id_siswa) {
        // Gunakan prepared statement untuk mencegah SQL injection
        $delete_query = "DELETE FROM nilai_defilia WHERE ID_SISWA_DEFILIA = ?";
        $stmt = $mysqli->prepare($delete_query);
        $stmt->bind_param("s", $id_siswa);
        $stmt->execute();
        $stmt->close();
    }

    // Setelah menghapus data nilai, sekarang hapus data siswa
    foreach($hapus as $id_siswa) {
        // Gunakan prepared statement untuk mencegah SQL injection
        $delete_query = "DELETE FROM siswa_defilia WHERE ID_SISWA_DEFILIA = ?";
        $stmt = $mysqli->prepare($delete_query);
        $stmt->bind_param("s", $id_siswa);
        $stmt->execute();
        $stmt->close();
    }

    // Redirect kembali ke halaman siswa setelah menghapus data
    header('location:index_siswa_defilia.php?page=siswa');
} else {
    // Jika variabel $_POST['pilih'] tidak didefinisikan, tampilkan pesan error
    echo "Tidak ada data yang dipilih untuk dihapus.";
}

// Tutup koneksi
$mysqli->close();
?>
