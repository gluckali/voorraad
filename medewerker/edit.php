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
    $db = new database;

    if(isset($_GET['medewerker_id'])){
        $medewerkers = $db->select("SELECT * FROM medewerker WHERE id=:medewerker_id",['medewerker_id' => $_GET['medewerker_id']]);
    }
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $sql = "UPDATE medewerker SET voorletters=:voorletters, voorvoegsels=:voorvoegsels, achternaam =:achternaam, gebruikersnaam=:gebruikersnaam, wachtwoord=:wachtwoord WHERE id=:medewerker_id";
    
    $placeholder = [ 
        'voorletters'=>$_POST['voorletters'],
        'voorvoegsels'=>$_POST['voorvoegsels'],
        'achternaam'=>$_POST['achternaam'],
        'gebruikersnaam'=>$_POST['gebruikersnaam'],
        'wachtwoord'=>$_POST['wachtwoord'],
        'medewerker_id'=>$_POST['medewerker_id']
    ];

    print_r($placeholder);
    $db->update_or_delete($sql, $placeholder, 'overzicht.php');
    }
    ?>

<form action="edit.php" method="post">
<input type="hidden" name="medewerker_id" value="<?php echo isset($_GET['medewerker_id']) ? $_GET['medewerker_id'] : '' ?>">
<!-- ternary operator: https://www.codementor.io/@sayantinideb/ternary-operator-in-php-how-to-use-the-php-ternary-operator-x0ubd3po6 -->
<!-- 
medewerkers is een array met een index 9 (= Array ( [0] => Array ( [id] => 5 [medewerkers] => bloesem [prijs] => 5.95 ) )). 
value van de index is een array. Daarom moeten we van medewerkers de 0e index nemen ($medewerkers[0]). dat is: Array ( [id] => 5 [medewerkers] => bloesem [prijs] => 5.95 )
Van deze array kunnen wij alleen de values ophalen aan de hand van de keys. daarom doen we bijv $medewerkers[0]['prijs']. -->

<input type="text" name="voorletters" placeholder="voorletters" value="<?php echo isset($medewerkers) ? $medewerkers[0]['voorletters'] : ''?>">
<input type="text" name="voorvoegsels" placeholder="voorvoegsels" value="<?php echo isset($medewerkers) ? $medewerkers[0]['voorvoegsels'] : ''?>">
<input type="text" name="achternaam" placeholder="achternaam" value="<?php echo isset($medewerkers) ? $medewerkers[0]['achternaam'] : ''?>">
<input type="text" name="gebruikersnaam" placeholder="gebruikersnaam" value="<?php echo isset($medewerkers) ? $medewerkers[0]['gebruikersnaam'] : ''?>">
<input type="text" name="wachtwoord" placeholder="wachtwoord" value="<?php echo isset($medewerkers) ? $medewerkers[0]['wachtwoord'] : ''?>">
<input type="submit" value="Edit">

</form>
    
</body>
</html>