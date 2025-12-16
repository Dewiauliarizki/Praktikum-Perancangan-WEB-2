<?php
// tes_email.php

// Sertakan file yang berisi fungsi kirimEmail dan konfigurasi PHPMailer
include 'kirim_email.php'; 

// --- Data untuk Pengujian ---
$email_tujuan = 'auliariskidewi@example.com'; // Ganti dengan email pribadi Anda untuk diuji
$nama_tujuan = 'Tester Akun';
$subjek_tes = 'Tes Pengiriman Email PHPMailer Berhasil!';
$body_html_tes = "
    <h2>Halo Tester!</h2>
    <p>Ini adalah email pengujian dari website Anda.</p>
    <p>Jika Anda menerima email ini, berarti konfigurasi SMTP di <b>kirim_email.php</b> sudah benar.</p>
    <p style='color: green;'><b>Pengujian Sukses!</b></p>
";

echo "Mencoba mengirim email ke $email_tujuan...<br>";

// Panggil fungsi kirimEmail
if (kirimEmail($email_tujuan, $nama_tujuan, $subjek_tes, $body_html_tes)) {
    echo "<b>STATUS: SUKSES.</b> Silakan cek inbox email Anda.";
} else {
    // Karena kirim_email.php menyembunyikan error, Anda bisa mengaktifkan debugging di sana
    // atau jika Anda menggunakan PHPMailer di luar fungsi, Anda bisa melihat error langsung.
    echo "<b>STATUS: GAGAL.</b> Terjadi kesalahan saat mengirim email. Cek kembali konfigurasi SMTP di kirim_email.php.";
}

?>