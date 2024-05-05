<link rel="icon" type="image/png" href="assets/Logo.png">
<?php
    $servername = "localhost";
    $username = "username";
    $password = "password";
    $dbname = "user_data";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $name_email = $_POST['name_email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users (name_email, password) VALUES ('$name_email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>
