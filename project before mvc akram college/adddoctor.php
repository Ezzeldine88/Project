<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="viewdonations.css">
</head>
<body>
    <h1>Add Doctor Account</h1>
    
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <input type="submit" name="add_doctor" value="Add Doctor">
    </form>

    <h1>Manage Doctor Accounts</h1>
    
    <?php
    // Establish a connection to your MySQL database
    $servername = "localhost";
    $username = "root"; // Change this to your MySQL username
    $password = ""; // Change this to your MySQL password
    $dbname = "clinic"; // Change this to your database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Handle CRUD operations
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Add Doctor Account
        if (isset($_POST['add_doctor'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $sql = "INSERT INTO doctors (username, password) 
                    VALUES ('$username', '$password')";

            if ($conn->query($sql) === TRUE) {
                echo "Doctor account added successfully.";
            } else {
                echo "Error adding doctor account: " . $conn->error;
            }
        }
        // Update Doctor Account
        elseif (isset($_POST['update_doctor'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $sql = "UPDATE doctors SET password='$password' WHERE username='$username'";

            if ($conn->query($sql) === TRUE) {
                echo "Doctor account updated successfully.";
            } else {
                echo "Error updating doctor account: " . $conn->error;
            }
        }
        // Delete Doctor Account
        elseif (isset($_POST['delete_doctor'])) {
            $username = $_POST['username'];

            $sql = "DELETE FROM doctors WHERE username='$username'";

            if ($conn->query($sql) === TRUE) {
                echo "Doctor account deleted successfully.";
            } else {
                echo "Error deleting doctor account: " . $conn->error;
            }
        }
    }

    // Retrieve doctor accounts from the database
    $sql = "SELECT * FROM doctors";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Display doctor accounts in a table
        echo "<table>";
        echo "<tr><th>Username</th><th>Password</th><th>Actions</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['username'] . "</td>";
            echo "<td>" . $row['password'] . "</td>";
            // Form for updating doctor account
            echo "<td><form action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method='post'>";
            echo "<input type='hidden' name='username' value='" . $row['username'] . "'>";
            echo "<input type='password' name='password' value='" . $row['password'] . "' required>";
            echo "<input type='submit' name='update_doctor' value='Update'>";
            echo "</form></td>";
            // Form for deleting doctor account
            echo "<td><form action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method='post'>";
            echo "<input type='hidden' name='username' value='" . $row['username'] . "'>";
            echo "<input type='submit' name='delete_doctor' value='Delete'>";
            echo "</form></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No doctor accounts found.";
    }

    $conn->close();
    ?>
     <form action="admindashboard.html" method="get">
        <button type="submit">Exit</button>
    </form>
</body>
</html>
