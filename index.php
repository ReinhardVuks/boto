<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" type="text/css" href="style/style.css">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>

        <title>BOTO</title>
    </head>
    <body>
	    <header class="background">
            <div class="help-menu">
                <a id="alogo" href="http://boto.azurewebsites.net/"><img src="images/boto-white.png" alt="boto logo"/></a>
                <ul>
                    <?php
                    if ($_SESSION['loggedin']){
                        echo '<li><a>' . $_SESSION["sess_name"] . '</a></li>
                            <li><a href="logout.php">Logi välja</a></li>';
                    } else {
                        echo '<li><a href="login.php">Logi sisse</a></li>
                            <li><a href="register.php">Registreeru</a></li>';
                    }
                    ?>
                </ul>
            </div>
            <div class="banner">
                <div class="back">
                    <h1>Õnn soosib tugevamaid!</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum at porttitor nisl.
                        Fusce elementum orci in lacus placerat viverra. Integer vestibulum tempor mollis.
                        Fusce semper magna at augue finibus, vitae faucibus urna mollis. Proin elit nunc,
                        cursus cursus sodales eget, pharetra quis ipsum. Integer tempor sem diam, in finibus
                        dolor euismod eu.</p>
                </div>
                <h2>Avasta rohkem</h2>
                <div id="down">
                    <a id="arrow-button">
                        <img id="main-img" src="images/arrow-down.png" alt="down-arrow">
                        <img id="replace-img" src="images/replace-arrow.png" alt="replace-arrow">
                    </a>
                </div>
            </div>
        </header>
        <div id="learn">
            <div id="learn-inner">
                <div class="step">
                    <h3>Logi sisse</h3>
                    <a href="login.php"><img src="images/key.png" alt="key authenticate" /></a>
                </div>
                <img class="right-arrow" src="images/right-arrow.png" alt="right arrow" />
                <div class="step">
                    <h3>Loo ennustus</h3>
                    <a href="create_competition.php"><img src="images/create.png" alt="create" /></a>
                </div>
                <img class="right-arrow" src="images/right-arrow.png" alt="right arrow" />
                <div class="step">
                    <h3>Kutsu sõpru</h3>
                    <a href="create_competition.php"><img src="images/people.png" alt="people" /></a>
                </div>
                <img class="right-arrow" src="images/right-arrow.png" alt="right arrow" />
                <div class="step">
                    <h3>Ennusta</h3>
                    <a href="competitions.php"><img src="images/bet.png" alt="bet" /></a>
                </div>
                <img class="right-arrow" src="images/right-arrow.png" alt="right arrow" />
                <div class="step">
                    <h3>Võida</h3>
                    <a href="competitions.php"><img src="images/money.png" alt="money bag" /></a>
                </div>
            </div>
        </div>
	    <div id="main-menu">
            <div id="menu">
                <?php
                    if ($_SESSION['loggedin']){
                        echo '<a class="orange size" href="login.php">Avalehele</a>';
                    } else {
                        echo '<a class="orange size" href="login.php">Logi sisse</a>';
                    }
                ?>
                <a class="pink size" href="register.php">Registreeru</a>
                <a class="blue size" href="create_competition.php">Loo ennustus</a>
                <a class="yellow size" href="#">Edetabelid</a>
                <a class="purple size" href="competitions.php#myCompetitions">Minu ennustused</a>
                <a class="green size" href="#">Minu profiil</a>
                <div class="clearer"></div>
            </div>
        </div>
        <div class="clearer"></div>
        <script src="js/jquery-1.11.2.min.js" ></script>
        <script src="js/live.js" defer></script>
        <script src="js/windowsmenu.js" defer></script>
        <script src="js/main.js" defer></script>
<?php include "footer.php"; ?>