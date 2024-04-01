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
    <link rel="stylesheet" href="assets/css/style.css">


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
        margin-top:25px;
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
<title>Admin Login</title>
<style>
    .error {
        color: red;
    }
</style>
</head>
<body>
    <div class="login-page">
        <div class="form">
            <form action="" method="post" onsubmit="return validateForm()">
                <center>
                    <div class="title">
                        <p>Admin Login form</p>
                    </div>
                </center>
                <label for="email">Email:</label><br>
                <input type="email" id="email" name="email" ><br>
                <div id="emailError" class="error"></div><br>
                <label for="password">Password:</label><br>
                <input type="password" id="password" name="password"><br>
                <div id="passwordError" class="error"></div><br>
                <input type="submit" name="login_button" value="Login">
                <br>
            </form>
        </div>
    </div>

    <script>
        function validateForm() {
            var email = document.getElementById('email').value;
            var password = document.getElementById('password').value;
            var emailError = document.getElementById('emailError');
            var passwordError = document.getElementById('passwordError');
            var valid = true;

            // Clear previous error messages
            emailError.innerHTML = '';
            passwordError.innerHTML = '';

            // Validate email
            if (!email) {
                emailError.innerHTML = 'Email is required';
                valid = false;
            }

            // Validate password
            if (!password) {
                passwordError.innerHTML = 'Password is required';
                valid = false;
            }

            return valid;
        }
    </script>

    <?php
    // Server-side validation and processing
    include './connection.php';
    if (isset($_POST['login_button'])) {
        // Get the form data
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Validate the form data
        if (!empty($email) && !empty($password)) {
            // Prepare the SQL statement
            $query = "SELECT * FROM Admin WHERE Email='$email' AND Password='$password'";
            $result = mysqli_query($conn, $query);

            if ($result && mysqli_num_rows($result) == 1) {
                // User found, redirect to home page
                // Here, you would typically set a cookie or some other form of identification
                header('Location: ./adminhomepage.php');
                exit();
            } else {
                // User not found, display error message
                echo '<script>alert("Invalid email or password");</script>';
            }
        } else {
            // Empty email or password
            echo '<script>alert("Email and password are required");</script>';
        }

        // Close connection
        mysqli_close($conn);
    }
    ?>
</body>
</html>
