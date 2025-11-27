<?php
include 'koneksi.php';

if (!isset($_GET['id'])) {
    echo "<script>alert('ID tidak ditemukan!'); window.location='kelola_pengguna.php';</script>";
    exit;
}

$id = $_GET['id'];

$sql = "DELETE FROM pemakai WHERE id_pengguna='$id'";
$hapus = mysqli_query($koneksi, $sql);

if ($hapus) {
    echo "<script>alert('Pengguna berhasil dihapus!'); window.location='kelola_pengguna.php';</script>";
} else {
    echo "<script>alert('Gagal menghapus data!'); window.location='kelola_pengguna.php';</script>";
}
?>
