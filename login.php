<?php
session_start();
if (!empty($_SESSION['logged_in'])) {
    session_destroy();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>User Login Form</title>
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

            <form method="post" action="userLogin.php">
                <fieldset> <legend><h3> Login Form </h3></legend>
                    <p><strong>username:</strong><br/>
                        <input type="text" name="username"/></p>
                    <p><strong>password:</strong><br/>
                        <input type="password" name="password"/></p>
                    <p><input type="submit" name="submit" value="login"/></p>
                </fieldset>
            </form>
            <br>
            <a href ="createAccount.php">Create Your Account</a>  


        </div>

        <div class="footer">
            <p>This website is made by Gustavo, Kohei</p>
        </div>

    </body>
</html>


