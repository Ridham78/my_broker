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

    form   {

        display: flex;
        flex-direction: column;
        width: 50%;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 5px;
        margin-top: 10%;
        margin-left: 25%;
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
        <a href="#" class="nav__logo">
            <i class='bx bxs-home-circle nav__logo-icon'></i> My Broker

        </a>

        <div class="nav__menu" id="nav-menu">
            <ul class="nav__list">
                <li class="nav__item">
                    <?php $id = $_GET['id'] ?>

                    <a href="homepage(user).php?id=<?php echo$id ?>" class="nav__link ">HOME</a>
                </li>
                <li class="nav__item dropdown">
                    <a href="#" class="nav__link">PROPERTY</a>
                    <div class="dropdown-content">
                        <a href="Property-list.php?id=<?php echo$id ?>" class="nav__link active-link">Property list</a>
                        <a href="Property-valuation.php?id=<?php echo$id ?>" class="nav__link active-link">Property Valuation</a>
                    </div>
                </li>
                <li class="nav__item">
                    <a href="Add-property.php?id=<?php echo$id ?>" class="nav__link ">ADD PROPERTY</a>
                </li>
                <li class="nav__item">
                    <a href="Profile.php?id=<?php echo$id ?>" class="nav__link active-link">PROFILE</a>
                </li> <li class="nav__item">
                    <a href="logout.php?id=<?php echo$id ?>" class="nav__link ">LOGOUT</a>
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


<form method="POST" action="">
    <h1>Change Password</h1>
    <br><br><br>
    <label for="U_Email">Email:</label>
    <input type="email" id="U_Email" name="U_Email" required><br><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br><br>

    <input type="submit" name="login_button" value="Change Password">



</form>
</body>
</html>
<?php
include 'connection.php';
$id = $_GET['id'];

// Check if the login form is submitted
if (isset($_POST['login_button'])) {
    // Get the form data
    $email = $_POST['U_Email'];
    $password = $_POST['password'];

    // Validate the form data
    if (!empty($email) && !empty($password)) {
        // Prepare the SQL statement
        $query = "SELECT * FROM master_table WHERE U_Email='$email' AND U_Password='$password'";

        // Execute the SQL statement
        $result = mysqli_query($conn, $query);

        // Check if the login is successful
        if (mysqli_num_rows($result) > 0) {
            // Password and email verified, retrieve the ID from the database
            $row = mysqli_fetch_assoc($result);

            // Redirect to the next step or a new page with the ID
            echo '<script>alert("Login successful. Proceed to the next step with ID: ' . $id . '");</script>';
            echo '<script>window.location.href = "new_password.php?id=' . $id . '";</script>';
            exit;
        } else {
            // Incorrect email or password, display an error message
            echo '<script>alert("Incorrect email or password. Please try again.");</script>';
        }
    } else {
        // If either email or password is empty, display an error message
        echo '<script>alert("Both email and password are required fields.");</script>';
    }
}
?>

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