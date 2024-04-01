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

    /*            .content-wrapper {
      height: 500px;  Set the desired height for the scrollable content 
      overflow-y: auto;  Enable vertical scrolling 
    }*/
    /* Add the following CSS styles to your existing styles */

    /* Table styles */
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

    /* Adjust the styles as needed to fit your design */

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
                    <a href="customer.php" class="nav__link">User's</a>
                </li>
                <li class="nav__item">
                    <a href="all_property.php" class="nav__link active-link">Property's</a>
                </li>
                <li class="nav__item dropdown">
                    <a href="" class="nav__link ">Report's</a>
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
require 'Exception.php';
require 'SMTP.php';
require 'PHPMailer.php';

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

include 'connection.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $property_id = $_POST["p_id"];
    $status = $_POST["status"];

    // Update the property status in the database
    $update_query = "UPDATE property SET status = ? WHERE p_id = ?";
    $stmt = $conn->prepare($update_query);
    $stmt->bind_param("is", $status, $property_id);
    if ($stmt->execute()) {
        // Notify the customer via email if the property is approved
        if ($status == 1) {
            // Retrieve customer email and other details from the database based on the property_id
            $query = "SELECT U_Email FROM master_table WHERE U_id IN (SELECT id FROM property WHERE P_id = ?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("s", $property_id);
            if ($stmt->execute()) {
                $result = $stmt->get_result();
                if ($result && $result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $customer_email = $row['U_Email'];

                    // Retrieve and format property details from your database
                    $property_details = "Retrieve and format property details here"; // Replace with actual property details

                    try {
                        $mail = new PHPMailer(true);
                        $mail->isSMTP();
                        $mail->Host = 'smtp.gmail.com';
                        $mail->Port = 587;
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                        $mail->SMTPAuth = true;
                        $mail->Username = 'bundheliyaridham@gmail.com';
                        $mail->Password = 'kmdq baov ckzv zrqt ';
                        $mail->setFrom('bundheliyaridham@gmail.com', 'MY BROKER');
                        $mail->addAddress($customer_email);
                        $mail->addReplyTo('bundheliyaridham@gmail.com', 'MY BROKER');
                        $mail->IsHTML(true);
                        $mail->Subject = 'Property Approval Notification';
                        $mail->Body = 'Your property with ID ' . $property_id . ' has been ' . ($status == 1 ? 'approved' : 'rejected') . ' by the admin.';
                        $mail->send();

                        // Email sent successfully
                        echo "Email notification sent successfully.";
                    } catch (Exception $e) {
                        // Error occurred while sending the email
                        echo "Mailer Error: " . $mail->ErrorInfo;
                    }
                } else {
                    echo "Customer email not found.";
                }
            } else {
                echo "Error in retrieving customer email: " . $conn->error;
            }
        } else {
            echo "Property status updated successfully.";
        }
    } else {
        echo "Error updating property status: " . $conn->error;
    }
}

// Fetch all properties
$query = "SELECT * FROM property";
$result = mysqli_query($conn, $query);

if (!$result) {
    echo "Error fetching properties: " . mysqli_error($conn);
} else {
    ?>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="content-wrapper">
                <div class="page-header">
                    <div class="table-wrapper">

                        <table class="table table-bordered text-center">
                            <tr class="bg-dark text-white">
                                <th>ID</th>
                                <th>p_ID</th>
                                <th>TYPE</th>
                                <th>BHK</th>
                                <th>BATHROOM</th>
                                <th>BALCONY</th>
                                <th>FURNITURE</th>
                                <th>COVERP</th>
                                <th>OPENP</th>
                                <th>COST</th>
                                <th>MAINTENANCECHARGES</th>
                                <th>BUILT</th>
                                <th>LISTING TYPE</th>
                                <th>PROPERTY USAGES</th>
                                <th>IMAGE</th>
                                <th>Delete</th>
                                <th>Status</th>
                                <th>Approve</th>
                            </tr>
                            <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['p_id']; ?></td>
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
                                    <td><img src="<?php echo $row['imagepath'] ?>" height="20"></td>
                                    <td><a href='deleteprop.php?id=<?php echo $row['id'] ?>'><img src="trash1.jpg" height="20" alt="Delete"/></a></td>
                                    <td>
                                        <?php if ($row['status'] == 1) { ?>
                                            <p style="color:green;">Approved</p>
                                        <?php } else { ?>
                                            <p style="color: red;">Rejected</p>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <form method="POST" action="all_property.php">
                                            <input type="hidden" name="p_id" value="<?php echo $row['p_id']; ?>">
                                            <select name="status">
                                                <option value="">Select Status</option>
                                                <option value="1">Approve</option>
                                                <option value="0">Reject</option>
                                            </select>
                                            <input type="submit" value="Submit">
                                        </form>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                    </table>
                </div>

            </div>
<!--            <script>
                function disableSubmit(button) {
                    button.disabled = true;
                }
            </script>-->
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
<?php
}
mysqli_close($conn);
?>




