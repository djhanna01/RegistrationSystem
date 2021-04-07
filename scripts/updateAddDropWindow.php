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
        <title>Open Add/Drop window</title>
    </head>
    <body>
        <?php
            $semester = $_POST['Semester'];
            $startDate = $_POST['WindowStartDate'];
            $endDate = $_POST['WindowEndDate'];

            $conn = connectToDB();

            //check if start date is before end date:
            if($startDate > $endDate){
                echo "End date $endDate can NOT be before Start date $startDate.";
                die();
            }
            
            //get the correct semester row:
            if($semester == 0){
                $semesterID = 0; //Srping 2021.
            }
            else{
                $semesterID = 1; //Fall 2021.
            }

            //updating the start and end dates.
            $sql = "UPDATE Semester
                    SET registrationStart = '$startDate', registrationEnd = '$endDate'
                    WHERE semesterID = $semesterID";
            $result = mysqli_query($conn, $sql);

            if(!$result){
                echo "Could not open window at start: $startDate and end: $endDate.";
            }
            else{
                echo "Successfully opened window from start: $startDate to end: $endDate!";
            }
            die();
        ?>
    </body>
</html>