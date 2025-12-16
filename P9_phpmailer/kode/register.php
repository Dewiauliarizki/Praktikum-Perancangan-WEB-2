<?php
// register.php
include 'koneksi.php';
include 'kirim_email.php';

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'] ?? '';
    $email = $_POST['email'] ?? '';
    $telepon = $_POST['telepon'] ?? '';
    $password_plain = $_POST['password'] ?? '';

    if (empty($nama) || empty($email) || empty($password_plain)) {
        $error = "Semua field harus diisi.";
    } else {
        // Hashing Password
        $password_hashed = password_hash($password_plain, PASSWORD_DEFAULT);

        // Buat Kode Verifikasi Acak (6 karakter alphanumeric)
        $kode_verifikasi = substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 6);
        $status_verifikasi = 'belum';
        $peran = 'pengguna';
        
        // Cek apakah email sudah terdaftar
        $check_stmt = $koneksi->prepare("SELECT id_pengguna FROM pemakai WHERE email = ?");
        $check_stmt->bind_param("s", $email);
        $check_stmt->execute();
        $check_stmt->store_result();

        if ($check_stmt->num_rows > 0) {
            $error = "Email sudah terdaftar. Silakan login.";
        } else {
            // Masukkan data ke Database
            $stmt = $koneksi->prepare("INSERT INTO pemakai (nama, email, telepon, peran, password, kode_verifikasi, status_verifikasi) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssss", $nama, $email, $telepon, $peran, $password_hashed, $kode_verifikasi, $status_verifikasi);
            
            if ($stmt->execute()) {
                
                // Siapkan dan Kirim Email Verifikasi
                $subjek = "Kode Verifikasi Akun Anda";
                $body_html = "<p>Halo <b>$nama</b>, terima kasih telah mendaftar.</p><p>Kode verifikasi Anda adalah: <h2 style='color: #007bff; background-color: #f0f8ff; padding: 10px; border-radius: 5px; text-align: center;'>$kode_verifikasi</h2></p><p>Silakan gunakan kode ini di halaman verifikasi.</p>";
                
                if (kirimEmail($email, $nama, $subjek, $body_html)) {
                    $success = "Pendaftaran berhasil! Kode verifikasi telah dikirim ke email Anda.";
                    // Arahkan ke halaman verifikasi dengan membawa email
                    header('refresh:3; url=verifikasi.php?email=' . urlencode($email));
                    exit();
                } else {
                    $error = "Pendaftaran berhasil, tetapi gagal mengirim email verifikasi. Coba login dan minta kirim ulang.";
                }

            } else {
                $error = "Terjadi kesalahan saat menyimpan data: " . $stmt->error;
            }
            $stmt->close();
        }
        $check_stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Registrasi Akun</title>
    <style>
        /* CSS KHUSUS REGISTER */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f9;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            max-width: 400px;
            padding: 25px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h2 {
            color: #007bff;
            margin-bottom: 20px;
        }
        input[type="email"],
        input[type="password"],
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        button[type="submit"]:hover {
            background-color: #0056b3;
        }
        p.error { color: red; font-weight: bold; }
        p.success { color: green; font-weight: bold; }
        a { color: #007bff; text-decoration: none; }
        a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Registrasi Akun Baru</h2>
        <?php if ($error): ?><p class="error"><?= $error ?></p><?php endif; ?>
        <?php if ($success): ?><p class="success"><?= $success ?></p><?php endif; ?>

        <form method="POST" action="">
            Nama: <input type="text" name="nama" required><br>
            Email: <input type="email" name="email" required><br>
            Telepon: <input type="text" name="telepon"><br>
            Password: <input type="password" name="password" required><br>
            <button type="submit">Daftar</button>
        </form>
        <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>
    </div>
</body>
</html>