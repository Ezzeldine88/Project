
<?php
// Database credentials
$host = 'localhost';        // Database host
$username = 'root';         // Database username
$password = '';             // Database password
$database = 'clinic';       // Database name

// Attempt to connect to the database
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Optionally, you can return the connection to be used elsewhere
return $conn;
?>
