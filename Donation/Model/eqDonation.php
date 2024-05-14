<?php
include_once 'DonationModel.php';

class EquipmentDonationModel extends DonationModel {

    public function addEquipmentDonation($data) {
        $stmt = $this->db->prepare("INSERT INTO equipment_donations (name, email, phone, equipment_type, equipment_used, amount, purchase_date, cost, made_in, message) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssssss", 
            $data['name'], 
            $data['email'], 
            $data['phone'], 
            $data['equipment_type'], 
            $data['equipment_used'], 
            $data['amount'], 
            $data['purchase_date'], 
            $data['cost'], 
            $data['made_in'], 
            $data['message']
        );
        $result = $stmt->execute();
        $stmt->close();
        return $result;
}
}
?>
