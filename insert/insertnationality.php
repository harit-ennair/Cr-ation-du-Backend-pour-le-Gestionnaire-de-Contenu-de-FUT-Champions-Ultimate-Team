<?php
include 'conex.php';

if (isset($_POST['addNationalityBtn'])) {

    $nationalityName = isset($_POST['nationalityName']) ? trim($_POST['nationalityName']) : '';
    $nationalityURL = isset($_POST['nationalityURL']) ? trim($_POST['nationalityURL']) : '';

    if (empty($nationalityName) || empty($nationalityURL)) {
        echo "<script>alert('Please fill in both the nationality name and the nationality URL.');</script>";
    } else {
     
        $sql = "INSERT INTO nationalityinformation (nationalityName, nationalityURL) VALUES (?, ?)";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $nationalityName, $nationalityURL); 

        if ($stmt->execute()) {
            echo "<script>alert('Nationality added successfully');</script>";
        } else {
            echo "<script>alert('Error adding nationality: " . $stmt->error . "');</script>";
        }

        $stmt->close();
    }
}

$conn->close();
?>