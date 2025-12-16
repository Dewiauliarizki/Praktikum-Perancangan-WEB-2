<?php
session_start();
if(!isset($_SESSION['email']) || $_SESSION['role']!='penyewa'){
    header("Location: login.html");
    exit();
}
?>
<h2>Dashboard Penyewa</h2>
<p>Nama: <?= $_SESSION['nama']; ?></p>
<p>Email: <?= $_SESSION['email']; ?></p>
<a href="logout.php">Logout</a>