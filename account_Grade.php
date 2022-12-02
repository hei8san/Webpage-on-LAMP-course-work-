<?php
session_start();
if (!empty($_SESSION['logged_in'])) {
    $displayBlock_accountGrade;
    $mysqli = mysqli_connect("localhost", "cs213user", "letmein", "finalProjectDB");
    $cosc213 = $_POST['cosc213'];
    $cosc219 = $_POST['cosc219'];
    $cosc222 = $_POST['cosc222'];
    $cosc236 = $_POST['cosc236'];
    $cosc304 = $_POST['cosc304'];
    $username = $_SESSION['username'];
//if username exists grades table then
    $sql_check_exist = "SELECT username FROM grades WHERE username = '" . $username . "'";
//echo 'check';
//echo $sql_check_exist;
    $resultExist = $mysqli->query($sql_check_exist);

    if ($resultExist->num_rows == 0) {
//    echo 'NOT exists';
        $sqlInsertgrades = "INSERT INTO grades (username, cosc213, cosc219, cosc222, cosc236, cosc304) "
                . "VALUES ('" . $username . "', " . $cosc213 . ", " . $cosc219 . ", " . $cosc222 . ", " . $cosc236 . ", " . $cosc304 . ")";
        $resultgrades = $mysqli->query($sqlInsertgrades);

        if ($resultgrades === TRUE) {
            $displayBlock_accountGrade = "Your record is inserted. <br><br>";
        } else {
            echo 'error';
        }
    } else {
        //echo 'exists';
        $sqlUpdategrades = "UPDATE grades SET cosc213 = " . $cosc213 . ", cosc219 = " . $cosc219 . ", cosc222 = " . $cosc222 . ", cosc236 = " . $cosc236 . ", cosc304 = " . $cosc304 . " WHERE username = '" . $username . "'";
        echo $sqlUpdategrades;
        $result_update_grades = $mysqli->query($sqlUpdategrades);

        if ($result_update_grades === TRUE) {
            $displayBlock_accountGrade = "Your record is updated. <br><br>";
        } else {
            echo 'error';
        }
    }
} else {
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Enter Grades</title>
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
    </head>
    <body>

        <div class="topnav">
            <a href="logout.php">Log out</a>
        </div>

        <div class="content">

<?php echo $displayBlock_accountGrade; ?>
            <a href="account_showGrade.php">Look at grade</a>


        </div>

        <div class="footer">
            <p>This website is made by Gustavo, Kohei</p>
        </div>

    </body>
</html>


