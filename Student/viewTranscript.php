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
        <title>View Transcript</title>
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

            $sql = "SELECT  Semester.season, Semester.semesterYear, Coursesection.courseID, Course.courseName, Enrollment.CRN, Enrollment.Grade, Enrollment.enrollDate
                    FROM Enrollment
                    INNER JOIN Coursesection ON Coursesection.CRN = Enrollment.CRN
                    INNER JOIN Course ON Course.courseID = Coursesection.courseID
                    INNER JOIN Semester ON Semester.semesterID = Coursesection.semesterID 
                    WHERE Enrollment.studentID = $userID
                    ORDER BY Semester.season";

            echo "
                <h1>Transcript</h1>
                <table>
                <thead>
                <tr>
                    <th>Semester</th>
                    <th>Year</th>
                    <th>Course ID</th>
                    <th>Course Name</th>
                    <th>CRN</th>
                    <th>Grade</th>
                    <th>Enroll Date</th>
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
                    echo "<td>$row[3]</td>";
                    echo "<td>$row[4]</td>";
                    echo "<td>$row[5]</td>";
                    echo "<td>$row[6]</td>";
                    echo "</tr>";
                } 
                echo "
                </tbody>
                </table>
                ";
        
        ?>

    </body>
</html>