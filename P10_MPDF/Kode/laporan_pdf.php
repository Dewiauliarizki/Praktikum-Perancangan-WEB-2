<?php
require __DIR__ . '/vendor/autoload.php';

use Mpdf\Mpdf;

$mpdf = new Mpdf();

$html = '
<h2 style="text-align:center;">Laporan Login</h2>
<hr>
<p><b>Status:</b> Login berhasil</p>
<p><b>Tanggal:</b> ' . date("d-m-Y H:i:s") . '</p>
<p><b>Sistem:</b> Login + Verifikasi Email</p>
';

$mpdf->WriteHTML($html);
$mpdf->Output("laporan_login.pdf", "I"); // I = tampil di browser
