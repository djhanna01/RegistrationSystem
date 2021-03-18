<!doctype html>
<html lang="en">

<head>
    <title>masterSchedule</title>
</head>
<body>
    <?php 
        include '../global.php';

        $department = $_POST['department'];
        $courseID = "'" . $_POST['courseID'] . "'";
        $facultyFirstName = $_POST['facultyFirstName'];
        $facultyLastName = $_Post['facultyLastName'];
        $semester = $_POST['semester'];
        $day = $_POST['select_day'];

        $startTime = $_POST['startTime'];
        $endTime = $_POST['endTime'];

        $conn = connectToDB();

        //To make sure that the course exists in the selected semester.
        $sql = "SELECT * from course WHERE courseID = $courseID AND semester = $semester";
        $result = mysqli_query($conn, $sql);
        if($result->num_rows == 0){
            echo "Course does not exist";
            die();
        }

        //To make sure professor exists.
        $sql = "SELECT userID from user WHERE FName = $facultyFirstName AND LName = $facultyLastName";
        $result = mysqli_query($conn, $sql);
        if($result->num_rows == 0){
            echo "Faculty does not exist";
            die();
        }

        //To make sure the start and end time exist.
        $sql = "SELECT startTime, endTime from period where startTime = $startTime AND endTime = $endTime";
        $result = mysqli_query($conn, $sql);
        if($result->num_rows == 0){
            echo "Start Time OR End Time does not exist";
            die();
        }
        
        //To query the sections from given input.
        $sql = "SELECT CRN, courseID, roomID, startDate, endDate, seatsLeft, seatsTaken, sectionNumber 
                where courseID = $courseID
                INNER JOIN user ON facultyID = userID";
        $result = mysqli_query($conn, $sql);
        if(!$mysqli->connect_errno){
            echo "IT WORKS";
        }
        else{
            echo "it didnt work";
        }

        die();
    ?>
</body>