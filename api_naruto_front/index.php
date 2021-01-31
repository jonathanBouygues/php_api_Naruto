<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Api naruto</title>
    <link href="css/style.css" rel="stylesheet">
    <script src="js/app.js" defer></script>
</head>

<body>
    <section>
        <div class="title">
            <h1>API NARUTO</h1>
        </div>
    </section>
    <section class="module">
        <div class="part1">
            <div class="get">
                <!-- Get -->
                <div class="methode">GET</div>
                <div class="header">
                    <h2>LIST NINJA</h2>
                </div>
                <div class="list">
                    <?php
                    include('getdatas.php');
                    ?>
                </div>
                <!-- Update -->
                <form class="update" method="post" id="idUpdate" action="put.php">
                    <span>Modify the desired fields</span>
                    <input type="hidden" name="dataIdPut">
                    <label for="village">First name</label>
                    <input type="text" name="dataFirstNamePut">
                    <label for="village">Last name</label>
                    <input type="text" name="dataLastNamePut">
                    <label for="village">Village</label>
                    <input type="number" name="dataIdVillagePut" max="6">
                    <label for="village">Skill</label>
                    <input type="text" name="dataSkillPut">
                    <input type="submit" value="Change">
                </form>
                <!-- Delete -->
                <form method="post" id="idDelete" action="delete.php">
                    <input type="hidden" name="dataId">
                </form>
            </div>
        </div>
        <div class="part2">
            <div class="post">
                <div class="methode">POST</div>
                <div class="header">
                    <h2>NEW NINJA</h2>
                </div>
                <div class="formpost">
                    <form method="post" action="http://localhost/php/tpApiNaruto/characters">
                        <div>
                            <input type="text" name="firstName" placeholder="First name">
                        </div>
                        <div>
                            <input type="text" name="lastName" placeholder="last name">
                        </div>
                        <div class="village">
                            <label for="village">village</label>
                            <input type="number" name="idVillage" id="village" max="6">
                        </div>
                        <div>
                            <input type="text" name="skill" placeholder="skill">
                        </div>
                        <div class="submit">
                            <input type="submit" value="Add">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>