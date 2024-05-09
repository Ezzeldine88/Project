<?php
class AppointmentModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function addAppointment($name, $phone, $email, $doctor, $date, $time, $payment, $message) {
        $sql = "INSERT INTO appointment (name, Phone, email, doctor, date, time, payment, message) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        if ($stmt = $this->conn->prepare($sql)) {
            $stmt->bind_param("ssssssss", $name, $phone, $email, $doctor, $date, $time, $payment, $message);
            if ($stmt->execute()) {
                return true;
            }
        }
        return false;
    }
}
?>
