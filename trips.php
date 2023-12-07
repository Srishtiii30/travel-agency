<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Travel Agency - Book a Trip</title>
  <style>
    body {
      height: 100vh;
      margin: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      background-color: #ffffff; /* White background */
    }

    .btn {
      padding: 15px 30px;
      font-size: 18px;
      text-align: center;
      text-decoration: none;
      background-color: #66e6d1;
      background-blend-mode: lighten;
      border-radius: none;
      border: none;
      cursor: pointer;
      margin: 10px;
      width: 200px;
      color: black;
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

    h1 {
      font-family: monospace;
      margin: 0; /* Remove margin */
      padding: 0; /* Remove padding */
      border: none; /* Remove border */
      background-color: transparent; /* Remove background-color */
    }

    @keyframes slide {
      0% {
        transform: translateX(-25%);
      }

      100% {
        transform: translateX(25%);
      }
    }

    main {
      padding: 20px;
      background-color: #f2f2f2;
      margin: 0 auto;
      border-radius: 5px;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
      width: 400px;
    }

    .container {
      display: table; /* Use table display to center content */
      margin: 0 auto; /* Center the box */
      width: 90%; /* Set the width to 80% */
      /padding: 10px;/
    }

    /* Adjust font size and padding for elements inside .container */
    .container h1 {
      font-size: 24px;
      margin-bottom: 20px;
    }

    .container .input-container {
      margin-bottom: 15px;
    }

    .container .input-container label {
      font-weight: bold;
      font-size: 16px;
      display: block;
      margin-bottom: 5px;
    }

    .container .input-container select,
    .container .input-container input[type="number"],
    .container .input-container input[type="date"],
    .container .input-container input[type="number"]::placeholder {
      font-size: 16px;
      padding: 8px;
      width: 100%;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    input[type="submit"] {
      width: 100%;
      padding: 10px;
      margin-top: 10px;
      background-color: #66e6d1;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

  </style>
</head>
<body>
  <div class="bg"></div>
  <div class="bg bg2"></div>
  <div class="bg bg3"></div>
  <main>
    <div class="container">
      <h1>Book a Trip</h1>
      <form action="" method="post"> 
        <!-- Replace 'book_trip_process.php' with the URL of the PHP script to process the booking data -->
    
        <!-- Input containers for Source -->
        <div class="input-container">
          <label for="source">Source:</label>
          <select id="source" name="source" >
            <option value="">Select Source</option>
            <option value="city1">Bangalore</option>
          </select>
        </div>

        <!-- Input containers for Destination -->
        <div class="input-container">
          <label for="destination">Destination:</label>
          <select id="destination" name="destination" >
            <option value="">Select Destination</option>
            <option value="destination1">Coorg</option>
            <option value="destination2">Chikmaglur</option>
            <option value="destination3">Kabini</option>
            <option value="destination4">Pondicherry</option>
            <option value="destination5">Gokarna</option>
            <option value="destination6">Wayanad</option>
          </select>
        </div>

        <!-- These fields will have boxes -->
        <div class="input-container">
          <label for="noppl">Number of People:</label>
          <input type="number" id="noppl" name="noppl" min="1">
        </div>

        <div class="input-container">
            <label for="startdate">Start Date:</label>
            <input type="date" id="startdate" name="startdate">
        </div>

        <div class="input-container">
          <label for="noofdays">Number of Days:</label>
          <input type="number" id="noofdays" name="noofdays" min="1" >
        </div>

        <div class="input-container">
            <label for="distance">Distance (in kilometers):</label>
            <input type="number" id="distance" name="distance" placeholder="Enter distance in km" >
        </div>

        <br>
        <input type="submit" value="Book Now">
        <a href="http://localhost/Travel2/confirmation.php">
        <br>
      </form>
    </div>
  </main>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $host = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'travel';
    
    $source = $_POST['source'];
    $destination = $_POST['destination'];
    $noppl = $_POST['noppl'];
    $startdate = $_POST['startdate'];
    $noofdays = $_POST['noofdays'];
    $distance = $_POST['distance'];
    
    $connection = new mysqli($host, $dbUsername, $dbPassword, $dbName);
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }
    
    // Use prepared statement to prevent SQL injection
    $sql = "INSERT INTO trips (source, destination, noppl, startdate, noofdays, distance) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ssisii", $source, $destination, $noppl, $startdate, $noofdays, $distance);
    
    if ($stmt->execute()) {
         // Get the reservation ID (rid) of the newly inserted reservation
       //  $tid = $stmt->insert_id;

        //$stmt->close();
        //$connection->close();
        
        // Redirect using JavaScript
        //echo "<script>window.location.href = 'confirmation.php';</script>";
        $tid = $stmt->insert_id;
        $distance = $_POST['distance'];
        
        // Create the URL for the confirmation page
        $url = 'confirmation.php?tid=' . $tid . '&distance=' . $distance;
        
        // Redirect to the confirmation page
        echo "<script>window.location.href = '$url';</script>";
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}
?>