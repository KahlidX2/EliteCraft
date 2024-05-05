<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGN IN</title>
    <link rel="icon" type="image/png" href="assets/Logo.png">
</head>
<body>
    <style>
        *{
            background-color: #9D7D60; 
        }

    </style>
    <?php
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            //retrive form data
            $email = $_POST['email'];
            $password = $_POST['password'];
            //connect DB
            $host="localhost";
            $dbusername="root";
            $dbpassword="";
            $dbname="eliteCraft";
            $conn=new mysqli($host,$dbusername,$dbpassword,$dbname);
            if($conn ->connect_error){
                die("Connection failed :".$conn->connect_error);

            }
            //validate login
            $query = "SELECT *FROM users WHERE email='$email' AND password='$password'";
            $result = $conn->query($query);
            if($result->num_rows ==1){
               
                //go to this page 
                header("Location: indexSigned.html");
                exit();
            }
            else{
                echo "<script>";
                echo "if(confirm('Wrong Password or Email. Do you want to try again?')) {";
                echo "window.location.href = 'sign_in2.html';";
                echo "} else {";
                echo "window.location.href = 'index.html';"; // Redirect to sign_in2.html if they choose not to retry
                echo "}";
                echo "</script>";
                exit();
            }
            $conn->close();

        }
    ?>


</body>
</html>