<?php 
session_start();
include '../database/database.php';


if($_SERVER['REQUEST_METHOD'] == "POST"){
    // request method is POST, daarna roep je alles wat je hebt in database en maak je het post $_post = naam van db
    $naam = $_POST["naam"]; 
    $plaats = $_POST["plaats"]; 
    $achternaam = $_POST["achternaam"]; 
    $telefoon = $_POST["telefoon"]; 
    $eten = $_POST["eten"]; 

    // hierna ^ doe je een sql statement die je roept uit je database (ADD VAN DE CRUD)
    // ID is null, het is auto increment dus het changet automatically.

    $sql = "INSERT INTO reserveren 
    (naam, plaats, achternaam, telefoon, eten)
    VALUES
    (:naam, :plaats, :achternaam, :telefoon, :eten)";
    // kijk altijd als je zelfde values hebt met :, same order, same location, 
    // als de code niet werkt haal de values beneden weg en laat het alleen boven zijn, dus de : moet weg.

    $placeholder = [
        'naam'=>$naam,
        'plaats'=>$plaats,
        'achternaam'=>$achternaam,
        'telefoon'=>$telefoon,
        'eten'=>$eten
    ];
    // je maakt een new database 
    $db = new database();
    $db -> add($sql, $placeholder, 'indexklant.php');
}

?>
<!-- reserveren op twee producten en dat het dan gelijk gaat naar database array merge? als je meer wilt bestellen.  -->
<link rel="stylesheet" href="../style.css">
<div class="navbar">
    <a href="indexklant.php">Home</a>
    <a href="#news">News</a>
    <a href="reserveren.php">reserveren</a>
    <a href="klant-edit.php">wijzig gegevens</a>
    <a href="logout.php"> log out</a>
  </div>
<form class="input" method="post">
        <input type="text" name="naam" placeholder="naam" required> <br>
        <input type="text" name="plaats" placeholder="plaats"><br>
        <input type="text" name="achternaam"placeholder="achternaam"  required><br>
        <input type="text" name="telefoon" placeholder="telefoon" required><br>
        <select name="eten" id="eten" placeholder="eten" required> <br>
        <option value="curry">curry</option>
        <option value="rice">rice</option>
        <option value="nutt">nutt</option>
        <option value="cola">cola</option>
    </select>
        <input type="submit" value="submit">
    </form>
    
</html>