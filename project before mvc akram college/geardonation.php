<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize form inputs
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $gearType = htmlspecialchars($_POST['gear-type']);
    $amount = intval($_POST['amount']);
    $message = htmlspecialchars($_POST['message']);

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "clinic";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO gear_donations (name, email, phone, gear_type, amount, message) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssis", $name, $email, $phone, $gearType, $amount, $message);

    if ($stmt->execute()) {
        echo "Thank you for your donation!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
