<?php


include 'conex.php';


if (isset($_POST["clubID"]) && isset($_POST["deleteClubBtn"])) {
    $clubID = $_POST["clubID"];
    
    $delete_sql = "DELETE FROM clubinformation WHERE clubID = ?";
    
    $stmt = $conn->prepare($delete_sql);
    $stmt->bind_param("i", $clubID);  
    
    if ($stmt->execute()) {
        echo "<script>
                alert('Club deleted successfully!');
                window.location.href = window.location.href;
              </script>";
    } else {
        echo "<script>
                alert('Error: Club could not be deleted!');
              </script>";
    }
}



?>