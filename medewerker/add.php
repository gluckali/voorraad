<?php 
session_start();
include '../database/database.php';


if($_SERVER['REQUEST_METHOD'] == "POST"){
    // request method is POST, daarna roep je alles wat je hebt in database en maak je het post $_post = naam van db
    $voorletters = $_POST["voorletters"]; 
    $voorvoegsels = $_POST["voorvoegsels"]; 
    $achternaam = $_POST["achternaam"]; 
    $gebruikersnaam = $_POST["gebruikersnaam"]; 
    $wachtwoord = $_POST["wachtwoord"]; 

    // hierna ^ doe je een sql statement die je roept uit je database (ADD VAN DE CRUD)
    // ID is null, het is auto increment dus het changet automatically.

    $sql = "INSERT INTO medewerker 
    (voorletters, voorvoegsels, achternaam, gebruikersnaam, wachtwoord)
    VALUES
    (:voorletters, :voorvoegsels, :achternaam, :gebruikersnaam, :wachtwoord)";
    // kijk altijd als je zelfde values hebt met :, same order, same location, 
    // als de code niet werkt haal de values beneden weg en laat het alleen boven zijn, dus de : moet weg.

    $placeholder = [
        'voorletters'=>$voorletters,
        'voorvoegsels'=>$voorvoegsels,
        'achternaam'=>$achternaam,
        'gebruikersnaam'=>$gebruikersnaam,
        'wachtwoord'=>password_hash($wachtwoord, PASSWORD_DEFAULT)
    ];
    // je maakt een new database 
    $db = new database();
    $db -> add($sql, $placeholder, 'overzicht.php');
}
    ?>

<form action="add.php" method="post">
<!-- ternary operator: https://www.codementor.io/@sayantinideb/ternary-operator-in-php-how-to-use-the-php-ternary-operator-x0ubd3po6 -->
<!-- 
medewerkers is een array met een index 9 (= Array ( [0] => Array ( [id] => 5 [medewerkers] => bloesem [prijs] => 5.95 ) )). 
value van de index is een array. Daarom moeten we van medewerkers de 0e index nemen ($medewerkers[0]). dat is: Array ( [id] => 5 [medewerkers] => bloesem [prijs] => 5.95 )
Van deze array kunnen wij alleen de values ophalen aan de hand van de keys. daarom doen we bijv $medewerkers[0]['prijs']. -->

<input type="text" name="voorletters" placeholder="voorletters" required>
<input type="text" name="voorvoegsels" placeholder="voorvoegsels" >
<input type="text" name="achternaam" placeholder="achternaam" required>
<input type="text" name="gebruikersnaam" placeholder="gebruikersnaam" required>
<input type="password" name="wachtwoord" placeholder="wachtwoord" required >
<input type="submit" value="Add medewerker">

</form>
    
</body>
</html>