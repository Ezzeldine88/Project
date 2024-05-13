class Donor {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function addDonor($name, $email, $phone) {
        $sql = "INSERT INTO donors (name, email, phone) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sss", $name, $email, $phone);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function getDonorById($id) {
        $sql = "SELECT * FROM donors WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}
