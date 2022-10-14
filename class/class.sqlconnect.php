<?php
$servername = "localhost";
$username = "conges";
$password = "conges";
$dbname = "gestionconges";
$table = "gestionconges.conges";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>
