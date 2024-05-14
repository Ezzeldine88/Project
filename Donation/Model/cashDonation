<?php
include_once 'DonationModel.php';

class CashDonationModel extends DonationModel {

    public function addCashDonation($data) {
        $stmt = $this->db->prepare("INSERT INTO donations (name, email, phone, amount, payment_method, message) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssdss", 
            $data['name'], 
            $data['email'], 
            $data['phone'], 
            $data['amount'], 
            $data['payment_method'], 
            $data['message']
        );
        $result = $stmt->execute();
        $stmt->close();
        return $result;
}
}
?>
