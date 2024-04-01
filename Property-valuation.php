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

        <title>Property Valuation</title>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <style>
            body {
                /*            font-family: Arial, sans-serif;*/
                background-color: #f0f0f0;
                font-size: 16px;
                line-height: 1.6;
                margin: 0;
                padding: 0;
            }

            h1 {
                text-align: center;
                color: #333;
                text-transform: uppercase;
                margin-bottom: 20px;
            }

            label {
                font-weight: bold;
                color: #555;
            }

            select, input {
                width: 98%;
                padding: 10px;
                margin-top: 10px;
                margin-bottom: 20px;
                border: 1px solid #ccc;
                border-radius: 12px;
                font-size: 14px;
            }

            button {
                text-decoration: none;
                position: relative;
                border: none;
                font-size: 14px;
                font-family: inherit;
                color: #fff;
                width: 11em;
                height: 3em;
                line-height: 2em;
                text-align: center;
                background: linear-gradient(90deg,#03a9f4,#f441a5,#ffeb3b,#03a9f4);
                background-size: 300%;
                border-radius: 30px;
                z-index: 1;
            }

            button:hover {
                animation: ani 8s linear infinite;
                border: none;
            }

            @keyframes ani {
                0% {
                    background-position: 0%;
                }
                100% {
                    background-position: 400%;
                }
            }

            button:before {
                content: '';
                position: absolute;
                top: -5px;
                left: -5px;
                right: -5px;
                bottom: -5px;
                z-index: -1;
                background: linear-gradient(90deg,#03a9f4,#f441a5,#ffeb3b,#03a9f4);
                background-size: 400%;
                border-radius: 35px;
                transition: 1s;
            }

            button:hover::before {
                filter: blur(20px);
            }

            button:active {
                background: linear-gradient(32deg,#03a9f4,#f441a5,#ffeb3b,#03a9f4);
            }

            #valuationForm {
                width: 100;
                max-width: 845px;
                /* margin: 0 auto; */
                padding: 70px;
                background-color: #fff;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                /* border-radius: 30px; */
                margin-left: 9%;
                margin-top: 10%;
            }

            #valuationResult {
                margin-top: 20px;
                font-weight: bold;
                text-align: center;
                font-size: 18px;
            }

            select {
                background-color: #f9f9f9;
                padding: 8px;
            }

            canvas {
                margin-top: 20px;
                max-width: 100%;
                border: 1px solid #ccc;
                border-radius: 4px;
            }

            .field-container {
                display: flex;
                justify-content: space-between;
            }

            .field {
                width: 48%;
            }

            .option {
                width: 102%;
                height: 41px;
            }

            .title {
                color: black;
                font-size: 40px;
            }

            .container {
                font-size: 20px;
                line-height: 1.6;
                margin: 0;
                padding: 0;
                background-image: url('prop2_2.avif');
                background-repeat: no-repeat;
                background-size: 50% 100%;
            }

            /*responsive*/
            @media screen and (max-width: 768px) {
                .container {
                    background-size: 100% 45%;
                }

                .title {
                    font-size: 30px;
                }

                select,
                input {
                    width: 100%;
                }

                #valuationForm {
                    padding: 20px;
                }
            }

            @media screen and (max-width: 480px) {
                .container {
                    background-size: 100% 55%;
                }

                .title {
                    font-size: 24px;
                }

                select,
                input {
                    width: 100%;
                    padding: 8px;
                }

                #valuationForm {
                    padding: 10px;
                }
            }

            /*end responsive*/
        </style>
    </head>
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
                            <a href="#" class="nav__link active-link">PROPERTY</a>
                            <div class="dropdown-content">
                                <a href="Property-list.php?id=<?php echo$id ?>" class="nav__link active-link">Property list</a>
                                <a href="Property-valuation.php?id=<?php echo$id ?>" class="nav__link active-link">Property Valuation</a>
                            </div>
                        </li>
                        <li class="nav__item">
                            <a href="Add-property.php?id=<?php echo$id ?>" class="nav__link " >ADD PROPERTY</a>
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
    <body>

        <br><br>

        <div class="container">

            <form id="valuationForm">
                <h1 class="title">Property Valuation</h1>

                <label for="propertyType">Property Type:</label>
                <select class="option" id="propertyType" name="propertyType" onchange="toggleFields()">
                    <option value="select">---Select Type---</option>
                    <option value="house">House</option>
                    <option value="land">Land</option>
                    <option value="villa">Villa</option>
                    <option value="flat">Flat</option>
                </select><br>

                <!-- Fields removed -->
                <div id="conditionalFields">
                    <div class="field-container">
                        <div class="field">
                            <label for="bedrooms">Number of Bedrooms:</label>
                            <input type="input" id="bedrooms" name="bedrooms" required>
                        </div>
                        <div class="field">
                            <label for="bathrooms">Number of Bathrooms:</label>
                            <input type="input" id="bathrooms" name="bathrooms" required>
                        </div>
                    </div>
                    <div class="field-container">
                        <div class="field">
                            <label for="balcony">Balcony (Yes/No):</label>
                            <select class="option" id="balcony" name="balcony">
                                <option value="select">---Select---</option>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                        <div class="field">
                            <label for="furnitureType">Furniture Type:</label>
                            <select class="option" id="furnitureType" name="furnitureType">
                                <option value="select">---Select---</option>
                                <option value="fullyFurnished">Fully Furnished</option>
                                <option value="semiFurnished">Semi Furnished</option>
                                <option value="unfurnished">Unfurnished</option>
                            </select>
                        </div>
                    </div>
                    <div class="field-container">
                        <div class="field">
                            <label for="floors">Number of Floors:</label>
                            <input type="input" id="floors" name="floors" required>
                        </div>
                        <div class="field">
                            <label for="coveredParking">Covered Parking (Yes/No):</label>
                            <select class="option" id="coveredParking" name="coveredParking">
                                <option value="select">---Select---</option>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="field-container">
                        <div class="field">
                            <label for="openParking">Open Parking (Yes/No):</label>
                            <select class="option" id="openParking" name="openParking">
                                <option value="select">---Select---</option>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                        <div class="field">
                            <label for="lift">Lift (Yes/No):</label>
                            <select class="option" id="lift" name="lift">
                                <option value="select">---Select---</option>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                    </div>

                </div>

                <!-- Fields always displayed -->
                <div class="field-container">
                    <div class="field">
                        <label for="size">Size (sqft):</label>
                        <input type="input" id="size" name="size" required>
                    </div>
                    <div class="field">
                        <label for="age">Age of the Property (years):</label>
                        <input type="input" id="age" name="age" required>
                    </div>
                </div>

                <label for="area">Area:</label>
                <select class="option" id="area" name="area">
                    <option value="select">---Select Area---</option>
                    <option value="motavaracha">motavaracha</option>
                    <option value="vesu">vesu</option>
                    <option value="pal">pal</option>
                    <option value="varacha">varacha</option>
                    <option value="adajan">Adajan</option>
                    <option value="kamrej">Kamrej</option>
                </select>

                <center>
                    <button type="button" onclick="calculateValuation()">Calculate Valuation</button>
                </center>
            </form>

            <div id="valuationResult"></div>
        </div>

        <script>
            function toggleFields() {
                const propertyType = document.getElementById("propertyType").value;
                const conditionalFields = document.getElementById("conditionalFields");

                if (propertyType === "land") {
                    conditionalFields.style.display = "none";
                } else {
                    conditionalFields.style.display = "block";
                }
            }

            function calculateValuation() {
                const propertyType = document.getElementById("propertyType").value;
                const size = parseFloat(document.getElementById("size").value);
                const age = parseInt(document.getElementById("age").value);
                const area = document.getElementById("area").value;

                let valuation = 0;

                if (propertyType === "house") {
                    valuation += 50000;
                } else if (propertyType === "villa") {
                    valuation += 75000;
                } else if (propertyType === "land") {

                    valuation += size * 1800;
                } else if (propertyType === "flat") {
                    valuation += 25000;
                }

                if (propertyType !== "land") {
                    const bedrooms = parseInt(document.getElementById("bedrooms").value);
                    const bathrooms = parseInt(document.getElementById("bathrooms").value);
                    const balcony = document.getElementById("balcony").value;
                    const furnitureType = document.getElementById("furnitureType").value;
                    const floors = parseInt(document.getElementById("floors").value);
                    const coveredParking = document.getElementById("coveredParking").value;
                    const openParking = document.getElementById("openParking").value;
                    const lift = document.getElementById("lift").value;


                    valuation += size * 3000; // Value per sqft

                    valuation += bedrooms * 114000;
                    valuation += bathrooms * 20000;

                    if (balcony === "yes") {
                        valuation += 15000;
                    }

                    if (furnitureType === "fullyFurnished") {
                        valuation += 200000;
                    } else if (furnitureType === "semiFurnished") {
                        valuation += 100000;
                    }

                    if (floors > 1) {
                        valuation *= (1 + (floors - 1) * 1); // last 1 is multi.. the price....
                    }



                    if (coveredParking === "yes") {
                        valuation += 30000;
                    }

                    if (openParking === "yes") {
                        valuation += 3000;
                    }
                    if (lift === "yes") {
                        valuation += 3000;
                    }
                }

                valuation -= age * 1000; // 1000 per year

                if (area === "motavaracha") {
                    valuation *= 1.2; // 20% adjustment for MOTAVARACHA areas
                } else if (area === "vesu") {
                    valuation *= 1.1; // 10% adjustment for vesu areas
                } else if (area === "pal") {
                    valuation *= 0.9; // -10% adjustment for pal areas
                } else if (area === "varacha") {
                    valuation *= 1.15; // 15% adjustment for varacha area
                } else if (area === "adajan") {
                    valuation *= 1.25; // 25% adjustment for adajan
                } else if (area === "kamrej") {
                    valuation *= 0.95; // -5% adjustment for kamrej
                }

                document.getElementById("valuationResult").innerHTML = `Estimated Valuation: ₹${valuation.toFixed(2)}`;
                const popupWindow = window.open('', 'Valuation Chart', 'width=800,height=600');

                const canvas = document.createElement('canvas');
                canvas.width = 800;
                canvas.height = 400;

                popupWindow.document.body.appendChild(canvas);

                const ctx = canvas.getContext('2d');
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Estimated Valuation'],
                        datasets: [{
                                label: 'Price',
                                data: [valuation],
                                backgroundColor: 'rgba(0, 123, 255, 0.6)'
                            }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true,
                                title: {
                                    display: true,
                                    text: 'Price (in INR)'
                                }
                            }
                        }
                    }
                });

                popupWindow.onbeforeunload = () => {
                    popupWindow.close();
                };
            }
        </script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="lib/wow/wow.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>

        
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
