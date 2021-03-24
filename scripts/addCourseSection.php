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
<title>
 addSection
 </title>
</head>

<body>
<?php 
    
    $courseID = "'" . $_POST['CourseID'] . "'";
    $facultyID = $_POST['FacultyID'];
    $roomID = $_POST['RoomID'];
    $semester = $_POST['Semester'];
    $day = $_POST['select_day'];
    $timeslotID = $_POST['period'] - 1;

    $startDate = "";
    $endDate = "";

    if(strcmp($semester,"Spring 2021") == 0){
        
        if($day == "mw"){
            $startDate = "'2021-01-25'";
            $endDate = "'2021-05-05'";

        }
        else if($day == "tt"){
            $timeslotID = "1".$timeslotID;
            $startDate = "'2021-01-26'";
            $endDate = "'2021-05-06'";

        }
        else if($day == "f"){
            $timeslotID = "2".$timeslotID;
            $startDate = "'2021-01-29'";
            $endDate = "'2021-05-07'";

        }

    }
    else{
        if($day == "mw"){
            $startDate = "'2021-09-06'";
            $endDate = "'2021-12-15'";

        }
        else if($day == "tt"){
            $timeslotID = "1".$timeslotID;
            $startDate = "'2021-09-07'";
            $endDate = "'2021-12-16'";

        }
        else if($day == "f"){
            $timeslotID = "2".$timeslotID;
            $startDate = "'2021-09-10'";
            $endDate = "'2021-12-17'";

        }
    }



    $conn = connectToDB();

    //make sure course exists
    $sql = "SELECT * from course WHERE courseID = $courseID";
    $result = mysqli_query($conn, $sql);
    if($result->num_rows == 0){
        echo "Course does not exist";
        die();
    }
    

    //make sure room exists
    $sql = "SELECT * FROM Room WHERE roomID = $roomID";
    $result = mysqli_query($conn, $sql);
    if($result->num_rows == 0){
        echo "Room ". "$roomID does not exist";
        die();
    }
    //make sure room is not office
    $sql = "SELECT * FROM OfficeRoom WHERE roomID = $roomID";
    $result = mysqli_query($conn, $sql);
    if($result->num_rows > 0){
        echo "Room ". "$roomID is an office room";
        die();
    }

    //make sure timeslot exists (technically unnnessecary but i wrote the code already so whoop)
    $sql = "SELECT * FROM timeslot WHERE timeslotID = $timeslotID";
    $result = mysqli_query($conn, $sql);
    if($result->num_rows == 0){
        echo "Timeslot ". "$timeslotID does not exist";
        die();
    }

    //make sure faculty exists
    $sql = "SELECT * FROM faculty WHERE userID = $facultyID";
    $result = mysqli_query($conn, $sql);
    if($result->num_rows == 0){
        echo "Faculty ". "$facultyID does not exist";
        die();
    }

    //make sure not going over course load
    $sql = "SELECT facultyType FROM faculty WHERE userID = $facultyID";
    $result = mysqli_query($conn, $sql);
    $row = $result->fetch_row();
    if($row[0] == "Full time"){
        $sql ="SELECT courseLoad from fulltimefaculty LIMIT 1";
    }
    else{
        $sql ="SELECT courseLoad from parttimefaculty LIMIT 1";
    }
    $result = mysqli_query($conn, $sql);
    $row = $result->fetch_row();
    $courseLoad = $row[0];


    $sql = "SELECT COUNT(CourseSection.CRN)
    FROM Faculty
    LEFT JOIN CourseSection ON CourseSection.facultyID = Faculty.userID
    WHERE facultyID = $facultyID";
    $result = mysqli_query($conn, $sql);
    $row = $result->fetch_row();
    $currentCourseAmount = $row[0];
    echo "HII";
    if($currentCourseAmount + 1 > $courseLoad){
        echo "Course Overload";
        die();
    }

    //make sure no room and time conflict
    $sql = "SELECT * FROM coursesection WHERE roomID = $roomID && timeslotID = $timeslotID && startDate = $startDate";
    $result = mysqli_query($conn, $sql);
    if($result->num_rows > 0){
        echo "Room-Time conflict";
        die();
    }
    //make sure prof is free that time
    $sql = "SELECT * FROM coursesection WHERE facultyID = $facultyID && timeslotID = $timeslotID && startDate = $startDate";
    $result = mysqli_query($conn, $sql);
    if($result->num_rows > 0){
        echo "Faculty-Time conflict";
        die();
    }

    //find section number
    $sql = "SELECT coursesection.sectionNumber, course.departmentID FROM coursesection
     LEFT JOIN course ON course.courseID = coursesection.courseID 
     WHERE coursesection.courseID = $courseID && DATEDIFF(coursesection.startDate, $startDate) < 7  && DATEDIFF(coursesection.startDate, $startDate) > -7";
    $result = mysqli_query($conn, $sql);
    
    $max = 0;
    while($row = $result->fetch_row()){
        
        $depID = $row[1] +1;
        if ($max < $row[0]){
            $max = $row[0];
        }
    }
    $max++;
    $sectionNumber = "$max";

    //make CRN
    $CRN = "'" .  $depID . ord($semester) . substr($courseID,3, strlen($courseID)-4) . $sectionNumber ."'";
    
    //actually adding the thing
    $sql = "INSERT INTO coursesection VALUES(
        $CRN, 
        $courseID, 
        $facultyID,
        $roomID,
        $timeslotID, 
        $startDate, 
        $endDate, 
        10, 
        0, 
        $sectionNumber,
        $semester
        )";
    $result = mysqli_query($conn, $sql);

    if($result){
        echo "IT WORKS";
        
        //add to the course load
        //MAKE IT SO THAT IT ONLY ADDS IF THE SEMESTER IS THE CURRENT SEMESTER
        $sql = "SELECT courseLoad FROM fulltimeFaculty WHERE userID = $facultyID";
        $result = mysqli_query($conn, $sql);


        
        $row = $result->fetch_row();
        $newCourseLoad = $row[0] + 4;
    
        $sql = "UPDATE parttimefaculty SET courseLoad = $newCourseLoad WHERE userID = $facultyID";
        $result = mysqli_query($conn, $sql);
        $sql = "UPDATE fulltimefaculty SET courseLoad = $newCourseLoad WHERE userID = $facultyID";
        $result = mysqli_query($conn, $sql);
    
    
    }
    else{
        echo "it didnt work";
    }

die();

    
?>


</body>
</html>