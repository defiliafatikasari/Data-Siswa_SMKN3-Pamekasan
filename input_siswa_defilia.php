<?php
include 'koneksi_defilia.php';

// Pastikan form telah disubmit sebelum mengakses variabel $_POST dan $_FILES
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pastikan variabel $_POST dan $_FILES telah diatur sebelum mengaksesnya
    if (isset($_POST['NAMA_SISWA_DEFILIA']) && isset($_POST['KELAS_DEFILIA']) && isset($_FILES['FOTO_DEFILIA'])) {
        $namasiswa = $_POST['NAMA_SISWA_DEFILIA'];
        $kelas = $_POST['KELAS_DEFILIA'];
        $gb = $_FILES['FOTO_DEFILIA']['name'];
        
        // Pastikan variabel $gb tidak kosong sebelum menggunakan nya
        if ($gb) {
            $lokasi = $_FILES['FOTO_DEFILIA']['tmp_name'];
            $ukuran = $_FILES['FOTO_DEFILIA']['size'];
            $ekstensi = array('jpg', 'jpeg', 'png');
            
            // Pastikan ukuran file dan ekstensinya sesuai sebelum menyimpannya
            if ($ukuran < 2044070 && in_array(pathinfo($gb, PATHINFO_EXTENSION), $ekstensi)) {
                // Pindahkan file ke folder tujuan
                move_uploaded_file($lokasi, 'FOTO_DEFILIA/'.$gb);
                
                // Jalankan kueri SQL menggunakan mysqli_query()
                $simpan = mysqli_query($mysqli, "INSERT INTO siswa_defilia(NAMA_SISWA_DEFILIA, KELAS_DEFILIA, FOTO_DEFILIA) VALUES ('$namasiswa', '$kelas', '$gb')");
                
                if ($simpan) {
                    // Redirect ke halaman index setelah berhasil menyimpan data
                    header('location: index_siswa_defilia.php?page=siswa');
                    exit(); // Hentikan eksekusi skrip
                } else {
                    // Tampilkan pesan kesalahan jika kueri gagal dijalankan
                    echo "Gagal menyimpan data siswa";
                }
            } else {
                echo "Ukuran file terlalu besar atau ekstensi tidak didukung";
            }
        } else {
            echo "File foto belum dipilih";
        }
    } else {
        echo "Data siswa tidak lengkap";
    }
} else {
    echo "Form tidak di-submit dengan metode POST";
}
?>
