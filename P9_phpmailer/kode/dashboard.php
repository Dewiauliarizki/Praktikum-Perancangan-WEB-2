<?php
// dashboard.php
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Dashboard</title>
    <style>
        /* CSS KHUSUS DASHBOARD */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f9; 
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }

        /* Dashboard Layout */
        .dashboard-layout {
            display: flex;
            width: 100%;
            flex-grow: 1;
        }
        .sidebar {
            width: 250px;
            background-color: #34495e; 
            color: white;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }
        .sidebar h3 {
            text-align: center;
            color: #fff;
            border-bottom: 1px solid #4a667b;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
        }
        .sidebar ul li a {
            display: block;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 4px;
            margin-bottom: 5px;
            transition: background-color 0.3s;
        }
        .sidebar ul li a:hover {
            background-color: #007bff;
        }
        .main-content {
            flex-grow: 1;
            padding: 20px;
            background-color: #fff;
        }
    </style>
</head>
<body>
    <div class="dashboard-layout">
        <div class="sidebar">
            <h3>Admin Panel</h3>
            <ul>
                <li><a href="dashboard.php">Dashboard Utama</a></li>
                <li><a href="#">Kelola Lapangan</a></li>
                <li><a href="#">Data Pemesanan</a></li>
                <li><a href="#">Pengaturan Akun</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>

        <div class="main-content">
            <h2>Selamat Datang, <?= htmlspecialchars($_SESSION['nama']) ?>!</h2>
            <p>Anda login sebagai: <strong><?= htmlspecialchars($_SESSION['peran']) ?></strong></p>
            
            <h3>Informasi Sistem</h3>
            <p>Ini adalah halaman utama dashboard Anda. Anda dapat menambahkan modul manajemen di sini.</p>
        </div>
    </div>
</body>
</html>