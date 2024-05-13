include 'DonationModel.php';
$conn = new mysqli("localhost", "root", "", "clinic");  // Ideally, connection details should be in a config file or injected.

$donationModel = new DonationModel($conn);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $result = $donationModel->addCashDonation($_POST['name'], $_POST['email'], $_POST['phone'], $_POST['amount'], $_POST['payment'], $_POST['message']);
    if ($result) {
        echo "Thank you for your donation!";
    } else {
        echo "Error: Something went wrong.";
    }
}
