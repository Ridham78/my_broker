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
        <!-- Libraries Stylesheet -->
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

        <!-- Customized Bootstrap Stylesheet -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
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
                background-color: #00B98E !important;
                color: #fff;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }

            .verify-btn:hover {
                background-color: #00B98E !important;
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

    <body>
        <div class="container-xxl bg-white p-0">



            <!-- Navbar Start -->
            <div class="container-fluid nav-bar bg-transparent">
                <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
                    <a href="index.html" class="navbar-brand d-flex align-items-center text-center">
                        <div class="icon p-2 me-2">
                            <img class="img-fluid" src="img/icon-deal.png" alt="Icon" style="width: 30px; height: 30px;">
                        </div>
                        <h1 class="m-0 text-primary">MyBroker</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <div class="navbar-nav ms-auto">
                            <a href="Homepage2.php" class="nav-item nav-link">Home</a>

                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Property</a>
                                <div class="dropdown-menu rounded-0 m-0">
                                    <a href="property-liist2.php" class="dropdown-item">Property List</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="navbar-nav ms-auto">

                        <a href="About2.php" class="nav-item nav-link">About</a>

                        <a href="Login.php" class="nav-item nav-link">Login</a>
                    </div>
                </nav>
            </div> 
        </div> 
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


    </body>
</html>