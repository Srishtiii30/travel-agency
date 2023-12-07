<?php
// Replace with your database credentials
$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "travel";

// Create a database connection
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to get the latest CID from the database
function getLatestCID($conn) {
    $query = "SELECT cid FROM signup ORDER BY cid DESC LIMIT 1";
    $result = $conn->query($query);
    
    if ($result && $result->num_rows === 1) {
        $row = $result->fetch_assoc();
        return $row['cid'];
    }
    
    return "CID not found";
}

// Get the latest CID
$cid = getLatestCID($conn);

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Travel Agency - Booking Confirmation</title>
  <link rel="stylesheet" href="styles.css">
</head>
  <style>
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

  <section id="booking-confirmation">
    <div class="container">
      <h2>Booking Confirmation</h2>
      <p>Thank you for booking with us! Your Customer ID (CID) is: <?php echo $cid; ?></p>
      <p>We look forward to providing you with an amazing travel experience.</p>
      <a href="trial.php" class="btn"><b>Sign In</b></a>
      
      <a href="index.html" class="btn"><b>Home Page</b></a>
    </div>
  </section>

  <footer>
    <!-- Footer content goes here -->
  </footer>
</body>
</html>
