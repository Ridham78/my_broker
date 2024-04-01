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

        <!-- Icon Font Stylesheet -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <title>My Broker</title>
        <style>
            /*=======profile========*/
            body {

            }

            .card {
                width: 300px;
                height: 400px;
                background-color: #f7f7f7;
                margin: 130px;
                border-radius: 5px;
                padding: 20px;
                box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
                margin-left: 38%;
            }

            .card__title {
                font-size: 24px;
                margin-bottom: 10px;
            }

            .card__subtitle {
                font-size: 18px;
                margin-bottom: 10px;
            }

            .card__wrapper {
                display: flex;
                justify-content: space-between;
                margin-top: 20px;
            }

            .card__btn {
                background-color: #ffb566;
                color: white;
                padding: 10px 20px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                text-align: center;
                font-size: 16px;
                margin: 0 10px;
                transition: background-color 0.3s; /* Add transition effect */
            }

            .card__btn:hover {
                background-color: #000000; /* Change background color on hover */
            }

        </style>
    </head>
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
                        <a href="Add-property.php?id=<?php echo$id ?>" class="nav__link " >ADD PROPERTY</a>
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
    <!--=============Profile==========-->
    <?php
    include 'connection.php';

// Retrieve user data based on the user ID or email
//$userId = 13; // Set the user ID here, or retrieve it dynamically from a session variable
    $userId = $_GET['id'];
//        $userId = 10

    $sql = "SELECT * FROM master_table WHERE U_id='$userId'";
    $result = $conn->query($sql);

// Display user data on the homepage
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='card'>";
            echo "<br><br><br><h1>Profile</h1><br>";
            echo "<div class='card__title'>Name:    " . $row["U_name"] . "</div>";
            echo "<div class='card__subtitle'>Email:  " . $row["U_Email"] . "</div>";
            echo "<div class='card__subtitle'>Contact No.:  " . $row["U_Contact_number"] . "</div>";
            echo "<div class='card__subtitle'>Address:  " . $row["U_Address"] . "</div>";
            echo "<div class='card__wrapper'>";
            echo "<br><a href='MY_PROPERTY.php?id=" . $_GET['id'] . "'><button class='card__btn'>MY PROPERTY</button></a>";
            echo "<br><a href='password.php?id=" . $_GET['id'] . "'><button class='card__btn'>Change Password</button></a>";
            echo "</div>";

            echo "<br><a href='homepage(user).php?id=" . $_GET['id'] . "'><button>Back to Home</button></a>";
        }
    } else {
        echo "No user found";
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
