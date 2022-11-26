<?php
session_start();
echo $_SESSION['username'];
?>
<html>
    <head>
        <title>Account Page</title>
    </head>
    <body>
        <a href="homePage.php">Home page</a>
        <a href="logout.php">Log out</a>
        <h2>This is account page</h2>
        
    </body>
</html>


