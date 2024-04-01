<?php

session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'connection.php';
require 'Exception.php';
require 'SMTP.php';
require 'PHPMailer.php';

$email = $_SESSION['email'];

$r = mt_rand(100000, 999999);
$_SESSION['otp'] = $r;

$sql = "UPDATE `onetimepassword` SET `mail`='$email', `otp`='$r'";
$result = mysqli_query($conn, $sql);

if (!$result) {
    echo "Error updating OTP in the database: " . mysqli_error($conn);
    exit();
}

$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->SMTPAuth = true;
$mail->Username = 'bundheliyaridham@gmail.com';
$mail->Password = 'pyyz scki wrhq qurx';
$mail->setFrom('bundheliyaridham@gmail.com', 'MY BROKER');

if ($email) {
    $mail->addAddress($email);
} else {
    // Handle missing email address
}

$mail->addReplyTo('bundheliyaridham@gmail.com', 'MY BROKER');
// $mail->SMTPDebug = 2; // Commented out to prevent header modification warning
$mail->IsHTML(true);
$mail->Subject = 'OTP for Login - ' . $r;
$mail->Body = '<html>
                <head>
                    <meta charset="utf-8">
                    <title>Mail</title>
                </head>
                <body>
                    <p>Dear Customer,</p>
                    <p>' . $r . ' is your one-time password (OTP). Please do not share the OTP with others.</p>
                    <p>Regards,</p>
                    <p>Team MY BROKER</p>
                </body>
              </html>';

try {
    if ($mail->send()) {
        header("Location: otp_2.php");
        exit();
    } else {
        echo "Error sending email: " . $mail->ErrorInfo;
    }
} catch (Exception $e) {
    echo "Mailer Error: " . $mail->ErrorInfo;
}
?>
