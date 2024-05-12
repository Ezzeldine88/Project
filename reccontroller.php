<?php
session_start();

require_once 'receptionistModel.php';

// Database connection
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "clinic"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
    case 'login':
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $receptionistModel = new ReceptionistModel($conn);
            $isValidLogin = $receptionistModel->validateLogin($username, $password);

            if ($isValidLogin) {
                header("Location: receptionistdashboard.html");
                exit();
            } else {
                echo "<script>alert('Login failed wrong admin data !'); window.location.href = 'adminlogin.html';</script>";
            }
        }
        break;

    default:
        include 'receptionistloginView.php';
        break;
}

$conn->close();
?>
