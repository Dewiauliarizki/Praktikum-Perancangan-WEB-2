<?php
// Mulai session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Panggil koneksi database
require_once "config.php";

// Pastikan form dikirim lewat metode POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Ambil data dari form
    $username = trim($_POST['username'] ?? '');  // <── disesuaikan dengan name="username"
    $password = trim($_POST['password'] ?? '');

    // Cek kolom kosong
    if ($username === '' || $password === '') {
        echo "<script>alert('Username dan password wajib diisi!'); window.location='login.html';</script>";
        exit;
    }

    try {
        // Cek user berdasarkan username
        $stmt = $pdo->prepare("SELECT * FROM user WHERE username = :username LIMIT 1");
        $stmt->execute([':username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Verifikasi password (karena di-register pakai password_hash)
            if (password_verify($password, $user['password'])) {

                // Simpan data ke session
                $_SESSION['user_id']  = $user['id_user'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role']     = $user['role'] ?? 'penyewa';

                // Arahkan ke dashboard
                header("Location: dashboard_user.php");
                exit;

            } else {
                echo "<script>alert('Kata sandi salah!'); window.location='login.html';</script>";
                exit;
            }
        } else {
            echo "<script>alert('Username tidak ditemukan!'); window.location='login.html';</script>";
            exit;
        }

    } catch (PDOException $e) {
        echo "<script>alert('Terjadi kesalahan: " . addslashes($e->getMessage()) . "'); window.location='login.html';</script>";
        exit;
    }

} else {
    // Jika tidak lewat POST, kembali ke form login
    header("Location: login.html");
    exit;
}
?>
