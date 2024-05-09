<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Dashboard</title>
    <link rel="stylesheet" href="viewdonations.css">
</head>
<body>
    <h1>patient records</h1>
    
    <?php
   
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "clinic";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['add_record'])) {
            $patient_name = $_POST['patient_name'];
            $age = $_POST['age'];
            $gender = $_POST['gender'];
            $diagnosis = $_POST['diagnosis'];
            $treatment = $_POST['treatment'];

            $sql = "INSERT INTO patient_records (patient_name, age, gender, diagnosis, treatment) 
                    VALUES ('$patient_name', '$age', '$gender', '$diagnosis', '$treatment')";

            if ($conn->query($sql) === TRUE) {
                echo "New record added successfully.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        elseif (isset($_POST['update_record'])) {
            $id = $_POST['record_id'];
            $patient_name = $_POST['patient_name'];
            $age = $_POST['age'];
            $gender = $_POST['gender'];
            $diagnosis = $_POST['diagnosis'];
            $treatment = $_POST['treatment'];

            $sql = "UPDATE patient_records SET patient_name='$patient_name', age='$age', gender='$gender', 
                    diagnosis='$diagnosis', treatment='$treatment' WHERE id='$id'";

            if ($conn->query($sql) === TRUE) {
                echo "Record updated successfully.";
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }
        elseif (isset($_POST['delete_record'])) {
            $id = $_POST['record_id'];

            $sql = "DELETE FROM patient_records WHERE id='$id'";

            if ($conn->query($sql) === TRUE) {
                echo "Record deleted successfully.";
            } else {
                echo "Error deleting record: " . $conn->error;
            }
        }
    }

    $sql = "SELECT * FROM patient_records";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Patient Name</th><th>Age</th><th>Gender</th><th>Diagnosis</th><th>Treatment</th><th>Created At</th><th>Actions</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['patient_name'] . "</td>";
            echo "<td>" . $row['age'] . "</td>";
            echo "<td>" . $row['gender'] . "</td>";
            echo "<td>" . $row['diagnosis'] . "</td>";
            echo "<td>" . $row['treatment'] . "</td>";
            echo "<td>" . $row['created_at'] . "</td>";
            echo "<td><form action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method='post'>";
            echo "<input type='hidden' name='record_id' value='" . $row['id'] . "'>";
            echo "<input type='text' name='patient_name' value='" . $row['patient_name'] . "' required>";
            echo "<input type='number' name='age' value='" . $row['age'] . "'>";
            echo "<input type='text' name='gender' value='" . $row['gender'] . "'>";
            echo "<input type='text' name='diagnosis' value='" . $row['diagnosis'] . "'>";
            echo "<input type='text' name='treatment' value='" . $row['treatment'] . "'>";
            echo "<input type='submit' name='update_record' value='Update'>";
            echo "</form></td>";
            echo "<td><form action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method='post'>";
            echo "<input type='hidden' name='record_id' value='" . $row['id'] . "'>";
            echo "<input type='submit' name='delete_record' value='Delete'>";
            echo "</form></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No patient records found.";
    }

    $conn->close();
    ?>

    <h2>Add New Patient Record</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="patient_name">Patient Name:</label>
        <input type="text" id="patient_name" name="patient_name" required>
        <label for="age">Age:</label>
        <input type="number" id="age" name="age">
        <label for="gender">Gender:</label>
        <input type="text" id="gender" name="gender">
        <label for="diagnosis">Diagnosis:</label>
        <input type="text" id="diagnosis" name="diagnosis">
        <label for="treatment">Treatment:</label>
        <input type="text" id="treatment" name="treatment">
        <input type="submit" name="add_record" value="Add Record">
    </form>

    <form action="doctordashboard.html" method="get">
        <button type="submit">Exit</button>
    </form>
</body>
</html>
