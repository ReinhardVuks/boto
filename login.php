<!DOCTYPE html>
<?php
session_start();
require_once( 'auth.php' );
?>
<html lang="en">
    <head>
        <meta charset="utf-8" />

        <link rel="stylesheet" type="text/css" href="style/login.css">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>

        <title>BOTO</title>
    </head>
    <body>
        <div class="login">
        <?php 

        if($_GET['msg']) { 
            echo $_GET['msg']; 
        } 
        
        echo '<a href="' . $login_url . '"><img src="images/fb_login.png"></a>';

        $lst_page = $_SERVER['HTTP_REFERER'];
        $_SESSION['lst_page'] = $lst_page;
        

        ?>
        </div>
    </body>
</html>