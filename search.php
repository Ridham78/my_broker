
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
            .row.g-4 {
                margin-left: 16%;
                margin-right: 24%;
                margin-top: 10%;
                display: flex;
                flex-wrap: wrap;
                justify-content: flex-end;
            }

            .featured__container {
                width: 30%;
                margin-bottom: 20px;
                margin-right: 20px;
                gap: 1rem;
            }

        </style>
    </head>
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
                        <a href="#" class="nav__link active-link">PROPERTY</a>
                        <div class="dropdown-content">
                            <a href="Property-list.php?id=<?php echo$id ?>" class="nav__link active-link">Property list</a>
                            <a href="Property-valuation.php?id=<?php echo$id ?>" class="nav__link active-link">Property Valuation</a>
                        </div>
                    </li>
                    <li class="nav__item">
                        <a href="Add-property.php?id=<?php echo$id ?>"class="nav__link " >ADD PROPERTY</a>
                    </li>
                    <li class="nav__item">
                        <a href="Profile.php?id=<?php echo$id ?>" class="nav__link ">PROFILE</a>
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
    <form action="search.php" method="GET" class="mb-3">
        <?php $id = $_GET['id'] ?>

        <br><br><br><br><br><br><br><br>
        <label for="propertyType">Property Type:</label>
        <select name="propertyType" id="propertyType" class="form-select">
            <option value="Apart">Apartment</option>
            <option value="House">House</option>
            <option value="Vill">Villa</option>
            <option value="Plot">Plot</option>
            <option value="Land">Land</option>
        </select>

        <label for="listingType" class="ms-3">Listing Type:</label>
        <select name="listingType" id="listingType" class="form-select">
            <option value="Sell">Sell</option>
            <option value="Rent">Rent</option>
        </select>

        <a href="search.php?id=<?php echo $_GET['id']; ?>&propertyType=<?php echo $_GET['propertyType']; ?>&listingType=<?php echo $_GET['listingType']; ?>">
            <button class="btn btn-primary ms-3">Search</button>
        </a>


    </form>
    <?php
    include 'connection.php';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $propertyType = isset($_GET['propertyType']) ? $_GET['propertyType'] : '';
        $listingType = isset($_GET['listingType']) ? $_GET['listingType'] : '';

        $query = "SELECT imagepath, cost, type, built, bhk, bathroom, listingtype, p_id FROM property WHERE status = 1";

        if (!empty($propertyType)) {
            $query .= " AND type = '$propertyType'";
        }

        if (!empty($listingType)) {
            $query .= " AND listingtype = '$listingType'";
        }

        $result = mysqli_query($conn, $query);

        // Rest of your code for displaying properties
        if (mysqli_num_rows($result) > 0) {
            echo '<div class="tab-content"><div id="tab-1" class="tab-pane fade show p-0 active"><div class="row g-4 container">';

            $propertyCount = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                // Property display code remains the same
                $imag = $row['imagepath'];
                $price = $row['cost'];
                $title = $row['type'];
                $size = $row["built"];
                $beds = $row["bhk"];
                $baths = $row["bathroom"];
                $typee = $row["listingtype"];

                echo '<div class="row-3 justify-content-around">';
                echo '<div class="featured__card">';
                echo '<span class="featured__tag">' . $typee . '</span>';
                echo '<img src="' . $imag . '" alt="" class="featured__img">';
                echo '<div class="featured__data">';
                echo '<h3 class="featured__title">' . $title . '</h3>';
                echo '<span class="featured__price">Price: ' . $price . '</span>';
                echo '</div>';
                echo '<small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined text-primary me-2"></i>' . $size . ' Sqft</small>';
                echo '<small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-primary me-2"></i>' . $beds . ' Bed</small>';
                echo '<small class="flex-fill text-center py-2"><i class="fa fa-bath text-primary me-2"></i>' . $baths . ' Bath</small>';

                echo '<a href="info.php?id=' . $id . '&p_id=' . $row['p_id'] . '">';
                echo '<br><br>';
                echo '<button class="button featured__button">Info</button>';
                echo '</a>';
                echo '</div>';
                echo '</div>';
            }

            echo '</div></div></div>';
        } else {
            echo "No properties found.";
        }
    }
    ?>


    <!--==================== FOOTER ====================-->
    <footer class="footer section">
        <div class="footer__container container grid">
            <div class="footer__content">
                <h3 class="footer__title">Our information</h3>

                <ul class="footer__list">
                    <li>1234 - Peru</li>
                    <li>La Libertad 43210</li>
                    <li>123-456-789</li>
                </ul>
            </div>
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
                <h3 class="footer__title">Product</h3>

                <ul class="footer__links">
                    <li>
                        <a href="#" class="footer__link">Road bikes</a>
                    </li>
                    <li>
                        <a href="#" class="footer__link">Mountain bikes</a>
                    </li>
                    <li>
                        <a href="#" class="footer__link">Electric</a>
                    </li>
                    <li>
                        <a href="#" class="footer__link">Accesories</a>
                    </li>
                </ul>
            </div>

            <div class="footer__content">
                <h3 class="footer__title">Social</h3>

                <ul class="footer__social">
                    <a href="https://www.facebook.com/" target="blank" class="footer_social-link">
                        <i class='bx bxl-facebook'></i>
                    </a>

                    <a href="https://twitter.com/" target="blank" class="footer_social-link">
                        <i class='bx bxl-twitter'></i>
                    </a>

                    <a href="https://www.instagram.com/" target="blank" class="footer_social-link">
                        <i class='bx bxl-instagram'></i>
                    </a>
                </ul>
            </div>
        </div>


        <span class="footer__copy">&#169; Bedimcode. All rigths reserved</span>
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