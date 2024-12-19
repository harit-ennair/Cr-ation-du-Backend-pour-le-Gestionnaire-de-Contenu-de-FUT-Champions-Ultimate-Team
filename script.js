
const playerForm = document.getElementById('playerForm');

let positionCounts = {
    CF: 0,
    RW: 0,
    LW: 0,
    CM: 0,
    CDM: 0,
    LB: 0,
    RB: 0,
    CB: 0,
    GK: 0
};



playerForm.addEventListener('submit', function (event) {
    event.preventDefault();

    const addplayer = document.getElementById('addplayer')

    const name = document.getElementById('name').value;
    const photo = document.getElementById('photo').value;
    const position = document.getElementById('position').value;
    const nationality = document.getElementById('nationality').value;
    const club = document.getElementById('club').value;

    const pace = document.getElementById('pace').value;
    const shooting = document.getElementById('shooting').value;
    const passing = document.getElementById('passing').value;
    const dribbling = document.getElementById('dribbling').value;
    const defending = document.getElementById('defending').value;
    const physical = document.getElementById('physical').value;

    const pace1 = parseInt(pace);
    const shooting1 = parseInt(shooting);
    const passing1 = parseInt(passing);
    const dribbling1 = parseInt(dribbling);
    const defending1 = parseInt(defending);
    const physical1 = parseInt(physical);

    const rating = parseInt((pace1 + shooting1 + passing1 + dribbling1 + defending1 + physical1) / 6);

    if (pace < 1 || pace > 99 || shooting < 1 || shooting > 99 || passing < 1 || passing > 99 || dribbling < 1 || dribbling > 99 || defending < 1 || defending > 99 || physical < 1 || physical > 99) {
        alert("Please respect the role of the rating.");
        return;
    }

    if (!name || !photo || !nationality || !club || !position || !rating) {
        alert("Please fill in all fields.");
        return;
    }

    const playerCard = document.createElement('div');
    playerCard.classList.add('LM');

    const buttoncontainer = document.createElement('div');
    buttoncontainer.className = 'buttoncontainer';

    const editButton = document.createElement('button');
    editButton.className = 'edit';
    editButton.textContent = '✏️';

    const deleteButton = document.createElement('button');
    deleteButton.className = 'delete';
    deleteButton.textContent = '🗑️';

    deleteButton.addEventListener('click', function () {
        playerCard.remove();
        positionCounts[position]--;
    });

    
    editButton.addEventListener('click', function () {
        positionCounts[position]--;

        document.getElementById('name').value = name;
        document.getElementById('photo').value = photo;
        document.getElementById('position').value = position;
        document.getElementById('nationality').value = nationality;
        document.getElementById('club').value = club;

        document.getElementById('pace').value = pace;
        document.getElementById('shooting').value = shooting;
        document.getElementById('passing').value = passing;
        document.getElementById('dribbling').value = dribbling;
        document.getElementById('defending').value = defending;
        document.getElementById('physical').value = physical;

        addplayer.addEventListener('click', function () {
            playerCard.remove();
            console.log(positionCounts)
        });
    });

    buttoncontainer.appendChild(editButton);
    buttoncontainer.appendChild(deleteButton);
    playerCard.appendChild(buttoncontainer);



    const cardContent = document.createElement('div');
    cardContent.classList.add('card-content');

    const raytingpransipal = document.createElement('div');
    raytingpransipal.id = 'rayting-pransipal'; 

    const playerphotocontainr = document.createElement('div');
    playerphotocontainr.id = 'playerphotocontainr';

    const photoflagclubcontainr = document.createElement('div');
    photoflagclubcontainr.id = 'photoflagclubcontainr';

    const photoflagcontainr = document.createElement('div');
    photoflagcontainr.id = 'photoflagcontainr';

    const flagphoto = document.createElement('img');
    flagphoto.id = 'flagphoto'

    photoflagclubcontainr.appendChild(photoflagcontainr);
    photoflagcontainr.appendChild(flagphoto);
    flagphoto.src = nationality;

    const photoclubcontainr = document.createElement('div');
    photoclubcontainr.id = 'photoclubcontainr';

    const clubphoto = document.createElement('img');
    clubphoto.id = 'clubphoto'

    photoflagclubcontainr.appendChild(photoclubcontainr);
    photoclubcontainr.appendChild(clubphoto);
    clubphoto.src = club;

    const playerphoto = document.createElement('img');
    playerphoto.id = 'playerphoto'
    playerphoto.src = photo;

    playerphotocontainr.appendChild(playerphoto);
    playerphotocontainr.appendChild(photoflagclubcontainr);

    const playerrayting = document.createElement('p');
    playerrayting.textContent = rating;
    raytingpransipal.appendChild(playerrayting)

    const playerpost = document.createElement('p');
    playerpost.textContent = position;
    raytingpransipal.appendChild(playerpost)

    const playerName = document.createElement('p');
    playerName.textContent = name;

    const playerStatscontent = document.createElement('div');
    playerStatscontent.classList.add('player-stats-content');

    const playerrait = document.createElement('p');
    playerrait.textContent = "PAC  SHO  PAS  DRI  DEF  PHY"

    const playerraitgk = document.createElement('p');
    playerraitgk.textContent = "DIV HAN KIC REF SPE POS"

    const playerStats = document.createElement('div');
    playerStats.classList.add('player-stats');

    if (position === 'GK') {
        playerStatscontent.appendChild(playerraitgk);
    } else {
        playerStatscontent.appendChild(playerrait);
    }

    function createStat(value) {
        let stat = document.createElement('div');
        stat.textContent = value;
        return stat;
    }

    playerStats.appendChild(createStat(pace));
    playerStats.appendChild(createStat(shooting));
    playerStats.appendChild(createStat(passing));
    playerStats.appendChild(createStat(dribbling));
    playerStats.appendChild(createStat(defending));
    playerStats.appendChild(createStat(physical));

    cardContent.appendChild(raytingpransipal);
    cardContent.appendChild(playerphotocontainr);
    cardContent.appendChild(playerName);
    cardContent.appendChild(playerStatscontent);
    cardContent.appendChild(playerStats);
    playerCard.appendChild(cardContent);

    if (rating < 50) {
        playerCard.style.backgroundImage = `url(./image/silver1.png)`;
    } else if (rating >= 50 && rating < 70) {
        playerCard.style.backgroundImage = `url(./image/badge_gold.webp)`;
    } else if (rating >= 70 && rating < 80) {
        playerCard.style.backgroundImage = `url(./image/badge_ballon_dor.webp)`;
    } else {
        playerCard.style.backgroundImage = `url(./image/badge_total_rush.webp)`;
    }

    switch (position) {
        case ('GK'):
            if (positionCounts.GK <= 0) {
                document.getElementById('goal').appendChild(playerCard);
                positionCounts.GK++;
                
            } else {
                document.getElementById('substitute').appendChild(playerCard);
                positionCounts.GK++;
            }
            break;

        case ('CF'):
            if (positionCounts.CF <= 0) {
                document.getElementById('stcard').appendChild(playerCard);
                positionCounts.CF++;
                
            } else {
                document.getElementById('substitute').appendChild(playerCard);
                positionCounts.CF++;
            }
            break;

        case ('LW'):
            if (positionCounts.LW <= 0) {
                document.getElementById('lwcard').appendChild(playerCard);
                positionCounts.LW++;
                
            } else {
                document.getElementById('substitute').appendChild(playerCard);
                positionCounts.LW++;
            }
            break;

        case ('RW'):
            if (positionCounts.RW <= 0) {
                document.getElementById('rwcard').appendChild(playerCard);
                positionCounts.RW++;
                
            } else {
                document.getElementById('substitute').appendChild(playerCard);
                positionCounts.RW++;
            }
            break;

        case ('CM'):
            if (positionCounts.CM < 2) {
                document.getElementById('medfild').appendChild(playerCard);
                positionCounts.CM++;
                
            } else {
                document.getElementById('substitute').appendChild(playerCard);
                positionCounts.CM++;
            }
            break;

        case ('CDM'):
            if (positionCounts.CDM <= 0) {
                document.getElementById('medfild').appendChild(playerCard);
                positionCounts.CDM++;
                
            } else {
                document.getElementById('substitute').appendChild(playerCard);
                positionCounts.CDM++;
            }
            break;

        case ('LB'):
            if (positionCounts.LB <= 0) {
                document.getElementById('lbcard').appendChild(playerCard);
                positionCounts.LB++;
                
            } else {
                document.getElementById('substitute').appendChild(playerCard);
                positionCounts.LB++;
            }
            break;

        case ('RB'):
            if (positionCounts.RB <= 0) {
                document.getElementById('rbcard').appendChild(playerCard);
                positionCounts.RB++;
                
            } else {
                document.getElementById('substitute').appendChild(playerCard);
                positionCounts.RB++;
            }
            break;

        case ('CB'):
            if (positionCounts.CB < 2) {
                document.getElementById('CBcard').appendChild(playerCard);
                positionCounts.CB++;
                
            } else {
                document.getElementById('substitute').appendChild(playerCard);
                positionCounts.CB++;
            }
            break;
    }


    playerForm.reset();


    
});


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







