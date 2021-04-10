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
        <title>Update Add/Drop window</title>
    </head>
    <body>
        <?php
            $semester = $_POST['Semester'];
            $startDate = $_POST['GradeWindowStartDate'];
            $endDate = $_POST['GradeWindowEndDate'];

            $conn = connectToDB();

            //check if start date is before end date or if they are equal:
            if($startDate >= $endDate){
                echo "End date $endDate can NOT be before nor equals Start date $startDate.";
                die();
            }
            
            //get the correct semester row:
            if($semester == 0){
                $semesterID = 0; //Srping 2021.
                $semester = "Spring 2021";
            }
            else{
                $semesterID = 1; //Fall 2021.
                $semester = "Fall 2021";
            }

            //updating the start and end dates.
            $sql = "UPDATE Semester
                    SET gradeSubmissionWindowStart = '$startDate', gradeSubmissionWindowEnd = '$endDate'
                    WHERE semesterID = $semesterID";
            $result = mysqli_query($conn, $sql);

            if(!$result){
                echo "Could not update grade submission window at start: $startDate and end: $endDate for semester: $semester.";
            }
            else{
                echo "Successfully updated grade submission window from start: $startDate to end: $endDate for semester: $semester!";
            }
            die();
        ?>
    </body>
</html>