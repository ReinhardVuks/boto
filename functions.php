<?php
function dbconnect(){
	$servername="localhost";
$username="vistor";
$password="secure_guest";
$dbname="test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error){
    die("connection failed:" . $conn->connect_error);
}
$sql="SELECT * FROM user";
if ($conn->query($sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}
dbconnect();
?>