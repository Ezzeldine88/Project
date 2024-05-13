<?php
require_once "c:/xampp/htdocs/test/Model/GetAllAppointmentsModel.php"; // Include the model class

class GetAllAppointmentsController {
    private $model;

    public function __construct($conn) {
        // Create an instance of the model
        $this->model = new GetAllAppointments($conn);
    }

    public function displayAllAppointments() {
        // Call the method in the model to fetch all appointments
        $appointments = $this->model->displayAllAppointment();

        // Include the view file and pass appointments data
        require 'getAllAppointmentsview.php'; // Replace 'your_html_view_file.php' with the actual file name of your HTML view
    }
}

// Example usage:

// Create a new instance of the controller and pass the database connection
$conn = new mysqli("localhost","root","","clinic");
$controller = new GetAllAppointmentsController($conn);

// Call the method to display all appointments
$controller->displayAllAppointments();

// Close the database connection
$conn->close();
?>
