<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo Variabel</title>
</head>
<body>
    <?php
        // Deklarasi dan inisialisasi variabel
        $bil = 3;

        // Dumping informasi mengenai variabel
        echo "<h3>Hasil var_dump:</h3>";
        echo "<pre>";
        var_dump($bil);
        echo "</pre>";

        echo "<h3>Hasil print_r:</h3>";
        echo "<pre>";
        print_r($bil);
        echo "</pre>";
    ?>
</body>
</html>
