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
</head>
<?php
//error_reporting(0);
require('./connection.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ABOUT_PAGE</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="all" href="css/property.css">
    <style>
        .column {
            float: left;
            width: 50%;
            padding: 67px;
            margin-top: 7px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        select,
        input[type="number"],
        input[type="text"],
        input[type="file"],
        button {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        fieldset {
            margin-bottom: 10px;
            padding: 10px;
        }

        legend {
            font-weight: bold;
        }

        input[type="radio"] {
            margin-right: 5px;
        }

        button {
            background-color: #4caf50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            max-width: 20%;
        }

        button:hover {
            background-color: #45a049;
        }

        form {
            overflow: hidden;
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

                        <a href="homepage(user).php?id=<?php echo $id ?>" class="nav__link ">HOME</a>
                    </li>
                    <li class="nav__item dropdown">
                        <a href="#" class="nav__link">PROPERTY</a>
                        <div class="dropdown-content">
                            <a href="Property-list.php?id=<?php echo $id ?>" class="nav__link active-link">Property
                                list</a>
                            <a href="Property-valuation.php?id=<?php echo $id ?>" class="nav__link active-link">Property
                                Valuation</a>
                        </div>
                    </li>
                    <li class="nav__item">
                        <a href="Add-property.php?id=<?php echo $id ?>" class="nav__link active-link">ADD PROPERTY</a>
                    </li>
                    <li class="nav__item">
                        <a href="Profile.php?id=<?php echo $id ?>" class="nav__link ">PROFILE</a>
                    </li>
                    <li class="nav__item">
                        <a href="logout.php?id=<?php echo $id ?>" class="nav__link ">LOGOUT</a>
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

    <BR><BR>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Property Form</title>
    </head>

    <body>


    </body>

    </html>

    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include './connection.php';

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if (isset($_POST['submit']) && isset($_FILES["property_image"]) && isset($_FILES["electricity_image"])) {
        $uid = isset($_GET['id']) ? mysqli_real_escape_string($conn, $_GET['id']) : '';
        $type = mysqli_real_escape_string($conn, $_POST['type']);
        $bhk = mysqli_real_escape_string($conn, $_POST['bhk']);
        $bathroom = mysqli_real_escape_string($conn, $_POST['bathroom']);
        $balcony = mysqli_real_escape_string($conn, $_POST['balcony']);
        $furniture = mysqli_real_escape_string($conn, $_POST['furniture']);
        $coverp = mysqli_real_escape_string($conn, $_POST['coverp']);
        $openp = mysqli_real_escape_string($conn, $_POST['openp']);
        $cost = mysqli_real_escape_string($conn, $_POST['cost']);
        $maintenancecharges = mysqli_real_escape_string($conn, $_POST['maintenancecharges']);
        $built = mysqli_real_escape_string($conn, $_POST['built']);
        $listingtype = mysqli_real_escape_string($conn, $_POST['listing-type']);
        $propertyusage = mysqli_real_escape_string($conn, $_POST['propertyusage']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);

        $productimage1 = "property_image/" . $_FILES["property_image"]["name"];
        $productimage2 = "property_image/" . $_FILES["electricity_image"]["name"];

        // Ensure that the 'property_image' directory exists
        $dir1 = "property_image";
        $dir2 = "admin/property_image";
        if (!is_dir($dir1)) {
            mkdir($dir1, 0777, true);
        }
        if (!is_dir($dir2)) {
            mkdir($dir2, 0777, true);
        }

        if (is_uploaded_file($_FILES["property_image"]["tmp_name"])) {
            move_uploaded_file($_FILES["property_image"]["tmp_name"], $productimage1);
        }

        if (is_uploaded_file($_FILES["electricity_image"]["tmp_name"])) {
            move_uploaded_file($_FILES["electricity_image"]["tmp_name"], $productimage2);
        }
    
        $status = "pending"; 
        $sql = "INSERT INTO property (id, type, bhk, bathroom, balcony, furniture, coverp, openp, cost, maintenancecharges, built, listingtype, propertyusage, address, imagepath, electricity_image, status) 
            VALUES ('$uid', '$type', '$bhk', '$bathroom', '$balcony', '$furniture', '$coverp', '$openp', '$cost', '$maintenancecharges', '$built', '$listingtype', '$propertyusage', '$address', '$productimage1', '$productimage2', '$status')";

        $result = mysqli_query($conn, $sql);

        if (!$result) {
            echo "Error executing query: " . mysqli_error($conn);
        } else {
            // Fetch the latest record's ID
            $latest_id = mysqli_insert_id($conn);

            // Fetch data for the specific user
            $sql_fetch = "SELECT * FROM property WHERE id = '$latest_id'";
            $query_fetch = mysqli_query($conn, $sql_fetch);

            if ($query_fetch) {
                while ($row_fetch = mysqli_fetch_assoc($query_fetch)) {
                    // Add your logic to display or use the fetched data
                }
            } else {
                echo "Error fetching user data: " . mysqli_error($conn);
            }

            echo '<script>alert("We have received details of your property. It will be made live after quality checks within the next 48 hours.");</script>';
        }
    } else {

    }
    ?>

    <form method="POST" enctype="multipart/form-data">
        <div class="column">

            <label for="property-type">Property Type:</label>
            <select id="property-type" name="type" required>
                <option value="">-------------SELECT property TYPE-------------</option>
                <option value="Apart">Apartment</option>
                <option value="House">House</option>
                <option value="Vill">Villa</option>
                <option value="Plot">Plot</option>
                <option value="Land">Land</option>
            </select><br><br>

            <label for="bhk">BHK:</label>
            <select id="bhk" name="bhk" required>
                <option value="">-------------SELECT property BHK-------------</option>
                <option value="1 bhk">1 BHK</option>
                <option value="2 bhk">2 BHK</option>
                <option value="3 bhk">3 BHK</option>
                <option value="3+ bhk">3+ BHK</option>
            </select>
            <br><br>

            <label for="bathroom">Bathroom:</label>
            <select id="bathroom" name="bathroom" required>
                <option value="">-------------SELECT property Bathroom-------------</option>
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="3+">3+</option>
            </select>
            <br><br>

            <label for="balcony">Balcony:</label>
            <select id="balcony" name="balcony" required>
                <option value="">-------------SELECT property Balcony-------------</option>
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="3+">3+</option>
            </select>
            <br><br>

            <label for="furnish-type">Furnish Type:</label>
            <select id="furnish-type" name="furniture" required>
                <option value="">-------------SELECT property Furnish Type -------------</option>
                <option value="Fully">Fully furnished</option>
                <option value="Semi">Semi furnished</option>
                <option value="Unfurnished">Unfurnished</option>
            </select>
            <br><br>

            <label for="covered-parking">Covered Parking:</label>
            <select id="covered-parking" name="coverp" required>
                <option value="">-------------SELECT property Covered Parking-------------</option>
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="3+">3+</option>
            </select>
            <br><br>

            <label for="open-parking">Open Parking:</label>
            <select id="open-parking" name="openp" required>
                <option value="">-------------SELECT property Open Parking -------------</option>
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="3+">3+</option>
            </select>
            <br><br>
        </div>

        <div class="column">
            <label for="cost">Cost (INR):</label>
            <input type="number" id="cost" name="cost" placeholder="Enter the cost in INR" required>
            <br><br>

            <label for="maintenance-charges">Maintenance Charges (per month, INR):</label>
            <input type="number" id="maintenance-charges" name="maintenancecharges"
                placeholder="Enter the maintenance charges per month in INR" required>
            <br><br>

            <label for="built-up-area">Built-up Area (sq. ft.):</label>
            <input type="number" id="built-up-area" name="built" placeholder="Enter the built-up area in sq. ft."
                required>
            <br><br>

            <fieldset>
                <legend>Listing Type:</legend>
                <label for="rent">
                    <input type="radio" id="rent" name="listing-type" value="Rent" required>
                    Rent
                </label>
                <label for="sell">
                    <input type="radio" id="sell" name="listing-type" value="Sell" required>
                    Sell
                </label>
            </fieldset>
            <br><br>

            <fieldset>
                <legend>Property Usage:</legend>
                <label for="residential">
                    <input type="radio" id="residential" name="propertyusage" value="Residential" required>
                    Residential
                </label>
                <label for="commercial">
                    <input type="radio" id="commercial" name="propertyusage" value="Commercial" required>
                    Commercial
                </label>
            </fieldset>
            <br><br>

            <label for="address">Enter Address:</label>
            <input type="text" name="address" id="address" required>
            <br><br>

            <label for="add_img">Add Images:</label>
            <input type="file" name="property_image" required><br><br>

            <label for="add_img">Add electricity Images:</label>
            <input type="file" name="electricity_image" required><br><br>
            <small>Your electricity image is safe with us.</small><br><br>
        </div>

        <div style="clear:both;"></div>

        <center>
            <button type="submit" name="submit">Submit</button>
        </center>
    </form>

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