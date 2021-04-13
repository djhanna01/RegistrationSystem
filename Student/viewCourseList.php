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
        <title>View Course List</title>
        <style>
            table,tr,th,td{
                border:3px solid black;
                background-color:orange;
                color:black;
            }
        </style>
    </head>
    <body>
        <h1>Course List</h1>
        <?php
            $userID = $_COOKIE['userID'];

            $conn = connectToDB();
            //still needs work

            // Spring student course list 
            $sql = "SELECT 
            Semester.season,
            Semester.semesterYear, 
            Coursesection.courseID, 
            Course.courseName, 
            Enrollment.CRN, 
            Enrollment.enrollDate
            FROM Enrollment
            INNER JOIN Coursesection ON Coursesection.CRN = Enrollment.CRN
            INNER JOIN Course ON Course.courseID = Coursesection.courseID
            INNER JOIN Semester ON Semester.semesterID = Coursesection.semesterID 
            WHERE Enrollment.studentID = $userID 
            AND Enrollment.enrollDate >= '2021-01-01'
            AND Enrollment.enrollDate <= '2021-06-01'
            ORDER BY Semester.season";
            $result = mysqli_query($conn, $sql);
            if($result->num_rows == 0){
                echo "You are not taking any courses this Spring.";
                die();
            }

            //Fall student course list
            $sql = "SELECT 
            Semester.season,
            Semester.semesterYear, 
            Coursesection.courseID, 
            Course.courseName, 
            Enrollment.CRN, 
            Enrollment.enrollDate
            FROM Enrollment
            INNER JOIN Coursesection ON Coursesection.CRN = Enrollment.CRN
            INNER JOIN Course ON Course.courseID = Coursesection.courseID
            INNER JOIN Semester ON Semester.semesterID = Coursesection.semesterID 
            WHERE Enrollment.studentID = $userID
            AND Enrollment.enrollDate >= '2021-06-02'
            AND Enrollment.enrollDate <= '2021-12-31'
            ORDER BY Semester.season";
            if($result->num_rows == 0){
                echo "You are not taking any courses this Fall.";
                die();
            }

            echo "
        <table>
        <thead>
        <tr>
            <th>CRN</th>
            <th>Course Name</th>
            <th>Season</th>
            <th>Semester Year</th>
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
            echo "</tr>";
          } 
          echo "
          </tbody>
          </table>
          ";
        die();
        ?>
    </body>
</html>
