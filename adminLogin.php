<?php

$displayBlock_admin;

if ((filter_input(INPUT_POST, 'username')) && (filter_input(INPUT_POST, 'password'))) {
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

//connect to server and select database

?>
<html>
    <head>
        <title>Admin Login</title>
    </head>
    <body style="background-color: bisque">
        <a href ="homePage.php">Home page</a><br><br>
        <form method="post" action="">
            <fieldset> <legend><h3> Login Form </h3></legend>
                <p><strong>username:</strong><br/>
                    <input type="text" name="username"/></p>
                <p><strong>password:</strong><br/>
                    <input type="password" name="password"/></p>
                <p><input type="submit" name="submit" value="login"/></p>
            </fieldset>
        </form>
        <br>
    </body>
</html>