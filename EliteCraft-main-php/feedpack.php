<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/png" href="assets/Logo.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
</head>
<body>
    
</body>
</html>
<?php

// Create connection
$conn = new mysqli("localhost", "root", "", "eliteCraft");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



// Escape user inputs for security
$uname = $conn->real_escape_string($_POST['uname']);
$email = $conn->real_escape_string($_POST['email']);
$phone = $conn->real_escape_string($_POST['phone']);
$satisfaction = $conn->real_escape_string($_POST['inlineRadioOptions']);
$satisfaction_reason = "";
if ($satisfaction === "no") {
    // If user is not satisfied, get reasons
    if(isset($_POST['check1'])) $satisfaction_reason .= "Multimedia, ";
    if(isset($_POST['check2'])) $satisfaction_reason .= "Support Team, ";
    if(isset($_POST['check3'])) $satisfaction_reason .= "Overall Design, ";
    if(isset($_POST['check4'])) $satisfaction_reason .= "Prices, ";
    if(isset($_POST['check5'])) $satisfaction_reason .= "Location, ";
    // Remove trailing comma and space
    $satisfaction_reason = rtrim($satisfaction_reason, ", ");
}
$msg = $conn->real_escape_string($_POST['msg']);

// Insert data into database
$sql = "INSERT INTO feedback (name, email, phone, satisfaction, satisfaction_reason, message)
        VALUES ('$uname', '$email', '$phone', '$satisfaction', '$satisfaction_reason', '$msg')";

if ($conn->query($sql) === TRUE) {
    echo "Feedback submitted successfully!";
    header("Location: index.html");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


// Close connection
$conn->close();
?>