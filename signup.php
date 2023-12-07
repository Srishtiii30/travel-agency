<?php
echo "This PHP script is being executed.";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $host = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'travel';

    $cid = $_POST['cid'];
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
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }

    $stmt->close();
    $connection->close();
}

?>


</body>
</html>