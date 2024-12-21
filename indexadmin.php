<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>fifa</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>

    <nav class="navber">
        <div class="Logo">
            <img src="./image/Easports_fifa_logo.svg" alt="Logo">
            <span>photo Form</span>
        </div>
        <div class="navbtn">
            <a href="index.php"> <button id="navbtnadmin">user</button></a>
            
        </div>
    </nav>
    
    



<!-- insert player forma -->
    
    <div class="container">
            <h1>Add player</h1>
            <form id="playerForm" method="POST">

                <div class="form-group">
                    <label for="name">player Name</label>
                    <input type="text" id="name" name="name" required>
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

        include 'conex.php';
        
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
        include 'conex.php';
        

        $resultclub = mysqli_query($conn, "SELECT * FROM clubinformation");


        while ($rowclub = mysqli_fetch_assoc($resultclub)) {
            echo '<option value="' . $rowclub['clubID'] . '">' . $rowclub['clubNAME'] . '</option>';
        }
        ?>
    </select>
</div>

                <div id="form-group-pl-container">

                    <div class="form-group-pl">
                        <label for="pace"><span class="statsforme"></span></label>
                        <input type="number" id="pace" name="pace" name="rating" min="1" max="99">
                    </div>
                    <div class="form-group-pl">
                        <label for="shooting"><span class="statsforme"></span></label>
                        <input type="number" id="shooting" name="shooting" name="rating" min="1" max="99">
                    </div>
                    <div class="form-group-pl">
                        <label for="passing"><span class="statsforme"></span></label>
                        <input type="number" id="passing" name="passing" name="rating" min="1" max="99">
                    </div>
                    <div class="form-group-pl">
                        <label for="dribbling"><span class="statsforme"></span></label>
                        <input type="number" id="dribbling" name="dribbling" name="rating" min="1" max="99">
                    </div>
                    <div class="form-group-pl">
                        <label for="defending"><span class="statsforme"></span></label>
                        <input type="number" id="defending" name="defending" name="rating" min="1" max="99">
                    </div>
                    <div class="form-group-pl">
                        <label for="physical"><span class="statsforme"></span></label>
                        <input type="number" id="physical" name="physical" name="rating" min="1" max="99">
                    </div>
                </div>

                <button type="submit" name="addplayerbtn" id="addplayer">Add player</button>

            </form>
        </div>
    </div>
<?php
// insert player

include './insert/insertplayer.php';

?>



<!-- insert nationality forma -->

<div class="container">
<h1>Add Nationality</h1>
<form id="playerForm" method="POST">
  
        <div class="form-group">
            <label for="nationalityName">Nationality Name</label>
            <input type="text" id="nationalityName" name="nationalityName" required>
        </div>
   
        <div class="form-group">
            <label for="nationalityURL">Nationality URL</label>
            <input type="text" id="nationalityURL" name="nationalityURL" required>
        </div>

        <button type="submit" name="addNationalityBtn" id="addNationality">Add Nationality</button>
    </form>
</div>
<?php

// insert nationality

include './insert/insertnationality.php';
?>


<!-- insert club forma -->

<div class="container">
<h1>Add Club</h1>
<form id="playerForm" method="POST">

    <div class="form-group">
        <label for="clubName">Club Name</label>
        <input type="text" id="clubName" name="clubName" required>
    </div>

    <div class="form-group">
        <label for="clubURL">Club URL</label>
        <input type="text" id="clubURL" name="clubURL" required>
    </div>

    <button type="submit" name="addClubbtn" id="addClub">Add Club</button>
</form>
</div>
<?php
// insert club

include './insert/insertclub.php';

?>


<div id="alltabl" >


<?php
// afichag all player

include './afichag/afichagplayer.php';

?>

<div >
<div >
    
<?php
// afichag all nationality

include './afichag/afichagnationality.php';

?>
</div>

<div >
<?php
// afichag all club

include './afichag/afichagclub.php';

?>

</div>
</div>
</div>



<?php
// delit all playr

include './delit/delitplayr.php';

?>

<?php
// delit nationality

include './delit/delitnationality.php';

?>

<?php

// delit club
include './delit/delitclub.php';
// c'est mieux de separer les trois page, vous allez avoire des problèmes de performance
?>


<script>

const inputstats = Array.from(document.getElementsByClassName('form-group-pl'));

position.addEventListener('change', () => {
    inputstats.forEach(inputstatsselected => {
        if (position.value === '') {
            inputstatsselected.style.display = 'none';

        } else {
            inputstatsselected.style.display = 'block';
        }
    })
});

const Spans = document.querySelectorAll('.statsforme');//retorn nodelist

function updateStats() {
    if (position.value === 'GK') {

        Spans[0].textContent = 'DIV';
        Spans[1].textContent = 'REF';
        Spans[2].textContent = 'HAN';
        Spans[3].textContent = 'SPD';
        Spans[4].textContent = 'KIC';
        Spans[5].textContent = 'POS';
    } else {

        Spans[0].textContent = 'PAC';
        Spans[1].textContent = 'SHO';
        Spans[2].textContent = 'PAS';
        Spans[3].textContent = 'DRI';
        Spans[4].textContent = 'DEF';
        Spans[5].textContent = 'PHY';
    }
}

position.addEventListener('change', updateStats);

</script> 


</body>

</html>