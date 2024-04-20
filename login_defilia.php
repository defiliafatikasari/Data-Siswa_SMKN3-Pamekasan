<?php
include 'koneksi_defilia.php';
$username = $_POST['USERNAME_DEFILIA'];
$password = $_POST['PASSWORD_DEFILIA'];
$ceklogin = mysqli_query($mysqli, "SELECT * FROM login_defilia WHERE USERNAME_DEFILIA='$username' AND PASSWORD_DEFILIA='$password'");
$cekdata = mysqli_fetch_array($ceklogin);
$periksa = mysqli_num_rows($ceklogin);
session_start();
if ($periksa != 0) {
    $_SESSION['USERNAME_DEFILIA'] = $cekdata['USERNAME_DEFILIA'];
    $_SESSION['PASSWORD_DEFILIA'] = $cekdata['PASSWORD_DEFILIA'];
    $_SESSION['TIPE_DEFILIA'] = $cekdata['TIPE_DEFILIA'];
    header('location: ceklogin_defilia.php');
} else {
    ?>
    <script language="javascript">
        alert('USERNAME/PASSWORD ANDA SALAH COBA LAGI !!!!');
        history.go(-1);
    </script>
    <?php
}
?>
