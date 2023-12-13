<?php 

$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$databasename = "nature"; 

$conn = new mysqli($servername, 
	$username, $password, $databasename); 

if ($conn->connect_error) { 
	die("Connection failed: " . $conn->connect_error); 
} 

$query = "SELECT * FROM users;"; 

$result = $conn->query($query); 

// $conn->close(); 

?>
