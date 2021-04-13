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
            
            //Lists the Hold type and shows the date assigned.
            $sql = "SELECT 
            Student.userID, 
            Hold.holdType, 
            Holdstudent.dateAssigned
            FROM 
            student, 
            hold, 
            holdstudent 
            WHERE userID = $userID";
            if($result->num_rows == 0){
                echo "You do not have any holds";
                die();
            }

            echo "
        <table>
        <thead>
        <tr>
            <th>ID</th>
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
            echo "<td>$row[2]</td>";
            echo "</tr>";
          } 
          echo "
          </tbody>
          </table>
          ";
        
        ?>

    </body>
</html>