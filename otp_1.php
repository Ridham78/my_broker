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
$mail->Password = 'kmdq baov ckzv zrqt ';
$mail->setFrom('bundheliyaridham@gmail.com', 'Your Company');

if ($email) {
    $mail->addAddress($email);
} else {
    // Handle missing email address
}

$mail->addReplyTo('bundheliyaridham@gmail.com', 'Your Company');
$mail->SMTPDebug = 2;
$mail->IsHTML(true);
$mail->Subject = 'Verify Your One-Time Password';
$mail->Body = '<html>
                <head>
                    <meta charset="utf-8">
                    <title>Mail</title>
                </head>
                <body>
                    <p>Your One-Time Password (OTP): ' . $r . '</p>
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

<?php
//session_start();
//
//use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\Exception;
//
//require './connection.php';
//
//$email = $_SESSION['email'];
//var_dump($email);
//
//$r = mt_rand(100000, 999999);
//$_SESSION['otp'] = $r;
//
//$sql = "UPDATE `onetimepassword` SET `mail`='$email', `otp`='$r'";
//$result = mysqli_query($conn, $sql);
//
//if (!$result) {
//    echo "Error updating OTP in the database: " . mysqli_error($conn);
//    exit();
//}
//
//// Include Composer's autoloader
//require './vendor/autoload.php';
//
//$mail = new PHPMailer(true);
//$mail->isSMTP();
//$mail->Host = 'smtp.gmail.com';
//$mail->Port = 587;
//$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
//$mail->SMTPAuth = true;
//$mail->Username = 'bundheliyaridham@gmail.com';
//$mail->Password = 'dwcl fark dgxu dvsz';
//$mail->setFrom('bundheliyaridham@gmail.com', 'Your Company');
//$mail->addAddress($email);
//$mail->addReplyTo('bundheliyaridham@gmail.com', 'Your Company');
//$mail->SMTPDebug = 2;
//$mail->IsHTML(true);
//$mail->Subject = 'Verify Your One-Time Password';
//$mail->Body = '<html>
//                <head>
//                    <meta charset="utf-8">
//                    <title>Mail</title>
//                </head>
//                <body>
//                    <p>Your One-Time Password (OTP): ' . $r . '</p>
//                </body>
//              </html>';
//
//if ($mail->send()) {
//    header("Location: otp_2.php");
//    exit();
//} else {
//    echo "Error sending email: " . $mail->ErrorInfo;
//}
?>
//<?php
//
//session_start();
//
//use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\Exception;
//
//require './connection.php';
//require './Exception.php';
//require './SMTP.php';
//require './vendor/autoload.php';
//
//$email = $_SESSION['email'];
//var_dump($email);  // Debugging
//
//$r = mt_rand(100000, 999999);
//$_SESSION['otp'] = $r;
//
//$sql = "UPDATE `onetimepassword` SET `mail`='$email', `otp`='$r'";
//$result = mysqli_query($conn, $sql);
//
//if (!$result) {
//    echo "Error updating OTP in the database: " . mysqli_error($conn);
//    exit();
//}
//
//// Include Composer's autoloader
//require './vendor/autoload.php';
//
//$mail = new PHPMailer(true);
//$mail->isSMTP();
//$mail->Host = 'smtp.gmail.com';
//$mail->Port = 587;
//$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
//$mail->SMTPAuth = true;
//$mail->Username = 'bundheliyaridham@gmail.com';
//$mail->Password = 'dwcl fark dgxu dvsz';
//$mail->setFrom('bundheliyaridham@gmail.com', 'Your Company');
//$mail->addAddress($email);
//$mail->addReplyTo('bundheliyaridham@gmail.com', 'Your Company');
//$mail->SMTPDebug = 2;
//$mail->IsHTML(true);
//$mail->Subject = 'Verify Your One-Time Password';
//$mail->Body = '<html>
//                <head>
//                    <meta charset="utf-8">
//                    <title>Mail</title>
//                </head>
//                <body>
//                    <p>Your One-Time Password (OTP): ' . $r . '</p>
//                </body>
//              </html>';
//
//if ($mail->send()) {
//    header("Location: otp_2.php");
//    exit();
//} else {
//    echo "Error sending email: " . $mail->ErrorInfo;
//}
//
?>
<?php
//use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\Exception;
//use PHPMailer\PHPMailer\SMTP;
//
//require 'connection.php';
//require 'Exception.php';
//require 'SMTP.php';
//require 'PHPMailer.php';
//$email = $_SESSION['email'];  // Check if this value is set correctly
//var_dump($email);
//
//$mail = new PHPMailer(true);
//$mail->isSMTP();
//$mail->Host = 'smtp.gmail.com'; // Replace with your SMTP server host
//$mail->Port = 587;
//$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
//$mail->CharSet = 'utf-8';
//$mail->SMTPAuth = true;
//$mail->Username = 'ridhambundheliya034.ksv@gmail.com'; // Replace with your email address
//$mail->Password = 'hukhpaxqcdirlmtn'; // Replace with your email password
//// Email content
//$mail->setFrom('ridhambundheliya034.ksv@gmail.com', 'MYBROKER'); // Replace with your email address and name
//$mail->addAddress($email);
//$mail->addReplyTo('ridhambundheliya034.ksv@gmail.com', 'MYBROKER');
//$mail->SMTPDebug = false; // Set debug level to suppress all messages from the SMTP server
//// Replace with the appropriate port number
//// Use the provided email address
//$mail->IsHTML(true);
//$mailmessage = '
//         <html>
//         <head>
//             <meta charset="utf-8">
//             <meta name="description" content="Free Web tutorials" />
//             <title>Mail</title>
//             <meta name="keywords" content="HTML, CSS, JavaScript" />
//             <meta name="viewport" content="width=device-width, initial-scale=1.0" />
//             <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
//         <style>
//        body {
//            width: 100%;
//            font-family: \'Inter\', sans-serif;
//            margin: 0;
//            padding: 0;
//            background-color: #ffffff;
//        }
//        .container {
//            max-width: 600px;
//            margin: 0 auto;
//            padding: 20px;
//        }
//        .otp-heading {
//            font-size: 24px;
//            margin-bottom: 20px;
//        }
//        .otp-value {
//            font-size: 36px;
//            margin-bottom: 40px;
//        }
//    </style>   
//</head>
//<body>
//    <div class="container">
//        <p class="otp-heading">Your One-Time Password (OTP)</p>
//        <p class="otp-value">' . $r . '</p>
//    </div>
//</body>
//</html>';
//
//$mail->Subject = 'Verify Your OneTimePassword';
//$mail->Body = $mailmessage;
//
//try {
//    $mail->send();
//    header("Location: otp_2.php");
//    exit();
//} catch (Exception $e) {
//    echo "Message could noFt be sent. Mailer Error: {$mail->ErrorInfo}";
//}
?>