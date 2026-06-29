<?php

require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function kirimOTP($emailTujuan, $otp)
{
    $mail = new PHPMailer(true);

    try {

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;

        $mail->Username = 'firqahmaryam30@gmail.com';

        // GANTI DENGAN APP PASSWORD GMAIL
        $mail->Password = 'hnynlazrtbyjxrgj';

        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom(
            'firqahmaryam30@gmail.com',
            'Admin Perpustakaan'
        );

        $mail->addAddress($emailTujuan);

        $mail->isHTML(true);

        $mail->Subject = 'Kode OTP Admin Perpustakaan';

        $mail->Body = "
            <h2>Verifikasi Login Admin</h2>
            <p>Kode OTP Anda adalah:</p>
            <h1>$otp</h1>
            <p>Jangan berikan kode ini kepada siapa pun.</p>
        ";

        $mail->send();

        return true;

    } catch (Exception $e) {

        return false;
    }
}
?>