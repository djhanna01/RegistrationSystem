<!doctype html>
<html lang="en">

<head>
<title>
 addSection
 </title>
</head>

<body>
<?php 
	include '../global.php';
    
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