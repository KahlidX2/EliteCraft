<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Password</title>
    <link rel="icon" type="image/png" href="assets/Logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
    <h1>Delete Account</h1>
    <div class="bg-white rounded-lg shadow-lg p-5">
                
                <form id="buildForm" method="post">
                    <h3> Fill the Form ToDelete Your Account </h3>
                    <div class="mb-4">
                        <label for="email" class="form-label"><h6>Email :</h6></label>
                        <input type="text" id="Area" placeholder=" Enter The Email " class="form-control" name="email" required >
                    </div>
                    <div class="mb-4">
                        <label for="pass" class="form-label"><h6>Password :</h6></label>
                        <input type="text" id="floor" placeholder="Enter Password " class="form-control" name="Opass" required>
                    </div>
                   
                    <div class="mb-4">
                        <div class="col text-center">
                            <input type="submit" value="Delete" class="btn btn-primary">
                        </div>
                    </div>
                </form>
                
                

    </div>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // get the data
            $email = $_POST['email'];
            $password = $_POST['Opass'];
    
            // connecting to DB
            $host = "localhost";
            $dbusername = "root";
            $dbpassword = "";
            $dbname = "eliteCraft";
            $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
    
            // cheak the match in DB 
            $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
            $result = $conn->query($sql);
    
            if ($result->num_rows > 0) {
                // found an account then delet it
                $deleteSql = "DELETE FROM users WHERE email='$email' AND password='$password'";
                if ($conn->query($deleteSql) === TRUE) {
                    echo "<script>alert('Account deleted successfully');</script>";//senf alert by that
                    header("Location: index.html"); // Go to the home Page
                } else {
                    echo "<script>alert('Error deleting account');</script>";//if an error accourd send this alert
                }
            } else {
                echo "<script>alert('Email or password is incorrect');</script>";//if not found send this alert
            }
    
            $conn->close();
        }
    ?>


</body>
</html>