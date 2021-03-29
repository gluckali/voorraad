<?php 
include '../database/database.php';

$db = new database();
echo "1";
$medewerkers = $db->select("SELECT * FROM medewerker", []);
echo "2";
print_r($medewerkers);

$columns = array_keys($medewerkers[0]);
$row_data = array_values($medewerkers);

?>

<table> 
    <tr>
    <?php 
        foreach($columns as $column){
            echo"<th> <strong> $column </strong> </th>";
        }
    ?>
    <th colspan="2"> action </th>
    <th> <a href="add.php">add medewerker</a></th>
    </tr>
    <th colspan="3"> </th>
    <?php 
        foreach($row_data as $rows){ 
            echo "<tr>";
                foreach($rows as $poopie){ 
                    echo "<td>$poopie</td>";
                }       
    ?>
      <td>
                    <a href="edit.php?medewerker_id=<?php echo $rows['id']?>">edit</a>
                    <a href="delete.php?id=<?php echo $rows['id']?>">delete</a>
                    </td>
                    </tr>
                <?php } ?>

              
         
        </table>   
    </body>
</html>
