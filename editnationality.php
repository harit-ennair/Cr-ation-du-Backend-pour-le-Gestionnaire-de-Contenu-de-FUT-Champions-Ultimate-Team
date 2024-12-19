

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body style="
    justify-content: center;
    display: flex">
    



    <?php
include 'conex.php';  







if (isset($_POST["nationalityID"]) ) {
    
    $nationalityID = $_POST['nationalityID'];
    
    
    $sql = "SELECT * FROM nationalityinformation WHERE nationalityID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $nationalityID);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $nationality = $result->fetch_assoc();
        ?>



<div  class="formeditplayer">
<div class="container">
    
    <h2>Edit Nationality</h2>
<form id="playerForm" method="POST">
  
        <div class="form-group">
        <label for="nationalityName">Nationality Name:</label>
        <input type="text" id="nationalityName" name="nationalityName" value="<?= htmlspecialchars($nationality['nationalityNAME']); ?>" required>
        </div>
   
        <div class="form-group">
        <label for="nationalityURL">Nationality Flag URL:</label>
        <input type="text" id="nationalityURL" name="nationalityURL" value="<?= htmlspecialchars($nationality['nationalityURL']); ?>" required>
        </div>

        <button type="submit" name="updateNationalityBtn" id="addNationality">Edit Nationality</button>
    </form>
</div>
</div>



<?php
    } else {
        echo "No nationality found with that ID.";
    }
    
    $stmt->close();
}


if (isset($_POST['updateNationalityBtn'])) {
    $nationalityID = $_POST['nationalityID'];
    $nationalityName = $_POST['nationalityName'];
    $nationalityURL = $_POST['nationalityURL'];
    
    
    $sqlUpdate = "UPDATE nationalityinformation SET nationalityNAME = ?, nationalityURL = ? WHERE nationalityID = ?";
    $stmtUpdate = $conn->prepare($sqlUpdate);
    $stmtUpdate->bind_param("ssi", $nationalityName, $nationalityURL, $nationalityID);
    
    if ($stmtUpdate->execute()) {
        echo "<script>alert('Nationality updated successfully');</script>";
        echo "<script>window.location.href = 'nationalities.php';</script>"; 
    } else {
        echo "<script>alert('Error updating nationality: " . $stmtUpdate->error . "');</script>";
    }
    
    $stmtUpdate->close();
    header('Location: indexadmin.php');
}
?>

</body>
</html>
