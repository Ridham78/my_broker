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

//$sql = "select count(*) from master_table where Role='1'";
//$oo = mysqli_query($conn, $sql);
//while ($row = mysqli_fetch_assoc($oo)) {
//    $custcount = $row['count(*)'];
//}
//
//$sql = "select count(*) from master_table where Role='0'";
//$oo = mysqli_query($conn, $sql);
//while ($row = mysqli_fetch_assoc($oo)) {
//    $brokcount = $row['count(*)'];
//}



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

// Fetch total number of customers
//$sql = "SELECT COUNT(*) AS custcount FROM master_table WHERE Role='1'";
//$custCountResult = mysqli_query($conn, $sql);
//$row = mysqli_fetch_assoc($custCountResult);
//$custcount = $row['custcount'];
//// Fetch total number of brokers
//$sql = "SELECT COUNT(*) AS brokcount FROM master_table WHERE Role='0'";
//$brokCountResult = mysqli_query($conn, $sql);
//$row = mysqli_fetch_assoc($brokCountResult);
//$brokcount = $row['brokcount'];
// Close the database connection
mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Admin Dashboard</title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
        <!-- endinject -->
        <!-- Plugin css for this page -->
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <!-- endinject -->
        <!-- Layout styles -->
        <link rel="stylesheet" href="assets/css/style.css">
        <!-- End layout styles -->
        <link rel="shortcut icon" href="assets/images/favicon.ico"/>
    </head>
    <body>
        <div class="container-scroller">
            <div class="row p-0 m-0 proBanner" id="proBanner">
                <div class="col-md-12 p-0 m-0">
                    <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
                        <div class="ps-lg-1">
                            <div class="d-flex align-items-center justify-content-between">
                            </div>
                        </div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <h1>My&nbsp;<span style='color:lightgreen'>Broker</span></h1>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-menu"></span>
                </button>
                <div class="search-field d-none d-md-block">
                    <form class="d-flex align-items-center h-100" action="#">
                        <div class="input-group">
                            <div class="input-group-prepend bg-transparent">

                            </div>
                            <!--<input type="text" class="form-control bg-transparent border-0" placeholder="Search projects">-->
                        </div>
                    </form>
                </div>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown"
                           aria-expanded="false">
                            <div class="nav-profile-img">
                                <img src="assets/images/faces/face1.jpg" alt="image">
                                <span class="availability-status online"></span>
                            </div>
                            <div class="nav-profile-text">
                                <p class="mb-1 text-black">Ridham</p>
                            </div>
                        </a>
                        <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="adminlogin.php">
                                <i class="mdi mdi-logout me-2 text-primary"></i> Signout
                            </a>
                        </div>
                    </li>
                    <li class="nav-item d-none d-lg-block full-screen-link">
                        <a class="nav-link">
                            <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item nav-profile">
                        <a href="#" class="nav-link">
                            <div class="nav-profile-image">
                                <img src="assets/images/faces/face1.jpg" alt="profile">
                                <span class="login-status online"></span>
                                <!--change to offline or busy as needed-->
                            </div>
                            <div class="nav-profile-text d-flex flex-column">
                                <span class="font-weight-bold mb-2">Ridham</span>
                            </div>
                            <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">
                            <span class="menu-title">Dashboard</span>
                            <i class="mdi mdi-home menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#users" aria-expanded="false"
                           aria-controls="users">
                            <span class="menu-title">Users</span>
                        </a>
                        <div class="collapse" id="users">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="cust.php">Customers</a>
                                </li>

                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="property.php">
                            <span class="menu-title">Properties</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                            <span class="menu-title">report's</span>
                            <!--<i class="menu-arrow"></i>-->
                            <!--<i class="mdi mdi-crosshairs-gps menu-icon"></i>-->
                        </a>
                        <div class="collapse" id="ui-basic">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="Type_report.php">Type_report</a></li>
                                <li class="nav-item"> <a class="nav-link" href="Listing_report.php">Listing_report</a></li>
                            </ul>
                        </div>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href="adminlogin.php">
                            <span class="menu-title">Logout</span>
                            <!--<i class="mdi mdi-logout me-2 text-primary"></i>-->
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">
                            <span class="page-title-icon bg-gradient-primary text-white me-2">
                                <i class="mdi mdi-home"></i>
                            </span> Dashboard
                        </h3>
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page">
                                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                                </li>
                            </ul>
                        </nav>
                    </div>
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
                                    <h4 class="font-weight-normal mb-3">Total Number of Users</h4>
                                    <h2 class="mb-5"><?php echo $usercount ?></h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 grid-margin">
                            <div class="card bg-gradient-success card-img-holder text-white h-100">
                                <div class="card-body">
                                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                                    <h4 class="font-weight-normal mb-3">Total Number of Users</h4>
                                    <h2 class="mb-5"><?php echo $usercount ?></h2>
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

                    </div>
                    <!-- main-panel ends -->
                </div>
                <!-- page-body-wrapper ends -->
            </div>
            <!-- container-scroller -->
            <!-- plugins:js -->
            <script src="assets/vendors/js/vendor.bundle.base.js"></script>
            <!-- endinject -->
            <!-- Plugin js for this page -->
            <script src="assets/vendors/chart.js/Chart.min.js"></script>
            <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
            <!-- End plugin js for this page -->
            <!-- inject:js -->
            <script src="assets/js/off-canvas.js"></script>
            <script src="assets/js/hoverable-collapse.js"></script>
            <script src="assets/js/misc.js"></script>
            <!-- endinject -->
            <!-- Custom js for this page -->
            <script src="assets/js/dashboard.js"></script>
            <script src="assets/js/todolist.js"></script>
            <!-- End custom js for this page -->
    </body>
</html>
