<?php
$host = 'localhost';
$dbname = 'player';
$username = 'root';
$password = '';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



$sql = "SELECT * 
FROM playerinfornation p
JOIN clubinformation c ON p.clubID = c.clubID
JOIN nationalityinformation n ON p.nationalityID = n.nationalityID";


$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()){
        $DATA[] = $row;
    }
}
$json = json_encode($DATA);
echo $json;
?>