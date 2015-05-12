<?php
	//ini_set('display_errors',1);
	$to      = 'gerrerth.kaur@gmail.com';
	$subject = $_POST["full-name"] . " " . $_POST["email"];
	$message = $_POST["message"];

	//mail($to, $subject, $message);
	header("Refresh: 0; /proov");
?>