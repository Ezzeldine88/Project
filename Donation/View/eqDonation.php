<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donate Medical Equipment</title>
    <link rel="stylesheet" href="public/css/eqdonations.css">
</head>
<body>
<div class="container">
    <header>
        <h1>Donate Medical Equipment</h1>
        <p>Your contribution helps us provide essential medical equipment and supplies to those in need.</p>
    </header>
    <main>
        <form id="donationForm" action="index.php?route=equipment" method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="phone" pattern="[0-9]{11}" required>
            </div>
            <div class="form-group">
                <label for="equipment-type">Equipment Type:</label>
                <select id="equipment-type" name="equipment-type" required>
                    <option value="" disabled selected>Select Equipment Type</option>
                    <option value="Diagnostic">Diagnostic</option>
                    <option value="Therapeutic">Therapeutic</option>
                    <option value="Monitoring">Monitoring</option>
                    <option value="Surgical">Surgical</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div class="form-group">
                <label for="equipment-used">Equipment Description:</label>
                <input type="text" id="equipment-used" name="equipment-used" required>
                <small>Separate multiple equipment with commas (,)</small>
            </div>
            <div class="form-group">
                <label for="amount">Amount:</label>
                <input type="number" id="amount" name="amount" min="1" required>
            </div>
            <div class="form-group">
                <label for="purchase-date">Purchase Date:</label>
                <input type="date" id="purchase-date" name="purchase-date" required>
            </div>
            <div class="form-group">
                <label for="cost">Cost (EGP):</label>
                <input type="number" id="cost" name="cost" min="0.01" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="made-in">Made In:</label>
                <input type="text" id="made-in" name="made-in" required>
            </div>
            <div class="form-group">
                <label for="message">Additional Information (optional):</label>
                <textarea id="message" name="message" rows="4"></textarea>
            </div>
            <div class="form-group">
                <button type="submit">Donate Now</button>
            </div>
        </form>
    </main>
</div>
<script src="public/js/equipmentDonation.js"></script>
</body>
</html>
