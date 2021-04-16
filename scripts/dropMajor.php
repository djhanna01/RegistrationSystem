<!doctype html>
<?php 
    
    include '../global.php';
    if(!isset($_COOKIE['user']) || $_COOKIE['userType'] != "Student"){
        header("Location:  $baseURL/homepage/homepage.php"); 
        die();
    }
?>
<html lang="en">
    <head>
        <title>Drop Major</title>
    </head>
    <body>
        <?php
            $studentID = $_COOKIE['StudentID'];
            $majorName = $_POST['majorName'];
            
            $conn = connectToDB();

            //check if student has a declared major
            $sql = "SELECT * FROM undergradstudentmajor WHERE undergradstudentmajor.undergradstudentID = $studentID";
            $result = mysqli_query($conn, $sql);
            if($result->num_rows == 0){
                echo "You do not have a major to drop";
                die();
             }

             //remove their major
             $sql = "DELETE undergradstudentmajor 
             FROM undergradstudentmajor
             INNER JOIN major
             WHERE undergradstudentmajor.undergradstudentID = $studentID
             AND major.majorName = $majorName";

            
            die();
        ?>
    </body>
</html>