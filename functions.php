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
function getAllUsernames() {
	$conn = dbconnect();
	$sql="SELECT firstname, lastname   FROM user where concat(firstname,' ',lastname, ' ') like '%".$_GET['term']."%'" ;
	$usernames=array();
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	    while($row = $result->fetch_assoc()) {
	    	
	    	$fname=$row['firstname'];
	    	$lname=$row['lastname'];
	    	$fullname=$fname . " ". $lname;
	        array_push($usernames, $fullname);

    	} 
	} else {
	     echo "Error: " . $sql . "<br>" . $conn->error;
	}
	return  json_encode($usernames);
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
	        echo "<span style='color:red;'>Already exists</span>";
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
		    addUser($_POST['fname'], $_POST['lname'], $_POST['email'], $_POST['password']);
		} else {
		    header("Location: register.php?msg=User with the given email already exists.");
		}
	}
}

function allComps() {
	$conn = dbconnect();
	$sql="SELECT * from betting_competition inner join  user on  user.id=betting_competition.creator GROUP BY betting_competition.id";
	$comps = array();
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	    while($row = $result->fetch_assoc()) {
	    	array_push($comps, $row);
    	} 
	} else {
	     echo "Error: " . $sql . "<br>" . $conn->error;
	}
	return $comps;
}		

function getIdByFacebookId($fbId) {
	$conn = dbconnect();
	$sql="SELECT id FROM user WHERE facebook_id = '$fbId'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	    while($row = $result->fetch_assoc()) {
	    	return $row['id'];
    	} 
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
}

function getMyComps($id) {
	$myComps = array();
	foreach(allComps() as $row) {
		$a = substr($row['allowedusers'], 1, -1);
		$b = explode(",", $a);
		foreach($b as $value) {
			if (intval($value) == $id) {
				array_push($myComps, $row);
			}
		}
	}
	return $myComps;
}

function getMyCreatedComps($id) {
	$myCreatedComps = array();
	foreach(allComps() as $row) {
		if ($row['creator'] == $id) {
			array_push($myCreatedComps, $row);
		}
	}
	return $myCreatedComps;
}

function getNewComps() {
    date_default_timezone_set("Europe/Helsinki");
    $date = date('Y-m-d H:i:s');
    $conn = dbconnect();
    $sql="SELECT * FROM betting_competition";
    $result = $conn->query($sql);
    $newtime = strtotime('-3 seconds');
    $time = date('Y-m-d H:i:s', $newtime);
    if ($result->num_rows > 0) {
    	while($row = $result->fetch_assoc()) {
    		if ($time < $row['time_created']) {
    			echo "<span style='color:red;'>Lisati uus ennustus!</span>";
    		}
    	}
        return false;
    }
    return true;
}

function create_competition(){
	$conn=dbconnect();
	$allowedusers=$_POST['userlist'];
	$list=getIdByName($allowedusers);
	$store="[";
	foreach($list as $id){
		$store.=$id['id'][0];
		$store.=",";
	}
	$store=chop($store,",");
	$store.="]";
	$compname = $_POST['compname'];
	$creator = $_SESSION['sessionUserId'];
	$numUsers = $_POST['partnum'];
	$sql="INSERT INTO betting_competition(compname, creator, allowedusers, numUsers)
		  VALUES ('$compname', '$creator', '$store', '$numUsers')";
	if($conn->query($sql)){
		echo 'Ennustus edukalt loodud';
	}
	else{
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

}

function add_questions(){
	$conn = dbconnect();
	$compname = $_POST['compname'];
	$sql="SELECT id FROM betting_competition WHERE compname = '$compname'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	    while($row = $result->fetch_assoc()) {
	    	$compId = $row['id'];
    	} 
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	for($i = 0; $i < count($_POST['category']); $i++){
		$team1 = null;
		$team2 = null;
		$textQ = null;

		$quest_type = $_POST['category'][$i];

		if($quest_type == 'Jalgpall'){
			$ans_type = $_POST['answer'][$i*2];
		} else if ($quest_type == 'Korvpall'){
			$ans_type = $_POST['answer'][$i*2+1];
		}
		if($ans_type == 'ansText'){
			$textQ = $_POST['team'][$i*3+2];
		} else {
			$team1 = $_POST['team'][$i*3];
			$team2 = $_POST['team'][$i*3+1];
		}
		$cor_ans = null;
		$sql1="INSERT INTO bet_question(compid, quest_type, ans_type, cor_ans, team1, team2, textq)
			  VALUES ('$compId', '$quest_type', '$ans_type', '$cor_ans', '$team1', '$team2', '$textQ')";

		if($conn->query($sql1)){
		}
		else{
			echo "Error: " . $sql1 . "<br>" . $conn->error;
		}
	}
	
}

function getIdByName($userlist){
	$string=str_replace("[","",$userlist);
	$string1=str_replace("]", "", $string);
	$usernames=explode(",",$string1);
	$conn = dbconnect();
	$id=array();
	foreach($usernames as $name) {
		
		$sql="SELECT id FROM user WHERE concat(firstname,' ',lastname, ' ')=$name";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	    while($row = $result->fetch_assoc()) {
	   	array_push($id,$row);

    	}
	}
	else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
	}
	return $id;
		
    
	} 




?>