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
$host = 'localhost';
$dbname = 'player';
$username = 'root';
$password = '';

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['EditPlayerBtn']) && isset($_POST['playerID'])) {


    
   
    $playerID = $_POST['playerID'];

    $sql = "SELECT * FROM playerinformation WHERE playerID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $playerID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $player = $result->fetch_assoc();
?>
            <div class="formeditplayer" style="width:500px">
        <form method="POST" id="playerFormedit" >
            <div class="form-group">
                <label for="name">Player Name</label>
                <input type="text" id="name" name="name" value="<?= htmlspecialchars($player['playerNAME']); ?>" required>
            </div>
            
            <div class="form-group">
                    <label for="photo">Photo URL</label>
                    <select id="photo" name="photo">
                        <option value="">Select a photo</option>
                        <option value="https://cdn.sofifa.net/players/158/023/25_120.png">photo 1</option>
                        <option value="https://cdn.sofifa.net/players/020/801/25_120.png">photo 2</option>
                        <option value="https://cdn.sofifa.net/players/192/985/25_120.png">photo 3</option>
                        <option value="https://cdn.sofifa.net/players/231/747/25_120.png">photo 4</option>
                        <option value="https://cdn.sofifa.net/players/203/376/25_120.png">photo 5</option>
                        <option value="https://cdn.sofifa.net/players/205/452/25_120.png">photo 6</option>
                        <option value="https://cdn.sofifa.net/players/190/871/25_120.png">photo 7</option>
                        <option value="https://cdn.sofifa.net/players/192/985/25_120.png">photo 8</option>
                        <option value="https://cdn.sofifa.net/players/212/622/25_120.png">photo 9</option>
                        <option value="https://cdn.sofifa.net/players/200/389/25_120.png">photo 10</option>
                        <option value="https://cdn.sofifa.net/players/177/003/25_120.png">photo 11</option>
                        <option value="https://cdn.sofifa.net/players/238/794/25_120.png">photo 12</option>
                        <option value="https://cdn.sofifa.net/players/231/410/25_120.png">photo 13</option>
                        <option value="https://cdn.sofifa.net/players/165/153/25_120.png">photo 14</option>
                        <option value="https://cdn.sofifa.net/players/239/085/25_120.png">photo 15</option>
                        <option value="https://cdn.sofifa.net/players/215/914/25_120.png">photo 16</option>
                        <option value="https://cdn.sofifa.net/players/234/396/25_120.png">photo 17</option>
                        <option value="https://cdn.sofifa.net/players/209/981/25_120.png">photo 18</option>
                        <option value="https://cdn.sofifa.net/players/212/198/25_120.png">photo 19</option>
                        <option value="https://cdn.sofifa.net/players/233/049/25_120.png">photo 20</option>
                        <option value="https://cdn.sofifa.net/players/231/281/25_120.png">photo 21</option>
                        <option value="https://cdn.sofifa.net/players/235/212/25_120.png">photo 22</option>
                        <option value="https://cdn.sofifa.net/players/235/410/25_120.png">photo 23</option>
                        <option value="https://cdn.sofifa.net/players/236/401/25_120.png">photo 24</option>
                        <option value="https://cdn.sofifa.net/players/259/480/25_120.png">photo 25</option>
                        <option value="https://cdn.sofifa.net/players/230/621/25_120.png">photo 26</option>
                    </select>
                </div>

            <div class="form-group">
                    <label for="position">Position</label>
                    <select id="position" name="position" required>
                        <option value="">Select a Position</option>
                        <option value="RW">Right Wing</option>
                        <option value="LW">Left Wing</option>
                        <option value="CF">Center Forward</option>
                        <option value="CM">Center Midfielder</option>
                        <option value="CDM">Defensive Midfielder</option>
                        <option value="CB">Center Back</option>
                        <option value="RB">Right Back</option>
                        <option value="LB">Left Back</option>
                        <option value="GK">Goalkeeper</option>
                    </select>
                </div>

                          <div class="form-group">
    <label for="nationality">Nationality</label>
    <select id="nationality" name="nationality" required>
        <option value="">Select a Nationality</option>
        <?php
        $host = 'localhost';
        $dbname = 'player';
        $username = 'root';
        $password = '';
        
        $conn = new mysqli($host, $username, $password, $dbname);
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        
        $resultNationality = mysqli_query($conn, "SELECT * FROM nationalityinformation");
        while ($rowNationality = mysqli_fetch_assoc($resultNationality)) {
            echo '<option value="' . $rowNationality['nationalityID'] . '">' . $rowNationality['nationalityNAME'] . '</option>';
        }
        ?>
    </select>
</div>

           

<div class="form-group">
    <label for="club">Club</label>
    <select id="club" name="club" required>
        <option value="">Select a Club</option>
        <?php
        $host = 'localhost';
        $dbname = 'player';
        $username = 'root';
        $password = '';
        
        $conn = new mysqli($host, $username, $password, $dbname);
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        

        $resultclub = mysqli_query($conn, "SELECT * FROM clubinformation");


        while ($rowclub = mysqli_fetch_assoc($resultclub)) {
            echo '<option value="' . $rowclub['clubID'] . '">' . $rowclub['clubNAME'] . '</option>';
        }
        ?>
    </select>

            <div class="form-group">
                <label for="pace">Pace</label>
                <input type="number" id="pace" name="pace" value="<?= $player['PAC']; ?>" min="1" max="99">
            </div>

            <div class="form-group">
                <label for="shooting">Shooting</label>
                <input type="number" id="shooting" name="shooting" value="<?= $player['SHO']; ?>" min="1" max="99">
            </div>

            <div class="form-group">
                <label for="passing">Passing</label>
                <input type="number" id="passing" name="passing" value="<?= $player['PAS']; ?>" min="1" max="99">
            </div>

            <div class="form-group">
                <label for="dribbling">Dribbling</label>
                <input type="number" id="dribbling" name="dribbling" value="<?= $player['DRI']; ?>" min="1" max="99">
            </div>

            <div class="form-group">
                <label for="defending">Defending</label>
                <input type="number" id="defending" name="defending" value="<?= $player['DEF']; ?>" min="1" max="99">
            </div>

            <div class="form-group">
                <label for="physical">Physical</label>
                <input type="number" id="physical" name="physical" value="<?= $player['PHY']; ?>" min="1" max="99">
            </div>

            <input type="hidden" name="playerID" value="<?= $player['playerID']; ?>">

            <button type="submit" id="addplayer" name="updatePlayerBtn">Update Player</button>
        </form>
    </div>
<?php
    } else {
        echo "<script>alert('Player not found.');</script>";
    }
}

if (isset($_POST['updatePlayerBtn'])) {

    // Check if all fields are set
    if (empty($_POST['name']) || empty($_POST['photo']) || empty($_POST['position']) || empty($_POST['nationality']) || empty($_POST['club'])) {
        echo "<script>alert('Please fill all the fields.');</script>";
    } else {
        $playerID = $_POST['playerID'];
        $name = $_POST['name'];
        $photo = $_POST['photo'];
        $position = $_POST['position'];
        $nationality = $_POST['nationality'];
        $club = $_POST['club'];
        $pace = $_POST['pace'];
        $shooting = $_POST['shooting'];
        $passing = $_POST['passing'];
        $dribbling = $_POST['dribbling'];
        $defending = $_POST['defending'];
        $physical = $_POST['physical'];

        $rating = ($pace + $shooting + $passing + $dribbling + $defending + $physical) / 6;

        $sql = "UPDATE playerinformation 
                SET playerNAME = ?, PhotoURL = ?, Position = ?, nationalityID = ?, clubID = ?, PAC = ?, SHO = ?, PAS = ?, DRI = ?, DEF = ?, PHY = ?, Rating = ? 
                WHERE playerID = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssiiiiiiiiii", $name, $photo, $position, $nationality, $club, $pace, $shooting, $passing, $dribbling, $defending, $physical, $rating, $playerID);

        if ($stmt->execute()) {
            echo "<script>alert('Player updated successfully');</script>";
        } else {
            echo "<script>alert('Error updating player: " . $stmt->error . "');</script>";
        }

        $stmt->close();
       
        header('Location: indexadmin.php');

    }
}


?>


</body>
</html>

