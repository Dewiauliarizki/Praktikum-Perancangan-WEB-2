<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Casting Tipe</title>
</head>
<body>
    <?php
    $str = '123abc';
    $bil = (int)$str; // $bil = 123

    echo "Nilai \$str: $str <br>";
    echo "Tipe data \$str: " . gettype($str) . "<br><br>";

    echo "Nilai \$bil: $bil <br>";
    echo "Tipe data \$bil: " . gettype($bil);
    ?>
</body>
</html>
