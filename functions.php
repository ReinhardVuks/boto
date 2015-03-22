<?php

function dbconnect(){
	$servername="boto.cloudapp.net";
	$username="guest";
	$password="visitor";
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
    	header("Location: login.php?msg=User was created successfully. You can now login.");
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

// Register

function checkEmail() {
	if(isset($_POST['email'])) {
	    $conn = dbconnect();
	    $email = $_POST['email'];
	    $sql="SELECT * FROM user WHERE email = '$email'";
	    $result = $conn->query($sql);
	    if ($result->num_rows > 0) {
	        echo "<span style='color:red;'>Already exist</span>";
	        return false;
	    } else {
	        echo "<span style='color:green;'>Available</span>";
	        return true;
	    }
	   
	}


}

function lengthControl($fname, $lname, $email, $password) {
	if (strlen($email) < 1) {
		header("Location: register.php?msg=Email field was left empty.");
		return false;
	} elseif (strlen($fname) < 1) {
		header("Location: register.php?msg=First name field was left empty.");
		return false;
	} elseif (strlen($lname) < 1) {
		header("Location: register.php?msg=Last name field was left empty.");
		return false;
	} elseif (strlen($password) < 1) {
		header("Location: register.php?msg=Password field was left empty.");
		return false;
	}
	return true;
}

function registering() {
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	if (lengthControl($fname, $lname, $email, $password)) {
		if (checkEmail()) {
		    addUser($fname, $lname, $email, hash('sha512',$password));
		} else {
		    header("Location: register.php?msg=User with the given email already exists.");
		}
	}
}
function addCompetiton($compname,$participants){
	$conn = dbconnect();
	$sql = "INSERT INTO betting_competition (compname,participants) 
		VALUES ('$compname', $participants)";
	if ($conn->query($sql)) {
    	header("Location: create_competition.php?msg=Competiton was created successfully. You can now add questions to your competiton.");
	} else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
function create_competition(){
	$compname= $_POST['compname'];
	$participants= $_POST['partnum'];
	if(strlen($compname)<1){
		header("Location: create_competition.php?msg=Competiton name field was left empty.");
	}
	if($participants!=""){
		if(is_numeric($participants)){
			if(is_int($participants) ){
				addCompetiton($compname,intval($participants));
			}
			else{
				header("Location: create_competition.php?msg=Participants field wasn't a number.");
			}
		}
		else{
			header("Location: create_competition.php?msg=Participants field wasn't a number.");
		}
		
	}
	 else{
		addCompetiton($compname,1000);
	}
}

?>