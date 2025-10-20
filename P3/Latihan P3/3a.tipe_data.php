<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek Tipe</title>
</head>
<body>
    <?php
        // Variabel integer
        $bil = 3;
        echo "<h3>1. Pemeriksaan tipe integer:</h3>";
        echo "<p>Nilai variabel: $bil</p>";
        echo "<pre>";
        var_dump(is_int($bil)); 
        echo "</pre>";

        // Variabel string
        $var = "";
        echo "<h3>2. Pemeriksaan tipe string:</h3>";
        echo "<p>Nilai variabel: (string kosong)</p>";
        echo "<pre>";
        var_dump(is_string($var)); 
        echo "</pre>";
    ?>
</body>
</html>
