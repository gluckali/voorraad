<?php
include "./database/database.php";

//bekijk de navigatie in uitwerking functioneel ontwerp om te zien of hier informatie over
$db = new database;
$sql = $db->select("SELECT bar.totaal+keuken.totaal AS totaal FROM bar INNER JOIN keuken ON keuken.id = bar.id",[]);
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