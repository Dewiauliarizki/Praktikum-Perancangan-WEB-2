<?php
include 'koneksi.php';

$id = $_POST['id_pengguna'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$telepon = $_POST['telepon'];
$peran = $_POST['peran'];

$query = mysqli_query($koneksi, 
"UPDATE pemakai SET 
    nama='$nama',
    email='$email',
    telepon='$telepon',
    peran='$peran'
WHERE id_pengguna='$id'"
);

if ($query) {
    echo "<script>
            alert('Data berhasil diperbarui');
            window.location='kelola_pengguna.php';
          </script>";
} else {
    echo "Gagal mengedit data: " . mysqli_error($koneksi);
}
?>
