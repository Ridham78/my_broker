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
        margin-top: -150px;
        margin-left: 22%;
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
        /*        margin-top: -338px;*/
        margin-left: -30%;
        ;
    }
    label {
        color: #000;
        display: block;
        margin-bottom: 5px;
    }

    input[type="email"],
    input[type="password"] {
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 3px;
        background-color: #f0f0f0;
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

</style>

<!--==================== HEADER ====================-->
<header class="header" id="header">
    <nav class="nav container">
        <a href="hompage2.php" class="nav__logo">
            <i class='bx bxs-home-circle nav__logo-icon'></i> My Broker

        </a>

        <div class="nav__menu" id="nav-menu">
            <ul class="nav__list">
                <li class="nav__item">
                    <a href="hompage2.php" class="nav__link">HOME</a>
                </li>

                <li class="nav__item dropdown">
                    <a href="" class="nav__link">PROPERTY</a>
                    <div class="dropdown-content">
                        <a href="#property1" class="nav__link active-link">Property list</a>
                        <a href="#property2" class="nav__link active-link">Property Valuation</a>
                    </div>
                </li>
                <li class="nav__item">
                    <a href="About2.php" class="nav__link">ABOUT</a>
                </li>
                <li class="nav__item">
                    <a href="Login.php" class="nav__link active-link">LOGIN</a>
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
    <!--    ======================log in-==================-->

    <div class="form">

        <form action="" method="post">
            <center>
                <div class="title">
                    <p>Login form</p>
                </div>
            </center>
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br>

            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required><br><br>

            <input type="submit" name="login_button" value="Login">
            <br>
            <a href="Registation.php">Don't have an account? Sign up</a>
            <br>
            <a href="forgot_password.php">Forgot password?</a>
        </form>

    </div>
</div>
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



