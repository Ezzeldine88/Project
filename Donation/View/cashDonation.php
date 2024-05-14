<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Donate Cash</title>
    <link rel="stylesheet" href="public/css/cashdonation.css">
</head>
<body>
<div class="container">
    <header>
        <h1>Donate Cash</h1>
        <p>Your contribution helps us provide essential services to those in need.</p>
    </header>
    <main>
        <form id="cashDonationForm" action="index.php?route=cash" method="post">
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
                <input type="tel" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="amount">Donation Amount ($):</label>
                <input type="number" id="amount" name="amount" min="1" required>
            </div>
            <div class="form-group">
                <label for="payment">Payment Method:</label>
                <input type="text" id="payment" name="payment" required>
            </div>
            <div class="form-group">
                <label for="message">Message (optional):</label>
                <textarea id="message" name="message" rows="4"></textarea>
            </div>
            <div class="form-group">
                <button type="submit">Donate Now</button>
            </div>
        </form>
    </main>
</div>
<script src="public/js/cashDonation.js"></script>
</body>
</html>
