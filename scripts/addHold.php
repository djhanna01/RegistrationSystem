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
        <title>add Hold to Student</title>
    </head>
    <body>
        <?php
            $studentID = $_POST['StudentID'];
            $holdType = $_POST['select_hold_type'];

            if($holdType == "Financial")
                {$holdID = 1;}
            if($holdType == "Disciplinary")
                {$holdID = 2;}

            $date = date("Y-m-d");
            
            $conn = connectToDB();

            //check if the student ID provided exists:
            $sql = "SELECT student.userID from student where student.userID = $studentID
                    INNER JOIN user ON user.userID = student.studentID";
            $result = mysqli_query($conn, $sql);
            if($result->num_rows == 0){
                echo "Student ". "$studentID does not exist";
                die();
            }

            //check if the student has the hold provided:
            $sql = "SELECT * from holdstudent where holdstudent.studentID = $studentID AND holdstudent.holdID = $holdID";
            $result = mysqli_query($conn, $sql);
            if($result->num_rows >0){
                echo "Student ". "$studentID already has a $holdType hold";
                die();
            }

            //adding the hold to the provided student:
            $sql = "INSERT INTO holdstudent VALUES($holdID, $studentID, '$date')";
            $result = mysqli_query($conn, $sql);

            if(!$result){
                echo "Could not insert into hold-student";
                echo " ";
                echo $holdID;
                echo " ";
                echo $studentID;
                echo " ";
                echo $date;
                die();
            }
            else{
                echo "$holdType hold was added to student $studentID";
                die();
            }
        ?>
    </body>
</html>