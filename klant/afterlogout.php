<?php 
echo "You've succesfully logged out";
echo '<br>' . "You will be redirected in a few seconds.";
header("refresh:3;url=login.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
<a href="login.php"> login</a>
</body>
</html>