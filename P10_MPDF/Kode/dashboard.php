<?php
session_start();

// Cek login
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.html');
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f9;
            margin: 0;
            display: flex;
            min-height: 100vh;
        }
        .sidebar {
            width: 250px;
            background-color: #34495e;
            color: white;
            padding: 20px;
        }
        .sidebar h3 {
            text-align: center;
            border-bottom: 1px solid #4a667b;
            padding-bottom: 10px;
        }
        .sidebar a {
            display: block;
            color: white;
            padding: 10px;
            text-decoration: none;
            border-radius: 4px;
            margin-bottom: 5px;
        }
        .sidebar a:hover {
            background-color: #007bff;
        }
        .main-content {
            flex: 1;
            padding: 20px;
            background: white;
        }
        .btn {
            display: inline-block;
            background: #007bff;
            color: white;
            padding: 10px 15px;
            border-radius: 4px;
            text-decoration: none;
        }
        .btn:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <h3>Admin Panel</h3>
    <a href="dashboard.php">Dashboard</a>
    <a href="laporan_pdf.php">Cetak Laporan PDF</a>
    <a href="logout.php">Logout</a>
</div>

<div class="main-content">
    <h2>Selamat Datang, <?= htmlspecialchars($_SESSION['nama']) ?> 👋</h2>
    <p>Role: <strong><?= htmlspecialchars($_SESSION['peran']) ?></strong></p>

    <h3>Informasi Sistem</h3>
    <p>Sistem login dengan verifikasi email & laporan PDF (mPDF).</p>

    <br>
    <a href="laporan_pdf.php" class="btn">Download Laporan PDF</a>
</div>

</body>
</html>
