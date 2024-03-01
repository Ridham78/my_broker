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
                            <a href="Add-property.php?id=<?php echo$id ?>" class="nav__link active-link">ADD PROPERTY</a>
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
            <?php
        include 'connection.php';
        $query = "SELECT imagepath, cost, type, built, bhk, bathroom, listingtype, p_id, property_status FROM property WHERE status = 1 AND property_status = 1";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            echo '<div class="tab-content"><div id="tab-1" class="tab-pane fade show p-0 active"><div class="row g-4">';

            $propertyCount = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $imag = $row['imagepath'];
                $price = $row['cost'];
                $title = $row['type'];
                $size = $row["built"];
                $beds = $row["bhk"];
                $baths = $row["bathroom"];
                $typee = $row["listingtype"];
                ?>
                <div class="col-lg-4 col-md-6">
                    <!-- HTML code to display the property -->
                    <div class="property-item rounded overflow-hidden">
                        <div class="position-relative overflow-hidden">
                            <div class="p-4 pb-0">
                                <h7 class="text-primary mb-3"><img class="img-fluid" src="<?php echo $imag; ?>" alt="property image"></h7><br><br>
                                <h2 class="d-block h5 mb-2"><?php echo $title; ?></h2>
                                <p class="text-primary mb-3">Price: <?php echo $price; ?></p>
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined text-primary me-2"></i><?php echo $size; ?> Sqft</small>
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-primary me-2"></i><?php echo $beds; ?> Bed</small>
                                <small class="flex-fill text-center py-2"><i class="fa fa-bath text-primary me-2"></i><?php echo $baths; ?> Bath</small>
                                <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3"><?php echo $typee; ?></div><br>
                                <a href="propertyinfo.php?id=<?php echo $_GET['id']; ?>&p_id=<?php echo $row['p_id']; ?>"><br>
                                    <center>
                                        <button class="btninfo">Info</button></a>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }

            echo '</div></div></div>';
        } else {
            echo "No properties found.";
        }
        ?>
        <!--=============== SWIPER JS ===============-->
        <script src="js/swiper-bundle.min.js"></script>

        <!--=============== MAIN JS ===============-->
        <script src="js/main.js"></script>
    </body>

</html>