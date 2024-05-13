<?php
session_start();
require_once "loginModel.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (authenticateUser($username, $password)) {
        // Redirect to appropriate page based on user type
        $userType = $_POST['user_type'];
        switch ($userType) {
            case 'admin':
                header("Location: adminhome.html");
                break;
            case 'doctor':
                header("Location: doctorhome.html");
                break;
            case 'receptionist':
                header("Location: receptionisthome.html");
                break;
            case 'user':
                header("Location: userhome.html");
                break;
            default:
                echo "Invalid user type.";
                break;
        }
        exit();
    } else {
        echo "Invalid username or password. Please try again.";
    }
}
?>
