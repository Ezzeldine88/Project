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
    
    <!-- Display receptionist accounts -->
    <?php include 'controllerReceptionist.php'; ?>
    
    <form action="admindashboard.html" method="get">
        <button type="submit">Exit</button>
    </form>
</body>
</html>
