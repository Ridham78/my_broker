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
    /* Style for the card container */
    .row {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    /* Style for individual cards */
    .card {
        border-radius: 10px; /* Adjust as needed */
        overflow: hidden;
    }

    .card-body {
        padding: 20px; /* Adjust as needed */
    }

    /*.card-img-absolute {
        position: absolute;
        top: 10px;  Adjust as needed 
        right: 10px;  Adjust as needed 
    }*/
    /*
     Style for headings 
    .font-weight-normal {
        font-weight: normal;
    }*/

    /* Colors for card backgrounds */
    /*.bg-gradient-danger {
        background-image: linear-gradient(to right top, #ff416c, #ff4b2b);
    }
    
    .bg-gradient-info {
        background-image: linear-gradient(to right top, #00b09b, #96c93d);
    }
    
    .bg-gradient-success {
        background-image: linear-gradient(to right top, #00cdac, #8ddad5);
    }*/

    /* Text color for card content */
    .text-white {
        color: white;
    }

    /* Spacing between cards */
    .grid-margin {
        margin-bottom: 20px; /* Adjust as needed */
    }


</style>

<!--==================== HEADER ====================-->
<header class="header" id="header">
    <nav class="nav container">
        <a href="dashboard.php" class="nav__logo">
            <i class='bx bxs-home-circle nav__logo-icon'></i> My Broker

        </a>

        <div class="nav__menu" id="nav-menu">
            <ul class="nav__list">
                <li class="nav__item">
                    <a href="dashboard.php" class="nav__link active-link">Dashboard</a>
                </li>
                <li class="nav__item">
                    <a href="customer.php" class="nav__link">User's</a>
                </li>
                <li class="nav__item">
                    <a href="all_property.php" class="nav__link">Property's</a>
                </li>

                <li class="nav__item dropdown">
                    <a href="" class="nav__link">Report's</a>
                    <div class="dropdown-content">
                        <a href="Type_report.php" class="nav__link active-link">TYPE REPORT</a>
                        <a href="Listing_report.php" class="nav__link active-link">LISTING REPORT</a>
                    </div>
                </li>

                <li class="nav__item">
                    <a href="profile.php" class="nav__link">PROFILE</a>
                </li>
                <li class="nav__item">
                    <a href="adminlogin.php" class="nav__link">Logout</a>
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
include 'connection.php';

$sql = "select count(*) from master_table";
$oo = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($oo)) {
    $usercount = $row['count(*)'];
}

$sql = "select count(*) from property";
$oo = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($oo)) {
    $count = $row['count(*)'];
}

$query = "SELECT COUNT(*) as count_rental FROM property WHERE listingtype='rent'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$count_rental = $row['count_rental'];

$query = "SELECT COUNT(*) as sell FROM property WHERE listingtype='sell'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$sell = $row['sell'];

$sql = "SELECT count(*) AS total FROM property WHERE 'listing-type' = 'Rent'";
$result = mysqli_query($conn, $sql);
while ($values = mysqli_fetch_assoc($result)) {
    $num_rows = $values['total'];
    echo $num_rows;
}
?>

<?php
include 'connection.php';

// Fetch total number of users
$sql = "SELECT COUNT(*) AS usercount FROM master_table";
$userCountResult = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($userCountResult);
$usercount = $row['usercount'];

// Fetch total number of properties
$sql = "SELECT COUNT(*) AS count FROM property";
$countResult = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($countResult);
$count = $row['count'];

// Fetch total number of properties for rent
$query = "SELECT COUNT(*) AS count_rental FROM property WHERE listingtype='Rent'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$count_rental = $row['count_rental'];

// Fetch total number of properties for sell
$query = "SELECT COUNT(*) AS sell FROM property WHERE listingtype='Sell'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$sell = $row['sell'];

mysqli_close($conn);
?>

<div class="row">
    <div class="col-md-4 grid-margin">
        <div class="card bg-gradient-danger card-img-holder text-white h-100">
            <div class="card-body">
                <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                <h4 class="font-weight-normal mb-3">Total Number of Users</h4>
                <h2 class="mb-5"><?php echo $usercount ?></h2>
            </div>
        </div>
    </div>
    <div class="col-md-4 grid-margin">
        <div class="card bg-gradient-info card-img-holder text-white h-100">
            <div class="card-body">
                <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                <h4 class="font-weight-normal mb-3">Total Number of Approved property</h4>
                <h2 class="mb-5"><?php echo $usercount ?></h2>
            </div>
        </div>
    </div>
    <div class="col-md-4 grid-margin">
        <div class="card bg-gradient-success card-img-holder text-white h-100">
            <div class="card-body">
                <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                <h4 class="font-weight-normal mb-3">Total Number of reject property</h4>
                <h2 class="mb-5"><?php echo $usercount ?></h2>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4 grid-margin">
        <div class="card bg-gradient-danger card-img-holder text-white h-100">
            <div class="card-body">
                <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                <h4 class="font-weight-normal mb-3">Total Number of Properties</h4>
                <h2 class="mb-5"><?php echo $count ?></h2>
            </div>
        </div>
    </div>
    <div class="col-md-4 grid-margin">
        <div class="card bg-gradient-info card-img-holder text-white h-100">
            <div class="card-body">
                <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                <h4 class="font-weight-normal mb-3">Properties for Rent</h4>
                <h2 class="mb-5"><?php echo $count_rental ?></h2>
            </div>
        </div>
    </div>
    <div class="col-md-4 grid-margin">
        <div class="card bg-gradient-success card-img-holder text-white h-100">
            <div class="card-body">
                <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                <h4 class="font-weight-normal mb-3">Properties for Sell</h4>
                <h2 class="mb-5"><?php echo $sell ?></h2>
            </div>
        </div>
    </div>
</div>
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



