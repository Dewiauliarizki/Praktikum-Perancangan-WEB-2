<?php
session_start();
include "koneksi.php";
include "mailer.php";

$email = $_POST['email'];
$password = $_POST['password'];

// JOIN pengguna + user
$q = mysqli_query($conn, "
    SELECT p.*, u.password, u.role
    FROM pemakai p
    JOIN user u ON p.id_user = u.id_user
    WHERE p.email='$email'
");

$data = mysqli_fetch_assoc($q);

if(!$data || $data['password'] != $password){
    die("Login gagal");
}

// set session
$_SESSION['id_pengguna'] = $data['id_pengguna'];
$_SESSION['id_user']     = $data['id_user'];
$_SESSION['email']       = $data['email'];
$_SESSION['nama']        = $data['nama_lengkap'];
$_SESSION['role']        = $data['role'];

// cek verifikasi
if($data['is_verified'] == 0){
    $kode = rand(100000,999999);

    mysqli_query($conn, "
        UPDATE pemakai 
        SET kode_verifikasi='$kode'
        WHERE email='$email'
    ");

    kirimOTP($email,$kode);
    header("Location: verifikasi_login.php");
    exit();
}

// redirect
if($data['role'] == 'admin'){
    header("Location: dashboard_admin.php");
}else{
    header("Location: dashboard_penyewa.php");
}