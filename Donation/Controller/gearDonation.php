<?php
include_once 'model/GearDonationModel.php';

class GearDonationController {
    private $model;

    public function __construct() {
        $this->model = new GearDonationModel();
    }

    public function handleDonation() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $data = [
                'name' => htmlspecialchars($_POST['name']),
                'email' => htmlspecialchars($_POST['email']),
                'phone' => htmlspecialchars($_POST['phone']),
                'gear_type' => htmlspecialchars($_POST['gear-type']),
                'amount' => intval($_POST['amount']),
                'message' => htmlspecialchars($_POST['message'])
            ];

            $result = $this->model->addGearDonation($data);
            echo $result ? "Thank you for your donation!" : "Error: Something went wrong.";
        } else {
            include 'view/gearDonationView.php';
    }
}
}
?>
