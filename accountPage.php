<?php
session_start();
echo $_SESSION['username'];
?>
<!--<html>
    <head>
        <title>Account Page</title>
    </head>
    <body>
        <a href="homePage.php">Home page</a>
        <a href="logout.php">Log out</a>
        <h2>This is account page</h2>
        
    </body>
</html>-->
<html>
<head>
    <script type='text/javascript'>
        function addFields(){
            // Generate a dynamic number of inputs
            var number = document.getElementById("member").value;
            // Get the element where the inputs will be added to
            var container = document.getElementById("container");
            // Remove every children it had before
            while (container.hasChildNodes()) {
                container.removeChild(container.lastChild);
            }
            for (i=0;i<number;i++){
                // Append a node with a random text
                container.appendChild(document.createTextNode("Member " + (i+1)));
                // Create an <input> element, set its type and name attributes
                var input = document.createElement("input");
                input.type = "text";
                input.name = "member" + i;
                container.appendChild(input);
                // Append a line break 
                container.appendChild(document.createElement("br"));
            }
        }
    </script>
</head>
<body>
    <input type="text" id="member" name="member" value="">Number of members: (max. 5)<br />
    <a href="#" id="filldetails" onclick="addFields()">Fill Details</a>
    <div id="container"/>
</body>
</html>


