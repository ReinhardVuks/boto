
<!DOCTYPE html>
<?php
session_start();
?>
<html>
    <head>
        <meta charset="utf-8" />
<<<<<<< HEAD
        <meta name="viewport" content="width=device-width, initial-scale=1">
        

        <link rel="stylesheet" type="text/css" href="style/style.css">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'/>
        <link rel="stylesheet" type="text/css" href="style/jquery-1.11.4.ui.css">
=======

        <link rel="stylesheet" type="text/css" href="style/style.css">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'/>
>>>>>>> c725b2c9653b1c65aa732ce79d010911577e7469

        <title>BOTO</title>
    </head>
    <body>
<<<<<<< HEAD
        <div id="backimg"></div>
        <div id="create-comps">
            <div class="help-menu">
                <ul>
                    <li><a href="competitions.php#myCompetitions">Minu ennustused</a></li>
                    <li><a href="create_competition.php">Loo ennustus</a></li>
                    <li><a href="#">Minu profiil</a></li>
                    <li><a href="logout.php">Logi välja</a></li>
                </ul>
            </div>
            <a href="http://boto.azurewebsites.net/"><img id="logo" src="images/boto-white-big.png" alt="boto logo"></a>
            <div class="main-create">
                <div class='create_competition'>
                <?php

                    if($_GET['msg']) { 
                        echo '<span>' . $_GET["msg"] . '<span>';

                    };
                    if($_SESSION['loggedin'] ==  false){
                        header ("Refresh: 0; login.php");
                    } else {
                    ?>
                    <h1>Loo ennustus</h1>
            	    <form name="competition" id='create-competition' action='create_competition_action.php' method='post' accept-charset='UTF-8'>
                        <div id="need">
                            <div id="floater">
                                <label for='compname'>Ennustusvõistluse nimi</label>
                                <input type='text' name='compname' id='compname' maxlength="50" />
                            </div>

                            <div id="floater2">
                                <label>Osalejate arv</label>
                                <input type='radio' name='participants' id='participantsun' value='unlimited' />
                                <label for="participantsun">Piiramata</label>
                                <input type='radio' name='participants' id='participants' value='limited' />
                                <label for="participants">Piiratud</label>
                            </div>
                            <div class="clearer"></div>

                            <div class="ui-widget">
                                <label for="users">Lubatud kasutajad:</label>
                                <input id="users" name="users">
                                
                                <input id="list" name="userlist" type="hidden">
                                <?php echo '<input id="creator" type="hidden" value="'. $_SESSION["sess_name"].'">';?>
                            </div>
                            <input type='text' name='partnum' id='partnum' placeholder="Sisesta arv" />
                            <div class="clearer"></div>
                        </div>
                        <h2>Küsimused</h2>
                        <div id="main">
                            <a id="addButton">
                                <img id="main-img" src="images/add.png" alt="add">
                                <img id="replace-img" src="images/add-replace.png" alt="add">
                            </a>
                            <!--<input type="button" id="removeButton" value="Eemalda Küsimus" class="bt" />
                            <input type="button" id="removeAllButton" value="Eemalda Kõik" class="bt" />-->

                        </div>
                        <input type='submit' id="submit" name='submit' value='Loo ennustus' />
                    </form>
                    <?php }; ?>
                </div>
=======
        <div class="main">
            <div class='create_competition'>
            <?php

                if($_GET['msg']) { 
                    echo '<span>' . $_GET["msg"] . '<span>';

                };
                if($_SESSION['loggedin'] ==  false){
                    header ("Refresh: 0; login.php");
                } else {
                ?>
        	    <form name="competition" id='create-competition' action='create_competition_action.php' method='post' accept-charset='UTF-8'>

                    <label for='compname'>Ennustusvõistluse nimi</label>
                    <input type='text' name='compname' id='compname' maxlength="50" />
                    <br>

                    <label for='participants'>Osalejate arv</label>
                    <input type='radio' name='participants' id='participants' value='unlimited' />Piiramata
                    <input type='radio' name='participants' id='participants' value='limited' />Piiratud
                    <br>

                    <input type='text' name='partnum' id='partnum' />
                    <br>
                    <div class="ui-widget">
                        <label for="users">Users: </label>
                        <input id="users" name="users">
                        
                        <input id="list" name="userlist" type="hidden">
 
                   
                    </div>

                   

                    <div id="main">
                        <input type="button" id="addButton" value="Lisa Küsimus" class="bt" />
                        <input type="button" id="removeButton" value="Eemalda Küsimus" class="bt" />
                        <input type="button" id="removeAllButton" value="Eemalda Kõik" class="bt" /><br />

                    </div>
                    <input type='submit' id="submit" name='submit' value='Submit' />
                </form>
                <?php }; ?>
>>>>>>> c725b2c9653b1c65aa732ce79d010911577e7469
            </div>
        </div>
    <script src="js/jquery-1.11.2.min.js"></script>
    <script src="js/jquery-1.11.4.ui.js"></script>
    <script src="js/create_competition.js" defer></script>
<<<<<<< HEAD
<?php include "footer.php"; ?>
=======

    
    </body>
   
</html>
>>>>>>> c725b2c9653b1c65aa732ce79d010911577e7469
