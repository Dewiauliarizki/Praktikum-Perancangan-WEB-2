<?php
session_start();

if (!isset($_SESSION['count'])) {
    $_SESSION['count'] = 0;
}
$_SESSION['count']++;
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Demo Session 1</title>

    <style>
        /* Warna latar belakang pastel */
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f2f6ff;
            margin: 0;
            padding: 0;
        }

        /* Container utama */
        .container {
            max-width: 500px;
            margin: 80px auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            text-align: center;
        }

        /* Judul */
        h1 {
            color: #4a69bd;
            margin-bottom: 20px;
        }

        /* Teks */
        p {
            font-size: 18px;
            color: #34495e;
        }

        /* Styling angka hitungan */
        .count {
            font-size: 24px;
            font-weight: bold;
            color: #e17055;
        }
    </style>

</head>
<body>
    <div class="container">
        <h1>Demo Session 1</h1>
        <p>
            Anda telah mengakses halaman ini sebanyak 
            <span class="count"><?php echo $_SESSION['count']; ?></span> kali.
        </p>
    </div>
</body>
</html>
