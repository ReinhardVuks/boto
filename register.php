<!DOCTYPE html>

<?php
$_SESSION['url']=$_SERVER['REQUEST URI'];
?>

<html lang="en">
    <head>
        <meta charset="utf-8" />

        <link rel="stylesheet" type="text/css" href="style/register.css">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>

        <script src="js/jquery-1.11.2.min.js" type="text/javascript"></script>
        <script src="js/register.js" type="text/javascript"></script>

        <title>BOTO</title>
    </head>
    <body>
	    <div class="register">
            <?php
            echo '<li><a href="login.php">Logi sisse</a></li>';
            if($_GET['msg']) {
                echo $_GET['msg'];
            <?php
            if($_GET['msg']) {
                echo $_GET['msg'];
            }
            ?>
            <form id='register-form' action='register_action.php' method='post' accept-charset='UTF-8'>
                <input type='hidden' name='submitted' id='submitted' value='1'/>

                <label for='email'>Email</label>
                <input type='text' name='email' id='email' maxlength="50" />

                <div id="valid"></div>

                <label for='name'>Firstname</label>
                <input type='text' name='fname' id='fname' maxlength="50" />

                <label for='name'>Lastname</label>
                <input type='text' name='lname' id='lname' maxlength="50" />
                 
                <label for='password'>Password</label>
                <input type='password' name='password' id='password' maxlength="50" />
                <input type='submit' name='Submit' value='Submit' />
            </form>
        </div>
    </body>
</html>