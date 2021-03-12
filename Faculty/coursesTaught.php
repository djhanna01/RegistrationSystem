<!doctype html>
<?php 
    
    include '../global.php';
    if(!isset($_COOKIE['user'])){
        header("Location:  $baseURL/homepage/homepage.php"); 
        die();
    }
?>
<html lang="en">
    <head>
        <title></title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="faculty.css">
        <style>
        table, th, td {
        border: 1px solid black;
        }
        </style>
    </head>
    <body>
        <h1>Courses you teach:</h1>
        <?php 

        $userID = $_COOKIE['userID'];
        $conn = connectToDB();
        $sql = "SELECT Course.courseID, 
                Course.courseName, 
                coursesection.CRN, 
                timeslotday.dayOfTheWeek, 
                Period.startTime, 
                Period.endTime, 
                coursesection.startDate,
                coursesection.seatsleft,
                coursesection.seatsTaken
                FROM coursesection
                LEFT JOIN course ON coursesection.courseID = course.courseID
                LEFT JOIN timeslotday ON coursesection.timeslotID = timeslotday.timeslotID
                LEFT JOIN timeslotperiod ON coursesection.timeslotID = timeslotperiod.timeslotID
                LEFT JOIN Period ON Period.periodNumber = timeslotperiod.periodNumber
                WHERE coursesection.facultyID = $userID
                GROUP BY courseID";
        
        $result = mysqli_query($conn, $sql);
        $row = $result->fetch_row();
//CourseID, Course Name, CRN, dayOfTheWeek, Start time, endTime, start date ,seats left, seats taken
        echo "
        <table>
        <thead>
        <tr>
        <th>Course ID</th>    
        <th>Course Name</th>  
        <th>CRN</th>  
        <th>Days</th>  
        <th>Start Time</th>  
        <th>End Time</th>  
        <th>Start Date</th>  
        <th>Seats Left</th>  
        <th>Seats Taken</th>
        </tr>
        </thead>
        <tbody>  
        ";
        
        while ($row = $result->fetch_row()) {
            echo "
            <tr>
            ";
            echo "<td>$row[0]</td>";
            echo "<td>$row[1]</td>";
            echo "<td>$row[2]</td>";
            echo "<td>$row[3]</td>";
            echo "<td>$row[4]</td>";
            echo "<td>$row[5]</td>";
            echo "<td>$row[6]</td>";
            echo "<td>$row[7]</td>";
            echo "<td>$row[8]</td>";
            echo "
            </tr>
            ";
          } 
        
        echo "
        </table>
        </tbody>
        ";
        ?>
    </body>
</html>