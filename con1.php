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
  </style>
</head>
<body>
  <header>
    <nav>
      <!-- Navigation menu or logo goes here -->
    </nav>
  </header>

  <section id="booking-confirmation">
    <div class="container">
      <h2>Booking Confirmation</h2>
      <div class="amount">Amount to be paid: $<?php echo ($distance * 0.2); ?></div>
      <div class="confirmation-text">Your booking has been confirmed!</div>
      <a href="#" class="pay-now-btn">Pay Now</a>
    </div>
  </section>

  <footer>
    <!-- Footer content goes here -->
  </footer>
</body>
</html>
    <?php
    // Assuming you have already established a database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "travel";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    if (isset($_GET['distance'])) {
        $distance = $_GET['distance'];

        // Display the distance and calculate total amount
        $totalAmount = $distance * 12;
        echo "<h1>Page Two</h1>";
        echo "<p>Distance: " . htmlspecialchars($distance) . " miles</p>";
        echo "<p>Total Amount: $" . htmlspecialchars($totalAmount) . "</p>";
    } else {
        echo "<h1>Error</h1>";
        echo "<p>Distance not provided.</p>";
    }

    // Close the database connection
    $conn->close();
    ?>
</body>