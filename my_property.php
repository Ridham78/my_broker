<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the form is submitted
    $p_id = $_POST['p_id'];
    $newStatus = $_POST['property_status'];

    // Update the database with the new property status
    $updateQuery = "UPDATE property SET property_status = '$newStatus' WHERE p_id = '$p_id'";
    $updateResult = mysqli_query($conn, $updateQuery);

    if ($updateResult) {
        // Property status updated successfully
        echo '<script>alert("Property status updated successfully!");</script>';
    } else {
        // Error updating property status
        echo '<script>alert("Error updating property status.");</script>';
    }
}

$userId = $_GET['id'];
$query = "SELECT * FROM property WHERE id='$userId'";
$result = mysqli_query($conn, $query);
?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Property List</title>
        <style>
            body {
                font-family: Arial, sans-serif;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 119px;
            }

            table, th, td {
                border: 1px solid #ddd;
            }

            th, td {
                padding: 10px;
                text-align: center;
            }

            th {
                background-color: #343a40;
                color: white;
            }

            img {
                max-width: 50px;
                max-height: 50px;
            }

            .status-approved {
                color: green;
            }

            .status-rejected {
                color: red;
            }

            .status-pending {
                color: orange;
            }

            .main-panel {
                margin: 20px;
            }
        </style>

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
    <body>
        <?php
        include 'connection.php';

        $userId = $_GET['id'];
        $query = "SELECT * FROM property WHERE id='$userId'";
        $result = mysqli_query($conn, $query);
        ?>

        <div class="main-panel">
            <div class="content-wrapper">
                <div class="page-header">
                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <tr class="bg-dark text-white">
                                <th>TYPE</th>
                                <th>BHK</th>
                                <th>BATHROOM</th>
                                <th>BALCONY</th>
                                <th>FURNITURE</th>
                                <th>COVERP</th>
                                <th>OPENP</th>
                                <th>COST</th>
                                <th>MAINTENANCE CHARGES</th>
                                <th>BUILT</th>
                                <th>LISTING TYPE</th>
                                <th>PROPERTY USAGES</th>
                                <th>IMAGE</th>
                                <th>Status</th>
                                <th>Delete</th>
                                <th>Update</th>
                                <th>Property Status</th>
                            </tr>
                            <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $row['type']; ?></td>
                                    <td><?php echo $row['bhk']; ?></td>
                                    <td><?php echo $row['bathroom']; ?></td>
                                    <td><?php echo $row['balcony']; ?></td>
                                    <td><?php echo $row['furniture']; ?></td>
                                    <td><?php echo $row['coverp']; ?></td>
                                    <td><?php echo $row['openp']; ?></td>
                                    <td><?php echo $row['cost']; ?></td>
                                    <td><?php echo $row['maintenancecharges']; ?></td>
                                    <td><?php echo $row['built']; ?></td>
                                    <td><?php echo $row['listingtype']; ?></td>
                                    <td><?php echo $row['propertyusage']; ?></td>
                                    <td><img src="<?php echo $row['imagepath'] ?>" alt="Property Image"></td>
                                    <td class="<?php
                                    if ($row['status'] == 1) {
                                        echo 'status-approved';
                                    } else if ($row['status'] == 0) {
                                        echo 'status-rejected';
                                    } else {
                                        echo 'status-pending';
                                    }
                                    ?>">
                                            <?php
                                            if ($row['status'] == 1) {
                                                echo 'Approved';
                                            } else if ($row['status'] == 0) {
                                                echo 'Rejected';
                                            } else {
                                                echo 'Pending';
                                            }
                                            ?>
                                    </td>
                                    <td>
                                        <a href='deleteprop.php?p_id=<?php echo $row['p_id'] ?>' onclick="return confirm('Are you sure you want to delete this property?')">
                                            <img src="trash1.jpeg" height="20" width="20" alt="Delete"/>
                                        </a>
                                    </td>
                                    <td>
                                        <a href='property_update.php?id=<?php echo $row['id'] ?>'><img src="update1.jpeg" height="20" alt="Update"/></a>
                                    </td>


                                        <td>
                                            <form method="POST" action="my_property.php?id=<?php echo $userId; ?>">
                                                <input type="hidden" name="p_id" value="<?php echo $row['p_id']; ?>">
                                                <select name="property_status" onchange="updateSelectStatus(this)">
                                                    <option value="" disabled>Select Status</option>
                                                    <option value="0" <?php echo ($row['property_status'] == '0') ? 'selected' : ''; ?>>Sold</option>
                                                    <option value="1" <?php echo ($row['property_status'] == '1') ? 'selected' : ''; ?>>Available</option>
                                                </select>
                                                <input type="submit" value="Submit">
                                            </form>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </table>
                        <?php
                        echo "<br><br><a href='profile_page.php?id= $_GET[id]'><button>Back to Home</button></a>";
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function updateSelectStatus(selectElement) {
                var selectedOption = selectElement.options[selectElement.selectedIndex];
                var selectStatus = document.querySelector('select[name="property_status"]');

                if (selectedOption.value === '0') {
                    // If 'Sold' is selected, hide the 'Select Status' option
                    selectStatus.options[0].style.display = 'none';
                } else {
                    // If 'Available' is selected, show the 'Select Status' option
                    selectStatus.options[0].style.display = '';
                }
            }
        </script>
    </body>
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