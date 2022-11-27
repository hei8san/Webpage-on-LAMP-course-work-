<?php
session_start();
//echo $_SESSION['username'];
if(isset($_POST['submit'])){
    
}
?>

<html>
    <head>
        <script type='text/javascript'>
            function addFields() {
                // Generate a dynamic number of inputs
                var number = document.getElementById("member").value;
                // Get the element where the inputs will be added to
                var container = document.getElementById("container");
                // Remove every children it had before
                while (container.hasChildNodes()) {
                    container.removeChild(container.lastChild);
                }
                for (i = 0; i < number; i++) {
                    // Append a node with a random text
                    container.appendChild(document.createTextNode("Course" + (i + 1) + ": "));
                    // Create an <input> element, set its type and name attributes
                    var input = document.createElement("input");
                    input.type = "text";
                    input.name = "member" + i;
                    container.appendChild(input);
                    // Append a line break 
                    container.appendChild(document.createElement("br"));
                }
                let inputSubmit = 
            }
        </script>
    </head>
    <body>
        <form action="" method = "post">


            Select Number of courses that you take this term: <br><br/>
            <input type="number" id="member" name="member" min = "1" max = "5"><br />
            <a href="#" id="filldetails" onclick="addFields()">Select</a>
            <div id="container"/>
            <input type ="submit" value ="Submit"/>
        </form>
        <a href="homePage.php">Home page</a>
        <a href="logout.php">Log out</a>
    </body>
</html>

