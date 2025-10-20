<html>
<head>
    <title>Proses Input</title>
</head>
<body>
<?php
// Ambil data dari form
$bil1 = $_POST["bil1"];
$bil2 = $_POST["bil2"];
?>

<h1>Perbandingan Bilangan</h1>
<hr>
Bil I : <?php echo htmlspecialchars($bil1); ?><br>
Bil II: <?php echo htmlspecialchars($bil2); ?><br><br>

<?php
// Pastikan input berupa angka
if (is_numeric($bil1) && is_numeric($bil2)) {
    if ($bil1 < $bil2) {
        echo "$bil1 lebih kecil dari $bil2";
    } elseif ($bil1 > $bil2) {
        echo "$bil1 lebih besar dari $bil2";
    } else {
        echo "$bil1 sama dengan $bil2";
    }
} else {
    echo "Harap masukkan angka yang valid!";
}
?>
</body>
</html>
