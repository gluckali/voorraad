<?php
include "./database/database.php";

//bekijk de navigatie in uitwerking functioneel ontwerp om te zien of hier informatie over
$db = new database;
$sql = $db->select("SELECT bar.aantal, drank.dranknaam, (drank.prijs*bar.aantal) as totaal
FROM bar INNER JOIN drank ON drank.id = bar.drank_id",[]);

$columns = array_keys($sql[0]);
$row_data = array_values($sql);


?>
<head>
    <title>JOIN</title>
</head>
<table class = "join">
<tr>
    <?php
        foreach ($columns as $column) {
          echo "<th><strong> $column </strong></th>";
        }
    foreach($row_data as $rows){
              echo "<tr>";
    foreach($rows as $data){
       echo "<td>$data</td>";
    }?>
  </tr>
<?php } ?>
</tr>
</table>