<html>
<head>
    <title>Proses Upload File</title>
</head>
<body>
    <h1>Simpan File yang Diupload</h1>
    <hr>

<?php
// Pastikan ada file yang diupload
if (isset($_FILES["file1"]) && $_FILES["file1"]["error"] == 0) {
    $tmp_file = $_FILES["file1"]["tmp_name"];
    $target_file = "hasilupload.txt"; // semua disimpan dengan nama yang sama

    // Pindahkan file dari tmp ke lokasi tujuan
    if (move_uploaded_file($tmp_file, $target_file)) {
        echo "✅ File berhasil diupload dengan nama: <b>$target_file</b><br>";
        echo "Ukuran file: " . $_FILES["file1"]["size"] . " bytes<br>";
        echo "Tipe file: " . $_FILES["file1"]["type"];
    } else {
        echo "❌ Gagal menyimpan file.";
    }
} else {
    echo "❌ Tidak ada file yang diupload atau terjadi kesalahan.";
}
?>

</body>
</html>
