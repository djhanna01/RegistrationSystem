<!doctype html>
<?php 
    
    include '../global.php';
    if(!isset($_COOKIE['user']) || $_COOKIE['userType'] != "Student"){
        header("Location:  $baseURL/homepage/homepage.php"); 
        die();
    }
?>
<html lang="en">
    <head>
        <title>View Holds</title>
        <style>
            table,tr,th,td{
                border:3px solid black;
                background-color:orange;
                color:black;
            }
        </style>
    </head>
    <body>
        <?php
            $userID = $_COOKIE['userID'];

            $conn = connectToDB();

            $sql = "SELECT * FROM holdstudent WHERE holdstudent.studentID = $userID";

            echo "
        <table>
        <thead>
        <tr>
            <th>Hold Type</th>
            <th>Date Assigned</th>

        </tr>
        </thead>
        <tbody>
        ";
        $result = mysqli_query($conn, $sql);
        while ($row = $result->fetch_row()) {
            echo "<tr>";
            echo "<td>$row[0]</td>";
            echo "<td>$row[1]</td>";
            echo "</tr>";
          } 
          echo "
          </tbody>
          </table>
          ";
        
        ?>

    </body>
</html>