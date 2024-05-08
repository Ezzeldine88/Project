<?php
echo "Form submitted!";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']); // No need for further formatting
    $amount = floatval($_POST['amount']);
    $payment_method = htmlspecialchars($_POST['payment']);
    $message = htmlspecialchars($_POST['message']);
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "clinic";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO donations (name, email, phone, amount, payment_method, message) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssdss", $name, $email, $phone, $amount, $payment_method, $message);

    if ($stmt->execute()) {
        echo "Thank you for your donation!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
