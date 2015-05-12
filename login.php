
<!DOCTYPE html>
<?php
session_start();
require_once('auth.php');
?>
<html>
    <head>
        <meta charset="utf-8" />

        <link rel="stylesheet" type="text/css" href="style/login.css">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>

        <title>BOTO</title>
    </head>
    <body>
        <div class="login">
            <form id='login-form' action='login_action.php' method='post' accept-charset='UTF-8'>

                <label>Email</label>
                <input type='text' name='email' id='email' maxlength="50" />

                <label>Password</label><a href="#">Unustasid parooli?</a>
                <input type='password' name='password' id='password' maxlength="50" />

                <input type='submit' name='Submit' value='Logi sisse' />
            </form>
            <div id="social_logins">
                <?php 
                    if($_GET['msg']) { 
                        echo $_GET['msg']; 
                    } 
                    
                    echo '<a href="' . $login_url . '"><img src="images/fb_login.png" alt="facebook"></a>';
                    echo '<a href="#"><img src="images/google_login.png" alt="google"></a>';
                    echo '<a href="#"><img src="images/id_kaart_login.png" alt="id kaart"></a>';
                    echo '<a href="#"><img src="images/mobiil_id_login.png" alt="mobiil id"></a>';

                    $lst_page = $_SERVER['HTTP_REFERER'];
                    $_SESSION['lst_page'] = $lst_page;
                ?>
            </div>
        </div>
    </body>
</html>