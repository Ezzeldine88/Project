<?php
include 'adminModel.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root"; // Your MySQL username
    $password = ""; // Your MySQL password
    $dbname = "clinic"; // Your database name

    $model = new AdminModel($servername, $username, $password, $dbname);

    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($model->verifyAdmin($username, $password)) {
        $_SESSION['username'] = $username;
        header("Location: admindashboard.html");
        exit();
    } else {
        echo "<script>alert('Login failed wrong admin data !'); window.location.href = 'adminlogin.html';</script>";
    }

    $model->closeConnection();
}
?>
