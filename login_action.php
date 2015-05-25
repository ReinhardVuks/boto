<?php 
session_start();
include "functions.php";
$error='';
if (isset($_POST['submit'])) {
	if (empty($_POST['username']) || empty($_POST['password'])) {
		$error = "Username or Password is invalid";
	} else {
	    $conn = dbconnect();
	    $email = $_POST['email'];
	    $pass = hash("sha512", $_POST['password']);
	    $sql="SELECT * FROM user WHERE email = '$email' AND pass = '$pass'";
	    $result = $conn->query($sql);
	    if ($result->num_rows > 0) {
	        $_SESSION['sess_name'] = $email;
			header("Location: index.php");
	    } else {
	        $error = "Username or Password is invalid";
	    }
	}
}
?>