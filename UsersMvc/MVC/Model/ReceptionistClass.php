<?php
class ReceptionistClass {
    private $conn;

    public function __construct($servername, $username, $password, $dbname) {
        $this->conn = new mysqli($servername, $username, $password, $dbname);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function addReceptionist($username, $password) {
        $sql = "INSERT INTO receptionists (username, password) 
                VALUES ('$username', '$password')";
        return $this->conn->query($sql);
    }

    public function updateReceptionist($username, $password) {
        $sql = "UPDATE receptionists SET password='$password' WHERE username='$username'";
        return $this->conn->query($sql);
    }

    public function deleteReceptionist($username) {
        $sql = "DELETE FROM receptionists WHERE username='$username'";
        return $this->conn->query($sql);
    }

    public function getAllReceptionists() {
        $sql = "SELECT * FROM receptionists";
        $result = $this->conn->query($sql);
        $receptionists = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $receptionists[] = $row;
            }
        }
        return $receptionists;
    }

    public function closeConnection() {
        $this->conn->close();
    }
}
?>
