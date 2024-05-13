include 'db.php'; // Provides $conn
include 'Donation.php';

$donationModel = new Donation($conn);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $donorId = $_POST['donor_id'];
    $amount = $_POST['amount'];
    $date = $_POST['donation_date'];

    if ($donationModel->addDonation($donorId, $amount, $date)) {
        echo "Thank you for your donation!";
    } else {
        echo "Error in donation process.";
    }
}
