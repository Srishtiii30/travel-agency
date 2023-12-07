<?php
// Start session
session_start();

// Sample user data (replace with your own data)
$validUsers = [
    '12345' => 'password123',
    '54321' => 'letmein',
    // Add more users and passwords as needed
];

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cid = $_POST['cid'];
    $password = $_POST['password'];

    // Check if the CID exists in the validUsers array
    if (isset($validUsers[$cid])) {
        // Verify the password
        if ($validUsers[$cid] === $password) {
            // Authentication successful
            $_SESSION['cid'] = $cid;
            header('trips.html'); // Redirect to dashboard or some other page
            exit();
        } else {
            $error = 'Invalid password';
        }
    } else {
        $error = 'Invalid CID';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php if (isset($error)) { ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php } ?>
    <form method="post">
        <label for="cid">CID:</label>
        <input type="text" id="cid" name="cid" required><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>
        
        <button type="submit">Login</button>
    </form>
    <br>
        <input type="submit" value="Sign In">
        <br>
</body>
</html>
