<?php
// koneksi.php

$host = "localhost";
$user = "root"; 
$pass = "";     // HARAP PASTIKAN PASSWORD INI BENAR
$db = "dbsewa_futsal"; // HARAP PASTIKAN NAMA DB INI BENAR

// Membuat koneksi MySQLi
$koneksi = new mysqli($host, $user, $pass, $db);

// Cek koneksi (TAMBAHKAN INI SEMENTARA UNTUK DEBUGGING)
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// HAPUS TANDA KOMENTAR PADA BARIS BERIKUT UNTUK MENGUJI KONEKSI:
// echo "Koneksi ke database berhasil!"; 

?>