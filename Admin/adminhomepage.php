<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--=============== FAVICON ===============-->
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">

    <!--=============== BOXICONS ===============-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <!--=============== SWIPER CSS ===============-->
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="assets/css/style.css">


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

    form {
        display: flex;
        flex-direction: column;
        width: 50%;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 5px;
        /*        margin-top: -338px;*/
        margin-left: -30%;
        ;
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
        <a href="hompage2.php" class="nav__logo">
            <i class='bx bxs-home-circle nav__logo-icon'></i> My Broker

        </a>

        <div class="nav__menu" id="nav-menu">
            <ul class="nav__list">
                <li class="nav__item">
                    <a href="dashboard.php" class="nav__link active-link">Dashboard</a>
                </li>
                <li class="nav__item">
                    <a href="About2.php" class="nav__link">User's</a>
                </li>
                <li class="nav__item">
                    <a href="About2.php" class="nav__link">Property's</a>
                </li>
                <li class="nav__item">
                    <a href="About2.php" class="nav__link">Report's</a>
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


    <span class="footer__copy">&#169; Bedimcode. All rigths reserved</span>
</footer>

<!--=============== SCROLL UP ===============-->
<a href="#" class="scrollup" id="scroll-up">
    <i class='bx bx-up-arrow-alt scrollup__icon'></i>
</a>

<!--=============== SWIPER JS ===============-->
<script src="assets/js/swiper-bundle.min.js"></script>

<!--=============== MAIN JS ===============-->
<script src="assets/js/main.js"></script>
</body>
</html>



