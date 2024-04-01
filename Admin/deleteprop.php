<?php
include 'connection.php';

$no = $_GET['id'];
if (isset($_GET['id'])) {
    $sql = "DELETE FROM `property` WHERE id = $no";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("location: all_property.php");
    } else {
        echo "Failed: " . mysqli_error($conn);
    }
}
?>
