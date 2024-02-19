<?php
//require 'connection.php';
//require 'OTP/Exception.php';
//require 'OTP/SMTP.php';
//require 'OTP/PHPMailer.php';
//
//if (isset($_POST['login_button'])) {
//    $email = $_POST['email'];
//    $password = $_POST['password'];
//
//    if (!empty($email) && !empty($password)) {
//        $query = "SELECT * FROM `master_table` WHERE `U_Email`='$email' AND `U_Password`='$password'";
//        $result = mysqli_query($conn, $query);
//
//        if ($result && mysqli_num_rows($result) == 1) {
//            $row = mysqli_fetch_assoc($result);
//            $status = $row['status'];
//
//            if ($status == 1) {
//                // Generate OTP
//                $otp = mt_rand(100000, 999999);
//
//                // Update OTP in the database
//                $Sql = "UPDATE `onetimepassword` SET `mail`='$email', `otp`='$otp'";
//                $Result = mysqli_query($conn, $Sql);
//
//                if ($Result) {
//                    // Send email with OTP
//                    $mail = new PHPMailer\PHPMailer\PHPMailer(true);
//                    $mail->isSMTP();
//                    $mail->Host = 'smtp.gmail.com';
//                    $mail->Port = 587;
//                    $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
//                    $mail->SMTPAuth = true;
//                    $mail->Username = 'bundheliyaridham@gmail.com';
//                    $mail->Password = 'dwcl fark dgxu dvsz';
//                    $mail->setFrom('bundheliyaridham@gmail.com', 'Your Company');
//                    $mail->addAddress($email);
//                    $mail->addReplyTo('bundheliyaridham@gmail.com', 'Your Company');
//                    $mail->SMTPDebug = 2;
//                    $mail->IsHTML(true);
//                    $mail->Subject = 'Verify Your One-Time Password';
//                    $mail->Body = '<html>
//                        <head>
//                            <meta charset="utf-8">
//                            <title>Mail</title>
//                        </head>
//                        <body>
//                            <p>Your One-Time Password (OTP): ' . $otp . '</p>
//                        </body>
//                    </html>';
//
//                    if ($mail->send()) {
//                        // Redirect to otp_2.php with the email and OTP in the URL
//                        header("Location: otp_2.php");
//                        exit();
//                    } else {
//                        echo "Error sending email: " . $mail->ErrorInfo;
//                    }
//                } else {
//                    echo "Error updating OTP in the database: " . mysqli_error($conn);
//                }
//            } else {
//                echo '<script>alert("Your account is not approved by the admin yet.");</script>';
//            }
//        } else {
//            $error_message = "Invalid username or password.";
//        }
//    } else {
//        $error_message = "Please enter both your email and password.";
//    }
//}
//
//if (isset($error_message)) {
//    echo '<script>alert("' . $error_message . '");</script>';
//}
//
//mysqli_close($conn);
?>

<!--<!DOCTYPE html>
<html lang="en">
    <head>
         Add your head content here 
    </head>
    <body>
         Add your body content here 

        <div class="form">
            <div class="title">
                <p>Login form</p>
            </div>
            <form action="" method="post">
                <label for="email">Email:</label><br>
                <input type="email" id="email" name="email" required><br>

                <label for="password">Password:</label><br>
                <input type="password" id="password" name="password" required><br><br>

                <input type="submit" name="login_button" value="Login">
                <a href="Registation.php">Don't have an account? Sign up</a>
            </form> 
        </div>
    </body>
</html>-->
<?php
session_start();
require 'connection.php';

if (isset($_POST['login_button'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($email) && !empty($password)) {
        $query = "SELECT * FROM `master_table` WHERE `U_Email`='$email' AND `U_Password`='$password'";
        $result = mysqli_query($conn, $query);
        $_SESSION['email'] = $email;
        if ($result && $result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $status = $row['status'];
            $email = $row['U_Email'];
            $_SESSION['email'] = $email;
            if ($status == 1) {
                $user_id = $row['U_id'];
                $_SESSION['email'] = $email; // Store the email in the session
                header("Location: otp_1.php?id=$user_id");
                exit();
            } else {
                echo '<script>alert("Your account is not approved by the admin yet.");</script>';
            }
        } else {
            $error_message = "Invalid username or password.";
        }
    } else {
        $error_message = "Please enter both your email and password.";
    }
}

if (isset($error_message)) {
    echo '<script>alert("' . $error_message . '");</script>';
}

mysqli_close($conn);
?>


<br><br><br>

<div class="container-xxl bg-white p-0">
    <!-- Navbar and other HTML content are retained here -->
    <br><br><br>
    <!-- login.php -->

    <div class="form">
        <div class="title">
            <p>Login form</p>
        </div>
        <form action="" method="post">
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br>

            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required><br><br>

            <input type="submit" name="login_button" value="Login">
            <a href="Registation.php">Don't have an account ? Sign up</a>
        </form> 
    </div>
</div>
</div>

</body>
</html>



