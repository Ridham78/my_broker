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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Approval</title>
</head>
<body>
<div class="main-panel">
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
                                <form method="POST" action="">
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
    </div>
</div>
</body>
</html>
<?php
}

mysqli_close($conn);
?>
