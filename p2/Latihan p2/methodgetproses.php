<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Method GET Proses</title>
</head>
<body>
    <?php
    if (isset($_GET["nama"])) {
        echo "Data nama yang diinputkan adalah: " . htmlspecialchars($_GET["nama"]);
    } else {
        echo "Belum ada data yang dikirim.";
    }
    ?>
</body>
</html>




