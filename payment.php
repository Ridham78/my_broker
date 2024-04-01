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
        <title>Razorpay Integration</title>
        <style>
            /* Centering styles */
            html, body {
                height: 100%;
                margin: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                background-color: #f0f0f0; /* Change this to your desired background color */
            }

            /* Card styles */
            .card {
                overflow: hidden;
                position: relative;
                display: flex;
                flex-direction: column;
                gap: 0.75rem;
                padding: 1rem;
                width: 34rem;
                height: 275px;
                background-color: rgb(122, 48, 143);
                background-image: radial-gradient(circle at 0% 0%, rgb(37, 7, 44) 15%, rgba(0, 0, 0, 0) 75%), radial-gradient(circle at 100% 100%, rgb(25, 2, 31, 0.9) 15%, rgba(0, 0, 0, 0) 150%), linear-gradient(135deg, rgba(24, 8, 28, 0) 0%, rgb(122, 48, 143) 50%, rgba(24, 8, 28, 0) 100%);
                border-radius: 0.5rem;
            }

            .card::before {
                content: "";
                position: absolute;
                top: 1rem;
                right: 1rem;
                width: 2rem;
                height: 2rem;
                background-color: rgb(122, 48, 143);
                background-image: linear-gradient(0deg, rgba(118, 42, 180, 1) 0%, rgb(199, 95, 228) 75%);
                border-radius: 9999px;
                box-shadow: 0 1px 5px 3px rgb(199, 95, 228), 0 0 30px 5px rgb(199, 95, 228);
            }

            .card .title {
                font-size: 1rem;
                color: white;
                font-weight: 600;
            }

            .card .pricing {
                font-size: 1.5rem;
                color: white;
                font-weight: 600;
            }

            .card .pricing .pricing-time,
            .card .sub-title {
                font-size: 0.75rem;
                color: rgb(184, 132, 199);
                font-weight: 500;
            }

            .card .list {
                display: flex;
                flex-direction: column;
                gap: 0.25rem;
                font-size: 0.75rem;
                color: white;
                font-weight: 500;
                list-style: none;
            }

            .card .list .list-item .check {
                margin-right: 0.25rem;
                font-size: 1rem;
                color: rgb(199, 95, 228);
                font-weight: 900;
            }

            .card .button {
                overflow: hidden;
                cursor: pointer;
                position: relative;
                margin-top: 0.5rem;
                padding: 0.5rem 0.75rem;
                width: 100%;
                height: fit-content;
                background-color: rgb(122, 48, 143);
                font-size: 0.75rem;
                color: white;
                border: none;
                border-radius: 0.5rem;
                box-shadow: 0px 0px 2px 1px rgb(122, 48, 143);
                transition: all 0.3s cubic-bezier(1, 0, 0, 1);
            }

            .card .button .text-button {
                position: relative;
                z-index: 10;
            }

            .card .button::before,
            .card .button::after {
                content: "";
                position: absolute;
                top: 0;
                width: 100%;
                height: 100%;
                transition: all 0.3s ease-in-out;
            }

            .card .button::before {
                left: 0;
                background-image: radial-gradient(circle at 0% 45%, rgba(16, 5, 36, 1) 19%, rgba(16, 5, 36, 0.26) 46%, rgba(16, 5, 36, 0) 100%);
            }

            .card .button::after {
                right: 0;
                background-image: radial-gradient(circle at 100% 45%, rgba(16, 5, 36, 1) 19%, rgba(16, 5, 36, 0.26) 46%, rgba(16, 5, 36, 0) 100%);
            }

            .card .button:hover {
                box-shadow: 0px 0px 20px 0 rgb(122, 48, 143);
            }

            .card .button:hover::before,
            .card .button:hover::after {
                width: 0;
                opacity: 0;
            }
        </style>
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
    <div class="card">
        <span class="title">My Broker plus<br>
            <br><p class="pricing" id="amount" name="amount">299 <span class="pricing-time">/ month</span></p>
            <span class="sub-title">Everything on Basic plus:
                <ul class="list">
                    <li class="list-item"><span class="check">✓</span> Property Location</li>
                    <li class="list-item"><span class="check">✓</span> Seller's Contact No.</li>
                    <li class="list-item"><span class="check">✓</span> Chat With Owner</li>
                    <li class="list-item"><span class="check">✓</span> Bidding</li>
                </ul><br>
                <button class="button" id="pay-button">
                    <span class="text-button">Get pro now</span>
                </button>
            </span>
        </span>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        $(document).ready(function () {
            $('#pay-button').click(function () {
                var amountText = $('#amount').text().trim();
                var amount = parseFloat(amountText.match(/\d+/)[0]); // Extract numerical value only

                var options = {
                    key: "rzp_test_4ZXlNDC9fKRGjQ",
                    amount: amount * 100, // Amount in paise (multiply by 100)
                    currency: "INR",
                    name: "My Broker",
                    description: "Payment Description",
                    handler: function (response) {
                        var paymentId = response.razorpay_payment_id;
                        var userId = getParameterByName('id'); // Get user ID from URL

                        // Redirect to insertpaymentdata.php with user ID
                        window.location.href = 'insertpaymentdata.php?id=' + userId + '&razorpay_payment_id=' + paymentId;
                    },
                    prefill: {
                        name: "nihar",
                        email: "devaninihar@gmail.com"
                    }
                };
                var rzp = new Razorpay(options);
                rzp.open();
            });
        });

        // Function to get parameter from URL
        function getParameterByName(name, url = window.location.href) {
            name = name.replace(/[\[\]]/g, '\\$&');
            var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
                    results = regex.exec(url);
            if (!results)
                return null;
            if (!results[2])
                return '';
            return decodeURIComponent(results[2].replace(/\+/g, ' '));
        }
    </script>


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