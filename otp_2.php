<?php
session_start();
require 'connection.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['con'])) {
    $otp = $_POST['otp1'] . $_POST['otp2'] . $_POST['otp3'] . $_POST['otp4'] . $_POST['otp5'] . $_POST['otp6'];
    $email = $_SESSION['email'];

    $sql = "SELECT otp, master_table.U_id FROM onetimepassword
            INNER JOIN master_table ON onetimepassword.mail = master_table.U_Email
            WHERE onetimepassword.mail = ?";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result->num_rows > 0) {
        // User already exists, check OTP
        $row = mysqli_fetch_assoc($result);
        $stored_otp = $row['otp'];

        if ($otp == $stored_otp) {
            $user_id = $row['U_id'];
            header("Location: homepage(user).php?id=$user_id");
            exit();
        } else {
            echo "<script>alert('PLEASE ENTER VALID OTP');</script>";
        }
    } else {
        // New user, insert OTP into database
        $insertSql = "INSERT INTO onetimepassword (mail, otp) VALUES (?, ?)";
        $insertStmt = mysqli_prepare($conn, $insertSql);
        mysqli_stmt_bind_param($insertStmt, "ss", $email, $otp);
        mysqli_stmt_execute($insertStmt);

        // Retrieve the user id of the new user
        $selectNewUserSql = "SELECT U_id FROM master_table WHERE U_Email = ?";
        $selectNewUserStmt = mysqli_prepare($conn, $selectNewUserSql);
        mysqli_stmt_bind_param($selectNewUserStmt, "s", $email);
        mysqli_stmt_execute($selectNewUserStmt);
        $newUserResult = mysqli_stmt_get_result($selectNewUserStmt);
        $newUserRow = mysqli_fetch_assoc($newUserResult);
        $newUserId = $newUserRow['U_id'];

        header("Location: homepage(user).php?id=$newUserId");
        exit();
    }
}
?>


<!DOCTYPE html>
<html lang="en">

    <head>
    <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta content="width=device-width, initial-scale=1.0" name="viewport">
            <meta content="" name="keywords">
            <meta content="" name="description">

            <!-- Favicon -->
            <link href="img/favicon.ico" rel="icon">

            <!-- Google Web Fonts -->
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">
        <a href="Homepage2.php"></a>
        <!-- Icon Font Stylesheet -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
        <a href="about.html"></a>

        <style>
            body {
                font-family: Arial, sans-serif;
            }
            h1{
                text-align: center;
            }
            .button-container {
                display: flex;
                justify-content: center;
                align-items: center;
                height: auto;
                margin: 20px;
            }
            .otp-container {
                display: flex;
                justify-content: center;
                align-items: center;
                gap: 10px;
            }

            .otp-input {
                width: 30px;
                height: 40px;
                text-align: center;
                font-size: 18px;
                border: 1px solid #ccc;
                border-radius: 5px;
            }

            .otp-input:focus {
                outline: none;
                border-color: #007bff;
                box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
            }

            .verify-btn {
                text-align: center;
                display: block;
                margin-top: 10px;
                padding: 10px 100px;
                font-size: 16px;
                background-color: #ffb86c !important;
                color: #fff;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }

            .verify-btn:hover {
                background-color: #000000 !important;
            }
            h1, h2, h3, h4 {
                color: var(--title-color);
                font-weight: var(--font-medium);
                margin-top: 112px;
            }
        </style>
        <script>
            function moveNext(input, nextInput) {
                if (input.value.length === 1) {
                    nextInput.focus();
                }
            }

            function moveBack(input, prevInput, event) {
                if (input.value.length === 0 && event.key === 'Backspace') {
                    prevInput.focus();
                }
            }
        </script>
    </head>
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

        <title>My Broker</title>
    </head>

    <body>
        <!--==================== HEADER ====================-->
        <header class="header" id="header">
            <nav class="nav container">
                <a href="hompage2.html" class="nav__logo">
                    <i class='bx bxs-home-circle nav__logo-icon'></i> My Broker

                </a>

                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list">
                        <li class="nav__item">
                            <a href="hompage2.php" class="nav__link active-link">HOME</a>
                        </li>

                        <li class="nav__item dropdown">
                            <a href="" class="nav__link">PROPERTY</a>
                            <div class="dropdown-content">
                                <a href="property-list2.php" class="nav__link active-link">Property list</a>
                                <a href="property-valuation2.php" class="nav__link active-link">Property Valuation</a>
                            </div>
                        </li>
                        <li class="nav__item">
                            <a href="About2.php" class="nav__link">ABOUT</a>
                        </li>
                        <li class="nav__item">
                            <a href="Login.php" class="nav__link">LOGIN</a>
                        </li>
                    </ul>

                    <div class="nav__close" id="nav-close">
                        <i class='bx bx-x'></i>
                    </div>
                </div>

                <div class="nav__btns">
                    <!-- Theme change buttoOn -->
                    <i class='bx bx-moon change-theme' id="theme-button"></i>

                    <div class="nav__toggle" id="nav-toggle">
                        <i class='bx bx-grid-alt'></i>
                    </div>
                </div>
            </nav>
        </header>
    <body>
        <div class="container-xxl bg-white p-0">




            <br><br><br>
            <h1>OTP Verification</h1><br>

            <form method="post" action="">
                <div class="otp-container">
                    <input class="otp-input" type="text" name="otp1" id="otp1" maxlength="1" pattern="[0-9]" required oninput="moveNext(this, otp2)" onkeydown="moveBack(this, otp1, event)">
                    <input class="otp-input" type="text" name="otp2" id="otp2" maxlength="1" pattern="[0-9]" oninput="moveNext(this, otp3)" onkeydown="moveBack(this, otp1, event)">
                    <input class="otp-input" type="text" name="otp3" id="otp3" maxlength="1" pattern="[0-9]" oninput="moveNext(this, otp4)" onkeydown="moveBack(this, otp2, event)">
                    <input class="otp-input" type="text" name="otp4" id="otp4" maxlength="1" pattern="[0-9]" oninput="moveNext(this, otp5)" onkeydown="moveBack(this, otp3, event)">
                    <input class="otp-input" type="text" name="otp5" id="otp5" maxlength="1" pattern="[0-9]" oninput="moveNext(this, otp6)" onkeydown="moveBack(this, otp4, event)">
                    <input class="otp-input" type="text" name="otp6" id="otp6" maxlength="1" pattern="[0-9]" onkeydown="moveBack(this, otp5, event)">
                </div>
                <div class="button-container">

                    <button class="verify-btn" type="submit" name="con">Verify</button>
                </div>
            </form>

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

</html>%