<!doctype html>
<html lang="en">

<head>
<title>
 addSection
 </title>
</head>

<body>
<?php 
	include '../global.php';
    
    $courseID = "'" . $_POST['CourseID'] . "'";
    $facultyID = $_POST['FacultyID'];
    $roomID = $_POST['RoomID'];
    $semester = $_POST['Semester'];
    $day = $_POST['select_day'];
    $timeslotID = $_POST['period'];


    $startDate = "";
    $endDate = "";

    if(strcmp($semester,"Spring 2019")){
        
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

    //make sure no room and time conflict
    $sql = "SELECT * FROM coursesection WHERE roomID = $roomID && timeslotID = $timeslotID";
    $result = mysqli_query($conn, $sql);
    if($result->num_rows > 0){
        echo "Room Time conflict";
        die();
    }
    //make sure prof is free that time
    $sql = "SELECT * FROM coursesection WHERE facultyID = $facultyID && timeslotID = $timeslotID";
    $result = mysqli_query($conn, $sql);
    if($result->num_rows > 0){
        echo "Room Time conflict";
        die();
    }

    //find section number
    $sql = "SELECT CRN FROM coursesection WHERE courseID = $courseID";
    $result = mysqli_query($conn, $sql);
    $sectionNumber = "$result->num_rows";
    
    //make CRN
    $CRN = "'" . ord(substr($courseID,0,1)) . ord(substr($courseID,1,1)) . substr($courseID,3, strlen($courseID)-4) . $sectionNumber ."'";
    
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
        $sectionNumber
        )";
    $result = mysqli_query($conn, $sql);

    if(!is_null($result)){
        echo "IT WORKS";
        
        //add to the course load
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