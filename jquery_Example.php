
<!DOCTYPE html>
<html lang="en">
    <head>

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
        <title>Change image on mouse over</title>
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.js"></script>
        <script type="text/javascript">
            function toggleImage(thisimage) {
                $('.prev_btn, .next_btn').on('click', function (e) {
                    $('1.png').toggle();
                });
            }
            function loadDoc() {
                let xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function () {
                    if (this.readyState == 1) {
                        document.getElementById("ready1").innerHTML =
                                "Readystate = 1 and server connection established";
                    }
                    if (this.readyState == 2) {
                        document.getElementById("ready2").innerHTML =
                                "Readystate = 2 and Request has been received.";
                    }
                    if (this.readyState == 3) {
                        document.getElementById("ready3").innerHTML =
                                "Readystate = 3 and Request is being processed.";
                    }
                    if (this.readyState == 4) {
                        document.getElementById("ready4").innerHTML =
                                "Readystate = 4 and Request finished and Response is ready. ";
                    }
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("demo").innerHTML =
                                this.responseText;
                    }
                };
                xhttp.open("GET", "Gustavo_info.txt", true);
                xhttp.send();
            }

        </script>

    </head>
    <body>

        <div class="topnav">
            <a href="homePage.php">Home</a>
        </div>

        <div class="content">

            <div id="pro"><img src="2.png" onmouseover="this.src = '1.png'" onmouseout="this.src = '2.png'">

                <div class="prev_btn" onclick="toggle(this)"></div>
                <div class="next_btn" onclick="toggle(this)"></div>
            </div>
            <h2>AJAX responses from the server</h2><br>
            <div id="ready1"></div>
            <div id="ready2"></div>
            <div id="ready3"></div>
            <div id="ready4"></div>
            <div id="demo">
                <button type="button" onclick="loadDoc()">Responses from Server</button>
            </div><br>

        </div>

        <div class="footer">
            <p>This website is made by Gustavo, Kohei</p>
        </div>

    </body>
</html>


