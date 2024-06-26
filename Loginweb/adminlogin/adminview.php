<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="registration.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>
<body style="background-image: url('register.jpeg'); background-repeat: no-repeat; background-size: cover;">
    <div class="wrapper">
        <form action="adminController.php" method="post">
            <h1>Admin Login</h1>
            <div class="input-box">
                <div class="input-field">
                    <input type="text" name="username" placeholder="Username" required>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-field">
                    <input type="password" name="password" placeholder="Password" required>
                    <i class='bx bxs-lock-alt' ></i>
                </div>
                <label>
                    <input type="checkbox"> Remember username
                </label>
                <button type="submit" class="btn">Sign In</button>
                <p>Don't have an account? <a href="registration.html">Sign up</a></p>
                <a href="#">Forgot your password?</a>
            </div>
        </form>
    </div>
</body>
</html>
