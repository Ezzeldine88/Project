<?php
include_once 'model/CashDonationModel.php';

class CashDonationController {
    private $model;

    public function __construct() {
        $this->model = new CashDonationModel();
    }

    public function handleDonation() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $data = [
                'name' => htmlspecialchars($_POST['name']),
                'email' => htmlspecialchars($_POST['email']),
                'phone' => htmlspecialchars($_POST['phone']),
                'amount' => floatval($_POST['amount']),
                'payment_method' => htmlspecialchars($_POST['payment']),
                'message' => htmlspecialchars($_POST['message'])
            ];

            $result = $this->model->addCashDonation($data);
            echo $result ? "Thank you for your donation!" : "Error: Something went wrong.";
        } else {
            include 'view/cashDonationView.php';
    }
}
}
?>
