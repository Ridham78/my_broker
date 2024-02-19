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
                            <a href="#home" class="nav__link active-link">HOME</a>
                        </li>
                        <li class="nav__item">
                            <a href="#featured" class="nav__link">PROPERTY</a>
                        </li>
                        <li class="nav__item">
                            <a href="#ABOUT2" class="nav__link">ABOUT</a>
                        </li>
                        <li class="nav__item">
                            <a href="#REGISTARTION" class="nav__link">LOGIN</a>
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
        <!--=============== SWIPER JS ===============-->
        <script src="js/swiper-bundle.min.js"></script>

        <!--=============== MAIN JS ===============-->
        <script src="js/main.js"></script>
    </body>
</html>


<?php
require('./connection.php');
include 'connection.php';

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
                    echo '<script>alert("Registration successful.");</script>';
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


