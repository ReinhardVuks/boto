<?php require_once( 'auth.php' ); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />

        <link rel="stylesheet" type="text/css" href="style/login.css">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>

        <title>BOTO</title>
    </head>
    <body>
        <div class="login">
            <?php if($_GET['msg']) { 
                echo '<span>' . $_GET["msg"] . '<span>';
            };
                echo '<a href="' . $login_url . '"><img src="images/fb_login.png" alt="Facebook login"/></a>';
            ?>
        </div>
    </body>
</html>