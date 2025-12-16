<?php
// kirim_email.php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'vendor/autoload.php';

function kirimEmail($penerima_email, $penerima_nama, $subjek, $body_html) {
    $mail = new PHPMailer(true);

    try {
        // --- PENGATURAN SERVER SMTP (WAJIB DIGANTI) ---
        $mail->SMTPDebug = 0; // Matikan debugging saat produksi
        $mail->isSMTP();                                           
        $mail->Host       = 'smtp.gmail.com'; // Contoh: Ganti dengan host SMTP Anda
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = 'auliariskidewi@gmail.com'; // Ganti dengan Email Pengirim Anda
        $mail->Password   = 'kwbvitswidyyibwe'; // Ganti dengan App Password/Password Email Anda
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; 
        $mail->Port       = 465;                                    

        // Pengaturan Pengirim
        $mail->setFrom('auliariskidewi@gmail.com', 'Admin Website');
        $mail->addAddress($penerima_email, $penerima_nama); // Penerima Dinamis

        // Isi Email
        $mail->isHTML(true);                                  
        $mail->Subject = $subjek;
        $mail->Body    = $body_html;
        $mail->AltBody = strip_tags($body_html); 

        $mail->send();
        return true;
    } catch (Exception $e) {
        // Error tidak ditampilkan ke user, hanya dicatat/logged
        // echo "Mailer Error: {$mail->ErrorInfo}"; 
        return false;
    }
}
?>