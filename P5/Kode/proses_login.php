<?php
session_start();
include 'koneksi.php';

$email = $_POST['email'];
$password = $_POST['password'];

$query = mysqli_query($koneksi, "SELECT * FROM pemakai WHERE email='$email'");
$data  = mysqli_fetch_assoc($query);

if ($data) {

    // Karena password di database masih plaintext
    if ($password == $data['password']) {

        $_SESSION['login'] = true;
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['peran'] = $data['peran'];

        header("Location: kelola_pengguna.php");
        exit;

    } else {
        echo "<script>alert('Password salah!'); window.location='login.php';</script>";
    }

} else {
    echo "<script>alert('Email tidak ditemukan!'); window.location='login.php';</script>";
}
?>
