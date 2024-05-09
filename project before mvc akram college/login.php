<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "clinic";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT username, password FROM registration WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch the row
        $row = $result->fetch_assoc();
        $hashed_password = $row['password'];

        if (password_verify($password, $hashed_password)) {
            echo "Login successful!";
            $_SESSION['username'] = $row['username'];
            header("Location:home2.html");
            exit();
        } else {
            echo "Invalid username or password. Please try again.";
        }
    } else {
        echo "Invalid username or password. Please try again.";
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
}
?>
