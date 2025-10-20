<!DOCTYPE html>
<html lang="en">
<head>
<title>Fungsi dengan Parameter Opsional</title>
</head>
<body>
<?php
/**
 * Mencetak string
 * @param string $teks Nilai string yang akan dicetak
 * @param bool $bold Argumen opsional untuk menentukan cetak tebal atau tidak
 */
function print_teks($teks, $bold = true) {
    if ($bold) {
        echo '<b>' . $teks . '</b><br>';
    } else {
        echo $teks . '<br>';
    }
}

// Mencetak dengan huruf tebal
print_teks('Indonesiaku');

// Mencetak dengan huruf reguler
print_teks('Indonesiaku', false);
?>
</body>
</html>
