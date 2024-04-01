<?php

if (isset($_GET['code'])) {
    $code = $_GET['code'];
    include './connection.php';

    $verifyQuery = $conn->query("SELECT * FROM master_table WHERE code = '$code' and updated_time >= NOW() - Interval 1 DAY");

    if ($verifyQuery->num_rows == 0) {
        header("Location: index.html");
        exit();
    }

    if (isset($_POST['change'])) {
        $email = $_POST['email'];
        $new_password = $_POST['new_password'];

        $changeQuery = $conn->query("UPDATE master_table SET U_Password = '$new_password' WHERE U_Email = '$email' and code = '$code' and updated_time >= NOW() - INTERVAL 1 DAY");

        if ($changeQuery) {
            echo '<script>alert("Password changed successfully!");';
            echo 'window.location.href = "Login.php";</script>';
            exit();
        }
    }
    $conn->close();
} else {
    header("Location: index.html");
    exit();
}
?>
