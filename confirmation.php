<?php
// Replace with your database credentials
$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "travel";
$tid = $_GET['tid'];
$distance = $_GET['distance'];
// Create a database connection
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$tid = $_GET['tid'];
//echo $tid;
//echo $distance;
// Function to get the latest distance from the database


// Get the latest distanc

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Travel Agency - Booking Confirmation</title>
  <style>
    body {
      height: 100vh;
      margin: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      background-color: #ffffff; /* White background */
    }

    /* Your existing CSS styles here */

    main {
      padding: 20px;
      background-color: #f2f2f2;
      max-width: 400px;
      margin: 0 auto;
      border-radius: 5px;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }

    .container {
      padding: 20px;
    }

    .confirmation-text {
      font-size: 24px;
      font-weight: bold;
      text-align: center;
      margin-bottom: 20px;
    }

    .amount {
      font-size: 20px;
      margin-bottom: 10px;
    }

    .pay-now-btn {
      display: block;
      width: 100%;
      text-align: center;
      padding: 10px;
      background-color: #66e6d1;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    body {
      height: 100vh;
      margin: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      background-color: #ffffff; /* White background */
    }

    .bg {
      animation: slide 3s ease-in-out infinite alternate;
      background-image: linear-gradient(-60deg, rgb(245, 247, 244) 50%, rgb(248, 160, 219) 50%);
      bottom: 0;
      left: -50%;
      opacity: 0.5;
      position: fixed;
      right: -50%;
      top: 0;
      z-index: -1;
    }

    .bg2 {
      animation-direction: alternate-reverse;
      animation-duration: 4s;
    }

    .bg3 {
      animation-duration: 5s;
    }

    @keyframes slide {
      0% {
        transform: translateX(-25%);
      }

      100% {
        transform: translateX(25%);
      }
    }
  </style>
<div class="bg"></div>
<div class="bg bg2"></div>
<div class="bg bg3"></div>
<body>
  <header>
    <nav>
      <!-- Navigation menu or logo goes here -->
    </nav>
  </header>

  <section id="booking-confirmation">
    <div class="container">
      <h2>Booking Confirmation</h2>
      <div class="amount">Amount to be paid: Rs<?php echo ($distance * 20); ?></div>
      <div class="confirmation-text">Your booking has been confirmed!</div>
      <a href="#" class="pay-now-btn">Pay Now</a>
    </div>
  </section>

  <footer>
    <!-- Footer content goes here -->
  </footer>
</body>
</html>
