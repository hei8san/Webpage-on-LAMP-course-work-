<?php
session_start();
$username = $_SESSION['username'];
$display_accountPage;
if (!empty($_SESSION['logged_in'])) {


    if (!isset($_POST["Submit"])) {
        $mysqli = mysqli_connect("localhost", "cs213user", "letmein", "finalProjectDB");
        $sql_fullname = "SELECT firstname, lastname FROM userInfo WHERE username = '" . $username . "'";

        $result_accountPage = mysqli_query($mysqli, $sql_fullname) or die(mysqli_error($mysqli));

        if ($result_accountPage == 1) {
            while ($newArray = mysqli_fetch_array($result_accountPage, MYSQLI_ASSOC)) {
                $fname = $newArray['firstname'];
                $lname = $newArray['lastname'];
                $display_accountPage .= " <h2>Welcome " . $fname . " " . $lname . "!</h2>"
                        . "<form action='account_Grade.php' method = 'post'>
                <p>Enter the scores that you got in fall semester 2022.</p><br>
                COSC213: <input type ='number' name ='cosc213' min ='0' max ='100'/ required><br><br>
                COSC219: <input type ='number' name ='cosc219' min ='0' max ='100'/ required><br><br>
                COSC222: <input type ='number' name ='cosc222' min ='0' max ='100'/ required><br><br>
                COSC236: <input type ='number' name ='cosc236' min ='0' max ='100'/ required><br><br>
                COSC304: <input type ='number' name ='cosc304' min ='0' max ='100'/ required><br><br>
                <input type ='submit' value ='Submit or Update'/>
            </form>
            <br>";
            }
        } else {
            echo "Error Occurs";
            header("Location: login.php");
        }
    }
}else{
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>User Page</title>
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
            <!--            <a href="homePage.php">Home</a>-->
            <a href="logout.php">Log out</a>
        </div>

        <div class="content">

<?php echo $display_accountPage; ?>

            <a href="account_showGrade.php">Look at grade</a>

        </div>

        <div class="footer">
            <p>This website is made by Gustavo, Kohei</p>
        </div>

    </body>
</html>


