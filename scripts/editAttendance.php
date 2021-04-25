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
        <title>Edit Attendance For Student</title>
    </head>
    <body>
        <?php
            $studentID = $_POST['StudentID'];
            $CRN = $_POST['CRN'];
            echo"<h1>CHANGING ATTENDANCE OF STUDENT $studentID IN SECTION WITH CRN $CRN</h1>";


            //checking if the time and date of the attendance to change is past or current:
            
        ?>
    </body>
</html>