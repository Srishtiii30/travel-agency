<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Travel Agency - Booking</title>
  <link rel="stylesheet" href="styles.css"> <!-- Include your CSS file here -->
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
</head>
<body>
<div class="bg"></div>
<div class="bg bg2"></div>
<div class="bg bg3"></div>
  <header>
    <nav>
      <!-- Navigation menu or logo goes here -->
    </nav>
  </header>

  <section id="Sign-up">
    <div class="container">
      <h2>Sign-up</h2>
      <form action="" method="post"> 
        <!-- Replace 'connect.php' with the URL of the PHP script to process the booking -->
        <br>
        <div>
          <label for="name">name:</label>
          <input type="text" id="name" name="name" required>
        </div>
        <div>
          <label for="email">email:</label>
          <input type="text" id="email" name="email" required>
        </div>

        <div>
          <label for="address">address:</label>
          <input type="text" id="address" name="address" required>
        </div>

        <div>
          <label for="phone">phone_no:</label>
          <input type="tel" id="phone" name="phone" required>
        </div>
        <div>
          <label for="password">password:</label>
          <input type="password" id="password" name="password" required>
        </div>

        <br>
        <input type="submit" value="Book Now">
        <br>
      </form>
    </div>
  </section>

  <footer>
    <!-- Footer content goes here -->
  </footer>
</body>
</html>
<?php
//echo "This PHP script is being executed.";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $host = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'travel';

    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $connection = new mysqli($host, $dbUsername, $dbPassword, $dbName);

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    // Use prepared statement to prevent SQL injection
    $sql = "INSERT INTO signup(name,email,address,phone,password) VALUES (?, ?, ?, ?, ?)";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("sssis", $name, $email, $address, $phone, $password);

    if ($stmt->execute()) {
        echo "Record inserted successfully.";
        header('location:cid.php');
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }

    $stmt->close();
    $connection->close();
}

?>