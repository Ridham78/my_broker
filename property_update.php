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
    <link rel="stylesheet" type="text/css" media="all" href="css/property.css">

</head>





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
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Property</a>
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
// Retrieve the user ID from the URL parameter
include 'connection.php';
$userId = $_GET['id'];

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve the updated data from the form
    $type = $_POST['type'];
    $bhk = $_POST['bhk'];
    $bathroom = $_POST['bathroom'];
    $balcony = $_POST['balcony'];
    $furniture = $_POST['furniture'];
    $coverp = $_POST['coverp'];
    $openp = $_POST['openp'];
    $cost = $_POST['cost'];
    $maintenancecharges = $_POST['maintenancecharges'];
    $built = $_POST['built'];
    $listingtype = $_POST['listing-type'];
    $propertyusage = $_POST['propertyusage'];

    // Update the user's data in the database
    $query = "UPDATE property SET type='$type', bhk='$bhk', bathroom='$bathroom', balcony='$balcony', furniture='$furniture', coverp='$coverp', openp='$openp', cost='$cost', maintenancecharges='$maintenancecharges', built='$built', listingtype='$listingtype', propertyusage='$propertyusage' WHERE id='$userId'";

    $result = mysqli_query($conn, $query);

    // Display a message indicating the update has been successful
    if ($result) {
        echo '<script>alert("Data updated successfully.");</script>';
        header("Location: my_property.php?id=" . $userId);
        exit;
    } else {
        echo "Failed: " . mysqli_error($conn);
    }
}

// Retrieve the user's current data from the database
$query = "SELECT * FROM property WHERE id = $userId";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
?>
<BR><BR>

<form method="post">
    <input type="hidden" name="id" value="<?php echo $userId; ?>">
    <label for="property-type">Property Type:</label>
    <select id="property-type"  name="type">
        <option value="Apart" <?php if ($row['type'] == 'Apart') echo 'selected'; ?>>Apartment</option>
        <option value="House" <?php if ($row['type'] == 'House') echo 'selected'; ?>>House</option>
        <option value="Vill" <?php if ($row['type'] == 'Vill') echo 'selected'; ?>>Villa</option>
        <option value="Plot" <?php if ($row['type'] == 'Plot') echo 'selected'; ?>>Plot</option>
        <option value="Land" <?php if ($row['type'] == 'Land') echo 'selected'; ?>>Land</option>
    </select><br><br>

    <label for="bhk">BHK:</label>
    <select id="bhk" name="bhk">
        <option value="1 bhk" <?php if ($row['bhk'] == '1 bhk') echo 'selected'; ?>>1 BHK</option>
        <option value="2 bhk" <?php if ($row['bhk'] == '2 bhk') echo 'selected'; ?>>2 BHK</option>
        <option value="3 bhk" <?php if ($row['bhk'] == '3 bhk') echo 'selected'; ?>>3 BHK</option>
        <option value="3+ bhk" <?php if ($row['bhk'] == '3+ bhk') echo 'selected'; ?>>3+ BHK</option>
    </select>
    <br><br>
    <label for="bathroom">Bathroom:</label>
    <select id="bathroom" name="bathroom">
        <option value="0" <?php if ($row['bathroom'] == '0') echo 'selected'; ?>>0</option>
        <option value="1" <?php if ($row['bathroom'] == '1') echo 'selected'; ?>>1</option>
        <option value="2" <?php if ($row['bathroom'] == '2') echo 'selected'; ?>>2</option>
        <option value="3" <?php if ($row['bathroom'] == '3') echo 'selected'; ?>>3</option>
        <option value="3+" <?php if ($row['bathroom'] == '3+') echo 'selected'; ?>>3+</option>
    </select>
    <br><br>
    <label for="balcony">Balcony:</label>
    <select id="balcony" name="balcony">
        <option value="0" <?php if ($row['balcony'] == '0') echo 'selected'; ?>>0</option>
        <option value="1" <?php if ($row['balcony'] == '1') echo 'selected'; ?>>1</option>
        <option value="2" <?php if ($row['balcony'] == '2') echo 'selected'; ?>>2</option>
        <option value="3" <?php if ($row['balcony'] == '3') echo 'selected'; ?>>3</option>
        <option value="3+" <?php if ($row['balcony'] == '3+') echo 'selected'; ?>>3+</option>
    </select>
    <br><br>
    <label for="furnish-type">Furnish Type:</label>
    <select id="furnish-type" name="furniture">
        <option value="Fully" <?php if ($row['furniture'] == 'Fully') echo 'selected'; ?>>Fully furnished</option>
        <option value="Semi" <?php if ($row['furniture'] == 'Semi') echo 'selected'; ?>>Semi furnished</option>
        <option value="Unfurnished" <?php if ($row['furniture'] == 'Unfurnished') echo 'selected'; ?>>Unfurnished</option>
    </select>
    <br><br>
    <label for="covered-parking">Covered Parking:</label>
    <select id="covered-parking" name="coverp">
        <option value="0" <?php if ($row['coverp'] == '0') echo 'selected'; ?>>0</option>
        <option value="1" <?php if ($row['coverp'] == '1') echo 'selected'; ?>>1</option>
        <option value="2" <?php if ($row['coverp'] == '2') echo 'selected'; ?>>2</option>
        <option value="3" <?php if ($row['coverp'] == '3') echo 'selected'; ?>>3</option>
        <option value="3+" <?php if ($row['coverp'] == '3+') echo 'selected'; ?>>3+</option>
    </select>
    <br><br>
    <label for="open-parking">Open Parking:</label>
    <select id="open-parking" name="openp">
        <option value="0" <?php if ($row['openp'] == '0') echo 'selected'; ?>>0</option>
        <option value="1" <?php if ($row['openp'] == '1') echo 'selected'; ?>>1</option>
        <option value="2" <?php if ($row['openp'] == '2') echo 'selected'; ?>>2</option>
        <option value="3" <?php if ($row['openp'] == '3') echo 'selected'; ?>>3</option>
        <option value="3+" <?php if ($row['openp'] == '3+') echo 'selected'; ?>>3+</option>
    </select>
    <br><br>


    <label for="cost">Cost (INR):</label>
    <input type="number" id="cost" name="cost" placeholder="Enter the cost in INR" value="<?php echo $row['cost']; ?>" required>
    <br><br>
    <label for="maintenance-charges">Maintenance Charges (per month, INR):</label>
    <input type="number" id="maintenance-charges" name="maintenancecharges" placeholder="Enter the maintenance charges per month in INR" value="<?php echo $row['maintenancecharges']; ?>" required>
    <br><br>
    <label for="built-up-area">Built-up Area (sq. ft.):</label>
    <input type="number" id="built-up-area" name="built" placeholder="Enter the built-up area in sq. ft." value="<?php echo $row['built']; ?>" required>
    <br><br>
    <fieldset>
        <legend>Listing Type:</legend>
        <label for="rent">
            <input type="radio" id="rent" name="listing-type" value="Rent" <?php if ($row['listingtype'] == 'Rent') echo 'checked'; ?> required>
            Rent
        </label>
        <label for="sell">
            <input type="radio" id="sell" name="listing-type" value="Sell" <?php if ($row['listingtype'] == 'Sell') echo 'checked'; ?> required>
            Sell
        </label>
    </fieldset>

    <br><br>
    <fieldset>
        <legend>Property Usage:</legend>
        <label for="residential">
            <input type="radio" id="residential" name="propertyusage" value="Residential" <?php if ($row['propertyusage'] == 'Residential') echo 'checked'; ?> required>
            Residential
        </label>
        <label for="commercial">
            <input type="radio" id="commercial" name="propertyusage" value="Commercial" <?php if ($row['propertyusage'] == 'Commercial') echo 'checked'; ?> required>
            Commercial
        </label>
    </fieldset>
    <br><br>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
</div>
</body>
</html>