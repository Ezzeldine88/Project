class Donation {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function addDonation($donorId, $amount, $date) {
        $sql = "INSERT INTO donations (donor_id, amount, donation_date) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ids", $donorId, $amount, $date);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function getAllDonations() {
        $sql = "SELECT * FROM donations";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
