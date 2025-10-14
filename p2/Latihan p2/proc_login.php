<html>
<head>
    <title>Proses Input</title>
</head>
<body>
<?php
// Ambil data dari form
$username = $_POST["username"];
$password = $_POST["password"];
?>

<h2>Hasil Input Data</h2>
Username : <?php echo htmlspecialchars($username); ?> <br>
Password : <?php echo htmlspecialchars($password); ?> <br>

</body>
</html>

