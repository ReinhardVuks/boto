<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" type="text/css" href="style/register.css">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>

        <script src="js/jquery-1.11.2.min.js" type="text/javascript"></script>
        <script src="js/register.js" type="text/javascript"></script>

        <title>BOTO</title>
    </head>
    <body>
        <div id="backimg"></div>
        <div id="main-register">
            <a href="http://boto.azurewebsites.net/"><img id="logo" src="images/boto-white-big.png" alt="boto logo"></a>
    	    <div class="register">
                <?php
                if($_GET['msg']) { 
                    echo '<span>' . $_GET["msg"] . '<span>';
                };
                ?>
                <form id='register-form' action='register_action.php' method='post' accept-charset='UTF-8'>
                    <input type='hidden' name='submitted' id='submitted' value='1'/>

                    <label>Email</label>
                    <input type='text' name='email' id='email' maxlength="50" />

                    <div id="valid"></div>
                    <div style="clear: both;"></div>

                    <label class="fname">Eesnimi</label>
                    <label class="lname">Perenimi</label>

                    <input type='text' name='fname' id='fname' maxlength="50" />
                    <input type='text' name='lname' id='lname' maxlength="50" />

                    <div style="clear: both;"></div>
                     
                    <label>Salasõna</label>
                    <input type='password' name='password' id='password' class="password" maxlength="50" />

                    <label>Kinnita salasõna</label>
                    <input type='password' name='repassword' id='repassword' class="password" maxlength="50" />

                    <input type='submit' name='Submit' value='Registreeru' />
                </form>
            </div>
        </div>
    </body>
</html>