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
                margin-left: -22%;
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
                width: 40%;
                padding: 20px;
                border: 1px solid #ddd;
                border-radius: 5px;
                margin-top: 16%;
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
                width: 99%;
            }

            button {
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
        <!-- HEADER -->
        <header class="header" id="header">
            <!-- Navigation -->
            <nav class="nav container">
                <a href="#" class="nav__logo">
                    <i class='bx bxs-home-circle nav__logo-icon'></i> My Broker
                </a>

                <div class="nav__menu" id="nav-menu">
                    <!-- Navigation Links -->
                    <ul class="nav__list">
                        <!-- Adjusted PHP Link -->
                        <li class="nav__item"><a href="homepage(user).php?id=<?php echo $id ?>" class="nav__link">HOME</a></li>
                        <li class="nav__item dropdown">
                            <a href="#" class="nav__link">PROPERTY</a>
                            <!-- Adjusted PHP Links -->
                            <div class="dropdown-content">
                                <a href="Property-list.php?id=<?php echo $id ?>" class="nav__link active-link">Property list</a>
                                <a href="Property-valuation.php?id=<?php echo $id ?>" class="nav__link active-link">Property Valuation</a>
                            </div>
                        </li>
                        <li class="nav__item"><a href="Add-property.php?id=<?php echo $id ?>" class="nav__link">ADD PROPERTY</a></li>
                        <li class="nav__item"><a href="Profile.php?id=<?php echo $id ?>" class="nav__link active-link">PROFILE</a></li>
                        <li class="nav__item"><a href="logout.php?id=<?php echo $id ?>" class="nav__link">LOGOUT</a></li>
                    </ul>

                    <div class="nav__close" id="nav-close">
                        <i class='bx bx-x'></i>
                    </div>
                </div>

                <div class="nav__btns">
                    <!-- Theme change button -->
                    <i class='bx bx-moon change-theme' id="theme-button"></i>

                    <div class="nav__toggle" id="nav-toggle">
                        <i class='bx bx-grid-alt'></i>
                    </div>
                </div>
            </nav>
        </header>

        <!-- PASSWORD CHANGE FORM -->
        <div class="form">
            <?php
            // Your PHP Code for Password Change Form
            ?>
            <form method="post" action="">
                <input type="hidden" name="id" value="<?php echo $userId; ?>">
                <h1>Update Password</h1><br><br>
                <div class="form-group">
                    <label for="new_password">Enter a New Password:</label>
                    <input type="password" class="form-control" id="new_password" name="new_password" required>
                </div>
                <br>
                <div class="form-group">
                    <label for="confirm_password">Confirm New Password:</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                </div>
                <br><br>
                <button type="submit" class="btn btn-primary" name="password_change">Change Password</button>
            </form>
        </div>

        <!-- SCROLL UP BUTTON -->
        <a href="#" class="scrollup" id="scroll-up">
            <i class='bx bx-up-arrow-alt scrollup__icon'></i>
        </a>

        <!-- SWIPER JS -->
        <script src="js/swiper-bundle.min.js"></script>

        <!-- MAIN JS -->
        <script src="js/main.js"></script>
    </body>

</html>
