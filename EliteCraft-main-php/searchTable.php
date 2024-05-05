<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/png" href="assets/Logo.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <title>Building Search</title>
    <style>
        body {
            background-color: #9D7D60; /* Applied to body instead of using the universal selector */
        }
        
        th, td {
            padding: 8px; /* Add padding to table cells */
            border: 1px solid #ddd; /* Add border to table cells */
        }
        .building-image {
            width: 200px; /* Set image width */
            height: 130px; /* Set image height */
        }
    </style>
</head>
<body>
<header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex justify-content-between">
    
          <div class="logo">
            <a href="index.html"><img src="assets/logo.png" alt="" class="img-fluid"></a>
          </div>
    
          <nav id="navbar" class="navbar">
            <ul>
              <li><a class="nav-link scrollto active" href="index.html">Home</a></li>
              <li><a class="nav-link scrollto" href="About_As.html">About</a></li>
              <li><a class="nav-link scrollto" href="projects.html">Project</a></li>
              <li><a class="nav-link scrollto" href="Contact_us.html">Contact</a></li>
              <li><a class="nav-link scrollto" href="feedpack.html">Feedpack</a></li>
              <li><a class="nav-link scrollto" href="MiniGame/MiniGame.html">Fun Page</a></li>
              <li><a class="nav-link scrollto" href="calc.html">Build Calcolator</a></li>
              <li class="dropdown"><a href="#" style="text-decoration: none;"><span>REGISTER</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                  <li><a href="sign_in2.html">Log in</a></li>
                  <li><a href="sign_up.html">Sign up</a></li>
                </ul>
              </li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
          </nav>
    
        </div>
      </header>
      <section id="hero">
      
        <div class="container1 container-fluid">
            
        <?php

            // Class fr the row
            class BuildingRow {
                public $BuildingInfo;
                public $Date;
                public $Area;
                public $Floors;
                public $Cost;
                public $Location;
                public $Picture;

                // the constractor for the row object 
                public function __construct($BuildingInfo, $Date, $Area, $Floors, $Cost, $Location, $Picture) {
                    $this->BuildingInfo = $BuildingInfo;
                    $this->Date = $Date;
                    $this->Area = $Area;
                    $this->Floors = $Floors;
                    $this->Cost = $Cost;
                    $this->Location = $Location;
                    $this->Picture = $Picture;
                }
            }

            // create an array of BuildingRow objects 
            $buildingRows = array();

            // function to display the content of the table using table format from the array
            function displayTable($buildingRows) {
                echo '<div style="text-align: center;">'; // make a dive to let the table centered 
                echo '<h2 style="text-align: left";>Results :</h2><br>';
                echo "<table class='table table-bordered table-hover'>"; // start of the table
                echo "<tr><th>Building/Info</th><th>Date</th><th>Area</th><th>Floors</th><th>Cost</th><th>Location</th><th>Picture</th></tr>";
                foreach($buildingRows as $row) {
                    // Display each BuildingRow object as a table row
                    echo "<tr>";
                    echo "<td>" . $row->BuildingInfo . "</td>";
                    echo "<td>" . $row->Date . "</td>";
                    echo "<td>" . $row->Area . "</td>";
                    echo "<td>" . $row->Floors . "</td>";
                    echo "<td>" . $row->Cost . "</td>";
                    echo "<td>" . $row->Location . "</td>";
                    echo '<td><img class="building-image" src="' . $row->Picture . '"></td>';
                    echo "</tr>";
                }
                echo "</table>"; 
                echo '</div>'; 
            }

            // database connecting
            $servername = "localhost";
            $username = "root";
            $password = ""; // make the password empty
            $dbname = "eliteCraft"; // Db name
            $table_name = "qais"; // DB table name

            // connecting to mysql db
            $conn = new mysqli($servername, $username, $password, $dbname);

            // test connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            //  search query
            $search_query = $_POST['search_query']; // 

            // SQL to search for buildings based on name or location
            $sql = "SELECT * FROM $table_name WHERE BuildingInfo LIKE '%$search_query%' OR Location LIKE '%$search_query%'";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    // Create a BuildingRow object for each row in the result set and add it to the array
                    $buildingRows[] = new BuildingRow($row["BuildingInfo"], $row["Date"], $row["Area"], $row["Floors"], $row["Cost"], $row["Location"], $row["Picture"]);
                }

                // display when the function is called
                displayTable($buildingRows);
            } else {
                // if the target is not found display this 
                echo "<p style='text-align: center; font-size:100pt;'>Sorry No results found</p>";
            }

            $conn->close();

?>
        </div>
    </section>
    <div class="container-fluid">

    <footer class="_footer_bg">
    <div class="container p-4">
      <div class="row">
        <div class="col-lg-6 col-md-12 mb-4">
          
          <p>
            EliteCraft is a pioneering online construction company with a rich history of over twenty years in the industry. They specialize in a wide array of civil construction services, playing a significant role in shaping the infrastructure of the future.
          </p>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
          
          <ul class="list-unstyled mb-0">
            <li class="mb-1">
              <a href="#!" style="color: #4f4f4f;">Frequently Asked Questions</a>
            </li>
            <li class="mb-1">
              <a href="#!" style="color: #4f4f4f;">Location</a>
            </li>
            <li class="mb-1">
              <a href="#!" style="color: #4f4f4f;">Pricing</a>
            </li>
            <li>
              <a href="#!" style="color: #4f4f4f;">what we do?</a>
            </li>
          </ul>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
          
          <table class="table table-striped" style="margin-top: 30px;">
            <tbody>
              <tr>
                <td>Mon - Fri:</td>
                <td>8am - 9pm</td>
              </tr>
              <tr>
                <td>Sat - Sun:</td>
                <td>8am - 1am</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2024 Copyright: EliteCraft Team
    </div>
   
  </footer>
  
</div>
</body>
</html>
