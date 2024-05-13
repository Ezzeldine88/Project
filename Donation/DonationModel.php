class DonationModel {
    private $conn;

    public function __construct($mysqli) {
        $this->conn = $mysqli;
    }

    public function addCashDonation($name, $email, $phone, $amount, $payment_method, $message) {
        $stmt = $this->conn->prepare("INSERT INTO donations (name, email, phone, amount, payment_method, message) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssdss", $name, $email, $phone, $amount, $payment_method, $message);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }
}


public function addEquipmentDonation($name, $email, $phone, $equipment_type, $equipment_used, $amount, $purchase_date, $cost, $made_in, $message) {
    $sql = "INSERT INTO equipment_donations (name, email, phone, equipment_type, equipment_used, amount, purchase_date, cost, made_in, message) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("sssssdssss", $name, $email, $phone, $equipment_type, $equipment_used, $amount, $purchase_date, $cost, $made_in, $message);
    $result = $stmt->execute();
    $stmt->close();
    return $result;
}


public function addGearDonation($name, $email, $phone, $gearType, $amount, $message) {
    $sql = "INSERT INTO gear_donations (name, email, phone, gear_type, amount, message) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("ssssds", $name, $email, $phone, $gearType, $amount, $message);
    $result = $stmt->execute();
    $stmt->close();
    return $result;
}
