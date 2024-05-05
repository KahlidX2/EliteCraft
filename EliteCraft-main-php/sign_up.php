<link rel="icon" type="image/png" href="assets/Logo.png">
<?php
// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$user_password = $_POST['password']; // Changed variable name to avoid overwriting the database password

$servername = "localhost";
$username = "root";
$db_password = ""; // Rename to differentiate from user password
$dbname = "eliteCraft";

// Create connection
$conn = new mysqli("localhost", "root", "", "eliteCraft"); // Use $db_password for database password

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert data into database
$stmt = $conn->prepare("INSERT INTO users (email, password) VALUES ( ?, ?)");
$stmt->bind_param('ss', $email, $user_password); // Use $user_password for user's password
$stmt->execute();
echo "New user added successfully!<br>";
header("Location: sign_in2.html");
// Close statement and connection
$stmt->close();
$conn->close();
?>