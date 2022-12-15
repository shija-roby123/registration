<?php
$server = "localhost";
$username= "root";
$password = "";
// Create connection
//$conn = new mysqli($server, $username, $password);
$db = "registration";
$conn = new mysqli($server, $username, $password,$db) or die("Connect failed: %s\n". $conn -> error);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>