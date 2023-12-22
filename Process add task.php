<?php
// process_add_task.php
session_start();

// Redirect if not logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Database connection parameters
$servername = "localhost";
$dbUsername = "root"; // replace with your database username
$dbPassword = ""; // replace with your database password
$dbname = "task"; // replace with your database name

// Create connection
$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get task details from form
$title = mysqli_real_escape_string($conn, $_POST['title']);
$description = mysqli_real_escape_string($conn, $_POST['description']);
$due_date = mysqli_real_escape_string($conn, $_POST['due_date']);
$user_id = $_SESSION['user_id']; // Get user id from session

// SQL to add task
$sql = "INSERT INTO tasks (user_id, title, description, due_date) VALUES (?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("isss", $user_id, $title, $description, $due_date);
$stmt->execute();

// Redirect back to index.php or a page that shows all tasks
header('Location: index.php');

// Close connections
$stmt->close();
$conn->close();
