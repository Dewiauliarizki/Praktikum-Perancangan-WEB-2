<html>
<head>
    <title>Data Buku Tamu</title>
</head>
<body>
<?php
// Ambil data dari form
$nama = $_POST["nama"];
$email = $_POST["email"];
$komentar = $_POST["komentar"];
?>

<h1>Data Buku Tamu</h1>
<hr>

Nama Anda     : <?php echo htmlspecialchars($nama); ?><br>
Email Address : <?php echo htmlspecialchars($email); ?><br>
Komentar      : <br>
<textarea cols="40" rows="5" readonly><?php echo htmlspecialchars($komentar); ?></textarea>

</body>
</html>
