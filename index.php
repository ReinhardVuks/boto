<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">
    <head>
        <meta charset="utf-8" />

        <link rel="stylesheet" type="text/css" href="style/style.css">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>

        <title>BOTO</title>
    </head>
    <body>
        <div id="newComps"></div>
	    <header class="background">
            <div class="help-menu">
                <ul>
                    <?php
                    if($_SESSION['loggedin']){
                     echo '<li><a>Welcome, ';
                     echo $_SESSION["sess_name"];
                     echo '</a></li>';
                     echo '<li><a href="logout.php">Logi välja</a></li>';
                     echo '<li><a href="create_competition.php">Loo ennustus</a></li>';
                     echo '<li><a href="competitions.php">Minu Ennustused</a></li>';
                    } else {
                        echo '<li><a href="login.php">Logi sisse</a></li>
                              <li><a href="register.php">Registreeru</a></li>
                            <li><a href="create_competition.php">Loo ennustus</a></li>';
                    }
                    ?>
                </ul>
            </div>
            <div class="banner">
                <div class="back">
                    <h1>Fortune favours the strong!</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum at porttitor nisl. Fusce elementum orci in lacus placerat viverra. Integer vestibulum tempor mollis. Fusce semper magna at augue finibus, vitae faucibus urna mollis. Proin elit nunc, cursus cursus sodales eget, pharetra quis ipsum. Integer tempor sem diam, in finibus dolor euismod eu.</p>
                </div>
                <h2>Discover more</h2>
                <img class="down-arrow" src="images/arrow-down.png" alt="down-arrow"/>
            </div>
        </header>
	    <div class="main-menu"></div>
    <script src="js/jquery-1.11.2.min.js" ></script>
    <script src="js/live.js" defer></script>
    </body>
    
    
</html>

