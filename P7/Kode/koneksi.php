<?php
$koneksi = mysqli_connect("localhost", "root", "", "dbsewa_futsal");

if (!$koneksi) {
    die("Gagal koneksi database: " . mysqli_connect_error());
}
?>
