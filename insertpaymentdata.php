<?php

require 'Exception.php';
require 'SMTP.php';
require 'PHPMailer.php';

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

include './connection.php';

// Assuming you're receiving the Razorpay payment ID and user ID through a GET request
$razorpay_payment_id = $_GET['razorpay_payment_id'];
$payment_amount = 299; // Assuming a fixed payment amount
$payment_status = 'success'; // Assuming the payment status is initially set to 'success'
$uid = $_GET['id']; // Assuming you're receiving the user ID through a GET request

// SQL query to fetch the customer email from the master table
$select_query = "SELECT U_Email FROM master_table WHERE U_id = $uid";

// Execute the query
$result = $conn->query($select_query);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $customer_email = $row['U_Email'];

    // Calculate the end date of the subscription (e.g., one month from the current date)
    $current_date = date('Y-m-d');
    $end_date = date('Y-m-d', strtotime('+1 month', strtotime($current_date)));

    // SQL query to insert payment data into the 'payment' table
    $sql = "INSERT INTO payment (razorpay_payment_id, payment_amount, payment_status, payment_date, end_date, user_id)
            VALUES ('$razorpay_payment_id', $payment_amount, '$payment_status', NOW(), '$end_date', '$uid')";

    // Execute the SQL query
    if ($conn->query($sql) === TRUE) {
        // If the query is successful, prepare a success response
        $response = array("success" => true, "message" => "Payment successfully recorded in the database");
        echo json_encode($response);

        try {
            // Send email notification
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 587;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->SMTPAuth = true;
            $mail->Username = 'bundheliyaridham@gmail.com';
            $mail->Password = 'pyyz scki wrhq qurx';
            $mail->setFrom('bundheliyaridham@gmail.com', 'MY BROKER');
            $mail->addAddress($customer_email);
            $mail->addReplyTo('bundheliyaridham@gmail.com', 'MY BROKER');
            $mail->IsHTML(true);
            $mail->Subject = 'get a pro my_broker';
            $mail->Body = 'Thank you for purchasing the "Get Pro" subscription.';

            $mail->send();

            // Email sent successfully
            echo "Email notification sent successfully.";
        } catch (Exception $e) {
            // Error sending email
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        // If there's an error with the query, prepare an error response
        $response = array("success" => false, "message" => "Error: " . $sql . "<br>" . $conn->error);
        echo json_encode($response);
    }
} else {
    // If user ID doesn't exist or email couldn't be fetched
    $response = array("success" => false, "message" => "User ID not found or email couldn't be fetched");
    echo json_encode($response);
}

// Close the database connection
$conn->close();
?>
