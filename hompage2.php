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
            <a href="hompage2.html" class="nav__logo">
                <i class='bx bxs-home-circle nav__logo-icon'></i> My Broker

            </a>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="hompage2.php" class="nav__link active-link">HOME</a>
                    </li>
                 
                    <li class="nav__item dropdown">
                        <a href="" class="nav__link">PROPERTY</a>
                        <div class="dropdown-content">
                            <a href="property-list2.php" class="nav__link active-link">Property list</a>
                            <a href="property-valuation2.php" class="nav__link active-link">Property Valuation</a>
                        </div>
                    </li>
                    <li class="nav__item">
                        <a href="About2.php" class="nav__link">ABOUT</a>
                    </li>
                    <li class="nav__item">
                        <a href="Login.php" class="nav__link">LOGIN</a>
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

                    <a href="Registation.html" class="button home__button">Get Started</a>

                </div>
            </div>
        </div>
    </section>

    <!-- ==============TEAM================ -->
    <section class="testimonial section container">
        <div class="testimonial__container grid">
            <div class="swiper testimonial-swiper">
                <div class="swiper-wrapper">
                    <div class="testimonial__card swiper-slide">
                        <div class="testimonial__quote">
                            <i class='bx bxs-quote-alt-left'></i>
                        </div>
                        <p class="testimonial__description">
                            They are the best watches that one acquires, also they are always with the latest
                            news and trends, with a very comfortable price and especially with the attention
                            you receive, they are always attentive to your questions.
                        </p>
                        <h3 class="testimonial__date">March 27. 2021</h3>

                        <div class="testimonial__perfil">
                            <img src="img/profile-pic (1).png" alt="" class="testimonial__perfil-img">

                            <div class="testimonial__perfil-data">
                                <span class="testimonial__perfil-name">Nihar Devani</span>
                                <span class="testimonial__perfil-detail">202103100110200</span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial__card swiper-slide">
                        <div class="testimonial__quote">
                            <i class='bx bxs-quote-alt-left'></i>
                        </div>
                        <p class="testimonial__description">
                            They are the best watches that one acquires, also they are always with the latest
                            news and trends, with a very comfortable price and especially with the attention
                            you receive, they are always attentive to your questions.
                        </p>
                        <h3 class="testimonial__date">March 27. 2021</h3>

                        <div class="testimonial__perfil">
                            <img src="img/profile-pic.png" alt="" class="testimonial__perfil-img">

                            <div class="testimonial__perfil-data">
                                <span class="testimonial__perfil-name">Ridham Bundheliya</span>
                                <span class="testimonial__perfil-detail">202103100110205</span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial__card swiper-slide">
                        <div class="testimonial__quote">
                            <i class='bx bxs-quote-alt-left'></i>
                        </div>
                        <p class="testimonial__description">
                            They are the best watches that one acquires, also they are always with the latest
                            news and trends, with a very comfortable price and especially with the attention
                            you receive, they are always attentive to your questions.
                        </p>
                        <h3 class="testimonial__date">March 27. 2021</h3>

                        <div class="testimonial__perfil">
                            <img src="img/testimonial2.jpg" alt="" class="testimonial__perfil-img">

                            <div class="testimonial__perfil-data">
                                <span class="testimonial__perfil-name">Jay Navadiya</span>
                                <span class="testimonial__perfil-detail">202103100110207</span>
                            </div>
                        </div>
                    </div>

                    <div class="testimonial__card swiper-slide">
                        <div class="testimonial__quote">
                            <i class='bx bxs-quote-alt-left'></i>
                        </div>
                        <p class="testimonial__description">
                            They are the best watches that one acquires, also they are always with the latest
                            news and trends, with a very comfortable price and especially with the attention
                            you receive, they are always attentive to your questions.
                        </p>
                        <h3 class="testimonial__date">March 27. 2021</h3>

                        <div class="testimonial__perfil">
                            <img src="img/testimonial3.jpg" alt="" class="testimonial__perfil-img">

                            <div class="testimonial__perfil-data">
                                <span class="testimonial__perfil-name">Sarthak Mayani</span>
                                <span class="testimonial__perfil-detail">202103100110209</span>
                            </div>
                        </div>
                    </div>


                </div>



                <div class="swiper-button-next">
                    <i class='bx bx-right-arrow-alt'></i>
                </div>
                <div class="swiper-button-prev">
                    <i class='bx bx-left-arrow-alt'></i>
                </div>
            </div>

            <div class="testimonial__images">
                <div class="testimonial__square"></div>
                <img src="img/house2.jpg" alt="" class="testimonial__img">
            </div>
        </div>
    </section>
    <!-- ================================ -->


    <!--==================== FOOTER ====================-->
    <footer class="footer section">
            <div class="footer__container container grid">
                <!-- <div class="footer__content">
                    <h3 class="footer__title">Our information</h3>

                    <ul class="footer__list">
                        <li>1234 - Peru</li>
                        <li>La Libertad </li>
                        <li>123-456-789</li>
                    </ul>
                </div> -->
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