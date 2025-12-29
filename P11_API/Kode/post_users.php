<?php
include '../pelanggan/koneksi.php';

header('Content-Type: application/json');

// 1. Ambil data mentah (raw data) dari body request
$json_data = file_get_contents("php://input");

// 2. Ubah format JSON menjadi Array PHP agar bisa diproses
$input = json_decode($json_data, true);

// 3. Ambil data dari array tersebut (bukan dari $_POST)
$id_user  = $input['id_user']  ?? '';
$nama     = $input['nama']     ?? '';
$email    = $input['email']    ?? '';
$password = $input['password'] ?? '';
$no_hp    = $input['no_hp']    ?? '';
$role     = $input['role']     ?? 'pelanggan';
$status   = $input['status']   ?? 'aktif';

// Validasi
if (empty($id_user) || empty($nama) || empty($email)) {
    echo json_encode([
        "status" => "failed",
        "message" => "Data (id_user, nama, email) tidak boleh kosong!"
    ]);
    exit;
}

// Query Insert
$query = "INSERT INTO users (id_user, nama, email, password, no_hp, role, status) 
          VALUES ('$id_user', '$nama', '$email', '$password', '$no_hp', '$role', '$status')";

if (mysqli_query($conn, $query)) {
    echo json_encode([
        "status" => "success",
        "message" => "Data berhasil ditambahkan!"
    ]);
} else {
    echo json_encode([
        "status" => "failed",
        "message" => "Error: " . mysqli_error($conn)
    ]);
}
?>
