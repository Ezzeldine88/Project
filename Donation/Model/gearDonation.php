<?php
include_once 'DonationModel.php';

class GearDonationModel extends DonationModel {

    public function addGearDonation($data) {
        $stmt = $this->db->prepare("INSERT INTO gear_donations (name, email, phone, gear_type, amount, message) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssis", 
            $data['name'], 
            $data['email'], 
            $data['phone'], 
            $data['gear_type'], 
            $data['amount'], 
            $data['message']
        );
        $result = $stmt->execute();
        $stmt->close();
        return $result;
}
}
?>
