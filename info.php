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

    <style>
        body{
            margin: 167px;
            background-color: var(--body-color);
            color: var(--text-color);
            transition: .4s;
        }

        /* Your CSS styles here */
        /* Add more styles as needed */
        .back-to-page-button {
            color: black;
            background-color: #ffb566 !important;
            padding: 5px 10px; /* Adjust padding to control button size */
            font-size: 14px; /* Adjust font size */
            text-decoration: none;
            border-radius: 5px;
        }

        .property-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            margin: 20px;
        }

        .property-image {
            flex: 1;
            padding: 20px;
        }

        .property-image img {
            max-width: 500px;
            height: 250px;
            border: 1px solid #ddd;
            padding: 5px;
        }

        .property-info {
            flex: 2;
            padding: 20px;
        }

        .property-info h1 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .property-info p {
            font-size: 16px;
            margin-bottom: 5px;
        }

        .property-info a {
            display: block;
            margin-top: 20px;
            color: black;
            text-decoration: none;
        }

        .property-info a:hover {
            text-decoration: underline;
        }
        img {
            vertical-align: inherit;
            border-style: dashed;
            width: 250px;
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
    require('./connection.php');

// Check if the 'p_id' parameter is set in the URL
    if (isset($_GET['p_id'])) {
        $p_id = $_GET['p_id'];
        $id = $_GET['id'];

        // Include your database connection code here
        require('./connection.php');

        // Query to retrieve property information
        $query = "SELECT * FROM property WHERE p_id = $p_id";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $imag = $row['imagepath'];
            $price = $row['cost'];
            $title = $row['type'];
            $size = $row["built"];
            $beds = $row["bhk"];
            $baths = $row["bathroom"];
            $typee = $row["listingtype"];
            $type = $row['type'];
            $bhk = $row['bhk'];
            $bathroom = $row['bathroom'];
            $balcony = $row['balcony'];
            $furniture = $row['furniture'];
            $coverp = $row['coverp'];
            $openp = $row['openp'];
            $cost = $row['cost'];
            $maintenancecharges = $row['maintenancecharges'];
            $built = $row['built'];
            $listingtype = $row['listingtype'];
            $propertyusage = $row['propertyusage'];
            $address = $row['address'];

            // HTML code to display the property information
            echo '<div class="property-container">';
            echo '<div class="property-image">
                <img class="img-fluid" src="' . $imag . '" alt="Property Image">
            </div>';
            echo '<div class="property-info">';
            echo '<h1>Type: ' . $title . '<br></h1>'; // Added <br> tag after the title
//                echo '<h1>address: ' . $address . '<br></h1>'; // Added <br> tag after the title
            echo "<h1> Address: <a href='https://www.google.com/maps/search/?api=1&query=$address' target='_blank'>$address</a></h1>";

            echo '<p>Price: ' . $price . '</p>';
            echo '<p>Size: ' . $size . ' Sqft</p>';
            echo '<p>Beds: ' . $beds . ' | Baths: ' . $baths . ' | BHK: ' . $bhk . '</p>';
            echo '<p>Furniture: ' . $furniture . ' | Open Parking: ' . $openp . ' | Covered Parking: ' . $coverp . '</p>';
            echo '<p>Property Usage: ' . $propertyusage . ' | Listing Type: ' . $listingtype . '</p>';
            echo '<a href="property-list.php?id=' . htmlspecialchars($id) . '" class="back-to-page-button">Back to Page</a>';
            echo '.<br>';

            // Property Comparison Form
            echo '<form action="compper_property.php?id=' . htmlspecialchars($id) . '" method="get">';
            echo '<input type="hidden" name="p_id" value="' . htmlspecialchars($p_id) . '">';

            // Property selector
            echo '<label for="p_id2">Select Property to Compare:</label>';
            echo '<select name="p_id2" id="p_id2">';

            // Query to populate the options for Property 2
            $query = "SELECT p_id, type FROM property WHERE status = 1"; // Adjust the query as needed
            $result = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_assoc($result)) {
                $selected = ($row['p_id'] == $p_id) ? 'selected' : '';
                echo '<option value="' . $row['p_id'] . '" ' . $selected . '>' . $row['type'] . '</option>';
            }

            // Close the database connection
            mysqli_close($conn);

            // Submit Button
            echo '</select>';
            echo '<br><br>';
            echo '<input type="submit" value="Compare Properties">';
            echo '</form>'; // Close the Property Comparison Form

            echo '</div>'; // Close property-info div
            echo '</div>'; // Close property-container div
        } else {
            echo "Property not found.";
        }
    } else {
        echo "Invalid property ID.";
    }
    ?>




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
