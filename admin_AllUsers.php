<?php
session_start();
if (!empty($_SESSION['admin_logged_in'])) {
    $displayBlock_AllUsers .= "All user's information <br>";
    $displayTable;

    $mysqli = mysqli_connect("localhost", "cs213user", "letmein", "finalProjectDB");
    $sql_AllUsers = "SELECT CONCAT(CONCAT(i.firstname, ' '), i.lastname) Name, g.cosc213, g.cosc219, g.cosc222, g.cosc236, g.cosc304, (g.cosc213+ g.cosc219+ g.cosc222+ g.cosc236+ g.cosc304)/5 Average
FROM grades g, userInfo i 
WHERE g.username = i.username
ORDER BY Name;";
//echo 'check';
//echo $sql_showGrade;
    $result = mysqli_query($mysqli, $sql_AllUsers)or die(mysqli_error($mysqli));
//        
    if (mysqli_num_rows($result) > 0) {
        while ($newArray = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $name = $newArray['Name'];
            $cosc213 = $newArray['cosc213'];
            $cosc219 = $newArray['cosc219'];
            $cosc222 = $newArray['cosc222'];
            $cosc236 = $newArray['cosc236'];
            $cosc304 = $newArray['cosc304'];
            $ave = $newArray['Average'];
            $displayTable .= "<tr> <td> " . $name . "</td> <td> " . $cosc213 . "</td> <td>" . $cosc219 . "</td> <td>" . $cosc222 . "</td><td>" . $cosc236 . "</td><td>" . $cosc304 . "</td><td>" . round($ave, 1) . "</td></tr>";
        }
    }
} else {
    header("Location: adminLogin.php");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>All Grades</title>
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
            .styled-table {
                border-collapse: collapse;
                margin: 25px 0;
                font-size: 0.9em;
                font-family: sans-serif;
                min-width: 400px;
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
                text-align: center;
            }
            .styled-table thead tr {
                background-color: #009879;
                color: #ffffff;
                text-align: left;
            }
            .styled-table th,
            .styled-table td {
                padding: 12px 15px;
            }
            .styled-table tbody tr {
                border-bottom: 1px solid #dddddd;
            }

            .styled-table tbody tr:nth-of-type(even) {
                background-color: #f3f3f3;
            }
            .styled-table tbody tr.active-row {
                font-weight: bold;
                color: #009879;
            }
        </style>
    </head>
    <body>

        <div class="topnav">
            <a href="logout.php">Log out</a>
        </div>

        <div class="content">

            <h4>All user's grades</h4>
            <table class="styled-table">
                <tr>
                    <th>
                        Full Name
                    </th>
                    <th>
                        COSC213
                    </th>
                    <th>
                        COSC219
                    </th>
                    <th>
                        COSC222
                    </th>
                    <th>
                        COSC236
                    </th>
                    <th>
                        COSC304
                    </th>
                    <th>
                        Average
                    </th>
                </tr>
                <?php echo $displayTable; ?>
            </table>
            <br>
            <a href="adminPage.php">Go back to select options</a>
        </div>

        <div class="footer">
            <p>This website is made by Gustavo, Kohei</p>
        </div>

    </body>
</html>

