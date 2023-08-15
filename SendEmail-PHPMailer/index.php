<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
$mail = new PHPMailer(true);

try {
    // SMTP configuration
    $mail->isSMTP();
    $mail->Host       = 'mail.codehafeez.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'hafeez@codehafeez.com';
    $mail->Password   = '**********'; // Email Password
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;

    // Sender and recipient settings
    $mail->setFrom('hafeez@codehafeez.com', 'Abdul Hafeez');
    $mail->addAddress('codehafeez@gmail.com', 'CodeHafeez');

    // Email content
    $mail->isHTML(true);
    $mail->Subject = 'Test Email';
    $mail->Body    = 'This is a test email.';
    $mail->AltBody = 'This is the text-only version of the email.';

    // Send the email
    $mail->send();
    echo 'Message has been sent.';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
}
