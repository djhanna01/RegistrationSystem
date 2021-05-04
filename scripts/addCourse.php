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
        <title>Add Course</title>
    </head>
    <body>
        <?php
            $courseID = $_POST['courseID'];
            $courseName = $_POST['courseName'];
            $departmentID = $_POST['departmentID'];

            
            $conn = connectToDB();
            $sql = "SELECT courseID FROM course where courseID = '$courseID'";
            $result = mysqli_query($conn, $sql);
            if($result->num_rows > 0){
                echo "Course ID taken";
                die();
            }

            $sql = "SELECT courseID FROM course where courseName = '$courseName'";
            $result = mysqli_query($conn, $sql);
            if($result->num_rows > 0){
                echo "Course Name taken";
                die();
            }

            $sql = "INSERT INTO course VALUES('$courseID', $departmentID, 4, '$courseName')";
            $result = mysqli_query($conn, $sql);
            if(!$result){
                echo "Something went wrong with insert into course";
                die();
            }
            

            echo "Added successfully";
            die();
        ?>
    </body>
</html>