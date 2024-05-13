include 'DonationModel.php';
$conn = new mysqli("localhost", "root", "", "clinic");  // Consider using a configuration file for credentials

$donationModel = new DonationModel($conn);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $result = $donationModel->addEquipmentDonation($_POST['name'], $_POST['email'], $_POST['phone'], $_POST['equipment_type'], $_POST['equipment_used'], $_POST['amount'], $_POST['purchase_date'], $_POST['cost'], $_POST['made_in'], $_POST['message']);
    if ($result) {
        echo "Thank you for your equipment donation!";
    } else {
        echo "Error: " . $conn->error;
    }
}
