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

    <style>
        .row.g-4 {
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
        <!-- <style>
                /* Add your CSS styling here */
                .featured__container {
                    margin-bottom: 20px;
                }
        
                .featured__card {
                    border: 1px solid #ccc;
                    border-radius: 5px;
                    overflow: hidden;
                }
        
                .featured__tag {
                    background-color: #007bff;
                    color: #fff;
                    padding: 5px 10px;
                    font-size: 14px;
                    display: block;
                }
        
                .featured__img {
                    width: 100%;
                    height: auto;
                }
        
                .featured__data {
                    padding: 15px;
                }
        
                .featured__title {
                    color: #333;
                    margin-bottom: 10px;
                }
        
                .featured__price {
                    color: #007bff;
                    font-weight: bold;
                    display: block;
                    margin-top: 10px;
                }
        
                .flex-fill {
                    flex: 1;
                    text-align: center;
                    padding: 10px;
                    border-right: 1px solid #ccc;
                }
        
                .button {
                    background-color: #007bff;
                    color: #fff;
                    border: none;
                    padding: 10px 20px;
                    border-radius: 5px;
                    text-decoration: none;
                    cursor: pointer;
                    transition: background-color 0.3s;
                    display: block;
                    margin-top: 10px;
                }
        
                .button:hover {
                    background-color: #0056b3;
                }
            </style>-->
    <body>
        <style>


            .py-5 {
                padding-top: 5rem;
                padding-bottom: 5rem;
            }

            h1 {
                font-size: 2.5rem;
                color: #00000;
            }

            p {
                font-size: 1.2rem;
                color: #333333;
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

        <div class="container-xxl bg-white p-0">
            <div class="container-xxl py-5">
                <div class="container">
                    <div class="row g-0 gx-5 align-items-end">
                        <div class="col-lg-6">
                            <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                                <h1 class="mb-3">Property Listing</h1>
                                <p></p>
                            </div>
                        </div>
                        <div class="col-lg-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
                            <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                               <li class="nav-item me-2">
                                    <?php $id = $_GET['id'] ?>

                                    <a class="nav__link " href="Property-list.php?id=<?php echo$id ?>">All Property</a>
                                </li>
                                <li class="nav-item me-2">
                                    <a class="nav__link active-link" href="sell.php?id=<?php echo$id ?>">For Sell</a>
                                </li>
                                <li class="nav-item me-0">
                                    <a class="nav__link " href="rent.php?id=<?php echo$id ?>">For Rent</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div></div>
            <?php
            require('./connection.php');

            $query = "SELECT imagepath, cost, type, built, bhk, bathroom, listingtype, p_id FROM property WHERE listingtype='sell' AND status = 1";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                echo '<div class="tab-content"><div id="tab-1" class="tab-pane fade show p-0 active"><div class="row g-4 container">';

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
                    <div class="row-3 justify-content-around">
                        <div class="featured__card" >
                            <span class="featured__tag"><?php echo $typee; ?></span>

                            <img src="<?php echo $imag; ?>" alt="" class="featured__img">

                            <div class="featured__data">
                                <h3 class="featured__title"><?php echo $title; ?></h3>
                                <span class="featured__price">Price: <?php echo $price; ?></span>
                            </div>
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined text-primary me-2"></i><?php echo $size; ?> Sqft</small>
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-primary me-2"></i><?php echo $beds; ?> Bed</small>
                            <small class="flex-fill text-center py-2"><i class="fa fa-bath text-primary me-2"></i><?php echo $baths; ?> Bath</small>
                            <a href="info.php?id=<?php echo $_GET['id']; ?>&p_id=<?php echo $row['p_id']; ?>"><br><br>
                                <button class="button featured__button">Info</button></a>
                        </div>
                    </div>

                    <?php
                }

                echo '</div></div></div>';
            } else {
                echo "No properties found.";
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



