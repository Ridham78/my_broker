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
                margin-top: 20px;
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
    </head>
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
                                            <img src="trash1.jpg" height="20" width="20" alt="Delete"/>
                                        </a>
                                    </td>
                                    <td>
                                        <a href='property_update.php?id=<?php echo $row['id'] ?>'><img src="update1.png" height="20" alt="Update"/></a>
                                    </td>


                                    <td>
                                        <form method="POST" action="my_property.php">
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
</html>
