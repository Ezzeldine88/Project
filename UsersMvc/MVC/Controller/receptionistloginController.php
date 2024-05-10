<?php
include 'receptionistlogin.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "clinic";

    $model = new ReceptionistModel($servername, $username, $password, $dbname);

    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($model->verifyReceptionist($username, $password)) {
        header("Location: receptionistdashboard.html");
        exit();
    } else {
        echo "<script>alert('Login failed, wrong receptionist data!'); window.location.href = 'receptionistlogin.html';</script>";
    }

    $model->closeConnection();
}
?>
