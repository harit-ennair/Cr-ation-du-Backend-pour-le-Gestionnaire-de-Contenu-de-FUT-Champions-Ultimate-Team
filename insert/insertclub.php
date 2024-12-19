
<?php
include 'conex.php';

if (isset($_POST['addClubbtn'])) {
 
    $clubName = isset($_POST['clubName']) ? trim($_POST['clubName']) : '';
    $clubURL = isset($_POST['clubURL']) ? trim($_POST['clubURL']) : '';

  
    if (empty($clubName) || empty($clubURL)) {
        echo "<script>alert('Please fill in both the club name and the club URL.');</script>";
    } else {
   
        $sql = "INSERT INTO clubinformation (clubNAME, clubURL) VALUES (?, ?)";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $clubName, $clubURL); 

        if ($stmt->execute()) {
            echo "<script>alert('Club added successfully');</script>";
        } else {
            echo "<script>alert('Error adding club: " . $stmt->error . "');</script>";
        }

        $stmt->close();
    }
}

$conn->close();
?>
