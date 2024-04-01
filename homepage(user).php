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

                            <a href="homepage(user).php?id=<?php echo$id ?>" class="nav__link active-link">HOME</a>
                        </li>
                        <li class="nav__item dropdown">
                            <a href="#" class="nav__link">PROPERTY</a>
                            <div class="dropdown-content">
                                <a href="Property-list.php?id=<?php echo$id ?>" class="nav__link active-link">Property list</a>
                                <a href="Property-valuation.php?id=<?php echo$id ?>" class="nav__link active-link">Property Valuation</a>
                                <a href="financial_calculator.php?id=<?php echo$id ?>" class="nav__link active-link">Financial Calculator</a>

                            </div>
                        </li>
                        <li class="nav__item">
                            <a href="Add-property.php?id=<?php echo$id ?>" class="nav__link ">ADD PROPERTY</a>
                        </li>
                        <li class="nav__item">
                            <a href="payment.php?id=<?php echo$id ?>" class="nav__link ">SUBSCRIPTION</a>
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
                <a href="homepage(user).php"></a>
                <div class="nav__btns">
                    <!-- Theme change buttoOn -->
                    <i class='bx bx-moon change-theme' id="theme-button"></i>

                    <div class="nav__toggle" id="nav-toggle">
                        <i class='bx bx-grid-alt'></i>
                    </div>
                </div>
            </nav>
        </header>



        <!--==================== HOME ====================-->
        <section class="home" id="home">
            <div class="home__container container grid">
                <div class="home__img-bg">
                    <img src="img/hompage_house.png" alt="" class="home__img">
                </div>

                <div class="home__social">
                    <a href="https://www.facebook.com/" target="_blank" class="home__social-link">
                        Facebook
                    </a>
                    <a href="https://twitter.com/" target="_blank" class="home__social-link">
                        Twitter
                    </a>
                    <a href="https://www.instagram.com/" target="_blank" class="home__social-link">
                        Instagram
                    </a>
                </div>

                <div class="home__data">
                    <h1 class="home__title">Find A Perfect Home <br>To Live with Your Family</h1>


                    <div class="home__btns">
                        <a href="#" class="button button--gray button--small">
                            ‎ ‎ ‎ ‎
                        </a>

                        <a href="ragistation" class="button home__button">Get Started</a>

                    </div>
                </div>
            </div>
        </section>




        <!--==================== FOOTER ====================-->
        <footer class="footer section">
            <div class="footer__container container grid">
                 <div class="footer__content">
                    <h3 class="footer__title">Our information</h3>

                    <ul class="footer__list">
                        <li>1234 - Peru</li>
                        <li>La Libertad </li>
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