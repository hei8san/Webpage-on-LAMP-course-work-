<?php
$displayBlock_adminPage;
$displayTable;

if (isset($_POST['conditions'])) {
    $condition = $_POST['conditions'];
    if ($condition == 'all') {
        //connect to server and select database
        $mysqli = mysqli_connect("localhost", "cs213user", "letmein", "finalProjectDB");
        $sql_AllDisplay = "SELECT username, CONCAT(CONCAT(firstname, ' '), lastname) Fullname, email, age FROM userInfo";
        
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
        } else {
            
        }
    } else if ($condition == 'age') {
        
    } else if ($condition == 'initial') {
        
    } else if ($condition == 'email') {
        
}}
 else {
    $displayBlock_adminPage = "<h2>Select Options</h2>
        <form action='' method = 'post'>
            <label for='conditions'>Choose conditions:</label>
            <select name='conditions' id='conditions'>
                <option value='all'>All users</option>
                <option value='age'>Age</option>
                <option value='initial'>Initial letter</option>
                <option value='email'>Email</option>
            </select>
            <br><br>
            <input type='submit' value='Submit'>
        </form>";
}
?>
<html>
    <head>
        <title>Admin</title>
         <style>
            th {

                border-right: 1px solid #000000;
                border-bottom: 1px solid #000000;
                border-top: 1px solid #000000;
                border-left: 1px solid #000000;
                color: blue;
                font-weight: bold;
            }
            td {
                padding: 5px;
                border-right: 1px solid #000000;
                border-bottom: 1px solid #000000;
                border-top: 1px solid #000000;
                border-left: 1px solid #000000;
                text-align: left;
                
                color: blue;
            }

            table {
                
                border-collapse: separate;
                border-right: 1px solid #000000;
                border-bottom: 1px solid #000000;
                border-top: 1px solid #000000;
                border-left: 1px solid #000000;


            }
        </style>
    </head>
    <body>
        <?php echo $displayBlock_adminPage; 
        echo $displayTable;?> 

    </body>
</html>
