<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Club</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body style="
    justify-content: center;
    display: flex">

<?php
include 'conex.php';  // include_once


if (isset($_POST["clubID"])) {
    $clubID = $_POST['clubID'];

  
    $sql = "SELECT * FROM clubinformation WHERE clubID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $clubID);
    $stmt->execute();
    $result = $stmt->get_result();

   
    if ($result->num_rows > 0) {
        $club = $result->fetch_assoc();
?>
<div  class="formeditplayer">
<div class="container">

    <h2>Edit Club</h2>
    <form id="clubForm" method="POST">
        <div class="form-group">
            <label for="clubName">Club Name:</label>
            <input type="text" id="clubName" name="clubName" value="<?= htmlspecialchars($club['clubNAME']); ?>" required>
        </div>

        <div class="form-group">
            <label for="clubURL">Club Flag URL:</label>
            <input type="text" id="clubURL" name="clubURL" value="<?= htmlspecialchars($club['clubURL']); ?>" required>
        </div>

        <input type="hidden" name="clubID" value="<?= $clubID; ?>">

        <button type="submit" name="updateClubBtn" id="addNationality">Update Club</button>
    </form>
</div>
</div>

<?php
    } else {
        echo "No club found with that ID.";
    }
    $stmt->close();
}

if (isset($_POST['updateClubBtn'])) {
    $clubID = $_POST['clubID'];
    $clubName = $_POST['clubName'];
    $clubURL = $_POST['clubURL'];

 
    $sqlUpdate = "UPDATE clubinformation SET clubNAME = ?, clubURL = ? WHERE clubID = ?";
    $stmtUpdate = $conn->prepare($sqlUpdate);
    $stmtUpdate->bind_param("ssi", $clubName, $clubURL, $clubID);

    if ($stmtUpdate->execute()) {
        echo "<script>alert('Club updated successfully');</script>";
     
        echo "<script>window.location.href = 'indexadmin.php';</script>";
    } else {
        echo "<script>alert('Error updating club: " . $stmtUpdate->error . "');</script>";
    }

    $stmtUpdate->close();
    header('Location: indexadmin.php');
}
?>

</body>
</html>
