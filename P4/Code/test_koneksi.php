<?php
require_once 'config.php';

try {
    $stmt = $pdo->query("SELECT NOW()");
    echo "✅ Koneksi ke database berhasil! Waktu server: " . $stmt->fetchColumn();
} catch (Exception $e) {
    echo "❌ Koneksi gagal: " . $e->getMessage();
}
?>
