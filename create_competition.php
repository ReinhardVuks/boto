<!DOCTYPE html>
<?php
session_start();
?>
<html>
    <head>
        <meta charset="utf-8" />

        <link rel="stylesheet" type="text/css" href="style/style.css">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'/>

        <title>BOTO</title>
    </head>
    <body>
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
                    <input type='text' name='allowed' id='allowedusers' placeholder='kutsu kasutajaid'/>

                   

                    <div id="main">
                        <input type="button" id="addButton" value="Lisa Küsimus" class="bt" />
                        <input type="button" id="removeButton" value="Eemalda Küsimus" class="bt" />
                        <input type="button" id="removeAllButton" value="Eemalda Kõik" class="bt" /><br />

                    </div>
                    <input type='submit' id="submit" name='Submit' value='Submit' />
                </form>
                <?php }; ?>
            </div>
        </div>
    <script src="js/jquery-1.11.2.min.js"></script>
    <script src="js/create_competition.js" defer></script>
    </body>
   
</html>