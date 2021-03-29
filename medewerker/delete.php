<?php 
include "../database/database.php";
if(isset($_GET['id'])){
    $db = new database();
    $db->update_or_delete("DELETE FROM medewerker WHERE id=:medewerker_id",['medewerker_id'=>$_GET['medwerker_id']] );
}
?>