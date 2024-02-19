<?php
include 'connection.php';

// Retrieve user data based on the user ID or email
//$userId = 13    ; // Set the user ID here, or retrieve it dynamically from a session variable
$userId = $_GET['id'];
//        $userId = 10

$sql = "SELECT * FROM master_table WHERE U_id='$userId'";
$result = $conn->query($sql);

// Display user data on the homepage
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<br><br><br><h1>Profile</h1><br>";
        echo "<p>Name: " . $row["U_name"] . "</p>";
        echo "<p>Email: " . $row["U_Email"] . "</p>";
        echo "<p>Contact Number: " . $row["U_Contact_number"] . "</p>";
        echo "<p>Address: " . $row["U_Address"] . "</p>";
        echo '<br><a href="MY_PROPERTY.php?id=' . $id . '"><button>MY_PROPERTY</button></a>';
        echo '<br><a href="password.php?id=' . $id . '"><button>Change Password</button></a>';
        echo "<br><a href='homepage.php?id= $_GET[id]'><button>Back to Home</button></a>";
    }
} else {
    echo "No user found";
}
?>
 