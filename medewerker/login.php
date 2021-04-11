<?php 
include "../database/database.php";
session_start();
print_r(password_hash("1234", PASSWORD_DEFAULT)); // REMOVE THIS THIS IS TO DECRYPT THE PASSWORD!

if(isset($_POST['submit'])){
    $fields = ['gebruikersnaam', 'wachtwoord'];
    $error = false;

    foreach($fields as $field){
        if (!isset($_POST[$field]) || empty($_POST[$field])){
            $error = true;
        }
    }
    if(!$error){
        $username= $_POST['gebruikersnaam'];
        $password= $_POST['wachtwoord'];
        $db = new database ();
        $db -> medewerker($username, $password);
    } else {
        echo 'error occured in submitting the form';
    }
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Login</title>
</head> 
    <body>
        <form class='login' action='login.php' method='post'>
        <fieldset>
            <p> medewerker terminal </p>
            <legend>inloggen</legend>
            <input type="text" name="gebruikersnaam" placeholder="gebruikersnaam" required/>
            <input type="password" name="wachtwoord" placeholder="wachtwoord" required/>
            <input type='submit' name='submit' value='submit'/>
            <a href="../klant/login.php"> klant login</a>
            </fieldset>
        </form> 
    </body>
</html>


