<?php
$koneksi = mysqli_connect("localhost", "root", "", "dbsewa_futsal");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
