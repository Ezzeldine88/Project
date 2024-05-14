<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donate Protective Gear</title>
    <link rel="stylesheet" href="public/css/geardonation.css">
</head>
<body>
<div class="container">
    <header>
        <h1>Donate Protective Gear</h1>
        <p>Your contribution helps us provide essential protective gear to frontline workers and those in need.</p>
    </header>
    <main>
        <form id="gearDonationForm" action="index.php?route=gear" method="post">
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
                <label for="gear-type">Protective Gear Type:</label>
                <select id="gear-type" name="gear-type" required>
                    <option value="" disabled selected>Select Gear Type</option>
                    <option value="Masks">Masks</option>
                    <option value="Gloves">Gloves</option>
                    <option value="Gowns">Gowns</option>
                    <option value="Face Shields">Face Shields</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div class="form-group">
                <label for="amount">Amount:</label>
                <input type="number" id="amount" name="amount" min="1" required>
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
<script src="public/js/gearDonation.js"></script>
</body>
</html>
