<?php
include 'koneksi.php';

$id = $_GET['id'];
$passwordBaru = password_hash("123456", PASSWORD_DEFAULT);

mysqli_query($koneksi, "UPDATE pemakai SET password='$passwordBaru' WHERE id_pengguna=$id");

echo "<script>alert('Password telah direset menjadi 123456'); 
window.location='kelola_pengguna.php';
</script>";
?>
