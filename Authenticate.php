<?php
// Database connection parameters
$servername = "localhost";
$dbUsername = "root"; // replace with your database username
$dbPassword = ""; // replace with your database password
$dbname = "task"; // replace with your database name

// Start session
session_start();

// Create connection
$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user input from form
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

// Query the database for user
$sql = "SELECT id, password FROM users WHERE username = '$username'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    // Fetching the user row
    $row = $result->fetch_assoc();

    // Verifying the password
    if (password_verify($password, $row['password'])) {
        // Password is correct, set the session
        $_SESSION['user_id'] = $row['id'];

        // Redirect to index.php
        header("Location: index.php");
        exit();
    } else {
        // Redirect back to login.php with error
        header("Location: login.php?error=invalidcredentials");
        exit();
    }
} else {
    // Redirect back to login.php with error
    header("Location: login.php?error=nouser");
    exit();
}

// Close connection
if (isset($conn) && $conn instanceof mysqli) {
    $conn->close();
}
