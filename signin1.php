<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Travel Agency - Sign In</title>
  <link rel="stylesheet" href="styles.css"> <!-- Use the same CSS file as the previous code -->
</head>
<body>
  <header>
    <nav>
      <!-- Navigation menu or logo goes here -->
    </nav>
  </header>

  <section id="sign-in-form">
    <div class="container">
      <h2>Sign In</h2>
      <form action="" method="post"> 
        <!-- Replace 'signin_process.php' with the URL of the PHP script to process the sign-in data -->
        <br>
        <div>
          <label for="cid">Customer ID:</label>
          <input type="cid" id="cid" name="cid" required>
        </div>

        <div>
          <label for="password">Password:</label>
          <input type="password" id="password" name="password" >
        </div>

        <br>
        <input type="submit" value="Sign In">
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
// Replace with your database credentials
$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "travel";

$cid = $_POST['cid'];
$password = $_POST['password'];

// Create a database connection
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to verify CID and password
function verifyCredentials($cid, $password) {
    global $conn;
    
    // Sanitize input
    $cid = mysqli_real_escape_string($conn, $cid);
    
    // Fetch user record from the database
    $query = "SELECT cid, password FROM signup WHERE cid = '$cid'";
    $result = $conn->query($query);
    
    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row['password'];
        
        // Verify password using password_verify function
        if (password_verify($password, $hashedPassword)) {
            return true; // Password is correct
        }
    }
    
    return false; // CID or password is incorrect
}

// Example usage
//$providedCID = "12345"; // Replace with actual CID
//$providedPassword = "password123"; // Replace with actual password
echo"hehehe";
if (verifycredentials($cid==1,$password)) 
{
    echo "Login successful!";
    header('trip.html');
} 
else 
{
//    echo "Login failed. Invalid CID or password.";
}

//Close the database connection
$conn->close();
?>
