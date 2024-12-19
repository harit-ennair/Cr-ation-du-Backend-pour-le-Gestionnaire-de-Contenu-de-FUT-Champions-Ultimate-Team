
<?php

include 'conex.php';

if (isset($_POST["nationalityID"]) && isset($_POST["deleteNationalityBtn"])) {

    $nationalityID = $_POST["nationalityID"];
    
    $delete_sql = "DELETE FROM nationalityinformation WHERE nationalityID = ?";
    $stmt = $conn->prepare($delete_sql);
    
    $stmt->bind_param("i", $nationalityID);  
    
    if ($stmt->execute()) {
        echo "<script>
        alert('Nationality deleted successfully!');
        window.location.href = window.location.href;
        </script>";
    } else {
        echo "<script>
        alert('Error: Nationality could not be deleted!');
        </script>";
    }
}

?>
