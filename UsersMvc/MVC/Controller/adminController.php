<?php
include 'adminModel.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "clinic";

    $model = new AdminClass($servername, $username, $password, $dbname);

    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($model->verifyAdmin($username, $password)) {
        header("Location: admindashboard.html");
        exit();
    } else {
        echo "<script>alert('Login failed wrong admin data !'); window.location.href = 'adminlogin.html';</script>";
    }

    $model->closeConnection();
}
?>
