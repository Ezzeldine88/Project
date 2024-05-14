<?php
include_once 'model/EquipmentDonationModel.php';

class EquipmentDonationController {
    private $model;

    public function __construct() {
        $this->model = new EquipmentDonationModel();
    }

    public function handleDonation() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $data = [
                'name' => htmlspecialchars($_POST['name']),
                'email' => htmlspecialchars($_POST['email']),
                'phone' => htmlspecialchars($_POST['phone']),
                'equipment_type' => htmlspecialchars($_POST['equipment-type']),
                'equipment_used' => htmlspecialchars($_POST['equipment-used']),
                'amount' => intval($_POST['amount']),
                'purchase_date' => htmlspecialchars($_POST['purchase-date']),
                'cost' => floatval($_POST['cost']),
                'made_in' => htmlspecialchars($_POST['made-in']),
                'message' => htmlspecialchars($_POST['message'])
            ];

            $result = $this->model->addEquipmentDonation($data);
            echo $result ? "Thank you for your equipment donation!" : "Error: Something went wrong.";
        } else {
            include 'view/equipmentDonationView.php';
    }
}
}
?>
