<!DOCTYPE html>
<html>
<head>
    <title>Sign-in Page</title>
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
      max-width: 400px;
      margin: 0 auto;
      border-radius: 5px;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
      background-color: #ffffff; /* White background */
    }

    .container {
      padding: 20px;
    }

    input[type="number"],
    input[type="password"] {
      width: 100%;
      padding: 10px;
      margin: 5px 0;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    input[type="submit"] {
      width: 100%;
      padding: 10px;
      margin-top: 10px;
      background-color: #b1e3db;
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
      <h1>Sign-in</h1>
      <form action="" method="post"> 
        <!-- Replace 'signin_process.php' with the URL of the PHP script to process the sign-in data -->
        <div>
          <label for="cid">Customer ID:</label>
          <input type="cid" id="cid" name="cid" required>
        </div>

        <div>
          <label for="password">Password:</label>
          <input type="password" id="password" name="password">
        </div>

        <input type="submit" value="Sign In">
      </form>
    </div>
  </main>
</body>
</html>
<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "travel";


$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process login form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cid = $_POST['cid'];
    $password = $_POST['password'];

    // Sanitize the input to prevent SQL injection
    $cid = $conn->real_escape_string($cid);
    $password = $conn->real_escape_string($password);

    // Query to check if the username and password combination exists in the database
    $query = "SELECT * FROM signup WHERE cid='$cid' AND password='$password'";
    $result = $conn->query($query);

    if ($result->num_rows === 1) {
    
        echo "Login successful! Welcome, " . $cid;
        header('location:trips.php');
    } else {
      
        echo "Invalid username or password.";
    }
}

$conn->close();
?>