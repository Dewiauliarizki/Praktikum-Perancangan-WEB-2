<?php
// verifikasi.php - Kode telah diperbaiki

include 'koneksi.php'; 

$error = '';
$success = '';
$email_prefilled = $_GET['email'] ?? ''; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'] ?? ''; 
    $kode_input = $_POST['kode'] ?? '';

    if (empty($email) || empty($kode_input)) {
        $error = "Email dan Kode Verifikasi harus diisi.";
    } else {
        
        $query_check = "SELECT status_verifikasi FROM pemakai WHERE email = ? AND kode_verifikasi = ? AND status_verifikasi = 'belum'";
        $stmt = $koneksi->prepare($query_check);

        if ($stmt === false) {
             $error = "Gagal menyiapkan query verifikasi: " . $koneksi->error; 
        } else {
            $stmt->bind_param("ss", $email, $kode_input);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows === 1) {
                
                $query_update = "UPDATE pemakai SET status_verifikasi = 'sudah', kode_verifikasi = NULL WHERE email = ?";
                $update_stmt = $koneksi->prepare($query_update);

                if ($update_stmt === false) {
                    $error = "Gagal menyiapkan query update: " . $koneksi->error;
                } else {
                    $update_stmt->bind_param("s", $email);
                    
                    if ($update_stmt->execute()) {
                        
                        if ($update_stmt->affected_rows === 1) {
                            $success = "Verifikasi berhasil! Akun Anda sudah aktif.";
                            header('refresh:3; url=login.php'); 
                            exit();
                        } else {
                             $error = "Gagal mengupdate status verifikasi. Mungkin status sudah 'sudah' sebelumnya.";
                        }
                    } else {
                        $error = "Terjadi kesalahan database saat update status.";
                    }
                    $update_stmt->close(); 
                }

            } else {
                $error = "Kode verifikasi salah, akun tidak ditemukan, atau akun sudah diverifikasi.";
            }
            $stmt->close(); 
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Akun</title>
    <style>
        /* CSS KHUSUS VERIFIKASI */
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
    </style>
</head>
<body>
    <div class="container">
        <h2>Verifikasi Akun Anda</h2>
        <?php if ($error): ?><p class="error"><?= htmlspecialchars($error) ?></p><?php endif; ?>
        <?php if ($success): ?><p class="success"><?= htmlspecialchars($success) ?></p><?php endif; ?>

        <form method="POST" action="">
            <p>Masukkan kode verifikasi yang telah dikirim ke email Anda.</p>
            Email: <input type="email" name="email" value="<?= htmlspecialchars($email_prefilled) ?>" required><br>
            Kode Verifikasi: <input type="text" name="kode" required><br>
            <button type="submit">Verifikasi</button>
        </form>
    </div>
</body>
</html>