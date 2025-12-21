<?php
// login.php - KODE SUDAH BENAR & DIOPTIMALKAN

session_start();
include 'koneksi.php'; 

$error = '';
$koneksi_aktif = false; 

// Cek apakah koneksi berhasil sebelum melanjutkan
if (isset($koneksi) && $koneksi->connect_error) {
    $error = "Koneksi database gagal.";
} elseif (isset($koneksi)) {
    $koneksi_aktif = true;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $koneksi_aktif) {
    $email = $_POST['email'] ?? '';
    $password_plain = $_POST['password'] ?? '';

    if (empty($email) || empty($password_plain)) {
        $error = "Email dan Password harus diisi.";
    } else {
        $query = "SELECT id_pengguna, nama, peran, password, status_verifikasi FROM pemakai WHERE email = ?";
        
        $stmt = $koneksi->prepare($query);
        
        if ($stmt === false) {
            $error = "Gagal menyiapkan query: " . $koneksi->error; 
        } else {
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows === 1) {
                $user = $result->fetch_assoc();
                
                // 1. Verifikasi Password
                if (password_verify($password_plain, $user['password'])) {
                    
                    // 2. Cek Status Verifikasi
                    if ($user['status_verifikasi'] === 'sudah' || $user['status_verifikasi'] === 1) {
                        // Login Berhasil: Buat session
                        $_SESSION['loggedin'] = true;
                        $_SESSION['id_pengguna'] = $user['id_pengguna'];
                        $_SESSION['nama'] = $user['nama'];
                        $_SESSION['peran'] = $user['peran'];
                        
                        header('Location: dashboard.php');
                        $stmt->close(); 
                        $koneksi->close(); 
                        exit();
                    } else {
                        $error = "Akun Anda belum diverifikasi. Silakan cek email Anda atau <a href='verifikasi.php?email=".urlencode($email)."'>masukkan kode verifikasi</a>.";
                    }
                } else {
                    $error = "Email atau Password salah.";
                }
            } else {
                $error = "Email atau Password salah.";
            }
            $stmt->close();
        }
    }
}

if (isset($koneksi) && $koneksi_aktif) {
    $koneksi->close();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Akun</title>
    <style>
        /* CSS KHUSUS LOGIN */
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
        input[type="password"] {
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
        p { margin-top: 15px; }
        p.error { color: red; font-weight: bold; }
        a { color: #007bff; text-decoration: none; }
        a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login Akun</h2>
        <?php if ($error): ?><p class="error"><?= htmlspecialchars($error) ?></p><?php endif; ?>

        <form method="POST" action="">
            <label>Email:</label> <input type="email" name="email" required><br>
            <label>Password:</label> <input type="password" name="password" required><br>
            <button type="submit">Login</button>
        </form>
        <p>Belum punya akun? <a href="register.php">Daftar di sini</a></p>
    </div>
</body>
</html>