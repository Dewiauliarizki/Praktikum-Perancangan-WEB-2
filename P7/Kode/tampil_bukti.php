<?php
// ====== KONEKSI DATABASE ======
$koneksi = mysqli_connect("localhost", "root", "", "dbsewa_futsal");

if (!$koneksi) {
    die("Gagal koneksi database: " . mysqli_connect_error());
}

// ====== AMBIL DATA ======
$data = mysqli_query($koneksi, "SELECT * FROM pembayaran ORDER BY id_pembayaran DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Daftar Bukti Pembayaran</title>

<style>
    body {
        margin: 0;
        padding: 0;
        font-family: "Segoe UI", Arial, sans-serif;
        background: linear-gradient(180deg, #e8f3ff 0%, #f5faff 100%);
        min-height: 100vh;
    }

    .container {
        max-width: 900px;
        margin: 40px auto;
        padding: 20px;
    }

    h2 {
        text-align: center;
        color: #2b6cb0;
        font-size: 26px;
        margin-bottom: 25px;
    }

    .card {
        background: #ffffff;
        padding: 16px;
        border-radius: 14px;
        box-shadow: 0 8px 24px rgba(0, 60, 150, 0.12);
        margin-bottom: 20px;
        display: flex;
        gap: 18px;
        align-items: center;
        animation: fadeIn 0.5s ease;
    }

    .card img {
        width: 150px;
        height: 150px;
        object-fit: cover;
        border-radius: 10px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.15);
    }

    .info {
        flex: 1;
    }

    .label {
        color: #1e3a5f;
        font-size: 15px;
        font-weight: 600;
        margin-bottom: 2px;
    }

    .value {
        color: #4a5f7a;
        font-size: 14px;
        margin-bottom: 10px;
    }

    .btn-delete {
        padding: 8px 12px;
        font-size: 14px;
        font-weight: 600;
        color: white;
        background: linear-gradient(90deg, #ef4444, #dc2626);
        border-radius: 10px;
        text-decoration: none;
        box-shadow: 0 6px 18px rgba(220,38,38,0.25);
        transition: 0.25s ease;
        height: fit-content;
    }

    .btn-delete:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 24px rgba(220,38,38,0.3);
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

</head>
<body>

<div class="container">
    <h2>Daftar Bukti Pembayaran</h2>

    <?php while($d = mysqli_fetch_array($data)){ ?>
    <div class="card">
        <img src="<?= $d['bukti_transfer']; ?>"
     style="width:150px; height:150px; object-fit:cover; border-radius:10px;"
     onerror="this.src='https://via.placeholder.com/150?text=No+Image';">

             

        <div class="info">
            <div class="label">ID Pembayaran:</div>
            <div class="value"><?= $d['id_pembayaran']; ?></div>

            <div class="label">Nama Pengirim:</div>
            <div class="value"><?= $d['nama_pengirim']; ?></div>
        </div>

        <a class="btn-delete" 
           href="delete.php?id=<?= $d['id_pembayaran']; ?>&tipe=bukti">
           HAPUS
        </a>
    </div>
    <?php } ?>

</div>

</body>
</html>
