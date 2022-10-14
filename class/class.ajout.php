<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="style.css">
  <meta name="viewport" content="width=device-width">
   <?php
   require('sqlconnect.php');
   ?>
</head>
<?php
require('sqlconnect.php');

$datedebut = $_POST['datedebut'];
$datefin = $_POST['datefin'];
$nbjours = $_POST['nbjours'];
$type = $_POST['type'];

$mysqli = new mysqli($servername, $username, $password, $dbname);
$mysqli->set_charset("utf8");
$req = "INSERT INTO $table VALUES ('$datedebut','$datefin','$nbjours','$type');";
$resultat = $mysqli->query($req);
if ($resultat) {
			echo "<p>La saisie a été ajoutée !</p>";
      header("refresh:2; url=index.php");
		}else{
			echo "<p>Erreur</p>";
    };
//header("refresh:2; url=form.html");
?>
