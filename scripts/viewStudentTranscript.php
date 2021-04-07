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
        <title>View Student Transcript</title>
        <style>
            table,tr,th,td{
                border:3px solid black;
                background-color:orange;
                color:black;
            }
        </style>
    </head>
    <?php
        $studentID = $_POST['StudentID'];

        $conn = connectToDB();

        //check if the student ID provided exists:
        $sql = "SELECT * FROM Student WHERE Student.userID = $studentID";
        $result = mysqli_query($conn, $sql);
        if($result->num_rows == 0){
            echo "Student $studentID does not exist";
            die();
        }

        //querying to show their transcript
        $sql = "SELECT * FROM "
needs work