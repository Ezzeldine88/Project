<?php
include 'registration_model.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = htmlspecialchars($_POST['fullname']);
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $confirm_password = htmlspecialchars($_POST['confirm_password']);

    $errors = [];

    if (empty($fullname)) {
        $errors[] = "Full name is required.";
    }

    // Other validation checks...

    if (empty($errors)) {
        $registrationModel = new RegistrationModel();
        $registration_result = $registrationModel->registerUser($fullname, $username, $email, $password);

        if ($registration_result) {
            header("Location: registration_success.php");
            exit();
        } else {
            $errors[] = "Registration failed. Please try again later.";
        }
    }
    include 'registration_view.php';
}
?>
