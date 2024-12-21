<?php
include 'conex.php';



$sql = "SELECT * 
        FROM playerinformation p
        LEFT JOIN clubinformation c ON p.clubID = c.clubID
        LEFT JOIN nationalityinformation n ON p.nationalityID = n.nationalityID";

$result = $conn->query($sql);



if ($result->num_rows > 0) {

echo "<table border='1' cellpadding='10' cellspacing='0' style='border-collapse: collapse;  display: inline-flex'>";


echo "<tr>
   <th>Player Name</th>
   <th>Photo</th>
   <th>Position</th>
   <th>Pace </th>
   <th>Shooting </th>
   <th>Passing </th>
   <th>Dribbling </th>
   <th>Defending </th>
   <th>Physical </th>
   <th>Rating</th>
   <th>Club</th>
   <th>Club Logo</th>
   <th>Nationality</th>
   <th>Nationality Flag</th>
   <th>Actions</th>
 </tr>";


while ($row = $result->fetch_assoc()) {
echo "<tr>";

echo "<td>" . $row['playerNAME'] . "</td>";
echo "<td><img src='" . $row['PhotoURL'] . "' alt='Player Photo' width='50' /></td>";
echo "<td>" . $row['Position'] . "</td>";


echo "<td>" . $row['PAC'] . "</td>";
echo "<td>" . $row['SHO'] . "</td>";
echo "<td>" . $row['PAS'] . "</td>";
echo "<td>" . $row['DRI'] . "</td>";
echo "<td>" . $row['DEF'] . "</td>";
echo "<td>" . $row['PHY'] . "</td>";
echo "<td>" . $row['Rating'] . "</td>";

echo "<td>" . $row['clubNAME'] . "</td>";
echo "<td><img src='" . $row['clubURL'] . "' alt='Club Logo' width='50' /></td>";

echo "<td>" . $row['nationalityNAME'] . "</td>";
echo "<td><img src='" . $row['nationalityURL'] . "' alt='Nationality Flag' width='50' /></td>";
// edit page doit etre effectuer par GET methode, le submit du form par POST 
echo "<td>

<form method='POST' action='editplayer.php'>
   <input type='hidden' name='playerID' value='" . $row['playerID'] . "'>
   <button type='submit' name='EditPlayerBtn' class='actionbtn'>Edit</button>
</form>


<form method='POST' action=''>
   <input type='hidden' name='playerID' value='" . $row['playerID'] . "'>
   <button type='submit' name='deletePlayerBtn' class='actionbtn'>Delete</button>
   
</form>
</td>";



echo "</tr>";





}


echo "</table>";
} else {
echo "No players found.";
}

$sql = "SELECT * 
        FROM playerinformation p
        LEFT JOIN clubinformation c ON p.clubID = c.clubID
        LEFT JOIN nationalityinformation n ON p.nationalityID = n.nationalityID";

$result = $conn->query($sql);

$players = []; // Initialize an empty array

while ($row = $result->fetch_assoc()) {
    $players[] = $row;
}

// Encode the data to JSON with pretty print and Unicode support
$encodedData = json_encode($players, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

// Write the JSON data to the file
file_put_contents("./api.json", '');
file_put_contents("./api.json", $encodedData);

?>