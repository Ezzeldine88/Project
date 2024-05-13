<?php

//user
include_once "c:/xampp/htdocs/test/Model/BookAppointment.php";

$conn=new mysqli("localhost","root","","clinic");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$name = $phone = $email = $doctor = $date = $time = $payment = $message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $doctor = $_POST["doctor"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    $payment = $_POST["payment"];
    $message = $_POST["message"];

    $appointmentModel = new BookAppointment($conn);
    $result = $appointmentModel->bookAppointment($name, $phone, $email, $doctor, $date, $time, $payment, $message);

    if ($result) {
        header('Location: /test/home/home.html');
    } else {
        echo "Error: " . $conn->error;
    }
}
?>