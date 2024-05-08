<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="viewdonations.css">
</head>
<body>
    <h1>Add Receptionist Account</h1>
    
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <input type="submit" name="add_receptionist" value="Add Receptionist">
    </form>

    <h1>Manage Receptionist Accounts</h1>
    
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
        // Add Receptionist Account
        if (isset($_POST['add_receptionist'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $sql = "INSERT INTO receptionists (username, password) 
                    VALUES ('$username', '$password')";

            if ($conn->query($sql) === TRUE) {
                echo "Receptionist account added successfully.";
            } else {
                echo "Error adding receptionist account: " . $conn->error;
            }
        }
        // Update Receptionist Account
        elseif (isset($_POST['update_receptionist'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $sql = "UPDATE receptionists SET password='$password' WHERE username='$username'";

            if ($conn->query($sql) === TRUE) {
                echo "Receptionist account updated successfully.";
            } else {
                echo "Error updating receptionist account: " . $conn->error;
            }
        }
        // Delete Receptionist Account
        elseif (isset($_POST['delete_receptionist'])) {
            $username = $_POST['username'];

            $sql = "DELETE FROM receptionists WHERE username='$username'";

            if ($conn->query($sql) === TRUE) {
                echo "Receptionist account deleted successfully.";
            } else {
                echo "Error deleting receptionist account: " . $conn->error;
            }
        }
    }

    // Retrieve receptionist accounts from the database
    $sql = "SELECT * FROM receptionists";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Display receptionist accounts in a table
        echo "<table>";
        echo "<tr><th>Username</th><th>Password</th><th>Actions</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['username'] . "</td>";
            echo "<td>" . $row['password'] . "</td>";
            // Form for updating receptionist account
            echo "<td><form action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method='post'>";
            echo "<input type='hidden' name='username' value='" . $row['username'] . "'>";
            echo "<input type='password' name='password' value='" . $row['password'] . "' required>";
            echo "<input type='submit' name='update_receptionist' value='Update'>";
            echo "</form></td>";
            // Form for deleting receptionist account
            echo "<td><form action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method='post'>";
            echo "<input type='hidden' name='username' value='" . $row['username'] . "'>";
            echo "<input type='submit' name='delete_receptionist' value='Delete'>";
            echo "</form></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No receptionist accounts found.";
    }

    $conn->close();
    ?>
    <form action="admindashboard.html" method="get">
        <button type="submit">Exit</button>
    </form>
</body>
</html>
