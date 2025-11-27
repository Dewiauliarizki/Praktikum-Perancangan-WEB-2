<?php include "koneksi.php"; ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Pengguna</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: #f2f2f2;
        }

        .container {
            width: 420px;
            margin: 70px auto;
            padding: 25px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 12px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }

        input, select {
            width: 95%;
            padding: 10px;
            border: 1px solid #aaa;
            border-radius: 6px;
            margin-top: 5px;
            margin-bottom: 15px;
            font-size: 15px;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #2196F3;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
        }

        button:hover {
            background: #1976d2;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Tambah Pengguna</h2>

    <form method="POST">

        <label>Nama</label>
        <input type="text" name="nama" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Telepon</label>
        <input type="text" name="telepon" required>

        <label>Peran</label>
        <select name="peran" required>
            <option value="Admin">Admin</option>
            <option value="Pengguna">Pengguna</option>
        </select>

        <button type="submit" name="simpan">Simpan</button>

    </form>
</div>

</body>
</html>


<?php
if (isset($_POST['simpan'])) {

    $nama    = $_POST['nama'];
    $email   = $_POST['email'];
    $telepon = $_POST['telepon'];
    $peran   = $_POST['peran'];

    $query = "INSERT INTO pemakai (nama, email, telepon, peran)
              VALUES ('$nama', '$email', '$telepon', '$peran')";

    $simpan = mysqli_query($koneksi, $query);

    if ($simpan) {
        echo "<script>
                alert('Pengguna berhasil ditambahkan!');
                window.location='kelola_pengguna.php';
              </script>";
    } else {
        echo "<script>alert('Gagal menambah user!');</script>";
    }
}
?>
