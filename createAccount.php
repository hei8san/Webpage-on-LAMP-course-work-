<?php
session_start();
$displayBlock_CreateAccount;
//check for required fields from the form
//if ((!filter_input(INPUT_POST, 'username')) || (!filter_input(INPUT_POST, 'password'))) {
//    header("Location: login.php");
//    exit;
//}
//it may don't need 
if ((!isset($_POST['username'])) || (!isset($_POST['password']))) {
//    header("Location: createAccount");
//    exit;
    $displayBlock_CreateAccount = "<form method='post' action=''>
            <fieldset> <legend><h3> Account Information </h3></legend>
                <p><strong>username:</strong><br/>
                    <input type='text' name='username' required></p>
                <p><strong>password:</strong><br/>
                    <input type='password' name='password' required/></p>
                <p><strong>Email:</strong><br/>
                    <input type='email' name='email' required/></p>
                <p><strong>First Name:</strong><br/>
                    <input type='text' name='fname' required/></p>
                <p><strong>Last Name:</strong><br/>
                    <input type='text' name='lname' required/></p>
                <p><strong>Age:</strong><br/>
                    <input type='number' name='age' min='0' max='150' required/></p>
                <p><input type='submit' name='submit' value='Create'/></p>
            </fieldset>
        </form>
        <br>
        <a href ='userLogin.php'>Login to your account</a>";
} else {
    $mysqli = mysqli_connect("localhost", "cs213user", "letmein", "finalProjectDB");

//create and issue the query
    $targetusername = filter_input(INPUT_POST, 'username');
    $targetpasswd = filter_input(INPUT_POST, 'password');
    $targetemail = filter_input(INPUT_POST, 'email');
    $targetfname = filter_input(INPUT_POST, 'fname');
    $targetlname = filter_input(INPUT_POST, 'lname');
    $targetage = filter_input(INPUT_POST, 'age');

    $sqlCheck = "SELECT * FROM userInfo WHERE username = '" . $targetusername . "'";

    $resultCheck = $mysqli->query($sqlCheck);
    if ($resultCheck->num_rows == 0) {
        
        $sqlInsert = "INSERT INTO userInfo (username, password, firstname, lastname, email, age) "
                . "VALUES ('" . $targetusername . "', SHA1('" . $targetpasswd . "'), '" . $targetfname . "', "
                . "'" . $targetlname . "', '" . $targetemail . "', " . $targetage . " )";
//        echo $sqlInsert;
        $result = $mysqli->query($sqlInsert);
        
        if ($result === TRUE) {
            $displayBlock_CreateAccount = "<p>Insert Success</p>";
        } else {
            $displayBlock_CreateAccount = "<p>Error Occurs</p>";
        }
    } else {
        $displayBlock_CreateAccount = "
            <form method='post' action=''>
            <fieldset> <legend><h3> Account Information </h3></legend>
                <p><strong>username:</strong><br/>
                Please Enter different username<br/>
                    <input type='text' name='username' required></p>
                    
                <p><strong>password:</strong><br/>
                    <input type='password' name='password' required/></p>
                <p><strong>Email:</strong><br/>
                    <input type='email' name='email' required/></p>
                <p><strong>First Name:</strong><br/>
                    <input type='text' name='fname' required/></p>
                <p><strong>Last Name:</strong><br/>
                    <input type='text' name='lname' required/></p>
                <p><strong>Age:</strong><br/>
                    <input type='number' name='age' min='0' max='150' required/></p>
                <p><input type='submit' name='submit' value='Create'/></p>
            </fieldset>
        </form>
        <br>
        <a href ='userLogin.php'>Login to your account</a>";
        
    }
    $mysqli->close();
}
?>
<html>
    <head>
        <title>Create Account</title>
    </head>
    <body style="background-color: bisque">
        <?php echo $displayBlock_CreateAccount; ?>
    </body>
</html>

