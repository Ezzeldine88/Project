<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Make an Appointment</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet"href="appointment.css">
    <script>
        function validateForm() {
            var inputs = document.getElementsByTagName('input');
            for (var i = 0; i < inputs.length; i++) {
                if (inputs[i].value == '') {
                    alert('Please fill all the fields');
                    return false;
                }
            }
            var textarea = document.getElementsByTagName('textarea')[0];
            if (textarea.value == '') {
                alert('Please fill all the fields');
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <div class="container">
        <h2>Make an Appointment</h2>
        <form action="../Controller/BookAppointment.php" method="post" onsubmit="return validateForm()">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input type="text" name="phone" class="form-control">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label>Doctor</label>
                <select name="doctor" class="form-control">
                    <?php
                    $servername = "localhost";
                    $username = "root"; 
                    $password = ""; 
                    $dbname = "clinic";

                    $conn = new mysqli($servername, $username, $password, $dbname);

                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $sql = "SELECT * FROM doctors";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row["Name"] . "'>" . $row["Name"] . "</option>";
                        }
                    } else {
                        echo "<option value=''>No doctors available</option>";
                    }

                    $conn->close();
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label>Date</label>
                <input type="date" name="date" class="form-control">
            </div>
            <div class="form-group">
                <label>Time</label>
                <input type="time" name="time" class="form-control">
            </div>
            <div class="form-group">
                <label>Payment Method</label>
                <select name="payment" class="form-control">
                    <option value="">Select Payment Method</option>
                    <option value="Cash">Cash</option>
                    <option value="Visa">Visa</option>
                    <option value="Insurance">Insurance</option>
                </select>
            </div>
            <div class="form-group">
                <label>Message</label>
                <textarea name="message" class="form-control"></textarea>
            </div>
            <input type="submit" class="btn btn-primary" value="Submit">
        </form>
    </div>
</body>
</html>
