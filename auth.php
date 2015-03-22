<?php
ob_start();
session_start();

include('functions.php');
require_once( 'facebook/facebook.php' );

$config = array(
    'appId' => '798278950247333',
    'secret' => 'e248bba7fba48375a683207df8380838',
    'allowSignedRequest' => false
);

$facebook = new Facebook( $config );
$user_id = $facebook->getUser();

if( $user_id ) {

    try {

        $profile = $facebook->api( '/me', 'GET' );
        $_SESSION['loggedin'] = true;
        $_SESSION['sess_name'] = $profile['name'];
        if (!checkIfFBUserExists($profile['id'])) {
            addUserFB($profile['first_name'], $profile['last_name'], $profile['id']);
        }

    } catch( FacebookApiException $e ) {

        $login_url = $facebook->getLoginUrl();
        require( 'login.php' );
        die();

    }

} else {

    $login_url = $facebook->getLoginUrl(); 
    require( 'login.php' );
    die();

}
header ("Refresh: 0; index.php");
