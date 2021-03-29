<?php 
session_start();
include '../database/database.php';


if($_SERVER['REQUEST_METHOD'] == "POST"){
    // request method is POST, daarna roep je alles wat je hebt in database en maak je het post $_post = naam van db
    $voorletters = $_POST["voorletters"]; 
    $tussenvoegsel = $_POST["tussenvoegsel"]; 
    $achternaam = $_POST["achternaam"]; 
    $adres = $_POST["adres"]; 
    $gebruikersnaam = $_POST["gebruikersnaam"]; 
    $wachtwoord = $_POST["wachtwoord"]; 

    // hierna ^ doe je een sql statement die je roept uit je database (ADD VAN DE CRUD)
    // ID is null, het is auto increment dus het changet automatically.

    $sql = "INSERT INTO klant 
    (voorletters, tussenvoegsel, achternaam, adres, gebruikersnaam, wachtwoord)
    VALUES
    (:voorletters, :tussenvoegsel, :achternaam, :adres, :gebruikersnaam, :wachtwoord)";
    // kijk altijd als je zelfde values hebt met :, same order, same location, 
    // als de code niet werkt haal de values beneden weg en laat het alleen boven zijn, dus de : moet weg.

    $placeholder = [
        'voorletters'=>$voorletters,
        'tussenvoegsel'=>$tussenvoegsel,
        'achternaam'=>$achternaam,
        'adres'=>$adres,
        'gebruikersnaam'=>$gebruikersnaam,
        'wachtwoord'=>password_hash($wachtwoord, PASSWORD_DEFAULT)
    ];
    // je maakt een new database 
    $db = new database();
    $db -> registerklant($sql, $placeholder, 'login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<form action="klantreg.php" method="post">
        <input type="voorletters" name="voorletters" placeholder="voorletters" required>
        <input type="tussenvoegsel" name="tussenvoegsel" placeholder="tussenvoegsel">
        <input type="achternaam" name="achternaam"placeholder="achternaam"  required>
        <input type="adres" name="adres" placeholder="adres" required>
        <input type="gebruikersnaam" name="gebruikersnaam" placeholder="gebruikersnaam" required>
        <input type="password" name="wachtwoord" placeholder="wachtwoord" required>
        <input type="submit" value="submit">
    </form>
</html>
