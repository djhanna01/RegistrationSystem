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
        <title>Delete Hold for Student</title>
    </head>
    <body>
        <?php
            $studentID = $_POST['StudentID'];
            $holdID = $_POST['HoldID'];
            
            $conn = connectToDB();

            //check if the student ID provided exists:
            $sql = "SELECT userID from user where user.userID = $studentID";
            $result = mysqli_query($conn, $sql);
            if($result->num_rows == 0){
                echo "Student ". "$studentID does not exist";
                die();
            }

            //check if the hold ID provided exists:
                $sql = "SELECT holdID from hold where hold.holdID = $holdID";
                $result = mysqli_query($conn, $sql);
                if($result->num_rows == 0){
                    echo "Hold ". "$holdID does not exist";
                    die();
                }

            //removing the hold to the provided student:
            $sql = "DELETE from holdstudent where holdstudent.holdID = $holdID AND holdstudent.studentID = $studentID";
            $result = mysqli_query($conn, $sql);
            if(!$result){
                echo "Could not delete hold";
                echo " ";
                echo $holdID;
                echo " ";
                echo $studentID;
            }
            else{
                echo "Hold $holdID deleted for student $studentID";
            }
        ?>
    </body>
</html>