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
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    } 
	} else {
	     echo "Error: " . $sql . "<br>" . $conn->error;
	}

}
dbconnect();
?>