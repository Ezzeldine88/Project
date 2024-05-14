<?php
require_once "c:/xampp/htdocs/test/Model/GetAllAppointmentsModel.php"; // Include the model class

class GetAllAppointmentsController {
    private $model;

    public function __construct($conn) {
        
        $this->model = new GetAllAppointments($conn);
    }

    public function displayAllAppointments() {
        
        $appointments = $this->model->displayAllAppointment();

        
        require 'getAllAppointmentsview.php';
    }
}


$conn = new mysqli("localhost","root","","clinic");
$controller = new GetAllAppointmentsController($conn);


$controller->displayAllAppointments();


$conn->close();
?>
