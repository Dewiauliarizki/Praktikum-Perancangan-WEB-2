<?php
include 'koneksi.php';

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM pemakai WHERE id_pengguna=$id"));

if (isset($_POST['update'])) {

    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];
    $peran = $_POST['peran'];

    $query = "UPDATE pemakai SET 
                nama='$nama',
                email='$email',
                telepon='$telepon',
                peran='$peran'";

    if (!empty($_POST['password_baru'])) {
        $passwordBaru = password_hash($_POST['password_baru'], PASSWORD_DEFAULT);
        $query .= ", password='$passwordBaru'";
    }

    $query .= " WHERE id_pengguna=$id";

    mysqli_query($koneksi, $query);

    echo "<script>alert('Data berhasil diperbarui!'); window.location='kelola_pengguna.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Pengguna</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f2f2f2;
        }

        .container {
            width: 420px;
            margin: 60px auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }

        h2 {
            margin-bottom: 15px;
            text-align: center;
        }

        label {
            font-weight: bold;
            margin-top: 10px;
            display: block;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        button {
            width: 100%;
            padding: 10px;
            margin-top: 18px;
            background: #2196F3;
            color: white;
            font-size: 15px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        button:hover {
            background: #1976D2;
        }
    </style>

</head>
<body>

<div class="container">
    <h2>Edit Pengguna</h2>

    <form method="POST">

        <label>Nama</label>
        <input type="text" name="nama" value="<?= $data['nama']; ?>" required>

        <label>Email</label>
        <input type="email" name="email" value="<?= $data['email']; ?>" required>

        <label>Telepon</label>
        <input type="text" name="telepon" value="<?= $data['telepon']; ?>" required>

        <label>Peran</label>
        <select name="peran" required>
            <option value="admin" <?= ($data['peran']=="admin")?"selected":"" ?>>admin</option>
            <option value="pengguna" <?= ($data['peran']=="pengguna")?"selected":"" ?>>pengguna</option>
        </select>

        <label>Password Baru (Opsional)</label>
        <input type="password" name="password_baru" placeholder="Kosongkan jika tidak ubah password">

        <button type="submit" name="update">Update</button>

    </form>

</div>

</body>
</html>
