<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--=============== FAVICON ===============-->
        <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">

        <!--=============== BOXICONS ===============-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

        <!--=============== SWIPER CSS ===============--> 
        <link rel="stylesheet" href="css/swiper-bundle.min.css">

        <!--=============== CSS ===============-->
        <link rel="stylesheet" href="css/style.css">
        <style>

            body {
                color: #000;
                line-height: 1.5;
            }

            .title p {
                font-size: 20px;
                color: orange;
                font-weight: bold;
                margin: 0;
            }

            .form {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                min-height: 100vh;
                border-radius: 5px;
                margin-top: -58px;
            }

            .title {
                margin-bottom: 20px;
            }

            .title p {
                font-size: 1.5em;
                font-weight: bold;
            }

            form {
                display: flex;
                flex-direction: column;
                width: 50%;
                padding: 20px;
                border: 1px solid #ddd;
                border-radius: 5px;
                margin-left: 30%;
                margin-top: 161px;
            }

            label {
                color: #000;
                display: block;
                margin-bottom: 5px;
            }

            input[type="text"],
            input[type="email"],
            input[type="password"] {
                padding: 10px;
                border: 1px solid #ddd;
                border-radius: 3px;
                background-color: #f0f0f0;
                margin-bottom: 10px;
            }

            input[type="submit"] {
                padding: 10px 20px;
                border: none;
                border-radius: 5px;
                background-color: #ffa500;
                color: #fff;
                cursor: pointer;
            }

            a {
                color: #ffa500;
                text-decoration: none;
            }

            .error-message {
                color: red;
                margin-top: 5px;
            }

        </style>
        <title>My Broker</title>
    </head>
    <body>
        <!--==================== HEADER ====================-->
        <header class="header" id="header">
            <nav class="nav container">
                <a href="#" class="nav__logo">
                    <i class='bx bxs-home-circle nav__logo-icon'></i> My Broker

                </a>

                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list">
                        <li class="nav__item">
                            <a href="hompage2.php" class="nav__link">HOME</a>
                        </li>
                        <li class="nav__item">
                            <a href="Property-list2.php" class="nav__link">PROPERTY</a>
                        </li>
                        <li class="nav__item">
                            <a href="About2.php" class="nav__link">ABOUT</a>
                        </li>
                        <li class="nav__item">
                            <a href="Login.php" class="nav__link active-link">LOGIN</a>
                        </li>
                    </ul>

                    <div class="nav__close" id="nav-close">
                        <i class='bx bx-x' ></i>
                    </div>
                </div>

                <div class="nav__btns">
                    <!-- Theme change buttoOn -->
                    <i class='bx bx-moon change-theme' id="theme-button"></i>

                    <div class="nav__toggle" id="nav-toggle">
                        <i class='bx bx-grid-alt' ></i>
                    </div>
                </div>
            </nav>
        </header>

        <form name="myForm" onsubmit="return validateForm()" action="" method="post">
            <center><div class="title">
                    <p>Registration</p>
                </div></center>
            <label>Name:</label><br>
            <input type="text" id="name" name="name" pattern="[A-Za-z]+" oninput="validateName()">
            <div class="error-message" id="nameError"></div>

            <label>Email:</label><br>
            <input type="email" id="email" name="email" oninput="validateEmail()" required>
            <div class="error-message" id="emailError"></div>

            <label>Contact Number:</label><br>
            <input type="text" id="phone" name="contact_number" pattern="\d{10}" oninput="validatePhone()" required oninput="this.value=this.value.replace(/[^0-9]/g,'');" maxlength="10" title="Please enter a 10-digit phone number">
            <div class="error-message" id="phoneError"></div>

            <label>Password:</label><br>
            <input type="password" name="password" oninput="validatePassword()" required>
            <div class="error-message" id="passwordError"></div>

            <label>Confirm Password:</label><br>
            <input type="password" name="confiPassword" oninput="validatePasswordMatch()" required>
            <div class="error-message" id="passwordMatchError"></div>

            <label>Address:</label><br>
            <input type="text" name="address" required><br>
            <input type="submit" name="signUP_button" value="Sign Up">
            <br>
            <a href="Login.php">Do you have an account? Sign in</a>
        </form>

        <!--==================== HOME ====================-->





        <!--==================== FOOTER ====================-->
        <footer class="footer section">
            <div class="footer__container container grid">


                <span class="footer__copy">&#169; Bedimcode. All rigths reserved</span>
        </footer>

        <!--=============== SCROLL UP ===============-->
        <a href="#" class="scrollup" id="scroll-up"> 
            <i class='bx bx-up-arrow-alt scrollup__icon' ></i>
        </a>
        <script>
            function validateName() {
                const nameInput = document.getElementById('name');
                const nameValue = nameInput.value.trim();
                const nameError = document.getElementById('nameError');

                if (!/^[A-Za-z]+$/.test(nameValue)) {
                    nameError.innerText = 'Name should contain only letters.';
                } else {
                    nameError.innerText = '';
                }
            }

            function validateEmail() {
                const emailInput = document.getElementById('email');
                const emailValue = emailInput.value.trim();
                const emailError = document.getElementById('emailError');

                if (!/^\S+@\S+\.\S+$/.test(emailValue)) {
                    emailError.innerText = 'Invalid email format.';
                } else {
                    emailError.innerText = '';
                }
            }

            function validatePhone() {
                const phoneInput = document.getElementById('phone');
                const phoneValue = phoneInput.value.trim();
                const phoneError = document.getElementById('phoneError');

                if (!/^\d{10}$/.test(phoneValue)) {
                    phoneError.innerText = 'Phone number must be 10 digits.';
                } else {
                    phoneError.innerText = '';
                }
            }

            function validatePassword() {
                const passwordInput = document.getElementsByName('password')[0];
                const passwordValue = passwordInput.value.trim();
                const passwordError = document.getElementById('passwordError');

                if (!/(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W).{8,}/.test(passwordValue)) {
                    passwordError.innerText = 'Password must contain at least one uppercase letter, one lowercase letter, one special character, and one digit, and be at least 8 characters long.';
                } else {
                    passwordError.innerText = '';
                }
            }

            function validatePasswordMatch() {
                const passwordInput = document.getElementsByName('password')[0];
                const confirmPasswordInput = document.getElementsByName('confiPassword')[0];
                const passwordMatchError = document.getElementById('passwordMatchError');

                if (passwordInput.value !== confirmPasswordInput.value) {
                    passwordMatchError.innerText = 'Passwords do not match.';
                } else {
                    passwordMatchError.innerText = '';
                }
            }

            function validateForm() {
                // Run all validation functions
                validateName();
                validateEmail();
                validatePhone();
                validatePassword();
                validatePasswordMatch();

                // Check if any error messages are present
                const errorMessages = document.querySelectorAll('.error-message');
                for (const errorMessage of errorMessages) {
                    if (errorMessage.innerText !== '') {
                        return false; // Stop form submission if there are errors
                    }
                }

                return true;
            }
        </script>
        <!--==================== FOOTER ====================-->
        <footer class="footer section">
            <div class="footer__container container grid">
                <!-- <div class="footer__content">
                    <h3 class="footer__title">Our information</h3>

                    <ul class="footer__list">
                        <li>1234 - Peru</li>
                        <li>La Libertad </li>
                        <li>123-456-789</li>
                    </ul>
                </div> -->
                <div class="footer__content">
                    <h3 class="footer__title">About Us</h3>

                    <ul class="footer__links">
                        <li>
                            <a href="#" class="footer__link">Support Center</a>
                        </li>
                        <li>
                            <a href="#" class="footer__link">Customer Support</a>
                        </li>
                        <li>
                            <a href="#" class="footer__link">About Us</a>
                        </li>
                        <li>
                            <a href="#" class="footer__link">Copy Right</a>
                        </li>
                    </ul>
                </div>

                <div class="footer__content">
                    <h3 class="footer__title">Property</h3>

                    <ul class="footer__links">
                        <li>
                            <a href="#" class="footer__link">House</a>
                        </li>
                        <li>
                            <a href="#" class="footer__link">Villa</a>
                        </li>
                        <li>
                            <a href="#" class="footer__link">Apartment</a>
                        </li>
                        <li>
                            <a href="#" class="footer__link">Plot</a>
                        </li>
                    </ul>
                </div>

                <div class="footer__content">
                    <h3 class="footer__title">Social</h3>

                    <ul class="footer__social">
                        <a href="https://www.facebook.com/" target="_blank" class="footer__social-link">
                            <i class='bx bxl-facebook'></i>
                        </a>

                        <a href="https://twitter.com/" target="_blank" class="footer__social-link">
                            <i class='bx bxl-twitter'></i>
                        </a>

                        <a href="https://www.instagram.com/" target="_blank" class="footer__social-link">
                            <i class='bx bxl-instagram'></i>
                        </a>
                    </ul>
                </div>
            </div>


            <span class="footer__copy">&#169; My Broker. All rigths reserved</span>
        </footer>

        <!--=============== SCROLL UP ===============-->
        <a href="#" class="scrollup" id="scroll-up">
            <i class='bx bx-up-arrow-alt scrollup__icon'></i>
        </a>

        <!--=============== SWIPER JS ===============-->
        <script src="js/swiper-bundle.min.js"></script>

        <!--=============== MAIN JS ===============-->
        <script src="js/main.js"></script>
    </body>
</html>


<?php
//require('./connection.php');
//include 'connection.php';
//
//if (isset($_POST['signUP_button'])) {
//    // Get the form data
//    $name = $_POST['name'];
//    $email = $_POST['email'];
//    $Contact = $_POST['contact_number'];
//    $password = $_POST['password'];
//    $confPassword = $_POST['confiPassword'];
//    $address = $_POST['address'];
//
//    if (!empty($name) && !empty($email) && !empty($Contact) && !empty($password) && !empty($confPassword) && !empty($address)) {
//        if ($password == $confPassword) {
//            // Check if the email already exists in the database
//            $checkQuery = "SELECT U_Email FROM master_table WHERE U_Email = '$email'";
//            $checkResult = mysqli_query($conn, $checkQuery);
//
//            if (mysqli_num_rows($checkResult) > 0) {
//                // Email already exists, display an error message
//                echo '<script>alert("Email is already in use. Please choose a different email.");</script>';
//            } else {
//                // Email is available, proceed with the registration
//                // Prepare the SQL statement
//                $query = "INSERT INTO master_table(U_name,U_Email,U_Contact_number,U_Address,U_Password) VALUES('$name','$email','$Contact','$address','$password')";
//                $result = mysqli_query($conn, $query);
//
//                if ($result) {
//                    echo '<script>alert("Registration successful.");</script>';
//                } else {
//                    echo 'Error: ' . mysqli_error($conn);
//                }
//            }
//        } else {
//            echo '<script>alert("Passwords do not match!");</script>';
//        }
//    }
//}
//
//mysqli_close($conn);
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'connection.php';
require 'Exception.php';
require 'SMTP.php';
require 'PHPMailer.php';

$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->SMTPAuth = true;
$mail->Username = 'bundheliyaridham@gmail.com';
$mail->Password = 'kmdq baov ckzv zrqt ';
$mail->setFrom('bundheliyaridham@gmail.com', 'MY BROKER');

if (isset($_POST['signUP_button'])) {
    // Get the form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $Contact = $_POST['contact_number'];
    $password = $_POST['password'];
    $confPassword = $_POST['confiPassword'];
    $address = $_POST['address'];

    if (!empty($name) && !empty($email) && !empty($Contact) && !empty($password) && !empty($confPassword) && !empty($address)) {
        if ($password == $confPassword) {
            // Check if the email already exists in the database
            $checkQuery = "SELECT U_Email FROM master_table WHERE U_Email = '$email'";
            $checkResult = mysqli_query($conn, $checkQuery);

            if (mysqli_num_rows($checkResult) > 0) {
                // Email already exists, display an error message
                echo '<script>alert("Email is already in use. Please choose a different email.");</script>';
            } else {
                // Email is available, proceed with the registration
                // Prepare the SQL statement
                $query = "INSERT INTO master_table(U_name,U_Email,U_Contact_number,U_Address,U_Password) VALUES('$name','$email','$Contact','$address','$password')";
                $result = mysqli_query($conn, $query);

                if ($result) {
                    // Registration successful, send an email
                    $mail->addAddress($email);
                    $mail->addReplyTo('bundheliyaridham@gmail.com', 'MY BROKER');
                    $mail->IsHTML(true);
                    $mail->Subject = 'Registration Successful';
                    $mail->Body = '<html>
                                    <head>
                                        <meta charset="utf-8">
                                        <title>Registration Successful</title>
                                    </head>
                                    <body>
                                        <p>Dear ' . $name . ',</p>
                                        <p>Thank you for registering with our system.</p>
                                        <p>Your registration details:</p>
                                        <p>Email: ' . $email . '</p>
                                        <p>Password ' . $password . '</p>
                                        <p>Contact Number: ' . $Contact . '</p>
                                        <p>Address: ' . $address . '</p>
                                        <p>Best regards,<br>Your System</p>
                                    </body>
                                  </html>';

                    try {
                        if ($mail->send()) {
                            echo '<script>alert("Registration successful. An email has been sent to your registered email address.");</script>';
                            header("Location: otp_2.php");
                            exit();
                        } else {
                            echo "Error sending email: " . $mail->ErrorInfo;
                        }
                    } catch (Exception $e) {
                        echo "Mailer Error: " . $mail->ErrorInfo;
                    }
                } else {
                    echo 'Error: ' . mysqli_error($conn);
                }
            }
        } else {
            echo '<script>alert("Passwords do not match!");</script>';
        }
    }
}

mysqli_close($conn);
?>




