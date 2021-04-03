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
                $holdID = 1;
            if($holdType == "Disciplinary")
                $holdID = 2;

            $date = date("Y-m-d");
            
            $conn = connectToDB();

            //check if the student ID provided exists:
            $sql = "SELECT userID from user where user.userID = $studentID";
            $result = mysqli_query($conn, $sql);
            if($result->num_rows == 0){
                echo "Student ". "$studentID does not exist";
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
                echo "IT WORKS";
                die();
            }
        ?>
    </body>
</html>