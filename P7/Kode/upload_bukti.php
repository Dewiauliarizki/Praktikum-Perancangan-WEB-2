<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Upload Bukti Pembayaran</title>

<style>
    body {
        margin: 0;
        padding: 0;
        font-family: "Segoe UI", Arial, sans-serif;
        background: linear-gradient(180deg, #e8f3ff 0%, #f5faff 100%);
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .card {
        background: #ffffff;
        width: 420px;
        padding: 30px;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0, 80, 160, 0.12);
        animation: fadeIn 0.5s ease;
    }

    h2 {
        text-align: center;
        color: #2b6cb0;
        margin-bottom: 22px;
        font-size: 22px;
    }

    label {
        font-weight: 600;
        color: #2d4a70;
        font-size: 14px;
    }

    input[type="text"],
    input[type="file"] {
        width: 100%;
        padding: 10px;
        margin-top: 6px;
        margin-bottom: 16px;
        border: 1px solid #c9ddf2;
        border-radius: 10px;
        background: #fafdff;
        transition: 0.15s ease;
    }

    input[type="text"]:focus,
    input[type="file"]:focus {
        border-color: #3b82f6;
        box-shadow: 0 0 8px rgba(59,130,246,0.25);
        transform: scale(1.01);
    }

    .btn {
        width: 100%;
        padding: 12px;
        border: none;
        border-radius: 10px;
        background: linear-gradient(90deg, #3b82f6, #2563eb);
        color: white;
        font-size: 15px;
        font-weight: 600;
        cursor: pointer;
        transition: 0.2s ease;
        box-shadow: 0 6px 18px rgba(37,99,235,0.3);
    }

    .btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 24px rgba(37,99,235,0.25);
    }

    @keyframes fadeIn {
        from {opacity: 0; transform: translateY(10px);}
        to {opacity: 1; transform: translateY(0);}
    }
</style>

</head>
<body>

<div class="card">
    <h2>Upload Bukti Pembayaran</h2>

    <form action="proses_bukti.php" method="post" enctype="multipart/form-data">

        <label>Nama Pengirim:</label>
        <input type="text" name="nama_pengirim" required>

        <label>Upload Bukti Transfer:</label>
        <input type="file" name="bukti" required>

        <button type="submit" class="btn">SIMPAN</button>
    </form>
</div>

</body>
</html>
