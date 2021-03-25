<!doctype html>
<?php 
    
    include '../global.php';
    if(!isset($_COOKIE['user']) || $_COOKIE['userType'] != "Admin"){
        header("Location:  $baseURL/homepage/homepage.php"); 
        die();
    }
?>
<html lang="en">
    <head>
        <title>List Of Courses</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="admin.css">
        <script type="text/javascript">
            function sendRedirectForm(value){
                var id;
                switch(value){
                    case 0:
                        id = "adminHomepage"
                        break;
                }

                var submissionFrom = document.getElementById("redirectForm"); 

                submissionFrom.innerHTML = "<input type = \"hidden\" name = \"webpage\" value = "+ id +" />";

                submissionFrom.submit();
            }
        </script>
    </head>
    <body>
        <h1>List Of All Available Courses</h1>
        <?php

        $conn = connectToDB();
        $sql = "SELECT course.courseID, course.courseName, course.credits, department.departmentName
                FROM course
                LEFT JOIN department ON course.departmentID = department.departmentID";
        $result = mysqli_query($conn, $sql);
        while ($row = $result->fetch_row()) {
            
            echo "
            <details>
            <summary>$row[0] - $row[1] - $row[2] credits - Dep of $row[3]</summary>
            <table>
                <thead>
                    <tr>
                        <th>CRN</th>
                        <th>Course ID</th>
                        <th>Professor</th>
                        <th>Day</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Start Date</th>
                        <th>Seats Available</th>
                        <th>Section Number</th>
                        <th>Room</th>
                    </tr>
                </thead>
                <tbody>
                ";
                $sqlB = "SELECT 
                coursesection.CRN, 
                Course.courseID, 
                User.LName,
                timeslotday.dayOfTheWeek, 
                Period.startTime, 
                Period.endTime, 
                coursesection.startDate,
                coursesection.seatsAvailable,
                coursesection.sectionNumber,
                Room.roomID
                FROM coursesection
                LEFT JOIN course ON coursesection.courseID = course.courseID
                LEFT JOIN timeslotday ON coursesection.timeslotID = timeslotday.timeslotID
                LEFT JOIN timeslotperiod ON coursesection.timeslotID = timeslotperiod.timeslotID
                LEFT JOIN Period ON Period.periodNumber = timeslotperiod.periodNumber
                LEFT JOIN Faculty ON Faculty.userID = coursesection.facultyID
                LEFT JOIN User ON Faculty.userID = User.userID
                LEFT JOIN Room ON Room.roomID = coursesection.roomID
                WHERE course.courseID = '$row[0]'
                GROUP BY CRN";
                $subResult = mysqli_query($conn, $sqlB);
                while ($subRow = $subResult->fetch_row()){
                echo "
                <tr>
                ";
                echo "<td>$subRow[0]</td>";
                echo "<td>$subRow[1]</td>";
                echo "<td>$subRow[2]</td>";
                echo "<td>$subRow[3]</td>";
                echo "<td>$subRow[4]</td>";
                echo "<td>$subRow[5]</td>";
                echo "<td>$subRow[6]</td>";
                echo "<td>$subRow[7]</td>";
                echo "<td>$subRow[8]</td>";
                echo "<td>$subRow[9]</td>";
                echo "
                </tr>
                ";
                }
            echo"
            </tbody>
            </table>
            </details>
            
            ";
        }
        ?>
        
        
    </body>
</html>