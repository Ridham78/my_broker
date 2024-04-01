<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <link rel="stylesheet" href="css/swiper-bundle.min.css">
        <link rel="stylesheet" href="css/style.css">
        <title>My Broker</title>
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
                margin-top: 146PX;
                margin-left: 23%;
                ;
            }
            label {
                color: #000;
                display: block;
                margin-bottom: 5px;
            }

            input[type="email"] {
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
    </head>
    <body>
        <header class="header" id="header">
            <nav class="nav container">
                <a href="hompage2.php" class="nav__logo">
                    <i class='bx bxs-home-circle nav__logo-icon'></i> My Broker
                </a>

                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list">
                        <li class="nav__item"><a href="hompage2.php" class="nav__link">HOME</a></li>
                        <li class="nav__item dropdown">
                            <a href="#" class="nav__link">PROPERTY</a>
                            <div class="dropdown-content">
                                <a href="#property1" class="nav__link active-link">Property list</a>
                                <a href="#property2" class="nav__link active-link">Property Valuation</a>
                            </div>
                        </li>
                        <li class="nav__item"><a href="About2.php" class="nav__link">ABOUT</a></li>
                        <li class="nav__item"><a href="Login.php" class="nav__link active-link">LOGIN</a></li>
                    </ul>

                    <div class="nav__close" id="nav-close">
                        <i class='bx bx-x'></i>
                    </div>
                </div>

                <div class="nav__btns">
                    <i class='bx bx-moon change-theme' id="theme-button"></i>
                    <div class="nav__toggle" id="nav-toggle">
                        <i class='bx bx-grid-alt'></i>
                    </div>
                </div>
            </nav>
        </header>

        <form action="process_forgot_password.php" method="post">
            <div class="title">
                <p>Forgot Password</p>
            </div>

            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br><br>

            <input type="submit" name="reset" value="Reset Password">
            <br>
            <a href="login.php">Remember your password? Log in</a>
        </form>

        <a href="#" class="scrollup" id="scroll-up">
            <i class='bx bx-up-arrow-alt scrollup__icon'></i>
        </a>

        
        <script src="js/swiper-bundle.min.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>
