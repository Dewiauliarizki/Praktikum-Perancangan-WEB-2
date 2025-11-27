<?php
session_start();

$nama  = $_POST["nama"];
$umur  = $_POST["umur"];
$email = $_POST["email"];

$_SESSION["nama"]  = $nama;
$_SESSION["umur"]  = $umur;
$_SESSION["email"] = $email;
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Informasi Pengguna</title>

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #eef3ff; /* biru pastel lembut */
            margin: 0;
            padding: 0;
        }

        .container {
            width: 480px;
            margin: 70px auto;
            background: #ffffff;
            padding: 35px;
            border-radius: 18px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            text-align: center;
        }

        h1 {
            color: #4a69bd;
            margin-top: 0;
        }

        h2 {
            color: #596275;
            margin-bottom: 20px;
        }

        p {
            font-size: 18px;
            color: #2d3436;
            line-height: 1.5;
        }

        a {
            display: inline-block;
            margin-top: 25px;
            padding: 12px 20px;
            background: #4a69bd;
            color: white;
            text-decoration: none;
            border-radius: 10px;
            font-size: 16px;
            transition: 0.2s;
        }

        a:hover {
            background: #3b55a1;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Halo, <?php echo $_SESSION["nama"]; ?>!</h1>
        <h2>Terima kasih telah mengisi data diri</h2>

        <p>
            Kami telah menerima informasi Anda.<br><br>
            <strong>Usia:</strong> <?php echo $_SESSION["umur"]; ?> tahun <br>
            <strong>Email:</strong> <?php echo $_SESSION["email"]; ?>
        </p>

        <a href="3_data.php">Lanjut ke Halaman Berikutnya</a>
    </div>

</body>
</html>
