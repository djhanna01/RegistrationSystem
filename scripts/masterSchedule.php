<!doctype html>
<html lang="en">

<head>
    <title>masterSchedule</title>
</head>
<body>
    <?php 
        include '../global.php';

        $subject = $_POST['subject'];
        $courseID = "'" . $_POST['courseID'] . "'";
        $facultyFirstName = $_POST['facultyName'];
        $semester = $_POST['semester'];
        $day = $_POST['select_day'];

        $startTime = $_POST['startTime'];
        $endTime = $_POST['endTime'];

        $conn = connectToDB();

        //To make sure that the course exists in the selected semester.
        $sql = "SELECT * from course WHERE courseID = $courseID AND semester = $semester AND ";
        $result = mysqli_query($conn, $sql);
        if($result->num_rows == 0){
            echo "Course does not exist";
            die();
        }

        //To make sure professor exists.
        $sql = "SELECT * from course WHERE courseID = $courseID AND semester = $semester";
        $result = mysqli_query($conn, $sql);
        if($result->num_rows == 0){
            echo "Course does not exist";
            die();
        }
    ?>
</body>