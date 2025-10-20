<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo Variabel</title>
</head>
<body>
    <?php
        $bil = 3;
        echo "<h3>1. Nilai integer:</h3>";
        echo "<pre>";
        var_dump($bil); // Output: int(3)
        echo "</pre>";

        $var = "";
        echo "<h3>2. Nilai string kosong:</h3>";
        echo "<pre>";
        var_dump($var); // Output: string(0) ""
        echo "</pre>";

        $var = null;
        echo "<h3>3. Nilai NULL:</h3>";
        echo "<pre>";
        var_dump($var); // Output: NULL
        echo "</pre>";
    ?>
</body>
</html>
