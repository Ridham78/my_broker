    <?php
// MySQL connection
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'my_broker';

$conn = mysqli_connect($host, $user, $password, $dbname);
if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}
?>
