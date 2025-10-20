<?php
// Contoh prosedur
function do_print() {
    // Mencetak informasi timestamp
    echo "Waktu saat ini (timestamp): " . time();
}

// Memanggil prosedur
do_print();
echo "<br><br>";

// Contoh fungsi penjumlahan
function jumlah($a, $b) {
    return $a + $b;
}

// Menampilkan hasil fungsi
echo "Hasil penjumlahan 2 + 3 = " . jumlah(2, 3);
?>
