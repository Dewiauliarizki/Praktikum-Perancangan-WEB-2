<?php
// KONEKSI DATABASE
$koneksi = mysqli_connect("localhost", "root", "", "dbsewa_futsal");
if (!$koneksi) {
    die("Gagal koneksi database: " . mysqli_connect_error());
}

$id = $_GET['id'];
$tipe = $_GET['tipe'];

$cari = mysqli_query($koneksi, "SELECT bukti_transfer FROM pembayaran WHERE id_pembayaran='$id'");
$data = mysqli_fetch_assoc($cari);

if ($data) {
   $lokasiFile = __DIR__ . "/bukti/" . $data['bukti_transfer'];
if (file_exists($lokasiFile)) {
    unlink($lokasiFile);
}

    mysqli_query($koneksi, "DELETE FROM pembayaran WHERE id_pembayaran='$id'");
    $status = "success";
} else {
    $status = "error";
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Hapus Bukti</title>

<style>
    body{
        margin:0;
        padding:0;
        font-family:"Segoe UI",Arial;
        background:linear-gradient(180deg,#e0f0ff,#f7fbff);
        height:100vh;
        display:flex;
        justify-content:center;
        align-items:center;
    }
    .box{
        background:#fff;
        width:420px;
        padding:28px;
        border-radius:14px;
        text-align:center;
        box-shadow:0 10px 30px rgba(0,80,160,0.15);
        animation:fade .5s ease;
    }
    h2{color:#2b6cb0;}
    p{color:#385780;font-size:15px;margin-bottom:20px;}
    .btn{
        background:linear-gradient(90deg,#3b82f6,#2563eb);
        padding:10px 18px;
        color:white;
        text-decoration:none;
        border-radius:10px;
        font-weight:600;
        box-shadow:0 6px 18px rgba(59,130,246,0.3);
        transition:.2s;
    }
    .btn:hover{transform:translateY(-3px);}
    @keyframes fade{from{opacity:0;transform:translateY(10px);}to{opacity:1;transform:translateY(0);}}
</style>
</head>

<body>
<div class="box">
    <?php if ($status == "success") { ?>
        <h2>Berhasil Dihapus</h2>
        <p>Bukti pembayaran telah berhasil dihapus.</p>
    <?php } else { ?>
        <h2 style="color:#d62828;">Gagal Menghapus</h2>
        <p>Data tidak ditemukan atau terjadi kesalahan.</p>
    <?php } ?>
    
    <a href="tampil_bukti.php" class="btn">Kembali</a>
</div>
</body>
</html>
