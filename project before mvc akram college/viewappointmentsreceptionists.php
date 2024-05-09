<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>receptionists Dashboard</title>
    <link rel="stylesheet" href="viewdonations.css">
    <style>
        .container {
            width: 90%; 
            margin: 0 auto; 
            overflow-x: auto; 
        }
    </style>
</head>
<body>
    <div class="header">
        receptionists Page Dashboard
    </div>
    <div class="container">
        <h2>Appointments</h2>
        <form action="" method="post">
            <table>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Doctor</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Payment</th>
                    <th>Message</th>
                    <th>Action</th>
                </tr>
                <tr>
                    <td><input type="text" name="name"></td>
                    <td><input type="email" name="email"></td>
                    <td><input type="text" name="phone"></td>
                    <td><input type="text" name="doctor"></td>
                    <td><input type="date" name="date"></td>
                    <td><input type="time" name="time"></td>
                    <td><input type="text" name="payment"></td>
                    <td><input type="text" name="message"></td>
                    <td><button type="submit" name="create_appointment">Create</button></td>
                </tr>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "clinic";

                $conn = new mysqli($servername, $username, $password, $database);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                function sanitize_input($conn, $data) {
                    return htmlspecialchars(mysqli_real_escape_string($conn, $data));
                }

                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['create_appointment'])) {
                    $name = sanitize_input($conn, $_POST['name']);
                    $email = sanitize_input($conn, $_POST['email']);
                    $phone = sanitize_input($conn, $_POST['phone']);
                    $doctor = sanitize_input($conn, $_POST['doctor']);
                    $date = sanitize_input($conn, $_POST['date']);
                    $time = sanitize_input($conn, $_POST['time']);
                    $payment = sanitize_input($conn, $_POST['payment']);
                    $message = sanitize_input($conn, $_POST['message']);

                    $stmt = $conn->prepare("INSERT INTO appointments (name, email, phone, doctor, date, time, payment, message) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
                    $stmt->bind_param("ssssssss", $name, $email, $phone, $doctor, $date, $time, $payment, $message);

                    if ($stmt->execute()) {
                        echo "<tr><td colspan='9'>Appointment created successfully.</td></tr>";
                    } else {
                        echo "<tr><td colspan='9'>Error creating appointment: " . $conn->error . "</td></tr>";
                    }

                    $stmt->close();
                }

                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_appointment'])) {
                    $id = $_POST['id'];
                    $date = sanitize_input($conn, $_POST['date']);
                    $time = sanitize_input($conn, $_POST['time']);
                    $doctor = sanitize_input($conn, $_POST['doctor']);

                    $stmt = $conn->prepare("UPDATE appointments SET date=?, time=?, doctor=? WHERE id=?");
                    $stmt->bind_param("sssi", $date, $time, $doctor, $id);

                    if ($stmt->execute()) {
                        echo "<tr><td colspan='9'>Appointment updated successfully.</td></tr>";
                    } else {
                        echo "<tr><td colspan='9'>Error updating appointment: " . $conn->error . "</td></tr>";
                    }

                    $stmt->close();
                }

                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_appointment'])) {
                    $email = sanitize_input($conn, $_POST['email']);

                    $stmt = $conn->prepare("DELETE FROM appointments WHERE email=?");
                    $stmt->bind_param("s", $email);

                    if ($stmt->execute()) {
                        echo "<tr><td colspan='9'>Appointment deleted successfully.</td></tr>";
                    } else {
                        echo "<tr><td colspan='9'>Error deleting appointment: " . $conn->error . "</td></tr>";
                    }

                    $stmt->close();
                }

                $sql = "SELECT * FROM appointments";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td>" . $row["phone"] . "</td>";
                        echo "<td>" . $row["doctor"] . "</td>";
                        echo "<td>" . $row["date"] . "</td>";
                        echo "<td>" . $row["time"] . "</td>";
                        echo "<td>" . $row["payment"] . "</td>";
                        echo "<td>" . $row["message"] . "</td>";
                        echo "<td>
                                <form action='' method='post'>
                                    <input type='hidden' name='id' value='" . $row["id"] . "'>
                                    <input type='text' name='doctor' value='" . $row["doctor"] . "'>
                                    <input type='text' name='date' value='" . $row["date"] . "'>
                                    <input type='text' name='time' value='" . $row["time"] . "'>
                                    <button type='submit' name='update_appointment'>Update</button>
                                </form>
                              </td>";
                        echo "<td>
                                <form action='' method='post'>
                                    <input type='hidden' name='email' value='" . $row["email"] . "'>
                                    <button type='submit' name='delete_appointment'>Delete</button>
                                </form>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='9'>No appointments found</td></tr>";
                }

                $conn->close();
                ?>
            </table>
        </form>
        <form action="admindashboard.html" method="get">
            <button type="submit">Exit</button>
        </form>
    </div>
</body>
</html>
