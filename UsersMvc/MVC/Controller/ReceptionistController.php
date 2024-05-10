<?php
include 'ReceptionistClass.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "clinic";

$model = new ReceptionistClass($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add_receptionist'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $model->addReceptionist($username, $password);
    } elseif (isset($_POST['update_receptionist'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $model->updateReceptionist($username, $password);
    } elseif (isset($_POST['delete_receptionist'])) {
        $username = $_POST['username'];
        $model->deleteReceptionist($username);
    }
}

$receptionists = $model->getAllReceptionists();
$model->closeConnection();


include 'viewReceptionists.php';
?>
