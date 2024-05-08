<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment</title>
    <link rel="stylesheet" href="appointment.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <script>
        function submitForm() {
            event.preventDefault();
            
            var formData = new FormData(document.getElementById("appointmentForm"));

            // Make AJAX request to submit form data  taken from outsource so i dont know whats written 
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        alert("Appointment booked successfully!");
                        redirectToHomePage();
                    } else {
                        alert("Error occurred. Please try again later.");
                    }
                }
            };
            xhr.open("POST", "appointments.php", true);
            xhr.send(formData);
        }

        function redirectToHomePage() {
            window.location.href = "home2.html";
        }
    </script>
    
</head>
<body style="background-image: url('appointment3.jpg'); background-repeat: no-repeat; background-size: cover;">
    <div class="container">
        <h2>Book Appointment</h2>
        <form id="appointmentForm" onsubmit="submitForm()">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <i class='bx bxs-envelope'></i>
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="tel" id="phone" name="phone" required>
                <i class='bx bxs-phone' ></i>
            </div>
            <div class="form-group">
                <label for="doctor">Choose Doctor:</label>
                <select id="doctor" name="doctor" required>
                    <option value="">Select Doctor</option>
                    <?php
                    $servername = "localhost";
                    $username = "root"; 
                    $password = ""; 
                    $dbname = "clinic";

                    $conn = new mysqli($servername, $username, $password, $dbname);

                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $sql = "SELECT username FROM doctors";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['username'] . "'>" . $row['username'] . "</option>";
                        }
                    } else {
                        echo "<option value=''>No doctors available</option>";
                    }

                    $conn->close();
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" id="date" name="date" required>
            </div>
            <div class="form-group">
                <label for="time">Time:</label>
                <input type="time" id="time" name="time" required>
            </div>
            <div class="form-group">
                <label for="payment">Payment method:</label>
                <select id="payment" name="payment" required>
                    <option value="">Select Payment method</option>
                    <option value="Cash">Cash</option>
                    <option value="Credit Card">Credit Card - SUSPENDED</option>
                    <option value="Insurance">Insurance</option>
                </select>
            </div>
            <div class="form-group">
                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="4"></textarea>
            </div>
            <div class="form-group">
                <button type="submit">Book Appointment</button>
            </div>
        </form>
    </div>
</body>
</html>
