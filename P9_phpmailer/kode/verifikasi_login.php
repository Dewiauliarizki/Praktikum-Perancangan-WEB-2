<?php
session_start();
include "koneksi.php";

$email = $_SESSION['email'];

if(isset($_POST['verifikasi'])){
    $kode = $_POST['kode'];

    $q = mysqli_query($conn, "
        SELECT * FROM pemakai
        WHERE email='$email' AND kode_verifikasi='$kode'
    ");

    if(mysqli_num_rows($q) > 0){
        mysqli_query($conn, "
            UPDATE pemakai
            SET is_verified=1, kode_verifikasi=NULL
            WHERE email='$email'
        ");

        if($_SESSION['role']=='admin'){
            header("Location: dashboard_admin.php");
        }else{
            header("Location: dashboard_penyewa.php");
        }
    }else{
        echo "Kode OTP salah!";
    }
}
?>

<h3>Verifikasi OTP</h3>
<form method="POST">
    <input name="kode" placeholder="Masukkan OTP" required>
    <button name="verifikasi">Verifikasi</button>
</form>