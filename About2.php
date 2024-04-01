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
                        <a href="hompage2.php" class="nav__link ">HOME</a>
                    </li>
                    <!-- <li class="nav__item">
                        <a href="#featured" class="nav__link">PROPERTY</a>
                    </li> -->
                    <li class="nav__item dropdown">
                        <a href="" class="nav__link">PROPERTY</a>
                        <div class="dropdown-content">
                            <a href="Property-list2.php" class="nav__link active-link">Property list</a>
                            <a href="Property-valuation2.php" class="nav__link active-link">Property Valuation</a>
                        </div>
                    </li>
                    <li class="nav__item">
                        <a href="About2.php" class="nav__link active-link">ABOUT</a>
                    </li>
                    <li class="nav__item">
                        <a href="Login.php" class="nav__link">LOGIN</a>
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

   

        <!--==================== HOME ====================-->
        <section class="story section container">
            <div class="story__container grid">
                <div class="story__data">
                    <h2 class="section__title story__section-title">
                        About Us
                    </h2>

                    <h1 class="story__title">
                       We are providing best    housefor rent and sell
                    </h1>

                  

                    <a href="#" class="button button--small">Get Started</a>
                </div>

                <div class="story__images">
                    <img src="img/aboutus(house).jpg" alt="" class="story__img">
                    <div class="story__square"></div>
                </div>
            </div>
        </section>


        

        

    <!--==================== FOOTER ====================-->
    <footer class="footer section">
        <div class="footer__container container grid">
          

        <span class="footer__copy">&#169; My Broker. All rigths reserved</span>
    </footer>

    <!--=============== SCROLL UP ===============-->
    <a href="#" class="scrollup" id="scroll-up"> 
        <i class='bx bx-up-arrow-alt scrollup__icon' ></i>
    </a>

    <!--=============== SWIPER JS ===============-->
    <script src="js/swiper-bundle.min.js"></script>

    <!--=============== MAIN JS ===============-->
    <script src="js/main.js"></script>
</body>
</html>