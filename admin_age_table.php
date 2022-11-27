<?php
$baseAge = $_POST['age'];
$baseRange = $_POST['range'];

$mysqli = mysqli_connect("localhost", "cs213user", "letmein", "finalProjectDB");
$sql_AgeDisplay = "SELECT username, CONCAT(CONCAT(firstname, ' '), lastname) Fullname, email, age FROM userInfo";

$result_AllDisplay = mysqli_query($mysqli, $sql_AllDisplay) or die(mysqli_error($mysqli));
if (mysqli_num_rows($result_AllDisplay) > 0) {
    $displayTable = "<table> <tr><th>username</th><th>Full name</th><th>Email</th><th>Age</th></tr>";
    while ($newArray = mysqli_fetch_array($result_AllDisplay, MYSQLI_ASSOC)) {
        $username = $newArray['username'];
        $fullname = $newArray['Fullname'];
        $email = $newArray['email'];
        $age = $newArray['age'];
        $displayTable .= "<tr> <td> " . $username . "</td> <td>" . $fullname . "</td> <td>" . $email . "</td><td>" . $age . "</td></tr>";
    }
    $displayTable .= "</table>";
}
?>
<html>
    <head>
        <title>Age base user Information</title>
    </head>
    <body>
        <a href="adminPage.php">Select conditions</a>
    </body>
</html>
