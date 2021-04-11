<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Document</title>
</head>
<body>
  <div class="navbar">
    <a href="indexklant.php">Home</a>
    <a href="#news">News</a>
    <a href="reserveren.php">reserveren</a>
    <a href="klant-edit.php">wijzig gegevens</a>
    <a href="logout.php"> log out</a>
  </div>
  
  <div class="h1"> 
    <h1> you have logged in </h1>
  </div>
  <?php 
        Session_start();
        if (isset($_SESSION['gebruikersnaam'])) {
            echo '<h1>hello ' . $_SESSION['gebruikersnaam'] . '!</h1> ';
        }
        
    ?>

  <div class="footer">
      <!-- hier komt de footer informatie zoals telefoon, adres, locaties, etc. -->
    <p>informatie +31643865655</p>
    <p>informatie </p>
    <p>informatie </p>
    <p>informatie </p>
  </div>
</body>
</html> 