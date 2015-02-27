<?php

include "ocspcheck.php";

if (!$_SERVER["SSL_CLIENT_CERT"])
{
	echo "Couldn't get client SSL certificate (ID-card autentication certificate)!";
}
else
{
	$result = doOCSPcheck($_SERVER["SSL_CLIENT_CERT"]);

	echo "<p>MESSAGE: " . $result[0] . "<br>";
	echo "RESPONSE: ".$result[1]."</p>";
}

?>