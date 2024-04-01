<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>HOME_PAGE</title>
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
    <a href="about.html"></a>
    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
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

                        <a href="homepage.php?id=<?php echo$id ?>" class="nav-item nav-link">Home</a>

                        <a href="About.php?id=<?php echo$id ?>" class="nav-item nav-link">About</a>

                        <div class="nav-item dropdown">
                            <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Property</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="property-list.php?id=<?php echo$id ?>" class="dropdown-item">Property List</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="navbar-nav ms-auto">
                    <a href="Contact.php?id=<?php echo$id ?>" class="nav-item nav-link">Contact</a>
                    <a href="PropertyAdd.php?id=<?php echo$id ?>" class="nav-item nav-link">Add Property</a>


                    <a href="profile_page.php?id=<?php echo$id ?>" class="nav-item nav-link">Profile</a>

                    <a href="homepage2.php" class="nav-item nav-link">Logout</a>
                </div>
            </nav>
        </div>   
        <?php
        require('./connection.php');

// Get property IDs from the URL parameters
        $id = $_GET['id'];
        $p_id = $_GET['p_id'];
        $p_id2 = $_GET['p_id2'];

// Query the database for the selected properties
        $query1 = "SELECT * FROM property WHERE p_id = $p_id";
        $query2 = "SELECT * FROM property WHERE p_id = $p_id2";

        $result1 = mysqli_query($conn, $query1);
        $result2 = mysqli_query($conn, $query2);

// Check if both properties exist
        if (mysqli_num_rows($result1) > 0 && mysqli_num_rows($result2) > 0) {
            $row1 = mysqli_fetch_assoc($result1);
            $row2 = mysqli_fetch_assoc($result2);

            // HTML code to display property comparison with Bootstrap styling
            echo '<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Comparison</title>
    
    <!-- Include Bootstrap CSS -->
    
    <style>
        /* Your custom CSS styles here */
        body {
            background-color: #f8f9fa; /* Light gray background color */
            padding-top: 20px;
        }
        .container {
            background-color: #ffffff; /* White container background */
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
                margin: 6%;
        }
        .property-image img {
            max-height: 250px;
            max-width: 250px;
            display: block;
            margin: 0 auto; /* Center align images */
        }
        .table th {
            background-color: #00B98E !important; /* Blue header background color */
            color: #fff; /* White text color */
        }
        .table th, .table td {
            vertical-align: middle; /* Center align table content vertically */
        }
        

        .btn-back {
            margin-top: 20px;
            text-align: center;
        }
        .button1(
                    background-color: #ffffff; /* White container background */

        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Property Comparison</h1>
        <table class="table table-bordered">
            <tr>
                <th>Information</th>
                <th>Property 1</th>
                <th>Property 2</th>
            </tr>
            <tr>
                <td>Image</td>
                <td><img src="' . $row1['imagepath'] . '" class="property-image img-fluid" style="max-height: 250px; max-width: 250px;"></td>
                <td><img src="' . $row2['imagepath'] . '" class="property-image img-fluid" style="max-height: 250px; max-width: 250px;"></td>
            </tr>
            </tr>
            <tr>
                <td>Type</td>
                <td>' . $row1['type'] . '</td>
                <td>' . $row2['type'] . '</td>
            </tr>
            <tr>
                <td>Listing Type</td>
                <td>' . $row1['listingtype'] . '</td>
                <td>' . $row2['listingtype'] . '</td>
            </tr>
            <tr>
                <td>Built</td>
                <td>' . $row1['built'] . '</td>
                <td>' . $row2['built'] . '</td>
            </tr>
            <tr>
                <td>BHK</td>
                <td>' . $row1['bhk'] . '</td>
                <td>' . $row2['bhk'] . '</td>
            </tr>
            <tr>
                <td>Bathroom</td>
                <td>' . $row1['bathroom'] . '</td>
                <td>' . $row2['bathroom'] . '</td>
            </tr>
            <tr>
                <td>Balcony</td>
                <td>' . $row1['balcony'] . '</td>
                <td>' . $row2['balcony'] . '</td>
            </tr>
            <tr>
                <td>Furniture</td>
                <td>' . $row1['furniture'] . '</td>
                <td>' . $row2['furniture'] . '</td>
            </tr>
            <tr>
                <td>Covered Parking</td>
                <td>' . $row1['coverp'] . '</td>
                <td>' . $row2['coverp'] . '</td>
            </tr>
            <tr>
                <td>Open Parking</td>
                <td>' . $row1['openp'] . '</td>
                <td>' . $row2['openp'] . '</td>
            </tr>
            <tr>
                <td>Cost</td>
                <td>' . $row1['cost'] . '</td>
                <td>' . $row2['cost'] . '</td>
            </tr>
            <tr>
                <td>Maintenance Charges</td>
                <td>' . $row1['maintenancecharges'] . '</td>
                <td>' . $row2['maintenancecharges'] . '</td>
            </tr>
            <tr>
                <td>Property Usage</td>
                <td>' . $row1['propertyusage'] . '</td>
                <td>' . $row2['propertyusage'] . '</td>
            </tr>
        </table>
        
    </div>
</body>
</html>';
        }

// Add a back button as a button element
        echo '<button onclick="location.href=\'info.php?id=' . htmlspecialchars($id) . '&p_id=' . htmlspecialchars($p_id) . '\'" class="button1">Back to Property Page</button>';

// Close the database connection
        mysqli_close($conn);
        ?>