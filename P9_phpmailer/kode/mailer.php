<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

function kirimOTP($email, $kode){
    $mail = new PHPMailer(true);
    try{
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'auliariskidewi@gmail.com';
        $mail->Password = 'kwbvitswidyyibwe'; // 16 karakter
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('EMAIL_KAMU@gmail.com','Sewa Futsal');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Kode OTP Login';
        $mail->Body = "
            <h3>Kode OTP Login</h3>
            <h2>$kode</h2>
            <p>Jangan bagikan kode ini ke siapa pun.</p>
        ";

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}
