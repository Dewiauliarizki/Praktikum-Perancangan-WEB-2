<?php
// Memulai session
session_start();

// Menyimpan ID session sebelum dihancurkan
$idsession = session_id();

// Menyimpan nilai count sebelum dihancurkan
$count_before_destroy = isset($_SESSION['count']) ? $_SESSION['count'] : 0;

// Menghancurkan session
session_destroy();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Demo Session Destroy</title>

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f0f4ff; /* pastel soft */
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 650px;
            margin: 80px auto;
            background: #ffffff;
            padding: 35px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            text-align: center;
        }

        h1 {
            color: #4a69bd;
            margin-bottom: 25px;
            font-size: 28px;
        }

        p {
            font-size: 18px;
            color: #34495e;
            margin: 12px 0;
            line-height: 1.6;
        }

        .highlight {
            font-weight: bold;
            color: #e67e22;
        }

        .note {
            margin-top: 20px;
            font-style: italic;
            color: #555;
        }

        a.button {
            display: inline-block;
            margin-top: 30px;
            padding: 12px 25px;
            background: #4a69bd;
            color: white;
            text-decoration: none;
            border-radius: 10px;
            font-size: 16px;
            transition: 0.25s;
        }

        a.button:hover {
            background: #3b55a1;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Session Berhasil Direset</h1>

        <p>
            ID Session:<br>
            <span class="highlight"><?php echo $idsession; ?></span>
        </p>

        <p>
            Total jumlah akses sebelumnya:<br>
            <span class="highlight"><?php echo $count_before_destroy; ?> kali</span>
        </p>

        <p class="note">
            Session Anda telah dihapus. Pada kunjungan berikutnya, sistem akan
            membuat session baru dan menghitung akses dari awal kembali.
        </p>

        <a href="5_next.php" class="button">Lanjut ke Halaman Berikutnya</a>
    </div>

</body>
</html>
