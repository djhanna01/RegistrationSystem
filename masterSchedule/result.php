
<html>
<head>

<meta charset="utf-8">
<link rel="stylesheet" href="masterSchedule.css">
</head>
<body>
<h1>Results</h1>
<?php 

$departmentWhere = "Course.departmentID != -1";
    if($_POST['department'] != '-1'){
    $departmentWhere = "Course.departmentID = " . $_POST['department'];
    }
    
    $courseIDWhere = "Course.courseID != ''";
       if($_POST['courseID'] != ''){
        $courseIDWhere = "Course.courseID = '". $_POST['courseID'] . "'";
    }
    
    $courseNameWhere = "Course.courseName != ''";
    if($_POST['courseName'] != ''){
        $courseNameWhere = "Course.courseName LIKE '%". $_POST['courseName'] . "%'";
    }
    $LNameWhere = "User.LName != ''";
    if($_POST['LName'] != ''){
        $LNameWhere = "User.LName LIKE '". $_POST['LName'] . "%'";
    }
    $periodWhere = "Period.periodNumber != -1";
    if($_POST['period'] != '-1'){
        $periodWhere = "Period.periodNumber = ". $_POST['period'];
    }
    $dayWhere = "Day.dayOfTheWeek != ''";
    if($_POST['days'] != 'any'){
        $dayWhere = "Day.dayOfTheWeek = '". $_POST['days'] . "'";
    }
    $semesterWhere = "courseSection.semesterID = ". $_POST['semester'];
    

	include '../global.php';

    $conn = connectToDB();
    
    $sql = "SELECT 
    CourseSection.CRN, 
    Course.courseName, 
    CourseSection.SectionNumber,
    Day.dayOfTheWeek,
    Period.startTime, 
    Period.endTime, 
    User.LName, 
    Room.buildingID, 
    Room.roomNumber 
    FROM CourseSection
    LEFT JOIN Course ON CourseSection.courseID = Course.courseID
    LEFT JOIN Timeslotday ON Timeslotday.timeslotID = CourseSection.timeslotID
    LEFT JOIN Day ON Timeslotday.dayOfTheWeek = Day.dayOfTheWeek
    LEFT JOIN Timeslotperiod ON Timeslotperiod.timeslotID = CourseSection.timeslotID
    LEFT JOIN Period ON Timeslotperiod.periodNumber = Period.periodNumber
    LEFT JOIN User ON CourseSection.facultyID = User.userID
    LEFT JOIN Room ON CourseSection.roomID = Room.roomID
    WHERE $departmentWhere && $courseIDWhere && $courseNameWhere && $LNameWhere && $periodWhere && $dayWhere && $semesterWhere
    GROUP BY CourseSection.CRN
    ORDER BY CourseSection.timeslotID";
    
    

    echo "
<table>
<thead>
<tr>
<th>CRN</th>
<th>Course Name</th>
            <th>Section Number</th>
            <th>Days</th>
            <th>Start Time</th>
            <th>End Time</th>
            <th>Instructor Name</th>
            <th>Building Number</th>
            <th>Room Number</th>
            
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
        echo "<td>$row[7]</td>";
        echo "<td>$row[8]</td>";
        echo "</tr>";
      } 
      echo "
      </tbody>
      </table>
      ";
    
?>
</body>
</html>