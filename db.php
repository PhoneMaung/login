<?php

$servername = "localhost";
$username = "root";
$password = "";
$databasename = "nature";

$conn = new mysqli($servername, $username, $password, $databasename);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

function saveDB($username, $password)
{
  $add_user = "INSERT INTO users (username,password) VALUES('$username','$password');";
  $save = $GLOBALS["conn"]->query($add_user);
  return $save;
}

function readDB()
{
  $query = "SELECT * FROM users;";
  $result = $GLOBALS["conn"]->query($query);
  return $result;
}
// $conn->close();
?>
