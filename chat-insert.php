<?php
include 'connection.php';

$incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
$outgoing_id = $id; // Assuming $id is defined and sanitized
$message = mysqli_real_escape_string($conn, $_POST['message']);

$validateQuery = "SELECT U_id FROM master_table WHERE U_id IN ('$incoming_id', '$outgoing_id')";
$validateResult = $conn->query($validateQuery);

if ($validateResult->num_rows === 2) {
    $insertQuery = "INSERT INTO messagss (incoming_id, outgoing_id, msg) VALUES ('$incoming_id', '$outgoing_id', '$message')";

    if ($conn->query($insertQuery) === TRUE) {
        echo "Message inserted successfully";
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "Invalid incoming_id or outgoing_id.";
}

$conn->close();
?>
