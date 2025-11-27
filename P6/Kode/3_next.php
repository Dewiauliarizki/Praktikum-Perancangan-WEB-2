<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Halaman Kedua</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f5ff;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 500px;
            margin: 80px auto;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            text-align: center;
        }

        h2 {
            color: #34495e;
        }

        .info {
            text-align: left;
            font-size: 17px;
            color: #555;
            margin-top: 20px;
            line-height: 1.7;
        }

        .highlight {
            font-weight: bold;
            color: #4a69bd;
        }

        a {
            display: inline-block;
            margin-top: 25px;
            padding: 10px 20px;
            background: #4a69bd;
            color: white;
            border-radius: 8px;
            text-decoration: none;
            transition: 0.3s;
        }

        a:hover {
            background: #3c55a0;
        }

        .footer-note {
            font-size: 14px;
            margin-top: 30px;
            color: #888;
        }

    </style>
</head>
<body>

    <div class="container">
        <h2>Selamat Datang di Halaman Kedua</h2>
        <p>Berikut adalah informasi Anda yang tersimpan di session:</p>

        <div class="info">
            Nama: <span class="highlight"><?php echo $_SESSION["nama"]; ?></span><br>
            Umur: <span class="highlight"><?php echo $_SESSION["umur"]; ?></span> tahun<br>
            Email: <span class="highlight"><?php echo $_SESSION["email"]; ?></span><br>
        </div>

        <a href="3_data.php">Kembali ke Halaman Awal</a>

        <p class="footer-note">
            (Session akan dihapus setelah Anda meninggalkan halaman ini.)
        </p>
    </div>

<?php
session_destroy();
?>
</body>
</html>
