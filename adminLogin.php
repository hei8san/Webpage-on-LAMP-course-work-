<?php
session_start();
$displayBlock_admin;
if (!empty($_SESSION['admin_logged_in'])) {
    session_destroy();
    header("Location: adminLogin.php");
} else {
    if ((filter_input(INPUT_POST, 'username')) && (filter_input(INPUT_POST, 'password'))) {
        
        $_SESSION['admin_logged_in'] = true;
        $Adminusername = $_SESSION['username'];
        $mysqli = mysqli_connect("localhost", "cs213user", "letmein", "finalProjectDB");

//create and issue the query
        $targetname = filter_input(INPUT_POST, 'username');
        $targetpasswd = filter_input(INPUT_POST, 'password');
        $sqlLogin = "SELECT * FROM adminUsers WHERE username = '" . $targetname .
                "' AND password = SHA1('" . $targetpasswd . "')";

        $resultLogin = mysqli_query($mysqli, $sqlLogin) or die(mysqli_error($mysqli));
        if ($resultLogin == 1) {
            header("Location: adminPage.php");
        } else {
            header("Location: adminLogin.php");
        }
    }
}


//connect to server and select database
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Admin Login</title>
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
        </style>
    </head>
    <body>

        <div class="topnav">
            <a href="homePage.php">Home</a>
        </div>

        <div class="content">

            <form method="post" action="">
                <fieldset> <legend><h3>Admin Login Form </h3></legend>
                    <p><strong>username:</strong><br/>
                        <input type="text" name="username"/></p>
                    <p><strong>password:</strong><br/>
                        <input type="password" name="password"/></p>
                    <p><input type="submit" name="submit" value="login"/></p>
                </fieldset>
            </form>
            <br>


        </div>

        <div class="footer">
            <p>This website is made by Gustavo, Kohei</p>
        </div>

    </body>
</html>


