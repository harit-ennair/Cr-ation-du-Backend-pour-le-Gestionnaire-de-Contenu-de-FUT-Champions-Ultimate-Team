<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>fifa</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>



    <nav class="navber">
        <div class="Logo">
            <img src="./image/Easports_fifa_logo.svg" alt="Logo">
            <span>photo Form</span>
        </div>
        <div class="navbtn">
       <a href="indexadmin.php"> <button id="navbtnadmin">admin</button></a>

       </div>
    </nav>

    <div class="main">
        <div id="positionplayrcontainer">
            <div class="positionplayr" id="attack">
                <div class="post" id="lwcard"></div>
                <div class="post" id="stcard"></div>
                <div class="post" id="rwcard"></div>
            </div>

            <div class="positionplayr" id="medfild">
            </div>

            <div class="positionplayr" id="defans">
                <div class="post" id="lbcard"></div>
                <div class="post" id="CBcard"></div>
                <div class="post" id="rbcard"></div>
            </div>

            <div class="positionplayr" id="goal">
            </div>

        </div>

        <div id="substitute">
            
        <form method="POST">
            <div class="form-group">
 
                <select id="position" name="position" required>
                    <option value="">Select a Position</option>
                    <option value="RW">Right Wing</option>
                    <option value="LW">Left Wing</option>
                    <option value="CF">Center Forward</option>
                    <option value="CM">Center Midfielder</option>
                    <option value="CDM">Defensive Midfielder</option>
                    <option value="CB">Center Back</option>
                    <option value="RB">Right Back</option>
                    <option value="LB">Left Back</option>
                    <option value="GK">Goalkeeper</option>
                </select>
            </div>
            <button id="addplayer" type="submit">Filter</button>
        </form>

           
            <h1 id="textsub">Sub</h1>
       


        <?php

$host = 'localhost';
$dbname = 'player';
$username = 'root';
$password = '';


$conn = new mysqli($host, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


try {

    $position = isset($_POST['position']) ? $_POST['position'] : '';


    if ($position) {
        $sql = "SELECT * 
                FROM playerinformation p
                INNER JOIN clubinformation c ON p.clubID = c.clubID
                INNER JOIN nationalityinformation n ON p.nationalityID = n.nationalityID
                WHERE Position = ?";


        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $position); 

  
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
  
            echo "<table border='1' cellpadding='10' cellspacing='0' style='border-collapse: collapse;'>";
            echo "<tr>
                    <th>Player Name</th>
                    <th>Photo</th>

                 
                    <th>Rating</th>
               
                    <th>Club Logo</th>

                    <th>Nationality Flag</th>
                    <th>Actions</th>
                  </tr>";

            // Output data for each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['playerNAME'] . "</td>";
                echo "<td><img src='" . $row['PhotoURL'] . "' alt='Player Photo' width='50' /></td>";
 

                echo "<td>" . $row['Rating'] . "</td>";

                echo "<td><img src='" . $row['clubURL'] . "' alt='Club Logo' width='50' /></td>";

                echo "<td><img src='" . $row['nationalityURL'] . "' alt='Nationality Flag' width='50' /></td>";

                
                echo "<td><form method='POST' action=''>
                            <input type='hidden' name='playerID' value='" . $row['playerID'] . "'>
                           
                            <button type='submit' name='addplayerbtn' id='addplayer'>Add player</button>
                         </form></td>";
                echo "</tr>";
            }

            echo "</table>";   
        } else {
            echo "No players found for the selected position.";
        }

        $stmt->close();
    } else {
        echo "Please select a position to filter.";
    }

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

$conn->close();
?>










</div>




    <script src="script.js"></script>
</body>

</html>