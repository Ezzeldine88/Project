<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "clinic"; 
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$phone = $_POST['phone'];
$message = $_POST['message'];

$name = mysqli_real_escape_string($conn, $name);
$phone = mysqli_real_escape_string($conn, $phone);
$message = mysqli_real_escape_string($conn, $message);

$sql = "INSERT INTO chat_messages (name, phone, message) VALUES ('$name', '$phone', '$message')";

if ($conn->query($sql) === TRUE) {
    echo '<script>alert("Your message has been successfully sent! One of our representatives will contact you as soon as possible. Thank you!");</script>';
    echo '<script>window.location.href = "home2 .html";</script>'; // Redirect to home page
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
