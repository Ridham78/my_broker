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
        <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">

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

        <style>
            /* Your CSS styles here */
            /* Add more styles as needed */
            .back-to-page-button {
                color: black;
                background-color: #00B98E !important;
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
        <!-- Navbar Start -->
        <div class="container-fluid nav-bar bg-transparent">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
                <a href="index.html" class="navbar-brand d-flex align-items-center text-center">
                    <div class="icon p-2 me-2">
                        <img class="img-fluid" src="img/icon-deal.png" alt="Icon" style="width: 30px; height: 30px;">
                    </div>
                    <h1 class="m-0 text-primary">MyBroker</h1>
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <?php $id = $_GET['id'] ?>
                        <a href="homepage.php?id=<?php echo $id ?>" class="nav-item nav-link">Home</a>
                        <a href="About.php?id=<?php echo $id ?>" class="nav-item nav-link">About</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Property</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="property-list.php?id=<?php echo $id ?>" class="dropdown-item">Property List</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="navbar-nav ms-auto">
                    <a href="Contact.php?id=<?php echo $id ?>" class="nav-item nav-link">Contact</a>
                    <a href="PropertyAdd.php?id=<?php echo $id ?>" class="nav-item nav-link">Add Property</a>
                    <a href="profile_page.php?id=<?php echo $id ?>" class="nav-item nav-link">Profile</a>
                    <a href="homepage2.php" class="nav-item nav-link">Logout</a>
                </div>
            </nav>
        </div>

        <?php
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

                // HTML code to display the property information
                echo '<div class="property-container">';
                echo '<div class="property-image">
        <img class="img-fluid" src="' . $imag . '" alt="Property Image">
        </div>';
                echo '<div class="property-info">';
                echo '<h1>Type: ' . $title . '<br></h1>'; // Added <br> tag after the title
                echo '<p>Price: ' . $price . '</p>';
                echo '<p>Size: ' . $size . ' Sqft</p>';
                echo '<p>Beds: ' . $beds . ' | Baths: ' . $baths . ' | BHK: ' . $bhk . '</p>';
                echo '<p>Furniture: ' . $furniture . ' | Open Parking: ' . $openp . ' | Covered Parking: ' . $coverp . '</p>';
                echo '<p>Property Usage: ' . $propertyusage . ' | Listing Type: ' . $listingtype . '</p>';
                echo '<a href="property-list.php?id=' . htmlspecialchars($id) . '" class="back-to-page-button">Back to Page</a>';
                echo '.<br>';
                echo '<a href="chat.php?p_id=' . htmlspecialchars($p_id) . '" class="chat-with-owner-button">Chat with Owner</a>';
                echo '<br>';

                // Create a form for property comparison
                echo '<form action="compper_property.php" method="get">';
                echo '<input type="hidden" name="id" value="' . htmlspecialchars($id) . '">'; // Pass 'id' parameter
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
            } else {
                echo "Property not found.";
            }
        } else {
            echo "Invalid property ID.";
        }
        ?>

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="lib/wow/wow.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="js/main.js"></script>
    </body>

</html>
