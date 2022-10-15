<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="style.css">
  <meta name="viewport" content="width=device-width">
  <title>Saisie des congés</title>
   <?php
   require('class/class.sqlconnect.php');
   require('config.php');
   require('class/class.functions.php');
   ?>
</head>
<body>
  <h1>Gestion des congés - Saisie</h1>
  <a href="index.php">Afficher les congés</a><br><br>
  <form class="generated-form"  method="POST" action="class.ajout.php"  target="_self">
  <fieldset>
    <legend> Saisie de congés </legend>
    <label for="datedebut">Date de début :</label><br>
    <input type="date" id="datedebut" name="datedebut"><br>
    <label for="datefin">Date de fin :</label><br>
    <input type="date" id="datefin" name="datefin"><br>
    <label for="nbjours">Nombre de jours :</label><br>
    <input type="text" id="nbjours" name="nbjours"><br><br>
    <label for="nbjours">Nature du congé :</label><br>
    <select name="type">
         <option value="RTT" stud_name="sre">RTT</option>
         <option value="CP" stud_name="sam">Congé payé</option>
     </select><br><br>
    <input type="submit" value="Valider">
</fieldset>
</body>
</html>
