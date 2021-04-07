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

            if($holdID == 1)
                {$holdType = "Financial";}
            if($holdID == 2)
                {$holdType = "Disciplinary";}

            //check if the student ID provided exists:
            $sql = "SELECT student.userID from student where student.userID = $studentID
                    INNER JOIN user ON user.userID = student.studentID";
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

            //check if the student has holds:
            $sql = "SELECT * from holdstudent where holdstudent.studentID = $studentID AND holdstudent.holdID = $holdID";
            $result = mysqli_query($conn, $sql);
            if($result->num_rows ==0){
                echo "Student ". "$studentID does not have a $holdType hold";
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