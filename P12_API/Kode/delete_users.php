<?php
include '../pelanggan/koneksi.php';

header('Content-Type: application/json');

// 1. Ambil data JSON raw dari Postman
$json_data = file_get_contents("php://input");
$input = json_decode($json_data, true);

// 2. Tangkap id_user yang ingin dihapus
$id_user = $input['id_user'] ?? '';

// 3. Validasi: pastikan id_user tidak kosong
if (empty($id_user)) {
    echo json_encode([
        "status" => "failed",
        "message" => "ID User wajib diisi untuk menghapus data!"
    ]);
    exit;
}

// 4. Query Delete
$query = "DELETE FROM users WHERE id_user = '$id_user'";

if (mysqli_query($conn, $query)) {
    // Cek apakah ada baris yang terhapus
    if (mysqli_affected_rows($conn) > 0) {
        echo json_encode([
            "status" => "success",
            "message" => "User dengan ID $id_user berhasil dihapus."
        ]);
    } else {
        echo json_encode([
            "status" => "failed",
            "message" => "Data tidak ditemukan. Tidak ada yang dihapus."
        ]);
    }
} else {
    echo json_encode([
        "status" => "failed",
        "message" => "Error: " . mysqli_error($conn)
    ]);
}
?>