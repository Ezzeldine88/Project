<?php
include 'DonationModel.php';
include 'DonationStrategy.php';
include 'CashDonation.php';
include 'EquipmentDonation.php';
include 'GearDonation.php';

$conn = new mysqli("localhost", "root", "", "clinic");  

$donationModel = new DonationModel();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   
    switch ($_POST['donation_type']) {
        case 'cash':
            $donationModel->setStrategy(new CashDonation($conn, $_POST['amount'], $_POST['payment']));
            break;
        case 'equipment':
            $donationModel->setStrategy(new EquipmentDonation($conn, $_POST['equipment_type'], $_POST['equipment_used'], $_POST['amount'], $_POST['purchase_date'], $_POST['cost'], $_POST['made_in']));
            break;
        case 'gear':
            $donationModel->setStrategy(new GearDonation($conn, $_POST['gearType'], $_POST['amount']));
            break;
        default:
            echo "Invalid donation type.";
            exit;
    }

    $result = $donationModel->addDonation($_POST['name'], $_POST['email'], $_POST['phone'], $_POST['message']);
    if ($result) {
        echo "Thank you for your donation!";
    } else {
        echo "Error: Something went wrong.";
    }
}
?>
