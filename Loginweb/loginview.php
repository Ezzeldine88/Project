<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login menu</title>
    <link rel="stylesheet" href="registration.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>
<body style="background-image: url('register.jpeg'); background-repeat: no-repeat; background-size: cover;">
    <div class="wrapper">
        <form action="loginController.php" method="post">
            <h1>Login</h1>

            <label for="user_type">Select user type:</label>
            <select name="user_type" id="user_type">
                <option value="receptionist">Receptionist</option>
                <option value="doctor">Doctor</option>
                <option value="user">User</option>
                <option value="admin">Admin</option> <!-- Corrected option value -->
            </select>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Login"> <!-- Changed input type to submit -->
            <p>Don't have an account? <a href="registration.html">Sign up</a></p>
            <a href="#">Forgot your password?</a>
        </form>
    </div>
</body>
</html>
