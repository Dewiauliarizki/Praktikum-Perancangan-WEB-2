<?php
include '../pelanggan/koneksi.php';

header('Content-Type: application/json');

// 1. Ambil data JSON raw dari Postman
$json_data = file_get_contents("php://input");
$input = json_decode($json_data, true);

// 2. Tangkap data dari JSON
$id_user  = $input['id_user']  ?? ''; // ID ini yang jadi acuan/kunci
$nama     = $input['nama']     ?? '';
$email    = $input['email']    ?? '';
$no_hp    = $input['no_hp']    ?? '';
$role     = $input['role']     ?? '';
$status   = $input['status']   ?? '';

// 3. Validasi: id_user harus ada
if (empty($id_user)) {
    echo json_encode([
        "status" => "failed",
        "message" => "ID User wajib diisi untuk menentukan data mana yang diupdate!"
    ]);
    exit;
}

// 4. Query Update (Mengupdate kolom berdasarkan id_user)
$query = "UPDATE users SET 
            nama = '$nama', 
            email = '$email', 
            no_hp = '$no_hp', 
            role = '$role', 
            status = '$status' 
          WHERE id_user = '$id_user'";

if (mysqli_query($conn, $query)) {
    // Cek apakah ada data yang benar-benar berubah
    if (mysqli_affected_rows($conn) > 0) {
        echo json_encode([
            "status" => "success",
            "message" => "Data user $id_user berhasil diperbarui!"
        ]);
    } else {
        echo json_encode([
            "status" => "success",
            "message" => "Tidak ada perubahan data atau ID tidak ditemukan."
        ]);
    }
} else {
    echo json_encode([
        "status" => "failed",
        "message" => "Error: " . mysqli_error($conn)
    ]);
}
?>