<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Home Page</title>
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
            <h2>Welcome to Gustavo and Kohei website!!</h2>
            <a href="login.php">Log in to Your Account</a><br><br>
            <p>Are you new to this site?</p>
            <a href ="createAccount.php">Let's create account!</a><br><br><br>


            <a href="adminLogin.php">Log in to Administrator Account</a><br/><br/>
            <a href="jquery_Example.php">JQuery Exapmle</a><br/><br/>
            <a href="design.php">Design</a>
        </div>

        <div class="footer">
            <p>This website is made by Gustavo, Kohei</p>
        </div>

    </body>
</html>


