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
        <title>Assign Faculty Advisor to Student</title>
    </head>
    <body>
        <?php
            $facultyID = $_POST['FacultyID'];
            $studentID = $_POST['StudentID'];

            $date = date("Y-m-d");

            $conn = connectToDB();

            //check if faculty ID exits:
            $sql = "SELECT * FROM Faculty where Faculty.userID = $facultyID";
            $result = mysqli_query($conn, $sql);
            if($result->num_rows==0){
                echo "Faculty $facultyID does NOT exist.";
                die();
            }

            //check if student ID exists:
            $sql = "SELECT * FROM Student where Student.userID = $studentID";
            $result = mysqli_query($conn, $sql);
            if($result->num_rows==0){
                echo "Student $studentID does NOT exist.";
                die();
            }

            //assign given faculty as advisor of given student:
            $sql = "INSERT INTO Advises VALUES($studentID, $facultyID, '$date')";
            $result = mysqli_query($conn, $sql);
            if(!$result){
                echo "Failed to add faculty $facultyID as advisor to student $studentID.";
                die();
            }
            else{
                echo "Faculty $facultyID was assigned as advisor to student $studentID successfully!";
            }
            die();
        ?>
    </body>
</html>