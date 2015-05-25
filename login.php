<?php
session_start();
require_once( 'auth.php' );
?>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" type="text/css" href="style/login.css">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>

        <title>BOTO</title>
    </head>
    <body>
        <div id="backimg"></div>
        <div id="main-login">
            <a href="http://boto.azurewebsites.net/"><img id="logo" src="images/boto-white-big.png"  alt="boto logo" /></a>
            <div class="login">
                <form id='login-form' action='?' method='post' accept-charset='UTF-8'>

                    <label>Email</label>
                    <input type='text' name='email' id='email' maxlength="50" />

                    <label>Password</label>
                    <input type='password' name='password' id='password' maxlength="50" />

                    <input type='submit' name='Submit' value='Logi sisse' />

                    <a href="register.php">Registreeru</a>
                    <a href="#">Unustasite parooli?</a>
                </form>
                <div id="social_logins">
                    <?php 
                        if($_GET['msg']) { 
                            echo $_GET['msg']; 
                        } 
                        
                        echo '<a href="' . str_replace('&', '&amp;', $login_url) . '"><img src="images/fb_login.png" alt="facebook"></a>';
                        echo '<a href="#"><img src="images/google_login.png" alt="google"></a>';
                        echo '<a href="#"><img src="images/id_kaart_login.png" alt="id kaart"></a>';
                        echo '<a href="#"><img src="images/mobiil_id_login.png" alt="mobiil id"></a>';

                        $lst_page = $_SERVER['HTTP_REFERER'];
                        $_SESSION['lst_page'] = $lst_page;
                    ?>
                </div>
                <div style="clear: both;"></div>
            </div>
        </div>
    </body>
</html>