<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
require('class/class.sqlconnect.php');
require('config.php');
// require('class/class.functions.php');
?>
<fieldset>
  <legend>Soldes</legend>
<table>
  <thead>
        <tr>
            <th colspan="3">Solde restant année <?php echo anneeencours(); ?> au <?php echo date('d/m/Y'); ?> </th>
        </tr>
  </thead>
  <tbody>
    <tr>
      <td>RTT</td>
      <td><?php soldertt($table, $rttparan, $conn); ?> jour(s)</td>
      <td>Date limite : 31 décembre <?php echo anneeencours(); ?></td>
    </tr>
    <tr>
      <td>Congés payés</td>
      <td><?php soldecp($table, $cpparan, $conn); ?> jour(s)</td>
      <td>Date limite : 31 mai <?php echo annee(); ?></td>
    </tr>
  </tbody>
</table>
<br><br>
<table>
  <thead>
        <tr>
            <th colspan="3">Solde acquis année <?php anneeplus(); ?> au 01/<?php echo date('m/Y') ?></th>
        </tr>
  </thead>
  <tbody>
    <tr>
      <td>Congés payés</td>
      <td><?php echo cumuln1cp($cpparmois); ?> jour(s)</td>
      <td>Entre en vigueur le : 1er juin <?php echo annee(); ?></td>
    </tr>
  </tbody>
</table>

</fieldset>
</body>
</html>
