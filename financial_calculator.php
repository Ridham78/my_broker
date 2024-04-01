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
                            <a href="payment.php?id=<?php echo$id ?>" class="nav__link ">payment</a>
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
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f5f5f5;
                margin: 0;
                padding: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }
            .container {
                width: 400px;
                background-color: #fff;
                padding: 30px;
                border-radius: 10px;
                box-shadow: 0 0 20px rgba(0,0,0,0.1);
            }
            h2 {
                text-align: center;
                margin-bottom: 20px;
                color: #333;
            }
            form {
                display: flex;
                flex-direction: column;
            }
            label {
                font-weight: bold;
                margin-bottom: 5px;
            }
            input[type="number"], input[type="submit"] {
                width: 100%;
                padding: 10px;
                margin: 5px 0 15px;
                border: none;
                border-radius: 5px;
                background-color: #f2f2f2;
                transition: background-color 0.3s ease;
            }
            input[type="number"]:focus, input[type="submit"]:hover {
                background-color: #e0e0e0;
                outline: none;
            }
            input[type="submit"] {
                background-color: #4CAF50;
                color: white;
                cursor: pointer;
            }
            .result {
                background-color: #f9f9f9;
                border: 1px solid #ccc;
                border-radius: 5px;
                padding: 20px;
                margin-top: 20px;
                animation: fadeIn 1s ease;
            }
            @keyframes fadeIn {
                from {
                    opacity: 0;
                }
                to {
                    opacity: 1;
                }
            }
            .result h3 {
                color: #333;
                margin-bottom: 15px;
                text-align: center;
            }
            .result p {
                color: #666;
                margin-bottom: 10px;
            }

        </style>
    <body>
        <div class="container">
            <h2>Financial Calculator</h2>
            <form method="post" class="calculator-form">
                <div class="form-group">
                    <label for="property_price">Property Price:</label>
                    <input type="number" name="property_price" id="property_price" required>
                </div>
                <div class="form-group">
                    <label for="duration_years">Duration (Years):</label>
                    <input type="number" name="duration_years" id="duration_years" required>
                </div>
                <div class="form-group">
                    <label for="interest_rate">Interest Rate (%):</label>
                    <input type="number" name="interest_rate" id="interest_rate" required>
                </div>
                <div class="form-group">
                    <label for="property_tax_rate">Property Tax Rate (%):</label>
                    <input type="number" name="property_tax_rate" id="property_tax_rate" required>
                </div>
                <div class="form-group">
                    <label for="down_payment">Down Payment:</label>
                    <input type="number" name="down_payment" id="down_payment" required>
                </div>
                <input type="submit" value="Calculate" class="btn-calculate">
            </form>
            <!-- Results will be displayed here -->
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") :
                // PHP code for calculations
                $property_price = $_POST['property_price'];
                $duration_years = $_POST['duration_years'];
                $interest_rate = $_POST['interest_rate'];
                $property_tax_rate = $_POST['property_tax_rate'];
                $down_payment = $_POST['down_payment'];

                $mortgage_amount = $property_price - $down_payment;
                $monthly_interest_rate = ($interest_rate / 100) / 12;
                $total_payments = $duration_years * 12;
                $monthly_payment = ($mortgage_amount * $monthly_interest_rate) / (1 - pow(1 + $monthly_interest_rate, -$total_payments));
                $total_amount = $monthly_payment * $total_payments;
                $total_interest = $total_amount - $mortgage_amount;
                $annual_property_tax = $property_price * ($property_tax_rate / 100);
                $monthly_property_tax = $annual_property_tax / 12;
                ?>
                <div class="result">
                    <h3>Results</h3>
                    <p>Mortgage Amount: ₹<?php echo number_format($mortgage_amount, 2); ?></p>
                    <p>Total amount: ₹<?php echo number_format($total_amount, 2); ?></p>
                    <p>Total years: <?php echo $duration_years; ?></p>
                    <p>Interest rate: <?php echo $interest_rate; ?>%</p>
                    <p>Total interest: ₹<?php echo number_format($total_interest, 2); ?></p>
                    <p>Monthly payment: ₹<?php echo number_format($monthly_payment, 2); ?></p>
                    <p>Monthly property tax: ₹<?php echo number_format($monthly_property_tax, 2); ?></p>
                </div>
            <?php endif; ?>
        </div>

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