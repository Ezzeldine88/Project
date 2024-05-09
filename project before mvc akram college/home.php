<?php
session_start();

// Check if the user is logged in
if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THE CLINIC</title>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <style>
        /* Add the background image to the html 3shan msh shghala we heya fel css file ma3rfsh leeh */
        .home {
            background-image: url('home2.jpeg');
        }
    </style>
</head>

<body>
<header>
    <!-- hena han3ml el navbar-->
    <a href="#" class="logo">
        <img src="logo tarsh2.png" alt="logo">
    </a>
    <!--hena hanhot el menu icon -->
    <i class='bx bx-menu' id="menu-icon"></i>
    <!--hena ihna bnhot linkat -->
    <ul class="navbar">
        <li><a href="#home">Home</a></li>
        <li><a href="#about">About Us</a></li>
        <li><a href="#news">our doctors</a></li>
        <li><a href="Emer.html">emergency hotlines</a></li>
        <li><a href="EN.html">emergency need CHAT</a></li>
        <li><a href="appointment.html">book an appointment</a></li>
        <li><a href="#donations">Donate</a></li>
        <li><a href="profile.html"><i class='bx bxs-user'></i> Profile</a></li> <!-- Profile icon -->

    </ul>
    <!--hena i7na han save showyt icons-->
    <div class="header-icon">
        <i class='bx bx-search' id="search-icon"></i>
        <?php
        // Check if the user is logged in
        if(isset($username)) {
            // If logged in, display welcome message with the username
            echo "<a>Welcome, $username!</a>";
            // You can also provide a logout link here
            echo '<a href="logout.php">Logout</a>';
        } else {
            // If not logged in, display a login link or other message
            echo '<a href="loginmenu.html">Login</a>';
        }
        ?>
    </div>

</header>
<section class="home" id="home">
    <div class="home-text">
        <h1>protection is always better than the cure</h1>
        <p>always dont hesitate when u feel sick to contact us early cure is more better than being late we are 24hrs
            ready for helping you
            <a href="#movies" class="btn">need help</a>
    </div>
    <div class="home-img">
        <img src="home.jpeg" alt="home image">

    </div>
    <!-- hena elgoz2 bta3 el about-->
</section>
<section class="about" id="about">
    <div class="about-img">
        <img src="about2.jpg" alt="">
    </div>
    <div class="about-text">
        <h2>Our History</h2>
        <p>"Welcome to THE CLINIC, where we redefine healthcare excellence with a commitment to personalized service
            and patient-centric care. At THE CLINIC, we believe that every individual deserves access to high-quality
            healthcare tailored to their unique needs. Our dedicated team of experienced professionals is here to
            provide comprehensive medical services in a warm and supportive environment.

            From routine check-ups and preventive care to specialized treatments and innovative therapies, we offer a
            wide range of services to promote your overall health and well-being. Our approach is centered on building
            lasting relationships with our patients, taking the time to understand your concerns and preferences to
            develop personalized treatment plans that meet your specific goals.

            At THE CLINIC, you can expect compassionate care, advanced technology, and a commitment to excellence in
            everything we do. We are honored to be your trusted healthcare partner and look forward to serving you and
            your family for years to come. Thank you for choosing THE CLINIC for all your healthcare needs."
            <a href="#" class="btn">Learn More</a>
    </div>
</section>
<section class="news" id="news">
    <div class="heading">
        <h2>MEET OUR DOCTORS</h2>
    </div>
    <!-- hena han3mel el box eli hayeb2a feeh kol el dacatra eli mawgooda -->
    <div class="news-container">
        <!-- Doctor Cards Here -->
    </div>
</section>
<section class="news" id="donations">
    <div class="heading">
        <h2>Donation types</h2>
    </div>
    <!-- hena han3mel el box eli hayeb2a feeh kol el dacatra eli mawgooda -->
    <div class="news-container">
        <!-- Donation Cards Here -->
    </div>
</section>

<section class="footer">
    <div class="footer-box">
        <h3>24HRS SERVICE</h3>
        <p>Here are our social media site links if u need to contact us on any of them</p>
        <div class="social">
            <a href="#"><i class='bx bxl-facebook'></i></a>
            <a href="#"><i class='bx bxl-instagram'></i></a>
            <a href="#"><i class='bx bxl-twitter'></i></a>
            <a href="#"><i class='bx bxl-whatsapp'></i></a>
            <a href="#"><i class='bx bxl-tiktok'></i></a>
        </div>
    </div>
    <div class="footer-box">
        <h3>Support</h3>
        <li><a href="#">help & support</a></li>
        <li><a href="#">Privacy policy</a></li>
        <li><a href="#">terms of use </a></li>
        <li><a href="#">comments</a></li>
    </div>
    <div class="footer-box">
        <h3>View guids</h3>
        <li><a href="#">features</a></li>
        <li><a href="#">career</a></li>
        <li><a href="#">our locations</a></li>
    </div>
    <div class="footer-box">
        <h3>contact</h3>
        <div class="contact">
            <span><i class='bx bx-map'></i>location</span>
            <span><i class='bx bx-phone'></i>010322225577</span>
            <span><i class='bx bxl-gmail'></i>THE_CLININC@gmail.com</span>
        </div>
    </div>
</section>

</body>
</html>
