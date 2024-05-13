<?php
class RegistrationModel {
    private $servername = "localhost";
    private $username_db = "root";
    private $password_db = "";
    private $database = "clinic";
    private $conn;

    function __construct() {
        $this->conn = new mysqli($this->servername, $this->username_db, $this->password_db, $this->database);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    function registerUser($fullname, $username, $email, $password) {
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->conn->prepare("INSERT INTO registration (fullname, username, email, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $fullname, $username, $email, $password_hash);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
        $stmt->close();
    }

    function __destruct() {
        $this->conn->close();
    }
}
?>
