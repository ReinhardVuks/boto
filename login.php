<!DOCTYPE html>
<?php
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
            <?php if($_GET['msg']) { echo $_GET['msg']; } ?>
	   <div class="login">
            <?php echo '<a href="' . $login_url . '"><img src="images/fb_login.png"></a>';?>
        </div>
    </body>
</html>