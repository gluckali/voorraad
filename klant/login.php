<?php 
session_start();
include "../database/database.php";

if(isset($_POST['submit'])){
    $fields = ['gebruikersnaam', 'wachtwoord'];
    $error = false; // if false then it will run

    foreach($fields as $field){
        if (!isset($_POST[$field]) || empty($_POST[$field])){
            $error = true;
        }
    }
    if(!$error){
        $gebruikersnaam= $_POST['gebruikersnaam'];
        $wachtwoord= $_POST['wachtwoord'];
        $db = new database ();
		
        // $db->genericLogin($gebruikersnaam, $wachtwoord, 'medewerker', '../medewerker/indexmedewerkerlog.php');
		$db->klant($gebruikersnaam, $wachtwoord);
    }
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<title>inlog pagina klant</title>
</head>
<body>
	<!-- make sure to give classes instead of id's so they go in css! -->
	<form class='login' action='login.php' method='post'>
    <link rel="stylesheet" href="../style.css">
		<fieldset>
			<p> Login Klant </p>
			<legend> inloggen</legend>
			<input type="text" name="gebruikersnaam" placeholder="gebruikersnaam" required/>
			<input type="password" name="wachtwoord" placeholder="wachtwoord" required/>
			<input type='submit' name='submit' value='Submit' />
			<p>
			geen account? <a href="klantreg.php">Registeren</a>
			</p>
			<a href="../klant/login.php">medewerker login</a>
		</fieldset>
	</form>
</body>
</html>


<!-- 	session_start();
	include '../database/database.php';
    print_r(password_hash("1234", PASSWORD_DEFAULT));
	// run once when application starts to populate database with admin user
	// $db = new database();
	// $db->insert_admin();
	if(isset($_POST['submit'])){

		// array with values of the name attribute of the input field
		$fields = ['gebruikersnaam', 'wachtwoord'];
		// if false = is het goed!
		$error = false;

		foreach($fields as $field){
			if(!isset($_POST[$field]) || empty($_POST[$field])){
				$error = true;
			}
		}
		if(!$error){
				// het stored posted forms van values in variables
			$gebruikersnaam = $_POST['gebruikersnaam'];
			$wachtwoord = $_POST['wachtwoord'];

			$db = new database ();
			// login function that is in the database
			$db -> klant($gebruikersnaam, $wachtwoord); -->