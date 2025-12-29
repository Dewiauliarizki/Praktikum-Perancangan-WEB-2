<?php
// Menyambungkan ke koneksi yang sudah Anda buat
include '../pelanggan/koneksi.php';

// Penting: Beritahu browser/Postman bahwa ini adalah JSON
header('Content-Type: application/json');

// Query untuk mengambil data dari tabel users
$query = "SELECT * FROM users";
$sql = mysqli_query($conn, $query);

if ($sql) {
    $data = array();
    while ($row = mysqli_fetch_assoc($sql)) {
        $data[] = $row;
    }
    // Mengirimkan data ke Postman
    echo json_encode($data, JSON_PRETTY_PRINT);
} else {
    echo json_encode(array('status' => 'error', 'message' => mysqli_error($conn)));
}
?>