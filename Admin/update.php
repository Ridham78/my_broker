<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" media="all" href="css/sign.css">
        <title>update_PAGE</title>


        <!-- Customized Bootstrap Stylesheet -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <!--<link rel="stylesheet" href="assets/css/style.css">-->

        <!-- Template Stylesheet -->
        <link href="assets/css/style_1.css" rel="stylesheet">

    </head>
    <body>
        <?php
        // Retrieve the user ID from the URL parameter
        include 'connection.php';
        $userId = $_GET['id'];

        // Check if the form has been submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Retrieve the updated data from the form
            $name = $_POST['name'];
            $email = $_POST['email'];
            $contact = $_POST['contact'];
            $address = $_POST['address'];

            // Update the user's data in the database
            $query = "UPDATE master_table SET U_name='$name', U_Email='$email', U_Contact_number='$contact', U_Address='$address' WHERE U_id='$userId'";
            $result = mysqli_query($conn, $query);

            // Display a message indicating the update has been successful
            if ($result) {

                echo '<script>alert("data update succesfully....");</script>';

                header("location: index.php");
            } else {
                echo "Failed: " . mysqli_error($conn);
            }
        }

        // Retrieve the user's current data from the database
        $query = "SELECT * FROM master_table WHERE U_id = $userId";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        ?>

        <div class="card-body">
            <form method="post">
                <input type="hidden" name="id" value="<?php echo $userId; ?>">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['U_name']; ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['U_Email']; ?>">
                </div>
                <div class="form-group">
                    <label for="contact">Contact Number:</label>
                    <input type="text" class="form-control" id="contact" name="contact" value="<?php echo $row['U_Contact_number']; ?>">
                </div>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" class="form-control" id="address" name="address" value="<?php echo $row['U_Address']; ?>">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </body>
</html>

