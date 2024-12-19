<?php
include 'conex.php';
$sql = "SELECT * FROM nationalityinformation";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    echo "<table border='1' cellpadding='10' cellspacing='0' style='border-collapse: collapse; display: inline-flex;'>";
    echo "<tr>
            <th>Nationality Name</th>
            <th>Nationality Flag</th>
            <th>Actions</th>
          </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['nationalityNAME'] . "</td>";
        echo "<td><img src='" . $row['nationalityURL'] . "' alt='Nationality Flag' width='50' /></td>";
        echo "<td>
                <form method='POST' action=''>
                    <input type='hidden' name='nationalityID' value='" . $row['nationalityID'] . "'>
                    <button type='submit' name='deleteNationalityBtn' class='actionbtn'>Delete</button>
                </form>

                <form method='POST' action='editnationality.php'>
                 <input type='hidden' name='playerID' value='" . $row['nationalityID'] . "'>
                <button type='submit' name='EditnationalityBtn' class='actionbtn'>Edit</button>
                </form>

              </td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No nationalities found.";
}
?>