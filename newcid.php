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
  <link rel="stylesheet" href="styles.css"> <!-- Use the same CSS file as the previous code -->
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
      <p>Thank you for booking with us! Your Customer ID (CID) is: <?php echo $cid; ?></p>
      <p>We look forward to providing you with an amazing travel experience.</p>
    </div>
  </section>

  <footer>
    <!-- Footer content goes here -->
  </footer>
</body>
</html>
