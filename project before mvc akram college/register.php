<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize form inputs
    $fullname = htmlspecialchars($_POST['fullname']);
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $confirm_password = htmlspecialchars($_POST['confirm_password']);

    $errors = [];

    if (empty($fullname)) {
        $errors[] = "Full name is required.";
    }

    if (empty($username)) {
        $errors[] = "Username is required.";
    } elseif (!preg_match("/^[a-zA-Z0-9_]+$/", $username)) {
        $errors[] = "Username can only contain letters, numbers, and underscores.";
    }

    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    if (empty($password)) {
        $errors[] = "Password is required.";
    } elseif (strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters long.";
    }

    if ($password !== $confirm_password) {
        $errors[] = "Passwords do not match.";
    }

    if (empty($errors)) {
        $servername = "localhost";
        $username_db = "root";
        $password_db = "";
        $database = "clinic";

        $conn = new mysqli($servername, $username_db, $password_db, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Hash the password for security bs law 3aizin neshelha mashy 3shan shaklaha sa3b fel database 
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO registration (fullname, username, email, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $fullname, $username, $email, $password_hash);

        if ($stmt->execute()) {
            header("Location:login.html");

            echo "Registration successful. You can now log in.";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    } else {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
}
?>
