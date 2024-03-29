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
<button onclick="window.location.href='saisie.php'" class="button">Saisir des congés</button>
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
    $link = 'class/class.remove.php?datedebut=' . $row["datedebut"] . '&datefin=' . $row["datefin"];
    echo "<tr><td> " . $datedebut. " </td><td> " . $datefin. " </td><td> " . $nombrejours . " jour(s) </td><td> " . $row["type"] . " </td><td><button onclick='window.location.href=" . '"' . $link . '"' . "' class='button'>Supprimer la ligne</button></td></tr>";


  }
} else {
  echo "<tr colspan='4'><td>Pas de résultat</td></tr>";
}
$conn->close();
?>
</tbody>
</table>
<br>
<button onclick="window.location.href='class/class.clearcp.php'" class="button">Supprimer les congés payés</button>
<button onclick="window.location.href='class/class.clearrtt.php'" class="button">Supprimer les RTT</button>
<br><br>
<?php require('solde.php') ?>
</body>
</html>
