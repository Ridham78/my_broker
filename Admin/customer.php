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

    .content-wrapper {
        background: #f2edf3;
        padding: revert-layer;
        width: 100%;
        margin-top: 9%;
        -webkit-box-flex: 1;
        -ms-flex-positive: 1;
    }
    .table-bordered {
        border: 1px solid #dee2e6;
    }
    .table-bordered th,
    .table-bordered td {
        border: 1px solid #dee2e6;
        padding: 5px;
    }
    .table-bordered th {
        background-color: #f1f1f1;
        color: #333;
    }

    /* Table header styles */
    .table-bordered thead th {
        position: sticky;
        top: 0;
        background-color: #333;
        color: #fff;
        z-index: 1;
    }

    /* Table body styles */
    .table-bordered tbody td {
        background-color: #fff;
    }

    /* Table scroll styles */
    .table-wrapper {
        max-height: 500px;
        overflow-y: auto;
    }

    /* Other styles */
    .container-fluid {
        padding: 0;
    }

    .page-header {
        padding: 20px 0;
    }

    .table-wrapper table {
        width: auto;
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
                    <a href="dashboard.php" class="nav__link">Dashboard</a>
                </li>
                <li class="nav__item">
                    <a href="customer.php" class="nav__link active-link">User's</a>
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
include './connection.php';
// Assume $conn is the database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_POST['user_id'];
    $status = $_POST['status'];

    // Update the user's status in the database
    $sql = "UPDATE master_table SET status = $status WHERE U_id = $user_id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo '<script>alert("Property status updated successfully!");</script>';
    } else {
        echo '<script>alert("Error updating property status.");</script>';
    }
}
?>

<!-- <script>

            // This function will be called when the submit button is clicked
            function submit() {

                // Get the user ID from the form
                var user_id = document.getElementById('user_id').value;

                // Update the user's login status in the database
                $.ajax({
                    url: 'cust.php',
                    type: 'POST',
                    data: {
                        user_id: user_id
                    },
                    success: function (response) {
                        // The update was successful, redirect the user to the login page
                        window.location.href = 'cust.php';
                    },
                    error: function (error) {
                        // The update was not successful, display an error message
                        alert('An error occurred while approving the login.');
                    }
                });

            }

        </script>-->
<?php
include 'connection.php';
$query = "select * from master_table ";
$result = mysqli_query($conn, $query);
?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <crnter>
                <!-- Table HTML code -->
                <div class="card-body">
                    <table class="table table-bordered text-center">
                        <tr class="bg-dark text-white">
                            <th>User Name</th>
                            <th>User Email</th>
                            <th>Contact No</th>
                            <th>Address</th>
                            <th>Update</th>
                            <th>Status</th>
                            <th>Approve</th>
                        </tr>
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <td><?php echo $row['U_name']; ?></td>
                                <td><?php echo $row['U_Email']; ?></td>
                                <td><?php echo $row['U_Contact_number']; ?></td>
                                <td><?php echo $row['U_Address']; ?></td>
                                <td><a href='update.php?id=<?php echo $row['U_id'] ?>'><img src="update1.png" style="height: 30px; background-color: white;" alt="Update"/></a></td>
                                <td>
                                    <?php if ($row['status'] == 1) { ?>
                                        <p style="color:green;">Approved</p>
                                    <?php } else { ?>
                                        <p style="color: red;">Rejected</p>
                                    <?php } ?>
                                </td>
                                <td>
                                    <form method="POST" action="customer.php">
                                        <input type="hidden" name="user_id" value="<?php echo $row['U_id']; ?>">
                                        <select name="status" onchange="updateSelectStatus(this)">
                                            <option>status</option>
                                            <option value="1">Approve</option>
                                            <option value="0">Reject</option>
                                        </select>
                                        <input type="submit" value="Submit">
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </crnter>
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

<script>
    function updateSelectStatus(selectElement) {
        var selectedOption = selectElement.options[selectElement.selectedIndex];
        var selectStatus = document.querySelector('select[name="status"]');

        if (selectedOption.value === '0') {
            // If 'Sold' is selected, hide the 'Select Status' option
            selectStatus.options[0].style.display = 'none';
        } else {
            // If 'Available' is selected, show the 'Select Status' option
            selectStatus.options[0].style.display = '';
        }
    }
</script>
<!--=============== SWIPER JS ===============-->
<script src="assets/js/swiper-bundle.min.js"></script>

<!--=============== MAIN JS ===============-->
<script src="assets/js/main.js"></script>
</body>
</html>



