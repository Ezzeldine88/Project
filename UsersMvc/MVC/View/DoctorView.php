
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
    
    <form action="controller.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <input type="submit" name="add_doctor" value="Add Doctor">
    </form>

    <h1>Manage Doctor Accounts</h1>
    
    <!-- Display doctors table -->
    <?php include '../Controller/DoctorController.php'; // Adjust the path as needed
 ?>
    
    <form action="admindashboard.html" method="get">
        <button type="submit">Exit</button>
    </form>
</body>
</html>
