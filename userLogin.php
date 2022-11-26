<?php 
session_start();
//check for required fields from the form
if ((!filter_input(INPUT_POST, 'username'))
        || (!filter_input(INPUT_POST, 'password'))) {
	header("Location: login.php");
	exit;
}

//connect to server and select database
$mysqli = mysqli_connect("localhost", "cs213user", "letmein", "finalProjectDB");

//For more info about mysqli functions, go to the site below:
//http://www.w3schools.com/php/php_ref_mysqli.asp

/* create and issue the query
$sql = "SELECT f_name, l_name FROM auth_users WHERE username = '".$_POST["username"].
        "' AND password = SHA1('".$_POST["password"]."')";
*/

//create and issue the query
$targetname = filter_input(INPUT_POST, 'username');
$targetpasswd = filter_input(INPUT_POST, 'password');
$sql = "SELECT username, password FROM userLogin WHERE username = '".$targetname.
        "' AND password = SHA1('".$targetpasswd."')";

$result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
//$GLOBALS['person1'] = $f_name+$l_name;
//$GLOBALS['person2'] = "Kohei Sawabe";
//$GLOBALS['url'] = "https://www.youtube.com/watch?v=g5WB-p-QBJc";

//get the number of rows in the result set; should be 1 if a match
if (mysqli_num_rows($result) == 1) {

	//if authorized, get the values of f_name l_name
	while ($info = mysqli_fetch_array($result)) {
		$f_name = stripslashes($info['f_name']);
		$l_name = stripslashes($info['l_name']);
	}

	
	//set authorization cookie using curent Session ID
	setcookie("auth", session_id(), time()+60*30, "/", "", 0);

	//create display string
	$display_block = "
        <body style='background-color:bisque'>
	<p>".$f_name." ".$l_name." is authorized!</p>
	<p>Authorized Users' Menu:</p>
	<ul>
	<li><a href=\"secretpage.php\?person1=$f_name+$l_name&person2=Kohei+Sawabe&url=https://www.youtube.com/watch?v=g5WB-p-QBJc\">secret page</a></li>
	</ul>
        </body>";
} else {
	//redirect back to login form if not authorized
	header("Location: login.php");
	exit;
}
?>
<html>
<head>
<title>User Login</title>
</head>
<body>
<?php echo "$display_block"; ?>
</body>
</html>

