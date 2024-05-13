<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap">
    <link rel="stylesheet" href="registration.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>
<body>
    <div class="wrapper">
        <form action="register.php" method="post">
            <h1>Registration</h1>

            <div class="input-box">
                <div class="input-field">
                    <input type="text" name="fullname" placeholder="Full name" required>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-field">
                    <input type="text" name="username" placeholder="User name" required>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-field">
                    <input type="email" name="email" placeholder="Email" required>
                    <i class='bx bxs-envelope' ></i>
                </div>
               
                <div class="input-field">
                    <input type="password" name="password" placeholder="Password" required>
                    <i class='bx bxs-lock-alt' ></i>
                </div>
                <div class="input-field">
                    <input type="password" name="confirm_password" placeholder="Confirm password" required>
                    <i class='bx bxs-lock-alt' ></i>
                </div>
                <label>
                    <input type="checkbox" required>I agree to the Terms & Conditions. and have read the Privacy Policy
                </label>
                <button type="submit" class="btn">Register</button>
                <p>Already have an account?</p>
                <a href="login.html">Sign in</a>
            </div>
        </form>
    </div>
</body>
</html>
