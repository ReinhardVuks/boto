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
	}
	$sql="SELECT * FROM user";
	if ($conn->query($sql)) {
    	echo "New record created successfully";
    	echo mysql_query($sql);
    	echo "jaaaaaaaaaaa";
    	while($row = mysql_fetch_array(mysql_query($sql))) {
    		echo "jama";
    	}
	} 
	else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

}
dbconnect();
?>