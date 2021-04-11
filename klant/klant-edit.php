<?php 
session_start();
include '../database/database.php';
$db = new database();


if($_SERVER['REQUEST_METHOD'] == "POST"){
    // request method is POST, daarna roep je alles wat je hebt in database en maak je het post $_post = naam van db
    $voorletters = $_POST["voorletters"]; 
    // $tussenvoegsel = $_POST["tussenvoegsel"]; 
    $achternaam = $_POST["achternaam"]; 
    // $adres = $_POST["adres"]; 
    $gebruikersnaam = $_POST["gebruikersnaam"]; 
    $wachtwoord = $_POST["wachtwoord"];

    $customerId = $_SESSION['id'];
    // hierna ^ doe je een sql statement die je roept uit je database (ADD VAN DE CRUD)
    // ID is null, het is auto increment dus het changet automatically.

    $sql = "UPDATE klant SET gebruikersnaam=:gebruikersnaam, voorletters=:voorletters, achternaam =:achternaam, wachtwoord=:wachtwoord WHERE id=:klantId";

    // kijk altijd als je zelfde values hebt met :, same order, same location, 
    // als de code niet werkt haal de values beneden weg en laat het alleen boven zijn, dus de : moet weg.

    $placeholder = [
        'voorletters'=>$voorletters,
        // 'tussenvoegsel'=>$tussenvoegsel,
        'achternaam'=>$achternaam,
        // 'adres'=>$adres,
        'gebruikersnaam'=>$gebruikersnaam,
        'wachtwoord'=>password_hash($wachtwoord, PASSWORD_DEFAULT),
        'klantId'=> $customerId
    ];

    $_SESSION['gebruikersnaam'] = $gebruikersnaam;

    $db->update_or_delete($sql, $placeholder, 'indexklant.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klant Edit</title>
</head>
<form action="" method="post">
    <?php

        $sql = "SELECT id, gebruikersnaam, voorletters, achternaam FROM klant WHERE id = :klantId";
        $customerId = $_SESSION['id'];

        $result = $db->select($sql, [
            'klantId' => $customerId,
        ]);

        $user = $result[0];

        echo '<input type="text" name="gebruikersnaam" placeholder="Gebruikersnaam"' . ' value="' . $user['gebruikersnaam'] . '" required>';
        echo '<input type="text" name="voorletters" placeholder="Voorletters"' . ' value="' . $user['voorletters'] . '" required>';
        echo '<input type="text" name="achternaam" placeholder="Achternaam"' . ' value="' . $user['achternaam'] . '" required>';
    ?>
    <input type="password" name="wachtwoord" placeholder="Wachtwoord" autocomplete="off">
    <input type="submit" value="submit">
</form>
</html>
