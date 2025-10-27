<?php
// Mulai session
session_start();
?>
<!doctype html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Daftar Akun - Futsal Booking</title>
<link rel="stylesheet" href="register.css">
</head>
<body>
<div class="container">
  <div class="brand">
    <h1>Futsal Booking — Daftar</h1>
    <p class="footer-note">Buat akun untuk memesan lapangan futsal</p>
  </div>

  <?php
  // Tampilkan pesan error atau success
  if (!empty($_GET['error'])) {
      echo '<div class="error">'.htmlspecialchars($_GET['error']).'</div>';
  }
  if (!empty($_GET['success'])) {
      echo '<div class="success">'.htmlspecialchars($_GET['success']).'</div>';
  }
  ?>

  <form action="register_process.php" method="post" autocomplete="off">
    <div class="form-group">
      <label for="username">Username</label>
      <input id="username" name="username" type="text" required placeholder="Username unik">
    </div>

    <div class="form-group">
      <label for="password">Kata Sandi</label>
      <input id="password" name="password" type="password" required placeholder="Minimal 6 karakter">
    </div>

    <div class="form-group">
      <label for="confirm">Ulangi Kata Sandi</label>
      <input id="confirm" name="confirm" type="password" required placeholder="Ulangi kata sandi">
    </div>

    <button class="primary" type="submit">Daftar Sekarang</button>
  </form>

  <p class="small">Sudah punya akun? <a class="link" href="login.html">Login</a></p>
</div>
</body>
</html>
