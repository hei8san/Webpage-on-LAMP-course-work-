<?php
session_start();
//echo $_SESSION['username'];

if(isset($_POST['submit'])){
    
}
?>

<html>
    <head>
        
    </head>
    <body>
        <form action="" method = "post">
            <p>How many courses did you take in fall semester 2022?</p><br>
            <input type ="number" name ="numOfCourses" min ="1" max ="10"/>
            COSC<input type ="text" name ="LAMP"/> : <input type ="number" name ="LAMPscore" min ="1" max ="10"/> <br>
            <input type ="submit" value ="Submit"/>
        </form>
        <a href="homePage.php">Home page</a>
        <a href="logout.php">Log out</a>
    </body>
</html>

