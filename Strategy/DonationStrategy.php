<?php

interface DonationStrategy {
    public function addDonation($name, $email, $phone, $message);
}

class CashDonation implements DonationStrategy {
    private $conn;
    private $amount;
    private $payment_method;

    public function __construct($mysqli, $amount, $payment_method) {
        $this->conn = $mysqli;
        $this->amount = $amount;
        $this->payment_method = $payment_method;
    }

    public function addDonation($name, $email, $phone, $message) {
        $stmt = $this->conn->prepare("INSERT INTO donations (name, email, phone, amount, payment_method, message) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssdss", $name, $email, $phone, $this->amount, $this->payment_method, $message);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }
}



class EquipmentDonation implements DonationStrategy {
    private $conn;
    private $equipment_type;
    private $equipment_used;
    private $amount;
    private $purchase_date;
    private $cost;
    private $made_in;

    public function __construct($mysqli, $equipment_type, $equipment_used, $amount, $purchase_date, $cost, $made_in) {
        $this->conn = $mysqli;
        $this->equipment_type = $equipment_type;
        $this->equipment_used = $equipment_used;
        $this->amount = $amount;
        $this->purchase_date = $purchase_date;
        $this->cost = $cost;
        $this->made_in = $made_in;
    }

    public function addDonation($name, $email, $phone, $message) {
        $sql = "INSERT INTO equipment_donations (name, email, phone, equipment_type, equipment_used, amount, purchase_date, cost, made_in, message) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssssdssss", $name, $email, $phone, $this->equipment_type, $this->equipment_used, $this->amount, $this->purchase_date, $this->cost, $this->made_in, $message);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }
}

class GearDonation implements DonationStrategy {
    private $conn;
    private $gearType;
    private $amount;

    public function __construct($mysqli, $gearType, $amount) {
        $this->conn = $mysqli;
        $this->gearType = $gearType;
        $this->amount = $amount;
    }

    public function addDonation($name, $email, $phone, $message) {
        $sql = "INSERT INTO gear_donations (name, email, phone, gear_type, amount, message) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssssds", $name, $email, $phone, $this->gearType, $this->amount, $message);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }
}


class DonationModel {
    private $strategy;


    //public void setAttendenceWay(IAttendance ref)
    public function setStrategy(DonationStrategy $strategy) {
        $this->strategy = $strategy;
        
    }

    public function addDonation($name, $email, $phone, $message) {
        return $this->strategy->addDonation($name, $email, $phone, $message);
    }
}


?>

