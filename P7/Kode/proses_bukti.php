<?php
$koneksi = mysqli_connect("localhost", "root", "", "dbsewa_futsal");

if (!$koneksi) {
    die("Gagal koneksi database: " . mysqli_connect_error());
}

$nama = $_POST['nama_pengirim'];
$file = $_FILES['bukti']['name'];
$tmp  = $_FILES['bukti']['tmp_name'];
$ukuran = $_FILES['bukti']['size'];

$ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
$valid_ext = ['jpg','jpeg','png','pdf'];

if (!in_array($ext, $valid_ext)) {
    $status = "format";
} elseif ($ukuran > 2000000) {
    $status = "size";
} else {
    $namaFileBaru = "bukti_" . rand(1000,999999) . "." . $ext;
    move_uploaded_file($tmp, $namaFileBaru);

    mysqli_query($koneksi, "INSERT INTO pembayaran (nama_pengirim,bukti_transfer,tanggal_upload)
                            VALUES ('$nama','$namaFileBaru',NOW())");

    $status = "success";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Proses Upload Bukti</title>

<style>
    body{
        margin:0;
        padding:0;
        height:100vh;
        display:flex;
        justify-content:center;
        align-items:center;
        font-family:"Segoe UI", Arial;
        background:linear-gradient(180deg,#dfeffd,#f6faff);
        animation:fadeBody 0.5s ease-in-out;
    }

    .box{
        background:white;
        width:430px;
        padding:30px;
        border-radius:16px;
        text-align:center;
        box-shadow:0 12px 28px rgba(0,80,160,0.15);
        animation:fadeBox 0.6s ease;
    }

    h2{
        color:#2b6cb0;
        margin-bottom:10px;
        font-size:26px;
    }

    p{
        color:#446089;
        margin-bottom:20px;
        font-size:15px;
        line-height:1.5em;
    }

    .btn{
        padding:12px 22px;
        display:inline-block;
        background:linear-gradient(90deg,#3b82f6,#2563eb);
        color:white;
        border-radius:10px;
        text-decoration:none;
        font-weight:600;
        letter-spacing:0.3px;
        box-shadow:0 6px 18px rgba(0,110,255,0.3);
        transition:all .22s;
    }

    .btn:hover{
        transform:translateY(-3px);
        box-shadow:0 12px 26px rgba(0,110,255,0.35);
    }

    @keyframes fadeBody {
        from {opacity:0;}
        to   {opacity:1;}
    }

    @keyframes fadeBox {
        from {opacity:0; transform:translateY(15px);}
        to   {opacity:1; transform:translateY(0);}
    }
</style>

</head>
<body>

<div class="box">

<?php if ($status == "success") { ?>
    <h2>Upload Berhasil!</h2>
    <p>Bukti pembayaran berhasil disimpan.</p>
    <a href="tampil_bukti.php" class="btn">Lihat Bukti</a>

<?php } elseif ($status == "format") { ?>
    <h2 style="color:#d62828;">Format Tidak Didukung</h2>
    <p>File harus berupa JPG, JPEG, PNG, atau PDF.</p>
    <a href="upload_bukti.php" class="btn">Coba Lagi</a>

<?php } elseif ($status == "size") { ?>
    <h2 style="color:#d62828;">Ukuran Terlalu Besar</h2>
    <p>Ukuran file maksimal adalah <b>2MB</b>.</p>
    <a href="upload_bukti.php" class="btn">Coba Lagi</a>
<?php } ?>

</div>

</body>
</html>
