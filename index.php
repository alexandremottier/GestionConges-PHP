<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="style.css">
  <meta name="viewport" content="width=device-width">
  <title>Affichage des congés</title>
   <?php
   require('class/class.sqlconnect.php');
   require('config.php');
   require('class/class.functions.php');
   ?>
</head>
<body>
<h1>Gestion des congés - Affichage</h1>
<h2>Année en cours : <?php echo date('Y'); ?></h2>
<a href="saisie.php">Saisir des congés</a>
<br><br>
<?php
$sql = "SELECT * FROM $table";
$result = $conn->query($sql);
?>
<table>
  <thead>
        <tr>
            <th colspan="5">Congés saisis</th>
        </tr>
  </thead>
  <tbody>
    <tr>
      <td><b>Date début</b></td>
      <td><b>Date fin</b></td>
      <td><b>Durée</b></td>
      <td><b>Nature du congé</b></td>
      <td><b>Suppression</b></td>
    </tr>
<?php
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $debutdate = str_replace('-"', '/', $row["datedebut"]);
    $datedebut = date("d/m/Y", strtotime($debutdate));
    $findate = str_replace('-"', '/', $row["datefin"]);
    $datefin = date("d/m/Y", strtotime($findate));
    $nombrejours = $row["nbjours"];
    echo "<tr><td> " . $datedebut. " </td><td> " . $datefin. " </td><td> " . $nombrejours . " jour(s) </td><td> ". $row["type"]." </td><td><a href=\"class/class.remove.php?datedebut=" . $row["datedebut"] . "&datefin=" . $row["datefin"]. "\">Supprimer la ligne</a></td></tr>";
  }
} else {
  echo "<tr colspan='4'><td>Pas de résultat</td></tr>";
}
$conn->close();
?>
</tbody>
</table>
<br>
  <a href="class/class.clearcp.php">Supprimer les congés payés</a>
  <a href="class/class.clearrtt.php">Supprimer les RTT</a>
<br><br>
<?php require('solde.php') ?>
</body>
</html>
