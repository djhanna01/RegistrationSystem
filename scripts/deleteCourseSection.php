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
<title>
 remove Section
 </title>
</head>

<body>
<?php 
    $CRN = $_POST['CRN'];


    //getting courseID to resubmit
    $conn = connectToDB();
    $sql = "SELECT courseID FROM coursesection 
    WHERE CRN = $CRN";
    $result = mysqli_query($conn, $sql);
    $row = $result->fetch_row();
    $courseID = $row[0];



    $sql = "DELETE FROM coursesection 
    WHERE CRN = $CRN";

    
    if($result = mysqli_query($conn, $sql)){

        echo "$CRN has been removed.";
        //make sure to reduce the courseLoad for the professor if their course is ongoing
    }
    else{
        echo "Could not delete properly";
    }
    

    

    
?>
<form action= "../Admin/removeCourseSectionWithDetails.php" method="post" id="redirectForm">
<p><button type="submit">Okay</button>
<?php
    echo "<input type = 'hidden' name = 'CourseID' value = $courseID />"
?>
</form>


</body>
</html>