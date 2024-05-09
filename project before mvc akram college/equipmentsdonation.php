<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize form inputs
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $equipment_type = htmlspecialchars($_POST['equipment-type']);
    $equipment_used = htmlspecialchars($_POST['equipment-used']);
    $amount = intval($_POST['amount']);
    $purchase_date = htmlspecialchars($_POST['purchase-date']);
    $cost = floatval($_POST['cost']);
    $made_in = htmlspecialchars($_POST['made-in']);
    $message = htmlspecialchars($_POST['message']);

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "clinic";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO equipment_donations (name, email, phone, equipment_type, equipment_used, amount, purchase_date, cost, made_in, message) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssss", $name, $email, $phone, $equipment_type, $equipment_used, $amount, $purchase_date, $cost, $made_in, $message);

    if ($stmt->execute()) {
        echo "Thank you for your equipment donation!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
