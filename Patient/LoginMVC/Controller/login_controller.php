<?php
session_start();


include_once '../Model/UserClass.php';

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "clinic";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$userModel = new UserModel($conn);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = $userClass->getUserByUsername($username);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['username'] = $user['username'];
        header("Location: home2.html");
        exit();
    } else {
        echo "Invalid username or password. Please try again.";
    }
}

include 'login.html'; 
?>
