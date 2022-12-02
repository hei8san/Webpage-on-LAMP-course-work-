<?php
session_start();
$_SESSION['logged_in'] = true;
$displayBlock_AccountPage;

if ((!filter_input(INPUT_POST, 'username')) || (!filter_input(INPUT_POST, 'password'))) {
    header("Location: login.php");
    exit;
}

//connect to server and select database
$mysqli = mysqli_connect("localhost", "cs213user", "letmein", "finalProjectDB");

//create and issue the query
$targetname = filter_input(INPUT_POST, 'username');
$targetpasswd = filter_input(INPUT_POST, 'password');
$sqlLogin = "SELECT * FROM userLogin WHERE username = '" . $targetname .
        "' AND password = SHA1('" . $targetpasswd . "')";

$resultLogin = mysqli_query($mysqli, $sqlLogin) or die(mysqli_error($mysqli));

if ($resultLogin == 1) {
//    $displayBlock_AccountPage = "<p>Success</p>";
    $_SESSION["username"] = $targetname;
    header("Location: accountPage.php"); 
} else {
//    $displayBlock_AccountPage = "<p>Unsuccess</p>";
    header("Location: login.php"); 
}

?>
<html>
    <head>
        <title>User Login</title>
    </head>
    <body>
<?php echo $displayBlock_AccountPage; ?>
        
    </body>
</html>

