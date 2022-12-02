<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Log out</title>
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
        <script 
            src="https://code.jquery.com/jquery-git.js">
        </script>  
    </head>
    <body>

        <div class="topnav">
            <a href="homePage.php">Home</a>
        </div>

        <div class="content">

            <h2>Log out success</h2>

            <div class="redirect">
                <button>Redirect to Home page</button>
            </div>
            <script>
                // click event on button
                $("button").click(function () {
                    $(".redirect").text("Redirecting....")

                    // storing url and time
                    let delay = 5000;
                    let url = "https://ksawabevm.cosc.okc/cs213project/homePage.php";
                    setTimeout(function () {
                        location = url;
                    }, 5000)
                })
            </script>


        </div>

        <div class="footer">
            <p>This website is made by Gustavo, Kohei</p>
        </div>

    </body>
</html>


