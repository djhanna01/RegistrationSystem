<!doctype html>
<?php 
    
    include '../global.php';
    if(!isset($_COOKIE['user']) || $_COOKIE['userType'] != "Faculty"){
        header("Location:  $baseURL/homepage/homepage.php"); 
        die();
    }
?>
<html lang="en">
    <head>
        <title>View Transcript of Student</title>
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
            $studentID = $_POST['StudentID'];
            
            $conn = connectToDB();


            //check if student provided exists:
            $sql = "SELECT * FROM Student WHERE Student.userID = $studentID";
            $result = mysqli_query($conn, $sql);
            if($result->num_rows == 0){
                echo "Student $studentID does NOT exist";
                die();
            }

            //Get the transcript of the student:
            $sql = "SELECT Semester.season, Semester.semesterYear, Coursesection.courseID, Course.courseName, Enrollment.CRN, Enrollment.Grade, Enrollment.enrollDate
                    FROM Enrollment
                    INNER JOIN Coursesection ON Coursesection.CRN = Enrollment.CRN
                    INNER JOIN Course ON Course.courseID = Coursesection.courseID
                    INNER JOIN Semester ON Semester.semesterID = Coursesection.semesterID 
                    WHERE Enrollment.studentID = $studentID
                    ORDER BY Semester.season";
            $result = mysqli_query($conn, $sql);
                
                echo "
                <h1>Transcript of Student $studentID</h1>
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
            die();
        ?>

    </body>
</html>