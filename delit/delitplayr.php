<?php
include 'conex.php';
if (isset($_POST["playerID"]) && isset($_POST["deletePlayerBtn"])) {
    $playerID = $_POST["playerID"];
    
    $delete_sql = "DELETE FROM playerinformation WHERE playerID = ?";
    
    $stmt = $conn->prepare($delete_sql);
    
    $stmt->bind_param("i", $playerID);  
    
    if ($stmt->execute()) {
        echo "<script>
                alert('Player deleted successfully!');
                window.location.href = window.location.href;
              </script>";
    } else {
        echo "<script>
                alert('Error: Player could not be deleted!');
              </script>";
    }
}

 
$conn->close();

?>