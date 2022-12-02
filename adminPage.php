<?php
session_start();
$displayBlock_adminPage;
$displayTable;
if (!empty($_SESSION['admin_logged_in'])) {
    if (isset($_POST['conditions'])) {
        $condition = $_POST['conditions'];
        if ($condition == 'all') {
            header("Location: admin_AllUsers.php");
        } else if ($condition == 'age') {
            $displayBlock_adminPage = "<h2>Select Range and Base age</h2>
            <p>It will be selected Base age +10</p><br><br>
            <p>Example: </p>
            <p>Base Age: 10  Displaying 10 - 20 Years old Users</p>
        <form action='admin_SortAge.php' method = 'post'>
            
            Base Age: <input type ='number' name = 'base'><br>
            
            <br><br>
            <input type='submit' value='Submit'>
        </form>";
        } else if ($condition == 'initial') {
            $displayBlock_adminPage = "<h4>Select Initial</h4>
            
        <form action='admin_SortAlphabet.php' method = 'post'>
            <select name='alphabet' id='alphabet' class = 'alphabet'>
            <option value = 'A'>A</option>
                      <option value = 'B'>B</option>
                      <option value = 'C'>C</option>
                      <option value = 'D'>D</option>
                      <option value = 'E'>E</option>
                      <option value = 'F'>F</option>
                      <option value = 'G'>G</option>
                      <option value = 'H'>H</option>
                      <option value = 'I'>I</option>
                      <option value = 'J'>J</option>
                      <option value = 'K'>K</option>
                      <option value = 'L'>L</option>
                      <option value = 'M'>M</option>
                      <option value = 'N'>N</option>
                      <option value = 'O'>O</option>
                      <option value = 'P'>P</option>
                      <option value = 'Q'>Q</option>
                      <option value = 'R'>R</option>
                      <option value = 'S'>S</option>
                      <option value = 'T'>T</option>
                      <option value = 'U'>U</option>
                      <option value = 'V'>V</option>
                      <option value = 'W'>W</option>
                      <option value = 'X'>X</option>
                      <option value = 'Y'>Y</option>
                      <option value = 'Z'>Z</option>
                   </select>
            <br><br>
            <input type='submit' value='Submit'>
        </form>";
        }
    } else {
        $displayBlock_adminPage = "<h2>Select Options</h2>
        <form action='' method = 'post'>
            <label for='conditions'>Choose conditions:</label>
            <select name='conditions' id='conditions'>
                <option value='all'>All users</option>
                <option value='age'>Age</option>
                <option value='initial'>Initial letter</option>
            </select>
            <br><br>
            <input type='submit' value='Submit'>
        </form>";
    }
} else {
    header("Location: adminLogin.php");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Administrator Page</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            * {
                box-sizing: border-box;
                font-family: Arial, Helvetica, sans-serif;
            }

            body {
                margin: 0;
                font-family: Arial, Helvetica, sans-serif;
            }

            /* Style the top navigation bar */
            .topnav {
                overflow: hidden;
                background-color: #333;
            }

            /* Style the topnav links */
            .topnav a {
                float: left;
                display: block;
                color: #f2f2f2;
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
            }

            /* Change color on hover */
            .topnav a:hover {
                background-color: #ddd;
                color: black;
            }

            /* Style the content */
            .content {
                background-color: #FFFFFF;
                padding: 10px;

            }

            /* Style the footer */
            .footer {
                background-color: #DDDDDD;
                padding: 10px;
                text-align: center;
                size: 10px;
                color: black;
            }
            .alphabet {


                cursor: pointer;
                /*    width:80%;*/
                text-align:center;
            }
        </style>
    </head>
    <body>

        <div class="topnav">
            <a href="logout.php">Log out</a>

        </div>

        <div class="content">

            <?php
            echo $displayBlock_adminPage;
            echo $displayTable;
            ?> 


        </div>

        <div class="footer">
            <p>This website is made by Gustavo, Kohei</p>
        </div>

    </body>
</html>


