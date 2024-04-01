<?php

if (isset($_POST['reset'])) {
    $email = $_POST['email'];
} else {
    exit();
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer and database connection
require 'connection.php';
require 'Exception.php';
require 'SMTP.php';
require 'PHPMailer.php';

// Create a new instance of PHPMailer
$mail = new PHPMailer(true);

try {
    // Server settings
//    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'bundheliyaridham@gmail.com';
    $mail->Password = 'pyyz scki wrhq qurx';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = 465;

    // Recipients
    $mail->setFrom('bundheliyaridham@gmail.com', 'MY BROKER');
    $mail->addAddress($email);

    // Generate a random code
    $code = substr(str_shuffle('1234567890QWERTYUIOPASDFGHJKLZXCVBNM'), 0, 10);

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Password Reset';
    $mail->Body = 'To reset your password click <a href="http://localhost/my_broker/reset_password.php?code=' . $code . '">here</a>.<br> Reset your password within a day.';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    // Check if the email exists in the database
    $verify = $conn->query("SELECT * FROM `master_table` WHERE U_Email = '$email'");

    if ($verify->num_rows) {
        // Update the code in the database
        $code_update = $conn->query("UPDATE master_table SET code = '$code' WHERE U_Email = '$email'");

        // Send the email
        $mail->send();
        echo 'Message has been sent, check your email';
    } else {
        echo 'Email not found';
    }

    $conn->close();
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>