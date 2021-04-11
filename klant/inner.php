

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    include "../database/database.php";
    $db = new database();
    session_start();
    print_r($_SESSION);
    $inner = $db->select("SELECT eten.eten, reserveren.naam, reserveren.telefoon, reserveren.plaats FROM reserveren INNER JOIN eten ON reserveren.id = eten.id", []);
    $columns = array_keys($inner[0]);
    $row_data = array_values($inner);
    ?>
    
    <table> 
        <tr>
        <?php 
            foreach($columns as $column){
                echo"<th> <strong> $column </strong> </th>";
            }
        ?>
        <th colspan="2"> action </th>
        <th> <a href="add.php">add klant</a></th>
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
                        <a href="klant-edit.php?klant_id=<?php echo $rows['id']?>">edit</a>
                        <a href="delete.php?id=<?php echo $rows['id']?>">delete</a>
                        </td>
                        </tr>
                    <?php } ?>
            </table>   
        </body>
    </html>