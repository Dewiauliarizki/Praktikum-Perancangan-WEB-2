<?php
echo "<h3>Tes Psyko PHP</h3>";

// a. 4 6 9 13 18 ? ?
echo "<b>a.</b> ";
$a = [4, 6, 9, 13, 18];
for ($i = 1; $i <= 2; $i++) {
    $selisih = 1 + count($a); // bertambah 1 setiap kali
    $next = $a[count($a) - 1] + ($i + 5); // atau bisa manual: +6, +7
    $a[] = $next;
}
echo implode(" ", $a) . "<br>";

// b. 2 2 3 3 4 ? ?
echo "<b>b.</b> ";
$b = [2, 2, 3, 3, 4];
while (count($b) < 7) {
    $b[] = $b[count($b) - 2] + 1; // setiap dua angka, naik satu
}
echo implode(" ", $b) . "<br>";

// c. 1 9 2 10 3 ? ?
echo "<b>c.</b> ";
$c1 = [1, 2, 3]; // pola pertama
$c2 = [9, 10];   // pola kedua
// lanjutkan 2 angka berikutnya
$c1[] = 4;
$c2[] = 11;
$c1[] = 5;
$c2[] = 12;

$c = [];
for ($i = 0; $i < count($c1); $i++) {
    if (isset($c1[$i])) $c[] = $c1[$i];
    if (isset($c2[$i])) $c[] = $c2[$i];
}
echo implode(" ", $c);
?>
