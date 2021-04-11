<?php 
include "./database/database.php";
$db =new database();

$filter = ("SELECT * FROM medewerker  ORDER BY `achternaam`, `gebruikersnaam` ASC");
print_r($filter);


?>

https://www.php.net/manual/en/mysqli-stmt.execute.php