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
        <title>Degree Audit</title>
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

            $sql = "SELECT  
            major.majorName
            FROM Undergradstudentmajor 
            LEFT JOIN Major ON Undergradstudentmajor.majorID = major.majorID
            LEFT JOIN User ON Undergradstudentmajor.underGradStudentID = User.userID
            WHERE underGradstudentID = $userID";

            echo "
                <h1>Degree Audit</h1>
                <table>
                <thead>
                <tr>
                    <th>Major</th>
                </tr>
                </thead>
                <tbody>
                ";
                $result = mysqli_query($conn, $sql);
                while ($row = $result->fetch_row()) {
                    echo "<tr>";
                    echo "<td>$row[0]</td>";
                    echo "</tr>";
                } 
                echo "
                </tbody>
                </table>
                ";

            //checks if student is actually a declared major and displays the major name 
            $sql = "SELECT  
            major.majorName
            FROM Undergradstudentmajor 
            LEFT JOIN Major ON Undergradstudentmajor.majorID = major.majorID
            LEFT JOIN User ON Undergradstudentmajor.underGradStudentID = User.userID
            WHERE underGradstudentID = $userID";
            $result = mysqli_query($conn, $sql);
            if($result->num_rows == 0){
                echo "You are not a declared major."
            }
            if($result == "Mathematics" ){
                $majorID = 0;
            }
            if($result == "Computer Science" ){
                $majorID = 1;
            }
            if($result == "Childhood Education" ){
                $majorID = 2;
            }
            if($result == "Visual Arts" ){
                $majorID = 3;
            }
            if($result == "Psychology" ){
                $majorID = 4;
            }
            if($result == "History" ){
                $majorID = 5;
            }
            if($result == "English" ){
                $majorID = 6;
            }
            if($result == "Biological Sciences" ){
                $majorID = 7;
            }
                


            die();
        ?>

    </body>
</html>