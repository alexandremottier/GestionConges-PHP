<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="style.css">
  <meta name="viewport" content="width=device-width">
   <?php
   require('class.sqlconnect.php');
   //require('config.php');
   //require('class.functions.php');
   ?>
</head>
<?php
$actual_link = $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$url_components = parse_url($actual_link);
parse_str($url_components['query'], $params);

$datedebut = $params['datedebut'];
$datefin = $params['datefin'];

$mysqli = new mysqli($servername, $username, $password, $dbname);
$req = "DELETE FROM $table WHERE datedebut = '$datedebut' AND datefin = '$datefin' ;";
$resultat = $mysqli->query($req);
if ($resultat) {
			echo "<p>La saisie a été supprimée !</p>";
      header("refresh:2; url=../index.php");
		}else{
			echo "<p>Erreur</p>";
    }
 ?>
