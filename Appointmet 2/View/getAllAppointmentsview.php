<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Dashboard</title>
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
        Doctor Page Dashboard
    </div>
    <div class="container">
        <h2>Appointments</h2>
        <form action="../Controller/BookAppointment.php" method="post">
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
            </table>
        </form>
        
        <!-- Appointments Table -->
        <h2>Existing Appointments</h2>
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
                <th>Action</th>
            </tr>
            <?php
            
            // PHP code for fetching and displaying appointments
            if (!empty($appointments)) {
                foreach ($appointments as $appointment) {
                    echo "<tr>";
                    echo "<td>" . $appointment["name"] . "</td>";
                    echo "<td>" . $appointment["email"] . "</td>";
                    echo "<td>" . $appointment["phone"] . "</td>";
                    echo "<td>" . $appointment["doctor"] . "</td>";
                    echo "<td>" . $appointment["date"] . "</td>";
                    echo "<td>" . $appointment["time"] . "</td>";
                    echo "<td>" . $appointment["payment"] . "</td>";
                    echo "<td>" . $appointment["message"] . "</td>";
                    echo "<td>
                        <form action='' method='post'>
                            <input type='hidden' name='id' value='" . $appointment["id"] . "'>
                            <input type='text' name='doctor' value='" . $appointment["doctor"] . "'>
                            <input type='text' name='date' value='" . $appointment["date"] . "'>
                            <input type='text' name='time' value='" . $appointment["time"] . "'>
                            <button type='submit' name='update_appointment'>Update</button>
                        </form>
                    </td>";
                    echo "<td>
                        <form action='' method='post'>
                            <input type='hidden' name='email' value='" . $appointment["email"] . "'>
                            <button type='submit' name='delete_appointment'>Delete</button>
                        </form>
                    </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='9'>No appointments found</td></tr>";
            }
           
            
            ?>
        </table>
        
        <!-- Exit Button -->
        <form action="doctordashboard.html" method="get">
            <button type="submit">Exit</button>
        </form>
    </div>
</body>
</html>
