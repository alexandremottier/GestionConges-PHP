<?php
require('class.sqlconnect.php');
$mysqli = new mysqli($servername, $username, $password, $dbname);
$mysqli->set_charset("utf8");
$req = "DELETE FROM $table WHERE type = 'cp' ;";
$resultat = $mysqli->query($req);
if ($resultat) {
			echo "<p>Les congés payés ont été supprimés !</p>";
      header("refresh:2; url=../index.php");
		}else{
			echo "<p>Erreur</p>";
    };
?>
