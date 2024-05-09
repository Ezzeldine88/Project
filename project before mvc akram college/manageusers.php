<?php
session_start();

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "clinic";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_user'])) {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // el goz2 da ma3mool 3shan el password teb2a hashed fel data  base zeyadet security msh aktr 
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO registration (fullname, username, email, password) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $fullname, $username, $email, $hashed_password);

    if ($stmt->execute()) {
        echo "<script>alert('User added successfully!');</script>";
    } else {
        echo "<script>alert('Error adding user: " . $conn->error . "');</script>";
    }
}

$sql = "SELECT * FROM registration";
$result = $conn->query($sql);

// UPDATE operation
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_user'])) {
    $id = $_POST['id'];
    $newFullname = $_POST['new_fullname'];
    $newUsername = $_POST['new_username'];
    $newEmail = $_POST['new_email'];
    $newPassword = $_POST['new_password'];

    $hashed_password = password_hash($newPassword, PASSWORD_DEFAULT);

    $sql = "UPDATE registration SET fullname=?, username=?, email=?, password=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $newFullname, $newUsername, $newEmail, $hashed_password, $id);

    if ($stmt->execute()) {
        echo "<script>alert('User updated successfully!');</script>";
    } else {
        echo "<script>alert('Error updating user: " . $conn->error . "');</script>";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_user'])) {
    $email = $_POST['email'];

    $sql = "DELETE FROM registration WHERE email=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);

    if ($stmt->execute()) {
        echo "<script>alert('User deleted successfully!');</script>";
    } else {
        echo "<script>alert('Error deleting user: " . $conn->error . "');</script>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <link rel="stylesheet" href="viewdonations.css"> 
    <style>
        .container {
            width: 100%; 
            margin: 0 auto; 
            overflow-x: auto;
        }
    
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["fullname"] . "</td>";
                    echo "<td>" . $row["username"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["password"] . "</td>";
                    echo "<td>
                            <form action='' method='post'>
                                <input type='text' name='new_fullname' placeholder='New Full Name' required>
                                <input type='text' name='new_username' placeholder='New Username' required>
                                <input type='email' name='new_email' placeholder='New Email' required>
                                <input type='password' name='new_password' placeholder='New Password' required>
                                <button type='submit' name='update_user'>Update</button>
                            </form>
                            <form action='' method='post'>
                            <input type='hidden' name='email' value='" . $row["email"] . "'>
                            <button type='submit' name='delete_user'>Delete</button>
                            </form>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No users found</td></tr>";
            }
            ?>
        </table>
    </div>
    <form action="admindashboard.html" method="get">
            <button type="submit">Exit</button>
        </form>
</body>
</html>
