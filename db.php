<?php

$servername = "localhost";
$username = "root";
$password = "";
$databasename = "nature";

$conn = new mysqli($servername, $username, $password, $databasename);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

function nameCheckDB($username){
	$query = "SELECT * FROM users WHERE username = \"$username\";"; 
	$result = $GLOBALS['conn']->query($query);

	return $result;
}

function emailCheckDB($email){
	$query = "SELECT * FROM users WHERE email = \"$email\";"; 
	$result = $GLOBALS['conn']->query($query);

	return $result;
}

function saveDB($username,$email,$password) {
	$add_user = "INSERT INTO users (username,email,password) VALUES('$username','$email','$password');";
	$save = $GLOBALS['conn']->query($add_user);

	return $save;
}

// $conn->close(); 

?>
