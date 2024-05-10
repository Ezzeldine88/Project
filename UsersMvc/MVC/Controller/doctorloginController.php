<?php
include 'doctorlogin.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "clinic";

    $model = new DoctorModel($servername, $username, $password, $dbname);

    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($model->verifyDoctor($username, $password)) {
        header("Location: doctordashboard.html");
        exit();
    } else {
        echo "<script>alert('Login failed, wrong doctor data!'); window.location.href = 'doctorlogin.html';</script>";
    }

    $model->closeConnection();
}
?>
