
<?php
include 'DoctorClass.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "clinic";

$model = new DoctorClass($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add_doctor'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $model->addDoctor($username, $password);
    } elseif (isset($_POST['update_doctor'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $model->updateDoctor($username, $password);
    } elseif (isset($_POST['delete_doctor'])) {
        $username = $_POST['username'];
        $model->deleteDoctor($username);
    }
}

$doctors = $model->getAllDoctors();
$model->closeConnection();

// Display doctors table
include 'viewdonations.html';
?>
