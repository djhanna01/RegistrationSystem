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
Register for Section
 </title>
</head>

<body>
<?php 
    $CRN = $_POST['CRN'];
    $studentID = $_COOKIE['userID'];
    $conn = connectToDB();

    //get courseID
    $sql = "SELECT courseID from CourseSection WHERE CRN = $CRN";
    $result = mysqli_query($conn, $sql);
    $row = $result->fetch_row();
    $courseID = "'". $row[0] . "'";

    //make sure that Course section exists and get semester
    $sql = "SELECT semesterID from coursesection WHERE CRN = $CRN";
    $result = mysqli_query($conn, $sql);
    if($result->num_rows == 0){
        echo "Invalid CRN";
        die();
    }
    $row = $result->fetch_row();
    $semesterID = $row[0]; 


    
    //check registration window
    $sql = "SELECT registrationStart, registrationEnd from semester WHERE semesterID = $semesterID";
    $result = mysqli_query($conn, $sql);
    $row = $result->fetch_row();
    $regStart = $row[0] . " 00:00:00.0";
    $regEnd = $row[1] .  " 00:00:00.0";
    
    if(time() < strtotime($regStart) || time() >  strtotime($regEnd)){
        echo "Registration for this semester has not begun or has ended";
        die();
    }
    //check seats taken
    $sql = "SELECT seatsAvailable from coursesection WHERE CRN = $CRN";
    $result = mysqli_query($conn, $sql);
    $row = $result->fetch_row();
    if ($row[0] == 0){
        echo "All seats have been taken";
        die();
    }
    
    //make sure undergrad goes with undergrad, grad goes with grad
    $sql = "SELECT studentType from Student WHERE userID = $studentID";
    $result = mysqli_query($conn, $sql);
    $row = $result->fetch_row();
    $studentType = $row[0];
    $status = "";
    if ($studentType == "Undergraduate"){
        $sql = "SELECT courseID from undergradCourse WHERE courseID = $courseID";
        $result = mysqli_query($conn, $sql);
        if($result->num_rows == 0){
            echo "Error: Graduate course when account is Undergrad";
            die();
        }
        //get secondary type
        $sql = "SELECT status from undergradstudent WHERE userID = $studentID";
        $result = mysqli_query($conn, $sql);
        $row = $result->fetch_row();
        $status = $row[0];
        

    }
    else{
        $sql = "SELECT courseID from gradCourse WHERE courseID = $courseID";
        $result = mysqli_query($conn, $sql);
        if($result->num_rows == 0){
            echo "Error: Undergraduate course when account is grad";
            die();
        }
        //get secondary type
        $sql = "SELECT status from gradstudent WHERE userID = $studentID";
        $result = mysqli_query($conn, $sql);
        $row = $result->fetch_row();
        $status = $row[0];
        

    }

    /*
    //making it so you cant go over courseLoad(unfinished)
    if($studentType == "Undergraduate"){
        $sql = "SELECT courseLoad
    FROM fulltimeundergradStudent
    LIMIT 1";
    $result = mysqli_query($conn, $sql);

    }
    else{
        $sql = "SELECT courseLoad
        FROM gradStudent
        LIMIT 1";

    }
    
    
    $sql = "SELECT *
    FROM enrollment
    LEFT JOIN CourseSection ON coursesection.CRN = enrollment.CRN
    WHERE CourseSection.semesterID = $semesterID && enrollment.studentID = $studentID";
    $result = mysqli_query($conn, $sql);
    */
    
    //check prerequisites
    $sql = "SELECT prerequisite.prerequisiteCourseID
    FROM prerequisite
    WHERE prerequisite.courseID = $courseID && prerequisite.prerequisiteCourseID NOT IN(
        SELECT coursesection.courseID
        FROM studenthistory
        LEFT JOIN coursesection ON coursesection.CRN = studenthistory.CRN
        WHERE studenthistory.studentID = $studentID
    
    )";
    $result = mysqli_query($conn, $sql);
    if($result->num_rows > 0){
        echo "Error Missing prerequisite";
        die();
    }

    //make sure not already added in
    $sql = "SELECT * FROM Enrollment WHERE studentID = $studentID && CRN = $CRN";
    $result = mysqli_query($conn, $sql);
    if($result->num_rows > 0){
        echo "Error: already registered";
        die();
    }

    $date = "'" . date("Y-m-d") . "'";

    //add the thing
    $sql = "INSERT INTO enrollment VALUES($studentID, $CRN, NULL, $date)";
    $result = mysqli_query($conn, $sql);
    if(!$result){

        echo "Could not insert into enrollment";
        die();
    }
    $sql = "INSERT INTO studentHistory VALUES( $CRN, $studentID, NULL)";
    $result = mysqli_query($conn, $sql);
    if(!$result){

        echo "Could not insert into student history";
        die();
    }
    
    //change the student to full time if their course load is equal to full time course load

    //increase seats taken, reduce seats available
    $sql = "SELECT seatsAvailable, seatsTaken from coursesection WHERE CRN = $CRN";
    $result = mysqli_query($conn, $sql);
    $row = $result->fetch_row();
    $seatsAvailable = $row[0] - 1;
    $seatsTaken = $row[1] - 1;
    $sql = "UPDATE coursesection SET seatsAvailable = $seatsAvailable WHERE CRN = $CRN";
    $result = mysqli_query($conn, $sql);
    $sql = "UPDATE coursesection SET seatsTaken = $seatsTaken WHERE CRN = $CRN";
    $result = mysqli_query($conn, $sql);

    

    
?>
<form action= "../Student/addCourseSection.php" method="post" id="redirectForm">
<p><button type="submit">Okay</button>
</form>


</body>
</html>