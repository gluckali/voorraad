<?php
session_start();
// $_SESSION['id'] = "";
// $_SESSION['gebruikersnaam'] = "";
// $_SESSION['wachtwoord'] = "";
if(isset($_GET['logout'])) {
    session_destroy($_SESSION);
    session_unset($_SESSION['gebruikersnaam']);
 }
if(empty($_SESSION['id'])) header("location: login.php");

echo "You've succesfully logged out";
echo '<br>' . "You will be redirected in a few seconds.";
header("refresh:3;url=login.php");


?>
