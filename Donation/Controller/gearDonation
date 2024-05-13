include 'DonationModel.php';
$conn = new mysqli("localhost", "root", "", "clinic");  // Consider using a configuration file for credentials

$donationModel = new DonationModel($conn);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $result = $donationModel->addGearDonation($_POST['name'], $_POST['email'], $_POST['phone'], $_POST['gear_type'], $_POST['amount'], $_POST['message']);
    if ($result) {
        echo "Thank you for your gear donation!";
    } else {
        echo "Error: " . $conn->error;
    }
}
