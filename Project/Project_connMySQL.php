

<?php
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "group9_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
mysqli_query($conn, "SET NAMES 'UTF8'");
//echo "<h4 align='center'> <font color=black  size='10pt'>Connected successfully to database</font> </h4>";
?>
