<?php
require_once "config.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: register.php");
    exit;
}

$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';
$confirm  = $_POST['confirm'] ?? '';

// Validasi
if ($username === '' || $password === '' || $confirm === '') {
    header("Location: register.php?error=" . urlencode("Semua kolom wajib diisi."));
    exit;
}

if ($password !== $confirm) {
    header("Location: register.php?error=" . urlencode("Kata sandi tidak cocok."));
    exit;
}

if (strlen($password) < 6) {
    header("Location: register.php?error=" . urlencode("Kata sandi minimal 6 karakter."));
    exit;
}

try {
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM user WHERE username = :u");
    $stmt->execute([':u' => $username]);
    if ($stmt->fetchColumn() > 0) {
        header("Location: register.php?error=" . urlencode("Username sudah digunakan."));
        exit;
    }

    $stmt = $pdo->prepare("INSERT INTO user (id_user, username, password, role) VALUES (:id, :u, :p, :r)");
    $stmt->execute([
        ':id' => uniqid('U'),
        ':u' => $username,
        ':p' => password_hash($password, PASSWORD_DEFAULT),
        ':r' => 'penyewa'
    ]);

    header("Location: login.html?success=" . urlencode("Pendaftaran berhasil, silakan login."));
    exit;

} catch (Exception $e) {
    header("Location: register.php?error=" . urlencode("Terjadi kesalahan server."));
    exit;
}
?>
