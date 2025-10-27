<?php
// Konfigurasi koneksi database
define('DB_HOST', 'localhost');
define('DB_NAME', 'dbsewa_futsal');
define('DB_USER', 'root');
define('DB_PASS', ''); // kosongkan jika XAMPP default

try {
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4", DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi database gagal: " . $e->getMessage());
}

session_start();

function ensure_logged_in() {
    if (empty($_SESSION['user_id'])) {
        header('Location: login.html');
        exit;
    }
}
?>
