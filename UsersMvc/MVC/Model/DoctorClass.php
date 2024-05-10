
<?php
class DoctorClass {
    private $conn;

    public function __construct($servername, $username, $password, $dbname) {
        $this->conn = new mysqli($servername, $username, $password, $dbname);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function addDoctor($username, $password) {
        $sql = "INSERT INTO doctors (username, password) VALUES ('$username', '$password')";
        return $this->conn->query($sql);
    }

    public function updateDoctor($username, $password) {
        $sql = "UPDATE doctors SET password='$password' WHERE username='$username'";
        return $this->conn->query($sql);
    }

    public function deleteDoctor($username) {
        $sql = "DELETE FROM doctors WHERE username='$username'";
        return $this->conn->query($sql);
    }

    public function getAllDoctors() {
        $sql = "SELECT * FROM doctors";
        $result = $this->conn->query($sql);
        $doctors = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $doctors[] = $row;
            }
        }
        return $doctors;
    }

    public function closeConnection() {
        $this->conn->close();
    }
}
?>
