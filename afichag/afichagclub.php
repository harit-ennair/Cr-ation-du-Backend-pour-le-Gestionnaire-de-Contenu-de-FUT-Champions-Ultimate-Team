<?php
include 'conex.php';
$sql = "SELECT * FROM clubinformation";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    echo "<table border='1' cellpadding='10' cellspacing='0' style='border-collapse: collapse; display: inline-flex;'>";
    echo "<tr>
            <th>Club Name</th>
            <th style=\"padding: 0 27px;\">Club Logo</th>
            <th>Actions</th>
          </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['clubNAME'] . "</td>";
        echo "<td><img src='" . $row['clubURL'] . "' alt='Club Logo' width='50' /></td>";
        echo "<td>
                <form method='POST' action=''>
                    <input type='hidden' name='clubID' value='" . $row['clubID'] . "'>
                    <button type='submit' name='deleteClubBtn' class='actionbtn'>Delete</button>
                </form>

                 <form method='POST' action='editclub.php'>
                 <input type='hidden' name='clubID' value='" . $row['clubID'] . "'>
                <button type='submit' name='EditclubyBtn' class='actionbtn'>Edit</button>
                </form>

              </td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No clubs found.";
}
?>