<?php
session_start();
session_destroy();
?>
<html>
    <head>
        <title>Log out</title>
        <script 
            src="https://code.jquery.com/jquery-git.js">
        </script>  
    </head>
    <body>
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
    </body>
</html>

