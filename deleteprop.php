<?php

include 'connection.php';
$userId = $_GET['id'];

$query = "SELECT * FROM property WHERE P_id='$userId'";
$result = mysqli_query($conn, $query);

if (isset($_GET['p_id'])) {
    $propertyId = $_GET['p_id'];

    // Delete the property from the database
    $deleteQuery = "DELETE FROM property WHERE p_id='$propertyId'";
    $result = mysqli_query($conn, $deleteQuery);

    if ($result) {
        // Property deleted successfully
        echo "Property deleted successfully.";
        header("Location: my_property.php?id=$userId");
        exit();
    } else {
        // Error occurred while deleting the property
        echo "Error deleting property.";
        // Redirect the user to an error page or any appropriate page
        header("Location: error.php");
        exit();
    }
} else {
    // Invalid property ID
    echo "Invalid property ID.";
    // Redirect the user to an error page or any appropriate page
    header("Location: error.php");
    exit();
}
?>