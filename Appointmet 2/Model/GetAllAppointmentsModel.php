<?php
require_once 'getAllAppointmentCont.php';

$conn = new mysqli("localhost","root","","clinic");
class GetAllAppointments {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }
        
        public function displayAllAppointment() {
            $sql = "SELECT * FROM appointment";
            $result = $this->conn->query($sql);
            
            if ($result->num_rows > 0) {
                $appointments = array();
                while($row = $result->fetch_assoc()) {
                    $appointments[] = $row;
                }
                return $appointments;
            } else {
                return [];
            }
        }
    
}
?>
