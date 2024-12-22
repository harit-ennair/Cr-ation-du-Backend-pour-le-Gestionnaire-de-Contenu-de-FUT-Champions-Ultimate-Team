<?php
include 'conex.php';



    if (isset($_POST['name']) && isset($_POST['photo']) && isset($_POST['position']) && isset($_POST['nationality']) && isset($_POST['club'])) {
        
        $name = $_POST['name'];
        $photo = $_POST['photo'];
        $position = $_POST['position'];
        $nationality = $_POST['nationality'];
        $club = $_POST['club'];

        $pace = $_POST['pace'];
        $shooting = $_POST['shooting'];
        $passing =  $_POST['passing'];
        $dribbling = $_POST['dribbling'];
        $defending = $_POST['defending'];
        $physical = $_POST['physical'];

        $rating = ($pace + $shooting + $passing + $dribbling + $defending + $physical) / 6; 

        $sql = "INSERT INTO playerinformation 
                (playerNAME, PhotoURL, Position, nationalityID, clubID, PAC, SHO, PAS, DRI, DEF, PHY, Rating) 
                VALUES 
                (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            die('Error preparing the query: ' . $conn->error);
        }

        $stmt->bind_param("sssiiiiiiiii", $name, $photo, $position, $nationality, $club, $pace, $shooting, $passing, $dribbling, $defending, $physical, $rating);

        if ($stmt->execute()) {
            echo "<script>alert('Player added successfully');</script>";
        } else {
            echo "<script>alert('Error adding player: " . $stmt->error . "');</script>";
        }

      

        $stmt->close();

    }

$conn->close();

?>