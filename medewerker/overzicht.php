<?php 
include '../database/database.php';

$db = new database();
$medewerkers = $db->select("SELECT * FROM medewerker", []);

if(isset($_POST['export'])){
    $filename = "user_data_export.xls";
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=\"$filename\"");
    $print_header = false;
    // excel
    $medewerker = $db->excel(NULL);
    if(!empty($medewerker)){
        foreach($medewerker as $row){
            if(!$print_header){
                echo implode("\t", array_keys($row)) ."\n";
                $print_header=true;

            }
            echo implode("\t", array_values($row)) ."\n";
        }
    }
    exit;
}
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
                <form action='overzicht.php' method='POST'>
            <input type='submit' name='export' value='Export to excel file' />
        </form>
        </table>   
    </body>
</html>
