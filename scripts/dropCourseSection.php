<!doctype html>
<html lang="en">

<head>
 dropSection
</head>

<body>
<?php 
	include '../global.php';
    $section =  $_POST['section'];
    $userID = $_COOKIE['userID'];
    $userID = $_COOKIE['userID'];
    $conn = connectToDB();
    $sql = "SELECT CRN FROM CourseSection WHERE CRN = " . $section;
    $result = mysqli_query($conn, $sql);

    if($result > 0){
        echo "Found it";
        echo $userID;

        $sql = "DELETE FROM enrollment WHERE studentID = ". $userID ." && CRN = " . $section;
        mysqli_query($conn, $sql);
    }
    else{
        echo "didnt find it";
    }


?>

<script type="text/javascript">
window.onload = function() {

    history.go(-1);
    
};
    </script>
</body>
</html>