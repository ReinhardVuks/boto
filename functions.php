<?php

function dbconnect(){
	$servername="eu-cdbr-azure-north-b.cloudapp.net";
	$username="be6bf743499900";
	$password="2569fe2a";
	$dbname="botodb";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	if($conn->connect_error){
    	die("connection failed:" . $conn->connect_error);
	} else {
		return $conn;
	}
}

function getAllUsers() {
	$conn = dbconnect();
	$sql="SELECT * FROM user";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	    while($row = $result->fetch_assoc()) {
	        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    	} 
	} else {
	     echo "Error: " . $sql . "<br>" . $conn->error;
	}
}

function addUser($fname, $lname, $email, $pass) {
	$conn = dbconnect();
	$sql = "INSERT INTO user (firstname, lastname, email, pass) 
		VALUES ('$fname', '$lname', '$email', '$pass')";
	if ($conn->query($sql)) {
    	echo "New record created successfully";
	} else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
	}
}

function addUserFB($fname, $lname, $id) {
	$conn = dbconnect();
	$sql = "INSERT INTO user (firstname, lastname, facebook_id) 
		VALUES ('$fname', '$lname', '$id')";
	if ($conn->query($sql)) {
    	echo "New record created successfully";
	} else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
	}
}

function checkIfFBUserExists($fb_id) {
	$conn = dbconnect();
	$sql="SELECT EXISTS (SELECT * FROM user WHERE facebook_id = $fb_id) as bool";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	    while($row = $result->fetch_assoc()) {
	        if ($row['bool'] == 1) return true;
	        return false;
    	} 
	}
}

?>