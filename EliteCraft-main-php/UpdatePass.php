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
    <h1>Change Password</h1>
    <div class="bg-white rounded-lg shadow-lg p-5">
                
                <form id="buildForm" method="post">
                    <h3> Fill the Form To Update Your Password </h3>
                    <div class="mb-4">
                        <label for="email" class="form-label"><h6>Email :</h6></label>
                        <input type="text" id="Area" placeholder=" Enter The Email " class="form-control" name="email" required >
                    </div>
                    <div class="mb-4">
                        <label for="Opass" class="form-label"><h6>Old Password</h6></label>
                        <input type="text" id="floor" placeholder="Enter The Old Password " class="form-control" name="Opass" required>
                    </div>
                    <div class="mb-4">
                        <label for="Npass" class="form-label"><h6>New Password :</h6></label>
                        <input type="text" id="floor" placeholder="Enter The New Password " class="form-control" name="Npass" required>
                    </div>
                    <div class="mb-4">
                        
                        
                        <div class="col text-center">
                            <input type="submit" value="Update" class="btn btn-primary">
                        </div>
                    </div>
                </form>
                
                

    </div>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // get data from tha form
            $email = $_POST['email'];
            $oldPassword = $_POST['Opass'];
            $newPassword = $_POST['Npass'];

            // connecting to DB
            $host = "localhost";
            $dbusername = "root";
            $dbpassword = "";
            $dbname = "eliteCraft";
            $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            //check if the old and email matches
            $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$oldPassword'";
            $result = $conn->query($sql);

            if ($result->num_rows == 1) {
                // update it in the DB
                $updateSql = "UPDATE users SET password = '$newPassword' WHERE email = '$email'";
                if ($conn->query($updateSql) === TRUE) {
                    echo "<script>alert('Password updated successfully');</script>";
                    header("Location: index.html"); // Go to the home Page
                    exit();
                } else {
                    echo "Error updating password: " . $conn->error;
                }
            } else {
                echo "<script>alert('Invalid email or old password');</script>";
            }

            // close connection
            $conn->close();
        }
    ?>


</body>
</html>